<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert(
            [
                [
                    'title' => 'VueJs',
                    'slug' => 'vue-js',
                ],
                [
                    'title' => 'HTML',
                    'slug' => 'html',
                ],
                [
                    'title' => 'CSS',
                    'slug' => 'css',
                ],
                [
                    'title' => 'React',
                    'slug' => 'react',
                ],
                [
                    'title' => 'Angular',
                    'slug' => 'angular',
                ],
                [
                    'title' => 'JavaScrpt',
                    'slug' => 'java-script',
                ],
                [
                    'title' => 'Pyton',
                    'slug' => 'pyton',
                ],
                [
                    'title' => 'Ruby',
                    'slug' => 'ruby',
                ],
                [
                    'title' => 'PHP',
                    'slug' => 'php',
                ],
                [
                    'title' => 'NodeJs',
                    'slug' => 'node-js',
                ],
                [
                    'title' => 'Laravel',
                    'slug' => 'laravel',
                ],
                [
                    'title' => 'Rails',
                    'slug' => 'rails',
                ],
                [
                    'title' => 'Django',
                    'slug' => 'django',
                ],
                [
                    'title' => 'AdonisJs',
                    'slug' => 'adonis-js',
                ],
                [
                    'title' => 'MySql',
                    'slug' => 'mysql',
                ],
                [
                    'title' => 'Postgres',
                    'slug' => 'postgres',
                ],
                [
                    'title' => 'MongoDb',
                    'slug' => 'mongo-db',
                ],
                [
                    'title' => 'Webpack',
                    'slug' => 'webpack',
                ],
                [
                    'title' => 'Gulp',
                    'slug' => 'gulp',
                ],
                [
                    'title' => 'Socket IO',
                    'slug' => 'socket-io',
                ]
            ]
        );
    }
}
