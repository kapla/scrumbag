<?php

namespace Sb\OAuthServerBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Nelmio\Alice\Fixtures;

/**
 * Load fixtures
 */
class LoadFixtureData extends AbstractFixture implements ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        // Load seeds and fixtures
        $files = array();
        $files[] = __DIR__ . '/oauth.yml';

        Fixtures::load($files, $manager, array('providers' => array($this), 'locale' => 'fr_Fr'));
        $manager->flush();
    }
}
