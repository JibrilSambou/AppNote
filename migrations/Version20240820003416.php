<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240820003416 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE classes_teachers (classes_id INT NOT NULL, teachers_id INT NOT NULL, INDEX IDX_A7F2F9EF9E225B24 (classes_id), INDEX IDX_A7F2F9EF84365182 (teachers_id), PRIMARY KEY(classes_id, teachers_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE courses_students (courses_id INT NOT NULL, students_id INT NOT NULL, INDEX IDX_5D696B20F9295384 (courses_id), INDEX IDX_5D696B201AD8D010 (students_id), PRIMARY KEY(courses_id, students_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE courses_support_of_course (courses_id INT NOT NULL, support_of_course_id INT NOT NULL, INDEX IDX_2405319AF9295384 (courses_id), INDEX IDX_2405319A55C30BA9 (support_of_course_id), PRIMARY KEY(courses_id, support_of_course_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE support_of_course_teachers (support_of_course_id INT NOT NULL, teachers_id INT NOT NULL, INDEX IDX_CEF66EDE55C30BA9 (support_of_course_id), INDEX IDX_CEF66EDE84365182 (teachers_id), PRIMARY KEY(support_of_course_id, teachers_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE support_of_course_classes (support_of_course_id INT NOT NULL, classes_id INT NOT NULL, INDEX IDX_2AFBE93255C30BA9 (support_of_course_id), INDEX IDX_2AFBE9329E225B24 (classes_id), PRIMARY KEY(support_of_course_id, classes_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE teachers_students (teachers_id INT NOT NULL, students_id INT NOT NULL, INDEX IDX_A5A3679784365182 (teachers_id), INDEX IDX_A5A367971AD8D010 (students_id), PRIMARY KEY(teachers_id, students_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE classes_teachers ADD CONSTRAINT FK_A7F2F9EF9E225B24 FOREIGN KEY (classes_id) REFERENCES classes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE classes_teachers ADD CONSTRAINT FK_A7F2F9EF84365182 FOREIGN KEY (teachers_id) REFERENCES teachers (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE courses_students ADD CONSTRAINT FK_5D696B20F9295384 FOREIGN KEY (courses_id) REFERENCES courses (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE courses_students ADD CONSTRAINT FK_5D696B201AD8D010 FOREIGN KEY (students_id) REFERENCES students (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE courses_support_of_course ADD CONSTRAINT FK_2405319AF9295384 FOREIGN KEY (courses_id) REFERENCES courses (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE courses_support_of_course ADD CONSTRAINT FK_2405319A55C30BA9 FOREIGN KEY (support_of_course_id) REFERENCES support_of_course (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE support_of_course_teachers ADD CONSTRAINT FK_CEF66EDE55C30BA9 FOREIGN KEY (support_of_course_id) REFERENCES support_of_course (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE support_of_course_teachers ADD CONSTRAINT FK_CEF66EDE84365182 FOREIGN KEY (teachers_id) REFERENCES teachers (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE support_of_course_classes ADD CONSTRAINT FK_2AFBE93255C30BA9 FOREIGN KEY (support_of_course_id) REFERENCES support_of_course (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE support_of_course_classes ADD CONSTRAINT FK_2AFBE9329E225B24 FOREIGN KEY (classes_id) REFERENCES classes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE teachers_students ADD CONSTRAINT FK_A5A3679784365182 FOREIGN KEY (teachers_id) REFERENCES teachers (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE teachers_students ADD CONSTRAINT FK_A5A367971AD8D010 FOREIGN KEY (students_id) REFERENCES students (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE classes ADD teachers_id INT DEFAULT NULL, ADD notifications_id INT DEFAULT NULL, ADD courses_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE classes ADD CONSTRAINT FK_2ED7EC584365182 FOREIGN KEY (teachers_id) REFERENCES teachers (id)');
        $this->addSql('ALTER TABLE classes ADD CONSTRAINT FK_2ED7EC5D4BE081 FOREIGN KEY (notifications_id) REFERENCES notifications (id)');
        $this->addSql('ALTER TABLE classes ADD CONSTRAINT FK_2ED7EC5F9295384 FOREIGN KEY (courses_id) REFERENCES courses (id)');
        $this->addSql('CREATE INDEX IDX_2ED7EC584365182 ON classes (teachers_id)');
        $this->addSql('CREATE INDEX IDX_2ED7EC5D4BE081 ON classes (notifications_id)');
        $this->addSql('CREATE INDEX IDX_2ED7EC5F9295384 ON classes (courses_id)');
        $this->addSql('ALTER TABLE courses ADD teachers_id INT DEFAULT NULL, ADD classes_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE courses ADD CONSTRAINT FK_A9A55A4C84365182 FOREIGN KEY (teachers_id) REFERENCES teachers (id)');
        $this->addSql('ALTER TABLE courses ADD CONSTRAINT FK_A9A55A4C9E225B24 FOREIGN KEY (classes_id) REFERENCES classes (id)');
        $this->addSql('CREATE INDEX IDX_A9A55A4C84365182 ON courses (teachers_id)');
        $this->addSql('CREATE INDEX IDX_A9A55A4C9E225B24 ON courses (classes_id)');
        $this->addSql('ALTER TABLE notifications ADD user_id INT DEFAULT NULL, ADD teachers_id INT DEFAULT NULL, ADD classes_id INT DEFAULT NULL, ADD users_id INT DEFAULT NULL, ADD cours_id INT DEFAULT NULL, ADD student_id INT DEFAULT NULL, ADD teacher_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE notifications ADD CONSTRAINT FK_6000B0D3A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE notifications ADD CONSTRAINT FK_6000B0D384365182 FOREIGN KEY (teachers_id) REFERENCES teachers (id)');
        $this->addSql('ALTER TABLE notifications ADD CONSTRAINT FK_6000B0D39E225B24 FOREIGN KEY (classes_id) REFERENCES classes (id)');
        $this->addSql('ALTER TABLE notifications ADD CONSTRAINT FK_6000B0D367B3B43D FOREIGN KEY (users_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE notifications ADD CONSTRAINT FK_6000B0D37ECF78B0 FOREIGN KEY (cours_id) REFERENCES courses (id)');
        $this->addSql('ALTER TABLE notifications ADD CONSTRAINT FK_6000B0D3CB944F1A FOREIGN KEY (student_id) REFERENCES students (id)');
        $this->addSql('ALTER TABLE notifications ADD CONSTRAINT FK_6000B0D341807E1D FOREIGN KEY (teacher_id) REFERENCES teachers (id)');
        $this->addSql('CREATE INDEX IDX_6000B0D3A76ED395 ON notifications (user_id)');
        $this->addSql('CREATE INDEX IDX_6000B0D384365182 ON notifications (teachers_id)');
        $this->addSql('CREATE INDEX IDX_6000B0D39E225B24 ON notifications (classes_id)');
        $this->addSql('CREATE INDEX IDX_6000B0D367B3B43D ON notifications (users_id)');
        $this->addSql('CREATE INDEX IDX_6000B0D37ECF78B0 ON notifications (cours_id)');
        $this->addSql('CREATE INDEX IDX_6000B0D3CB944F1A ON notifications (student_id)');
        $this->addSql('CREATE INDEX IDX_6000B0D341807E1D ON notifications (teacher_id)');
        $this->addSql('ALTER TABLE schedules ADD classes_id INT DEFAULT NULL, ADD class_id INT DEFAULT NULL, ADD cours_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE schedules ADD CONSTRAINT FK_313BDC8E9E225B24 FOREIGN KEY (classes_id) REFERENCES classes (id)');
        $this->addSql('ALTER TABLE schedules ADD CONSTRAINT FK_313BDC8EEA000B10 FOREIGN KEY (class_id) REFERENCES classes (id)');
        $this->addSql('ALTER TABLE schedules ADD CONSTRAINT FK_313BDC8E7ECF78B0 FOREIGN KEY (cours_id) REFERENCES courses (id)');
        $this->addSql('CREATE INDEX IDX_313BDC8E9E225B24 ON schedules (classes_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_313BDC8EEA000B10 ON schedules (class_id)');
        $this->addSql('CREATE INDEX IDX_313BDC8E7ECF78B0 ON schedules (cours_id)');
        $this->addSql('ALTER TABLE students ADD classes_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE students ADD CONSTRAINT FK_A4698DB29E225B24 FOREIGN KEY (classes_id) REFERENCES classes (id)');
        $this->addSql('CREATE INDEX IDX_A4698DB29E225B24 ON students (classes_id)');
        $this->addSql('ALTER TABLE support_of_course ADD classes_id INT DEFAULT NULL, ADD student_id INT DEFAULT NULL, ADD course_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE support_of_course ADD CONSTRAINT FK_B7443F159E225B24 FOREIGN KEY (classes_id) REFERENCES classes (id)');
        $this->addSql('ALTER TABLE support_of_course ADD CONSTRAINT FK_B7443F15CB944F1A FOREIGN KEY (student_id) REFERENCES students (id)');
        $this->addSql('ALTER TABLE support_of_course ADD CONSTRAINT FK_B7443F15591CC992 FOREIGN KEY (course_id) REFERENCES courses (id)');
        $this->addSql('CREATE INDEX IDX_B7443F159E225B24 ON support_of_course (classes_id)');
        $this->addSql('CREATE INDEX IDX_B7443F15CB944F1A ON support_of_course (student_id)');
        $this->addSql('CREATE INDEX IDX_B7443F15591CC992 ON support_of_course (course_id)');
        $this->addSql('ALTER TABLE teachers ADD user_id INT DEFAULT NULL, ADD courses_id INT DEFAULT NULL, ADD schedules_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE teachers ADD CONSTRAINT FK_ED071FF6A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE teachers ADD CONSTRAINT FK_ED071FF6F9295384 FOREIGN KEY (courses_id) REFERENCES courses (id)');
        $this->addSql('ALTER TABLE teachers ADD CONSTRAINT FK_ED071FF6116C90BC FOREIGN KEY (schedules_id) REFERENCES schedules (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_ED071FF6A76ED395 ON teachers (user_id)');
        $this->addSql('CREATE INDEX IDX_ED071FF6F9295384 ON teachers (courses_id)');
        $this->addSql('CREATE INDEX IDX_ED071FF6116C90BC ON teachers (schedules_id)');
        $this->addSql('ALTER TABLE user ADD teacher_id INT DEFAULT NULL, ADD student_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64941807E1D FOREIGN KEY (teacher_id) REFERENCES teachers (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649CB944F1A FOREIGN KEY (student_id) REFERENCES students (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D64941807E1D ON user (teacher_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649CB944F1A ON user (student_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classes_teachers DROP FOREIGN KEY FK_A7F2F9EF9E225B24');
        $this->addSql('ALTER TABLE classes_teachers DROP FOREIGN KEY FK_A7F2F9EF84365182');
        $this->addSql('ALTER TABLE courses_students DROP FOREIGN KEY FK_5D696B20F9295384');
        $this->addSql('ALTER TABLE courses_students DROP FOREIGN KEY FK_5D696B201AD8D010');
        $this->addSql('ALTER TABLE courses_support_of_course DROP FOREIGN KEY FK_2405319AF9295384');
        $this->addSql('ALTER TABLE courses_support_of_course DROP FOREIGN KEY FK_2405319A55C30BA9');
        $this->addSql('ALTER TABLE support_of_course_teachers DROP FOREIGN KEY FK_CEF66EDE55C30BA9');
        $this->addSql('ALTER TABLE support_of_course_teachers DROP FOREIGN KEY FK_CEF66EDE84365182');
        $this->addSql('ALTER TABLE support_of_course_classes DROP FOREIGN KEY FK_2AFBE93255C30BA9');
        $this->addSql('ALTER TABLE support_of_course_classes DROP FOREIGN KEY FK_2AFBE9329E225B24');
        $this->addSql('ALTER TABLE teachers_students DROP FOREIGN KEY FK_A5A3679784365182');
        $this->addSql('ALTER TABLE teachers_students DROP FOREIGN KEY FK_A5A367971AD8D010');
        $this->addSql('DROP TABLE classes_teachers');
        $this->addSql('DROP TABLE courses_students');
        $this->addSql('DROP TABLE courses_support_of_course');
        $this->addSql('DROP TABLE support_of_course_teachers');
        $this->addSql('DROP TABLE support_of_course_classes');
        $this->addSql('DROP TABLE teachers_students');
        $this->addSql('ALTER TABLE classes DROP FOREIGN KEY FK_2ED7EC584365182');
        $this->addSql('ALTER TABLE classes DROP FOREIGN KEY FK_2ED7EC5D4BE081');
        $this->addSql('ALTER TABLE classes DROP FOREIGN KEY FK_2ED7EC5F9295384');
        $this->addSql('DROP INDEX IDX_2ED7EC584365182 ON classes');
        $this->addSql('DROP INDEX IDX_2ED7EC5D4BE081 ON classes');
        $this->addSql('DROP INDEX IDX_2ED7EC5F9295384 ON classes');
        $this->addSql('ALTER TABLE classes DROP teachers_id, DROP notifications_id, DROP courses_id');
        $this->addSql('ALTER TABLE courses DROP FOREIGN KEY FK_A9A55A4C84365182');
        $this->addSql('ALTER TABLE courses DROP FOREIGN KEY FK_A9A55A4C9E225B24');
        $this->addSql('DROP INDEX IDX_A9A55A4C84365182 ON courses');
        $this->addSql('DROP INDEX IDX_A9A55A4C9E225B24 ON courses');
        $this->addSql('ALTER TABLE courses DROP teachers_id, DROP classes_id');
        $this->addSql('ALTER TABLE notifications DROP FOREIGN KEY FK_6000B0D3A76ED395');
        $this->addSql('ALTER TABLE notifications DROP FOREIGN KEY FK_6000B0D384365182');
        $this->addSql('ALTER TABLE notifications DROP FOREIGN KEY FK_6000B0D39E225B24');
        $this->addSql('ALTER TABLE notifications DROP FOREIGN KEY FK_6000B0D367B3B43D');
        $this->addSql('ALTER TABLE notifications DROP FOREIGN KEY FK_6000B0D37ECF78B0');
        $this->addSql('ALTER TABLE notifications DROP FOREIGN KEY FK_6000B0D3CB944F1A');
        $this->addSql('ALTER TABLE notifications DROP FOREIGN KEY FK_6000B0D341807E1D');
        $this->addSql('DROP INDEX IDX_6000B0D3A76ED395 ON notifications');
        $this->addSql('DROP INDEX IDX_6000B0D384365182 ON notifications');
        $this->addSql('DROP INDEX IDX_6000B0D39E225B24 ON notifications');
        $this->addSql('DROP INDEX IDX_6000B0D367B3B43D ON notifications');
        $this->addSql('DROP INDEX IDX_6000B0D37ECF78B0 ON notifications');
        $this->addSql('DROP INDEX IDX_6000B0D3CB944F1A ON notifications');
        $this->addSql('DROP INDEX IDX_6000B0D341807E1D ON notifications');
        $this->addSql('ALTER TABLE notifications DROP user_id, DROP teachers_id, DROP classes_id, DROP users_id, DROP cours_id, DROP student_id, DROP teacher_id');
        $this->addSql('ALTER TABLE schedules DROP FOREIGN KEY FK_313BDC8E9E225B24');
        $this->addSql('ALTER TABLE schedules DROP FOREIGN KEY FK_313BDC8EEA000B10');
        $this->addSql('ALTER TABLE schedules DROP FOREIGN KEY FK_313BDC8E7ECF78B0');
        $this->addSql('DROP INDEX IDX_313BDC8E9E225B24 ON schedules');
        $this->addSql('DROP INDEX UNIQ_313BDC8EEA000B10 ON schedules');
        $this->addSql('DROP INDEX IDX_313BDC8E7ECF78B0 ON schedules');
        $this->addSql('ALTER TABLE schedules DROP classes_id, DROP class_id, DROP cours_id');
        $this->addSql('ALTER TABLE students DROP FOREIGN KEY FK_A4698DB29E225B24');
        $this->addSql('DROP INDEX IDX_A4698DB29E225B24 ON students');
        $this->addSql('ALTER TABLE students DROP classes_id');
        $this->addSql('ALTER TABLE support_of_course DROP FOREIGN KEY FK_B7443F159E225B24');
        $this->addSql('ALTER TABLE support_of_course DROP FOREIGN KEY FK_B7443F15CB944F1A');
        $this->addSql('ALTER TABLE support_of_course DROP FOREIGN KEY FK_B7443F15591CC992');
        $this->addSql('DROP INDEX IDX_B7443F159E225B24 ON support_of_course');
        $this->addSql('DROP INDEX IDX_B7443F15CB944F1A ON support_of_course');
        $this->addSql('DROP INDEX IDX_B7443F15591CC992 ON support_of_course');
        $this->addSql('ALTER TABLE support_of_course DROP classes_id, DROP student_id, DROP course_id');
        $this->addSql('ALTER TABLE teachers DROP FOREIGN KEY FK_ED071FF6A76ED395');
        $this->addSql('ALTER TABLE teachers DROP FOREIGN KEY FK_ED071FF6F9295384');
        $this->addSql('ALTER TABLE teachers DROP FOREIGN KEY FK_ED071FF6116C90BC');
        $this->addSql('DROP INDEX UNIQ_ED071FF6A76ED395 ON teachers');
        $this->addSql('DROP INDEX IDX_ED071FF6F9295384 ON teachers');
        $this->addSql('DROP INDEX IDX_ED071FF6116C90BC ON teachers');
        $this->addSql('ALTER TABLE teachers DROP user_id, DROP courses_id, DROP schedules_id');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64941807E1D');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649CB944F1A');
        $this->addSql('DROP INDEX UNIQ_8D93D64941807E1D ON user');
        $this->addSql('DROP INDEX UNIQ_8D93D649CB944F1A ON user');
        $this->addSql('ALTER TABLE user DROP teacher_id, DROP student_id');
    }
}
