<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/Base_Controller.php';

class Usuario extends Base_Controller
{
    public function __construct()
    {
        parent::__construct();
        $entityManager = $this->doctrine->em;
        $this->load->model('usuario_model');
    }

    public function index()
    {
        $accessOption = $this->getSessType();
        switch ($accessOption) {
            Case '0':
                $this->adminHome();
                break;
            Case '1':
                $this->userHome();
                break;
            Case '2':
                $this->noneUserAccess();
                break;
            default:
                $this->noneUserAccess();
                break;
        }
    }

    /**************************************** Login operations  *******************************************/
    public function loginScreen()
    {
        $this->load->view('usuario/userLogin');
    }

    public function noneUserAccess()
    {
        $this->load->view('usuario/noneUserHome');
    }

    public function userHome()
    {
        $this->load->view('usuario/homeUser');
    }

    public function adminHome()
    {
        $this->load->view('usuario/homeAdmin');
    }

    public function doLogin()
    {
        $userInformation = $this->validaLoginForm();
        $this->buildSession($userInformation);
        $this->index();
    }

    public function doLogout()
    {
        $this->session->sess_destroy();
        redirect('usuario/index');
    }

    public function getSessType()
    {
        switch ($this->session->userdata('loginType')) {
            case '1':
                return 1;
                break;
            case '0':
                return 0;
                break;
            case NULL;
                return 2;
                break;
            default;
                return 2;
                break;
        }
    }

    public function validaLoginForm()
    {
        $this->form_validation->set_rules('senha', 'senha', 'required|max_length[30]|min_length[4]');
        $this->form_validation->set_rules('login', 'login', 'required|max_length[30]|min_length[4]');
        $arr = $this->input->post();
        if ($this->form_validation->run()) {
            $usuario = $this->usuario_model->buscarEntidadePorPropriedade(\Entity\Perfil::getCaminho(), 'login', $arr['login'], false);
            if (!empty($usuario) && $usuario[0]->getSenha() == md5($arr['senha'])) {
                return $usuario[0];
            }
        } else {
            redirect('usuario/loginScreen');
        }
        redirect('usuario/loginScreen');

    }

    public function buildSession($usuario)
    {
        $this->session->set_userdata('loginType', $usuario->getTipo());
        $this->session->set_userdata('loginId', $usuario->getId());
        $this->session->set_userdata('userName', $usuario->getNome());
        $this->session->set_userdata('userRg', $usuario->getRg());
        $this->session->set_userdata('userFone', $usuario->getTelefone());
        $this->session->set_userdata('userEmail', $usuario->getEmail());
    }


    /********************************************** crud operations ***********************************************/


    /******************* cadastro operations ****************************/
    public function cadastro()
    {
        $this->load->view('usuario/userCadastre');
    }

    public function cadastroAction()
    {
        $arr = $this->validaCadastroForm();
        $usuario = new Entity \ Perfil();
        $usuario->arrayToObjeto($arr);
        $this->usuario_model->salvar($usuario);
        //TODO colocar o flush no header
        redirect('usuario/index');
    }

    public function validaCadastroForm()
    {
        $this->form_validation->set_rules('nome', 'nome', 'required|alpha|max_length[30]|min_length[4]');
        $this->form_validation->set_rules('login', 'login', 'required|max_length[30]|min_length[4]');
        $this->form_validation->set_rules('senha', 'senha', 'required|max_length[30]|min_length[4]');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email|max_length[60]|min_length[3]');
        $this->form_validation->set_rules('rg', 'rg', 'required|alpha_dash|max_length[20]|min_length[4]');
        $this->form_validation->set_rules('telefone', 'telefone', 'numeric|max_length[18]');

        if ($this->form_validation->run()) {
            $arr = $this->input->post();
            $login = $this->usuario_model->buscarEntidadePorPropriedade(\Entity\Perfil::getCaminho(), 'login', $arr['login'], false);
            $email = $this->usuario_model->buscarEntidadePorPropriedade(\Entity\Perfil::getCaminho(), 'email', $arr['email'], false);
            $rg = $this->usuario_model->buscarEntidadePorPropriedade(\Entity\Perfil::getCaminho(), 'rg', $arr['rg'], false);
            //die(var_dump($login,$email,$rg));
            if (!empty($login) || !empty($email) || !empty($rg)) {
                goto L1;
            }
            $arr['tipo'] = 1;
            $arr['senha'] = md5($arr['senha']);

            return $arr;
        } else {
            L1:;
            //TODO colocar o flush no header
            redirect('usuario/cadastro');
        }
    }

    /******************************* update operations  ****************************/
    public function atualizaCadastro($id = -1)
    {
        if ($id == -1) {
            $id = $this->session->userdata('loginId');
        }
        $dados['user'] = $this->usuario_model->buscarPorId(\Entity\Perfil::getCaminho(), $id);
        $this->load->view('usuario/userUpdate', $dados);
    }

    public function updateAction()
    {
        $arr = $this->validaUpdateForma();
        $usuario = new \Entity\Perfil();
        $usuario->setId($arr['id']);
        $usuario->arrayToObjeto($arr);
        $this->usuario_model->alterar($usuario);
        switch ($this->session->userdata('loginType')) {
            case '0':
                $this->listaUsuarios();
            case'1':
                $this->index();
        }
    }

    public function validaUpdateForma()
    {
        $this->form_validation->set_rules('nome', 'nome', 'required|alpha|max_length[30]|min_length[4]');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email|max_length[60]|min_length[3]');
        $this->form_validation->set_rules('rg', 'rg', 'required|alpha_dash|max_length[20]|min_length[4]');
        $this->form_validation->set_rules('telefone', 'telefone', 'numeric|max_length[18]');
        $arr = $this->input->post();
        if ($this->form_validation->run()) {
            $email = $this->usuario_model->buscarEntidadePorPropriedade(\Entity\Perfil::getCaminho(), 'email', $arr['email'], false);
            $rg = $this->usuario_model->buscarEntidadePorPropriedade(\Entity\Perfil::getCaminho(), 'rg', $arr['rg'], false);
            $objeto = $this->usuario_model->buscarPorId(\Entity\Perfil::getCaminho(), $arr['id']);
            if (!empty($rg)) {
                if ($rg[0]->getRg() != $objeto->getRg()) {
                    goto L2;
                }
            }
            if (!empty($email)) {
                if ($email[0]->getEmail() != $objeto->getEmail()) {
                    goto L2;
                }
            }
            return $arr;
        } else {
            L2:;
            redirect('usuario/atualizacadastro/' . $arr['id']);
        }
        return NULL;
    }
    /*************************************************************/
    public function listaUsuarios(){
        die;
    }
}