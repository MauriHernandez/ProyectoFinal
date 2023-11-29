<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel; 

class UserController extends BaseController
{

    //INICIO DE SESIÓN
    public function index()
    {
       
        $data['title']="Inicio de Sesión"; 
        $validation =  \Config\Services::validation();
            if (strtolower($this->request->getMethod()) === 'get'){
                return 
                view('common/head') .
                view('usuarios/login') .
                view('common/footer');
            }

            $rules = [
                'text' => 'required',
                'password'=>'required'
            ];

            if (! $this->validate($rules)) {
                return 
                view('common/head') .
                view('usuarios/login') .
                view('common/footer');
            }
            else{
                $email = $_POST['text'];
                $password = $_POST['password'];
                $userModel = model('UserModel');
                $data['usuario']= $userModel->like('email',$email)
                                ->Like('contraseña',$password)
                                ->findAll();

if (count($data['usuario']) > 0) {
    $session = session(); 

    $userProfile = $data['usuario'][0]->perfil; 

    $newdata = [
        'id' => $data['usuario'][0]->id,
        'email' => $data['usuario'][0]->email,
        'logged_in' => true,
        'perfil' => $userProfile, 
    ];

    $session->set($newdata);

    if ($userProfile == '2') {
        return redirect('doctor/mostrarR', 'refresh');
    } elseif ($userProfile == '1') {
        return redirect('admin/inicio', 'refresh');
    } elseif ($userProfile == 'Enfermera') {
        return redirect('enfermera/dashboard', 'refresh');
    } elseif ($userProfile == 'Paciente') {
        return redirect('paciente/dashboard', 'refresh');
    }
} else {
    return redirect('usuarios/login', 'refresh');
}

        }


    }

}