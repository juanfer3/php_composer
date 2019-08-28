<?php
 use Illuminate\Http\Request;
//use App\controllers\HomeController;
// Create Router instance
$router = new \Bramus\Router\Router();

$request = new Request();

$router->set404(function() {
    header('HTTP/1.1 404 Not Found');
    // ... do something special here
});


$router->get('/', '\App\controllers\HomeController@index');

$router->mount('/api', function() use ($router) {

    $request = new Request();
    $router->get('/login', '\App\controllers\Authentication@login');

    // will result in '/movies/'
    $router->get('/', function() {
        echo 'api';
    });



    // will result in '/movies/id'
    $router->get('/(\d+)', function($id) {
        echo 'movie id ' . htmlentities($id);
    });

});

/*
$router->get('/home', function() {
    return HomeController::index();
});
/** */
// Run it!
$router->run();
/* */

