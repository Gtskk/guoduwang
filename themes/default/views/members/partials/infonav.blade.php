<ul class="nav nav-tabs user-info-nav" role="tablist">
	<li class="{{ $member->present()->userinfoNavActive('members.show') }}">
		<a href="{{ route('members.show', $member->id) }}" >{{ lang('Basic Info') }}</a>
	</li>
	<li class="{{ $member->present()->userinfoNavActive('members.replies') }}">
		<a href="{{ route('members.replies', $member->id) }}" >{{ lang('Replies') }}</a>
	</li>
	<li class="{{ $member->present()->userinfoNavActive('members.topics') }}">
		<a href="{{ route('members.topics', $member->id) }}" >{{ lang('Topics') }}</a>
	</li>
	<li class="{{ $member->present()->userinfoNavActive('members.favorites') }}">
		<a href="{{ route('members.favorites', $member->id) }}" >{{ lang('Favorites') }}</a>
	</li>
</ul>