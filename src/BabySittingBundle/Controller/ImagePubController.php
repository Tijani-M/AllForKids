<?php

namespace BabySittingBundle\Controller;

use BabySittingBundle\Entity\ImagePub;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Imagepub controller.
 *
 */
class ImagePubController extends Controller
{
    /**
     * Lists all imagePub entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $imagePubs = $em->getRepository('BabySittingBundle:ImagePub')->findAll();

        return $this->render('imagepub/index.html.twig', array(
            'imagePubs' => $imagePubs,
        ));
    }

    /**
     * Creates a new imagePub entity.
     *
     */
    public function newAction(Request $request)
    {
        $imagePub = new Imagepub();
        $form = $this->createForm('BabySittingBundle\Form\ImagePubType', $imagePub);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($imagePub);
            $em->flush();

            return $this->redirectToRoute('imagepub_show', array('id' => $imagePub->getId()));
        }

        return $this->render('imagepub/new.html.twig', array(
            'imagePub' => $imagePub,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a imagePub entity.
     *
     */
    public function showAction(ImagePub $imagePub)
    {
        $deleteForm = $this->createDeleteForm($imagePub);

        return $this->render('imagepub/show.html.twig', array(
            'imagePub' => $imagePub,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing imagePub entity.
     *
     */
    public function editAction(Request $request, ImagePub $imagePub)
    {
        $deleteForm = $this->createDeleteForm($imagePub);
        $editForm = $this->createForm('BabySittingBundle\Form\ImagePubType', $imagePub);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('imagepub_edit', array('id' => $imagePub->getId()));
        }

        return $this->render('imagepub/edit.html.twig', array(
            'imagePub' => $imagePub,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a imagePub entity.
     *
     */
    public function deleteAction(Request $request, ImagePub $imagePub)
    {
        $form = $this->createDeleteForm($imagePub);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($imagePub);
            $em->flush();
        }

        return $this->redirectToRoute('imagepub_index');
    }

    /**
     * Creates a form to delete a imagePub entity.
     *
     * @param ImagePub $imagePub The imagePub entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ImagePub $imagePub)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('imagepub_delete', array('id' => $imagePub->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
