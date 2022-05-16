<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220515190818 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE croisiere (idCroisiere INT AUTO_INCREMENT NOT NULL, refBateau VARCHAR(30) NOT NULL, compagnieNavigation VARCHAR(30) NOT NULL, portDepart VARCHAR(30) NOT NULL, portArrive VARCHAR(30) NOT NULL, dateDepart DATE NOT NULL, dateArrivee DATE NOT NULL, nbCabines INT NOT NULL, prixCroisiere DOUBLE PRECISION NOT NULL, PRIMARY KEY(idCroisiere)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenement (IdEvent INT AUTO_INCREMENT NOT NULL, intitule VARCHAR(20) NOT NULL, paysEvent VARCHAR(20) NOT NULL, adresse VARCHAR(20) NOT NULL, dateEvent DATE NOT NULL, typeEvent VARCHAR(255) NOT NULL, photo VARCHAR(255) NOT NULL, prix DOUBLE PRECISION NOT NULL, longitude VARCHAR(255) DEFAULT NULL, latitude VARCHAR(255) DEFAULT NULL, PRIMARY KEY(IdEvent)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hotel (idhotel INT AUTO_INCREMENT NOT NULL, nom_hotel VARCHAR(15) NOT NULL, nbetoile INT NOT NULL, nbchambre INT NOT NULL, nbrestaurant INT NOT NULL, nbpiscine INT NOT NULL, adresse_rest VARCHAR(30) NOT NULL, villehotel VARCHAR(30) NOT NULL, PRIMARY KEY(idhotel)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE loc_voiture (id INT AUTO_INCREMENT NOT NULL, id_voiture INT DEFAULT NULL, id_pays INT DEFAULT NULL, date_res DATE NOT NULL, duree_res INT NOT NULL, remise TINYINT(1) NOT NULL, taux_remise INT NOT NULL, INDEX fk_const_voiture (id_voiture), INDEX fk_const_pays (id_pays), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pays (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, id_res INT NOT NULL, type TINYINT(1) NOT NULL, etat VARCHAR(250) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservationagence (id_reservation INT AUTO_INCREMENT NOT NULL, id INT DEFAULT NULL, nom_hotel_rest VARCHAR(30) NOT NULL, date_reservation DATE NOT NULL, id_hotel_rest INT NOT NULL, INDEX fk_res_agence (id), PRIMARY KEY(id_reservation)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservationcroisiere (IdReservationCroisiere INT AUTO_INCREMENT NOT NULL, id INT NOT NULL, IdCroisiere INT NOT NULL, PRIMARY KEY(IdReservationCroisiere)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservationevent (ide INT AUTO_INCREMENT NOT NULL, id INT DEFAULT NULL, dateevent DATE NOT NULL, idEvent INT DEFAULT NULL, INDEX fk_idEvent (idEvent), INDEX fk_id (id), PRIMARY KEY(ide)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservationvol (idReservationVol INT AUTO_INCREMENT NOT NULL, idU INT NOT NULL, idVol INT NOT NULL, INDEX fk_reservationVol_utilisateur (idU), INDEX fk_reservationVol_vol (idVol), PRIMARY KEY(idReservationVol)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reset_password_request (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, selector VARCHAR(20) NOT NULL, hashed_token VARCHAR(100) NOT NULL, requested_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', expires_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_7CE748AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE restaurant (id_rest INT AUTO_INCREMENT NOT NULL, nom_rest VARCHAR(15) NOT NULL, numtel_rest BIGINT NOT NULL, adresse_rest VARCHAR(30) NOT NULL, ville_rest VARCHAR(15) NOT NULL, nbtable_rest INT NOT NULL, type_rest VARCHAR(15) NOT NULL, PRIMARY KEY(id_rest)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE taxi (id INT AUTO_INCREMENT NOT NULL, id_pays INT DEFAULT NULL, matricule VARCHAR(250) NOT NULL, prix DOUBLE PRECISION NOT NULL, INDEX fsd (id_pays), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE taxi_aero (id INT AUTO_INCREMENT NOT NULL, id_taxi INT DEFAULT NULL, id_pays INT DEFAULT NULL, heure VARCHAR(200) NOT NULL, INDEX fk_taxi (id_taxi), INDEX fk_pays (id_pays), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ticket (idticket INT AUTO_INCREMENT NOT NULL, prix_tick DOUBLE PRECISION NOT NULL, date_tick VARCHAR(20) NOT NULL, idEvent INT NOT NULL, id INT NOT NULL, INDEX fk_ticket_user (id), INDEX fk_ticket_event (idEvent), PRIMARY KEY(idticket)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voiture (id INT AUTO_INCREMENT NOT NULL, id_pays INT DEFAULT NULL, model VARCHAR(100) NOT NULL, type VARCHAR(100) NOT NULL, prix DOUBLE PRECISION NOT NULL, INDEX sqdf (id_pays), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vol (idVol INT AUTO_INCREMENT NOT NULL, refAvion VARCHAR(30) NOT NULL, compagnieAerienne VARCHAR(30) NOT NULL, aeroDepart VARCHAR(30) NOT NULL, aeroArrive VARCHAR(30) NOT NULL, dateDepart DATE NOT NULL, duree DOUBLE PRECISION NOT NULL, nbSieges INT NOT NULL, prix DOUBLE PRECISION NOT NULL, PRIMARY KEY(idVol)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE loc_voiture ADD CONSTRAINT FK_8CC3E894377F287F FOREIGN KEY (id_voiture) REFERENCES voiture (id)');
        $this->addSql('ALTER TABLE loc_voiture ADD CONSTRAINT FK_8CC3E894BFBF20AC FOREIGN KEY (id_pays) REFERENCES pays (id)');
        $this->addSql('ALTER TABLE reservationagence ADD CONSTRAINT FK_AD86A692BF396750 FOREIGN KEY (id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE reservationevent ADD CONSTRAINT FK_70B2B7D4BF396750 FOREIGN KEY (id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE reservationevent ADD CONSTRAINT FK_70B2B7D42C6A49BA FOREIGN KEY (idEvent) REFERENCES evenement (IdEvent)');
        $this->addSql('ALTER TABLE reset_password_request ADD CONSTRAINT FK_7CE748AA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE taxi ADD CONSTRAINT FK_5F8463C2BFBF20AC FOREIGN KEY (id_pays) REFERENCES pays (id)');
        $this->addSql('ALTER TABLE taxi_aero ADD CONSTRAINT FK_10BA4086D4A47FC0 FOREIGN KEY (id_taxi) REFERENCES taxi (id)');
        $this->addSql('ALTER TABLE taxi_aero ADD CONSTRAINT FK_10BA4086BFBF20AC FOREIGN KEY (id_pays) REFERENCES pays (id)');
        $this->addSql('ALTER TABLE voiture ADD CONSTRAINT FK_E9E2810FBFBF20AC FOREIGN KEY (id_pays) REFERENCES pays (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservationevent DROP FOREIGN KEY FK_70B2B7D42C6A49BA');
        $this->addSql('ALTER TABLE loc_voiture DROP FOREIGN KEY FK_8CC3E894BFBF20AC');
        $this->addSql('ALTER TABLE taxi DROP FOREIGN KEY FK_5F8463C2BFBF20AC');
        $this->addSql('ALTER TABLE taxi_aero DROP FOREIGN KEY FK_10BA4086BFBF20AC');
        $this->addSql('ALTER TABLE voiture DROP FOREIGN KEY FK_E9E2810FBFBF20AC');
        $this->addSql('ALTER TABLE taxi_aero DROP FOREIGN KEY FK_10BA4086D4A47FC0');
        $this->addSql('ALTER TABLE reservationagence DROP FOREIGN KEY FK_AD86A692BF396750');
        $this->addSql('ALTER TABLE reservationevent DROP FOREIGN KEY FK_70B2B7D4BF396750');
        $this->addSql('ALTER TABLE reset_password_request DROP FOREIGN KEY FK_7CE748AA76ED395');
        $this->addSql('ALTER TABLE loc_voiture DROP FOREIGN KEY FK_8CC3E894377F287F');
        $this->addSql('DROP TABLE croisiere');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('DROP TABLE hotel');
        $this->addSql('DROP TABLE loc_voiture');
        $this->addSql('DROP TABLE pays');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE reservationagence');
        $this->addSql('DROP TABLE reservationcroisiere');
        $this->addSql('DROP TABLE reservationevent');
        $this->addSql('DROP TABLE reservationvol');
        $this->addSql('DROP TABLE reset_password_request');
        $this->addSql('DROP TABLE restaurant');
        $this->addSql('DROP TABLE taxi');
        $this->addSql('DROP TABLE taxi_aero');
        $this->addSql('DROP TABLE ticket');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE voiture');
        $this->addSql('DROP TABLE vol');
    }
}
