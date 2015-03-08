@extends(Config::get('cpanel::views.layout'))

@section('header')
    <h3>
        <i class="icon-post"></i>
        {{ trans('cpanel::posts.column_text') }}
    </h3>
@stop

@section('help')
    <p class="lead">{{ trans('cpanel::posts.column_text') }}</p>
    <p>
        {{ trans('cpanel::posts.help_info') }}
    </p>
@stop

@section('content')

    <div class="row">
        <div class="span12">

            <div class="block">

                <p class="block-heading">{{ trans('cpanel::posts.column_text') }}</p>

                <div class="block-body">

                	<div class="btn-toolbar">
	                    <a href="{{ route('admin.posts.index', array('type' => $type)) }}" class="btn btn-primary" rel="tooltip" title="" data-original-title="{{ trans('cpanel::common.back') }}">
	                        <i class="icon-arrow-left"></i>
	                        {{ trans('cpanel::common.back') }}
	                    </a>
	                </div>

                    <h2 class="text-center">{{{ $post->title }}}</h2>
                    {{ $post->body }}

                </div> <!-- end of body -->

            </div> <!-- end of block -->

        </div>
    </div>

@stop