<ul class="list-group row">

	@foreach ($replies as $index => $reply)
	 <li class="list-group-item media" style="margin-top: 0px;">

		<div class="avatar pull-left">
			<a href="{{ route('members.show', [$reply->user_id]) }}">
				<img class="media-object img-thumbnail avatar" alt="{{{ $reply->member->username }}}" src="{{ $reply->member->present()->gravatar }}"  style="width:48px;height:48px;"/>
			</a>
		</div>

		<div class="infos">

			<div class="media-heading meta">

				<a href="{{ route('members.show', [$reply->user_id]) }}" title="{{{ $reply->member->username }}}" class="remove-padding-left author">
						{{{ $reply->member->username }}}
				</a>
				<span> •  </span>
				<abbr class="timeago" title="{{ $reply->created_at }}">{{ $reply->created_at }}</abbr>
				<span> •  </span>
				<a name="reply{{ $reply->id }}" class="anchor" href="#reply{{ $reply->id }}" aria-hidden="true">#{{ $reply->id }}</a>

				<span class="operate pull-right">
					<a data-method="post" id="reply-up-vote-{{ $reply->id }}" href="javascript:void(0);" data-url="{{ route('replies.vote', $reply->id) }}" title="{{ lang('Vote Up') }}">
						 <i class="fa fa-thumbs-o-up" style="font-size:14px;"></i> <span>{{ $reply->vote_count ?: '' }}</span>
					</a>
					<span> •  </span>

					@if ($currentUser && ($currentUser->can("manage_topics") || $currentUser->id == $reply->member_id) )
						<a id="reply-delete-{{ $reply->id }}" data-method="delete"  href="javascript:void(0);" data-url="{{ route('replies.destroy', [$reply->id]) }}" title="{{ lang('Delete') }}">
								<i class="fa fa-trash-o"></i>
						</a>
						<span> •  </span>
					@endif
					<a class="fa fa-reply" href="javascript:void(0)" onclick="replyOne('{{{ $reply->member->username }}}');" title="回复 {{{ $reply->member->username }}}"></a>
				</span>

			</div>

			<div class="media-body markdown-reply content-body">
				{{ $reply->body }}
			</div>

		</div>

	</li>
	@endforeach

</ul>