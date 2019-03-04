<?php

class TagsController extends AppController {

    public $helpers = array('Html', 'Form');
    public $name = 'Tags';

    function beforeFilter() {
        $this->Auth->allow(array('index', 'ver'));
    }

    public function index() {

        // $this->loadModel('MateriasTag');
        $marcas = $this->Tag->find('all');

        $i = 0;
        foreach ($marcas as $c_tag) {
            // pr($c_tag);
            $marcas[$i]['id'] = $c_tag['Tag']['id'];
            $marcas[$i]['gt_setor'] = $c_tag['Tag']['gt_setor'];
            $marcas[$i]['gt_setor_extenso'] = $c_tag['Tag']['gt_setor_extenso'];
            $marcas[$i]['observacoes'] = $c_tag['Tag']['observacoes'];
            $marcas[$i]['quantidade'] = count($c_tag['Materia']);
            $i++;
        }
        // pr($marcas);
        $this->set('tags', $marcas);
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

        $this->set('tags', $this->Tag->findById($id));
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

    public function adicionatag() {

        $this->set('materias', $this->Tag->Materia->find('list'));
    }

    public function excluir($id = NULL) {

        $this->loadModel('MateriasTag');
        $existe = $this->MateriasTag->findAllByTagId($id);

        if (count($existe) > 0) {
            $this->Flash->error(__('Não é possível excluir o registro por estar associado a matérias'));
        } else {
            if ($this->Tag->delete($id)) {
                $this->Flash->success(__('Registo excluído'));
            }
        }
        return $this->redirect(array('action' => 'index'));
    }

}

?>