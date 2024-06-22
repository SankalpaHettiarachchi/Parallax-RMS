<?php

namespace Database\Factories;

use App\Enums\Priority;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Enums\Status;

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
        $ran_department = array('Patient Experience','X-Ray','Operaration');
        $ran_status = array('new', 'in progress','on hold','rejected','cancelled');
        $ran_priority = array('low','medium','high');
        $ran_name = array('Hasan Ali','Mohammed','Miles Cremin');
        $ran_location = array('F103-Bed','F104-Bed','F105-Bed','F106-Bed');

        return [
            'location' => $ran_location[array_rand($ran_location, 1)],
            'service' => fake()->sentence(3),
            'department' => $ran_department[array_rand($ran_department, 1)],
            'status' => $ran_status[array_rand($ran_status, 1)],
            'priority' => $ran_priority[array_rand($ran_priority, 1)],
            'requested_by' => $ran_name[array_rand($ran_name, 1)],
            'assigned_by' => $ran_name[array_rand($ran_name, 1)],
        ];
    }
}
