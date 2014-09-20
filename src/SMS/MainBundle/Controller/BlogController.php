<?php

namespace SMS\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller
{
	public function blogAction()
	{
		return $this->render('SMSMainBundle:Default:blog-home.html.twig');
	}
	public function articleAction($id)
	{
		return $this->render('SMSMainBundle:Default:blog-post.html.twig');
	}
	
}
