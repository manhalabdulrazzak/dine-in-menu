<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220420043917 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE order_details (id INT AUTO_INCREMENT NOT NULL, binded_order_id INT NOT NULL, product VARCHAR(255) NOT NULL, quantity INT NOT NULL, price DOUBLE PRECISION NOT NULL, total DOUBLE PRECISION NOT NULL, INDEX IDX_845CA2C17C78A4E3 (binded_order_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE order_details ADD CONSTRAINT FK_845CA2C17C78A4E3 FOREIGN KEY (binded_order_id) REFERENCES `order` (id)');
        $this->addSql('ALTER TABLE address CHANGE user_id user_id INT NOT NULL, CHANGE company company VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE `order` ADD carrier_name VARCHAR(255) NOT NULL, ADD carrier_price VARCHAR(255) NOT NULL, ADD delivery LONGTEXT NOT NULL, ADD is_paid TINYINT(1) NOT NULL, CHANGE user_id user_id INT NOT NULL, CHANGE created_at created_at DATETIME NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE order_details');
        $this->addSql('ALTER TABLE address CHANGE user_id user_id INT DEFAULT NULL, CHANGE company company VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE `order` DROP carrier_name, DROP carrier_price, DROP delivery, DROP is_paid, CHANGE user_id user_id INT DEFAULT NULL, CHANGE created_at created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }
}
