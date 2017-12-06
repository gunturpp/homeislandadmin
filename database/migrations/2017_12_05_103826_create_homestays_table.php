<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomestaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);        
        Schema::create('homestays', function (Blueprint $table) {
            $table->increments('id_homestay');
            $table->string('nama_homestay');
            $table->decimal('harga');
            $table->integer('kuota');
            $table->decimal('lat', 10, 7);
            $table->decimal('long', 10, 7);
            $table->binary('foto_1') ;            
            $table->binary('foto_2') -> nullable();            
            $table->binary('foto_3') -> nullable();            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('homestays');
    }
}
