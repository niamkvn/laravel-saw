<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembobotanTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'pembobotan';

    /**
     * Run the migrations.
     * @table pembobotan
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->float('bobot')->nullable()->default('0');
            $table->unsignedInteger('mahasiswa_id');
            $table->unsignedInteger('alternatif_id');

            $table->index(["alternatif_id"], 'fk_hasil_pembobotan_alternatif1_idx');

            $table->index(["mahasiswa_id"], 'fk_hasil_pembobotan_mahasiswa1_idx');
            $table->nullableTimestamps();


            $table->foreign('mahasiswa_id', 'fk_hasil_pembobotan_mahasiswa1_idx')
                ->references('id')->on('mahasiswa')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('alternatif_id', 'fk_hasil_pembobotan_alternatif1_idx')
                ->references('id')->on('alternatif')
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
