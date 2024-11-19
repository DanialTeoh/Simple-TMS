<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241106073640 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_rujukan (user_id INT NOT NULL, rujukan_id INT NOT NULL, INDEX IDX_F874913EA76ED395 (user_id), INDEX IDX_F874913ED0E1C5C0 (rujukan_id), PRIMARY KEY(user_id, rujukan_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_rujukan ADD CONSTRAINT FK_F874913EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_rujukan ADD CONSTRAINT FK_F874913ED0E1C5C0 FOREIGN KEY (rujukan_id) REFERENCES rujukan (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_rujukan DROP FOREIGN KEY FK_F874913EA76ED395');
        $this->addSql('ALTER TABLE user_rujukan DROP FOREIGN KEY FK_F874913ED0E1C5C0');
        $this->addSql('DROP TABLE user_rujukan');
    }
}
