<?php

namespace App\Controller;

use App\Entity\Locus;
use App\Form\LocusType;
use App\Repository\LocaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/loca')]
class LocaController extends AbstractController
{
    #[Route('/', name: 'app_loca_index', methods: ['GET'])]
    public function index(LocaRepository $locusRepository): Response
    {
        return $this->render('loca/index.html.twig', [
            'locuses' => $locusRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_loca_new', methods: ['GET', 'POST'])]
    public function new(Request $request, LocaRepository $locusRepository): Response
    {
        $locu = new Locus();
        $form = $this->createForm(LocusType::class, $locu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $locusRepository->add($locu, true);

            return $this->redirectToRoute('app_loca_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('loca/new.html.twig', [
            'locu' => $locu,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_loca_show', methods: ['GET'])]
    public function show(Locus $locu): Response
    {
        return $this->render('loca/show.html.twig', [
            'locu' => $locu,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_loca_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Locus $locu, LocaRepository $locusRepository): Response
    {
        $form = $this->createForm(LocusType::class, $locu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $locusRepository->add($locu, true);

            return $this->redirectToRoute('app_loca_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('loca/edit.html.twig', [
            'locu' => $locu,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_loca_delete', methods: ['POST'])]
    public function delete(Request $request, Locus $locu, LocaRepository $locusRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$locu->getId(), $request->request->get('_token'))) {
            $locusRepository->remove($locu, true);
        }

        return $this->redirectToRoute('app_loca_index', [], Response::HTTP_SEE_OTHER);
    }
}
