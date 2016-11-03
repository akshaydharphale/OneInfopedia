<?php

namespace Login\LoginBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Login\LoginBundle\Entity\Users;
use Login\LoginBundle\Modals\Login;
use Login\LoginBundle\Entity\Article;


class LoginController extends Controller{

    public function indexAction(Request $request){


        $loginManager = $this->get('login_login.login_manager');
        $response = $loginManager->manageLogin($request);

        if ($response == "Incorrect_Username") {
         return $this->render('LoginLoginBundle:Default:index.html.twig',array('name'=>'Incorrect Username Password'));
        }
        elseif ($response == "Render_Indexpage") {
            return $this->render('LoginLoginBundle:Default:index.html.twig');
        }
        else{
            return $this->render('LoginLoginBundle:Default:welcome.html.twig',array('name' => $response ));
        }
        return $this->render('LoginLoginBundle:Default:index.html.twig');
    }

    public function signupAction(Request $request){
        $loginManager = $this->get('login_login.login_manager');
        $response = $loginManager->manageSignup($request);
    	
    	return $this->render('LoginLoginBundle:Default:signup.html.twig');
    }

    public function logoutAction(Request $request){
    	$session = $request->getSession(); 
    	$session->clear();
    	return $this->render('LoginLoginBundle:Default:index.html.twig');
    }

}