<?php

namespace App\Controller;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;
use App\Entity\Etudiant;
use App\Form\EtudiantType;
use App\Repository\EtudiantRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EtudiantController extends AbstractController
{

    public function Matgenerate($NomEtudiant,$PrenomEtudiant){
        $annee = date('Y');
        $rand=rand();
        $rand = substr($rand,0,4);
        $firsts = strtoupper(substr($NomEtudiant,0,2));
        $lasts = strtoupper(substr($PrenomEtudiant,-2));
        return $matricule = $annee.$firsts.$lasts.$rand;

    }

    /**
     * @Route("/etudiant", name="etudiant")
     */
    public function index(EtudiantRepository $EtudiantRepository)
    {
        $etudiants = $EtudiantRepository->findAll();
    
        return $this->render('etudiant/index.html.twig', compact(('etudiants')));
    }

    /**
     * @Route("/etudiant/create", name="etudiant_create", methods={"POST","GET"})
     */
    public function create(Request $request) :Response
    {
        $etudiant= new Etudiant();
        $form = $this->createForm(EtudiantType::class,$etudiant, ['constraints' => [
            new NotBlank()
        ]]);
        $form->handleRequest($request);
        $etudiant->setMatriculeEtudiant($this->Matgenerate($etudiant->getNomEtudiant(),$etudiant->getPrenomEtudiant()));
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($etudiant);
            $em->flush();
        }
        return $this->render('etudiant/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/etudiant/update/{id}", name="etudiant_update", methods={"POST","GET"})
     */
    public function update(Request $request, $id) :Response
    {
        $etudiant2= new Etudiant();
        $etudiant2 = $this->getDoctrine()->getRepository(Etudiant::class)->find($id);
        $form = $this->createForm(EtudiantType::class,$etudiant2);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->flush();
        }
        return $this->render('etudiant/create_update.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/etudiant/delete/{id}", name="etudiant_delete", methods={"POST","GET"})
     */
    public function delete(Request $request, $id) :Response
    {
        
        $etudiant3 = $this->getDoctrine()->getRepository(Etudiant::class)->find($id);
        $em = $this->getDoctrine()->getManager();
            $em->remove($etudiant3);
            $em->flush();
        
        return $this->redirectToRoute('etudiant');
    }
 
}
