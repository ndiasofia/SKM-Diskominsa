<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pertanyaan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pertanyaan' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'no_pertanyaan' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'pertanyaan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);
        $this->forge->addKey('id_pertanyaan', true);
        $this->forge->createTable('pertanyaan');
    }

    public function down()
    {
        $this->forge->dropTable('pertanyaan');
    }
}
