<?php

namespace SMS\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
	public function indexAction()
	{
		return $this->render('SMSMainBundle:Default:index.html.twig');
	}
	public function accountAction()
	{
		return $this->render('SMSMainBundle:Default:404.html.twig');
	}
	public function servicesAction()
	{
		return $this->render('SMSMainBundle:Default:services.html.twig');
	}
	public function contactAction()
	{
		return $this->render('SMSMainBundle:Default:contact.html.twig');
	}
	public function aboutAction()
	{
		return $this->render('SMSMainBundle:Default:about.html.twig');
	}
	public function statsAction()
	{
		return $this->render('SMSMainBundle:Default:stats.html.twig');
	}
}
