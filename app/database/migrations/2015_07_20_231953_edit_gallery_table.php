<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditGalleryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('gallerys', function ($table){
            $table->string('alt')->after('status');
            $table->smallInteger('sorted')->after('status');            
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('gallerys', function($table)
		{
		    $table->dropColumn(['alt','sorted']);
		});
	}

}
