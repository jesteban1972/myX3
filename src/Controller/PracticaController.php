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
    public function index(PracticaRepository $praxisRepository): Response
    {
        return $this->render('practica/index.html.twig', [
            'praxes' => $praxisRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_practica_new', methods: ['GET', 'POST'])]
    public function new(Request $request, PracticaRepository $praxisRepository): Response
    {
        $praxi = new Praxis();
        $form = $this->createForm(PraxisType::class, $praxi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $praxisRepository->add($praxi, true);

            return $this->redirectToRoute('app_practica_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('practica/new.html.twig', [
            'praxi' => $praxi,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_practica_show', methods: ['GET'])]
    public function show(Praxis $praxi): Response
    {
        return $this->render('practica/show.html.twig', [
            'praxi' => $praxi,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_practica_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Praxis $praxi, PracticaRepository $praxisRepository): Response
    {
        $form = $this->createForm(PraxisType::class, $praxi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $praxisRepository->add($praxi, true);

            return $this->redirectToRoute('app_practica_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('practica/edit.html.twig', [
            'praxi' => $praxi,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_practica_delete', methods: ['POST'])]
    public function delete(Request $request, Praxis $praxi, PracticaRepository $praxisRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$praxi->getId(), $request->request->get('_token'))) {
            $praxisRepository->remove($praxi, true);
        }

        return $this->redirectToRoute('app_practica_index', [], Response::HTTP_SEE_OTHER);
    }
}
