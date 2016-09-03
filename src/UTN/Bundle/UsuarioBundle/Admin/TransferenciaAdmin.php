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
            ->add('idResponsableOrigen')
            ->add('idResponsableDestino')
            ->add('descripcion')
            ->add('fechaInicio')
            ->add('fechaActualizacion')
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
            ->add('idResponsableOrigen')
            ->add('idResponsableDestino')
            ->add('idUsuarioOrigen')
            ->add('idUsuarioDestino')
            ->add('descripcion')
            ->add('idEstadoTransferencia')
            ->add('fechaInicio')
            ->add('fechaActualizacion')
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
        $em = $this->modelManager->getEntityManager('UTN\Bundle\UsuarioBundle\Entity\Inventario');

        $query = $em->createQueryBuilder('s')
           ->select('s.descripcion')
           ->from('UTN\Bundle\UsuarioBundle\Entity\Inventario','s') //->from('UTNUsuarioBundle:Inventario', 's')
           ->groupBy('s.descripcion')
        ;



        $formMapper
        //  ->add('idInventario')
            ->add('idInventario', 'sonata_type_model', array(
                //'class' => 'UTN\Bundle\UsuarioBundle\Entity\Inventario',
                'multiple' => true ,
                'required' => true,
                'query' => $query
            ))
            ->add('idResponsableOrigen')
            ->add('idResponsableDestino')
            ->add('idUsuarioOrigen')
            ->add('idUsuarioDestino')
            ->add('idEstadoTransferencia')
            ->add('descripcion')
            ->add('fechaInicio')
            ->add('fechaActualizacion')
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
            ->add('idResponsableOrigen')
            ->add('idResponsableDestino')
            ->add('idUsuarioOrigen')
            ->add('idUsuarioDestino')
            ->add('idEstadoTransferencia')
            ->add('descripcion')
            ->add('fechaInicio')
            ->add('fechaActualizacion')
            ->add('idTransferencia')
        ;
    }
}
