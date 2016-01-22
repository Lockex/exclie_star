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
        return new ViewModel();
    }

    public function pacientesjsonAction() {
      $dato = $this->getRequest()->getQuery('term');
      $query = $this->getObjectManager()->createQuery("SELECT p FROM Application\Entity\Pacientes p 
        WHERE CONCAT(p.APELLIDO_PATERNO,' ',p.APELLIDO_MATERNO,' ',p.NOMBRE,' ',p.ID) like '%$dato[0]%'");
      $pacientes = $query->getArrayResult();
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
        'tel1' => $pac['TELEFONO_1'],
        'tel2' => $pac['TELEFONO_2'],
        'idPac' => $pac['ID'],
        'dependencia' => $pac['DEPENDENCIA']);
      }
      $resultado = new JsonModel($json);
      return $resultado;
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
