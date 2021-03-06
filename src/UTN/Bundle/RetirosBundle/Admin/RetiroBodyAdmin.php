<?php

namespace UTN\Bundle\RetirosBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class RetiroBodyAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('idRetiro',null,array('label'=>'Nro. Retiro'))
            ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('idRetiro','number',array('label'=>'Nro Retiro'))
            ->add('idInventario','number',array('label'=>'Inventario'))


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
            ->where('(c.idEstado = 1 and c.idResponsable ='.$user.')or(c.idEstado = 1 and c.idResponsable = u.idUsuarioSuperior)')
            ->orderBy('c.idInventario');

        $formMapper
            ->add('idInventario', 'sonata_type_model', array('required' => false,'btn_add'=>false,'query' => $query, 'label'=>'Nro Inventario')
                ,array(
                    'admin_code' => 'inventarios.admin.mis_inventarios',
                    'link_parameters' => $link_parameters,

                ))

        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
        ;
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('delete');
        //$collection->remove('create');
        //$collection->remove('edit');
    }
    protected $datagridValues = array(
        // mostrar pagina principal
        '_page' => 1,
        // por defecto ASC
        '_sort_order' => 'DESC',
        // criterio de ordenamiento
        '_sort_by' => 'idRetiro',
    );

}
