<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTotalBobotTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'total_bobot';

    /**
     * Run the migrations.
     * @table total_bobot
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->float('total')->default('0');
            $table->unsignedInteger('bobot_mhs_id');
            $table->unsignedInteger('alternatif_id');
            $table->unsignedInteger('user_id');

            $table->index(["alternatif_id"], 'fk_total_bobot_alternatif1_idx');

            $table->index(["user_id"], 'fk_total_bobot_users1_idx');

            $table->index(["bobot_mhs_id"], 'fk_total_bobot_bobot_mhs1_idx');
            $table->nullableTimestamps();


            $table->foreign('bobot_mhs_id', 'fk_total_bobot_bobot_mhs1_idx')
                ->references('id')->on('bobot_mhs')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('alternatif_id', 'fk_total_bobot_alternatif1_idx')
                ->references('id')->on('alternatif')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('user_id', 'fk_total_bobot_users1_idx')
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
