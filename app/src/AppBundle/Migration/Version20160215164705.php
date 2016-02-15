<?php

namespace AppBundle\Migration;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160215164705 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $nationsMa = [
            'Arcoscephale',
            'Ermor',
            'Sceleria',
            'Pythium',
            'Man',
            'Eriu',
            'Ulm',
            'Marignon',
            'Mictlan',
            'T\'ien Chi',
            'Machaka',
            'Agartha',
            'Abysia',
            'Caelum',
            'C\'tis',
            'Pangea',
            'Asphodel',
            'Vanheim',
            'Jotunheim',
            'Vanarus',
            'Bandar Log',
            'Shinuyama',
            'Ashdod',
            'Nazca',
            'Xibalba',
            'Atlantis',
            'R\'lyeh',
            'Pelagia',
            'Oceania'
        ];

        $sql = "INSERT INTO `doms`.`nation` (`id`, `name`, `age`) VALUES ";
        $values = array_map(function($nat){return "(NULL, \"$nat\", \"2\")";}, $nationsMa);
        $this->addSql($sql . implode(', ',$values));
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->addSql('DELETE FROM `nation` WHERE age=2');
    }
}

