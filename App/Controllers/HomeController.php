<?php namespace App\Controllers;

use Core\Controller;
use Core\View;
use App\Models\User;

class HomeController extends Controller
{
    public function index(){

        // $user =new User();
        // var_dump($user->SelectAll());die();
         $resp= View::render("index");
         

        // var_dump($_SERVER['REQUEST_METHOD']);die();
      
    
       
    }


       
    
}