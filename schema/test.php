<?php 

namespace App\Schema;

use Abiesoft\Resources\Mysql\DB;
use Abiesoft\Resources\Mysql\Schema;
class test extends Schema 
{

    public function buattabel()
    {
        $schema = new Schema;
        $schema->teks('email');
        $schema->teks('web');
        $schema->teks('password');
        $schema->tanggal('tanggal');
        $schema->angka('jumlah');
        $schema->enum(nama:'jeniskelamin',data:['Laki-laki','Perempuan']);
        $schema->paragrap('alamat');
        $sql = $schema->create('test');
        DB::terhubung()->query($sql);
        $this->buatdata();
    }

    public function buatdata()
    {
        /*
            DB::terhubung()->input('test', [
                'nama' => '',
            ]);
        */
    }
}
$create = new test();
$create->buattabel();
