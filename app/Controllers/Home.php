<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        // Render the homepage with nav and Login button
        return view('home');
    }
}
