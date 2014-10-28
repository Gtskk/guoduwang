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

            <div class="block">
                <p class="block-heading">{{ trans('cpanel::common.category') }}</p>

                <div class="block-body">

                    <div class="btn-toolbar">
                        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary" rel="tooltip" title="{{ trans('cpanel::common.new_thing', array('name' => trans('cpanel::common.category'))) }}">
                            <i class="icon-plus"></i>
                            {{ trans('cpanel::common.new_thing', array('name' => trans('cpanel::common.category'))) }}
                        </a>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            @if(count($categories))
                            <thead>
                                <tr>
                                    <th>{{ trans('cpanel::common.id') }}</th>
                                    <th>{{ trans('cpanel::common.name') }}</th>
                                    <th>{{ trans('cpanel::common.parent') }}</th>
                                    <th>{{ trans('cpanel::common.thumbnail') }}</th>
                                    <th>{{ trans('cpanel::common.slides') }}</th>
                                    <th>{{ trans('cpanel::common.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{{ $category->id }}}</td>
                                    <td>{{{ $category->name }}}</td>
                                    <td>{{{ Category::find($category->parent) ? Category::find($category->parent)->name : '无' }}}</td>
                                    <td>{{ $category->thumbnail ? '<img src="\\'.$category->thumbnail.'" alt="图片">' : '无' }}</td>
                                    @if(unserialize($category->slides))
                                    <td>
                                        <ul>
                                            @foreach (unserialize($category->slides) as $slide)
                                            <li><img src="{{ asset(str_replace('full', '50x14', $slide)) }}" alt="图像"></li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    @else
                                    <td>无</td>
                                    @endif
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
                                                {{ trans('cpanel::common.action') }}
                                                <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                   <a href="{{ route('admin.categories.edit', array($category->id)) }}">
                                                       <i class="icon-edit"></i>&nbsp;{{ trans('cpanel::common.edit_thing', array('name' => trans('cpanel::common.category'))) }}
                                                   </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('admin.categories.destroy', array($category->id)) }}"
                                                       data-method="delete"
                                                       data-modal-text="{{ trans('cpanel::common.delete_ensure', array('name' => trans('cpanel::users.user'))) }}">
                                                       <i class="icon-trash"></i>&nbsp;{{ trans('cpanel::common.delete_thing', array('name' => trans('cpanel::common.category'))) }}
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            @else
                                <tr>
                                    <td>{{ trans('cpanel::common.no_categories') }}</td>
                                </tr>
                            @endif
                        </table>
                    </div>

                    <!-- page -->
                    {{ $categories->links() }}

                </div> <!-- end of body -->

            </div> <!-- end of block -->

        </div>
    </div>

@stop