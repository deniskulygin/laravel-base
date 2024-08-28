<?php
declare(strict_types = 1);

namespace App\ORM\Manager;

use App\Service\Job\SubmitData;
use Illuminate\Container\Container;
use Illuminate\Contracts\Container\BindingResolutionException;
use App\ORM\Model\Submission;

readonly class SubmissionManger
{
    public function __construct(private Container $container)
    {
    }

    /**
     * @throws BindingResolutionException
     */
    public function create(SubmitData $data): Submission
    {
        $submission = $this->getModel();

        $submission
            ->setName($data->getName())
            ->setEmail($data->getEmail())
            ->setMessage($data->getMessage())
            ->save();

        return $submission;
    }

    /**
     * @throws BindingResolutionException
     */
    private function getModel(): Submission
    {
        return $this->container->make(Submission::class);
    }
}
