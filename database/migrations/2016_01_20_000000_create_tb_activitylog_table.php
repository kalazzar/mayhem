<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbActivityLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_activitylog', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('accessid')->nullable();
			$table->string('clientip')->nullable();
			$table->string('logdate')->nullable();
			$table->string('logtime')->nullable();
            $table->string('trancode')->nullable();
            $table->string('status')->nullable();
			$table->string('logdesc')->nullable();
            /**
             * Add Foreign/Unique/Index
             */
            //$table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /**
         * Remove Foreign/Unique/Index
         */
        Schema::table('tb_activitylog', function (Blueprint $table) {
            //$table->dropIndex('user_id_index');
        });

        Schema::drop('tb_activitylog');
    }
}
