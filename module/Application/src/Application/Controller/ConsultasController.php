<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use DoctrineModule\StdLib\Hydrator\DoctrineObject;

use Application\Entity\Pacientes;
use Application\Entity\Notaspaciente;

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
			$data = array('paciente' => $paciente, 'consultas' => $consultas, 'notas' => $notas);
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