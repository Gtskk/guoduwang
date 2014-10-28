@extends(Config::get('cpanel::views.layout'))

@section('header')
    <h3>
        <span class="glyphicon glyphicon-comment"></span>
        {{ trans('cpanel::comments.column_text') }}
    </h3>
@stop

@section('help')
    <p class="lead">{{ trans('cpanel::comments.column_text') }}</p>
    <p>
        {{ trans('cpanel::comments.help_info') }}
    </p>
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">

            <div class="block">
                <p class="block-heading">{{ trans('cpanel::comments.column_text') }}</p>

                <div class="block-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            @if(count($comments))
                            <thead>
                                <tr>
                                    <th>{{ trans('cpanel::comments.name') }}</th>
                                    <th>{{ trans('cpanel::users.email') }}</th>
                                    <th>{{ trans('cpanel::comments.phone') }}</th>
                                    <th>{{ trans('cpanel::common.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($comments as $comment)
                                <tr>
                                    <td>{{ HTML::linkRoute('admin.comments.show',e($comment->name), array($comment->id)) }}</td>
                                    <td>{{ $comment->email }}</td>
                                    <td>{{ $comment->phone }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
                                                {{ trans('cpanel::common.action') }}
                                                <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="{{ route('admin.comments.show', array($comment->id)) }}">
                                                        <i class="icon-info-sign"></i>&nbsp;{{ trans('cpanel::common.view_thing', array('name' => trans('cpanel::comments.comment'))) }}
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('admin.comments.destroy', array($comment->id)) }}"
                                                       data-method="delete"
                                                       data-modal-text="{{ trans('cpanel::common.delete_ensure', array('name' => trans('cpanel::comments.comment'))) }}">
                                                       <i class="icon-trash"></i>&nbsp;{{ trans('cpanel::common.delete_thing', array('name' => trans('cpanel::comments.comment'))) }}
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
                                    <td>{{ trans('cpanel::comments.no_comments') }}</td>
                                </tr>
                            @endif
                        </table>

                    </div> <!-- end of table -->
                </div>

            </div> <!-- end of block -->

        </div>
    </div>

@stop