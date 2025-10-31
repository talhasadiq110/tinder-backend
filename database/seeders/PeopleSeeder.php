<?php

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Seeder;

class PeopleSeeder extends Seeder
{
    public function run(): void
    {
        $people = [
            [
                'name' => 'Emma',
                'age' => 25,
                'location' => 'Tokyo',
                'picture' => 'https://picsum.photos/300/400?random=1'
            ],
            [
                'name' => 'Liam', 
                'age' => 28,
                'location' => 'Osaka',
                'picture' => 'https://picsum.photos/300/400?random=2'
            ],
            [
                'name' => 'Olivia',
                'age' => 23, 
                'location' => 'Kyoto',
                'picture' => 'https://picsum.photos/300/400?random=3'
            ],
            [
                'name' => 'Noah',
                'age' => 30,
                'location' => 'Tokyo', 
                'picture' => 'https://picsum.photos/300/400?random=4'
            ],
            [
                'name' => 'Ava',
                'age' => 26,
                'location' => 'Yokohama',
                'picture' => 'https://picsum.photos/300/400?random=5'
            ],
            [
                'name' => 'William',
                'age' => 29,
                'location' => 'Tokyo',
                'picture' => 'https://picsum.photos/300/400?random=6'
            ],
            [
                'name' => 'Sophia',
                'age' => 24,
                'location' => 'Osaka',
                'picture' => 'https://picsum.photos/300/400?random=7'
            ],
            [
                'name' => 'James',
                'age' => 31,
                'location' => 'Kyoto',
                'picture' => 'https://picsum.photos/300/400?random=8'
            ],
        ];

        foreach ($people as $person) {
            Person::create($person);
        }
    }
}