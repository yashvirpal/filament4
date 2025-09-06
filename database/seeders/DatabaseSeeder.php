<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Setting;
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

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@localhost.com',
            'password' => bcrypt("password"),
        ]);
        Setting::firstOrCreate([], [
            'account_holder' => 'Mas Lottery',
            'bank'           => 'State Bank of India',
            'branch'         => 'Prayagraj Branch',
            'neft_details'   => 'SBIN000014',
            'gpay'           => null,
            'paytm'          => null,
            'helpline_number' => '+91 9007528507',
        ]);
    }
}
