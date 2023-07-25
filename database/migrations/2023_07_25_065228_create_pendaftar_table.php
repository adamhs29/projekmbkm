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
        Schema::create('pendaftar', function (Blueprint $table) {
            $table->id('id_pendaftar');

            $table->unsignedBigInteger('user_id')->default(1);
            $table->foreign('user_id')->references('id_user')->on('users');
            
            $table->string('nama', 50)->nullable();
            $table->string('npm', 50)->nullable();
            $table->string('nik', 50)->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->text('alamat')->nullable();
            $table->string('kecamatan', 50)->nullable();
            $table->string('kabupaten', 50)->nullable();
            $table->string('provinsi', 50)->nullable();
            $table->string('tempat_lahir', 50)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('no_telp', 50)->nullable();

            $table->unsignedBigInteger('fakultas_id')->nullable();
            $table->foreign('fakultas_id')->references('id_fakultas')->on('fakultas');

            $table->unsignedBigInteger('prodi_id')->nullable();
            $table->foreign('prodi_id')->references('id_prodi')->on('prodi');

            $table->unsignedBigInteger('program_id')->nullable();
            $table->foreign('program_id')->references('id_program')->on('program');

            $table->string('foto', 100)->nullable();
            $table->string('skrip_nilai', 100)->nullable();
            $table->string('krs', 100)->nullable();
            $table->string('ipk', 10)->nullable();
            $table->string('semester', 100)->nullable();
            $table->string('nama_ayah', 50)->nullable();
            $table->string('nama_ibu', 50)->nullable();
            $table->text('alamat_ortu', 50)->nullable();
            $table->string('no_telp_ortu', 50)->nullable();
            $table->string('pekerjaan_ayah', 50)->nullable();
            $table->string('pekerjaan_ibu', 50)->nullable();
            $table->tinyInteger('status')->default(0);

            $table->string('angkatan', 100)->nullable();
            $table->json('kode_matkul')->nullable();
            $table->json('nama_matkul')->nullable();
            $table->integer('total_sks')->nullable();

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
        Schema::dropIfExists('pendaftar');
    }
};
