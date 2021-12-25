<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class AnggotaSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for($i = 1; $i <= 150; $i++){

            // insert data ke table pegawai menggunakan Faker
            DB::table('anggota')->insert([
                'nama' => $faker->name,
                'nim' => $faker->nik,
                'tempat_lahir' => $faker->city,
                'tgl_lahir' => $faker->dateTimeThisCentury->format('d-m-Y'),
                'agama_id' => $faker->numberBetween(1, 6),
                'alamat_asal' => $faker->address,
                'alamat_malang' => $faker->address,
                'no_telp' => $faker->phoneNumber,
                'id_line' => $faker->email,
                'fakultas_id' => $faker->numberBetween(1, 17),
                'prodi_jurusan' => $faker->jobTitle,
                'angkatan' => $faker->year($max = 'now', $min = 2018),
                'tingkatan' => $faker->jobTitle,
                'spab' => $faker->randomElement($array = array (101, 102, 103, 104, 105, 106, 107)),
            ]);
        }
    }
}
