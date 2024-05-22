<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Saran extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_responden' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'saran' => [
                'type' => 'TEXT',
            ],
        ]);
        $this->forge->addForeignKey('id_responden', 'responden', 'id_responden', 'CASCADE', 'CASCADE');
        $this->forge->createTable('saran');
    }

    public function down()
    {
        $this->forge->dropTable('saran');
    }
}
