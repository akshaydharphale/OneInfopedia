<?php

namespace Login\LoginBundle\Modals;
use Doctrine\Bundle\DoctrineBundle\Registry as Doctrine;
use Symfony\Component\Validator\ValidatorInterface;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Login\LoginBundle\Entity\Users;
use Login\LoginBundle\Modals\Login;
use Login\LoginBundle\Entity\Article;
use Login\LoginBundle\Entity\Keypoint;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
 * Login Manager
 */
class LoginManager
{

    protected $doctrine;
    /**
    * Constructor
    *
    * @param Doctrine $doctrine  - Doctrine
    */
    public function __construct(Doctrine $doctrine){
    	$this->doctrine = $doctrine;
    }

    public function manageLogin($request){

	    	$session = $request->getSession();
	    	$em = $this->doctrine->getManager();
	    	$repository = $em->getRepository('LoginLoginBundle:Users');

	    	if ($request->getMethod() == 'POST') {

	    		$session->clear();
	    		$email = $request->get('email');
	    		$password = sha1($request->get('password'));
	    		$remember = $request->get('remember');
	    		$user = $repository->findOneBy(array('email'=>$email,'password'=>$password));

	    		if($user){
	    			if ($remember == 'remember-me') {
	    				$login = new Login();
	    				$login->setEmail($email);
	    				$login->setPassword($password);
	    				$session->set('login', $login);
	    			}
	    		// return $this->render('LoginLoginBundle:Default:welcome.html.twig',array('name' => $user->getName()));
	    			return $user->getName();
	    		}
	    		else{
	    			return "Incorrect_Username";
	    		}
	    	}
	    	else{
	    		if ($session->has('login')) {
	    			$login = $session->get('login');
	    			$email = $login->getEmail();
	    			$password = $login->getPassword();
	    			$user = $repository->findOneBy(array('email'=>$email,'password'=>$password));

	    			if($user){
	    		// return $this->render('LoginLoginBundle:Default:welcome.html.twig',array('name' => $user->getName()));
	    				return $user->getName();
	    			}
	    		}
	    		// return $this->render('LoginLoginBundle:Default:index.html.twig');
	    		return "Render_Indexpage";
	    	}  

    }

    public function manageSignup($request){

    	if ($request->getMethod()=='POST') {
    		$email = $request->get('email');
    		$password = $request->get('password');
    		$type = "user";
    		$name = $request->get('name');

    		$user = new Users();
    		$user->setName($name);
    		$user->setPassword(sha1($password));
    		$user->setEmail($email);
    		$user->setType($type);
    		$em = $this->doctrine->getManager();
    		$em->persist($user);
    		$em->flush();
    		
    	}
    }









}    