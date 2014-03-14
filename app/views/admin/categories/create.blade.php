@extends(Config::get('cpanel::views.layout'))

@section('header')
    <h3>
        <span class="glyphicon glyphicon-book"></span>
        {{ trans('cpanel::common.category') }}
    </h3>
@stop

@section('help')
    <p class="lead">{{ trans('cpanel::common.category') }}</p>
    <p>
        {{ trans('cpanel::products.help_info') }}
    </p>
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">

            {{ Former::open_for_files( route('admin.categories.store') )->setAttribute('role', 'form') }}

            <div class="block">
                <p class="block-heading">{{ trans('cpanel::common.new_thing', array('name' => trans('cpanel::common.category'))) }}</p>
                <div class="block-body">

                    <div class="tabbable">

                        <div class="tab-content">

                            <div class="tab-pane active" id="credentials">

                                <legend>{{ trans('cpanel::common.category_info') }}</legend>
                                {{ Former::xlarge_text('name', trans('cpanel::common.name'))->required() }}
                                {{ Former::xlarge_text('sort', trans('cpanel::common.sort'))->required() }}
                                {{ Former::file('thumbnail', trans('cpanel::common.thumbnail')) }}
                                {{ Former::files('slides', trans('cpanel::common.slides')) }}
                                {{ Former::select('taxonomy', trans('cpanel::common.taxonomy'))->options(array('product' => trans('cpanel::products.product'), 'test' => '测试')) }}
                                {{ Former::select('parent', trans('cpanel::common.parent'))->fromQuery(Category::getCategories()) }}

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">{{ trans('cpanel::common.create') }}</button>
                                    <a href="{{route('admin.categories.index')}}" class="btn btn-primary">{{ trans('cpanel::common.cancel') }}</a>
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