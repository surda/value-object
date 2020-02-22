<?php declare(strict_types=1);

namespace Surda\ValueObject\Avatar;

class AvatarFactory
{
    /** @var string */
    private $defaultName;

    /** @var string */
    private $baseUrl;

    /**
     * @param string $defaultName
     * @param string $baseUrl
     */
    public function __construct(string $defaultName, string $baseUrl)
    {
        $this->defaultName = $defaultName;
        $this->baseUrl = $baseUrl;
    }

    /**
     * @param string|null $name
     * @return AvatarInterface
     */
    public function create(?string $name = NULL): AvatarInterface
    {
        if ($name === NULL) {
            return new DefaultAvatar($this->defaultName, $this->baseUrl);
        }

        return new Avatar($name, $this->baseUrl);
    }


}