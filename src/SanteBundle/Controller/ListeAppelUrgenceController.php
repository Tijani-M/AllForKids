<?php

namespace SanteBundle\Controller;

use SanteBundle\Entity\ListeAppelUrgence;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Listeappelurgence controller.
 *
 */
class ListeAppelUrgenceController extends Controller
{
    /**
     * Lists all listeAppelUrgence entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $listeAppelUrgences = $em->getRepository('SanteBundle:ListeAppelUrgence')->findAll();

        return $this->render('listeappelurgence/index.html.twig', array(
            'listeAppelUrgences' => $listeAppelUrgences,
        ));
    }

    /**
     * Creates a new listeAppelUrgence entity.
     *
     */
    public function newAction(Request $request)
    {
        $listeAppelUrgence = new Listeappelurgence();
        $form = $this->createForm('SanteBundle\Form\ListeAppelUrgenceType', $listeAppelUrgence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($listeAppelUrgence);
            $em->flush();

//            return $this->redirectToRoute('listeappelurgence_show', array('idNumUrgence' => $listeAppelUrgence->getIdnumurgence()));
            return $this->redirectToRoute('listeappelurgence_index');
        }

        return $this->render('listeappelurgence/new.html.twig', array(
            'listeAppelUrgence' => $listeAppelUrgence,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a listeAppelUrgence entity.
     *
     */
    public function showAction(ListeAppelUrgence $listeAppelUrgence)
    {
        $deleteForm = $this->createDeleteForm($listeAppelUrgence);

        return $this->render('listeappelurgence/show.html.twig', array(
            'listeAppelUrgence' => $listeAppelUrgence,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing listeAppelUrgence entity.
     *
     */
    public function editAction(Request $request, ListeAppelUrgence $listeAppelUrgence)
    {
        $deleteForm = $this->createDeleteForm($listeAppelUrgence);
        $editForm = $this->createForm('SanteBundle\Form\ListeAppelUrgenceType', $listeAppelUrgence);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('listeappelurgence_index', array('idNumUrgence' => $listeAppelUrgence->getIdnumurgence()));
        }

        return $this->render('listeappelurgence/edit.html.twig', array(
            'listeAppelUrgence' => $listeAppelUrgence,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a listeAppelUrgence entity.
     *
     */
    public function deleteAction(Request $request, ListeAppelUrgence $listeAppelUrgence)
    {
        $form = $this->createDeleteForm($listeAppelUrgence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($listeAppelUrgence);
            $em->flush();
        }

        return $this->redirectToRoute('listeappelurgence_index');
    }

    /**
     * Creates a form to delete a listeAppelUrgence entity.
     *
     * @param ListeAppelUrgence $listeAppelUrgence The listeAppelUrgence entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ListeAppelUrgence $listeAppelUrgence)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('listeappelurgence_delete', array('idNumUrgence' => $listeAppelUrgence->getIdnumurgence())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
