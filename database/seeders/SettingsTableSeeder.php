<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=array(
            'description'=>"Kami menjual ikan cupang hias seperti ikan cupang giant, plakat, halfmoon, crowntail, dan ikan cupang hias jenis lainnya. Ikan yang kami jual adalah ikan milik kami sendiri dengan kualitas dan perawatan yang baik. Kami melayani pembelian dengan harga satuan dan grosir. Untuk order grosir (6 ekor) diskon 30%. Kami juga melayani pembelian ikan bahanan (10 ekor) dan ikan partaian (50 ekor). Dan kami Omega Id telah banyak mengirimkan ikan cupang hias kami ke seluruh wilayah Indonesia, sejak tahun 2021, melalui website dan sosial media milik kami.",
            'short_des'=>"Omega Id adalah toko online ikan cupang hias terpercaya dan berpengalaman sejak tahun 2021. Kami berlokasi di Kota Tangerang dan melayani pembelian secara satuan, grosir, maupun partaian.",
            'photo'=>"image.jpg",
            'logo'=>'logo.jpg',
            'address'=>"Jl. Teknik Kimia, Keputih, Kec. Sukolilo, Kota SBY, Jawa Timur 60111",
            'email'=>"omegaid@gmail.com",
            'phone'=>"+62 8525 5660 655",
        );
        DB::table('settings')->insert($data);
    }
}