<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new AppBundle\AppBundle(),

            // These are the other bundles the SonataAdminBundle relies on
            new Sonata\CoreBundle\SonataCoreBundle(),
            new Sonata\BlockBundle\SonataBlockBundle(),
            new Knp\Bundle\MenuBundle\KnpMenuBundle(),
            new Sonata\EasyExtendsBundle\SonataEasyExtendsBundle(),
            new Application\Sonata\UserBundle\ApplicationSonataUserBundle(),

            new FOS\UserBundle\FOSUserBundle(),
            new Sonata\UserBundle\SonataUserBundle('FOSUserBundle'),
            new Knp\Bundle\SnappyBundle\KnpSnappyBundle(),
            // And finally, the storage and SonataAdminBundle
            new Sonata\DoctrineORMAdminBundle\SonataDoctrineORMAdminBundle(),
            new Sonata\AdminBundle\SonataAdminBundle(),
            new UTN\Bundle\DashboardMainBundle\UTNDashboardMainBundle(),
            new UTN\Bundle\UsuarioBundle\UTNUsuarioBundle(),
            new UTN\Bundle\RfidBundle\RfidBundle(),
            new UTN\Bundle\ArduinoBundle\ArduinoBundle(),
            new UTN\Bundle\ControlMovilBundle\ControlMovilBundle(),
            new UTN\Bundle\RetirosBundle\RetirosBundle(),
            new UTN\Bundle\BajaBundle\BajaBundle(),
            new UTN\Bundle\InventariosBundle\InventariosBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'), true)) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir().'/config/config_'.$this->getEnvironment().'.yml');
    }
}
