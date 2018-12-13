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
        $channel  = $params->channel && in_array($params->channel, ChannelRetrieveParams::channelFilters()) ? $params->channel : '';
        $slug  = $params->slug;

        return $this->api->call('channels' . ($slug ? '/' . $slug : '') , 'GET', ['page' => $params->page, 'channel' => $channel ]);
    }
}