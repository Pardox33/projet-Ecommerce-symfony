<?php

namespace App\Form;

use App\Entity\Product;
use App\Entity\SubCategory;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('price')
            ->add('stock')
            ->add("image", FileType::class, [
                'label' => 'Image de produit',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                new File([
                'maxSize' => '5024k',
                'maxSizeMessage' => 'La taille maximale autorisée est de 5MB',
                'mimeTypes' => [
                    'image/jpeg',
                    'image/png',
                    'image/webp',
                ],
                'mimeTypesMessage' => 'Veuillez télécharger une image valide (jpeg, png)',
        ])
    ]
])
            ->add('subCategories', EntityType::class, [
                'class' => SubCategory::class,
                'choice_label' => 'name',
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
{
    $resolver->setDefaults([
        'data_class' => Product::class,
        'attr' => ['enctype' => 'multipart/form-data'],
    ]);
}
}
