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

    public function vereventosAction()
    {
        if($this->request->isPost()) {          
          $hoy = new \DateTime();
          $start = $this->request->getPost('start');
          $end = $this->request->getPost('end');
          $paciente = $this->request->getPost('paciente');
          $where = "WHERE a.start BETWEEN '$start 00:00:00' AND '$end 23:59:59'";
          if($paciente)
          $where .= " AND a.pacientenr like '%$paciente%'"; 
          $query = $this->getObjectManager()->createQuery("SELECT a.title,a.start,a.end,a.descripcion,a.id,a.color,
            a.pacientenr,u.NOMBRE,a.className,p.ID as paciente,d.ID as refdocid,
            a.refdoctor,a.edad,a.reservado,de.ID as dependencia,a.telefono1,a.telefono2 FROM Application\Entity\Agendas a 
            LEFT JOIN a.paciente p LEFT JOIN a.usuariox u LEFT JOIN a.refdocid d LEFT JOIN a.dependencia de 
            $where");
          $eventos = $query->getArrayResult();
          $resultado = new JsonModel($eventos);
          return $resultado;  
        }
    }

    public function dropeventoAction()
    {
        if($this->request->isPost()) {          
          $om = $this->getObjectManager();
          $idevento = $this->request->getPost('idEvento');
          $evento = $om->find('Application\Entity\Agendas', $idevento);
          $start = $this->request->getPost('start');
          $end = $this->request->getPost('end');
          $evento->setStart($start);
          $evento->setEnd($end);
          $om->merge($evento);
          $om->flush();
          $resultado = new JsonModel(array('evento' => 'guardado'));
          return $resultado;  
        }
    }

    public function editarcitaAction()
    {
        if($this->request->isPost()) {
            $om = $this->getObjectManager();
            $agenda = $om->find('Application\Entity\Agendas', $this->request->getPost('idevento'));
            //$agenda->setDescripcion($this->request->getPost('descripcion'));
            $agenda->setEdad($this->request->getPost('edad'));
            $agenda->setRefdoctor($this->request->getPost('referido'));
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

            $om->merge($agenda);
            $om->flush();    

            $evento = array(
                'start'     => $agenda->getStart(),
                'end'       => $agenda->getEnd(), 
                'title'     => $agenda->getTitle(),
                'className' => $agenda->getClassName(),    
                'id'        => $agenda->getId(),
                'title'     => $agenda->getTitle(),
                'refdoctor' => $agenda->getRefdoctor(),
                'telefono1' => $agenda->getTelefono1(),
                'telefono2' => $agenda->getTelefono2(),
                'edad'      => $agenda->getEdad(), 

            );

            return new JsonModel(array('mensaje' => 'Guardado', 'evento' => $evento));
        } 

    }

	public function guardarcitaAction()
    {
        if($this->request->isPost()) {
            $om = $this->getObjectManager();
            $agenda = new Agendas();
            //$agenda->setDescripcion($this->request->getPost('descripcion'));
            $agenda->setEdad($this->request->getPost('edad'));
            $agenda->setRefdoctor($this->request->getPost('referido'));
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