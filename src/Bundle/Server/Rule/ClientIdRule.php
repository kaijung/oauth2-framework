<?php

declare(strict_types=1);

/*
 * The MIT License (MIT)
 *
 * Copyright (c) 2014-2017 Spomky-Labs
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 */

namespace OAuth2Framework\Bundle\Server\Rule;

use OAuth2Framework\Component\Server\Model\Client\Rule\ClientIdRuleInterface;
use Ramsey\Uuid\Uuid;

final class ClientIdRule implements ClientIdRuleInterface
{
    /**
     * @return string
     */
    public function generateUniqueClientId(): string
    {
        return Uuid::uuid4()->toString();
    }
}
