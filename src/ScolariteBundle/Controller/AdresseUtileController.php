<?php

namespace ScolariteBundle\Controller;

use ScolariteBundle\Entity\AdresseUtile;
use ScolariteBundle\Entity\CategorieLieu;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use ScolariteBundle\Form\AdresseUtileSearchType;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * Adresseutile controller.
 *
 */
class AdresseUtileController extends Controller
{
    /**
     * Lists all adresseUtile entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $adresseUtiles = $em->getRepository('ScolariteBundle:AdresseUtile')->findAll();

        return $this->render('adresseutile/index.html.twig', array(
            'adresseUtiles' => $adresseUtiles,
        ));
    }

    public function indexJsonAction()
    {
        $em = $this->getDoctrine()->getManager();

        $adresseUtiles = $em->getRepository('ScolariteBundle:AdresseUtile')->findAll();

        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceLimit(1);
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });
        $serializer=new Serializer([ $normalizer]);
        $formatted=$serializer->normalize($adresseUtiles);
        return $this->json($formatted);

    }

    public function mapAction()
    {
        $em = $this->getDoctrine()->getManager();

        $adresseUtiles = $em->getRepository('ScolariteBundle:AdresseUtile')->findAll();

        return $this->render('adresseutile/map.html.twig', array(
            'adresseUtiles' => $adresseUtiles,
        ));
    }
    public function searchAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $AdresseUtiles = $em->getRepository('ScolariteBundle:AdresseUtile')->findAll();
        $form = $this->createForm(AdresseUtileSearchType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $idCat = $request->request->get("adresse_utile_search")["categorie"];
            $cat = $em->getRepository('ScolariteBundle:CategorieLieu')->find($idCat);
            $AdresseUtiles = $cat->getAdresseUtile();
        }
        return $this->render('adresseutile/search.html.twig', array(
            'form' => $form->createView(),
            "AdresseUtiles" => $AdresseUtiles
        ));
    }

    /**
     * Creates a new adresseUtile entity.
     *
     */
    public function newAction(Request $request)
    {
        $adresseUtile = new Adresseutile();
        $form = $this->createForm('ScolariteBundle\Form\AdresseUtileType', $adresseUtile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $adresseUtile->setValide(false);
            $adresseUtile->setDateAjout(new \DateTime());
            $em = $this->getDoctrine()->getManager();
            $em->persist($adresseUtile);
            $em->flush();

            return $this->redirectToRoute('adresseutile_index');
        }

        return $this->render('adresseutile/new.html.twig', array(
            'adresseUtile' => $adresseUtile,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a adresseUtile entity.
     *
     */
    public function showAction(AdresseUtile $adresseUtile)
    {
        $deleteForm = $this->createDeleteForm($adresseUtile);

        return $this->render('adresseutile/show.html.twig', array(
            'adresseUtile' => $adresseUtile,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing adresseUtile entity.
     *
     */
    public function editAction(Request $request, AdresseUtile $adresseUtile)
    {
        $deleteForm = $this->createDeleteForm($adresseUtile);
        $editForm = $this->createForm('ScolariteBundle\Form\AdresseUtileType', $adresseUtile);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('adresseutile_index');
        }

        return $this->render('adresseutile/edit.html.twig', array(
            'adresseUtile' => $adresseUtile,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a adresseUtile entity.
     *
     */
    public function deleteAction(Request $request, AdresseUtile $adresseUtile)
    {
        $form = $this->createDeleteForm($adresseUtile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($adresseUtile);
            $em->flush();
        }

        return $this->redirectToRoute('adresseutile_index');
    }

    /**
     * Creates a form to delete a adresseUtile entity.
     *
     * @param AdresseUtile $adresseUtile The adresseUtile entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(AdresseUtile $adresseUtile)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('adresseutile_delete', array('id' => $adresseUtile->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}
