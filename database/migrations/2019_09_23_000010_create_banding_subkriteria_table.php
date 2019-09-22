<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBandingSubkriteriaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'banding_subkriteria';

    /**
     * Run the migrations.
     * @table banding_subkriteria
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->float('nilai')->default('0');
            $table->unsignedInteger('user_id');
            $table->string('sk_banding', 45);
            $table->string('sk_pembanding', 45);

            $table->index(["sk_banding"], 'fk_banding_subkriteria_subkriteria1_sk_banding');

            $table->index(["user_id"], 'fk_banding_subkriteria_users1_idx');

            $table->index(["sk_pembanding"], 'fk_banding_subkriteria_subkriteria2_sk_pembanding');
            $table->nullableTimestamps();


            $table->foreign('user_id', 'fk_banding_subkriteria_users1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('sk_banding', 'fk_banding_subkriteria_subkriteria1_sk_banding')
                ->references('kode')->on('subkriteria')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('sk_pembanding', 'fk_banding_subkriteria_subkriteria2_sk_pembanding')
                ->references('kode')->on('subkriteria')
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
