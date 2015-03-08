@extends('cpanel::layouts')

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

            <div class="block">
                <p class="block-heading">{{ trans('cpanel::posts.column_text') }}</p>

                <div class="block-body">

                    <div class="btn-toolbar">
                        <a href="{{ route('admin.posts.create', array('type' => $type)) }}" class="btn btn-primary" rel="tooltip" title="{{ trans('cpanel::common.new_thing', array('name' => trans('cpanel::posts.post')))}}">
                            <i class="icon-plus"></i>
                            {{ trans('cpanel::common.new_thing', array('name' => trans('cpanel::posts.post')))}}
                        </a>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            @if(count($posts))
                            <thead>
                                <tr>
                                    <th>{{ trans('cpanel::posts.title') }}</th>
                                    <th>{{ trans('cpanel::posts.slug') }}</th>
                                    <th>{{ trans('cpanel::posts.pubdate') }}</th>
                                    <th>{{ trans('cpanel::common.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ HTML::linkRoute('admin.posts.show',e($post->title), array($post->id)) }}</td>
                                    <td>{{{ $post->slug }}}</td>
                                    <td>{{ date('Y-m-d', strtotime($post->pubdate)) }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
                                                {{ trans('cpanel::common.action') }}
                                                <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="{{ route('admin.posts.show', array($post->id, 'type' => $type)) }}">
                                                        <i class="icon-info-sign"></i>&nbsp;{{ trans('cpanel::common.view_thing', array('name' => trans('cpanel::posts.post'))) }}
                                                    </a>
                                                </li>
                                                <li>
                                                   <a href="{{ route('admin.posts.edit', array($post->id, 'type' => $type)) }}">
                                                       <i class="icon-edit"></i>&nbsp;{{ trans('cpanel::common.edit_thing', array('name' => trans('cpanel::posts.post'))) }}
                                                   </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('admin.posts.destroy', array($post->id)) }}"
                                                       data-method="delete"
                                                       data-modal-text="{{ trans('cpanel::common.delete_ensure', array('name' => trans('cpanel::posts.post'))) }}">
                                                       <i class="icon-trash"></i>&nbsp;{{ trans('cpanel::common.delete_thing', array('name' => trans('cpanel::posts.post'))) }}
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
                                    <td>{{ trans('cpanel::posts.no_posts') }}</td>
                                </tr>
                            @endif
                        </table>

                    </div> <!-- end of table -->
                    </div>

            </div> <!-- end of block -->

        </div>
    </div>

@stop