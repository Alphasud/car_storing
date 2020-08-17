<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200817093509 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE parking_space DROP FOREIGN KEY FK_E00675CCF17B2DD');
        $this->addSql('DROP INDEX UNIQ_E00675CCF17B2DD ON parking_space');
        $this->addSql('ALTER TABLE parking_space ADD parking_spaces_id INT DEFAULT NULL, DROP parking_id');
        $this->addSql('ALTER TABLE parking_space ADD CONSTRAINT FK_E00675CC593F72B7 FOREIGN KEY (parking_spaces_id) REFERENCES parking (id)');
        $this->addSql('CREATE INDEX IDX_E00675CC593F72B7 ON parking_space (parking_spaces_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE parking_space DROP FOREIGN KEY FK_E00675CC593F72B7');
        $this->addSql('DROP INDEX IDX_E00675CC593F72B7 ON parking_space');
        $this->addSql('ALTER TABLE parking_space ADD parking_id INT NOT NULL, DROP parking_spaces_id');
        $this->addSql('ALTER TABLE parking_space ADD CONSTRAINT FK_E00675CCF17B2DD FOREIGN KEY (parking_id) REFERENCES parking (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E00675CCF17B2DD ON parking_space (parking_id)');
    }
}
