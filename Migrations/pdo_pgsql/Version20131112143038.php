<?php

namespace Claroline\ForumBundle\Migrations\pdo_pgsql;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated migration based on mapping information: modify it with caution
 *
 * Generation date: 2013/11/12 02:30:40
 */
class Version20131112143038 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->addSql("
            CREATE TABLE claro_forum_notification (
                id SERIAL NOT NULL, 
                forum_id INT DEFAULT NULL, 
                user_id INT DEFAULT NULL, 
                PRIMARY KEY(id)
            )
        ");
        $this->addSql("
            CREATE INDEX IDX_1330B0B629CCBAD0 ON claro_forum_notification (forum_id)
        ");
        $this->addSql("
            CREATE INDEX IDX_1330B0B6A76ED395 ON claro_forum_notification (user_id)
        ");
        $this->addSql("
            ALTER TABLE claro_forum_notification 
            ADD CONSTRAINT FK_1330B0B629CCBAD0 FOREIGN KEY (forum_id) 
            REFERENCES claro_forum (id) 
            ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        ");
        $this->addSql("
            ALTER TABLE claro_forum_notification 
            ADD CONSTRAINT FK_1330B0B6A76ED395 FOREIGN KEY (user_id) 
            REFERENCES claro_user (id) 
            ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        ");
    }

    public function down(Schema $schema)
    {
        $this->addSql("
            DROP TABLE claro_forum_notification
        ");
    }
}