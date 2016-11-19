<?php
   //  on load registra el movimiento de un bien en un determinado sensor para mapear el tracking a futuro.
#       return $this->render('ArduinoBundle:Default:index.html.twig');

        $usuario = "administrator";
        $pass = "administrator";
        $servidor  ="utn.c0gs5ej8mv5r.us-west-2.rds.amazonaws.com,1433";
        $bdd = "patrimonioUTN2";
        $info = array('Database'=>$bdd,'UID'=>$usuario,'PWD'=>$pass);
        $conexion = sqlsrv_connect($servidor,$info);

        if( $conexion ) {

            $parametros['id_sensor'] = 1;
            $parametros['id_inventario'] = $_GET["rfid"];

            $procedure_params = array(
                array(&$parametros['id_sensor']),
                array(&$parametros['id_inventario'])
            );
            $sql = "EXEC SP_NUEVO_MOVIMIENTO @id_sensor = ?, @id_inventario = ?";
            $stmt = sqlsrv_prepare($conexion,$sql,$procedure_params);
            $res = sqlsrv_execute($stmt);

        }else{

        }
        sqlsrv_close($conexion);


?>
