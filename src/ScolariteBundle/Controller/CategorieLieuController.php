<?php

namespace ScolariteBundle\Controller;

use ScolariteBundle\Entity\CategorieLieu;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Categorielieu controller.
 *
 */
class CategorieLieuController extends Controller
{
    /**
     * Lists all categorieLieu entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categorieLieus = $em->getRepository('ScolariteBundle:CategorieLieu')->findAll();

        return $this->render('categorielieu/index.html.twig', array(
            'categorieLieus' => $categorieLieus,
        ));
    }

    /**
     * Creates a new categorieLieu entity.
     *
     */
    public function newAction(Request $request)
    {
        $categorieLieu = new Categorielieu();
        $form = $this->createForm('ScolariteBundle\Form\CategorieLieuType', $categorieLieu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($categorieLieu);
            $em->flush();

            return $this->redirectToRoute('categorielieu_index');
        }

        return $this->render('categorielieu/new.html.twig', array(
            'categorieLieu' => $categorieLieu,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a categorieLieu entity.
     *
     */
    public function showAction(CategorieLieu $categorieLieu)
    {
        $deleteForm = $this->createDeleteForm($categorieLieu);

        return $this->render('categorielieu/show.html.twig', array(
            'categorieLieu' => $categorieLieu,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing categorieLieu entity.
     *
     */
    public function editAction(Request $request, CategorieLieu $categorieLieu)
    {
        $deleteForm = $this->createDeleteForm($categorieLieu);
        $editForm = $this->createForm('ScolariteBundle\Form\CategorieLieuType', $categorieLieu);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('categorielieu_index');
        }

        return $this->render('categorielieu/edit.html.twig', array(
            'categorieLieu' => $categorieLieu,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a categorieLieu entity.
     *
     */
    public function deleteAction(Request $request, CategorieLieu $categorieLieu)
    {
        $form = $this->createDeleteForm($categorieLieu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($categorieLieu);
            $em->flush();
        }

        return $this->redirectToRoute('categorielieu_index');
    }

    /**
     * Creates a form to delete a categorieLieu entity.
     *
     * @param CategorieLieu $categorieLieu The categorieLieu entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CategorieLieu $categorieLieu)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('categorielieu_delete', array('id' => $categorieLieu->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
