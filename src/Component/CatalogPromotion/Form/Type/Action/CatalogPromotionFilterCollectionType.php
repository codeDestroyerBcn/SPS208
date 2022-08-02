<?php

declare(strict_types=1);

namespace App\Component\CatalogPromotion\Form\Type\Action;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PercentType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Range;

final class CatalogPromotionFilterCollectionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('amount_discount', PercentType::class, [
                'label' => 'discount testing',
                'constraints' => [
                    new Range([
                        'min' => 0,
                        'max' => 1,
                        'notInRangeMessage' => 'sylius.catalog_promotion_action.percentage_discount.not_in_range',
                        'groups' => ['sylius'],
                    ]),
                ],
                'required' => false,
            ])
        ;
    }

    public function getBlockPrefix(): string
    {
        return 'tapir_catalog_promotion_filters';
    }
}
