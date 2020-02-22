<?php declare(strict_types=1);

namespace Tests\Surda\ValueObject;

use Surda\ValueObject\ImportCounter\ImportCounter;
use Tester\Assert;
use Tester\TestCase;

require __DIR__ . '/../../bootstrap.php';

/**
 * @testCase
 */
class ImportCounterTest extends TestCase
{
    public function testImportCounter()
    {
        $counter = new ImportCounter();

        Assert::false($counter->isAdded());
        Assert::false($counter->isUpdated());
        Assert::false($counter->isSkipped());
        Assert::false($counter->isAddedOrUpdated());
        Assert::false($counter->isAnyIncrement());

        $counter->incrementAdd();
        $counter->incrementUpdate();
        $counter->incrementSkip();

        Assert::true($counter->isAdded());
        Assert::true($counter->isUpdated());
        Assert::true($counter->isSkipped());
        Assert::true($counter->isAddedOrUpdated());
        Assert::true($counter->isAnyIncrement());
    }

    public function testAddIncrement()
    {
        $counter = new ImportCounter();

        Assert::false($counter->isAdded());

        $counter->incrementAdd();
        Assert::same(1, $counter->getAdded());
        Assert::true($counter->isAdded());
        Assert::true($counter->isAddedOrUpdated());
        Assert::true($counter->isAnyIncrement());

        $counter->incrementAdd();
        $counter->incrementAdd();
        Assert::same(3, $counter->getAdded());
    }

    public function testUpdateIncrement()
    {
        $counter = new ImportCounter();

        Assert::false($counter->isUpdated());

        $counter->incrementUpdate();
        Assert::same(1, $counter->getUpdated());
        Assert::true($counter->isUpdated());
        Assert::true($counter->isAddedOrUpdated());
        Assert::true($counter->isAnyIncrement());

        $counter->incrementUpdate();
        $counter->incrementUpdate();
        Assert::same(3, $counter->getUpdated());
    }

    public function testSkipIncrement()
    {
        $counter = new ImportCounter();

        Assert::false($counter->isSkipped());

        $counter->incrementSkip();
        Assert::same(1, $counter->getSkipped());
        Assert::true($counter->isSkipped());
        Assert::false($counter->isAddedOrUpdated());
        Assert::true($counter->isAnyIncrement());

        $counter->incrementSkip();
        $counter->incrementSkip();
        Assert::same(3, $counter->getSkipped());
    }

    public function testNotImported()
    {
        $counter = new ImportCounter();

        Assert::false($counter->isNotImported());
        Assert::same(0, $counter->getNotImported());
        Assert::false($counter->isNotImported());

        $counter->setNotImported(10);
        Assert::same(10, $counter->getNotImported());
        Assert::true($counter->isNotImported());
    }
}

(new ImportCounterTest())->run();