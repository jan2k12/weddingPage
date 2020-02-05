<?php

namespace App\Form;

use App\Entity\GuestData;

use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\DataTransformer\IntegerToLocalizedStringTransformer;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GuestDataType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('confirmed',ChoiceType::class,['expanded'=>true,'multiple'=>false, 'choices'=>['Yes'=>true,'No'=>true],'required'=>true])
            ->add('transport',ChoiceType::class,[ 'choices'=>['own'=>true,'Bus'=>true],'required'=>true] )
            ->add('allergies', TextareaType::class,['required'=>false])
            ->add('guests', IntegerType::class, ['rounding_mode'=>IntegerToLocalizedStringTransformer::ROUND_UP,'required'=>true])
            ->add('childsTillThree', IntegerType::class,['rounding_mode'=>IntegerToLocalizedStringTransformer::ROUND_UP,'required'=>false])
            ->add('childsFourTillNine', IntegerType::class,['rounding_mode'=>IntegerToLocalizedStringTransformer::ROUND_UP,'required'=>false])
            ->add('childsTenTillFifteen', IntegerType::class,['rounding_mode'=>IntegerToLocalizedStringTransformer::ROUND_UP,'required'=>false])
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => GuestData::class,

        ]);
    }
}
