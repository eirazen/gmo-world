<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Choice;
use App\Models\Question;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $questions = config('app.questions');
        $answerkey = ['a', 'b', 'c', 'd'];
        foreach ($questions as $level => $q) {
            foreach ($q as $qa) {
                $id = Question::factory()->create([
                    'level' => $level,
                    'question' => $qa[0],
                    'explanation' => $qa[5],
                ])->id;
                $ids = [];
                for ($i = 1; $i < 5; $i++) {
                    $choiceId = Choice::factory()->create([
                        'question_id' => $id,
                        'answer' => $qa[$i]
                    ])->id;
                    array_push($ids, $choiceId);
                }
                echo $answerkey[$qa[6]];
                Question::where('id', $id)->update([
                    'answer_key' => $ids[$qa[6]]
                ]);
            }
        }
    }
}
