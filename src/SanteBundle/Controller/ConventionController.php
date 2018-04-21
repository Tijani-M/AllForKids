<?php

namespace SanteBundle\Controller;

use SanteBundle\Entity\Convention;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Convention controller.
 *
 */
class ConventionController extends Controller
{
    /**
     * Lists all convention entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $conventions = $em->getRepository('SanteBundle:Convention')->findAll();

        return $this->render('convention/index.html.twig', array(
            'conventions' => $conventions,
        ));
    }

    /**
     * Creates a new convention entity.
     *
     */
    public function newAction(Request $request)
    {
        $convention = new Convention();
        $form = $this->createForm('SanteBundle\Form\ConventionType', $convention);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($convention);
            $em->flush();

            return $this->redirectToRoute('convention_show', array('idConv' => $convention->getIdconv()));
        }

        return $this->render('convention/new.html.twig', array(
            'convention' => $convention,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a convention entity.
     *
     */
    public function showAction(Convention $convention)
    {
        $deleteForm = $this->createDeleteForm($convention);

        return $this->render('convention/show.html.twig', array(
            'convention' => $convention,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing convention entity.
     *
     */
    public function editAction(Request $request, Convention $convention)
    {
        $deleteForm = $this->createDeleteForm($convention);
        $editForm = $this->createForm('SanteBundle\Form\ConventionType', $convention);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('convention_edit', array('idConv' => $convention->getIdconv()));
        }

        return $this->render('convention/edit.html.twig', array(
            'convention' => $convention,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a convention entity.
     *
     */
    public function deleteAction(Request $request, Convention $convention)
    {
        $form = $this->createDeleteForm($convention);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($convention);
            $em->flush();
        }

        return $this->redirectToRoute('convention_index');
    }

    /**
     * Creates a form to delete a convention entity.
     *
     * @param Convention $convention The convention entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Convention $convention)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('convention_delete', array('idConv' => $convention->getIdconv())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
