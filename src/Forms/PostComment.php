<?php
/**
 * Created by PhpStorm.
 * User: shuwen
 * Date: 27/09/2017
 * Time: 14:57
 */

namespace App\Forms;

use App\Entity\Comment;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostComment  extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('author')
            ->add('comment', CKEditorType::class)
            ->add('save', SubmitType::class, array('label' => 'Create Post'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class' => Comment::class]);
    }
    public function getName()
    {
        return 'comment';
    }
}