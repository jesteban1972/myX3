<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220713215727 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE amores (id INT AUTO_INCREMENT NOT NULL, achtung VARCHAR(510) DEFAULT NULL, alias VARCHAR(255) NOT NULL, genre INT NOT NULL, rating INT NOT NULL, favorite TINYINT(1) DEFAULT NULL, description1 VARCHAR(510) NOT NULL, description2 VARCHAR(510) DEFAULT NULL, description3 VARCHAR(510) DEFAULT NULL, description4 VARCHAR(510) DEFAULT NULL, web VARCHAR(255) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, photo TINYINT(1) DEFAULT NULL, phone VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, other VARCHAR(255) DEFAULT NULL, user INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE countries (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, user INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE kinds (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, user INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE loca (id INT AUTO_INCREMENT NOT NULL, achtung VARCHAR(510) DEFAULT NULL, name VARCHAR(255) NOT NULL, rating INT DEFAULT NULL, favorite TINYINT(1) DEFAULT NULL, address VARCHAR(510) DEFAULT NULL, country INT DEFAULT NULL, kind INT DEFAULT NULL, description LONGTEXT DEFAULT NULL, coordinates_exact VARCHAR(255) DEFAULT NULL, coordinates_generic VARCHAR(255) DEFAULT NULL, web VARCHAR(255) DEFAULT NULL, user INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE practica (id INT AUTO_INCREMENT NOT NULL, achtung VARCHAR(510) DEFAULT NULL, name VARCHAR(255) NOT NULL, rating INT DEFAULT NULL, is_favorite TINYINT(1) DEFAULT NULL, locus INT NOT NULL, date DATE NOT NULL, ordinal VARCHAR(2) DEFAULT NULL, description LONGTEXT DEFAULT NULL, tq INT DEFAULT NULL, tl INT DEFAULT NULL, user INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, birthdate DATE NOT NULL, default_genre INT DEFAULT NULL, description1 VARCHAR(255) DEFAULT NULL, description2 VARCHAR(255) DEFAULT NULL, description3 VARCHAR(255) DEFAULT NULL, description4 VARCHAR(255) DEFAULT NULL, gui_language INT DEFAULT NULL, results_per_page INT DEFAULT NULL, lists_order INT DEFAULT NULL, user_kind INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE assignations');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE assignations (id INT NOT NULL, praxis INT NOT NULL, amor INT NOT NULL, user INT NOT NULL) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE amores');
        $this->addSql('DROP TABLE countries');
        $this->addSql('DROP TABLE kinds');
        $this->addSql('DROP TABLE loca');
        $this->addSql('DROP TABLE practica');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
