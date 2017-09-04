<?php

namespace TravelBundle\Controller;

use TravelBundle\Entity\Panoply;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Panoply controller.
 *
 * @Route("panoply")
 */
class PanoplyController extends Controller
{
    /**
     * Lists all panoply entities.
     *
     * @Route("/", name="panoply_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $panoplies = $em->getRepository('TravelBundle:Panoply')->findAll();

        return $this->render('panoply/index.html.twig', array(
            'panoplies' => $panoplies,
        ));
    }

    /**
     * Creates a new panoply entity.
     *
     * @Route("/new", name="panoply_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $panoply = new Panoply();
        $form = $this->createForm('TravelBundle\Form\PanoplyType', $panoply);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($panoply);
            $em->flush();
            return $this->redirectToRoute('panoply_show', array('id' => $panoply->getId()));
        }

        return $this->render('panoply/new.html.twig', array(
            'panoply' => $panoply,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a panoply entity.
     *
     * @Route("/{id}", name="panoply_show")
     * @Method("GET")
     */
    public function showAction(Panoply $panoply)
    {
        $deleteForm = $this->createDeleteForm($panoply);

        return $this->render('panoply/show.html.twig', array(
            'panoply' => $panoply,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing panoply entity.
     *
     * @Route("/{id}/edit", name="panoply_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Panoply $panoply)
    {
        $deleteForm = $this->createDeleteForm($panoply);
        $editForm = $this->createForm('TravelBundle\Form\PanoplyType', $panoply);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('panoply_edit', array('id' => $panoply->getId()));
        }

        return $this->render('panoply/edit.html.twig', array(
            'panoply' => $panoply,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a panoply entity.
     *
     * @Route("/{id}", name="panoply_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Panoply $panoply)
    {
        $form = $this->createDeleteForm($panoply);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($panoply);
            $em->flush();
        }

        return $this->redirectToRoute('panoply_index');
    }

    /**
     * Creates a form to delete a panoply entity.
     *
     * @param Panoply $panoply The panoply entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Panoply $panoply)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('panoply_delete', array('id' => $panoply->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
