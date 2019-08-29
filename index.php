<?php

header("access-control-allow-origin: http://localhost:3000");

require './vendor/autoload.php';


require './config/database.php';

require './routes/route.php';

$headers = apache_response_headers();
return var_dump($headers);