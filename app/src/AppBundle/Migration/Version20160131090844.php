<?php

namespace AppBundle\Migration;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160131090844 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql("ALTER TABLE `turn` CHANGE `result` `result` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL");
        $this->addSql("ALTER TABLE `turn` CHANGE `idea` `idea` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL");
        $this->addSql("ALTER TABLE `turn` CHANGE `plan` `plan` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL");
        $this->addSql("ALTER TABLE `turn` CHANGE `action` `action` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL");
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->addSql("ALTER TABLE `turn` CHANGE `result` `result` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL");
        $this->addSql("ALTER TABLE `turn` CHANGE `idea` `idea` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL");
        $this->addSql("ALTER TABLE `turn` CHANGE `plan` `plan` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL");
        $this->addSql("ALTER TABLE `turn` CHANGE `action` `action` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL");
    }
}
