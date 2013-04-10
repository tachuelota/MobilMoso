<?php

require_once('../../framework/nusoap/lib/nusoap.php');

$wsCliente='http://174.121.234.90/moso/WSmoviles/get.asmx?wsdl';
				$operadora='1';	
				$album="41";
				$keyword="_FTWAP";
				$filasxPagina="11";
				$numPagina="0";
				
				$SoapClient=new nusoap_client($wsCliente,true);
				if ($Error = $SoapClient->getError()) {
				   echo "No se pudo realizar la operaci&oacute;n de conexi&oacute;n[" . $Error . "]"; 
				   die(); 
				}
				if ($SoapClient->fault) { // Si
					echo 'No se pudo completar la operaci&oacute;n ...';
					die();
				} else { // No
					$aError = $SoapClient->getError();
					// Hay algun error ?
					if ($Error) { // Si
					echo 'Error:' . $Error;
					die();
					}
				}

				$Parametros = array('pais'=>1,'operadora'=>1,'numUser'=>'99999999'); 
				//print_r( $Parametros);
				$Respuesta = $SoapClient->call("wsServiciosDisponibles", $Parametros); 
				echo json_encode($Respuesta);
				if ($SoapClient->fault) { // Si
					echo 'No se pudo completar la operaci&oacute;n, por favor ingrese un texto a buscar.';
					die();
				} else { // No
					$Error = $SoapClient->getError();
					// Hay algun error ?
					if ($Error) { // Si
					echo 'Error:' . $Error;
					die();
					}
				}
				

?>