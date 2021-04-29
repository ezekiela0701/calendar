<?php

namespace App\Controller\admin;

use App\Entity\Event;
use App\Form\EventType;
use App\Repository\EventRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class CalendarController extends AbstractController
{
    protected $em ;
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em ;
    }

    /**
     * @Route("/", name="dashboard")
     */
    public function index(Request $request , Event $event=null , EventRepository $eventRepository): Response
    {
        if(!$event){
            $event = new Event() ;
        }
        $listEvents  = $eventRepository->findBy([] , ['id'=>'DESC']);
        $form       = $this->createForm(EventType::class , $event) ; 

        $form->handleRequest($request) ;
        if($form->isSubmitted()&& $form->isValid()){
            $this->em->persist($event) ;
            $this->em->flush();
            return $this->redirectToRoute('dashboard');
        } 
        return $this->render('admin/calendar/index.html.twig', [
            'controller_name' => 'DashboardController',
            'formEvent'       => $form->createView() ,
            'listEvents'      => $listEvents , 
        ]);
    }
}
