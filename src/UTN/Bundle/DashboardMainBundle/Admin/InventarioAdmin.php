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
            ->add('fechaAlta','doctrine_orm_date_range',array('field_type'=>'sonata_type_date_range_picker',))
            ->add('fechaActualizacion','doctrine_orm_date_range',array('field_type'=>'sonata_type_date_range_picker',))
            ->add('alarmaActiva',null,array('label'=>'Alarma Activa'))
            ->add('etiquetaImpresa',null,array('label'=>'Etiqueta Impresa'))
            ->add('fechaControl','doctrine_orm_date_range',array('field_type'=>'sonata_type_date_range_picker',))
            ->add('idUsuarioControl',null,array('label'=>'Controló'))
            ->add('idInventario',null,array('label'=>'Nro. Inventario'))

        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('idInventario','integer',array('label'=>'Nro. Inventario'))
            ->add('descripcion')
            ->add('fechaAlta','datetime',array('label'=>'Fecha Alta','format'=>'d-m-Y H:i','timezone'=>'America/Buenos_aires','sorteable'=>'true'))
            ->add('fechaActualizacion','datetime',array('label'=>'Fecha Actualización','format'=>'d-m-Y H:i','timezone'=>'America/Buenos_aires','sorteable'=>'true'))
            ->add('alarmaActiva')
            ->add('etiquetaImpresa')
            ->add('fechaControl','datetime',array('label'=>'Fecha Último Control','format'=>'d-m-Y H:i','timezone'=>'America/Buenos_aires','sorteable'=>'true'))
            ->add('idUsuarioControl','text',array('label'=>'Id Usuario Control'))
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
            ->add('fechaAlta','sonata_type_date_picker')
            ->add('fechaActualizacion','sonata_type_date_picker')
            ->add('idEstado',null,array('label'=>'Estado'))
            ->add('idCuenta',null,array('label'=>'Cuenta'))
            ->add('idEspecie',null,array('label'=>'Especie'))
            ->add('alarmaActiva')
            ->add('etiquetaImpresa')
            //->add('fechaControl','sonata_type_datetime_picker')
            //->add('idUsuarioControl')
            //->add('idInventario')
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
