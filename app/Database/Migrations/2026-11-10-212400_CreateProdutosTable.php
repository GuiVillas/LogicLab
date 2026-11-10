<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProdutosTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'categoria_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'nome' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
            ],
            'descricao' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'preco' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'estoque' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'sku' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'imagem' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'ativo' => [
                'type' => 'BOOLEAN',
                'default' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('categoria_id', 'categorias', 'id');
        $this->forge->addUniqueKey('slug');
        $this->forge->addUniqueKey('sku');
        $this->forge->createTable('produtos', true);
    }

    public function down()
    {
        $this->forge->dropTable('produtos', true);
    }
}
