<?php
namespace App\Support\Contracts;

interface BaseRepositoryInterface
{
    /**
     * Get all records.
     *
     * @return mixed
     */
    public function all(array $with = []);

    /**
     * Find a record by ID.
     *
     * @param int $id
     * @return mixed
     */
    public function find(int $id, array $with = []);

    /**
     * Create a new record.
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * Update a record by ID.
     *
     * @param int $id
     * @param array $data
     * @return mixed
     */
    public function update(int $id, array $data);

    /**
     * Delete a record by ID.
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id);
}
