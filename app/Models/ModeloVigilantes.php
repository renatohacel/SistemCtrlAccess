<?php 
namespace App\Models;

use CodeIgniter\Model;

class ModeloVigilantes extends Model{
    protected $table      = 'vigilantes';
    // Uncomment below if you want add primary key
     protected $primaryKey = 'id_v';
     protected $allowedFields = ['user','password','nombre','telefono','fechar_vigilante','activo','iniciado'];
}