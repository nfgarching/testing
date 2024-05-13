<?php

namespace Nfgarching\Testing;

use Illuminate\Support\Facades\Http;

class Test {

    public function justDoIt() {
        $response = Http::get('https://www.google.com');

        dd('Nfgarching\Testing\Test.php');

        dd($response->body());

        return $response['headers'];
    }

}