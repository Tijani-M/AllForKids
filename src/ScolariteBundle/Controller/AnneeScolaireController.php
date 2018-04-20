<?php

namespace ScolariteBundle\Controller;

use ScolariteBundle\Entity\AnneeScolaire;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Anneescolaire controller.
 *
 */
class AnneeScolaireController extends Controller
{
    /**
     * Lists all anneeScolaire entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $anneeScolaires = $em->getRepository('ScolariteBundle:AnneeScolaire')->findAll();

        return $this->render('anneescolaire/index.html.twig', array(
            'anneeScolaires' => $anneeScolaires,
        ));
    }

    /**
     * Creates a new anneeScolaire entity.
     *
     */
    public function newAction(Request $request)
    {
        $anneeScolaire = new Anneescolaire();
        $form = $this->createForm('ScolariteBundle\Form\AnneeScolaireType', $anneeScolaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($anneeScolaire);
            $em->flush();

            return $this->redirectToRoute('anneescolaire_index');
        }

        return $this->render('anneescolaire/new.html.twig', array(
            'anneeScolaire' => $anneeScolaire,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a anneeScolaire entity.
     *
     */
    public function showAction(AnneeScolaire $anneeScolaire)
    {
        /*$deleteForm = $this->createDeleteForm($anneeScolaire);

        return $this->render('anneescolaire/show.html.twig', array(
            'anneeScolaire' => $anneeScolaire,
            'delete_form' => $deleteForm->createView(),
        ));*/
        return $this->render('anneescolaire/show.html.twig', array(
            'anneeScolaire' => $anneeScolaire
        ));
    }

    /**
     * Displays a form to edit an existing anneeScolaire entity.
     *
     */
    public function editAction(Request $request, AnneeScolaire $anneeScolaire)
    {
        $deleteForm = $this->createDeleteForm($anneeScolaire);
        $editForm = $this->createForm('ScolariteBundle\Form\AnneeScolaireType', $anneeScolaire);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('anneescolaire_index');
        }

        return $this->render('anneescolaire/edit.html.twig', array(
            'anneeScolaire' => $anneeScolaire,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a anneeScolaire entity.
     *
     */
    public function deleteAction(Request $request, AnneeScolaire $anneeScolaire)
    {
        $form = $this->createDeleteForm($anneeScolaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($anneeScolaire);
            $em->flush();
        }

        return $this->redirectToRoute('anneescolaire_index');
    }

    /**
     * Creates a form to delete a anneeScolaire entity.
     *
     * @param AnneeScolaire $anneeScolaire The anneeScolaire entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(AnneeScolaire $anneeScolaire)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('anneescolaire_delete', array('id' => $anneeScolaire->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
