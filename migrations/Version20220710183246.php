<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220710183246 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE assignations');
        $this->addSql('ALTER TABLE amores DROP FOREIGN KEY amores_user_fk');
        $this->addSql('DROP INDEX alias ON amores');
        $this->addSql('DROP INDEX amores_user_fk ON amores');
        $this->addSql('ALTER TABLE amores CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE achtung achtung VARCHAR(510) DEFAULT NULL, CHANGE rating rating INT NOT NULL, CHANGE favorite favorite TINYINT(1) DEFAULT NULL, CHANGE genre genre INT NOT NULL, CHANGE description1 description1 VARCHAR(510) NOT NULL, CHANGE photo photo TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE assignations (id INT NOT NULL, praxis INT NOT NULL, amor INT NOT NULL, user INT NOT NULL, INDEX assignations_user_fk (user), INDEX assignations_praxis_fk (praxis), INDEX assignations_amor_fk (amor), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE assignations ADD CONSTRAINT assignations_amor_fk FOREIGN KEY (amor) REFERENCES amores (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE assignations ADD CONSTRAINT assignations_user_fk FOREIGN KEY (user) REFERENCES users (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE assignations ADD CONSTRAINT assignations_praxis_fk FOREIGN KEY (praxis) REFERENCES practica (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE amores CHANGE id id INT NOT NULL, CHANGE achtung achtung VARCHAR(255) DEFAULT NULL, CHANGE genre genre INT DEFAULT NULL, CHANGE rating rating INT DEFAULT NULL, CHANGE favorite favorite INT DEFAULT NULL, CHANGE description1 description1 VARCHAR(510) DEFAULT NULL, CHANGE photo photo INT DEFAULT NULL');
        $this->addSql('ALTER TABLE amores ADD CONSTRAINT amores_user_fk FOREIGN KEY (user) REFERENCES users (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('CREATE INDEX alias ON amores (alias)');
        $this->addSql('CREATE INDEX amores_user_fk ON amores (user)');
    }
}
