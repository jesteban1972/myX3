<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220710183407 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE amores CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE achtung achtung VARCHAR(510) DEFAULT NULL, CHANGE rating rating INT NOT NULL, CHANGE favorite favorite TINYINT(1) DEFAULT NULL, CHANGE genre genre INT NOT NULL, CHANGE description1 description1 VARCHAR(510) NOT NULL, CHANGE photo photo TINYINT(1) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE amores CHANGE id id INT NOT NULL, CHANGE achtung achtung VARCHAR(255) DEFAULT NULL, CHANGE genre genre INT DEFAULT NULL, CHANGE rating rating INT DEFAULT NULL, CHANGE favorite favorite INT DEFAULT NULL, CHANGE description1 description1 VARCHAR(510) DEFAULT NULL, CHANGE photo photo INT DEFAULT NULL');
    }
}
