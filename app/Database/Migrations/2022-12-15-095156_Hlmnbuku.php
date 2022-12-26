<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Hlmnbuku extends Migration
{






    public function up()
    {
        // $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 15,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_buku' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],

            'judulbuku' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'textbuku' => [
                'type' => 'TEXT',
                'constraint' => '255',
            ],
            'kategoribuku' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'author' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'file_buku' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'stok' => [
                'type' => 'INT',
                'constraint' => '255',
                'unsigned'       => true,
            ],
            'cover_buku' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'total_pinjam' => [
                'type' => 'INT',
                'constraint' => '255',
                'unsigned'       => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('judulbuku');
        $this->forge->addForeignKey('id_buku', 'bukutersedia', 'id_buku');
        $this->forge->createTable('hlmnbuku', true);
        // $this->forge->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('hlmnbuku');
    }
}
