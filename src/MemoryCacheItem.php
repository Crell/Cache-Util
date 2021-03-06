<?php

namespace Fig\Cache;

use Psr\Cache\CacheItemInterface;

/**
 * In-memory implementation of a cache item.
 */
class MemoryCacheItem implements CacheItemInterface {
    use BasicCacheItemTrait;

    /**
     * @var MemoryPool
     */
    protected $pool;

    public function  __construct(MemoryPool $pool, $key, array $data) {
        $this->pool = $pool;
        $this->key = $key;
        $this->value = $data['value'];
        $this->expiration = $data['ttd'];
        $this->hit = $data['hit'];
    }

    /**
     * Returns the stored value regardless of hit status.
     *
     * This method is intended for use only by the MemoryPool. Other callers
     * should not use it.
     *
     * @internal
     *
     * @return mixed
     *   The stored value.
     */
    public function getRawValue()
    {
        return $this->value;
    }
}
