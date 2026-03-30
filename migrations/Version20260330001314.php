<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260330001314 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE product_history (id INT AUTO_INCREMENT NOT NULL, quantity INT NOT NULL, created_at DATETIME NOT NULL, product_id INT NOT NULL, INDEX IDX_F6636BFB4584665A (product_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE product_history ADD CONSTRAINT FK_F6636BFB4584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE add_product_history DROP FOREIGN KEY `FK_EDEB7BDE4584665A`');
        $this->addSql('DROP TABLE add_product_history');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE add_product_history (id INT AUTO_INCREMENT NOT NULL, qte INT NOT NULL, created_at DATETIME NOT NULL, product_id INT NOT NULL, INDEX IDX_EDEB7BDE4584665A (product_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE add_product_history ADD CONSTRAINT `FK_EDEB7BDE4584665A` FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE product_history DROP FOREIGN KEY FK_F6636BFB4584665A');
        $this->addSql('DROP TABLE product_history');
    }
}
