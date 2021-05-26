<?php
namespace App\Services;

use Illuminate\Http\Request;

interface RequestLoggerInterface
{
    public function logRequest(Request $request) : void;
}
