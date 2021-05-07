<?php

namespace Fira\Infrastructure\Database\Sql\Mysql;

use DateTimeImmutable;
use Fira\App\DependencyContainer;
use Fira\Domain\Entity\Entity;
use Fira\Domain\Entity\LocationEntity;
use Fira\Domain\Utility\Pager;
use Fira\Domain\Utility\Sort;
use http\Exception\RuntimeException;

class LocationRepository implements \Fira\Domain\Repository\LocationRepository
{
    private int $page;
    private array $entities = [];
    private int $row;
    public function __constructor(int $page, int $rows)
    {
        $this->row += 1;
        $this->page += 1;
    }
    public function getByName(string $name, Pager $pager, Sort $sort): array
    {
        $rowData = DependencyContainer::getSqlDriver()->getRowByName($name, 'locations');
        $entity = new LocationEntity();
        $entity
            ->setId($rowData['id'])
            ->setName($rowData['name'])
            ->setCategory($rowData['category'])
            ->setDescription($rowData['description'])
            ->setLatitude($rowData['latitude'])
            ->setLongitude($rowData['longitude'])
            ->setCreatedAt(new DateTimeImmutable($rowData['created_at']));
        $entity2 = (array)$entity;
        $entity1 = sort($entity2);
        return array($entity1);
    }

    public function getByCategory(string $category, Pager $pager, Sort $sort): array
    {
        $rowData = DependencyContainer::getSqlDriver()->getRowByCategory($category, 'locations');
        $entity = new LocationEntity();
        $entity
            ->setId($rowData['id'])
            ->setName($rowData['name'])
            ->setCategory($rowData['category'])
            ->setDescription($rowData['description'])
            ->setLatitude($rowData['latitude'])
            ->setLongitude($rowData['longitude'])
            ->setCreatedAt(new DateTimeImmutable($rowData['created_at']));
        $entity1 = sort($entity);
        return array($entity1);
    }

    public function registerEntity(Entity $entity): void{
        if(empty($entity)){
            throw new RuntimeException("can't be empty");
        }
    }

    public function save(string $table_name, array $columns, array $values): bool
    {
        $res = MySqlDriver::insert($table_name,$columns,$values);
        if($res){
            return true;
        }
    }

    public function getById(int $id): Entity
    {
        $rowData = DependencyContainer::getSqlDriver()->getRowById($id, 'locations');
        return $this->loadEntityData($rowData);
    }

    public function getByIds(array $id): array
    {
        foreach ($rowData = DependencyContainer::getSqlDriver()->getRowById($id, 'locations')
        == new LocationEntity()) {
            $entity
                ->setId($rowData['id'])
                ->setName($rowData['name'])
                ->setCategory($rowData['category'])
                ->setDescription($rowData['description'])
                ->setLatitude($rowData['latitude'])
                ->setLongitude($rowData['longitude'])
                ->setCreatedAt(new DateTimeImmutable($rowData['created_at']));
        }
        return array($entity);
    }

    public function delete(int $id, string $name, string $category, string $description, float $latitide, float $longtitude): bool
    {
        $rowData = DependencyContainer::getSqlDriver()->getRowById($id, 'locations');
        unset($rowData);
    }

    public function getNextid(): LocationEntity
    {
        $rowData = DependencyContainer::getSqlDriver()->getnextId($id, 'locations');
        $entity = new LocationEntity();
        $entity
            ->setId($rowData['id'])
            ->setName($rowData['name'])
            ->setCategory($rowData['category'])
            ->setDescription($rowData['description'])
            ->setLatitude($rowData['latitude'])
            ->setLongitude($rowData['longitude'])
            ->setCreatedAt(new DateTimeImmutable($rowData['created_at']));

        return $entity;
    }

    public function search(array $searchParams, Pager $pager, Sort $sort): array
    {
        $name = $searchParams['name'] ?? null;
        $category = $searchParams['category'] ?? null;
        $where = '';
        if ($name) {
            $where = "name = {$name}";
        }

        if ($category) {
            $where = "category = {$category}";
        }

        $results = [];
        $items = DependencyContainer::getSqlDriver()->select(['*'], 'location', $where);

        foreach ($items as $item) {
            // Item => entity
            $results[] = $this->loadEntityData($item);
        }

        return $results;
    }

    private function loadEntityData(array $rowData): LocationEntity
    {
        $entity = new LocationEntity();
        $entity
            ->setId($rowData['id'])
            ->setName($rowData['name'])
            ->setCategory($rowData['category'])
            ->setDescription($rowData['description'])
            ->setLatitude($rowData['latitude'])
            ->setLongitude($rowData['longitude'])
            ->setCreatedAt(new DateTimeImmutable($rowData['created_at']));

        return $entity;
    }
}
