<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKitaplarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kitaplars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('selflink');
            $table->integer('yazar_id');
            $table->integer('yayinevi_id');
            $table->integer('kategori_id');
            $table->string('image');
            $table->double('fiyat');
            $table->text('aciklama')->nullable();
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
        Schema::dropIfExists('kitaplars');
    }
}
