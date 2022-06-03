<?php

namespace App\Services;

use App\Services\Implementations\validationsAnswers;

class responseValidation
{
    public function response(validationsAnswers $output,$request)
    {
        return $output->outPut($request);
    }
}