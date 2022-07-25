<?php namespace App\Controllers;

use Core\Controller;
use Core\View;

class SeriesController extends Controller
{
    public function welcome()
    {
         View::render("welcome");
    }
    public function register()
    {
         View::render("register");
    }

}