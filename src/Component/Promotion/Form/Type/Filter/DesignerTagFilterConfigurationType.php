<?php

declare(strict_types=1);

namespace App\Component\Promotion\Form\Type\Filter;

use App\Component\Tag\Form\Type\TagAutocompleteChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

final class DesignerTagFilterConfigurationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('include_tags', TagAutocompleteChoiceType::class, [
                'label' => 'tapir.ui.include_designers_with_tags',
                'multiple' => true,
            ])
            ->add('exclude_tags', TagAutocompleteChoiceType::class, [
                'label' => 'tapir.ui.exclude_designers_with_tags',
                'multiple' => true,
            ]);
    }

    public function getBlockPrefix(): string
    {
        return 'sylius_promotion_action_filter_designer_configuration';
    }
}
