<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\FeedbackReceived;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        \Mail::to(config('mail.gmail'))->send(new FeedbackReceived($request));

        return ['status' => 'ok'];
    }
}
