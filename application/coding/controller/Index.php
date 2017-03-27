<?php

namespace app\coding\controller;

use think\Controller;
class Index extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    public function baseController()
    {
        return $this->fetch('base_controller');
    }

    public function crudController()
    {
        return $this->fetch('crud_controller');
    }

    public function baseModel()
    {
        return $this->fetch('base_model');
    }

    public function validateModel()
    {
        return $this->fetch('validate_model');
    }
}