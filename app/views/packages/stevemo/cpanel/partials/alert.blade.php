@if ( Session::has('errors') )
<div class="alert alert-danger fade in">
    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
    <p>
        <strong>{{ trans('cpanel::users.form_validation_fail') }} </strong> {{ trans('cpanel::users.change_things_and_submit') }}
    </p>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if ( Session::has('success') )

<div class="alert alert-success fade in">
    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
    <strong>{{ trans('cpanel::users.well_done') }}</strong>
    {{ Session::get('success') }}
</div>

@endif

@if ( Session::has('warning') )

<div class="alert alert-warning fade in">
    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
    <strong>{{ trans('cpanel::users.warning') }}</strong>
    {{ Session::get('warning') }}
</div>

@endif

@if ( Session::has('danger') )

<div class="alert alert-danger fade in">
    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
    {{ Session::get('danger') }}
</div>

@endif

@if ( Session::has('info') )

<div class="alert alert-info fade in">
    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
    {{ Session::get('info') }}
</div>

@endif