<?php namespace Saas\Email\Models;

use Illuminate\Database\Eloquent\Model;

class MailerGroup extends Model
{
	/**
	 * @var string
	 */
	protected $table = 'mailer_groups';

	/**
	 * @var array
	 */
	protected $guarded = array('id', 'created_at');

	/**
	 * @var bool
	 */
	//public $timestamps = false;
}