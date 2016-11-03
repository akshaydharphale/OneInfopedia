<?php
namespace Login\LoginBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Login\LoginBundle\Entity\Users;
use Login\LoginBundle\Modals\Login;
use Login\LoginBundle\Entity\Article;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class ArticleController extends Controller{

    public function addArticleAction(Request $request){
        $articleManager = $this->get('login_login.article_manager');
        $article = $articleManager->createArticleOfLoggedInUser($request);
        return $this->render('LoginLoginBundle:Default:addarticle.html.twig');
     }


    public function allArticleAction()
    {
        $articles = $this->get('login_login.article_manager')->showAllArticle();
        return $this->render('LoginLoginBundle:Default:allarticle.html.twig', array ('articles' => $articles) );
    }


    public function viewArticleAction($id, Request $request)
    {
    	$article = $this->get('login_login.article_manager')->viewArticle($id);
        return $this->render('LoginLoginBundle:Default:viewarticle.html.twig', array ('article' => $article) );
    }
    /**
     * @Route("/Login/LoginBundle/Default/myarticle/", name="article_myarticle")
     */
    public function myArticleAction(Request $request)
    {
    	$articles = $this->get('login_login.article_manager')->myArticles($request);
        return $this->render('LoginLoginBundle:Default:myarticle.html.twig', array ('articles' => $articles) );
    }

    public function editArticleAction($id , Request $request)
    {

    	$article = $this->get('login_login.article_manager')->viewArticle($id);
    	$formBuilder = $this->createFormBuilder($article);
    	$retArray = $this->get('login_login.article_manager')->editArticle($id,$request,$formBuilder);
    	return $this->render('LoginLoginBundle:Default:editarticle.html.twig',$retArray);
    }
    /**
     * @Route("/Login/LoginBundle/Default/deletearticle/{id}", name="article_delete")
     */
    public function deleteArticleAction($id, Request $request)
    {
        
        $em = $this->getDoctrine()->getManager();
        $article = $em->getRepository('Login\LoginBundle\Entity\Article')->find($id); 
        $keypoints = $em->getRepository('Login\LoginBundle\Entity\Keypoint')->findByArticleid($id);

        foreach ($keypoints as $keypoint) {
            $em->remove($keypoint);
        }


        $em->remove($article);
        $em->flush();

        return $this->redirectToRoute('login_login_myarticle');
    }

    public function contributeArticleAction($id, Request $request)
    {
    	$article = $this->get('login_login.article_manager')->viewArticle($id);
        return $this->render('LoginLoginBundle:Default:contributearticle.html.twig', array ('article' => $article) );
    }    

     /**
     * @Route("/Login/LoginBundle/Default/contributesubmission/", name="article_contributesubmission")
     */
    public function contributeSubmissionAction(Request $request)
    {
        
    	$articleManager = $this->get('login_login.article_manager');
        $article = $articleManager->contributeSubmission($request);

        return $this->redirectToRoute('login_login_myarticle');
    }




}
