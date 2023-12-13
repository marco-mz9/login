<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        $correo = 'admin@admin.com';
        $contra = password_hash('123456', PASSWORD_DEFAULT);
        $data = [
            'us_nombre' => 'Administrador',
            'us_correo' => $correo,
            'us_contrasena' => $contra
        ];

        $this->db->table('tbl_usuarios')->insert($data);
    }
}
