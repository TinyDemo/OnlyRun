<?php

use App\Controller\IndexController;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$collection = new RouteCollection();
$collection->add('index', new Route('/', ['controller' => IndexController::class,'action'=>'index']));

return $collection;
