<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Http\Request\CreateRequest;
use App\Jobs\ProcessSubmission;
use App\Service\Job\SubmitData;
use Illuminate\Http\Response;

class CreateController
{
    public function __invoke(CreateRequest $request): Response
    {
        $data = new SubmitData($request->getEmail(), $request->getName(), $request->getMessage());

        ProcessSubmission::dispatch($data);

        return new Response(status: 202);
    }
}
