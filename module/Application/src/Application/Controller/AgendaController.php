<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use DoctrineModule\StdLib\Hydrator\DoctrineObject;

use Application\Entity\Pacientes;
use Application\Entity\Agendas;

class AgendaController extends AbstractActionController
{
	protected $_objectManager;

	public function agendaAction()
	{
		
	}

	public function guardarcitaAction()
    {
        if($this->request->isPost()) {
            $om = $this->getObjectManager();
            $agenda = new Agendas();
            //$agenda->setDescripcion($this->request->getPost('descripcion'));
            $agenda->setEdad($this->request->getPost('edad'));
            $agenda->setRefdoctor($this->request->getPost('refdoctor'));
            if($this->request->getPost('refdocid'))
                $agenda->setRefdocid($om->find('Application\Entity\Doctores',$this->request->getPost('refdocid')));
            if($this->request->getPost('dependencia'))
                $agenda->setDependencia($om->find('Application\Entity\Dependencias',$this->request->getPost('dependencia')));            
            $agenda->setTelefono1($this->request->getPost('telefono1'));
            $agenda->setTelefono2($this->request->getPost('telefono2'));
            $agenda->setPacientenr($this->request->getPost('title'));
            $agenda->setStart($this->request->getPost('start'));
            $agenda->setEnd($this->request->getPost('end'));
            $agenda->setClassName($this->request->getPost('className'));            
            $agenda->setDoctor($om->find('Application\Entity\Usuarios',1));
            $agenda->setUsuariox($om->find('Application\Entity\Usuarios', 1));            
            $agenda->setTitle($this->request->getPost('title'));

            $om->persist($agenda);
            $om->flush();    

            $evento = array(
                'start' => $agenda->getStart(),
                'end' => $agenda->getEnd(), 
                'title' => $agenda->getTitle(),
                'className' => $agenda->getClassName(),                
            );
            return new JsonModel(array('mensaje' => 'Guardado', 'evento' => $evento));
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