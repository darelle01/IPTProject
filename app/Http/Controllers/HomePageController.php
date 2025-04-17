<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HomePageController extends Controller
{
    public function HomePage() {
        $images = File::files(public_path('images/'));

        // Filter image files
        $carouselImages = array_filter($images, function($file) {
            return in_array(strtolower($file->getExtension()), ['jpg', 'jpeg', 'png', 'gif', 'webp']);
        });

        return view('PublicPages.HomePage', [
            'carouselImages' => $carouselImages
        ]);
    }
}
