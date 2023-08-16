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
        Schema::create('loans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->bigInteger('nominal_pinjaman');
            $table->date('tanggal_pembayaran_administrasi')->nullable();
            $table->integer('jasa');
            $table->integer('tenor');
            $table->string('setuju')->nullable();
            $table->integer('administrasi')->nullable();
            $table->date('tanggal_acc_pinjaman')->nullable();
            $table->string('status')->nullable();
            $table->date('tanggal_lunas')->nullable();
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('loans');
    }
};
