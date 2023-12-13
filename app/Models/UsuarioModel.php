<?php
namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'tbl_usuarios';
    protected $allowedFields = ['us_nombre', 'us_correo', 'us_contrasena'];
    protected $primaryKey = 'us_id';


}
