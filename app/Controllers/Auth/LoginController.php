<?php

namespace App\Controllers\Auth;
use App\Controllers\BaseController;
use App\Models\UsuarioModel;
use CodeIgniter\HTTP\RedirectResponse;

class LoginController extends BaseController
{
    public function index()
    {
        helper(['form']);

        if (session()->get('logged_in')) {
            return redirect()->to(base_url('/inicio'));
        }
        return view('Layout/Admin/header').view('Auth/signing').view('Layout/Admin/footer');
    }

    public function login(): RedirectResponse
    {
        $session = session();
        $usuarioModel = new UsuarioModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $data = $usuarioModel->where('us_correo', $email)->first();

        if($data){
            if(password_verify($password, $data['us_contrasena'])){
                $ses_data = [
                    'us_nombre'     => $data['us_nombre'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to(base_url('/inicio'));
            }else{
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to(base_url('/'));
            }
        }else{
            $session->setFlashdata('msg', 'Email not Found');
            return redirect()->to(base_url('/'));
        }
    }

    public function logout():RedirectResponse
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/'));
    }
}

