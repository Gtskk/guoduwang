@extends('theme::layouts.main')

@section('content')

<div class="users-show">

	<div class="col-md-3 box" style="padding: 15px 15px;">
		@include('theme::members.partials.basicinfo')
	</div>

	<div class="main-col col-md-9 left-col">

		<div class="panel panel-default">

			<div class="panel-body ">

				<!-- <div class="alert alert-warning">
					{{ lang('avatar_notice') }}
				</div> -->

				@include('theme::layouts.errors')

				{{ Form::model($member, ['route' => ['members.update', $member->id], 'method' => 'patch']) }}

					<div class="form-group">
						{{ Form::text('real_name', null, ['class' => 'form-control', 'placeholder' => lang('Real Name')]) }}
					</div>

					<div class="form-group">
						{{ Form::text('github_name', null, ['class' => 'form-control', 'placeholder' => lang('Github Name')]) }}
					</div>

					<div class="form-group">
						{{ Form::text('city', null, ['class' => 'form-control', 'placeholder' => lang('City')]) }}
					</div>

					<div class="form-group">
						{{ Form::text('company', null, ['class' => 'form-control', 'placeholder' => lang('Company')]) }}
					</div>

					<div class="form-group">
						{{ Form::text('personal_website', null, ['class' => 'form-control', 'placeholder' => lang('personal_website_placebolder')]) }}
					</div>

					<div class="form-group">
						{{ Form::textarea('signature', null, [
							'class' => 'form-control',
							'rows' => 3,
							'placeholder' => lang('signature_placeholder')
							]) }}
					</div>

					<div class="form-group">
						{{ Form::textarea('introduction', null, [
							'class' => 'form-control',
							'rows' => 3,
							'placeholder' => lang('introduction_placeholder')
							]) }}
					</div>

					<div class="form-group status-post-submit">
						{{ Form::submit(lang('Publish'), ['class' => 'btn btn-primary', 'id' => 'user-edit-submit']) }}
					</div>

				{{ Form::close() }}

			</div>

		</div>
	</div>


</div>

@stop