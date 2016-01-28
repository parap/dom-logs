<?php

namespace AppBundle\Migration;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160127201855 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $sql = "INSERT INTO `doms`.`nation` (`id`, `name`, `age`) VALUES (NULL, 'Ulm', '2'), (NULL, 'Ulm', '3');";
        $this->addSql($sql);
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $sql = "DELETE FROM nation WHERE name='Ulm' AND (age='2' OR age='3')";
        $this->addSql($sql);
    }
}
