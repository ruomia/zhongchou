<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableReturns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('returns', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('crowfd_id')->comment('众筹ID');
            $table->unsignedInteger('money')->comment('支持金额');
            $table->string('title')->comment('回报标题');
            $table->string('content')->comment('回报内容');
            $table->unsignedInteger('people_num')->comment('人数上线');
            $table->string('img')->comment('回报图片');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('returns');
    }
}
