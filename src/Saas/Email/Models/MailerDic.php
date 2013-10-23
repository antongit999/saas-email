<?php namespace Saas\Email\Models;

use Illuminate\Database\Eloquent\Model;

class MailerDic extends Model
{
	/**
	 * @var string
	 */
	protected $table = 'mailer_dictionary';

	/**
	 * @var array
	 */
	protected $guarded = array('id', 'created_at');

	/**
	 * @var bool
	 */
	//public $timestamps = false;
}