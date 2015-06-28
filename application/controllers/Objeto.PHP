<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/Base_Controller.php';

class Objeto extends Base_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('objeto_model');
        $img_config['upload_path'] = './public/objectPictures';
        $img_config['allowed_types'] = 'jpg|png';
        $img_config['max_size'] = '5000';
        $this->load->library('upload', $img_config);
        $this->upload->initialize($img_config);
    }

    /***************************   listagem          *****************************/
    public function listagemObjetos()
    {
        $dados['objetos'] = $this->objeto_model->buscarEntidadePorPropriedade(\Entity\Obj::getCaminho(), 'status', 0, false);
        //$secondResult = $this->objeto_model->buscarEntidadePorPropriedade(\Entity\Obj::getCaminho(), 'status', 1, false);
        //$dados['objetos'] = array_merge($firstResult, $secondResult);
        $this->load->view('objeto/showObjects', $dados);
    }

    public function meusObjetos()
    {
        $id = $this->session->userdata('loginId');
        $dados['cadastrados'] = $this->objeto_model->buscarEntidadePorPropriedade(\Entity\Obj::getCaminho(), 'perfil', $id, false);
        $dados['requisitados'] = $this->objeto_model->buscarObjetosRequisitados();
        $this->load->view('objeto/userMyObjects', $dados);
    }

    /*********************  cadastro    ************************************/
    public function cadastro()
    {
        $this->load->view('objeto/objectCadastre');
    }

    public function cadastroAction()
    {
        $arr = $this->validacaoFomulario();
        if ($arr != NULL) {
            $objeto = new Entity \ Obj();
            $objeto->arrayToObjeto($arr);
            $this->objeto_model->salvar($objeto);

            $this->session->set_userdata('mensagem', '=)');
            $this->session->set_userdata('mensagemTipo', 'success');
            $this->session->set_userdata('subtitulo', 'Objeto cadastrado com sucesso!');
            redirect('objeto/listagemObjetos');
        } else {
            $this->session->set_userdata('mensagem', '=(');
            $this->session->set_userdata('mensagemTipo', 'error');
            $this->session->set_userdata('subtitulo', 'Objeto Não foi cadastrado!');
            redirect('objeto/cadastro');
        }
    }

    public function validacaoFomulario()
    {
        $this->form_validation->set_rules('identificacao', 'identificacao', 'required|max_length[40]');
        $this->form_validation->set_rules('descricao', 'descricao', 'required|max_length[200]');
        $arr = $this->input->post();
        if ($this->form_validation->run()) {
            if (($picturePath = $this->processaFoto(1)) != NULL) {
                $arr['foto'] = $picturePath;
                $arr['status'] = 0;
                $arr['data'] = date("Y-m-d");
                $id = $this->session->userdata('loginId');
                $arr['idperfil'] = $this->objeto_model->buscarPorId(\Entity\Perfil::getCaminho(), $id);
                //die(var_dump($arr));
                return $arr;
            }
        }
        return NULL;
    }

    public function processaFoto($opt, $who = -1)
    {
        // se opt = 1, esta cadastrando o objeto se opt = 2 esta atualizando o objeto
        $arr = $this->input->post();
        if (isset($_FILES['foto'])) {
            $extensao = strrchr($_FILES['foto']['name'], '.');
            $_FILES['foto']['name'] = md5(microtime()) . $extensao;
            $ok = $this->upload->do_upload('foto');
            $picture = $this->upload->data();
            if ($ok) {
                $config_image['image_library'] = 'gd2';
                $config_image['source_image'] = './public/objectPictures/' . $picture['file_name'];
                $config_image['create_thumb'] = FALSE;
                $config_image['maintain_ratio'] = FALSE;
                $config_image['width'] = 500;
                $config_image['height'] = 500;
                $this->load->library('image_lib', $config_image);
                $this->image_lib->resize(); // redimensiona a foto com a configuracoes setadas acima
                $dados['foto'] = 'public/objectPictures/' . $picture['file_name'];
                if ($opt == 2) {
                    unlink('./' . $arr['old_foto']);
                }
                return $dados['foto'];
            } else {
                if ($opt == 1) {
                    return NULL;
                } else if ($opt == 2) {
                    return $arr['old_foto'];
                }
            }
        } else return NULL;
    }

    /****************************************** requisicao  ************************
     * @param $objetoId
     */
    public function requisitarObjeto($objetoId)
    {
        $userId = $this->session->userdata('loginId');
        $objeto = $this->objeto_model->buscarPorId(\Entity\Obj::getCaminho(), $objetoId);
        $user = $this->objeto_model->buscarPorId(\Entity\Perfil::getCaminho(), $userId);
        $requisicao = new \Entity \ Requisicao();
        $objeto->setStatus(1);
        $requisicao->setIdObjeto($objeto);
        $requisicao->setIdPerfil($user);
        $requisicao->setStatus(0);
        if ($this->objeto_model->verificaRequisicao(\Entity\Requisicao::getCaminho(), $objetoId, $userId)) {
            $this->session->set_userdata('mensagem', '=(');
            $this->session->set_userdata('mensagemTipo', 'error');
            $this->session->set_userdata('subtitulo', 'Não foi feita a requisição!');
            redirect('objeto/listagemObjetos');
        } else {
            $this->objeto_model->salvar($requisicao);
            $this->session->set_userdata('mensagem', '=)');
            $this->session->set_userdata('mensagemTipo', 'success');
            $this->session->set_userdata('subtitulo', 'Requisição realizada com sucesso!');
            redirect('objeto/listagemObjetos');
        }
    }

    /******************************* atualizacao *************************************
     * @param $objetoId
     */
    public function atualizacaoObjeto($objetoId)
    {
        $dados['objeto'] = $this->objeto_model->buscarporId(\Entity\Obj::getCaminho(), $objetoId);
        $this->load->view('objeto/objectUpdate', $dados);
    }

    public function atualizacaoObjetoAction()
    {
        $arr = $this->input->post();
        if (($info = $this->validaUsuarioUpdateObject()) != NULL) {
            $anObj = new \Entity\Obj();
            $anObj->arrayToObjeto($info);
            $anObj->setId($info['id']);
            $this->objeto_model->alterar($anObj);
            $this->session->set_userdata('mensagem', '=)');
            $this->session->set_userdata('mensagemTipo', 'success');
            $this->session->set_userdata('subtitulo', 'Objeto atualizado com sucesso!');
            redirect('objeto/meusObjetos');
        } else {
            $this->session->set_userdata('mensagem', '=(');
            $this->session->set_userdata('mensagemTipo', 'error');
            $this->session->set_userdata('subtitulo', 'Falha na Atualização!');
            redirect('objeto/atualizacaoObjeto/' . $arr['id']);
        }
    }

    public function validaUsuarioUpdateObject()
    {
        $this->form_validation->set_rules('identificacao', 'identificacao', 'required|max_length[40]');
        $this->form_validation->set_rules('descricao', 'descricao', 'required|max_length[200]');
        $arr = $this->input->post();
        if ($this->form_validation->run()) {
            if (($picturePath = $this->processaFoto(2)) != NULL) {
                $arr['foto'] = $picturePath;
                $arr['status'] = 0;
                $arr['data'] = date("Y-m-d");
                $id = $this->session->userdata('loginId');
                $arr['idperfil'] = $this->objeto_model->buscarPorId(\Entity\Perfil::getCaminho(), $id);
                //die(var_dump($arr));
                return $arr;
            }
        }
        return NULL;
    }

    /************************************** admin operations *************/
    public function adminShowObjetcts()
    {
        $dados['perdidos'] = $this->objeto_model->buscarEntidadePorPropriedade(\Entity\Obj::getCaminho(), 'status', 0, false);
        $dados['requisitados'] = $this->objeto_model->buscarEntidadePorPropriedade(\Entity\Obj::getCaminho(), 'status', 1, false);
        $dados['devolvidos'] = $this->objeto_model->buscarEntidadePorPropriedade(\Entity\Obj::getCaminho(), 'status', 2, false);
        //die(var_dump($dados));
        $this->load->view('objeto/adminShowObject', $dados);
    }

    public function adminEditObject($id)
    {
        $dados['objeto'] = $this->objeto_model->buscarPorId(\Entity\Obj::getCaminho(), $id);
        //die(var_dump($dados));
        $this->load->view('objeto/adminObjectUpdate', $dados);
    }

    public function adminReturnObject($id)
    {
        $dados['objeto'] = $this->objeto_model->buscarporId(\Entity\Obj::getCaminho(), $id);
        $arr = $this->objeto_model->buscarEntidadePorPropriedade(\Entity\Requisicao::getCaminho(), 'idObjeto', $id);
        //die(var_dump($dados));
        $dados['requisicao'] = $arr[0];
        $this->load->view('objeto/adminReturnObject', $dados);
    }

    public function adminNewObject()
    {
        $this->load->view('objeto/adminObjectCadastre');
    }

    public function adminCreateNewObject()
    {
        $arr = $this->adminValidacaoFomulario();
        if ($arr != NULL) {
            $objeto = new Entity \ Obj();
            $objeto->arrayToObjeto($arr);
            $this->objeto_model->salvar($objeto);
            $this->session->set_userdata('mensagem', '=)');
            $this->session->set_userdata('mensagemTipo', 'success');
            $this->session->set_userdata('subtitulo', 'Objeto Cadastrado com sucesso!');
            redirect('objeto/adminShowObjetcts');
        } else {
            $this->session->set_userdata('mensagem', '=(');
            $this->session->set_userdata('mensagemTipo', 'error');
            $this->session->set_userdata('subtitulo', 'Objeto Não foi cadastrado!');
            redirect('objeto/adminNewObject');
        }
        //die(var_dump($this->input->post()));
    }

    public function adminValidacaoFomulario()
    {
        $this->form_validation->set_rules('identificacao', 'identificacao', 'required|max_length[40]');
        $this->form_validation->set_rules('descricao', 'descricao', 'required|max_length[200]');
        $arr = $this->input->post();
        if ($this->form_validation->run()) {
            if (($picturePath = $this->processaFoto(1)) != NULL) {
                $arr['foto'] = $picturePath;
                $arr['status'] = 0;
                $arr['data'] = date("Y-m-d");
                $id = $this->session->userdata('loginId');
                $arr['idperfil'] = $this->objeto_model->buscarPorId(\Entity\Perfil::getCaminho(), $id);
                //die(var_dump($arr));
                return $arr;
            }
        }
        return NULL;
    }

    public function adminUpdateObjectAction()
    {
        if (($info = $this->validaAdminUpdateObject()) != NULL) {
            $anObj = new \Entity\Obj();
            $anObj->arrayToObjeto($info);
            $anObj->setId($info['id']);
            $this->objeto_model->alterar($anObj);
            $this->session->set_userdata('mensagem', '=)');
            $this->session->set_userdata('mensagemTipo', 'success');
            $this->session->set_userdata('subtitulo', 'Objeto atualizado com sucesso!');
            redirect('objeto/adminShowObjetcts');
        } else {
            $this->session->set_userdata('mensagem', '=(');
            $this->session->set_userdata('mensagemTipo', 'error');
            $this->session->set_userdata('subtitulo', 'Objeto Não foi atualizado!');
            redirect('objeto/adminEditObject/' . $info['id']);
        }
    }

    public function adminDevolucao($idReq = -1)
    {
        $req = $this->objeto_model->buscarPorId(\Entity\Requisicao::getCaminho(), $idReq);
        $req->setStatus(1);
        $req->getIdObjeto()->setStatus(2);
        $this->objeto_model->alterar($req);
        $this->session->set_userdata('mensagem', '=)');
        $this->session->set_userdata('mensagemTipo', 'success');
        $this->session->set_userdata('subtitulo', 'Objeto Devolvido!');
        redirect('objeto/adminShowObjetcts');
    }

    public function validaAdminUpdateObject()
    {
        $this->form_validation->set_rules('identificacao', 'identificacao', 'required|max_length[40]');
        $this->form_validation->set_rules('descricao', 'descricao', 'required|max_length[200]');
        $arr = $this->input->post();
        if ($this->form_validation->run()) {
            if (($picturePath = $this->processaFoto(2)) != NULL) {
                $arr['foto'] = $picturePath;
                $arr['status'] = 0;
                $arr['data'] = date("Y-m-d");
                $id = $arr['idperfil'];
                $arr['idperfil'] = $this->objeto_model->buscarPorId(\Entity\Perfil::getCaminho(), $id);
                //die(var_dump($arr));
                return $arr;
            }
        }
        return NULL;
    }
}

