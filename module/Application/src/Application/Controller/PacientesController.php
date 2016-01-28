<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

class PacientesController extends AbstractActionController
{

    protected $_objectManager;

    public function indexAction()
    {
        // Si el usuario es invitado va a utilizar la plantilla de invitado
        //if($this->identity()->getRole()->getId() == 6) {
          $this->layout('layout/invitado');
        //}
        $om = $this->getObjectManager();
        $estados = $om->createQuery("SELECT e FROM Application\Entity\Estados e")->getArrayResult();
        $municipios = $om->createQuery("SELECT m FROM Application\Entity\Municipios m")->getArrayResult();
        $data = array('estados' => $estados, 'municipios' => $municipios);
        return new ViewModel($data);
    }

    public function pacientesjsonAction() 
    {
      $dato = $this->getRequest()->getQuery('term');
      $query = $this->getObjectManager()->createQuery("SELECT p FROM Application\Entity\Pacientes p 
        WHERE CONCAT(p.APELLIDO_PATERNO,' ',p.APELLIDO_MATERNO,' ',p.NOMBRE,' ',p.ID) like '%$dato[0]%'");
      $pacientes = $query->getArrayResult();
      $json = array();
      foreach($pacientes as $pac) {
        if(!$pac['FECHA_NACIMIENTO']) {
          $fechanac = '';
        } else {
          $fechanac = date_format($pac['FECHA_NACIMIENTO'],'d/M/Y');
        }
        $json[] = array('id' => $pac['ID'],'label' => 'ID: '.$pac['ID'].' '.$pac['NOMBRE'].' '.$pac['APELLIDO_PATERNO'].' '.$pac['APELLIDO_MATERNO'].' ['.$fechanac.']',
        'value' => $pac['APELLIDO_PATERNO'].' '.$pac['APELLIDO_MATERNO'].' '.$pac['NOMBRE'],
        'name' => 'pac'.$pac['ID'],
        'fecha' => $fechanac,
        'idPac' => $pac['ID'],
        );
      }
      $resultado = new JsonModel($json);
      return $resultado;
    }


    public function guardarpacienteAction()
    {
      $om = $this->getObjectManager();
      if($this->request->isPost()) {
        $paciente = new Pacientes();
        $paciente->setNOMBRE();
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
