<?php

 use Illuminate\Http\Request;
//use App\controllers\HomeController;
// Create Router instance
use App\controllers\Authentication;
use App\models\User;

$router = new \Bramus\Router\Router();

$request = new Request;

$router->set404(function() {
    header('HTTP/1.1 404 Not Found');
    // ... do something special here
});


$router->get('/', '\App\controllers\HomeController@index');

$router->mount('/api', function() use ($router) {
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    
    
    $router->get('/', function() {
        echo 'api';
    });

    $router->post('/signup', '\App\controllers\Authentication@signup');
    $router->post('/login', '\App\controllers\Authentication@login');

    $router->before('GET|POST|PUT|DELETE', '/courses.*', function() {
        $headers = apache_request_headers();
        if (!isset($headers['Authorization'])) {
            header('HTTP/1.0 401 Unauthorized');
            echo "No token provided.";
            exit;
        }else{
            $user = User::where('token', $headers['Authorization'])
                        ->first();
            if (empty($user)) {
                header('HTTP/1.0 401 Unauthorized');
                echo "No token provided.";
                exit;
            }
        }
    });

    $router->before('GET|POST|PUT|DELETE', '/students.*', function() {
        $headers = apache_request_headers();

        if (!isset($headers['Authorization'])) {
            header('HTTP/1.0 401 Unauthorized');
            echo "No token provided.";
            exit;
        }else{
            $user = User::where('token', $headers['Authorization'])
                        ->first();

            if (empty($user)) {
                header('HTTP/1.0 401 Unauthorized');
                echo "No token provided.";
                exit;
            }
        }
    });

    $router->mount('/courses', function() use ($router) {
        $router->get('/', '\App\controllers\CourseController@index');
        $router->get('/(\d+)', '\App\controllers\CourseController@show');
        $router->post('/', '\App\controllers\CourseController@save');        
        $router->put('/update/(\d+)', '\App\controllers\CourseController@update');                
    });


    $router->mount('/students', function() use ($router) {
        $router->get('/', '\App\controllers\StudentController@index');
    });

    $router->get('/(\d+)', function($id) {
        echo 'movie id ' . htmlentities($id);
    });

});


$router->run();


