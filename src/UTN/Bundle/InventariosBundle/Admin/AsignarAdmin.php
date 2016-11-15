<?php

namespace UTN\Bundle\InventariosBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;


class AsignarAdmin extends AbstractAdmin
{
    protected $baseRouteName = 'admin_asignar';

    protected $baseRoutePattern = '/AsignarResponsable';

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('fechaAlta','doctrine_orm_date_range',array('field_type'=>'sonata_type_date_range_picker',))
            ->add('alarmaActiva',null,array('label'=>'Alarma Activa'))
            ->add('idInventario',null,array('label'=>'Nro. Inventario'))
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('idInventario','integer',array('label'=>'Nro. Inventario'))
            ->add('descripcion')
            ->add('fechaAlta','date',array('label'=>'Fecha Alta','format'=>'d-m-Y','sorteable'=>'true'))
            ->add('fechaActualizacion','datetime',array('label'=>'Fecha Actualización','format'=>'d-m-Y H:i','timezone'=>'America/Buenos_aires','sorteable'=>'true'))
            ->add('alarmaActiva',null,array('editable'=>true))
            ->add('etiquetaImpresa')
            ->add('idResponsable',null,array('label'=>'Responsable Asignado','editable'=>true))
            ->add('_action', null, array('label'=>'Acciones',
                'actions' => array(
                    'edit' => array(),
                )
            ))      ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Alta Inventario', array('collapsed' => true))
            ->add('idInventario',null,array('label'=>'Nro. Inventario','read_only'=>true))
            ->add('descripcion',null,array('label'=>'Descripción','read_only'=>true))
            ->add('importe',null,array('label'=>'Importe $','read_only'=>true))
            ->end()
            ->with('Especie', array('collapsed' => true))
            ->add('idEspecie',null,array('label'=>'Especie','read_only'=>true))
            ->add('idCuenta',null,array('label'=>'Cuenta','read_only'=>true))
            ->end()
            ->with('Seguridad', array('collapsed' => true))
            ->add('alarmaActiva',null,array('label'=>'Activar Alarma'))
            ->end()
            ->with('Asignacion Área Responsable', array('collapsed' => true))
            ->add('codDependencia')
            ->add('codGrupo')
            ->add('idResponsable',null,array('label'=>'Nombre Responsable'))
            ->add('idSector',null,array('label'=>'Sector'))
            ->end()
        ;
    }


    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('delete');
        $collection->remove('create');
    }
    protected $datagridValues = array(
        // mostrar pagina principal
        '_page' => 1,
        // por defecto ASC
        '_sort_order' => 'DESC',
        // criterio de ordenamiento
        '_sort_by' => 'idInventario',
    );

    public function preUpdate($object)
    {
       $object->setFechaActualizacion(new \DateTime());
    }

    public function createQuery($context = 'list')
    {  //Inventarios dados de alta sin responsable

            $query = parent::createQuery($context);
            $query->andWhere(
                $query->expr()->eq($query->getRootAlias().'.idResponsable', ':usuario')
            );
            $query->setParameter('usuario', '0');

        return $query;
    }

}
