<?php

namespace App\Models;

use CodeIgniter\Model;

class ModeloResidentes extends Model
{
    protected $table      = 'residentes';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id_r';
    protected $allowedFields = ['domicilio', 'nombre', 'telefono', 'fechareg_r'];
}
