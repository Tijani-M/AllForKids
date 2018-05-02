<?php

namespace SanteBundle\Controller;

use SanteBundle\Entity\Gouvernorat;
use SanteBundle\Entity\Localite;
use SanteBundle\Form\LocaliteSearchType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

/**
 * LocaliteRepository controller.
 *
 */
class LocaliteController extends Controller
{

    /**
     * Lists all localite entities, with Search by Gouvernorat.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $localites = $em->getRepository('SanteBundle:Localite')->findAll();
//02/05/2018 : Début Recherche par Gouvernorat
        $form=$this->createForm(LocaliteSearchType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $idGouv = $request->request->get("localite_search")["gouvernorat"];
            $localites = $em->getRepository('SanteBundle:Localite')->findByGouv($idGouv);
        }
//02/05/2018 : Fin Recherche par Gouvernorat
        return $this->render('localite/index.html.twig', array(
            'form' => $form->createView(),
            'localites' => $localites,
        ));
    }

    /**
     * Creates a new localite entity.
     *
     */
    public function newAction(Request $request)
    {
        $localite = new Localite();
        $form = $this->createForm('SanteBundle\Form\LocaliteType', $localite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($localite);
            $em->flush();

            return $this->redirectToRoute('localite_index', array('idLocalite' => $localite->getIdlocalite()));
        }

        return $this->render('localite/new.html.twig', array(
            'localite' => $localite,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a localite entity.
     *
     */
    public function showAction(Localite $localite)
    {
        $deleteForm = $this->createDeleteForm($localite);

        return $this->render('localite/show.html.twig', array(
            'localite' => $localite,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing localite entity.
     *
     */
    public function editAction(Request $request, Localite $localite)
    {
        $deleteForm = $this->createDeleteForm($localite);
        $editForm = $this->createForm('SanteBundle\Form\LocaliteType', $localite);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('localite_index', array('idLocalite' => $localite->getIdlocalite()));
        }

        return $this->render('localite/edit.html.twig', array(
            'localite' => $localite,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a localite entity.
     *
     */
    public function deleteAction(Request $request, Localite $localite)
    {
        $form = $this->createDeleteForm($localite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($localite);
            $em->flush();
        }

        return $this->redirectToRoute('localite_index');
    }



    /**
     * Creates a form to delete a localite entity.
     *
     * @param Localite $localite The localite entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Localite $localite)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('localite_delete', array('idLocalite' => $localite->getIdlocalite())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

}
