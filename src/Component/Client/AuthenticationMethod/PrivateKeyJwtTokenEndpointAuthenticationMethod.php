<?php

/*
 * The MIT License (MIT)
 *
 * Copyright (c) 2014-2017 Spomky-Labs
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 */

namespace OAuth2Framework\Component\Client\AuthenticationMethod;

use OAuth2Framework\Component\Client\Client\OAuth2ClientInterface;
use OAuth2Framework\Component\Client\Metadata\ServerMetadata;
use Psr\Http\Message\RequestInterface;

final class PrivateKeyJwtTokenEndpointAuthenticationMethod extends AbstractAuthenticationMethod implements TokenEndpointAuthenticationMethodInterface
{
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'private_key_jwt';
    }

    /**
     * {@inheritdoc}
     */
    public function prepareRequest(ServerMetadata $server_metadata, OAuth2ClientInterface $client, RequestInterface &$request, array &$post_request)
    {
    }
}
