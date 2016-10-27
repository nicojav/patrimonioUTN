<?php

namespace UTN\Bundle\UsuarioBundle\Controller;

use Doctrine\DBAL\Types\IntegerType;
use Sonata\AdminBundle\Controller\CRUDController;
use Sonata\AdminBundle\Model\ModelManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use UTN\Bundle\DashboardMainBundle\Entity;
use Doctrine\ORM;

class UsuarioAdminController extends CRUDController
{


    public function exportAction(Request $request)
    {
        $this->admin->checkAccess('export');

        $format = $request->get('format');

        $allowedExportFormats = (array) $this->admin->getExportFormats();

        if (!in_array($format, $allowedExportFormats)) {
            throw new \RuntimeException(
                sprintf(
                    'Export in format `%s` is not allowed for class: `%s`. Allowed formats are: `%s`',
                    $format,
                    $this->admin->getClass(),
                    implode(', ', $allowedExportFormats)
                )
            );
        }

        $filename = sprintf(
            'export_%s_%s.%s',
            strtolower(substr($this->admin->getClass(), strripos($this->admin->getClass(), '\\') + 1)),
            date('Y_m_d_H_i_s', strtotime('now')),
            $format
        );

        /*if ($data = json_decode($request->get('data'), true)) {
            $action = $data['action'];
            $idx = $data['idx'];
            $allElements = $data['all_elements'];
            $request->request->replace(array_merge($request->request->all(), $data));
        }

        $ids = $request->request->get('idx');*/


        /*$modelManager = $this->admin->getModelManager();
        $queryBuilder = $modelManager->getEntityManager('UTN\Bundle\UsuarioBundle\Entity\TransferenciaInventario');

        $qb =$queryBuilder->createQueryBuilder()
            ->select('inv.idInventario,inv.descripcion descripcion, au.descripcion aula, sed.descripcion sede')
            ->from('UTN\Bundle\UsuarioBundle\Entity\TransferenciaInventario','ti')
            //->from('UTN\Bundle\DashboardMainBundle\Entity\Inventario', 'inv')
            ->leftJoin('ti.idInventario', 'inv')
            ->leftJoin('inv.idAulaControl', 'au')
            ->leftjoin('au.idSede','sed')
            ->where('ti.idTransferencia = 1'); //test
        $result = $qb->getQuery()->getArrayResult();*/



        /*return $this->render('UTNUsuarioBundle:Export:pdf.html.twig', array(
            'arrResult'=>$result
            //'source' => $source
        ));*/

         return $this->get('sonata.admin.exporter')->getResponse(
            $format,
            $filename,
            $this->admin->getDataSourceIterator()
        );
    }

}
