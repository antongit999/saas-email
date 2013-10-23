@extends('layouts.admin')

@section('admin_icon', 'lightbulb')

@section('admin_title', 'Email Resources')

@section('admin_title', 'Manage Message Templates')

@section('admin_breadcrumb')
<ul class='breadcrumb'>
	<li>
		<a href="{{ AdminURL::route('email.getindex') }}"><i class='icon-envelope'> </i>Email</a>
	</li>

	<li class='separator'>
		<i class='icon-angle-right'></i>
	</li>

	<li>
		Templates
	</li>
</ul>
@stop

@section('admin_content')
<div class='row-fluid section-header'>
	<div class='title'>
		Create Groups of Recipients for your emails
	</div>
	<div class='btn-group'>
		<a class="btn btn-default" role="button" href="{{ AdminURL::route('email.getindex') }}">Go Back to Emails</a>
	</div>
</div>

<div class='row-fluid'>
	<div class='span12 box bordered-box purple-border' style='margin-bottom:0;'>
		<div class='box-header muted-background'>
			<div class='title'>
				<i class="icon-envelope"> </i>Existing Groups
			</div>
			<div class='actions'>
				<a class="btn btn-small" href="{{ AdminURL::route('email.getnewgroup') }}" >
					<i class="icon-plus"> </i>New Group</a>
			</div>
		</div>
		<div class='box-content box-no-padding'>
			<table class='data-table table messages-list table-striped' style='margin-bottom:0;'>
				<thead>
					<tr>
						<th> ID </th>
						<th> Title </th>
						<th> Description </th>
						<th> Created </th>
						<th> Actions </th>
					</tr>
				</thead>
				@foreach ($grps as $item)
                <tr>
                    <td data-title='Title'>{{ $item->id }}</td>
                    <td data-title='Text'>{{ $item->name}}</td>
                    <td data-title='Text'>{{ $item->description}}</td>
                    <td data-title='Text'>{{ $item->created_at}}</td>
                    <td data-title='Actions'>
                        <a class='btn btn-default btn-mini alert-action-btn' rel="{{ AdminURL::route('email.postupdategroup', $item->id) }}" data-pk="{{ $item->id}}" href="#!">
                            <i class='icon-edit'> </i> Edit
                        </a>
                        <a class='btn btn-default btn-mini alert-action-btn' rel="{{ AdminURL::route('email.postdeletegroup') }}" data-pk="{{ $item->id }}" data-must-confirmed="1" href="#!">
                            <i class='icon-remove'> </i> Delete
                        </a>
                    </td>
                </tr>
                @endforeach
			</table>
		</div>
	</div>
</div>
<form action="{{ AdminURL::route('email.postdeletegroup') }} }}" method="POST" id="alert-action">
<input type="hidden" name="pk_id" value=""/>
</form>
@stop

@section('inline_scripts')
@parent
$('.alert-action-btn').click(function(){
    var target = $(this).attr('rel'),
        pk_id = $(this).data('pk'),
        form = $('#alert-action'),
        needConfirmation = $(this).data('must-confirmed'),
        actionable, confirmed

    if (needConfirmation) {
        confirmed = confirm('Are you sure?')
    } else {
        actionable = true
    }


    if (actionable == true || confirmed == true) {
        form.attr('action', target)
        form.find('input[type=hidden]').val(pk_id)
        form.submit()
    }
    
})
@stop