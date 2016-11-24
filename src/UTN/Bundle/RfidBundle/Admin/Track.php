<?php

namespace UTN\Bundle\RfidBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

use Sonata\AdminBundle\Route\RouteCollection;

class Track extends AbstractAdmin

{
    protected $baseRouteName = 'admin_track';

    protected $baseRoutePattern = '/Tracking';

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



    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('idInventario','text',array('label'=>'Descripción Inventario'))
            ->add('idEstadoMovimiento','text',array('label'=>'Tipo de Movimiento'))
            ->add('fecha','datetime',array('label'=>'Fecha','format'=>'d-m-Y H:i','timezone'=>'America/Buenos_aires','sorteable'=>'true'))
            ->add('sensor.idSensor','text',array('label'=>'Ubicación Sensor'))
         ;
 }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {

    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {

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
        return array('idInventario','fecha','idSensor','idEstadoMovimiento'
        );
    }

    public function createQuery($context = 'list')
    {
            $query = parent::createQuery($context);
            $query->andWhere(
                $query->expr()->eq($query->getRootAlias().'.idInventario', ':id')
            );
            $query->setParameter('id', 1129);
            return $query;

    }


}
