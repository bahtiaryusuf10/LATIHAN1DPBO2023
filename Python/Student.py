from prettytable import PrettyTable # Import library untuk menampilkan data dalam bentuk tabel

class Student: # Membuat class Student
    __name = "" # Membuat atribut __name berjenis private
    __idNumber = 0 # Membuat atribut __idNumber berjenis private
    __major = "" # Membuat atribut __major berjenis private
    __faculty = "" # Membuat atribut __faculty berjenis private

    def __init__(self, name = "", idNumber = 0, major = "", faculty = ""): # Membuat constructor
        self.__name = name # Menginisialisasi atribut __name
        self.__idNumber = idNumber # Menginisialisasi atribut __idNumber
        self.__major = major # Menginisialisasi atribut __major
        self.__faculty = faculty # Menginisialisasi atribut __faculty

    def setName(self, name): # Setter untuk atribut __name
        self.__name = name # Menginisialisasi atribut __name
    
    def setIdNumber(self, idNumber): # Setter untuk atribut __idNumber
        self.__idNumber = idNumber # Menginisialisasi atribut __idNumber

    def setMajor(self, major): # Setter untuk atribut __major
        self.__major = major # Menginisialisasi atribut __major

    def setFaculty(self, faculty): # Setter untuk atribut __faculty
        self.__faculty = faculty # Menginisialisasi atribut __faculty

    def getName(self): # Getter untuk atribut __name
        return self.__name # Mengembalikan nilai atribut __name

    def getIdNumber(self): # Getter untuk atribut __idNumber
        return self.__idNumber # Mengembalikan nilai atribut __idNumber

    def getMajor(self): # Getter untuk atribut __major
        return self.__major # Mengembalikan nilai atribut __major

    def getFaculty(self): # Getter untuk atribut __faculty
        return self.__faculty # Mengembalikan nilai atribut __faculty

    def commandOptions(self): # Membuat method untuk menampilkan menu command
        print("==============================")
        print("|        CRUD Program        |") # CRUD = Create, Read, Update, Delete
        print("==============================")
        print("|  0. Exit the program       |") # 0 untuk keluar dari program
        print("|  1. Add student data       |") # 1 untuk menambahkan data mahasiswa
        print("|  2. Update student data    |") # 2 untuk mengubah data mahasiswa
        print("|  3. Delete student data    |") # 3 untuk menghapus data mahasiswa
        print("|  4. Show list of students  |") # 4 untuk menampilkan semua data dalam daftar mahasiswa
        print("==============================")
        print("Enter your choice : ", end = '')

    def addStudentData(self, studentList, temp, name, idNumber, major, faculty): # Membuat method untuk menambahkan data mahasiswa
    # Proses setter data inputan ke setiap atribut dari objek temp
        temp.setName(name)
        temp.setIdNumber(idNumber)
        temp.setMajor(major)
        temp.setFaculty(faculty)

        if not studentList: # Jika list kosong, langsung masukan data ke dalam list
            studentList.append(temp) # Memasukan data ke dalam list
            print("\n[SUCCESS] Data has been added.\n\n") # Menampilkan pesan bahwa data berhasil dimasukan ke dalam list
        else: # Jika list tidak kosong, lakukan pengecekan terlebih dahulu
            find = False # Untuk mengecek apakah data sudah ada atau belum, nilai defaultnya adalah false yang menandakan data belum ada

            i = 0 # Untuk mengecek data satu persatu
            while not find and i < len(studentList):
                if temp.getIdNumber() == studentList[i].getIdNumber(): # Jika NIM sudah ada, maka data tidak akan dimasukan ke dalam list dan akan menampilkan pesan error
                    find = True # Jika NIM sudah ada, maka nilai find akan berubah menjadi true
                    print("\n[ERROR] ID number already exists, please add data with a different ID number.\n\n") # Pesan error
                i += 1 # Iterasi untuk mengecek data selanjutnya

            if not find : # Jika data tidak ditemukan, maka data akan dimasukan ke dalam list
                studentList.append(temp) # Memasukan data ke dalam list
                print("\n[SUCCESS] Data has been added.\n\n") # Menampilkan pesan bahwa data berhasil dimasukan ke dalam list

    def updateStudentData(self, studentList, idNumber): # Membuat method untuk mengubah data mahasiswa
        find = False # Untuk mengecek apakah data ada atau tidak, nilai defaultnya adalah false yang menandakan data tidak ada
        i = 0 # Membuat iterator untuk mengecek data dalam list

        while not find and i < len(studentList): # do while untuk mengecek apakah data yang akan diubah ada di dalam studentList atau tidak
            if studentList[i].getIdNumber() == idNumber: # Jika data yang akan diubah ditemukan di dalam studentList, maka akan meminta beberapa masukan
                find = True # Jika data ditemukan, maka nilai find akan berubah menjadi true
                self.__name = input("\nEnter Name      : ") # Meminta masukan untuk mengubah nama
                self.__major = input("Enter Major     : ") # Meminta masukan untuk mengubah jurusan
                self.__faculty = input("Enter Faculty   : ") # Meminta masukan untuk mengubah fakultas

                studentList[i] = Student(self.__name, idNumber, self.__major, self.__faculty) # Mengubah data yang sudah ada di dalam studentList dengan data baru
                print("\n[SUCCESS] Data has been changed.\n\n") # Menampilkan pesan bahwa data berhasil diubah
            i += 1 # Iterasi untuk mengecek data selanjutnya

        if not find: # Jika data tidak ditemukan, maka akan menampilkan pesan error
            print("\n[ERROR] Student data not found in the list.\n\n") # Pesan error

    def deleteStudentData(self, studentList, idNumber): # Membuat method untuk menghapus data mahasiswa
        find = False # Untuk mengecek apakah data ada atau tidak, nilai defaultnya adalah false yang menandakan data tidak ada
        i = 0 # Membuat iterator untuk mengecek data dalam list

        while not find and i < len(studentList): # do while untuk mengecek apakah data yang akan diubah ada di dalam studentList atau tidak
            if studentList[i].getIdNumber() == idNumber: # Jika data yang akan dihapus ditemukan di dalam studentList, maka data akan dihapus
                find = True # Jika data ditemukan, maka nilai find akan berubah menjadi true
                del studentList[i] # Menghapus data yang ditemukan

                print("\n[SUCCESS] Data has been deleted.\n\n") # Menampilkan pesan bahwa data berhasil dihapus  
            i += 1 # Iterasi untuk mengecek data selanjutnya

        if not find: # Jika data tidak ditemukan, maka akan menampilkan pesan error
            print("\n[ERROR] ID number not exist!\n\n") # Pesan error


    def showListOfStudent(self, studentList): # Membuat method untuk menampilkan daftar mahasiswa
        if not studentList: # Jika list kosong, maka akan menampilkan pesan error
            print("\n[WARNING] The student list is still empty.\n\n") # Pesan error
        else: # Jika list tidak kosong, maka akan menampilkan data mahasiswa
            print() # Untuk memberikan jarak antara menu command dan daftar mahasiswa
        
            table = PrettyTable() # Membuat objek table dari class PrettyTable
            table.field_names = ["No.", "Name", "ID Number", "Major", "Faculty"] # Membuat header untuk tabel

            for i, student in enumerate(studentList): # Looping untuk menampilkan data mahasiswa
                table.add_row([i+1, student.getName(), student.getIdNumber(), student.getMajor(), student.getFaculty()]) # Menambahkan data mahasiswa ke dalam tabel

            print(table) # Menampilkan tabel
            print('\n') # Menambah baris kosong