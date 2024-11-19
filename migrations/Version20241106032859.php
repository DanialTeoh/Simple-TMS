<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241106032859 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE task ADD bahagian_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB2521A19CD4 FOREIGN KEY (bahagian_id) REFERENCES rujukan (id)');
        $this->addSql('CREATE INDEX IDX_527EDB2521A19CD4 ON task (bahagian_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE task DROP FOREIGN KEY FK_527EDB2521A19CD4');
        $this->addSql('DROP INDEX IDX_527EDB2521A19CD4 ON task');
        $this->addSql('ALTER TABLE task DROP bahagian_id');
    }
}
