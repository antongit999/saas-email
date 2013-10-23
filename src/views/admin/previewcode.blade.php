@extends('layouts.admin')

@section('admin_icon', 'unlock')

@section('admin_title', 'Create Email')

@section('admin_breadcrumb')
<ul class='breadcrumb'>
	<li>
		<a href="{{ AdminURL::route('email.getindex') }}"><i class='icon-unlock'> </i>Email</a>
	</li>

	<li class='separator'>
		<i class='icon-angle-right'></i>
	</li>

	<li>
		Welcome to Bizgym
	</li>

	<li class='separator'>
		<i class='icon-angle-right'></i>
	</li>

	<li>
		Code View
	</li>
</ul>
@stop

@section('admin_content')
<div class='row-fluid section-header'>
	<div class='title'>
		Here is your message in HTML format
	</div>

	<div class='btn-group'>
		<a class="btn btn-default" role="button" href="{{ AdminURL::route('email.getindex') }}">Go Back to Emails</a>
	</div>
</div>

<div class="row-fluid message-info">

	<div class="row-fluid">
		<div class="span8">
			<span class="subject">Subject: Welcome to BizGym</span>
		</div>
		<div class="btn-group pull-right">
			<a class="btn btn-default" role="button">Edit Email</a>
		</div><!--/.btn-group-->
	</div><!--/.row-fluid-->

	<div class="row-fluid message-meta">
		<ul class="list-unstyled msg-info inline">
			<li>
				<span class="item">Trigger:</span><span class="item-value">default/welcome</span>
			</li>
			<li>
				<span class="item">Type:</span><span class="item-value">System Message</span>
			</li>
			<li>
				<span class="item">Template:</span><span class="item-value">Default</span>
			</li>
			<li>
				<span class="item">Dictionary</span><span class="item-value">Default</span>
			</li>
			<li>
				<span class="item">Frequency</span><span class="item-value">Immediate</span>
			</li>
			<li>
				<span class="item">Created</span><span class="item-value">3 Days Ago</span>
			</li>
		</ul>

	</div><!--/.row-fluid-->

</div>

<div class='row-fluid'>
	<div class='span12 box'>

		<div class='box-content'>
			<pre>asfsdf</pre>
		</div><!--/.box-content-->
	</div><!--/.span8 box-->
</div><!--/.row-fluid-->
@stop