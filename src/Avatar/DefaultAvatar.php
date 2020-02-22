<?php declare(strict_types=1);

namespace Surda\ValueObject\Avatar;

class DefaultAvatar implements AvatarInterface
{
    /** @var string */
    private $name;

    /** @var string */
    private $baseUrl;

    /**
     * @param string $name
     * @param string $baseUrl
     */
    public function __construct(string $name , string $baseUrl)
    {
        $this->name = $name;
        $this->baseUrl = $baseUrl;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return sprintf("%s/%s", $this->baseUrl, $this->name);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getUrl();
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return bool
     */
    public function isDefaultAvatar(): bool
    {
        return TRUE;
    }

}