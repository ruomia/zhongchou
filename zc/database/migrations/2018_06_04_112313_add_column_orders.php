<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('user_name')->comment('用户名');
            $table->string('mobile')->comment('手机号');
            $table->string('adress')->comment('详细地址');
            $table->string('base')->comment('备注');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table-dropColumn('user_name');
            $table-dropColumn('mobile');
            $table-dropColumn('adress');
            $table-dropColumn('base');
        });
    }
}
