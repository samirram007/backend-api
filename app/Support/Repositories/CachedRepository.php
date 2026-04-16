<?php

namespace App\Support\Repositories;

use Illuminate\Support\Facades\Cache;

class CachedRepository
{
    protected BaseRepository $repo;
    protected string $prefix;
    protected int $ttl = 600;

    public function __construct(BaseRepository $repo)
    {
        $this->repo = $repo;
        $this->prefix = strtolower(class_basename($repo));
    }

    protected function version(): int
    {
        return Cache::get($this->prefix . '_version', 1);
    }

    protected function key(string $method, array $params = []): string
    {
        return $this->prefix . '_v' . $this->version() . '_' . $method . '_' . md5(json_encode($params));
    }

    protected function remember(string $key, \Closure $callback)
    {
        return Cache::remember($key, $this->ttl, $callback);
    }

    // ========================
    // Wrapped Methods
    // ========================

    public function all(array $with = [])
    {
        return $this->remember(
            $this->key('all', $with),
            fn() => $this->repo->all($with)
        );
    }

    public function find(int $id, array $with = [])
    {
        return $this->remember(
            $this->key('find', [$id, $with]),
            fn() => $this->repo->find($id, $with)
        );
    }

    public function where(array $conditions, array $with = [])
    {
        return $this->remember(
            $this->key('where', [$conditions, $with]),
            fn() => $this->repo->where($conditions, $with)
        );
    }

    public function paginate(int $perPage = 15, array $with = [])
    {
        return $this->remember(
            $this->key('paginate', [$perPage, request()->page ?? 1, $with]),
            fn() => $this->repo->paginate($perPage, $with)
        );
    }

    // ========================
    // Invalidate
    // ========================

    public function clear(): void
    {
        Cache::increment($this->prefix . '_version');
    }
}
