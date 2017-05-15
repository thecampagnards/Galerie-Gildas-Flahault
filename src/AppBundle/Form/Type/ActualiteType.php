<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

final class ActualiteType extends AbstractType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $actualite = $builder->getData();
        $imageLabel = '';
        if (!empty($actualite->getMedia()) && $webPath = $actualite->getWebPath()) {
          $imageLabel = ' <img src="'.$webPath.'" class="admin-preview" height="300" />';
        }

        $builder->add('titre', TextType::class, [
            'label' => 'Titre',
        ]);

        $builder->add('description', TextareaType::class, [
            'label' => 'Description',
        ]);

        $builder->add('file', FileType::class, [
            'required' => false,
            'label' => 'Image'.$imageLabel,
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
