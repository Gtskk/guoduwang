@extends('cpanel::layouts')

@section('header')
    <h3>
        <span class="glyphicon glyphicon-list-alt"></span>
        {{ trans('gtskk.Topics') }}
    </h3>
@stop

@section('content')

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <div class="btn-toolbar">
                            <a href="{{ route('admin.topics.create') }}" class="btn btn-primary"
                               data-toggle="tooltip" title="{{ trans('gtskk.New Topic') }}">
                                <i class="fa fa-plus"></i>
                                {{ trans('gtskk.New Topic') }}
                            </a>
                        </div>
                    </h3>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        @if(count($topics))
                        <thead>
                        <tr>
                            <th>{{ trans('common.name') }}</th>
                            <th class="hidden-xs">{{ trans('common.email') }}</th>
                            <th class="hidden-xs">{{ trans('cpanel::users.active') }}</th>
                            <th class="hidden-xs">{{ trans('cpanel::users.joined') }}</th>
                            <th class="hidden-xs">{{ trans('cpanel::users.last_visit') }}</th>
                            <th>{{ trans('cpanel::common.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($topics as $topic)
                            <tr>
                                <td>{{ HTML::linkRoute('admin.topics.show',e($topic->title), array($topic->id)) }}</td>
                                <td>{{{ $topic->slug }}}</td>
                                <td>{{ date('Y-m-d', strtotime($topic->pubdate)) }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
                                            {{ trans('cpanel::common.action') }}
                                            <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{ route('admin.topics.show', array($topic->id, 'type' => $type)) }}">
                                                    <i class="icon-info-sign"></i>&nbsp;{{ trans('cpanel::common.view_thing', array('name' => trans('cpanel::topics.topic'))) }}
                                                </a>
                                            </li>
                                            <li>
                                               <a href="{{ route('admin.topics.edit', array($topic->id, 'type' => $type)) }}">
                                                   <i class="icon-edit"></i>&nbsp;{{ trans('cpanel::common.edit_thing', array('name' => trans('cpanel::topics.topic'))) }}
                                               </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('admin.topics.destroy', array($topic->id)) }}"
                                                   data-method="delete"
                                                   data-modal-text="{{ trans('cpanel::common.delete_ensure', array('name' => trans('cpanel::topics.topic'))) }}">
                                                   <i class="icon-trash"></i>&nbsp;{{ trans('cpanel::common.delete_thing', array('name' => trans('cpanel::topics.topic'))) }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        @else
                            <tr>
                                <td>{{ trans('gtskk.no_topics') }}</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

@stop