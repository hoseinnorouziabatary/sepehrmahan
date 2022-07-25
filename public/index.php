<?php




    $router = require "../auth/register.php";

    return $router;




    require "../vendor/autoload.php";

    $router = new \Core\Router();
    $router->add('/' , [ 'uses' => 'Home@index' ] );
    $router->add('/register' , [ 'uses' => 'Register@index' ] );
   

    $router->dispatch($_SERVER["QUERY_STRING"]);


    
    
    
    
    
    
    






