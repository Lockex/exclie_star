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

	public function guardarconsultaAction()
	{
		$objectManager = $this->getObjectManager();

		if($this->request->getPost()){

			$paciente 		 = $objectManager->find('Application\Entity\Pacientes',$this->request->getPost('idpac'));
			$motivo_consulta = $this->request->getPost('motivo');
			$fecha 			 = $this->request->getPost('fechahoy');
			$edad 			 = $this->request->getPost('edad');
			$ciclo 			 = $this->request->getPost('ciclo');
			$fum 			 = $this->request->getPost('fum');
			$gestas 		 = $this->request->getPost('gestas');
			$partos 		 = $this->request->getPost('partos');
			$abortos		 = $this->request->getPost('bortos');
			$cesarea		 = $this->request->getPost('cesarea');
			$tiroides_txt	 = $this->request->getPost('tiroidestxt');
			$peso 			 = $this->request->getPost('peso');
			$presion 		 = $this->request->getPost('presion');
			$notas_tiroides  = $this->request->getPost('notasts');
			$tamanoq	     = $this->request->getPost('tamanoq');
			$numeroq         = $this->request->getPost('numeroq');
			$notas_cervix    = $this->request->getPost('notascx');
			$medida_ovario   = $this->request->getPost('medidao');
			$capsula_ovario  = $this->request->getPost('capsula');
			$notas_cuello	 = $this->request->getPost('notascllo');
			$imagen_tiroides = $this->request->getPost('imgtiroides');
			$imagen_senos 	 = $this->request->getPost('imgsenos');
			$imagen_cervix	 = $this->request->getPost('imgcervix');
			$imagen_ovarios  = $this->request->getPost('imgovarios');
			$imagen_cuello 	 = $this->request->getPost('imgcuello');
			$plan 	 		 = $this->request->getPost('plan');
			$imgx 			 = $this->request->getPost('imgx');


			/******* ---- Tratamiento de las Fechas ----  ******/
			$fecha_hoy = new \DateTime(date('Y-m-d',strtotime($fecha)));
			$fum2 = new \DateTime(date('Y-m-d',strtotime($fum)));
			/******* ---- Tratamiento de las Fechas ----  ******/

	        $gine = new Cgineco;

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
	       	$gine->setTIROIDESDATOS($notas_tiroides);
	       	$gine->setSENOSTAMANO($tamanoq);
	       	$gine->setSENOSNUMERO($numeroq);
	       	$gine->setCERVIXDATOS($notas_cervix);
	       	$gine->setOVARIOSMEDIDA($medida_ovario);
	       	$gine->setOVARIOSCAPSULA($capsula_ovario);
	       	$gine->setCUELLODATOS($notas_cuello);
	       	$gine->setTIROIDESIMAGEN($imagen_tiroides);
	       	$gine->setSENOSIMAGEN($imagen_senos);
	       	$gine->setCERVIXIMAGEN($imagen_cervix);
	       	$gine->setOVARIOSIMAGEN($imagen_ovarios);
	       	$gine->setCUELLOIMAGEN($imagen_cuello);
	       	$gine->setIMX($imgx);
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

        	return new JsonModel(array('id'=>$gine->getID()));
		}
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
		$query = $objectManager->createQuery("SELECT c FROM Application\Entity\Cgineco c WHERE c.ID = $idconsul");
		$consultas = $query->getArrayResult();

		return new ViewModel(array('consulta'=>$consultas));
	}


	public function recetaAction()
	{
		$this->layout('layout/vacio');
		$om = $this->getObjectManager();

		if($this->request->isPost()){
			$id_consulta = $this->request->getPost('consulta');
			$query = $om->createQuery("SELECT r FROM Application\Entity\Recetas r WHERE r.CONSULTAS = $id_consulta");
			$recetas = $query->getArrayResult();
		}
		
		$data = array('recetas'=>$recetas,'consulta'=>$id_consulta);

		return new ViewModel($data);
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