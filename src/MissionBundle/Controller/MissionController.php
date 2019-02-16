<?php

namespace MissionBundle\Controller;

use MissionBundle\Entity\Mission;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


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
}
