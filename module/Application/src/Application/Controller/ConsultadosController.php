<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

//use Application\Entity\Pacientes;

class ConsultadosController extends AbstractActionController
{
	protected $_objectManager;

	public function consultaAction(){
		
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

	public function consultanewAction(){
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