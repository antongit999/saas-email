@extends('layouts.admin')

@section('admin_icon', 'lightbulb')

@section('admin_title', 'Email Resources')

@section('admin_title', 'Manage Email Notification')

@section('admin_breadcrumb')
<ul class='breadcrumb'>
	<li>
		<a href="{{ AdminURL::route('email.getindex') }}"><i class='icon-envelope'> </i>Email</a>
	</li>

	<li class='separator'>
		<i class='icon-angle-right'></i>
	</li>

	<li>
		Overview
	</li>
</ul>
@stop

@section('admin_content')
<br/>
<div class='row-fluid section-header'>
	<div class='title'>
		Emails that have already been sent
	</div>
	<div class='btn-group'>
		<a class="btn btn-default" role="button" href="{{ AdminURL::route('email.getindex') }}">Go Back to Emails</a>
		<a class="btn btn-default" role="button" href="{{ AdminURL::route('email.getindex') }}">View Pending Emails</a>
	</div>
</div>

<div class='row-fluid'>
	<div class='span12 box bordered-box purple-border' style='margin-bottom:0;'>
		<div class='box-header muted-background'>
			<div class='title'>
				<i class='icon-envelope'> </i>Sent  Email
			</div>
			<div class='actions'></div>
		</div>
		<div class='box-content box-no-padding'>
			<table class='data-table table messages-list table-striped' style='margin-bottom:0;'>
				<thead>
					<tr>
						<th> ID </th>
						<th> Subject </th>
						<th> Recipient </th>
						<th> Type </th>
						<th> Frequency </th>
						<th> Date </th>
						<th> Actions </th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</div>
@stop