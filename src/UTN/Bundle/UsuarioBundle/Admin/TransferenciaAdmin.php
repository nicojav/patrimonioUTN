<?php

namespace UTN\Bundle\UsuarioBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class TransferenciaAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('idInventario')
            ->add('idResponsableAnterior')
            ->add('idResponsableNuevo')
            ->add('aprobado')
            ->add('fechaSolicitud')
            ->add('fechaFin')
            ->add('idTransferencia')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('idInventario')
            ->add('idResponsableAnterior')
            ->add('idResponsableNuevo')
            ->add('aprobado')
            ->add('fechaSolicitud')
            ->add('fechaFin')
            ->add('idTransferencia')
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
        $formMapper
            ->add('idInventario')
            ->add('idResponsableAnterior')
            ->add('idResponsableNuevo')
            ->add('aprobado')
            ->add('fechaSolicitud')
            ->add('fechaFin')
            ->add('idTransferencia')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('idInventario')
            ->add('idResponsableAnterior')
            ->add('idResponsableNuevo')
            ->add('aprobado')
            ->add('fechaSolicitud')
            ->add('fechaFin')
            ->add('idTransferencia')
        ;
    }
}
