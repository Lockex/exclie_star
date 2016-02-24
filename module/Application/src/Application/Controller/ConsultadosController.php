<?php

namespace Application\Controller;

use Application\Entity\Cgineco;
use Application\Entity\Consultas;
use Application\Entity\Medicamentoreceta;
use Application\Entity\Recetas;
use Application\Entity\Videoconsulta;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

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

			$data = array('paciente' => $paciente, 'antecedentes' => $antecedentes);

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
		$query = $objectManager->createQuery("SELECT g FROM Application\Entity\Cgineco g WHERE g.ID = $idconsul");
		$consultas = $query->getArrayResult();

		$str = $consultas[0]['IMAGEN'];
		$pac = explode('-', $str, 2);

		return new ViewModel(array('consulta' => $consultas, 'pac' => $pac));
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
			/* ARREGLO DE DATOS*/
			$paciente = $objectManager->find('Application\Entity\Pacientes', $arr['idpac']);
			$motivo_consulta = urldecode($arr['motivo']);
			$fecha_hoy = $arr['fechahoy'];
			$edad = $arr['edad'];
			$ciclo = $arr['ciclo'];
			$fum = $arr['fum'];
			$gestas = $arr['gestas'];
			$partos = $arr['partos'];
			$abortos = $arr['bortos'];
			$cesarea = $arr['cesarea'];
			$tiroides_txt = $arr['tiroidestxt'];
			$peso = $arr['peso'];
			$presion = rawurldecode($arr['presion']);
			$plan = urldecode($arr['plan']);
			$imx = urldecode($arr['imx']);
			/* INICIA TRATAMIENTO DE FECHAS*/
			$fecha_hoy = new \DateTime();
			$fecha = date_format($fecha_hoy, "Y-m-d");
			$fum2 = new \DateTime(date('Y-m-d', strtotime($fum)));
			/* TERMINA TRATAMIENTO DE FECHAS*/
			/* INICIA GUARDAR IMAGEN*/
			$filename = $arr['idpac'] . '-' . $fecha . '.png';
			/* SE QUITAN COSAS DEL PRINCIPIO DEL STRING */
			$data = substr($data, strpos($data, ",") + 1);
			$data = base64_decode($data);
			$imgRes = imagecreatefromstring($data);

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

			imagepng($imgRes, $ruta . '/' . $filename);

			if (!file_exists($ruta)) {
				mkdir($ruta);
			}
			$adapter = new \Zend\File\Transfer\Adapter\Http();
			$adapter->setDestination($ruta);

			return new JsonModel(array('id' => $gine->getID()));
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
				$frec = $medi->MEDICAMENTO;
				$presc = $medi->PRESC;

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

	public function generarecetaAction() {

		$this->layout('layout/vacio');

		$oM = $this->getObjectManager();

		$query = $oM->createQuery("SELECT u FROM Application\Entity\Usuarios u WHERE u.ID = " . $this->identity()->getId());
		$usuario = $query->getArrayResult();

		$id = $this->params()->fromRoute('id');

		$query2 = $oM->createQuery("SELECT m,r FROM Application\Entity\Medicamentoreceta m LEFT JOIN m.RECETA r WHERE r.ID = $id");
		$meds = $query2->getArrayResult();

		$receta = $oM->find('Application\Entity\Recetas', $id);

		$consulta_id = $receta->getCONSULTAS()->getID();

		$consulta = $oM->find('Application\Entity\Consultas', $consulta_id);

		$paciente_id = $consulta->getPaciente()->getID();

		$query3 = $oM->createQuery("SELECT p FROM Application\Entity\Pacientes p WHERE p.ID = $paciente_id");
		$paciente = $query3->getArrayResult();
		print_r($usuario);

		// $pdf = new PdfModel();

		// $pdf->setVariables(array(

		//     'user' => $usuario,

		//     'enfermo' => $paciente->getNombre(),

		//     'enfermop' => $paciente->getApellido_Paterno(),

		//     'enfermom' => $paciente->getApellido_Materno(),

		//     'sexo' => $paciente->getSexo(),

		//     'edad' => $paciente->getFecha_Nacimiento(),

		//     'prueba' => $medicamentos,

		//     'idp' => $idPaciente,
		// ));

		//return $pdf;

		return new ViewModel(array('doctor' => $usuario, 'paciente' => $paciente, 'medicinas' => $meds));

	}

	public function monitoreoAction() {
		return new ViewModel();
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
			$videos->setPACIENTE($objectManager->find('Application\Entity\Pacientes', $data['pacienteid']));
			$videos->setFECHA(new \DateTime());

			$ruta = getcwd() . '/public/imagenes/videos/' . $data['pacienteid'];
			if (!file_exists($ruta)) {
				mkdir($ruta);
			}
			$adapter = new \Zend\File\Transfer\Adapter\Http();
			$adapter->setDestination($ruta);
			if ($adapter->receive($data['file']['name'])) {
				$objectManager->persist($videos);
				$objectManager->flush();
			}
		}
		return new JsonModel();
	}

}