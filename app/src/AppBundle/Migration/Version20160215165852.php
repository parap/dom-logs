<?php

namespace AppBundle\Migration;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160215165852 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $nationsLa = [
            'Arcoscephale',
            'Pythium',
            'Lemuria',
            'Man',
            'Ulm',
            'Marignon',
            'Mictlan',
            'T\'ien Chi',
            'Jomon',
            'Agartha',
            'Abysia',
            'Caelum',
            'C\'tis',
            'Pangea',
            'Midgard',
            'Utgard',
            'Bogarus',
            'Patala',
            'Gath',
            'Ragha',
            'Xibalba',
            'Atlantis',
            'R\'lyeh'
        ];

        $sql = "INSERT INTO `doms`.`nation` (`id`, `name`, `age`) VALUES ";
        $values = array_map(function($nat){return "(NULL, \"$nat\", \"3\")";}, $nationsLa);
        $this->addSql($sql . implode(', ',$values));
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->addSql('DELETE FROM `nation` WHERE age=3');
    }
}

