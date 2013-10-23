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
<div class='row-fluid messages-header' style='margin-bottom:1em;'>
	<div class='btn-group pull-left'>
		<a class='btn btn-default' href="{{ AdminURL::route('email.gettemplates') }}">Templates</a>
		<a class='btn btn-default' href="{{ AdminURL::route('email.getgroups') }}">Groups</a>
		<a class='btn btn-default' href="{{ AdminURL::route('email.getdictionaries') }}">Dictionaries</a>
		<a class='btn btn-default' href="{{ AdminURL::route('email.getsent') }}">Sent Email</a>
	</div>

	<div class='btn-group new pull-right'>
		<a class="btn btn-success" href="{{ AdminURL::route('email.getnewemail') }}" >New System Email</a>
		<a class='btn btn-success' role='button'>Send Manual Email</a>
	</div>

</div>

<div class='row-fluid'>
	<div class='span12 box bordered-box purple-border' style='margin-bottom:0;'>
		<div class='box-header muted-background'>
			<div class='title'>
				<i class='icon-envelope'> </i>Existing Email
			</div>
			<div class='actions'></div>
		</div>
		<div class='box-content box-no-padding'>
			<table class='data-table table messages-list table-striped' style='margin-bottom:0;'>
				<thead>
					<tr>
						<th> ID </th>
						<th> Trigger </th>
						<th> Subject </th>
						<th> Type </th>
						<th> Group </th>
						<th> Template </th>
						<th> Dictionary </th>
						<th> Frequency </th>
						<th> Created </th>
						<th> Actions </th>
					</tr>
				</thead>
				<tbody>
	                @foreach ($mails as $item)
	                <tr>
	                    <td data-title='id'>{{ $item->id }}</td>
	                    <td data-title='Text'></td>
	                    <td data-title='subject'>{{ $item->subject}}</td>
	                    <td data-title='type'>{{ $item->type}}</td>
	                    <td data-title='group'>{{ $item->group}}</td>
	                    <td data-title='template'>{{ $item->template}}</td>
	                    <td data-title='dictionary'>{{ $item->dictionary}}</td>
	                    <td data-title='frequency'>{{ $item->frequency}}</td>
	                    <td data-title='createed_at'>{{ $item->created_at}}</td>
	                    <td data-title='Actions'>
	                        <a class='btn btn-default btn-mini alert-action-btn' rel="{{ AdminURL::route('email.postupdatetemplate', $item->id) }}" data-template="{{ $item->id}}" href="#!">
	                            <i class='icon-edit'> </i> Edit
	                        </a>
	                        <a class='btn btn-default btn-mini alert-action-btn' rel="{{ AdminURL::route('email.postdeletetemplate') }}" data-template="{{ $item->id }}" data-must-confirmed="1" href="#!">
	                            <i class='icon-remove'> </i> Delete
	                        </a>
	                    </td>
	                </tr>
	                @endforeach
	            </tbody>
			</table>
		</div>
	</div>
</div>
@stop