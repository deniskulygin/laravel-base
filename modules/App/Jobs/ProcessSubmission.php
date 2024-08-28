<?php

namespace App\Jobs;

use App\ORM\Manager\SubmissionManger;
use App\Service\Event\SubmissionSaved;
use App\Service\Job\SubmitData;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\Facades\Log;

class ProcessSubmission implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(private readonly SubmitData $data)
    {
    }

    /**
     * @throws BindingResolutionException
     */
    public function handle(Dispatcher $dispatcher, SubmissionManger $submissionManger): void
    {
        try {
            $submission = $submissionManger->create($this->data);

            $dispatcher->dispatch(new SubmissionSaved($submission));
        } catch (\Throwable $e) {
            Log::error('Submission is not processed', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
        }
    }
}
