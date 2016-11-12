<?php

namespace UTN\Bundle\UsuarioBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class TransferenciaInventarioAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('descripcion')
            ->add('idTransferenciaInventario')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            //->add('descripcion')
            ->add('idTransferenciaInventario')
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
           /* ->add('descripcion')
            ->add('idTransferenciaInventario')
            ->add('idInventario')
            ->add('idTransferencia')*/
           ->add('idInventario', 'sonata_type_model', array('required' => false,'btn_add'=>false)
           ,array(
                'admin_code' => 'utn_dashboard_main.admin.inventario',
                'link_parameters' => $link_parameters
           ))
          /* ->add('idInventario', 'sonata_type_model_list', array('required' => false), array(
               'admin_code' => 'utn_dashboard_main.admin.inventario',
               'link_parameters' => $link_parameters
           ))*/
           //->add('position', 'hidden')
        ;


        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('descripcion')
            ->add('idTransferenciaInventario')
        ;
    }
}
