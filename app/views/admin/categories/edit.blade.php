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

            {{ Former::open_for_files(route('admin.categories.update', array($category->id)), 'PUT') }}

            <div class="block">
                <p class="block-heading">{{ trans('cpanel::common.edit_thing', array('name' => trans('cpanel::common.category'))) }}</p>
                <div class="block-body">

                    <div class="tabbable">

                        <div class="tab-content">

                            <div class="tab-pane active" id="credentials">

                                <legend>{{ trans('cpanel::common.category_info') }}</legend>
                                {{ Former::xlarge_text('name', trans('cpanel::common.name'), $category->name)->required() }}
                                {{ Former::xlarge_text('sort', trans('cpanel::common.sort'), $category->sort)->required() }}
                                {{ Former::file('thumbnail', trans('cpanel::common.thumbnail')) }}
                                @if($category->thumbnail)
                                <div class="form-group">
                                    <div class="col-sm-10 col-sm-offset-2">
                                        <a href="{{ asset($category->thumbnail) }}" target="_blank">
                                            <img src="{{asset($category->thumbnail)}}">
                                        </a>
                                    </div>            
                                </div>
                                @endif
                                {{ Former::files('slides', trans('cpanel::common.slides')) }}
                                @if($category->slides)
                                <div class="form-group">
                                    <div class="col-sm-10 col-sm-offset-2">
                                        @foreach(unserialize($category->slides) as $slide)
                                        <a href="{{ asset($slide) }}" target="_blank">
                                            <img src="{{ asset(str_replace('full', '50x14', $slide)) }}">
                                        </a>
                                        @endforeach
                                    </div>            
                                </div>
                                @endif
                                {{ Former::select('taxonomy', trans('cpanel::common.taxonomy'))->options(array('product' => trans('cpanel::products.product'), 'test' => '测试'), $category->taxonomy) }}
                                {{ Former::select('parent', trans('cpanel::common.parent'))->fromQuery(Category::getCategories(array($category->id)))->select($category->parent) }}

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">{{ trans('cpanel::common.update') }}</button>
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