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
            $data[] = [
                'question' => 'Wie hoch darf ich mit einem Quadrocopter fliegen?',
                'answers' => [
                    'answer1' => '10m',
                    'answer2' => '50m',
                    'answer3' => '100m',
                ],
                'right_answer' => '10m',
            ];
        }

        return $data;
    }
}