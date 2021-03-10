<?php

namespace App\Controller;

use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    // /**
    //  * @Route("/catalogue", name="catalogue")
    //  */
    public function category(): Response
    {
        $bdd_categories = $this->getDoctrine()
            ->getRepository(Category::class)
            ->findAll();
        return $this->render('category/catalogue.html.twig', [
            'categories' => $bdd_categories,
        ]);
    }

    /**
    * @Route("/catalogue/{id}", name="detail_category")
    */
    public function detail(int $id): Response
    {

        $bdd_category = $this->getDoctrine()
        ->getRepository(Category::class)
        ->find($id);

        return $this->render('product/creation.html.twig', [
            'detail_category' => $bdd_category,
            'products' => $bdd_category->getProducts(),
        ]);
    }
}
