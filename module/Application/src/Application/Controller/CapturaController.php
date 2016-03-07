<?php
namespace Application\Controller;

use Application\Entity\Antecedentes;
use Application\Entity\Expescar;
use Application\Entity\Imagenesconsultas;
use Application\Entity\Pacientes;
use Application\Entity\Consultas;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

class CapturaController extends AbstractActionController {
	protected $_objectManager;

	public function indexAction() {
		$this->layout('layout/captura');
		$om = $this->getObjectManager();
		$estados = $om->createQuery("SELECT e FROM Application\Entity\Estados e")->getArrayResult();
		$municipios = $om->createQuery("SELECT m FROM Application\Entity\Municipios m")->getArrayResult();
		$data = array('estados' => $estados, 'municipios' => $municipios);
		return new ViewModel($data);
	}

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
			$paciente->setCOLONIA($this->request->getPost('COLONIA'));
			$paciente->setTELEFONO1($this->request->getPost('TELEFONO1'));
			$paciente->setTELEFONO2($this->request->getPost('TELEFONO2'));
			$paciente->setOCUPACION($this->request->getPost('OCUPACION'));
			$paciente->setESTADOCIVIL($this->request->getPost('ESTADO_CIVIL'));
			$paciente->setEMAIL($this->request->getPost('EMAIL'));
			$paciente->setREFERIDO($this->request->getPost('referido'));
			$paciente->setNOMBRECONYUGE($this->request->getPost('NombreC'));
			$paciente->setEDADCONYUGE($this->request->getPost('EdadC'));
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

			$historia = new Expescar();
			$historia->setPADECIMIENTO($this->request->getPost('MOTIVO'));
			$historia->setPRIMERHIJONOMBRE($this->request->getPost('hijoUnoNombre'));
			$historia->setPRIMERHIJOEDAD($this->request->getPost('hijoUnoEdad'));
			$historia->setSEGUNDOHIJONOMBRE($this->request->getPost('hijoDosNombre'));
			$historia->setSEGUNDOHIJOEDAD($this->request->getPost('hijoDosEdad'));
			$historia->setTERCERHIJONOMBRE($this->request->getPost('hijoTresNombre'));
			$historia->setTERCERHIJOEDAD($this->request->getPost('hijoTresEdad'));
			$historia->setMENARCA($this->request->getPost('amenarca'));
			$historia->setIVSA($this->request->getPost('aivsa'));
			$historia->setCICLOS($this->request->getPost('ciclos'));
			$historia->setDURACION($this->request->getPost('DURACION'));
			$historia->setFUM($this->request->getPost('FUM'));
			$historia->setGESTAS($this->request->getPost('GESTAS'));
			$historia->setPARTOS($this->request->getPost('PARTOS'));
			$historia->setABOTOS($this->request->getPost('ABORTOS'));
			$historia->setCESAREAS($this->request->getPost('CESAREAS'));
			$historia->setECTOPICOS($this->request->getPost('ECTOPICOS'));
			$historia->setDISMENORREA($this->request->getPost('DISMENORREA'));
			$historia->setFLUJO($this->request->getPost('FLUJO'));
			$historia->setSISTURINARIO($this->request->getPost('sistUri'));
			$historia->setSISTDIGESTIVO($this->request->getPost('sistDige'));
			$historia->setANTICONCEPTIVOS($this->request->getPost('aAntico'));
			$historia->setPAP($this->request->getPost('apapani'));
			$historia->setCOH($this->request->getPost('acohham'));
			$historia->setGALACTORREA($this->request->getPost('agalacto'));
			$historia->setHIRSUTISM($this->request->getPost('ahirsu'));
			$historia->setHSGCAVIDAD($this->request->getPost('acavidad'));
			$historia->setHSGD($this->request->getPost('aD'));
			$historia->setHSGI($this->request->getPost('aI'));
			$historia->setLABORATORIONOTAS($this->request->getPost('alab'));
			$historia->setESPERMOFECHA($this->request->getPost('efecha'));
			$historia->setESPERMOCUENTA($this->request->getPost('ecuenta'));
			$historia->setESPERMOVOLUMEN($this->request->getPost('evolumen'));
			$historia->setESPERMOMOTIVIDAD($this->request->getPost('emoti'));
			$historia->setESPERMOFN($this->request->getPost('efn'));
			$historia->setESPERMODNA($this->request->getPost('efragm'));
			$historia->setESPERMOCULTIVO($this->request->getPost('ecultiv'));
			$historia->setESPERMOAPP($this->request->getPost('eapp'));
			$historia->setPACIENTE($paciente);

			$om->persist($historia);
			$om->flush();

			$fecha_reg = new \DateTime(date('Y-m-d', strtotime($this->request->getPost('fecha-histo'))));

			$consulta = new Consultas;

			$consulta->setFECHACONS($fecha_reg);
			$consulta->setPACIENTE($paciente);
			$consulta->setMEDICO($this->identity());
			$consulta->setCONSULTA($historia->getID());
			$consulta->setESPEC('Expescar');
			$consulta->setMOTIVO($this->request->getPost('MOTIVO'));

			$om->persist($consulta);
			$om->flush();

			$id = $paciente->getID();

		}
		return new JsonModel(array('id' => $id, 'nombre' => $paciente->getNOMBRE(), 'apellido' => $paciente->getAPELLIDO_PATERNO()));
	}

	public function guardarimagenesconsAction() {
		if ($this->request->isPost()) {

			$om = $this->getObjectManager();

			$data = array_merge_recursive(
				$this->getRequest()->getPost()->toArray(),
				$this->getRequest()->getFiles()->toArray()
			);

			$fecha_consulta = $data['fecha_consulta'];
			$nombre_imagen = $data['file']['name'];
			$imagenes = new Imagenesconsultas();

			$imagenes->setIMAGEN($nombre_imagen);
			$imagenes->setPACIENTE($om->find('Application\Entity\Pacientes', $data['idPaciente']));
			$imagenes->setFECHACONSULTA(new \DateTime(date('Y-m-d', strtotime($fecha_consulta))));

			$ruta = getcwd() . '/public/imagenes/consultas/' . $data['idPaciente'];
			if (!file_exists($ruta)) {
				mkdir($ruta);
			}
			
			$adapter = new \Zend\File\Transfer\Adapter\Http();
			$adapter->setDestination($ruta);

			$adapter->addfilter('Rename', array(
				'target' => $ruta . '/' . $nombre_imagen,
				'overwrite' => true,
			));

			if ($adapter->receive()) {
				$om->persist($imagenes);
				$om->flush();
			}

			$consulta = new Consultas;

			$consulta->setFECHACONS(new \DateTime(date('Y-m-d', strtotime($fecha_consulta))));
			$consulta->setPACIENTE($om->find('Application\Entity\Pacientes', $data['idPaciente']));
			$consulta->setMEDICO($this->identity());
			$consulta->setCONSULTA($imagenes->getID());
			$consulta->setESPEC('Captura');

			$om->persist($consulta);
			$om->flush();
		}
		return new JsonModel();
	}

	public function eliminarFotoAction() {
		if ($this->request->getPost()) {
			$om = $this->getObjectManager();
			$imagen = $this->request->getPost('archivo');
			$idPaciente = $this->request->getPost('id');

			$query = $om->createQuery("SELECT i.ID FROM Application\Entity\Imagenesconsultas i WHERE i.IMAGEN = '$imagen' AND i.PACIENTE = $idPaciente");
			$foto = $query->getArrayResult();

			$quitar = $om->find('Application\Entity\Imagenesconsultas', $foto[0]['ID']);

			$om->remove($quitar);
			$om->flush();

			$ruta = getcwd() . '/public/imagenes/consultas/' . $idPaciente . '/' . $imagen;

			unlink($ruta);

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