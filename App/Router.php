<?php

$router = new \Core\Router();

$router->add('/' , 'HomeController@index');
$router->add('/series' , [ 'uses' => 'SeriesController@welcome' ] );
$router->add('/register' , 'SeriesController@register');



return $router;
