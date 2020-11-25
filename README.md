## Tentang Sistem Informasi Pendadaran

Sebuah Sistem yang digunakan untuk mengelola pendadaran atau biasa disebut sidang akhir, Sistem ini menggunakan Framework Laravel versi 6

## Fitur

- Admin dapat mengolah akun pengguna yaitu Komisi, Mahasiswa, Dosen dan Admin
- Mahasiswa dapat mendaftar pendadaran
- Komisi dan Admin dapat memverifikasi data pendaftaran mahasiswa
- Komisi dapat mengolah jadwal
- Mahasiswa dan Dosen dapat mengetahui Jadwal yang telah dibuatkan Komisi
- 4 Dosen dapat menginputkan Nilai Pendadaran
- Komisi dapat mengkonfirmasi Nilai yang telah diinputkan Dosen
- Mahasiswa dapat melihat Nilainya jika nilai kurang dari 60 maka ada button daftar ulang'
- Komisi dapat melihat Laporan Pendadaran

## Screenshot Sistem
- Halaman Admin
![Data Admin](https://user-images.githubusercontent.com/74946394/100169460-2440ef80-2ef6-11eb-8849-49719b440e64.PNG)
- Halaman Komisi
![Laporan](https://user-images.githubusercontent.com/74946394/100169636-84d02c80-2ef6-11eb-831b-2fd6f86106ce.PNG)
- Halaman Mahasiswa
![Tambah Registrasi](https://user-images.githubusercontent.com/74946394/100169600-72ee8980-2ef6-11eb-840b-e0ba3a9e149b.PNG)
- Halaman Dosen
![Tambah Nilai](https://user-images.githubusercontent.com/74946394/100169563-5eaa8c80-2ef6-11eb-94f6-23038b880f78.PNG)

## Login 
Admin -> Username : admin
         Password : admin
         
## Cara Penggunaan
1. Menggunakan php versi 7 atau lebih
2. Install Git Bash https://git-scm.com/downloads
2. Install Composer di https://getcomposer.org/download/
3. Install Laravel versi 6 https://laravel.com/docs/6.x
4. Buka Halaman https://github.com/Ahmadfauzi1111/Laravel-sipendar.git
5. Klick Main dan pilih Branches yang Master
6. Download zip
7. Extrack zip
8. copy file env. example dihalaman yang sama selanjutnya rename dengan nama env 
9. Buka Codingan menggunakan Visual Studio Code
10. Buka terminal di Visual Studio Code ketikan : Composer Install
11. Selanjutnya buat database di Mysql dan samakan namanya dengan format yang ada di Env
12. Buka terminal lagi ketikan : php artisan migrate:fresh --seed
13. Selanjutnya Ketikan : php artisan serve
ENJOY SiStem



