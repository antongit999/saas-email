<?php

namespace Saas\Email\Controllers;

use Saas\Admin\PackageController as BaseController;
use Saas\Email\Models\Mailer;
use Saas\Email\Models\MailerTemplate;
use Saas\Email\Models\MailerGroup;
use Saas\Email\Models\MailerDic;
use Saas\Email\Models\MailerMngDic;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;

class AdminController extends BaseController
{
	public static $type = self::REST;

	/**
	 * This action will accessible from :
	 *
	 * GET|POST|PUT|DELETE /admin/email/something
	 */
	 
	public function getIndex()
	{
		$this->viewData = array(
			'title' => 'Email Overview',
			'mails' => Mailer::all(),
		);

		$this->setupLayout();
	}
	
	public function getNewemail()
	{
		$this->viewData = array(
			'title' => 'Create New Email',
		);

		$this->setupLayout();
	}
	
	public function postNewemail()
	{
		$fields = array(
			'type'           => Input::get('type'),
			'group_id'           => Input::get('group_id'),
			'template_id'           => Input::get('template_id'),
			'dictionary_id'           => Input::get('dictionary_id'),
			'frequency'           => Input::get('frequency'),
			'subject'           => Input::get('subject'),
			'body'            => Input::get('body')
		);
		
		Mailer::create($fields);

		return Redirect::route(Route::getBaseAdminRoute().'.email.getindex')->with('message', 'Email has been created successfully');
	}
	
	public function postDeleteemail()
	{
		if (Input::has('pk_id')) {
			try {
				$temp = Mailer::find(Input::get('pk_id'));
				
				$temp->delete();

			} catch (\Exception $e) {
				return Redirect::back()->with('warning', $e->getMessage());
			}
		}

		return Redirect::back()->with('email Deleted.');
	}
	
	public function postUpdateemail($id = 0)
	{
		$data = Mailer::find($id);

		if ( ! $temp) Redirect::back()->with('warning', 'Invalid email id');
		
		if (Input::has('subject')) {
			
				try {
					
					$data->type = Input::get('type');
					$data->group_id = Input::get('group_id');
					$data->template_id = Input::get('template_id');
					$data->dictionary_id = Input::get('dictionary_id');
					$data->frequency = Input::get('frequency');
					$data->subject = Input::get('subject');
					$data->body = Input::get('body');
					$data->save();

					return Redirect::route(Route::getBaseAdminRoute().'.email.getindex')->with('message', 'Email "'.Input::get('title').'" updated');
				} catch (\Exception $e) {
					$error = $e->getMessage();
				}
			
		}
		
		$this->viewData = array(
			'title' => 'Edit Email',
			'temp' => $temp,
		);

		$this->setupLayout();
	}
		
	public function getPreviewcode()
	{
		$this->viewData = array(
			'title' => 'Preview Application Email',
		);

		$this->setupLayout();
	}
	
	public function getManualemail()
	{
		$this->viewData = array(
			'title' => 'Send a Manaul Message',
		);

		$this->setupLayout();
	}
	
	public function getTemplates()
	{
		$this->viewData = array(
			'title' => 'Manage Email Templates',
			'templates' => MailerTemplate::all(),
		);

		$this->setupLayout();
	}
	
	public function getNewtemplate()
	{
		$this->viewData = array(
			'title' => 'Create New Email Template',
		);

		$this->setupLayout();
	}
	
	public function postNewtemplate()
	{
		$fields = array(
			'title'             => Input::get('title'),
			'body'             => Input::get('body')
		);
		
		$createdTemp = MailerTemplate::create($fields);

		return Redirect::route(Route::getBaseAdminRoute().'.email.gettemplates')->with('message', 'Template has been created successfully');
	}
	
	public function postDeletetemplate()
	{
		if (Input::has('temp_id')) {
			try {
				$temp = MailerTemplate::find(Input::get('temp_id'));
				
				$temp->delete();

			} catch (\Exception $e) {
				return Redirect::back()->with('warning', $e->getMessage());
			}
		}

		return Redirect::back()->with('template Deleted.');
	}
	
	public function postUpdatetemplate($id = 0)
	{
		$temp = MailerTemplate::find($id);

		if ( ! $temp) Redirect::back()->with('warning', 'Invalid template id');
		
		if (Input::has('title')) {
			
				try {
					
					$temp->title = Input::get('title');
					$temp->body = Input::get('body');
					$temp->save();

					return Redirect::route(Route::getBaseAdminRoute().'.email.gettemplates')->with('message', 'Template "'.Input::get('title').'" updated');
				} catch (\Exception $e) {
					$error = $e->getMessage();
				}
			
		}
		
		$this->viewData = array(
			'title' => 'Edit Template',
			'temp' => $temp,
		);

		$this->setupLayout();
	}
	
	public function getGroups()
	{
		$this->viewData = array(
			'title' => 'Manage Email Groups',
			'grps' => MailerGroup::all(),
		);

		$this->setupLayout();
	}
	
	public function getNewgroup()
	{
		$this->viewData = array(
			'title' => 'Create New Email Group',
		);

		$this->setupLayout();
	}
	
	public function postNewgroup()
	{
		$fields = array(
			'name'             => Input::get('name'),
			'description'      => Input::get('description')
		);
		
		$createdGrp = MailerGroup::create($fields);

		return Redirect::route(Route::getBaseAdminRoute().'.email.getgroups')->with('message', 'Group has been created successfully');
	}
	
	public function postDeletegroup()
	{
		if (Input::has('pk_id')) {
			try {
				$temp = MailerGroup::find(Input::get('pk_id'));
				
				$temp->delete();

			} catch (\Exception $e) {
				return Redirect::back()->with('warning', $e->getMessage());
			}
		}

		return Redirect::back()->with('Group Deleted.');
	}
	
	public function postUpdategroup($id = 0)
	{
		$data = MailerGroup::find($id);

		if ( ! $data) Redirect::back()->with('warning', 'Invalid group id');
		
		if (Input::has('name')) {
			
			try {
				$data->name = Input::get('name');
				$data->description = Input::get('description');
				$data->save();

				return Redirect::route(Route::getBaseAdminRoute().'.email.getgroups')->with('message', 'Group "'.Input::get('name').'" updated');
			} catch (\Exception $e) {
				$error = $e->getMessage();
			}
			
		}
		
		$this->viewData = array(
			'title' => 'Edit Group',
			'grp' => $data,
		);

		$this->setupLayout();
	}
	
	public function getDictionaries()
	{
		$this->viewData = array(
			'title' => 'Manage Email Dictionaries',
			'dics' => MailerDic::all(),
		);

		$this->setupLayout();
	}
	
	public function getMngdictionary()
	{
		$this->viewData = array(
			'title' => 'Manage Dictionary',
			'mngdics' => MailerMngDic::all(),
		);

		$this->setupLayout();
	}
	
	public function postNewdic()
    {
        try {
            $fields = array(
                'title' => Input::get('title')
            );
            
			MailerDic::create($fields);
			
			return new JsonResponse(array('success' => 'OK'));
        } catch (\Exception $e) {
            return new JsonResponse(array('error' => $e->getMessage()));
        }
    }
	
	public function postNewmngdic()
    {
        try {
            $fields = array(
                'name' => Input::get('name'),
                'value' => Input::get('value')
            );
            
			MailerMngDic::create($fields);
			
			return new JsonResponse(array('success' => 'OK'));
        } catch (\Exception $e) {
            return new JsonResponse(array('error' => $e->getMessage()));
        }
    }
	
	public function getEditdic($id = 0)
    {
    	$response = array();
    	
        $existing_data = MailerDic::find($id);
        if(empty($existing_data)) {
        	$response['error'] = 1;
        	$response['message'] = 'error';
        } else {
            $response['error'] = 0;
            $response['data'] = $existing_data->getAttributes();
        }

        return new JsonResponse($response);
    }
	
	public function getEditmngdic($id = 0)
    {
    	$response = array();
    	
        $existing_data = MailerMngDic::find($id);
        if(empty($existing_data)) {
        	$response['error'] = 1;
        	$response['message'] = 'error';
        } else {
            $response['error'] = 0;
            $response['data'] = $existing_data->getAttributes();
        }

        return new JsonResponse($response);
    }
    
    public function postEditdic($id = 0)
    {
        try {
            $dic = MailerDic::find($id);
			$dic->title = Input::get('title');
            $dic->save();
			
            return new JsonResponse(array('success' => 'OK'));
        } catch (\Exception $e) {
            return new JsonResponse(array('error' => $e->getMessage()));
        }
    }
	
	public function postEditmngdic($id = 0)
    {
        try {
            $mngdic = MailerMngDic::find($id);
			$mngdic->name = Input::get('name');
			$mngdic->value = Input::get('value');
            $mngdic->save();
			
            return new JsonResponse(array('success' => 'OK'));
        } catch (\Exception $e) {
            return new JsonResponse(array('error' => $e->getMessage()));
        }
    }
	
	public function postDeletedic($id = 0)
    {
    	if (Input::has('pk_id')) {
			try {
				$temp = MailerDic::find(Input::get('pk_id'));
				
				$temp->delete();

			} catch (\Exception $e) {
				return Redirect::back()->with('warning', $e->getMessage());
			}
		}

		return Redirect::back()->with('Dictionary Deleted.');    
    }
	
	public function postDeletemngdic($id = 0)
    {
    	if (Input::has('pk_id')) {
			try {
				$temp = MailerMngDic::find(Input::get('pk_id'));
				
				$temp->delete();

			} catch (\Exception $e) {
				return Redirect::back()->with('warning', $e->getMessage());
			}
		}

		return Redirect::back()->with('Dictionary Deleted.');    
    }
	
	public function getSent()
	{
		$this->viewData = array(
			'title' => 'Sent Messages',
		);

		$this->setupLayout();
	}
}