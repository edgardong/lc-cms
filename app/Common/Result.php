<?php

namespace App\Common;

use App\Enums\ErrorCode;
use BenSampo\Enum\Enum;

class Result
{

  /**
   * 返回正常结果
   * @param mixed data
   */
  public static function ok($data = null)
  {

    $result = [
      'err_code' => 0,
      'err_msg' => '操作成功',
      'data' => $data,
      'status' => 'success',
    ];
    return response()->json($result);
  }

  /**
   * 返回错误结果
   * @param int code
   * @param string message
   */
  public static function error($code = 50000, $message = '未知异常，请联系管理员')
  {
    $data = [
      'err_code' => $code,
      'err_msg' => $message,
      'data' => '',
      'status' => 'fail',
    ];

    return response()->json($data);
  }

  /**
   * 返回错误结果
   * @param int code
   * @param string message
   */
  public static function enumError(array $enum)
  {
    $data = [
      'err_code' => $enum['code'],
      'err_msg' => $enum['msg'],
      'data' => '',
      'status' => 'fail',
    ];

    return response()->json($data);
  }
}
