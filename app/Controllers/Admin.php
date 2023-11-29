<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function index()
    {
        //
    }

//PANTALLA DE INICIO 
    public function inicio(){
        helper('session'); 

        $session = session();
        if (!$session->get('logged_in') || $session->get('perfil') !== '1') {
           
            return redirect()->to('usuarios/login');
        }
        return 
        view('common/head') .
        view('admin/menuA') .
        view('admin/inicio') .
        view('common/footer');
    }
//VISUALIZACIÓN DE DATOS DE PACIENTE
    public function mostrarP(){
    
        helper('session'); 

        $session = session();
        if (!$session->get('logged_in') || $session->get('perfil') !== '1') {
           
            return redirect()->to('usuarios/login');
        }
        $pacienteModel = model('PacienteModel');
        $data['pacients'] = $pacienteModel->findAll();

        return 
        view('common/head') .
        view('admin/menuA') .
        view('admin/mostrarP',$data) .
        view('common/footer');

    }

    //VISUALIZACIÓN EN TABLA DE DOCTORES
    public function mostrarD(){
        helper('session'); 

        $session = session();
        if (!$session->get('logged_in') || $session->get('perfil') !== '1') {
           
            return redirect()->to('usuarios/login');
        }
        $doctorModel = model('DoctorModel');
        $data['doctors'] = $doctorModel->findAll();

        return 
        view('common/head') .
        view('admin/menuA') .
        view('admin/mostrarD',$data) .
        view('common/footer');

    }

    //VISUALIZACIÓN EN TABLA DE ENFERMERAS
    public function mostrarE(){
        helper('session'); 

        $session = session();
        if (!$session->get('logged_in') || $session->get('perfil') !== '1') {
           
            return redirect()->to('usuarios/login');
        }
        $enfermeraModel = model('EnfermeraModel');
        $data['nurses'] = $enfermeraModel->findAll();

        return 
        view('common/head') .
        view('admin/menuA') .
        view('admin/mostrarE',$data) .
        view('common/footer');

    }

//VISUALIZACIÓN DE DATOS DE APOYOS
    public function mostrarA(){
        helper('session'); 

        $session = session();
        if (!$session->get('logged_in') || $session->get('perfil') !== '1') {
           
            return redirect()->to('usuarios/login');
        }
        $apoyoModel = model('ApoyoModel');
        $data['helps'] = $apoyoModel->findAll();

        return 
        view('common/head') .
        view('admin/menuA') .
        view('admin/mostrarA',$data) .
        view('common/footer');

    }
    
//EDITAR INFORMACIÓN DE DOCTOR

public function editarD($id){
    helper('session'); 

    $session = session();
    if (!$session->get('logged_in') || $session->get('perfil') !== '1') {
       
        return redirect()->to('usuarios/login');
    }
    $doctorModel = model('DoctorModel');
    $data['doctor'] = $doctorModel->find($id);
    return 
    view('common/head').
    view('admin/menuA').
    view('admin/editarD', $data).
    view('common/footer');

}
//ACTUALIZAR DATOS DE DOCTOR
public function updateD(){
    helper('session'); 

    $session = session();
    if (!$session->get('logged_in') || $session->get('perfil') !== '1') {
       
        return redirect()->to('usuarios/login');
    }
    $doctorModel = model('DoctorModel');
    $data = array(
        "nombre"      => $_POST['name'],    
        "apellidoP" => $_POST['lastnameP'],
        "apellidoM" => $_POST['lastnameM'],
        "fechaNacimiento"  => $_POST['birthday'],
        "curp"      => $_POST['curp'],
        "celular"     => $_POST['phone'],
        "calle"    => $_POST['street'],
        "numeroExterior"   => $_POST['numberE'],
        "numeroInterior"   => $_POST['numberI'],
        "codigoPostal"    => $_POST['codPos'],
        "localidad" => $_POST['community'],
        "municipio"  => $_POST['locality'],
        "estado"     => $_POST['state'],
        "carrera"    => $_POST['career'],
        "especialidad" => $_POST['specialty'],
        "cedulaProfesional"   => $_POST['license'],
        "departamento"=> $_POST['department']       
    );
    $doctorModel ->update( $_POST['id'],$data);
    return redirect('admin/mostrarD','refresh');
} 


//EDITAR INFORMACIÓN DE ENFERMERA
public function editarE($id){
    helper('session'); 

    $session = session();
    if (!$session->get('logged_in') || $session->get('perfil') !== '1') {
       
        return redirect()->to('usuarios/login');
    }
    $enfermeraModel = model('EnfermeraModel');
    $data['nurse'] = $enfermeraModel->find($id);
    return 
    view('common/head').
    view('admin/menuA').
    view('admin/editarE', $data).
    view('common/footer');

}
//ACTUALIZAR DATOS DE ENFERMERA
public function updateE(){
    helper('session'); 

    $session = session();
    if (!$session->get('logged_in') || $session->get('perfil') !== '1') {
       
        return redirect()->to('usuarios/login');
    }
    $enfermeraModel = model('EnfermeraModel');
    $data = array(
        "nombre"      => $_POST['name'],    
        "apellidoP" => $_POST['lastnameP'],
        "apellidoM" => $_POST['lastnameM'],
        "fechaNacimiento"  => $_POST['birthday'],
        "curp"      => $_POST['curp'],
        "celular"     => $_POST['phone'],
        "calle"    => $_POST['street'],
        "numeroExterior"   => $_POST['numberE'],
        "numeroInterior"   => $_POST['numberI'],
        "codigoPostal"    => $_POST['codPos'],
        "localidad" => $_POST['community'],
        "municipio"  => $_POST['locality'],
        "estado"     => $_POST['state'],
        "carrera"    => $_POST['career'],
        "especialidad" => $_POST['specialty'],
        "cedulaProfesional"   => $_POST['license'],
        "departamento"=> $_POST['department']     
    );
    $enfermeraModel ->update( $_POST['id'],$data);
    return redirect('admin/mostrarE','refresh');
} 

//EDITAR INFORMACIÓN DE PACIENTE
public function editarP($id){
    helper('session'); 

    $session = session();
    if (!$session->get('logged_in') || $session->get('perfil') !== '1') {
       
        return redirect()->to('usuarios/login');
    }
    $pacienteModel = model('PacienteModel');
    $data['pacient'] = $pacienteModel->find($id);
    return 
    view('common/head').
    view('admin/menuA').
    view('admin/editarP', $data).
    view('common/footer');

}
//ACTUALIZAR DATOS DE PACIENTE
public function updateP(){
    helper('session'); 

    $session = session();
    if (!$session->get('logged_in') || $session->get('perfil') !== '1') {
       
        return redirect()->to('usuarios/login');
    }
    $pacienteModel = model('PacienteModel');
    $data = array(
        "nombre"      =>$this->request->getPost('name'),
        "apellidoP"=>$this->request->getPost('lastnameP'),
        "apellidoM"=>$this->request->getPost('lastnameM'),
        "fechaNacimiento"=>$this->request->getPost('birthday'),
        "genero"=>$this->request->getPost('gender'),
        "curp"=>$this->request->getPost('curp'),
        "celular"=>$this->request->getPost('phone'),
        "ocupacion"=>$this->request->getPost('occupation'),
        "calle"=>$this->request->getPost('street'),
        "numeroExterior"=>$this->request->getPost('numberE'),
        "numeroInterior"=>$this->request->getPost('numberI'),
        "codigoPostal"=>$this->request->getPost('codPos'),
        "localidad"=>$this->request->getPost('community'),
        "municipio"=>$this->request->getPost('locality'),
        "estado"=>$this->request->getPost('state'),
        "numeroAsociacion"=>$this->request->getPost('numberA'),
        "nivelAsociacion"=>$this->request->getPost('levelA'),
        "numeroTarjeta"=>$this->request->getPost('numberT')   
    );
    $pacienteModel ->update( $_POST['id'],$data);
    return redirect('admin/mostrarP','refresh');
} 
//EDITAR APOYOS
public function editarA($id){
    helper('session'); 

    $session = session();
    if (!$session->get('logged_in') || $session->get('perfil') !== '1') {
       
        return redirect()->to('usuarios/login');
    }
    $apoyoModel = model('ApoyoModel');
    $data['help'] = $apoyoModel->find($id);
    return 
    view('common/head').
    view('admin/menuA').
    view('admin/editarA', $data).
    view('common/footer');

}

//ACTUALIZAR DATOS DE APOYOS
public function updateA(){
    helper('session'); 

    $session = session();
    if (!$session->get('logged_in') || $session->get('perfil') !== '1') {
       
        return redirect()->to('usuarios/login');
    }
    $apoyoModel = model('ApoyoModel');
    $data = array(
        "nombre"      => $_POST['nombre'],    
        "fechaLimite" => $_POST['fechaLimite'],
        "descripcion" => $_POST['descripcion']     
    );
    $apoyoModel ->update( $_POST['id'],$data);
    return redirect('admin/mostrarA','refresh');
} 

//AGREGAR PACIENTE 
    public function agregarP(){
        helper('session'); 

        $session = session();
        if (!$session->get('logged_in') || $session->get('perfil') !== '1') {
           
            return redirect()->to('usuarios/login');
        }
        helper(['form','url']);
        $pacienteModel = model('PacienteModel');
        $data['pacient'] = $pacienteModel->findAll();

                $data['title']="Agregar Paciente";
            
                $validation = \Config\Services::validation();
            
                if(strtolower($this->request->getMethod()) ==='get'){
                    return view('common/head').
                    view('admin/menuA').
                    view('admin/agregarP',$data).
                    view('common/footer');
                } 
            
                $rules = [
                    "name"=>'required',
                    "lastnameP"=>'required',
                    "lastnameM"=>'required',
                    "birthday"=>'required',
                    "gender"=>'required',
                    "curp"=>'required',
                    "phone"=>'required',
                    "occupation"=>'required',
                    "street"=>'required',
                    "numberE"=>'required',
                    "numberI"=>'required',
                    "codPos"=>'required',
                    "community"=>'required',
                    "locality"=>'required',
                    "state"=>'required',
                    "numberA"=>'required',
                    "levelA"=>'required',
                    "numberT"=>'required'
                ];

                if(! $this->validate($rules)){
                    return view('common/head').
                    view ('admin/menuA').
                    view('admin/agregarP',$data, ['validation'=>$validation]).
                    view('common/footer');
                }
                else{
                            if($this->insertP()){
                                return redirect('admin/mostrarP','refresh');
                            }
                        }
}

//INSERCIÓN DE DATOS DE PACIENTE
public function insertP(){
    helper('session'); 

    $session = session();
    if (!$session->get('logged_in') || $session->get('perfil') !== '1') {
       
        return redirect()->to('usuarios/login');
    }
    $pacienteModel = model('PacienteModel');
    $data = [ 
         
        "nombre"      =>$this->request->getPost('name'),
        "apellidoP"=>$this->request->getPost('lastnameP'),
        "apellidoM"=>$this->request->getPost('lastnameM'),
        "fechaNacimiento"=>$this->request->getPost('birthday'),
        "genero"=>$this->request->getPost('gender'),
        "curp"=>$this->request->getPost('curp'),
        "celular"=>$this->request->getPost('phone'),
        "ocupacion"=>$this->request->getPost('occupation'),
        "calle"=>$this->request->getPost('street'),
        "numeroExterior"=>$this->request->getPost('numberE'),
        "numeroInterior"=>$this->request->getPost('numberI'),
        "codigoPostal"=>$this->request->getPost('codPos'),
        "localidad"=>$this->request->getPost('community'),
        "municipio"=>$this->request->getPost('locality'),
        "estado"=>$this->request->getPost('state'),
        "numeroAsociacion"=>$this->request->getPost('numberA'),
        "nivelAsociacion"=>$this->request->getPost('levelA'),
        "numeroTarjeta"=>$this->request->getPost('numberT')
  
    ];
    $pacienteModel->insert($data, false);
    return true;
}

//AGREGAR DOCTOR

public function agregarD(){
    helper('session'); 

    $session = session();
    if (!$session->get('logged_in') || $session->get('perfil') !== '1') {
       
        return redirect()->to('usuarios/login');
    }
    helper(['form','url']);
    $doctorModel = model('DoctorModel');
    $data['doctor'] = $doctorModel->findAll();

            $data['title']="Agregar Doctor";
        
            $validation = \Config\Services::validation();
        
            if(strtolower($this->request->getMethod()) ==='get'){
                return view('common/head').
                view('admin/menuA').
                view('admin/agregarD',$data).
                view('common/footer');
            } 
        
            $rules = [
                "name"=>'required',
                "lastnameP"=>'required',
                "lastnameM"=>'required',
                "birthday"=>'required',
                "gender"=>'required',
                "curp"=>'required',
                "phone"=>'required',
                "street"=>'required',
                "numberE"=>'required',
                "numberI"=>'required',
                "codPos"=>'required',
                "community"=>'required',
                "locality"=>'required',
                "state"=>'required',
                "career"=>'required',
                "specialty"=>'required',
                "license"=>'required',
                "department"=>'required'
            ];

            if(! $this->validate($rules)){
                return view('common/head').
                view ('admin/menuA').
                view('admin/agregarD',$data, ['validation'=>$validation]).
                view('common/footer');
            }
            else{
                        if($this->insertD()){
                            return redirect('admin/mostrarD','refresh');
                        }
                    }
}


//INSERCIÓN DE DATOS DE DOCTOR
public function insertD(){
    helper('session'); 

    $session = session();
    if (!$session->get('logged_in') || $session->get('perfil') !== '1') {
       
        return redirect()->to('usuarios/login');
    }
$doctorModel = model('DoctorModel');
$data = [ 
    "nombre"           =>$this->request->getPost('name'),
    "apellidoP"        =>$this->request->getPost('lastnameP'),
    "apellidoM"        =>$this->request->getPost('lastnameM'),
    "fechaNacimiento"  =>$this->request->getPost('birthday'),
    "genero"           =>$this->request->getPost('gender'),
    "curp"             =>$this->request->getPost('curp'),
    "celular"          =>$this->request->getPost('phone'),
    "calle"            =>$this->request->getPost('street'),
    "numeroExterior"   =>$this->request->getPost('numberE'),
    "numeroInterior"   =>$this->request->getPost('numberI'),
    "codigoPostal"     =>$this->request->getPost('codPos'),
    "localidad"        =>$this->request->getPost('community'),
    "municipio"        =>$this->request->getPost('locality'),
    "estado"           =>$this->request->getPost('state'),
    "carrera"          =>$this->request->getPost('career'),
    "especialidad"     =>$this->request->getPost('specialty'),
    "cedulaProfesional"=>$this->request->getPost('license'),
    "departamento"     =>$this->request->getPost('department')

];
$doctorModel->insert($data, false);
return true;
}



//AGREGAR ENFERMERA
public function agregarE(){
    helper('session'); 

    $session = session();
    if (!$session->get('logged_in') || $session->get('perfil') !== '1') {
       
        return redirect()->to('usuarios/login');
    }
    helper(['form','url']);
    $enfermeraModel = model('EnfermeraModel');
    $data['nurse'] = $enfermeraModel->findAll();

            $data['title']="Agregar Enfermera";
        
            $validation = \Config\Services::validation();
        
            if(strtolower($this->request->getMethod()) ==='get'){
                return view('common/head').
                view('admin/menuA').
                view('admin/agregarE',$data).
                view('common/footer');
            } 
        
            $rules = [
                "name"=>'required',
                "lastnameP"=>'required',
                "lastnameM"=>'required',
                "birthday"=>'required',
                "gender"=>'required',
                "curp"=>'required',
                "phone"=>'required',
                "street"=>'required',
                "numberE"=>'required',
                "numberI"=>'required',
                "codPos"=>'required',
                "community"=>'required',
                "locality"=>'required',
                "state"=>'required',
                "career"=>'required',
                "specialty"=>'required',
                "license"=>'required',
                "department"=>'required'
            ];

            if(! $this->validate($rules)){
                return view('common/head').
                view ('admin/menuA').
                view('admin/agregarE',$data, ['validation'=>$validation]).
                view('common/footer');
            }
            else{
                        if($this->insertE()){
                            return redirect('admin/mostrarE','refresh');
                        }
                    }
}
//INSERCIÓN DE DATOS DE ENFERMERA
public function insertE(){
    helper('session'); 

    $session = session();
    if (!$session->get('logged_in') || $session->get('perfil') !== '1') {
       
        return redirect()->to('usuarios/login');
    }
$enfermeraModel = model('EnfermeraModel');
$data = [ 
    "nombre"           =>$this->request->getPost('name'),
    "apellidoP"        =>$this->request->getPost('lastnameP'),
    "apellidoM"        =>$this->request->getPost('lastnameM'),
    "fechaNacimiento"  =>$this->request->getPost('birthday'),
    "genero"           =>$this->request->getPost('gender'),
    "curp"             =>$this->request->getPost('curp'),
    "celular"          =>$this->request->getPost('phone'),
    "calle"            =>$this->request->getPost('street'),
    "numeroExterior"   =>$this->request->getPost('numberE'),
    "numeroInterior"   =>$this->request->getPost('numberI'),
    "codigoPostal"     =>$this->request->getPost('codPos'),
    "localidad"        =>$this->request->getPost('community'),
    "municipio"        =>$this->request->getPost('locality'),
    "estado"           =>$this->request->getPost('state'),
    "carrera"          =>$this->request->getPost('career'),
    "especialidad"     =>$this->request->getPost('specialty'),
    "cedulaProfesional"=>$this->request->getPost('license'),
    "departamento"     =>$this->request->getPost('department')

];
$enfermeraModel->insert($data, false);
return true;
}



//AGREGAR APOYOS
public function agregarA(){
    helper('session'); 

    $session = session();
    if (!$session->get('logged_in') || $session->get('perfil') !== '1') {
       
        return redirect()->to('usuarios/login');
    }
    helper(['form','url']);
    $apoyoModel = model('ApoyoModel');
    $data['apoyo'] = $apoyoModel->findAll();

            $data['title']="Agregar Enfermera";
        
            $validation = \Config\Services::validation();
        
            if(strtolower($this->request->getMethod()) ==='get'){
                return view('common/head').
                view('admin/menuA').
                view('admin/agregarA',$data).
                view('common/footer');
            } 
        
            $rules = [
                "nombre"=>'required',
                "fechaLimite"=>'required',
                "descripcion"=>'required'
            ];

            if(! $this->validate($rules)){
                return view('common/head').
                view ('admin/menuA').
                view('admin/agregarA',$data, ['validation'=>$validation]).
                view('common/footer');
            }
            else{
                        if($this->insertA()){
                            return redirect('admin/mostrarA','refresh');
                        }
                    }
}
//INSERCIÓN DE DATOS DE APOYOS
public function insertA(){
    helper('session'); 

    $session = session();
    if (!$session->get('logged_in') || $session->get('perfil') !== '1') {
       
        return redirect()->to('usuarios/login');
    }
$apoyoModel = model('ApoyoModel');
$data = [ 
    "nombre"           =>$this->request->getPost('nombre'),
    "fechaLimite"        =>$this->request->getPost('fechaLimite'),
    "descripcion"        =>$this->request->getPost('descripcion')
];
$apoyoModel->insert($data, false);
return true;
}

//ELIMINAR INFORMACIÓN DE APOYOS
public function deleteA($id){
    helper('session'); 

    $session = session();
    if (!$session->get('logged_in') || $session->get('perfil') !== '1') {
       
        return redirect()->to('usuarios/login');
    }
    $apoyoModel = model('ApoyoModel');
    $apoyoModel->delete($id);
    return redirect('admin/mostrarA','refresh');
}
//ELIMINAR INFORMACIÓN DE PACIENTE
public function deleteP($id){
    helper('session'); 

    $session = session();
    if (!$session->get('logged_in') || $session->get('perfil') !== '1') {
       
        return redirect()->to('usuarios/login');
    }
    $pacienteModel = model('PacienteModel');
    $pacienteModel->delete($id);
    return redirect('admin/mostrarP','refresh');
}
//ELIMINAR INFORMACIÓN DE ENFERMERA
public function deleteE($id){
    helper('session'); 

    $session = session();
    if (!$session->get('logged_in') || $session->get('perfil') !== '1') {
       
        return redirect()->to('usuarios/login');
    }
    $enfermeraModel = model('EnfermeraModel');
    $enfermeraModel->delete($id);
    return redirect('admin/mostrarE','refresh');
}
//ELIMINAR INFORMACIÓN DE DOCTOR
public function deleteD($id){
    helper('session'); 

    $session = session();
    if (!$session->get('logged_in') || $session->get('perfil') !== '1') {
       
        return redirect()->to('usuarios/login');
    }
    $doctorModel = model('DoctorModel');
    $doctorModel->delete($id);
    return redirect('admin/mostrarD','refresh');
}



// CIERRE DE SESIÓN 
public function cerrar_sesion()
    {
        $session = session();
        $session->destroy();  

        return redirect()->to('usuarios/login');  
    }
}