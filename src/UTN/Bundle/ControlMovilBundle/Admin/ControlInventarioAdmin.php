<?php

namespace UTN\Bundle\ControlMovilBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class ControlInventarioAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('idEstadoControl',null,array('label'=>'Estado'))
            ->add('idControl',null,array('label'=>'ID Control'))
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('idControl',null,array('label'=>'ID Control'))
            ->add('codInventario',null,array('label'=>'Inventario Escaneado'))
            ->add('idInventario',null,array('label'=>'Descripción'))
//            ->add('idControlInventario')
            ->addIdentifier('idEstadoControl',null,array('label'=>'Estado'))
            ->add('_action', null, array('label'=>'Acciones',
                'actions' => array(
                    'show' => array(),
                    'edit' => array()
                )
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('codInventario',null,array('label'=>'Cod Inventario'))
            ->add('idControlInventario',null,array('label'=>'Inventario Escaneado','read_only'=>true,'disabled'=>true))
            ->add('idInventario',null,array('label'=>'Descripcion','read_only'=>true,'disabled'=>true))
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('codInventario')
            ->add('idControlInventario')
        ;
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('create');
        $collection->remove('delete');
    }
}
