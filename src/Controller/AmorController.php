<?php

namespace App\Controller;

use App\Entity\Amor;
use App\Form\Amor1Type;
use App\Repository\AmorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/amores')]
class AmorController extends AbstractController
{
    #[Route('/', name: 'app_amores_index', methods: ['GET'])]
    public function index(AmorRepository $amorRepository): Response
    {
        return $this->render('amores/index.html.twig', [
            'amors' => $amorRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_amores_new', methods: ['GET', 'POST'])]
    public function new(Request $request, AmorRepository $amorRepository): Response
    {
        $amor = new Amor();
        $form = $this->createForm(Amor1Type::class, $amor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $amorRepository->add($amor, true);

            return $this->redirectToRoute('app_amores_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('amores/new.html.twig', [
            'amor' => $amor,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_amores_show', methods: ['GET'])]
    public function show(Amor $amor): Response
    {
        return $this->render('amores/show.html.twig', [
            'amor' => $amor,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_amores_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Amor $amor, AmorRepository $amorRepository): Response
    {
        $form = $this->createForm(Amor1Type::class, $amor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $amorRepository->add($amor, true);

            return $this->redirectToRoute('app_amores_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('amores/edit.html.twig', [
            'amor' => $amor,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_amores_delete', methods: ['POST'])]
    public function delete(Request $request, Amor $amor, AmorRepository $amorRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$amor->getId(), $request->request->get('_token'))) {
            $amorRepository->remove($amor, true);
        }

        return $this->redirectToRoute('app_amores_index', [], Response::HTTP_SEE_OTHER);
    }
}
