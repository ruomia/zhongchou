<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrowdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crowds', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title')->comment('标题');
			$table->string('money')->comment('筹款');
			$table->string('target')->comment('目标凑款');
			$table->longText('explain')->comment('项目描述');
			$table->longText('content')->comment('项目详情');
			$table->unsignedInteger('type')->comment('项目类型');
			$table->unsignedInteger('user_id')->comment('用户id');
			$table->unsignedInteger('support')->default(0)->comment('支持数');
			$table->string('image')->comment('图片');
			$table->index('user_id');
			$table->engine='innodb';
			$table->comment='众筹表';






		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crowds');
    }
}
