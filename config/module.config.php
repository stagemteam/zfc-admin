<?php
namespace Stagem\ZfcAdmin;

return [
    'assetic_configuration' => require 'assets.config.php',

    'actions' => [
        'admin' => __NAMESPACE__ . '\Action'
    ],

    // mvc
    'controllers' => [
        'invokables' => [
            'index' => Controller\HomeController::class,
        ],
    ],

    // mvc
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => [
            'layout::admin' => __DIR__ . '/../view/layout/admin.phtml',
            #'layout/ajax' => __DIR__ . '/../view/layout/ajax.phtml',
            'widget/breadcrumb' => __DIR__ . '/../view/widget/breadcrumb.phtml',
            'widget/flashMessages' => __DIR__ . '/../view/widget/flashMessages.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ],
        'prefix_template_path_stack' => [
            'admin::' => __DIR__ . '/../view',
        ],
    ],

    // middleware
    'templates' => [
        'paths' => [
            'admin-admin'  => [__DIR__ . '/../view/admin'],
            'layout' => [__DIR__ . '/../view/layout'],
            'widget' => [__DIR__ . '/../view/widget'],
        ],
    ],
];