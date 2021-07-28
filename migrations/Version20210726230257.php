<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210726230257 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE diplome (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, diplome VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_EB4C4D4EA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE diplome ADD CONSTRAINT FK_EB4C4D4EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD photo VARCHAR(255) DEFAULT NULL, ADD passport VARCHAR(255) DEFAULT NULL, ADD cin VARCHAR(255) DEFAULT NULL, ADD cv VARCHAR(255) DEFAULT NULL, ADD motivation_letter VARCHAR(255) DEFAULT NULL, ADD bulletin VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE diplome');
        $this->addSql('ALTER TABLE user DROP photo, DROP passport, DROP cin, DROP cv, DROP motivation_letter, DROP bulletin');
    }
}
