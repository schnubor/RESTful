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
				$table->increments('ID');
				$table->string('Artikelbezeichnung');
				$table->string('Produkttyp');
				$table->string('Hersteller');
				$table->string('Herstellerartikelnummer');
				$table->string('Lieferantenname');
				$table->string('Lieferantenartikelnummer');
				$table->string('Verweis');
				$table->string('GTIN');
				$table->integer('TARIC');
				$table->timestamps();
			});
		}

		if(!Schema::hasTable('wheels')){
			Schema::create('wheels', function(Blueprint $table){
				$table->increments('ID');
				$table->integer('Bike_ID');
				$table->string('Artikelbezeichnung');
				$table->string('Produkttyp');
				$table->string('Hersteller');
				$table->string('Herstellerartikelnummer');
				$table->string('Lieferantenname');
				$table->string('Lieferantenartikelnummer');
				$table->string('Verweis');
				$table->string('Verwendung');
				$table->string('GTIN');
				$table->integer('TARIC');
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
	}

}
