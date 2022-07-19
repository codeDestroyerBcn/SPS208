<?php

declare(strict_types=1);

namespace App\Component\CatalogPromotion\Form\Type\Action;
use App\Component\Promotion\Form\Type\Filter\DesignerTagFilterConfigurationType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

final class CatalogPromotionFilterCollectionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('designer_tag_filter', DesignerTagFilterConfigurationType::class, [
                'label' => false,
                'required' => false,
            ])
        ;

        $builder
            ->addEventListener(FormEvents::PRE_SET_DATA, static function (FormEvent $event): void {
                $form = $event->getForm();

                $form->get('designer_tag_filter')->remove('exclude_tags');
            })
        ;
    }

    public function getBlockPrefix(): string
    {
        return 'tapir_catalog_promotion_filters';
    }
}
