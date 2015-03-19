<form action="{{ URL::action('MembersController@doLogin') }}" method="post" class="navbar-form navbar-right" role="form">
    <div class="form-group @if($errors->has('username') || Session::has('error')) has-error has-feedback @endif">
        <input type="text" name="username" placeholder="{{ lang('username_or_email') }}" class="form-control" datatype="*" nullmsg="{{ lang('username_not_null') }}">
    </div>
    <div class="form-group @if($errors->has('password') || Session::has('error')) has-error has-feedback @endif">
        <input type="password" name="password" placeholder="{{ trans('cpanel::users.password') }}" class="form-control" datatype="*" nullmsg="{{ lang('password_not_null') }}">
    </div>
    <div class="checkbox">
    	<label><input type="checkbox" name="remember"><span class="text-info">{{ trans('common.remember') }}</span></label>
    </div>
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <button type="submit" tabindex="0" id="loginBtn" class="btn btn-success">{{ trans('common.sign_in') }}</button>
    <a title="{{ lang('Github_login') }}" href="{{ route('githublogin') }}" class="btn btn-success"><i class="fa fa-github-alt"></i></a>
</form>

@section('javascript')
<script type="text/javascript">
    /** 登录表单验证 */
    $(".navbar-form").Validform();
</script>
@stop