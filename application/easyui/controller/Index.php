<?php
namespace app\easyui\controller;

use think\Controller;
class Index extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    public function welcome()
    {
        echo $this->fetch();
        exit;
    }

    public function table()
    {
        return $this->fetch();
    }
}