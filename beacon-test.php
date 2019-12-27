<?php


$API_URL = 'https://api.line.me/v2/bot/message';
//it-beacon
$ACCESS_TOKEN = '4rdPrwctgzH4f52jYbtvykZkki+MN2xZK+finbLthiCRMR1fyBLt+dlKU8ExfQxxcV7ZC9VX+lG/VG5XnZHp7xuoVQs4tyoCNUA0TxZek8M1DqArJBPPalW51qk2NWCu0L1En5v+FdTDw3csua882gdB04t89/1O/w1cDnyilFU='; 
$channelSecret = '39a9b2c7954e9685bc7007335ea632ba';
//it@cubook
//$ACCESS_TOKEN = 'MalHeKonc+s+4OxE1F17SBgCojCXD37LHJpTEmsmUwEm6lAqxZyRN28h5jISMwoKUtuZTNQVw8z6582k6avlNPpED8QLmdMDcTGKSdONAFL4e/PZ+1NGrb0j4M1Q59hnpKYaUT4elMd92DmjRyuyWAdB04t89/1O/w1cDnyilFU=';
//$channelSecret = '2669bb384ac7522ea63d19dd55f324de';


$POST_HEADER = array('Content-Type: application/json', 'Authorization: Bearer ' . $ACCESS_TOKEN);

$request = file_get_contents('php://input');   // Get request content
$request_array = json_decode($request, true);   // Decode JSON to Array
var_export($request_array);



/**
 * Copyright 2016 LINE Corporation
 *
 * LINE Corporation licenses this file to you under the Apache License,
 * version 2.0 (the "License"); you may not use this file except in compliance
 * with the License. You may obtain a copy of the License at:
 *
 *   https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */

namespace LINE\LINEBot\Event;

/**
 * A class that represents the event of beacon detection.
 *
 * @package LINE\LINEBot\Event
 */
class BeaconDetectionEvent extends BaseEvent
{
    /**
     * BeaconDetectionEvent constructor.
     *
     * @param array $event
     */
    public function __construct($event)
    {
        parent::__construct($event);
    }

    /**
     * Get hardware ID of the beacon.
     *
     * @return string
     */
    public function getHwid()
    {
        return $this->event['beacon']['hwid'];
    }

    /**
     * Returns type of beacon event.
     *
     * @return string
     */
    public function getBeaconEventType()
    {
        return $this->event['beacon']['type'];
    }

    /**
     * Returns device message of the beacon.
     *
     * @return string a binary string containing data
     */
    public function getDeviceMessage()
    {
        return pack('H*', $this->event['beacon']['dm']);
    }
}
