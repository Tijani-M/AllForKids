<?php

namespace ScolariteBundle\Controller;

use ScolariteBundle\Entity\Parascolaire;
use ScolariteBundle\Form\ParascolaireSearchType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * Parascolaire controller.
 *
 */
class ParascolaireController extends Controller
{
    /**
     * Lists all parascolaire entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $parascolaires = $em->getRepository('ScolariteBundle:Parascolaire')->findAll();

        return $this->render('parascolaire/index.html.twig', array(
            'parascolaires' => $parascolaires,
        ));
    }

    public function indexJsonAction()
    {
        $em = $this->getDoctrine()->getManager();

        $parascolaires = $em->getRepository('ScolariteBundle:Parascolaire')->findAll();

        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceLimit(1);
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });
        $serializer=new Serializer([ $normalizer]);
        $formatted=$serializer->normalize($parascolaires);
        return $this->json($formatted);
    }

    public function findJsonAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $parascolaire = $em->getRepository('ScolariteBundle:Parascolaire')->find($id);

        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceLimit(1);
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });
        $serializer=new Serializer([ $normalizer]);
        $formatted=$serializer->normalize($parascolaire);
        return $this->json($formatted);
    }

    /**
     * Creates a new parascolaire entity.
     *
     */
    public function newAction(Request $request)
    {
        $parascolaire = new Parascolaire();
        $parascolaire->setMembreProposant($this->getUser());
        $form = $this->createForm('ScolariteBundle\Form\ParascolaireType', $parascolaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($parascolaire);
            $em->flush();

            return $this->redirectToRoute('parascolaire_index');
        }

        return $this->render('parascolaire/new.html.twig', array(
            'parascolaire' => $parascolaire,
            'form' => $form->createView(),
        ));
    }

    public function searchAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $parascolaires = $em->getRepository('ScolariteBundle:Parascolaire')->findAll();
        $form = $this->createForm(ParascolaireSearchType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $idTypePara = $request->request->get("parascolaire_search")["type"];
            $idMatiere = $request->request->get("parascolaire_search")["matiere"];
            $TypePara = $em->getRepository('ScolariteBundle:TypePara')->find($idTypePara);
            $Matiere = $em->getRepository('ScolariteBundle:Matiere')->find($idMatiere);
            $parascolaires = $this
                ->getDoctrine()
                ->getRepository('ScolariteBundle:Parascolaire')
                ->recherche($TypePara,$Matiere);
        }
        return $this->render('parascolaire/search.html.twig', array(
            'form' => $form->createView(),
            "Parascolaires" => $parascolaires
        ));
    }

    public function validerAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        if(!($id=="")){
            $parascolaire = $em->getRepository('ScolariteBundle:Parascolaire')->find($id);
            $parascolaire->setValide(true);
            $parascolaire->setDateValidation(new \DateTime());
            $parascolaire->setValidateur($this->getUser());

            $em->persist($parascolaire);
            $em->flush();
            return $this->redirectToRoute('parascolaire_validate');
        }
        $user=$this->getUser();
        $parascolaires = $em->getRepository('ScolariteBundle:Parascolaire')->chercherNonValide($user);

        return $this->render('parascolaire/showNonValide.html.twig', array(
            "parascolaires" => $parascolaires
        ));
    }


    /**
     * Finds and displays a parascolaire entity.
     *
     */
    public function showAction(Parascolaire $parascolaire)
    {
        $deleteForm = $this->createDeleteForm($parascolaire);

        return $this->render('parascolaire/show.html.twig', array(
            'parascolaire' => $parascolaire,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing parascolaire entity.
     *
     */
    public function editAction(Request $request, Parascolaire $parascolaire)
    {
        $deleteForm = $this->createDeleteForm($parascolaire);
        $editForm = $this->createForm('ScolariteBundle\Form\ParascolaireType', $parascolaire);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('parascolaire_index');
        }

        return $this->render('parascolaire/edit.html.twig', array(
            'parascolaire' => $parascolaire,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a parascolaire entity.
     *
     */
    public function deleteAction(Request $request, Parascolaire $parascolaire)
    {
        $form = $this->createDeleteForm($parascolaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($parascolaire);
            $em->flush();
        }

        return $this->redirectToRoute('parascolaire_index');
    }

    /**
     * Creates a form to delete a parascolaire entity.
     *
     * @param Parascolaire $parascolaire The parascolaire entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Parascolaire $parascolaire)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('parascolaire_delete', array('id' => $parascolaire->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
