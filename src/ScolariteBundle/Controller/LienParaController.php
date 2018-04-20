<?php

namespace ScolariteBundle\Controller;

use ScolariteBundle\Entity\LienPara;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Lienpara controller.
 *
 */
class LienParaController extends Controller
{
    /**
     * Lists all lienPara entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $lienParas = $em->getRepository('ScolariteBundle:LienPara')->findAll();

        return $this->render('lienpara/index.html.twig', array(
            'lienParas' => $lienParas,
        ));
    }

    /**
     * Creates a new lienPara entity.
     *
     */
    public function newAction(Request $request)
    {
        $lienPara = new Lienpara();
        $form = $this->createForm('ScolariteBundle\Form\LienParaType', $lienPara);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($lienPara);
            $em->flush();

            return $this->redirectToRoute('lienpara_show', array('id' => $lienPara->getId()));
        }

        return $this->render('lienpara/new.html.twig', array(
            'lienPara' => $lienPara,
            'form' => $form->createView(),
        ));
    }

    public function newFromParaAction(Request $request)
    {
        $lienPara = new Lienpara();
        $em = $this->getDoctrine()->getManager();
        $para=$em->getRepository("ScolariteBundle:Parascolaire")->find($request->get("idPara"));
        $lienPara->setParascolaire($para);
        $form = $this->createForm('ScolariteBundle\Form\LienParaType', $lienPara);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($lienPara);
            $em->flush();

            return $this->redirectToRoute('parascolaire_show', array(
                'id' => $para->getId()
            ));
        }

        return $this->render('lienpara/new.html.twig', array(
            'lienPara' => $lienPara,
            'form' => $form->createView(),
        ));
    }
    /**
     * Finds and displays a lienPara entity.
     *
     */
    public function showAction(LienPara $lienPara)
    {
        $deleteForm = $this->createDeleteForm($lienPara);

        return $this->render('lienpara/show.html.twig', array(
            'lienPara' => $lienPara,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing lienPara entity.
     *
     */
    public function editAction(Request $request, LienPara $lienPara)
    {
        $deleteForm = $this->createDeleteForm($lienPara);
        $editForm = $this->createForm('ScolariteBundle\Form\LienParaType', $lienPara);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('lienpara_edit', array('id' => $lienPara->getId()));
        }

        return $this->render('lienpara/edit.html.twig', array(
            'lienPara' => $lienPara,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a lienPara entity.
     *
     */
    public function deleteAction(Request $request, LienPara $lienPara)
    {
        $form = $this->createDeleteForm($lienPara);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($lienPara);
            $em->flush();
        }

        return $this->redirectToRoute('lienpara_index');
    }

    public function deleteFromParaAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $parascolaire = $em->getRepository('ScolariteBundle:Parascolaire')->find($request->get("idPara"));
        $lienPara = $em->getRepository('ScolariteBundle:LienPara')->find($request->get("id"));
        $em->remove($lienPara);
        $em->flush();

        return $this->redirectToRoute('parascolaire_show',array('id'=>$parascolaire->getId()));
    }

    /**
     * Creates a form to delete a lienPara entity.
     *
     * @param LienPara $lienPara The lienPara entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(LienPara $lienPara)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('lienpara_delete', array('id' => $lienPara->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
