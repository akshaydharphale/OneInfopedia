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
 * Article Manager
 */
class ArticleManager
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


    public function createArticleOfLoggedInUser($request){

        $session = $request->getSession();
        $login = $session->get('login');
        $email = $login->getEmail();

    
        if ($request->getMethod()=='POST') {

            $current_date = date_create(date('Y-m-d H:i:s'));

            $title = $request->get('title');
            $body = $request->get('body');
            $tag = $request->get('tag');
            $publishedDate = $current_date;
            $updatedDate = $publishedDate;

            $article = new Article();
            $article->setEmail($email);
            $article->setTitle($title);
            $article->setBody($body);
            $article->setTag($tag);
            $article->setPublisheddate($publishedDate);
            $article->setUpdateddate($updatedDate);


            $em = $this->doctrine->getManager();
            $em->persist($article);
            $em->flush();

    		return "success";
    	}
	}


    public function showAllArticle(){
        $article = $this->doctrine->getRepository('Login\LoginBundle\Entity\Article')->findAll();
        return $article;
    }

    public function viewArticle($id){    
        $article = $this->doctrine->getRepository('Login\LoginBundle\Entity\Article')->find($id);
        return $article;
    }

    
    public function myArticles($request){
        $session = $request->getSession();
        $login = $session->get('login');
        $email = $login->getEmail();

        $articles = $this->doctrine->getRepository('Login\LoginBundle\Entity\Article')->findByEmail($email);
        return $articles;
    }

    public function editArticle($id,$request,$formBuilder){


            $article = $this->doctrine->getRepository('Login\LoginBundle\Entity\Article')->find($id);
            
            $form = $formBuilder
            ->add('title',TextType::class,array('attr' => array('class' => 'form-control' , 'style' => 'margin-bottom:15px') ) )
            ->add('tag',TextType::class,array('attr' => array('class' => 'form-control' , 'style' => 'margin-bottom:15px')))
            ->add('body',TextareaType::class,array('attr' => array('class' => 'form-control' , 'style' => 'margin-bottom:15px'))) 
            ->add('save',SubmitType::class,array('label' => 'Update Article', 'attr' => array('class' => 'btn btn-primary' , 'style' => 'margin-bottom:15px') ) )
            ->getForm();

            $form->handleRequest($request);
            if($form->isSubmitted() && $form ->isValid() )
            {
                //GET Data
                $title = $form['title']->getData();
                $tag = $form['tag']->getData();
                $body = $form['body']->getData();
                $publisheddate = $article->getPublisheddate();
                $updateddate = date_create(date('Y-m-d H:i:s'));    //current date
                $email = $article->getEmail();

                $em = $this->doctrine->getManager();
                $article = $em->getRepository('Login\LoginBundle\Entity\Article')->find($id);

                //SET Data
                $article->setEmail($email);
                $article->setTitle($title);
                $article->setBody($body);
                $article->setPublisheddate($publisheddate);
                $article->setUpdateddate($updateddate);
                $article->setTag($tag);
                

                $em->flush();
                // return $redirection;
            }
        return array ('article' => $article,'form' => $form->createView() );

    }

    public function contributeSubmission($request){

        $session = $request->getSession();
        $login = $session->get('login');
        $email = $login->getEmail();


    
        if ($request->getMethod()=='POST') {

            $body = $request->get('body');
            $articleid = $request->get('articleid');


            $articletitle = $request->get('articletitle');
            $authoremail = $request->get('authoremail');


            $keypoint = new Keypoint();
            $keypoint->setBody($body);
            $keypoint->setEmailcontributor($email);
            $keypoint->setArticleid($articleid);
            $keypoint->setTitle($articletitle);
            $keypoint->setAuthoremail($authoremail);

            $em = $this->doctrine->getManager();
            $em->persist($keypoint);
            $em->flush();

            return "success";
        }
    }





}



