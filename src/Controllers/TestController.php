<?php
namespace Nfgarching\Testing\Controllers;

use Illuminate\Http\Request;
use Nfgarching\Testing\Test;

class TestController
{
    public function __invoke() {
        // dd('---');

        // $quote = $inspire->justDoIt();

        dd('Nfgarching\Testing\Controllers\TestController.php');


        return view('inspire::index');

        // return $quote;
    }
}