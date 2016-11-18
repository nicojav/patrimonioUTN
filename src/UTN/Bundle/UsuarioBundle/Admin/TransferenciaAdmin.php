<?php

namespace UTN\Bundle\UsuarioBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
#use Exporter\Source\DoctrineORMQuerySourceIterator;
#use Sonata\DoctrineORMAdminBundle\Datagrid\ProxyQuery;
#use Sonata\AdminBundle\Datagrid\ProxyQueryInterface;
use Doctrine\ORM\EntityRepository;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class TransferenciaAdmin extends AbstractAdmin
{
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
            ->add('idResponsableDestino',null,array('label' => 'Responsable Destino'))
            ->add('idUsuarioDestino',null,array('label' => 'Usuario Destino'))
            ->add('idEstadoTransferencia','entity',
                array(
                    'label' => 'Estado Transferencia',
                    //'expanded' => true,
                    //'disabled' => true,
                    //'read_only' => true,
                    'class' => 'UTN\Bundle\UsuarioBundle\Entity\EstadoTransferencia',
                    'property' => 'descripcion',
                    'query_builder' => function (EntityRepository $er)
                    {
                        return $er
                            ->createQueryBuilder('s')
                            //->select('s.descripcion')
                            //->from('UTN\Bundle\UsuarioBundle\Entity\EstadoTransferencia','s')
                            ->andWhere('s.idEstadoTransferencia in (?1)' )
                            ->setParameter( 1 ,'1'); //Pendiente Aprobacion
                    }
                ))
            ->add('descripcion')

            ->add('idInventario', 'sonata_type_collection', array(
                'cascade_validation' => false,
                'type_options' => array('delete' => false),
                'required' => false
            ), array(
                'edit' => 'inline',
                'inline' => 'table',
                'sortable'  => 'position',
                //'admin_code' => 'utn_usuario.admin.transferencia_inventario'
            ))

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
        //Set datos automaticos
        $object->setFechaInicio(new \DateTime());
        $object->setFechaActualizacion(new \DateTime());

        //Get usuario logueado
        $user = $this->getConfigurationPool()->getContainer()->get('security.context')->getToken()->getUser();
        $em = $this->modelManager->getEntityManager('InventariosBundle:Usuario');
        $usuarioLogueado = $em->getRepository('InventariosBundle:Usuario')->find($user->getId());
        $object->setIdUsuarioOrigen($usuarioLogueado);
        $object->setIdResponsableOrigen($usuarioLogueado);

        foreach ($object->getIdInventario() as $trasnInv) {
            $trasnInv->setIdTransferencia($object);
        }
    }

    public function preUpdate($object)
    {
        //Set datos automaticos
        $object->setFechaInicio(new \DateTime());
        $object->setFechaActualizacion(new \DateTime());

        //Get usuario logueado
        $user = $this->getConfigurationPool()->getContainer()->get('security.context')->getToken()->getUser();
        $em = $this->modelManager->getEntityManager('InventariosBundle:Usuario');
        $usuarioLogueado = $em->getRepository('InventariosBundle:Usuario')->find($user->getId());
        $object->setIdUsuarioOrigen($usuarioLogueado);
        $object->setIdResponsableOrigen($usuarioLogueado);

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
    }

    public function createQuery($context = 'list')
    {  //Patrimonio y Super Admin tienen acceso a todas las tablas

        if($this->getConfigurationPool()->getContainer()->get('security.context')->isGranted('ROLE_USUARIO'))
        {

            $user = $this->getConfigurationPool()->getContainer()->get('security.context')->getToken()->getUser();
            $em = $this->modelManager->getEntityManager('InventariosBundle:Usuario');
            $usuarioLogueado = $em->getRepository('InventariosBundle:Usuario')->find($user->getId());
            $query = parent::createQuery($context);

            if(is_null($usuarioLogueado->getIdUsuarioSuperior())) //logueado responsable de area
            {
                $query->orWhere(
                    $query->expr()->eq($query->getRootAlias() . '.idResponsableOrigen', ':usuario')
                );
                $query->setParameter('usuario', $usuarioLogueado->getIdSuperior());

                $query->orWhere(
                    $query->expr()->eq($query->getRootAlias() . '.idResponsableDestino', ':usuario')
                );
                $query->setParameter('usuario', $usuarioLogueado->getIdSuperior());
                return $query;
            }
            else //logueado sub responsable (solo ve lo que esta dirigido a el
            {
                $query->orWhere(
                    $query->expr()->eq($query->getRootAlias() . '.idUsuarioOrigen', ':usuario')
                );
                $query->setParameter('usuario', $usuarioLogueado->getIdUsuario());

                $query->orWhere(
                    $query->expr()->eq($query->getRootAlias() . '.idUsuarioDestino', ':usuario')
                );
                $query->setParameter('usuario', $usuarioLogueado->getIdUsuario());
                return $query;

            }

        }

        $query = parent::createQuery($context);
        return $query;
    }
}