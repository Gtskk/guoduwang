<?php

use Gtskk\Listeners\LoginAuthenticatorListener;
use Gtskk\Storage\Member\MemberRepository as Member;

class MembersController extends BaseController implements LoginAuthenticatorListener
{

    public function __construct(Member $member)
    {
        $this->member = $member;
    }

    public function index()
    {
        $members = $this->member->limitAll();
        return View::make('theme::members.index', compact('members'));
    }

    public function show($id)
    {
        $member = $this->member->findOrFail($id);
        $topics = Topic::whose($member->id)->recent()->limit(10)->get();
        $replies = Reply::whose($member->id)->recent()->limit(10)->get();
        return View::make('theme::members.show', compact('member', 'topics', 'replies'));
    }

    /**
     * Displays the form for account creation
     *
     * @return  Illuminate\Http\Response
     */
    public function create()
    {
        if(Session::has('ghostlogindata'))
        {

            Log::info(Session::get('ghostlogindata'));
            $member = array_merge(Session::get('ghostlogindata'), Session::get('_old_input', []));
        }
        if(Session::has('githublogindata'))
        {
            $member = array_merge(Session::get('githublogindata'), Session::get('_old_input', []));
        }

        return View::make(Config::get('confide::signup_form'), compact('member'));
    }

    /**
     * Stores new account
     *
     * @return  Illuminate\Http\Response
     */
    public function store()
    {
        $inputData = Input::all();
        if(Session::has('githublogindata'))
        {
            $inputData = array_merge(Session::get('githublogindata'), $inputData);
        }
        if(Session::has('ghostlogindata'))
        {
            $inputData = array_merge(Session::get('ghostlogindata'), $inputData);
        }
        $repo = App::make('MemberRepository');
        $user = $repo->signup($inputData);

        if ($user->id) {
            $message = Lang::get('confide::confide.alerts.account_created');

            if (Config::get('confide::signup_email')) {
                Mail::queueOn(
                    Config::get('confide::email_queue'),
                    Config::get('confide::email_account_confirmation'),
                    compact('user'),
                    function ($message) use ($user) {
                        $message
                            ->to($user->email, $user->username)
                            ->subject(Lang::get('confide::confide.email.account_confirmation.subject'));
                    }
                );
                $message .= Lang::get('confide::confide.alerts.not_confirmed');
            }

            return Redirect::action('MembersController@login')
                ->with('notice', $message);
        } else {
            $error = $user->errors()->all(':message');

            return Redirect::action('MembersController@create')
                ->withInput(Input::except('password'))
                ->with('error', $error);
        }
    }

    /**
     * Edit the member info
     *
     * @return Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = $this->member->findOrFail($id);
        if($this->authorOrAdminPermissioinRequire($id))
        {
            return View::make('theme::members.edit', compact('member'));
        }
        else
        {
            return 'error';
        }
        
    }

    /**
     * Update a member data
     * @param  integer $id
     * @return Illuminate\Http\Response
     */
    public function update($id)
    {
        $member = $this->member->findOrFail($id);
        if($this->authorOrAdminPermissioinRequire($id))
        {
            $data = Input::only('real_name', 'github_name', 'city', 'company', 'personal_website', 'signature', 'introduction');
            App::make('Gtskk\Forms\MemberUpdateForm')->validate($data);

            $member->update($data);

            Flash::success(lang('Operation succeeded.'));
            return Redirect::route('members.show', $id);
        }
        
        Flash::error(lang('not_authorized.'));

        return Redirect::route('members.show', $id);
    }

    public function memberBlock($id)
    {
        if(Request::ajax())
        {
            $member = Member::findOrFail($id);
            $member->is_banned = (!$member->is_banned);
            $member->save();
            die(json_encode(array('status'=>'success', 'message'=>lang('Operation succeeded.'))));
        }
    }

    /**
     * 被禁用用户看到的视图
     * @return View 禁用会员视图
     */
    public function memberBanned()
    {
        if (Auth::check() && !Auth::user()->is_banned)
        {
            return Redirect::to('/');
        }
        return View::make('theme::members.memberbanned');
    }


    /**
     * Github登陆方式
     * @return Illuminate\Http\Redirect
     */
    public function githublogin()
    {
        if(Input::has('code'))
        {
            return App::make('Gtskk\Github\GithubAuthenticator')->authByCode($this, Input::get('code'));
        }
        if (!Session::has('url.intended'))
        {
            Session::put('url.intended', URL::previous());
        }
        // redirect to the github authentication url
        return Redirect::to((string) OAuth::consumer('GitHub')->getAuthorizationUri());
    }


    /**
     * Ghost登陆页面
     * @return Illuminate\Http\Redirect
     */
    public function ghostloginpage()
    {
        if(Confide::user())
        {
            return Redirect::to('/');
        }
            
        return View::make('theme::members.ghostloginpage');
    }

    /**
     * Ghost登陆方式
     * @return Illuminate\Http\Redirect
     */
    public function ghostlogin()
    {
        if (Input::has('ghostlogin') && Input::has('ghostpassword'))
        {
            return App::make('Gtskk\Ghost\GhostAuthenticator')->authByCredentials($this, Input::get('ghostlogin'), Input::get('ghostpassword'));
        }
            
        return Redirect::route('ghostloginpage');
    }

    /**
     * ----------------------------------------
     * LoginAuthenticatorListener Delegate
     * ----------------------------------------
     */

    // 数据库找不到用户, 执行新用户注册
    public function userNotFound($type, $loginData)
    {
        Session::put($type, $loginData);
        return Redirect::route('members.create');
    }

    // 数据库有用户信息, 登录用户
    public function userFound($type, $user)
    {
        Auth::login($user, true);
        Session::forget($type);

        Flash::success(lang('Operation succeeded.'));

        return Redirect::intended('/');
    }

    // 用户被屏蔽
    public function userIsBanned($user)
    {
        return Redirect::route('member-banned');
    }

    /**
     * Displays the login form
     *
     * @return  Illuminate\Http\Response
     */
    public function login()
    {
        if (Confide::user()) {
            return Redirect::to('/');
        }

        return View::make('theme::members.login_require');
    }

    /**
     * 获取指定用户的回复
     * @param  integer $id
     * @return Illuminate\Http\Response
     */
    public function replies($id)
    {
        $member = $this->member->findOrFail($id);
        $replies = Reply::whose($id)->recent()->paginate(15);
        return View::make('theme::members.replies', compact('member', 'replies'));
    }

    /**
     * 获取指定用户的话题
     * @param  integer $id
     * @return Illuminate\Http\Response
     */
    public function topics($id)
    {
        $member = $this->member->findOrFail($id);
        $topics = Topic::whose($id)->recent()->paginate(15);
        return View::make('theme::members.topics', compact('member', 'topics'));
    }

    /**
     * 获取指定用户的收藏
     * @param  integer $id
     * @return Illuminate\Http\Response
     */
    public function favorites($id)
    {
        $member = $this->member->findOrFail($id);
        $topics = $member->favoriteTopics()->paginate(15);
        return View::make('theme::members.topics', compact('member', 'topics'));
    }


    /**
     * Attempt to do login
     *
     * @return  Illuminate\Http\Response
     */
    public function doLogin()
    {
        $repo = App::make('MemberRepository');
        $input = Input::all();

        if ($repo->login($input)) {
            $intended = Session::get('url.intended');
            $jaxPos = strpos($intended, '?_pjax');
            if($jaxPos !== false) {
                Session::put('url.intended', substr($intended, 0, $jaxPos));
            }
            return Redirect::intended('/');
        }

        if ($repo->isThrottled($input)) {
            $err_msg = Lang::get('confide::confide.alerts.too_many_attempts');
        } elseif ($repo->existsButNotConfirmed($input)) {
            $err_msg = Lang::get('confide::confide.alerts.not_confirmed');
        } else {
            $err_msg = Lang::get('confide::confide.alerts.wrong_credentials');
        }

        return Redirect::action('MembersController@login')
            ->withInput(Input::except('password'))
            ->with('error', $err_msg);
    }

    /**
     * Attempt to confirm account with code
     *
     * @param  string $code
     *
     * @return  Illuminate\Http\Response
     */
    public function confirm($code)
    {
        if (Confide::confirm($code)) {
            $notice_msg = Lang::get('confide::confide.alerts.confirmation');
            return Redirect::action('MembersController@login')
                ->with('notice', $notice_msg);
        }

        $error_msg = Lang::get('confide::confide.alerts.wrong_confirmation');
        return Redirect::action('MembersController@login')
            ->with('error', $error_msg);
    }

    /**
     * Displays the forgot password form
     *
     * @return  Illuminate\Http\Response
     */
    public function forgotPassword()
    {
        return View::make(Config::get('confide::forgot_password_form'));
    }

    /**
     * Attempt to send change password link to the given email
     *
     * @return  Illuminate\Http\Response
     */
    public function doForgotPassword()
    {
        if (Confide::forgotPassword(Input::get('email'))) {
            $notice_msg = Lang::get('confide::confide.alerts.password_forgot');
            return Redirect::action('MembersController@login')
                ->with('notice', $notice_msg);
        }

        $error_msg = Lang::get('confide::confide.alerts.wrong_password_forgot');
        return Redirect::action('MembersController@forgotPassword')
            ->withInput()
            ->with('error', $error_msg);
    }

    /**
     * Shows the change password form with the given token
     *
     * @param  string $token
     *
     * @return  Illuminate\Http\Response
     */
    public function resetPassword($token)
    {
        return View::make(Config::get('confide::reset_password_form'))
                ->with('token', $token);
    }

    /**
     * Attempt change password of the user
     *
     * @return  Illuminate\Http\Response
     */
    public function doResetPassword()
    {
        $repo = App::make('MemberRepository');
        $input = array(
            'token'                 =>Input::get('token'),
            'password'              =>Input::get('password'),
            'password_confirmation' =>Input::get('password_confirmation'),
        );

        // By passing an array with the token, password and confirmation
        if ($repo->resetPassword($input)) {
            $notice_msg = Lang::get('confide::confide.alerts.password_reset');
            return Redirect::action('MembersController@login')
                ->with('notice', $notice_msg);
        }

        $error_msg = Lang::get('confide::confide.alerts.wrong_password_reset');
        return Redirect::action('MembersController@resetPassword', array('token'=>$input['token']))
            ->withInput()
            ->with('error', $error_msg);
    }

    /**
     * Log the user out of the application.
     *
     * @return  Illuminate\Http\Response
     */
    public function logout()
    {
        Confide::logout();

        return Redirect::to('/');
    }

}
