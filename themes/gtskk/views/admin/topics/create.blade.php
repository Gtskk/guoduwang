@extends('cpanel::layouts')

@section('style')
{{ HTML::style('packages/stevemo/cpanel/css/datepicker.css') }}
@stop

@section('header')
    <h3>
        <span class="glyphicon glyphicon-list-alt"></span>
        {{ trans('gtskk.Topics') }}
    </h3>
@stop

@section('content')

    <div class="row">
        <div class="span12">

            {{Former::open_for_files( route('admin.topics.store') )}}

            <div class="block">
                <p class="block-heading">{{ trans('cpanel::topics.create_post') }}</p>
                <div class="block-body">

                    <div class="tabbable">

                        <div class="tab-content">

                            <div class="tab-pane active" id="credentials">

                                <legend>{{ trans('cpanel::topics.create_legend1') }}</legend>
                                {{ Former::xlarge_text('title', trans('cpanel::topics.title'))->required() }}
                                {{ Former::xlarge_text('slug', trans('cpanel::topics.slug'))->required() }}
                                {{ Former::file('thumbnail', trans('cpanel::common.thumbnail'))->accept('image') }}
                                {{ Former::select('type', trans('cpanel::common.taxonomy'))->options(array('post' => trans('cpanel::topics.post'), 'new_act' => '最新活动', 'theme_act' => '主题活动'), $type)}}

                                <legend>{{ trans('cpanel::topics.create_legend2') }}</legend>
                                {{ Former::xlarge_text('pubdate', trans('cpanel::topics.pubdate'))->required()->id('datepick') }}

                                <legend>{{ trans('cpanel::topics.create_legend3') }}</legend>
                                {{ Former::textarea('body', trans('cpanel::topics.body'))->required()->id('post_body')->columns(50)->class('') }}

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">{{ trans('gtskk.Create New Topic') }}</button>
                                    <a href="{{route('admin.topics.index')}}" class="btn btn-primary">{{ trans('gtskk.Cancel') }}</a>
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
        orientation: "bottom auto"
    });


    var editor = new UE.ui.Editor();
    editor.render("post_body");
    //1.2.4以后可以使用一下代码实例化编辑器
    //UE.getEditor('myEditor')
</script>
@stop