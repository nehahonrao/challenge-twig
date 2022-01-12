<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use \DateTime;

class LearningController extends AbstractController
{
    #[Route('/learning', name: 'learning')]
    public function index(): Response
    {
        return $this->render('learning/index.html.twig', [
            'controller_name' => 'LearningController',
        ]);
    }
    //    about me 
    
    #[Route('/about-becode', name: 'learning')]
    
    public function aboutMe(SessionInterface $session):Response
    { 
          if($session->get('name')) {
            $name = $session->get('name');
        }
        else {
            $response = $this->forward('App\Controller\LearningController::showMyName');
            return $response;
        }
        return $this->render('learning/index.html.twig',[
            'name' => $name,
        ]);
    }


    #[Route('/', name:'link')]
    
    public function link():Response
    { 
        return $this->render('learning/link.html.twig',[
            
        ]);
    }



//  Display your name 

   /**
     * @Route("/showMyName", name="showMyName")
     * @param SessionInterface $session
     * @return Response
     */
    public function showMyName(SessionInterface $session): Response
    {
       if($session->get("name")){
           $name=$session->get("name");
  }else{
    $name="unknown";
   }
   return $this->render('showMyName.html.twig', [
    'name' => $name,
]);
    }

// change your name 
    
   /**
     * @Route("/changeMyName", name="changeMyName", methods={"POST"})
     * @param Request $request
     * @param SessionInterface $session
     * @return RedirectResponse
     */
    public function changeMyName(Request $request,SessionInterface $session):RedirectResponse
    {
        $name= $request->request->get('name');
        $session->set('name',$name);
        return $this->redirectToRoute('showMyName');
    }
}
