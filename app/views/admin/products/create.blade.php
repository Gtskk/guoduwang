@extends(Config::get('cpanel::views.layout'))

@section('style')
{{ HTML::style('packages/stevemo/cpanel/css/datepicker.css') }}
@stop

@section('header')
    <h3>
        <i class="icon-product"></i>
        {{ trans('cpanel::products.column_text') }}
    </h3>
@stop

@section('help')
    <p class="lead">{{ trans('cpanel::products.column_text') }}</p>
    <p>
        {{ trans('cpanel::products.help_info') }}
    </p>
@stop

@section('content')

    <div class="row">
        <div class="span12">

            {{Former::open_for_files( route('admin.products.store') )}}

            <div class="block">
                <p class="block-heading">{{ trans('cpanel::products.create_product') }}</p>
                <div class="block-body">

                    <div class="tabbable">

                        <div class="tab-content">

                            <div class="tab-pane active" id="credentials">

                                <legend>{{ trans('cpanel::products.create_legend1') }}</legend>
                                {{ Former::xlarge_text('brand', trans('cpanel::products.brand')) }}
                                {{ Former::xlarge_text('style', trans('cpanel::products.style')) }}
                                {{ Former::xlarge_text('specification', trans('cpanel::products.specification')) }}
                                {{ Former::xlarge_text('process', trans('cpanel::products.process')) }}
                                {{ Former::text('price', trans('cpanel::products.price')) }}
                                {{ Former::text('unit', trans('cpanel::products.unit')) }}
                                {{ Former::file('thumbnail', trans('cpanel::common.thumbnail')) }}
                                {{ Former::inline_checkboxes('category', trans('cpanel::common.category'))->checkboxes(Category::getCategories()) }}
                                {{ Former::select('top_status', trans('cpanel::products.top'))->options(array('否', '是'), 0) }}
                                {{ Former::file('top_img', trans('cpanel::products.top_img')) }}
                                {{ Former::xlarge_text('created_at', trans('cpanel::posts.pubdate'), date('Y-m-d'))->id('datepick') }}

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">{{ trans('cpanel::common.create') }}</button>
                                    <a href="{{route('admin.products.index')}}" class="btn btn-primary">{{ trans('cpanel::common.cancel') }}</a>
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
        todayHighlight: true
    });
</script>
@stop