<?php declare(strict_types=1);

namespace Tests\Surda\ValueObject;

use Surda\ValueObject\EmailAddress\EmailAddress;
use Tester\Assert;
use Tester\TestCase;

require __DIR__ . '/../../bootstrap.php';

/**
 * @testCase
 */
class EmailAddressTest extends TestCase
{
    public function testEmailAddress()
    {
        $emailAddress = new EmailAddress('doe@example.com');
        Assert::same('doe@example.com', $emailAddress->getEmail());
        Assert::false($emailAddress->hasName());
        Assert::null($emailAddress->getName());

        $emailAddress = new EmailAddress('doe@example.com', 'John Doe');
        Assert::same('doe@example.com', $emailAddress->getEmail());
        Assert::true($emailAddress->hasName());
        Assert::same('John Doe', $emailAddress->getName());

        Assert::exception(function () {
            $emailAddress = new EmailAddress('foo');
        }, \Surda\ValueObject\EmailAddress\InvalidEmailAddressException::class, '"foo" is not a valid email.');
    }
}

(new EmailAddressTest())->run();