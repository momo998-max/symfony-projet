<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200704101641 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE batiment (id INT AUTO_INCREMENT NOT NULL, nom_batiment VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chambre (id INT AUTO_INCREMENT NOT NULL, batiment_id INT DEFAULT NULL, type_chambre VARCHAR(255) NOT NULL, INDEX IDX_C509E4FFD6F6891B (batiment_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etudiant (id INT AUTO_INCREMENT NOT NULL, type_etudiant_id INT DEFAULT NULL, chambre_id INT DEFAULT NULL, matricule_etudiant VARCHAR(255) NOT NULL, prenom_etudiant VARCHAR(255) NOT NULL, nom_etudiant VARCHAR(255) NOT NULL, mail_etudiant VARCHAR(255) NOT NULL, tel_etudiant INT NOT NULL, naissance_etudiant DATE NOT NULL, INDEX IDX_717E22E396F36632 (type_etudiant_id), INDEX IDX_717E22E39B177F54 (chambre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_etudiant (id INT AUTO_INCREMENT NOT NULL, nom_type_etudiant VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE chambre ADD CONSTRAINT FK_C509E4FFD6F6891B FOREIGN KEY (batiment_id) REFERENCES batiment (id)');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E396F36632 FOREIGN KEY (type_etudiant_id) REFERENCES type_etudiant (id)');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E39B177F54 FOREIGN KEY (chambre_id) REFERENCES chambre (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chambre DROP FOREIGN KEY FK_C509E4FFD6F6891B');
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY FK_717E22E39B177F54');
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY FK_717E22E396F36632');
        $this->addSql('DROP TABLE batiment');
        $this->addSql('DROP TABLE chambre');
        $this->addSql('DROP TABLE etudiant');
        $this->addSql('DROP TABLE type_etudiant');
    }
}
