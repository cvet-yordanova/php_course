<?php
namespace dev_task;

class View
{
    private $controllerName;
    private $actionName;
    public function __construct($controllName, $actionName)
    {
        $this->controllerName = $controllName;
        $this->actionName = $actionName;
    }
    public function render()
    {
        require_once 'Views/' . $this->controllerName
            . '/' . $this->actionName . '.php';
    }
}