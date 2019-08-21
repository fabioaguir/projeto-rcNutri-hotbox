<?php

namespace Was\Services;

interface ServiceInterface {

    public function store(array $data);
    public function update(array $data, int $id);
    public function delete(int $id);
    public function load(array $models);
}