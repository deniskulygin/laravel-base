<?php
declare(strict_types = 1);

namespace App\Service\Event;

use App\ORM\Model\Submission;

class SubmissionSaved
{
    public function __construct(private readonly Submission $submission)
    {
    }

    public function getSubmission(): Submission
    {
        return $this->submission;
    }
}
