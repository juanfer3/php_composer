<?php

use Illuminate\Database\Capsule\Manager as Conexion;

$conexion = new Conexion;

$conexion->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'integro',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => ''
]);


$conexion->bootEloquent();