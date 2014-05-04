<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBikeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('bikes')){
			Schema::create('bikes', function(Blueprint $table){
				$table->increments('id');
				$table->string('artikelbezeichnung');
				$table->string('produkttyp');
				$table->string('hersteller');
				$table->string('herstellerartikelnummer');
				$table->string('lieferantenname');
				$table->string('lieferantenartikelnummer');
				$table->string('verweis');
				$table->string('gtin');
				$table->integer('taric');
				$table->timestamps();
			});
		}

		if(!Schema::hasTable('wheels')){
			Schema::create('wheels', function(Blueprint $table){
				$table->increments('id');
				$table->integer('bike_id');
				$table->string('artikelbezeichnung');
				$table->string('produkttyp');
				$table->string('hersteller');
				$table->string('herstellerartikelnummer');
				$table->string('lieferantenname');
				$table->string('lieferantenartikelnummer');
				$table->string('verweis');
				$table->string('verwendung');
				$table->string('gtin');
				$table->integer('taric');
				$table->timestamps();
			});
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('bikes');
		Schema::dropIfExists('wheels');
	}

}
