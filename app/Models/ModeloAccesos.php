<?php 
namespace App\Models;

use CodeIgniter\Model;

class ModeloAccesos extends Model{
    protected $table      = 'accesos';
    // Uncomment below if you want add primary key
     protected $primaryKey = 'id_a';
     protected $allowedFields = ['nombre','domicilio','telefono','fecha_a','accion','placas','asunto','tipo','vigilante'];
}