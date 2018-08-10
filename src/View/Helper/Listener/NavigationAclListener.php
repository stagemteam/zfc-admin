<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Stagem\ZfcAdmin\View\Helper\Listener;

use function collections\first;
use Popov\ZfcUser\Helper\UserHelper;
use Zend\EventManager\Event;
use Popov\ZfcPermission\PermissionHelper;
use Popov\ZfcPermission\Acl\Acl;

/**
 * Default Access Control Listener
 */
class NavigationAclListener
{
    /**
     * Determines whether a page should be accepted by ACL when iterating
     *
     * - If helper has no ACL, page is accepted
     * - If page has a resource or privilege defined, page is accepted if the
     *   ACL allows access to it using the helper's role
     * - If page has no resource or privilege, page is accepted
     * - If helper has ACL and role:
     *      - Page is accepted if it has no resource or privilege.
     *      - Page is accepted if ACL allows page's resource or privilege.
     *
     * @param  Event    $event
     * @return bool
     */
    public static function accept(Event $event)
    {
        /** @var \Zend\Navigation\Page\Mvc $page */
        $accepted = true;

        $params   = $event->getParams();
        $acl      = $params['acl'];
        $page     = $params['page'];
        $role     = $params['role'];

        if ('admin' == $role) {
            return $accepted;
        }

        if (! $acl) {
            return $accepted;
        }

        $area = current($parts = explode('/', $page->getRoute()));
        $controller = $page->getController();
        $action = $page->getAction();

        $resource  = $page->getResource() ?: PermissionHelper::getResourceName($area, $controller, $action);
        $privilege = (string) ($page->getPrivilege() ?: Acl::ACCESS_READ);

        if ($resource || $privilege) {
            $accepted = $acl->hasResource($resource)
                        && $acl->isAllowed($role, $resource, $privilege);
        }

        return $accepted;
    }
}
