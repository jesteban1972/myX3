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
        return $this->render('practica/practica.html.twig', [
            'practica' => $practicaRepository->findBy(['user' => ($this->getUser())->getId()]),
        ]);
    }

    #[Route('/{id}', name: 'app_practica_show', methods: ['GET'])]
    public function show(Praxis $praxis): Response
    {
        return $this->render('practica/praxis.html.twig', [
            'praxis' => $praxis,
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

        return $this->renderForm('practica/new_praxis.html.twig', [
            'praxis' => $praxis,
            'form' => $form,
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

        return $this->renderForm('practica/edit_praxis.html.twig', [
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

    #[Route(name: 'app_practica_preview', methods: ['GET'])]
    public function preview(Praxis $praxis, KalimaController $kalimaController): Response
    {
        return $this->render('practica/_preview.html.twig', [ // ??? porqué no se puede usar símplemente 'practica/preview'?
            'id' => $praxis->getId(),
            'name' => $praxis->getName(),
            'rating' => $praxis->getRating(),
            'date' => $praxis->getDate()->format('d/m/Y'),
            'ordinal' => $praxis->getOrdinal(),
            'locus' => $praxis->getLocus()->getName(),
            'excerpt' => $kalimaController->fetchExcerpt($praxis),
        ]);
    }
}
