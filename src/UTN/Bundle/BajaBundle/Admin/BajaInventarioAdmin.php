<?php

namespace UTN\Bundle\BajaBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class BajaInventarioAdmin extends AbstractAdmin
{
    protected $parentAssociationMapping = 'baja';
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('idBaja',null,array('label'=>'Nro. Trámite'))
            ->add('idInventario',null,array('label'=>'Nro. Inventario'))
            ->add('motivo')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('idBaja','text',array('label'=>'Nro. Trámite'))
            ->add('idInventario','text',array('label'=>'Nro. Inventario'))
            ->add('motivo')

        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $link_parameters = array();

        if ($this->hasParentFieldDescription()) {
            $link_parameters = $this->getParentFieldDescription()->getOption('link_parameters', array());
        }

        if ($this->hasRequest()) {
            $context = $this->getRequest()->get('context', null);

            if (null !== $context) {
                $link_parameters['context'] = $context;
            }
        }

        //Filtrar inventarios activos del usuario.
        $user = $this->getConfigurationPool()->getContainer()->get('security.context')->getToken()->getUser()->getId();
        $em = $this->modelManager->getEntityManager('UTN\Bundle\InventariosBundle\Entity\Inventario');
        $query = $em->createQueryBuilder('c')
            ->select('c')
            ->from('InventariosBundle:Inventario', 'c')
            ->from('InventariosBundle:Usuario','u')
            ->where('(c.idEstado in(1,2) and c.idResponsable ='.$user.')or(c.idEstado in(1,2) and c.idResponsable = u.idUsuarioSuperior)')
            ->orderBy('c.idInventario');

        $formMapper
            ->add('idInventario', 'sonata_type_model', array('required' => false, 'query'=> $query, 'btn_add'=>false,'label'=>'Nro Inventario')
                ,array(
                    'admin_code' => 'inventarios.admin.mis_inventarios',
                    'link_parameters' => $link_parameters
                ))
            ->add('motivo',null,array('label'=>'Motivo de la Baja'))
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('motivo')
            ->add('idBajaInventario')
        ;
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('delete');

    }
}
