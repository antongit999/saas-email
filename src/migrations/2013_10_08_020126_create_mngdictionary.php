<?php

use Illuminate\Database\Migrations\Migration;

class CreateMngdictionary extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mailer_mngdictionary', function($table) {
            $table->increments('id');
            $table->string('name', 200);
			$table->string('value', 200);
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
		Schema::drop('mailer_mngdictionary');
	}

}