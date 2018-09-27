<?php
/**
 * The MIT License (MIT)
 * Copyright (c) 2018 Serhii Popov
 * This source file is subject to The MIT License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/MIT
 *
 * @category Popov
 * @package Popov_<package>
 * @author Serhii Popov <popow.serhii@gmail.com>
 * @license https://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace Stagem\ZfcAdmin\View\Helper\Factory;

use Psr\Container\ContainerInterface;
use Zend\View\Helper\Navigation;
use Popov\ZfcUser\Helper\UserHelper;

class NavigationHelperDelegatorFactory
{
    public function __invoke(ContainerInterface $container, $name, callable $callback, array $options = null)
    {
        /** @var UserHelper $userHelper */
        $userHelper = $container->get(UserHelper::class);
        /** @var Navigation $navigation */
        $navigation = $callback();

        // Store ACL and role in the proxy helper:
        $navigation->setAcl($userHelper->getAcl());
        $navigation->setRole($userHelper->current()->getRoles()->first()->getMnemo());

        return $navigation;
    }
}