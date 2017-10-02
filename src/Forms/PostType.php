<?php
/**
 * Created by PhpStorm.
 * User: shuwen
 * Date: 21/09/2017
 * Time: 14:35
 */

namespace App\Forms;

use App\Entity\Product;
use App\Entity\Category;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('content', CKEditorType::class)
            ->add('price')
            ->add('image', FileType::class)
            ->add('category')
            ->add('save', SubmitType::class, array('label' => 'Create Post'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class' => Product::class]);
    }
}

