<?php

class ComentapautasController extends AppController {

    public $helpers = array('Html', 'Form');
    public $name = 'Comentapautas';

    public function index() {
        // $this->loadModel('Comentapauta');
// $comentapautas = $this->Comentapauta->find('all');
// debug($comentapautas);
        $this->set('comentapautas', $this->Comentapauta->find('all'));
    }

    public function add($id = NULL) {
        // Se a função é chamada desde busca_pauta_id
        if (isset($this->request->params['pass'][0])) {
            $this->set('materia_id', $this->request->params['pass'][0]);
        }

        if (!empty($this->request->data)) {
            pr($this->request->data);
            $this->Comentapauta->create();
            if ($this->Comentapauta->save($this->request->data)) {
                $this->Flash->success(__('Comentário gravado'));
                return $this->redirect(array('controller' => 'Pautas', 'action' => 'ver/' . $this->request->data['Comentapauta']['pauta_id']));
            }
            $this->Flash->error(__('Não foi possível gravar o comentário'));
        }

        $comentapautas = $this->Comentapauta->Pauta->findById($id);
        if (empty($comentapautas)):
            $this->Flash->error(__('Não foi possível achar a pauta'));
            return $this->redirect('/pautas/index');
        else:
            $this->set('comentapautas', $comentapautas);
        endif;
    }

    public function editar($id = NULL) {

        if (!$id) {
            throw new NotFoundException(__('Comentário inválido'));
        }

        $this->loadModel('Pauta');
        $comentapautas = $this->Pauta->Comentapauta->findById($id);
        // pr($comentapautas);
        // die();

        $this->loadModel('Observacoe');
        if ($this->request->is(array('observacoe', 'put'))) {
            $this->Comentapauta->id = $id;
            if ($this->Comentapauta->save($this->request->data)) {
                $this->Flash->success(__('Registro atualizado'));
                return $this->redirect(array('controller' => 'Pautas',
                            'action' => 'ver/' . $comentapautas['Pauta']['id']));
            }
            $this->Flash->error(__('Não foi possível atualizar o registro'));
        }

        if (!$this->request->data) {
            $this->request->data = $comentapautas;
        }
    }

    public function excluir($id = NULL) {

        // $this->loadModel('Comentapauta');
        $pauta_id = $this->Comentapauta->findById($id);
        // pr($materia_id);
        if ($this->Comentapauta->delete($id)) {
            $this->Flash->success(__('Registo excluído'));
        } else {
            $this->Flash->error(__('Registro NÃO foi excluído'));
        }
        return $this->redirect(array('controller' => 'pautas',
                    'action' => 'ver/' . $pauta_id['Pauta']['id']));
    }

    public function ver($id = NULL) {

        if (!$id) {
            throw new NotFoundException(__('Comentário inválido'));
        }

        $this->set('comentapauta', $this->Comentapauta->findById($id));
    }

}

?>