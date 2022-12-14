<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LogUser extends Migration
{
    public function up()
    {

        $this->forge->addField([
            'id_log_anggota'          => [
                'type'           => 'INT',
                'constraint'     => 15,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_user'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],

            'keterangan' => [
                'type' => 'TEXT',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id_log_anggota', true);
        $this->forge->addUniqueKey('id_user');
        $this->forge->addUniqueKey('id_log_anggota');
        $this->forge->addForeignKey('id_user', 'User', 'id_user');
        $this->forge->createTable('log_user', true);
    }

    public function down()
    {
        $this->forge->dropTable('log_user');
    }
}
