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

namespace OAuth2Framework\Component\Server\Endpoint\UserInfo\ScopeSupport;

final class EmailScopeSupport implements UserInfoScopeSupportInterface
{
    /**
     * {@inheritdoc}
     */
    public function getScope(): string
    {
        return 'email';
    }

    /**
     * {@inheritdoc}
     */
    public function getClaims(): array
    {
        return [
            'email',
            'email_verified',
        ];
    }
}
