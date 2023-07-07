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
            'project_name' => $this->faker->word,
            'start_date' => $this->faker->date,
            'end_date' => $this->faker->date,
            'status' => $this->faker->randomElement(['pending', 'in_progress', 'completed']),
            'image' => $this->faker->imageUrl,
            'description' => $this->faker->paragraph,
            'deleted_at' => null,
        ];
    }
}
?>