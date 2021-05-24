<?php
namespace App\Services;

use Illuminate\Http\Request;

class DummyRequestLogger extends AbstractRequestLogger
{
    public function getMessage() : string
    {
        return 'This is dummy logger, works for example purpose';
    }

    protected function extractRequestData(Request $request): array
    {
      return ['test' => 'to show that it works!'];
    }
}
