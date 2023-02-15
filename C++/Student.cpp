// Import library yang dibutuhkan
#include <bits/stdc++.h>
#include <iostream>
#include <string>
#include <iomanip>

using namespace std; // Menggunakan standard namespace

class Student // Membuat class Student
{
private:            // Membuat atribut berjenis private
    string name;    // Untuk menyimpan nama
    int idNumber;   // Untuk menyimpan NIM (ID number)
    string major;   // Untuk menyimpan jurusan
    string faculty; // Untuk menyimpan fakultas

public:
    /* Konstruktor */
    Student() // Membuat konstruktor default
    {
        this->name = "";    // Meng-assign atribut name dengan string kosong
        this->idNumber = 0; // Meng-assign atribut idNumber dengan 0
        this->major = "";   // Meng-assign atribut major dengan string kosong
        this->faculty = ""; // Meng-assign atribut faculty dengan string kosong
    }

    Student(string name, int idNumber, string major, string faculty) // Membuat konstruktor dengan isian dari parameter
    {
        this->name = name;         // Meng-assign atribut name dengan nilai dari parameter name
        this->idNumber = idNumber; // Meng-assign atribut idNumber dengan nilai dari parameter idNumber
        this->major = major;       // Meng-assign atribut major dengan nilai dari parameter major
        this->faculty = faculty;   // Meng-assign atribut faculty dengan nilai dari parameter faculty
    }

    /* Setter dan Getter */
    void setName(string name) // Setter untuk atribut name
    {
        this->name = name; // Meng-assign atribut name dengan nilai dari parameter name
    }

    void setIdNumber(int idNumber) // Setter untuk atribut idNumber
    {
        this->idNumber = idNumber; // Meng-assign atribut idNumber dengan nilai dari parameter idNumber
    }

    void setMajor(string major) // Setter untuk atribut major
    {
        this->major = major; // Meng-assign atribut major dengan nilai dari parameter major
    }

    void setFaculty(string faculty) // Setter untuk atribut faculty
    {
        this->faculty = faculty; // Meng-assign atribut faculty dengan nilai dari parameter faculty
    }

    string getName() // Getter untuk atribut name
    {
        return this->name; // Me-return nilai dari atribut name
    }

    int getIdNumber() // Getter untuk atribut idNumber
    {
        return this->idNumber; // Me-return nilai dari atribut idNumber
    }

    string getMajor() // Getter untuk atribut major
    {
        return this->major; // Me-return nilai dari atribut major
    }

    string getFaculty() // Getter untuk atribut faculty
    {
        return this->faculty; // Me-return nilai dari atribut faculty
    }

    /* Method untuk perintah pilihan */
    void commandOptions() // Method untuk menampilkan menu program CRUD
    {
        cout << "==============================\n";
        cout << "|        CRUD Program        |\n"; // CRUD = Create, Read, Update, Delete
        cout << "==============================\n";
        cout << "|  0. Exit the program       |\n"; // 0 untuk keluar dari program
        cout << "|  1. Add student data       |\n"; // 1 untuk menambahkan data mahasiswa
        cout << "|  2. Update student data    |\n"; // 2 untuk mengubah data mahasiswa
        cout << "|  3. Delete student data    |\n"; // 3 untuk menghapus data mahasiswa
        cout << "|  4. Show list of students  |\n"; // 4 untuk menampilkan semua data dalam daftar mahasiswa
        cout << "==============================\n";
        cout << "Enter your choice : ";
    }

    /* Method untuk CRUD */
    void addStudentData(list<Student> &studentList, Student temp, string name, int idNumber, string major, string faculty) // Method untuk menambahkan data mahasiswa
    {
        // Proses setter data inputan ke setiap atribut dari objek temp
        temp.setName(name);
        temp.setIdNumber(idNumber);
        temp.setMajor(major);
        temp.setFaculty(faculty);

        if (studentList.empty()) // Jika list kosong, langsung masukan data ke dalam list
        {
            studentList.push_back(temp);                  // Memasukan data ke dalam list
            cout << "\n[SUCCESS] Data has been added.\n"; // Menampilkan pesan bahwa data berhasil dimasukan ke dalam list
        }
        else // Jika list tidak kosong, lakukan pengecekan terlebih dahulu
        {
            bool find = false;                                // Untuk mengecek apakah data sudah ada atau belum, nilai defaultnya adalah false yang menandakan data belum ada
            list<Student>::iterator it = studentList.begin(); // Membuat iterator untuk mengecek data dalam list

            do // do while untuk mengecek apakah data sudah ada atau belum, pengecekkan menggunakan NIM sebagai primary key
            {
                if (temp.getIdNumber() == it->getIdNumber()) // Jika NIM sudah ada, maka data tidak akan dimasukan ke dalam list dan akan menampilkan pesan error
                {
                    find = true;                                                                                 // Jika NIM sudah ada, maka nilai find akan berubah menjadi true
                    cout << "\n[ERROR] ID number already exists, please add data with a different ID number.\n"; // Pesan error
                }
                it++;                                           // Iterasi untuk mengecek data selanjutnya
            } while (find == false && it != studentList.end()); // Jika data belum ditemukan dan iterator belum sampai ke akhir list, maka akan melakukan proses pengecekan data berikutnya

            if (find == false) // Jika data tidak ditemukan, maka data akan dimasukan ke dalam list
            {
                studentList.push_back(temp);                  // Memasukan data ke dalam list
                cout << "\n[SUCCESS] Data has been added.\n"; // Menampilkan pesan bahwa data berhasil dimasukan ke dalam list
            }
        }
    }

    void updateStudentData(list<Student> &studentList, int idNumber) // Method untuk mengubah data mahasiswa
    {
        bool find = false;                                // Untuk mengecek apakah data sudah ada atau belum, nilai defaultnya adalah false yang menandakan data tidak ditemukan
        list<Student>::iterator it = studentList.begin(); // Membuat iterator untuk mengecek data dalam list

        do // do while untuk mengecek apakah data yang akan diubah ada di dalam studentList atau tidak
        {
            if (it->getIdNumber() == idNumber) // Jika data yang akan diubah ditemukan di dalam studentList, maka akan meminta beberapa masukan
            {
                find = true; // Jika data ditemukan, maka nilai find akan berubah menjadi true
                cout << "\nEnter Name    : ";
                cin >> name; // Meminta masukan untuk mengubah nama
                cout << "Enter Major   : ";
                cin >> major; // Meminta masukan untuk mengubah jurusan
                cout << "Enter Faculty : ";
                cin >> faculty; // Meminta masukan untuk mengubah fakultas

                *it = Student(name, idNumber, major, faculty);  // Mengubah data yang sudah ada di dalam studentList dengan data baru
                cout << "\n[SUCCESS] Data has been changed.\n"; // Menampilkan pesan bahwa data berhasil diubah
            }
            it++;                                           // Iterasi untuk mengecek data selanjutnya
        } while (find == false && it != studentList.end()); // Jika data belum ditemukan dan iterator belum sampai ke akhir list, maka akan melakukan proses pengecekan data berikutnya

        if (find == false)                                             // Jika data tidak ditemukan, maka akan menampilkan pesan error
            cout << "\n[ERROR] Student data not found in the list.\n"; // Pesan error
    }

    void deleteStudentData(list<Student> &studentList, int idNumber) // Method untuk menghapus data mahasiswa
    {
        bool find = false;                                // Untuk mengecek apakah data sudah ada atau belum, nilai defaultnya adalah false yang menandakan data belum ada
        list<Student>::iterator it = studentList.begin(); // Membuat iterator untuk mengecek data dalam list

        do // do while untuk mengecek apakah data yang akan dihapus ada di dalam studentList atau tidak
        {
            if (it->getIdNumber() == idNumber) // Jika data yang akan dihapus ditemukan di dalam studentList, maka data akan dihapus
            {
                find = true;           // Jika data ditemukan, maka nilai find akan berubah menjadi true
                studentList.erase(it); // Menghapus data yang ditemukan

                cout << "\n[SUCCESS] Data has been deleted.\n"; // Menampilkan pesan bahwa data berhasil dihapus
            }
            it++;                                           // Iterasi untuk mengecek data selanjutnya
        } while (find == false && it != studentList.end()); // Jika data belum ditemukan dan iterator belum sampai ke akhir list, maka akan melakukan proses pengecekan data berikutnya

        if (find == false)                              // Jika data tidak ditemukan, maka akan menampilkan pesan error
            cout << "\n[ERROR] ID number not exist!\n"; // Pesan error
    }

    void showListOfStudent(list<Student> &studentList) // Method untuk menampilkan data mahasiswa
    {
        if (studentList.empty()) // Jika list kosong, maka akan menampilkan pesan error
        {
            cout << "\n[WARNING] The student list is still empty.\n"; // Pesan error
        }
        else // Jika list tidak kosong, maka akan menampilkan data mahasiswa
        {
            int no = 0;
            cout << endl;

            // set lebar kolom
            const int colWidth = 15;

            // header tabel
            cout << setw(5) << "No." << setw(colWidth) << "Name" << setw(colWidth) << "ID number" << setw(colWidth) << "Major" << setw(colWidth) << "Faculty" << endl;

            // garis pemisah antara header dan data
            cout << setfill('-') << setw(5) << "" << setw(colWidth) << "" << setw(colWidth) << "" << setw(colWidth) << "" << setw(colWidth) << "" << setfill(' ') << endl;

            // isi tabel
            for (const auto &student : studentList)
            {
                cout << setw(5) << ++no << setw(colWidth) << student.getName() << setw(colWidth) << student.getIdNumber() << setw(colWidth) << student.getMajor() << setw(colWidth) << student.getFaculty() << endl;
            }

            cout << endl;
        }
    }

    /* Destruktor */
    ~Student() // Membuat destruktor untuk menghapus semua objek yang telah dibuat
    {
    }
};