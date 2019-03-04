<?php

class SsindicaisController extends AppController {

    public $helpers = array('Html', 'Form');
    public $name = 'Ssindicais';
    public $paginate = array('limit' => 10,
        'order' => array('Ssindicai.Secao_sindical' => 'ASC')
    );

    function beforeFilter() {
        $this->Auth->allow(array('index', 'ver', 'vercada', 'vercadasite', 'regionais', 'estados', 'sectores', 'seleciona'));
    }

    public function index() {

        if (isset($this->request->params['pass'][0])) {
            $campo = $this->request->params['pass'][0];
            $valor = $this->request->params['pass'][1];
        }

        // echo $campo . " " . $valor;

        if (!empty($campo)) {
            $this->set('ssindicais', $this->paginate('Ssindicai', array($campo => $valor)));
        } else {
            $this->set('ssindicais', $this->paginate('Ssindicai')
            );
        }
    }

    public function vercada() {

        $this->paginate = array(
            'limit' => 1,
            'order' => array(
                'Ssindicai.Secao_sindical' => 'ASC')
        );

        $this->set('ssindicais', $this->paginate('Ssindicai'));
    }

    public function vercadasite() {

        $this->paginate = array(
            'conditions' => array('Ssindicai.site != ""'),
            'limit' => 1,
            'order' => array(
                'Ssindicai.Secao_sindical' => 'ASC')
        );

        $this->set('ssindicais', $this->paginate('Ssindicai'));
    }

    public function vercadafacebook() {

        $this->paginate = array(
            'conditions' => array('Ssindicai.Facebook != ""'),
            'limit' => 1,
            'order' => array(
                'Ssindicai.Secao_sindical' => 'ASC')
        );

        $this->set('ssindicais', $this->paginate('Ssindicai'));
    }

    public function vercadayoutube() {

        $this->paginate = array(
            'conditions' => array('Ssindicai.Youtube != ""'),
            'limit' => 1,
            'order' => array(
                'Ssindicai.Secao_sindical' => 'ASC')
        );

        $this->set('ssindicais', $this->paginate('Ssindicai'));
    }

    public function seleciona() {

// debug($this->request->params);

        $campo = $this->request->params['pass'][0];
        $valor = $this->request->params['pass'][1];

        $this->set('ssindicais', $this->Ssindicai->find('all', array(
                    'conditions' => array($campo => $valor)
        )));

        $options = array(
            'conditions' => array($campo => $valor)
        );

        $this->paginate = $options;
        $ssindicais = $this->paginate('Ssindicai');
        $this->set('ssindicais', $ssindicais);

        $this->set('campo', $campo);
    }

    public function editar($id = NULL) {

        if (!$id) {
            throw new NotFoundException(__('Dígito inválido'));
        }

        $ssindicais = $this->Ssindicai->findById($id);

        if (!$ssindicais) {
            throw new NotFoundException(__('Dígito inválido'));
        }
// echo debug($this->request->data);
        if ($this->request->is(array('ssindicai', 'post'))) {
// die();
            $this->Ssindicai->id = $id;
            if ($this->Ssindicai->save($this->request->data)) {
                $this->Flash->success(__('Registro atualizado'));
                return $this->redirect(array('action' => 'ver/' . $id));
            }
            $this->Flash->error(__('Não foi possível atualizar o registro'));
        }

        if (!$this->request->data) {
            $this->request->data = $ssindicais;
        }
    }

    public function ver($id = NULL) {

        if (!$id) {
            throw new NotFoundException(__('Númeroinválido'));
        }

        $this->set('ssindicai', $this->Ssindicai->findById($id));
    }

    public function excluir($id = NULL) {

        if ($this->Ssindicai->delete($id)) {
            $this->Flash->success(__('Registo excluído'));
        } else {
            $this->Flash->error(__('Registro NÃO foi excluído'));
        }

        return $this->redirect(array('action' => 'index'));
    }

    public function add() {

        if (!empty($this->request->data)) {

            if ($this->Ssindicai->save($this->request->data)) {
                $this->Flash->success(__('Dados inseridos!'));
// $this->Ssindicai->getLastInsertId();
// $this->redirect(array('action' => 'index'));
                $this->redirect(array('action' => 'ver/', $this->Ssindicai->getLastInsertId()));
            }
            $this->Flash->error(__('Erro: não foi inserido o novo registro'));
        }
    }

    public function regionais() {

        $options = array(
            'fields' => array('DISTINCT Ssindicai.Regional as Regional',
                'count(regional) AS quantidade'),
            'group' => array('Regional'),
            'order' => array('Regional ASC')
        );
        $this->Ssindicai->virtualFields['quantidade'] = 'quantidade';
        $this->paginate = $options;
        $regionais = $this->paginate('Ssindicai');
        $this->set('regionais', $regionais);
    }

    public function estados() {

        $options = array(
            'fields' => array('DISTINCT Ssindicai.Estado',
                'count(Estado) AS quantidade'),
            'group' => array('Estado'),
            'order' => array('Estado ASC'),
            'limit' => '30'
        );
        $this->Ssindicai->virtualFields['quantidade'] = 'quantidade';
        $this->paginate = $options;
        $estados = $this->paginate('Ssindicai');
        $this->set('estados', $estados);
    }

    public function sectores() {

        $this->set('sectores', $this->Ssindicai->find('all', array(
                    'fields' => array('DISTINCT Ssindicai.Setor',
                        'count(setor) AS quantidade'),
                    'group' => array('Setor'),
                    'order' => array('Setor ASC'),
                        )
                )
        );
    }

}

?>