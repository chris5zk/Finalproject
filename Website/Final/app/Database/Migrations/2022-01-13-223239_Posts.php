<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Posts extends Migration
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
            'date'   => [
                    'type'          =>  'VARCHAR',
                    'constraint'    =>  '20',
                    'null'          =>  true
            ],
            'car'   => [
                    'type'          =>  'VARCHAR',
                    'constraint'    =>  '10',
                    'null'          =>  true
            ],
            'place'   => [
                    'type'          =>  'VARCHAR',
                    'constraint'    =>  '50',
                    'null'          =>  true
            ],
            'contact'  => [
                    'type'          =>  'VARCHAR',
                    'constraint'    =>  '100',
                    'null'          =>  true
            ],
            'content'  => [
                    'type'          =>  'VARCHAR',
                    'constraint'    =>  '500',
                    'null'          =>  true
            ],
            'myfile'  => [
                'type'          =>  'VARCHAR',
                'constraint'    =>  '500',
                'null'          =>  true
             ],
             'file_name'  => [
                'type'          =>  'VARCHAR',
                'constraint'    =>  '500',
                'null'          =>  true
             ],
        ]);
        $this->forge->addKey('id',  TRUE);
        $this->forge->createTable('posts');   //table name
    }

    public function down()
    {
        $this->forge->dropTable('posts');
    }
}
