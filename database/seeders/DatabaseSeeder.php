<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SuperuserSeeder::class);
        //$this->call(UserSeeder::class);

        Article::truncate();
        Category::truncate();
        User::truncate(); 

        $basica = Category::factory()->create([ 
            'name' => 'Matemática Básica',
            'slug' => 'matematica_basica',
        ]);
        $equacoes = Category::factory()->create([ 
            'name' => 'Equações',
            'slug' => 'equacoes',
        ]);
        $funcoes = Category::factory()->create([ 
            'name' => 'Funções',
            'slug' => 'funcoes',
        ]);

        $user = User::factory()->create([
            'name' => 'Thiago Ryo',
        ]);

        Article::factory(10)->for($basica)->create([
            'user_id' => $user->id,
        ]);

        Article::factory(7)->for($equacoes)->create([
            'user_id' => $user->id,
        ]);
        Article::factory(15)->for($funcoes)->create([
            'user_id' => $user->id,
        ]);
    }
}
