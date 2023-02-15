
// Import library
import java.util.Scanner;
import java.util.ArrayList;

public class Main {
    public static void main(String[] args) { // Method main yang akan dijalankan pertama kali
        ArrayList<Student> studentList = new ArrayList<>(); // Membuat objek ArrayList untuk menyimpan data mahasiswa
        Scanner scan = new Scanner(System.in); // Membuat objek Scanner untuk meminta masukan dari user

        boolean flag = true; // Deklarasi variabel flag untuk menentukan apakah program akan berulang atau
                             // tidak
        int input; // Deklarasi variabel input untuk menyimpan masukan dari user

        do {
            Student studentObject = new Student(); // Deklarasi objek studentObject dari kelas Student
            studentObject.clearScreen(); // Membersihkan layar
            studentObject.commandOptions(); // Menampilkan menu

            input = scan.nextInt(); // Meminta input dari user
            int idNumber; // Deklarasi variabel idNumber untuk menyimpan NIM (ID Number) mahasiswa
            String name, major, faculty; // Deklarasi variabel name, major, dan faculty untuk menyimpan nama,
                                         // jurusan, dan fakultas mahasiswa

            switch (input) // Switch case untuk menentukan apa yang akan dilakukan berdasarkan input dari
                           // user
            {
                case 0: // Jika input = 0, maka program akan berhenti
                    flag = false; // Mengubah nilai flag menjadi false
                    break;
                case 1: // Jika input = 1, maka program akan meminta input dari user terkait data
                        // mahasiswa yang akan ditambahkan
                    System.out.print("\nEnter Name      : ");
                    name = scan.next(); // Meminta input dari user untuk nama mahasiswa
                    System.out.print("Enter ID number : ");
                    idNumber = scan.nextInt(); // Meminta input dari user untuk nama mahasiswa
                    System.out.print("Enter Major     : ");
                    major = scan.next(); // Meminta input dari user untuk nama mahasiswa
                    System.out.print("Enter Faculty   : ");
                    faculty = scan.next(); // Meminta input dari user untuk nama mahasiswa

                    // Memanggil method addStudentData untuk menambahkan data mahasiswa ke dalam
                    // list
                    studentObject.addStudentData(studentList, studentObject, name, idNumber, major, faculty);
                    break;
                case 2: // Jika input = 2, maka program akan meminta input dari user untuk mengubah data
                        // mahasiswa
                    if (studentList.isEmpty()) { // Jika list kosong, maka akan menampilkan pesan peringatan
                        System.out.println("\n[WARNING] The student list is still empty."); // Pesan peringatan
                    } else // Jika list tidak kosong, maka akan meminta input dari user untuk NIM (ID
                           // Number) mahasiswa yang akan diubah
                    {
                        System.out.print("\nEnter the ID number of the student you want to change : ");
                        idNumber = scan.nextInt();

                        // Memanggil method updateStudentData untuk mengubah data mahasiswa di dalam
                        // list
                        studentObject.updateStudentData(studentList, idNumber, scan);
                    }
                    break;
                case 3: // Jika input = 3, maka program akan meminta input dari user untuk menghapus
                        // data mahasiswa (berdasarkan NIM)
                    if (studentList.isEmpty()) { // Jika list kosong, maka akan menampilkan pesan peringatan
                        System.out.println("\n[WARNING] The student list is still empty."); // Pesan peringatan
                    } else // Jika list tidak kosong, maka akan meminta input dari user untuk NIM (ID
                           // Number) mahasiswa yang akan dihapus
                    {
                        System.out.print("\nEnter the ID number of the student you want to delete : ");
                        idNumber = scan.nextInt();

                        // Memanggil method deleteStudentData untuk menghapus data mahasiswa di dalam
                        // list
                        studentObject.deleteStudentData(studentList, idNumber);
                    }
                    break;
                case 4: // Jika input = 4, maka program akan menampilkan seluruh data mahasiswa yang ada
                        // di dalam list
                    // Memanggil method showListOfStudent untuk menampilkan seluruh data mahasiswa
                    // yang ada di dalam list
                    studentObject.showListOfStudent(studentList);
                    break;
                default: // Jika input selain 0, 1, 2, 3, dan 4, maka akan menampilkan pesan peringatan
                    System.out.println("\n[WARNING] Invalid input, please try again."); // Pesan peringatan
                    break;
            }

            if (input != 0) // Jika input tidak sama dengan 0, maka akan menampilkan 2 enter dan mempause
                            // program
            {
                System.out.println('\n');
                /* Mempause program */
                System.out.println("Press any key to continue . . .");
                new java.util.Scanner(System.in).nextLine();
            }
        } while (flag == true); // loop akan berhenti jika flag bernilai false, yakni jika user memasukkan 0

        scan.close(); // Menterminasi Scanner
    }
}
