<?php

// // spl_autoload_register(function (string $className) {
// //     require_once __DIR__ . '/../src/' . $className . '.php';
// // });

// // $route = $_GET['route'] ?? '';

// // $pattern = '~^hello/(.*)$~';
// // preg_match($pattern, $route, $matches);

// // if (!empty($matches)) {
// //     $controller = new \MyProject\Controllers\MainController();
// //     $controller->sayHello($matches[1]);
// //     return;
// // }

// // $pattern = '~^$~';
// // preg_match($pattern, $route, $matches);

// // if (!empty($matches)) {
// //     $controller = new \MyProject\Controllers\MainController();
// //     $controller->main();
// //     return;
// // }

// try {
// 	// spl_autoload_register(function (string $className) {
// 	// 	// echo "<br>".__DIR__ . '/../src/' . $className . '.php';
// 	//     require_once __DIR__ . '/../src/' . $className . '.php';
// 	// });


// // Локаль.
// // header('Content-type: text/html; charset=utf-8');
// // date_default_timezone_set('Europe/Moscow');


// require __DIR__ . '/../vendor/autoload.php';

// setlocale(LC_ALL, 'ru_RU.utf8');
// mb_internal_encoding('UTF-8');
// mb_regex_encoding('UTF-8');
// mb_http_output('UTF-8');
// mb_language('uni');

//     $route = $_GET['route'] ?? '';
    

<<<<<<< HEAD
//     $api_routes     = require __DIR__ . '/../src/routes_api.php';
//     $routes         = require __DIR__ . '/../src/routes.php';
//     $admin_settings = require '../src/settings.php';
=======
    $api_routes     = require __DIR__ . '/../src/routes_api.php';
    $routes         = require __DIR__ . '/../src/routes.php';
    $admin_settings = require '../src/settings.php';
>>>>>>> a30208e1742a64943574920e2df4fe8fc7726c92
    
//     echo "<pre>";
//     // var_dump($routes);
    
<<<<<<< HEAD
//     // var_dump($admin_settings["admin_routes"]);
//     $tmp_routes			= array_merge($routes, $admin_settings["admin_routes"],$api_routes);
    
//     $routes		= $tmp_routes;
//     var_dump($routes);
=======
    // var_dump($admin_settings["admin_routes"]);
    $tmp_routes			= array_merge($routes, $admin_settings["admin_routes"],$api_routes);
    
    $routes		= $tmp_routes;
    var_dump($routes);
>>>>>>> a30208e1742a64943574920e2df4fe8fc7726c92
    
//     echo "</pre>";

//     $isRouteFound = false;
//     foreach ($routes as $pattern => $controllerAndAction) {
//         preg_match($pattern, $route, $matches);
//         if (!empty($matches)) {
//             $isRouteFound = true;
//             break;
//         }
//     }

// 	if (!$isRouteFound) {
// 	    throw new \MyProject\Exceptions\NotFoundException();
// 	}

//     unset($matches[0]);

//     $controllerName = $controllerAndAction[0];
//     $actionName = $controllerAndAction[1];

//     $controller = new $controllerName();
//     $controller->$actionName(...$matches);
// } catch (\MyProject\Exceptions\DbException $e) {
//     $view = new \MyProject\View\View(__DIR__ . '/../templates/errors');
//     $view->renderHtml('500.php', ['error' => $e->getMessage()], 500);

// } catch (\MyProject\Exceptions\NotFoundException $e) {
//     $view = new \MyProject\View\View(__DIR__ . '/../templates/errors');
//     $view->renderHtml('404.php', ['error' => $e->getMessage()], 404);
// } catch (\MyProject\Exceptions\UnauthorizedException $e) {
//     $view = new \MyProject\View\View(__DIR__ . '/../templates/errors');
//     $view->renderHtml('401.php', ['error' => $e->getMessage(), 'user'=>null], 401);
// } 
// // catch (\MyProject\Exceptions\ForbiddenException $e) {
// //     $view = new \MyProject\View\View(__DIR__ . '/../templates/errors');
// // //    var_dump($this->user);
// //     $view->renderHtml('403.php', ['error' => $e->getMessage()], 403);
// // }