@extends(Config::get('cpanel::views.layout'))

@section('style')
{{ HTML::style('packages/stevemo/cpanel/css/datepicker.css') }}
@stop

@section('header')
    <h3>
        <span class="glyphicon glyphicon-list-alt"></span>
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
        <div class="col-md-12">

            {{Former::open_for_files( route('admin.posts.update', array($post->id)), 'PUT')}}

            <div class="block">
                <p class="block-heading">{{ trans('cpanel::common.edit_thing', array('name' => trans('cpanel::posts.post'))) }}</p>
                <div class="block-body">

                    <div class="tabbable">

                        <div class="tab-content">

                            <div class="tab-pane active" id="credentials">

                                <legend>{{ trans('cpanel::posts.create_legend1') }}</legend>
                                {{ Former::xlarge_text('title', trans('cpanel::posts.title'), $post->title)->required() }}
                                {{ Former::xlarge_text('slug', trans('cpanel::posts.slug'), $post->slug)->required() }}
                                {{ Former::file('thumbnail', trans('cpanel::common.thumbnail'))->accept('image') }}
                                @if($post->thumbnail)
                                <div class="control-group">
                                    <div class="controls">
                                        <a href="{{ asset($post->thumbnail) }}" target="_blank">
                                            <img src="{{asset($post->thumbnail)}}">
                                        </a>
                                    </div>            
                                </div>
                                @endif
                                {{ Former::select('type', trans('cpanel::common.taxonomy'))->options(array('post' => trans('cpanel::posts.post'), 'new_act' => '最新活动', 'theme_act' => '主题活动'), $post->type)}}

                                <legend>{{ trans('cpanel::posts.create_legend2') }}</legend>
                                {{ Former::xlarge_text('pubdate', trans('cpanel::posts.pubdate'), date('Y-m-d', strtotime($post->pubdate)))->required()->id('datepick') }}

                                <legend>{{ trans('cpanel::posts.create_legend3') }}</legend>
                                {{ Former::textarea('body', trans('cpanel::posts.body'), $post->body)->required()->id('post_body')->columns(50)->class('') }}

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">{{ trans('cpanel::common.update') }}</button>
                                    <a href="{{route('admin.posts.index')}}" class="btn btn-primary">{{ trans('cpanel::common.cancel') }}</a>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>

            {{Former::close()}}

        </div>
    </div>

@stop

@section('script')
{{ HTML::script('packages/stevemo/cpanel/js/bootstrap-datepicker.js') }}
{{ HTML::script('packages/stevemo/cpanel/js/bootstrap-datepicker.zh-CN.js') }}
<script type="text/javascript">
    $('#datepick').datepicker({
        language: "zh-CN",
        autoclose: true,
        format: 'yyyy-mm-dd',
        orientation: "bottom auto",
    });


    var editor = new UE.ui.Editor();
    editor.render("post_body");
    //1.2.4以后可以使用一下代码实例化编辑器
    //UE.getEditor('myEditor')
</script>
@stop