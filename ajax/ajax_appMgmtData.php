<?php
/**
 * sysPass
 *
 * @author    nuxsmin
 * @link      http://syspass.org
 * @copyright 2012-2015 Rubén Domínguez nuxsmin@syspass.org
 *
 * This file is part of sysPass.
 *
 * sysPass is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * sysPass is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with sysPass.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

define('APP_ROOT', '..');
require_once APP_ROOT . DIRECTORY_SEPARATOR . 'inc' . DIRECTORY_SEPARATOR . 'Init.php';

SP_Util::checkReferer('POST');

if (!SP_Init::isLoggedIn()) {
    SP_Util::logout();
}

if (!SP_Common::parseParams('p', 'itemId', false, true)
    || !SP_Common::parseParams('p', 'actionId', false, true)
) {
    exit();
}

$actionId = SP_Common::parseParams('p', 'actionId', 0);

$tpl = new SP_Template();
$tpl->assign('itemId', SP_Common::parseParams('p', 'itemId', 0));
$tpl->assign('activeTab', SP_Common::parseParams('p', 'activeTab', 0));
$tpl->assign('actionId', $actionId);
$tpl->assign('isView', false);

switch ($actionId) {
case \Controller\ActionsInterface::ACTION_USR_USERS_VIEW:
    $tpl->assign('header', _('Ver Usuario'));
    $tpl->assign('onCloseAction', \Controller\ActionsInterface::ACTION_USR);
    $tpl->assign('isView', true);
    $controller = new \Controller\UsersMgmtC($tpl);
    $controller->getUser();
    break;
case \Controller\ActionsInterface::ACTION_USR_USERS_EDIT:
    $tpl->assign('header', _('Editar Usuario'));
    $tpl->assign('onCloseAction', \Controller\ActionsInterface::ACTION_USR);
    $controller = new \Controller\UsersMgmtC($tpl);
    $controller->getUser();
    break;
case \Controller\ActionsInterface::ACTION_USR_USERS_NEW:
    $tpl->assign('header', _('Nuevo Usuario'));
    $tpl->assign('onCloseAction', \Controller\ActionsInterface::ACTION_USR);
    $controller = new \Controller\UsersMgmtC($tpl);
    $controller->getUser();
    break;
case \Controller\ActionsInterface::ACTION_USR_GROUPS_VIEW:
    $tpl->assign('header', _('Ver Grupo'));
    $tpl->assign('onCloseAction', \Controller\ActionsInterface::ACTION_USR);
    $tpl->assign('isView', true);
    $controller = new \Controller\UsersMgmtC($tpl);
    $controller->getGroup();
    break;
case \Controller\ActionsInterface::ACTION_USR_GROUPS_EDIT:
    $tpl->assign('header', _('Editar Grupo'));
    $tpl->assign('onCloseAction', \Controller\ActionsInterface::ACTION_USR);
    $controller = new \Controller\UsersMgmtC($tpl);
    $controller->getGroup();
    break;
case \Controller\ActionsInterface::ACTION_USR_GROUPS_NEW:
    $tpl->assign('header', _('Nuevo Grupo'));
    $tpl->assign('onCloseAction', \Controller\ActionsInterface::ACTION_USR);
    $controller = new \Controller\UsersMgmtC($tpl);
    $controller->getGroup();
    break;
case \Controller\ActionsInterface::ACTION_USR_PROFILES_VIEW:
    $tpl->assign('header', _('Ver Perfil'));
    $tpl->assign('onCloseAction', \Controller\ActionsInterface::ACTION_USR);
    $tpl->assign('isView', true);
    $controller = new \Controller\UsersMgmtC($tpl);
    $controller->getProfile();
    break;
case \Controller\ActionsInterface::ACTION_USR_PROFILES_EDIT:
    $tpl->assign('header', _('Editar Perfil'));
    $tpl->assign('onCloseAction', \Controller\ActionsInterface::ACTION_USR);
    $controller = new \Controller\UsersMgmtC($tpl);
    $controller->getProfile();
    break;
case \Controller\ActionsInterface::ACTION_USR_PROFILES_NEW:
    $tpl->assign('header', _('Nuevo Perfil'));
    $tpl->assign('onCloseAction', \Controller\ActionsInterface::ACTION_USR);
    $controller = new \Controller\UsersMgmtC($tpl);
    $controller->getProfile();
    break;
case \Controller\ActionsInterface::ACTION_MGM_CUSTOMERS_VIEW:
    $tpl->assign('header', _('Ver Cliente'));
    $tpl->assign('onCloseAction', \Controller\ActionsInterface::ACTION_MGM);
    $tpl->assign('isView', true);
    $controller = new \Controller\AccountsMgmtC($tpl);
    $controller->getCustomer();
    break;
case \Controller\ActionsInterface::ACTION_MGM_CUSTOMERS_EDIT:
    $tpl->assign('header', _('Editar Cliente'));
    $tpl->assign('onCloseAction', \Controller\ActionsInterface::ACTION_MGM);
    $controller = new \Controller\AccountsMgmtC($tpl);
    $controller->getCustomer();
    break;
case \Controller\ActionsInterface::ACTION_MGM_CUSTOMERS_NEW:
    $tpl->assign('header', _('Nuevo Cliente'));
    $tpl->assign('onCloseAction', \Controller\ActionsInterface::ACTION_MGM);
    $controller = new \Controller\AccountsMgmtC($tpl);
    $controller->getCustomer();
    break;
case \Controller\ActionsInterface::ACTION_MGM_CATEGORIES_VIEW:
    $tpl->assign('header', _('Ver Categoría'));
    $tpl->assign('onCloseAction', \Controller\ActionsInterface::ACTION_MGM);
    $tpl->assign('isView', true);
    $controller = new \Controller\AccountsMgmtC($tpl);
    $controller->getCategory();
    break;
case \Controller\ActionsInterface::ACTION_MGM_CATEGORIES_EDIT:
    $tpl->assign('header', _('Editar Categoría'));
    $tpl->assign('onCloseAction', \Controller\ActionsInterface::ACTION_MGM);
    $controller = new \Controller\AccountsMgmtC($tpl);
    $controller->getCategory();
    break;
case \Controller\ActionsInterface::ACTION_MGM_CATEGORIES_NEW:
    $tpl->assign('header', _('Nueva Categoría'));
    $tpl->assign('onCloseAction', \Controller\ActionsInterface::ACTION_MGM);
    $controller = new \Controller\AccountsMgmtC($tpl);
    $controller->getCategory();
    break;
default :
    exit();
    break;
}

$controller->view();