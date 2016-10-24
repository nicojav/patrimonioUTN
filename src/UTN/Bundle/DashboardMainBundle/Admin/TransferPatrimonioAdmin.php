<?php

namespace UTN\Bundle\DashboardMainBundle\Admin;

use Doctrine\ORM\EntityRepository;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;


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
//    public function createQuery($context = 'list')
//    {
//        $query = parent::createQuery($context);
//        $query->andWhere(
//            $query->expr()->eq($query->getRootAliases()[0] . '.idEstadoTransferencia', ':my_param')
//        );
//        $query->setParameter('my_param', '1'); //pendienteAprobacion
//        return $query;
//    }



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
            //->add('idInventario')
//            ->add('idResponsableOrigen')
//            ->add('idResponsableDestino')
//            ->add('idUsuarioOrigen')
//            ->add('idUsuarioDestino')
//            ->add('descripcion')
//            ->add('idEstadoTransferencia')
//            ->add('fechaInicio')
//            ->add('fechaActualizacion')
//            ->add('idTransferencia')
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
        /*$em = $this->modelManager->getEntityManager('UTN\Bundle\UsuarioBundle\Entity\Inventario');

        $query = $em->createQueryBuilder('s')
           ->select('s.descripcion')
           ->from('UTN\Bundle\UsuarioBundle\Entity\Inventario') //->from('UTNUsuarioBundle:Inventario', 's')
           ->groupBy('s.descripcion')
        ;*/



        $formMapper
            //->add('idInventario')
            /*->add('idInventario', 'sonata_type_model', array(
                'class' => 'UTN\Bundle\UsuarioBundle\Entity\Inventario',
                'property' => 'descripcion',
                'multiple' => true ,
                'required' => true,
                'expanded' => true,
                'by_reference' => false
            ))*/


            ->add('idInventario', 'sonata_type_collection', array(
                'cascade_validation' => false,
                'type_options' => array('delete' => false,'btn_add' => false), //'type_options' => array('delete' => false),
                'attr' => array('readonly' => true),
                'disabled'  => true, //Disabled para Patrimonio
                'required' => false
            ), array(
                'edit' => 'inline',
                'inline' => 'table',
                'sortable'  => 'position',
                //'admin_code' => 'utn_usuario.admin.transferencia_inventario'
            ))


            /* ->add('idInventario', 'entity',
             array(
                 'label' => 'Inventario',
                 'multiple' => true,
                 'expanded' => true,
                 //'read_only' => true,
                 'class' => 'UTN\Bundle\UsuarioBundle\Entity\Inventario',
                 'property' => 'descripcion',
                 'query_builder' => function (EntityRepository $er)
                 {
                     return $er
                         ->createQueryBuilder('s');
                         //->select('s.descripcion');
                         //->andWhere('s.descripcion = ?1' )
                         //->setParameter( 1 , 'BANCO'); //TEST
                         //->groupBy('s.descripcion');
                         //->from('UTN\Bundle\UsuarioBundle\Entity\Inventario','s');

                 }
             ))*/
            ->add('idResponsableOrigen',null,array(
                    'disabled'  => true))
            ->add('idResponsableDestino',null,array(
                    'disabled'  => true))
            ->add('idUsuarioOrigen',null,array(
                    'disabled'  => true))
            ->add('idUsuarioDestino',null,array(
                    'disabled'  => true))
            //->add('idEstadoTransferencia'//Patrimonio solo actualiza estado de transferencia
            ->add('idEstadoTransferencia', 'entity',
             array(
                 'label' => 'Estado Transferencia',
                 'expanded' => true,
                 //'read_only' => true,
                 'class' => 'UTN\Bundle\UsuarioBundle\Entity\EstadoTransferencia',
                 'property' => 'descripcion',
                 'query_builder' => function (EntityRepository $er)
                 {
                     return $er
                         ->createQueryBuilder('s')
                         //->select('s.descripcion')
                         //->from('UTN\Bundle\UsuarioBundle\Entity\EstadoTransferencia','s')
                         ->andWhere('s.idEstadoTransferencia in (?1,?2,?3)' )
                         ->setParameter( 1 ,'1') //Pendiente Aprobacion
                         ->setParameter( 2 ,'2') //Aprobar
                         ->setParameter( 3 ,'4'); //Rechazar


                 }
             ))
            ->add('descripcion',null,array(
                    'disabled'  => true))
            ->add('fechaInicio',null,array(
                    'disabled'  => true))
            ->add('fechaActualizacion',null,array(
                    'disabled'  => true))
            //->add('idTransferencia')
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
        foreach ($object->getIdInventario() as $trasnInv) {
            $trasnInv->setIdTransferencia($object);
        }
    }

    public function preUpdate($object)
    {
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


}