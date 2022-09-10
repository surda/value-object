<?php declare(strict_types=1);

namespace Tests\Surda\ValueObject\Counter;

use Surda\ValueObject\Counter\Counter;
use Tester\Assert;
use Tester\TestCase;

require __DIR__ . '/../../bootstrap.php';

/**
 * @testCase
 */
class CounterTest extends TestCase
{
    public function testCounter()
    {
        $counter = new Counter();

        Assert::false($counter->isAdded());
        Assert::false($counter->isUpdated());
        Assert::false($counter->isDeleted());
        Assert::false($counter->isSkipped());
        Assert::false($counter->isAddedOrUpdated());
        Assert::false($counter->isAnyIncrement());
        Assert::false($counter->isCount());

        $counter->incrementAdd();
        $counter->incrementUpdate();
        $counter->incrementDelete();
        $counter->incrementSkip();
        $counter->increment();

        Assert::true($counter->isAdded());
        Assert::true($counter->isUpdated());
        Assert::true($counter->isDeleted());
        Assert::true($counter->isSkipped());
        Assert::true($counter->isAddedOrUpdated());
        Assert::true($counter->isAddedOrUpdatedOrDeleted());
        Assert::true($counter->isAddedOrUpdatedOrDeletedOrSkipped());
        Assert::true($counter->isAnyIncrement());
        Assert::true($counter->isCount());
    }

    public function testAddIncrement()
    {
        $counter = new Counter();

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
        $counter = new Counter();

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

    public function testDeleteIncrement()
    {
        $counter = new Counter();

        Assert::false($counter->isDeleted());

        $counter->incrementDelete();
        Assert::same(1, $counter->getDeleted());
        Assert::true($counter->isDeleted());
        Assert::true($counter->isAddedOrUpdatedOrDeleted());
        Assert::true($counter->isAnyIncrement());

        $counter->incrementDelete();
        $counter->incrementDelete();
        Assert::same(3, $counter->getDeleted());
    }

    public function testSkipIncrement()
    {
        $counter = new Counter();

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
        $counter = new Counter();

        Assert::false($counter->isNotImported());
        Assert::same(0, $counter->getNotImported());
        Assert::false($counter->isNotImported());

        $counter->setNotImported(10);
        Assert::same(10, $counter->getNotImported());
        Assert::true($counter->isNotImported());
    }
    public function testCount()
    {
        $counter = new Counter();

        Assert::false($counter->isCount());

        $counter->increment();
        Assert::same(1, $counter->getCount());
        Assert::true($counter->isCount());

        $counter->increment();
        $counter->increment();
        Assert::same(3, $counter->getCount());
    }
}

(new CounterTest())->run();