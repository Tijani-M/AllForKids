<?php

namespace SanteBundle\Controller;

use SanteBundle\Entity\CategorieProfessionnel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Categorieprofessionnel controller.
 *
 */
class CategorieProfessionnelController extends Controller
{
    /**
     * Lists all categorieProfessionnel entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categorieProfessionnels = $em->getRepository('SanteBundle:CategorieProfessionnel')->findAll();

        return $this->render('categorieprofessionnel/index.html.twig', array(
            'categorieProfessionnels' => $categorieProfessionnels,
        ));
    }

    /**
     * Creates a new categorieProfessionnel entity.
     *
     */
    public function newAction(Request $request)
    {
        $categorieProfessionnel = new Categorieprofessionnel();
        $form = $this->createForm('SanteBundle\Form\CategorieProfessionnelType', $categorieProfessionnel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($categorieProfessionnel);
            $em->flush();

            return $this->redirectToRoute('categorieprofessionnel_index', array('idCateg' => $categorieProfessionnel->getIdcateg()));
        }

        return $this->render('categorieprofessionnel/new.html.twig', array(
            'categorieProfessionnel' => $categorieProfessionnel,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a categorieProfessionnel entity.
     *
     */
    public function showAction(CategorieProfessionnel $categorieProfessionnel)
    {
        $deleteForm = $this->createDeleteForm($categorieProfessionnel);

        return $this->render('categorieprofessionnel/show.html.twig', array(
            'categorieProfessionnel' => $categorieProfessionnel,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing categorieProfessionnel entity.
     *
     */
    public function editAction(Request $request, CategorieProfessionnel $categorieProfessionnel)
    {
        $deleteForm = $this->createDeleteForm($categorieProfessionnel);
        $editForm = $this->createForm('SanteBundle\Form\CategorieProfessionnelType', $categorieProfessionnel);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('categorieprofessionnel_index', array('idCateg' => $categorieProfessionnel->getIdcateg()));
        }

        return $this->render('categorieprofessionnel/edit.html.twig', array(
            'categorieProfessionnel' => $categorieProfessionnel,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a categorieProfessionnel entity.
     *
     */
    public function deleteAction(Request $request, CategorieProfessionnel $categorieProfessionnel)
    {
        $form = $this->createDeleteForm($categorieProfessionnel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($categorieProfessionnel);
            $em->flush();
        }

        return $this->redirectToRoute('categorieprofessionnel_index');
    }

    /**
     * Creates a form to delete a categorieProfessionnel entity.
     *
     * @param CategorieProfessionnel $categorieProfessionnel The categorieProfessionnel entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CategorieProfessionnel $categorieProfessionnel)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('categorieprofessionnel_delete', array('idCateg' => $categorieProfessionnel->getIdcateg())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
