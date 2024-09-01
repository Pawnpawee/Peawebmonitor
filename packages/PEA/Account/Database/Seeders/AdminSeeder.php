<?php
namespace PEA\Account\Database\Seeders;

use Illuminate\Database\Seeder;
use AdsExchange\Account\Domain\Account;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Account::where('admin', 1)->first();

        if(empty($admin)) {
            Sentinel::register([
                'email' => 'admin@example.com',
                'password' => 'admin123',
                'first_name' => 'Admin',
                'last_name' => 'Admin',
                'admin' => true,
            ]);
        }
    }
}
