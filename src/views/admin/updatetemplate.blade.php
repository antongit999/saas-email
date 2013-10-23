@extends('layouts.admin')

@section('admin_icon', 'unlock')

@section('admin_title', 'Create Email Template')

@section('admin_breadcrumb')
<ul class='breadcrumb'>
	<li>
		<a href="{{ AdminURL::route('email.gettemplate') }}"><i class='icon-unlock'> </i>Template</a>
	</li>

	<li class='separator'>
		<i class='icon-angle-right'></i>
	</li>

	<li>
		Edit Template
	</li>
	
	<li class='separator'>
        <i class='icon-angle-right'></i>
    </li>

    <li>
        {{ $temp->id }}
    </li>
</ul>
@stop

@section('admin_content')
<div class='row-fluid'>
	<div class='span8 box'>

		<div class='box-content'>
			{{ Form::open(array('class' => 'form','url' => AdminURL::route('email.postupdatetemplate', $temp->id), 'method' => 'post', 'id' => 'template-action-main'))  }}
			<fieldset>
				<div class='row-fluid'>
					<div class='span12'>
						<div class='control-group'>
							<label class='control-label'>Template Name</label>
							<div class='controls'>
								{{ Form::text('title', $temp->title, array('placeholder' => 'ex: Christmas Card', 'class' => 'span6')) }}
							</div><!--/.controls-->
						</div><!--/.control-group-->

						<div class='control-group'>
							<label class='control-label'>Template Body</label>
							<div class='controls'>
								{{ Form::textArea('body', $temp->body, array('placeholder'=> 'Text for your message','class' => 'span12', 'rows'=>32)) }}
							</div><!--/.controls-->
						</div><!--/.control-group-->
					</div><!--/.span8-->
				</div><!--/.row-fluid-->
			</fieldset>
			<div class='form-actions' style='margin-bottom: 0;'>
				<div class='text-right'>
					<div class='btn btn-default btn-large' id="newtemp-back">
						<i class='icon-arrow-left'></i>
						Go Back to Templates
					</div>
					{{ Form::submit('Save This Email', array('class'=>'btn btn-primary btn-large')) }}
				</div>
			</div><!--/.form-actions-->
			{{ Form::close() }}
		</div><!--/.box-content-->
	</div><!--/.span8 box-->

	<div class='span4 box'>
		<div class='alert alert-info'>
			<a class="close" href="#" data-dismiss="alert">×</a>
			<p>
				Some tips for creating messages <i class="icon-smile"></i>
			</p>

			<div class='row-fluid shift-down'>
				<ul>
					<li>
						When creating a template, tokens are surrounded by %'s
					</li>
					<li>
						So if you wanted to replace the brand title use %brand_title%
					</li>
					<li>
						Consult the cheatsheet for possible replacement values.
					</li>
					<li>
						<a href="http://kb.mailchimp.com/article/how-to-code-html-emails">Email HTML Tips.</a>. -- Mailchimp.
					</li>
				</ul>
			</div><!--/.row-fluid shift-down-->

		</div><!--/.alert-->
	</div><!--/.span4 box-->

	<div class='span4 box'>
		<a class="btn btn-block" href="#modal-email-cheatsheet" role="button" data-toggle="modal">View Dictionary Cheatsheet</a>
	</div>

	<div class='modal hide fade' id='modal-email-cheatsheet' role='dialog' tabindex='-1'>
		<div class='modal-header red-background'>
			<button class='close' data-dismiss='modal' type='button'>
				&times;
			</button>
			<h3>Dictionary Cheatsheet</h3>
		</div><!--/.modal-header-->

		<div class='modal-body'>
			<form class='span10'>
				<h4>Default Items</h4>

				<ul class="list-unstyled dictionary-list">
					<li>
						<span class="item-name">Site Name</span><span class="definition">BizGym</span>
					</li>
					<li>
						<span class="item-name">Site Email</span><span class="definition">support@bizgym.com</span>
					</li>
				</ul>
			</form>
		</div><!--/.modal-body-->

		<div class='modal-footer'>
			<button class='btn btn-default' data-dismiss='modal'>
				Cancel
			</button>
		</div><!--/.modal-footer-->
	</div><!--/.modal hide fade-->

</div><!--/.row-fluid-->
@stop

@section('inline_scripts')
@parent
$('#newtemp-back').click(function(e){
window.location = "{{ AdminURL::route('email.gettemplate') }}"
e.preventDefault()
})
@stop