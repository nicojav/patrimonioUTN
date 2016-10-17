<?php

namespace UTN\Bundle\ArduinoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    //  on load registra el movimiento de un bien en un determinado sensor para mapear el tracking a futuro.
    public function indexAction($id)
    {
#       return $this->render('ArduinoBundle:Default:index.html.twig');

        $usuario = "administrator";
        $pass = "administrator";
        $servidor  ="utn.c0gs5ej8mv5r.us-west-2.rds.amazonaws.com";
        $bdd = "patrimonioUTN";
        $info = array('Database'=>$bdd,'UID'=>$usuario,'PWD'=>$pass);
        $conexion = sqlsrv_connect($servidor,$info);

        if( $conexion ) {

            $parametros['id_sensor'] = 1;
            $parametros['id_inventario'] = $id;

            $procedure_params = array(
                array(&$parametros['id_sensor']),
                array(&$parametros['id_inventario'])
            );
            $sql = "EXEC SP_NUEVO_MOVIMIENTO @id_sensor = ?, @id_inventario = ?";
            $stmt = sqlsrv_prepare($conexion,$sql,$procedure_params);
            $res = sqlsrv_execute($stmt);
            if (!$res)
            {
                echo "FALLO EL SP";
                die( print_r( sqlsrv_errors(), true));

            }


        }else{
            echo "Conexión no se pudo establecer.<br />";
            die( print_r( sqlsrv_errors(), true));
        }
        sqlsrv_close($conexion);
        return $this->render(
            'ArduinoBundle:Default:index.html.twig',
            array('id' => $id)
        );
    }
}
