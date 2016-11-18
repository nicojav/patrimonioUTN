<?php

namespace UTN\Bundle\RetirosBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class RetiroAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('idRetiro',null,array('label'=>'Nro. Retiro'))
            ->add('nombreCompleto')
            ->add('fechaDesde','doctrine_orm_date_range', array('field_type'=>'sonata_type_date_range_picker',))
            ->add('fechaHasta','doctrine_orm_date_range', array('field_type'=>'sonata_type_date_range_picker',))
            ->add('estadoRetiro')
            ->add('motivo')

        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('idRetiro','number',array('label'=>'Nro. Retiro'))
            ->add('nombreCompleto')
            ->add('documento')
            ->add('telefono')
            ->add('fechaDesde','date',array('label'=>'Desde','format'=>'d-m-Y','timezone'=>'America/Buenos_aires'))
            ->add('fechaHasta','date',array('label'=>'Hasta','format'=>'d-m-Y','timezone'=>'America/Buenos_aires'))
            ->add('estadoRetiro', 'choice', array('label'=>'Estado','editable'=>true,
                'choices' => array(
                    'P' => 'Pendiente Recepcion',
                    'C' => 'Confirmado'
                )))
            ->add('motivo')
            ->add('_action', null, array('label'=>'Acciones',
                'actions' => array(
                    'show' => array(),
                    'edit' => array('template' => 'RetirosBundle:CRUD:list__action_edit.html.twig'),
                    'detalle' => array('template' => 'RetirosBundle:CRUD:ver_detalle_control.html.twig')
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
//            ->add('idRetiro')
//            ->add('idUsuario')
            ->add('nombreCompleto')
            ->add('documento')
            ->add('telefono')
            ->add('fechaDesde','sonata_type_date_picker')
            ->add('fechaHasta','sonata_type_date_picker')
            ->add('motivo')
            ->end()
            ->with('Inventarios Autorizados', array('collapsed' => true))
            ->add('idInventario', 'sonata_type_collection', array('label'=>'Agregar Inventarios',
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
            ->add('idRetiro')
            ->add('nombreCompleto')
            ->add('documento')
            ->add('telefono')
            ->add('fechaDesde','date',array('label'=>'Desde','format'=>'d-m-Y','timezone'=>'America/Buenos_aires'))
            ->add('fechaHasta','date',array('label'=>'Hasta','format'=>'d-m-Y','timezone'=>'America/Buenos_aires'))
            ->add('estadoRetiro')
            ->add('motivo')
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
        '_sort_by' => 'idRetiro',
        '_sort_by' => 'estadoRetiro'
    );

    public function prePersist($object)
    {
        //Get usuario logueado
        $user = $this->getConfigurationPool()->getContainer()->get('security.context')->getToken()->getUser();
        $em = $this->modelManager->getEntityManager('InventariosBundle:Usuario');
        $usuarioLogueado = $em->getRepository('InventariosBundle:Usuario')->find($user->getId());
        $object->setIdUsuario($usuarioLogueado);

        foreach ($object->getIdInventario() as $trasnInv) {
            $trasnInv->setIdRetiro($object);
        }
    }

    public function preUpdate($object)
    {
        //Get usuario logueado
        $user = $this->getConfigurationPool()->getContainer()->get('security.context')->getToken()->getUser();
        $em = $this->modelManager->getEntityManager('InventariosBundle:Usuario');
        $usuarioLogueado = $em->getRepository('InventariosBundle:Usuario')->find($user->getId());
        $object->setIdUsuario($usuarioLogueado);

        foreach ($object->getIdInventario() as $trasnInv) {
            $trasnInv->setIdRetiro($object);
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
