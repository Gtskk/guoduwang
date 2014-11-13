<form action="{{ URL::action('MembersController@doLogin') }}" method="post" class="navbar-form navbar-right" role="form">
    <div class="form-group @if($errors->has('username') || Session::has('error')) has-error has-feedback @endif">
        <input type="text" name="username" placeholder="Username" class="form-control">
        @if(Session::has('error'))
        <span class="glyphicon glyphicon-remove form-control-feedback"></span>
        @endif
    </div>
    <div class="form-group @if($errors->has('password') || Session::has('error')) has-error has-feedback @endif">
        <input type="password" name="password" placeholder="Password" class="form-control">
        @if(Session::has('error'))
        <span class="glyphicon glyphicon-remove form-control-feedback"></span>
        @endif
    </div>
    <div class="checkbox">
    	<label><input type="checkbox" name="remember"><span class="text-info">Remember</span></label>
    </div>
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <button type="submit" tabindex="0" id="loginBtn" class="btn btn-success"@if(Session::has('error')) data-placement="bottom" data-title="Error" data-toggle="popover" data-trigger="manual" data-content="{{ Session::get('error') }}"@endif>Sign in</button>
</form>

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