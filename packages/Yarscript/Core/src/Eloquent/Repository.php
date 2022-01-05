<?php


namespace Umx\Core\Eloquent;


use Ramsey\Uuid\Uuid;
use Prettus\Repository\{Eloquent\BaseRepository,
    Exceptions\RepositoryException,
    Traits\CacheableRepository,
    Contracts\CacheableInterface};

/**
 * Class Repository
 * @package Sinella\Core\Eloquent
 */
abstract class Repository extends BaseRepository implements CacheableInterface
{
    use CacheableRepository;

    /**
     * Find data by field and value
     *
     * @param  string  $field
     * @param  string  $value
     * @param  array  $columns
     * @return mixed
     */
    public function findOneByField($field, $value = null, $columns = ['*'])
    {
        $model = $this->findByField($field, $value, $columns = ['*']);

        return $model->first();
    }

    /**
     * Find data by field and value
     *
     * @param  array  $where
     * @param  array  $columns
     * @return mixed
     */
    public function findOneWhere(array $where, $columns = ['*'])
    {
        $model = $this->findWhere($where, $columns);

        return $model->first();
    }

    /**
     * Find data by id
     *
     * @param int $id
     * @param array $columns
     * @return mixed
     * @throws RepositoryException
     */
    public function find($id, $columns = ['*'])
    {
        $this->applyCriteria();
        $this->applyScope();
        $model = $this->model->find($id, $columns);
        $this->resetModel();

        return $this->parserResult($model);
    }

    /**
     * Find data by id
     *
     * @param int $id
     * @param array $columns
     * @return mixed
     * @throws RepositoryException
     */
    public function findOrFail($id, $columns = ['*'])
    {
        $this->applyCriteria();
        $this->applyScope();
        $model = $this->model->findOrFail($id, $columns);
        $this->resetModel();

        return $this->parserResult($model);
    }

    /**
     * Count results of repository
     *
     * @param array $where
     * @param string $columns
     * @return mixed
     * @throws RepositoryException
     */
    public function count(array $where = [], $columns = '*')
    {
        $this->applyCriteria();
        $this->applyScope();

        if ($where) {
            $this->applyConditions($where);
        }

        $result = $this->model->count($columns);
        $this->resetModel();
        $this->resetScope();

        return $result;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param string $field
     * @param array $data
     * @return void
     */
    public function checkUuid(string $field, array &$data): void
    {
        $data[$field] = $data[$field] ?? Uuid::uuid4()->toString();
    }
}
