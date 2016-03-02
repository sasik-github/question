<?php
namespace App\Models;

/**
 * User: sasik
 * Date: 2/29/16
 * Time: 4:07 PM
 */
class Question
{

    public function getAll()
    {
        return $this->generateData();
    }

    private function generateData()
    {
        $data = [];

        for($i = 0; $i < 10; $i++) {
            $rightAnswer = rand(1, 3);
            $data[] = [
                'question' => 'Wie hoch darf ich mit einem Quadrocopter fliegen? ' . rand(0, 1000),
                'answers' => [
                    'answer1' => '10m',
                    'answer2' => '50m',
                    'answer3' => '100m',
                ],
                'right_answer' => 'answer' . $rightAnswer,
            ];
        }

        return $data;
    }
}
