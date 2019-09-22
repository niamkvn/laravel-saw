<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBobotMhsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'bobot_mhs';

    /**
     * Run the migrations.
     * @table bobot_mhs
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->float('bobot')->default('0');
            $table->dateTime('created_at')->nullable()->default(null);
            $table->dateTime('update_at')->nullable()->default(null);
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('nilai_mhs_id');

            $table->index(["nilai_mhs_id"], 'fk_bobot_mhs_nilai_mhs1_idx');

            $table->index(["user_id"], 'fk_bobot_mhs_users1_idx');


            $table->foreign('user_id', 'fk_bobot_mhs_users1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('nilai_mhs_id', 'fk_bobot_mhs_nilai_mhs1_idx')
                ->references('id')->on('nilai_mhs')
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
