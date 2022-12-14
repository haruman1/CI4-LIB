<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LogBuku extends Migration
{
    public function up()
    {
        // $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            'id_log_buku'          => [
                'type'           => 'INT',
                'constraint'     => 15,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'keterangan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'waktu' => [
                'type' => 'datetime',

            ],
            'id_buku' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'id_user' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'judulbuku' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id_log_buku', true);
        $this->forge->addUniqueKey('id_user');
        $this->forge->addUniqueKey('id_buku');
        $this->forge->addUniqueKey('judulbuku');
        $this->forge->addForeignKey('id_buku', 'bukutersedia', 'id_buku');
        $this->forge->addForeignKey('id_user', 'User', 'id_user');

        $this->forge->createTable('log_buku', true);
        // $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('log_buku');
    }
}
