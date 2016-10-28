<?php

namespace UTN\Bundle\UsuarioBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Doctrine\ORM\EntityRepository;

class TrasnferenciaResultadosAdmin extends AbstractAdmin
{

    protected $baseRouteName = 'admin_trasnferencias_resultados';

    protected $baseRoutePattern = '/adminTransferenciaResultados';


    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            //->add('idInventario')
            ->add('idResponsableOrigen')
            ->add('idResponsableDestino')
            ->add('descripcion')
            ->add('fechaInicio')
            ->add('fechaActualizacion')
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
            ->setParameter(1, '2')//Aprobada(de patrimonio)
            ->setParameter(2, '3')//Aceptada
            ->setParameter(3, '4');//Rechazada
        return $query;
    }



    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            //->add('idInventario')
            ->add('idTransferencia','integer',array('label'=>'Nro Trámite'))
            ->add('idResponsableOrigen','integer',array('label'=>'Responsable Origen'))
            ->add('idResponsableDestino','integer',array('label'=>'Responsable Destino'))
            ->add('idUsuarioOrigen','integer',array('label'=>'Usuario Origen'))
            ->add('idUsuarioDestino','integer',array('label'=>'Usuario Destino'))
            ->add('descripcion')
            ->add('idEstadoTransferencia','integer',array('label'=>'Estado Transferencia'))
            ->add('fechaInicio','datetime',array('label'=>'Fecha','format'=>'d-m-Y H:i','timezone'=>'America/Buenos_aires','sorteable'=>'true'))
            ->add('fechaActualizacion','datetime',array('label'=>'Fecha','format'=>'d-m-Y H:i','timezone'=>'America/Buenos_aires','sorteable'=>'true'))
            ->add('_action', null, array(
                'actions' => array(
                    //'show' => array(),
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
                             ->setParameter( 1 ,'2') //Aprobar
                             ->setParameter( 2 ,'3') //Aceptar
                             ->setParameter( 3 ,'4');//Rechazar


                     }
                 ))
             ->add('descripcion',null,array(
                 'disabled'  => true))
             ->add('fechaInicio','sonata_type_date_picker',array(
                 'disabled'  => true))
             ->add('fechaActualizacion','sonata_type_date_picker',array(
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


}