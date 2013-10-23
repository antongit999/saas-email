@extends('layouts.admin')

@section('admin_icon', 'unlock')

@section('admin_title', 'Create Email Template')

@section('admin_breadcrumb')
<ul class='breadcrumb'>
	<li>
		<a href="{{ AdminURL::route('email.gettemplate') }}"><i class='icon-unlock'> </i>Group</a>
	</li>

	<li class='separator'>
		<i class='icon-angle-right'></i>
	</li>

	<li>
		New Group
	</li>
</ul>
@stop

@section('admin_content')
<div class='row-fluid section-header'>
	<div class='title'>
		Create a new group to send email to
	</div>

	<div class='btn-group'>
		<a class="btn btn-default" role="button" href="{{ AdminURL::route('email.getgroups') }}">Go Back to Group</a>
	</div>
</div>

<div class='row-fluid'>
	<div class='span8 box'>

		<div class='box-content'>
			{{ Form::open(array('class' => 'form','url' => AdminURL::route('email.postnewgroup'), 'method' => 'post'))  }}
			{{ Form::token() }}
			<fieldset>
				<div class='row-fluid'>
					<div class='span12'>
						<div class='control-group'>
							<label class='control-label'>Group Name</label>
							<div class='controls'>
								{{ Form::text('name', Input::old('name'), array('placeholder' => 'ex: Users', 'class' => 'span6')) }}
							</div><!--/.controls-->
						</div><!--/.control-group-->

						<div class='control-group'>
							<label class='control-label'>Group Description</label>
							<p class="help-block">Describe this group so that you know the purpose of it</p>
							<div class='controls'>
								<textarea name="description" class='span12' rows='5'></textarea>
							</div><!--/.controls-->
						</div><!--/.control-group-->
						
						<hr class="hr-normal">
						
						<div class="control-group">
                            <label class="control-label">Select User Types</label>
                            <p class="help-block">Who will make up this group?</p>
                            <div class="controls">
                                <label class="checkbox">
                                    <input type="checkbox" name="group_1" value="1"> Administrator<br>
                                </label>
                                <label class="checkbox">
                                    <input type="checkbox" name="group_2" value="1"> Agency<br>
                                </label>
                                <label class="checkbox">
                                    <input type="checkbox" name="group_3" value="1"> Subscriber<br>
                                </label>
                                <label class="checkbox">
                                    <input type="checkbox" name="group_7" value="1"> User<br>
                                </label>
                                <label class="checkbox">
                                    <input type="checkbox" name="group_10" value="1"> Employee<br>
                                    </label>
                                <label class="checkbox">
                                    <input type="checkbox" name="group_11" value="1"> Advocate<br>
                                </label>
                                <label class="checkbox">
                                    <input type="checkbox" name="group_12" value="1"> Author<br>
                                </label>
                                <label class="checkbox">
                                    <input type="checkbox" name="group_13" value="1"> Manager<br>
                                </label>
                            </div><!--/.controls-->
						</div>
					</div><!--/.span8-->
				</div><!--/.row-fluid-->
			</fieldset>
			<div class='form-actions' style='margin-bottom: 0;'>
				<div class='text-right'>
					<div class='btn btn-default btn-large' id="new-back">
						<i class='icon-arrow-left'></i>
						Go Back to Groups
					</div>
					{{ Form::submit('Save This Group', array('class'=>'btn btn-primary btn-large')) }}
				</div>
			</div><!--/.form-actions-->
			{{ Form::close() }}
		</div><!--/.box-content-->
	</div><!--/.span8 box-->
</div><!--/.row-fluid-->
@stop

@section('inline_scripts')
@parent
$('#new-back').click(function(e){
window.location = "{{ AdminURL::route('email.getgroups') }}"
e.preventDefault()
})
@stop