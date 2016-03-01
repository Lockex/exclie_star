<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use DoctrineModule\StdLib\Hydrator\DoctrineObject;

use DOMPDFModule\View\Model\PdfModel;

use Application\Entity\Pacientes;
use Application\Entity\Cgineco;
use Application\Entity\Notaspaciente;
use Application\Entity\Consultas;
use Application\Entity\Medicamentoreceta;
use Application\Entity\Recetas;
use Application\Entity\Videoconsulta;

class ConsultadosController extends AbstractActionController {
	protected $_objectManager;

	public function consultaAction() {
		if ($this->request->isPost()) {
			$pacienteid = $this->request->getPost('pac');
			$query = $this->getObjectManager()->createQuery("SELECT p FROM Application\Entity\Pacientes p WHERE p.ID = $pacienteid");
			$paciente = $query->getArrayResult();

			$query2 = $this->getObjectManager()->createQuery("SELECT c FROM Application\Entity\Consultas c WHERE c.PACIENTE = $pacienteid ORDER BY c.FECHA_CONS DESC");
			$consultas = $query2->getArrayResult();

			$query3 = $this->getObjectManager()->createQuery("SELECT n FROM Application\Entity\Notaspaciente n WHERE n.PACIENTE = $pacienteid ORDER BY n.FECHA DESC");
			$notas = $query3->getArrayResult();

			$query4 = $this->getObjectManager()->createQuery("SELECT a FROM Application\Entity\Antecedentes a WHERE a.PACIENTE = $pacienteid");
			$antecedentes = $query4->getArrayResult();

			$data = array('paciente' => $paciente, 'consultas' => $consultas, 'notas' => $notas, 'antecedentes' => $antecedentes);

		} else {

			$data = array();
		}
		return new ViewModel($data);
	}

	public function consultanewAction() {
		if ($this->request->isPost()) {
			$pacienteid = $this->request->getPost('pacienteid');
			$query = $this->getObjectManager()->createQuery("SELECT p FROM Application\Entity\Pacientes p WHERE p.ID = $pacienteid");
			$paciente = $query->getArrayResult();

			$query2 = $this->getObjectManager()->createQuery("SELECT n FROM Application\Entity\Notaspaciente n WHERE n.PACIENTE = $pacienteid ORDER BY n.FECHA DESC");
			$notas = $query2->getArrayResult();

			$query3 = $this->getObjectManager()->createQuery("SELECT a FROM Application\Entity\Antecedentes a WHERE a.PACIENTE = $pacienteid");
			$antecedentes = $query3->getArrayResult();

			$data = array('paciente' => $paciente, 'notas' => $notas, 'antecedentes' => $antecedentes);

		} else {

			$data = array();
		}
		return new ViewModel($data);
	}

	public function consultandoAction() {
		if ($this->request->isPost()) {
			$pacienteid = $this->request->getPost('pacienteid');
			$query = $this->getObjectManager()->createQuery("SELECT p FROM Application\Entity\Pacientes p WHERE p.ID = $pacienteid");
			$paciente = $query->getArrayResult();

			$query3 = $this->getObjectManager()->createQuery("SELECT a FROM Application\Entity\Antecedentes a WHERE a.PACIENTE = $pacienteid");
			$antecedentes = $query3->getArrayResult();

			$query2 = $this->getObjectManager()->createQuery("SELECT c FROM Application\Entity\Consultas c WHERE c.PACIENTE = $pacienteid ORDER BY c.FECHA_CONS DESC");
			$consultas = $query2->getArrayResult();

			$data = array('paciente' => $paciente, 'antecedentes' => $antecedentes, 'consultas' => $consultas);

		} else {

			$data = array();
		}
		return new ViewModel($data);
	}

	public function listanotasAction() {
		$this->layout('layout/vacio');

		$paciente = $this->request->getPost('paciente');
		$query = $this->getObjectManager()->createQuery("SELECT a FROM Application\Entity\Notaspaciente a WHERE a.PACIENTE = $paciente ORDER BY a.ID DESC");
		$notas = $query->getArrayResult();

		return new ViewModel(array('notas' => $notas));
	}

	public function verconsultaAction() {
		$this->layout('layout/vacio');
		$objectManager = $this->getObjectManager();

		$idconsul = $this->request->getPost('id_consulta');
		$query2 = $objectManager->createQuery("SELECT c.CONSULTA FROM Application\Entity\Consultas c WHERE c.ID = $idconsul");
		$gineid = $query2->getArrayResult();

		$id_gine = $gineid[0]['CONSULTA'];
		$query = $objectManager->createQuery("SELECT g FROM Application\Entity\Cgineco g WHERE g.ID = $id_gine");
		$consultas = $query->getArrayResult();

		$str = $consultas[0]['IMAGEN'];
		$pac = explode('-', $str, 2);

		return new ViewModel(array('consultag' => $consultas, 'pac' => $pac));

	}

	public function guardarconsultaAction() {
		$objectManager = $this->getObjectManager();

		if ($this->request->getPost()) {
			$data = $this->request->getPost('imagedata');
			/* ARREGLO DE DATOS*/
			$datos = $this->request->getPost('datos');
			$datos = explode("&", $datos);

			foreach ($datos as $dato) {
				$var = explode('=', $dato);
				$arr[$var[0]] = $var[1];
			}
			$caractraros = array('_', '+');
			$paciente = $objectManager->find('Application\Entity\Pacientes', $arr['idpac']);
			$motivo_consulta = urldecode($arr['motivo']);
			$fecha_hoy = $arr['fechahoy'];
			$edad = $arr['edad'];
			$ciclo = str_replace($caractraros, '', $arr['ciclo']);
			$fum = $arr['fum'];
			$gestas = $arr['gestas'];
			$partos = $arr['partos'];
			$abortos = $arr['bortos'];
			$cesarea = $arr['cesarea'];
			$ectopicos = $arr['ectopicos'];
			$tiroides_txt = $arr['tiroidestxt'];
			$peso = $arr['peso'];
			$presion = str_replace($caractraros, '', urldecode($arr['presion']));
			$plan = urldecode($arr['plan']);
			$imx = urldecode($arr['imx']);

			/* INICIA TRATAMIENTO DE FECHAS*/
			$fecha_hoy = new \DateTime();
			$fecha = date_format($fecha_hoy, "Y-m-d");
			$fum2 = new \DateTime(date('Y-m-d', strtotime($fum)));
			/* TERMINA TRATAMIENTO DE FECHAS*/

			str_replace("%body%", "black", "<body text='%body%'>");
			/* INICIA GUARDAR IMAGEN*/
			$filename = $arr['idpac'] . '-' . $fecha . '.png';
			/* SE QUITAN COSAS DEL PRINCIPIO DEL STRING */
			$data = substr($data, strpos($data, ",") + 1);
			$data = base64_decode($data);
			$imgRes = imagecreatefromstring($data);

			if ($arr['tipocons'] == '1') {
				/* SI ES UNA CONSULTA DE SEGUIMIENTO*/

				$gine = new Cgineco;
				$gine->setFECHACONS($fecha_hoy);
				$gine->setIMAGEN($filename);
				$gine->setMOTIVOCONS($motivo_consulta);
				$gine->setFECHACONS($fecha_hoy);
				$gine->setEDAD($edad);
				$gine->setCICLO($ciclo);
				$gine->setFUM($fum2);
				$gine->setGESTAS($gestas);
				$gine->setPARTOS($partos);
				$gine->setABORTOS($abortos);
				$gine->setCESAREAS($cesarea);
				$gine->setECTOPICOS($ectopicos);
				$gine->setTIROIDESNUM($tiroides_txt);
				$gine->setPESO($peso);
				$gine->setPRESION($presion);
				$gine->setIMX($imx);
				$gine->setPLAN($plan);

				$objectManager->persist($gine);
				$objectManager->flush();

				$consulta = new Consultas;

				$consulta->setFECHACONS($fecha_hoy);
				$consulta->setPACIENTE($paciente);
				$consulta->setMEDICO($this->identity());
				$consulta->setCONSULTA($gine->getID());
				$consulta->setESPEC('Cgineco');
				$consulta->setMOTIVO($motivo_consulta);

				$objectManager->persist($consulta);
				$objectManager->flush();

				$ruta = getcwd() . '/public/imagenes/consultas/' . $arr['idpac'];

				if (!file_exists($ruta)) {
					mkdir($ruta);
				}

				imagepng($imgRes, $ruta . '/' . $filename);

				$adapter = new \Zend\File\Transfer\Adapter\Http();
				$adapter->setDestination($ruta);

				return new JsonModel(array('id' => $gine->getID()));
			} else if ($arr['tipocons'] == '0') {
				/* SI ES UNA CONSULTA DE PRIMERA VEZ*/
				$menarca = $arr['menarca'];
				$ivsa = $arr['ivsa'];
				$duracion = $arr['duracion'];
				$h1n = urldecode($arr['hijoUnoNombre']);
				$h1e = $arr['hijoUnoEdad'];
				$h2n = urldecode($arr['hijoDosNombre']);
				$h2e = $arr['hijoDosEdad'];
				$h3n = urldecode($arr['hijoTresNombre']);
				$h3e = $arr['hijoTresEdad'];
				$dismenorrea = urldecode($arr['DISMENORREA']);
				$flujo = urldecode($arr['FLUJO']);
				$sistU = urldecode($arr['sistUri']);
				$sistD = urldecode($arr['sistDige']);
				$anticon = $arr['aAntico'];
				$papani = $arr['apapani'];
				$galacto = $arr['agalacto'];
				$hirsu = $arr['ahirsu'];
				$cohham = $arr['acohham'];
				$cavidad = $arr['acavidad'];
				$aD = $arr['aD'];
				$aI = $arr['aI'];
				$efecha = $arr['efecha'];
				$emotivo = $arr['emoti'];
				$ecultivo = $arr['ecultiv'];
				$ecuenta = $arr['ecuenta'];
				$efn = $arr['efn'];
				$eapp = $arr['eapp'];
				$evolumen = $arr['evolumen'];
				$efragmenta = $arr['efragm'];
				$lab = urldecode($arr['alab']);
				$cirugias = urldecode($arr['cirugias']);

				$hc = new Expescar;
				$hc->setPADECIMIENTO($motivo_consulta);
				$hc->setFECHACONS($fecha_hoy);
				$hc->setPRIMERHIJONOMBRE($h1n);
				$hc->setPRIMERHIJOEDAD($h1e);
				$hc->setSEGUNDOHIJONOMBRE($h2n);
				$hc->setSEGUNDOHIJOEDAD($h2e);
				$hc->setTERCERHIJONOMBRE($h3n);
				$hc->setTERCERHIJOEDAD($h3e);
				$hc->setMENARCA($menarca);
				$hc->setIVSA($ivsa);
				$hc->setCICLOS($ciclo);
				$hc->setDURACION($duracion);
				$hc->setEDAD($edad);
				$hc->setFUM($fum);
				$hc->setGESTAS($gestas);
				$hc->setPARTOS($partos);
				$hc->setABOTOS($abortos);
				$hc->setCESAREAS($cesarea);
				$hc->setECTOPICOS($ectopicos);
				$hc->setDISMENORREA($dismenorrea);
				$hc->setFLUJO($flujo);
				$hc->setSISTURINARIO($sistU);
				$hc->setSISTDIGESTIVO($sistD);
				$hc->setANTICONCEPTIVOS($anticon);
				$hc->setPAP($papani);
				$hc->setCOH($cohham);
				$hc->setGALACTORREA($galacto);
				$hc->setHIRSUTISM($hirsu);
				$hc->setHSGCAVIDAD($cavidad);
				$hc->setHSGD($aD);
				$hc->setHSGI($aI);
				$hc->setLABORATORIONOTAS($lab);
				$hc->setESPERMOFECHA($efecha);
				$hc->setESPERMOCUENTA($ecuenta);
				$hc->setESPERMOVOLUMEN($evolumen);
				$hc->setESPERMOMOTIVIDAD($emotivo);
				$hc->setESPERMOFN($efn);
				$hc->setESPERMODNA($efragmenta);
				$hc->setESPERMOCULTIVO($ecultivo);
				$hc->setESPERMOAPP($eapp);
				$hc->setCIRUGIASPREVIAS($cirugias);
				$hc->setIMAGEN($filename);
				$hc->setTIROIDESNUM($tiroides_txt);
				$hc->setPESO($peso);
				$hc->setPRESION($presion);
				$hc->setIMX($imx);
				$hc->setPLAN($plan);
				$hc->setPACIENTE($paciente);

				$objectManager->persist($hc);
				$objectManager->flush();

				$consulta = new Consultas;

				$consulta->setFECHACONS($fecha_hoy);
				$consulta->setPACIENTE($paciente);
				$consulta->setMEDICO($this->identity());
				$consulta->setCONSULTA($hc->getID());
				$consulta->setESPEC('Expescar');
				$consulta->setMOTIVO($motivo_consulta);

				$objectManager->persist($consulta);
				$objectManager->flush();

				$ruta = getcwd() . '/public/imagenes/consultas/' . $arr['idpac'];
				if (!file_exists($ruta)) {
					mkdir($ruta);
				}

				imagepng($imgRes, $ruta . '/' . $filename);

				$adapter = new \Zend\File\Transfer\Adapter\Http();
				$adapter->setDestination($ruta);

				return new JsonModel(array('id' => $hc->getID()));
			}
		}
	}

	public function recetaAction() {
		$this->layout('layout/vacio');
		$om = $this->getObjectManager();
		$id_consulta = $this->request->getPost('consulta');

		if ($this->request->isPost()) {
			$query = $om->createQuery("SELECT r FROM Application\Entity\Recetas r WHERE r.CONSULTAS = $id_consulta");
			$recetas = $query->getArrayResult();
		}
		$data = array('recetas' => $recetas, 'consulta' => $id_consulta);
		return new ViewModel($data);
	}

	public function guardarecetaAction() {
		$oM = $this->getObjectManager();

		if ($this->request->getPost()) {
			$consulta = $this->request->getPost('consultaid');
			$consulta_id = $oM->find('Application\Entity\Cgineco', $consulta);
			$fecha = new \DateTime(date('Y-m-d', strtotime($this->request->getPost('fechahoy2'))));
			$indicaciones = $this->request->getPost('indicaciones');
			$meds = $this->request->getPost('array-med');
			$arr = json_decode($meds);

			$receta = new Recetas;

			$receta->setFECHAINICIO($fecha);
			$receta->setINDICACIONESADICIONALES($indicaciones);
			$receta->setCONSULTAS($consulta_id);

			$oM->persist($receta);
			$oM->flush();

			foreach ($arr as $medi) {

				$presc = $medi->MEDICAMENTO;
				$frec = $medi->PRESC;

				$medicamento = new Medicamentoreceta;

				$medicamento->setFRECUENCIA($frec);
				$medicamento->setMEDICAMENTO($presc);
				$medicamento->setRECETA($receta);

				$oM->persist($medicamento);
				$oM->flush();
			}
		}
		return new JsonModel(array('recetaid' => $receta->getID(), 'consulta' => $consulta));
	}

	public function generarecetaAction(){

		$this->layout('layout/vacio');

  		$oM = $this->getObjectManager();

  		$query = $oM->createQuery("SELECT u FROM Application\Entity\Usuarios u WHERE u.ID = ".$this->identity()->getId());
		$usuario = $query->getArrayResult();

		$id = $this->params()->fromRoute('id');

		$query2 = $oM->createQuery("SELECT m,r FROM Application\Entity\Medicamentoreceta m LEFT JOIN m.RECETA r WHERE r.ID = $id");
		$meds = $query2->getArrayResult(); 

		$receta = $oM->find('Application\Entity\Recetas', $id);

		$consulta_id = $receta->getCONSULTAS()->getID();

		$consulta = $oM->find('Application\Entity\Consultas',$consulta_id);

		$paciente_id = $consulta->getPaciente()->getID();
		
		$query3 = $oM->createQuery("SELECT p FROM Application\Entity\Pacientes p WHERE p.ID = $paciente_id");
		$paciente = $query3->getArrayResult();

		$pdf = new PdfModel();

		$pdf->setVariables(array(

		    'doctor' => $usuario,

		     'pacienten' => $paciente[0]['NOMBRE'],

		     'pacientep' => $paciente[0]['APELLIDO_PATERNO'],

		     'pacientem' => $paciente[0]['APELLIDO_MATERNO'],

		     'sexo' => [0]['SEXO'],

		     'edad' => [0]['FECHA_NACIMIENTO'],

		     'medicinas' => $meds,

		    'idp' => $paciente_id, 
		));

		return $pdf;
	}

	public function monitoreoAction() {
		return new ViewModel();
	}

	public function verhistoclinicaAction() {
		$this->layout('layout/vacio');
		$oM = $this->getObjectManager();

		$idconsulta = $this->request->getPost('id_consulta');
		$query = $oM->createQuery("SELECT e FROM Application\Entity\Expescar e WHERE e.ID = $idconsulta");
		$consultas = $query->getArrayResult();

		$str = $consultas[0]['IMAGEN'];
		$pac = explode('-', $str, 2);

		return new ViewModel(array('consultah' => $consultas, 'pac' => $pac));

	}

	/**
	 * get entityManager
	 *
	 * @return EntityManager
	 */
	private function getObjectManager() {
		if (null === $this->_objectManager) {
			$this->_objectManager = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
		}

		return $this->_objectManager;
	}

	public function guardarvideoAction() {
		if ($this->request->isPost()) {

			$objectManager = $this->getObjectManager();

			$data = array_merge_recursive(
				$this->getRequest()->getPost()->toArray(),
				$this->getRequest()->getFiles()->toArray()
			);

			//$fecha_consulta = $data['fecha_consulta'];
			$videos = new Videoconsulta();

			$videos->setVIDEO($data['file']['name']);
			$videos->setPACIENTE($objectManager->find('Application\Entity\Pacientes', $data['pacid']));
			$videos->setFECHA(new \DateTime());
			$objectManager->persist($videos);
			$objectManager->flush();

			$ruta = getcwd() . '/public/imagenes/videos/' . $data['pacid'];
			if (!file_exists($ruta)) {
				mkdir($ruta);
			}
			$adapter = new \Zend\File\Transfer\Adapter\Http();
			$adapter->setDestination($ruta);
			if ($adapter->receive()) {

			}
		}
		return new JsonModel();
	}

}