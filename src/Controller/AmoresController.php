<?php

namespace App\Controller;

use App\Entity\Amor;
use App\Form\Amor1Type;
use App\Repository\AmoresRepository;
use App\Repository\PracticaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\PersistentCollection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/amores')]
class AmoresController extends AbstractController
{
    #[Route('/', name: 'app_amores_index', methods: ['GET'])]
    public function index(AmoresRepository $amoresRepository): Response
    {
        return $this->render('amores/index.html.twig', [
            'amores' => $amoresRepository->findBy(['user' => ($this->getUser())->getId()]),
        ]);
    }

    #[Route('/new', name: 'app_amores_new', methods: ['GET', 'POST'])]
    public function new(Request $request, AmoresRepository $amoresRepository): Response
    {
        $amor = new Amor();
        $form = $this->createForm(Amor1Type::class, $amor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $amoresRepository->add($amor, true);

            return $this->redirectToRoute('app_amores_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('amores/new.html.twig', [
            'amor' => $amor,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_amores_show', methods: ['GET'])]
    public function show(Amor $amor, PracticaRepository $practicaRepository): Response
    {
        return $this->render('amores/show.html.twig', [
            'amor' => $amor,
            'practica' => $this->getPractica($amor->getAssignations(), $practicaRepository),
        ]);
    }

    #[Route('/{id}/edit', name: 'app_amores_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Amor $amor, AmoresRepository $amoresRepository): Response
    {
        $form = $this->createForm(Amor1Type::class, $amor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $amoresRepository->add($amor, true);

            return $this->redirectToRoute('app_amores_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('amores/edit.html.twig', [
            'amor' => $amor,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_amores_delete', methods: ['POST'])]
    public function delete(Request $request, Amor $amor, AmoresRepository $amoresRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$amor->getId(), $request->request->get('_token'))) {
            $amoresRepository->remove($amor, true);
        }

        return $this->redirectToRoute('app_amores_index', [], Response::HTTP_SEE_OTHER);
    }

    public function getPractica(PersistentCollection $assignations, PracticaRepository $practicaRepository): array
    {
        $practica = [];
        foreach ($assignations as $assignation) {
            $practica[] = $assignation->getPraxis();
        }

        return $practica;
    }
}
