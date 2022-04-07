<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique()->comment('菜单编码');
            $table->string('name')->nullable()->comment('菜单名称');
            $table->integer('type')->default(1)->comment('菜单类型1：系统菜单2：权限菜单');
            $table->integer('status')->default(0)->comment('用户状态 0:可用,1:禁用,2:删除');
            $table->string('icon')->nullable()->comment('菜单图标');
            $table->integer('sort')->nullable()->comment('菜单排序');
            $table->string('site')->nullable()->comment('菜单所属站点');
            $table->string('pid')->nullable()->comment('上级菜单id');
            $table->string('desc')->nullable()->comment('菜单描述');
            $table->string('app_module')->nullable()->comment('菜单所属模块');
            $table->string('plugin')->nullable()->comment('菜单所属插件');
            $table->boolean('is_show')->nullable()->default(1)->comment('是否显示');
            $table->boolean('is_control')->nullable()->default(1)->comment('是否启用权限控制');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu');
    }
}
