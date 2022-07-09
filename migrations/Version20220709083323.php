<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220709083323 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE countries (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, user INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE kinds (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, user INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE loca (id INT AUTO_INCREMENT NOT NULL, achtung VARCHAR(510) DEFAULT NULL, name VARCHAR(255) NOT NULL, rating INT DEFAULT NULL, favorite TINYINT(1) DEFAULT NULL, address VARCHAR(510) DEFAULT NULL, country INT DEFAULT NULL, kind INT DEFAULT NULL, description LONGTEXT DEFAULT NULL, coordinates_exact VARCHAR(255) DEFAULT NULL, coordinates_generic VARCHAR(255) DEFAULT NULL, web VARCHAR(255) DEFAULT NULL, user INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, birthdate DATE NOT NULL, default_genre INT DEFAULT NULL, description1 VARCHAR(255) DEFAULT NULL, description2 VARCHAR(255) DEFAULT NULL, description3 VARCHAR(255) DEFAULT NULL, description4 VARCHAR(255) DEFAULT NULL, gui_language INT DEFAULT NULL, results_per_page INT DEFAULT NULL, lists_order INT DEFAULT NULL, user_kind INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE amores CHANGE achtung achtung VARCHAR(510) DEFAULT NULL');
        $this->addSql('ALTER TABLE practica CHANGE achtung achtung VARCHAR(510) DEFAULT NULL, CHANGE rating rating INT DEFAULT NULL, CHANGE description description LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE countries');
        $this->addSql('DROP TABLE kinds');
        $this->addSql('DROP TABLE loca');
        $this->addSql('DROP TABLE users');
        $this->addSql('ALTER TABLE amores CHANGE achtung achtung VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE practica CHANGE achtung achtung VARCHAR(765) DEFAULT NULL, CHANGE rating rating INT NOT NULL, CHANGE description description LONGTEXT NOT NULL');
    }
}
