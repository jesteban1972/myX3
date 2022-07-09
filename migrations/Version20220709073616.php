<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220709073616 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE practica (id INT AUTO_INCREMENT NOT NULL, achtung VARCHAR(765) DEFAULT NULL, name VARCHAR(255) NOT NULL, rating INT NOT NULL, favorite TINYINT(1) DEFAULT NULL, locus INT NOT NULL, date DATE NOT NULL, ordinal VARCHAR(2) DEFAULT NULL, description LONGTEXT NOT NULL, tq INT DEFAULT NULL, tl INT DEFAULT NULL, user INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE praxis');
        $this->addSql('ALTER TABLE amores CHANGE has_photo photo TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE praxis (id INT AUTO_INCREMENT NOT NULL, achtung VARCHAR(765) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, rating INT NOT NULL, favorite TINYINT(1) DEFAULT NULL, locus INT NOT NULL, date DATE NOT NULL, ordinal VARCHAR(2) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, tq INT DEFAULT NULL, tl INT DEFAULT NULL, user INT NOT NULL, description LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE practica');
        $this->addSql('ALTER TABLE amores CHANGE photo has_photo TINYINT(1) NOT NULL');
    }
}
