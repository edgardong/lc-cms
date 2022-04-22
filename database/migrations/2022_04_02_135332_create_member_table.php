<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member', function (Blueprint $table) {
            $table->id();
            $table->string('nickname')->nullable()->comment('用户昵称');
            $table->string('username')->unique()->comment('用户名');
            $table->integer('type')->default(100)->comment('用户类型');
            $table->integer('status')->default(0)->comment('用户状态 0:可用,1:禁用,2:删除');
            $table->string('email')->unique()->nullable()->comment('用户邮箱');
            $table->timestamp('email_verified_at')->nullable()->comment('用户邮箱验证时间');
            $table->string('password')->comment('密码');
            $table->rememberToken()->comment('用户token');
            $table->string('last_login_time')->comment('上次登录时间');
            $table->string('last_login_ip')->comment('上次登录ip');
            $table->string('mp_openid')->comment('用户小程序openid');
            $table->string('wx_openid')->comment('用户公众号openid');
            $table->string('wx_unionid')->comment('微信平台联合ID');
            $table->string('qq')->comment('用户qq');
            $table->string('avatar')->comment('用户头像');
            $table->string('birthday')->comment('用户生日');
            $table->string('sex')->comment('用户性别');

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
        Schema::dropIfExists('member');
    }
}
