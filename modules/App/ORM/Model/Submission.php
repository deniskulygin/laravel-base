<?php
declare(strict_types = 1);

namespace App\ORM\Model;

/**
 * @method int getId()
 * @method string getEmail()
 * @method $this setEmail(string $email)
 * @method string getName()
 * @method $this setName(string $name)
 * @method string getMessage()
 * @method $this setMessage(string $message)
 * @method int setCreatedAt(int $createdAt)
 * @method int getCreatedAt()
 * @method int setUpdatedAt(int $updatedAt)
 * @method int|null getUpdatedAt()
 */
class Submission extends AbstractModel
{
    public const TABLE_NAME = 'submissions';
    public const UNIQUE_ID = null;

    protected function init(): void
    {
        $this->table = self::TABLE_NAME;
        $this->dateFormat = 'U';
        $this->casts = [
            'created_at' => 'timestamp',
            'updated_at' => 'timestamp',
        ];
    }
}
