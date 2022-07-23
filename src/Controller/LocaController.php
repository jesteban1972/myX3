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
    public function index(LocaRepository $locaRepository): Response
    {
        return $this->render('loca/index.html.twig', [
            'loca' => $locaRepository->findBy(['user' => ($this->getUser())->getId()]),
        ]);
    }

    #[Route('/new', name: 'app_loca_new', methods: ['GET', 'POST'])]
    public function new(Request $request, LocaRepository $locaRepository): Response
    {
        $locus = new Locus();
        $form = $this->createForm(LocusType::class, $locus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $locaRepository->add($locus, true);

            return $this->redirectToRoute('app_loca_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('loca/new.html.twig', [
            'locus' => $locus,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_loca_show', methods: ['GET'])]
    public function show(Locus $locus): Response
    {
        return $this->render('loca/show.html.twig', [
            'locus' => $locus,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_loca_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Locus $locus, LocaRepository $locaRepository): Response
    {
        $form = $this->createForm(LocusType::class, $locus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $locaRepository->add($locus, true);

            return $this->redirectToRoute('app_loca_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('loca/edit.html.twig', [
            'locus' => $locus,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_loca_delete', methods: ['POST'])]
    public function delete(Request $request, Locus $locus, LocaRepository $locaRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $locus->getId(), $request->request->get('_token'))) {
            $locaRepository->remove($locus, true);
        }

        return $this->redirectToRoute('app_loca_index', [], Response::HTTP_SEE_OTHER);
    }
}
