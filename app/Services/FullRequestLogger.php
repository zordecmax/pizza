<?php
namespace App\Services;

use Illuminate\Http\Request;

class FullRequestLogger extends AbstractRequestLogger
{
    public function getMessage() : string
    {
        return 'This is full logger, works on local mode';
    }

    protected function extractRequestData(Request $request): array
    {
      return ['IP' => $request->ip(), 'URI' => $request->path(), 'Useragent' => $request->header('User-Agent')];
    }
}
