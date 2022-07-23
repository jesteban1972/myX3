<?php

namespace App\Controller;

use App\Entity\Praxis;
use App\Form\PraxisType;
use App\Repository\PracticaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/practica')]
class PracticaController extends AbstractController
{
    #[Route('/', name: 'app_practica_index', methods: ['GET'])]
    public function index(PracticaRepository $practicaRepository): Response
    {
        return $this->render('practica/index.html.twig', [
            'practica' => $practicaRepository->findBy(['user' => ($this->getUser())->getId()]),
        ]);
    }

    #[Route('/new', name: 'app_practica_new', methods: ['GET', 'POST'])]
    public function new(Request $request, PracticaRepository $practicaRepository): Response
    {
        $praxis = new Praxis();
        $form = $this->createForm(PraxisType::class, $praxis);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $practicaRepository->add($praxis, true);

            return $this->redirectToRoute('app_practica_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('practica/new.html.twig', [
            'praxis' => $praxis,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_practica_show', methods: ['GET'])]
    public function show(Praxis $praxis): Response
    {
        return $this->render('practica/show.html.twig', [
            'praxis' => $praxis,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_practica_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Praxis $praxis, PracticaRepository $practicaRepository): Response
    {
        $form = $this->createForm(PraxisType::class, $praxis);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $practicaRepository->add($praxis, true);

            return $this->redirectToRoute('app_practica_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('practica/edit.html.twig', [
            'praxis' => $praxis,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_practica_delete', methods: ['POST'])]
    public function delete(Request $request, Praxis $praxis, PracticaRepository $practicaRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $praxis->getId(), $request->request->get('_token'))) {
            $practicaRepository->remove($praxis, true);
        }

        return $this->redirectToRoute('app_practica_index', [], Response::HTTP_SEE_OTHER);
    }
}
