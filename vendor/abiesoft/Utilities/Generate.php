<?php 

namespace Abiesoft\Resources\Utilities;

class Generate {

    public static function acak()
    {
        $karakter = 'AaBbCcDdEeFfGgHhIiJjKkLMmNnOoPpQqRrSsTtUuVvWwXxYyZz0123456789';
        $batas = strlen($karakter);
        $result = '';
        for ($i = 0; $i < 12; $i++) {
            $result .= $karakter[rand(0, $batas - 1)];
        }
        return $result;
    }

    public static function angka($jumlah = 4)
    {
        $karakter = '0123456789';
        $batas = strlen($karakter);
        $result = '';
        for ($i = 0; $i < $jumlah; $i++) {
            $result .= $karakter[rand(0, $batas - 1)];
        }
        return $result;
    }

    public static function secretCode($data, $key) {
        $cipher = "id-aes128-wrap";
        $ivlen = openssl_cipher_iv_length($cipher);
        $iv = openssl_random_pseudo_bytes($ivlen);

        if (is_array($data)) {
            $data = json_encode($data);
        }

        $ciphertext = openssl_encrypt($data, $cipher, $key, $options=0, $iv);
        return base64_encode($iv . $ciphertext);
    }

    public static function createSession(string $email) {
        $kode = Generate::angka(6);
        $data = [
            'email' => $email,
            'sesi' => $kode
        ];
        $key = Config::env('SECRET_KEY');
        $secretcode = Generate::secretCode($data, $key);
        if(!Cookies::ada('_SL')){
            Cookies::simpan('_SL',$secretcode);
        }else{
            $secretcode = Cookies::lihat('_SL');
        }
        return $secretcode;
    }


}