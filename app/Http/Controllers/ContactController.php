<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact(Request $request)
    {
        $details = ['to' => 'mailtrap@webnlblog.nl'];
        SendEmail::dispatch($details);

        echo 'test';
    }
}
