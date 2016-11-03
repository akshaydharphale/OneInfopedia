<?php
namespace Login\LoginBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Login\LoginBundle\Entity\Users;
use Login\LoginBundle\Modals\Login;
use Login\LoginBundle\Entity\Article;
use Login\LoginBundle\Entity\Keypoint;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class ContributionController extends Controller{

	 /**
     * @Route("/Login/LoginBundle/Default/approvecontributions/", name="login_login_approvecontributions")
     */
    public function approvecontributionsAction(Request $request)
    {
        
    	$keypoints = $this->get('login_login.contribution_manager')->approveContribution($request);
        return $this->render('LoginLoginBundle:Default:approvecontributions.html.twig', array ('keypoints' => $keypoints));
    }

    /**
     * @Route("/Login/LoginBundle/Default/approvekeypoint/{id}", name="article_approvekeypoint")
     */
    public function approvekeypointAction($id,Request $request)
    {

        $keypoints = $this->get('login_login.contribution_manager')->approveKeypoint($id,$request);
        return $this->redirectToRoute('login_login_approvecontributions');
    }

     /**
     * @Route("/Login/LoginBundle/Default/rejectkeypoint/{id}", name="keypoint_rejectkeypoint")
     */
    public function rejectkeypointAction($id,Request $request)
    {

        $keypoints = $this->get('login_login.contribution_manager')->rejectKeypoint($id,$request);
        return $this->redirectToRoute('login_login_approvecontributions');

    }

}