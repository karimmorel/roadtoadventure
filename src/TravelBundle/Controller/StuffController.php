<?php

namespace TravelBundle\Controller;

use TravelBundle\Entity\Stuff;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Stuff controller.
 *
 */
class StuffController extends Controller
{
    /**
     * Lists all stuff entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $stuffs = $em->getRepository('TravelBundle:Stuff')->findBy(array(), array('priority' => 'asc'));

        $stuffsbuy = $em->getRepository('TravelBundle:Stuff')->countBuy(1);

        return $this->render('stuff/index.html.twig', array(
            'stuffs' => $stuffs,
            'stuffsbuy' => $stuffsbuy,
        ));
    }

    /**
     * Creates a new stuff entity.
     *
     */
    public function newAction(Request $request)
    {
        $stuff = new Stuff();
        $form = $this->createForm('TravelBundle\Form\StuffType', $stuff);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($stuff);
            $em->flush();

            return $this->redirectToRoute('_show', array('id' => $stuff->getId()));
        }

        return $this->render('stuff/new.html.twig', array(
            'stuff' => $stuff,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a stuff entity.
     *
     */
    public function showAction(Stuff $stuff)
    {
        $deleteForm = $this->createDeleteForm($stuff);

        return $this->render('stuff/show.html.twig', array(
            'stuff' => $stuff,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing stuff entity.
     *
     */
    public function editAction(Request $request, Stuff $stuff)
    {
        $deleteForm = $this->createDeleteForm($stuff);
        $editForm = $this->createForm('TravelBundle\Form\StuffType', $stuff);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('_edit', array('id' => $stuff->getId()));
        }

        return $this->render('stuff/edit.html.twig', array(
            'stuff' => $stuff,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a stuff entity.
     *
     */
    public function deleteAction(Request $request, Stuff $stuff)
    {
        $form = $this->createDeleteForm($stuff);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($stuff);
            $em->flush();
        }

        return $this->redirectToRoute('_index');
    }

    public function priorityAction($priority)
    {
        $em = $this->getDoctrine()->getManager();
        $stuffs = $em->getRepository('TravelBundle:Stuff')->findWhere($priority);
        return $this->render('stuff/index.html.twig', array(
            'stuffs' => $stuffs,
        ));
    }

    /**
     * Creates a form to delete a stuff entity.
     *
     * @param Stuff $stuff The stuff entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Stuff $stuff)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('_delete', array('id' => $stuff->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
