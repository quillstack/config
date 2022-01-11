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
    protected array $config = [];

    /**
     * {@inheritDoc}
     */
    final public function get(string $key, $default = null)
    {
        $branch = explode(self::DELIMITER, $key);
        $value = $this->find($this->config, $branch);

        if ($value === null) {
            return $default;
        }

        return $value;
    }

    /**
     * @param array $tree
     * @param array $branch
     *
     * @return mixed|null
     */
    private function find(array $tree, array $branch)
    {
        $found = null;
        $size = count($branch) - 1;

        foreach ($branch as $index => $node) {
            if (!isset($tree[$node])) {
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
