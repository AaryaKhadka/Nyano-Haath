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
public function how(){
        return view('pages.how');
    }

   public function categoriesDetail($type)
{
    $categories = [
        'medical' => [
            'title' => 'Start a Medical Fundraiser on NyanoHath',
            'image' => 'medical.png',
            'description' => 'Raise funds for surgeries, treatments, medications, or hospital expenses. Whether urgent or long-term, your community can help support your medical needs.'
        ],
        'education' => [
            'title' => 'Start an Education Fundraiser on NyanoHath',
            'image' => 'education.png',
            'description' => 'Empower students with access to school supplies, tuition fees, and learning materials. Every donation brings someone closer to their dream.'
        ],
        'animal' => [
            'title' => 'Start an Animal Fundraiser on NyanoHath',
            'image' => 'animal.png',
            'description' => 'Help cover vet bills, animal shelter needs, and rescue missions. Fundraisers here protect and care for the animals we love.'
        ],
        'emergency' => [
            'title' => 'Start an Emergency Fundraiser on NyanoHath',
            'image' => 'emergency.jpeg',
            'description' => 'When crisis strikes—whether personal or natural—get urgent support from your community to overcome tough times quickly and safely.'
        ],
        'sports' => [
         'title' => 'Start a Sports Fundraiser on NyanoHath',
         'image' => 'sport.png',
         'description' => 'Raise money for training programs, team kits, and sports events. Fuel passion and discipline for athletes of all ages.'
        ],
       'disaster' => [
         'title' => 'Start a Disaster Relief Fundraiser on NyanoHath',
         'image' => 'disaster.png',
         'description' => 'Support people impacted by floods, earthquakes, or fires. Every donation helps rebuild lives and restore hope.'
        ],
          'environmental-cause' => [
         'title' => 'Start a Environmental Fundraiser on NyanoHath',
         'image' => 'environment.jpeg',
         'description' => 'Fund green projects like tree planting, clean-ups, and solar installations. Join hands to protect our planet for future generations.'
        ],
       'community-project' => [
         'title' => 'Start a Community Project Fundraiser on NyanoHath',
         'image' => 'community.jpg',
         'description' => 'Build schools, repair homes, or create public spaces. Empower communities through collective action and grassroots support.'
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



