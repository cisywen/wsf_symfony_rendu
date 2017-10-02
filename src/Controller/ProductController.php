<?php
/**
 * Created by PhpStorm.
 * User: shuwen
 * Date: 19/09/2017
 * Time: 11:35
 */
namespace App\Controller;

use App\Entity\Category;
use App\Entity\Comment;
use App\Forms\PostComment;
use App\Forms\PostType;
use App\Entity\Product;
use App\Repository\ProductRepository;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Ivory\CKEditorBundle\Installer\CKEditorInstaller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProductController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function listAction()
    {
        $category=$this->get("doctrine")
            ->getRepository(Category::class)
            ->findAll();
        $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findAllOrderedById();
        return $this->render('home.html.twig',
            array('categories' => $category,'products' => $product )
        );

    }

    /**
     * @Route("/product", name="products")
     */
    public function showproAction()
    {
        $product=$this->get("doctrine")
            ->getRepository(Product::class)
            ->findAll();
        return $this->render('productliste.html.twig',
            array('products' => $product )
        );

    }
    /**
     * @Route("/product/{id}", name="productsinfo")
     */
    public function indexAction(Request $request,$id)
    {
        $product = $this->getDoctrine()->getRepository(Product::class)->find($id);

        $comment = new Comment();

        $form = $this->createForm(PostComment::class, $comment);

        $form->handleRequest($request);

        if($form->isValid()){
            $comment = $form->getData();
            $comment->setProduct($product);
            $manager = $this ->getDoctrine()->getManager();
            $manager->persist($comment);
            $manager->flush();

            return $this->redirectToRoute('homepage');
        }



        return $this->render(
            'product.html.twig',
            array(
                'form' => $form->createView(),
                'product'=> $product
            )
        );
    }

    /**
     * @Route("/add_product", name="add")
     * @param Request $request
     * @return Response
     */
    public function newAction(Request $request)
    {
        $product = new Product();

        /*$form = $this->createFormBuilder($product)
            ->add('name')
            ->add('content',CKEditorType::class)
            ->add('price')
            ->add('image', FileType::class)
            ->add('save', SubmitType::class)
            ->getForm();
*/
        $form = $this->createForm(PostType::class, $product);

        $form->handleRequest($request);

        if($form->isValid()){
            $product = $form->getData();
            $manager = $this ->getDoctrine()->getManager();
            $manager->persist($product);
            //sauvegarde de fichier image (type: uploadfile
            $file = $product->getImage();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $file->move(
                $this->getParameter('kernel.root_dir') . '/../public/uploads',
                $fileName
            );
            $product->setImage($fileName);
            $manager->flush();

            return $this->redirectToRoute('products');
        }

        return $this->render('new.html.twig', array(
            'form' => $form->createView(),
        ));
    }




}