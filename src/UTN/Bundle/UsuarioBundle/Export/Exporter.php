<?php


namespace UTN\Bundle\UsuarioBundle\Export;

use Exporter\Source\SourceIteratorInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RequestStack;
use Sonata\AdminBundle\Export\Exporter as BaseExporter;
use Doctrine\ORM;

class Exporter extends BaseExporter
{
    protected $knpSnappyPdf;
    protected $templateEngine;
    protected $request;
    protected $parentRequest;


    public function __construct(\Doctrine\ORM\EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function getResponse($format, $filename, SourceIteratorInterface $source)
    {
        if ('pdf' != $format) {
            return parent::getResponse($format, $filename, $source);
        }

        //Cabecera
        $qb = $this->em->createQueryBuilder()
            ->select('tf.idTransferencia idTransferencia,tf.fechaInicio fechaInicio,u.usuario usuario')
            ->from('UTN\Bundle\UsuarioBundle\Entity\TransferenciaInventario','ti')
            //->from('UTN\Bundle\DashboardMainBundle\Entity\Inventario', 'inv')
            ->leftJoin('ti.idTransferencia', 'tf')
            ->leftJoin('tf.idUsuarioOrigen', 'u')
            ->where('ti.idTransferencia = 1') //test
            ->setMaxResults(1);
        $resultHeader = $qb->getQuery()->getArrayResult();

        //Detalle
        //$modelManager = $this->admin->getModelManager();
        //$queryBuilder = $this->em->getEntityManager('UTN\Bundle\DashboardMainBundle\Entity\Entity\Inventario');

        $qb = $this->em->createQueryBuilder()
            ->select('inv.idInventario,inv.descripcion descripcion, au.descripcion aula, sed.descripcion sede')
            ->from('UTN\Bundle\UsuarioBundle\Entity\TransferenciaInventario','ti')
            //->from('UTN\Bundle\DashboardMainBundle\Entity\Inventario', 'inv')
            ->leftJoin('ti.idInventario', 'inv')
            ->leftJoin('inv.idAulaControl', 'au')
            ->leftjoin('au.idSede','sed')
            ->where('ti.idTransferencia = 1'); //test
        $resultRows = $qb->getQuery()->getArrayResult();
        /*$html = $this->templateEngine->renderView('UTNUsuarioBundle:Export:pdf.html.twig', array(
            'source' => $source
        ));*/
        $html = $this->templateEngine->render('UTNUsuarioBundle:Export:pdf.html.twig', array(
            'cabecera'=>$resultHeader,
            'renglones'=>$resultRows
            //'source' => $source
        ));
        $content = $this->knpSnappyPdf->getOutputFromHtml($html);

        return new Response($content, 200, array(
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => sprintf('attachment; filename=%s', $filename)
        ));
    }

    public function setKnpSnappyPdf($service)
    {
        $this->knpSnappyPdf = $service;
    }

    public function setTemplateEngine($service)
    {
        $this->templateEngine = $service;
    }

    public function setRequest(RequestStack $request_stack)
    {
        $this->request = $request_stack->getCurrentRequest();
        $ids = $this->request->get('idx');
        $this->parentRequest= $request_stack->getParentRequest();
    }

}