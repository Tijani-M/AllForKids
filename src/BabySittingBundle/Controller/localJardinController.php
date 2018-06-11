<?php

namespace BabySittingBundle\Controller;

use BabySittingBundle\Entity\localJardin;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Localjardin controller.
 *
 */
class localJardinController extends Controller
{
    /**
     * Lists all localJardin entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $localJardins = $em->getRepository('BabySittingBundle:localJardin')->findAll();

        return $this->render('localjardin/index.html.twig', array(
            'localJardins' => $localJardins,
        ));
    }

    /**
     * Creates a new localJardin entity.
     *
     */
    public function newAction(Request $request)
    {
        $localJardin = new Localjardin();
        $form = $this->createForm('BabySittingBundle\Form\localJardinType', $localJardin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($localJardin);
            $em->flush();

            return $this->redirectToRoute('localjardin_show', array('id' => $localJardin->getId()));
        }

        return $this->render('localjardin/new.html.twig', array(
            'localJardin' => $localJardin,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a localJardin entity.
     *
     */
    public function showAction(localJardin $localJardin)
    {
        $deleteForm = $this->createDeleteForm($localJardin);

        return $this->render('localjardin/show.html.twig', array(
            'localJardin' => $localJardin,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing localJardin entity.
     *
     */
    public function editAction(Request $request, localJardin $localJardin)
    {
        $deleteForm = $this->createDeleteForm($localJardin);
        $editForm = $this->createForm('BabySittingBundle\Form\localJardinType', $localJardin);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('localjardin_edit', array('id' => $localJardin->getId()));
        }

        return $this->render('localjardin/edit.html.twig', array(
            'localJardin' => $localJardin,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a localJardin entity.
     *
     */
    public function deleteAction(Request $request, localJardin $localJardin)
    {
        $form = $this->createDeleteForm($localJardin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($localJardin);
            $em->flush();
        }

        return $this->redirectToRoute('localjardin_index');
    }

    public function mapAction()
    {
        $em = $this->getDoctrine()->getManager();

        $localJardins = $em->getRepository('BabySittingBundle:localJardin')->findAll();

        return $this->render('jardins/map.html.twig', array(
            'localJardins' => $localJardins,
        ));
    }

    /**
     * Creates a form to delete a localJardin entity.
     *
     * @param localJardin $localJardin The localJardin entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(localJardin $localJardin)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('localjardin_delete', array('id' => $localJardin->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
