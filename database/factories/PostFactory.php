<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user_ids = User::all()->pluck('id');

        $images = [
            'https://cdn.pixabay.com/photo/2016/04/04/14/12/monitor-1307227_960_720.jpg',
            'https://cdn.pixabay.com/photo/2021/08/19/12/53/bremen-6557996_960_720.jpg',
            'https://cdn.pixabay.com/photo/2021/09/07/07/11/game-console-6603120_960_720.jpg',
            'https://cdn.pixabay.com/photo/2021/09/03/15/37/mountain-6596074_960_720.jpg',
            'https://cdn.pixabay.com/photo/2016/11/27/21/42/stock-1863880_960_720.jpg',
            'https://cdn.pixabay.com/photo/2016/12/26/17/28/spaghetti-1932466_960_720.jpg',
            'https://cdn.pixabay.com/photo/2015/07/02/10/22/training-828726_960_720.jpg',
            'https://cdn.pixabay.com/photo/2014/08/16/18/17/book-419589_960_720.jpg',
            'https://cdn.pixabay.com/photo/2017/09/06/06/02/pregnant-2720433_960_720.jpg',
            'https://cdn.pixabay.com/photo/2018/05/02/09/29/auto-3368094_960_720.jpg',
        ];

        return [
            'user_id' => $this->faker->randomElement($user_ids),
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraphs(10, true),
            'image_path' => $this->faker->randomElement($images),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
