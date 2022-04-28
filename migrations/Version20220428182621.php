<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220428182621 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evenement ADD longitude VARCHAR(255) DEFAULT NULL, ADD latitude VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE loc_voiture CHANGE id_voiture id_voiture INT DEFAULT NULL, CHANGE id_pays id_pays INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservationagence CHANGE idU idU INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservationevent CHANGE idU idU INT DEFAULT NULL, CHANGE idEvent idEvent INT DEFAULT NULL');
        $this->addSql('ALTER TABLE taxi CHANGE id_pays id_pays INT DEFAULT NULL');
        $this->addSql('ALTER TABLE taxi_aero CHANGE id_taxi id_taxi INT DEFAULT NULL, CHANGE id_pays id_pays INT DEFAULT NULL');
        $this->addSql('DROP INDEX email ON utilisateur');
        $this->addSql('ALTER TABLE voiture CHANGE id_pays id_pays INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evenement DROP longitude, DROP latitude');
        $this->addSql('ALTER TABLE loc_voiture CHANGE id_pays id_pays INT NOT NULL, CHANGE id_voiture id_voiture INT NOT NULL');
        $this->addSql('ALTER TABLE reservationagence CHANGE idU idU INT NOT NULL');
        $this->addSql('ALTER TABLE reservationevent CHANGE idEvent idEvent INT NOT NULL, CHANGE idU idU INT NOT NULL');
        $this->addSql('ALTER TABLE taxi CHANGE id_pays id_pays INT NOT NULL');
        $this->addSql('ALTER TABLE taxi_aero CHANGE id_pays id_pays INT NOT NULL, CHANGE id_taxi id_taxi INT NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX email ON utilisateur (email)');
        $this->addSql('ALTER TABLE voiture CHANGE id_pays id_pays INT NOT NULL');
    }
}
