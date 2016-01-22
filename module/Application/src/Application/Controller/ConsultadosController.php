<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ConsultadosController extends AbstractActionController{

	public function consultaAction(){
		return new ViewModel();
	}
}