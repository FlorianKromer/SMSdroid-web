<?php

namespace SMS\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
	public function indexAction()
	{
		return $this->render('SMSMainBundle:Default:index.html.twig');
	}
	public function leagueAction()
	{
		return $this->render('SMSMainBundle:Default:league.html.twig');
	}
	public function tableAction()
	{
		return $this->render('SMSMainBundle:Default:table.html.twig');
	}
	public function calendarAction()
	{
		return $this->render('SMSMainBundle:Default:calendar.html.twig');
	}
	public function evolutionAction()
	{
		return $this->render('SMSMainBundle:Default:evolution.html.twig');
	}
	public function statsAction()
	{
		return $this->render('SMSMainBundle:Default:stats.html.twig');
	}
}
