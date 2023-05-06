<?php

class HomeController extends BaseController
{
    public function index()
    {
        $barangList = $this->model('Barang')->getBarang();
    }
}