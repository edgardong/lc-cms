<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class UserType extends Enum
{
    const Administrator = 0; // 管理员
    const PaidMember = 1; // 付费会员
    const Member = 2; // 普通会员
}
