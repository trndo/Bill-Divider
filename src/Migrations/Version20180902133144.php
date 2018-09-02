<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180902133144 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE receipt ADD visitor_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE receipt ADD CONSTRAINT FK_5399B64570BEE6D FOREIGN KEY (visitor_id) REFERENCES visitors (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5399B64570BEE6D ON receipt (visitor_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE receipt DROP FOREIGN KEY FK_5399B64570BEE6D');
        $this->addSql('DROP INDEX UNIQ_5399B64570BEE6D ON receipt');
        $this->addSql('ALTER TABLE receipt DROP visitor_id');
    }
}
