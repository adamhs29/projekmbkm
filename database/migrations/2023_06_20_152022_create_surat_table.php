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
        Schema::create('surat', function (Blueprint $table) {
            $table->id('id_surat');

            $table->string('sptjm', 100)->nullable();
            $table->string('surat_rekomendasi', 100)->nullable();

            $table->unsignedBigInteger('pendaftar_id')->nullable();
            $table->foreign('pendaftar_id')->references('id_pendaftar')->on('pendaftar');

            $table->unsignedBigInteger('user_id')->default(1);
            $table->foreign('user_id')->references('id_user')->on('users');

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
        Schema::dropIfExists('surat');
    }
};
