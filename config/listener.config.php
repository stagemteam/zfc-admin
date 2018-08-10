<?php
/**
 * The MIT License (MIT)
 * Copyright (c) 2018 Stagem Team
 * This source file is subject to The MIT License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/MIT
 *
 * @category Stagem
 * @package Stagem_ZfcAdmin
 * @author Serhii Popov <popow.serhii@gmail.com>
 * @license https://opensource.org/licenses/MIT The MIT License (MIT)
 */

/*$events->getSharedManager()->attach(
    'Zend\View\Helper\Navigation\AbstractHelper',
    'isAllowed',
    ['Zend\View\Helper\Navigation\Listener\AclListener', 'accept']
);*/

return [
    'definitions' => [
        [
            'listener' => Stagem\ZfcAdmin\View\Helper\Listener\NavigationAclListener::class,
            'method' => 'accept',
            'event' => 'isAllowed',
            'identifier' => Zend\View\Helper\Navigation\AbstractHelper::class,
            'priority' => -10,
        ],
    ],
];