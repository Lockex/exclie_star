<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use DoctrineModule\StdLib\Hydrator\DoctrineObject;

use Application\Entity\Pacientes;
use Application\Entity\Notaspaciente;

class NotasController extends AbstractActionController
{
	protected $_objectManager;

	public function guardarnotaAction()
	{
		$objectManager = $this->getObjectManager();
		$fecha_hoy = new \DateTime();

		if($this->request->getPost()){

			$pc = $this->request->getPost('pac');
			$paciente 		 = $objectManager->find('Application\Entity\Pacientes',$this->request->getPost('pac'));
			$nota 			 = $this->request->getPost('nota');

			$recordatorio = new Notaspaciente;

			$recordatorio->setNOTAS($nota);
			$recordatorio->setFECHA($fecha_hoy);
			$recordatorio->setPACIENTE($paciente);

			$objectManager->persist($recordatorio);
			$objectManager->flush();

			$query = $this->getObjectManager()->createQuery("SELECT a FROM Application\Entity\Notaspaciente a WHERE a.PACIENTE = $pc");
            $notas = $query->getArrayResult();
          	
          	
		    $resultado = new JsonModel($notas);
      		return $resultado;

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