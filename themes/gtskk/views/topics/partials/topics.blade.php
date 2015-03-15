@if (count($topics))

<ul class="list-group row @if($column)topic-list @endif">
    @foreach ($topics as $topic)
    <li class="list-group-item media {{ !$column ?:'col-sm-6'; }}" style="margin-top: 0px;">

        <a class="pull-right" href="{{ route('topics.show', [$topic->id]) }}" >
            <span class="badge badge-reply-count"> {{ $topic->reply_count }} </span>
        </a>

        <div class="avatar pull-left">
            <a href="{{ route('members.show', [$topic->member_id]) }}">
                <img class="media-object img-thumbnail avatar" alt="{{{ $topic->member->username }}}" src="{{ $topic->member->image_url }}"  style="width:48px;height:48px;"/>
            </a>
        </div>

        <div class="infos">

            <div class="media-heading">
                @if ($topic->is_excellent)
                <span class="label label-danger">{{ lang('recommend') }}</span>
                @endif
                @if ($topic->order > 0 && !Input::get('filter'))
                <span class="label label-success">{{ lang('top') }}</span>
                @endif
                <a href="{{ route('topics.show', [$topic->id]) }}" title="{{{ $topic->title }}}">
                    {{{ $topic->title }}}
                </a>
            </div>
            <div class="media-body meta">

                @if ($topic->vote_count > 0)
                    <a href="{{ route('topics.show', [$topic->id]) }}" class="remove-padding-left" id="pin-{{ $topic->id }}">
                        <span class="fa fa-thumbs-o-up"> {{ $topic->vote_count }} </span>
                    </a>
                    <span> •  </span>
                @endif

                <a href="{{ route('nodes.show', [$topic->node->id]) }}" title="{{{ $topic->node->name }}}" {{ $topic->vote_count == 0 || 'class="remove-padding-left"'}}>
                    {{{ $topic->node->name }}}
                </a>

                @if ($topic->reply_count == 0)
                    <span> • </span>
                    <a href="{{ route('members.show', [$topic->user_id]) }}" title="{{{ $topic->member->username }}}">
                        {{{ $topic->member->username }}}
                    </a>
                    <span> • </span>
                    <span class="timeago">{{ $topic->created_at }}</span>
                @endif

                @if ($topic->reply_count > 0 && count($topic->lastReplyUser))
                    <span> • </span>{{ lang('Last Reply by') }}
                    <a href="{{{ URL::route('members.show', [$topic->lastReplyUser->id]) }}}">
                      {{{ $topic->lastReplyUser->username }}}
                    </a>
                    <span> • </span>
                    <span class="timeago">{{ $topic->updated_at }}</span>
                @endif
            </div>

        </div>

    </li>
    @endforeach
</ul>

@else
   <div class="empty-block">{{ lang('Dont have any data Yet') }}~~</div>
@endif