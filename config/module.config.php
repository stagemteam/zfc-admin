<?php
namespace Popov\ZfcLayout;

use Zend\Mvc\Router\Http\Literal;
use Zend\Mvc\Router\Http\Segment;
//use Zend\Router\Http\Literal;
//use Zend\Router\Http\Segment;

return [

    'assetic_configuration' => array_merge_recursive(
        require_once realpath('config/autoload/assets.php'),
        require_once 'assets.config.php'
    ),

    'router' => require_once 'routes.config.php',


    /*'router' => [
        'routes' => require_once 't.php'
    ],*/

    /*'router' => [
        'routes' => [
            'home' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => 'index',
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],*/

    'controllers' => [
        'invokables' => [
            'index' => Controller\HomeController::class,
        ],
    ],

	'view_helper_config' => [
		'flashMessenger' => [
			'message_open_format'      => '<div%s><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><ul><li>',
			'message_close_string'     => '</li></ul></div>',
			'message_separator_string' => '</li><li>'
		]
	],

    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => [
            'layout/layout' => __DIR__ . '/../view/layout/default.phtml',
            'layout/ajax' => __DIR__ . '/../view/layout/ajax.phtml',
            //'widget/menu'	=> __DIR__ . '/../view/widget/menu.phtml',
            'widget/breadcrumb' => __DIR__ . '/../view/widget/breadcrumb.phtml',
            'widget/flashMessages' => __DIR__ . '/../view/widget/flashMessages.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __NAMESPACE__ => __DIR__ . '/../view',
        ],
    ],
];