<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Application\Entity\Antecedentes;
use Application\Entity\Pacientes;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

class PacientesController extends AbstractActionController {

	protected $_objectManager;

	public function indexAction() {

		$om = $this->getObjectManager();
		$estados = $om->createQuery("SELECT e FROM Application\Entity\Estados e")->getArrayResult();
		$municipios = $om->createQuery("SELECT m FROM Application\Entity\Municipios m")->getArrayResult();
		$data = array('estados' => $estados, 'municipios' => $municipios);
		return new ViewModel($data);
	}

	public function pacientesjsonAction() {
		$dato = $this->getRequest()->getQuery('term');
		$query = $this->getObjectManager()->createQuery("SELECT p FROM Application\Entity\Pacientes p
        WHERE CONCAT(p.APELLIDO_PATERNO,' ',p.APELLIDO_MATERNO,' ',p.NOMBRE,' ',p.ID) like '%$dato%'
        OR CONCAT(p.NOMBRE,' ',p.APELLIDO_PATERNO,' ',p.APELLIDO_MATERNO,' ',p.ID) like '%$dato%'");
		$pacientes = $query->getArrayResult();
		$json = array();
		foreach ($pacientes as $pac) {
			if (!$pac['FECHA_NACIMIENTO']) {
				$fechanac = '';
			} else {
				$fechanac = date_format($pac['FECHA_NACIMIENTO'], 'd/M/Y');
			}
			$json[] = array('id' => $pac['ID'], 'label' => 'ID: ' . $pac['ID'] . ' ' . $pac['NOMBRE'] . ' ' . $pac['APELLIDO_PATERNO'] . ' ' . $pac['APELLIDO_MATERNO'] . ' [' . $fechanac . ']',
				'value' => $pac['APELLIDO_PATERNO'] . ' ' . $pac['APELLIDO_MATERNO'] . ' ' . $pac['NOMBRE'],
				'name' => 'pac' . $pac['ID'],
				'fecha' => $fechanac,
				'idPac' => $pac['ID'],
			);
		}
		$resultado = new JsonModel($json);
		return $resultado;
	}

/******************************************************************
REGISTRANDO PACIENTE
 ******************************************************************/

	public function guardarpacienteAction() {
		$om = $this->getObjectManager();
		if ($this->request->isPost()) {
			$paciente = new Pacientes();
			$paciente->setSEXO($this->request->getPost('SEXO'));
			$paciente->setNOMBRE($this->request->getPost('NOMBRE'));
			$paciente->setAPELLIDO_PATERNO($this->request->getPost('APELLIDO_PATERNO'));
			$paciente->setAPELLIDO_MATERNO($this->request->getPost('APELLIDO_MATERNO'));
			$paciente->setESTADO($om->find('Application\Entity\Estados', $this->request->getPost('ESTADO')));
			$paciente->setMUNICIPIO($om->find('Application\Entity\Municipios', $this->request->getPost('MUNICIPIO')));
			$paciente->setCALLE($this->request->getPost('CALLE'));
			$paciente->setNUMEROINT($this->request->getPost('NUM_INT'));
			$paciente->setNUMEROEXT($this->request->getPost('NUM_EXT'));
			$paciente->setTELEFONO1($this->request->getPost('TELEFONO1'));
			$paciente->setTELEFONO2($this->request->getPost('TELEFONO2'));
			$paciente->setOCUPACION($this->request->getPost('OCUPACION'));
			$paciente->setESTADOCIVIL($this->request->getPost('ESTADO_CIVIL'));
			$paciente->setFECHA_NACIMIENTO(new \DateTime(date('Y-m-d', strtotime($this->request->getPost('FECHA_NACIMIENTO')))));
			$paciente->setFECHAREGISTRO(new \DateTime());
			$paciente->setTIPOSANGUINEO($om->find('Application\Entity\Tipossanguineos', $this->request->getPost('TIPO_SANGUINEO')));

			$om->persist($paciente);
			$om->flush();

			$antecedentes = new Antecedentes();
			$antecedentes->setPACIENTE($paciente); // Paciente recién registrado.
			$antecedentes->setTABAQUISMO($this->request->getPost('TABAQUISMO'));
			$antecedentes->setALCOHOLISMO($this->request->getPost('ALCOHOLISMO'));
			$antecedentes->setALERGIAS($this->request->getPost('ALERGIAS'));
			$antecedentes->setTOXICOMANIAS($this->request->getPost('TOXICOMANIAS'));
			$antecedentes->setCIRUGIAS($this->request->getPost('CIRUGIAS'));
			$antecedentes->setDIABETES($this->request->getPost('DIABETES'));
			$antecedentes->setARTRITIS($this->request->getPost('ARTRITIS'));
			$antecedentes->setCANCER($this->request->getPost('CANCER'));
			$antecedentes->setLUPUS($this->request->getPost('LUPUS'));
			$antecedentes->setCARDIOPATIAS($this->request->getPost('CARDIACAS'));
			$antecedentes->setHIPERTENSION($this->request->getPost('HIPERTENSION'));
			$antecedentes->setTIROIDES($this->request->getPost('TIROIDES'));

			$om->persist($antecedentes);
			$om->flush();
		}
		return new JsonModel();
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
