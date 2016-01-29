<?php

namespace AppBundle\Migration;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160129100929 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $sql = "INSERT INTO `maps` (`id`, `name`) VALUES
(1, 'Seaside Valley'),
(2, 'Riverlands'),
(3, 'Coasts of Despair'),
(4, 'Dawn of Bridges'),
(5, 'Pristine'),
(6, 'Shahrivar'),
(7, 'Dawn of Bridges'),
(8, 'Plan of Rusty Caves'),
(9, 'Byddin'),
(10, 'Estates of Economics'),
(11, 'Hexawyr'),
(12, 'Parganos'),
(13, 'Plane of Rusty Nails'),
(14, 'Valanis'),
(15, 'Merrowmoor'),
(16, 'Glory of the Gods (multiplayer)'),
(17, 'Glory of the Gods'),
(18, 'Shadowshore'),
(19, 'Silent Seas'),
(20, 'Streamlands'),
(21, 'Thronelands'),
(22, 'Talis'),
(23, 'Galadia'),
(24, 'Maerland'),
(25, 'Parganos (wraparound)'),
(26, 'Aran'),
(27, 'Cradle of Dominion'),
(28, 'Urraparrand'),
(29, 'The Desert Eye'),
(30, 'Fantomia'),
(31, 'Dawn of Dominions'),
(32, 'Realm of Rampaging Roaches'),
(33, 'Frosted Land'),
(34, 'Orania'),
(35, 'Realm of Roaring Rhinos');";

        $this->addSql($sql);
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->addSql("TRUNCATE `maps`");
    }
}
