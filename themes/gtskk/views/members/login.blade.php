<form action="{{ URL::action('MembersController@doLogin') }}" method="post" class="navbar-form navbar-right" role="form">
    <div class="form-group @if($errors->has('username') || Session::has('error')) has-error has-feedback @endif">
        <input type="text" name="username" placeholder="{{ trans('common.username') }}" class="form-control">
        @if(Session::has('error'))
        <span class="glyphicon glyphicon-remove form-control-feedback"></span>
        @endif
    </div>
    <div class="form-group @if($errors->has('password') || Session::has('error')) has-error has-feedback @endif">
        <input type="password" name="password" placeholder="{{ trans('common.password') }}" class="form-control">
        @if(Session::has('error'))
        <span class="glyphicon glyphicon-remove form-control-feedback"></span>
        @endif
    </div>
    <div class="checkbox">
    	<label><input type="checkbox" name="remember"><span class="text-info">{{ trans('common.remember') }}</span></label>
    </div>
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <button type="submit" tabindex="0" id="loginBtn" class="btn btn-success"@if(Session::has('error')) data-placement="bottom" data-title="{{ trans('common.error') }}" data-toggle="popover" data-trigger="manual" data-content="{{ Session::get('error') }}"@endif>{{ trans('common.sign_in') }}</button>
    <a title="{{ lang('Github_login') }}" href="{{ route('githublogin') }}" class="btn btn-success"><i class="fa fa-github-alt"></i></a>
</form>

@section('javascript')

@if(Session::has('error'))
<script type="text/javascript">
    $('#loginBtn').popover('show');
    $('body').on('click', function (e) {
        //did not click a popover toggle or popover
        if ($(e.target).data('toggle') !== 'popover'
            && $(e.target).parents('.popover.in').length === 0) { 
            $('[data-toggle="popover"]').popover('hide');
        }
    });
</script>
@endif

@stop