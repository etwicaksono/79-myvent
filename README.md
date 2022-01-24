## <p align="center">Myvent</p>




## Cara instalasi dan penggunaan

1. Jalankan xampp kemudian nyalakan Apache dan MySQL
2. Buat sebuah database dengan nama "myvent"
3. Jalankan perintah ini pada terminal `git clone https://github.com/etwicaksono/79-myvent.git`
4. Jalankan perintah `composer install`
5. Jalankan perintah `php artisan serve`
6. Jalankan perintah `php artisan migrate:refresh --seed`

• Formulir untuk menambahkan acara baru.
(UI Sekreatif Mungkin)
1. Kolom meliputi judul, lokasi, peserta, tanggal, dan catatan
2. Terdapat fitur upload image untuk digunakan disetiap card
3. Formulir tidak dapat dikirimkan ketika salah satu kotak input kosong
4. Tampilkan pesan peringatan untuk input yang tidak valid (label atau
tooltip)
5. Input tanggal harus memunculkan kalender
6. Catatan/Note harus lebih dari 50 karakter
7. Buat panggilan POST API menggunakan fetch atau axios.
8. Setelah berhasil mengirimkan, pop-up notifikasi yang tepat
harus ditampilkan.
9. Kartu acara baru harus ditambahkan ke Step 2 (Halaman Home)

• Komponen tampilan yang dapat digulir terdiri dari beberapa card. [1]
1. Anda harus mendapatkan data dari format array JSON dari hasil POST
pada Step 1
2. Gunakan fungsi GET dengan fetch / axios
3. Card harus bisa di tampilkan banyak sesuai isian form

1. Setiap data yang di POST oleh user di harapakan dijadikan tampilan
dashboard khusus menggunakan tabel.
2. FIeld Untuk Column Head Terdapat :
a. Nomor (Sesuai User Input) harus urut.
b. Judul Acara
c. Lokasi
d. Peserta
e. tanggal
f. Catatan
3. Terdapat Fitur Search pada table sesuai colomn head point (a, b, c, d, e)
4. Terdapat fitur pagination dengan limit maksimal per table adalah 5 baris
data.

