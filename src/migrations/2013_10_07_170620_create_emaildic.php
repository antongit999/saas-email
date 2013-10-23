<?php

use Illuminate\Database\Migrations\Migration;

class CreateEmaildic extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mailer_dictionary', function($table) {
            $table->increments('id');
            $table->string('title', 200);
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
		Schema::drop('mailer_dictionary');
	}

}