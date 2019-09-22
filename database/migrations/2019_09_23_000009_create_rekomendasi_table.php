<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRekomendasiTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'rekomendasi';

    /**
     * Run the migrations.
     * @table rekomendasi
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('skor');
            $table->unsignedInteger('alternatif_id');
            $table->unsignedInteger('mahasiswa_id');

            $table->index(["alternatif_id"], 'fk_rekomendasi_alternatif1_idx');

            $table->index(["mahasiswa_id"], 'fk_rekomendasi_mahasiswa1_idx');
            $table->nullableTimestamps();


            $table->foreign('alternatif_id', 'fk_rekomendasi_alternatif1_idx')
                ->references('id')->on('alternatif')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('mahasiswa_id', 'fk_rekomendasi_mahasiswa1_idx')
                ->references('id')->on('mahasiswa')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
