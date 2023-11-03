<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MasterEmployee>
 */
class MasterEmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'firstname' => 'Himanshu',
            'middlename' => '',
            'lastname' => 'Goyal',
            'employee_code' => 1,
            'contractor_id' => 1,
            'address' => 'Vaishali Nagar',
            'pincode' => '302027',
            'contact' => '1234567890',
            'aadhar' => '1234567899999'
        ];
    }
}
