<?php

namespace ScolariteBundle\Controller;

use ScolariteBundle\Entity\TypePara;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Typepara controller.
 *
 */
class TypeParaController extends Controller
{
    /**
     * Lists all typePara entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $typeParas = $em->getRepository('ScolariteBundle:TypePara')->findAll();

        return $this->render('typepara/index.html.twig', array(
            'typeParas' => $typeParas,
        ));
    }

    /**
     * Creates a new typePara entity.
     *
     */
    public function newAction(Request $request)
    {
        $typePara = new Typepara();
        $form = $this->createForm('ScolariteBundle\Form\TypeParaType', $typePara);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($typePara);
            $em->flush();

            return $this->redirectToRoute('typepara_index');
        }

        return $this->render('typepara/new.html.twig', array(
            'typePara' => $typePara,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a typePara entity.
     *
     */
    public function showAction(TypePara $typePara)
    {
        $deleteForm = $this->createDeleteForm($typePara);

        return $this->render('typepara/show.html.twig', array(
            'typePara' => $typePara,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing typePara entity.
     *
     */
    public function editAction(Request $request, TypePara $typePara)
    {
        $deleteForm = $this->createDeleteForm($typePara);
        $editForm = $this->createForm('ScolariteBundle\Form\TypeParaType', $typePara);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('typepara_index');
        }

        return $this->render('typepara/edit.html.twig', array(
            'typePara' => $typePara,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a typePara entity.
     *
     */
    public function deleteAction(Request $request, TypePara $typePara)
    {
        $form = $this->createDeleteForm($typePara);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($typePara);
            $em->flush();
        }

        return $this->redirectToRoute('typepara_index');
    }

    /**
     * Creates a form to delete a typePara entity.
     *
     * @param TypePara $typePara The typePara entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TypePara $typePara)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('typepara_delete', array('id' => $typePara->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
