<?php

namespace SanteBundle\Controller;

use SanteBundle\Entity\RDVSante;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Rdvsante controller.
 *
 */
class RDVSanteController extends Controller
{
    /**
     * Lists all rDVSante entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $rDVSantes = $em->getRepository('SanteBundle:RDVSante')->findAll();

        return $this->render('rdvsante/index.html.twig', array(
            'rDVSantes' => $rDVSantes,
        ));
    }

    /**
     * Creates a new rDVSante entity.
     *
     */
    public function newAction(Request $request)
    {
        $rDVSante = new Rdvsante();
        $form = $this->createForm('SanteBundle\Form\RDVSanteType', $rDVSante);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($rDVSante);
            $em->flush();

            return $this->redirectToRoute('rdvsante_show', array('idRdv' => $rDVSante->getIdrdv()));
        }

        return $this->render('rdvsante/new.html.twig', array(
            'rDVSante' => $rDVSante,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a rDVSante entity.
     *
     */
    public function showAction(RDVSante $rDVSante)
    {
        $deleteForm = $this->createDeleteForm($rDVSante);

        return $this->render('rdvsante/show.html.twig', array(
            'rDVSante' => $rDVSante,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing rDVSante entity.
     *
     */
    public function editAction(Request $request, RDVSante $rDVSante)
    {
        $deleteForm = $this->createDeleteForm($rDVSante);
        $editForm = $this->createForm('SanteBundle\Form\RDVSanteType', $rDVSante);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('rdvsante_edit', array('idRdv' => $rDVSante->getIdrdv()));
        }

        return $this->render('rdvsante/edit.html.twig', array(
            'rDVSante' => $rDVSante,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a rDVSante entity.
     *
     */
    public function deleteAction(Request $request, RDVSante $rDVSante)
    {
        $form = $this->createDeleteForm($rDVSante);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($rDVSante);
            $em->flush();
        }

        return $this->redirectToRoute('rdvsante_index');
    }

    /**
     * Creates a form to delete a rDVSante entity.
     *
     * @param RDVSante $rDVSante The rDVSante entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(RDVSante $rDVSante)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('rdvsante_delete', array('idRdv' => $rDVSante->getIdrdv())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
