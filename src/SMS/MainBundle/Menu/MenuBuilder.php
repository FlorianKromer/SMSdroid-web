<?php
namespace SMS\MainBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\Request;

class MenuBuilder
{
    private $factory;

    /**
     * @param FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createMainMenu(Request $request)
    {
        $menu = $this->factory->createItem('root');
$menu->setChildrenAttributes(array('class' => 'nav navbar-nav'));
        $menu->addChild('Résultat/Classement', array('route' => 'sms_main_league'));
        $menu->addChild('Calendrier', array('route' => 'sms_main_calendar'));
        $menu->addChild('Tableau', array('route' => 'sms_main_table'));
        $menu->addChild('Evolution', array('route' => 'sms_main_evolution'));
        $menu->addChild('Stats', array('route' => 'sms_main_stats'));

        return $menu;
    }
}
