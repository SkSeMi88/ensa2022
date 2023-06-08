<?php

<<<<<<< HEAD
echo "TEST API";

=======
>>>>>>> a30208e1742a64943574920e2df4fe8fc7726c92
// require __DIR__ . '/../../vendor/autoload.php';

// $entity = [
//     'kek' => 'cheburek',
//     'lol' => [
//         'foo' => 'bar'
//     ]
// ];

// header('Content-type: application/json; charset=utf-8');
// echo json_encode($entity);

/*

require __DIR__ . '/../../vendor/autoload.php';

try {

    $route = $_GET['route'] ?? '';
    $routes = require __DIR__ . '/../../src/routes_api.php';

    $isRouteFound = false;
    foreach ($routes as $pattern => $controllerAndAction) {
        preg_match($pattern, $route, $matches);
        if (!empty($matches)) {
            $isRouteFound = true;
            break;
        }
    }

    if (!$isRouteFound) {
        throw new \MyProject\Exceptions\NotFoundException('Route not found');
    }

    unset($matches[0]);

    $controllerName = $controllerAndAction[0];
    $actionName = $controllerAndAction[1];

    $controller = new $controllerName();
    $controller->$actionName(...$matches);
} catch (\MyProject\Exceptions\DbException $e) {
    $view = new \MyProject\View\View(__DIR__ . '/../templates/errors');
    $view->displayJson(['error' => $e->getMessage()], 500);
} catch (\MyProject\Exceptions\NotFoundException $e) {
    $view = new \MyProject\View\View(__DIR__ . '/../templates/errors');
    $view->displayJson(['error' => $e->getMessage()], 404);
} catch (\MyProject\Exceptions\UnauthorizedException $e) {
    $view = new \MyProject\View\View(__DIR__ . '/../templates/errors');
    $view->displayJson(['error' => $e->getMessage()], 401);
}
*/


require __DIR__ . '/../../vendor/autoload.php';

try {
    // var_dump($_GET);
    $routes = require __DIR__ . '/../../src/routes_api.php';
    // var_dump($routes);
    $route = $_GET['route'] ?? '';

    $requestMethod = $_SERVER['REQUEST_METHOD'];
    // var_dump($requestMethod);
    // echo "\n";
    // print_r($route);
    // phpinfo();
    
    $isRouteFound = false;
    foreach ($routes as $pattern => $controllerAndAction) {
        // echo "\n";
        // echo "\n";
        // echo "<hr>";
        // print_r($pattern);
        $tmp = preg_match($pattern, $route, $matches);
        // echo "\n";
        // var_dump($matches);
        if (!empty($matches)) {
            $isRouteFound = true;
            break;
        }
    }

    if (!$isRouteFound) {
        throw new \MyProject\Exceptions\NotFoundException('Route not found');
    }

    unset($matches[0]);

    $controllerName = $controllerAndAction[0];
    $actionName = $controllerAndAction[1];
    $routeMethod = $controllerAndAction[2];

    if ($requestMethod!==$routeMethod)
    {
        $response["status"] = false;
        $response["msgs"][] = "Ошибка. Метод (запроса) не поддерживается.";

        $view = new \MyProject\View\View(__DIR__ . '/../templates/errors');
        $view->displayJson($response, 405);
        exit();
    }




    $controller = new $controllerName();
    $controller->$actionName(...$matches);
} catch (\MyProject\Exceptions\DbException $e) {
    $view = new \MyProject\View\View(__DIR__ . '/../templates/errors');
    $view->displayJson(['error' => $e->getMessage()], 500);
} catch (\MyProject\Exceptions\NotFoundException $e) {
    $view = new \MyProject\View\View(__DIR__ . '/../templates/errors');
    $view->displayJson(['error' => $e->getMessage()], 404);
} catch (\MyProject\Exceptions\UnauthorizedException $e) {
    $view = new \MyProject\View\View(__DIR__ . '/../templates/errors');
    $view->displayJson(['error' => $e->getMessage()], 401);
}