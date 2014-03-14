@extends(Config::get('cpanel::views.layout'))

@section('header')
    <h3>
        <span class="glyphicon glyphicon-book"></span>
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
        <div class="col-md-12">

            <div class="block">
                <p class="block-heading">{{ trans('cpanel::products.column_text') }}</p>

                <div class="block-body">

                    <div class="btn-toolbar">
                        <a href="{{ route('admin.products.create') }}" class="btn btn-primary" rel="tooltip" title="{{ trans('cpanel::common.new_thing', array('name' => trans('cpanel::products.product')))}}">
                            <i class="icon-plus"></i>
                            {{ trans('cpanel::common.new_thing', array('name' => trans('cpanel::products.product')))}}
                        </a>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            @if(count($products))
                            <thead>
                                <tr>
                                    <th>{{ trans('cpanel::products.brand') }}</th>
                                    <th>{{ trans('cpanel::products.style') }}</th>
                                    <th>{{ trans('cpanel::products.specification') }}</th>
                                    <th>{{ trans('cpanel::products.process') }}</th>
                                    <th>{{ trans('cpanel::products.price') }}</th>
                                    <th>{{ trans('cpanel::common.thumbnail') }}</th>
                                    <th>{{ trans('cpanel::common.category') }}</th>
                                    <th>{{ trans('cpanel::products.top') }}</th>
                                    <th>{{ trans('cpanel::products.top_img') }}</th>
                                    <th>{{ trans('cpanel::common.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->brand }}</td>
                                    <td>{{ $product->style }}</td>
                                    <td>{{ $product->specification }}</td>
                                    <td>{{ $product->process }}</td>
                                    <td>@currency(floatval($product->price))</td>
                                    <td>{{ $product->thumbnail ? '<img src="\\'.$product->thumbnail.'" alt="图片">' : '无' }}</td>
                                    @if(count(Product::find($product->id)->categories))
                                    <td>
                                        <ul class="nav">
                                            @foreach (Product::find($product->id)->categories as $cat)
                                            <li>{{ $cat->name }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    @else
                                    <td>无</td>
                                    @endif
                                    <td>{{ $product->top_status== 0 ? '否' : '是' }}</td>
                                    <td>{{ $product->top_img ? '<img src="\\'.$product->top_img.'" alt="图片">' : '无' }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
                                                {{ trans('cpanel::common.action') }}
                                                <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                   <a href="{{ route('admin.products.edit', array($product->id)) }}">
                                                       <i class="icon-edit"></i>&nbsp;{{ trans('cpanel::common.edit_thing', array('name' => trans('cpanel::products.product'))) }}
                                                   </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('admin.products.destroy', array($product->id)) }}"
                                                       data-method="delete"
                                                       data-modal-text="{{ trans('cpanel::common.delete_ensure', array('name' => trans('cpanel::users.user'))) }}">
                                                       <i class="icon-trash"></i>&nbsp;{{ trans('cpanel::common.delete_thing', array('name' => trans('cpanel::products.product'))) }}
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
                                    <td>{{ trans('cpanel::products.no_products') }}</td>
                                </tr>
                            @endif
                        </table>
                    </div>

                    <!-- page -->
                    {{ $products->links() }}

                </div> <!-- end of body -->

            </div> <!-- end of block -->

        </div>
    </div>

@stop