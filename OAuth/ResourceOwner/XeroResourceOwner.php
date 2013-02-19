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

    protected $oauthSettings = array(
        'oauth_signature_method' => 'PLAINTEXT'
    );

    /**
     * {@inheritDoc}
     */
    protected $options = array(
        'authorization_url'   => 'https://api.xero.com/oauth/Authorize',
        'request_token_url'   => 'https://api.xero.com/oauth/RequestToken',
        'access_token_url'    => 'https://api.xero.com/oauth/AccessToken',
        'infos_url'           => 'https://api.xero.com/api.xro/2.0/Users',
        'user_response_class' => '\HWI\Bundle\OAuthBundle\OAuth\Response\PathUserResponse',
        'realm'               => '',
    );

    /**
     * {@inheritDoc}
     */
    protected $paths = array(
        'identifier' => 'uid',
        'nickname'   => 'email',
        'realname'   => 'display_name',
    );

    public function getUserInformation($accessToken, array $extraParameters = array())
    {

        return parent::getUserInformation($accessToken, array_merge($extraParameters, $this->oauthSettings));
    }

    public function getAccessToken(Request $request, $redirectUri, array $extraParameters = array())
    {
        return parent::getAccessToken($request, $redirectUri, array_merge($extraParameters, $this->oauthSettings));
    }

    protected function getRequestToken($redirectUri, array $extraParameters = array())
    {
        return parent::getRequestToken($redirectUri, array_merge($extraParameters, $this->oauthSettings));
    }
}
