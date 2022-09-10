<?php declare(strict_types=1);

namespace Surda\ValueObject\Counter;

class Counter
{
    /** @var int */
    private $added = 0;

    /** @var int */
    private $updated = 0;

    /** @var int */
    private $deleted = 0;

    /** @var int */
    private $skipped = 0;

    /** @var int */
    private $notImported = 0;

    /** @var int */
    private $count = 0;

    public function incrementAdd(): void
    {
        $this->added++;
    }

    public function incrementUpdate(): void
    {
        $this->updated++;
    }

    public function incrementDelete(): void
    {
        $this->deleted++;
    }

    public function incrementSkip(): void
    {
        $this->skipped++;
    }

    public function increment(): void
    {
        $this->count++;
    }

    /**
     * @return int
     */
    public function getAdded(): int
    {
        return $this->added;
    }

    /**
     * @return int
     */
    public function getUpdated(): int
    {
        return $this->updated;
    }

    /**
     * @return int
     */
    public function getDeleted(): int
    {
        return $this->deleted;
    }

    /**
     * @return int
     */
    public function getSkipped(): int
    {
        return $this->skipped;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @return bool
     */
    public function isAdded(): bool
    {
        return $this->added > 0;
    }

    /**
     * @return bool
     */
    public function isUpdated(): bool
    {
        return $this->updated > 0;
    }

    /**
     * @return bool
     */
    public function isDeleted(): bool
    {
        return $this->deleted > 0;
    }

    /**
     * @return bool
     */
    public function isSkipped(): bool
    {
        return $this->skipped > 0;
    }

    /**
     * @return bool
     */
    public function isCount(): bool
    {
        return $this->count > 0;
    }

    /**
     * @return bool
     */
    public function isAddedOrUpdated(): bool
    {
        return $this->added > 0 || $this->updated > 0;
    }

    /**
     * @return bool
     */
    public function isAddedOrUpdatedOrDeleted(): bool
    {
        return $this->added > 0 || $this->updated > 0 || $this->deleted > 0;
    }

    /**
     * @return bool
     */
    public function isAddedOrUpdatedOrDeletedOrSkipped(): bool
    {
        return $this->added > 0 || $this->updated > 0 || $this->deleted > 0 || $this->skipped > 0;
    }

    /**
     * @return bool
     */
    public function isAnyIncrement(): bool
    {
        return $this->isAddedOrUpdatedOrDeletedOrSkipped();
    }

    /**
     * @return int
     */
    public function getTotal(): int
    {
        return $this->added + $this->updated + $this->deleted + $this->skipped;
    }

    /**
     * @param int $notImported
     */
    public function setNotImported(int $notImported): void
    {
        $this->notImported = $notImported;
    }

    /**
     * @return bool
     */
    public function isNotImported(): bool
    {
        return $this->notImported > 0;
    }

    /**
     * @return int
     */
    public function getNotImported(): int
    {
        return $this->notImported;
    }
}