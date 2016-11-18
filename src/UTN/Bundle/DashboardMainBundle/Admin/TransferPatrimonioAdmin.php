<?php

namespace UTN\Bundle\DashboardMainBundle\Admin;

use Doctrine\ORM\EntityRepository;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;


class TransferPatrimonioAdmin extends AbstractAdmin
{

    protected $baseRouteName = 'admin_transfer_patrimonio';

    protected $baseRoutePattern = '/TrasnferenciasPatrimonio';


    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            //->add('idInventario')
            ->add('idResponsableOrigen',null,array('label'=>'Responsable Origen'))
            ->add('idResponsableDestino',null,array('label'=>'Responsable Destino'))
            ->add('descripcion')
            ->add('fechaInicio','doctrine_orm_date_range',array('field_type'=>'sonata_type_date_range_picker',))
            ->add('fechaActualizacion','doctrine_orm_date_range',array('field_type'=>'sonata_type_date_range_picker',))
            ->add('idTransferencia')
        ;
    }

    /*
     * Filtra las transferencias que NO son pendientes de Aprobacion
     *
     */
    public function createQuery($context = 'list')
    {
        $query = parent::createQuery($context);
        $query->getQueryBuilder()
              ->where('o.idEstadoTransferencia IN (?1,?2,?3)')
              ->setParameter(1, '1')//pendienteAprobacion
              ->setParameter(2, '2')//Aprobada
              ->setParameter(3, '4');//Rechazada
        return $query;
    }



    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('idTransferencia','integer',array('label'=>'Nro Trámite'))
            ->add('idResponsableOrigen','integer',array('label'=>'Responsable Origen'))
            ->add('idResponsableDestino','integer',array('label'=>'Responsable Destino'))
            ->add('idUsuarioOrigen','integer',array('label'=>'Usuario Origen'))
            ->add('idUsuarioDestino','integer',array('label'=>'Usuario Destino'))
            ->add('descripcion')
            ->add('idEstadoTransferencia','integer',array('label'=>'Estado Transferencia'))
            ->add('fechaInicio','datetime',array('label'=>'Fecha Inicio','format'=>'d-m-Y H:i','timezone'=>'America/Buenos_aires','sorteable'=>'true'))
            ->add('fechaActualizacion','datetime',array('label'=>'Fecha Actualización','format'=>'d-m-Y H:i','timezone'=>'America/Buenos_aires','sorteable'=>'true'))
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
            ->with('Solicitud de Transferencia', array('collapsed' => true))
            ->add('idTransferencia',null,array('label'=>'Nro Transferencia','disabled'=>true))
            ->add('fechaInicio','sonata_type_date_picker',array(
                'disabled'  => true))
            ->end()
            ->with('Origen - Destino', array('collapsed' => true))
            ->add('idResponsableOrigen',null,array(
                'disabled'  => true,'label'=>'Responsable Área Origen'))
            ->add('idUsuarioOrigen',null,array('disabled'  => true,'label'=>'Inicio el Trámite: Usuario'))
            ->add('idResponsableDestino',null,array('disabled'  => true, 'label'=>'Responsable Área Destino'))
            ->add('idUsuarioDestino',null,array('disabled'  => true,'label'=>'Destino del Trámite: Usuario'))
            ->end()
            ->with('Inventarios a transferir', array('collapsed' => true))
            ->add('idInventario', 'sonata_type_collection', array('label'=>'Detalle', 'btn_add'=>false,
                'cascade_validation' => false,
                'type_options' => array('delete' => false,'btn_add' => false), //'type_options' => array('delete' => false),
                'attr' => array('readonly' => true),
                'disabled'  => true, //Disabled para Patrimonio
                'required' => false
            ), array(
                'edit' => 'inline',
                'inline' => 'table',
                'sortable'  => 'position',

            ))
           ->end()
           ->with('Estado del Trámite', array('collapsed' => true))
           ->add('idEstadoTransferencia', 'entity',
             array(
                 'label' => 'Estado Transferencia',
                 'expanded' => true,
                 'class' => 'UTN\Bundle\UsuarioBundle\Entity\EstadoTransferencia',
                 'property' => 'descripcion',
                 'query_builder' => function (EntityRepository $er)
                 {
                     return $er
                         ->createQueryBuilder('s')
                         ->andWhere('s.idEstadoTransferencia in (?1,?2,?3)' )
                         ->setParameter( 1 ,'1') //Pendiente Aprobacion
                         ->setParameter( 2 ,'2') //Aprobar
                         ->setParameter( 3 ,'4');//Rechazar
                 }
             ))
            ->add('descripcion',null,array('label'=>'Motivo de la solicitud / Comentarios'))
            ->end()
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        parent::configureShowFields($showMapper);
        /* $showMapper
            ->add('idInventario')
            ->add('idResponsableOrigen')
            ->add('idResponsableDestino')
            ->add('idUsuarioOrigen')
            ->add('idUsuarioDestino')
            ->add('idEstadoTransferencia')
            ->add('descripcion')
            ->add('fechaInicio')
            ->add('fechaActualizacion')
            ->add('idTransferencia')
        ;*/
    }

    public function prePersist($object)
    {
        $object->setFechaActualizacion(new \DateTime());
        foreach ($object->getIdInventario() as $trasnInv) {
            $trasnInv->setIdTransferencia($object);
        }
    }

    public function preUpdate($object)
    {
        $object->setFechaActualizacion(new \DateTime());
        foreach ($object->getIdInventario() as $trasnInv) {
            $trasnInv->setIdTransferencia($object);
        }
    }


    public function getExportFormats()
    {
        return array_merge(parent::getExportFormats(), array('pdf'));
    }

    /**
     * {@inheritdoc}
     */
    /* public function getDataSourceIterator()
     {

         $datagrid = $this->getDatagrid();
         $datagrid->buildPager();
         $fields=$this->getExportFields();
         $query = $datagrid->getQuery();


         $query->select('DISTINCT ' . $query->getRootAlias());
         $query->setFirstResult(null);
         $query->setMaxResults(null);



         if ($query instanceof ProxyQueryInterface) {
             $query->addOrderBy($query->getSortBy(), $query->getSortOrder());
             $query = $query->getQuery();
         }


         return new DoctrineORMQuerySourceIterator($query, $fields,'d.m.Y');
     }*/




    public function getExportFields()
    {
        /* $results = $this->getModelManager()->getExportFields($this->getClass());

         // Need to add again our foreign key field here
         $results[] = 'idInventario';

         return $results;*/


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
        '_sort_by' => 'idTransferencia',
        '_sort_by'=>'fechaActualizacion'
    );
}