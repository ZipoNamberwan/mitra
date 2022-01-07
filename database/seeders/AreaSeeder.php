<?php

namespace Database\Seeders;

use App\Models\Subdistricts;
use App\Models\Villages;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sukapura = Subdistricts::create([
            'code' => '010',
            'name' => 'Sukapura'
        ]);

        Villages::create([
            'name' => 'Ngadisari',
            'code' => '001',
            'subdistrict' => $sukapura->id
        ]);
        Villages::create([
            'name' => 'Sariwani',
            'code' => '002',
            'subdistrict' => $sukapura->id
        ]);
        Villages::create([
            'name' => 'Kedasih',
            'code' => '003',
            'subdistrict' => $sukapura->id
        ]);
        Villages::create([
            'name' => 'Pakel',
            'code' => '004',
            'subdistrict' => $sukapura->id
        ]);
        Villages::create([
            'name' => 'Ngepung',
            'code' => '005',
            'subdistrict' => $sukapura->id
        ]);
        Villages::create([
            'name' => 'Sukapura',
            'code' => '006',
            'subdistrict' => $sukapura->id
        ]);
        Villages::create([
            'name' => 'Sapikerep',
            'code' => '007',
            'subdistrict' => $sukapura->id
        ]);
        Villages::create([
            'name' => 'Wonokerto',
            'code' => '008',
            'subdistrict' => $sukapura->id
        ]);
        Villages::create([
            'name' => 'Ngadirejo',
            'code' => '009',
            'subdistrict' => $sukapura->id
        ]);
        Villages::create([
            'name' => 'Ngadas',
            'code' => '010',
            'subdistrict' => $sukapura->id
        ]);
        Villages::create([
            'name' => 'Jetak',
            'code' => '011',
            'subdistrict' => $sukapura->id
        ]);
        Villages::create([
            'name' => 'Wonoroto',
            'code' => '012',
            'subdistrict' => $sukapura->id
        ]);

        $sumber = Subdistricts::create([
            'code' => '020',
            'name' => 'Sumber'
        ]);
        Villages::create([
            'name' => 'Ledokombo',
            'code' => '001',
            'subdistrict' => $sumber->id
        ]);
        Villages::create([
            'name' => 'Pandansari',
            'code' => '002',
            'subdistrict' => $sumber->id
        ]);
        Villages::create([
            'name' => 'Sumberanom',
            'code' => '003',
            'subdistrict' => $sumber->id
        ]);
        Villages::create([
            'name' => 'Wonokerso',
            'code' => '004',
            'subdistrict' => $sumber->id
        ]);
        Villages::create([
            'name' => 'Gemito',
            'code' => '005',
            'subdistrict' => $sumber->id
        ]);
        Villages::create([
            'name' => 'Tukul',
            'code' => '006',
            'subdistrict' => $sumber->id
        ]);
        Villages::create([
            'name' => 'Sumber',
            'code' => '007',
            'subdistrict' => $sumber->id
        ]);
        Villages::create([
            'name' => 'Cepoko',
            'code' => '008',
            'subdistrict' => $sumber->id
        ]);
        Villages::create([
            'name' => 'Rambaan',
            'code' => '009',
            'subdistrict' => $sumber->id
        ]);

        $kuripan = Subdistricts::create([
            'code' => '030',
            'name' => 'Kuripan'
        ]);
        Villages::create([
            'name' => 'Wonosari',
            'code' => '001',
            'subdistrict' => $kuripan->id
        ]);
        Villages::create([
            'name' => 'Jatisari',
            'code' => '002',
            'subdistrict' => $kuripan->id
        ]);
        Villages::create([
            'name' => 'Kedawung',
            'code' => '003',
            'subdistrict' => $kuripan->id
        ]);
        Villages::create([
            'name' => 'Karangrejo',
            'code' => '004',
            'subdistrict' => $kuripan->id
        ]);
        Villages::create([
            'name' => 'Resongo',
            'code' => '005',
            'subdistrict' => $kuripan->id
        ]);
        Villages::create([
            'name' => 'Wringinanom',
            'code' => '006',
            'subdistrict' => $kuripan->id
        ]);
        Villages::create([
            'name' => 'Menyono',
            'code' => '007',
            'subdistrict' => $kuripan->id
        ]);

        $bantaran = Subdistricts::create([
            'code' => '040',
            'name' => 'Bantaran'
        ]);
        Villages::create([
            'name' => 'Karanganyar',
            'code' => '001',
            'subdistrict' => $bantaran->id
        ]);
        Villages::create([
            'name' => 'Bantaran',
            'code' => '002',
            'subdistrict' => $bantaran->id
        ]);
        Villages::create([
            'name' => 'Gunung Tugel',
            'code' => '003',
            'subdistrict' => $bantaran->id
        ]);
        Villages::create([
            'name' => 'Kedungrejo',
            'code' => '004',
            'subdistrict' => $bantaran->id
        ]);
        Villages::create([
            'name' => 'Besuk',
            'code' => '005',
            'subdistrict' => $bantaran->id
        ]);
        Villages::create([
            'name' => 'Patokan',
            'code' => '006',
            'subdistrict' => $bantaran->id
        ]);
        Villages::create([
            'name' => 'Legundi',
            'code' => '007',
            'subdistrict' => $bantaran->id
        ]);
        Villages::create([
            'name' => 'Tempuran',
            'code' => '008',
            'subdistrict' => $bantaran->id
        ]);
        Villages::create([
            'name' => 'Kropak',
            'code' => '009',
            'subdistrict' => $bantaran->id
        ]);
        Villages::create([
            'name' => 'Kramatagung',
            'code' => '010',
            'subdistrict' => $bantaran->id
        ]);
        $leces = Subdistricts::create([
            'code' => '050',
            'name' => 'Leces'
        ]);
        Villages::create([
            'name' => 'Tigasan Kulon',
            'code' => '001',
            'subdistrict' => $leces->id
        ]);
        Villages::create([
            'name' => 'Tigasan Wetan',
            'code' => '002',
            'subdistrict' => $leces->id
        ]);
        Villages::create([
            'name' => 'Malasan Kulon',
            'code' => '003',
            'subdistrict' => $leces->id
        ]);
        Villages::create([
            'name' => 'Leces',
            'code' => '004',
            'subdistrict' => $leces->id
        ]);
        Villages::create([
            'name' => 'Pondok Wuluh',
            'code' => '005',
            'subdistrict' => $leces->id
        ]);
        Villages::create([
            'name' => 'Kerpangan',
            'code' => '006',
            'subdistrict' => $leces->id
        ]);
        Villages::create([
            'name' => 'Sumber Kedawung',
            'code' => '007',
            'subdistrict' => $leces->id
        ]);
        Villages::create([
            'name' => 'Clarak',
            'code' => '008',
            'subdistrict' => $leces->id
        ]);
        Villages::create([
            'name' => 'Jorongan',
            'code' => '009',
            'subdistrict' => $leces->id
        ]);
        Villages::create([
            'name' => 'Warujinggo',
            'code' => '010',
            'subdistrict' => $leces->id
        ]);
        $tegalsiwalan = Subdistricts::create([
            'code' => '060',
            'name' => 'Tegal Siwalan'
        ]);
        Villages::create([
            'name' => 'Malasan Wetan',
            'code' => '001',
            'subdistrict' => $tegalsiwalan->id
        ]);
        Villages::create([
            'name' => 'Gunung Bekel',
            'code' => '002',
            'subdistrict' => $tegalsiwalan->id
        ]);
        Villages::create([
            'name' => 'Tegalsono',
            'code' => '003',
            'subdistrict' => $tegalsiwalan->id
        ]);
        Villages::create([
            'name' => 'Bulujaran Kidul',
            'code' => '004',
            'subdistrict' => $tegalsiwalan->id
        ]);
        Villages::create([
            'name' => 'Bulujaran Lor',
            'code' => '005',
            'subdistrict' => $tegalsiwalan->id
        ]);
        Villages::create([
            'name' => 'Paras',
            'code' => '006',
            'subdistrict' => $tegalsiwalan->id
        ]);
        Villages::create([
            'name' => 'Tegalsiwalan',
            'code' => '007',
            'subdistrict' => $tegalsiwalan->id
        ]);
        Villages::create([
            'name' => 'Banjarsawah',
            'code' => '008',
            'subdistrict' => $tegalsiwalan->id
        ]);
        Villages::create([
            'name' => 'Sumber Bulu',
            'code' => '009',
            'subdistrict' => $tegalsiwalan->id
        ]);
        Villages::create([
            'name' => 'Sumber Kledung',
            'code' => '010',
            'subdistrict' => $tegalsiwalan->id
        ]);
        Villages::create([
            'name' => 'Blado Kulon',
            'code' => '011',
            'subdistrict' => $tegalsiwalan->id
        ]);
        Villages::create([
            'name' => 'Tegal Mojo',
            'code' => '012',
            'subdistrict' => $tegalsiwalan->id
        ]);
        $banyuanyar = Subdistricts::create([
            'code' => '070',
            'name' => 'Banyuanyar'
        ]);
        Villages::create([
            'name' => 'Gunung Geni',
            'code' => '001',
            'subdistrict' => $banyuanyar->id
        ]);
        Villages::create([
            'name' => 'Liprak Kidul',
            'code' => '002',
            'subdistrict' => $banyuanyar->id
        ]);
        Villages::create([
            'name' => 'Sentulan',
            'code' => '003',
            'subdistrict' => $banyuanyar->id
        ]);
        Villages::create([
            'name' => 'Gading Kulon',
            'code' => '004',
            'subdistrict' => $banyuanyar->id
        ]);
        Villages::create([
            'name' => 'Klenang Kidul',
            'code' => '005',
            'subdistrict' => $banyuanyar->id
        ]);
        Villages::create([
            'name' => 'Klenang Lor',
            'code' => '006',
            'subdistrict' => $banyuanyar->id
        ]);
        Villages::create([
            'name' => 'Tarokan',
            'code' => '007',
            'subdistrict' => $banyuanyar->id
        ]);
        Villages::create([
            'name' => 'Liprak Wetan',
            'code' => '008',
            'subdistrict' => $banyuanyar->id
        ]);
        Villages::create([
            'name' => 'Liprak Kulon',
            'code' => '009',
            'subdistrict' => $banyuanyar->id
        ]);
        Villages::create([
            'name' => 'Banyuanyar Kidul',
            'code' => '010',
            'subdistrict' => $banyuanyar->id
        ]);
        Villages::create([
            'name' => 'Blado Wetan',
            'code' => '011',
            'subdistrict' => $banyuanyar->id
        ]);
        Villages::create([
            'name' => 'Banyuanyar Tengah',
            'code' => '012',
            'subdistrict' => $banyuanyar->id
        ]);
        Villages::create([
            'name' => 'Pendil',
            'code' => '013',
            'subdistrict' => $banyuanyar->id
        ]);
        Villages::create([
            'name' => 'Alas Sapi',
            'code' => '014',
            'subdistrict' => $banyuanyar->id
        ]);

        $tiris = Subdistricts::create([
            'code' => '080',
            'name' => 'Tiris'
        ]);
        Villages::create([
            'name' => 'Tlogosari',
            'code' => '001',
            'subdistrict' => $tiris->id
        ]);
        Villages::create([
            'name' => 'Andungsari',
            'code' => '002',
            'subdistrict' => $tiris->id
        ]);
        Villages::create([
            'name' => 'Tlogoargo',
            'code' => '003',
            'subdistrict' => $tiris->id
        ]);
        Villages::create([
            'name' => 'Andungbiru',
            'code' => '004',
            'subdistrict' => $tiris->id
        ]);
        Villages::create([
            'name' => 'Tiris',
            'code' => '005',
            'subdistrict' => $tiris->id
        ]);
        Villages::create([
            'name' => 'Ranuagung',
            'code' => '006',
            'subdistrict' => $tiris->id
        ]);
        Villages::create([
            'name' => 'Segaran',
            'code' => '007',
            'subdistrict' => $tiris->id
        ]);
        Villages::create([
            'name' => 'Ranugedang',
            'code' => '008',
            'subdistrict' => $tiris->id
        ]);
        Villages::create([
            'name' => 'Jangkang',
            'code' => '009',
            'subdistrict' => $tiris->id
        ]);
        Villages::create([
            'name' => 'Wedusan',
            'code' => '010',
            'subdistrict' => $tiris->id
        ]);
        Villages::create([
            'name' => 'Racek',
            'code' => '011',
            'subdistrict' => $tiris->id
        ]);
        Villages::create([
            'name' => 'Pesawahan',
            'code' => '012',
            'subdistrict' => $tiris->id
        ]);
        Villages::create([
            'name' => 'Pedagangan',
            'code' => '013',
            'subdistrict' => $tiris->id
        ]);
        Villages::create([
            'name' => 'Rejing',
            'code' => '014',
            'subdistrict' => $tiris->id
        ]);
        Villages::create([
            'name' => 'Tegalwatu',
            'code' => '015',
            'subdistrict' => $tiris->id
        ]);
        Villages::create([
            'name' => 'Tulupari',
            'code' => '016',
            'subdistrict' => $tiris->id
        ]);
        $krucil = Subdistricts::create([
            'code' => '090',
            'name' => 'Krucil'
        ]);
        Villages::create([
            'name' => 'Sumberduren',
            'code' => '001',
            'subdistrict' => $krucil->id
        ]);
        Villages::create([
            'name' => 'Roto',
            'code' => '002',
            'subdistrict' => $krucil->id
        ]);
        Villages::create([
            'name' => 'Kertosuko',
            'code' => '003',
            'subdistrict' => $krucil->id
        ]);
        Villages::create([
            'name' => 'Tambelang',
            'code' => '004',
            'subdistrict' => $krucil->id
        ]);
        Villages::create([
            'name' => 'Krucil',
            'code' => '005',
            'subdistrict' => $krucil->id
        ]);
        Villages::create([
            'name' => 'Bermi',
            'code' => '006',
            'subdistrict' => $krucil->id
        ]);
        Villages::create([
            'name' => 'Kalianan',
            'code' => '007',
            'subdistrict' => $krucil->id
        ]);
        Villages::create([
            'name' => 'Watu Panjang',
            'code' => '008',
            'subdistrict' => $krucil->id
        ]);
        Villages::create([
            'name' => 'Guyangan',
            'code' => '009',
            'subdistrict' => $krucil->id
        ]);
        Villages::create([
            'name' => 'Betek',
            'code' => '010',
            'subdistrict' => $krucil->id
        ]);
        Villages::create([
            'name' => 'Krobongan',
            'code' => '011',
            'subdistrict' => $krucil->id
        ]);
        Villages::create([
            'name' => 'Seneng',
            'code' => '012',
            'subdistrict' => $krucil->id
        ]);
        Villages::create([
            'name' => 'Pandanlaras',
            'code' => '013',
            'subdistrict' => $krucil->id
        ]);
        Villages::create([
            'name' => 'Plaosan',
            'code' => '014',
            'subdistrict' => $krucil->id
        ]);
        $gading = Subdistricts::create([
            'code' => '100',
            'name' => 'Gading'
        ]);
        Villages::create([
            'name' => 'Condong',
            'code' => '001',
            'subdistrict' => $gading->id
        ]);
        Villages::create([
            'name' => 'Jurangrejo',
            'code' => '002',
            'subdistrict' => $gading->id
        ]);
        Villages::create([
            'name' => 'Ranuwurung',
            'code' => '003',
            'subdistrict' => $gading->id
        ]);
        Villages::create([
            'name' => 'Gading Wetan',
            'code' => '004',
            'subdistrict' => $gading->id
        ]);
        Villages::create([
            'name' => 'Bulupandak',
            'code' => '005',
            'subdistrict' => $gading->id
        ]);
        Villages::create([
            'name' => 'Keben',
            'code' => '006',
            'subdistrict' => $gading->id
        ]);
        Villages::create([
            'name' => 'Renteng',
            'code' => '007',
            'subdistrict' => $gading->id
        ]);
        Villages::create([
            'name' => 'Duren',
            'code' => '008',
            'subdistrict' => $gading->id
        ]);
        Villages::create([
            'name' => 'Betek Taman',
            'code' => '009',
            'subdistrict' => $gading->id
        ]);
        Villages::create([
            'name' => 'Batur',
            'code' => '010',
            'subdistrict' => $gading->id
        ]);
        Villages::create([
            'name' => 'Sentul',
            'code' => '011',
            'subdistrict' => $gading->id
        ]);
        Villages::create([
            'name' => 'Dandang',
            'code' => '012',
            'subdistrict' => $gading->id
        ]);
        Villages::create([
            'name' => 'Kertosono',
            'code' => '013',
            'subdistrict' => $gading->id
        ]);
        Villages::create([
            'name' => 'Prasi',
            'code' => '014',
            'subdistrict' => $gading->id
        ]);
        Villages::create([
            'name' => 'Nogosaren',
            'code' => '015',
            'subdistrict' => $gading->id
        ]);
        Villages::create([
            'name' => 'Wangkal',
            'code' => '016',
            'subdistrict' => $gading->id
        ]);
        Villages::create([
            'name' => 'Mojolegi',
            'code' => '017',
            'subdistrict' => $gading->id
        ]);
        Villages::create([
            'name' => 'Kaliacar',
            'code' => '018',
            'subdistrict' => $gading->id
        ]);
        Villages::create([
            'name' => 'Sumbersecang',
            'code' => '019',
            'subdistrict' => $gading->id
        ]);
        $pakuniran = Subdistricts::create([
            'code' => '110',
            'name' => 'Pakuniran'
        ]);
        Villages::create([
            'name' => 'Ranon',
            'code' => '001',
            'subdistrict' => $pakuniran->id
        ]);
        Villages::create([
            'name' => 'Kedungsumur',
            'code' => '002',
            'subdistrict' => $pakuniran->id
        ]);
        Villages::create([
            'name' => 'Gunggungan Kidul',
            'code' => '003',
            'subdistrict' => $pakuniran->id
        ]);
        Villages::create([
            'name' => 'Kalidandan',
            'code' => '004',
            'subdistrict' => $pakuniran->id
        ]);
        Villages::create([
            'name' => 'Blimbing',
            'code' => '005',
            'subdistrict' => $pakuniran->id
        ]);
        Villages::create([
            'name' => 'Gondosuli',
            'code' => '006',
            'subdistrict' => $pakuniran->id
        ]);
        Villages::create([
            'name' => 'Kertonegoro',
            'code' => '007',
            'subdistrict' => $pakuniran->id
        ]);
        Villages::create([
            'name' => 'Bimo',
            'code' => '008',
            'subdistrict' => $pakuniran->id
        ]);
        Villages::create([
            'name' => 'Pakuniran',
            'code' => '009',
            'subdistrict' => $pakuniran->id
        ]);
        Villages::create([
            'name' => 'Patemon',
            'code' => '010',
            'subdistrict' => $pakuniran->id
        ]);
        Villages::create([
            'name' => 'Gunggungan Lor',
            'code' => '011',
            'subdistrict' => $pakuniran->id
        ]);
        Villages::create([
            'name' => 'Sogaan',
            'code' => '012',
            'subdistrict' => $pakuniran->id
        ]);
        Villages::create([
            'name' => 'Sumberkembar',
            'code' => '013',
            'subdistrict' => $pakuniran->id
        ]);
        Villages::create([
            'name' => 'Alaspandan',
            'code' => '014',
            'subdistrict' => $pakuniran->id
        ]);
        Villages::create([
            'name' => 'Bucor Wetan',
            'code' => '015',
            'subdistrict' => $pakuniran->id
        ]);
        Villages::create([
            'name' => 'Bucor Kulon',
            'code' => '016',
            'subdistrict' => $pakuniran->id
        ]);
        Villages::create([
            'name' => 'Glagah',
            'code' => '017',
            'subdistrict' => $pakuniran->id
        ]);
        $kotaanyar = Subdistricts::create([
            'code' => '120',
            'name' => 'Kota Anyar'
        ]);
        Villages::create([
            'name' => 'Sumbercenteng',
            'code' => '001',
            'subdistrict' => $kotaanyar->id
        ]);
        Villages::create([
            'name' => 'Sambirapak Kidul',
            'code' => '002',
            'subdistrict' => $kotaanyar->id
        ]);
        Villages::create([
            'name' => 'Sidomulyo',
            'code' => '003',
            'subdistrict' => $kotaanyar->id
        ]);
        Villages::create([
            'name' => 'Tambakukir',
            'code' => '004',
            'subdistrict' => $kotaanyar->id
        ]);
        Villages::create([
            'name' => 'Curahtemu',
            'code' => '005',
            'subdistrict' => $kotaanyar->id
        ]);
        Villages::create([
            'name' => 'Pasembon',
            'code' => '006',
            'subdistrict' => $kotaanyar->id
        ]);
        Villages::create([
            'name' => 'Sidorejo',
            'code' => '007',
            'subdistrict' => $kotaanyar->id
        ]);
        Villages::create([
            'name' => 'Sambirampak Lor',
            'code' => '008',
            'subdistrict' => $kotaanyar->id
        ]);
        Villages::create([
            'name' => 'Sukorejo',
            'code' => '009',
            'subdistrict' => $kotaanyar->id
        ]);
        Villages::create([
            'name' => 'Talkandang',
            'code' => '010',
            'subdistrict' => $kotaanyar->id
        ]);
        Villages::create([
            'name' => 'Kedungrejoso',
            'code' => '011',
            'subdistrict' => $kotaanyar->id
        ]);
        Villages::create([
            'name' => 'Triwungan',
            'code' => '012',
            'subdistrict' => $kotaanyar->id
        ]);
        Villages::create([
            'name' => 'Kotaanyar',
            'code' => '013',
            'subdistrict' => $kotaanyar->id
        ]);
        $paiton = Subdistricts::create([
            'code' => '130',
            'name' => 'Paiton'
        ]);
        Villages::create([
            'name' => 'Jabungwetan',
            'code' => '001',
            'subdistrict' => $paiton->id
        ]);
        Villages::create([
            'name' => 'Kalikajar Kulon',
            'code' => '002',
            'subdistrict' => $paiton->id
        ]);
        Villages::create([
            'name' => 'Kalikajar Wetan',
            'code' => '003',
            'subdistrict' => $paiton->id
        ]);
        Villages::create([
            'name' => 'Alas Tengah',
            'code' => '004',
            'subdistrict' => $paiton->id
        ]);
        Villages::create([
            'name' => 'Pandean',
            'code' => '005',
            'subdistrict' => $paiton->id
        ]);
        Villages::create([
            'name' => 'Patunjungan',
            'code' => '006',
            'subdistrict' => $paiton->id
        ]);
        Villages::create([
            'name' => 'Taman',
            'code' => '007',
            'subdistrict' => $paiton->id
        ]);
        Villages::create([
            'name' => 'Plampang',
            'code' => '008',
            'subdistrict' => $paiton->id
        ]);
        Villages::create([
            'name' => 'Sidodadi',
            'code' => '009',
            'subdistrict' => $paiton->id
        ]);
        Villages::create([
            'name' => 'Jabung Candi',
            'code' => '010',
            'subdistrict' => $paiton->id
        ]);
        Villages::create([
            'name' => 'Jabung Sisir',
            'code' => '011',
            'subdistrict' => $paiton->id
        ]);
        Villages::create([
            'name' => 'Randumerak',
            'code' => '012',
            'subdistrict' => $paiton->id
        ]);
        Villages::create([
            'name' => 'Randudatah',
            'code' => '013',
            'subdistrict' => $paiton->id
        ]);
        Villages::create([
            'name' => 'Karanganyar',
            'code' => '014',
            'subdistrict' => $paiton->id
        ]);
        Villages::create([
            'name' => 'Pondok Kelor',
            'code' => '015',
            'subdistrict' => $paiton->id
        ]);
        Villages::create([
            'name' => 'Sukodadi',
            'code' => '016',
            'subdistrict' => $paiton->id
        ]);
        Villages::create([
            'name' => 'Paiton',
            'code' => '017',
            'subdistrict' => $paiton->id
        ]);
        Villages::create([
            'name' => 'Sumberanyar',
            'code' => '018',
            'subdistrict' => $paiton->id
        ]);
        Villages::create([
            'name' => 'Sumberejo',
            'code' => '019',
            'subdistrict' => $paiton->id
        ]);
        Villages::create([
            'name' => 'Bhinar',
            'code' => '020',
            'subdistrict' => $paiton->id
        ]);
        $besuk = Subdistricts::create([
            'code' => '140',
            'name' => 'Besuk'
        ]);
        Villages::create([
            'name' => 'Matekan',
            'code' => '001',
            'subdistrict' => $besuk->id
        ]);
        Villages::create([
            'name' => 'Krampilan',
            'code' => '002',
            'subdistrict' => $besuk->id
        ]);
        Villages::create([
            'name' => 'Klampokan',
            'code' => '003',
            'subdistrict' => $besuk->id
        ]);
        Villages::create([
            'name' => 'Jambangan',
            'code' => '004',
            'subdistrict' => $besuk->id
        ]);
        Villages::create([
            'name' => 'Kecik',
            'code' => '005',
            'subdistrict' => $besuk->id
        ]);
        Villages::create([
            'name' => 'Bago',
            'code' => '006',
            'subdistrict' => $besuk->id
        ]);
        Villages::create([
            'name' => 'Alasnyiur',
            'code' => '007',
            'subdistrict' => $besuk->id
        ]);
        Villages::create([
            'name' => 'Sindetanyar',
            'code' => '008',
            'subdistrict' => $besuk->id
        ]);
        Villages::create([
            'name' => 'Sindetlami',
            'code' => '009',
            'subdistrict' => $besuk->id
        ]);
        Villages::create([
            'name' => 'Sumurdalam',
            'code' => '010',
            'subdistrict' => $besuk->id
        ]);
        Villages::create([
            'name' => 'Besuk Kidul',
            'code' => '011',
            'subdistrict' => $besuk->id
        ]);
        Villages::create([
            'name' => 'Besuk Agung',
            'code' => '012',
            'subdistrict' => $besuk->id
        ]);
        Villages::create([
            'name' => 'Randujalak',
            'code' => '013',
            'subdistrict' => $besuk->id
        ]);
        Villages::create([
            'name' => 'Alas Tengah',
            'code' => '014',
            'subdistrict' => $besuk->id
        ]);
        Villages::create([
            'name' => 'Alas Kandang',
            'code' => '015',
            'subdistrict' => $besuk->id
        ]);
        Villages::create([
            'name' => 'Alas Sumur Lor',
            'code' => '016',
            'subdistrict' => $besuk->id
        ]);
        Villages::create([
            'name' => 'Sumberan',
            'code' => '017',
            'subdistrict' => $besuk->id
        ]);
        $kraksaan = Subdistricts::create([
            'code' => '150',
            'name' => 'Kraksaan'
        ]);
        Villages::create([
            'name' => 'Kregenan',
            'code' => '001',
            'subdistrict' => $kraksaan->id
        ]);
        Villages::create([
            'name' => 'Rondokuning',
            'code' => '002',
            'subdistrict' => $kraksaan->id
        ]);
        Villages::create([
            'name' => 'Semampir',
            'code' => '003',
            'subdistrict' => $kraksaan->id
        ]);
        Villages::create([
            'name' => 'Bulu',
            'code' => '004',
            'subdistrict' => $kraksaan->id
        ]);
        Villages::create([
            'name' => 'Sidomukti',
            'code' => '005',
            'subdistrict' => $kraksaan->id
        ]);
        Villages::create([
            'name' => 'Kraksaan Wetan',
            'code' => '006',
            'subdistrict' => $kraksaan->id
        ]);
        Villages::create([
            'name' => 'Rangkang',
            'code' => '007',
            'subdistrict' => $kraksaan->id
        ]);
        Villages::create([
            'name' => 'Kandangjati Kulon',
            'code' => '008',
            'subdistrict' => $kraksaan->id
        ]);
        Villages::create([
            'name' => 'Kandangjati Wetan',
            'code' => '009',
            'subdistrict' => $kraksaan->id
        ]);
        Villages::create([
            'name' => 'Alassumur Kulon',
            'code' => '010',
            'subdistrict' => $kraksaan->id
        ]);
        Villages::create([
            'name' => 'Sumberlele',
            'code' => '011',
            'subdistrict' => $kraksaan->id
        ]);
        Villages::create([
            'name' => 'Taman Sari',
            'code' => '012',
            'subdistrict' => $kraksaan->id
        ]);
        Villages::create([
            'name' => 'Asembakor',
            'code' => '013',
            'subdistrict' => $kraksaan->id
        ]);
        Villages::create([
            'name' => 'Kebon Agung',
            'code' => '014',
            'subdistrict' => $kraksaan->id
        ]);
        Villages::create([
            'name' => 'Sidopekso',
            'code' => '015',
            'subdistrict' => $kraksaan->id
        ]);
        Villages::create([
            'name' => 'Patokan',
            'code' => '016',
            'subdistrict' => $kraksaan->id
        ]);
        Villages::create([
            'name' => 'Asembagus',
            'code' => '017',
            'subdistrict' => $kraksaan->id
        ]);
        Villages::create([
            'name' => 'Kalibuntu',
            'code' => '018',
            'subdistrict' => $kraksaan->id
        ]);
        $krejengan = Subdistricts::create([
            'code' => '160',
            'name' => 'Krejengan'
        ]);
        Villages::create([
            'name' => 'Opo Opo',
            'code' => '001',
            'subdistrict' => $krejengan->id
        ]);
        Villages::create([
            'name' => 'Rawan',
            'code' => '002',
            'subdistrict' => $krejengan->id
        ]);
        Villages::create([
            'name' => 'Seboro',
            'code' => '003',
            'subdistrict' => $krejengan->id
        ]);
        Villages::create([
            'name' => 'Karangren',
            'code' => '004',
            'subdistrict' => $krejengan->id
        ]);
        Villages::create([
            'name' => 'Kedungcaluk',
            'code' => '005',
            'subdistrict' => $krejengan->id
        ]);
        Villages::create([
            'name' => 'Sokaan',
            'code' => '006',
            'subdistrict' => $krejengan->id
        ]);
        Villages::create([
            'name' => 'Dawuhan',
            'code' => '007',
            'subdistrict' => $krejengan->id
        ]);
        Villages::create([
            'name' => 'Gebangan',
            'code' => '008',
            'subdistrict' => $krejengan->id
        ]);
        Villages::create([
            'name' => 'Widoro',
            'code' => '009',
            'subdistrict' => $krejengan->id
        ]);
        Villages::create([
            'name' => 'Sumberkatimoho',
            'code' => '010',
            'subdistrict' => $krejengan->id
        ]);
        Villages::create([
            'name' => 'Krejengan',
            'code' => '011',
            'subdistrict' => $krejengan->id
        ]);
        Villages::create([
            'name' => 'Kamalkuning',
            'code' => '012',
            'subdistrict' => $krejengan->id
        ]);
        Villages::create([
            'name' => 'Tanjungsari',
            'code' => '013',
            'subdistrict' => $krejengan->id
        ]);
        Villages::create([
            'name' => 'Patemon',
            'code' => '014',
            'subdistrict' => $krejengan->id
        ]);
        Villages::create([
            'name' => 'Temenggungan',
            'code' => '015',
            'subdistrict' => $krejengan->id
        ]);
        Villages::create([
            'name' => 'Jatiurip',
            'code' => '016',
            'subdistrict' => $krejengan->id
        ]);
        Villages::create([
            'name' => 'Sentong',
            'code' => '017',
            'subdistrict' => $krejengan->id
        ]);
        $pajarakan = Subdistricts::create([
            'code' => '170',
            'name' => 'Pajarakan'
        ]);
        Villages::create([
            'name' => 'Seloguding Kulon',
            'code' => '001',
            'subdistrict' => $pajarakan->id
        ]);
        Villages::create([
            'name' => 'Seloguding Wetan',
            'code' => '002',
            'subdistrict' => $pajarakan->id
        ]);
        Villages::create([
            'name' => 'Ketompen',
            'code' => '003',
            'subdistrict' => $pajarakan->id
        ]);
        Villages::create([
            'name' => 'Karangbong',
            'code' => '004',
            'subdistrict' => $pajarakan->id
        ]);
        Villages::create([
            'name' => 'Karang Pranti',
            'code' => '005',
            'subdistrict' => $pajarakan->id
        ]);
        Villages::create([
            'name' => 'Gejugan',
            'code' => '006',
            'subdistrict' => $pajarakan->id
        ]);
        Villages::create([
            'name' => 'Karanggeger',
            'code' => '007',
            'subdistrict' => $pajarakan->id
        ]);
        Villages::create([
            'name' => 'Tanjung',
            'code' => '008',
            'subdistrict' => $pajarakan->id
        ]);
        Villages::create([
            'name' => 'Pajarakan Kulon',
            'code' => '009',
            'subdistrict' => $pajarakan->id
        ]);
        Villages::create([
            'name' => 'Sukokerto',
            'code' => '010',
            'subdistrict' => $pajarakan->id
        ]);
        Villages::create([
            'name' => 'Sukomulyo',
            'code' => '011',
            'subdistrict' => $pajarakan->id
        ]);
        Villages::create([
            'name' => 'Penambangan',
            'code' => '012',
            'subdistrict' => $pajarakan->id
        ]);
        $maron = Subdistricts::create([
            'code' => '180',
            'name' => 'Maron'
        ]);
        Villages::create([
            'name' => 'Sumberpoh',
            'code' => '001',
            'subdistrict' => $maron->id
        ]);
        Villages::create([
            'name' => 'Sumberdawe',
            'code' => '002',
            'subdistrict' => $maron->id
        ]);
        Villages::create([
            'name' => 'Brabe',
            'code' => '003',
            'subdistrict' => $maron->id
        ]);
        Villages::create([
            'name' => 'Maron Kidul',
            'code' => '004',
            'subdistrict' => $maron->id
        ]);
        Villages::create([
            'name' => 'Gerongan',
            'code' => '005',
            'subdistrict' => $maron->id
        ]);
        Villages::create([
            'name' => 'Satrean',
            'code' => '006',
            'subdistrict' => $maron->id
        ]);
        Villages::create([
            'name' => 'Brani Wetan',
            'code' => '007',
            'subdistrict' => $maron->id
        ]);
        Villages::create([
            'name' => 'Brani Kulon',
            'code' => '008',
            'subdistrict' => $maron->id
        ]);
        Villages::create([
            'name' => 'Maron Wetan',
            'code' => '009',
            'subdistrict' => $maron->id
        ]);
        Villages::create([
            'name' => 'Maron Kulon',
            'code' => '010',
            'subdistrict' => $maron->id
        ]);
        Villages::create([
            'name' => 'Kedungsari',
            'code' => '011',
            'subdistrict' => $maron->id
        ]);
        Villages::create([
            'name' => 'Pegalangan Kidul',
            'code' => '012',
            'subdistrict' => $maron->id
        ]);
        Villages::create([
            'name' => 'Burmbungan Kidul',
            'code' => '013',
            'subdistrict' => $maron->id
        ]);
        Villages::create([
            'name' => 'Wonorejo',
            'code' => '014',
            'subdistrict' => $maron->id
        ]);
        Villages::create([
            'name' => 'Puspan',
            'code' => '015',
            'subdistrict' => $maron->id
        ]);
        Villages::create([
            'name' => 'Ganting Wetan',
            'code' => '016',
            'subdistrict' => $maron->id
        ]);
        Villages::create([
            'name' => 'Ganting Kulon',
            'code' => '017',
            'subdistrict' => $maron->id
        ]);
        Villages::create([
            'name' => 'Suko',
            'code' => '018',
            'subdistrict' => $maron->id
        ]);
        $gending = Subdistricts::create([
            'code' => '190',
            'name' => 'Gending'
        ]);
        Villages::create([
            'name' => 'Banyuanyar Lor',
            'code' => '001',
            'subdistrict' => $gending->id
        ]);
        Villages::create([
            'name' => 'Sumber Kerang',
            'code' => '002',
            'subdistrict' => $gending->id
        ]);
        Villages::create([
            'name' => 'Sebaung',
            'code' => '003',
            'subdistrict' => $gending->id
        ]);
        Villages::create([
            'name' => 'Pikatan',
            'code' => '004',
            'subdistrict' => $gending->id
        ]);
        Villages::create([
            'name' => 'Bulang',
            'code' => '005',
            'subdistrict' => $gending->id
        ]);
        Villages::create([
            'name' => 'Brumbungan Lor',
            'code' => '006',
            'subdistrict' => $gending->id
        ]);
        Villages::create([
            'name' => 'Jatiadi',
            'code' => '007',
            'subdistrict' => $gending->id
        ]);
        Villages::create([
            'name' => 'Klaseman',
            'code' => '008',
            'subdistrict' => $gending->id
        ]);
        Villages::create([
            'name' => 'Pesisir',
            'code' => '009',
            'subdistrict' => $gending->id
        ]);
        Villages::create([
            'name' => 'Randupitu',
            'code' => '010',
            'subdistrict' => $gending->id
        ]);
        Villages::create([
            'name' => 'Gending',
            'code' => '011',
            'subdistrict' => $gending->id
        ]);
        Villages::create([
            'name' => 'Pajurangan',
            'code' => '012',
            'subdistrict' => $gending->id
        ]);
        Villages::create([
            'name' => 'Curahsawo',
            'code' => '013',
            'subdistrict' => $gending->id
        ]);
        $dringu = Subdistricts::create([
            'code' => '200',
            'name' => 'Dringu'
        ]);
        Villages::create([
            'name' => 'Ngepoh',
            'code' => '001',
            'subdistrict' => $dringu->id
        ]);
        Villages::create([
            'name' => 'Sumberagung',
            'code' => '002',
            'subdistrict' => $dringu->id
        ]);
        Villages::create([
            'name' => 'Sumbersuko',
            'code' => '003',
            'subdistrict' => $dringu->id
        ]);
        Villages::create([
            'name' => 'Watuwungkuk',
            'code' => '004',
            'subdistrict' => $dringu->id
        ]);
        Villages::create([
            'name' => 'Sekarkare',
            'code' => '005',
            'subdistrict' => $dringu->id
        ]);
        Villages::create([
            'name' => 'Mranggonlawang',
            'code' => '006',
            'subdistrict' => $dringu->id
        ]);
        Villages::create([
            'name' => 'Tegalrejo',
            'code' => '007',
            'subdistrict' => $dringu->id
        ]);
        Villages::create([
            'name' => 'Kalirejo',
            'code' => '008',
            'subdistrict' => $dringu->id
        ]);
        Villages::create([
            'name' => 'Kedungdalem',
            'code' => '009',
            'subdistrict' => $dringu->id
        ]);
        Villages::create([
            'name' => 'Tamansari',
            'code' => '010',
            'subdistrict' => $dringu->id
        ]);
        Villages::create([
            'name' => 'Randuputih',
            'code' => '011',
            'subdistrict' => $dringu->id
        ]);
        Villages::create([
            'name' => 'Kalisalam',
            'code' => '012',
            'subdistrict' => $dringu->id
        ]);
        Villages::create([
            'name' => 'Dringu',
            'code' => '013',
            'subdistrict' => $dringu->id
        ]);
        Villages::create([
            'name' => 'Pabean',
            'code' => '014',
            'subdistrict' => $dringu->id
        ]);
        $wonomerto = Subdistricts::create([
            'code' => '210',
            'name' => 'Wonomerto'
        ]);
        Villages::create([
            'name' => 'Patalan',
            'code' => '001',
            'subdistrict' => $wonomerto->id
        ]);
        Villages::create([
            'name' => 'Jrebeng',
            'code' => '002',
            'subdistrict' => $wonomerto->id
        ]);
        Villages::create([
            'name' => 'Wonorejo',
            'code' => '003',
            'subdistrict' => $wonomerto->id
        ]);
        Villages::create([
            'name' => 'Tunggak Creme',
            'code' => '004',
            'subdistrict' => $wonomerto->id
        ]);
        Villages::create([
            'name' => 'Pohsangit Tengah',
            'code' => '005',
            'subdistrict' => $wonomerto->id
        ]);
        Villages::create([
            'name' => 'Kareng Kidul',
            'code' => '006',
            'subdistrict' => $wonomerto->id
        ]);
        Villages::create([
            'name' => 'Kedungsupit',
            'code' => '007',
            'subdistrict' => $wonomerto->id
        ]);
        Villages::create([
            'name' => 'Pohsangit Lor',
            'code' => '008',
            'subdistrict' => $wonomerto->id
        ]);
        Villages::create([
            'name' => 'Pohsangit Ngisor',
            'code' => '009',
            'subdistrict' => $wonomerto->id
        ]);
        Villages::create([
            'name' => 'Sepuhgempol',
            'code' => '010',
            'subdistrict' => $wonomerto->id
        ]);
        Villages::create([
            'name' => 'Sumberkare',
            'code' => '011',
            'subdistrict' => $wonomerto->id
        ]);
        $lumbang = Subdistricts::create([
            'code' => '220',
            'name' => 'Lumbang'
        ]);
        Villages::create([
            'name' => 'Sapih',
            'code' => '001',
            'subdistrict' => $lumbang->id
        ]);
        Villages::create([
            'name' => 'Negororejo',
            'code' => '002',
            'subdistrict' => $lumbang->id
        ]);
        Villages::create([
            'name' => 'Branggah',
            'code' => '003',
            'subdistrict' => $lumbang->id
        ]);
        Villages::create([
            'name' => 'Lambangkuning',
            'code' => '004',
            'subdistrict' => $lumbang->id
        ]);
        Villages::create([
            'name' => 'Palangbesi',
            'code' => '005',
            'subdistrict' => $lumbang->id
        ]);
        Villages::create([
            'name' => 'Boto',
            'code' => '006',
            'subdistrict' => $lumbang->id
        ]);
        Villages::create([
            'name' => 'Wonogoro',
            'code' => '007',
            'subdistrict' => $lumbang->id
        ]);
        Villages::create([
            'name' => 'Lumbang',
            'code' => '008',
            'subdistrict' => $lumbang->id
        ]);
        Villages::create([
            'name' => 'Tandon Sentul',
            'code' => '009',
            'subdistrict' => $lumbang->id
        ]);
        Villages::create([
            'name' => 'Purut',
            'code' => '010',
            'subdistrict' => $lumbang->id
        ]);
        $tongas = Subdistricts::create([
            'code' => '230',
            'name' => 'Tongas'
        ]);
        Villages::create([
            'name' => 'Pamatan',
            'code' => '001',
            'subdistrict' => $tongas->id
        ]);
        Villages::create([
            'name' => 'Sumberkramat',
            'code' => '002',
            'subdistrict' => $tongas->id
        ]);
        Villages::create([
            'name' => 'Seumberrejo',
            'code' => '003',
            'subdistrict' => $tongas->id
        ]);
        Villages::create([
            'name' => 'Sumendi',
            'code' => '004',
            'subdistrict' => $tongas->id
        ]);
        Villages::create([
            'name' => 'Bayeman',
            'code' => '005',
            'subdistrict' => $tongas->id
        ]);
        Villages::create([
            'name' => 'Dungun',
            'code' => '006',
            'subdistrict' => $tongas->id
        ]);
        Villages::create([
            'name' => 'Curahdringu',
            'code' => '007',
            'subdistrict' => $tongas->id
        ]);
        Villages::create([
            'name' => 'Wringinanom',
            'code' => '008',
            'subdistrict' => $tongas->id
        ]);
        Villages::create([
            'name' => 'Tongas Wetan',
            'code' => '009',
            'subdistrict' => $tongas->id
        ]);
        Villages::create([
            'name' => 'Tongas Kulon',
            'code' => '010',
            'subdistrict' => $tongas->id
        ]);
        Villages::create([
            'name' => 'Curah Tulis',
            'code' => '011',
            'subdistrict' => $tongas->id
        ]);
        Villages::create([
            'name' => 'Klampok',
            'code' => '012',
            'subdistrict' => $tongas->id
        ]);
        Villages::create([
            'name' => 'Tanjungrejo',
            'code' => '013',
            'subdistrict' => $tongas->id
        ]);
        Villages::create([
            'name' => 'Tambakrejo',
            'code' => '014',
            'subdistrict' => $tongas->id
        ]);
        $sumberasih = Subdistricts::create([
            'code' => '240',
            'name' => 'Sumberasih'
        ]);
        Villages::create([
            'name' => 'Munengkidul',
            'code' => '001',
            'subdistrict' => $sumberasih->id
        ]);
        Villages::create([
            'name' => 'Pohsangitleres',
            'code' => '002',
            'subdistrict' => $sumberasih->id
        ]);
        Villages::create([
            'name' => 'Laweyan',
            'code' => '003',
            'subdistrict' => $sumberasih->id
        ]);
        Villages::create([
            'name' => 'Muneng',
            'code' => '004',
            'subdistrict' => $sumberasih->id
        ]);
        Villages::create([
            'name' => 'Jangur',
            'code' => '005',
            'subdistrict' => $sumberasih->id
        ]);
        Villages::create([
            'name' => 'Sumberbendo',
            'code' => '006',
            'subdistrict' => $sumberasih->id
        ]);
        Villages::create([
            'name' => 'Mentor',
            'code' => '007',
            'subdistrict' => $sumberasih->id
        ]);
        Villages::create([
            'name' => 'Sumurmati',
            'code' => '008',
            'subdistrict' => $sumberasih->id
        ]);
        Villages::create([
            'name' => 'Pesisir',
            'code' => '009',
            'subdistrict' => $sumberasih->id
        ]);
        Villages::create([
            'name' => 'Lemahkembar',
            'code' => '010',
            'subdistrict' => $sumberasih->id
        ]);
        Villages::create([
            'name' => 'Ambulu',
            'code' => '011',
            'subdistrict' => $sumberasih->id
        ]);
        Villages::create([
            'name' => 'Banjarsari',
            'code' => '012',
            'subdistrict' => $sumberasih->id
        ]);
        Villages::create([
            'name' => 'Gili Ketapang',
            'code' => '013',
            'subdistrict' => $sumberasih->id
        ]);
    }
}
