<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200328110309 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE review_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE recipe_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE review (id INT NOT NULL, recipe_id INT DEFAULT NULL, rating SMALLINT NOT NULL, body TEXT NOT NULL, author VARCHAR(255) NOT NULL, publication_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_794381C659D8A214 ON review (recipe_id)');
        $this->addSql('CREATE TABLE recipe (id INT NOT NULL, title VARCHAR(255) NOT NULL, ingredients TEXT NOT NULL, recipe TEXT NOT NULL, author VARCHAR(255) NOT NULL, publication_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN recipe.ingredients IS \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT FK_794381C659D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE review DROP CONSTRAINT FK_794381C659D8A214');
        $this->addSql('DROP SEQUENCE review_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE recipe_id_seq CASCADE');
        $this->addSql('DROP TABLE review');
        $this->addSql('DROP TABLE recipe');
    }
}
