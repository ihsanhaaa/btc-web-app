<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fish', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fishpond_id');
            $table->string('asal_ikan');
            $table->integer('jumlah_ekor');
            $table->float('jumlah_bobot', 8, 2);
            $table->integer('min');
            $table->integer('max');
            $table->date('sortir_berikut');
            $table->float('bobot_pakan', 8, 2);
            $table->longText('keterangan');
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
        Schema::dropIfExists('fish');
    }
};
