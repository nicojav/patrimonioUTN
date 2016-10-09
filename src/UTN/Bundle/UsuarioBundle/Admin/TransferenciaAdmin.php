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

class TransferenciaAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            //->add('idInventario')
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
            //->add('idInventario')
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
        /*$em = $this->modelManager->getEntityManager('UTN\Bundle\UsuarioBundle\Entity\Inventario');

        $query = $em->createQueryBuilder('s')
           ->select('s.descripcion')
           ->from('UTN\Bundle\UsuarioBundle\Entity\Inventario') //->from('UTNUsuarioBundle:Inventario', 's')
           ->groupBy('s.descripcion')
        ;*/



        $formMapper
          //->add('idInventario')
            /*->add('idInventario', 'sonata_type_model', array(
                'class' => 'UTN\Bundle\UsuarioBundle\Entity\Inventario',
                'property' => 'descripcion',
                'multiple' => true ,
                'required' => true,
                'expanded' => true,
                'by_reference' => false
            ))*/


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


           /* ->add('idInventario', 'entity',
            array(
                'label' => 'Inventario',
                'multiple' => true,
                'expanded' => true,
                //'read_only' => true,
                'class' => 'UTN\Bundle\UsuarioBundle\Entity\Inventario',
                'property' => 'descripcion',
                'query_builder' => function (EntityRepository $er)
                {
                    return $er
                        ->createQueryBuilder('s');
                        //->select('s.descripcion');
                        //->andWhere('s.descripcion = ?1' )
                        //->setParameter( 1 , 'BANCO'); //TEST
                        //->groupBy('s.descripcion');
                        //->from('UTN\Bundle\UsuarioBundle\Entity\Inventario','s');

                }
            ))*/
            ->add('idResponsableOrigen')
            ->add('idResponsableDestino')
            ->add('idUsuarioOrigen')
            ->add('idUsuarioDestino')
            ->add('idEstadoTransferencia')
            ->add('descripcion')
            ->add('fechaInicio')
            ->add('fechaActualizacion')
            //->add('idTransferencia')
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

    public function prePersist($object)
    {
        foreach ($object->getIdInventario() as $trasnInv) {
            $trasnInv->setIdTransferencia($object);
        }
    }

    public function preUpdate($object)
    {
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


}
