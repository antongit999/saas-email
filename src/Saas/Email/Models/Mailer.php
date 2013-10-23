<?php namespace Saas\Email\Models;

use Illuminate\Database\Eloquent\Model;

class Mailer extends Model
{
	/**
	 * @var string
	 */
	protected $table = 'mailer';

	/**
	 * @var array
	 */
	protected $guarded = array('id', 'created_at');

	/**
	 * @var bool
	 */
	//public $timestamps = false;
}