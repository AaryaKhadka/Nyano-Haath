<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    
    public function trending(){
        return view('pages.trending');
    }
     public function categories(){
        return view('pages.categories');
    }      

    public function login(){
        return view('auth.login');
    }
    public function aboutnyano(){
        return view('pages.aboutnyano');
    }


   public function categoriesDetail($type)
{
    $categories = [
        'medical' => [
            'title' => 'Start a Medical Fundraiser on NyanoHath',
            'image' => 'bleach.jpg',
            'description' => 'Support for medical emergencies and treatments in Nyanoohaat.'
        ],
        'education' => [
            'title' => 'Start an Education Fundraiser on NyanoHath',
            'image' => 'bleach.jpg',
            'description' => 'Teachers, students, parents, clubs, and more use GoFundMe as a trusted and easy way to raise money for education needs. Education fundraising is available for your classroom, tuition assistance, after school program, or school supplies.'
        ],
        'animal' => [
            'title' => 'Start an Animal Fundraiser on NyanoHath',
            'image' => 'bleach.jpg',
            'description' => 'PAnimal-lovers are coming to NyanoHath to fundraise for vet bills, animal shelters, and charities supporting wildlife.'
        ],
        'emergency' => [
            'title' => 'Start an Emergency Fundraiser on NyanoHath',
            'image' => 'bleach.jpg',
            'description' => 'When life brings unexpected moments, look to your community for help. GoFundMe is a trusted way to quickly fundraise for the funds you need.'
        ],
    ];

    if (!array_key_exists($type, $categories)) {
        abort(404);
    }

    return view('pages.categoriesDetail', [
    'title' => $categories[$type]['title'],
    'image' => $categories[$type]['image'],
    'description' => $categories[$type]['description'],
]);

}
}



