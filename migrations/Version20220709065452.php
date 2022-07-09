<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220709065452 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE assignations DROP FOREIGN KEY assignations_amor_fk');
        $this->addSql('ALTER TABLE loca DROP FOREIGN KEY loca_country_fk');
        $this->addSql('ALTER TABLE loca DROP FOREIGN KEY loca_kind_fk');
        $this->addSql('ALTER TABLE practica DROP FOREIGN KEY practica_locus_fk');
        $this->addSql('ALTER TABLE assignations DROP FOREIGN KEY assignations_praxis_fk');
        $this->addSql('ALTER TABLE amores DROP FOREIGN KEY amores_user_fk');
        $this->addSql('ALTER TABLE assignations DROP FOREIGN KEY assignations_user_fk');
        $this->addSql('ALTER TABLE countries DROP FOREIGN KEY countries_user_fk');
        $this->addSql('ALTER TABLE kinds DROP FOREIGN KEY kinds_user_fk');
        $this->addSql('ALTER TABLE loca DROP FOREIGN KEY loca_user_fk');
        $this->addSql('ALTER TABLE practica DROP FOREIGN KEY practica_user_fk');
        $this->addSql('ALTER TABLE queries DROP FOREIGN KEY queries_user_fk');
        $this->addSql('ALTER TABLE usersLoggedIn DROP FOREIGN KEY usersLoggedIn_user_fk');
        $this->addSql('CREATE TABLE praxis (id INT AUTO_INCREMENT NOT NULL, achtung VARCHAR(765) DEFAULT NULL, name VARCHAR(255) NOT NULL, rating INT NOT NULL, is_favorite TINYINT(1) DEFAULT NULL, locus INT NOT NULL, date DATE NOT NULL, ordinal VARCHAR(2) DEFAULT NULL, descr LONGTEXT DEFAULT NULL, tq INT DEFAULT NULL, tl INT DEFAULT NULL, user INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE amores');
        $this->addSql('DROP TABLE assignations');
        $this->addSql('DROP TABLE countries');
        $this->addSql('DROP TABLE kinds');
        $this->addSql('DROP TABLE loca');
        $this->addSql('DROP TABLE practica');
        $this->addSql('DROP TABLE queries');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE usersLoggedIn');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE amores (id INT NOT NULL, user INT NOT NULL, achtung VARCHAR(255) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, alias VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, rating INT DEFAULT NULL, genre INT DEFAULT NULL, descr1 VARCHAR(510) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, descr2 VARCHAR(510) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, descr3 VARCHAR(510) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, descr4 VARCHAR(510) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, web VARCHAR(255) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, name VARCHAR(255) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, photo INT DEFAULT NULL, phone VARCHAR(255) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, email VARCHAR(255) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, other VARCHAR(255) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, INDEX alias (alias), INDEX amores_user_fk (user), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE assignations (id INT NOT NULL, praxis INT NOT NULL, amor INT NOT NULL, user INT NOT NULL, INDEX assignations_user_fk (user), INDEX assignations_praxis_fk (praxis), INDEX assignations_amor_fk (amor), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE countries (id INT NOT NULL, user INT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, INDEX countries_user_fk (user), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE kinds (id INT NOT NULL, user INT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, INDEX kinds_user_fk (user), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE loca (id INT NOT NULL, country INT DEFAULT NULL, kind INT DEFAULT NULL, user INT NOT NULL, achtung VARCHAR(255) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, name VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, rating INT DEFAULT NULL, address VARCHAR(255) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, descr MEDIUMTEXT CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, coordExact VARCHAR(255) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, coordGeneric VARCHAR(255) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, web VARCHAR(255) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, INDEX loca_kind_fk (kind), INDEX loca_user_fk (user), INDEX name (name), INDEX loca_country_fk (country), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE practica (id INT NOT NULL, locus INT NOT NULL, user INT NOT NULL, achtung VARCHAR(765) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, name VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, rating INT DEFAULT NULL, favorite INT DEFAULT NULL, date DATE NOT NULL, ordinal VARCHAR(1) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, descr MEDIUMTEXT CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, tq INT DEFAULT NULL, tl INT DEFAULT NULL, INDEX practica_locus_fk (locus), INDEX practica_user_fk (user), INDEX date (date, ordinal), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE queries (id INT NOT NULL, user INT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, descr VARCHAR(510) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, queryString VARCHAR(510) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, INDEX queries_user_fk (user), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE users (id INT NOT NULL, username VARCHAR(16) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, password VARCHAR(50) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, email VARCHAR(250) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, birthdate DATE NOT NULL, defaultGenre INT DEFAULT NULL, descr1 VARCHAR(255) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, descr2 VARCHAR(255) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, descr3 VARCHAR(255) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, descr4 VARCHAR(255) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, GUILang INT DEFAULT 1, resultsPerPage INT DEFAULT 25, listsOrder INT DEFAULT 1, userKind INT DEFAULT 2, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE usersLoggedIn (user INT NOT NULL, sessionID VARCHAR(100) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, lastUpdate DATETIME NOT NULL, INDEX usersLoggedIn_user_fk (user), PRIMARY KEY(sessionID)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE amores ADD CONSTRAINT amores_user_fk FOREIGN KEY (user) REFERENCES users (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE assignations ADD CONSTRAINT assignations_amor_fk FOREIGN KEY (amor) REFERENCES amores (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE assignations ADD CONSTRAINT assignations_user_fk FOREIGN KEY (user) REFERENCES users (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE assignations ADD CONSTRAINT assignations_praxis_fk FOREIGN KEY (praxis) REFERENCES practica (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE countries ADD CONSTRAINT countries_user_fk FOREIGN KEY (user) REFERENCES users (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE kinds ADD CONSTRAINT kinds_user_fk FOREIGN KEY (user) REFERENCES users (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE loca ADD CONSTRAINT loca_country_fk FOREIGN KEY (country) REFERENCES countries (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE loca ADD CONSTRAINT loca_user_fk FOREIGN KEY (user) REFERENCES users (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE loca ADD CONSTRAINT loca_kind_fk FOREIGN KEY (kind) REFERENCES kinds (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE practica ADD CONSTRAINT practica_locus_fk FOREIGN KEY (locus) REFERENCES loca (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE practica ADD CONSTRAINT practica_user_fk FOREIGN KEY (user) REFERENCES users (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE queries ADD CONSTRAINT queries_user_fk FOREIGN KEY (user) REFERENCES users (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE usersLoggedIn ADD CONSTRAINT usersLoggedIn_user_fk FOREIGN KEY (user) REFERENCES users (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('DROP TABLE praxis');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
