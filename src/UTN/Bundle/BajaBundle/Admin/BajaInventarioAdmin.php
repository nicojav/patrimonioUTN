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

        $formMapper
            ->add('idInventario', 'sonata_type_model', array('required' => false, 'btn_add'=>false)
                ,array(
                    'admin_code' => 'utn_dashboard_main.admin.inventario',
                    'link_parameters' => $link_parameters
                ))
            ->add('motivo')
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
}
