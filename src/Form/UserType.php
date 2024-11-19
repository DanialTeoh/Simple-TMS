<?php

namespace App\Form;

use App\Entity\Rujukan;
use App\Entity\User;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username')
//            ->add('roles')
            ->add('password')
            ->add('isVerified')
            ->add('email')
            ->add('permission', EntityType::class, [
                'class' => Rujukan::class,
                'query_builder' => function(EntityRepository $er){
                    return $er->createQueryBuilder('r')
                        ->leftJoin('r.flag', 'flag')
                        ->andWhere('flag.nama = :namaFlag')
                        ->setParameter('namaFlag', 'Roles')
                        ->orderBy('r.nama', 'ASC');
                },
                'choice_label' => 'nama',
                'placeholder' => 'Choose',
                'required' => true,
                'multiple' => true,
                'expanded' =>true,  //ini memang untuk manytomany punya kalau nak buat choices
            ])
            ->add('picture', FileType::class, [
                'label' => 'Profile Picture',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '4M', // You can use a shorthand notation for file size here
                        'mimeTypes' => [
                            'application/pdf',
                            'application/x-pdf',
                            'image/png',
                            'image/jpeg',
                            'image/jpg',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid file format (PDF, PNG, JPEG).',
                    ]),
                ],
            ]) //yang ni memang untuk gambar

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
