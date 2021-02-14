<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210214094314 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE body_part_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE body_sub_parts_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE body_part (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE body_sub_parts (id INT NOT NULL, owner_body_part_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_10A20C05A1C830B0 ON body_sub_parts (owner_body_part_id)');
        $this->addSql('ALTER TABLE body_sub_parts ADD CONSTRAINT FK_10A20C05A1C830B0 FOREIGN KEY (owner_body_part_id) REFERENCES body_part (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE body_sub_parts DROP CONSTRAINT FK_10A20C05A1C830B0');
        $this->addSql('DROP SEQUENCE body_part_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE body_sub_parts_id_seq CASCADE');
        $this->addSql('DROP TABLE body_part');
        $this->addSql('DROP TABLE body_sub_parts');
    }
}
