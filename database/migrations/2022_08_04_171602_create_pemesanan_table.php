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
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id();
            $table->string('no_book', 15);
            $table->string('namalyn', 30);
            $table->string('hargalyn', 50);
            $table->string('namakywn', 30);
            $table->date('jadwal');
            $table->time('jam');
            $table->string('keterangan', 50)->nullable();
            $table->date('tgl_pesan');
            $table->string('status', 15);
            $table->bigInteger('id_user')->length(11)->unsigned();
            $table->timestamps();
        });
        Schema::table('pemesanan', function (Blueprint $table) {
            $table->foreignId('id_user')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemesanan');
    }
};
