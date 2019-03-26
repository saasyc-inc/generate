<?php

namespace Yiche\Generate;

use Illuminate\Support\Facades\DB;

class Generate
{
    /**
     * 数字格式
     * @param  [type] $type [description]
     * @return [type]       [description]
     */
    public static function id($type, $long = 8)
    {
        $typeList = [
            10, 11, 12, 13, 14, 15, 16, 17, 18, 19,
            20, 21, 22, 23, 24, 25, 26, 27, 28, 29,
            30, 31, 32, 33, 34, 35, 36, 37, 38, 39,
            40, 41, 42, 43, 44, 45, 46, 47, 48, 49,
            50, 51, 52, 53, 54, 55, 56, 57, 58, 59,
            60, 61, 62, 63, 64, 65, 66, 67, 68, 69,
            70, 71, 72, 73, 74, 75, 76, 77, 78, 79,
            80, 81, 82, 83, 84, 85, 86, 87, 88, 89,
            90, 91, 92, 93, 94, 95, 96, 97, 98, 99,
        ];
        //定义的类型范围内
        if (empty($type) || !in_array($type, $typeList)) {
            return 0;
        }
        DB::insert("REPLACE INTO `id_{$type}`(`stub`) VALUES(1);");
        $id = DB::getPdo()->lastInsertId();
        $id %= 99999999; //求余，保留8位数，每日数据超过8位数，需要扩展位数
        $idFormat = sprintf("%08d", $id);
        $newId = $type . date('ymd') . $idFormat;
        return $newId;
    }

    /**
     * 比如uuid，待完善
     * @return [type] [description]
     */
    public static function uuid()
    {

    }
}
