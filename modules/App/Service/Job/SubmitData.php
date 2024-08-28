<?php
declare(strict_types = 1);

namespace App\Service\Job;

class SubmitData
{
    public function __construct(
        private readonly string $email,
        private readonly string $name,
        private readonly string $message
    ) {

    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}
