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
        $menu->setChildrenAttributes(array('class' => 'nav navbar-nav navbar-right'));
        $menu->addChild('News', array('route' => 'sms_main_news'));
        // $about = $menu->addChild('menu_core.menu.about', array('route' => $routeName ))
        //         ->setLabel($this->translator->trans('menu_core.menu.about', array(), 'menu' ));


        $menu->addChild('Informations')->setAttribute('dropdown', true);
        $menu['Informations']->addChild('Services', array('route' => 'sms_main_services'));
        $menu['Informations']->addChild('A propos', array('route' => 'sms_main_about'));

        $menu->addChild('Mon compte', array('route' => 'sms_main_compte'));
        $menu->addChild('Contact', array('route' => 'sms_main_contact'));

        return $menu;
    }
}
