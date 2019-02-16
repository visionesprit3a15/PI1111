<?php

namespace MissionBundle\Controller;


use MissionBundle\Entity\Message;
use MissionBundle\Entity\Mission;
use MissionBundle\Form\MissionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


/**
 * Mission controller.
 *
 */
class MissionController extends Controller
{
    /**
     * Lists all mission entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $missions = $em->getRepository('MissionBundle:Mission')->findAll();

        return $this->render('mission/index.html.twig', array(
            'missions' => $missions,
        ));
    }

    /**
     * Finds and displays a mission entity.
     *
     */
    public function showAction(Mission $mission)
    {

        return $this->render('mission/show.html.twig', array(
            'mission' => $mission,
        ));
    }
    public function createAction(Request $request)
    {
        $mission= new Mission();
        $form=$this->createForm(MissionType::class,$mission);
        $form=$form->handleRequest($request);
        if($form->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($mission);
            $em->flush();
            return $this->redirectToRoute('mission_index');
        }
        return $this->render('mission/create.html.twig', array(
        'form'=>$form->createView()
    ));
    }
}
