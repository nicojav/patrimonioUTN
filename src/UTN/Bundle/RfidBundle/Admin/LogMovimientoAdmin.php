<?php

namespace UTN\Bundle\RfidBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

use Sonata\AdminBundle\Route\RouteCollection;

class LogMovimientoAdmin extends AbstractAdmin

{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('idLogMovimiento')
            ->add('fecha')
            ->add('idInventario')
            ->add('idSensor')
            ->add('idEstadoMovimiento')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
//            ->add('idLogMovimiento')
            ->add('idInventario','text',array('label'=>'Código Inventario'))
            ->add('idEstadoMovimiento','text',array('label'=>'Tipo de Movimiento'))
            ->add('fecha','datetime',array('label'=>'Fecha'))
            ->add('idSensor','text',array('label'=>'Sensor'))
         ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('idLogMovimiento')
            ->add('idInventario')
            ->add('idEstadoMovimiento')
            ->add('fecha')
            ->add('idSensor')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('idLogMovimiento')
            ->add('idInventario')
            ->add('idEstadoMovimiento')
            ->add('fecha')
            ->add('idSensor')
    ;
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('create');
    }





}
