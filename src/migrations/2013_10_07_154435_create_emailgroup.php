<?php

use Illuminate\Database\Migrations\Migration;

class CreateEmailgroup extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mailer_groups', function($table) {
            $table->increments('id');
            $table->string('name', 200);
            $table->text('description')->nullable();
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
		Schema::drop('mailer_groups');
	}

}