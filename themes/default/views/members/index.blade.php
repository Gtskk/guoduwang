@extends('theme::layouts.main')

@section('content')
<!--con-->
<div class="container">
	<div class="panel panel-default">

	    <div class="panel-heading text-center">
	        {{ lang('Newly Registered User List') }} ( {{ lang('Total User') }} {{ $siteStat->member_count }} )
	    </div>

	    <div class="panel-body">
	    @foreach ($members as $member)
	        <div class="col-md-1 remove-padding-right">
	            <div class="avatar">
	              	<a href="{{ route('members.show', $member->id) }}">
	                	<img src="{{ $member->present()->gravatar }}" class="img-thumbnail avatar"  style="width:48px;height:48px;margin-bottom: 20px;"/>
	              	</a>
	            </div>
	        </div>
	    @endforeach
	    </div>

	</div>	
</div>
@overwrite