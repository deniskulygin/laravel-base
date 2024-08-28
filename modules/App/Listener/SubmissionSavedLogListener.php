<?php
declare(strict_types = 1);

namespace App\Listener;

use App\Service\Event\SubmissionSaved;
use Illuminate\Support\Facades\Log;

class SubmissionSavedLogListener
{
    public function handle(SubmissionSaved $event): void
    {
        $submission = $event->getSubmission();

        Log::info('Submission saved successfully', [
            'name' => $submission->getName(),
            'email' => $submission->getEmail(),
        ]);
    }
}
