<?php

class PautasController extends AppController {

    public $helpers = array('Html', 'Form', 'Text');
    public $components = array('Flash', 'Paginator');
    public $name = 'Pautas';

    function beforeFilter() {
        $this->Auth->allow(array('index', 'ver'));
    }

    public function index() {

        /* Pauta de notícias para o site */
        if (isset($this->request->params['named']['informandes']) && $this->request->params['named']['informandes'] == 0) {
            $this->paginate = array(
                'limit' => 10,
                'conditions' => array('Materia.pauta_id' => NULL, 'Pauta.arquivar' => 0, 'Pauta.informandes' => 0),
                'order' => array(
                    'Pauta.data' => 'DESC')
            );
            /* Pauta de notícias para o informandes */
        } elseif (isset($this->request->params['named']['informandes']) && $this->request->params['named']['informandes'] == 1) {
            $this->paginate = array(
                'limit' => 10,
                'conditions' => array('Pauta.arquivar' => 0, 'Pauta.informandes' => 1),
                'order' => array(
                    'Pauta.data' => 'DESC')
            );
        } else {
            $this->paginate = array(
                'limit' => 10,
                'conditions' => array('Materia.pauta_id' => NULL, 'Pauta.arquivar' => 0, 'Pauta.informandes' => 0),
                'order' => array(
                    'Pauta.data' => 'DESC')
            );
        }

        $this->set('matriz', $this->Paginate('Pauta'));
    }

    public function add() {

        if (!empty($this->request->data)) {

            $file = $this->request->data['Pauta']['anexo'];
            if (!empty($file[0]['name'])):
                // die();
                $file = $this->request->data['Pauta']['anexo'];
                $i = 0;
                foreach ($file as $c_file):
                    $extensao = explode('.', $c_file['name']);
                    $tamanho_extensao = strlen(end($extensao));
                    // $nome_arquivo = substr($c_file['name'], 0, -($tamanho_extensao + 1));
                    // pr($this->Time->fromString($this->request->data['Pauta']['data']));
                    $data = date('Y-m-d-H:i');
                    // echo $data;
                    // $data = $this->request->data['Pauta']['data']['day'] . "-" . $this->request->data['Pauta']['data']['month'] . "-" . $this->request->data['Pauta']['data']['year'];
                    $nome_arquivo_completo = 'pauta-' . $data . '-' . $i . "." . end($extensao);
                    // $c_file['name'] = 'pauta_' . $this->request->data['Pauta']['data'];
                    // pr($nome_arquivo_completo);
                    // die();
                    move_uploaded_file($c_file['tmp_name'], WWW_ROOT . '/files/' . $nome_arquivo_completo);
                    if (empty($name)):
                        $name = $nome_arquivo_completo . ', ';
                    else:
                        $name .= $nome_arquivo_completo . ', ';
                    endif;
                    $i++;
                endforeach;

                /* Para tirar a última vírgula */
                $size = strlen(trim($name));
                $name = substr($name, 0, $size - 1);

                $this->request->data['Pauta']['anexo'] = $name;
            else:
                unset($this->request->data['Pauta']['anexo']);
            endif;
            // pr($this->request->data['Pauta']['anexo']);
            // die();
            if ($this->Pauta->save($this->request->data)) {
                $this->Flash->success(__('Dados inseridos!'));
                $this->Pauta->getLastInsertId();
                $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Não foi possível inserir a pauta'));
        }
    }

    public function editar($id = NULL) {

        if (!$id) {
            throw new NotFoundException(__('Pauta inválida'));
        }
        $pauta = $this->Pauta->findById($id);
        // pr($pauta);
        // die();
        if (!$pauta) {
            throw new NotFoundException(__('Pauta inválida'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->Pauta->id = $id;
            // pr($this->request->data['Pauta']['anexo']);
            // print_r($_FILES);
            // die();
            if (isset($this->request->data['Pauta']['anexo']) && !empty($this->request->data['Pauta']['anexo'][0]['name'])):

                $file = $this->request->data['Pauta']['anexo'];

                $i = 0;
                foreach ($file as $c_file):

                    $extensao = explode('.', $c_file['name']);
                    // pr($extensao);
                    $tamanho_extensao = strlen(end($extensao));
                    // $nome_arquivo = substr($c_file['name'], 0, -($tamanho_extensao + 1));
                    // echo $nome_arquivo . " " . end($extensao);
                    $data = date('Y-m-d-H:i');
                    // echo $date;
                    // $data = $this->request->data['Pauta']['data']['day'] . "-" . $this->request->data['Pauta']['data']['month'] . "-" . $this->request->data['Pauta']['data']['year'];
                    $nome_arquivo_completo = 'pauta-' . $data . '-' . $i . "." . end($extensao);
                    // $c_file['name'] = 'pauta_' . $this->request->data['Pauta']['data'];
                    move_uploaded_file($c_file['tmp_name'], WWW_ROOT . '/files/' . $nome_arquivo_completo);
                    if (empty($name)):
                        $name = $nome_arquivo_completo . ', ';
                    else:
                        $name .= $nome_arquivo_completo . ', ';
                    endif;
                    $i++;
                endforeach;
                /* Para tirar a última vírgula */
                // pr($name);
                $size = strlen(trim($name));
                $name = substr($name, 0, $size - 1);
                $this->request->data['Pauta']['anexo'] = $name;

            else:
                unset($this->request->data['Pauta']['anexo']);
            endif;

            if ($this->Pauta->save($this->request->data)) {
                $this->Flash->success(__('Registro atualizado'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Não foi possível atualizar o registro'));
        }
        if (!$this->request->data) {
            $this->request->data = $pauta;
        }
    }

    public function excluiranexo($id = NULL) {

        if (!$id) {
            throw new NotFoundException(__('Pauta inválida'));
        }

        if (isset($this->request->params['named']['anexo'])) {
            $anexo = $this->request->params['named']['anexo'];
            // pr($anexo);
        }

        $this->Pauta->id = $id;
        $pauta = $this->Pauta->findById($id);
        $this->request->data = $pauta;

        if (isset($pauta['Pauta']['anexo']) && !empty($pauta['Pauta']['anexo'])):
            $anexos = explode(',', $pauta['Pauta']['anexo']);
            // pr($anexo);
            // die();
            foreach ($anexos as $c_anexo):
                // pr($c_anexo);
                // die();
                if ((trim($c_anexo)) === $anexo):
                    echo 'Arquivo equal: ' . WWW_ROOT . 'files/' . $c_anexo;
                    // die();
                    @unlink(WWW_ROOT . 'files/' . $c_anexo);
                    unset($c_anexo);
                    $novo_anexo = '';
                else:
                    if (empty($novo_anexo)):
                        $novo_anexo = $c_anexo . ", ";
                    else:
                        $novo_anexo .= $c_anexo . ", ";
                    endif;
                endif;
                // die();
            endforeach;

            /* Retiro a vírgula */
            if (isset($novo_anexo)):
                $novo_anexo = trim($novo_anexo);
                $size = strlen($novo_anexo);
                $novo_anexo = substr($novo_anexo, 0, $size - 1);
            // pr($novo_anexo);
            // die();
            else:
                unset($novo_anexo);
            endif;

            $this->request->data = $pauta;
            // pr($novo_anexo);
            // die();
            if (isset($novo_anexo)):
                $this->request->data['Pauta']['anexo'] = $novo_anexo;
            endif;

            // pr($this->request->data);
            // die();

            if ($this->Pauta->save($this->request->data)) {
                // $log = $this->Pauta->getDataSource()->getLog(false, false);
                // debug($log);
                // die();
                $this->Flash->success(__('Registro atualizado'));
                return $this->redirect(array('action' => 'ver/' . $this->request->data['Pauta']['id']));
            }
            $this->Flash->error(__('Não foi possível atualizar o registro'));

        endif;
    }

    public function excluir($id = NULL) {

        if ($this->Pauta->delete($id)) {
            $this->Flash->success(__('Registo excluído'));
        } else {
            $this->Flash->error(__('Registro NÃO foi excluído'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function ver($id = NULL) {

        if (!$id) {
            throw new NotFoundException(__('Número de pauta inválido'));
        }

        $this->set('pautas', $this->Pauta->findById($id));
    }

    public function buscar() {
        
    }

    /* O valor 1 quer dizer arquivar */

    public function arquivar($id = NULL) {

        if (isset($this->params['named']['id'])) {
            $id = $this->params['named']['id'];
            $this->request->data['Pauta']['id'] = $id;
        };

        if (isset($this->params['named']['arquivar'])) {
            $arquivar = $this->params['named']['arquivar'];
            if ($arquivar == 0):
                $this->request->data['Pauta']['arquivar'] = 1;
            elseif ($arquivar == 1):
                $this->request->data['Pauta']['arquivar'] = 0;
            endif;
        };

        if ($this->request->data['Pauta']['arquivar'] == 1) {

            if ($this->Pauta->save($this->request->data)) {
                $this->Flash->success(__('Pauta arquivada'));
                return $this->redirect(array('action' => 'index/'));
            }
            $this->Flash->error(__('Não foi possíve arquivar a pauta'));
        } elseif (($this->request->data['Pauta']['arquivar'] == 0)) {

            if ($this->Pauta->save($this->request->data)) {
                $this->Flash->success(__('Pauta desarquivada'));
                return $this->redirect(array('action' => 'index/'));
            }
            $this->Flash->error(__('Não foi possível desarquivar a pauta'));
        } else {

            $this->Flash->error(__('Não foi possíve (des)arquivar a pauta'));
            return $this->redirect(array('action' => 'index/'));
        }
    }

    public function arquivadas() {

        $this->paginate = array(
            'limit' => 10,
            'conditions' => array('Materia.pauta_id' => NULL, 'Pauta.arquivar' => 1),
            'order' => array(
                'Pauta.data' => 'DESC')
        );

        $this->set('pautas', $this->paginate('Pauta'));
    }

    public function deletefile() {

        $files = scandir(WWW_ROOT . 'files/');

        $anexos = $this->Pauta->find('all', array(
            'conditions' => array('not' => array('Pauta.anexo' => "")),
            'fields' => array('anexo')));
        // pr($anexos);

        /* Lista dos arquivos a serem excluidos por não estaram no banco de dados */
        foreach ($anexos as $c_anexo):
            $c_anexo_cada = explode(',', $c_anexo['Pauta']['anexo']);
            // pr($c_anexo['Materia']['id']);
            // pr($c_anexo_cada); 
            // die();
            foreach ($c_anexo_cada as $cada_c_anexo_cada):
                // pr($cada_c_anexo_cada);
                if (in_array(trim($cada_c_anexo_cada), $files)):
                    // echo $cada_c_anexo_cada . " => existe" . "<br>";
                    $excluir_file[] = trim($cada_c_anexo_cada);
                else:
                    // echo $cada_c_anexo_cada . " => não existe " . "<br>";
                    /* Se o arquivo não está no sistema de arquivos então abre para ver e excluir */
                    $this->Flash->error(__('Arquivo não está gravado no sistema de arquivos. Excluir'));
                    return $this->redirect("ver/" . $c_anexo['Pauta']['id']);
                // die();
                endif;
            endforeach;
        endforeach;
        // pr($excluir_file);

        /* Lista de arquivos a serem deletados do sistema de arquivos */
        $apagar = array_diff($files, $excluir_file);
        // pr($apagar);
        foreach ($apagar as $c_apagar):
            $c_apagar_materia = explode('-', $c_apagar);
            if ($c_apagar_materia[0] === 'pauta'):
                // echo "Excluir: -> " . $c_apagar . "<br>";
                @unlink(WWW_ROOT . 'files/' . $c_apagar);
                $this->Flash->success(__('Arquivo excluido da pasta files'));
            endif;
        endforeach;
    }

}

?>