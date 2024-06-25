<?php 
namespace App\Models;

use CodeIgniter\Model;

class ModeloCarros extends Model{
    protected $table      = 'carros';
    // Uncomment below if you want add primary key
    //protected $primaryKey = 'id_c';
    protected $allowedFields = ['id_r','placas','color','modelo'];
}