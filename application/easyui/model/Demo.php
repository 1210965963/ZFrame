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
        $where = [];
        if (isset($params['search']) && count($params['search'])) {
            $where = array_map('trim', $params['search']);
        }

        return static::where($where)->order('create_time', 'desc')->paginate($params['rows']);
    }
}