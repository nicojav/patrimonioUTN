<?php

namespace UTN\Bundle\InventariosBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;


class InventarioAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
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
            ->add('fechaAlta','date',array('label'=>'Fecha Alta','format'=>'d-m-Y','sorteable'=>'true'))
            ->add('fechaActualizacion','datetime',array('label'=>'Fecha Actualización','format'=>'d-m-Y H:i','timezone'=>'America/Buenos_aires','sorteable'=>'true'))
            ->add('alarmaActiva',null,array('editable'=>true))
            ->add('etiquetaImpresa')
            ->add('fechaControl','datetime',array('label'=>'Fecha Último Control','format'=>'d-m-Y H:i','timezone'=>'America/Buenos_aires','sorteable'=>'true'))
            ->add('idUsuarioControl','text',array('label'=>'Id Usuario Control'))
            ->add('codNroInventario')
            ->add('codDependencia')
            ->add('codGrupo')
             ->add('programa')
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Alta Inventario', array('collapsed' => true))
            ->add('idInventario',null,array('label'=>'Nro. Inventario'))
            ->add('descripcion')
            ->add('importe')
            ->add('idEstado',null,array('label'=>'Estado'))
            ->add('programa')
            ->end()
            ->with('Especie', array('collapsed' => true))
            ->add('idEspecie',null,array('label'=>'Especie'))
            ->add('idCuenta',null,array('label'=>'Cuenta'))
            ->end()
            ->with('Seguridad', array('collapsed' => true))
            ->add('alarmaActiva',null,array('label'=>'Activar Alarma'))
            ->end()
            ->with('Asignacion Área Responsable', array('collapsed' => true))
            ->add('codDependencia')
            ->add('codGrupo')
            ->add('idResponsable',null,array('label'=>'Nombre Responsable'))
            ->add('idSector',null,array('label'=>'Sector'))
            ->end()
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('delete');
    }
    protected $datagridValues = array(
        // mostrar pagina principal
        '_page' => 1,
        // por defecto ASC
        '_sort_order' => 'DESC',
        // criterio de ordenamiento
        '_sort_by' => 'idInventario',
    );

    public function prePersist($object)
    {
        $object->setFechaAlta(new \DateTime());
        $object->setFechaActualizacion(new \DateTime());
        $object->setcodNroInventario($object->getIdInventario());
        $object->setEtiquetaImpresa(false);
    }

}
