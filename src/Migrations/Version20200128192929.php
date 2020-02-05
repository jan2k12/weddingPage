<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200128192929 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE guest_data CHANGE childs_till_three childs_till_three INT DEFAULT 0 NOT NULL, CHANGE childs_four_till_nine childs_four_till_nine INT DEFAULT 0 NOT NULL, CHANGE childs_ten_till_fifteen childs_ten_till_fifteen INT DEFAULT 0 NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE guest_data CHANGE childs_till_three childs_till_three INT NOT NULL, CHANGE childs_four_till_nine childs_four_till_nine INT NOT NULL, CHANGE childs_ten_till_fifteen childs_ten_till_fifteen INT NOT NULL');
    }
}
