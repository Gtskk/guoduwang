@extends('cpanel::layouts')

@section('header')
    <h3>
        <span class="glyphicon glyphicon-list-alt"></span>
        {{ lang('Members') }}
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
                                    <button class="btn btn-primary" type="button">Go!</button>
                                </div>
                            </form>

                            <a href="{{ route('admin.members.membersTrash') }}" class="navbar-right btn btn-lg btn-primary">{{ trans('cpanel::common.trash') }}</a>
                        </div>
                    </h3>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        @if(count($members))
                        <thead>
                        <tr>
                            <th>&nbsp;</th>
                            <th>{{ lang('Username') }}</th>
                            <th>{{ lang('Email') }}</th>
                            <th>{{ lang('Phone') }}</th>
                            <th>{{ lang('Avatar') }}</th>
                            <th>{{ lang('Total Topic Count') }}</th>
                            <th>{{ lang('Total Reply Count') }}</th>
                            <th>{{ trans('cpanel::common.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($members as $member)
                            <tr>
                                <td><input type="checkbox" name="delete[]" value="{{ $member->id }}" /></td>
                                <td>{{ HTML::linkRoute('members.show',e($member->username), array($member->id), array('target'=>'_blank')) }}</td>
                                <td>{{ HTML::mailto(e($member->username), e($member->username), array('target'=>'_blank')) }}</td>
                                <td>{{ $member->phone }}</td>
                                <td><img id="avatar-src" src="{{ $member->image_url or $member->present()->gravatar(50) }}" class="img-thumbnail users-show-avatar" style="width: 50px;margin: 4px 4px 15px;min-height:50px"></td>
                                <td>{{ $member->topic_count }}</td>
                                <td>{{ $member->reply_count }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-primary" href="{{ route('admin.members.destroy', array($member->id)) }}" data-method="delete" data-message="{{ trans('cpanel::common.delete_something', array('thing'=>lang('Members'))) }}">
                                           <i class="fa fa-trash-o"></i>&nbsp;{{ trans('cpanel::common.delete_something', array('thing'=>lang('Members'))) }}
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        @else
                            <tr>
                                <td>{{ lang('no_members') }}</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>

                <div class="panel-footer">
                    <!-- Pager -->
                    {{ $members->appends(Request::except('page', '_pjax'))->links(); }}

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="quanxuan" />
                            &nbsp;{{ trans('cpanel::common.allselect_or') }}
                        </label>
                        <label>
                            <input type="checkbox" id="fanxuan" />
                            &nbsp;{{ trans('cpanel::common.uncheck') }}
                        </label>

                        <a href="{{ route('admin.members.destroyMany') }}" data-method="delete" data-special="true" data-message="{{ trans('cpanel::common.delete_something', array('thing'=>lang('Members'))) }}" class="btn btn-primary">{{ trans('cpanel::common.bulk_delete') }}</a>
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