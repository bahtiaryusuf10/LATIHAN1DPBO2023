<?php

class Student // Membuat class Student
{
    /* Membuat atribut berjenis private */
    private $name; // Untuk menyimpan nama
    private $idNumber; // Untuk menyimpan NIM (ID number)
    private $major; // Untuk menyimpan jurusan
    private $faculty; // Untuk menyimpan fakultas

    /* Konstruktor */
    public function __construct($name = '', $idNumber = 0, $major = '', $faculty = '') // Membuat konstruktor dengan isian dari parameter
    {
        $this->name = $name;         // Meng-assign atribut name dengan nilai dari parameter name
        $this->idNumber = $idNumber; // Meng-assign atribut idNumber dengan nilai dari parameter idNumber
        $this->major = $major;       // Meng-assign atribut major dengan nilai dari parameter major
        $this->faculty = $faculty;   // Meng-assign atribut faculty dengan nilai dari parameter faculty
    }

    /* Setter dan Getter */
    public function setName($name) // Setter untuk atribut name
    {
        $this->name = $name; // Meng-assign atribut name dengan nilai dari parameter name
    }

    public function setIdNumber($idNumber) // Setter untuk atribut idNumber
    {
        $this->idNumber = $idNumber; // Meng-assign atribut idNumber dengan nilai dari parameter idNumber
    }

    public function setMajor($major) // Setter untuk atribut major
    {
        $this->major = $major; // Meng-assign atribut major dengan nilai dari parameter major
    }

    public function setFaculty($faculty) // Setter untuk atribut faculty
    {
        $this->faculty = $faculty; // Meng-assign atribut faculty dengan nilai dari parameter faculty
    }

    public function getName() // Getter untuk atribut name
    {
        return $this->name; // Me-return nilai dari atribut name
    }

    public function getIdNumber() // Getter untuk atribut idNumber
    {
        return $this->idNumber; // Me-return nilai dari atribut idNumber
    }

    public function getMajor() // Getter untuk atribut major
    {
        return $this->major; // Me-return nilai dari atribut major
    }

    public function getFaculty() // Getter untuk atribut faculty
    {
        return $this->faculty; // Me-return nilai dari atribut faculty
    }

    /* Method untuk CRUD */
    public function addStudentData(&$studentsList, $temp) // method untuk menambah data mahasiswa
    {
        if (empty($studentsList)) { //Jika array kosong
            array_push($studentsList, $temp); // Menambahkan data mahasiswa ke array
            echo "[SUCCESS] Data has been added." . "<br>"; // Menampilkan pesan bahwa data berhasil ditambahkan
        } else { // Jika array tidak kosong
            $find = false; // Untuk mengecek apakah data sudah ada atau belum, nilai defaultnya false yang menandakan data belum ada
            $i = 0; // Membuat iterator untuk mengecek data dalam list

            do { // do while untuk mengecek apakah data sudah ada atau belum, pengecekkan menggunakan NIM sebagai primary key
                if ($temp->getIdNumber() == $studentsList[$i]->getIdNumber()) { //Jika NIM sudah ada, maka data tidak akan ditambahkan ke dalam array
                    $find = true; // Mengubah nilai find menjadi true
                    echo "[ERROR] ID number already exists, please add data with a different ID number." . "<br>"; // Menampilkan pesan error
                }
                $i++; // Iterasi untuk mengecek data selanjutnya
            } while ($find == false && $i < count($studentsList)); // Jika data belum ditemukan dan iterator belum sampai ke akhir array, maka akan melakukan proses pengecekan berikutnya

            if ($find == false) { // Jika data tidak ditemukan, maka data akan dimasukan ke dalam array
                array_push($studentsList, $temp); // Memasukan data ke dalam array
                echo "[SUCCESS] Data has been added." . "<br>"; // Menampilkan pesan bahwa data berhasil dimasukan ke dalam array
            }
        }
    }

    public function updateStudentData(&$studentsList, $temp, $name, $idNumber, $major, $faculty) // Method untuk mengubah data mahasiswa
    {
        // Proses setter data inputan ke setiap atribut dari objek temp  
        $temp->setName($name);
        $temp->setIdNumber($idNumber);
        $temp->setMajor($major);
        $temp->setFaculty($faculty);

        $find = false; // Untuk mengecek apakah data ada di dalam array atau tidak, nilai defaultnya false yang menandakan data tidak ada
        $i = 0; // Membuat iterator untuk mengecek data dalam list

        do { // do while untuk mengecek apakah data yang akan diubah ada di dalam array, pengecekan menggunakan NIM sebagai primary key
            if ($temp->getIdNumber() == $studentsList[$i]->getIdNumber()) { // Jika data mahasiswa ditemukan, maka akan langsung diubah datanya 
                $find = true; // Mengubah nilai find menjdai true
                $studentsList[$i] = $temp; // Ubah data mahasiswa di array
                echo "[SUCCESS] Data has been changed." . "<br>"; // Menampilkan pesan berhasil mengubah data
            }
            $i++; // Iterasi untuk mengecek data selanjutnya
        } while ($find == false && $i < count($studentsList)); // Jika data belum ditemukan dan iterator belum sampai ke akhir array, maka akan melakukan proses pengecekan berikutnya

        if ($find == false) { // Jika data tidak ditemukan, maka akan menampilkan pesan error
            echo "[ERROR] Student data not found in the list." . "<br>";
        }
    }

    public function deleteStudentData(&$studentsList, $idNumber) // Method untuk menghapus data mahasiswa
    {
        $find = false; // Untuk mengecek apakah data ada di dalam array atau tidak, nilai defaultnya false yang menandakan data tidak ada
        $i = 0; // Membuat iterator untuk mengecek data dalam list

        do { // do while untuk mengecek apakah data yang akan dihapus ada di dalam array, pengecekan menggunakan NIM sebagai primary key
            if ($idNumber == $studentsList[$i]->getIdNumber()) { // Jika data mahasiswa ditemukan, maka akan langsung dihapus datanya
                $find = true; // Mengubah nilai find menjdai true
                array_splice($studentsList, $i, 1); // Menghapus data mahasiswa di dalam array
                echo "[SUCCESS] Data has been deleted." . "<br>"; // Menampilkan pesan berhasil menghapus data
            }
            $i++; // Iterasi untuk mengecek data selanjutnya
        } while ($find == false && $i < count($studentsList)); // Jika data belum ditemukan dan iterator belum sampai ke akhir array, maka akan melakukan proses pengecekan berikutnya

        if ($find == false) { // Jika data tidak ditemukan, maka akan menampilkan pesan error
            echo "[ERROR] ID number not exist!" . "<br>";
        }
    }

    public function showListOfStudent($studentsList) // Method untuk menampilkan semua data mahasiswa di dalam array
    {
        if (empty($studentsList)) { // Jika array kosong
            echo "[WARNING] The student list is still empty." . "<br>"; // Menampilkan pesan error
        } else { // Jika array ada isinya
            echo "<h3>List of Student Data</h3>"; // Judul Tabel
            echo "<table border='1' cellpadding='5' cellspacing = '0'>";
            echo "<tr>";
            echo "<th>No.</th>" . "<th>Name</th>" . "<th>ID Number</th>" . "<th>Major</th>" . "<th>Faculty</th>"; // Header Tabel
            echo "</tr>";
            $no = 1;
            /* Menampilkan semua data mahasiswa */
            for ($i = 0; $i < count($studentsList); $i++) {
                echo "<tr>";
                echo "<td>" . $no . '. ' . "</td>";
                echo "<td>" . $studentsList[$i]->getName() . "</td>";
                echo "<td>" . $studentsList[$i]->getIdNumber() . "</td>";
                echo "<td>" . $studentsList[$i]->getMajor() . "</td>";
                echo "<td>" . $studentsList[$i]->getFaculty() . "</td>";
                echo "</tr>";
                $no = $no + 1;
            }
            echo "</table>";
            echo "<br>";
        }
    }

    /* Destuktor */
    public function __destruct()
    {
    }
}
