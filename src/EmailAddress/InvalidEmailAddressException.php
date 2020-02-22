<?php declare(strict_types=1);

namespace Surda\ValueObject\EmailAddress;

use InvalidArgumentException;

class InvalidEmailAddressException extends InvalidArgumentException
{

    /**
     * @param string $value
     */
    public function __construct(string $value)
    {
        parent::__construct(sprintf('"%s" is not a valid email.', $value));
    }
}