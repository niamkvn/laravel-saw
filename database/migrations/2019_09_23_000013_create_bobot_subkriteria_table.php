<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBobotSubkriteriaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'bobot_subkriteria';

    /**
     * Run the migrations.
     * @table bobot_subkriteria
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->float('bobot')->default('0');
            $table->float('bobot_global')->default('0');
            $table->unsignedInteger('subkriteria_id');
            $table->unsignedInteger('user_id');

            $table->index(["user_id"], 'fk_bobot_subkriteria_users2_idx');

            $table->index(["subkriteria_id"], 'fk_bobot_subkriteria_subkriteria2_idx');
            $table->nullableTimestamps();


            $table->foreign('subkriteria_id', 'fk_bobot_subkriteria_subkriteria2_idx')
                ->references('id')->on('subkriteria')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('user_id', 'fk_bobot_subkriteria_users2_idx')
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
