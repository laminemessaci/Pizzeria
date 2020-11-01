<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201029165440 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE supplement (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prix DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE supplement_commandes (supplement_id INT NOT NULL, commandes_id INT NOT NULL, INDEX IDX_575DB7F07793FA21 (supplement_id), INDEX IDX_575DB7F08BF5C2E6 (commandes_id), PRIMARY KEY(supplement_id, commandes_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE supplement_commandes ADD CONSTRAINT FK_575DB7F07793FA21 FOREIGN KEY (supplement_id) REFERENCES supplement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE supplement_commandes ADD CONSTRAINT FK_575DB7F08BF5C2E6 FOREIGN KEY (commandes_id) REFERENCES commandes (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE supplement_commandes DROP FOREIGN KEY FK_575DB7F07793FA21');
        $this->addSql('DROP TABLE supplement');
        $this->addSql('DROP TABLE supplement_commandes');
    }
}
