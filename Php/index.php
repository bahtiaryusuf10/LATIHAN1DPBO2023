<?php
require('Student.php'); // Require Class Student

$studentList = array(); // Inisialisasi array list
$arrStudentData = array(); // Inisialisasi array masukan

echo "<h3>Create Data</h3>"; // Menampilkan sesi Create

/* Input data mahasiswa */
$arrStudentData[0] = new Student("Cristiano Ronaldo", 21779876, "Teknik Informatika", "STEI"); // Create data dengan konstruktor
$arrStudentData[0]->addStudentData($studentList, $arrStudentData[0]);

$arrStudentData[1] = new Student("Pablo Escobar", 19450817, "Seni Musik", "FSRD"); // Create data dengan konstruktor
$arrStudentData[1]->addStudentData($studentList, $arrStudentData[1]);

$arrStudentData[2] = new Student("Thomas Shelby", 20021214, "Kedokteran", "FK"); // Create data dengan konstruktor
$arrStudentData[2]->addStudentData($studentList, $arrStudentData[2]);

// Create data dengan setter tiap atribut
$arrStudentData[3] = new Student();
$arrStudentData[3]->setName("Maikel");
$arrStudentData[3]->setIdNumber(21098701);
$arrStudentData[3]->setMajor("Teknik Mesin");
$arrStudentData[3]->setFaculty("FTMD");
$arrStudentData[3]->addStudentData($studentList, $arrStudentData[3]);


$showStudentData = new Student(); // Objek untuk menampilkan isi array daftar mahasiswa
$showStudentData->showListOfStudent($studentList); // Menampilkan isi array setelah input data

echo "<h3>Update Data</h3>"; // Menampilkan sesi Update
$arrStudentData[0]->updateStudentData($studentList, $arrStudentData[0], "Muhammad Ali", 21779876, "Teknik Perminyakan", "FTTM"); // Update data
$showStudentData->showListOfStudent($studentList); // Menampilkan isi array setelah update data

echo "<h3>Delete Data</h3>"; // Menampilkan sesi Delete
$arrStudentData[0]->deleteStudentData($studentList, 21779876); // Delete data
$showStudentData->showListOfStudent($studentList); // Menampilkan isi array setelah delete data