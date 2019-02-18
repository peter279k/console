<?php

/*
 * Opulence
 *
 * @link      https://www.aphiria.com
 * @copyright Copyright (C) 2019 David Young
 * @license   https://github.com/aphiria/console/blob/master/LICENSE.md
 */

namespace Aphiria\Console\Input\Compilers\Tokenizers;

use RuntimeException;

/**
 * Defines the array list input tokenizer
 */
final class ArrayListInputTokenizer implements IInputTokenizer
{
    /**
     * @inheritdoc
     */
    public function tokenize($input): array
    {
        if (!isset($input['name'])) {
            throw new RuntimeException('No command name given');
        }

        if (!isset($input['arguments'])) {
            $input['arguments'] = [];
        }

        if (!isset($input['options'])) {
            $input['options'] = [];
        }

        $tokens = [$input['name']];
        $tokens = array_merge($tokens, $input['arguments']);
        $tokens = array_merge($tokens, $input['options']);

        return $tokens;
    }
}