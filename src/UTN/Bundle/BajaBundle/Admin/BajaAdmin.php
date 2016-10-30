<?php

namespace UTN\Bundle\BajaBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class BajaAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('motivo')
            ->add('fechaInicio','doctrine_orm_date_range',array('field_type'=>'sonata_type_date_range_picker',))
            ->add('fechaActualizacion','doctrine_orm_date_range',array('field_type'=>'sonata_type_date_range_picker',))
            ->add('idBaja',null,array('label'=>'Nro Baja'))
            ->add('idUsuario',null,array('label'=>'Usuario'))
            ->add('idEstado',null,array('label'=>'Estado Trámite'))
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('idBaja','integer',array('label'=>'Nro Trámite'))
            ->add('idUsuario','integer',array('label'=>'Usuario Solicitante'))
            ->add('fechaInicio','date',array('label'=>'Fecha Inicio','format'=>'d-m-Y','timezone'=>'America/Buenos_aires'))
            ->add('idEstado','text',array('label'=>'Estado Trámite'))
            ->add('fechaActualizacion','date',array('label'=>'Fecha Actualizacion','format'=>'d-m-Y','timezone'=>'America/Buenos_aires'))
            ->add('_action', null, array('label'=>'Acciones',
                'actions' => array(
                    'show' => array(),
                    'detalle' => array('template' => 'BajaBundle:CRUD:ver_detalle_control.html.twig')
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
//            ->add('idBaja')
            ->add('idUsuario')
            ->add('fechaInicio','sonata_type_date_picker')
            ->add('motivo')
            ->add('fechaActualizacion','sonata_type_date_picker')
           ->add('idEstado')
            ->end()
            ->with('Inventarios Solicitud Baja', array('collapsed' => true))
            ->add('idInventario', 'sonata_type_collection', array(
                'cascade_validation' => false,
                'type_options' => array('delete' => false),
                'required' => false
            ), array(
                'edit' => 'inline',
                'inline' => 'table',
                'sortable'  => 'position',
            ))
            ->end()

        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
           ->add('idBaja',null,array('label'=>'Nro. Baja'))
            ->add('idEstado',null,array('label'=>'Estado'))
            ->add('idUsuario',null,array('label'=>'Usuario Solicitante'))
            ->add('fechaInicio','date',array('label'=>'Fecha Inicio Trámite','format'=>'d-m-Y','timezone'=>'America/Buenos_aires'))
            ->add('motivo',null,array('label'=>'Motivo'))
            ->add('fechaActualizacion','date',array('label'=>'Fecha Actualización','format'=>'d-m-Y','timezone'=>'America/Buenos_aires'))

        ;
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
        '_sort_by' => 'idBaja',
        '_sort_by'=>'fechaActualizacion'
    );

    public function prePersist($object)
    {
        foreach ($object->getIdInventario() as $trasnInv) {
            $trasnInv->setIdBaja($object);
        }
    }

    public function preUpdate($object)
    {
        foreach ($object->getIdInventario() as $trasnInv) {
            $trasnInv->setIdBaja($object);
        }
    }

    public function createQuery($context = 'list')
    {  //Patrimonio y Super Admin tienen acceso a todas las tablas

        if($this->getConfigurationPool()->getContainer()->get('security.context')->isGranted('ROLE_USUARIO'))
        {
            $user = $this->getConfigurationPool()->getContainer()->get('security.context')->getToken()->getUser();
            $query = parent::createQuery($context);
            $query->andWhere(
                $query->expr()->eq($query->getRootAlias().'.idUsuario', ':usuario')
            );
            $query->setParameter('usuario', $user->getId());
            return $query;
        }

        $query = parent::createQuery($context);
        return $query;
    }

}
