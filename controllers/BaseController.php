<?php

class BaseController
{
    public function view($view, $data = [])
    {
        require_once '../app/view/template/header.php';
        require_once '../app/view/' . $view . '.php';
        require_once '../app/view/template/footer.php';
    }

    public function model($model)
    {
        require_once '../app/models/' . $model . 'Model.php';
        return new $model;
    }
}