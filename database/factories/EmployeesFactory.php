<?php 
namespace Database\Factories;

use App\Models\Employees;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class EmployeesFactory extends Factory
{
    protected $model = Employees::class;

    public function definition()
    {
        return [
            'role_id' => $this->faker->numberBetween(1, 10),
            'full_name' => $this->faker->name,
            'mobile' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('password123'),
            'birthday' => $this->faker->date(),
            'image' => $this->faker->imageUrl(),
            'bank_account' => $this->faker->bankAccountNumber,
            'bank_name' => $this->faker->company,
        ];
    }
}
?>