<?php

namespace SanteBundle\Controller;

use SanteBundle\Entity\ProfessionnelSante;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Professionnelsante controller.
 *
 */
class ProfessionnelSanteController extends Controller
{
    /**
     * Lists all professionnelSante entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $professionnelSantes = $em->getRepository('SanteBundle:ProfessionnelSante')->findAll();

        return $this->render('professionnelsante/index.html.twig', array(
            'professionnelSantes' => $professionnelSantes,
        ));
    }

    /**
     * Creates a new professionnelSante entity.
     *
     */
    public function newAction(Request $request)
    {
        $professionnelSante = new Professionnelsante();
        $form = $this->createForm('SanteBundle\Form\ProfessionnelSanteType', $professionnelSante);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($professionnelSante);
            $em->flush();

            return $this->redirectToRoute('professionnelsante_confirmed', array('idPro' => $professionnelSante->getIdpro()));
//            return $this->redirectToRoute('professionnelsante_show', array('idPro' => $professionnelSante->getIdpro()));
        }

        return $this->render('professionnelsante/new.html.twig', array(
            'professionnelSante' => $professionnelSante,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a professionnelSante entity.
     *
     */
    public function showAction(ProfessionnelSante $professionnelSante)
    {
        $deleteForm = $this->createDeleteForm($professionnelSante);

        return $this->render('professionnelsante/show.html.twig', array(
            'professionnelSante' => $professionnelSante,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    public function confirmedAction(ProfessionnelSante $professionnelSante)
    {
        $deleteForm = $this->createDeleteForm($professionnelSante);
        return $this->render('professionnelsante/confirmed.html.twig', array(
            'professionnelSante' => $professionnelSante,
                'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing professionnelSante entity.
     *
     */
    public function editAction(Request $request, ProfessionnelSante $professionnelSante)
    {
        $deleteForm = $this->createDeleteForm($professionnelSante);
        $editForm = $this->createForm('SanteBundle\Form\ProfessionnelSanteType', $professionnelSante);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('professionnelsante_index', array('idPro' => $professionnelSante->getIdpro()));
        }

        return $this->render('professionnelsante/edit.html.twig', array(
            'professionnelSante' => $professionnelSante,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a professionnelSante entity.
     *
     */
    public function deleteAction(Request $request, ProfessionnelSante $professionnelSante)
    {
        $form = $this->createDeleteForm($professionnelSante);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($professionnelSante);
            $em->flush();
        }

        return $this->redirectToRoute('professionnelsante_index');
    }

    /**
     * Creates a form to delete a professionnelSante entity.
     *
     * @param ProfessionnelSante $professionnelSante The professionnelSante entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ProfessionnelSante $professionnelSante)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('professionnelsante_delete', array('idPro' => $professionnelSante->getIdpro())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
