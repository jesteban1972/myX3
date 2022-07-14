<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220714183338 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE assignation DROP FOREIGN KEY FK_D2A03CE047931002');
        $this->addSql('CREATE TABLE amores (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, achtung VARCHAR(255) DEFAULT NULL, alias VARCHAR(255) NOT NULL, rating INT NOT NULL, is_favorite TINYINT(1) DEFAULT NULL, genre INT NOT NULL, description1 VARCHAR(255) NOT NULL, description2 VARCHAR(255) DEFAULT NULL, description3 VARCHAR(255) DEFAULT NULL, description4 VARCHAR(255) DEFAULT NULL, web VARCHAR(255) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, has_photo TINYINT(1) DEFAULT NULL, phone VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, other VARCHAR(255) DEFAULT NULL, INDEX IDX_F67E2AAFA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE assignations (id INT AUTO_INCREMENT NOT NULL, amor_id INT NOT NULL, praxis_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_BBD68D4F47931002 (amor_id), INDEX IDX_BBD68D4F46C78F07 (praxis_id), INDEX IDX_BBD68D4FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE amores ADD CONSTRAINT FK_F67E2AAFA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE assignations ADD CONSTRAINT FK_BBD68D4F47931002 FOREIGN KEY (amor_id) REFERENCES amores (id)');
        $this->addSql('ALTER TABLE assignations ADD CONSTRAINT FK_BBD68D4F46C78F07 FOREIGN KEY (praxis_id) REFERENCES practica (id)');
        $this->addSql('ALTER TABLE assignations ADD CONSTRAINT FK_BBD68D4FA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('DROP TABLE amor');
        $this->addSql('DROP TABLE assignation');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE assignations DROP FOREIGN KEY FK_BBD68D4F47931002');
        $this->addSql('CREATE TABLE amor (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, achtung VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, alias VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, rating INT NOT NULL, is_favorite TINYINT(1) DEFAULT NULL, genre INT NOT NULL, description1 VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description2 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, description3 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, description4 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, web VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, has_photo TINYINT(1) DEFAULT NULL, phone VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, email VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, other VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_BEBF7071A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE assignation (id INT AUTO_INCREMENT NOT NULL, amor_id INT NOT NULL, praxis_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_D2A03CE0A76ED395 (user_id), INDEX IDX_D2A03CE047931002 (amor_id), INDEX IDX_D2A03CE046C78F07 (praxis_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE amor ADD CONSTRAINT FK_BEBF7071A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE assignation ADD CONSTRAINT FK_D2A03CE046C78F07 FOREIGN KEY (praxis_id) REFERENCES practica (id)');
        $this->addSql('ALTER TABLE assignation ADD CONSTRAINT FK_D2A03CE0A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE assignation ADD CONSTRAINT FK_D2A03CE047931002 FOREIGN KEY (amor_id) REFERENCES amor (id)');
        $this->addSql('DROP TABLE amores');
        $this->addSql('DROP TABLE assignations');
    }
}
