<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblUsuarios extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'us_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'us_nombre' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'us_correo' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'us_contrasena' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
        ]);
        $this->forge->addKey('us_id', true);
        $this->forge->createTable('tbl_usuarios');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_usuarios');
    }
}
