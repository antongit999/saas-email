@extends('layouts.admin')

@section('admin_icon', 'lightbulb')

@section('admin_title', 'Email Resources')

@section('admin_title', 'Manage Dictionary')

@section('admin_breadcrumb')
<ul class='breadcrumb'>
	<li>
		<a href="{{ AdminURL::route('email.getindex') }}"><i class='icon-envelope'> </i>Email</a>
	</li>

	<li class='separator'>
		<i class='icon-angle-right'></i>
	</li>

	<li>
		Dictionaries
	</li>
	
	<li class='separator'>
		<i class='icon-angle-right'></i>
	</li>

	<li>
		Manage Dictionary
	</li>
</ul>
@stop

@section('admin_content')
<div class='row-fluid section-header'>
	<div class='title'>
		Currently Viewing Default Dictionary
	</div>
	<div class='btn-group'>
		<a class="btn btn-default" role="button" href="{{ AdminURL::route('email.getdictionaries') }}">Go Back to Dictionaries</a>
	</div>
</div>

<div class='row-fluid'>
	<div class='span12 box bordered-box purple-border' style='margin-bottom:0;'>
		<div class='box-header muted-background'>
			<div class='title'>
				<i class="icon-envelope"> </i>Existing Items
			</div>
			<div class='actions'>
				<a class='btn btn-small' href='#modal-new-dic' role='button' data-toggle='modal'>
					<i class="icon-plus"> </i>New Item</a>
			</div>
		</div>
		<div class='box-content box-no-padding'>
			<table class='data-table table messages-list table-striped' style='margin-bottom:0;'>
				<thead>
					<tr>
						<th> ID </th>
						<th> Placeholder </th>
						<th> Value </th>
						<th> Date </th>
						<th> Actions </th>
					</tr>
				</thead>
				<tbody>
                    @if(count($mngdics) > 0)
                        @foreach ($mngdics as $row) 
                        <tr>
                        	<td data-title='Id'>{{ $row->id }} </td>
                            <td data-title='Name'>{{ $row->name }} </td>
                            <td data-title='Value'>{{ $row->value }} </td>
                            <td data-title='Created'>{{ $row->created_at }}</td>
                            <td data-title='Actions'>
                                <a class='dic_edit btn btn-mini' href="{{ AdminURL::route('email.geteditmngdic', $row->id)}}">
                                    <i class='icon-edit'> </i>Edit Item
                                </a>
                                <a class="btn btn-mini dic-action-btn" rel="{{ AdminURL::route('email.postdeletmngedic', $row->id) }}" data-pk="{{ $row->id }}" data-must-confirmed="1" href="#!">
                                    <i class='icon-remove'> </i>Delete Item
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
			</table>
		</div>
	</div>
	<form action="{{ AdminURL::route('email.postdeletemngdic') }} }}" method="POST" id="delete-action">
        <input type="hidden" name="pk_id" value=""/>
    </form>
</div>

<div class='modal hide fade' id='modal-new-dic' role='dialog' tabindex='-1'>
    <div class='modal-header red-background'>
        <button class='close' data-dismiss='modal' type='button'>&times;</button>
        <h3>New Dictionary Item</h3>
    </div><!--/.modal-header-->
    
    {{ Form::open(array('url' => AdminURL::route('email.postnewmngdic'), 'files' => true, 'id' => 'dicAddForm')) }}
    
    	{{ Form::token() }}
    
        <div class='modal-body'>
		    
		    <div class="span8" style="margin-left: 0;">
		    
                <div class='control-group'>
                    {{ Form::label('name', 'Placeholder Name', array('class' => 'control-label')) }}
                    <p class="help-block">This is what you will use to call the placeholder content</p>
                    <div class='controls'>
                        {{ Form::text('name', Input::old('name'), array('class' => 'input-block', 'placeholder' => 'Ex: Company Dictionary')) }}
                    </div><!--/.controls-->
                </div><!--/.control-group-->
                
                <div class='control-group'>
                    {{ Form::label('value', 'Placeholder Value', array('class' => 'control-label')) }}
                    <p class="help-block">This is what the placeholder will call</p>
                    <div class='controls'>
                        {{ Form::text('value', Input::old('value'), array('class' => 'input-block', 'placeholder' => 'Enter Value')) }}
                    </div><!--/.controls-->
                </div><!--/.control-group-->
                
        	</div>
        	
        </div><!--/.modal-body-->

        <div class='modal-footer'>
            {{ Form::button('<i class="icon-remove"> </i>' . 'Cancel', array('class' => 'btn btn-default', 'data-dismiss' => 'modal')) }}
            {{ Form::button('<i class="icon-save"> </i>' . 'Create Item', array('class' => 'btn btn-default btn-primary', 'type' => 'submit')) }}
        </div><!--/.modal-footer-->
    
    {{ Form::close() }}
</div>

<div class='modal hide fade' id='modal-edit-dic' role='dialog' tabindex='-1'>
    <div class='modal-header red-background'>
        <button class='close' data-dismiss='modal' type='button'>&times;</button>
        <h3>Edit Dictionary Item</h3>
    </div><!--/.modal-header-->
    
    {{ Form::open(array('files' => true, 'id' => 'dicEditForm')) }}
    
    	{{ Form::token() }}
    
    	{{ Form::hidden('id')}}
    
        <div class='modal-body'>
        
            <div class='span8' style="margin-left: 0;">
                
                <div class='control-group'>
                    {{ Form::label('name', 'Placeholder Name', array('class' => 'control-label')) }}
                    <p class="help-block">This is what you will use to call the placeholder content</p>
                    <div class='controls'>
                        {{ Form::text('name', Input::old('name'), array('class' => 'input-block', 'placeholder' => 'Ex: Company Dictionary')) }}
                    </div><!--/.controls-->
                </div><!--/.control-group-->
                
                <div class='control-group'>
                    {{ Form::label('value', 'Placeholder Value', array('class' => 'control-label')) }}
                    <p class="help-block">This is what the placeholder will call</p>
                    <div class='controls'>
                        {{ Form::text('value', Input::old('value'), array('class' => 'input-block', 'placeholder' => 'Enter Value')) }}
                    </div><!--/.controls-->
                </div><!--/.control-group-->

            </div>
        
        </div><!--/.modal-body-->

        <div class='modal-footer'>
            {{ Form::button('<i class="icon-remove"> </i>' . 'Cancel', array('class' => 'btn btn-default', 'data-dismiss' => 'modal')) }}
            {{ Form::button('<i class="icon-save"> </i>' . 'Save Changes', array('class' => 'btn btn-default btn-primary', 'type' => 'submit')) }}
        </div><!--/.modal-footer-->
        
    {{ Form::close() }}
        
</div>
@stop

@section('inline_scripts')
@parent

var submitCallback = function(e) {
    var that = $(this)

    if ($(this).valid()) {
        $(this).find('.error').remove();
        $this_from = $(this);
        $(this).ajaxSubmit({
            dataType : 'json',
            success  : function(resp) {
                if(resp.error) {
                    console.log(resp.error)
                } else {
                    window.location.href = window.location.href; //refresh
                }
            } 
        });
    }
    
    return false;
}

$('#dicAddForm').submit(submitCallback).validate({
	onkeyup: false,
	rules: {
		name : {
			required : true,
			maxlength: 200
		},
		value : {
			required : true,
			maxlength: 200
		}
	},
	messages: {
		title : {
			remote : 'The title has already been taken.'
		}
	},
	errorPlacement: function(error, element) {
		error.appendTo( element.parents('.controls'));
	}
});

$('#dicEditForm').submit(submitCallback).validate({
	onkeyup: false,
	rules: {
		name : {
			required : true,
			maxlength: 200
		},
		value : {
			required : true,
			maxlength: 200
		}
	},
	messages: {
		title : {
			remote : 'This title has already been taken.'
		}
	},
	errorPlacement: function(error, element) {
		error.appendTo( element.parents('.controls'));
	}
});
	
$('.modal').on('hidden', function () {
	$(this).find('label.error').remove();
	$(this).find(':input').removeClass('error').val('');
	$(this).find('.file-input-name').remove();
});
    
$('.dic_edit').click(function() {
	var url = this.href;
	$.ajax({
		type : 'get',
		url  : url,
		dataType : 'json',
		success : function(resp) {
		if(resp.error == 0) {
			$edit_form = $('#modal-edit-dic').find('form');
			$edit_form.attr('action', url);
			$edit_form.find(':input[name="id"]').val(resp.data.id)
			$edit_form.find(':input[name="name"]').val(resp.data.name);
			$edit_form.find(':input[name="value"]').val(resp.data.value);
			$('#modal-edit-dic').modal();
		} else {
			alert(resp.message);
		}
	}
	});
    return false;
});

$('.dic-action-btn').click(function(){
    var target = $(this).attr('rel'),
        pk_id = $(this).data('pk'),
        form = $('#delete-action'),
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