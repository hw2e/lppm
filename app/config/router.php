<?php

use Phalcon\Mvc\Router\Group as RouterGroup;

class Lppm extends RouterGroup
{
    public function initialize()
    {
        // Default paths
        $this->setPaths(
            [
                'module' => 'lppm',
                'namespace' => 'LPPMKP\Lppm\Controllers',
            ]
        );

        $this->setPrefix('');
        $this->add('/', 'index::index');

    }

}


class Office extends RouterGroup
{
    public function initialize($di)
    {
        // Default paths
        $this->setPaths(
            [
                'module' => 'office',
                'namespace' => 'LPPMKP\Office\Controllers',
            ]
        );

        // All the routes start with /blog
        $this->setPrefix('/office');

        $this->add('/', ['controller' => 'index', 'action' => 'index']);
//        $this->add('/errors/show404', 'error::show404');

        $this->add('/:params', [
                'controller' => 'index',
                'action' => 'index',
                'params' => 3,
            ]
        );
        $this->add('/:controller/:params', [
                'controller' => 1,
                'action' => 'index',
                'params' => 3,
            ]
        );
        $this->add('/:controller/:action/:params', [
                'controller' => 1,
                'action' => 2,
                'params' => 3,
            ]
        );
    }
}

class Monitoring extends RouterGroup
{
    public function initialize($di)
    {
        // Default paths
        $this->setPaths(
            [
                'module' => 'monitoring',
                'namespace' => 'LPPMKP\Monitoring\Controllers',
            ]
        );

        // All the routes start with /blog
        $this->setPrefix('/monitoring');

        $this->add('/', ['controller' => 'index', 'action' => 'index']);

        $this->add('/:params', [
                'controller' => 'index',
                'action' => 'index',
                'params' => 3,
            ]
        );
        $this->add('/:controller/:params', [
                'controller' => 1,
                'action' => 'index',
                'params' => 3,
            ]
        );
        $this->add('/:controller/:action/:params', [
                'controller' => 1,
                'action' => 2,
                'params' => 3,
            ]
        );
    }
}

$router = $di->getRouter();


$router->mount(
    new Lppm()
);
$router->mount(
    new Office()
);

$router->mount(
    new Monitoring()
);

// Define your routes here

$router->handle();
