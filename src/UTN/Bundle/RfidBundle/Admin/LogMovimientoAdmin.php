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
            ->add('fecha','doctrine_orm_date_range',array('field_type'=>'sonata_type_date_range_picker',))
            ->add('idSensor', null, array('label' => 'Sensor'))
            ->add('idEstadoMovimiento', null, array('label' => 'Tipo de Movimiento'));
    }

   public function createQuery($context = 'list')
    {
        $query = parent::createQuery($context);
        $query->getQueryBuilder()
            ->select('o, c')
            ->leftjoin('o.idInventario','c')
        ;

        return $query;

    }


    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('idInventario','text',array('label'=>'Descripción'))
 #           ->add('inventario.idInventario','text',array('label'=>'Nro. Inventario'))
            ->add('idEstadoMovimiento','text',array('label'=>'Tipo de Movimiento'))
            ->add('fecha','datetime',array('label'=>'Fecha','format'=>'d-m-Y H:i','timezone'=>'America/Buenos_aires','sorteable'=>'true'))
            ->add('idInventario.idAulaControl','text',array('label'=>'Aula'))
            ->add('sensor.idSensor','text',array('label'=>'Sensor'))



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
            ->add('idSensor');
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('idLogMovimiento','text',array('label'=>'Nro. Movimiento'))
            ->add('idInventario','text',array('label'=>'Descripción Inventario'))
    #        ->add('inventario.idInventario', 'integer', array('label' => 'Nro. Inventario'))
            ->add('idEstadoMovimiento', 'text', array('label' => 'Tipo de Movimiento'))
            ->add('fecha', 'datetime', array('label' => 'Fecha', 'format' => 'd-m-Y H:i', 'timezone' => 'America/Buenos_aires'))
            ->add('idSensor', 'text', array('label' => 'Sensor'))
            ->add('idInventario.idAulaControl','text',array('label'=>'Ubicacion'))
        ;
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('create');
        $collection->remove('edit');
        $collection->remove('delete');
    }

    protected $datagridValues = array(
        // mostrar pagina principal
        '_page' => 1,
        // por defecto ASC
        '_sort_order' => 'DESC',
        // criterio de ordenamiento
        '_sort_by' => 'fecha',
    );

    public function getExportFields() {
        return array('idInventario','fecha','idInventario.idAulaControl',
            'idSensor','idEstadoMovimiento'
        );
    }
}
