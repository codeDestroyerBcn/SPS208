<?php

declare(strict_types=1);

namespace App\Component\CatalogPromotion\Form\Extension\Action;

use App\Component\CatalogPromotion\Form\Type\Action\CatalogPromotionFilterCollectionType;
use Sylius\Bundle\PromotionBundle\Form\Type\CatalogPromotionAction\PercentageDiscountActionConfigurationType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;

final class PercentageDiscountActionConfigurationTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('filters', CatalogPromotionFilterCollectionType::class, [
                'label' => false,
                'required' => false,
            ])
        ;
    }

    public static function getExtendedTypes(): iterable
    {
        return [PercentageDiscountActionConfigurationType::class];
    }
}
