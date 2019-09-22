<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubkriteriaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'subkriteria';

    /**
     * Run the migrations.
     * @table subkriteria
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('kode', 45);
            $table->string('nama', 80);
            $table->enum('atribut', ["BENEFIT", "COST"]);
            $table->unsignedInteger('kriteria_id');

            $table->index(["kriteria_id"], 'fk_sub_kriteria_kriteria1_idx');

            $table->unique(["kode"], 'kode_UNIQUE');
            $table->nullableTimestamps();


            $table->foreign('kriteria_id', 'fk_sub_kriteria_kriteria1_idx')
                ->references('id')->on('kriteria')
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
