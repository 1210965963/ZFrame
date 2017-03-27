<?php
namespace app\easyui\model;

use think\Model;
class Demo extends Model
{
    protected $autoWriteTimestamp = 'datetime';

    protected $createTime = 'create_time';

    protected $updateTime = 'update_time';

    public static function search($params)
    {
        return static::order('create_time', 'desc')->paginate($params['rows']);
    }
}