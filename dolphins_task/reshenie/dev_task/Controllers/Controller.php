<?php
namespace dev_task\Controllers;

class Controller
{
    protected $view;

    public function __construct(\dev_task\View $view)
    {
        $this->view = $view;
    }
}