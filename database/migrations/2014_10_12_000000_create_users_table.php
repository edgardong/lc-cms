<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()->autoIncrement()->comment('用户ID');
            $table->string('nickname')->nullable()->comment('用户昵称');
            $table->string('username')->unique()->comment('用户名');
            $table->integer('type')->default(100)->comment('用户类型');
            $table->integer('status')->default(0)->comment('用户状态 0:可用,1:禁用,2:删除');
            $table->string('email')->unique()->nullable()->comment('用户邮箱');
            $table->timestamp('email_verified_at')->nullable()->comment('用户邮箱验证时间');
            $table->string('password')->comment('密码');
            $table->rememberToken()->comment('用户token');
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
        Schema::dropIfExists('users');
    }
}
