<?php

class SsindicaisController extends AppController {

    public $helpers = array('Html', 'Form');
    public $name = 'Ssindicais';
    public $paginate = array('limit' => 10,
        'order' => array('Ssindical.Secao_sindical' => 'ASC')
    );

    function beforeFilter() {
        $this->Auth->allow(array('index', 'tabla', 'ver', 'vercada', 'vercadasite', 'regionais', 'estados', 'sectores', 'seleciona'));
    }

    public function index() {

        if (isset($this->request->params['pass'][0])) {
            $campo = $this->request->params['pass'][0];
            $valor = $this->request->params['pass'][1];
        }

        // echo $campo . " " . $valor;

        if (!empty($campo)) {
            $this->set('ssindicais', $this->Ssindical->find('all', array($campo => $valor)));
        } else {
            $this->set('ssindicais', $this->Ssindical->find('all')
            );
        }
    }

    public function tabla() {

        if (isset($this->request->params['pass'][0])) {
            $campo = $this->request->params['pass'][0];
            $valor = $this->request->params['pass'][1];
        }

        $this->Ssindical->contain(['historicos'
            => ['order' => 'id DESC',
                'limit' => 1],
        ]);

        // $valor = 'ADUA';
        if (isset($valor) && !empty($valor)):
            $options = ['Secao_sindical LIKE' => '%' . $valor . '%'];
            $ssindicais = $this->Ssindical->find('all',
                    ['conditions' => $options]);
        else:
            $ssindicais = $this->Ssindical->find('all');
        endif;

        $this->set('ssindicais', $ssindicais);
        // pr($ssindicais);
        // $this->autoRender = false;
        // die();
    }

    public function vercada() {

        $this->paginate = array(
            'limit' => 1,
            'order' => array(
                'Ssindical.Secao_sindical' => 'ASC')
        );

        $this->set('ssindicais', $this->paginate('Ssindical'));
    }

    public function vercadasite() {

        $this->paginate = array(
            'conditions' => array('Ssindical.site != ""'),
            'limit' => 1,
            'order' => array(
                'Ssindical.Secao_sindical' => 'ASC')
        );

        $this->set('ssindicais', $this->paginate('Ssindical'));
    }

    public function vercadafacebook() {

        $this->paginate = array(
            'conditions' => array('Ssindical.Facebook != ""'),
            'limit' => 1,
            'order' => array(
                'Ssindical.Secao_sindical' => 'ASC')
        );

        $this->set('ssindicais', $this->paginate('Ssindical'));
    }

    public function vercadayoutube() {

        $this->paginate = array(
            'conditions' => array('Ssindical.Youtube != ""'),
            'limit' => 1,
            'order' => array(
                'Ssindical.Secao_sindical' => 'ASC')
        );

        $this->set('ssindicais', $this->paginate('Ssindical'));
    }

    public function seleciona() {

// debug($this->request->params);

        $campo = $this->request->params['pass'][0];
        $valor = $this->request->params['pass'][1];

        $this->set('ssindicais', $this->Ssindical->find('all', array(
                    'conditions' => array($campo => $valor)
        )));

        $options = array(
            'conditions' => array($campo => $valor)
        );

        $this->paginate = $options;
        $ssindicais = $this->paginate('Ssindical');
        $this->set('ssindicais', $ssindicais);

        $this->set('campo', $campo);
    }

    public function editar($id = NULL) {

        if (!$id) {
            throw new NotFoundException(__('Dígito inválido'));
        }

        $ssindicais = $this->Ssindical->findById($id);

        if ($this->request->is(array('post', 'put'))) {

            $this->Ssindical->id = $id;

            if ($this->Ssindical->save($this->request->data)) {
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
            throw new NotFoundException(__('Número inválido'));
        }

        $this->set('ssindical', $this->Ssindical->findById($id));
    }

    public function excluir($id = NULL) {

        if ($this->Ssindical->delete($id)) {
            $this->Flash->success(__('Registo excluído'));
        } else {
            $this->Flash->error(__('Registro NÃO foi excluído'));
        }

        return $this->redirect(array('action' => 'index'));
    }

    public function add() {

        if (!empty($this->request->data)) {

            if ($this->Ssindical->save($this->request->data)) {
                $this->Flash->success(__('Dados inseridos!'));

                $this->redirect(array('action' => 'ver/', $this->Ssindical->getLastInsertId()));
            }
            $this->Flash->error(__('Erro: não foi inserido o novo registro'));
        }
    }

    public function regionais() {

        $options = array(
            'fields' => array('DISTINCT Ssindical.Regional as Regional',
                'count(regional) AS quantidade'),
            'group' => array('Regional'),
            'order' => array('Regional ASC')
        );
        $this->Ssindical->virtualFields['quantidade'] = 'quantidade';
        $this->paginate = $options;
        $regionais = $this->paginate('Ssindical');
        $this->set('regionais', $regionais);
    }

    public function estados() {

        $options = array(
            'fields' => array('DISTINCT Ssindical.Estado',
                'count(Estado) AS quantidade'),
            'group' => array('Estado'),
            'order' => array('Estado ASC'),
            'limit' => '30'
        );
        $this->Ssindical->virtualFields['quantidade'] = 'quantidade';
        $this->paginate = $options;
        $estados = $this->paginate('Ssindical');
        $this->set('estados', $estados);
    }

    public function sectores() {

        $this->set('sectores', $this->Ssindical->find('all', array(
                    'fields' => array('DISTINCT Ssindical.Setor',
                        'count(setor) AS quantidade'),
                    'group' => array('Setor'),
                    'order' => array('Setor ASC'),
                        )
                )
        );
    }

}

?>