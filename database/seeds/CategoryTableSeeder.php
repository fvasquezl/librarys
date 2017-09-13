<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {
        Category::query()->forceCreate([
            'name' => 'Laravel',
            'slug' => 'laravel',
        ]);
        Category::query()->forceCreate([
            'name' => 'PHP',
            'slug' => 'php',
        ]);
        Category::query()->forceCreate([
            'name' => 'JavaScript',
            'slug' => 'javascript',
        ]);
        Category::query()->forceCreate([
            'name' => 'Vue.js',
            'slug' => 'vue-js',
        ]);
        Category::query()->forceCreate([
            'name' => 'CSS',
            'slug' => 'css',
        ]);
        Category::query()->forceCreate([
            'name' => 'Sass',
            'slug' => 'sass',
        ]);
        Category::query()->forceCreate([
            'name' => 'Git',
            'slug' => 'git',
        ]);
        Category::query()->forceCreate([
            'name' => 'Otras tecnologías',
            'slug' => 'otras-tecnologias',
        ]);
    }
}
