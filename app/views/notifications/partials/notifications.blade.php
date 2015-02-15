<ul class="list-group">
    @foreach ($tempData as $notification)
    <li class="list-group-item media" style="margin-top: 0px;">

        @if (count($notification->topic))
            <div class="media-left">
                <a href="{{ route('members.show', [$notification->from_member_id]) }}">
                    <img class="media-object" alt="{{{ $notification->fromMember->username }}}" src="{{ $notification->fromMember->img_url or $notification->fromMember->present()->gravatar }}"  style="width:38px;height:38px;"/>
                </a>
            </div>

            <div class="media-body">

              	<div class="media-heading">

                	<a href="{{ route('members.show', [$notification->from_member_id]) }}">
                    	{{{ $notification->fromMember->username }}}
                	</a>
                 	•
                	{{ $notification->present()->lableUp }}

                	<a href="{{ route('topics.show', [$notification->topic->id]) }}{{{ !empty($notification->reply_id) ? '#reply' . $notification->reply_id : '' }}}" title="{{{ $notification->topic->title }}}">
                    	{{{ str_limit($notification->topic->title, '100') }}}
                	</a>

                	<span class="meta">
                     	• {{ lang('at') }} • <span class="timeago">{{ $notification->created_at }}</span>
                	</span>
              	</div>
              	<div class="markdown-reply">
					{{ $notification->body }}
              	</div>

            </div>

            <div class="media-right">
		        <button data-method="delete" class="btn btn-default" title="{{ lang('Delete') }}" data-toggle="tooltip" data-placement="left" data-url="{{ route('notifications.destroy', $notification->id) }}">
		            <span class="glyphicon glyphicon-remove"></span>
		        </button>
            </div>

        @else
          	<div class="media-body">{{ lang('Data has been deleted.') }}</div>
          	<div class="media-right">
          		<button data-method="delete" class="btn btn-default" title="{{ lang('Delete') }}" data-toggle="tooltip" data-placement="left" data-url="{{ route('notifications.destroy', $notification->id) }}">
          		    <span class="glyphicon glyphicon-remove"></span>
          		</button>
          	</div>
        @endif
    </li>
    @endforeach
</ul>