<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260329233315 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE order_product (id INT AUTO_INCREMENT NOT NULL, quantity INT NOT NULL, _order_id INT DEFAULT NULL, product_id INT DEFAULT NULL, INDEX IDX_2530ADE6A35F2858 (_order_id), INDEX IDX_2530ADE64584665A (product_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE order_product ADD CONSTRAINT FK_2530ADE6A35F2858 FOREIGN KEY (_order_id) REFERENCES `order` (id)');
        $this->addSql('ALTER TABLE order_product ADD CONSTRAINT FK_2530ADE64584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE `order` ADD email VARCHAR(255) NOT NULL, ADD created_at DATETIME NOT NULL, ADD paid_on_delivery TINYINT NOT NULL, ADD total_price DOUBLE PRECISION NOT NULL, ADD is_completed TINYINT DEFAULT NULL, ADD is_payment_completed TINYINT NOT NULL, CHANGE adresse address VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_product DROP FOREIGN KEY FK_2530ADE6A35F2858');
        $this->addSql('ALTER TABLE order_product DROP FOREIGN KEY FK_2530ADE64584665A');
        $this->addSql('DROP TABLE order_product');
        $this->addSql('ALTER TABLE `order` ADD adresse VARCHAR(255) NOT NULL, DROP address, DROP email, DROP created_at, DROP paid_on_delivery, DROP total_price, DROP is_completed, DROP is_payment_completed');
    }
}
