<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220713221217 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE amores CHANGE photo has_photo TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE loca CHANGE favorite is_favorite TINYINT(1) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE amores CHANGE has_photo photo TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE loca CHANGE is_favorite favorite TINYINT(1) DEFAULT NULL');
    }
}
