@extends('cpanel::layouts')

@section('header')
    <h3>
        <span class="glyphicon glyphicon-trash"></span>
        {{ trans('cpanel::common.thing_trash', array('thing'=>lang('Topics'))) }}
    </h3>
@stop

@section('content')

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <div class="btn-toolbar">
                            <form action="" class="navbar-form navbar-left" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="{{ trans('cpanel::common.search_for') }}...">
                                </div>
                                <button class="btn btn-primary" type="button">Go!</button>
                            </form>
                        </div>
                    </h3>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        @if(count($topics))
                        <thead>
                        <tr>
                            <th>&nbsp;</th>
                            <th>{{ trans('cpanel::topics.title') }}</th>
                            <th>{{ trans('cpanel::topics.excerpt') }}</th>
                            <th>{{ trans('cpanel::topics.node') }}</th>
                            <th>{{ trans('cpanel::topics.author') }}</th>
                            <th>{{ trans('cpanel::topics.is_excellent') }}</th>
                            <th>{{ trans('cpanel::topics.reply_count') }}</th>
                            <th>{{ trans('cpanel::topics.view_count') }}</th>
                            <th>{{ trans('cpanel::topics.favorite_count') }}</th>
                            <th>{{ trans('cpanel::topics.vote_count') }}</th>
                            <th>{{ trans('cpanel::common.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($topics as $topic)
                            <tr>
                                <td><input type="checkbox" name="delete[]" value="{{ $topic->id }}" /></td>
                                <td>{{{ $topic->title }}}</td>
                                <td title="{{{ $topic->excerpt }}}">{{{ str_limit($topic->excerpt, 20) }}}</td>
                                <td>{{ HTML::linkRoute('nodes.show',e($topic->node->name), array($topic->node->id), array('target'=>'_blank')) }}</td>
                                <td>{{ $topic->member->username }}</td>
                                <td>{{ $topic->is_excellent ? '是' : '否' }}</td>
                                <td>{{ $topic->reply_count }}</td>
                                <td>{{ $topic->view_count }}</td>
                                <td>{{ $topic->favorite_count }}</td>
                                <td>{{ $topic->vote_count }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-primary" href="{{ route('admin.topics.restore', array($topic->id)) }}" data-method="put" data-message="{{ trans('cpanel::common.restore') }}？">
                                           <i class="fa fa-trash-o"></i>&nbsp;{{ trans('cpanel::common.restore') }}
                                        </a>
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

                <div class="panel-footer">
                    <!-- Pager -->
                    {{ $topics->appends(Request::except('page', '_pjax'))->links(); }}

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="quanxuan" />
                            &nbsp;{{ trans('cpanel::common.allselect_or') }}
                        </label>
                        <label>
                            <input type="checkbox" id="fanxuan" />
                            &nbsp;{{ trans('cpanel::common.uncheck') }}
                        </label>

                        <a href="{{ route('admin.topics.restoreMany') }}" data-method="delete" data-special="true" data-message="{{ trans('cpanel::common.restore_something', array('thing'=>lang('Topics'))) }}" class="btn btn-primary">{{ trans('cpanel::common.bulk_restore') }}</a>
                    </div>

                </div>
            </div>

        </div>
    </div>

@stop

@section('javascript')
<script type="text/javascript">
    $(document).ready(function()
    {
        var deletes = $("input[name='delete[]']");
        // 全选或者全不选
        $('#quanxuan').on('ifChanged', function(){
            if($(this).prop("checked") === true)
            { //全选
                deletes.each(function()
                {
                    $(this).iCheck('check');
                });
            }
            else
            {// 全不选
                deletes.each(function()
                {
                    $(this).iCheck("uncheck");
                });
            }
        });

        // 反选
        $('#fanxuan').on('ifChanged', function(){
            deletes.each(function(){
                if($(this).prop('checked') === true)
                {
                    $(this).iCheck('uncheck');
                }
                else
                {
                    $(this).iCheck('check');
                }
            });
        });
    });
    
</script>
@stop