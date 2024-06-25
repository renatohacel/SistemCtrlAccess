<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ModeloResidentes;
use App\Models\ModeloCarros;

class Residentes extends Controller
{
    protected $residente;
    protected $carros;
    public function __construct()
    {
        $this->residente = new ModeloResidentes();
        $this->carros = new ModeloCarros();
    }

    public function accesos_r()
    {
        if (session()->get('activo') == '1') {
            echo view('template/header') . view('pagResidentes/accesosResidentes') . view('template/footer');
        } else {
            return $this->response->redirect(base_url());
        }
    }

    public function listar_r()
    {
        if (session()->get('activo') == '1') {

            $registrado = $this->request->getGet('registrado') == 1;

            $datos['registrado'] = $registrado;
            $datos['residentes'] = $this->residente->orderBy('id_r', 'ASC')->findAll();

            echo view('template/header') . view('pagResidentes/listarResidentes', $datos) . view('template/footer');
        } else {
            return $this->response->redirect(base_url());
        }
    }

    public function crear_r()
    {
        if (session()->get('activo') == '1') {
            return view('template/header') . view('pagResidentes/registrarResidentes') . view('template/footer');
        } else {
            return $this->response->redirect(base_url());
        }
    }

    public function guardar_r()
    {
        if (session()->get('activo') == '1') {

            $domicilio = $this->request->getVar('domicilio');
            $nombre = $this->request->getVar('nombre');
            $telefono = $this->request->getVar('telefono');
            $fecha = $this->request->getVar('fecha');
            $fecha_format = date('Y-m-d H:i:s', strtotime($fecha));

            $datos = [
                'domicilio' => strtoupper($domicilio),
                'nombre' => strtoupper($nombre),
                'telefono' => strtoupper($telefono),
                'fechareg_r' => $fecha_format
            ];

            $valida = $this->residente->where('telefono', $telefono)->countAllResults();

            if ($valida == 0) {
                $this->residente->insert($datos);
                return redirect()->to(base_url('listar_r?registrado=1'));
            } else {
                $datos['errors'] = 'El número de télefono ya está registrado';
                echo view('template/header') . view('pagResidentes/registrarResidentes', $datos) . view('template/footer');
            }
        } else {
            return $this->response->redirect(base_url());
        }
    }

    public function borrar_r($id = null)
    {

        if (session()->get('activo') == '1') {

            $this->residente->where('id_r', $id)->delete();
            $this->carros->where('id_r', $id)->delete();
            return $this->response->redirect(site_url('/listar_r'));
        } else {
            return $this->response->redirect(base_url());
        }
    }

    public function editar_r($id = null)
    {
        if (session()->get('activo') == '1') {

            $datos['residente'] = $this->residente->where('id_r', $id)->first();

            echo view('template/header') . view('pagResidentes/editarResidentes', $datos) . view('template/footer');
        } else {
            return $this->response->redirect(base_url());
        }
    }

    public function update_r($id = null)
    {
        if (session()->get('activo') == '1') {

            $domicilio = $this->request->getVar('domicilio');
            $nombre = $this->request->getVar('nombre');
            $telefono = $this->request->getVar('telefono');
            $fecha = $this->request->getVar('fecha');
            $fecha_format = date('Y-m-d H:i:s', strtotime($fecha));

            $datos = [
                'domicilio' => strtoupper($domicilio),
                'nombre' => strtoupper($nombre),
                'telefono' => strtoupper($telefono),
                'fechareg_r' => strtoupper($fecha_format)
            ];
            $id = $this->request->getVar('id_r');

            $valida = $this->residente->where('telefono', $telefono)->where('id_r !=', $id)->countAllResults();
            if ($valida == 0) {
                $this->residente->update($id, $datos);
                return redirect()->to(base_url('listar_r?registrado=1'));
            } else {
                $datos['errors'] = '¡ERROR!, El número de télefono ya ha está registrado';
                $datos['residente'] = $this->residente->where('id_r', $id)->first();
                echo view('template/header') . view('pagResidentes/editarResidentes', $datos) . view('template/footer');
            }
        } else {
            return $this->response->redirect(base_url());
        }
    }


    public function carros_r($id = null)
    { {
            if (session()->get('activo') == '1') {

                $registrado = $this->request->getGet('registrado') == 1;
                $no_registrado = $this->request->getGet('registrado') == 0;

                $datos['registrado'] = $registrado;
                $datos['no_registrado'] = $no_registrado;

                $datos['carros'] = $this->carros->where('id_r', $id)->findAll();
                $datos['residente'] = $this->residente->where('id_r', $id)->first();

                echo view('template/header') . view('pagResidentes/carrosResidentes', $datos) . view('template/footer');
            } else {
                return $this->response->redirect(base_url());
            }
        }
    }
    public function guardar_c()
    {
        if (session()->get('activo') == '1') {

            $id = $this->request->getVar('id_r');
            $placas = $this->request->getVar('placas');
            $color = $this->request->getVar('color');
            $modelo = $this->request->getVar('modelo');

            $datos = [
                'id_r' => $id,
                'placas' => strtoupper($placas),
                'color' => strtoupper($color),
                'modelo' => strtoupper($modelo),
            ];

            $valida = $this->carros->where('placas', $placas)->countAllResults();

            if ($valida == 0) {
                $this->carros->insert($datos);
                return redirect()->to(base_url('carros_r/') . $id . '?registrado=1');
            } else {
                $datos['errors'] = '¡ERROR!, La placa ya ha sido registrada';

                $datos['carros'] = $this->carros->where('id_r', $id)->findAll();
                $datos['residente'] = $this->residente->where('id_r', $id)->first();

                echo view('template/header') . view('pagResidentes/carrosResidentes', $datos) . view('template/footer');
            }
        } else {
            return $this->response->redirect(base_url());
        }
    }

    public function update_c($id = null)
    {
        if (session()->get('activo') == '1') {
            $id = $this->request->getVar('editarId_r');
            $placas = $this->request->getVar('editarPlacas');
            $color = $this->request->getVar('editarColor');
            $modelo = $this->request->getVar('editarModelo');

            $datos = [
                'id_r' => $id,
                'placas' => strtoupper($placas),
                'color' => strtoupper($color),
                'modelo' => strtoupper($modelo),
            ];

            $valida = $this->carros->where('placas', $placas)->where('id_r !=', $id)->countAllResults();
            if ($valida == 0) {
                $this->carros->set($datos)->where('placas', $placas)->update();
                return redirect()->to(base_url('carros_r/') . $id . '?registrado=1');
            } else {
                $datos['carros'] = $this->carros->where('id_r', $id)->findAll();
                $datos['residente'] = $this->residente->where('id_r', $id)->first();

                session()->setFlashdata('bandera',1);
                session()->setFlashdata('modal', $placas);
                echo view('template/header') . view('pagResidentes/carrosResidentes', $datos) . view('template/footer');
            }

            return $this->response->redirect(site_url('carros_r/' . $id));
        } else {
            return $this->response->redirect(base_url());
        }
    }

    public function borrar_c($placas = null, $id = null)
    {
        if (session()->get('activo') == '1') {

            $this->carros->where('placas', $placas)->delete();

            return $this->response->redirect(site_url('carros_r/' . $id));
        } else {
            return $this->response->redirect(base_url());
        }
    }

    public function acercaDe()
    {
        if (session()->get('activo') == '1') {
            echo view('template/header') . view('acercaDe') . view('template/footer');
        } else {
            return $this->response->redirect(base_url());
        }
    }
}
