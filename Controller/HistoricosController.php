<?php

App::uses('AppController', 'Controller');

/**
 * Historicos Controller
 *
 * @property Historico $Historico
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class HistoricosController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session', 'Flash');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Historico->contain(['Ssindical' => ['order' => 'Ssindical.Secao_sindical ASC']]);
        $this->set('historicos', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Historico->exists($id)) {
            throw new NotFoundException(__('Invalid historico'));
        }
        $options = array('conditions' => array('Historico.' . $this->Historico->primaryKey => $id));
        $this->set('historico', $this->Historico->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add($id) {

        if (isset($id) && !empty($id)):
            $this->set('ssindical_id', $id);
        endif;

        if ($this->request->is('post')) {
            // Verifico se já foi cadastrado o evento
            $evento = $this->Historico->find('first', [
                'conditions' => [
                    'Historico.evento' => $this->request->data['Historico']['evento'],
                    'Historico.ssindical_id' => $this->request->data['Historico']['ssindical_id']]
            ]);
            if ($evento):
                $this->Flash->error(__('Evento já foi cadastrado'));
                return $this->redirect(['action' => 'view', $evento['Historico']['id']]);
            endif;

            $this->Historico->create();
            if ($this->Historico->save($this->request->data)) {
                $this->Flash->success(__('Registro inserido!'));
                return $this->redirect(['action' => 'view', $this->Historico->getInsertID()]);
            } else {
                $this->Flash->error(__('The historico could not be saved. Please, try again.'));
            }
        }
        $ssindicais = $this->Historico->Ssindical->find('list', ['order' => ['Secao_sindical']]);
        $this->set(compact('ssindicais'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Historico->exists($id)) {
            throw new NotFoundException(__('Invalid historico'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Historico->save($this->request->data)) {
                $this->Flash->success(__('The historico has been saved.'));
                return $this->redirect(['action' => 'view', $id]);
            } else {
                $this->Flash->error(__('The historico could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Historico.' . $this->Historico->primaryKey => $id));
            $this->request->data = $this->Historico->find('first', $options);
        }
        $ssindicais = $this->Historico->Ssindical->find('list');
        $this->set(compact('ssindicais'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        if (!$this->Historico->exists($id)) {
            throw new NotFoundException(__('Invalid historico'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Historico->delete($id)) {
            $this->Flash->success(__('The historico has been deleted.'));
        } else {
            $this->Flash->error(__('The historico could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
