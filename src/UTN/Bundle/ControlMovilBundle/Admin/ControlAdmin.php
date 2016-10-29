<?php

namespace UTN\Bundle\ControlMovilBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;


class ControlAdmin extends AbstractAdmin
{

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('fecha','doctrine_orm_date_range', array('field_type'=>'sonata_type_date_range_picker',))
//            ->add('codFecha','doctrine_orm_date_range',array('label'=>'Fecha Relevamiento','field_type'=>'sonata_type_date_range_picker',))
            ->add('codAula',null,array('label'=>'Aula Relevada'))
            ->add('codUsuario',null,array('label'=>'Usuario'))
            ->add('fechaCorrida','doctrine_orm_date_range',array('label'=>'Fecha Consolidación','field_type'=>'sonata_type_date_range_picker',))
            ->add('idEstadoControl',null,array('label'=>'Estado'))
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('idControl',null,array('label'=>'ID Control'))
            ->add('fecha','datetime',array('label'=>'Fecha','format'=>'d-m-Y H:i','timezone'=>'America/Buenos_aires'))
//            ->add('codFecha','datetime',array('label'=>'Fecha Relevamiento','format'=>'d-m-Y H:i','timezone'=>'America/Buenos_aires'))
            ->add('fechaCorrida','datetime',array('label'=>'Fecha Consolidación','format'=>'d-m-Y H:i','timezone'=>'America/Buenos_aires'))
            ->add('codAula','text',array('label'=>'Aula','editable'=>true))
            ->add('idAula','choice',array('label'=>'Ubicación Inventarios'))
            ->add('codUsuario','text',array('label'=>'Relevó'))
    //        ->add('xml')
            ->add('idEstadoControl','text',array('label'=>'Estado'))
            ->add('_action', null, array('label'=>'Acciones',
                'actions' => array(
                    'edit' => array('template' => 'ControlMovilBundle:CRUD:list__action_edit.html.twig'),
                    'detalle' => array('template' => 'ControlMovilBundle:CRUD:ver_detalle_control.html.twig')
                )
            ))      ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('idControl',null,array('label'=>'ID Control','read_only'=>true))
            ->add('codAula','text',array('label'=>'Aula'))
            ->add('codUsuario','text',array('label'=>'Relevó','read_only'=>true))
            ->add('idAula',null,array('label'=>'Aulas Habilitadas'))
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('xml')
            ->add('fecha')
            ->add('codFecha')
            ->add('codAula')
            ->add('codUsuario')
            ->add('fechaCorrida')
            ->add('idControl')
            ->add('idEstadoControl','text',array('label'=>'Estado'))
        ;
    }
    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('create');
        $collection->remove('delete');
    }

    protected $datagridValues = array(
        // mostrar pagina principal
        '_page' => 1,
        // por defecto ASC
        '_sort_order' => 'DESC',
        // criterio de ordenamiento
        '_sort_by' => 'fechaCorrida',
    );

    public function createQuery($context = 'list')
    {
        $user = $this->getConfigurationPool()->getContainer()->get('security.context')->getToken()->getUser();

        $query = parent::createQuery($context);
        $query->andWhere(
            $query->expr()->eq($query->getRootAlias().'.codUsuario', ':usuario')
        );
        $query->setParameter('usuario', $user->getUsername());
        return $query;
    }

}
