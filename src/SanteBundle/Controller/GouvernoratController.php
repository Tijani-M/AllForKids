<?php

namespace SanteBundle\Controller;

use SanteBundle\Entity\Gouvernorat;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Gouvernorat controller.
 *
 */
class GouvernoratController extends Controller
{
    /**
     * Lists all gouvernorat entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $gouvernorats = $em->getRepository('SanteBundle:Gouvernorat')->findAll();

        return $this->render('gouvernorat/index.html.twig', array(
            'gouvernorats' => $gouvernorats,
        ));
    }

    /**
     * Creates a new gouvernorat entity.
     *
     */
    public function newAction(Request $request)
    {
        $gouvernorat = new Gouvernorat();
        $form = $this->createForm('SanteBundle\Form\GouvernoratType', $gouvernorat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($gouvernorat);
            $em->flush();

            return $this->redirectToRoute('gouvernorat_show', array('idGouvernorat' => $gouvernorat->getIdgouvernorat()));
        }

        return $this->render('gouvernorat/new.html.twig', array(
            'gouvernorat' => $gouvernorat,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a gouvernorat entity.
     *
     */
    public function showAction(Gouvernorat $gouvernorat)
    {
        $deleteForm = $this->createDeleteForm($gouvernorat);

        return $this->render('gouvernorat/show.html.twig', array(
            'gouvernorat' => $gouvernorat,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing gouvernorat entity.
     *
     */
    public function editAction(Request $request, Gouvernorat $gouvernorat)
    {
        $deleteForm = $this->createDeleteForm($gouvernorat);
        $editForm = $this->createForm('SanteBundle\Form\GouvernoratType', $gouvernorat);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('gouvernorat_edit', array('idGouvernorat' => $gouvernorat->getIdgouvernorat()));
        }

        return $this->render('gouvernorat/edit.html.twig', array(
            'gouvernorat' => $gouvernorat,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a gouvernorat entity.
     *
     */
    public function deleteAction(Request $request, Gouvernorat $gouvernorat)
    {
        $form = $this->createDeleteForm($gouvernorat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($gouvernorat);
            $em->flush();
        }

        return $this->redirectToRoute('gouvernorat_index');
    }

    /**
     * Creates a form to delete a gouvernorat entity.
     *
     * @param Gouvernorat $gouvernorat The gouvernorat entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Gouvernorat $gouvernorat)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('gouvernorat_delete', array('idGouvernorat' => $gouvernorat->getIdgouvernorat())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
