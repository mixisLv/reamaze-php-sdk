<?php
/**
 * reamaze-sdk-api
 *
 * @author Mikus Rozenbergs <mikus.rozenbergs@gmail.com>
 */

namespace mixisLv\Reamaze\Api;

use mixisLv\Reamaze\BaseApi;
use mixisLv\Reamaze\Params\Reports\GetParams;

/**
 * Class Reports
 * @package mixisLv\Reamaze\Api
 *
 * @author Mikus Rozenbergs <mikus.rozenbergs@gmail.com>
 */
class Reports extends BaseApi
{
    /**
     * Volume
     *
     * Returns a daily volume count
     *
     * @param GetParams|null $params
     *
     * @return \stdClass
     * @throws \mixisLv\Reamaze\Exceptions\ApiException
     * @see https://www.reamaze.com/api/get_reports_volume
     */
    public function volume(GetParams $params = null)
    {
        $params = $params ?: new GetParams();

        return $this->api->call('reports/volume', 'GET', $params->paramsArray());
    }

    /**
     * Response Time
     *
     * Returns a daily response time metric. Response times are reported in seconds.
     *
     * @param GetParams|null $params
     *
     * @return \stdClass
     * @throws \mixisLv\Reamaze\Exceptions\ApiException
     * @see https://www.reamaze.com/api/get_reports_response_time
     */
    public function responseTime(GetParams $params = null)
    {
        $params = $params ?: new GetParams();

        return $this->api->call('reports/response_time', 'GET', $params->paramsArray());
    }

    /**
     * Staff
     *
     * Returns a staff report summarizing staff metrics
     *
     * @param GetParams|null $params
     *
     * @return \stdClass
     * @throws \mixisLv\Reamaze\Exceptions\ApiException
     * @see https://www.reamaze.com/api/get_reports_staff
     */
    public function staff(GetParams $params = null)
    {
        $params = $params ?: new GetParams();

        return $this->api->call('reports/staff', 'GET', $params->paramsArray());
    }

    /**
     * Tags
     *
     * @param GetParams|null $params
     *
     * Returns a tag report summarizing tag usage
     *
     * @return \stdClass
     * @throws \mixisLv\Reamaze\Exceptions\ApiException
     * @see https://www.reamaze.com/api/get_reports_tags
     */
    public function tags(GetParams $params = null)
    {
        $params = $params ?: new GetParams();

        return $this->api->call('reports/tags', 'GET', $params->paramsArray());
    }
}
