<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;
class Tables extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'poliza' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'aplicacion' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'a_favor' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'desde' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'hasta' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'sobre' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'anunciado' => [
                'type'       => 'TEXT',

            ],
            'lugar' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'marca' => [
                'type'       => 'VARCHAR',
                'constraint' => '80',
            ],
            'nos' => [
                'type' => 'INT',
            ],
            'peso' => [
                'type' => 'DECIMAL',
                'constraint' => "12,2"
            ],
            'bultos' => [
                'type' => 'INT',
            ],
            'contenido' => [
                'type' => 'text',
            ],
            'asegurado' => [
                'type' => 'DECIMAL',
                'constraint' => "12,2"
            ],
            'porcentaje' => [
                'type' => 'DECIMAL',
                'constraint' => "8,2"
            ],
            'cscvs' => [
                'type' => 'DECIMAL',
                'constraint' => "8,3"
            ],
            'ssc' => [
                'type' => 'DECIMAL',
                'constraint' => "8,3"
            ],
            'iva' => [
                'type' => 'DECIMAL',
                'constraint' => "8,2"
            ],
            'dde' => [
                'type' => 'DECIMAL',
                'constraint' => "8,2"
            ],
            'observaciones' => [
                'type' => 'text',
            ],
            'embarcado_por' => [
                'type' => 'varchar',
                'constraint' => "100"
            ],
            'create_at'=> [
                'type'      => 'timestamp',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'update_at'=> [
                'type'      => 'timestamp',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
                'ON UPDATE CURRENT_TIMESTAMP' => TRUE,
            ],
        ]);
        $this->forge->addKey('poliza', true);
        $this->forge->createTable('polizas');
    }

    public function down()
    {
        $this->forge->dropTable('polizas');
    }
}
