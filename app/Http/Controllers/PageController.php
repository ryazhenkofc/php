<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $data = [
            'title'    => 'Lorem Ipsum',
            'message'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'featured' => true,
            'skills'   => [
                'Dolor'      => 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'Amet'       => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco.',
                'Consectetur' => 'Duis aute irure dolor in reprehenderit in voluptate velit.',
                'Elit'       => 'Excepteur sint occaecat cupidatat non proident.',
            ],
            'notifications' => [],
        ];

        return view('page', $data);
    }
}
