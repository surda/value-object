<?php declare(strict_types=1);

namespace Tests\Surda\ValueObject;

use Surda\ValueObject\Avatar\Avatar;
use Surda\ValueObject\Avatar\AvatarFactory;
use Surda\ValueObject\Avatar\DefaultAvatar;
use Tester\Assert;
use Tester\TestCase;

require __DIR__ . '/../../bootstrap.php';

/**
 * @testCase
 */
class AvatarTest extends TestCase
{
    public function testAvatarValueObject()
    {
        $avatar = new Avatar('default.png', '/avatar');
        Assert::same('default.png', $avatar->getName());
        Assert::same('/avatar/default.png', $avatar->getUrl());
        Assert::same('/avatar/default.png', (string) $avatar);
        Assert::false($avatar->isDefaultAvatar());
        Assert::true( $avatar instanceof \Surda\ValueObject\Avatar\AvatarInterface);
    }

    public function testDefaultAvatarValueObject()
    {
        $avatar = new DefaultAvatar('default.png', '/avatar');
        Assert::same('default.png', $avatar->getName());
        Assert::same('/avatar/default.png', $avatar->getUrl());
        Assert::same('/avatar/default.png', (string) $avatar);
        Assert::true($avatar->isDefaultAvatar());
        Assert::true( $avatar instanceof \Surda\ValueObject\Avatar\AvatarInterface);
    }

    public function testAvatarFactory()
    {
        $factory = new AvatarFactory('default.png', '/avatar');

        $avatar = $factory->create('admin.png');
        Assert::same('admin.png', $avatar->getName());
        Assert::false($avatar->isDefaultAvatar());

        $defaultAvatar = $factory->create();
        Assert::same('default.png', $defaultAvatar->getName());
        Assert::true($defaultAvatar->isDefaultAvatar());
    }
}

(new AvatarTest())->run();