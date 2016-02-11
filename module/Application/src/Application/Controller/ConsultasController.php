<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use DoctrineModule\StdLib\Hydrator\DoctrineObject;

use Application\Entity\Pacientes;
use Application\Entity\Notaspaciente;
use Application\Entity\Antecedentes;

class ConsultasController extends AbstractActionController
{
	protected $_objectManager;

	public function consultaAction()
	{

		$om = $this->getObjectManager();

		if($this->request->isPost()) {
			$idPaciente = $this->request->getPost('pac');
			$paciente = $om->createQuery('SELECT p FROM Application\Entity\Pacientes p WHERE p.ID =' . $idPaciente)->getArrayResult();
			$consultas = $om->createQuery('SELECT c FROM Application\Entity\Consultas c WHERE c.PACIENTE =' . $idPaciente)->getArrayResult();
			$notas = $om->createQuery('SELECT n FROM Application\Entity\Notaspaciente n WHERE n.PACIENTE =' . $idPaciente)->getArrayResult();
			$antecedentes = $om->createQuery('SELECT a FROM Application\Entity\Antecedentes a WHERE a.PACIENTE =' . $idPaciente)->getArrayResult();
			$data = array('paciente' => $paciente, 'consultas' => $consultas, 'notas' => $notas,'antecedentes',$antecedentes);
		} else {
			$data = array();
		}

		return new ViewModel($data);

	}

	public function verconsultaAction()
	{
		$om = $this->getObjectManager();
		$this->layout('layout/vacio');
		
		$idConsulta = $this->params()->fromQuery('idcons');
		$consulta = $om->find('Application\Entity\Consultas',$idConsulta);
		$spec = $om->createQuery('SELECT c FROM Application\Entity\\'.$consulta->getESPEC().' c WHERE c.ID =' . $consulta->getID())->getArrayResult();
		$data = array('consulta' => $consulta, 'espec' => $consulta->getESPEC());
		
		$view = new ViewModel($data);
		$view->setTemplate('layout/'.$consulta->getESPEC().'.phtml');
		return $view;		
	}

	public function nuevaconsultaAction()
	{
		$om = $this->getObjectManager();
		$this->layout('layout/vacio');
		$view = new ViewModel();	
		$view->setTemplate('layout/Cbasica.phtml');
		return $view;	
	}

	public function guardarconsultaAction()
	{
		if($this->request->isPost()) {
			$idPaciente = $this->request->getPost('idPaciente');
			$paciente = $om->find('Application\Entity\Pacientes', $idPaciente);

			$consultabasica = new Cbasica;
			$consultabasica->setSubjetivo();
			$consultabasica->setObjetivo();
			$consultabasica->setAnalisis();
			$consultabasica->setPlan();
			$om->persist($consultabasica);	
			$om->flush();
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