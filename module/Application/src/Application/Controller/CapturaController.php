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

	public function indexAction()
	{
		 $this->layout('layout/captura');
		
		return new ViewModel();
	}

	public function registroAction()
	{
		$this->layout('layout/captura');
		$om = $this->getObjectManager();
		$estados = $om->createQuery("SELECT e FROM Application\Entity\Estados e")->getArrayResult();
		$municipios = $om->createQuery("SELECT m FROM Application\Entity\Municipios m")->getArrayResult();
		
		$data = array('estados' => $estados, 'municipios' => $municipios);
			
		return new ViewModel($data);
		
		
	}

	public function guardarpacienteAction()
	{
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
			$paciente->setEDAD($this->request->getPost('EDAD'));
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
			$paciente->setUSUARIO($this->identity());
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
			$historia->setABORTOS($this->request->getPost('ABORTOS'));
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

	public function guardarimagenesconsAction()
	{
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
				$this->createthumb($ruta . '/' . $nombre_imagen, 100, 100);
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

	public function eliminarFotoAction()
	{
		if ($this->request->getPost()) {
			$om = $this->getObjectManager();
			$imagen = $this->request->getPost('archivo');
			$idPaciente = $this->request->getPost('id');

			$filename = explode(".", $imagen);

			$query = $om->createQuery("SELECT i.ID FROM Application\Entity\Imagenesconsultas i WHERE i.IMAGEN = '$imagen' AND i.PACIENTE = $idPaciente");
			$foto = $query->getArrayResult();

			$quitar = $om->find('Application\Entity\Imagenesconsultas', $foto[0]['ID']);

			$om->remove($quitar);
			$om->flush();

			$ruta = getcwd() . '/public/imagenes/consultas/' . $idPaciente . '/' . $imagen;

			unlink($ruta);
			$thumb = getcwd() . '/public/imagenes/consultas/' . $idPaciente . '/' . $filename[0].'_th.'.$filename[1];
			unlink($thumb);

			return new JsonModel();
		}
	}

	public function createthumb($name, $new_w, $new_h)
	{
		$system = explode(".", $name);
		$extension = end($system);
		$nom = array_pop($system);
		$nom = implode(".", $system);
		if (preg_match("/jpg|jpeg/", $extension)) {$src_img = imagecreatefromjpeg($name);}
		if (preg_match("/png/", $extension)) {$src_img = imagecreatefrompng($name);}

		$old_x = imageSX($src_img);
		$old_y = imageSY($src_img);
		if ($old_x > $old_y) {
			$thumb_w = $new_w;
			$thumb_h = $old_y * ($new_h / $old_x);
		}
		if ($old_x < $old_y) {
			$thumb_w = $old_x * ($new_w / $old_y);
			$thumb_h = $new_h;
		}
		if ($old_x == $old_y) {
			$thumb_w = $new_w;
			$thumb_h = $new_h;
		}
		$dst_img = ImageCreateTrueColor($thumb_w, $thumb_h);
		imagecopyresampled($dst_img, $src_img, 0, 0, 0, 0, $thumb_w, $thumb_h, $old_x, $old_y);
		if (preg_match("/png/", $extension)) {
			imagepng($dst_img, $nom . '_th.' . $extension);
		} else {
			imagejpeg($dst_img, $nom . '_th.' . $extension);
		}
		imagedestroy($dst_img);
		imagedestroy($src_img);
	}

	/**
	 * get entityManager
	 *
	 * @return EntityManager
	 */
	private function getObjectManager()
	{
		if (null === $this->_objectManager) {
			$this->_objectManager = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
		}

		return $this->_objectManager;
	}

	public function listadepacientesAction()
	{
		$this->layout('layout/captura');
		$om = $this->getObjectManager();
		$pacient = $om->createQuery("SELECT p FROM Application\Entity\Pacientes p")->getArrayResult();

		return new ViewModel(array("pacient" => $pacient));
	}

	public function eliminarpacienteAction()
	{
		$this->layout('layout/captura');
		
		$om = $this->getObjectManager();
		$pid = $this->request->getPost('pac');	

		$bpac = $om->find('Application\Entity\Pacientes', $pid);
		$om->remove($bpac);
		$om->flush();
				
		return new JsonModel();
	}

	public function getpacientesAction()
	{
		$oM = $this->getObjectManager();
		$query 	= $oM->createQuery("SELECT p FROM Application\Entity\Pacientes p ");
		$paciente 	 = $query->getArrayResult();
		return new JsonModel(array('pacientes'=>$paciente));

	}

	public function corregirAction()
	{
		$oM = $this->getObjectManager();
		$paciente 	= $oM->createQuery("SELECT count(p.ID) FROM Application\Entity\Pacientes p ORDER BY CONCAT(p.NOMBRE,' ',p.APELLIDO_PATERNO,' ',p.APELLIDO_MATERNO)")->getArrayResult();
		
		return new JsonModel(array('pacientes'=>$paciente));
		

	}

	

	public function getimagesAction()
	{
		$this->layout('layout/vacio');
		$om = $this->getObjectManager();
		$id = $this->request->getPost('pac');

		$images = $om->createQuery("SELECT i FROM Application\Entity\Imagenesconsultas i WHERE i.PACIENTE = $id")->getArrayResult();
		return new JsonModel(array('images'=>$images,'carpeta'=>$id));
	}

	public function pacientesAction() {
      $dato = $this->getRequest()->getQuery('term');
      $query = $this->getObjectManager()->createQuery("SELECT p FROM Application\Entity\Pacientes p WHERE p.NOMBRE like '%$dato%'");
      $pacientes = $query->getArrayResult();
      $json = array();
      foreach($pacientes as $pac) {
        $json[] = array('id' => $pac['ID'],'label' => $pac['NOMBRE'].' '.$pac['APELLIDO_PATERNO'].' '.$pac['APELLIDO_MATERNO'].' ['.date_format($pac['FECHA_NACIMIENTO'],'Y/m/d').']',
        'value' => $pac['NOMBRE'].' '.$pac['APELLIDO_PATERNO'].' '.$pac['APELLIDO_MATERNO'],
        'name' => 'pac'.$pac['ID'],
        'fecha' => date_format($pac['FECHA_NACIMIENTO'],'Y-m-d'),
        'idPac' => $pac['ID']);
      }
      $resultado = new JsonModel($json);
      return $resultado;
    }

	public function verexpedienteAction()
	{
		$this->layout('layout/captura');
		$om = $this->getObjectManager();
		$estados = $om->createQuery("SELECT e FROM Application\Entity\Estados e")->getArrayResult();
		$municipios = $om->createQuery("SELECT m FROM Application\Entity\Municipios m")->getArrayResult();

		if($this->request->isPost()){
			
			$pac = $this->request->getPost('pac');
			$paciente = $this->getObjectManager()->createQuery("SELECT p FROM Application\Entity\Pacientes p WHERE p.ID = $pac")->getArrayResult();
			
			return new ViewModel(array('paciente'=>$paciente,'estados' => $estados, 'municipios' => $municipios));

		}else{
			$data = array('estados' => $estados, 'municipios' => $municipios);
			
			return new ViewModel($data);
		}
	}
	
	public function moverarchivosAction()
	{
		$this->layout('layout/vacio');
		$om = $this->getObjectManager();

		$original  = $this->request->getPost('original');
		$duplicado = $this->request->getPost('duplicado');

		$rutaOrigen  = getcwd(). '/public/imagenes/consultas/' . $duplicado . '/';
		$rutaDestino = getcwd(). '/public/imagenes/consultas/' . $original . '/';

		//cp /ruta/al/directorio/origen/* /ruta/al/directorio/destino
		//cp -Rpv /carpetaorigen/* /carpetadestino/
		//mv $rutaOrigen.'* '.$rutaDestino;
		//cp -r $rutaOrigen.'* '.$rutaDestino;
		$this->recurse_copy($rutaOrigen,$rutaDestino);
		
		/****** Cambio en la base de datos  *******/
		
		$images = $om->getRepository('Application\Entity\Imagenesconsultas')->findBy(array('PACIENTE'=>$duplicado));
		foreach ($images as $ima) {
			$ima->setPACIENTE($om->find('Application\Entity\Pacientes',$original));
			$om->merge($ima);
		}
		$om->flush();
		$expes = $om->createQuery("SELECT c FROM Application\Entity\Consultas c WHERE c.ESPEC='Expescar' AND c.PACIENTE = $duplicado")->getArrayResult();
		$borraEx = $expes[0]['ID'];
		
		$expescar = $om->find('Application\Entity\Consultas',$borraEx);
		$om->remove($expescar);
		$om->flush();
		
		$consults = $om->getRepository('Application\Entity\Consultas')->findBy(array('PACIENTE'=>$duplicado));
		foreach($consults as $con){
			 $con->setPACIENTE($om->find('Application\Entity\Pacientes',$original));
			 $om->merge($con);
		}
		$om->flush();
		
		$pac = $om->find('Application\Entity\Pacientes', $duplicado);
		$om->remove($pac);
		$om->flush();
		
		return new JsonModel();
		
	}

	public function datospacienteAction()
	{
		$this->layout('layout/captura');
		$om = $this->getObjectManager();
		$pac = $this->request->getPost('pac');
		
		$paciente = $om->createQuery("SELECT p,t,m,e FROM Application\Entity\Pacientes p JOIN p.TIPO_SANGUINEO t JOIN p.MUNICIPIO m LEFT JOIN p.ESTADO e WHERE p.ID = $pac")->getArrayResult();

		$images = $om->createQuery("SELECT i FROM Application\Entity\Imagenesconsultas i WHERE i.PACIENTE = $pac")->getArrayResult();
		
		return new JsonModel(array('paciente'=>$paciente,'imagenes'=>$images,'carpeta'=>$pac));
	}

	public function pacienteduplicadoAction()
	{
		$this->layout('layout/captura');
		
		
		return new ViewModel();
	}

	public function patientsAction()
	{
      $dato = $this->getRequest()->getQuery('term');
      $query = $this->getObjectManager()->createQuery("SELECT p FROM Application\Entity\Pacientes p WHERE p.NOMBRE like '%$dato%'");
      $pacientes = $query->getArrayResult();
      $json = array();
      foreach($pacientes as $pac) {
        $json[] = array('id' => $pac['ID'],'label' => '['.$pac['ID'].']'.$pac['NOMBRE'].' '.$pac['APELLIDO_PATERNO'].' '.$pac['APELLIDO_MATERNO'],
        'value' => $pac['NOMBRE'].' '.$pac['APELLIDO_PATERNO'].' '.$pac['APELLIDO_MATERNO'],
        'name' => 'pac'.$pac['ID'],
        'idPac' => $pac['ID']);
      }
      $resultado = new JsonModel($json);
      return $resultado;
    }
			
    function recurse_copy($src,$dst)
    { 
	    $dir = opendir($src); 
	    @mkdir($dst); 
	    while(false !== ( $file = readdir($dir)) ) { 
	        if (( $file != '.' ) && ( $file != '..' )) { 
	            if ( is_dir($src . '/' . $file) ) { 
	                recurse_copy($src . '/' . $file,$dst . '/' . $file); 
	            } 
	            else { 
	                copy($src . '/' . $file,$dst . '/' . $file); 
	            } 
	        } 
	    } 
	    closedir($dir); 
	} 

	function eliminarimageAction()
	{
		$om = $this->getObjectManager();
		$idPaciente = $this->request->getPost('pac');
		$borra = $om->find('Application\Entity\Imagenesconsultas', $this->request->getPost('id'));

		$nombre = $borra->getIMAGEN();
		$om->remove($borra);
		$om->flush();

		$filename = explode(".", $nombre);

		$ruta = getcwd() . '/public/imagenes/consultas/' . $idPaciente . '/' . $nombre;
		unlink($ruta);

		$thumb = getcwd() . '/public/imagenes/consultas/' . $idPaciente . '/' . $filename[0].'_th.'.$filename[1];
		unlink($thumb);
		
		return new JsonModel();
	}
			

}