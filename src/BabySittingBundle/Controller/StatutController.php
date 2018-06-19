<?php

namespace BabySittingBundle\Controller;

use BabySittingBundle\Entity\Statut;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Statut controller.
 *
 */
class StatutController extends Controller
{
    /**
     * Lists all statut entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $statuts = $em->getRepository('BabySittingBundle:Statut')->findAll();

        return $this->render('statut/index.html.twig', array(
            'statuts' => $statuts,
        ));
    }

    /**
     * Creates a new statut entity.
     *
     */
    public function newAction(Request $request)
    {
        $statut = new Statut();
        $form = $this->createForm('BabySittingBundle\Form\StatutType', $statut);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($statut);
            $em->flush();

            return $this->redirectToRoute('statut_show', array('id' => $statut->getId()));
        }

        return $this->render('statut/new.html.twig', array(
            'statut' => $statut,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a statut entity.
     *
     */
    public function showAction(Statut $statut)
    {
        $deleteForm = $this->createDeleteForm($statut);

        return $this->render('statut/show.html.twig', array(
            'statut' => $statut,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing statut entity.
     *
     */
    public function editAction(Request $request, Statut $statut)
    {
        $deleteForm = $this->createDeleteForm($statut);
        $editForm = $this->createForm('BabySittingBundle\Form\StatutType', $statut);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('statut_edit', array('id' => $statut->getId()));
        }

        return $this->render('statut/edit.html.twig', array(
            'statut' => $statut,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a statut entity.
     *
     */
    public function deleteAction(Request $request, Statut $statut)
    {
        $form = $this->createDeleteForm($statut);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($statut);
            $em->flush();
        }

        return $this->redirectToRoute('statut_index');
    }

    /**
     * Creates a form to delete a statut entity.
     *
     * @param Statut $statut The statut entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Statut $statut)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('statut_delete', array('id' => $statut->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
