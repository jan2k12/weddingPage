<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200106211527 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE guest_data ADD guest_id INT DEFAULT NULL, DROP user_id');
        $this->addSql('ALTER TABLE guest_data ADD CONSTRAINT FK_8949AE3E9A4AA658 FOREIGN KEY (guest_id) REFERENCES guest (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8949AE3E9A4AA658 ON guest_data (guest_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE guest_data DROP FOREIGN KEY FK_8949AE3E9A4AA658');
        $this->addSql('DROP INDEX UNIQ_8949AE3E9A4AA658 ON guest_data');
        $this->addSql('ALTER TABLE guest_data ADD user_id INT NOT NULL, DROP guest_id');
    }
}
