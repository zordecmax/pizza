<?php
namespace App\Services;

use Illuminate\Http\Request;

class ShortRequestLogger extends AbstractRequestLogger
{
    public function getMessage() : string
    {
        return 'This is short logger, works on production mode';
    }

    protected function extractRequestData(Request $request): array
    {
      return ['test' => $request];
    }
}
