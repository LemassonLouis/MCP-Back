<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220108123515 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE season (id INT AUTO_INCREMENT NOT NULL, sea_name VARCHAR(255) NOT NULL, sea_date_start DATE DEFAULT NULL, sea_date_end DATE DEFAULT NULL, sea_is_archive TINYINT(1) DEFAULT NULL, sea_date_edit DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE season_ingredient (season_id INT NOT NULL, ingredient_id INT NOT NULL, INDEX IDX_5B91B5D74EC001D1 (season_id), INDEX IDX_5B91B5D7933FE08C (ingredient_id), PRIMARY KEY(season_id, ingredient_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE season_ingredient ADD CONSTRAINT FK_5B91B5D74EC001D1 FOREIGN KEY (season_id) REFERENCES season (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE season_ingredient ADD CONSTRAINT FK_5B91B5D7933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE season_ingredient DROP FOREIGN KEY FK_5B91B5D74EC001D1');
        $this->addSql('DROP TABLE season');
        $this->addSql('DROP TABLE season_ingredient');
    }
}
