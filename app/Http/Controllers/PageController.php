<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    /**
     * Display `about` page.
     *
     * @return ViewFactory|View
     */
    public function showAboutPage(): ViewFactory|View
    {
        return view('about', [
            'active_navbar_item' => 'about',
        ]);
    }
}
