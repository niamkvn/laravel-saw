<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMahasiswaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'mahasiswa';

    /**
     * Run the migrations.
     * @table mahasiswa
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nim', 8);
            $table->string('nama', 80);
            $table->unsignedInteger('user_id');

            $table->index(["user_id"], 'fk_mahasiswa_users1_idx');

            $table->unique(["nim"], 'nim_UNIQUE');
            $table->nullableTimestamps();


            $table->foreign('user_id', 'fk_mahasiswa_users1_idx')
                ->references('id')->on('users')
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
