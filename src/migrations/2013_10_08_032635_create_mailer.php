<?php

use Illuminate\Database\Migrations\Migration;

class CreateMailer extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mailer', function($table) {
            $table->increments('id');
            $table->integer('type');
			$table->integer('group_id');
			$table->integer('template_id');
			$table->integer('dictionary_id');
			$table->integer('frequency');
			$table->string('subject', 200);
			$table->text('body');
            $table->timestamp('created_at');
			$table->timestamp('updated_at');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mailer');
	}

}