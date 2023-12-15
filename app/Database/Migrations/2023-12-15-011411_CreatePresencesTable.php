<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePresencesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'user_id' => [
                'type' => 'INT',
            ],
            'attendance_id' => [
                'type' => 'INT'
            ],
            'presence_date' => [
                'type' => 'DATE'
            ],
            'presence_enter_time' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'presence_out_time' => [
                'type' => 'TIME'
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('presences');
    }

    public function down()
    {
        $this->forge->dropTable('presences');
    }
}
