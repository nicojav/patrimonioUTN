<?php

namespace UTN\Bundle\DashboardMainBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class InventarioAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */

    protected $baseRouteName = 'admin_patrimonio_inventario';

    protected $baseRoutePattern = '/adminPatrimonio';



    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('descripcion')
            ->add('fechaAlta')
            ->add('fechaActualizacion')
            ->add('alarmaActiva')
            ->add('etiquetaImpresa')
            ->add('fechaControl')
            ->add('idUsuarioControl')
            ->add('idInventario')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('descripcion')
            ->add('fechaAlta')
            ->add('fechaActualizacion')
            ->add('alarmaActiva')
            ->add('etiquetaImpresa')
            ->add('fechaControl')
            ->add('idUsuarioControl')
            ->add('idInventario')
            ->add('_action', null, array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
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
            ->add('descripcion')
            ->add('fechaAlta')
            ->add('fechaActualizacion')
            ->add('alarmaActiva')
            ->add('etiquetaImpresa')
            ->add('fechaControl')
            ->add('idUsuarioControl')
            ->add('idInventario')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('descripcion')
            ->add('fechaAlta')
            ->add('fechaActualizacion')
            ->add('alarmaActiva')
            ->add('etiquetaImpresa')
            ->add('fechaControl')
            ->add('idUsuarioControl')
            ->add('idInventario')
        ;
    }
}
