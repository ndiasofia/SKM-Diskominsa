<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penilaian extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_responden' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'no_pertanyaan' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'nilai' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
        ]);
        $this->forge->addForeignKey('id_responden', 'responden', 'id_responden', 'CASCADE', 'CASCADE');
        // $this->forge->addForeignKey('no_pertanyaan', 'pertanyaan', 'no_pertanyaan', 'CASCADE', 'CASCADE');
        $this->forge->createTable('penilaian');
    }

    public function down()
    {
        $this->forge->dropTable('penilaian');
    }
}
