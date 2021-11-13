<?php

declare(strict_types=1);

namespace Bavix\Wallet\Test;

use Bavix\Wallet\Internal\Service\DatabaseServiceInterface;
use Bavix\Wallet\Internal\Service\MathServiceInterface;
use Bavix\Wallet\Objects\Cart;
use Bavix\Wallet\Services\CommonServiceLegacy;
use Bavix\Wallet\Services\LockServiceLegacy;
use Bavix\Wallet\Services\WalletServiceLegacy;
use Bavix\Wallet\Test\Common\Models\Transaction;
use Bavix\Wallet\Test\Common\Models\Transfer;
use Bavix\Wallet\Test\Common\Models\Wallet;

/**
 * @internal
 */
class SingletonTest extends TestCase
{
    public function testCart(): void
    {
        self::assertNotSame($this->getRefId(Cart::class), $this->getRefId(Cart::class));
    }

    public function testMathInterface(): void
    {
        self::assertSame($this->getRefId(MathServiceInterface::class), $this->getRefId(MathServiceInterface::class));
    }

    public function testTransaction(): void
    {
        self::assertNotSame($this->getRefId(Transaction::class), $this->getRefId(Transaction::class));
    }

    public function testTransfer(): void
    {
        self::assertNotSame($this->getRefId(Transfer::class), $this->getRefId(Transfer::class));
    }

    public function testWallet(): void
    {
        self::assertNotSame($this->getRefId(Wallet::class), $this->getRefId(Wallet::class));
    }

    public function testCommonService(): void
    {
        self::assertSame($this->getRefId(CommonServiceLegacy::class), $this->getRefId(CommonServiceLegacy::class));
    }

    public function testWalletService(): void
    {
        self::assertSame($this->getRefId(WalletServiceLegacy::class), $this->getRefId(WalletServiceLegacy::class));
    }

    public function testDatabaseService(): void
    {
        self::assertSame($this->getRefId(DatabaseServiceInterface::class), $this->getRefId(DatabaseServiceInterface::class));
    }

    public function testLockService(): void
    {
        self::assertSame($this->getRefId(LockServiceLegacy::class), $this->getRefId(LockServiceLegacy::class));
    }

    protected function getRefId(string $object): string
    {
        return spl_object_hash(app($object));
    }
}
