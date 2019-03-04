<?php

class ObservacoesController extends AppController {

    public $helpers = array('Html', 'Form');
    public $name = 'Observacoes';

    public function index() {
        $this->loadModel('Observacoe');
// $observacoes = $this->Observacoe->find('all');
// debug($observacoes);
        $this->set('observacoes', $this->Observacoe->find('all'));
    }

    public function add(){
    // Se a função é chamada desde busca_pauta_id
        if (isset($this->request->params['pass'][0])) {
            $this->set('materia_id', $this->request->params['pass'][0]);
        }

        if (!empty($this->request->data)) {
            // pr($this->request->data);
            $this->Observacoe->create();
            if ($this->Observacoe->save($this->request->data)) {
                $this->Flash->success(__('Comentário gravado'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Não foi possível gravar a matéria'));
        }

    }    

    public function editar($id = NULL) {

        if (!$id) {
            throw new NotFoundException(__('Matéria inválida'));
        }

        $this->loadModel('Materia');
        $observacoes = $this->Materia->Observacoe->findById($id);

        $this->loadModel('Observacoe');
        if ($this->request->is(array('observacoe', 'put'))) {
            $this->Observacoe->id = $id;
            if ($this->Observacoe->save($this->request->data)) {
                $this->Flash->success(__('Registro atualizado'));
                return $this->redirect(array('controller' => 'materias',
                            'action' => 'ver/' . $observacoes['Materia']['id']));
            }
            $this->Flash->error(__('Não foi possível atualizar o registro'));
        }

        if (!$this->request->data) {
            $this->request->data = $observacoes;
        }
    }

    public function excluir($id = NULL) {

        $this->loadModel('Observacoe');
        $materia_id = $this->Observacoe->findById($id);
        // pr($materia_id);
        if ($this->Observacoe->delete($id)) {
            $this->Flash->success(__('Registo excluído'));
        } else {
            $this->Flash->error(__('Registro NÃO foi excluído'));
        }
        return $this->redirect(array('controller' => 'materias',
                    'action' => 'ver/' . $materia_id['Materia']['id']));
    }

}

?>