<?php declare(strict_types=1);

namespace Surda\ValueObject\Avatar;

interface AvatarInterface
{
    /**
     * @return string
     */
    public function getUrl(): string;

    /**
     * @return string
     */
    public function __toString(): string;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return bool
     */
    public function isDefaultAvatar():bool;
}