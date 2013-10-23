<?php namespace Saas\Email\Models;

use Illuminate\Database\Eloquent\Model;

class MailerMngDic extends Model
{
	/**
	 * @var string
	 */
	protected $table = 'mailer_mngdictionary';

	/**
	 * @var array
	 */
	protected $guarded = array('id', 'created_at');

	/**
	 * @var bool
	 */
	//public $timestamps = false;
}