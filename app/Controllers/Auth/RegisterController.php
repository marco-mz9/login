<?php
namespace App\Controllers\Auth;
use App\Models\UsuarioModel;
use CodeIgniter\Controller;

class RegisterController extends Controller
{
    public function index(): void
    {
        helper(['form']);
        $data = [];
        echo view('Layout/Admin/header').view('Auth/signup', $data).view('Layout/Admin/footer');
    }

    public function store()
    {
        helper(['form']);
        $rules = [
            'name'          => 'required|min_length[2]|max_length[50]',
            'email'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[tbl_usuarios.us_correo]',
            'password'      => 'required|min_length[4]|max_length[50]',
            'confirmpassword'  => 'matches[password]'
        ];

        if($this->validate($rules)){
            $userModel = new UsuarioModel();
            $data = [
                'us_nombre'     => $this->request->getVar('name'),
                'us_correo'    => $this->request->getVar('email'),
                'us_contrasena' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $userModel->save($data);
            return redirect()->to('/');
        }else{
            $data['validation'] = $this->validator;
            return view('signup', $data);
        }
    }

}