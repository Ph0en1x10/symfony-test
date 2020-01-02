<?php

namespace App\Controller;

use App\Entity\Employers;
use App\Form\EmployersType;
use App\Repository\EmployersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class EmployersController extends AbstractController
{
    /**
     * @Route("/", name="employers_index", methods={"GET"})
     */
    public function index(EmployersRepository $employersRepository): Response
    {
        return $this->render('employers/index.html.twig', [
            'employers' => $employersRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="employers_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $employer = new Employers();
        $form = $this->createForm(EmployersType::class, $employer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($employer);
            $entityManager->flush();

            return $this->redirectToRoute('employers_index');
        }

        return $this->render('employers/new.html.twig', [
            'employer' => $employer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="employers_show", methods={"GET"})
     */
    public function show(Employers $employer): Response
    {
        return $this->render('employers/show.html.twig', [
            'employer' => $employer,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="employers_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Employers $employer): Response
    {
        $form = $this->createForm(EmployersType::class, $employer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('employers_index');
        }

        return $this->render('employers/edit.html.twig', [
            'employer' => $employer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="employers_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Employers $employer): Response
    {
        if ($this->isCsrfTokenValid('delete'.$employer->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($employer);
            $entityManager->flush();
        }

        return $this->redirectToRoute('employers_index');
    }
}
