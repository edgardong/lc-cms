<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ErrorCode extends Enum
{
    /**
     * 该用户已存在，请直接登录
     */
    const USER_EXIST = array('code' => 10001, 'msg' => '该用户已存在，请直接登录');
    /**
     * 用户名或密码错误
     */
    const USER_IDENTITY_ERROR = array('code'=> 40001, 'msg'=> '用户名或密码错误');
    const OptionTwo = 1;
    const OptionThree = 2;
}
