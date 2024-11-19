<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241106063917 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_flag (user_id INT NOT NULL, flag_id INT NOT NULL, INDEX IDX_AB75A753A76ED395 (user_id), INDEX IDX_AB75A753919FE4E5 (flag_id), PRIMARY KEY(user_id, flag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_flag ADD CONSTRAINT FK_AB75A753A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_flag ADD CONSTRAINT FK_AB75A753919FE4E5 FOREIGN KEY (flag_id) REFERENCES flag (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_flag DROP FOREIGN KEY FK_AB75A753A76ED395');
        $this->addSql('ALTER TABLE user_flag DROP FOREIGN KEY FK_AB75A753919FE4E5');
        $this->addSql('DROP TABLE user_flag');
    }
}
