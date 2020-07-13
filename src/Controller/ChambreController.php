<?php

namespace App\Controller;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;
use App\Entity\Chambre;
use App\Entity\Batiment;
use App\Form\ChambreType;
use App\Repository\ChambreRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ChambreController extends AbstractController
{
    /**
     * @Route("/chambre", name="chambre")
     */
    public function index(ChambreRepository $ChambreRepository,Request $request, PaginatorInterface $paginator)
    {
        $donnees = $ChambreRepository->findAll();
        $chambres = $paginator->paginate(
            $donnees,
            $request->query->getInt('page',1),
            1
        );

        return $this->render('chambre/index.html.twig',compact(('chambres')));
         
    }
    /**
     * @Route("/chambre/create", name="chambre_create", methods={"POST","GET"})
     */
    public function create(Request $request) :Response
    {
        $chambre= new Chambre();
        
        $form2 = $this->createForm(ChambreType::class,$chambre);
        $form2->handleRequest($request);
        if($form2->isSubmitted() && $form2->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($chambre);
            $em->flush();
        }
        return $this->render('chambre/create.html.twig', [
            'form' => $form2->createView(),
        ]);
    }
    /**
     * @Route("/chambre/update/{id}", name="chambre_update", methods={"POST","GET"})
     */
    public function update(Request $request, $id) :Response
    {
        $chambre2= new Chambre();
        $chambre2 = $this->getDoctrine()->getRepository(Chambre::class)->find($id);
        $form = $this->createForm(ChambreType::class,$chambre2);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->flush();
        }
        return $this->render('chambre/create_update.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/chambre/delete/{id}", name="chambre_delete", methods={"POST","GET"})
     */
    public function delete(Request $request, $id) :Response
    {
        
        $chambre3 = $this->getDoctrine()->getRepository(Chambre::class)->find($id);
        $em = $this->getDoctrine()->getManager();
            $em->remove($chambre3);
            $em->flush();
        
        return $this->redirectToRoute('chambre');
    }
}
