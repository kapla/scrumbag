<?php

namespace Sb\OAuthServerBundle\Form\Type;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;

class AuthorizeFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('allowAccess', 'checkbox', array(
            'label'      => 'Allow access'
        ));
    }

    /**
     * {@inheritDoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sb\OAuthServerBundle\Form\Model\Authorize'
        ));
    }

    public function getDefaultOptions(array $options)
    {
        return array('data_class' => 'Sb\OAuthServerBundle\Form\Model\Authorize');
    }

    public function getName()
    {
        return 'sb_oauth_server_authorize';
    }

}
