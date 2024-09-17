<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240916231401 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classes_teachers DROP FOREIGN KEY FK_A7F2F9EF84365182');
        $this->addSql('ALTER TABLE classes_teachers DROP FOREIGN KEY FK_A7F2F9EF9E225B24');
        $this->addSql('DROP TABLE classes_teachers');
        $this->addSql('ALTER TABLE classes DROP FOREIGN KEY FK_2ED7EC584365182');
        $this->addSql('ALTER TABLE classes DROP FOREIGN KEY FK_2ED7EC5D4BE081');
        $this->addSql('ALTER TABLE classes DROP FOREIGN KEY FK_2ED7EC5F9295384');
        $this->addSql('DROP INDEX IDX_2ED7EC5F9295384 ON classes');
        $this->addSql('DROP INDEX IDX_2ED7EC584365182 ON classes');
        $this->addSql('DROP INDEX IDX_2ED7EC5D4BE081 ON classes');
        $this->addSql('ALTER TABLE classes DROP teachers_id, DROP notifications_id, DROP courses_id');
        $this->addSql('ALTER TABLE notes DROP FOREIGN KEY FK_11BA68C84365182');
        $this->addSql('DROP INDEX IDX_11BA68C84365182 ON notes');
        $this->addSql('ALTER TABLE notes CHANGE teachers_id teacher_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE notes ADD CONSTRAINT FK_11BA68C41807E1D FOREIGN KEY (teacher_id) REFERENCES teachers (id)');
        $this->addSql('CREATE INDEX IDX_11BA68C41807E1D ON notes (teacher_id)');
        $this->addSql('ALTER TABLE teachers DROP FOREIGN KEY FK_ED071FF6F9295384');
        $this->addSql('DROP INDEX IDX_ED071FF6F9295384 ON teachers');
        $this->addSql('ALTER TABLE teachers DROP courses_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE classes_teachers (classes_id INT NOT NULL, teachers_id INT NOT NULL, INDEX IDX_A7F2F9EF9E225B24 (classes_id), INDEX IDX_A7F2F9EF84365182 (teachers_id), PRIMARY KEY(classes_id, teachers_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE classes_teachers ADD CONSTRAINT FK_A7F2F9EF84365182 FOREIGN KEY (teachers_id) REFERENCES teachers (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE classes_teachers ADD CONSTRAINT FK_A7F2F9EF9E225B24 FOREIGN KEY (classes_id) REFERENCES classes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE classes ADD teachers_id INT DEFAULT NULL, ADD notifications_id INT DEFAULT NULL, ADD courses_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE classes ADD CONSTRAINT FK_2ED7EC584365182 FOREIGN KEY (teachers_id) REFERENCES teachers (id)');
        $this->addSql('ALTER TABLE classes ADD CONSTRAINT FK_2ED7EC5D4BE081 FOREIGN KEY (notifications_id) REFERENCES notifications (id)');
        $this->addSql('ALTER TABLE classes ADD CONSTRAINT FK_2ED7EC5F9295384 FOREIGN KEY (courses_id) REFERENCES courses (id)');
        $this->addSql('CREATE INDEX IDX_2ED7EC5F9295384 ON classes (courses_id)');
        $this->addSql('CREATE INDEX IDX_2ED7EC584365182 ON classes (teachers_id)');
        $this->addSql('CREATE INDEX IDX_2ED7EC5D4BE081 ON classes (notifications_id)');
        $this->addSql('ALTER TABLE notes DROP FOREIGN KEY FK_11BA68C41807E1D');
        $this->addSql('DROP INDEX IDX_11BA68C41807E1D ON notes');
        $this->addSql('ALTER TABLE notes CHANGE teacher_id teachers_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE notes ADD CONSTRAINT FK_11BA68C84365182 FOREIGN KEY (teachers_id) REFERENCES teachers (id)');
        $this->addSql('CREATE INDEX IDX_11BA68C84365182 ON notes (teachers_id)');
        $this->addSql('ALTER TABLE teachers ADD courses_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE teachers ADD CONSTRAINT FK_ED071FF6F9295384 FOREIGN KEY (courses_id) REFERENCES courses (id)');
        $this->addSql('CREATE INDEX IDX_ED071FF6F9295384 ON teachers (courses_id)');
    }
}
