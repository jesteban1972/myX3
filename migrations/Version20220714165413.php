<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220714165413 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE loca (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, achtung VARCHAR(255) DEFAULT NULL, name VARCHAR(255) NOT NULL, rating INT DEFAULT NULL, is_favorite TINYINT(1) DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, country INT NOT NULL, kind INT NOT NULL, description VARCHAR(255) DEFAULT NULL, coordinates_exact VARCHAR(255) DEFAULT NULL, coordinates_generic VARCHAR(255) DEFAULT NULL, web VARCHAR(255) DEFAULT NULL, INDEX IDX_675A7210A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE practica (id INT AUTO_INCREMENT NOT NULL, locus_id INT NOT NULL, user_id INT NOT NULL, achtung VARCHAR(255) DEFAULT NULL, name VARCHAR(255) NOT NULL, rating INT DEFAULT NULL, is_favorite TINYINT(1) DEFAULT NULL, date DATE NOT NULL, ordinal VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, tq INT DEFAULT NULL, tl INT DEFAULT NULL, INDEX IDX_7881F057C040578A (locus_id), INDEX IDX_7881F057A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, birthdate DATE NOT NULL, default_genre INT DEFAULT NULL, description1 VARCHAR(255) DEFAULT NULL, description2 VARCHAR(255) DEFAULT NULL, description3 VARCHAR(255) DEFAULT NULL, description4 VARCHAR(255) DEFAULT NULL, gui_language INT DEFAULT NULL, results_per_page INT DEFAULT NULL, lists_order INT DEFAULT NULL, user_kind INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE loca ADD CONSTRAINT FK_675A7210A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE practica ADD CONSTRAINT FK_7881F057C040578A FOREIGN KEY (locus_id) REFERENCES loca (id)');
        $this->addSql('ALTER TABLE practica ADD CONSTRAINT FK_7881F057A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE practica DROP FOREIGN KEY FK_7881F057C040578A');
        $this->addSql('ALTER TABLE loca DROP FOREIGN KEY FK_675A7210A76ED395');
        $this->addSql('ALTER TABLE practica DROP FOREIGN KEY FK_7881F057A76ED395');
        $this->addSql('DROP TABLE loca');
        $this->addSql('DROP TABLE practica');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
