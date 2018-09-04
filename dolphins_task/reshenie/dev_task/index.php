<?php

ini_set('display_errors', 1);

spl_autoload_register(function($className) {
    // echo "<br>" . $className . "<br>";
    $classPathSplitted = explode('\\', $className);
    $vendor = $classPathSplitted[0];
    $classPath = str_replace(
        $vendor . "\\",
        "",
        $className
    );
    $classPath = str_replace("\\", "/", $classPath);
    if (!is_readable($classPath.'.php')) {
        throw new \Exception();
    }
    require_once $classPath . ".php";
});

$configName = getenv('CONFIG_NAME');

$dbConfigClass = '\\dev_task\\Configs\\' . $configName . '\\DbConfig';

\dev_task\Db::setInstance(
    $dbConfigClass::USER,
    $dbConfigClass::PASS,
    $dbConfigClass::DBNAME,
    $dbConfigClass::HOST
);

$scriptName = explode('/', $_SERVER['SCRIPT_NAME']);
//http://localhost/dev_task/ticket/buy
$requestUri = explode('/', $_SERVER['REQUEST_URI']);

$controllerIndex = 0;

foreach ($scriptName as $k => $v) {
    if($v == 'index.php') {
       $controllerIndex =  $k;
        break;
    }
}

$actionIndex = $controllerIndex + 1;
$controllerName = $requestUri[$controllerIndex];
$actionName = $requestUri[$actionIndex];

$controllerClassName = 'dev_task\\Controllers\\'
.ucfirst($controllerName)
. 'Controller';

$view = new \dev_task\View($controllerName, $actionName);

try {
    $controller = new $controllerClassName($view);
} catch (\Exception $e) {
    echo "No such controller";
}


if (!method_exists($controller, $actionName)) {
    die ("no such action");
}

$controller->$actionName();
$view->render();





