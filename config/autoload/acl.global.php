<?php
/**
 * Coolcsn Zend Framework 2 Authorization Module
 *
 * @link https://github.com/coolcsn/CsnAuthorization for the canonical source repository
 * @copyright Copyright (c) 2005-2013 LightSoft 2005 Ltd. Bulgaria
 * @license https://github.com/coolcsn/CsnAuthorization/blob/master/LICENSE BSDLicense
 * @author Stoyan Cheresharov <stoyan@coolcsn.com>, Stoyan Revov <st.revov@gmail.com>
 */

return array(
	'acl' => array(
		/**
		 * By default the ACL is stored in this config file.
		 * If you activate the database_storage ACL will be constructed from the database via Doctrine
		 * and the roles and resources defined in this config wil be ignored.
		 *
		 * Defaults to false.
		 */
		'use_database_storage' => false,
		/**
		 * The route where users are redirected if access is denied.
		 * Set to empty array to disable redirection.
		 */
		'redirect_route' => array(
			'params' => array(
				//'controller' => 'my_controllet',
				//'action' => 'my_action',
				//'id' => '1',
			),
			'options' => array(
				// We should redirect to an action Controller accessable for everyone. And this is "home" route
				// There should be a rule in the Acl allowing every role access to the action and controller
				// Usually this is the homepage action in our case CsnCms\Controller\Index action frontPageAction
				// the route 'home' = '/' should be overriden by CsnCms
				// In the case we are using login we enter an endless redirect. If you are loged in in the system as a Recepción
				// to hide from the navigation the login action the coleagues are using Acl to deny access to login.
				// The CsnAuthorisation trys to redirect to not accessable action loginAction and it gets redirected back to it.
				// Much better is to redirect to an action for sure accessable from everyone and there is no better candidate than the homepage
				// the landing page for the requests to the domain.
				'name' => 'home', // 'login',
			),
		),
		/**
		 * Access Control List
		 * -------------------
		 */
		'roles' => array(
			'Invitado' => null,
			'Recepción' => 'Invitado',
			'Técnico' => 'Recepción',
			'Médico' => 'Técnico',
			'Administrativo' => 'Médico',
			'Admin' => 'Administrativo',
		),
		'resources' => array(
			'allow' => array(
				'CsnUser\Controller\Registration' => array(
					'index' => 'Invitado',
					'changePassword' => 'Recepción',
					'editProfile' => 'Recepción',
					'changeEmail' => 'Recepción',
					'forgottenPassword' => 'Invitado',
					'confirmEmail' => 'Invitado',
					'registrationSuccess' => 'Invitado',
				),
				'Application\Controller\Registro' => array(
					'index' => 'Invitado',
					'changePassword' => 'Recepción',
					'editProfile' => 'Recepción',
					'changeEmail' => 'Recepción',
					'forgottenPassword' => 'Invitado',
					'confirmEmail' => 'Invitado',
					'registrationSuccess' => 'Invitado',
					'registro' => 'Invitado',
				),

				'Application\Controller\Pacientes' => array(
					'all' => 'Invitado',					
				),

				 'Application\Controller\Consultados' => array(
                    'all'   => 'Admin',
                    
                ),
				 'Application\Controller\Consultas' => array(
                    'all'   => 'Admin',  
                ),
				 'Application\Controller\Notas' => array(
					'all' => 'Admin',					
				),

				'CsnUser\Controller\Index' => array(
					'login' => 'Invitado',
					'logout' => 'Recepción',
					'index' => 'Invitado',
				),
				'CsnCms\Controller\Index' => array(
					'all' => 'Invitado',
				),
				'CsnCms\Controller\Article' => array(
					'view' => 'Invitado',
					'vote' => 'Recepción',
					'index' => 'Admin',
					'add' => 'Admin',
					'edit' => 'Admin',
					'delete' => 'Admin',
				),
				'CsnCms\Controller\Translation' => array(
					'index' => 'Admin',
					'add' => 'Admin',
					'edit' => 'Admin',
					'delete' => 'Admin',
				),
				'CsnCms\Controller\Comment' => array(
					'index' => 'Recepción',
					'add' => 'Recepción',
					'edit' => 'Recepción',
					'delete' => 'Recepción',
				),
				'CsnCms\Controller\Category' => array(
					'index' => 'Admin',
					'add' => 'Admin',
					'edit' => 'Admin',
					'delete' => 'Admin',
				),
				'CsnFileManager\Controller\Index' => array(
					'all' => 'Recepción',
				),
				'Zend' => array(
					'uri' => 'Recepción',
				),
				'Application\Controller\Index' => array(
					'index' => 'Invitado',
					'login' => 'Invitado',
				),
				// for CMS articles
				'all' => array(
					'view' => 'Invitado',
				),
				'Public Resource' => array(
					'view' => 'Invitado',
				),
				'Private Resource' => array(
					'view' => 'Recepción',
				),
				'Admin Resource' => array(
					'view' => 'Admin',
				),
			),
			'deny' => array(
				'CsnUser\Controller\Index' => array(
					'login' => 'Recepción',
				),
				'CsnUser\Controller\Registration' => array(
					'index' => 'Recepción',
				),
			),
		),
	),
);
