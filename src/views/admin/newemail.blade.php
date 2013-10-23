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
		New
	</li>
</ul>
@stop

@section('admin_content')
<div class='row-fluid section-header'>
	<div class='title'>
		Create a new email to send your users after a specific event
	</div>

	<div class='btn-group'>
		<a class="btn btn-default" role="button" href="{{ AdminURL::route('email.getindex') }}">Go Back to Emails</a>
	</div>
</div>

<div class='row-fluid'>
	<div class='span8 box'>

		<div class='box-content'>
			{{ Form::open(array('class' => 'form-horizontal','url' => AdminURL::route('groups.postnewrule'), 'method' => 'post'))  }}
			{{ Form::token() }}
			<fieldset>
				<div class='row-fluid'>
					<div class='span12'>
						<div class='control-group'>
							<label class='control-label'>Email Type</label>
							<div class='controls'>
								<select name="status" class='input-large'>
									<option value='1'>System</option>
									<option value='0'>Admin</option>
								</select>
							</div><!--/.controls-->
						</div><!--/.control-group-->

						<div class='control-group'>
							<label class='control-label'>Recipient Group</label>
							<div class='controls'>
								<select name="status" class='input-large'>
									<option value='2'>Users</option>
									<option value='1'>Subscribers</option>
									<option value='0'>Company</option>
								</select>
							</div><!--/.controls-->
						</div><!--/.control-group-->

						<div class='control-group'>
							<label class='control-label'>Template</label>
							<div class='controls'>
								<select name="status" class='input-large'>
									<option value='2'>Users</option>
									<option value='1'>Subscribers</option>
									<option value='0'>Company</option>
								</select>
							</div><!--/.controls-->
						</div><!--/.control-group-->

						<div class='control-group'>
							<label class='control-label'>Dictionary</label>
							<div class='controls'>
								<select name="status" class='input-large'>
									<option value='1'>Reseller</option>
									<option value='0'>Default</option>
								</select>
							</div><!--/.controls-->
						</div><!--/.control-group-->

						<div class='control-group'>
							<label class='control-label'>Frequency</label>
							<div class='controls'>
								<select name="status" class='input-large'>
									<option value="0">Immediately</option>
									<option value="1">Daily</option>
									<option value="2">Hourly</option>
									<option value="3">Weekly</option>
								</select>
							</div><!--/.controls-->
						</div><!--/.control-group-->

						<hr class='hr-normal'>

						<div class='control-group'>
							<label class='control-label'>Email Subject</label>
							<div class='controls'>
								{{ Form::text('slug', $slug, array('id'=>'rule-name', 'class' => 'span9', 'placeholder' => 'edit_brand')) }}
							</div><!--/.controls-->
						</div><!--/.control-group-->

						<div class='control-group'>
							<label class='control-label'>Email Body</label>
							<div class='controls'>
								<textarea name="description" id='inputTextArea1' class='span12' placeholder='Describe your rule' rows='7'></textarea>
							</div><!--/.controls-->
						</div><!--/.control-group-->
					</div><!--/.span8-->
				</div><!--/.row-fluid-->
			</fieldset>
			<div class='form-actions' style='margin-bottom: 0;'>
				<div class='text-right'>
					<div class='btn btn-default btn-large' id="newemail-back">
						<i class='icon-arrow-left'></i>
						Go Back to Emails
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
$('#newemail-back').click(function(e){
window.location = "{{ AdminURL::route('email.getindex') }}"
e.preventDefault()
})
@stop