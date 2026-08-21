<?php

declare(strict_types=1);

namespace Quillstack\Config;

class Config implements ConfigInterface
{
    /**
     * @var string
     */
    public const DELIMITER = '.';

    /**
     * @var array
     */
    /**
     * @var array<string, mixed>
     */
    protected array $config = [];

    /**
     * {@inheritDoc}
     */
    final public function get(string $key, mixed $default = null): mixed
    {
        $branch = explode(self::DELIMITER, $key);
        $value = $this->find($this->config, $branch);

        if ($value === null) {
            return $default;
        }

        return $value;
    }

    /**
     * @param array<string, mixed> $tree
     * @param string[] $branch
     */
    private function find(mixed $tree, array $branch): mixed
    {
        $found = null;
        $size = count($branch) - 1;

        foreach ($branch as $index => $node) {
            if (!is_array($tree) || !isset($tree[$node])) {
                return null;
            }

            $found = $tree[$node];

            if ($size === $index) {
                return $found;
            }

            $tree = $found;
        }

        return null;
    }
}
