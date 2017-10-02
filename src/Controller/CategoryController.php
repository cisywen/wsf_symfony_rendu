<?php
/**
 * Created by PhpStorm.
 * User: shuwen
 * Date: 20/09/2017
 * Time: 10:32
 */

namespace App\Controller;

use App\Entity\Product;
use App\Entity\Category;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategoryController extends Controller
{


    /**
     * @Route("/category/{id}", name="categoryinfo")
     */
    public function indexAction($id)
    {
        $category = $this->getDoctrine()
            ->getRepository(Category::class)
            ->find($id);

        $products = $category->getProducts();
        return $this->render(
            'singlecategory.html.twig',
            array('category' => $category,'products' => $products  )
        );
    }



}