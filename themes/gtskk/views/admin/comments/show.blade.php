@extends(Config::get('cpanel::views.layout'))

@section('header')
    <h3>
        <i class="icon-post"></i>
        {{ trans('cpanel::comments.column_text') }}
    </h3>
@stop

@section('help')
    <p class="lead">{{ trans('cpanel::comments.column_text') }}</p>
    <p>
        {{ trans('cpanel::comments.help_info') }}
    </p>
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">

            <div class="block">

                <p class="block-heading">{{ trans('cpanel::comments.column_text') }}</p>

                <div class="block-body">

                	<div class="btn-toolbar">
	                    <a href="{{ route('admin.comments.index') }}" class="btn btn-primary" rel="tooltip" title="" data-original-title="{{ trans('cpanel::common.back') }}">
	                        <i class="icon-arrow-left"></i>
	                        {{ trans('cpanel::common.back') }}
	                    </a>
	                </div>

                    <h2 class="text-center">{{{ $comment->title }}}</h2>
                    {{ $comment->body }}

                </div> <!-- end of body -->

            </div> <!-- end of block -->

        </div>
    </div>

@stop