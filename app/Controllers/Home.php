<?php

namespace App\Controllers;
use CodeIgniter\Commands\Translation\LocalizationFinder;

class Home extends BaseController
{
    public function index()
    {
        return view('template/header') . view('welcome_page'). view('template/footer');
    }
}
