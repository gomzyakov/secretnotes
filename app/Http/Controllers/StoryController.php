<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Contracts\View\View;

/**
 * Контроллер бизнес-кейсов.
 */
class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return ViewFactory|View
     */
    public function index(): ViewFactory|View
    {
        return view('home');
    }
}
