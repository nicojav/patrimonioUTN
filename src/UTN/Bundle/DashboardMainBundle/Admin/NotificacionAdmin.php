<?php

namespace UTN\Bundle\DashboardMainBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class NotificacionAdmin extends AbstractAdmin
{

   /* public function getTemplate($name)
    {
        switch ($name) {
            case 'layout':
                return 'UTNDashboardMainBundle::standard_layout.html.twig';
                break;
            default:
                return parent::getTemplate($name);
                break;
        }
    }*/

    /*protected function configureRoutes(RouteCollection $collection)
    {
        parent::configureRoutes($collection);
        $collection->add('');
    }*/



    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('notificada')
            ->add('idNotificacion')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('mensaje')
            ->add('notificada')
       ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('mensaje')
            ->add('notificada')
            ->add('idNotificacion')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('mensaje')
            ->add('notificada')
            ->add('idNotificacion')
        ;
    }
    protected function configureRoutes(RouteCollection $collection)
    {
     $collection->remove('create');
    }

    protected $datagridValues = array(
        // mostrar pagina principal
        '_page' => 1,
        // por defecto ASC
        '_sort_order' => 'ASC',
        // criterio de ordenamiento
        '_sort_by'=>'notificada'
        )
    ;
    public function createQuery($context = 'list')
    {  //Patrimonio y Super Admin tienen acceso a todas las tablas

        if($this->getConfigurationPool()->getContainer()->get('security.context')->isGranted('ROLE_USUARIO'))
        {
            $user = $this->getConfigurationPool()->getContainer()->get('security.context')->getToken()->getUser();
            $query = parent::createQuery($context);
            $query->andWhere(
                $query->expr()->eq($query->getRootAlias().'.idUsuarioDestino', ':usuario')
            );
            $query->setParameter('usuario', $user->getId());
            return $query;
        }

        $query = parent::createQuery($context);
        return $query;
    }

}
