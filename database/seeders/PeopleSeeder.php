<?php

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Seeder;

class PeopleSeeder extends Seeder
{
    public function run(): void
    {
        // Clear existing data first
        Person::truncate();

        $locations = ['Tokyo', 'Osaka', 'Kyoto', 'Yokohama', 'Sapporo', 'Nagoya', 'Hiroshima', 'Fukuoka'];
        $names = [
            'Emma', 'Liam', 'Olivia', 'Noah', 'Ava', 'William', 'Sophia', 'James',
            'Isabella', 'Benjamin', 'Mia', 'Lucas', 'Charlotte', 'Henry', 'Amelia', 'Alexander',
            'Harper', 'Michael', 'Evelyn', 'Daniel', 'Abigail', 'Matthew', 'Emily', 'Jackson',
            'Elizabeth', 'David', 'Sofia', 'Joseph', 'Ella', 'Samuel', 'Scarlett', 'John',
            'Grace', 'Ryan', 'Chloe', 'Andrew', 'Victoria', 'Nathan', 'Riley', 'Jonathan',
            'Aria', 'Joshua', 'Lily', 'Christian', 'Aubrey', 'Dylan', 'Zoey', 'Caleb',
            'Hannah', 'Isaiah'
        ];

        // Create 50 people with real names
        for ($i = 0; $i < 50; $i++) {
            Person::create([
                'name' => $names[$i], // Use real names from the array
                'age' => rand(20, 35),
                'location' => $locations[array_rand($locations)],
                'picture' => "https://picsum.photos/300/400?random=" . ($i + 1)
            ]);
        }
    }
}