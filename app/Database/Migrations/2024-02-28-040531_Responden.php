<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Responden extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_responden' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'jenis_kelamin' => [
                'type' => 'ENUM',
                'constraint' => ['Laki-laki', 'Perempuan'],
            ],
            'usia' => [
                'type' => 'INT',
                'constraint' => 3,
            ],
            'pekerjaan' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_responden', true);
        $this->forge->createTable('responden');
    }

    public function down()
    {
        $this->forge->dropTable('responden');
    }
}
