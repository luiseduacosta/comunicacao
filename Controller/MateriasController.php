<?php

class MateriasController extends AppController {

    public $helpers = array('Html', 'Form', 'Text');
    public $name = 'Materias';
    public $paginate = array('limit' => 10,
        'order' => array('Materia.data' => 'DESC'));

    function beforeFilter() {
        $this->Auth->allow(array('blog', 'buscar', 'index', 'ver', 'vercada'));
    }

    public function index() {

        if (isset($this->request->params['named']['informandes']) && $this->request->params['named']['informandes'] == 0) {
            $this->set('materias', $this->Paginate('Materia', array('Materia.informandes = 0')));
            $this->set('informandes', $this->request->params['named']['informandes']);
        } elseif (isset($this->request->params['named']['informandes']) && $this->request->params['named']['informandes'] == 1) {
            $this->set('materias', $this->Paginate('Materia', array('Materia.informandes = 1')));
            $this->set('informandes', $this->request->params['named']['informandes']);
        } else {
            $this->set('materias', $this->Paginate('Materia'));
        }
    }

    public function add() {

        if (isset($this->request->params['pass'][0])) {
            $pauta_id = $this->request->params['pass'][0];
        }
        // die();
        if (!empty($this->request->data)) {

            $file = $this->request->data['Materia']['anexo'];

            if (empty($file[0]['name'])):
                unset($this->request->data['Materia']['anexo']);
            // die("Sem imagem anexa");
            else:

                $i = 0;
                foreach ($file as $c_file):
                    // pr($c_file);
                    if (!empty($c_file['name'])):

                        $extensao = explode('.', $c_file['name']);
                        // pr($extensao);
                        // $tamanho_extensao = strlen(end($extensao));
                        $data = date('Y-m-d-H:i');
                        $nome_arquivo = 'materia-' . $data . "-" . $i;
                        $nome_arquivo_completo = $nome_arquivo . "." . end($extensao);
                        move_uploaded_file($c_file['tmp_name'], WWW_ROOT . '/files/' . $nome_arquivo_completo);
                        if (empty($name)):
                            $name = $nome_arquivo_completo . ', ';
                        else:
                            $name .= $nome_arquivo_completo . ', ';
                        endif;
                        $i++;
                    else:
                        unset($name);
                    endif;
                endforeach;

                if (isset($name) && !empty($name)):
                    /* Para tirar a última vírgula */
                    $size = strlen(trim($name));
                    $name = substr($name, 0, $size - 1);

                    /* Verifica tamanho */
                    $tamanho = strlen($name);
                    if ($tamanho > 500):
                        $this->Flash->error(__('Tamanho do nome dos arquivos maior que 500'));
                        return $this->redirect(array('action' => 'index/'));
                    endif;

                    /* Atribuo o nome do anexo na variável do requeste data */
                    $this->request->data['Materia']['anexo'] = $name;
                endif;
            endif;

            $this->request->data['Materia']['pauta_id'] = $pauta_id;

            // pr($this->request->data);
            // die();

            $this->Materia->create();
            if ($this->Materia->save($this->request->data)) {
                $this->Flash->success(__('Matéria gravada'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Não foi possível gravar a matéria'));
        }

        $pauta_titulo = $this->Materia->Pauta->find('first', array('fields' => 'Pauta.titulo', 'conditions' => array('Pauta.id' => $pauta_id)));
        $tags = $this->Materia->Tag->find('list', array('fields' => array('id', 'gt_setor')));
        $this->set(compact('tags', 'pauta_titulo', 'pauta_id'));
    }

    public function vercada() {

        $this->paginate = array(
            'limit' => 1,
            'order' => array(
                'Materia.data' => 'DESC')
        );

        $this->set('materias', $this->paginate('Materia'));
    }

    public function editar($id = NULL) {

        if (!$id) {
            throw new NotFoundException(__('Matéria inválida'));
        }

        // pr($this->request->data);
        // die();

        if ($this->request->data) {

            /* Salva observacoes */
            if (isset($this->request->data['Observacoe']) && !empty($this->request->data['Observacoe'])):
                $observacoes = $this->request->data['Observacoe'];
// pr($observacoes);
// die();
                if ($observacoes['observacoes']) {
                    $this->loadModel('Observacoe');
                    $this->Observacoe->create();
                    if ($this->Observacoe->save($observacoes)) {
                        $this->Flash->success(__('Comentário gravado'));
// return $this->redirect(array('action' => 'index'));
                    }
                    $this->Flash->error(__('Não foi possível gravar a matéria'));
                }
            endif;

            /* Actualiza matéria */
            if ($this->request->is(array('post', 'put'))) {
                $this->Materia->id = $id;

                /* Subrutina (funcao?) para tratar o(s) anexo(s) */
                // pr($this->request->data['Materia']['anexo']);
                // die();
                if (!empty($this->request->data['Materia']['anexo']) && !empty($this->request->data['Materia']['anexo'][0]['name'])):
                    // pr($this->request->data['Materia']['anexo']);
                    // die();
                    if (is_array($this->request->data['Materia']['anexo'])):
                        // echo $this->request->data['Materia']['anexo'];
                        // die('Array');
                        $file = $this->request->data['Materia']['anexo'];
                        $i = 0;
                        foreach ($file as $c_file):
                            // pr($c_file);
                            $extensao = explode('.', $c_file['name']);
                            // pr($extensao);
                            $data = date('Y-m-d-H:i');
                            $nome_arquivo_completo = 'materia-' . $data . '-' . $i . "." . end($extensao);
                            // echo $c_file['tmp_name'];
                            // die($nome_arquivo_completo);
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

                        /* Verifica tamanho */
                        $tamanho = strlen($name);
                        if ($tamanho > 499):
                            $this->Flash->error(__('Largura do nome dos arquivos maior que 500'));
                            return $this->redirect(array('action' => 'ver/' . $id));
                        else:
                            $this->request->data['Materia']['anexo'] = $name;
                        endif;
                    else:
                    // echo "string";
                    // die('String');
                    endif;
                else:
                    unset($this->request->data['Materia']['anexo']);
                endif;
                // pr($this->request->data);
                // die();
                if ($this->Materia->save($this->request->data)) {

                    $this->Flash->success(__('Registro atualizado'));
                    return $this->redirect(array('action' => 'ver/' . $id));
                }
                $this->Flash->error(__('Não foi possível atualizar o registro'));
            }
        }

        $materia = $this->Materia->findById($id);
// pr($materia);
// die("materia");
        if (!$materia) {
            throw new NotFoundException(__('Matéria não existe'));
        }

        if (!$this->request->data) {
            $this->request->data = $materia;
            // pr($this->request->data);
            // die();
        }

        $this->set('observacoes', $this->Materia->Observacoe->find('list'));

        $tags = $this->Materia->Tag->find('list', array('fields' => array('id', 'gt_setor_extenso')));
        $this->set(compact('tags'));

        $this->set('tags_selecionadas', $materia['Tag']);
    }

    public function ver($id = NULL) {

        $this->set('materias', $this->Materia->findById($id));
    }

    public function busca_pauta_id($pauta_id = NULL) {

        if (!$pauta_id) {
            $this->Flash->success(__('Matéria ainda não realizada'));
            // throw new NotFoundException(__('Número de pauta inválido'));
        } else {
            $materias = $this->Materia->findAllByPauta_id($pauta_id, array('fields' => 'id'));
        }

        if (!$materias) {
            // throw new NotFoundException(__('Matéria não existe'));
            $pauta_titulo = $this->Materia->Pauta->find('first', array('fields' => 'Pauta.titulo',
                'conditions' => array('Pauta.id' => $pauta_id)));
            // pr($pauta_titulo);
            // die();
            $this->set('pauta_titulo', $pauta_titulo);

            // die();
            /*
              $this->set('pautaTitulo', $this->Materia->Pauta->find('first', array('fields' => 'Pauta.titulo',
              'conditions' => array('Pauta.id' => $pauta_id))));
             */
            $this->set('tags', $this->Materia->Tag->find('list', array('fields' => 'gt_setor_extenso')));
            // $this->set('nome', 'Luis');
            // $log = $this->Materia->Pauta->getDataSource()->getLog(false, false);
            // debug($log);
            // die('pautaTítulo');
            return $this->redirect(array('action' => 'add/' . $pauta_id));
        } else {
            // $this->set('pauta_id', $this->materias['Materia']['pauta_id']);
            $this->set('pauta_titulo', $this->Materia->Pauta->find('first', array('fields' => 'Pauta.titulo', 'conditions' => array('Pauta.id' => $pauta_id))));
            $this->set('materias', $this->Materia->findAllByPauta_id($pauta_id));
            $this->set('pauta_id', $pauta_id);
            $this->Paginate('Materia', array('Pauta.id = ' . $pauta_id));
            // $this->render('index');
            return $this->redirect(array('action' => 'ver/' . $materias[0]['Materia']['id']));
        }
    }

    public function buscar() {

        if (isset($this->request->data['Materia']['conteudo'])) {
            $this->set('materias', $this->Materia->find('all', array('conditions' =>
                        array(
                            'Materia.conteudo LIKE' => '%' . $this->request->data['Materia']['conteudo'] . '%'
                        )
                            )
                    )
            );
            $this->set('expressao', $this->request->data['Materia']['conteudo']);
        }
    }

    public function excluir($id = NULL) {

        if ($this->Materia->delete($id)) {
            $this->Flash->success(__('Registo excluído'));
        } else {
            $this->Flash->error(__('Registro NÃO foi excluído'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function excluiranexo($id = NULL) {

        if (!$id) {
            throw new NotFoundException(__('Matéria inválida'));
        }

        if (isset($this->request->params['named']['arquivo'])) {
            $arquivo = $this->request->params['named']['arquivo'];
            // pr($arquivo);
        }

        $this->Materia->id = $id;
        $materia = $this->Materia->findById($id);

        if (!empty($materia['Materia']['anexo'])):

            $anexos_materia = explode(',', trim($materia['Materia']['anexo']));
            foreach ($anexos_materia as $c_anexo):
                // pr($c_anexo);
                // die();
                if ((trim($c_anexo)) === $arquivo):
                    echo 'Arquivo equal';
                    @unlink(WWW_ROOT . 'files/' . $c_anexo);
                    unset($c_anexo);
                else:
                    if (empty($novo_anexo)):
                        $novo_anexo = $c_anexo . ",";
                    else:
                        $novo_anexo .= $c_anexo . ",";
                    endif;
                endif;
            endforeach;

            /* Retiro a vírgula */
            if (isset($novo_anexo)):
                $novo_anexo = trim($novo_anexo);
                $size = strlen($novo_anexo);
                $novo_anexo = substr($novo_anexo, 0, $size - 1);
            else:
                $novo_anexo = NULL;
            endif;

            $this->request->data = $materia;
            $this->request->data['Materia']['anexo'] = $novo_anexo;

        endif;

        if ($this->Materia->save($this->request->data)) {
            // $log = $this->Pauta->getDataSource()->getLog(false, false);
            // debug($log);
            // die();
            $this->Flash->success(__('Registro atualizado'));
            return $this->redirect(array('action' => 'ver/' . $this->request->data['Materia']['id']));
        }

        $this->Flash->error(__('Não foi possível atualizar o registro'));
    }

    public function sem_classificar() {

        $materias = $this->Materia->find('all');

// pr($c_materia);
        $i = 0;
        foreach ($materias as $c_materia) {
// pr($c_materia['Materia']['id']);
            $this->loadModel('MateriasTag');
            $materiaid = $this->MateriasTag->findAllByMateriaId($c_materia['Materia']['id']);
            if (empty($materiaid)) {
// echo $c_materia['Materia']['id'] . "Não classificada";
// pr($c_materia['Materia']);
                $materia_nao_classificada[$i] = $c_materia;
                $i++;
// pr($materia_nao_classificada);
            } else {
// echo "Matéria classificada";
            }
        }

        if (isset($materia_nao_classificada)) {
// pr($materia_nao_classificada);
            $this->set('materia_nao_classificada', $materia_nao_classificada);
        }
    }

    public function blog() {

        $mes = NULL;
        $ano = NUll;
        $tag = NULL;

// debug($this->params['named']);
// Capturo os dados de mês e ano passados pela url
        if (isset($this->params['named']['mes'])) {
            $mes = $this->params['named']['mes'];
        }

        if (isset($this->params['named']['ano'])) {
            $ano = $this->params['named']['ano'];
        }

        if (isset($this->params['named']['tag'])) {
            $tag = $this->params['named']['tag'];
        }

// Construo as condicoes para capturar as tags por mês e/ou por ano
        if ($mes and $ano and $tag) {
            $condicao = 'Year(Materia.data) = ' . $ano . ' and Month(Materia.data) = ' . $mes . ' and Tag.id = ' . $tag . ' and Materia.publicar = ' . 1;
            // echo $condicao;
            // die();
// $where = 'WHERE year(data) = ' . $ano . ' AND month(data) = ' . $mes;
        } elseif ($mes and $ano) {
            $condicao = 'Year(Materia.data) = ' . $ano . ' and Month(Materia.data) = ' . $mes . ' and Materia.publicar = ' . 1;
// $where = 'WHERE year(data) = ' . $ano . ' AND month(data) = ' . $mes;
            $condicoes = $this->Materia->find('all', array(
                'conditions' => array('Year(Materia.data)' => $ano, 'Month(Materia.data)' => $mes . ' and Materia.publicar = ' . 1)
                    )
            );
        } elseif ($ano) {
            $condicao = 'Year(Materia.data) = ' . $ano . ' and Materia.publicar = ' . 1;
// $where = 'WHERE year(data) = ' . $ano;
            $condicoes = $this->Materia->find('all', array(
                'conditions' => array('Year(Materia.data)' => $ano . ' and Materia.publicar = ' . 1)
                    )
            );
        }

// Se não foi passado como parámetro, carrego o mês e o ano actual
        if (empty($condicao)) {
            $ano = date("Y");
            $mes = date("m");
            $condicao = 'Year(Materia.data) = ' . $ano . ' and Month(Materia.data) = ' . $mes . ' and Materia.publicar = ' . 1;
// $where = 'WHERE year(data) = ' . $ano . ' AND month(data) = ' . $mes;
        }

// echo $where;
// die();
// echo $condicao;
// Faço as query utilizando as condicoes
// Se a consulta eh sobre as materias sem as tags o resultado eh o array materia
        if (empty($tag)) {
// echo "Tag vazio: " . $tag . "<br>";
            $materias = $this->Materia->find('all', array(
                'conditions' => $condicao, 'order' => array('Materia.data DESC'))
            );
// pr($materias);
// Se a consulta eh sobre as materias com as tags o array eh matriz            
        } elseif (!empty($tag)) {
// echo "Tag com valor: " . $tag . "<br>";
            $this->loadModel('MateriasTag');
            $marcas = $this->MateriasTag->find("all", array('conditions' => 'MateriasTag.tag_id = ' . $tag));
            // pr($marcas);
            // die();
            if (!empty($mes)) {
                $datas = 'Year(Materia.data) = ' . $ano . " AND " .
                        'Month(Materia.data) = ' . $mes . " AND " .
                        'Materia.publicar = 1';
            } else {
                $datas = 'Year(Materia.data) = ' . $ano . " AND " .
                        'Materia.publicar = 1';
            }

// pr($materias);

            foreach ($marcas as $c_marcas) {
// pr($c_tag['MateriasTag']['materia_id']);
                $resultado = $this->Materia->find("all", array(
                    'conditions' => array("Materia.id = " . $c_marcas['MateriasTag']['materia_id'],
                        $datas),
//                    'order' => array('Materia.data DESC')
                        )
                );
                if (!empty($resultado)) {
                    $matriz[] = $resultado;
                }
// pr($matriz);
            }
        }

// Matriz (com tags) ou materias dependendo de se tem tag ou nao
// Eh para fazer o box das matérias por ano e por mês
        if (isset($matriz)) {
// pr($matriz);
            for ($i = 0; $i < count($matriz); $i++):
// pr($matriz[$i][0]);
// $matriz[$i] = $matriz[$i][0];
// pr($matriz[$i]);
                $datas_matriz[$i]['Materia']['data'] = $matriz[$i][0]['Materia']['data'];
// echo "<br>";
            endfor;
            arsort($datas_matriz);
// echo "Matriz" . "<br>";
// pr($datas_matriz);
            array_multisort($datas_matriz, SORT_DESC, $matriz);

            $this->set('matriz', $matriz);
        }

// pr($materias);

        if (isset($materias)) {
            /*
              // pr(count($materias));
              for ($i = 0; $i < count($materias); $i++):
              // echo "i => " . $i;
              $datas_materias[$i] = $materias[$i]['Materia']['data'];
              endfor;
              arsort($datas_materias);
              // echo "Matérias" . "<br>";
              // pr($datas_materias);
              array_multisort($datas_materias, SORT_DESC, $materias);
             */
            $this->set('materias', $materias);
        }

// Para fazer o box das quantidades de matérias por ano e mês
        $datas = $this->Materia->query("SELECT DISTINCT Year(data) as ano, Month(data) as mes, COUNT(Month(data)) as q_mes FROM `materias` where materias.publicar = 1 group BY mes, ano order by mes, ano DESC");
// pr($datas);
        $this->set('datas', $datas);
        $this->set('ano', $ano);
        $this->set('mes', $mes);

// Para fazer o box das tags
        if ($ano and $mes and $tag):
            $where = ' WHERE year(data) = ' . $ano . ' and month(data) = ' . $mes . ' and tags.id = ' . $tag . ' and materias.publicar = ' . 1;
            $grupo = ' GROUP BY year(data), month(data), materias_tags.tag_id, tags.gt_setor, tags.id';
            $ordem = ' ORDER BY year(data), month(data) ASC';
        elseif ($ano and $mes):
            $where = ' WHERE year(data) = ' . $ano . ' and month(data) = ' . $mes . ' and materias.publicar = ' . 1;
            $grupo = ' GROUP BY year(data), month(data), materias_tags.tag_id, tags.gt_setor, tags.id';
            $ordem = ' ORDER BY year(data), month(data) ASC';
        elseif ($ano):
            $where = ' WHERE year(data) = ' . $ano . ' and materias.publicar = ' . 1;
            $grupo = ' GROUP BY year(data), materias_tags.tag_id, tags.gt_setor, tags.id';
            $ordem = NULL;
// $ordem = ' ORDER BY year(data), month(data) ASC';
        endif;
        $tags = $this->Materia->query("SELECT COUNT(materias_tags.tag_id) AS q_tags, tags.gt_setor, tags.id FROM materias 
INNER JOIN materias_tags ON materias_tags.materia_id = materias.id
INNER JOIN tags ON materias_tags.tag_id = tags.id
$where
$grupo
$ordem
");

// $log = $this->Materia->getDataSource()->getLog(false, false);
// debug($log);
// pr($tags);
// die();

        $this->set('tags', $tags);
    }

    public function comentar($id = NULL) {

        if (!$id) {
            throw new NotFoundException(__('Matéria inválida'));
        }

// pr($this->request->data);
        if ($this->request->data) {

            /* Salva observacoes */
            $observacoes = $this->request->data['Observacoe'];
// pr($observacoes);
// die();
            if ($observacoes['observacoes']) {
                $this->loadModel('Observacoe');
                $this->Observacoe->create();
                if ($this->Observacoe->save($observacoes)) {
                    $this->Flash->success(__('Comentário gravado'));
                    return $this->redirect(array('action' => 'ver/' . $observacoes['materia_id']));
                }
                $this->Flash->error(__('Não foi possível gravar o comentário'));
            }
        }

        $this->set('materias', $this->Materia->findById($id));
    }

    public function publicar($id = NULL) {

        // pr($this->request->data);
        // die();
        if (isset($this->params['named']['id'])) {
            $id = $this->params['named']['id'];
            $this->request->data['Materia']['id'] = $id;
        };

        if (isset($this->params['named']['publicar'])) {
            $publicar = $this->params['named']['publicar'];
            if ($publicar == 0):
                $this->request->data['Materia']['publicar'] = 1;
            elseif ($publicar == 1):
                $this->request->data['Materia']['publicar'] = 0;
            endif;
        };

        // pr($this->request->data);
        // die();

        if ($this->request->data['Materia']['publicar'] == 1) {

            // pr($this->request->data);
            // die();

            if ($this->Materia->save($this->request->data)) {
                $this->Flash->success(__('Publicado no Blogue'));
                return $this->redirect(array('action' => 'index/' . $this->request->data['Materia']['id']));
            }
            $this->Flash->error(__('Não foi possível realizar a operação'));
        } elseif (($this->request->data['Materia']['publicar'] == 0)) {
            if ($this->Materia->save($this->request->data)) {
                $this->Flash->success(__('Retirado do Blogue'));
                return $this->redirect(array('action' => 'index/' . $this->request->data['Materia']['id']));
            }
            $this->Flash->error(__('Não foi possível realizar a operação'));
        } else {
            return $this->redirect(array('action' => 'index/'));
        }
    }

    public function deletefile() {

        $files = scandir(WWW_ROOT . 'files/');

        $anexos = $this->Materia->find('all', array(
            'conditions' => array('not' => array('Materia.anexo' => "")),
            'fields' => array('anexo')));
        // pr($anexos);

        /* Lista dos arquivos a serem excluidos por não estaram no banco de dados */
        foreach ($anexos as $c_anexo):
            $c_anexo_cada = explode(',', $c_anexo['Materia']['anexo']);
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
                    return $this->redirect("ver/" . $c_anexo['Materia']['id']);
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
            if ($c_apagar_materia[0] === 'materia'):
                // echo "Excluir: -> " . $c_apagar . "<br>";
                @unlink(WWW_ROOT . 'files/' . $c_apagar);
                $this->Flash->success(__('Arquivo excluido da pasta files'));
            endif;
        endforeach;
    }

}

?>