<?php

namespace AppBundle\Migration;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160202104859 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $sql = "
ALTER TABLE `turn` ADD `file_in` VARCHAR( 255 ) NULL DEFAULT NULL COMMENT '.trn file' AFTER `sharelink` ,
ADD `file_out` VARCHAR( 255 ) NULL DEFAULT NULL COMMENT '.2h file' AFTER `file_in`
";
        $this->addSql($sql);
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $sql = "
ALTER TABLE `turn`
  DROP `file_in`,
  DROP `file_out`;
  ";

        $this->addSql($sql);
    }
}
