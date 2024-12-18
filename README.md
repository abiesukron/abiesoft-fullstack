# AbieSoft Api
Tool ini digunakan untuk mengelola database mysql. Tool simpel ini memungkinkan kita mengelola beberapa fitur sederhana yang tersedia di DBMS seperti membuat tabel atau menghapus tabel, mengimport tabel, membackup data, merestore data dan atau mereset data.

# Install
Silahkan cloning dulu source codenya bisa download, atau cloning dengan cara berikut :
```
git clone https://github.com/abiesukron/abiesoft-api 
```

# Konfigurasi
Buat file <code>.env</code> menggunakan <code>.env_sample</code> lalu atur konfigurasinya sesuai dengan database yang kita gunakan. Kemudian buka <code>Command Prompt</code> atau <code>Window PowerShell</code> untuk menjalankan code berikut :
```
php abiesoft help
```
Jika sudah menampilkan help dari tool abiesoft, maka tool ini siap digunakan.

# Membuat Schema Tabel
Perintah untuk membuat sebuah schema tabel adalah sebagai berikut. Sebagai contoh kita akan membuat schema tabel untuk <code>users</code>, maka perintahnya adalah :
```
php abiesoft make:schema users
```
Hasilnya sebagai berikut :
```
Sukses! 
Lokasi: schema/users.php
```
dan ini adalah isi default schema yang sudah dibuat :
```
namespace App\Schema;

use AbieSoft\Resources\Mysql\DB;
use AbieSoft\Resources\Mysql\Schema;
class users extends Schema 
{

    public function buattabel()
    {
        $schema = new Schema;
        /*
            contoh membuat kolom nama VARCHAR
            dengan panjang karakter 50
            $schema->teks(nama: 'nama', panjang: 50);
        */
        $sql = $schema->create('users');
        DB::terhubung()->query($sql);
        $this->buatdata();
    }

    public function buatdata()
    {
        /*
            DB::terhubung()->input('users', [
                'nama' => '',
            ]);
        */
    }
}
$create = new users();
$create->buattabel();

```

# Membuat Kolom Di Schema Tabel
Sebelum kita membuat kolom untuk tabel users, berikut adalah hal-hal yang perlu diperhatikan untuk menulis kolom di schema tabel.
| Nama | Keterangan | Opsi |
| --- | --- | --- |
| `teks` | Teks simpel atau string | nama, panjang, default, null, unique |
| `paragrap` | Paragrap atau teks panjang | nama, null |
| `tanggal` | Tanggal berformat DATETIME | nama, null |
| `angka` | Angka | nama, panjang, default, null, unique |
| `enum` | Pilihan | nama, data, default |
| `boolean` | Boolean | nama, default |

sekarang kita update file <code>schema/users.php</code> yang sudah kita generate secara otomatis, menambahkan kolom nama, email,jenis kelamin, alamat dan umur pada function <code>buattabel</code> :
```
$schema->teks(nama: 'nama');
$schema->teks(nama: 'email', unique:true);
$schema->enum(nama: 'jenis_kelamin', data:['Laki-laki','Perempuan']);
$schema->paragrap(nama: 'alamat');
$schema->tanggal(nama: 'tgl_lahir');
$schema->angka(nama: 'umur');
$schema->boolean(nama: 'status');
```
menjadi seperti ini :
```
namespace App\Schema;

use AbieSoft\Resources\Mysql\DB;
use AbieSoft\Resources\Mysql\Schema;
class users extends Schema 
{

    public function buattabel()
    {
        $schema = new Schema;

        $schema->teks(nama: 'nama');
        $schema->teks(nama: 'email', unique:true);
        $schema->enum(nama: 'jenis_kelamin', data:['Laki-laki','Perempuan']);
        $schema->paragrap(nama: 'alamat');
        $schema->tanggal(nama: 'tgl_lahir');
        $schema->angka(nama: 'umur');
        $schema->boolean(nama: 'status');

        $sql = $schema->create('users');
        DB::terhubung()->query($sql);
        $this->buatdata();
    }

    public function buatdata()
    {
        /*
            DB::terhubung()->input('users', [
                'nama' => '',
            ]);
        */
    }
}
$create = new users();
$create->buattabel();


```
sedangkan untuk function <code>buatdata</code> adalah untuk membuat sample data, kita bisa membuat 1 atau lebih data. contoh kita buat 2 data seperti ini :
```
DB::terhubung()->input('users', [
    'nama' => 'AbieSoft',
    'email' => 'abiesoft@email.com',
    'jenis_kelamin' => 'Laki-laki',
    'alamat' => 'Cirebon',
    'tgl_lahir' => '2006-01-01 00:00:00',
    'umur' => 17,
    'status' => 1,
]);

DB::terhubung()->input('users', [
    'nama' => 'Hiluna',
    'email' => 'hiluna@email.com',
    'jenis_kelamin' => 'Perempuan',
    'alamat' => 'Cirebon',
    'tgl_lahir' => '2007-02-02 00:00:00',
    'umur' => 16,
    'status' => 0,
]);
```
jadi seperti ini :
```
<?php 

namespace App\Schema;

use AbieSoft\Resources\Mysql\DB;
use AbieSoft\Resources\Mysql\Schema;
class users extends Schema 
{

    public function buattabel()
    {
        $schema = new Schema;

        $schema->teks(nama: 'nama');
        $schema->teks(nama: 'email', unique:true);
        $schema->enum(nama: 'jenis_kelamin', data:['Laki-laki','Perempuan']);
        $schema->paragrap(nama: 'alamat');
        $schema->tanggal(nama: 'tgl_lahir');
        $schema->angka(nama: 'umur');
        $schema->boolean(nama: 'status');

        $sql = $schema->create('users');
        DB::terhubung()->query($sql);
        $this->buatdata();
    }

    public function buatdata()
    {
        DB::terhubung()->input('users', [
            'nama' => 'AbieSoft',
            'email' => 'abiesoft@email.com',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'Cirebon',
            'tgl_lahir' => '2006-01-01 00:00:00',
            'umur' => 17,
            'status' => 1,
        ]);

        DB::terhubung()->input('users', [
            'nama' => 'Hiluna',
            'email' => 'hiluna@email.com',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'Cirebon',
            'tgl_lahir' => '2007-02-02 00:00:00',
            'umur' => 16,
            'status' => 0,
        ]);
    }
}
$create = new users();
$create->buattabel();

```

# Mengimport tabel
Untuk mengimport tabel gunakan perintah berikut :
```
php abiesoft db:import
```
setelah kita jalankan akan mendapatkan informasi bahwa tabel sudah diimport seperti ini :
```
-- Tabel users sudah diimport. 

Sukses! 
Total: 1 tabel 
```
Ketika kita menjalankan perintah ini, sistem akan membuatkan secara otomatis tabel <code>migrasi</code> sebagai tempat untuk menyimpan catatan tabel mana saja yang sudah diimport dan tabel mana yang belum diimport. jadi ketika kita menjalankan tabel import ini berulang tidak akan menimpa tabel yang sudah pernah kita import dan hanya akan mengimport tabel yang belum diimport saja.

# Membackup data
Untuk membackup data gunakan perintah berikut :
```
php abiesoft db:backup
```
lalu buat nama backup atau langsung enter lagi untuk nama backup secara default
```
Nama backup datanya apa?
Ketik nama backup (nama tidak menggunakan spasi), atau
Tekan [Enter] untuk melanjutkan dengan nama default
Nama backup : 
```
Jika data berhasil dibackup akan menampilkan informais seperti ini :
```
-- Tabel users sudah dibackup. 

Backup Selesai! 
Total: 1 tabel 
Lokasi: backup/abiesoft_01_12_2023_01 
```
Perintah backup ini hanya membackup tabel yang sudah berisi data.

# Merestore Data
Merestore atau memulihkan data, gunakan perintah berikut :
```
php abiesoft db:restore
```
lalu akan tampil data-data yang sudah pernah kita backup, pilih angkanya lalu enter seperti contoh berikut :
```
Silahkan pilih data yang akan direstore?
[1] abiesoft_01_12_2023_01
Tekan [Enter] untuk membatalkan
Angka pilihan anda :
```
setelah berhasil direstore akan ada informasi seperti ini :
```
-- Tabel users sudah direstore. 

Sukses! 
Total: 1 tabel dipulihkan
```

# Mereset Ulang Data
Mereset ulang data, gunakan perintah berikut :
```
php abiesoft db:refresh
```
perintah ini akan mengembalikan data seperti data yang ada di folder schema ketika pertama kali di import
setelah berhasil informasinya akan seperti ini :
```
-- Tabel users sudah dihapus. 
-- Tabel users sudah diimport. 

Sukses! 
Total: 1 tabel 
```

# Menjalankan server di localhost
Untuk menjalankan server dilocalhost, gunakan perintah berikut :
```
php abiesoft start
```

# Melihat route yang tersedia
Untuk melihat route yang tersedia, gunakan perintah berikut :
```
php abiesoft info route
```

maka akan tampil seperti ini :
```
Daftar Route 
No    Route                                                   Method 
1.    /api/csrf  ------------------------------------------      GET 
2.    /api/test  ------------------------------------------      GET 
3.    /api/test/:id  --------------------------------------      GET 
4.    /api/test/:parameter  -------------------------------      GET 
5.    /api/test  ------------------------------------------     POST 
6.    /api/test  ------------------------------------------      PUT 
7.    /api/test  ------------------------------------------   DELETE 
```

# Menambahkan route
Buka konfigurasi route di folder <code>config/route.yaml</code>

Untuk membuat route default gunakan kode <code>route:</code>. contoh kita membuat route <code>test</code>, maka :
```
test:
```

Untuk membuat route single route gunakan kode. Contoh kita membuat singel route untuk <code>csrf</code>, maka:
```
csrf:
    method: 'get'
    url: '/api/csrf'
    service: 'csrf'
    function: 'set'
```

| Nama | Keterangan |
| --- | --- |
| `csrf` | Nama route |
| `url` | Url route |
| `service` | Class Api yang ada di folder `service/Api/CsrfApi.php` |
| `function` | Function di Class Api yang ada di folder `service/Api/CsrfApi.php` |

# Setup Abiesoft di front end
Copykan kode js berikut ke index frontend.
```
<script>
const Baseurl = 'http://127.0.0.1:7357'; 
const apikey = "rahasia"; // Kode API Samakan dengan kode APIKEY yang ada di file .env 
const _0x9e5634=_0x1900;function _0x1900(_0x9e08da,_0x84107e){const _0xbc7a38=_0xbc7a();return _0x1900=function(_0x19007c,_0xac3b08){_0x19007c=_0x19007c-0x163;let _0x2ff9b8=_0xbc7a38[_0x19007c];return _0x2ff9b8;},_0x1900(_0x9e08da,_0x84107e);}function _0xbc7a(){const _0x43f46e=['then','createElement','data','110FHWJdC','__csrf','length','GET','5411850yfacSe','/api/csrf','120053XgcNzA','querySelectorAll','log','hidden','2711980DhzGTM','append','9838197PogkZD','setAttribute','1297457dzVTin','4569444opVboF','24CqNUfe','value','name','application/json','input','74793LPDbZK'];_0xbc7a=function(){return _0x43f46e;};return _0xbc7a();}(function(_0xb1dda3,_0xe4fa1c){const _0x5bdcfa=_0x1900,_0x48a646=_0xb1dda3();while(!![]){try{const _0x325106=parseInt(_0x5bdcfa(0x171))/0x1+parseInt(_0x5bdcfa(0x16b))/0x2*(-parseInt(_0x5bdcfa(0x167))/0x3)+-parseInt(_0x5bdcfa(0x17a))/0x4+parseInt(_0x5bdcfa(0x175))/0x5+parseInt(_0x5bdcfa(0x16f))/0x6+-parseInt(_0x5bdcfa(0x179))/0x7*(-parseInt(_0x5bdcfa(0x17b))/0x8)+parseInt(_0x5bdcfa(0x177))/0x9;if(_0x325106===_0xe4fa1c)break;else _0x48a646['push'](_0x48a646['shift']());}catch(_0x19fc20){_0x48a646['push'](_0x48a646['shift']());}}}(_0xbc7a,0xaae8c));const HEADER={'x-API-key':apikey,'Content-Type':_0x9e5634(0x165)},HEADERFORM={'x-API-key':apikey};let gF=document[_0x9e5634(0x172)]('form');function oAdavp(){const _0x4d66e7=_0x9e5634;fetch(Baseurl+_0x4d66e7(0x170),{'method':_0x4d66e7(0x16e),'headers':HEADER})[_0x4d66e7(0x168)](_0x3cffe0=>_0x3cffe0['json']())['then'](_0x373353=>{const _0x378230=_0x4d66e7;let _0x48ea24=_0x373353[_0x378230(0x16a)];for(let _0x8f94db=0x0;_0x8f94db<gF[_0x378230(0x16d)];_0x8f94db++){let _0x5f43ea=document[_0x378230(0x169)](_0x378230(0x166));_0x5f43ea[_0x378230(0x178)]('type',_0x378230(0x174)),_0x5f43ea[_0x378230(0x178)]('id','__csrf'),_0x5f43ea[_0x378230(0x178)](_0x378230(0x164),_0x378230(0x16c)),_0x5f43ea[_0x378230(0x178)](_0x378230(0x163),_0x48ea24),gF[_0x8f94db][_0x378230(0x176)](_0x5f43ea);}return![];})['catch'](_0x2e22cc=>{const _0x2517d4=_0x4d66e7;return console[_0x2517d4(0x173)](_0x2e22cc),![];});}oAdavp();
</script>
```