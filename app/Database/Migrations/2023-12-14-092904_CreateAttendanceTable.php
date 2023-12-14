<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAttendancesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'description' => [
                'type' => 'TEXT'
            ],
            'entry_time' => [
                'type' => 'TIME'
            ],
            'limit_entry_time' => [
                'type' => 'TIME'
            ],
            'out_time' => [
                'type' => 'TIME'
            ],
            'limit_out_time' => [
                'type' => 'TIME'
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('attendances');
    }

    public function down()
    {
        $this->forge->dropTable('attendances');
    }
}
