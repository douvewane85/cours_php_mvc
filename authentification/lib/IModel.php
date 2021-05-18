<?php
namespace bbw_mvc\lib;
interface IModel{
    public function findAll():array;
    public function findById(int $id);
    public function findBy(string $sql,array $data=null,$single=false);
    public function persist(string $sql,array $data):int;
    public function remove(string $sql,array $data):int;
    public function insert(array $data):int;
}