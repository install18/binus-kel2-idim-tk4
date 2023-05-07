<?php

class HomeController extends BaseController
{
    public function index()
    {
        $data['title'] = 'Home';
        $data['listBarang'] =  $this->model('Barang')->getBarang();
        $this->view('template/header', $data);
        $this->view('Home/Home', $data);
        $this->view('template/footer');
    }
}
