<?php

namespace Database\Factories;

use \Spatie\Permission\Models\Permission;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as faker;

class PermissionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Permission::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition($model,faker $faker)
    {
        return [
            'name' => $faker->name
        ];
    }
}
