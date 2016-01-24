<?php

namespace AppBundle\Migration;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160124155144 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $nationsEa = [
            'Arcoscephale',
            'Ermor',
            'Ulm',
            'Marverni',
            'Sauromatia',
            'T\'ien C\'hi',
            'Machaka',
            'Mictlan',
            'Abysia',
            'Caelum',
            'C\'tis',
            'Pangea',
            'Agartha',
            'Tir na n\'Og',
            'Fomoria',
            'Vanheim',
            'Helheim',
            'Niefelheim',
            'Kailasa',
            'Lanka',
            'Yomi',
            'Hinnom',
            'Ur',
            'Berytos',
            'Xibalba',
            'Atlantis',
            'R\'lyeh',
            'Pelagia',
            'Oceania',
            'Therodos'
        ];

        $sql = "INSERT INTO `doms`.`nation` (`id`, `name`, `id_age`) VALUES ";
        $values = array_map(function($nat){return "(NULL, \"$nat\", \"1\")";}, $nationsEa);
        $this->addSql($sql . implode(', ',$values));
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->addSql('TRUNCATE TABLE `nation`');
    }
}
