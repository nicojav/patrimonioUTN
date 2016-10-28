<?php

namespace UTN\Bundle\DashboardMainBundle\Controller;

use Doctrine\DBAL\Types\IntegerType;
use Sonata\AdminBundle\Controller\CRUDController;
use Sonata\AdminBundle\Model\ModelManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use UTN\Bundle\DashboardMainBundle\Entity;
use Sonata\DatagridBundle\ProxyQuery\Doctrine\ProxyQuery;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM;

class NotificacionAdminController extends CRUDController
{
    protected  $result_idNotif;

    public function  getNotificacionesPollAction(Request $request)
    {
        if($request->isXmlHttpRequest()) {

            $modelManager = $this->admin->getModelManager();
            $queryBuilder = $modelManager->getEntityManager('UTN\Bundle\DashboardMainBundle\Entity\Notificacion');

            //Parametros
            $auxPar = 'no autorizado'; //Seguridad
            $auxPar2 = 'transferencia';//Seguridad

            $qb = $queryBuilder->createQueryBuilder()
                ->select('n.idNotificacion, n.mensaje, n.notificada')
                ->from('UTN\Bundle\DashboardMainBundle\Entity\Notificacion', 'n')
                ->where('n.notificada = 0 AND n.mensaje like :param or n.mensaje like :param2')
                ->setParameter('param', '%'.$auxPar.'%')
                ->setParameter('param2', '%'.$auxPar2.'%')
                ->setMaxResults(1);

            $result = $qb->getQuery()->getArrayResult();

            if($result){ //Si Array==null : FALSE

                $result_mensaje = $result[0]['mensaje'];
                $this->result_idNotif = $result[0]['idNotificacion'];
                $this->addFlash('warning',$result_mensaje);

                //Updateo la notificacion
                $this->updateNotificacion($modelManager);

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



    public function  updateNotificacion (ModelManagerInterface $managerInterface)
    {
        $qb = $managerInterface->getEntityManager('UTN\Bundle\DashboardMainBundle\Entity\Notificacion');
        $q = $qb->createQueryBuilder()
            ->update('UTN\Bundle\DashboardMainBundle\Entity\Notificacion', 'n')
            ->set('n.notificada', 1)
            ->where('n.idNotificacion = ?1')
            ->setParameter(1, $this->result_idNotif)
            ->getQuery();
        $q->execute();

     }
}
