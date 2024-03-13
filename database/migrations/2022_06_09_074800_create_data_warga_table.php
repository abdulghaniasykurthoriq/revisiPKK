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
        Schema::create('data_warga', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_desa')->unsigned();
            $table->foreign('id_desa')->references('id')->on('data_desa');
            $table->bigInteger('id_kecamatan')->unsigned();
            $table->foreign('id_kecamatan')->references('id')->on('data_kecamatan');
            // $table->bigInteger('id_keluarga')->unsigned();
            // $table->foreign('id_keluarga')->references('id')->on('data_keluarga');
            $table->bigInteger('id_dasawisma')->unsigned()->nullable();
            $table->string('no_registrasi');
            $table->string('no_ktp');
            $table->string('nama');
            $table->string('jabatan');
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            // $table->integer('umur');
            $table->string('status_perkawinan');
            // $table->string('status_keluarga');
            // $table->string('status_anggota_keluarga')->nullable();
            $table->string('agama');
            $table->string('alamat');
            // $table->integer('rt');
            // $table->integer('rw');
            $table->string('kabupaten');
            $table->string('provinsi');
            $table->string('pendidikan');
            $table->string('pekerjaan');
            $table->string('akseptor_kb');
            $table->string('aktif_posyandu');
            $table->string('ikut_bkb');
            $table->string('memiliki_tabungan');
            $table->string('ikut_kelompok_belajar');
            $table->string('ikut_paud_sejenis');
            $table->string('ikut_koperasi');
            $table->boolean('pasangan_usia_subur')->default(false);
            $table->boolean('tiga_buta')->default(false);
            $table->boolean('ibu_hamil')->default(false);
            $table->boolean('ibu_menyusui')->default(false);
            $table->integer('periode');
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
        Schema::dropIfExists('data_warga');
    }
};