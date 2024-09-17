<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240819213127 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classes DROP FOREIGN KEY FK_2ED7EC5A40BC2D5');
        $this->addSql('ALTER TABLE classes_support_of_course DROP FOREIGN KEY FK_6A1DDBAD9E225B24');
        $this->addSql('ALTER TABLE classes_support_of_course DROP FOREIGN KEY FK_6A1DDBAD55C30BA9');
        $this->addSql('ALTER TABLE classes_teachers DROP FOREIGN KEY FK_A7F2F9EF84365182');
        $this->addSql('ALTER TABLE classes_teachers DROP FOREIGN KEY FK_A7F2F9EF9E225B24');
        $this->addSql('ALTER TABLE courses DROP FOREIGN KEY FK_A9A55A4C1AD8D010');
        $this->addSql('ALTER TABLE courses DROP FOREIGN KEY FK_A9A55A4C9E225B24');
        $this->addSql('ALTER TABLE courses DROP FOREIGN KEY FK_A9A55A4C598B478B');
        $this->addSql('ALTER TABLE courses DROP FOREIGN KEY FK_A9A55A4C84365182');
        $this->addSql('ALTER TABLE notifications DROP FOREIGN KEY FK_6000B0D384365182');
        $this->addSql('ALTER TABLE notifications DROP FOREIGN KEY FK_6000B0D31AD8D010');
        $this->addSql('ALTER TABLE notifications DROP FOREIGN KEY FK_6000B0D3A76ED395');
        $this->addSql('ALTER TABLE notifications DROP FOREIGN KEY FK_6000B0D341807E1D');
        $this->addSql('ALTER TABLE notifications DROP FOREIGN KEY FK_6000B0D3CB944F1A');
        $this->addSql('ALTER TABLE schedules DROP FOREIGN KEY FK_313BDC8E591CC992');
        $this->addSql('ALTER TABLE schedules DROP FOREIGN KEY FK_313BDC8E84365182');
        $this->addSql('ALTER TABLE students DROP FOREIGN KEY FK_A4698DB2598B478B');
        $this->addSql('ALTER TABLE students DROP FOREIGN KEY FK_A4698DB29E225B24');
        $this->addSql('ALTER TABLE students DROP FOREIGN KEY FK_A4698DB284365182');
        $this->addSql('ALTER TABLE students DROP FOREIGN KEY FK_A4698DB2A76ED395');
        $this->addSql('ALTER TABLE students DROP FOREIGN KEY FK_A4698DB255C30BA9');
        $this->addSql('ALTER TABLE students DROP FOREIGN KEY FK_A4698DB28F5EA509');
        $this->addSql('ALTER TABLE support_of_course DROP FOREIGN KEY FK_B7443F15591CC992');
        $this->addSql('ALTER TABLE support_of_course DROP FOREIGN KEY FK_B7443F1584365182');
        $this->addSql('ALTER TABLE support_of_course DROP FOREIGN KEY FK_B7443F151AD8D010');
        $this->addSql('ALTER TABLE support_of_course DROP FOREIGN KEY FK_B7443F15F9295384');
        $this->addSql('ALTER TABLE teachers DROP FOREIGN KEY FK_ED071FF6116C90BC');
        $this->addSql('ALTER TABLE teachers DROP FOREIGN KEY FK_ED071FF61AD8D010');
        $this->addSql('ALTER TABLE teachers DROP FOREIGN KEY FK_ED071FF6A76ED395');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64941807E1D');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649CB944F1A');
        $this->addSql('DROP TABLE classes');
        $this->addSql('DROP TABLE classes_support_of_course');
        $this->addSql('DROP TABLE classes_teachers');
        $this->addSql('DROP TABLE courses');
        $this->addSql('DROP TABLE notifications');
        $this->addSql('DROP TABLE schedules');
        $this->addSql('DROP TABLE students');
        $this->addSql('DROP TABLE support_of_course');
        $this->addSql('DROP TABLE teachers');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE users');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE classes (id INT AUTO_INCREMENT NOT NULL, schedule_id INT DEFAULT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, level VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_2ED7EC5A40BC2D5 (schedule_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE classes_support_of_course (classes_id INT NOT NULL, support_of_course_id INT NOT NULL, INDEX IDX_6A1DDBAD9E225B24 (classes_id), INDEX IDX_6A1DDBAD55C30BA9 (support_of_course_id), PRIMARY KEY(classes_id, support_of_course_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE classes_teachers (classes_id INT NOT NULL, teachers_id INT NOT NULL, INDEX IDX_A7F2F9EF84365182 (teachers_id), INDEX IDX_A7F2F9EF9E225B24 (classes_id), PRIMARY KEY(classes_id, teachers_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE courses (id INT AUTO_INCREMENT NOT NULL, teachers_id INT DEFAULT NULL, students_id INT DEFAULT NULL, classes_id INT DEFAULT NULL, student_class_id INT DEFAULT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_A9A55A4C1AD8D010 (students_id), INDEX IDX_A9A55A4C9E225B24 (classes_id), INDEX IDX_A9A55A4C598B478B (student_class_id), INDEX IDX_A9A55A4C84365182 (teachers_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE notifications (id INT AUTO_INCREMENT NOT NULL, teachers_id INT DEFAULT NULL, students_id INT DEFAULT NULL, user_id INT DEFAULT NULL, student_id INT DEFAULT NULL, teacher_id INT DEFAULT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, message LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_6000B0D341807E1D (teacher_id), INDEX IDX_6000B0D31AD8D010 (students_id), INDEX IDX_6000B0D3A76ED395 (user_id), INDEX IDX_6000B0D3CB944F1A (student_id), INDEX IDX_6000B0D384365182 (teachers_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE schedules (id INT AUTO_INCREMENT NOT NULL, teachers_id INT DEFAULT NULL, course_id INT DEFAULT NULL, day_week VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, beginning TIME NOT NULL, termination TIME NOT NULL, editable TINYINT(1) NOT NULL, INDEX IDX_313BDC8E84365182 (teachers_id), UNIQUE INDEX UNIQ_313BDC8E591CC992 (course_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE students (id INT AUTO_INCREMENT NOT NULL, teachers_id INT DEFAULT NULL, user_id INT DEFAULT NULL, classe_id INT DEFAULT NULL, support_of_course_id INT DEFAULT NULL, classes_id INT DEFAULT NULL, student_class_id INT DEFAULT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, id_number VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, birthday DATETIME NOT NULL, classe_level VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_A4698DB2598B478B (student_class_id), INDEX IDX_A4698DB284365182 (teachers_id), INDEX IDX_A4698DB255C30BA9 (support_of_course_id), UNIQUE INDEX UNIQ_A4698DB2A76ED395 (user_id), INDEX IDX_A4698DB29E225B24 (classes_id), UNIQUE INDEX UNIQ_A4698DB28F5EA509 (classe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE support_of_course (id INT AUTO_INCREMENT NOT NULL, teachers_id INT DEFAULT NULL, students_id INT DEFAULT NULL, course_id INT DEFAULT NULL, courses_id INT DEFAULT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, fichier_url VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_B7443F151AD8D010 (students_id), INDEX IDX_B7443F15591CC992 (course_id), INDEX IDX_B7443F15F9295384 (courses_id), INDEX IDX_B7443F1584365182 (teachers_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE teachers (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, schedules_id INT DEFAULT NULL, students_id INT DEFAULT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, subject VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_ED071FF61AD8D010 (students_id), UNIQUE INDEX UNIQ_ED071FF6A76ED395 (user_id), INDEX IDX_ED071FF6116C90BC (schedules_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, teacher_id INT DEFAULT NULL, student_id INT DEFAULT NULL, username VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, role LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:array)\', UNIQUE INDEX UNIQ_8D93D64941807E1D (teacher_id), UNIQUE INDEX UNIQ_8D93D649CB944F1A (student_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE classes ADD CONSTRAINT FK_2ED7EC5A40BC2D5 FOREIGN KEY (schedule_id) REFERENCES schedules (id)');
        $this->addSql('ALTER TABLE classes_support_of_course ADD CONSTRAINT FK_6A1DDBAD9E225B24 FOREIGN KEY (classes_id) REFERENCES classes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE classes_support_of_course ADD CONSTRAINT FK_6A1DDBAD55C30BA9 FOREIGN KEY (support_of_course_id) REFERENCES support_of_course (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE classes_teachers ADD CONSTRAINT FK_A7F2F9EF84365182 FOREIGN KEY (teachers_id) REFERENCES teachers (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE classes_teachers ADD CONSTRAINT FK_A7F2F9EF9E225B24 FOREIGN KEY (classes_id) REFERENCES classes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE courses ADD CONSTRAINT FK_A9A55A4C1AD8D010 FOREIGN KEY (students_id) REFERENCES students (id)');
        $this->addSql('ALTER TABLE courses ADD CONSTRAINT FK_A9A55A4C9E225B24 FOREIGN KEY (classes_id) REFERENCES classes (id)');
        $this->addSql('ALTER TABLE courses ADD CONSTRAINT FK_A9A55A4C598B478B FOREIGN KEY (student_class_id) REFERENCES classes (id)');
        $this->addSql('ALTER TABLE courses ADD CONSTRAINT FK_A9A55A4C84365182 FOREIGN KEY (teachers_id) REFERENCES teachers (id)');
        $this->addSql('ALTER TABLE notifications ADD CONSTRAINT FK_6000B0D384365182 FOREIGN KEY (teachers_id) REFERENCES teachers (id)');
        $this->addSql('ALTER TABLE notifications ADD CONSTRAINT FK_6000B0D31AD8D010 FOREIGN KEY (students_id) REFERENCES students (id)');
        $this->addSql('ALTER TABLE notifications ADD CONSTRAINT FK_6000B0D3A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE notifications ADD CONSTRAINT FK_6000B0D341807E1D FOREIGN KEY (teacher_id) REFERENCES teachers (id)');
        $this->addSql('ALTER TABLE notifications ADD CONSTRAINT FK_6000B0D3CB944F1A FOREIGN KEY (student_id) REFERENCES students (id)');
        $this->addSql('ALTER TABLE schedules ADD CONSTRAINT FK_313BDC8E591CC992 FOREIGN KEY (course_id) REFERENCES courses (id)');
        $this->addSql('ALTER TABLE schedules ADD CONSTRAINT FK_313BDC8E84365182 FOREIGN KEY (teachers_id) REFERENCES teachers (id)');
        $this->addSql('ALTER TABLE students ADD CONSTRAINT FK_A4698DB2598B478B FOREIGN KEY (student_class_id) REFERENCES classes (id)');
        $this->addSql('ALTER TABLE students ADD CONSTRAINT FK_A4698DB29E225B24 FOREIGN KEY (classes_id) REFERENCES classes (id)');
        $this->addSql('ALTER TABLE students ADD CONSTRAINT FK_A4698DB284365182 FOREIGN KEY (teachers_id) REFERENCES teachers (id)');
        $this->addSql('ALTER TABLE students ADD CONSTRAINT FK_A4698DB2A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE students ADD CONSTRAINT FK_A4698DB255C30BA9 FOREIGN KEY (support_of_course_id) REFERENCES support_of_course (id)');
        $this->addSql('ALTER TABLE students ADD CONSTRAINT FK_A4698DB28F5EA509 FOREIGN KEY (classe_id) REFERENCES classes (id)');
        $this->addSql('ALTER TABLE support_of_course ADD CONSTRAINT FK_B7443F15591CC992 FOREIGN KEY (course_id) REFERENCES courses (id)');
        $this->addSql('ALTER TABLE support_of_course ADD CONSTRAINT FK_B7443F1584365182 FOREIGN KEY (teachers_id) REFERENCES teachers (id)');
        $this->addSql('ALTER TABLE support_of_course ADD CONSTRAINT FK_B7443F151AD8D010 FOREIGN KEY (students_id) REFERENCES students (id)');
        $this->addSql('ALTER TABLE support_of_course ADD CONSTRAINT FK_B7443F15F9295384 FOREIGN KEY (courses_id) REFERENCES courses (id)');
        $this->addSql('ALTER TABLE teachers ADD CONSTRAINT FK_ED071FF6116C90BC FOREIGN KEY (schedules_id) REFERENCES schedules (id)');
        $this->addSql('ALTER TABLE teachers ADD CONSTRAINT FK_ED071FF61AD8D010 FOREIGN KEY (students_id) REFERENCES students (id)');
        $this->addSql('ALTER TABLE teachers ADD CONSTRAINT FK_ED071FF6A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64941807E1D FOREIGN KEY (teacher_id) REFERENCES teachers (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649CB944F1A FOREIGN KEY (student_id) REFERENCES students (id)');
    }
}
