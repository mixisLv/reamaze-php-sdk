<?php
/**
 * reamaze-sdk-api
 *
 * @author Mikus Rozenbergs <mikus.rozenbergs@gmail.com>
 */

namespace mixisLv\Reamaze\Params\Reports;

use mixisLv\Reamaze\Params\BaseParams;

/**
 * Class GetParams
 *
 * @package mixisLv\Reamaze\Params\Channels
 * @see https://www.reamaze.com/api/get_reports_volume
 * @see https://www.reamaze.com/api/get_reports_response_time
 * @see https://www.reamaze.com/api/get_reports_staff
 * @see https://www.reamaze.com/api/get_reports_tags
 */
class GetParams extends BaseParams
{
    /**
     * The start date (yyyy-mm-dd) value can used to choose the start of the report.
     *
     * @var string
     */
    public $startDate  = null;

    /**
     * The end date (yyyy-mm-dd) value can used to choose the end of the report.
     *
     * @var string
     */
    public $endDate  = null;

    /**
     * paramsArray
     *
     * @return array
     */
    public function paramsArray()
    {
        $params = [];
        if (!empty($this->startDate)) {
            $params['start_date'] = $this->startDate;
        }
        if (!empty($params->endDate)) {
            $params['end_date'] = $this->endDate;
        }
        return $params;
    }

    public function sanitizeStartDate($value)
    {
        return (string)$value;
    }
}
