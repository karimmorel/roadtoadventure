<?php

namespace TravelBundle\Controller;

use TravelBundle\Entity\Travel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Travel controller.
 *
 */
class TravelController extends Controller
{
    /**
     * Lists all travel entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $travels = $em->getRepository('TravelBundle:Travel')->findBy(array(), array('city' => 'asc'));

        return $this->render('travel/index.html.twig', array(
            'travels' => $travels,
            'city' => null
        ));
    }

    /**
     * Creates a new travel entity.
     *
     */
    public function newAction(Request $request)
    {
        $travel = new Travel();
        $form = $this->createForm('TravelBundle\Form\TravelType', $travel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($travel);
            $em->flush();

            return $this->redirectToRoute('travel_show', array('id' => $travel->getId()));
        }

        return $this->render('travel/new.html.twig', array(
            'travel' => $travel,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a travel entity.
     *
     */
    public function showAction(Travel $travel)
    {
        $deleteForm = $this->createDeleteForm($travel);

        return $this->render('travel/show.html.twig', array(
            'travel' => $travel,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing travel entity.
     *
     */
    public function editAction(Request $request, Travel $travel)
    {
        $deleteForm = $this->createDeleteForm($travel);
        $editForm = $this->createForm('TravelBundle\Form\TravelType', $travel);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('travel_edit', array('id' => $travel->getId()));
        }

        return $this->render('travel/edit.html.twig', array(
            'travel' => $travel,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    public function cityAction($city)
    {
        $em = $this->getDoctrine()->getManager();
        $city = $em->getRepository('TravelBundle:City')->findOneByName($city);
        if($city)
            $travels = $em->getRepository('TravelBundle:Travel')->findByCity($city->getId());
        else
            $travels = $em->getRepository('TravelBundle:Travel')->findBy(array(), array('city' => 'asc'));

        if ($city)
        {
            return $this->render('travel/index.html.twig', array(
                'travels' => $travels,
                'city' => $city
            ));
        }
        else
        {
            $travels = $em->getRepository('TravelBundle:Travel')->findBy(array(), array('city' => 'asc'));

            return $this->render('travel/index.html.twig', array(
                'travels' => $travels,
                'city' => null
            ));
        }


    }

    /**
     * Deletes a travel entity.
     *
     */
    public function deleteAction(Request $request, Travel $travel)
    {
        $form = $this->createDeleteForm($travel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($travel);
            $em->flush();
        }

        return $this->redirectToRoute('travel_index');
    }

    /**
     * Creates a form to delete a travel entity.
     *
     * @param Travel $travel The travel entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Travel $travel)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('travel_delete', array('id' => $travel->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
