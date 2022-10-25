<?php

namespace Database\Seeders;

use App\Models\Score;
use Illuminate\Database\Seeder;

class ScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =[
            [
                'id' => '1',
                'student_id' => '1001',
                'subject_id' => '1002',
                'score' => '76',
            ],
            [
                'id' => '2',
                'student_id' => '1002',
                'subject_id' => '1003',
                'score' => '60',
            ],
            [
                'id' => '3',
                'student_id' => '1003',
                'subject_id' => '1004',
                'score' => '68',
            ],
            [
                'id' => '4',
                'student_id' => '1004',
                'subject_id' => '1005',
                'score' => '73',
            ],
            [
                'id' => '5',
                'student_id' => '1001',
                'subject_id' => '1001',
                'score' => '78',
            ],
        ];

        Score::insert($data);
    }
}
