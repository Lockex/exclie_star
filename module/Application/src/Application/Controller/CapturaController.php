<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use DoctrineModule\StdLib\Hydrator\DoctrineObject;

use Application\Entity\Pacientes;
use Application\Entity\Consultas;
use Application\Entity\Antecedentes;
use Application\Entity\Imagenesconsultas;

class CapturaController extends AbstractActionController
{
	protected $_objectManager;

	public function indexAction()
  {
		$this->layout('layout/invitado');
    $om = $this->getObjectManager();
    $estados = $om->createQuery("SELECT e FROM Application\Entity\Estados e")->getArrayResult();
    $municipios = $om->createQuery("SELECT m FROM Application\Entity\Municipios m")->getArrayResult();
    $data = array('estados' => $estados, 'municipios' => $municipios);
		return new ViewModel($data);
	}

    

  public function guardarpacienteAction()
  {
    $om = $this->getObjectManager();
    if($this->request->isPost()) {
      $paciente = new Pacientes();
      $paciente->setSEXO($this->request->getPost('SEXO'));
      $paciente->setNOMBRE($this->request->getPost('NOMBRE'));
      $paciente->setAPELLIDO_PATERNO($this->request->getPost('APELLIDO_PATERNO'));
      $paciente->setAPELLIDO_MATERNO($this->request->getPost('APELLIDO_MATERNO'));
      $paciente->setESTADO($om->find('Application\Entity\Estados',$this->request->getPost('ESTADO')));
      $paciente->setMUNICIPIO($om->find('Application\Entity\Municipios',$this->request->getPost('MUNICIPIO')));
      $paciente->setCALLE($this->request->getPost('CALLE'));
      $paciente->setNUMEROINT($this->request->getPost('NUM_INT'));
      $paciente->setNUMEROEXT($this->request->getPost('NUM_EXT'));
      $paciente->setCOLONIA($this->request->getPost('COLONIA'));
      $paciente->setTELEFONO1($this->request->getPost('TELEFONO1'));
      $paciente->setTELEFONO2($this->request->getPost('TELEFONO2'));
      $paciente->setOCUPACION($this->request->getPost('OCUPACION'));
      $paciente->setESTADOCIVIL($this->request->getPost('ESTADO_CIVIL'));
      $paciente->setFECHAREGISTRO(new \DateTime());
      $paciente->setFECHA_NACIMIENTO(new \DateTime(date('Y-m-d',strtotime($this->request->getPost('FECHA_NACIMIENTO')))));
      $paciente->setTIPOSANGUINEO($om->find('Application\Entity\Tipossanguineos',$this->request->getPost('TIPO_SANGUINEO')));

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
     
       
     
       $id = $paciente->getID();
       

      
    }
    return new JsonModel(array('id'=>$id,'nombre'=>$paciente->getNOMBRE()));
  }

  public function guardarimagenesconsAction()
  {
    if($this->request->isPost()){

        $objectManager = $this->getObjectManager();

        $data = array_merge_recursive(
                  $this->getRequest()->getPost()->toArray(),           
                  $this->getRequest()->getFiles()->toArray()
        );

       $fecha_consulta = $data['fecha_consulta'];
       $imagenes = new Imagenesconsultas();

       $imagenes->setIMAGEN($data['file']['name']);
       $imagenes->setPACIENTE($objectManager->find('Application\Entity\Pacientes',$data['idPaciente']));
       //$imagenes->setFECHACONSULTA(new \DateTime(date(strtotime($data['fecha_consulta']),'Y-m-d'));
       $imagenes->setFECHACONSULTA(new \DateTime(date('Y-m-d',strtotime($fecha_consulta))));

       $ruta = getcwd().'/public/imagenes/consultas/'.$data['idPaciente'];
       if (!file_exists($ruta)) 
       {
        mkdir($ruta);
       }
       $adapter = new \Zend\File\Transfer\Adapter\Http();
       $adapter->setDestination($ruta);
       if($adapter->receive($data['file']['name']))
       {
        $objectManager->persist($imagenes);
        $objectManager->flush();
       }
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