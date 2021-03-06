<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nim');
            $table->string('nama');
            $table->decimal('tugasQuiz', 5,2);
            $table->decimal('uts', 5,2);
            $table->decimal('uas', 5,2);
            $table->decimal('nilai', 5,2);
            $table->integer('nilaiAngka');
            $table->char('nilaiHuruf', 1);
            $table->string('keterangan');
            $table->string('namaMK');
            $table->integer('kehadiran');
            $table->boolean('statusPembayaran')->nullable()->default(0);
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
        Schema::dropIfExists('students');
    }
}
