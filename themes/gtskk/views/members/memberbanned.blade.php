@extends('theme::layouts.main')

@section('content')
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">{{ lang('Notice') }}</h3>
				</div>
				<div class="panel-body">


					<fieldset>
						<div class="alert alert-warning">
							{{ lang('Sorry, You account is banned.') }}
						</div>
					</fieldset>

				</div>
			</div>
		</div>
	</div>

@stop
