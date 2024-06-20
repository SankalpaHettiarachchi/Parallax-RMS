<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HospitalRequestModel>
 */
class HospitalRequestModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $ran_staus = array('low','medium','high');
        $ran_priority = array('new','in_progress','hold','rejected','cancelled');
        $ran_department = array('Patient Experience','X-Ray','Operaration');

        return [
            'location' => fake()->address,
            'service' => fake()->sentence(3),
            'department' => $ran_department[array_rand($ran_department, 1)],
            'status' =>$ran_staus[array_rand($ran_staus, 1)],
            'priority' =>$ran_priority[array_rand($ran_priority,1 )],
            'requested_by' => fake()->name,
            'assigned_by' => fake()->name,
        ];
    }
}
