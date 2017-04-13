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

use OAuth2Framework\Bundle\Server\Model\ClientRepository;
use OAuth2Framework\Bundle\Server\Rule\ClientIdRule;
use OAuth2Framework\Component\Server\Command\Client;
use OAuth2Framework\Component\Server\Model\Client\Rule;
use OAuth2Framework\Component\Server\Model\Client\Rule\RuleManager;
use function Fluent\autowire;
use function Fluent\create;
use function Fluent\get;

return [
    ClientRepository::class => create()
        ->arguments(
            get('oauth2_server.client.event_store'),
            get('event_recorder'),
            get('cache.app')
        ),

    ClientIdRule::class => create(),

    RuleManager::class => autowire(),

    Rule\CommonParametersRule::class => create()
        ->tag('oauth2_server_client_rule'),

    Rule\GrantTypeFlowRule::class => autowire()
        ->tag('oauth2_server_client_rule'),

    Rule\RedirectionUriRule::class => create()
        ->tag('oauth2_server_client_rule'),

    Rule\RequestUriRule::class => create()
        ->tag('oauth2_server_client_rule'),

    Rule\SectorIdentifierUriRule::class => create()
        ->arguments(
            get('oauth2_server.http.request_factory'), //FIXME
            get('oauth2_server.http.client') //FIXME
        )
        ->tag('oauth2_server_client_rule'),

    Rule\TokenEndpointAuthMethodEndpointRule::class => autowire()
        ->tag('oauth2_server_client_rule'),

    Client\CreateClientCommandHandler::class => autowire()
        ->tag('command_handler', ['handles' => Client\CreateClientCommand::class]),

    Client\DeleteClientCommandHandler::class => autowire()
        ->tag('command_handler', ['handles' => Client\DeleteClientCommand::class]),

    Client\UpdateClientCommandHandler::class => autowire()
        ->tag('command_handler', ['handles' => Client\UpdateClientCommand::class]),
];
