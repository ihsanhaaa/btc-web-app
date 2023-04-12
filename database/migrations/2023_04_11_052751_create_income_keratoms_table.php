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
        Schema::create('income_keratoms', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_jual');
            $table->integer('jumlah_bobot');
            $table->integer('harga_jual');
            $table->integer('total_penjualan');
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
        Schema::dropIfExists('income_keratoms');
    }
};
