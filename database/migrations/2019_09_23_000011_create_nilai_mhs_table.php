<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNilaiMhsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'nilai_mhs';

    /**
     * Run the migrations.
     * @table nilai_mhs
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->float('nilai')->default('0');
            $table->unsignedInteger('mahasiswa_id');
            $table->unsignedInteger('subkriteria_id');

            $table->index(["subkriteria_id"], 'fk_nilai_mahasiswa_subkriteria1_idx');

            $table->index(["mahasiswa_id"], 'fk_nilai_kriteria_mahasiswa1_idx');
            $table->nullableTimestamps();


            $table->foreign('mahasiswa_id', 'fk_nilai_kriteria_mahasiswa1_idx')
                ->references('id')->on('mahasiswa')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('subkriteria_id', 'fk_nilai_mahasiswa_subkriteria1_idx')
                ->references('id')->on('subkriteria')
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
