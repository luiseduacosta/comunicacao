<?php

class MateriatagsController extends AppController {

    public $helpers = array('Html', 'Form');
    public $name = 'Materiatags';

    public function index() {
        $this->set('tags', $this->MateriaTag->find('all'));
    }

    public function editar($id = NULL) {
        if (!$id) {
            throw new NotFoundException(__('Tag inválido'));
        }

        $tag = $this->Tag->findById($id);
        if (!$tag) {
            throw new NotFoundException(__('Tag não existe'));
        }
        if ($this->request->is(array('tag', 'put'))) {
            $this->Tag->id = $id;
            if ($this->Tag->save($this->request->data)) {
                $this->Flash->success(__('Registro atualizado'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Não foi possível atualizar o registro'));
        }
        if (!$this->request->data) {
            $this->request->data = $tag;
        }
    }

    public function ver($id = NULL) {

        $this->set('tags', $this->MateriaTag->findById($id));
    }

    public function add() {
    
        if (!empty($this->request->data)) {

            if ($this->Tag->save($this->request->data)) {
                $this->Flash->set('Dados inseridos!');
                $this->Tag->getLastInsertId();
                $this->redirect(array('action' => 'index'));
                // $this->redirect('/Estagiarios/add/' . $this->Aluno->getLastInsertId());
            }
            $this->Flash->set('Unable to add your post');
        }
    }
    
    public function adicionatag(){
        
        $this->set('materias', $this->MateriaTag->find('list'));
        
    }

}

?>