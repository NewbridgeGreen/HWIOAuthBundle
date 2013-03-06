<?php

/*
 * This file is part of the HWIOAuthBundle package.
 *
 * (c) Hardware.Info <opensource@hardware.info>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HWI\Bundle\OAuthBundle\OAuth\ResourceOwner;

use Symfony\Component\HttpFoundation\Request;

/**
 * XeroResourceOwner
 *
 * @author Jamie Sutherland<me@jamiesutherland.com>
 */
class XeroResourceOwner extends GenericOAuth1ResourceOwner
{

    /**
     * {@inheritDoc}
     */
    protected $options = array(
        'authorization_url'   => 'https://api.xero.com/oauth/Authorize',
        'request_token_url'   => 'https://api.xero.com/oauth/RequestToken',
        'access_token_url'    => 'https://api.xero.com/oauth/AccessToken',
        'infos_url'           => 'https://api.xero.com/api.xro/2.0/Organisation',
        'user_response_class' => '\HWI\Bundle\OAuthBundle\OAuth\Response\PathUserResponse',
        'realm'               => '',
    );

    /**
     * {@inheritDoc}
     */
    protected $paths = array(
        'identifier' => 'Id',
        'nickname'   => 'Status',
        'realname'   => 'ProviderName',
    );

    /**
     * {@inheritDoc}
     */
    protected function doGetUserInformationRequest($url, array $parameters = array())
    {
        return $this->httpRequest($url, null, $parameters, array('Accept: application/json'), 'GET');
    }
}
