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
    public function retrieve(ChannelRetrieveParams $params)
    {
        $page = max(1, (int)$params->page);
        $channel  = $params->channel && in_array($params->channel, ChannelRetrieveParams::channelFilters()) ? $params->channel : '';
        $slug  = $params->slug;

        return $this->api->call('channels' . ($slug ? '/' . $slug : '') , 'GET', ['page' => $page, 'channel' => $channel ]);
    }
}