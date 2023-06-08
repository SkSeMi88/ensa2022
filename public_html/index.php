<?php
echo "test";
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// spl_autoload_register(function (string $className) {
//     require_once __DIR__ . '/../src/' . $className . '.php';
// });

// $route = $_GET['route'] ?? '';

// $pattern = '~^hello/(.*)$~';
// preg_match($pattern, $route, $matches);

// if (!empty($matches)) {
//     $controller = new \MyProject\Controllers\MainController();
//     $controller->sayHello($matches[1]);
//     return;
// }

// $pattern = '~^$~';
// preg_match($pattern, $route, $matches);

// if (!empty($matches)) {
//     $controller = new \MyProject\Controllers\MainController();
//     $controller->main();
//     return;
// }

try {
    
    // echo "!@#$%^&*()";
    $route = $_GET['route'] ?? '';

    // $routes = require __DIR__ . str_replace("\\","/",'/../src/routes.php');

    $routes				= require '../src/routes.php';

    $admin_settings		= require '../src/settings.php';

    // echo "<pre>";
    // var_dump($routes);

    // var_dump($admin_settings["admin_routes"]);
    // var_dump($admin_settings["users_routes"]);

    $tmp_routes			= array_merge($routes, $admin_settings["admin_routes"]);
    $routes 			= array_merge($tmp_routes, $admin_settings["users_routes"]);
    
    // $routes		= $tmp_routes;
	// spl_autoload_register(function (string $className) {
    //     //echo "<br>";
    //     //var_dump(file_exists("../src/". str_replace("\\","/",$className.".php")));
    //     //echo "<br>";
        
    //    // var_dump(__DIR__ . "../src/". str_replace("\\","/",$className.".php"));
        
    //    // exit;
        
        
	// 	// echo "<br>".__DIR__ . '/../src/' . $className . '.php';
    //     //echo "<br>".__DIR__ . '/../src/' . str_replace("\\","/",$className) . '.php';
	//      //require_once  '../src/' . $className . '.php';
    //     // echo '<br>../src/' . str_replace("\\","/",$className) . '.php';
    //     // echo '<br>../src/' . str_replace("\\","/",$className) . '.php';

    //     // require_once '../src/' . str_replace("\\","/",$className) . '.php';


        
        
	// });
    require_once '../vendor/autoload.php';
    // var_dump($routes);
    
    // echo "</pre>";

    $isRouteFound = false;
    foreach ($routes as $pattern => $controllerAndAction) {
    	// print_r($pattern);
        preg_match($pattern, $route, $matches);
        if (!empty($matches)) {
            $isRouteFound = true;
            break;
        }
    }

	if (!$isRouteFound) {
	    throw new \MyProject\Exceptions\NotFoundException();
	}

    unset($matches[0]);

    $controllerName = $controllerAndAction[0];
    $actionName = $controllerAndAction[1];

    $controller = new $controllerName();
    $controller->$actionName(...$matches);
} catch (\MyProject\Exceptions\DbException $e) {
    $view = new \MyProject\View\View(__DIR__ . '/../templates/errors');
    $view->renderHtml('500.php', ['error' => $e->getMessage()], 500);

} catch (\MyProject\Exceptions\NotFoundException $e) {
    $view = new \MyProject\View\View(__DIR__ . '/../templates/errors');
    $view->renderHtml('404.php', ['error' => $e->getMessage()], 404);
} catch (\MyProject\Exceptions\UnauthorizedException $e) {
    $view = new \MyProject\View\View(__DIR__ . '/../templates/errors');
    $view->renderHtml('401.php', ['error' => $e->getMessage()], 401);
} 
// catch (\MyProject\Exceptions\ForbiddenException $e) {
//     $view = new \MyProject\View\View(__DIR__ . '/../templates/errors');
//     var_dump($this->user);
//     $view->renderHtml('403.php', ['error' => $e->getMessage()], 403);
// }