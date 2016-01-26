<?php

namespace AppBundle\Migration;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160126161527 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $sql = "CREATE TABLE IF NOT EXISTS `game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nation_id` int(11) NOT NULL,
  `pretender` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `plan_general` text COLLATE utf8_unicode_ci,
  `map` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `plan_research` text COLLATE utf8_unicode_ci,
  `winner` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `server_link` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thread` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nation_id` (`nation_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;";

        $this->addSql($sql);
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->addSql("DROP TABLE game");
    }
}
