<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTokensTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'tokens';

    /**
     * Run the migrations.
     * @table tokens
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable()->default(null);
            $table->string('token');
            $table->string('type', 80);
            $table->tinyInteger('is_revoked')->nullable()->default('0');

            $table->index(["user_id"], 'tokens_user_id_foreign');

            $table->index(["token"], 'tokens_token_index');

            $table->unique(["token"], 'tokens_token_unique');
            $table->nullableTimestamps();


            $table->foreign('user_id', 'tokens_user_id_foreign')
                ->references('id')->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');
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
