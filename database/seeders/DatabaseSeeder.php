<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Media;
use App\Models\Place;
use App\Models\Article;
use App\Models\Contact;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Administrateur',
            'role' => 'ROLE_ADMIN',
            'email' => 'admin@truc.fr',
            'email_verified_at' => now(),
            'password' => Hash::make('test123'),
            'remember_token' => Str::random(10)
        ]);
        Article::factory(10)->create();
        Contact::factory(3)->create();
        Media::factory(10)->create();
        Place::factory(10)->create();
    }
}
