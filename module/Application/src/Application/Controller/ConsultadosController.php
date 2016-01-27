<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use DoctrineModule\StdLib\Hydrator\DoctrineObject;

use Application\Entity\Pacientes;
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
			$data = array('paciente'=>$paciente);
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
			$data = array('paciente'=>$paciente);
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
			$abortos		 = $this->request->getPost('abortos');
			$cesarea		 = $this->request->getPost('cesarea');
			$tiroides_txt	 = $this->request->getPost('tiroidestxt');
			$peso 			 = $this->request->getPost('peso');
			$presion 		 = $this->request->getPost('presion');
			$notas_tiroides  = $this->request->getPost('notasts');
			$tamano_quiste	 = $this->request->getPost('tamanoq');
			$numero_quiste   = $this->request->getPost('numeroq');
			$notas_cervix    = $this->request->getPost('notascx');
			$medida_ovario   = $this->request->getPost('medidao');
			$capsula_ovario  = $this->request->getPost('capsula');
			$notas_cuello	 = $this->request->getPost('notascllo');
			$imagen_tiroides = $this->request->getPost('imgtiroides');
			$imagen_senos 	 = $this->request->getPost('imgsenos');
			$imagen_cervix	 = $this->request->getPost('imgcervix');
			$imagen_ovarios  = $this->request->getPost('imgovarios');
			$imagen_cuello 	 = $this->request->getPost('imgcuello');


			/******* ---- Tratamiento de las Fechas ----  ******/
			$fecha_hoy = new \DateTime(date('Y-m-d',strtotime($fecha)));
			$fum2 = new \DateTime(date('Y-m-d',strtotime($fum)));
			/******* ---- Tratamiento de las Fechas ----  ******/

			

	        $hydrator = new DoctrineObject(
	          $objectManager,
	          'Application\Entity\Consultas'
	        );


	        $consulta = new Consultas;

	       	$consulta->setMOTIVOCONS($motivo_consulta);
	       	$consulta->setFECHACONS($fecha_hoy);
	       	$consulta->setCICLO($ciclo);
	       	$consulta->setFUM($fum2);
	       	$consulta->setGESTAS($gestas);
	       	$consulta->setGESTAS($partos);
	       	$consulta->setGESTAS($abortos);
	       	$consulta->setGESTAS($cesarea);
	       	$consulta->setTIROIDESNUM($tiroides_txt);
	       	$consulta->setPESO($peso);
	       	$consulta->setPRESION($presion);
	       	$consulta->setTIROIDESDATOS($notas_tiroides);
	       	$consulta->setSENOSTAMANO($tamano_quiste);
	       	$consulta->setSENOSNUMERO($numero_quiste);
	       	$consulta->setCERVIXDATOS($notas_cervix);
	       	$consulta->setOVARIOSMEDIDA($medida_ovario);
	       	$consulta->setOVARIOSCAPSULA($capsula_ovario);
	       	$consulta->setCUELLODATOS($notas_cuello);
	       	$consulta->setTIROIDESIMAGEN($imagen_tiroides);
	       	$consulta->setSENOSIMAGEN($imagen_senos);
	       	$consulta->setCERVIXIMAGEN($imagen_cervix);
	       	$consulta->setOVARIOSIMAGEN($imagen_ovarios);
	       	$consulta->setCUELLOIMAGEN($imagen_cuello);
	       	$consulta->setPACIENTE($paciente);

	       	$objectManager->persist($consulta);            
        	$objectManager->flush();

        	return new JsonModel();
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
	
}