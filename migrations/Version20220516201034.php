<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220516201034 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reservationcroisiere (IdReservationCroisiere INT AUTO_INCREMENT NOT NULL, id INT NOT NULL, IdCroisiere INT NOT NULL, PRIMARY KEY(IdReservationCroisiere)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE reservationtaxi');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('ALTER TABLE hotel MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE hotel DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE hotel DROP image, CHANGE id idhotel INT AUTO_INCREMENT NOT NULL, CHANGE adresse_hotel adresse_rest VARCHAR(30) NOT NULL');
        $this->addSql('ALTER TABLE hotel ADD PRIMARY KEY (idhotel)');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955D55632C0');
        $this->addSql('DROP INDEX IDX_42C84955D55632C0 ON reservation');
        $this->addSql('ALTER TABLE reservation ADD type TINYINT(1) NOT NULL, ADD etat VARCHAR(250) NOT NULL, DROP idhotel, DROP nomreservation, DROP date, CHANGE chambreres id_res INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reservationtaxi (id INT AUTO_INCREMENT NOT NULL, id_res INT NOT NULL, type TINYINT(1) NOT NULL, etat VARCHAR(250) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE utilisateur (idU INT AUTO_INCREMENT NOT NULL, num_pass VARCHAR(30) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, nom VARCHAR(30) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, prenom VARCHAR(30) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, adresse VARCHAR(30) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, email VARCHAR(50) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, motpasse VARCHAR(30) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, photo VARCHAR(30) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, role VARCHAR(30) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, PRIMARY KEY(idU)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_swedish_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('DROP TABLE reservationcroisiere');
        $this->addSql('ALTER TABLE hotel MODIFY idhotel INT NOT NULL');
        $this->addSql('ALTER TABLE hotel DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE hotel ADD image VARCHAR(255) NOT NULL, CHANGE idhotel id INT AUTO_INCREMENT NOT NULL, CHANGE adresse_rest adresse_hotel VARCHAR(30) NOT NULL');
        $this->addSql('ALTER TABLE hotel ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE reservation ADD idhotel INT DEFAULT NULL, ADD nomreservation VARCHAR(255) NOT NULL, ADD date DATE NOT NULL, DROP type, DROP etat, CHANGE id_res chambreres INT NOT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955D55632C0 FOREIGN KEY (idhotel) REFERENCES hotel (id)');
        $this->addSql('CREATE INDEX IDX_42C84955D55632C0 ON reservation (idhotel)');
    }
}
