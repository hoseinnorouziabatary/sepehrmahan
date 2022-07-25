<?php




    $router = require "../auth/register.php";

    return $router;




    require "../vendor/autoload.php";

    $router = new \Core\Router();
    $router->add('/' , [ 'uses' => 'Home@index' ] );
    $router->add('/login/{username}/{password}' , [ 'uses' => 'register@index' ] );
   

    $router->dispatch($_SERVER["QUERY_STRING"]);


    
    
    
    
    
    
    






