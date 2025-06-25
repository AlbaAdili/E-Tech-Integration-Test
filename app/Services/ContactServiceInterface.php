<?php

namespace App\Services;

use Illuminate\Http\Request;

interface ContactServiceInterface
{
    public function storeContact(Request $request);
}
