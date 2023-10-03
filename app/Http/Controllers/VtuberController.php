<?php

// 例: app/Http/Controllers/VtuberController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vtuber;
use App\Models\FanCertificate;

class VtuberController extends Controller
{
    public function index()
    {
        $vtubers = Vtuber::all();
        return view('dashboard', compact('vtubers'));
    }

    public function show($vtuberId)
    {
        $vtuber = Vtuber::query()->find($vtuberId);

        return view('vtuber.show', compact('vtuber'));
    }

}

