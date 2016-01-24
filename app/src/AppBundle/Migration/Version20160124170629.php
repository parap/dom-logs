<?php

namespace AppBundle\Migration;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160124170629 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql("ALTER TABLE `nation` CHANGE `id_age` `age` TINYINT( 1 ) NOT NULL COMMENT '(DC2Type:age)'");
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->addSql("ALTER TABLE `nation` CHANGE `age` `id_age` TINYINT( 1 ) NOT NULL COMMENT '(DC2Type:age)'");
    }
}
