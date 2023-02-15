# LATIHAN1DPBO2023
### Saya Muhammad Yusuf Bahtiar NIM 2107980 mengerjakan Latihan 1 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

## Deskripsi Tugas
Buatlah program berbasis OOP menggunakan bahasa pemrograman C++, Java, Python, dan PHP yang menampilkan informasi daftar mahasiswa (sekumpulan objek mahasiswa) dan memiliki fitur menambah, mengubah, dan menghapus data. Setiap mahasiswa memiliki data nama, NIM, program studi, fakultas, dan foto profil (khusus bahasa PHP).

## Desain Program
Program didesain dalam satu class:
* *Student*

Pada class `Student` terdapat empat atribut (lima khusus PHP):
* *name* -> berisikan Nama Mahasiswa dengan tipe data `string`
* *idNumber* -> berisikan NIM Mahasiswa dengan tipe data `integer`
* *major* -> berisikan Program Studi Mahasiswa dengan tipe data `string`
* *faculty* -> berisikan Fakultas Mahasiswa dengan tipe data `string`

Tiap atribut memiliki setter dan getternya masing-masing yang berada pada class `Student`.

Selain itu, dalam class `Student` ini juga terdapat 4-6 method yang digunakan untuk memproses operasi CRUD diantaranya `Create`, `Read`, `Update`, dan `Delete`.
* *commandOptions* -> untuk menampilkan menu CRUD yang dapat dipilih oleh pengguna
* *addStudentData* -> untuk menambahkan data mahasiswa
* *updateStudentData* -> untuk mengubah data mahasiswa
* *deleteStudentData* -> untuk menghapus data mahasiswa
* *showListOfStudent* -> untuk menampilkan data mahasiswa
* *clearScreen* -> untuk membersihkan layar pertama kali program dijalankan (Java)

## Alur Program
*Pada umumnya, semua program yang dibuat memiliki alur yang sama, hanya saja pada source code Php tidak tersedia menu input dari pengguna (data diinput secara hardcode).*

Pertama program akan membersihkan terlebih dahulu terminal, lalu akan menampilkan menu CRUD yang dapat dipilih oleh pengguna. Pengguna akan diminta untuk memasukan perintah pilihannya 
dan jika program sudah selesai menjalankan perintah maka proses (inputan untuk pemilihan menu) akan dijalankan berulang sampai pengguna menginput perintah untuk mengakhiiri program. 
Kelima perintahnya yaitu:
* masukkan (0) untuk keluar dari program program.
Jika pengguna menjalankan perintah ini maka program akan langsung keluar.
* masukkan (1) untuk menjalankan perintah `addStudentData`
Jika pengguna menjalankan perintah ini maka program akan meminta pengguna untuk menginputkan serangakian data mahasiswa, yaitu nama, nim, program studi dan fakultas. Lalu sebelum ditambah ke list, program akan melakukan pengecekan terlebih dahulu apakah list dalam keadaan kosong atau tidak. Selain itu, pengecekkan juga dilakukan menggunakan nim yang akan ditambah ke dalam list, jika nim sudah tersedia di dalam list maka program akan mengeluarkan error handling dan data tidak akan diinput ke list.
* masukkan (2) untuk menjalankan perintah `updateStudentData`
Jika pengguna menjalankan perintah ini maka program akan meminta pengguna untuk menginput nim mahasiswa yang datanya akan diubah, jika nim tersedia pada list maka program akan meminta user menginputkan data mahasiswa yang baru yakni nama, program studi, dan fakultas, tidak dengan nim karena berkedudukan sebagai primary key. Jika nim tidak tersedia maka akan mengeluarkan error handling.
* masukkan (3) untuk menjalankan perintah `deleteStudentData`
Jika pengguna menjalankan perintah ini maka program akan meminta pengguna untuk menginput nim mahasiswa yang datanya akan dihapus, jika nim tersedia maka data tersebut akan dihapus dari list tapi jika data nim tidak tersedia pada list maka akan mengeluarkan error handling.
* masukkan (4) untuk menjalankan perintah `showListOfStudents`
Jika pengguna menjalankan perintah ini maka program akan meng-print semua data mahasiswa yang ada pada list dalam bentuk tabel sederhana.

## Dokumentasi
Pada program Python

![Screenshot - Python]

Pada program PHP

![Screenshot - PHP]()
![Screenshot (252)]()
