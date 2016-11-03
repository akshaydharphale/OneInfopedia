<?php


        $session = $request->getSession();    
        $login = $session->get('login');
        $email = $login->getEmail();
    


        if ($request->getMethod()=='POST') {

            $articleid = 10001 ;
            $imageid = 2;
            $title = $request->get('title');
            $body = $request->get('body');
            $tag = $request->get('tag');
            $publishedDate = $request->get('date');
            $updatedDate = $publishedDate;



            $article = new Article();
            $article->setEmail($email);
            $article->setTitle($title);
            $article->setBody($body);
            $article->setTag($tag);
            // $article->setPublisheddate($publishedDate);
            // $article->setUpdateddate($updatedDate);
            $article->setImageid($imageid);
            $article->setArticleid($articleid);

            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($article);
            $em->flush();

                
        }
        return $this->render('LoginLoginBundle:Default:article.html.twig');        

//===========================================================================================================




            public function indexAction(Request $request)
    {
        
        $session = $request->getSession();


        $em = $this->getDoctrine()->getEntityManager(); 
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


                return $this->render('LoginLoginBundle:Default:welcome.html.twig',array('name' => $user->getName()));
            }
            else{
                return $this->render('LoginLoginBundle:Default:index.html.twig',array('name'=>'Incorrect Username Password'));
            }
            
        }
        else{
            if ($session->has('login')) {
                $login = $session->get('login');
                $email = $login->getEmail();
                $password = $login->getPassword();
                $user = $repository->findOneBy(array('email'=>$email,'password'=>$password));

                if($user){
                    return $this->render('LoginLoginBundle:Default:welcome.html.twig',array('name' => $user->getName()));
                }
            }

            return $this->render('LoginLoginBundle:Default:index.html.twig');
        }        
    }

    public function signupAction(Request $request)
    {
        if ($request->getMethod()=='POST') {
            $email = $request->get('email');
            $password = $request->get('password');
            $type = $request->get('type');
            $name = $request->get('name');


            $user = new Users();
            $user->setName($name);
            $user->setPassword(sha1($password));
            $user->setEmail($email);
            $user->setType($type);
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($user);
            $em->flush();

            
        }
        return $this->render('LoginLoginBundle:Default:signup.html.twig');
    }

    public function logoutAction(Request $request)
    {
        $session = $request->getSession(); 
        $session->clear();
        return $this->render('LoginLoginBundle:Default:index.html.twig');
    }



    //=============================================================================================addarticle.html=============

    <!DOCTYPE html>
<html lang="en">
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<body>

{% block container %}
    <div class="container">
        <form id="form" class="well" method="POST" action="{{path('login_login_addarticle')}}">
            <h2>New Article</h2>
            <label>Title</label>
            <div><input type="text" name="title"  class="input-xlarge"></div>
            <label>Contents</label>
            <div><input type="text" name="body" class="input-xlarge"></div>
            <label>Category</label>
            <div ng-app="myApp" ng-controller="myCtrl">
                <select  ng-model="tag" ng-options="x for x in names"></select>
            </div>
            <div>
                <button class="btn btn-primary" type="submit" >Post Article</button>
            </div>
        </form> 
    </div>

{% endblock %}

<script>
    var app = angular.module('myApp', []);
    app.controller('myCtrl', function($scope) {
        $scope.names = ["Sports", "Blog", "Entertainment"];
    });
</script>

</body>
</html>

    //=============================================================================================addarticle.html=============




        $session = $request->getSession();
        $em = $this->getDoctrine()->getEntityManager(); 
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


                return $this->render('LoginLoginBundle:Default:welcome.html.twig',array('name' => $user->getName()));
            }
            else{
                return $this->render('LoginLoginBundle:Default:index.html.twig',array('name'=>'Incorrect Username Password'));
            }
            
        }
        else{
            if ($session->has('login')) {
                $login = $session->get('login');
                $email = $login->getEmail();
                $password = $login->getPassword();
                $user = $repository->findOneBy(array('email'=>$email,'password'=>$password));

                if($user){
                    return $this->render('LoginLoginBundle:Default:welcome.html.twig',array('name' => $user->getName()));
                }
            }

            return $this->render('LoginLoginBundle:Default:index.html.twig');
        }  
