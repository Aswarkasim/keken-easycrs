<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajars', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('gender')->nullable();
            $table->string('agama')->nullable();
            $table->string('sd')->nullable();
            $table->string('smp')->nullable();
            $table->string('sma')->nullable();
            $table->string('kampus')->nullable();
            $table->string('jurusan')->nullable();
            $table->text('bio')->nullable();
            $table->text('foto')->nullable();
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
        Schema::dropIfExists('pengajars');
    }
}
