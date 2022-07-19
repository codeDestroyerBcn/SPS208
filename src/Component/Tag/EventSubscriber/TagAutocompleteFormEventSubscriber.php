<?php

declare(strict_types=1);

namespace App\Component\Tag\EventSubscriber;

use App\Entity\Tag\TagInterface;
use App\Repository\Tag\TagRepositoryInterface;
use Doctrine\Persistence\ObjectManager;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Contracts\Translation\TranslatorInterface;

final class TagAutocompleteFormEventSubscriber implements EventSubscriberInterface
{
    private ObjectManager $objectManager;

    private FactoryInterface $tagFactory;

    private TagRepositoryInterface $tagRepository;

    private TranslatorInterface $translator;

    public function __construct(
        ObjectManager $objectManager,
        FactoryInterface $tagFactory,
        TagRepositoryInterface $tagRepository,
        TranslatorInterface $translator
    ) {
        $this->objectManager = $objectManager;
        $this->tagFactory = $tagFactory;
        $this->tagRepository = $tagRepository;
        $this->translator = $translator;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            FormEvents::PRE_SUBMIT => 'createNewTag',
        ];
    }

    public function createNewTag(FormEvent $event): void
    {
        $data = $event->getData();

        if (empty($data['tags'])) {
            $event->getForm()->addError(new FormError($this->translator->trans('tapir.ui.no_tag_selected')));
            $event->stopPropagation();

            return;
        }

        $tagCodes = explode(',', $data['tags']);
        $existingTags = $this->tagRepository->findBy(['code' => $tagCodes]);
        $existingTagCodes = array_map(static function (TagInterface $tag): string {
            return $tag->getCode();
        }, $existingTags);

        foreach ($tagCodes as $tagCode) {
            if (in_array($tagCode, $existingTagCodes, true)) {
                continue;
            }

            /** @var TagInterface $newTag */
            $newTag = $this->tagFactory->createNew();
            $newTag->setCode($tagCode);

            $this->objectManager->persist($newTag);
        }

        $this->objectManager->flush();
    }
}
