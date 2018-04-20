<?php

namespace ScolariteBundle\Controller;

use ScolariteBundle\Entity\AdresseUtile;
use ScolariteBundle\Entity\ImageLieu;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Imagelieu controller.
 *
 */
class ImageLieuController extends Controller
{
    /**
     * Lists all imageLieu entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $imageLieus = $em->getRepository('ScolariteBundle:ImageLieu')->findAll();

        return $this->render('imagelieu/index.html.twig', array(
            'imageLieus' => $imageLieus,
        ));
    }

    /**
     * Creates a new imageLieu entity.
     *
     */
    public function newAction(Request $request)
    {
        $imageLieu = new Imagelieu();
        $form = $this->createForm('ScolariteBundle\Form\ImageLieuType', $imageLieu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($imageLieu);
            $em->flush();

            return $this->redirectToRoute('imagelieu_index');
        }

        return $this->render('imagelieu/new.html.twig', array(
            'imageLieu' => $imageLieu,
            'form' => $form->createView(),
        ));
    }

    public function newFromAdresseAction(Request $request)
    {
        $imageLieu = new Imagelieu();
        $em = $this->getDoctrine()->getManager();
        $adresse=$em->getRepository("ScolariteBundle:AdresseUtile")->find($request->get("idAdresse"));
        $imageLieu->setAdresseUtile($adresse);

        $form = $this->createForm('ScolariteBundle\Form\ImageLieuType', $imageLieu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($imageLieu);
            $em->flush();

            return $this->redirectToRoute('adresseutile_show', array(
                'id' => $adresse->getId()
            ));
        }

        return $this->render('imagelieu/new.html.twig', array(
            'imageLieu' => $imageLieu,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a imageLieu entity.
     *
     */
    public function showAction(ImageLieu $imageLieu)
    {
        $deleteForm = $this->createDeleteForm($imageLieu);

        return $this->render('imagelieu/show.html.twig', array(
            'imageLieu' => $imageLieu,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing imageLieu entity.
     *
     */
    public function editAction(Request $request, ImageLieu $imageLieu)
    {
        $deleteForm = $this->createDeleteForm($imageLieu);
        $editForm = $this->createForm('ScolariteBundle\Form\ImageLieuType', $imageLieu);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('imagelieu_index');
        }

        return $this->render('imagelieu/edit.html.twig', array(
            'imageLieu' => $imageLieu,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a imageLieu entity.
     *
     */
    public function deleteAction(Request $request, ImageLieu $imageLieu)
    {
        $form = $this->createDeleteForm($imageLieu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($imageLieu);
            $em->flush();
        }

        return $this->redirectToRoute('imagelieu_index');
    }

    public function deleteFromAdresseAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $adresseUtile = $em->getRepository('ScolariteBundle:AdresseUtile')->find($request->get("idAdresse"));
        $imageLieu = $em->getRepository('ScolariteBundle:ImageLieu')->find($request->get("id"));
        $em->remove($imageLieu);
        $em->flush();

        return $this->redirectToRoute('adresseutile_show',array('id'=>$adresseUtile->getId()));
    }

    /**
     * Creates a form to delete a imageLieu entity.
     *
     * @param ImageLieu $imageLieu The imageLieu entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ImageLieu $imageLieu)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('imagelieu_delete', array('id' => $imageLieu->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}
