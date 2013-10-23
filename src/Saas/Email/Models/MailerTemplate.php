<?php namespace Saas\Email\Models;

use Illuminate\Database\Eloquent\Model;

class MailerTemplate extends Model
{
	/**
	 * @var string
	 */
	protected $table = 'mailer_templates';

	/**
	 * @var array
	 */
	protected $guarded = array('id', 'created_at');

	/**
	 * @var bool
	 */
	//public $timestamps = false;
}