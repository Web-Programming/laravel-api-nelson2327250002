<?php

namespace Database\Seeders;

use App\Models\Donation;
use App\Models\Funding;
use App\Models\User;
use Attribute;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory(count:10)->create();
        Funding::create(Attribute:[
            'title' => 'Bantu Anak Yatim',
            'desc' => 'Bantu anak yatim piatu yang membutuhkan',
            'image' => 'yatim.jpg',
            'progress' => '0%',
            'duration' => '1 bulan',
            'collected' => 0,
            'target' => 1000000,
            'user_id' => 1
        ]);
        Donation::create(Attribute:[
            'amount' => 100000,
            'funding_id' => 1,
            'user_id' => 2
        ]);
    }
}
