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
 * Contribution Manager
 */
class ContributionManager
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


    public function approveContribution($request){
        $session = $request->getSession();
        $login = $session->get('login');
        $authoremail = $login->getEmail();     
        $keypoints = $this->doctrine
        			->getRepository('Login\LoginBundle\Entity\Keypoint')->findByAuthoremail($authoremail);
        return $keypoints;
    }

    public function approveKeypoint($id,$request){

        $em = $this->doctrine->getManager();
        
        $keypoint = $em->getRepository('Login\LoginBundle\Entity\Keypoint')->find($id);
        $articleid = $keypoint->getArticleid();
        $keypointBody = $keypoint->getBody();
        $article =  $em->getRepository('Login\LoginBundle\Entity\Article')->find($articleid);
        $oldBody = $article->getBody();
        $newBody = $oldBody.$keypointBody;
        $article->setBody($newBody);

        $em->persist($article);
        $em->remove($keypoint);
        $em->flush();

    }


    public function rejectKeypoint($id,$request){
        $em = $this->doctrine->getManager();
        $keypoint = $em->getRepository('Login\LoginBundle\Entity\Keypoint')->find($id);
        $em->remove($keypoint);
        $em->flush();

    }













}