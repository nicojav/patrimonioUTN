<?php

namespace UTN\Bundle\DashboardMainBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use UTN\Bundle\DashboardMainBundle\Entity;
use Sonata\DatagridBundle\ProxyQuery\Doctrine\ProxyQuery;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM;

class NotificacionAdminController extends CRUDController
{
    public function  getNotificacionesPollAction(Request $request)
    {
        if($request->isXmlHttpRequest()) {

            $modelManager = $this->admin->getModelManager();
            $queryBuilder = $modelManager->getEntityManager('UTN\Bundle\DashboardMainBundle\Entity\Notificacion');

            $auxPar = 'no autorizado';
            $qb = $queryBuilder->createQueryBuilder()
                ->select('n.idNotificacion, n.mensaje, n.notificada')
                ->from('UTN\Bundle\DashboardMainBundle\Entity\Notificacion', 'n')
                ->where('n.notificada = 0 AND n.mensaje like :param')
                ->setParameter('param', '%'.$auxPar.'%')
                ->setMaxResults(1);

            $result = $qb->getQuery()->getArrayResult();

            if($result){ //Si Array==null : FALSE

                $result_mensaje = $result[0]['mensaje'];
                $result_idNotif = $result[0]['idNotificacion'];
                $this->addFlash('warning',$result_mensaje);

                return new JsonResponse(array(
                    'mensaje' => $result_mensaje
                ));

            }


            /*$response = new Response();
            $response->setStatusCode(200); //SUCCESS
            return $response;*/
        }

        $response = new Response();
        $response->setStatusCode(404); //ERROR
        return $response;
    }
}
