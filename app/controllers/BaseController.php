<?php

class BaseController
{
    public function view($view, $data = [])
    {
        require_once '../app/view/' . $view . '.php';
    }

    public function model($model)
    {
        $model = $model . 'Model';

        require_once '../app/models/BaseModel.php';
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }
}
