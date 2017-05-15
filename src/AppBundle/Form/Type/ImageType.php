<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ImageType extends AbstractType
{

    public function getParent()
    {
        return 'file';
    }

    public function getName()
    {
        return 'image';
    }
}
