<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use AppBundle\Form\Type\ImageType;

final class ActualiteType extends AbstractType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $actualite = $builder->getData();

        $builder->add('titre', TextType::class, [
            'label' => 'Titre',
        ]);

        $builder->add('description', TextareaType::class, [
            'label' => 'Description',
        ]);

        $builder->add('file', ImageType::class, [
            'required' => false,
            'label' => 'Image',
            'block_name' => 'image_widget',
            'attr' => ['image' => !empty($actualite->getMedia()) ? $actualite->getWebPath() : null]
        ]);

        $builder->addEventListener(FormEvents::SUBMIT, function (FormEvent $event) {
          $actualite = $event->getData();
          $actualite->preUploadFile();
          $actualite->uploadFile();
      });
    }

    /**
     * {@inheritdoc}
     */
     public function getName()
     {
         return $this->getBlockPrefix();
     }

     /**
      * {@inheritdoc}
      */
     public function getBlockPrefix()
     {
         return 'app_form_actualite';
     }
}
