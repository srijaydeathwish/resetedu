<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ModeController extends Controller
{
    public function chooseMode()
    {
        $modes = [
            'distance'  => ['slug' => 'distance', 'name' => 'Distance'],
            'ftel'      => ['slug' => 'ftel', 'name' => 'FTel'],
            'regular'   => ['slug' => 'regular', 'name' => 'Regular'],
        ];

        return Inertia::render('Student/Modes/ChooseMode', compact('modes'));
    }

    public function showMode($mode)
    {
        switch ($mode) {
            case 'distance':
                $universities = [
                    'heading' => 'UGC AND DISTANCE APPROVED STATE PRIVATE UNIVERSITIES',
                    'mode' => 'distance',
                    'list' => [
                        ['name' => 'SGVU', 'slug' => 'sgvu', 'media' => '/images/sgvu.jpg'],
                        ['name' => 'SVSU', 'slug' => 'svsu', 'media' => '/images/svsu.jpg'],
                    ]
                ];
                break;

            case 'ftel':
                $universities = [
                    'heading' => 'UGC APPROVED STATE PRIVATE UNIVERSITIES F-Tel Mode',
                    'mode' => 'ftel',
                    'list' => [
                        ['name' => 'MU', 'slug' => 'mu', 'media' => '/images/mu.jpg'],
                    ]
                ];
                break;

            case 'regular':
                $universities = [
                    'heading' => 'UGC APPROVED STATE PRIVATE UNIVERSITIES FOR REGULAR COURSES',
                    'mode' => 'regular',
                    'list' => [
                        ['name' => 'YBNU',  'slug' => 'ybnu',   'media' => '/images/ybnu.jpg'],
                        ['name' => 'AU',    'slug' => 'au',     'media' => '/images/au.jpg'],
                        ['name' => 'HGU',   'slug' => 'hgu',    'media' => '/images/hgu.jpg'],
                        ['name' => 'AIU',   'slug' => 'aiu',    'media' => '/images/aiu.jpg'],
                        ['name' => 'SSU',   'slug' => 'sssu',   'media' => '/images/ssu.jpg'],
                    ]
                ];

                break;

            default:
                $universities = [
                    'heading' => 'Null',
                    'mode' => 'Null',
                    'list' => [
                        ['name' => 'Null', 'slug' => 'null', 'media' => '/images/noimage.jpg']
                    ]
                ];
                break;
        }

        // Logic for all modes
        return Inertia::render('Student/Modes/Universities', compact('universities'));
    }
}
