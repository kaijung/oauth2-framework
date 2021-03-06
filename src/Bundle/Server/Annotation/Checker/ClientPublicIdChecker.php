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

namespace OAuth2Framework\Bundle\Server\Annotation\Checker;

use OAuth2Framework\Bundle\Server\Annotation\OAuth2;
use OAuth2Framework\Bundle\Server\Security\Authentication\Token\OAuth2Token;

final class ClientPublicIdChecker implements CheckerInterface
{
    /**
     * {@inheritdoc}
     */
    public function check(OAuth2Token $token, OAuth2 $configuration): ?string
    {
        if (null === $configuration->getClientPublicId()) {
            return null;
        }

        if ($configuration->getClientPublicId() !== $token->getClient()->getPublicId()) {
            return 'Client not authorized.';
        }

        return null;
    }
}
