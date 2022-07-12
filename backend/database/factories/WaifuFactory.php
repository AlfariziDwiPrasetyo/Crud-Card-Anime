<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Waifu>
 */
class WaifuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = fake()->name($gender = 'female');
        return [
            'name' => $name,
            'description' => collect(fake()->paragraphs(mt_rand(2,3)))->map(function($item){
                return '<p>'.$item.'</p>';
            })->implode(''),
            'slug' => Str::replace(' ', '-', Str::lower($name)),
            'image' => fake()->imageUrl(640, 480, 'your waifu', true, true, 'jpg')
        ];
    }
}
