<?php

namespace App\Form;

use App\Entity\Flag;
use App\Entity\Rujukan;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RujukanType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nama')
            ->add('flag', EntityType::class, [
                'class' => Flag::class,
                'disabled' => true, //bagiorg tkleh edit
                'choice_label' => 'nama',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Rujukan::class,
        ]);
    }
}
