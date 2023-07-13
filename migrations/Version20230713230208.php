<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230713230208 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offers ADD merchant_id INT NOT NULL');
        $this->addSql('ALTER TABLE offers ADD CONSTRAINT FK_DA4604276796D554 FOREIGN KEY (merchant_id) REFERENCES merchants (id)');
        $this->addSql('CREATE INDEX IDX_DA4604276796D554 ON offers (merchant_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offers DROP FOREIGN KEY FK_DA4604276796D554');
        $this->addSql('DROP INDEX IDX_DA4604276796D554 ON offers');
        $this->addSql('ALTER TABLE offers DROP merchant_id');
    }
}
