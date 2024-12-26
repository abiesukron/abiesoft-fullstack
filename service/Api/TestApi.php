<?php 

namespace App\Service\Api;

use Abiesoft\Resources\Utilities\Cookies;
use Abiesoft\Resources\Utilities\Generate;
use Abiesoft\Resources\Utilities\Reader;
use App\Model\Test;
use App\Service\Service;

class TestApi extends Service
{
    public function load($param)
    {
        $this->authentication();
        return match ($this->requestMethod()) {
            'post' => $this->keep(),
            'put' => $this->replace(),
            'delete' => $this->remove(),
            default => $this->get($param)
        };
    }

    protected function get($param)
    {
        if($param){
            $this->getWithParam($param);
        }else{
            $this->getWithoutParam();
        }
    }

    protected function getWithParam($param)
    {
        return match($param[0]){
            'surat' => $this->dataSurat(),
            'user' => $this->dataUser(),
            default => $this->emptyData()
        };
    }

    protected function dataSurat()
    {
        $data = [
            [
                'id' => 1,
                'noreg' => '1/12/RES/I/2024',
                'nama' => 'Andi Kusuma',
                'perihal' => 'pengaduan',
                'nosurat' => 'B/1/LAW/2024',
                'tglsurat' => '1 Januari 2024',
                'penanganan' => 'B'
            ],
            [
                'id' => 1,
                'noreg' => '3/2/RES/I/2024',
                'nama' => 'Budi Santoso',
                'perihal' => 'Keluhan masyarakat',
                'nosurat' => '1/BUD/2024',
                'tglsurat' => '1 Januari 2024',
                'penanganan' => 'A'
            ]
        ];
        self::result($data);
    }

    protected function dataUser()
    {
        $data = [
            [
                'id' => 1,
                'photo' => 'https://images.ctfassets.net/h6goo9gw1hh6/2sNZtFAWOdP1lmQ33VwRN3/24e953b920a9cd0ff2e1d587742a2472/1-intro-photo-final.jpg?w=1200&h=992&fl=progressive&q=70&fm=jpg',
                'nama' => 'Andi Kusuma',
                'email' => 'andi.kusuma@example.com'
            ],
            [
                'id' => 2,
                'photo' => 'https://www.shutterstock.com/image-photo/head-shot-portrait-close-smiling-600nw-1714666150.jpg',
                'nama' => 'Budi Santoso',
                'email' => 'budi.santoso@example.com'
            ],
            [
                'id' => 3,
                'photo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS6Hb5xzFZJCTW4cMqmPwsgfw-gILUV7QevvQ&s',
                'nama' => 'Citra Dewi',
                'email' => 'citra.dewi@example.com'
            ],
            [
                'id' =>4,
                'photo' => 'https://media.istockphoto.com/id/1300512215/photo/headshot-portrait-of-smiling-ethnic-businessman-in-office.jpg?s=612x612&w=0&k=20&c=QjebAlXBgee05B3rcLDAtOaMtmdLjtZ5Yg9IJoiy-VY=',
                'nama' => 'Dedi Pratama',
                'email' => 'dedi.pratama@example.com'
            ],
            [
                'id' => 5,
                'photo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTvJaoIeJQU_V9rL_ZII61whWyqSFbmMgTgwQ&s',
                'nama' => 'Erna Sari',
                'email' => 'erna.sari@example.com'
            ],
            [
                'id' => 6,
                'photo' => 'https://plus.unsplash.com/premium_photo-1689568126014-06fea9d5d341?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8cHJvZmlsZXxlbnwwfHwwfHx8MA%3D%3D',
                'nama' => 'Fikri Hidayat',
                'email' => 'fikri.hidayat@example.com'
            ],
            [
                'id' => 7,
                'photo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQIiXek5XSm6IQi4L6SQVvFZg6K3RzFRLCWNg&s',
                'nama' => 'Gita Ramadhani',
                'email' => 'gita.ramadhani@example.com'
            ],
            [
                'id' => 8,
                'photo' => 'https://media.istockphoto.com/id/1285124274/photo/middle-age-man-portrait.jpg?s=612x612&w=0&k=20&c=D14m64UChVZyRhAr6MJW3guo7MKQbKvgNVdKmsgQ_1g=',
                'nama' => 'Hendra Wijaya',
                'email' => 'hendra.wijaya@example.com'
            ],
            [
                'id' => 9,
                'photo' => 'https://media.istockphoto.com/id/1320811419/photo/head-shot-portrait-of-confident-successful-smiling-indian-businesswoman.jpg?s=612x612&w=0&k=20&c=bCUTB8vd8MnzZFIq-x645-SmLNk2sQzOvOvWCPGDfZ4=',
                'nama' => 'Indah Wulandari',
                'email' => 'indah.wulandari@example.com'
            ],
            [
                'id' => 10,
                'photo' => 'https://t4.ftcdn.net/jpg/06/39/64/83/360_F_639648361_uQR8Xfn2ST2XV3zJ48LuBiB7GjmbQOR4.jpg',
                'nama' => 'Joko Saputra',
                'email' => 'joko.saputra@example.com'
            ]
        ];
        self::result($data);
    }
    
    protected function emptyData()
    {
        self::result([]);
    }

    protected function getWithoutParam()
    {
        Test::all(output:'json');
    }

    protected function keep()
    {
        Test::insert();
    }

    protected function replace()
    {
        Test::replace();
    }

    protected function remove()
    {
        Test::remove();
    }

}
