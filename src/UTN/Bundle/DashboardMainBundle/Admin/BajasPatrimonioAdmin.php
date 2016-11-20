<?php

namespace UTN\Bundle\DashboardMainBundle\Admin;

use Doctrine\ORM\EntityRepository;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;


class BajasPatrimonioAdmin extends AbstractAdmin
{
    protected $baseRouteName = 'admin_bajas_patrimonio';

    protected $baseRoutePattern = '/BajaPatrimonio';

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
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
                    'edit' => array(),
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
            ->with('Solicitud de Baja', array('collapsed' => true))
            ->add('idBaja',null,array('label'=>'Baja Nro.','disabled'  => true))
            ->add('fechaInicio','sonata_type_date_picker',array('disabled'  => true))
            ->add('idUsuario',null,array('label'=>'Solicitó','disabled'  => true))
            ->end()
            ->with('Inventarios a Baja', array('collapsed' => true))
            ->add('idInventario', 'sonata_type_collection', array('label'=>'Detalle','btn_add' => false,
                'cascade_validation' => false,
                'type_options' => array('delete' => false,'btn_add'=> false),
                'required' => false,'disabled'  => true
            ))
            ->end()
            ->with('Estado Solicitud de Baja',array('collapsed'=>true))
            ->add('idEstado', 'entity',
             array(
                 'label' => 'Estado Tramite',
                 'expanded' => true,
                 //'read_only' => true,
                 'class' => 'UTN\Bundle\InventariosBundle\Entity\Estado',
                 'property' => 'descripcion',
                 'query_builder' => function (EntityRepository $er)
                 {
                     return $er
                         ->createQueryBuilder('s')
                         ->andWhere('s.idEstado in (?1,?2,?3)' )
                         ->setParameter( 1 ,'2') //Pendiente Aprobacion
                         ->setParameter( 2 ,'3') //Aprobar
                          ->setParameter( 3 ,'0'); //Rechazar
                 }
             ))
            ->add('motivo',null,array('label'=>'Motivo de la solicitud / Comentarios'))
            ->end()
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
//        parent::configureShowFields($showMapper);
    }

    public function prePersist($object)
    {
        $object->setFechaActualizacion(new \DateTime());
        foreach ($object->getIdInventario() as $trasnInv) {
            $trasnInv->setIdBaja($object);
        }
    }

    public function preUpdate($object)
    {
        $object->setFechaActualizacion(new \DateTime());
        foreach ($object->getIdInventario() as $trasnInv) {
            $trasnInv->setIdBaja($object);
        }
    }


    public function getExportFormats()
    {
        return array_merge(parent::getExportFormats(), array('pdf'));
    }



    public function getExportFields()
    {
        $ret = array();
        $list = $this->getList();

        $names = array();

        $excluded_columns = array("batch","_action");

        foreach($list->getElements() as $k=>$v){

            if(!in_array($k,$excluded_columns)){
                $ret[] = $k;
                $names[] = $v->getOption('label');
            }
        }

        return $ret;

    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('delete');
        $collection->remove('create');
    }

    protected $datagridValues = array(
        // mostrar pagina principal
        '_page' => 1,
        // por defecto ASC
        '_sort_order' => 'DESC',
        // criterio de ordenamiento
        '_sort_by' => 'idBaja',
        '_sort_by'=>'fechaActualizacion',
        '_sort_by'=>'idEStado'
    );


}