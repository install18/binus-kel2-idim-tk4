<?php

class BaseController
{
    public function view($view, $data = [])
    {
        require_once '../app/view/' . $view . '.php';
    }

    public function model($model)
    {
        require_once '../app/model/' . $model . 'Model.php';
        return new $model;
    }
}