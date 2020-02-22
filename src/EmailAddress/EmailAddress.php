<?php declare(strict_types=1);

namespace Surda\ValueObject\EmailAddress;

use Nette\Utils\Validators;

class EmailAddress
{
    /** @var string */
    private $email;

    /** @var string|null */
    private $name;

    /**
     * @param string      $email
     * @param string|null $name
     * @throws InvalidEmailAddressException
     */
    public function __construct(string $email, ?string $name = NULL)
    {
        if (!Validators::isEmail($email)) {
            throw new InvalidEmailAddressException($email);
        }

        $this->email = $email;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return bool
     */
    public function hasName(): bool
    {
        return $this->name !== NULL;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->hasName() ? sprintf('%s <%s>', $this->getName(), $this->getEmail()) : $this->getEmail();
    }
}
