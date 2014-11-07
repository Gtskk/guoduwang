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
    <button type="submit" class="btn btn-success">Sign in</button>
</form>