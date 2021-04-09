<?php

namespace Database\Factories;

use App\Models\{Guestbook, User};
use Illuminate\Database\Eloquent\Factories\Factory;
use DB;

class GuestbookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Guestbook::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'message' => $this->faker->text($maxNbChars = 590),
            'created_at' => $this->faker->dateTimeBetween($startDate = '-6 months', $endDate = '-1 day', $timezone = null),
            'user_id' => function() {
                return User::orderBy(DB::raw('RAND()'))->first()->id;
            },
            'parent_id' => function() {
                $rnd = rand(1, 100);
                if ($rnd < 50)
                    return 0;
                else {
                    $row = Guestbook::orderBy(DB::raw('RAND()'))->first();
                    if ($row)
                        return $row->id;
                    else
                        return 0;
                }
            }
        ];
    }
}
