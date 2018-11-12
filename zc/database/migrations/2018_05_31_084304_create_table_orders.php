<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->comment('用户ID');
            $table->unsignedInteger('crowfd_id')->comment('众筹 ID');
            $table->unsignedInteger('return_id')->comment('回报 ID');
            $table->string('crowfd_title')->comment('众筹标题');
            $table->unsignedInteger('order_num')->comment('订购分数');
            $table->unsignedInteger('disable')->comment('是否失效');
            $table->timestamps();
            $table->engine = 'innodb'; 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
