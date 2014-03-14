@extends(Config::get('cpanel::views.layout'))

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

            {{ Former::open_for_files(route('admin.products.update', array($product->id)), 'PUT') }}

            <div class="block">
                <p class="block-heading">{{ trans('cpanel::common.edit_thing', array('name' => trans('cpanel::products.product'))) }}</p>
                <div class="block-body">

                    <div class="tabbable">

                        <div class="tab-content">

                            <div class="tab-pane active" id="credentials">

                                <legend>{{ trans('cpanel::products.create_legend1') }}</legend>
                                {{ Former::xlarge_text('brand', trans('cpanel::products.brand'), $product->brand) }}
                                {{ Former::xlarge_text('style', trans('cpanel::products.style'), $product->style) }}
                                {{ Former::xlarge_text('specification', trans('cpanel::products.specification'), $product->specification) }}
                                {{ Former::xlarge_text('process', trans('cpanel::products.process'), $product->process) }}
                                {{ Former::text('price', trans('cpanel::products.price'), $product->price) }}
                                {{ Former::text('unit', trans('cpanel::products.unit'), $product->unit) }}
                                {{ Former::file('thumbnail', trans('cpanel::common.thumbnail')) }}
                                @if($product->thumbnail)
                                <div class="control-group">
						            <div class="controls">
						                <a href="{{ asset($product->thumbnail) }}" target="_blank">
						                    <img src="{{asset($product->thumbnail)}}">
						                </a>
						            </div>            
						        </div>
						        @endif
                                {{ Former::inline_checkboxes('category', trans('cpanel::common.category'))->checkboxes(Category::getCategories())->check($cats) }}
                                {{ Former::select('top_status', trans('cpanel::products.top'))->options(array('否', '是'), $product->top_status) }}
                                {{ Former::file('top_img', trans('cpanel::products.top_img')) }}
                                @if($product->top_img)
                                <div class="control-group">
                                    <div class="controls">
                                        <a href="{{ asset($product->top_img) }}" target="_blank">
                                            <img src="{{asset($product->top_img)}}">
                                        </a>
                                    </div>            
                                </div>
                                @endif
                                {{ Former::xlarge_text('created_at', trans('cpanel::posts.pubdate'), date('Y-m-d', strtotime($product->created_at)))->class('datepick') }}

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">{{ trans('cpanel::common.update') }}</button>
                                    <a href="{{ route('admin.products.index') }}" class="btn btn-primary">{{ trans('cpanel::common.cancel') }}</a>
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
    $('.datepick').datepicker({
        language: "zh-CN",
        autoclose: true,
        format: 'yyyy-mm-dd',
        orientation: "bottom auto",
    });
</script>
@stop