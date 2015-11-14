<?php
/*
* This file is part of EC-CUBE
*
* Copyright(c) 2000-2015 LOCKON CO.,LTD. All Rights Reserved.
* http://www.lockon.co.jp/
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

class Version20150911190000 extends AbstractMigration
{

    public function up(Schema $schema)
    {
        $this->createInstagramApiTable($schema);
    }

    public function down(Schema $schema)
    {
        $schema->dropTable('plg_instagram_api');
        $schema->dropSequence('plg_instagram_api_instagram_api_id_seq');

    }

    protected function createInstagramApiTable(Schema $schema)
    {
        $table = $schema->createTable("plg_instagram_api");
        $table->addColumn('instagram_api_id', 'integer', array(
          'autoincrement' => true,
        ));
        $table->addColumn('api_token', 'text', array(
          'notnull' => false,
        ));
        $table->addColumn('api_user', 'text', array(
          'notnull' => false,
        ));

        $table->setPrimaryKey(array('instagram_api_id'));
    }
}
