<?php

class HomeController extends BaseController
{
    public function index()
    {
        $data['title'] = 'Home';
        $this->view('template/header', $data);
        $this->view('template/footer');
    }
}
