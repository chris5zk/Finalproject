<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Members extends Migration
{
    public function up()
    {
        $this->forge->addField([                //table content
            'id'        => [
                    'type'          =>  'INT',
                    'constraint'    =>  5,
                    'unsigned'      =>  TRUE,
                    'auto_increment'=>  TRUE
            ],
            'account'   => [
                    'type'          =>  'VARCHAR',
                    'constraint'    =>  '20',
                    'null'          =>  true
            ],
            'password'  => [
                    'type'          =>  'VARCHAR',
                    'constraint'    =>  '20',
                    'null'          =>  true
            ],
        ]);
        $this->forge->addKey('id',  TRUE);
        $this->forge->createTable('members');   //table name
    }

    public function down()
    {
        $this->forge->dropTable('members');
    }
}
