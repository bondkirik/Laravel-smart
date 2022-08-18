<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('Qwerty_1'),
                'is_admin' => 1
            ];

        if (!User::find($user['id'])) {
            $user['created_at'] = Carbon::now();
            $user['updated_at'] = Carbon::now();
            DB::table('users')->updateOrInsert($user);
        }
    }
}
