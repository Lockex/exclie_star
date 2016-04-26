<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use DoctrineModule\StdLib\Hydrator\DoctrineObject;

use Application\Entity\Usuarios;

use CsnUser\Service\UserService as UserCredentialsService;

class UsuarioController extends AbstractActionController
{
	/**
	 * @var Doctrine\ORM\EntityManager
	 */
	protected $entityManager;

	public function indexAction()
	{
				
		return new ViewModel();

	}

	public function cambiarpasswordAction()
	{
		if($this->request->getPost()) {
			$usuario = $this->identity();			
			if(UserCredentialsService::verifyHashedPassword($usuario, $this->request->getPost('PASSWORD'))) {
				$om = $this->getEntityManager();				
				$usuario->setPASSWORD(UserCredentialsService::encryptPassword($this->request->getPost('clave1')));
				$om->merge($usuario);
				$om->flush();
				return new JsonModel(array('mensaje' => 'Contraseña actualizada.'));
			} else {
				return new JsonModel(array('mensaje' => 'Contraseña anterior no coincide.'));
			}
		}
	}

	/**
	 * get entityManager
	 *
	 * @return EntityManager
	 */
	private function getEntityManager() 
	{
		if (null === $this->entityManager) {
			$this->entityManager = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
		}

		return $this->entityManager;
	}

	public function cambiarDatosAction()
	{
		if($this->request->getPost())
		{
			$om = $this->getEntityManager();
			$usuario = $om->find('Application\Entity\Usuarios',$this->identity());

			$usuario->setDIRECCION($this->request->getPost('direccion'));
			$usuario->setCOLONIA($this->request->getPost('colonia'));
			$usuario->setCELULAR($this->request->getPost('celular'));
			$usuario->setTRABAJO($this->request->getPost('trabajo'));
			
			$om->merge($usuario);
			$om->flush();

			return new JsonModel();

		}
	}

	public function verDatosAction()
	{
		$om = $this->getEntityManager();
		$usuario = $om->find('Application\Entity\Usuarios',$this->identity());
		$id = $usuario->getID();
		$datos = $om->createQuery("SELECT u FROM Application\Entity\Usuarios u WHERE u.ID = $id")->getArrayResult();
		
		return new JsonModel(array('datos'=>$datos));
	}

	public function fotoAction(){
		$this->layout('layout/vacio');
		
		if($this->request->isPost()){
			$om = $this->getEntityManager();
			$data = array_merge_recursive(
				$this->getRequest()->getPost()->toArray(),
				$this->getRequest()->getFiles()->toArray()
			);

			$usuario = $om->find('Application\Entity\Usuarios',$this->identity());
			$id = $usuario->getID();
			
			if($data['image']['name']) {
				$nombre = explode('/',$data['image']['type']);
				$tipo = $nombre[1];
				
				$ruta = getcwd() . '/public/imagenes/usuario/'. $id; ;

                if (!file_exists($ruta)){
                	mkdir($ruta);
                } 

                if($usuario->getFOTO()){
                	unlink($ruta.'/'.$usuario->getFOTO());
                }

                $adapter = new \Zend\File\Transfer\Adapter\Http();
				$adapter->setDestination($ruta);

				$nombre = 'perfilusu'.uniqid().'.'.$tipo;

				$adapter->addfilter('Rename', array(
				'target' => $ruta . '/' .$nombre ,
				'overwrite' => true,
				));
				
				if($adapter->receive()){
					$usuario->setFOTO($nombre);
					$om->merge($usuario);
					$om->flush();
				}
            }
           
		}

		return new JsonModel();
	}

	public function verfotoAction(){
		
		$this->layout('layout/vacio');
		
		if($this->request->isPost()){
			$om = $this->getEntityManager();
			$usuario = $om->find('Application\Entity\Usuarios',$this->identity());
			$id = $usuario->getID();

			$foto = $om->createQuery("SELECT u.ID,u.FOTO FROM Application\Entity\Usuarios u WHERE u.ID = $id")->getArrayResult();
		
		return new JsonModel(array('foto'=>$foto));
		}
	
	}
}