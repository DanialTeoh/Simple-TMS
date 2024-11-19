<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Validator\Constraints;

/**
 * Validates values are greater than the previous (>).
 *
 * @author Daniel Holmes <daniel@danielholmes.org>
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
class GreaterThanValidator extends AbstractComparisonValidator
{
    protected function compareValues(mixed $value1, mixed $value2): bool
    {
        return null === $value2 || $value1 > $value2;
    }

    protected function getErrorCode(): ?string
    {
        return GreaterThan::TOO_LOW_ERROR;
    }
}
