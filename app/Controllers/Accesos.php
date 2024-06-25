<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ModeloAccesos;
use App\Models\ModeloResidentes;

class Accesos extends Controller
{

    protected $accesos;
    protected $residente;

    public function __construct()
    {
        $this->accesos = new ModeloAccesos();
        $this->residente = new ModeloResidentes();
    }
    public function index()
    {
        if (session()->get('activo') == '1') {

            $datos['accesos'] = $this->accesos->orderBy('id_a', 'ASC')->findAll();

            echo view('template/header') . view('accesos/accesos', $datos) . view('template/footer');

        } else {
            return $this->response->redirect(base_url());
        }
    }
    public function accesosResidentes()
    {
        if (session()->get('activo') == '1') {

            $datos['accesos'] = $this->accesos->orderBy('id_a', 'ASC')->findAll();

            echo view('template/header') . view('accesos/accesosResidentes', $datos) . view('template/footer');

        } else {
            return $this->response->redirect(base_url());
        }
    }
    public function accesosVisitantes()
    {
        if (session()->get('activo') == '1') {

            $datos['accesos'] = $this->accesos->orderBy('id_a', 'ASC')->findAll();

            echo view('template/header') . view('accesos/accesosVisitantes', $datos) . view('template/footer');

        } else {
            return $this->response->redirect(base_url());
        }
    }
    public function guardar_a()
    {
        if (session()->get('activo') == '1') {
            $tipo = $this->request->getVar('tipo');
            $placas = $this->request->getVar('placas');
            $nombre = $this->request->getVar('nombre');
            $domicilio = $this->request->getVar('domicilio');
            $telefono = $this->request->getVar('telefono');
            $asunto = $this->request->getVar('asunto');
            $fecha = $this->request->getVar('fecha');
            $fecha_format = date('Y-m-d H:i:s', strtotime($fecha));
            $accion = $this->request->getVar('accion');
            $vigilante = session()->get('nombre');

            $datos = [
                'tipo' => $tipo,
                'placas' => strtoupper($placas),
                'nombre' => strtoupper($nombre),
                'domicilio' => strtoupper($domicilio),
                'telefono' => strtoupper($telefono),
                'fecha_a' => strtoupper($fecha_format),
                'asunto' => strtoupper($asunto),
                'accion' => strtoupper($accion),
                'vigilante' => strtoupper($vigilante),
            ];

            $this->accesos->insert($datos);
            return $this->response->redirect(base_url('accesos'));
        } else {
            return $this->response->redirect(base_url());
        }
    }

    public function update_a($id = null)
    {
        if (session()->get('activo') == '1') {
            $tipo = $this->request->getVar('editarTipo');
            $placas = $this->request->getVar('editarPlacas');
            $nombre = $this->request->getVar('editarNombre');
            $domicilio = $this->request->getVar('editarDomicilio');
            $telefono = $this->request->getVar('editarTelefono');
            $asunto = $this->request->getVar('editarAsunto');
            $fecha = $this->request->getVar('editarFecha');
            $fecha_format = date('Y-m-d H:i:s', strtotime($fecha));
            $accion = $this->request->getVar('editarAccion');
            $vigilante = session()->get('nombre');

            $datos = [
                'tipo' => $tipo,
                'placas' => strtoupper($placas),
                'nombre' => strtoupper($nombre),
                'domicilio' => strtoupper($domicilio),
                'telefono' => strtoupper($telefono),
                'fecha_a' => strtoupper($fecha_format),
                'asunto' => strtoupper($asunto),
                'accion' => strtoupper($accion),
                'vigilante' => strtoupper($vigilante),
            ];

            $id = $this->request->getVar('id_a');

            $this->accesos->update($id, $datos);
            return $this->response->redirect(base_url('accesos'));
        } else {
            return $this->response->redirect(base_url());
        }
    }

    public function borrar_a($id = null)
    {
        if (session()->get('activo') == '1') {
            $this->accesos->where('id_a', $id)->delete($id);

            return $this->response->redirect(base_url('accesos'));
        } else {
            return $this->response->redirect(base_url());
        }
    }

    public function residenteAlert()
    {
        if (session()->get('activo') == '1') {

            $vigilante = session()->get('nombre');
            $data = ['vigilante' => $vigilante];

            $this->accesos->where('vigilante', null)->orderBy('id_a', 'DESC')->set($data)->update();

            return view('template/header') . view('accesos/residenteAlert') . view('template/footer');
        } else {
            return $this->response->redirect(base_url());
        }

    }
    public function visitanteAlert()
    {
        if (session()->get('activo') == '1') {
            echo view('template/header') . view('accesos/visitanteAlert') . view('template/footer');
        } else {
            return $this->response->redirect(base_url());
        }
    }
}
