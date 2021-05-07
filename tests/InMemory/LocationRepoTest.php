<?php


namespace Fira\Test\InMemory;


use Fira\App\DependencyContainer;
use PHPUnit\Framework\TestCase;

final class LocationRepoTest extends TestCase
{
    public function testSetterAndGetters(): void{
        $res = DependencyContainer::getLocationRepository()->getNextid();
        self::assertNotEmpty($res,'worked');
        self::assertEmpty('did not');
    }
    public function testSetterAndGetters2(): void{
        $res = DependencyContainer::getLocationRepository()->getById('1');
        self::assertNotEmpty($res,'worked');
        self::assertEmpty('did not');
    }

    public function testSetterAndGetters4(): void{
        $res = DependencyContainer::getLocationRepository()->getByName('ilia',1,'asc');
        self::assertNotEmpty($res,'worked');
        self::assertEmpty('did not');
    }
    public function testSetterAndGetters5(): void{
        $res = DependencyContainer::getLocationRepository()->getByCategory('ilia',1,'asc');
        self::assertNotEmpty($res,'worked');
        self::assertEmpty('did not');
    }
}