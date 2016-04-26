<?php

namespace Application\Controller;

use Application\Entity\Cgineco;
use Application\Entity\Consultas;
use Application\Entity\Expescar;
use Application\Entity\Medicamentoreceta;
use Application\Entity\Recetas;
use Application\Entity\Videoconsulta;
use Application\Entity\historianterior;
use Application\Entity\Imagenesconsultas;
use Application\Entity\Monitoreo;
use Application\Entity\Medicamentos;
use Application\Entity\Fotosconsulta;
use Application\Entity\Ordentipos;
use Application\Entity\Ordenes;
use Application\Entity\Ordenfinal;

use DOMPDFModule\View\Model\PdfModel;

use Zend\Mvc\Controller\AbstractActionController;

use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

use ZipArchive;

class ConsultadosController extends AbstractActionController {
	protected $_objectManager;

	public function consultaAction() {
		if ($this->request->isPost()) {
			$pacienteid = $this->request->getPost('pac');
			$query = $this->getObjectManager()->createQuery("SELECT p FROM Application\Entity\Pacientes p WHERE p.ID = $pacienteid");
			$paciente = $query->getArrayResult();

			$query2 = $this->getObjectManager()->createQuery("SELECT c FROM Application\Entity\Consultas c WHERE c.PACIENTE = $pacienteid AND c.ESPEC != 'Captura' ORDER BY c.FECHA_CONS DESC");
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

	public function consultandoAction() {
		if ($this->request->isPost()) {
			$pacienteid = $this->request->getPost('pacienteid');
			$query = $this->getObjectManager()->createQuery("SELECT p FROM Application\Entity\Pacientes p WHERE p.ID = $pacienteid");
			$paciente = $query->getArrayResult();

			$query3 = $this->getObjectManager()->createQuery("SELECT a FROM Application\Entity\Antecedentes a WHERE a.PACIENTE = $pacienteid");
			$antecedentes = $query3->getArrayResult();

			$query2 = $this->getObjectManager()->createQuery("SELECT c FROM Application\Entity\Consultas c WHERE c.PACIENTE = $pacienteid ORDER BY c.FECHA_CONS DESC");
			$consultas = $query2->getArrayResult();

			$query5 = $this->getObjectManager()->createQuery("SELECT a FROM Application\Entity\Historianterior a WHERE a.PACIENTE = $pacienteid");
			$archivos = $query5->getArrayResult();

			$query4 = $this->getObjectManager()->createQuery("SELECT v FROM Application\Entity\Videoconsulta v WHERE v.PACIENTE = $pacienteid");
			$videos = $query4->getArrayResult();

			$data = array('paciente' => $paciente, 'antecedentes' => $antecedentes, 'consultas' => $consultas, 'files' => $archivos,'videos' => $videos);

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

		$query3 = $objectManager->createQuery("SELECT f FROM Application\Entity\Fotosconsulta f WHERE f.ID_CONS =$idconsul");
		$fotos = $query3->getArrayResult();

		$str = $consultas[0]['IMAGEN'];
		$pac = explode('-', $str, 2);

		return new ViewModel(array('consultag' => $consultas, 'pacin' => $pac,'fotos'=>$fotos));

	}

	public function datosconsultaAction() {
		$this->layout('layout/vacio');
		$objectManager = $this->getObjectManager();

		$idconsulta = $this->request->getPost('id_consulta');
		$tipoconsul = $this->request->getPost('tipo_cons');
		$cons= $this->request->getPost('consult');

		if($tipoconsul == '1'){

			 $query2 = $objectManager->createQuery("SELECT f FROM Application\Entity\Fotosconsulta f WHERE f.ID_CONS = $cons AND f.ID_CONSGINECO= $idconsulta");
			 $fotos = $query2->getArrayResult();
			

			$query = $objectManager->createQuery("SELECT g FROM Application\Entity\Cgineco g WHERE g.ID = $idconsulta");
			$consultas = $query->getArrayResult();
			
			$str = $consultas[0]['IMAGEN'];
			$pac = explode('-', $str, 2);

			return new JsonModel(array('consultag' => $consultas, 'pac' => $pac,'consult' => $this->request->getPost('consult'), 'tipo' => $tipoconsul, 'fotos' =>$fotos));
			
				
		}else{

			$query = $objectManager->createQuery("SELECT e FROM Application\Entity\Expescar e WHERE e.ID = $idconsulta");
			$consultas = $query->getArrayResult();
			
			$str = $consultas[0]['IMAGEN'];
			$pac = explode('-', $str, 2);

			return new JsonModel(array('consultag' => $consultas, 'pac' => $pac,'consult' => $this->request->getPost('consult'), 'tipo' => $tipoconsul));
		}
		
	}

	public function guardarconsultaAction() {
		$objectManager = $this->getObjectManager();
		
		if ($this->request->getPost()) {
			$data = $this->request->getPost('imagen');
			
			$paciente 		 = $objectManager->find('Application\Entity\Pacientes', $this->request->getPost('idpac'));			
			$motivo_consulta = $this->request->getPost('motivo');
			$fecha_hoy 		 = $this->request->getPost('fechahoy');
			$edad 			 = $this->request->getPost('edad');
			$ciclo 			 = $this->request->getPost('ciclo');
			$fum 			 = $this->request->getPost('fum');
			$gestas 		 = $this->request->getPost('gestas');
			$partos 		 = $this->request->getPost('partos');
			$abortos 		 = $this->request->getPost('bortos');
			$cesarea 		 = $this->request->getPost('cesarea');
			$ectopicos 		 = $this->request->getPost('ectopicos');
			$tiroides_txt 	 = $this->request->getPost('tiroidestxt');
			$peso 			 = $this->request->getPost('peso');
			$presion 		 = $this->request->getPost('presion');
			$plan 			 = $this->request->getPost('plan');
			$imx 			 = $this->request->getPost('imx');

			$datos = array_merge_recursive(
				$this->getRequest()->getFiles()->toArray()
            );
			
			
			
			
					
			/* INICIA TRATAMIENTO DE FECHAS*/
			$fecha_hoy = new \DateTime();
			$fecha = date_format($fecha_hoy, "Y-m-d");
			$fum2 = new \DateTime(date('Y-m-d', strtotime($fum)));
						
			/* INICIA GUARDAR IMAGEN*/
			$filename = $this->request->getPost('idpac') . '-' . $fecha . '.png';
			/* SE QUITAN COSAS DEL PRINCIPIO DEL STRING */
			$data = substr($data, strpos($data, ",") + 1);
			$data = base64_decode($data);
			$imgRes = imagecreatefromstring($data);

			$ruta = getcwd() . '/public/imagenes/consultas/' . $this->request->getPost('idpac');

			if (!file_exists($ruta)) {
				mkdir($ruta);
			}

			imagepng($imgRes, $ruta . '/' . $filename);

			$adapter = new \Zend\File\Transfer\Adapter\Http();
			$adapter->setDestination($ruta);

			if ($this->request->getPost('tipocons') == '1') {
				/* SI ES UNA CONSULTA DE SEGUIMIENTO*/

				$gine = new Cgineco;
				if($this->request->getPost('idconsg') != ''){
					
					$gine->setID($this->request->getPost('idconsg'));
					
				}
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
				if($this->request->getPost('idconsg') != ''){
					$objectManager->merge($gine);
					
				}else{
					$objectManager->persist($gine);
					
				}
				$objectManager->flush();

				if($this->request->getPost('idconsg') == ''){
					$consulta = new Consultas;

					$consulta->setFECHACONS($fecha_hoy);
					$consulta->setPACIENTE($paciente);
					$consulta->setMEDICO($this->identity());
					$consulta->setCONSULTA($gine->getID());
					$consulta->setESPEC('Cgineco');
					$consulta->setMOTIVO($motivo_consulta);

					$objectManager->persist($consulta);
					$objectManager->flush();

					
					
					
					$ruta2 = getcwd() . '/public/imagenes/consultas/' . $this->request->getPost('idpac').'/fotos/';
			               
					if (!file_exists($ruta2)) {
						mkdir($ruta2);
					}
					
					
	               	
					
					

					$adaptador = new \Zend\File\Transfer\Adapter\Http();
					

					$adaptador->setDestination($ruta2);
					foreach ($adaptador->getFileInfo() as $info) {
						
									
						if($adaptador->receive($info['name'])){
							$foto = new Fotosconsulta();

							$foto->setIDCONS($consulta);
							$foto->setIDCONSGINECO($gine);
							$foto->setIMAGEN($info['name']);
					
							$objectManager->persist($foto);
							$objectManager->flush();
							
							 $this->createthumb($ruta2.$info['name'],100,100);
							
							
						}
						
					}
					

					return new JsonModel(array('id' => $gine->getID(),'tipocons'=>$this->request->getPost('tipocons'),'idconsulta' => $consulta->getID()));
				}else{
					return new JsonModel(array('id' => $this->request->getPost('idconsg'),'tipocons'=>$this->request->getPost('tipocons')));
					
				}	
			} else if ($this->request->getPost('tipocons') == '0') {
				/* SI ES UNA CONSULTA DE PRIMERA VEZ*/
				$menarca 	 = $this->request->getPost('menarca');
				$ivsa 		 = $this->request->getPost('ivsa');
				$duracion 	 = $this->request->getPost('duracion');
				$h1n 		 = $this->request->getPost('hijoUnoNombre');
				$h1e 		 = $this->request->getPost('hijoUnoEdad');
				$h2n 		 = $this->request->getPost('hijoDosNombre');
				$h2e 		 = $this->request->getPost('hijoDosEdad');
				$h3n 		 = $this->request->getPost('hijoTresNombre');
				$h3e 		 = $this->request->getPost('hijoTresEdad');
				$dismenorrea = $this->request->getPost('DISMENORREA');
				$flujo 		 = $this->request->getPost('FLUJO');
				$sistU 		 = $this->request->getPost('sistUri');
				$sistD 		 = $this->request->getPost('sistDige');
				$anticon 	 = $this->request->getPost('antico');
				$papani 	 = $this->request->getPost('papani');
				$galacto 	 = $this->request->getPost('galacto');
				$hirsu 		 = $this->request->getPost('hirsu');
				$cohham 	 = $this->request->getPost('cohham');
				$cavidad 	 = $this->request->getPost('cavidad');
				$aD 		 = $this->request->getPost('aD');
				$aI 		 = $this->request->getPost('aI');
				$efecha 	 = $this->request->getPost('efecha');
				$emotivo 	 = $this->request->getPost('emoti');
				$ecultivo 	 = $this->request->getPost('ecultiv');
				$ecuenta 	 = $this->request->getPost('ecuenta');
				$efn 		 = $this->request->getPost('efn');
				$eapp 		 = $this->request->getPost('eapp');
				$evolumen 	 = $this->request->getPost('evolumen');
				$efragmenta  = $this->request->getPost('efragm');
				$lab 		 = $this->request->getPost('lab');
				$cirugias 	 = $this->request->getPost('cirugias');

				$hc = new Expescar;

				if($this->request->getPost('idconsg') != ''){
					
					$hc->setID($this->request->getPost('idconsg'));
					
				}

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
				$hc->setABORTOS($abortos);
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

				if($this->request->getPost('idconsg') != ''){
					$objectManager->merge($hc);
					
				}else{
					$objectManager->persist($hc);
					
				}
				$objectManager->flush();
				if($this->request->getPost('idconsg') == ''){
					$consulta = new Consultas;

					$consulta->setFECHACONS($fecha_hoy);
					$consulta->setPACIENTE($paciente);
					$consulta->setMEDICO($this->identity());
					$consulta->setCONSULTA($hc->getID());
					$consulta->setESPEC('Expescar');
					$consulta->setMOTIVO($motivo_consulta);

					$objectManager->persist($consulta);
					$objectManager->flush();

					$ruta = getcwd() . '/public/imagenes/consultas/' . $this->request->getPost('idpac');
					if (!file_exists($ruta)) {
						mkdir($ruta);
					}

					imagepng($imgRes, $ruta . '/' . $filename);

					$adapter = new \Zend\File\Transfer\Adapter\Http();
					$adapter->setDestination($ruta);

					return new JsonModel(array('id' => $hc->getID(),'tipocons'=>$this->request->getPost('tipocons'),'idconsulta' => $consulta->getID()));
				}else{
					return new JsonModel(array('id' => $this->request->getPost('idconsg'),'tipocons'=>$this->request->getPost('tipocons')));
					
				}	
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

	public function medicamentosAction(){

		$dato = $this->getRequest()->getQuery('term');
		$query = $this->getObjectManager()->createQuery("SELECT m FROM Application\Entity\Medicamentos m
        WHERE CONCAT(m.NOMBRE,' ',m.ID) like '%$dato%'
        OR CONCAT(m.NOMBRE,' ',m.ID) like '%$dato%'");
		$medis = $query->getArrayResult();
		$json = array();
		foreach ($medis as $meds) {
			
			$json[] = array('id' => $meds['ID'], 'label' => $meds['NOMBRE'],
				'value' => $meds['NOMBRE'],
				'name' => 'med' . $meds['ID'],
				'idMed' => $meds['ID'],
			);
		}
		$resultado = new JsonModel($json);
		return $resultado;
	}

	public function guardarecetaAction() {
		$oM = $this->getObjectManager();

		if ($this->request->getPost()) {
			$consulta = $this->request->getPost('consultaid');
			$consulta_id = $oM->find('Application\Entity\Consultas', $consulta);
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
				
				$medicina = $oM->getRepository('Application\Entity\Medicamentos')->findOneBy(array('NOMBRE' => $presc));
				
			 	$medicamento = new Medicamentoreceta;

				$medicamento->setFRECUENCIA($frec);

			 	if($medicina == null){
			 		$meds = new Medicamentos;
					$meds->setNOMBRE($presc);
					$oM->persist($meds);
					$oM->flush();

					$medicamento->setMEDICAMENTO($meds);
				}else{
					$id_medicina = $medicina->getID();
					$cmeds_id = $oM->find('Application\Entity\Medicamentos', $id_medicina);
					$medicamento->setMEDICAMENTO($cmeds_id);
				}
				
				$medicamento->setRECETA($receta);

				$oM->persist($medicamento);
				$oM->flush();
				
				
			}
		}
		return new JsonModel(array('recetaid' => $receta->getID(), 'consulta' => $consulta));
	}

	public function generarecetaAction() {

		$this->layout('layout/vacio');

		$oM = $this->getObjectManager();

		$query = $oM->createQuery("SELECT u FROM Application\Entity\Usuarios u WHERE u.ID = " . $this->identity()->getId());
		$usuario = $query->getArrayResult();

		$id = $this->params()->fromRoute('id');

		$query2 = $oM->createQuery("SELECT m,r,a FROM Application\Entity\Medicamentoreceta m JOIN m.MEDICAMENTO a LEFT JOIN m.RECETA r WHERE r.ID = $id");
		$meds = $query2->getArrayResult();

		$receta = $oM->find('Application\Entity\Recetas', $id);

		$consulta_id = $receta->getCONSULTAS()->getID();

		$consulta = $oM->find('Application\Entity\Consultas', $consulta_id);

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

	public function verhistoclinicaAction() {
		$this->layout('layout/vacio');
		$oM = $this->getObjectManager();

		$idpaciente = $this->request->getPost('id_paciente');
		$query = $oM->createQuery("SELECT e FROM Application\Entity\Expescar e WHERE e.PACIENTE = $idpaciente");
		$consultas = $query->getArrayResult();
		
		$str = $consultas[0]['IMAGEN'];
		$pac = explode('-', $str, 2);

		if($consultas[0]['PACECIMIENTO'] == ''){
		 	$query2 = $oM->createQuery("SELECT i FROM Application\Entity\Imagenesconsultas i WHERE i.PACIENTE = $idpaciente");
			$imagenes = $query2->getArrayResult();

			return new ViewModel(array('consultah' => $consultas, 'pac' => $pac, 'imgs' => $imagenes,'patientito'=>$idpaciente));
		}else{

			return new ViewModel(array('consultah' => $consultas, 'pac' => $pac));
		}
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
			$imagen = $data['file']['name'];

			//$fecha_consulta = $data['fecha_consulta'];
			$videos = new Videoconsulta();

			$videos->setVIDEO($imagen);
			$videos->setPACIENTE($objectManager->find('Application\Entity\Pacientes', $data['pacid']));
			$videos->setFECHA(new \DateTime());

			$ruta = getcwd() . '/public/imagenes/videos/' . $data['pacid'];
			if (!file_exists($ruta)) {
				mkdir($ruta);
			}

			$adapter = new \Zend\File\Transfer\Adapter\Http();
			$adapter->setDestination($ruta);

			$adapter->addfilter('Rename', array(
				'target' => $ruta . '/' . $imagen,
				'overwrite' => true,
			));

			if ($adapter->receive()) {
				$this->createthumb($ruta . '/' . $imagen, 100, 100);
				$objectManager->persist($videos);
				$objectManager->flush();
			}

		}
		return new JsonModel();
	}

	public function eliminarVideoAction() {
		if ($this->request->getPost()) {
			$om = $this->getObjectManager();
			$nomvideo = $this->request->getPost('archivo');
			$idPaciente = $this->request->getPost('id');

			$query = $om->createQuery("SELECT v.ID FROM Application\Entity\Videoconsulta v WHERE v.VIDEO = '$nomvideo' AND v.PACIENTE = $idPaciente");
			$vid = $query->getArrayResult();

			$quitar = $om->find('Application\Entity\Videoconsulta', $vid[0]['ID']);

			$om->remove($quitar);
			$om->flush();

			$ruta = getcwd() . '/public/imagenes/videos/' . $idPaciente . '/' . $nomvideo;

			unlink($ruta);

			return new JsonModel();
		}
	}

	public function createthumb($name, $new_w, $new_h) {
		$system = explode(".", $name);
		$extension = end($system);
		$nom = array_pop($system);
		$nom = implode(".", $system);
		if (preg_match("/jpg|jpeg/", $extension)) {$src_img = imagecreatefromjpeg($name);}
		if (preg_match("/png/", $extension)) {$src_img = imagecreatefrompng($name);}

		$old_x = imageSX($src_img);
		$old_y = imageSY($src_img);
		if ($old_x > $old_y) {
			$thumb_w = $new_w;
			$thumb_h = $old_y * ($new_h / $old_x);
		}
		if ($old_x < $old_y) {
			$thumb_w = $old_x * ($new_w / $old_y);
			$thumb_h = $new_h;
		}
		if ($old_x == $old_y) {
			$thumb_w = $new_w;
			$thumb_h = $new_h;
		}
		$dst_img = ImageCreateTrueColor($thumb_w, $thumb_h);
		imagecopyresampled($dst_img, $src_img, 0, 0, 0, 0, $thumb_w, $thumb_h, $old_x, $old_y);
		if (preg_match("/png/", $extension)) {
			imagepng($dst_img, $nom . '_th.' . $extension);
		} else {
			imagejpeg($dst_img, $nom . '_th.' . $extension);
		}
		imagedestroy($dst_img);
		imagedestroy($src_img);
	}

	public function guardahistoanteriorAction()
	{
		if ($this->request->isPost()) {

			$oM = $this->getObjectManager();

			$data = array_merge_recursive(
				$this->getRequest()->getPost()->toArray(),
				$this->getRequest()->getFiles()->toArray()
			);
			$archivo = $data['file']['name'];

			
			$expediente = new historianterior();

			$expediente->setARCHIVO($archivo);
			$expediente->setPACIENTE($oM->find('Application\Entity\Pacientes', $data['patient']));
			$expediente->setFECHA(new \DateTime());

			$ruta = getcwd() . '/public/imagenes/historianterior/' . $data['patient'];
			if (!file_exists($ruta)) {
				mkdir($ruta);
			}

			$adapter = new \Zend\File\Transfer\Adapter\Http();
			$adapter->setDestination($ruta);

			$adapter->addfilter('Rename', array(
				'target' => $ruta . '/' . $archivo,
				'overwrite' => true,
			));

			if ($adapter->receive()) {
				$this->createthumb($ruta . '/' . $archivo, 100, 100);
				$oM->persist($expediente);
				$oM->flush();
			}

		}
		return new JsonModel();
	}

	public function eliminarArchivoAction() {
		if ($this->request->getPost()) {
			$om = $this->getObjectManager();
			$nomfile = $this->request->getPost('archivo');
			$idPaciente = $this->request->getPost('id');
			
			$filename = explode(".", $nomfile);

			$query = $om->createQuery("SELECT a.ID FROM Application\Entity\historianterior a WHERE a.ARCHIVO = '$nomfile' AND a.PACIENTE = $idPaciente");
			$hist = $query->getArrayResult();

			$quitar = $om->find('Application\Entity\Historianterior', $hist[0]['ID']);
			$om->remove($quitar);
			$om->flush();

			$ruta = getcwd() . '/public/imagenes/historianterior/' . $idPaciente . '/' . $nomfile;
			unlink($ruta);
			$thumb = getcwd() . '/public/imagenes/historianterior/' . $idPaciente . '/' . $filename[0].'_th.'.$filename[1];
			unlink($thumb);
			
			return new JsonModel();
		}
	}

	public function listaarchivosAction() {
		$this->layout('layout/vacio');

		$paciente = $this->request->getPost('paciente');
		$query = $this->getObjectManager()->createQuery("SELECT h FROM Application\Entity\Historianterior h WHERE h.PACIENTE = $paciente ORDER BY h.ID DESC");
		$archivos = $query->getArrayResult();
		
		return new ViewModel(array('files' => $archivos,'paciente'=>$paciente));
	}

	public function listavideosAction() {
		$this->layout('layout/vacio');

		$paciente = $this->request->getPost('paciente');
		$query = $this->getObjectManager()->createQuery("SELECT v FROM Application\Entity\Videoconsulta v WHERE v.PACIENTE = $paciente");
		$videos = $query->getArrayResult();
		
		return new ViewModel(array('videos' => $videos,'paciente'=>$paciente));
		//return new JsonModel(array('videos' => $videos, 'paciente' => $paciente));
	}

	public function verdetallecapturaAction() {
		$this->layout('layout/vacio');
		$oM = $this->getObjectManager();

		$idpaciente = $this->request->getPost('id_paciente');
		$query2 = $oM->createQuery("SELECT i FROM Application\Entity\Imagenesconsultas i WHERE i.PACIENTE = $idpaciente");
		$imagenespaciente = $query2->getArrayResult();

		return new ViewModel(array('imagpac' => $imagenespaciente, 'pati' =>$idpaciente));

	}

	public function verhistocliconsAction(){
		$this->layout('layout/vacio');
		$oM = $this->getObjectManager();

		$idcons = $this->request->getPost('id_consulta');

		$query = $oM->createQuery("SELECT e FROM Application\Entity\Expescar e WHERE e.ID = $idcons");
		$histClin = $query->getArrayResult();

		$str = $histClin[0]['IMAGEN'];
		
		$pac = explode('-', $str, 2);

		if($histClin[0]['PACECIMIENTO'] == ''){

			$query3 = $oM->createQuery("SELECT c FROM Application\Entity\Consultas c WHERE c.CONSULTA = $idcons AND c.ESPEC = 'Expescar'");
			$consultas = $query3->getArrayResult();

			$consulta_id = $consultas[0]['ID'];

			$consulta = $oM->find('Application\Entity\Consultas', $consulta_id);

			$paciente_id = $consulta->getPaciente()->getID();

			
		  	$query2 = $oM->createQuery("SELECT i FROM Application\Entity\Imagenesconsultas i WHERE i.PACIENTE = $paciente_id");
			$imagenes = $query2->getArrayResult();

			return new ViewModel(array('consultah' => $histClin, 'imgs' => $imagenes, 'patientito' => $paciente_id));
		}else{
			
			return new ViewModel(array('consultah' => $histClin, 'patientito' => $paciente_id));
		 }
	}

	public function monitoreoAction(){
		
		$this->layout('layout/vacio');
		$oM = $this->getObjectManager();

		$id_paci = $this->request->getPost('paciente');

		$query = $oM->createQuery("SELECT p FROM Application\Entity\Pacientes p WHERE p.ID = $id_paci");
		$paciente = $query->getArrayResult();

		$query2 = $oM->createQuery("SELECT c FROM Application\Entity\Consultas c WHERE c.PACIENTE = $id_paci AND c.ESPEC ='Cgineco2' ORDER BY c.FECHA_CONS DESC ");
		$monitoreos = $query2->getArrayResult();

		if($monitoreos){
			$id_cons = $monitoreos[0]['CONSULTA'];

			$query3 = $oM->createQuery("SELECT m FROM Application\Entity\Monitoreo m WHERE m.ID = $id_cons");
			$monitor = $query3->getArrayResult();

			return new ViewModel(array('paciente' => $paciente,'monitor'=>$monitor,'primera'=>'0'));
		}else{
			return new ViewModel(array('paciente' => $paciente,'primera'=>'1'));
		}

		
	}

	public function guardamonitoreoAction(){
		$oM = $this->getObjectManager();

		if ($this->request->getPost()) {
			$data = $this->request->getPost('imagen');
			$tipo = $this->request->getPost('htipo');
						
			$fecha_hoy = new \DateTime();
			$fecha = date_format($fecha_hoy, "Y-m-d");

			$paciente 		 = $oM->find('Application\Entity\Pacientes', $this->request->getPost('idpac'));
									
			/* INICIA GUARDAR IMAGEN*/
			$filename = $this->request->getPost('idpac') . '-' . $fecha. 'm.png';
			
			/* SE QUITAN COSAS DEL PRINCIPIO DEL STRING */
			$data = substr($data, strpos($data, ",") + 1);
			$data = base64_decode($data);
			$imgRes = imagecreatefromstring($data);

			
			$moni = new Monitoreo;

			if($this->request->getPost('idconsm') != ''){
				
				$moni->setID($this->request->getPost('idconsm'));
				
			}
			$moni->setREPRODUCCION($this->request->getPost('repasistida'));
			$moni->setPROTOCOLO($this->request->getPost('protocolo'));
			if($this->request->getPost('fur') != ''){
				$moni->setFUR(new \DateTime(date('Y-m-d', strtotime($this->request->getPost('fur')))));
			}
			$moni->setPROGESTINA($this->request->getPost('progestina'));
			if($this->request->getPost('start_preog') != ''){
				$moni->setPROGESTINADEL(new \DateTime(date('Y-m-d', strtotime($this->request->getPost('start_preog')))));
			}
			if($this->request->getPost('end_preog') != ''){
				$moni->setPROGESTINAAL(new \DateTime(date('Y-m-d', strtotime($this->request->getPost('end_preog')))));
			}
			if($this->request->getPost('fmp') != ''){
				$moni->setFPM(new \DateTime(date('Y-m-d', strtotime($this->request->getPost('fmp')))));
			}
			$moni->setGNRH($this->request->getPost('ghnr'));
			if($this->request->getPost('start_ghnr') != ''){
				$moni->setGNRHDEL(new \DateTime(date('Y-m-d', strtotime($this->request->getPost('start_ghnr')))));
			}
			if($this->request->getPost('end_ghnr') != ''){
				$moni->setGNRHAL(new \DateTime(date('Y-m-d', strtotime($this->request->getPost('end_ghnr')))));
			}
			$moni->setMENOTROPINAS($this->request->getPost('metro'));
			if($this->request->getPost('start_metro') != ''){
				$moni->setMENOTROPINASDEL(new \DateTime(date('Y-m-d', strtotime($this->request->getPost('start_metro')))));
			}
			if($this->request->getPost('end_metro') != ''){
				$moni->setMENOTROPINALAL(new \DateTime(date('Y-m-d', strtotime($this->request->getPost('end_metro')))));
			}
			$moni->setFSH($this->request->getPost('fsh'));
			if($this->request->getPost('start_fsh') != ''){
				$moni->setFSHDEL(new \DateTime(date('Y-m-d', strtotime($this->request->getPost('start_fsh')))));
			}
			if($this->request->getPost('end_fsh') != ''){
				$moni->setFSHAL(new \DateTime(date('Y-m-d', strtotime($this->request->getPost('end_fsh')))));
			}
			$moni->setPRIMOGYN($this->request->getPost('pgyn'));
			if($this->request->getPost('start_pgyn') != ''){
				$moni->setPRIMOGYNDEL(new \DateTime(date('Y-m-d', strtotime($this->request->getPost('start_pgyn')))));
			}
			if($this->request->getPost('end_pgyn') != ''){
				$moni->setPRIMOGYNAL(new \DateTime(date('Y-m-d', strtotime($this->request->getPost('end_pgyn')))));
			}
			$moni->setOTROS($this->request->getPost('otros'));
			if($this->request->getPost('start_otros') != ''){
				$moni->setOTROSDEL(new \DateTime(date('Y-m-d', strtotime($this->request->getPost('start_otros')))));
			}
			if($this->request->getPost('end_otros') != ''){
				$moni->setOTROSAL(new \DateTime(date('Y-m-d', strtotime($this->request->getPost('end_otros')))));
			}
			if($this->request->getPost('fecha_proc') != ''){
				$moni->setFECHAPROCEDIIENTO(new \DateTime(date('Y-m-d', strtotime($this->request->getPost('fecha_proc')))));
			}
			$moni->setRESIDENTE($this->request->getPost('residente'));
			$moni->setAUTORIZADO($this->request->getPost('autorizado'));
			$moni->setENVIADO($this->request->getPost('enviado'));
			$moni->setFIN($tipo);
			$moni->setIMAGEN($filename);

			$ruta = getcwd() . '/public/imagenes/consultas/' . $this->request->getPost('idpac');

			if (!file_exists($ruta)) {
				mkdir($ruta);
			}

			imagepng($imgRes, $ruta . '/' . $filename);

			$adapter = new \Zend\File\Transfer\Adapter\Http();
			$adapter->setDestination($ruta);

			if($this->request->getPost('idconsm')!= ''){
				$oM->merge($moni);
			}else{
				$oM->persist($moni);
			}
			$oM->flush();

			if($this->request->getPost('idconsm') == ''){
				
				$consulta = new Consultas;

				$consulta->setFECHACONS($fecha_hoy);
				$consulta->setPACIENTE($paciente);
				$consulta->setMEDICO($this->identity());
				$consulta->setCONSULTA($moni->getID());
				$consulta->setESPEC('Cgineco2');
				$consulta->setMOTIVO('Monitoreo');

				$oM->persist($consulta);
				$oM->flush();

				

				return new JsonModel(array('id' => $moni->getID(),'idconsulta' => $consulta->getID()));
			}else{
				return new JsonModel(array('id' => $this->request->getPost('idconsm')));
				
			}
		}
	}

	public function datosconsultamoniAction() {
		$this->layout('layout/vacio');
		$oM = $this->getObjectManager();

		$idconsul = $this->request->getPost('id_consulta');
		$id_cons = $this->request->getPost('consppal');
		
		$query = $oM->createQuery("SELECT m FROM Application\Entity\Monitoreo m WHERE m.ID = $idconsul");
		$consultas = $query->getArrayResult();

		$str = $consultas[0]['IMAGEN'];
		$pac = explode('-', $str, 2);
		
		return new JsonModel(array('consultam' => $consultas, 'pac' => $pac,'consulta' => $id_cons));

	}

	public function fotingasConsulAction(){
		$this->layout('layout/vacio');
		
		if($this->request->isPost()){
			$oM = $this->getObjectManager();
			$data = array_merge_recursive(
				$this->getRequest()->getPost()->toArray(),
				$this->getRequest()->getFiles()->toArray()
			);
			
			if($data['fotingas']['name']) {
				$nombre = explode('/',$data['fotingas']['type']);
				$tipo = $nombre[1];
				
				$fotos = $oM->find('Application\Entity\Fotosconsulta', $data['pac']);
				$ruta = getcwd() . '/public/imagenes/fotosconsulta/' . $data['pac'];

                if (!file_exists($ruta)){
                	mkdir($ruta);
                } 

                if($fotos->getIMAGEN()){
                	unlink($ruta.'/'.$fotos->getIMAGEN());
                }

                $adapter = new \Zend\File\Transfer\Adapter\Http();
				$adapter->setDestination($ruta);

				$nombre = 'foto'.uniqid().'.'.$tipo;

				$adapter->addfilter('Rename', array(
				'target' => $ruta . '/' .$nombre ,
				'overwrite' => true,
				));
				
				if($adapter->receive()){
					$fotos->setImagen($nombre);
					$oM->merge($fotos);
					$oM->flush();
				}
            }
           
		}

		return new JsonModel();
	}

	public function vermonitoreoAction() {
		$this->layout('layout/vacio');
		$objectManager = $this->getObjectManager();

		$idconsul = $this->request->getPost('id_consulta');
		$query2 = $objectManager->createQuery("SELECT c.CONSULTA FROM Application\Entity\Consultas c WHERE c.ID = $idconsul");
		$gineid = $query2->getArrayResult();

		$id_gine = $gineid[0]['CONSULTA'];
		$query = $objectManager->createQuery("SELECT m FROM Application\Entity\Monitoreo m WHERE m.ID = $id_gine");
		$consultas = $query->getArrayResult();

		$str = $consultas[0]['IMAGEN'];
		$pac = explode('-', $str, 2);

		return new ViewModel(array('consultam' => $consultas, 'pacie' => $pac));

	}

	// public function descargarAction(){

 //      $this->layout('layout/vacio');

 //      $om = $this->getObjectManager();

 //      $pac = $this->request->getPost('idpac');

 //      $query = $om->createQuery("SELECT i FROM Application\Entity\Imagenesconsultas i WHERE i.PACIENTE = $pac");

 //      $imagenes = $query->getArrayResult();

      
      // $zip = new ZipArchive();

      // $filename = "imagenes.zip";

      // $zip->open($filename,ZipArchive::CREATE);
    
      // foreach($imagenes as $i) { 

        
      //   $zip->addFile('./public/imagenes/Consultas/'.$pac.'/'.$i['IMAGEN'],$i['IMAGEN']);

      // }
      
      //  $zip->close();
       
               
      //  return $filename;   
       

   // }

    public function generahistorialAction(){

      $om = $this->getObjectManager();

      $pac = $this->params()->fromRoute('id');

      $imagenes = $om->createQuery("SELECT i FROM Application\Entity\Imagenesconsultas i WHERE i.PACIENTE = $pac")->getArrayResult();

      $paciente  = $om->createQuery("SELECT p FROM Application\Entity\Pacientes p WHERE p.ID = $pac")->getArrayResult();
      $expescar  = $om->createQuery("SELECT e FROM Application\Entity\Expescar e WHERE e.PACIENTE = $pac")->getArrayResult();
      $consultas = $om->createQuery("SELECT c FROM Application\Entity\Consultas c WHERE c.PACIENTE = $pac AND c.ESPEC != 'Captura'")->getArrayResult();
      $antes  	 = $om->createQuery("SELECT a FROM Application\Entity\Antecedentes a WHERE a.PACIENTE = $pac")->getArrayResult();

       

      foreach($consultas as $consul){
      	$id = $consul['CONSULTA'];
      	if($consul['ESPEC'] =='Cgineco'){
      		$gineco[] = $om->createQuery("SELECT g  FROM Application\Entity\Cgineco g WHERE g.ID = $id")->getArrayResult();
      		

      		
        }
        if($consul['ESPEC']=='Cgineco2'){
      		$moni[] = $om->createQuery("SELECT m FROM Application\Entity\Monitoreo m WHERE m.ID = $id")->getArrayResult();
        }

        

     }

        //print_r($gineco);

        
	  // foreach ($moni as $key) {
	  // 	echo $key[0]['ID'].'<br>';
	  // }
	 
	  
	  $pdf = new PdfModel();
	  $pdf->setOption('filename',$pac.'-Expediente.pdf');
	  if($imagenes){
	  	$pdf->setVariables(array(
	  		'paciente' => $paciente,
	  		'imagenes' => $imagenes,
	  		'gine'	   => $gineco,
	  		'monito'   => $moni,
	  		
			
	  		
		));
	  }else{
	  	
	  	$pdf->setVariables(array(

			'paciente'   => $paciente,
			'expescar'   => $expescar,
			'antes'	     => $antes,
			'gine'	     => $gineco,
			'monito'	 => $moni,
			
		));
	  }
	    
	 return $pdf;   

    }
	protected function bajarAction(){

		$direct = getcwd();
		$cadena = $direct;
		$buscar = "\\";
		$reemplazar = "/";
		$base_dir = str_replace($buscar, $reemplazar, $cadena);
		$filename = $base_dir.'/imagenes.zip';


		header('Content-type: application/zip');
		header('Content-Disposition: attachment; filename=imagenes.zip');
		readfile($filename);

		unlink($filename);
	}

	public function ordenAction() {
		$this->layout('layout/vacio');
		$om = $this->getObjectManager();
		$id_consulta = $this->request->getPost('consulta');


		return new ViewModel(array('cons' => $id_consulta));
	}

	public function ordentiposAction(){
		
		$dato = $this->getRequest()->getQuery('term');
		$tipos = $this->getObjectManager()->createQuery("SELECT o FROM Application\Entity\Ordentipos o")->getArrayResult();
		return new JsonModel($tipos);
		
	}

	public function guardatipoordenAction(){
		$oM = $this->getObjectManager();

		$nombre = $this->request->getPost('ordentipo');
		$datos = $this->request->getPost('datosOrden');

		$tiporden = new Ordentipos;

 		$tiporden->setNOMBRE($nombre);
 		$tiporden->setDATOS($datos);
		
		$oM->persist($tiporden);
		$oM->flush();

		return new JsonModel();
	}

	public function verordenAction()
	{
		$om = $this->getObjectManager();

		$datos = $this->request->getPost('datos');
		
		foreach($datos as $dato){
			$orden[] = $om->createQuery("SELECT o.DATOS FROM Application\Entity\Ordentipos o WHERE o.ID = $dato")->getArrayResult();
		}

		return new JsonModel($orden);
	}

	public function guardarordenAction() {
		$om = $this->getObjectManager();

		if ($this->request->getPost()) {
			$ordenes = $this->request->getPost('ordenes');
			$consulta = $this->request->getPost('consul');
			$newdata = $this->request->getPost('nuevos');
			$idcons = $om->find('Application\Entity\Consultas',$this->request->getPost('consul'));

			
			$ordeng = new Ordenes;

			$ordeng->setDATOSNUEVOS($newdata);
			$ordeng->setCONSULTA($idcons);

			
			
		 foreach($ordenes as $orden){
			
			$ordeng->addTIPOS($om->find('Application\Entity\Ordentipos', $orden));
		 }
			$om->persist($ordeng);
			$om->flush();
			
		
		}
		return new JsonModel(array('ordenid' => $ordeng->getID(), 'consulta' => $consulta));
		
	}

	public function generaordenAction() {

		$this->layout('layout/vacio');

		$oM = $this->getObjectManager();

		$id = $this->params()->fromRoute('id');

		$ordenes = $oM->createQuery("SELECT o.DATOSNUEVOS,ti.NOMBRE,cs.ID as cid FROM Application\Entity\Ordenes o LEFT JOIN o.TIPO ti LEFT JOIN o.CONSULTA cs WHERE o.ID = $id")->getArrayResult();

		$orden = $oM->find('Application\Entity\Ordenes', $id);

		$consulta_id = $orden->getCONSULTA()->getID();

		$consulta = $oM->find('Application\Entity\Consultas', $consulta_id);

		$paciente_id = $consulta->getPaciente()->getID();

		$paciente = $oM->createQuery("SELECT p FROM Application\Entity\Pacientes p WHERE p.ID = $paciente_id")->getArrayResult();
		

		$pdf = new PdfModel();

		$pdf->setVariables(array(

			'pacienten' => $paciente[0]['NOMBRE'],

			'pacientep' => $paciente[0]['APELLIDO_PATERNO'],

			'pacientem' => $paciente[0]['APELLIDO_MATERNO'],

			'ordenes' => $ordenes,

		));

		return $pdf;
	}

	
}