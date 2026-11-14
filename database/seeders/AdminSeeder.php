<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $admin = User::updateOrCreate(
        ['email' => 'gerente@demo.site.ao'],
        [
            'name' => 'Administrador',
            'password' => Hash::make('demo123!'),
        ]
        );

        $admin->forceFill(['role' => 'admin'])->save();
    }
}
