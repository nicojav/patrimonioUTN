<?php

namespace UTN\Bundle\DashboardMainBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class NotificacionAdmin extends AbstractAdmin
{

    public function getTemplate($name)
    {
        switch ($name) {
            case 'layout':
                return 'UTNDashboardMainBundle::standard_layout.html.twig';
                break;
            default:
                return parent::getTemplate($name);
                break;
        }
    }

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
            ->add('mensaje')
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
            //->add('idNotificacion')
            /*->add('_action', null, array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))*/
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
}
