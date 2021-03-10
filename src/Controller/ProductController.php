<?php

namespace App\Controller;

use App\Entity\Product;
use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Psr\Log\LoggerInterface;


class ProductController extends AbstractController
{


    /**
     * @Route("/product", name="product")
     */
    public function product(): Response
    {

        $bdd_products = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findAll();
        return $this->render('product/creation.html.twig', [
            'products' => $bdd_products,
        ]);
    }

    /**
     * @Route("/product/{id}", name="detail")
     */
    public function detail(int $id): Response
    {


        $bdd_product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->find($id);
        return $this->render('product/detail.html.twig', [
            'product' => $bdd_product,
        ]);
    }
    // public function show(int $id): Response
    // {
    //     $product = $this->getDoctrine()
    //         ->getRepository(Product::class)
    //         ->findOneByIdJoinedToCategory($id);

    //     $category = $product->getCategory();
    // }

    // /**
    //  * @Route("/product/{id}", name="detail")
    //  */
    // public function show(int $id): Response
    // {
    //     $product = $this->getDoctrine()
    //         ->getRepository(Product::class)
    //         ->find($id);
        
    //     $categoryName = $product->getCategory()->getName();}

    // public function showProducts(int $id): Response
    // {
    //     $category = $this->getDoctrine()
    //        ->getRepository(Category::class)
    //        ->find($id);

    //     $products = $category->getProducts();}
}
