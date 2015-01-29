<div style="text-align: center;">
	<a href="">
		<img src="{{ $member->present()->gravatar(180) }}" class="img-thumbnail users-show-avatar" style="width: 206px;margin: 4px 4px 15px;min-height:190px">
	</a>
</div>

<dl class="dl-horizontal">

	<dt><lable>&nbsp; </lable></dt><dd> {{ lang('User ID:') }} {{ $member->id }}</dd>

	<dt><label>Name:</label></dt><dd><strong>{{{ $member->name }}}</strong></dd>

	@if ($member->real_name)
		<dt class="adr"><label> {{ lang('Real Name') }}:</label></dt><dd><span class="org">{{{ $member->real_name }}}</span></dd>
	@endif

	<dt><label>Github:</label></dt>
	<dd>
		<a href="https://github.com/{{ $member->github_name }}" target="_blank">
			<i class="fa fa-github-alt"></i> {{ $member->github_name }}
		</a>
	</dd>

	@if ($member->company)
		<dt class="adr"><label> {{ lang('Company') }}:</label></dt><dd><span class="org">{{{ $member->company }}}</span></dd>
	@endif

	@if ($member->city)
		<dt class="adr"><label> {{ lang('City') }}:</label></dt><dd><span class="org"><i class="fa fa-map-marker"></i> {{{ $member->city }}}</span></dd>
	@endif

	@if ($member->twitter_account)
	<dt><label><span>Twitter</span>:</label></dt>
	<dd>
		<a href="https://twitter.com/{{ $member->twitter_account }}" rel="nofollow" class="twitter" target="_blank"><i class="fa fa-twitter"></i> {{{ '@' . $member->twitter_account }}}
		</a>
	</dd>
	@endif

	@if ($member->personal_website)
	<dt><label>{{ lang('Blog') }}:</label></dt>
	<dd>
		<a href="http://{{ $member->personal_website }}" rel="nofollow" target="_blank" class="url">
			<i class="fa fa-globe"></i> {{{ str_limit($member->personal_website, 25) }}}
		</a>
	</dd>
	@endif

	@if ($member->signature)
		<dt><label>{{ lang('Signature') }}:</label></dt><dd><span>{{{ $member->signature }}}</span></dd>
	@endif

	<dt>
		<label>Since:</label>
	</dt>
	<dd><span>{{ $member->created_at }}</span></dd>
</dl>
<div class="clearfix"></div>

@if ($currentUser && ($currentUser->id == $member->id || Entrust::can('manage_users')))
	<a class="btn btn-primary btn-block" href="{{ route('members.edit', $member->id) }}" id="user-edit-button">
		<i class="fa fa-edit"></i> {{ lang('Edit Profile') }}
	</a>
@endif

@if ($currentUser && Entrust::can('manage_users'))
	<a data-method="post" class="btn btn-{{ $member->is_banned ? 'warning' : 'danger' }} btn-block" href="javascript:void(0);" data-url="{{ route('members.blocking', $member->id) }}" id="user-edit-button" onclick=" return confirm('{{ lang('Are you sure want to block this User?') }}')">
		<i class="fa fa-times"></i> {{ $member->is_banned ? lang('Unblock User') : lang('Block User') }}
	</a>
@endif