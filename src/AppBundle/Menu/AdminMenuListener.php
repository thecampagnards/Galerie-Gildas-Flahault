<?php

namespace AppBundle\Menu;

use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

final class AdminMenuListener
{
    /**
     * @param MenuBuilderEvent $event
     */
    public function addAdminMenuItems(MenuBuilderEvent $event)
    {
        $menu = $event->getMenu();

        $newSubmenu = $menu
            ->addChild('new')
            ->setLabel('Articles')
        ;

        $newSubmenu
            ->addChild('new-subitem')
            ->setLabel('Actualités')
            ->setLabelAttribute('icon', 'newspaper')
        ;
    }
}
