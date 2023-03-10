<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230310051447 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE environnement (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE visite (id INT AUTO_INCREMENT NOT NULL, ville VARCHAR(50) NOT NULL, pays VARCHAR(50) NOT NULL, datecreation DATE DEFAULT NULL, note INT DEFAULT NULL, avis LONGTEXT DEFAULT NULL, tempmin INT DEFAULT NULL, tempmax INT DEFAULT NULL, image_name VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE visite_environnement (visite_id INT NOT NULL, environnement_id INT NOT NULL, INDEX IDX_6690F746C1C5DC59 (visite_id), INDEX IDX_6690F746BAFB82A1 (environnement_id), PRIMARY KEY(visite_id, environnement_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE visite_environnement ADD CONSTRAINT FK_6690F746C1C5DC59 FOREIGN KEY (visite_id) REFERENCES visite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE visite_environnement ADD CONSTRAINT FK_6690F746BAFB82A1 FOREIGN KEY (environnement_id) REFERENCES environnement (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE visite_environnement DROP FOREIGN KEY FK_6690F746BAFB82A1');
        $this->addSql('ALTER TABLE visite_environnement DROP FOREIGN KEY FK_6690F746C1C5DC59');
        $this->addSql('DROP TABLE environnement');
        $this->addSql('DROP TABLE visite');
        $this->addSql('DROP TABLE visite_environnement');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
