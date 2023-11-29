<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DoctorController extends BaseController
{
    public function index()
    {
        //
    }
//INICIO DE SESIÓN
    public function inicio()
    {
        
        helper('session'); 
        $session = session();
        if (!$session->get('logged_in') || $session->get('perfil') !== '2') {
           
            return redirect()->to('usuarios/login');
        }

        $doctorModel = model('DoctorModel');
        $data['doctors'] = $doctorModel->findAll();

        return 
        view('common/head') .
        view('doctor/menu') .
        view('doctor/inicio',$data) .
        view('common/footer');
    }

    //CREACIÓN DE RECETAS
    public function recetas(){

        helper('session'); 

        $session = session();
        if (!$session->get('logged_in') || $session->get('perfil') !== '2') {
           
            return redirect()->to('usuarios/login');
        }
        helper(['form','url']);
        $pacienteModel=model('PacienteModel');
        $recetasModel=model('RecetasModel');

        $data['pacients']=$pacienteModel->findAll();
        $data['recetas']=$recetasModel->findAll();

                $data['title']="Agregar Receta";
            
                $validation = \Config\Services::validation();
            
                if(strtolower($this->request->getMethod()) ==='get'){
                    return view('common/head').
                    view('doctor/menu').
                    view('doctor/recetas',$data).
                    view('common/footer');
                } 
            
                $rules = [
                    "paciente"   =>'required',
                    "descripcion"=>'required',
                    "altura"     =>'required',
                    "peso"       =>'required',
                    "temperatura"=>'required',
                    "alergias"   =>'required',
                    "fecha"      =>'required'
                ];

                if(! $this->validate($rules)){
                    return view('common/head').
                    view ('doctor/menu').
                    view('doctor/recetas',$data, ['validation'=>$validation]).
                    view('common/footer');
                }
                else{
                            if($this->insert()){
                                return redirect('doctor/mostrarR','refresh');
                            }
                        }
}

//INSERCIÓN DE DATOS DE RECETA
public function insert(){
    helper('session'); 

        $session = session();
        if (!$session->get('logged_in') || $session->get('perfil') !== '2') {
           
            return redirect()->to('usuarios/login');
        }
    $recetasModel=model('RecetasModel');
    $data = [ 
        "nombrePaciente"=>$this->request->getPost('paciente'),
        "descripcion"   =>$this->request->getPost('descripcion'),
        "altura"        =>$this->request->getPost('altura'),
        "peso"          =>$this->request->getPost('peso'),
        "temperatura"   =>$this->request->getPost('temperatura'),
        "alergias"      =>$this->request->getPost('alergias'),
        "fecha"         =>$this->request->getPost('fecha')
    ];
    $recetasModel->insert($data, false);
    return true;
}

//CREACIÓN DE RECETA DE APOYOS
public function apoyo(){
    helper('session'); 

        $session = session();
        if (!$session->get('logged_in') || $session->get('perfil') !== '2') {
           
            return redirect()->to('usuarios/login');
        }
    helper(['form','url']);
    $pacienteModel=model('PacienteModel');
    $apoyoModel=model('ApoyoModel');
    $apoyo_rModel=model('RecetasAModel');


    $data['pacients']=$pacienteModel->findAll();
    $data['apoyos']=$apoyoModel->findAll();
    $data['apoyos_r']=$apoyo_rModel->findAll();


            $data['title']="Agregar Apoyo";
        
            $validation = \Config\Services::validation();
        
            if(strtolower($this->request->getMethod()) ==='get'){
                return view('common/head').
                view('doctor/menu').
                view('doctor/apoyo',$data).
                view('common/footer');
            } 
        
            $rules = [
                "paciente"   =>'required',
                "descripcion"=>'required',
                "apoyo"     =>'required',
                "fecha"      =>'required'
            ];

            if(! $this->validate($rules)){
                return view('common/head').
                view ('doctor/menu').
                view('doctor/apoyo',$data, ['validation'=>$validation]).
                view('common/footer');
            }
            else{
                        if($this->insertA()){
                            return redirect('doctor/mostrarA','refresh');
                        }
                    }
}

public function insertA(){
    helper('session'); 

        $session = session();
        if (!$session->get('logged_in') || $session->get('perfil') !== '2') {
           
            return redirect()->to('usuarios/login');
        }
$apoyo_rModel=model('RecetasAModel');
$data = [ 
    "nombrePaciente"=>$this->request->getPost('paciente'),
    "descripcion"   =>$this->request->getPost('descripcion'),
    "apoyo"        =>$this->request->getPost('apoyo'),
    "fecha"         =>$this->request->getPost('fecha')
];
$apoyo_rModel->insert($data, false);
return true;
}


                                    // VISUALIZACIÓN 
                                    
// VISUALIZACIÓN EN TABLA DE LAS RECETAS CREADAS
public function mostrarR() {
    helper('session'); 

        $session = session();
        if (!$session->get('logged_in') || $session->get('perfil') !== '2') {
           
            return redirect()->to('usuarios/login');
        }
    $recetasModel = model('RecetasModel');
    $db = \Config\Database::connect(); 
    $query = $db->query('SELECT recetas.*, CONCAT(paciente.nombre, " ", paciente.apellidoP, " ", paciente.apellidoM) AS nombrePaciente
                    FROM recetas 
                    JOIN paciente ON recetas.nombrePaciente = paciente.id');

$recetas = $query->getResult();
    $data['recetas'] = $recetas;

    return view('common/head') .
           view('doctor/menu') .
           view('doctor/mostrarR', $data) .
           view('common/footer');
}


// IMPRESIÓN Y GUARDO EN PDF DE LA RECETA

public function descargarPdf($recetaId)
{
    helper('session'); 

        $session = session();
        if (!$session->get('logged_in') || $session->get('perfil') !== '2') {
           
            return redirect()->to('usuarios/login');
        }
    $recetaModel = model('RecetasModel');
    $receta = $recetaModel->find($recetaId);

    if (!$receta) {
        return redirect()->to('ruta/de/error');
    }

    $pacienteModel = model('PacienteModel');
    $paciente = $pacienteModel->find($receta->nombrePaciente);

    if (!$paciente) {
        return redirect()->to('ruta/de/error');
    }

    
    $pdf = new \TCPDF();
    $pdf->AddPage();
    $pdf->SetFont('helvetica', '', 12);
    $pdf->Cell(0, 10, 'Receta Médica', 0, 1, 'C');
    $pdf->Ln(10);

    $pdf->SetFont('helvetica', '', 12);
    $pdf->Cell(0, 10, 'Nombre del Paciente: ' . $paciente->nombre . ' ' . $paciente->apellidoP . ' ' . $paciente->apellidoM, 0, 1);
    $pdf->Cell(0, 10, 'Número de Asociación: ' . $paciente->numeroAsociacion, 0, 1);
    $pdf->Cell(0, 10, 'Número de Tarjeta: ' . $paciente->numeroTarjeta, 0, 1);
    $pdf->Cell(0, 10, 'Fecha: ' . $receta->fecha, 0, 1);
    $pdf->Cell(0, 10, 'Altura: ' . $receta->altura . ' cm', 0, 1);
    $pdf->Cell(0, 10, 'Peso: ' . $receta->peso . ' kg', 0, 1);
    $pdf->Cell(0, 10, 'Alergias: ' . $receta->alergias, 0, 1);
    $pdf->Cell(0, 10, 'Temperatura: ' . $receta->temperatura . ' °C', 0, 1);

    $pdf->Ln(10);

    $pdf->SetFont('helvetica', 'B', 14);
    $pdf->Cell(0, 10, 'Descripción:', 0, 1);
    $pdf->SetFont('helvetica', '', 12);
    $pdf->MultiCell(0, 10, $receta->descripcion);
    $output = $pdf->Output('receta.pdf', 'S');
    return $this->response->setHeader('Content-Type', 'application/pdf')
        ->setBody($output);
}


// VISUALIZACIÓN EN TABLAS DE RECETAS DE APOYO
public function mostrarA() {
    helper('session'); 

        $session = session();
        if (!$session->get('logged_in') || $session->get('perfil') !== '2') {
           
            return redirect()->to('usuarios/login');
        }
    $recetasModel = model('RecetasAModel');
    $db = \Config\Database::connect(); 
$query = $db->query('SELECT recetas_apoyo.*, CONCAT(paciente.nombre, " ", paciente.apellidoP, " ", paciente.apellidoM) AS nombrePaciente
                    FROM recetas_apoyo
                    JOIN paciente ON recetas_apoyo.nombrePaciente = paciente.id');

$recetas = $query->getResult();
    $data['recetas'] = $recetas;

    return view('common/head') .
           view('doctor/menu') .
           view('doctor/mostrarA', $data) .
           view('common/footer');
}
//IMPRESIÓN Y GUARDADO EN PDF DE LA RECETA APOYO
public function descargarPdfA($recetaId)
{

    helper('session'); 

        $session = session();
        if (!$session->get('logged_in') || $session->get('perfil') !== '2') {
           
            return redirect()->to('usuarios/login');
        }
    $recetaModel = model('RecetasAModel');
    $receta = $recetaModel->find($recetaId);

    if (!$receta) {
        return redirect()->to('');
    }

    $pacienteModel = model('PacienteModel');
    $paciente = $pacienteModel->find($receta->nombrePaciente);

    if (!$paciente) {
        return redirect()->to('');
    }

  
    $pdf = new \TCPDF();
    $pdf->AddPage();
    $pdf->SetFont('helvetica', '', 12);
    $pdf->Cell(0, 10, 'Receta Médica', 0, 1, 'C');
    $pdf->Ln(10);
    $pdf->SetFont('helvetica', '', 12);
    $pdf->Cell(0, 10, 'Nombre del Paciente: ' . $paciente->nombre . ' ' . $paciente->apellidoP . ' ' . $paciente->apellidoM, 0, 1);
    $pdf->Cell(0, 10, 'Número de Asociación: ' . $paciente->numeroAsociacion, 0, 1);
    $pdf->Cell(0, 10, 'Número de Tarjeta: ' . $paciente->numeroTarjeta, 0, 1);
    $pdf->Cell(0, 10, 'Apoyo: ' . $receta->apoyo, 0, 1);
    $pdf->Ln(10);

    $pdf->SetFont('helvetica', 'B', 14);

    $pdf->Cell(0, 10, 'Descripción:', 0, 1);

    $pdf->SetFont('helvetica', '', 12);
    $pdf->MultiCell(0, 10, $receta->descripcion);

    $output = $pdf->Output('receta.pdf', 'S');

    return $this->response->setHeader('Content-Type', 'application/pdf')
        ->setBody($output);
}


// CIERRE DE SESIÓN 
public function cerrar_sesion()
    {
        $session = session();
        $session->destroy();  

        return redirect()->to('usuarios/login');  
    }


}