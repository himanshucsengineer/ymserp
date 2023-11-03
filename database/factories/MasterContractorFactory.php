<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MasterContractor>
 */
class MasterContractorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'contractor_code' => 1,
            'fullname' => 'Himanshu Goyal',
            'company' => 'Testing Comapny',
            'address' => 'Testing Address',
            'pincode' => '303030',
            'contact' => 1234567890,
            'license' => 'testing licencc',
            'gst' => 'testong gst'
        ];
    }
}
