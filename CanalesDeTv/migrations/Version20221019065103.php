<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221019065103 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE canal ADD id_empresa_id INT NOT NULL');
        $this->addSql('ALTER TABLE canal ADD CONSTRAINT FK_E181FB59F7949946 FOREIGN KEY (id_empresa_id) REFERENCES empresa (id)');
        $this->addSql('CREATE INDEX IDX_E181FB59F7949946 ON canal (id_empresa_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE canal DROP FOREIGN KEY FK_E181FB59F7949946');
        $this->addSql('DROP INDEX IDX_E181FB59F7949946 ON canal');
        $this->addSql('ALTER TABLE canal DROP id_empresa_id');
    }
}
