<?php
/**
 * reamaze-sdk-api
 *
 * @author Mikus Rozenbergs <mikus.rozenbergs@gmail.com>
 */

namespace mixisLv\Reamaze\Api;

use mixisLv\Reamaze\BaseApi;
use mixisLv\Reamaze\Params\Channels\RetrieveParams as ChannelRetrieveParams;

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
        return $channel && in_array($channel, ChannelRetrieveParams::channelFilters()) ? $channel : '';
    }

    /**
     * getAction
     *
     * @param string $slug
     * @return string
     */
    private function getAction($slug)
    {
        return 'channels' . ($slug ? '/' . $slug : '');
    }

    /**
     * retrieve
     *
     * @param ChannelRetrieveParams $params
     *
     * @return \stdClass
     * @throws \mixisLv\Reamaze\Exceptions\ApiException
     * @see https://www.reamaze.com/api/get_channels
     */
    public function retrieve(ChannelRetrieveParams $params)
    {
        $action  = $this->getAction($params->slug);
        $channel = $this->getChannel($params->channel);

        return $this->api->call(
            $action,
            'GET',
            ['page' => $params->page, 'channel' => $channel]
        );
    }
}
