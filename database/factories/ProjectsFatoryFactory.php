<?php 
namespace Database\Factories;

use App\Models\Projects;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class ProjectsFactory extends Factory
{
    protected $model = Projects::class;

    public function definition()
    {
        return [
            'project_name' => $this->faker->name,
            'start_date' => $this->faker->phoneNumber,
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