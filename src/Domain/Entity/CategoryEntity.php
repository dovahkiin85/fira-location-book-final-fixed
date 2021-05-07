<?php


namespace Fira\Domain\Entity;


use DateTimeImmutable;

class CategoryEntity extends Entity
{
    protected string $category;




    public function setCategory($category_name){
        $this->category = $category_name;
        return $this->category;
    }


    public function getCategory(){
        return $this->category;
    }


    public function setCreatedAt(DateTimeImmutable $createdAt): Entity
    {
        parent::setCreatedAt($createdAt);
    }
}