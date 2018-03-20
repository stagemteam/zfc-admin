<?php
/**
 * The MIT License (MIT)
 * Copyright (c) 2018 Serhii Stagem
 * This source file is subject to The MIT License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/MIT
 *
 * @category Stagem
 * @package Stagem_ZfcAdmin
 * @author Serhii Stagem <popow.serhii@gmail.com>
 * @license https://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace Stagem\ZfcAdmin;

use Stagem\ZfcAction\Page;

return [
    /*[
        'name' => 'default/more',
        //'path' => '/[:resource[/[:action[/:more]]]]',
        'path' => '(/:locale)(/:resource(/:action(/:more+)))',
        'middleware' => [Page\ConnectivePage::class, Page\RendererMiddleware::class],
        'options' => [
            'conditions' => [
                'resource' => '[a-zA-Z]?[a-zA-Z0-9_-]*',
                'action' => '[a-zA-Z]?[a-zA-Z0-9_-]*',
                'more' => '.*',
            ],
            'defaults' => [
                'resource' => 'index',
                'action' => 'index',
            ],
        ],
    ],*/
    [
        'name' => 'admin/home',
        'path' => '/admin',
        'middleware' => [Action\Admin\IndexAction::class, Page\RendererMiddleware::class],
        'allowed_methods' => ['GET'],
        'options' => [
            'defaults' => [
                'area' => 'admin',
                'resource' => 'admin',
                'action' => 'dashboard',
            ],
        ],
    ],
    [
        'name' => 'admin/default',
        //'path' => '/admin/{resource:[a-z-]{3,}}[/[{action:[a-z-]{3,}}[/{id:\d+}[/{more:.*}]]]]',
        'path' => '/admin(/:resource(/:action(/:id(/:more+))))',
        'middleware' => [Page\ConnectivePage::class, Page\RendererMiddleware::class],
        #'allowed_methods' => ['GET', 'POST', 'PUT', 'DELETE'],
        'options' => [ // @todo Add AreaMiddleware which will be check current area as here https://github.com/acelaya/alejandrocelaya.com/blob/master/src/Middleware/LanguageMiddleware.php
            'defaults' => [
                //'layout' => 'admin',
                'area' => 'admin',
                'resource' => 'index',
                'action' => 'index',
            ],
        ],
    ],
];