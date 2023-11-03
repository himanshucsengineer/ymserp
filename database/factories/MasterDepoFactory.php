<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MasterDepo>
 */
class MasterDepoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => 'Testing Depo',
            'address' => 'mumbai',
            'status' => '1',
            'phone' => 123456890,
            'email' => 'admin@gmail.com',
            'tan' => 'test tan',
            'pan' => 'test pan',
            'service_tax' => ' test service tax',
            'vattin' => 'test vattin',
            'gst' => 'test gst',
            'state' => 'maharatra',
            'state_code' => 'MH',
            'billing_name' => 'Himanshu Goyal',
            'created_by' => 1,
            'updated_by' => 1,
            'company_name' => 'bhawani group',
            'company_address' => 'mumbai',
            'company_phone' => 1234567890,
            'company_email' => 'bhawan@gmail.com'
        ];
    }
}
