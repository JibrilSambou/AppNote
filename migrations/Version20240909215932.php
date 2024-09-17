<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240909215932 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE notes (id INT AUTO_INCREMENT NOT NULL, student_id INT DEFAULT NULL, teachers_id INT DEFAULT NULL, note DOUBLE PRECISION NOT NULL, subject VARCHAR(255) NOT NULL, date_added DATETIME NOT NULL, INDEX IDX_11BA68CCB944F1A (student_id), INDEX IDX_11BA68C84365182 (teachers_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE notes ADD CONSTRAINT FK_11BA68CCB944F1A FOREIGN KEY (student_id) REFERENCES students (id)');
        $this->addSql('ALTER TABLE notes ADD CONSTRAINT FK_11BA68C84365182 FOREIGN KEY (teachers_id) REFERENCES teachers (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE notes DROP FOREIGN KEY FK_11BA68CCB944F1A');
        $this->addSql('ALTER TABLE notes DROP FOREIGN KEY FK_11BA68C84365182');
        $this->addSql('DROP TABLE notes');
    }
}
