<?php

namespace App\Controllers;

use App\Models\ModeloVigilantes;
use CodeIgniter\Controller;

class Vigilantes extends Controller
{

    protected $vigilante;
    protected $reglas_login;

    public function __construct()
    {
        $this->vigilante = new ModeloVigilantes();
    }

    public function index()
    {
        if (session()->get('iniciado') != 0) {
            return $this->response->redirect(base_url('home'));
        } else {
            return view('login/login');
        }
    }
    public function valida()
    {

        $usuario = $this->request->getVar('user');
        $password = $this->request->getVar('password');
        $datos = $this->vigilante->where('user', $usuario)->first();
        if ($datos != null && $datos['activo'] == 1) {
            if (password_verify($password, $datos['password'])) {
                $this->vigilante->where('id_v', $datos['id_v'])->set('iniciado', 1)->update();
                $datos = $this->vigilante->where('user', $usuario)->first();
                $datosSesion = [
                    'id_v' => $datos['id_v'],
                    'user' => $datos['user'],
                    'nombre' => $datos['nombre'],
                    'activo' => $datos['activo'],
                    'iniciado' => $datos['iniciado'],

                ];
                $session = session();
                $session->set($datosSesion);
                return redirect()->to(base_url() . 'home');
            } else {
                $data['error'] = "Las contraseñas no coinciden";
                echo view('login/login', $data);
            }
        } else {
            $data['error'] = "El usuario no existe";
            echo view('login/login', $data);
        }
    }
    public function listar_v()
    {
        if (session()->get('user') == 'admin' and session()->get('activo') == '1') {

            $registrado = $this->request->getGet('registrado') == 1;

            $datos['registrado'] = $registrado;
            $datos['vigilantes'] = $this->vigilante->orderBy('id_v', 'ASC')->findAll();

            echo view('template/header') . view('vigilantes/listarVigilantes', $datos) . view('template/footer');
        } else {
            return $this->response->redirect(base_url());
        }
    }

    public function crear_v()
    {
        if (session()->get('user') == 'admin' and session()->get('activo') == '1') {
            echo view('template/header') . view('vigilantes/registrarVigilantes') . view('template/footer');
        } else {
            return $this->response->redirect(base_url());
        }
    }

    public function guardar_v()
    {
        if (session()->get('user') == 'admin' and session()->get('activo') == '1') {

            $user = $this->request->getVar('usuario');
            $password = $this->request->getVar('password');
            $passowrd_hash = password_hash($password, PASSWORD_DEFAULT);
            $nombre = $this->request->getVar('nombre');
            $telefono = $this->request->getVar('telefono');
            $fecha = $this->request->getVar('fecha');
            $fecha_format = date('Y-m-d H:i:s', strtotime($fecha));

            $datos = [
                'user' => strtolower($user),
                'password' => $passowrd_hash,
                'nombre' => strtoupper($nombre),
                'telefono' => $telefono,
                'fechar_vigilante' => $fecha_format
            ];
            $valida = $this->vigilante->where('user', $user)->countAllResults();

            if ($valida == 0) {

                $this->vigilante->insert($datos);
                return $this->response->redirect(base_url('listar_v?registrado=1'));
            } else {
                $datos['errors'] = 'El número de télefono ya está registrado';

                echo view('template/header') . view('vigilantes/registrarVigilantes', $datos) . view('template/footer');
            }
        } else {
            return $this->response->redirect(base_url());
        }
    }

    public function borrar_v($id = null)
    {
        if (session()->get('user') == 'admin' and session()->get('activo') == '1') {

            $this->vigilante->where('id_v', $id)->delete();

            return $this->response->redirect(site_url('/listar_v'));
        } else {
            return $this->response->redirect(base_url());
        }
    }

    public function editar_v($id = null)
    {
        if (session()->get('user') == 'admin' and session()->get('activo') == '1') {
            $datos['vigilante'] = $this->vigilante->where('id_v', $id)->first();

            echo view('template/header') . view('vigilantes/editarVigilantes', $datos) . view('template/footer');
        } else {
            return $this->response->redirect(base_url());
        }
    }

    public function update_v($id = null)
    {
        if (session()->get('user') == 'admin' and session()->get('activo') == '1') {

            $user = $this->request->getVar('usuario');
            $password = $this->request->getVar('password');
            $passowrd_hash = password_hash($password, PASSWORD_DEFAULT);
            $domicilio = $this->request->getVar('domicilio');
            $nombre = $this->request->getVar('nombre');
            $telefono = $this->request->getVar('telefono');
            $fecha = $this->request->getVar('fecha');
            $fecha_format = date('Y-m-d H:i:s', strtotime($fecha));

            $datos = [
                'user' => strtolower($user),
                'password' => $passowrd_hash,
                'nombre' => strtoupper($nombre),
                'telefono' => $telefono,
                'fechar_vigilante' => $fecha_format
            ];


            $id = $this->request->getVar('id_v');

            $valida = $this->vigilante->where('user', $user)->where('id_v !=', $id)->countAllResults();
            if ($valida == 0) {
                $this->vigilante->update($id, $datos);
                return $this->response->redirect(site_url('/listar_v?registrado=1'));
            } else {
                $datos['vigilante'] = $this->vigilante->where('id_v', $id)->first();
                $datos['errors'] = '¡ERROR!, el telefono ya ha sido registrado';
                echo view('template/header') . view('vigilantes/editarVigilantes', $datos) . view('template/footer');
            }
        } else {
            return $this->response->redirect(base_url());
        }
    }

    public function logout()
    {
        if (session()->get('activo') == '1') {

            $datos = $this->vigilante->where('user', session()->get('user'))->first();

            $this->vigilante->where('id_v', $datos['id_v'])->set('iniciado', 0)->update();

            session()->destroy();

            return redirect()->to(base_url());
        } else {
            return $this->response->redirect(base_url());
        }
    }
}
