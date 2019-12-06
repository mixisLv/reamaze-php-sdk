<?php

/**
 * reamaze-sdk-api
 *
 * @author Mikus Rozenbergs <mikus.rozenbergs@gmail.com>
 */

namespace mixisLv\Reamaze\Api;

use mixisLv\Reamaze\BaseApi;
use mixisLv\Reamaze\Params\Channels\RetrieveParams as ChannelsRetrieveParams;
use mixisLv\Reamaze\Params\Channels\GetParams as ChannelsGetParams;

/**
 * Class Channels
 * @package mixisLv\Reamaze\Api
 *
 * @author Mikus Rozenbergs <mikus.rozenbergs@gmail.com>
 */
class Channels extends BaseApi
{
    /**
     * getChannel
     *
     * @param string $channel
     * @return string
     */
    private function getChannel($channel)
    {
        return $channel && in_array($channel, ChannelsRetrieveParams::channelFilters()) ? $channel : '';
    }

    /**
     * getAction
     *
     * @param string $slug
     * @return string
     */
    private function getAction($slug = null)
    {
        return 'channels' . ($slug ? '/' . $slug : '');
    }

    /**
     * Retrieving Channels
     *
     * <code>
     *      $params = new \mixisLv\Reamaze\Params\Channels\RetrieveParams(['channel'=> RetrieveParams::CHANNEL_EMAIL]);
     *      $response = $reamaze->channels->retrieve($params);
     * </code>
     *
     * @param ChannelsRetrieveParams $params
     *
     * @return \stdClass
     * @throws \mixisLv\Reamaze\Exceptions\ApiException
     * @see https://www.reamaze.com/api/get_channels
     */
    public function retrieve(ChannelsRetrieveParams $params)
    {
        $action  = $this->getAction();
        $channel = $this->getChannel($params->channel);

        return $this->api->call(
            $action,
            'GET',
            ['page' => $params->page, 'channel' => $channel]
        );
    }

    /**
     * Get Channel
     *
     * <code>
     *      $params = new \mixisLv\Reamaze\Params\Channels\GetParams(['slug'   => 'support']);
     *      $response = $reamaze->channels->get($params);
     * </code>
     *
     * @param ChannelsGetParams $params
     *
     * @return \stdClass
     * @throws \mixisLv\Reamaze\Exceptions\ApiException
     * @see https://www.reamaze.com/api/get_channel
     */
    public function get(ChannelsGetParams $params)
    {
        $action  = $this->getAction($params->slug);

        return $this->api->call(
            $action,
            'GET',
            []
        );
    }
}
