<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220709072715 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE amor (id INT AUTO_INCREMENT NOT NULL, achtung VARCHAR(255) DEFAULT NULL, alias VARCHAR(255) NOT NULL, genre INT NOT NULL, rating INT NOT NULL, favorite TINYINT(1) DEFAULT NULL, description1 VARCHAR(510) NOT NULL, description2 VARCHAR(510) DEFAULT NULL, description3 VARCHAR(510) DEFAULT NULL, description4 VARCHAR(510) DEFAULT NULL, web VARCHAR(255) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, has_photo TINYINT(1) NOT NULL, phone VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, other VARCHAR(255) DEFAULT NULL, user INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE praxis CHANGE is_favorite favorite TINYINT(1) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE amor');
        $this->addSql('ALTER TABLE praxis CHANGE favorite is_favorite TINYINT(1) DEFAULT NULL');
    }
}
