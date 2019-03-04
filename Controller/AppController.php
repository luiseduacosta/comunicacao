<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    // public $view = 'Theme';
    // public $theme = 'Visitante';

    public $components = array(
        'Flash',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'Pautas',
                'action' => 'index'
            ),
            'logoutRedirect' => array(
                'controller' => 'Pautas',
                'action' => 'index'
            ),
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => 'Blowfish'
                )
            ),
            'authError' => 'Ação não autorizada.',
            'loginError' => 'Login errado. Tente novamente.',
            'authorize' => array('Controller')
        ),
    );

    public function isAuthorized($user) {
        // Admin can access every action

        if (isset($user['role']) && $user['role'] === 'admin') {
            return TRUE;
        }

        // Default deny
        return false;
    }

    public function beforeRender() {

        parent::beforeFilter();

        if ($this->Auth->user('role') === 'admin'):
            $this->set('userData', $this->Auth->user());
        else:
            $this->theme = 'Visitante';
        endif;
    }

}
