<?php

namespace App\Database\Seeds;

use App\Entities\User as UserEntity;
use CodeIgniter\Database\Seeder;

class InitialSeed extends Seeder
{
    public function run()
    {
        // input to auth_groups
        $this->db->table('auth_groups')->insertBatch([
            ['id' => 1, 'name' => 'user', 'description' => 'Warga',],
            ['id' => 2, 'name' => 'admin', 'description' => 'Administrator',],
            ['id' => 3, 'name' => 'petugas', 'description' => 'Petugas atau perangkat desa',],
        ]);

        // input to auth_permissions
        $this->db->table('auth_permissions')->insertBatch([
            ['id' => 1, 'name' => 'buat-surat', 'description' => 'Membuat surat tanpa request',],
            ['id' => 2, 'name' => 'manage-user', 'description' => 'Mengelola user',],
            ['id' => 3, 'name' => 'manage-own-profile', 'description' => 'Mengatur profil sendiri',],
        ]);

        // insert to auth_groups_permissions
        $this->db->table('auth_groups_permissions')->insertBatch([
            ['group_id' => 1, 'permission_id' => 3,],
            ['group_id' => 2, 'permission_id' => 1,],
            ['group_id' => 2, 'permission_id' => 2,],
        ]);

        // Insert to tablee users
        $faker = \Faker\Factory::create('id_ID');
        $user = new \App\Models\UserModel();
        // Admin
        $user->withGroup('admin')->insert(new UserEntity([
            'email' => $faker->email,
            'username' => 'admin',
            'fullname' => $faker->name,
            'img_user' => 'default.svg',
            'alamat' => $faker->address,
            'nik' => $faker->nik,
            'kk' => null,
            'tgl_lahir' => $faker->date('Y-m-d'),
            'tempat_lahir' => $faker->city,
            'kewarganegaraan' => 'WNI',
            'agama' => 'Islam',
            'pekerjaan' => $faker->jobTitle,

            'active' => 1,
            'password' => 12345678
        ]));

        // Petugas
        for ($i = 0; $i < 5; $i++) {
            $user->withGroup('petugas')->insert(new UserEntity([
                'email' => $faker->email,
                'username' => 'petugas' . ($i + 1),
                'fullname' => $faker->name,
                'img_user' => 'default.svg',
                'alamat' => $faker->address,
                'nik' => $faker->nik,
                'kk' => null,
                'tgl_lahir' => $faker->date('Y-m-d'),
                'tempat_lahir' => $faker->city,
                'kewarganegaraan' => 'WNI',
                'agama' => 'Islam',
                'pekerjaan' => $faker->jobTitle,

                'active' => 1,
                'password' => 12345678
            ]));
        }

        // User / warga
        for ($i = 0; $i < 10; $i++) {
            $user->withGroup('user')->insert(new UserEntity([
                'email' => $faker->email,
                'username' => 'warga' . ($i + 1),
                'fullname' => $faker->name,
                'img_user' => 'default.svg',
                'alamat' => $faker->address,
                'nik' => $faker->nik,
                'kk' => null,
                'tgl_lahir' => $faker->date('Y-m-d'),
                'tempat_lahir' => $faker->city,
                'kewarganegaraan' => 'WNI',
                'agama' => 'Islam',
                'pekerjaan' => $faker->jobTitle,

                'active' => 1,
                'password' => 12345678
            ]));
        }


        // Insert to table surat
        $surat = new \App\Models\SuratModel();
        for ($i = 0; $i < 10; $i++) {
            $dpn = str_pad(($i+1), 3, '0', STR_PAD_LEFT);
            $month = $faker->randomElement(['January', 'February', 'March', 'April', 'May', 'June']);

            $nama_waraga = $user->select('username')->where('id', $faker->numberBetween(7, 16))->first();

            $data = [
                'id_user'       => $faker->numberBetween(1, 10),
                'nomor_surat'   => $dpn . "/DS.04/" .$this->monthToRomawi($month) . "/" . date('Y'),
                'tanggal_surat' => $faker->dateTimeThisYear()->format('Y-m-d'),
                'pemohon'       => $nama_waraga->username,
                'perihal'       => $faker->randomElement(['permohonan', 'pengajuan']),
                'keperluan'     => $faker->words($faker->randomDigit(), true),
                'keterangan'    => $faker->words($faker->randomDigit(), true),
                'jenis'         => $faker->randomElement(['Surat Pengantar SKCK', 'Surat Keterangan usaha', 'Surat Keterangan tidak mampu']),
                'status'        => $faker->randomElement(['antre', 'siap', 'dibatalkan'])
            ];            

            // if status data dibatalkan
            if ($data['status'] == 'dibatalkan') {
                $data['pesan'] = $faker->words($faker->randomDigit(), true);
            }

            $surat->insert($data);
        }
    }

    // month to romawi
    function monthToRomawi($mon)
    {
        switch ($mon) {
            case 'January':
                return 'I';
                break;
            case 'February':
                return 'II';
                break;
            case 'March':
                return 'III';
                break;
            case 'April':
                return 'IV';
                break;
            case 'May':
                return 'V';
                break;
            case 'June':
                return 'VI';
                break;
            case 'July':
                return 'VII';
                break;
            case 'August':
                return 'VIII';
                break;
            case 'September':
                return 'IX';
                break;
            case 'October':
                return 'X';
                break;
            case 'November':
                return 'XI';
                break;
            case 'December':
                return 'XII';
                break;
            default:
                return 'XII';
                break;
        }
    }
}
