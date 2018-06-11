<?php

namespace BabySittingBundle\Controller;

use BabySittingBundle\Entity\Jardins;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Jardin controller.
 *
 */
class JardinsController extends Controller
{
    /**
     * Lists all jardin entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $jardins = $em->getRepository('BabySittingBundle:Jardins')->findAll();

        return $this->render('jardins/index.html.twig', array(
            'jardins' => $jardins,
        ));
    }

    /**
     * Creates a new jardin entity.
     *
     */
    public function newAction(Request $request)
    {
        $jardin = new Jardin();
        $form = $this->createForm('BabySittingBundle\Form\JardinsType', $jardin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($jardin);
            $em->flush();

            return $this->redirectToRoute('jardins_show', array('id' => $jardin->getId()));
        }

        return $this->render('jardins/new.html.twig', array(
            'jardin' => $jardin,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a jardin entity.
     *
     */
    public function showAction(Jardins $jardin)
    {
        $deleteForm = $this->createDeleteForm($jardin);

        return $this->render('jardins/show.html.twig', array(
            'jardin' => $jardin,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing jardin entity.
     *
     */
    public function editAction(Request $request, Jardins $jardin)
    {
        $deleteForm = $this->createDeleteForm($jardin);
        $editForm = $this->createForm('BabySittingBundle\Form\JardinsType', $jardin);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('jardins_edit', array('id' => $jardin->getId()));
        }

        return $this->render('jardins/edit.html.twig', array(
            'jardin' => $jardin,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a jardin entity.
     *
     */
    public function deleteAction(Request $request, Jardins $jardin)
    {
        $form = $this->createDeleteForm($jardin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($jardin);
            $em->flush();
        }

        return $this->redirectToRoute('jardins_index');
    }

    /**
     * Creates a form to delete a jardin entity.
     *
     * @param Jardins $jardin The jardin entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Jardins $jardin)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('jardins_delete', array('id' => $jardin->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
