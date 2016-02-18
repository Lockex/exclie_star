<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use DoctrineModule\StdLib\Hydrator\DoctrineObject;

use Application\Entity\Pacientes;
use Application\Entity\Cgineco;
use Application\Entity\Notaspaciente;
use Application\Entity\Consultas;
use Application\Entity\Medicamentoreceta;

class ConsultadosController extends AbstractActionController
{
	protected $_objectManager;

	public function consultaAction()
	{
		if($this->request->isPost()){
			$pacienteid = $this->request->getPost('pac');
			$query = $this->getObjectManager()->createQuery("SELECT p FROM Application\Entity\Pacientes p WHERE p.ID = $pacienteid");
			$paciente = $query->getArrayResult();

			$query2 = $this->getObjectManager()->createQuery("SELECT c FROM Application\Entity\Consultas c WHERE c.PACIENTE = $pacienteid ORDER BY c.FECHA_CONS DESC");
			$consultas = $query2->getArrayResult();

			$query3 = $this->getObjectManager()->createQuery("SELECT n FROM Application\Entity\Notaspaciente n WHERE n.PACIENTE = $pacienteid ORDER BY n.FECHA DESC");
            $notas = $query3->getArrayResult();

            $query4 = $this->getObjectManager()->createQuery("SELECT a FROM Application\Entity\Antecedentes a WHERE a.PACIENTE = $pacienteid");
            $antecedentes = $query4->getArrayResult();

            $data = array('paciente'=>$paciente,'consultas'=>$consultas,'notas'=>$notas,'antecedentes'=>$antecedentes);
						
		}else{

			$data = array();
		}
		return new ViewModel($data);
	}

	public function consultanewAction()
	{
		if($this->request->isPost()){
			$pacienteid = $this->request->getPost('pacienteid');
			$query = $this->getObjectManager()->createQuery("SELECT p FROM Application\Entity\Pacientes p WHERE p.ID = $pacienteid");
			$paciente = $query->getArrayResult();

			$query2 = $this->getObjectManager()->createQuery("SELECT n FROM Application\Entity\Notaspaciente n WHERE n.PACIENTE = $pacienteid ORDER BY n.FECHA DESC");
            $notas = $query2->getArrayResult();

            $query3 = $this->getObjectManager()->createQuery("SELECT a FROM Application\Entity\Antecedentes a WHERE a.PACIENTE = $pacienteid");
            $antecedentes = $query3->getArrayResult();

			$data = array('paciente'=>$paciente,'notas'=>$notas,'antecedentes'=>$antecedentes);
			
		}else{

			$data = array();
		}
		return new ViewModel($data);
	}

	public function consultandoAction()
	{
		if($this->request->isPost()){
			$pacienteid = $this->request->getPost('pacienteid');
			$query = $this->getObjectManager()->createQuery("SELECT p FROM Application\Entity\Pacientes p WHERE p.ID = $pacienteid");
			$paciente = $query->getArrayResult();

			$query3 = $this->getObjectManager()->createQuery("SELECT a FROM Application\Entity\Antecedentes a WHERE a.PACIENTE = $pacienteid");
            $antecedentes = $query3->getArrayResult();

			$data = array('paciente'=>$paciente,'antecedentes'=>$antecedentes);
			
		}else{

			$data = array();
		}
		return new ViewModel($data);
	}

	
	public function listanotasAction()
	{
		$this->layout('layout/vacio');
		
		$paciente = $this->request->getPost('paciente');
		$query = $this->getObjectManager()->createQuery("SELECT a FROM Application\Entity\Notaspaciente a WHERE a.PACIENTE = $paciente ORDER BY a.ID DESC");
		$notas = $query->getArrayResult();

		return new ViewModel(array('notas' => $notas));
	}

	public function verconsultaAction()
	{
		$this->layout('layout/vacio');
		$objectManager = $this->getObjectManager();


		$idconsul = $this->request->getPost('id_consulta');
		$query = $objectManager->createQuery("SELECT g FROM Application\Entity\Cgineco g WHERE g.ID = $idconsul");
		$consultas = $query->getArrayResult();

		$str = $consultas[0]['IMAGEN'];
		$pac = explode('-', $str, 2);

		return new ViewModel(array('consulta'=>$consultas,'pac'=>$pac));
	}

	public function guardarconsultaAction()
	{
		$objectManager = $this->getObjectManager();

		if($this->request->getPost()){
			$data 	= $this->request->getPost('imagedata');
			/* MANEJO DEL ARREGLO DE DATOS*/
			$datos  = $this->request->getPost('datos');

			$datos = explode("&", $datos);

	        foreach($datos as $dato) 
	        {
	            $var = explode('=', $dato);
	            $arr[$var[0]] = $var[1];
	        }
	        /* TERMINA MANEJO DEL ARREGLO DE DATOS*/
			$paciente 	         = $objectManager->find('Application\Entity\Pacientes',$arr['idpac']);
			$motivo_consulta 	 = urldecode($arr['motivo']);
			$fecha_hoy 	 		 = $arr['fechahoy'];
			$edad 		 		 = $arr['edad'];
			$ciclo 		 		 = $arr['ciclo'];
			$fum 		 		 = $arr['fum'];
			$gestas 	 		 = $arr['gestas'];
			$partos 			 = $arr['partos'];
			$abortos 			 = $arr['bortos'];
			$cesarea 			 = $arr['cesarea'];
			$tiroides_txt 		 = $arr['tiroidestxt'];
			$peso 		 		 = $arr['peso'];
			$presion 	 		 = $arr['presion'];
			$plan 	 		     = urldecode($arr['plan']);
			$imx 	 		     = urldecode($arr['imx']);

						
			/* INICIA TRATAMIENTO DE FECHAS*/
			$fecha_hoy  = new \DateTime();
			$fecha = date_format($fecha_hoy,"Y-m-d");
			$fum2 = new \DateTime(date('Y-m-d',strtotime($fum)));
			/* TERMINA TRATAMIENTO DE FECHAS*/
			/* INICIA GUARDAR IMAGEN*/
			$filename = $arr['idpac'].'-'.$fecha.'.png';
			//Need to remove the stuff at the beginning of the string
			$data = substr($data, strpos($data, ",")+1);
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
	       
	       	$ruta = getcwd().'/public/imagenes/consultas/'.$arr['idpac'];

	       	imagepng($imgRes, $ruta.'/'.$filename);
			
			
			if (!file_exists($ruta)) 
			{
				mkdir($ruta);
			}
			$adapter = new \Zend\File\Transfer\Adapter\Http();
			$adapter->setDestination($ruta);
			
			if($adapter->receive($filename))
			{
				

			}
			
			return new JsonModel(array('id'=>$gine->getID()));
		}
	}

	public function recetaAction()
	{
		$this->layout('layout/vacio');
		$om = $this->getObjectManager();
		$id_consulta = $this->request->getPost('consulta');

		if($this->request->isPost()){
			
			$query = $om->createQuery("SELECT r FROM Application\Entity\Recetas r WHERE r.CONSULTAS = $id_consulta");
			$recetas = $query->getArrayResult();
		}
		
		$data = array('recetas'=>$recetas,'consulta'=>$id_consulta);

		return new ViewModel($data);
	}

	public function guardarecetaAction()
	{
		if($this->request->getPost()){
			$this->request->getPost('');
		}
	}

	public function monitoreoAction()
	{
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
	
}