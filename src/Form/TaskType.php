<?php

namespace App\Form;

use App\Entity\Rujukan;
use App\Entity\Task;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('status')
            ->add('createdAt', null, [
                'widget' => 'single_text',
            ])
            ->add('jawatan', EntityType::class, [
                'class' => Rujukan::class,
                'query_builder' => function(EntityRepository $er){
                    return $er->createQueryBuilder('r')
                        ->leftJoin('r.flag', 'flag')
                        ->andWhere('flag.nama = :namaFlag')
                        ->setParameter('namaFlag', 'Jawatan')
                        ->orderBy('r.nama', 'ASC');
                },
                'placeholder' => 'Please choose'
            ])
            ->add('bahagian', EntityType::class, [
                'class' => Rujukan::class,
                'query_builder' => function(EntityRepository $er){
                    return $er->createQueryBuilder('r')
                        ->leftJoin('r.flag', 'flag')
                        ->andWhere('flag.nama = :namaFlag')
                        ->setParameter('namaFlag', 'Bahagian')
                        ->orderBy('r.nama', 'ASC');
                },
                'placeholder' => 'Please choose'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Task::class,
        ]);
    }
}
