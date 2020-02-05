<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200110220853 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE guest_data DROP FOREIGN KEY FK_8949AE3E9A4AA658');
        $this->addSql('DROP INDEX UNIQ_8949AE3E9A4AA658 ON guest_data');
        $this->addSql('ALTER TABLE guest_data ADD guests INT NOT NULL, CHANGE guest_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE guest_data ADD CONSTRAINT FK_8949AE3EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8949AE3EA76ED395 ON guest_data (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE guest_data DROP FOREIGN KEY FK_8949AE3EA76ED395');
        $this->addSql('DROP INDEX UNIQ_8949AE3EA76ED395 ON guest_data');
        $this->addSql('ALTER TABLE guest_data DROP guests, CHANGE user_id guest_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE guest_data ADD CONSTRAINT FK_8949AE3E9A4AA658 FOREIGN KEY (guest_id) REFERENCES guest (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8949AE3E9A4AA658 ON guest_data (guest_id)');
    }
}
