<?php
/*********************************************************************
 *
 * $Id: yocto_api.php 75351 2026-08-02 19:45:07Z mvuilleu $
 *
 * High-level programming interface, common to all modules
 *
 * - - - - - - - - - License information: - - - - - - - - -
 *
 *  Copyright (C) 2011 and beyond by Yoctopuce Sarl, Switzerland.
 *
 *  Yoctopuce Sarl (hereafter Licensor) grants to you a perpetual
 *  non-exclusive license to use, modify, copy and integrate this
 *  file into your software for the sole purpose of interfacing
 *  with Yoctopuce products.
 *
 *  You may reproduce and distribute copies of this file in
 *  source or object form, as long as the sole purpose of this
 *  code is to interface with Yoctopuce products. You must retain
 *  this notice in the distributed source file.
 *
 *  You should refer to Yoctopuce General Terms and Conditions
 *  for additional information regarding your rights and
 *  obligations.
 *
 *  THE SOFTWARE AND DOCUMENTATION ARE PROVIDED "AS IS" WITHOUT
 *  WARRANTY OF ANY KIND, EITHER EXPRESS OR IMPLIED, INCLUDING
 *  WITHOUT LIMITATION, ANY WARRANTY OF MERCHANTABILITY, FITNESS
 *  FOR A PARTICULAR PURPOSE, TITLE AND NON-INFRINGEMENT. IN NO
 *  EVENT SHALL LICENSOR BE LIABLE FOR ANY INCIDENTAL, SPECIAL,
 *  INDIRECT OR CONSEQUENTIAL DAMAGES, LOST PROFITS OR LOST DATA,
 *  COST OF PROCUREMENT OF SUBSTITUTE GOODS, TECHNOLOGY OR
 *  SERVICES, ANY CLAIMS BY THIRD PARTIES (INCLUDING BUT NOT
 *  LIMITED TO ANY DEFENSE THEREOF), ANY CLAIMS FOR INDEMNITY OR
 *  CONTRIBUTION, OR OTHER SIMILAR COSTS, WHETHER ASSERTED ON THE
 *  BASIS OF CONTRACT, TORT (INCLUDING NEGLIGENCE), BREACH OF
 *  WARRANTY, OR OTHERWISE.
 *
 *********************************************************************/
declare(strict_types=1);
//--- (generated code: YFunction definitions)
// Yoctopuce error codes, also used by default as function return value
const YAPI_SUCCESS                     = 0; // everything worked all right
const YAPI_NOT_INITIALIZED             = -1; // call yInitAPI() first !
const YAPI_INVALID_ARGUMENT            = -2; // one of the arguments passed to the function is invalid
const YAPI_NOT_SUPPORTED               = -3; // the operation attempted is (currently) not supported
const YAPI_DEVICE_NOT_FOUND            = -4; // the requested device is not reachable
const YAPI_VERSION_MISMATCH            = -5; // the device firmware is incompatible with this API version
const YAPI_DEVICE_BUSY                 = -6; // the device is busy with another task and cannot answer
const YAPI_TIMEOUT                     = -7; // the device took too long to provide an answer
const YAPI_IO_ERROR                    = -8; // there was an I/O problem while talking to the device
const YAPI_NO_MORE_DATA                = -9; // there is no more data to read from
const YAPI_EXHAUSTED                   = -10; // you have run out of a limited resource, check the documentation
const YAPI_DOUBLE_ACCES                = -11; // you have two process that try to access to the same device
const YAPI_UNAUTHORIZED                = -12; // unauthorized access to password-protected device
const YAPI_RTC_NOT_READY               = -13; // real-time clock has not been initialized (or time was lost)
const YAPI_FILE_NOT_FOUND              = -14; // the file is not found
const YAPI_SSL_ERROR                   = -15; // Error reported by mbedSSL
const YAPI_RFID_SOFT_ERROR             = -16; // Recoverable error with RFID tag (eg. tag out of reach), check YRfidStatus for details
const YAPI_RFID_HARD_ERROR             = -17; // Serious RFID error (eg. write-protected, out-of-boundary), check YRfidStatus for details
const YAPI_BUFFER_TOO_SMALL            = -18; // The buffer provided is too small
const YAPI_DNS_ERROR                   = -19; // Error during name resolutions (invalid hostname or dns communication error)
const YAPI_SSL_UNK_CERT                = -20; // The certificate is not correctly signed by the trusted CA
const YAPI_UNCONFIGURED                = -21; // Remote hub is not yet configured

// TLS / SSL definitions
const YAPI_NO_TRUSTED_CA_CHECK         = 1; // Disables certificate checking
const YAPI_NO_EXPIRATION_CHECK         = 2; // Disables certificate expiration date checking
const YAPI_NO_HOSTNAME_CHECK           = 4; // Disable hostname checking
const YAPI_LEGACY                      = 8; // Allow non-secure connection (similar to v1.10)
const YAPI_INVALID_INT = YAPI::INVALID_INT;
const YAPI_INVALID_UINT = YAPI::INVALID_UINT;
const YAPI_INVALID_LONG = YAPI::INVALID_LONG;
const YAPI_INVALID_DOUBLE = YAPI::INVALID_DOUBLE;
const YAPI_INVALID_STRING = YAPI::INVALID_STRING;

const Y_FUNCTIONDESCRIPTOR_INVALID = YAPI::INVALID_STRING;
const Y_HARDWAREID_INVALID = YAPI::INVALID_STRING;
const Y_FUNCTIONID_INVALID = YAPI::INVALID_STRING;
const Y_FRIENDLYNAME_INVALID = YAPI::INVALID_STRING;

if (!defined('Y_LOGICALNAME_INVALID')) {
    define('Y_LOGICALNAME_INVALID', YAPI_INVALID_STRING);
}
if (!defined('Y_ADVERTISEDVALUE_INVALID')) {
    define('Y_ADVERTISEDVALUE_INVALID', YAPI_INVALID_STRING);
}
//--- (end of generated code: YFunction definitions)
const YAPI_HASH_BUF_SIZE = 28;
const YAPI_MIN_DOUBLE = -INF;
const YAPI_MAX_DOUBLE = INF;

//--- (generated code: YMeasure definitions)
//--- (end of generated code: YMeasure definitions)
if (!defined('Y_DATA_INVALID')) {
    define('Y_DATA_INVALID', YAPI::INVALID_DOUBLE);
}
if (!defined('Y_DURATION_INVALID')) {
    define('Y_DURATION_INVALID', YAPI_INVALID_INT);
}

//--- (generated code: YFirmwareUpdate definitions)
//--- (end of generated code: YFirmwareUpdate definitions)

//--- (generated code: YDataStream definitions)
//--- (end of generated code: YDataStream definitions)

//--- (generated code: YDataSet definitions)
//--- (end of generated code: YDataSet definitions)

//--- (generated code: YConsolidatedDataSet definitions)
//--- (end of generated code: YConsolidatedDataSet definitions)

//--- (generated code: YSensor definitions)
if (!defined('Y_ADVMODE_IMMEDIATE')) {
    define('Y_ADVMODE_IMMEDIATE', 0);
}
if (!defined('Y_ADVMODE_PERIOD_AVG')) {
    define('Y_ADVMODE_PERIOD_AVG', 1);
}
if (!defined('Y_ADVMODE_PERIOD_MIN')) {
    define('Y_ADVMODE_PERIOD_MIN', 2);
}
if (!defined('Y_ADVMODE_PERIOD_MAX')) {
    define('Y_ADVMODE_PERIOD_MAX', 3);
}
if (!defined('Y_ADVMODE_INVALID')) {
    define('Y_ADVMODE_INVALID', -1);
}
if (!defined('Y_UNIT_INVALID')) {
    define('Y_UNIT_INVALID', YAPI_INVALID_STRING);
}
if (!defined('Y_CURRENTVALUE_INVALID')) {
    define('Y_CURRENTVALUE_INVALID', YAPI_INVALID_DOUBLE);
}
if (!defined('Y_LOWESTVALUE_INVALID')) {
    define('Y_LOWESTVALUE_INVALID', YAPI_INVALID_DOUBLE);
}
if (!defined('Y_HIGHESTVALUE_INVALID')) {
    define('Y_HIGHESTVALUE_INVALID', YAPI_INVALID_DOUBLE);
}
if (!defined('Y_CURRENTRAWVALUE_INVALID')) {
    define('Y_CURRENTRAWVALUE_INVALID', YAPI_INVALID_DOUBLE);
}
if (!defined('Y_LOGFREQUENCY_INVALID')) {
    define('Y_LOGFREQUENCY_INVALID', YAPI_INVALID_STRING);
}
if (!defined('Y_REPORTFREQUENCY_INVALID')) {
    define('Y_REPORTFREQUENCY_INVALID', YAPI_INVALID_STRING);
}
if (!defined('Y_CALIBRATIONPARAM_INVALID')) {
    define('Y_CALIBRATIONPARAM_INVALID', YAPI_INVALID_STRING);
}
if (!defined('Y_RESOLUTION_INVALID')) {
    define('Y_RESOLUTION_INVALID', YAPI_INVALID_DOUBLE);
}
if (!defined('Y_SENSORSTATE_INVALID')) {
    define('Y_SENSORSTATE_INVALID', YAPI_INVALID_INT);
}
//--- (end of generated code: YSensor definitions)

//--- (generated code: YModule definitions)
if (!defined('Y_PERSISTENTSETTINGS_LOADED')) {
    define('Y_PERSISTENTSETTINGS_LOADED', 0);
}
if (!defined('Y_PERSISTENTSETTINGS_SAVED')) {
    define('Y_PERSISTENTSETTINGS_SAVED', 1);
}
if (!defined('Y_PERSISTENTSETTINGS_MODIFIED')) {
    define('Y_PERSISTENTSETTINGS_MODIFIED', 2);
}
if (!defined('Y_PERSISTENTSETTINGS_INVALID')) {
    define('Y_PERSISTENTSETTINGS_INVALID', -1);
}
if (!defined('Y_BEACON_OFF')) {
    define('Y_BEACON_OFF', 0);
}
if (!defined('Y_BEACON_ON')) {
    define('Y_BEACON_ON', 1);
}
if (!defined('Y_BEACON_INVALID')) {
    define('Y_BEACON_INVALID', -1);
}
if (!defined('Y_PRODUCTNAME_INVALID')) {
    define('Y_PRODUCTNAME_INVALID', YAPI_INVALID_STRING);
}
if (!defined('Y_SERIALNUMBER_INVALID')) {
    define('Y_SERIALNUMBER_INVALID', YAPI_INVALID_STRING);
}
if (!defined('Y_PRODUCTID_INVALID')) {
    define('Y_PRODUCTID_INVALID', YAPI_INVALID_UINT);
}
if (!defined('Y_PRODUCTRELEASE_INVALID')) {
    define('Y_PRODUCTRELEASE_INVALID', YAPI_INVALID_UINT);
}
if (!defined('Y_FIRMWARERELEASE_INVALID')) {
    define('Y_FIRMWARERELEASE_INVALID', YAPI_INVALID_STRING);
}
if (!defined('Y_LUMINOSITY_INVALID')) {
    define('Y_LUMINOSITY_INVALID', YAPI_INVALID_UINT);
}
if (!defined('Y_UPTIME_INVALID')) {
    define('Y_UPTIME_INVALID', YAPI_INVALID_LONG);
}
if (!defined('Y_USBCURRENT_INVALID')) {
    define('Y_USBCURRENT_INVALID', YAPI_INVALID_UINT);
}
if (!defined('Y_REBOOTCOUNTDOWN_INVALID')) {
    define('Y_REBOOTCOUNTDOWN_INVALID', YAPI_INVALID_INT);
}
if (!defined('Y_USERVAR_INVALID')) {
    define('Y_USERVAR_INVALID', YAPI_INVALID_INT);
}
//--- (end of generated code: YModule definitions)

// yInitAPI constants (not really useful in PHP, but defined for code portability)
const Y_DETECT_NONE = 0;
const Y_DETECT_USB = 1;
const Y_DETECT_NET = 2;
const Y_DETECT_ALL = Y_DETECT_USB | Y_DETECT_NET;


//vvvv YAPI_Exception.php
//use Exception;

/**
 *Class used to report exceptions within Yocto-API
 * Do not instantiate directly
 */
class YAPI_Exception extends Exception
{
}

//^^^^ YAPI_Exception.php


//vvvv YAPI_YReq.php

/**
 * Structure used internally to report results of a query. It only uses public attributes.
 * Do not instantiate directly
 */
class YAPI_YReq
{
    public string $hwid = "";
    public string $deviceid = "";
    public string $functionid = "";
    public int $errorType;
    public string $errorMsg;
    public mixed $result;
    public mixed $obj_result = null;

    function __construct(string $str_hwid, int $int_errType, string $str_errMsg, mixed $bin_result, mixed $obj_result = null)
    {
        $sep = strpos($str_hwid, ".");
        if ($sep !== false) {
            $this->hwid = $str_hwid;
            $this->deviceid = substr($str_hwid, 0, $sep);
            $this->functionid = substr($str_hwid, $sep + 1);
        }
        $this->errorType = $int_errType;
        $this->errorMsg = $str_errMsg;
        $this->result = $bin_result;
        $this->obj_result = $obj_result;
    }
}

//^^^^ YAPI_YReq.php

if (!function_exists('array_key_first')) {
    function array_key_first(array $arr)
    {
        foreach ($arr as $key => $unused) {
            return $key;
        }
        return null;
    }
}

//vvvv YTcpHub.php

/**
 * YTcpHub Class (used internally)
 *
 * Instances of this class represent a VirtualHub or a networked Yoctopuce device
 * to which we can connect to get access to device functions. For historical reasons,
 * this class is mostly used like a structure, rather than a real object.
 */
class YTcpHub
{
    // attributes
    private string $rooturl;                    // root url of the hub (without auth parameters)
    public string $streamaddr;                 // stream address of the hub ("tcp://addr:port")
    public array $url_info;                   // $url parsed
    public string $notifurl;                   // notification file used by this hub
    public bool $use_pure_http;              // boolean that is true if the hub is VirtualHub-4web
    public bool $has_unsecure_open_port;     // boolean that is true if the hub has non https port open (mixed mode)
    public ?YTcpReq $notifReq;                   // notification request, or null if not open
    public int $connectionState;               // the connection status, values are YHub::TRYING, YHub::CONNECTED...
    public int $notifPos;                   // absolute position in notification stream
    public bool $isNotifWorking;            // boolean that is true when we receive ping notification
    public float $devListExpires;             // timestamp of next useful updateDeviceList
    public ?YTcpReq $devListReq;                 // updateDeviceList request, or null if not open
    public array $serialByYdx;                // serials by hub-specific devYdx
    public float $retryDelay;                 // delay before reconnecting in case of error
    public float $retryExpires;               // timestamp of next reconnection attempt
    public array $missing;                    // list of missing devices during updateDeviceList
    public bool $writeProtected;             // true if an adminPassword is set
    public string $user;                       // user for authentication
    public mixed $callbackData;               // raw HTTP callback data received
    public ?array $callbackCache;              // pre-parsed cache for callback-based API
    public mixed $reuseskt;                   // keep-alive socket to be reused
    protected string $realm;                   // hub authentication realm
    protected string $pwd;                     // password for authentication
    protected string $nonce;                   // lasPrint(t received nonce
    protected string $opaque;                  // last received opaque
    protected string $ha1;                     // our authentication ha1 string
    protected int $nc;                         // nounce usage count
    protected string $serial;                  // the serial number of the hub
    private int $networkTimeout;
    private array $knownUrls = [];
    /**
     * @var true
     */
    private bool $mandatory;
    private bool $enabled;

    function __construct(array $url_info, bool $mandatory)
    {
        $this->rooturl = $url_info['rooturl'];
        $this->url_info = $url_info;
        $this->streamaddr = str_replace('http://', 'tcp://', $this->rooturl);
        $this->streamaddr = str_replace('https://', 'tls://', $this->streamaddr);
        $colon = strpos($url_info['auth'], ':');
        if ($colon === false) {
            $this->user = $url_info['auth'];
            $this->pwd = '';
        } else {
            $this->user = substr($url_info['auth'], 0, $colon);
            $this->pwd = substr($url_info['auth'], $colon + 1);
        }
        $this->knownUrls[] = $url_info['org_url'];
        $this->notifurl = 'not.byn';
        $this->notifPos = -1;
        $this->isNotifWorking = false;
        $this->devListExpires = 0;
        $this->serialByYdx = array();
        $this->retryDelay = 15;
        $this->retryExpires = 0;
        $this->writeProtected = false;
        $this->use_pure_http = false;
        $this->has_unsecure_open_port = false;
        $this->reuseskt = null;
        $this->notifReq = null;
        $this->realm = '';
        $this->serial = '';
        $this->networkTimeout = YAPI::$_yapiContext->_networkTimeoutMs;
        $this->mandatory = $mandatory;
        $this->enabled = true;
        $this->connectionState = YHub::TRYING;
    }

    function isEnable(): bool
    {
        return $this->enabled;
    }

    static function decodeJZONReq(mixed $jzon, mixed $ref): mixed
    {
        $res = array();
        $ofs = 0;
        if (is_array($ref)) {
            foreach ($ref as $key => $value) {
                if (key_exists($key, $jzon)) {
                    $res[$key] = self::decodeJZONReq($jzon[$key], $value);
                } elseif (isset($jzon[$ofs])) {
                    $res[$key] = self::decodeJZONReq($jzon[$ofs], $value);
                }
                $ofs++;
            }
            return $res;
        }
        return $jzon;
    }

    static function decodeJZONService(array $jzon, array $ref): array
    {
        $wp = array();
        $yp = array();
        foreach ($jzon[0] as $wp_entry) {
            $wp[] = self::decodeJZONReq($wp_entry, $ref['whitePages'][0]);
        }


        $yp_entry_ref = $ref['yellowPages'][array_key_first($ref['yellowPages'])][0];
        foreach ($jzon[1] as $yp_type => $yp_entries) {
            $yp[$yp_type] = array();
            foreach ($yp_entries as $yp_entry) {
                $yp[$yp_type][] = self::decodeJZONReq($yp_entry, $yp_entry_ref);
            }
        }
        return ['whitePages' => $wp, 'yellowPages' => $yp];
    }

    static function decodeJZON(array $jzon, array $ref): mixed
    {
        $decoded = self::decodeJZONReq($jzon, $ref);
        if (array_key_exists('services', $ref)) {
            $ofs = sizeof($jzon) - 1;
            if (isset($jzon[$ofs])) {
                $decoded['services'] = self::decodeJZONService($jzon[$ofs], $ref['services']);
            }
        }
        return $decoded;
    }


    static function cleanJsonRef(array $ref): array
    {
        $res = array();
        foreach ($ref as $key => $value) {
            if (is_array($value)) {
                $res[$key] = self::cleanJsonRef($value);
            } elseif ($key == "serialNumber") {
                $res[$key] = substr($value, 0, YOCTO_BASE_SERIAL_LEN);
            } elseif ($key == "firmwareRelease") {
                $res[$key] = $value;
            } else {
                $res[$key] = "";
            }
        }
        return $res;
    }


    function get_stream_context()
    {
        $ssl_options = [];
        if (YAPI::$_yapiContext->_sslCertOptions & YAPI::NO_TRUSTED_CA_CHECK || $this->has_unsecure_open_port) {
            $ssl_options['verify_peer'] = false;
        }
        if (YAPI::$_yapiContext->_sslCertOptions & YAPI::NO_HOSTNAME_CHECK || $this->has_unsecure_open_port) {
            $ssl_options['verify_peer_name'] = false;
        }
        if (YAPI::$_yapiContext->_sslCertPath != '') {
            $ssl_options['cafile'] = YAPI::$_yapiContext->_sslCertPath;
        }
        $arr = [
            'ssl' => $ssl_options,
            'http' => [
                'timeout' => $this->get_networkTimeout() / 1000
            ]
        ];
        return stream_context_create($arr);
    }

    function verfiyStreamAddr(bool $fullTest = true, ?string &$errmsg = ''): int
    {
        if ($this->streamaddr == 'tcp://CALLBACK') {

            if (!isset($_SERVER['REQUEST_METHOD']) || $_SERVER['REQUEST_METHOD'] != 'POST') {
                $errmsg = "invalid request method";
                $this->callbackCache = array();
                return YAPI::IO_ERROR;
            }

            if (!isset($_SERVER['CONTENT_TYPE']) || $_SERVER['CONTENT_TYPE'] != 'application/json') {
                $errmsg = "invalid content type";
                $this->callbackCache = array();
                return YAPI::IO_ERROR;
            }
            if (!isset($_SERVER['HTTP_USER_AGENT'])) {
                $errmsg = "not agent provided";
                $this->callbackCache = array();
                return YAPI::IO_ERROR;
            }
            $useragent = strtolower($_SERVER['HTTP_USER_AGENT']);
            $patern = 'yoctohub';
            if (substr($useragent, 0, 10) != 'virtualhub' && substr($useragent, 0, strlen($patern)) != $patern) {
                $errmsg = "no user agent provided:[" . $useragent . "]";
                $this->callbackCache = array();
                return YAPI::IO_ERROR;
            }

            if ($fullTest) {
                if (isset($_SERVER['HTTP_RAW_POST_DATA'])) {
                    $data = $_SERVER['HTTP_RAW_POST_DATA'];
                } else {
                    $data = file_get_contents('php://input');
                }
                $this->callbackData = $data;
                if ($data == "") {
                    $errmsg = "RegisterHub(callback) used without posting YoctoAPI data";
                    print("\n!YoctoAPI:$errmsg\n");
                    $this->callbackCache = array();
                    return YAPI::IO_ERROR;
                } else {
                    if (isset($_SERVER['HTTP_JSON_POST_DATA'])) {
                        $this->callbackCache = $_SERVER['HTTP_JSON_POST_DATA'];
                    } else {
                        $utf8_encode = YAPI::Ybin2str($data);
                        $this->callbackCache = json_decode($utf8_encode, true);
                    }
                    if (is_null($this->callbackCache)) {
                        $errmsg = "invalid data:[\n$data\n]";
                        print("\n!YoctoAPI:$errmsg\n");
                        $this->callbackCache = array();
                        return YAPI::IO_ERROR;
                    }
                    if ($this->pwd != '') {
                        // callback data signed, verify signature
                        if (!isset($this->callbackCache['sign'])) {
                            $errmsg = "missing signature from incoming YoctoHub (callback password required)";
                            print("\n!YoctoAPI:$errmsg\n");
                            $this->callbackCache = array();
                            return YAPI::UNAUTHORIZED;
                        }
                        $sign = $this->callbackCache['sign'];
                        $salt = $this->pwd;
                        if (strlen($salt) != 32) {
                            $salt = md5($salt);
                        }
                        $data = str_replace($sign, strtolower($salt), $data);
                        $check = strtolower(md5($data));
                        if ($check != $sign) {
                            //Print("Computed signature: $check\n");
                            //Print("Received signature: $sign\n");
                            $errmsg = "invalid signature from incoming YoctoHub (invalid callback password)";
                            print("\n!YoctoAPI:$errmsg\n");
                            $this->callbackCache = array();
                            return YAPI::UNAUTHORIZED;
                        }
                    }
                    if (isset($this->callbackCache['serial'])) {
                        $this->serial = $this->callbackCache['serial'];
                    }
                    if (isset($this->callbackCache['serial']) && !is_null(YAPI::$_jzonCacheDir)) {
                        $jzonCacheDir = YAPI::$_jzonCacheDir;
                        $mergedCache = array();
                        $upToDate = true;
                        foreach ($this->callbackCache as $req => $value) {
                            $pos = strpos($req, "/api.json");
                            if ($pos !== false) {
                                $fwpos = strpos($req, "?fw=", $pos);
                                $isJZON = false;
                                if ($fwpos !== false) {
                                    if (key_exists('module', $value)) {
                                        // device did not return JZON (probably due to fw update)
                                        $req = substr($req, 0, $fwpos);
                                    } else {
                                        $isJZON = true;
                                    }
                                }
                                if ($isJZON) {
                                    if ($pos == 0) {
                                        $serial = $this->callbackCache['serial'];
                                    } else {
                                        // "/bySerial/" = 10 chars
                                        $serial = substr($req, 10, $pos - 10);
                                    }
                                    $firm = str_replace([' ', ':'], '_', substr($req, $fwpos + 4));
                                    $base = substr($serial, 0, YOCTO_BASE_SERIAL_LEN);
                                    if (!is_file("{$jzonCacheDir}{$base}_{$firm}.json")) {
                                        $errmsg = "No JZON reference file for {$serial}/{$firm}";
                                        print("\n!YoctoAPI:$errmsg\n");
                                        $this->callbackCache = array();
                                        print("\n@YoctoAPI:#!noref\n");
                                        return YAPI::IO_ERROR;
                                    }
                                    $ref = file_get_contents("{$jzonCacheDir}{$base}_{$firm}.json");
                                    $ref = json_decode($ref, true);
                                    $decoded = self::decodeJZON($value, $ref);
                                    if ($ref['module']['firmwareRelease'] != $decoded['module']['firmwareRelease']) {
                                        $errmsg = "invalid JZON data";
                                        print("\n!YoctoAPI:$errmsg\n");
                                        $this->callbackCache = array();
                                        print("\n@YoctoAPI:#!invalid\n");
                                        return YAPI::IO_ERROR;
                                    }
                                    $req = substr($req, 0, $fwpos);
                                    $mergedCache[$req] = $decoded;
                                    //Print("Use jzon data for {$serial}/{$firm}\n");
                                } else {
                                    $serial = $value['module']['serialNumber'];
                                    $base = substr($serial, 0, YOCTO_BASE_SERIAL_LEN);
                                    $firm = str_replace([' ', ':'], '_', $value['module']['firmwareRelease']);
                                    $clean_struct = self::cleanJsonRef($value);
                                    file_put_contents("{$jzonCacheDir}{$base}_{$firm}.json", json_encode($clean_struct));
                                    $mergedCache[$req] = $value;
                                    print("\n@YoctoAPI:#{$serial}/{$firm}\n");
                                    $upToDate = false;
                                }
                            } else {
                                $mergedCache[$req] = $value;
                            }
                        }
                        if ($upToDate) {
                            print("\n@YoctoAPI:#=\n");
                        }
                        $this->callbackCache = $mergedCache;
                    }
                    // decode binary content
                    foreach ($this->callbackCache as $url => $data) {
                        if (!is_string($data)) {
                            continue;
                        }
                        $len = strlen($url);
                        if ($len > 2 && substr($url, $len - 2) === '.#') {
                            $this->callbackCache[substr($url, 0, $len - 2)] = base64_decode($data);
                        }
                    }
                }
            }
        } else {
            $info_json_url = $this->rooturl . $this->url_info['subdomain'] . '/info.json';
            $ssl_options = $this->get_stream_context();
            $info_json = @file_get_contents($info_json_url, false, $ssl_options);
            if ($info_json !== false) {
                $jsonData = json_decode($info_json, true);
                if ($jsonData != null) {
                    if (array_key_exists('securityMode', $jsonData) && $jsonData['securityMode'] == 0) {
                        $errmsg = "Remote hub is not yet configured";
                        return YAPI::UNCONFIGURED;
                    }
                    if (array_key_exists('protocol', $jsonData) && $jsonData['protocol'] == 'HTTP/1.1') {
                        $this->use_pure_http = true;
                    }
                    if (array_key_exists('port', $jsonData)) {
                        $best_proto = "";
                        $best_port = 0;
                        foreach ($jsonData['port'] as $portinfo) {
                            $parts = explode(':', $portinfo);
                            if ($parts[0] != 'http' && $parts[0] != 'https') {
                                continue;
                            }
                            if ($parts[0] == 'http') {
                                $this->has_unsecure_open_port = true;
                            }
                            if ($this->url_info['proto'] == 'secure' && $parts[0] == 'https') {
                                if ($best_port == 0) {
                                    $best_proto = $parts[0];
                                    $best_port = $parts[1];
                                }
                            }
                            if ($this->url_info['proto'] == 'auto') {
                                if ($best_port == 0) {
                                    $best_proto = $parts[0];
                                    $best_port = $parts[1];
                                }
                            }
                        }
                        if ($best_port > 0) {
                            $this->url_info['proto'] = $best_proto;
                            $this->url_info['rooturl'] = "{$best_proto}://{$this->url_info['host']}:{$best_port}";
                            $this->rooturl = $this->url_info['rooturl'];
                            $this->streamaddr = str_replace('http://', 'tcp://', $this->rooturl);
                            $this->streamaddr = str_replace('https://', 'tls://', $this->streamaddr);
                        }
                    }
                    if (array_key_exists('serialNumber', $jsonData)) {
                        $this->updateSerial($jsonData['serialNumber']);
                    }
                }
            }
            $this->callbackCache = null;
        }
        return 0;
    }

    /**
     * Update the hub internal variables according
     * to a received header with WWW-Authenticate
     */
    function parseWWWAuthenticate(string $header): void
    {
        $pos = stripos($header, "\r\nWWW-Authenticate:");
        if ($pos === false) {
            return;
        }
        $header = substr($header, $pos + 19);
        $eol = strpos($header, "\r");
        if ($eol !== false) {
            $header = substr($header, 0, $eol);
        }
        $tags = null;
        if (preg_match_all('~(?<tag>\w+)="(?<value>[^"]*)"~m', $header, $tags) == false) {
            return;
        }
        $this->realm = '';
        $this->nonce = '';
        $this->opaque = '';
        for ($i = 0; $i < sizeof($tags['tag']); $i++) {
            if ($tags['tag'][$i] == "realm") {
                $this->realm = $tags['value'][$i];
            } elseif ($tags['tag'][$i] == "nonce") {
                $this->nonce = $tags['value'][$i];
            } elseif ($tags['tag'][$i] == "opaque") {
                $this->opaque = $tags['value'][$i];
            }
        }
        $this->nc = 0;
        $this->ha1 = md5($this->user . ':' . $this->realm . ':' . $this->pwd);
    }

    /**
     * Return an Authorization header for a given request
     * @param string $request
     * @return string
     */
    function getAuthorization(string $request): string
    {
        if ($this->user == '' || $this->realm == '') {
            return '';
        }
        $this->nc++;
        $pos = strpos($request, ' ');
        $method = substr($request, 0, $pos);
        $uri = substr($request, $pos + 1);
        $nc = sprintf("%08x", $this->nc);
        $cnonce = sprintf("%08x", mt_rand(0, 0x7fffffff));
        $ha1 = $this->ha1;
        $ha2 = md5("{$method}:{$uri}");
        $nonce = $this->nonce;
        $response = md5("{$ha1}:{$nonce}:{$nc}:{$cnonce}:auth:{$ha2}");
        $res = 'Authorization: Digest username="' . $this->user . '", realm="' . $this->realm . '",' .
            ' nonce="' . $this->nonce . '", uri="' . $uri . '", qop=auth, nc=' . $nc . ',' .
            ' cnonce="' . $cnonce . '", response="' . $response . '", opaque="' . $this->opaque . '"';
        return "$res\r\n";
    }

    // Return true if a hub is just a virtual cache (for callback mode)
    function isCachedHub(): bool
    {
        return !is_null($this->callbackCache);
    }

    // Execute a query for cached hub (for callback mode)
    function cachedQuery(string $str_query, string $str_body): ?string
    {
        // apply POST remotely
        if (substr($str_query, 0, 5) == 'POST ') {
            $boundary = '???';
            $endb = strpos($str_body, "\r");
            if (substr($str_body, 0, 2) == '--' && $endb > 2 && $endb < 20) {
                $boundary = substr($str_body, 2, $endb - 2);
            }
            Printf("\n@YoctoAPI:$str_query %d:%s\n%s", strlen($str_body), $boundary, $str_body);
            return "OK\r\n\r\n";
        }
        if (substr($str_query, 0, 4) != 'GET ') {
            return null;
        }
        // remove JZON trigger if present (not relevant in callback mode)
        $jzon = strpos($str_query, '?fw=');
        if ($jzon !== false && strpos($str_query, '&', $jzon) === false) {
            $str_query = substr($str_query, 0, $jzon);
        }
        // dispatch between cached get and remote set
        if (strpos($str_query, '?') === false ||
            strpos($str_query, '/@YCB+') !== false ||
            strpos($str_query, '/logs.txt') !== false ||
            strpos($str_query, '/tRep.bin') !== false ||
            strpos($str_query, '/logger.json') !== false ||
            strpos($str_query, '/rxmsg.json') !== false ||
            strpos($str_query, '/ping.txt') !== false ||
            strpos($str_query, '/flash.json?a=list') !== false ||
            strpos($str_query, '/flash.json?a=stat') !== false ||
            strpos($str_query, '/files.json?a=dir') !== false) {
            // read request, load from cache
            $parts = explode(' ', $str_query);
            $url = $parts[1];
            $getmodule = (strpos($url, 'api/module.json') !== false);
            if ($getmodule) {
                $url = str_replace('api/module.json', 'api.json', $url);
            }
            if (!isset($this->callbackCache[$url])) {
                if ($url == "/api.json") {
                    // /api.json is not present in cache. Report an error to force the hub
                    // to switch back to json encoding
                    print("\n!YoctoAPI:$url is in cache. Disable JZON encoding");
                    print("\n@YoctoAPI:#!invalid\n");
                    return null;
                }
                if (strpos($url, "@YCB+") !== false) {
                    // file has be requested by addFileToHTTPCallback
                    $url = str_replace('@YCB+', '', $url);
                    print("\n@YoctoAPI:+$url\n");
                    return "OK\r\n\r\n";
                } else {
                    print("\n!YoctoAPI:$url is not preloaded, adding to list");
                    print("\n@YoctoAPI:+$url\n");
                    return null;
                }
            }
            // Print("\n[$url found]\n");
            $jsonres = $this->callbackCache[$url];
            if ($getmodule) {
                $jsonres = $jsonres['module'];
            }
            if (strpos($str_query, '.json') !== false) {
                $jsonres = json_encode($jsonres);
            }
            return "OK\r\n\r\n$jsonres";
        } else {
            // change request, print to output stream
            print("\n@YoctoAPI:$str_query \n");
            return "OK\r\n\r\n";
        }
    }

    public function getBaseURL(): string
    {
        return $this->url_info['rooturl'] . $this->url_info['subdomain'] . '/';
    }

    public function getSerialNumber(): string
    {
        return $this->serial;
    }

    public function getLastErrorMessage(): string
    {
        //fixme:  implement this
        return "";
    }

    public function getRegisteredUrl()
    {
        return $this->url_info['org_url'];
    }

    public function getConnectionUrl()
    {
        return $this->rooturl;
    }

    public function getConnectionState()
    {
        return YHub::CONNECTED;
    }

    public function isOnline(): bool
    {
        return true;
    }

    public function isReadOnly(): bool
    {
        return $this->writeProtected && $this->user != 'admin' && !$this->isCachedHub();
    }

    public function get_networkTimeout(): int
    {
        return $this->networkTimeout;
    }

    public function getLastErrorType(): int
    {
        // fixme: implement this
        return YAPI::SUCCESS;
    }

    public function set_networkTimeout(int $value): void
    {
        $this->networkTimeout = $value;
    }

    public function mergeFrom(YTcpHub $tcphub): void
    {
        $this->addKnownUrl($tcphub->url_info['org_url']);
    }

    public function isURLKnown(string $url): bool
    {
        return in_array($url, $this->knownUrls);
    }

    public function setMandatory(bool $true)
    {
        $this->mandatory = true;
    }

    private function updateSerial(mixed $serialNumber): void
    {
        $this->serial = $serialNumber;
        $this->enabled = !YAPI::_checkForDuplicateHub($this);
    }

    public function getKnownUrls(): array
    {
        return $this->knownUrls;
    }

    public function addKnownUrl(string $url): void
    {
        if (!in_array($url, $this->knownUrls)) {
            $this->knownUrls[] = $url;
        }
    }

    public function getRooturl(): string
    {
        return $this->rooturl;
    }

}

//^^^^ YTcpHub.php
//vvvv YTcpReq.php

/**
 * YTcpReq Class (used internally)
 *
 * Instances of this class represent an open TCP connection to an HTTP socket.
 * The class handles digest authorization transparently.
 */
class YTcpReq
{
    // attributes
    public YTcpHub $hub;                        // the YTcpHub to which we connect
    public bool $async;                      // true if the request is async
    public mixed $skt;                        // stream socket
    public string $request;                    // request to be sent
    public string $reqbody;                    // request body to send, if any
    public string $boundary;                   // request body boundary, if used
    public string $meta;                       // HTTP headers received in reply
    public string $reply;                      // reply buffer
    public int $retryCount;                 // number of retries for this request
    // the following attributes should not be taken for granted unless eof() returns true
    public int $errorType;                  // status of current connection
    public string $errorMsg;                   // last error message
    public int $reqcnt;

    public static int $totalTcpReqs = 0;
    private int $mstimeout;

    function __construct(YTcpHub $hub, string $request, bool $async, string $reqbody = '', int $mstimeout = YAPI_BLOCKING_REQUEST_TIMEOUT)
    {
        $pos = strpos($request, "\r");
        if ($pos !== false) {
            $request = substr($request, 0, $pos);
        }
        $boundary = '';
        if ($reqbody != '') {
            do {
                $boundary = sprintf("Zz%06xzZ", mt_rand(0, 0xffffff));
            } while (strpos($reqbody, $boundary) !== false);
            $reqbody = "--{$boundary}\r\n{$reqbody}\r\n--{$boundary}--\r\n";
        }
        $this->hub = $hub;
        $this->async = $async;
        $this->request = trim($request);
        $this->reqbody = $reqbody;
        $this->boundary = $boundary;
        $this->meta = '';
        $this->reply = '';
        $this->retryCount = 0;
        $this->mstimeout = $mstimeout;
        $this->errorType = YAPI::IO_ERROR;
        $this->errorMsg = 'could not open connection';
        $this->reqcnt = ++YTcpReq::$totalTcpReqs;
        $this->skt = null;
    }

    function eof(): bool
    {
        if (!is_null($this->skt)) {
            // there is still activity going on
            return false;
        }
        if ($this->meta != '' && $this->errorType == YAPI::SUCCESS) {
            // connection was done and ended successfully
            // check we need to unchunk the response
            $t_ofs = stripos($this->meta, "transfer-encoding");
            if ($t_ofs > 0) {
                $t_ofs += 17;
                $t_endl = strpos($this->meta, "\r\n", $t_ofs);
                $t_chunk = stripos($this->meta, "chunked", $t_ofs);
                if ($t_chunk !== false && $t_endl !== false && $t_chunk < $t_endl) {
                    // chuck encoded
                    $new = $this->http_chunked_decode($this->reply);
                    $this->reply = $new;
                    $this->meta = substr($this->meta, 0, $t_ofs) . substr($this->meta, $t_endl + 2);
                }
            }

            return true;
        }
        if ($this->retryCount > 3) {
            // connection permanently failed
            return true;
        }
        // connection is expected to be reopened
        return false;
    }


    function http_chunked_decode(string $data): string
    {
        $data_length = strlen($data);
        $dechunk = '';
        $ofs = 0;
        do {
            $hexstr = '';
            while ($ofs < $data_length && ($c = $data[$ofs]) != "\n") {
                if (($c >= '0' && $c <= '9') || ($c >= 'A' && $c <= 'F') || ($c >= 'a' && $c <= 'f')) {
                    $hexstr .= $c;
                }
                $ofs++;
            }
            if ($ofs < $data_length) {
                $len = hexdec($hexstr);
                if ($ofs + 3 + $len < $data_length) {
                    $ofs++;
                    $dechunk .= substr($data, $ofs, $len);
                    $ofs += 2;
                } else {
                    $ofs += 1;
                }
            }
        } while ($ofs < $data_length);
        return $dechunk;
    }


    function newsocket(int &$errno, string &$errstr, int $mstimeout): mixed
    {
        // for now, use client socket only since server sockets
        // for callbacks are not reliably available on a public server
        $addr = $this->hub->streamaddr;
        $pos = strpos($addr, '/', 9);
        if ($pos !== false) {
            $addr = substr($addr, 0, $pos);
        }
        if (substr($addr, 0, 6) == 'tls://') {
            $sslContext = $this->hub->get_stream_context();
            stream_context_set_params($sslContext, array());
            $resource = @stream_socket_client($addr, $errno, $errstr, $mstimeout / 1000, STREAM_CLIENT_CONNECT, $sslContext);
        } else {
            $resource = @stream_socket_client($addr, $errno, $errstr, $mstimeout / 1000);

        }
        return $resource;
    }


    function process(?string &$errmsg = ''): int
    {
        if ($this->eof()) {
            if ($this->errorType != YAPI::SUCCESS) {
                $errmsg = $this->errorMsg;
            }
            return $this->errorType;
        }
        if (!is_null($this->skt) && !is_resource($this->skt)) {
            // connection died, need to reopen
            $this->skt = null;
        }
        if (is_null($this->skt)) {
            // need to reopen connection
            if ($this->hub->isCachedHub()) {
                // special handling for "connection-less" callback mode
                $data = $this->hub->cachedQuery($this->request, $this->reqbody);
                if (is_null($data)) {
                    $this->errorType = YAPI::NOT_SUPPORTED;
                    $this->errorMsg = "query is not available in callback mode";
                    $this->retryCount = 99;
                    return YAPI::SUCCESS; // will propagate error later if needed
                }
                $skt = fopen('data:text/plain;base64,' . base64_encode($data), 'rb');
                if ($skt === false) {
                    $this->errorType = YAPI::IO_ERROR;
                    $this->errorMsg = "failed to open data stream";
                    $this->retryCount = 99;
                    return YAPI::SUCCESS; // will propagate error later if needed
                }
                stream_set_blocking($skt, false);
            } else {
                $skt = null;
                if (!is_null($this->hub->reuseskt)) {
                    $skt = $this->hub->reuseskt;
                    $this->hub->reuseskt = null;
                    if (!is_resource($skt)) {
                        // reusable socket is no more valid
                        $skt = null;
                    }
                }
                if (is_null($skt)) {
                    $errno = 0;
                    $errstr = '';
                    $skt = $this->newsocket($errno, $errstr, $this->mstimeout);
                    if ($skt === false) {
                        $this->errorType = YAPI::IO_ERROR;
                        $this->errorMsg = "failed to open socket ($errno): $errstr";
                        $this->retryCount++;
                        return YAPI::SUCCESS; // will retry later
                    }
                }
                stream_set_blocking($skt, false);
                $request = $this->format_request();
                $reqlen = strlen($request);
                if (fwrite($skt, $request, $reqlen) != $reqlen) {
                    fclose($skt);
                    $this->errorType = YAPI::IO_ERROR;
                    $this->errorMsg = "failed to write to socket";
                    $this->retryCount++;
                    return YAPI::SUCCESS; // will retry later
                }
            }
            $this->skt = $skt;
        } else {
            // read anything available on current socket, and process authentication headers
            while (true) {
                $data = fread($this->skt, 8192);
                if ($data === false) {
                    $this->errorType = YAPI::IO_ERROR;
                    $this->errorMsg = "failed to read from socket";
                    $this->retryCount++;
                    return YAPI::SUCCESS; // will retry later
                }
                //Printf("[read %d bytes]\n",strlen($data));
                if (strlen($data) == 0) {
                    break;
                }
                if ($this->reply == '' && strpos($this->meta, "\r\n\r\n") === false) {
                    $this->meta .= $data;
                    $eoh = strpos($this->meta, "\r\n\r\n");
                    if ($eoh !== false) {
                        // fully received header
                        $this->reply = substr($this->meta, $eoh + 4);
                        $this->meta = substr($this->meta, 0, $eoh + 4);
                        $firstline = substr($this->meta, 0, strpos($this->meta, "\r"));
                        $parts = explode(" ", $firstline);
                        if (count($parts) >= 2 && $parts[0] == 'HTTP/1.1') {
                            if ($parts[1] == '401') {
                                // authentication required
                                $this->errorType = YAPI::UNAUTHORIZED;
                                $this->errorMsg = "Authentication required";
                                fclose($this->skt);
                                $this->skt = null;
                                $this->hub->parseWWWAuthenticate($this->meta);
                                if ($this->hub->user != '') {
                                    $this->meta = '';
                                    $this->reply = '';
                                    $this->retryCount++;
                                } else {
                                    $this->retryCount = 99;
                                }
                                return YAPI::SUCCESS; // will propagate error later if needed
                            } elseif ($parts[1] != '200' && $parts[1] != '304') {
                                $this->errorType = YAPI::IO_ERROR;
                                $this->errorMsg = "Unexpected HTTP return code ({$parts[1]})";
                                $this->retryCount = 99;
                                return YAPI::SUCCESS; // will retry later
                            }
                        }
                    }
                } else {
                    $this->reply .= $data;
                }
                // so far so good
                $this->errorType = YAPI::SUCCESS;
            }
            // write request body, if any, once header is fully received
            if ($this->reqbody != '') {
                $bodylen = strlen($this->reqbody);
                $written = fwrite($this->skt, $this->reqbody, $bodylen);
                if ($written > 0) {
                    $this->reqbody = substr($this->reqbody, $written);
                }
            }
            if (!is_resource($this->skt)) {
                // socket dropped dead
                $this->skt = null;
            } elseif (feof($this->skt)) {
                fclose($this->skt);
                $this->skt = null;
            } elseif ($this->meta == "0K\r\n\r\n" && $this->reply == "\r\n") {
                if (is_null($this->hub->reuseskt)) {
                    $this->hub->reuseskt = $this->skt;
                } else {
                    fclose($this->skt);
                }
                $this->skt = null;
            }
        }
        return YAPI::SUCCESS;
    }

    function format_request(): string
    {
        $parts = explode(' ', $this->request);
        if (sizeof($parts) == 2) {
            $req = $parts[0] . ' ' . $this->hub->url_info['subdomain'] . $parts[1];
        } else {
            $req = $this->request;
        }
        if ($this->hub->use_pure_http) {
            $request = $req . " HTTP/1.1\r\n";
            $host = $this->hub->url_info['host'];
            $request .= "Host: " . $host . "\r\n";
        } else {
            $request = $req . " \r\n"; // no HTTP/1.1 suffix for light queries
        }
        $request .= $this->hub->getAuthorization($req);
        if ($this->boundary != '') {
            $request .= "Content-Type: x-upload; boundary={$this->boundary}\r\n";
            $body_size = strlen($this->reqbody);
            $request .= "Content-Length: {$body_size}\r\n";
        }
        if (substr($this->request, -2) == "&." && !$this->hub->use_pure_http) {
            $request .= "\r\n";
        } else {
            $request .= "Connection: close\r\n\r\n";
        }
        return $request;
    }

    function close(): void
    {
        if ($this->skt) {
            fclose($this->skt);
        }
    }
}


//^^^^ YTcpReq.php

//vvvv YFunctionType.php

/**
 * YFunctionType Class (used internally)
 *
 * Instances of this class stores everything we know about a given type of function:
 * Mapping between function logical names and Hardware ID as discovered on hubs,
 * and existing instances of YFunction (either already connected or simply requested).
 * To keep it simple, this implementation separates completely the name resolution
 * mechanism, implemented using the yellow pages, and the storage and retrieval of
 * existing YFunction instances.
 */
class YFunctionType
{
    // private attributes, to be used within yocto_api only
    protected string $_className;
    protected array $_connectedFns;           // functions requested and available, by Hardware Id
    protected array $_requestedFns;           // functions requested but not yet known, by any type of name
    protected array $_hwIdByName;             // hash table of function Hardware Id by logical name
    protected array $_nameByHwId;             // hash table of function logical name by Hardware Id
    protected array $_valueByHwId;            // hash table of function advertised value by logical name
    protected int $_baseType;               // default to no abstract base type (generic YFunction)

    /**
     * YFunctionType constructor.
     * @param string $str_classname
     */
    function __construct(string $str_classname)
    {
        $this->_className = $str_classname;
        $this->_connectedFns = array();
        $this->_requestedFns = array();
        $this->_hwIdByName = array();
        $this->_nameByHwId = array();
        $this->_valueByHwId = array();
        $this->_baseType = 0;
    }


    // Index a single function given by HardwareId and logical name; store any advertised value
    // Return true iff there was a logical name discrepency
    public function reindexFunction(string $str_hwid, string $str_name, ?string $str_val, ?int $int_basetype): bool
    {
        $currname = '';
        $res = false;
        if (isset($this->_nameByHwId[$str_hwid])) {
            $currname = $this->_nameByHwId[$str_hwid];
        }
        if ($currname == '') {
            if ($str_name != '') {
                $this->_nameByHwId[$str_hwid] = $str_name;
                $res = true;
            }
        } elseif ($currname != $str_name) {
            if ($this->_hwIdByName[$currname] == $str_hwid) {
                unset($this->_hwIdByName[$currname]);
            }
            if ($str_name != '') {
                $this->_nameByHwId[$str_hwid] = $str_name;
            } else {
                unset($this->_nameByHwId[$str_hwid]);
            }
            $res = true;
        }
        if ($str_name != '') {
            $this->_hwIdByName[$str_name] = $str_hwid;
        }
        if (!is_null($str_val)) {
            $this->_valueByHwId[$str_hwid] = $str_val;
        } else {
            if (!isset($this->_valueByHwId[$str_hwid])) {
                $this->_valueByHwId[$str_hwid] = '';
            }
        }
        if (!is_null($int_basetype)) {
            if ($this->_baseType == 0) {
                $this->_baseType = $int_basetype;
            }
        }
        return $res;
    }

    // Forget a disconnected function given by HardwareId
    public function forgetFunction(string $str_hwid): void
    {
        if (isset($this->_nameByHwId[$str_hwid])) {
            $currname = $this->_nameByHwId[$str_hwid];
            if ($currname != '' && $this->_hwIdByName[$currname] == $str_hwid) {
                unset($this->_hwIdByName[$currname]);
            }
            unset($this->_nameByHwId[$str_hwid]);
        }
        if (isset($this->_valueByHwId[$str_hwid])) {
            unset($this->_valueByHwId[$str_hwid]);
        }
    }

    // Find the exact Hardware Id of the specified function, if currently connected
    // If device is not known as connected, return a clean error
    // This function will not cause any network access
    public function resolve(string $str_func): YAPI_YReq
    {
        // Try to resolve str_func to a known Function instance, if possible, without any device access
        $dotpos = strpos($str_func, '.');
        if ($dotpos === false) {
            // First case: str_func is the logicalname of a function
            if (isset($this->_hwIdByName[$str_func])) {
                return new YAPI_YReq($this->_hwIdByName[$str_func],
                    YAPI::SUCCESS,
                    'no error',
                    $this->_hwIdByName[$str_func]);
            }

            // fallback to assuming that str_func is a logicalname or serial number of a module
            // with an implicit function name (like serial.module for instance)
            $dotpos = strlen($str_func);
            $str_func .= '.' . strtolower($this->_className[0]) . substr($this->_className, 1);
        }

        // Second case: str_func is in the form: device_id.function_id

        // quick lookup for a known pure hardware id
        if (isset($this->_valueByHwId[$str_func])) {
            return new YAPI_YReq($this->_valueByHwId[$str_func],
                YAPI::SUCCESS,
                'no error',
                $str_func);
        }
        if ($dotpos > 0) {
            // either the device id is a logical name, or the function is unknown
            $devid = substr($str_func, 0, $dotpos);
            $funcid = substr($str_func, $dotpos + 1);
            $dev = YAPI::getDevice($devid);
            if (!$dev) {
                return new YAPI_YReq($str_func,
                    YAPI::DEVICE_NOT_FOUND,
                    "Device [$devid] not online",
                    null);
            }
            $serial = $dev->getSerialNumber();
            $res = "$serial.$funcid";
            if (isset($this->_valueByHwId[$res])) {
                return new YAPI_YReq($res,
                    YAPI::SUCCESS,
                    'no error',
                    $res);
            }

            // not found neither, may be funcid is a function logicalname
            $nfun = $dev->functionCount();
            for ($i = 0; $i < $nfun; $i++) {
                $res = "$serial." . $dev->functionId($i);
                if (isset($this->_nameByHwId[$res])) {
                    $name = $this->_nameByHwId[$res];
                    if ($name == $funcid) {
                        return new YAPI_YReq($res,
                            YAPI::SUCCESS,
                            'no error',
                            $res);
                    }
                }
            }
        } else {
            $serial = '';
            $funcid = substr($str_func, 1);
            // only functionId  (ie ".temperature")
            foreach (array_keys($this->_connectedFns) as $hwid_str) {
                $pos = strpos($hwid_str, '.');
                $function = substr($hwid_str, $pos + 1);
                //print("search for $funcid in {$this->_className} $function\n");
                if ($function == $funcid) {
                    return new YAPI_YReq($hwid_str,
                        YAPI::SUCCESS,
                        'no error',
                        $hwid_str);
                }
            }
        }

        return new YAPI_YReq("$serial.$funcid",
            YAPI::DEVICE_NOT_FOUND,
            "No function [$funcid] found on device [$serial]",
            null);
    }

    public function getFriendlyName(string $str_func): YAPI_YReq
    {
        $resolved = $this->resolve($str_func);
        if ($resolved->errorType != YAPI::SUCCESS) {
            return $resolved;
        }

        if ($this->_className == "Module") {
            $friend = $resolved->result;
            if (isset($this->_nameByHwId[$resolved->result])) {
                $friend = $this->_nameByHwId[$resolved->result];
            }
            return new YAPI_YReq($resolved->result,
                YAPI::SUCCESS,
                'no error',
                $friend);
        } else {
            $pos = strpos($resolved->result, '.');
            $serial_mod = substr($resolved->result, 0, $pos);
            $friend_mod_full = YAPI::getFriendlyNameFunction("Module", $serial_mod)->result;
            $friend_mod_dot = strpos($friend_mod_full, '.');
            $friend_mod = ($friend_mod_dot ? substr($friend_mod_full, 0, $friend_mod_dot) : $friend_mod_full);
            $friend_func = substr($resolved->result, $pos + 1);
            if (isset($this->_nameByHwId[$resolved->result]) && $this->_nameByHwId[$resolved->result] != '') {
                $friend_func = $this->_nameByHwId[$resolved->result];
            }
            return new YAPI_YReq($resolved->result,
                YAPI::SUCCESS,
                'no error',
                $friend_mod . '.' . $friend_func);
        }
    }

    // Retrieve a function object by hardware id, updating the indexes on the fly if needed
    public function setFunction(string $str_func, YFunction $obj_func): void
    {
        $funres = $this->resolve($str_func);
        if ($funres->errorType == YAPI::SUCCESS) {
            // the function has been located on a device
            $this->_connectedFns[$funres->result] = $obj_func;
        } else {
            // the function is still abstract
            $this->_requestedFns[$str_func] = $obj_func;
        }
    }

    // Retrieve a function object by hardware id, updating the indexes on the fly if needed
    public function getFunction(string $str_func): ?YFunction
    {
        $funres = $this->resolve($str_func);
        if ($funres->errorType == YAPI::SUCCESS) {
            // the function has been located on a device
            if (isset($this->_connectedFns[$funres->result])) {
                return $this->_connectedFns[$funres->result];
            }

            if (isset($this->_requestedFns[$str_func])) {
                $req_fn = $this->_requestedFns[$str_func];
                $this->_connectedFns[$funres->result] = $req_fn;
                unset($this->_requestedFns[$str_func]);
                return $req_fn;
            }
        } else {
            // the function is still abstract
            if (isset($this->_requestedFns[$str_func])) {
                return $this->_requestedFns[$str_func];
            }
        }
        return null;
    }

    // Stores a function advertised value by hardware id, queue an event if needed
    public function setFunctionValue(string $str_hwid, string $str_pubval): void
    {
        if (isset($this->_valueByHwId[$str_hwid]) &&
            $this->_valueByHwId[$str_hwid] == $str_pubval) {
            return;
        }
        $this->_valueByHwId[$str_hwid] = $str_pubval;
        foreach (YFunction::$_ValueCallbackList as $fun) {
            $hwId = $fun->_getHwId();
            if (!$hwId) {
                continue;
            }
            if ($hwId == $str_hwid) {
                YAPI::addValueEvent($fun, $str_pubval);
            }
        }
    }

    // Retrieve a function advertised value by hardware id
    public function getFunctionValue(string $str_hwid): string
    {
        return $this->_valueByHwId[$str_hwid];
    }

    // Stores a function advertised value by hardware id, queue an event if needed
    public function setTimedReport(string $str_hwid, float $float_timestamp, float $float_duration, array $arr_report): void
    {
        foreach (YFunction::$_TimedReportCallbackList as $fun) {
            $hwId = $fun->_getHwId();
            if (!$hwId) {
                continue;
            }
            if ($hwId == $str_hwid) {
                YAPI::addTimedReportEvent($fun, $float_timestamp, $float_duration, $arr_report);
            }
        }
    }

    // Return the basetype of this function class
    public function getBaseType(): int
    {
        return $this->_baseType;
    }

    public function matchBaseType(int $baseType): bool
    {
        if ($baseType == 0) {
            return true;
        }
        return $this->_baseType == $baseType;
    }

    // Find the hardwareId of the first instance of a given function class
    public function getFirstHardwareId(): ?string
    {
        foreach (array_keys($this->_valueByHwId) as $res) {
            return $res;
        }
        return null;
    }

    // Find the hardwareId for the next instance of a given function class
    public function getNextHardwareId(string $str_hwid): ?string
    {
        foreach (array_keys($this->_valueByHwId) as $iter_hwid) {
            if ($str_hwid == "!") {
                return $iter_hwid;
            }
            if ($str_hwid == $iter_hwid) {
                $str_hwid = "!";
            }
        }
        return null; // no more instance found
    }
}

//^^^^ YFunctionType.php

//vvvv YDevice.php

//
// YDevice Class (used internally)
//
// This class is used to store everything we know about connected Yocto-Devices.
// Instances are created when devices are discovered in the white pages
// (or registered manually, for root hubs) and then used to keep track of
// device naming changes. When a device or a function is renamed, this
// object forces the local indexes to be immediately updated, even if not
// yet fully propagated through the yellow pages of the device hub.
//
// In order to regroup multiple function queries on the same physical device,
// this class implements a device-wide API string cache (agnostic of API content).
// This is in addition to the function-specific cache implemented in YFunction.
//

class YDevice
{
    // private attributes, to be used within yocto_api only
    protected string $_rootUrl;
    protected string $_serialNumber;
    protected string $_logicalName;
    protected string $_productName;
    protected int $_productId;
    protected float $_lastTimeRef;
    protected float $_lastDuration;
    protected int $_beacon;
    protected int $_devYdx;
    protected array $_cache;
    protected float $_cacheExpiration;
    protected array $_functions;
    protected ?YTcpReq $_ongoingReq;
    public int $_lastErrorType;
    public string $_lastErrorMsg;
    private bool $_logNeedPulling;
    private bool $_logIsPulling;
    private mixed $_logCallback;
    private int $_logpos;

    function __construct(string $str_rooturl, ?array $obj_wpRec = null, ?array $obj_ypRecs = null)
    {
        $this->_rootUrl = $str_rooturl;
        $this->_serialNumber = '';
        $this->_logicalName = '';
        $this->_productName = '';
        $this->_productId = 0;
        $this->_beacon = 0;
        $this->_devYdx = -1;
        $this->_cache = array('_expiration' => 0, '_json' => '');
        $this->_functions = array();
        $this->_lastErrorType = YAPI::SUCCESS;
        $this->_lastErrorMsg = 'no error';
        $this->_ongoingReq = null;
        $this->_logCallback = null;
        $this->_logIsPulling = false;
        $this->_lastTimeRef = 0;
        $this->_lastDuration = 0;
        $this->_logNeedPulling = false;
        $this->_logpos = 0;
        if (!is_null($obj_wpRec)) {
            // preload values from white pages, if provided
            $this->_serialNumber = $obj_wpRec['serialNumber'];
            $this->_logicalName = $obj_wpRec['logicalName'];
            $this->_productName = $obj_wpRec['productName'];
            $this->_productId = $obj_wpRec['productId'];
            $this->_beacon = $obj_wpRec['beacon'];
            $this->_devYdx = (isset($obj_wpRec['index']) ? $obj_wpRec['index'] : -1);
            $this->_updateFromYP($obj_ypRecs);
            YAPI::reindexDevice($this);
        } else {
            // preload values from device directly
            $this->refresh();
        }
    }

    // Throw an exception, keeping track of it in the object itself

    /**
     * @param int $int_errType
     * @param string $str_errMsg
     * @param mixed $obj_retVal
     * @return mixed
     * @throws YAPI_Exception
     */
    protected function _throw(int $int_errType, string $str_errMsg, mixed $obj_retVal): mixed
    {
        $this->_lastErrorType = $int_errType;
        $this->_lastErrorMsg = $str_errMsg;

        if (YAPI::$exceptionsDisabled) {
            return $obj_retVal;
        }
        // throw an exception
        throw new YAPI_Exception($str_errMsg, $int_errType);
    }

    // Update device cache and YAPI function lists from yp records
    protected function _updateFromYP(array $obj_ypRecs): void
    {
        $funidx = 0;
        foreach ($obj_ypRecs as $ypRec) {
            foreach ($ypRec as $rec) {
                $hwid = $rec['hardwareId'];
                $dotpos = strpos($hwid, '.');
                if (substr($hwid, 0, $dotpos) == $this->_serialNumber) {
                    if (isset($rec['index'])) {
                        $funydx = $rec['index'];
                    } else {
                        $funydx = $funidx;
                    }
                    $this->_functions[$funydx] = array(substr($hwid, $dotpos + 1), $rec["logicalName"]);
                }
            }
        }
    }

    // Return the root URL used to access a device (including the trailing slash)
    public function getRootUrl(): string
    {
        return $this->_rootUrl;
    }

    // Return the serial number of the device, as found during discovery
    public function getSerialNumber(): string
    {
        return $this->_serialNumber;
    }

    // Return the logical name of the device, as found during discovery
    public function getLogicalName(): string
    {
        return $this->_logicalName;
    }

    // Return the product name of the device, as found during discovery
    public function getProductName(): string
    {
        return $this->_productName;
    }

    // Return the product Id of the device, as found during discovery
    public function getProductId(): int
    {
        return $this->_productId;
    }

    // Return the beacon state of the device, as found during discovery
    public function getBeacon(): int
    {
        return $this->_beacon;
    }

    public function getLastTimeRef(): float
    {
        return $this->_lastTimeRef;
    }

    public function getLastDuration(): float
    {
        return $this->_lastDuration;
    }

    public function setTimeRef(float $float_timestamp, float $float_duration)
    {
        $this->_lastTimeRef = $float_timestamp;
        $this->_lastDuration = $float_duration;
    }


    public function triggerLogPull(): void
    {
        if ($this->_logCallback == null || $this->_logIsPulling) {
            return;
        }
        $this->_logIsPulling = true;
        $request = "GET /logs.txt?pos=" . $this->_logpos;
        $yreq = YAPI::devRequest($this->_rootUrl, $request);
        if ($yreq->errorType != YAPI::SUCCESS) {
            return;
        }

        /** @noinspection PhpConditionAlreadyCheckedInspection */
        if ($this->_logCallback == null) {
            $this->_logIsPulling = false;
            return;
        }
        $resultStr = YAPI::Ybin2str($yreq->result);
        $pos = strrpos($resultStr, "\n@");
        if ($pos < 0) {
            $this->_logIsPulling = false;
            return;
        }
        $logs = substr($resultStr, 0, $pos);
        if (strlen($logs) > 0) {
            $posStr = substr($resultStr, $pos + 2);
            $this->_logpos = (int)$posStr;
            $module = YModule::FindModule($this->_serialNumber . ".module");
            $lines = explode("\n", rtrim($logs));
            foreach ($lines as $line) {
                call_user_func($this->_logCallback, $module, $line);
            }
        }
        $this->_logIsPulling = false;
    }

    public function setDeviceLogPending(): void
    {
        $this->_logNeedPulling = true;
    }

    public function registerLogCallback(?callable $obj_callback): void
    {
        $this->_logCallback = $obj_callback;
        if ($obj_callback != null) {
            $this->triggerLogPull();
        }
    }

    // Return the hub-specific devYdx of the device, as found during discovery
    public function getDevYdx(): int
    {
        return $this->_devYdx;
    }

    // Return a string that describes the device (serial number, logical name or root URL)
    public function describe(): string
    {
        $res = $this->_rootUrl;
        if ($this->_serialNumber != '') {
            $res = $this->_serialNumber;
            if ($this->_logicalName != '') {
                $res .= ' (' . ($this->_logicalName) . ')';
            }
        }
        return $this->_productName . ' ' . $res;
    }

    /**
     * Prepare to run a request on a device (finish any async device before if needed
     *(called by devRequest)
     * @param YTcpReq $tcpreq
     */
    public function prepRequest(YTcpReq $tcpreq): void
    {
        if (!is_null($this->_ongoingReq)) {
            while (!$this->_ongoingReq->eof()) {
                YAPI::_handleEvents_internal(100);
            }
        }
        $this->_ongoingReq = $tcpreq;
    }

    /**
     * Get the whole REST API string for a device, from cache if possible
     * @return YAPI_YReq
     */
    public function requestAPI(): YAPI_YReq
    {
        if ($this->_cache['_expiration'] > YAPI::GetTickCount()) {
            return new YAPI_YReq($this->_serialNumber . ".module",
                YAPI::SUCCESS, 'no error', $this->_cache['_json'], $this->_cache['_precooked']);
        }
        $req = 'GET /api.json';
        $use_jzon = false;
        if (isset($this->_cache['_precooked']) && $this->_cache['_precooked']['module']['firmwareRelease']) {
            $req .= "?fw=" . urlencode($this->_cache['_precooked']['module']['firmwareRelease']);
            $use_jzon = true;
        }
        $yreq = YAPI::devRequest($this->_rootUrl, $req);
        if ($yreq->errorType != YAPI::SUCCESS) {
            return $yreq;
        }
        $json_req = json_decode(YAPI::Ybin2str($yreq->result), true);
        if (json_last_error() != JSON_ERROR_NONE) {
            return $this->_throw(YAPI::IO_ERROR, 'Request failed, could not parse API result for ' . $this->_rootUrl,
                YAPI::IO_ERROR);
        }
        if ($use_jzon && !key_exists('module', $json_req)) {
            $decoded = YTcpHub::decodeJZON($json_req, $this->_cache['_precooked']);
            $this->_cache['_json'] = json_encode($decoded);
            $this->_cache['_precooked'] = $decoded;
        } else {
            $this->_cache['_json'] = $yreq->result;
            $this->_cache['_precooked'] = $json_req;
        }
        $this->_cacheExpiration = YAPI::GetTickCount() + YAPI::$defaultCacheValidity;

        return new YAPI_YReq($this->_serialNumber . ".module",
            YAPI::SUCCESS, 'no error', $this->_cache['_json'], $this->_cache['_precooked']);
    }



    // Reload a device API (store in cache), and update YAPI function lists accordingly
    // Intended to be called within UpdateDeviceList only
    public function refresh(): int
    {
        $yreq = $this->requestAPI();
        if ($yreq->errorType != YAPI::SUCCESS) {
            return $this->_throw($yreq->errorType, $yreq->errorMsg, $yreq->errorType);
        }
        $loadval = $yreq->obj_result;
        $reindex = false;
        if ($this->_productName == "") {
            // parse module and function names for the first time
            foreach ($loadval as $func => $iface) {
                if ($func == 'module') {
                    $this->_serialNumber = $iface['serialNumber'];
                    $this->_logicalName = $iface['logicalName'];
                    $this->_productName = $iface['productName'];
                    $this->_productId = $iface['productId'];
                    $this->_beacon = $iface['beacon'];
                } elseif ($func == 'services') {
                    $this->_updateFromYP($iface['yellowPages']);
                }
            }
            $reindex = true;
        } else {
            // parse module and refresh names if needed
            foreach ($loadval as $func => $iface) {
                if ($func == 'module') {
                    if ($this->_logicalName != $iface['logicalName']) {
                        $this->_logicalName = $iface['logicalName'];
                        $reindex = true;
                    }
                    $this->_beacon = $iface['beacon'];
                } elseif ($func != 'services') {
                    if (isset($iface[$func]['logicalName'])) {
                        $name = $iface[$func]['logicalName'];
                    } else {
                        $name = $this->_logicalName;
                    }
                    if (isset($iface[$func]['advertisedValue'])) {
                        $pubval = $iface[$func]['advertisedValue'];
                        YAPI::setFunctionValue($this->_serialNumber . '.' . $func, $pubval);
                    }
                    foreach ($this->_functions as $funydx => $fundef) {
                        if ($fundef[0] == $func) {
                            if ($fundef[1] != $name) {
                                $this->_functions[$funydx][1] = $name;
                                $reindex = true;
                            }
                            break;
                        }
                    }
                }
            }
        }
        if ($reindex) {
            YAPI::reindexDevice($this);
        }
        return YAPI::SUCCESS;
    }

    // Force the REST API string in cache to expire immediately
    public function dropCache(): void
    {
        $this->_cache['_expiration'] = 0;
    }

    /**
     * Returns the number of functions (beside the "module" interface) available on the module.
     *
     * @return integer: the number of functions on the module
     *
     * On failure, throws an exception or returns a negative error code.
     */
    public function functionCount(): int
    {
        $funcPos = 0;
        foreach ($this->_functions as $fundef) {
            $funcPos++;
        }
        return $funcPos;
    }

    /**
     * Retrieves the hardware identifier of the <i>n</i>th function on the module.
     *
     * @param int $functionIndex : the index of the function for which the information is desired, starting at
     * 0 for the first function.
     *
     * @return string : a string corresponding to the unambiguous hardware identifier of the requested module function
     *
     * On failure, throws an exception or returns an empty string.
     */
    public function functionId(int $functionIndex): string
    {
        $funcPos = 0;
        foreach ($this->_functions as $fundef) {
            if ($functionIndex == $funcPos) {
                return $fundef[0];
            }
            $funcPos++;
        }
        return '';
    }

    public function functionBaseType(int $functionIndex): string
    {
        $fid = $this->functionId($functionIndex);
        if ($fid != '') {
            $ftype = YAPI::getFunctionBaseType($this->_serialNumber . '.' . $fid);
            foreach (YAPI::$BASETYPES as $name => $type) {
                if ($ftype === $type) {
                    return $name;
                }
            }
        }
        return 'Function';
    }

    public function functionType(int $functionIndex): string
    {
        $fid = $this->functionId($functionIndex);
        if ($fid != '') {
            for ($i = strlen($fid); $i > 0; $i--) {
                if ($fid[$i - 1] > '9') {
                    break;
                }
            }
            return strtoupper($fid[0]) . substr($fid, 1, $i - 1);
        }
        return '';
    }

    /**
     * Retrieves the logical name of the <i>n</i>th function on the module.
     *
     * @param $functionIndex : the index of the function for which the information is desired, starting at
     * 0 for the first function.
     *
     * @return string:  a string corresponding to the logical name of the requested module function
     *
     * On failure, throws an exception or returns an empty string.
     */
    public function functionName(int $functionIndex): string
    {
        $funcPos = 0;
        foreach ($this->_functions as $fundef) {
            if ($functionIndex == $funcPos) {
                return $fundef[1];
            }
            $funcPos++;
        }
        return '';
    }

    /**
     * Retrieves the advertised value of the <i>n</i>th function on the module.
     *
     * @param int functionIndex : the index of the function for which the information is desired, starting at
     * 0 for the first function.
     *
     * @return string : a short string (up to 6 characters) corresponding to the advertised value of the requested
     * module function
     *
     * On failure, throws an exception or returns an empty string.
     */
    public function functionValue(int $functionIndex): string
    {
        $fid = $this->functionId($functionIndex);
        if ($fid != '') {
            return YAPI::getFunctionValue($this->_serialNumber . '.' . $fid);
        }
        return '';
    }

    /**
     * Retrieves the hardware identifier of a function given its funydx (internal function identifier index)
     *
     * @param integer $funYdx : the internal function identifier index
     *
     * @return string : a string corresponding to the unambiguous hardware identifier of the requested module function
     *
     * On failure, throws an exception or returns an empty string.
     */
    public function functionIdByFunYdx(int $funYdx): string
    {
        if (isset($this->_functions[$funYdx])) {
            return $this->_functions[$funYdx][0];
        }
        return '';
    }
}

//^^^^ YDevice.php

//--- (generated code: YAPIContext definitions)
//--- (end of generated code: YAPIContext definitions)


//--- (generated code: YAPIContext declaration)
//vvvv YAPIContext.php

/**
 * YAPIContext Class: Yoctopuce I/O context configuration.
 *
 *
 */
class YAPIContext
{
    //--- (end of generated code: YAPIContext declaration)

    public float $_deviceListValidityMs = 10000;                        // ulong
    public int $_networkTimeoutMs = YAPI_BLOCKING_REQUEST_TIMEOUT;
    public int $_sslCertOptions = 0;
    public string $_sslCertPath = '';
    //--- (generated code: YAPIContext attributes)
    protected float $_defaultCacheValidity = 5;                            // ulong

    //--- (end of generated code: YAPIContext attributes)
    private array $_yhub_cache = [];

    function __construct()
    {
        //--- (generated code: YAPIContext constructor)
        //--- (end of generated code: YAPIContext constructor)
    }

    private function GetYAPISharedLibraryPath_internal()
    {
        return "";
    }

    private function AddUdevRule_internal(bool $force): string
    {
        return "error: Not supported in PHP";
    }


    /**
     * Download the TLS/SSL certificate from the hub. This function allows to download a TLS/SSL certificate to add it
     * to the list of trusted certificates using the AddTrustedCertificates method.
     *
     * @param string $url : the root URL of the VirtualHub V2 or HTTP server.
     * @param float $mstimeout : the number of milliseconds available to download the certificate.
     *
     * @return string  a string containing the certificate. In case of error, returns a string starting with "error:".
     */
    private function DownloadHostCertificate_internal(string $url, float $mstimeout): string
    {
        $contextOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'allow_self_signed' => true,
                'verify_peer_name' => false,
                'capture_peer_cert_chain' => true
            )
        );
        $url_detail = YAPI::_parseRegisteredURL($url);

        $baseurl = 'tls://' . $url_detail['host'] . ':' . $url_detail['port'] . $url_detail['subdomain'];

        $sslContext = @stream_context_create($contextOptions);
        $resource = @stream_socket_client($baseurl, $errno, $errstr, 10, STREAM_CLIENT_CONNECT, $sslContext);
        if ($resource) {
            $params = stream_context_get_params($resource);
            $ca = "";
            foreach ($params["options"]["ssl"]["peer_certificate_chain"] as $cert) {
                openssl_x509_export($cert, $output);
                $ca .= $output;
            }
            return $ca;
        }
        return "";
    }

    private function AddTrustedCertificates_internal(string $certificate): string
    {
        return "error:AddTrustedCertificates is not supported in PHP";
    }


    //--- (generated code: YAPIContext implementation)

    /**
     * Modifies the delay between each forced enumeration of the used YoctoHubs.
     * By default, the library performs a full enumeration every 10 seconds.
     * To reduce network traffic, you can increase this delay.
     * It's particularly useful when a YoctoHub is connected to the GSM network
     * where traffic is billed. This parameter doesn't impact modules connected by USB,
     * nor the working of module arrival/removal callbacks.
     * Note: you must call this function after yInitAPI.
     *
     * @param int $deviceListValidity : nubmer of seconds between each enumeration.
     * @noreturn
     */
    public function SetDeviceListValidity(int $deviceListValidity): void
    {
        $this->SetDeviceListValidity_internal($deviceListValidity);
    }

    //cannot be generated for PHP:
    //private function SetDeviceListValidity_internal(int $deviceListValidity)

    /**
     * Returns the delay between each forced enumeration of the used YoctoHubs.
     * Note: you must call this function after yInitAPI.
     *
     * @return int  the number of seconds between each enumeration.
     */
    public function GetDeviceListValidity(): int
    {
        return $this->GetDeviceListValidity_internal();
    }

    //cannot be generated for PHP:
    //private function GetDeviceListValidity_internal()

    /**
     * Returns the path to the dynamic YAPI library. This function is useful for debugging problems loading the
     * dynamic library YAPI:: This function is supported by the C#, Python and VB languages. The other
     * libraries return an
     * empty string.
     *
     * @return string  a string containing the path of the YAPI dynamic library.
     */
    public function GetYAPISharedLibraryPath(): string
    {
        return $this->GetYAPISharedLibraryPath_internal();
    }

    //cannot be generated for PHP:
    //private function GetYAPISharedLibraryPath_internal()

    /**
     * Adds a UDEV rule which authorizes all users to access Yoctopuce modules
     * connected to the USB ports. This function works only under Linux. The process that
     * calls this method must have root privileges because this method changes the Linux configuration.
     *
     * @param boolean $force : if true, overwrites any existing rule.
     *
     * @return string  an empty string if the rule has been added.
     *
     * On failure, returns a string that starts with "error:".
     */
    public function AddUdevRule(bool $force): string
    {
        return $this->AddUdevRule_internal($force);
    }

    //cannot be generated for PHP:
    //private function AddUdevRule_internal(bool $force)

    /**
     * Download the TLS/SSL certificate from the hub. This function allows to download a TLS/SSL certificate to add it
     * to the list of trusted certificates using the AddTrustedCertificates method.
     *
     * @param string $url : the root URL of the VirtualHub V2 or HTTP server.
     * @param float $mstimeout : the number of milliseconds available to download the certificate.
     *
     * @return string  a string containing the certificate. In case of error, returns a string starting with "error:".
     */
    public function DownloadHostCertificate(string $url, float $mstimeout): string
    {
        return $this->DownloadHostCertificate_internal($url, $mstimeout);
    }

    //cannot be generated for PHP:
    //private function DownloadHostCertificate_internal(string $url, float $mstimeout)

    /**
     * Adds a TLS/SSL certificate to the list of trusted certificates. By default, the library
     * library will reject TLS/SSL connections to servers whose certificate is not known. This function
     * function allows to add a list of known certificates. It is also possible to disable the verification
     * using the SetNetworkSecurityOptions method.
     *
     * @param string $certificate : a string containing one or more certificates.
     *
     * @return string  an empty string if the certificate has been added correctly.
     *         In case of error, returns a string starting with "error:".
     */
    public function AddTrustedCertificates(string $certificate): string
    {
        return $this->AddTrustedCertificates_internal($certificate);
    }

    //cannot be generated for PHP:
    //private function AddTrustedCertificates_internal(string $certificate)

    /**
     * Set the path of Certificate Authority file on local filesystem. This method takes as a parameter
     * the path of a file containing all certificates in PEM format.
     * For technical reasons, only one file can be specified. So if you need to connect to several Hubs
     * instances with self-signed certificates, you'll need to use
     * a single file containing all the certificates end-to-end. Passing a empty string will restore the
     * default settings. This option is only supported by PHP library.
     *
     * @param string $certificatePath : the path of the file containing all certificates in PEM format.
     *
     * @return string  an empty string if the certificate has been added correctly.
     *         In case of error, returns a string starting with "error:".
     */
    public function SetTrustedCertificatesList(string $certificatePath): string
    {
        return $this->SetTrustedCertificatesList_internal($certificatePath);
    }

    //cannot be generated for PHP:
    //private function SetTrustedCertificatesList_internal(string $certificatePath)

    /**
     * Enables or disables certain TLS/SSL certificate checks.
     *
     * @param int $opts : The options are YAPI::NO_TRUSTED_CA_CHECK,
     *         YAPI::NO_EXPIRATION_CHECK, YAPI::NO_HOSTNAME_CHECK.
     *
     * @return string  an empty string if the options are taken into account.
     *         On error, returns a string beginning with "error:".
     */
    public function SetNetworkSecurityOptions(int $opts): string
    {
        return $this->SetNetworkSecurityOptions_internal($opts);
    }

    //cannot be generated for PHP:
    //private function SetNetworkSecurityOptions_internal(int $opts)

    /**
     * Modifies the network connection delay for yRegisterHub() and yUpdateDeviceList().
     * This delay impacts only the YoctoHubs and VirtualHub
     * which are accessible through the network. By default, this delay is of 20000 milliseconds,
     * but depending on your network you may want to change this delay,
     * gor example if your network infrastructure is based on a GSM connection.
     *
     * @param int $networkMsTimeout : the network connection delay in milliseconds.
     * @noreturn
     */
    public function SetNetworkTimeout(int $networkMsTimeout): void
    {
        $this->SetNetworkTimeout_internal($networkMsTimeout);
    }

    //cannot be generated for PHP:
    //private function SetNetworkTimeout_internal(int $networkMsTimeout)

    /**
     * Returns the network connection delay for yRegisterHub() and yUpdateDeviceList().
     * This delay impacts only the YoctoHubs and VirtualHub
     * which are accessible through the network. By default, this delay is of 20000 milliseconds,
     * but depending on your network you may want to change this delay,
     * for example if your network infrastructure is based on a GSM connection.
     *
     * @return int  the network connection delay in milliseconds.
     */
    public function GetNetworkTimeout(): int
    {
        return $this->GetNetworkTimeout_internal();
    }

    //cannot be generated for PHP:
    //private function GetNetworkTimeout_internal()

    /**
     * Change the validity period of the data loaded by the library.
     * By default, when accessing a module, all the attributes of the
     * module functions are automatically kept in cache for the standard
     * duration (5 ms). This method can be used to change this standard duration,
     * for example in order to reduce network or USB traffic. This parameter
     * does not affect value change callbacks
     * Note: This function must be called after yInitAPI.
     *
     * @param float $cacheValidityMs : an integer corresponding to the validity attributed to the
     *         loaded function parameters, in milliseconds.
     * @noreturn
     */
    public function SetCacheValidity(float $cacheValidityMs): void
    {
        $this->_defaultCacheValidity = $cacheValidityMs;
    }

    /**
     * Returns the validity period of the data loaded by the library.
     * This method returns the cache validity of all attributes
     * module functions.
     * Note: This function must be called after yInitAPI .
     *
     * @return float  an integer corresponding to the validity attributed to the
     *         loaded function parameters, in milliseconds
     */
    public function GetCacheValidity(): float
    {
        return $this->_defaultCacheValidity;
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function nextHubInUseInternal(int $hubref): ?YHub
    {
        return $this->nextHubInUseInternal_internal($hubref);
    }

    //cannot be generated for PHP:
    //private function nextHubInUseInternal_internal(int $hubref)

    /**
     * @throws YAPI_Exception on error
     */
    public function getYHubObj(int $hubref): ?YHub
    {
        // $obj                    is a YHub;
        $obj = $this->_findYHubFromCache($hubref);
        if ($obj == null) {
            $obj = new YHub($this, $hubref);
            $this->_addYHubToCache($hubref, $obj);
        }
        return $obj;
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function findYHubFromID(string $id): ?YHub
    {
        // $rhub                   is a YHub;
        $rhub = $this->nextHubInUseInternal(-1);
        while (!($rhub == null)) {
            if ($rhub->get_serialNumber() == $id) {
                return $rhub;
            }
            if ($rhub->get_registeredUrl() == $id) {
                return $rhub;
            }
            $rhub = $rhub->nextHubInUse();
        }
        return $rhub;
    }

    //--- (end of generated code: YAPIContext implementation)

    private function nextHubInUseInternal_internal(int $hubref): ?YHub
    {


        $nextref = YAPI::nextHubRef($hubref);
        if ($nextref >= 0) {
            return $this->getYHubObj($nextref);
        }
        return null;
    }

    private function _findYHubFromCache(int $hubref): ?YHub
    {
        if (array_key_exists($hubref, $this->_yhub_cache)) {
            return $this->_yhub_cache[$hubref];
        }
        return null;
    }

    private function _addYHubToCache(int $hubref, YHub $obj): void
    {
        $this->_yhub_cache[$hubref] = $obj;
    }

    public function SetDeviceListValidity_internal(float $deviceListValidity): void
    {
        $this->_deviceListValidityMs = $deviceListValidity * 1000;
    }

    public function GetDeviceListValidity_internal(): int
    {
        return intval($this->_deviceListValidityMs / 1000);
    }


    public function SetNetworkTimeout_internal(float $networkMsTimeout): void
    {
        $this->_networkTimeoutMs = (int)$networkMsTimeout;
    }

    public function SetTrustedCertificatesList_internal(string $certificatePath): string
    {
        if ($certificatePath == '' || file_exists($certificatePath)) {
            $this->_sslCertPath = $certificatePath;
            return "";
        } else {
            return "error: Invalid path";
        }
    }

    private function SetNetworkSecurityOptions_internal(int $options): string
    {
        $this->_sslCertOptions = $options;
        return "";
    }

    public function GetNetworkTimeout_internal(): int
    {
        return $this->_networkTimeoutMs;
    }

    public function getTcpHubFromRef(int $hubref): ?YTcpHub
    {
        return YAPI::getTcpHubFromRef($hubref);
    }


}

//^^^^ YAPIContext.php

//vvvv YAPI.php
//
// YAPI Context
//
// This class provides the high-level entry points to access Functions, stores
// an indexes instances of the Device object and of FunctionType collections.
//

const NOTIFY_NETPKT_NAME = '0';
const NOTIFY_NETPKT_CHILD = '2';
const NOTIFY_NETPKT_FUNCNAME = '4';
const NOTIFY_NETPKT_FUNCVAL = '5';
const NOTIFY_NETPKT_LOG = '7';
const NOTIFY_NETPKT_FUNCNAMEYDX = '8';
const NOTIFY_NETPKT_CONFCHGYDX = 's';
const NOTIFY_NETPKT_FLUSHV2YDX = 't';
const NOTIFY_NETPKT_FUNCV2YDX = 'u';
const NOTIFY_NETPKT_TIMEV2YDX = 'v';
const NOTIFY_NETPKT_DEVLOGYDX = 'w';
const NOTIFY_NETPKT_TIMEVALYDX = 'x';
const NOTIFY_NETPKT_FUNCVALYDX = 'y';
const NOTIFY_NETPKT_TIMEAVGYDX = 'z';
const NOTIFY_NETPKT_NOT_SYNC = '@';
const NOTIFY_NETPKT_STOP = 10; // =\n

const NOTIFY_V2_LEGACY = 0;       // unused (reserved for compatibility with legacy notifications)
const NOTIFY_V2_6RAWBYTES = 1;    // largest type: data is always 6 bytes
const NOTIFY_V2_TYPEDDATA = 2;    // other types: first data byte holds the decoding format
const NOTIFY_V2_FLUSHGROUP = 3;   // no data associated

const PUBVAL_LEGACY = 0;   // 0-6 ASCII characters (normally sent as YSTREAM_NOTICE)
const PUBVAL_1RAWBYTE = 1;   // 1 raw byte  (=2 characters)
const PUBVAL_2RAWBYTES = 2;   // 2 raw bytes (=4 characters)
const PUBVAL_3RAWBYTES = 3;   // 3 raw bytes (=6 characters)
const PUBVAL_4RAWBYTES = 4;   // 4 raw bytes (=8 characters)
const PUBVAL_5RAWBYTES = 5;   // 5 raw bytes (=10 characters)
const PUBVAL_6RAWBYTES = 6;   // 6 hex bytes (=12 characters) (sent as V2_6RAWBYTES)
const PUBVAL_C_LONG = 7;   // 32-bit C signed integer
const PUBVAL_C_FLOAT = 8;   // 32-bit C float
const PUBVAL_YOCTO_FLOAT_E3 = 9;   // 32-bit Yocto fixed-point format (e-3)
const PUBVAL_YOCTO_FLOAT_E6 = 10;   // 32-bit Yocto fixed-point format (e-6)

// Calibration types
const YOCTO_CALIB_TYPE_OFS = 30;

// Maximum device request timeout
const YAPI_BLOCKING_REQUEST_TIMEOUT = 20000;
const YIO_DEFAULT_TCP_TIMEOUT = 20000;
const YIO_1_MINUTE_TCP_TIMEOUT = 60000;
const YIO_10_MINUTES_TCP_TIMEOUT = 600000;

const YOCTO_PUBVAL_LEN = 16;
const YOCTO_PUBVAL_SIZE = 6;
const YOCTO_SERIAL_LEN = 20;
const YOCTO_BASE_SERIAL_LEN = 8;


class YAPI
{

    const INVALID_STRING = "!INVALID!";
    const INVALID_INT = 0x7fffffff;
    const INVALID_UINT = -1;
    const INVALID_DOUBLE = -66666666.66666666;
    const INVALID_LONG = 0x7fffffffffffffff;
    const HASH_BUF_SIZE = 28;
    const MIN_DOUBLE = -INF;
    const MAX_DOUBLE = INF;

//--- (generated code: YFunction return codes)
    const SUCCESS               = 0;       // everything worked all right
    const NOT_INITIALIZED       = -1;      // call yInitAPI() first !
    const INVALID_ARGUMENT      = -2;      // one of the arguments passed to the function is invalid
    const NOT_SUPPORTED         = -3;      // the operation attempted is (currently) not supported
    const DEVICE_NOT_FOUND      = -4;      // the requested device is not reachable
    const VERSION_MISMATCH      = -5;      // the device firmware is incompatible with this API version
    const DEVICE_BUSY           = -6;      // the device is busy with another task and cannot answer
    const TIMEOUT               = -7;      // the device took too long to provide an answer
    const IO_ERROR              = -8;      // there was an I/O problem while talking to the device
    const NO_MORE_DATA          = -9;      // there is no more data to read from
    const EXHAUSTED             = -10;     // you have run out of a limited resource, check the documentation
    const DOUBLE_ACCES          = -11;     // you have two process that try to access to the same device
    const UNAUTHORIZED          = -12;     // unauthorized access to password-protected device
    const RTC_NOT_READY         = -13;     // real-time clock has not been initialized (or time was lost)
    const FILE_NOT_FOUND        = -14;     // the file is not found
    const SSL_ERROR             = -15;     // Error reported by mbedSSL
    const RFID_SOFT_ERROR       = -16;     // Recoverable error with RFID tag (eg. tag out of reach), check YRfidStatus for details
    const RFID_HARD_ERROR       = -17;     // Serious RFID error (eg. write-protected, out-of-boundary), check YRfidStatus for details
    const BUFFER_TOO_SMALL      = -18;     // The buffer provided is too small
    const DNS_ERROR             = -19;     // Error during name resolutions (invalid hostname or dns communication error)
    const SSL_UNK_CERT          = -20;     // The certificate is not correctly signed by the trusted CA
    const UNCONFIGURED          = -21;     // Remote hub is not yet configured
    // TLS / SSL definitions
    const NO_TRUSTED_CA_CHECK   = 1;       // Disables certificate checking
    const NO_EXPIRATION_CHECK   = 2;       // Disables certificate expiration date checking
    const NO_HOSTNAME_CHECK     = 4;       // Disable hostname checking
    const LEGACY                = 8;       // Allow non-secure connection (similar to v1.10)
//--- (end of generated code: YFunction return codes)

    // yInitAPI constants (not really useful in JavaScript)
    const DETECT_NONE = 0;
    const DETECT_USB = 1;
    const DETECT_NET = 2;
    const DETECT_ALL = 3;

    const DefaultEncoding = "ISO-8859-1";

    // Abstract function BaseTypes
    public static array $BASETYPES = array(
        'Function' => 0,
        'Sensor' => 1
    );

    /**
     * @var YTcpHub[]
     */
    private static ?array $_hubs = null;           // array of root urls
    /**
     * @var YDevice[]
     */
    protected static array $_devs = [];           // hash table of devices, by serial number
    protected static array $_snByUrl = [];        // serial number for each device, by URL
    protected static array $_snByName = [];       // serial number for each device, by name
    /**
     * @var YFunctionType[]
     */
    protected static array $_fnByType;       // functions by type
    protected static int $_lastErrorType;
    protected static string $_lastErrorMsg;
    protected static bool $_firstArrival;
    protected static array $_pendingCallbacks;
    protected static mixed $_arrivalCallback;
    protected static mixed $_namechgCallback;
    protected static mixed $_removalCallback;
    protected static array $_data_events;
    /** @var  YTcpReq[] */
    protected static array $_pendingRequests;
    protected static array $_beacons;
    protected static array $_calibHandlers;
    protected static array $_decExp;

    public static ?string $_jzonCacheDir;

    public static YAPIContext $_yapiContext;

    // PUBLIC GLOBAL SETTINGS

    // Default cache validity (in [ms]) before reloading data from device. This saves a lots of trafic.
    // Note that a value under 2 ms makes little sense since a USB bus itself has a 2ms roundtrip period
    public static float $defaultCacheValidity = 5;

    // Switch to turn off exceptions and use return codes instead, for source-code compatibility
    // with languages without exception support like C
    public static bool $exceptionsDisabled = false;  // set to true if you want error codes instead of exceptions

    public static function _init(): void
    {
        // private
        self::$_hubs = array();
        self::$_devs = array();
        self::$_snByUrl = array();
        self::$_snByName = array();
        self::$_fnByType = array();
        self::$_lastErrorType = YAPI::SUCCESS;
        self::$_lastErrorMsg = 'no error';
        self::$_firstArrival = true;
        self::$_pendingCallbacks = array();
        self::$_arrivalCallback = null;
        self::$_namechgCallback = null;
        self::$_removalCallback = null;
        self::$_data_events = array();
        self::$_pendingRequests = array();
        self::$_beacons = array();
        self::$_jzonCacheDir = null;
        self::$_yapiContext = new YAPIContext();

        self::$_decExp = array(
            1.0e-6,
            1.0e-5,
            1.0e-4,
            1.0e-3,
            1.0e-2,
            1.0e-1,
            1.0,
            1.0e1,
            1.0e2,
            1.0e3,
            1.0e4,
            1.0e5,
            1.0e6,
            1.0e7,
            1.0e8,
            1.0e9
        );
        self::$_fnByType['Module'] = new YFunctionType('Module');
        for ($yHdlrIdx = 1; $yHdlrIdx <= 20; $yHdlrIdx++) {
            YAPI::RegisterCalibrationHandler($yHdlrIdx, 'YAPI::LinearCalibrationHandler');
        }
        YAPI::RegisterCalibrationHandler(YOCTO_CALIB_TYPE_OFS, 'YAPI::LinearCalibrationHandler');
        register_shutdown_function('YAPI::flushConnections');
    }

    // numeric strpos helper

    public static function Ystrpos(string $haystack, string $needle): int
    {
        $res = strpos($haystack, $needle);
        if ($res === false) {
            $res = -1;
        }
        return $res;
    }


    public static function Ybin2str(string $bin): string
    {
        return iconv(YAPI::DefaultEncoding, 'utf-8', $bin);
    }

    public static function Ystr2bin(string $str): string
    {
        return iconv('utf-8', YAPI::DefaultEncoding, $str);
    }

    /**
     * Throw an exception, keeping track of it in the object itself
     * @param int $int_errType
     * @param string $str_errMsg
     * @param mixed $obj_retVal
     * @return mixed
     * @throws YAPI_Exception
     */
    protected static function _throw(int $int_errType, string $str_errMsg, mixed $obj_retVal): mixed
    {
        self::$_lastErrorType = $int_errType;
        self::$_lastErrorMsg = $str_errMsg;

        if (self::$exceptionsDisabled) {
            return $obj_retVal;
        }
        // throw an exception
        throw new YAPI_Exception($str_errMsg, $int_errType);
    }

    // Update the list of known devices internally

    /**
     * @throws YAPI_Exception
     */
    public static function _updateDeviceList_internal(bool $bool_forceupdate, bool $bool_invokecallbacks): YAPI_YReq
    {
        if (self::$_firstArrival && $bool_invokecallbacks && !is_null(self::$_arrivalCallback)) {
            $bool_forceupdate = true;
        }
        $now = self::GetTickCount();
        if ($bool_forceupdate) {
            foreach (self::$_hubs as $hub) {
                $hub->devListExpires = $now;
            }
        }

        // Prepare to scan all expired hubs
        $hubs = array();
        foreach (self::$_hubs as $hub) {
            if (!$hub->isEnable()) {
                continue;
            }
            if ($hub->devListExpires <= $now) {
                $tcpreq = new YTcpReq($hub, 'GET /api.json', false, '', $hub->get_networkTimeout());
                self::$_pendingRequests[] = $tcpreq;
                $hubs[] = $hub;
                $hub->devListReq = $tcpreq;
                $hub->missing = array();
            }
        }

        // assume all device as unpluged, unless proved wrong
        foreach (self::$_devs as $serial => $dev) {
            $rooturl = $dev->getRootUrl();
            foreach ($hubs as $hub) {
                if (!$hub->isEnable()) {
                    continue;
                }
                $huburl = $hub->getRooturl();
                if (substr($rooturl, 0, strlen($huburl)) == $huburl) {
                    $hub->missing[$serial] = true;
                }
            }
        }

        // Wait until all hubs are complete, and process replies as they come
        $timeout = self::GetTickCount() + YAPI::$_yapiContext->_networkTimeoutMs;
        while (self::GetTickCount() < $timeout) {
            self::_handleEvents_internal(100);
            $alldone = true;
            foreach ($hubs as $hub) {
                /** @var YTcpHub $hub */
                if (!$hub->isEnable()) {
                    continue;
                }
                $req = $hub->devListReq;
                if (!$req->eof()) {
                    $alldone = false;
                    continue;
                }
                if ($req->errorType != YAPI::SUCCESS) {
                    // report problems later
                    continue;
                }
                $loadval = json_decode(YAPI::Ybin2str($req->reply), true);
                if (!$loadval) {
                    $req->errorType = YAPI::IO_ERROR;
                    continue;
                }
                if (!isset($loadval['services']) || !isset($loadval['services']['whitePages'])) {
                    $req->errorType = YAPI::INVALID_ARGUMENT;
                    continue;
                }
                if (isset($loadval['network']) && isset($loadval['network']['adminPassword'])) {
                    $hub->writeProtected = ($loadval['network']['adminPassword'] != '');
                }
                $whitePages = $loadval['services']['whitePages'];
                // Reindex all functions from yellow pages
                $refresh = array();
                $yellowPages = $loadval["services"]["yellowPages"];
                foreach ($yellowPages as $classname => $obj_yprecs) {
                    if (!isset(self::$_fnByType[$classname])) {
                        self::$_fnByType[$classname] = new YFunctionType($classname);
                    }
                    $ftype = self::$_fnByType[$classname];
                    foreach ($obj_yprecs as $yprec) {
                        $hwid = $yprec["hardwareId"];
                        $basetype = (isset($yprec["baseType"]) ? $yprec["baseType"] : null);
                        if ($ftype->reindexFunction($hwid, $yprec["logicalName"], $yprec["advertisedValue"], $basetype)) {
                            // logical name discrepency detected, force a refresh from device
                            $serial = substr($hwid, 0, strpos($hwid, '.'));
                            $refresh[$serial] = true;
                        }
                    }
                }
                // Reindex all devices from white pages
                foreach ($whitePages as $devinfo) {
                    $serial = $devinfo['serialNumber'];
                    $rooturl = substr($devinfo['networkUrl'], 0, -3);
                    if ($rooturl[0] == '/') {
                        $rooturl = $hub->getRooturl() . $rooturl;
                    }
                    $currdev = null;
                    if (isset(self::$_devs[$serial])) {
                        $currdev = self::$_devs[$serial];
                        foreach (YFunction::$_ValueCallbackList as $fun) {
                            $hwId = $fun->_getHwId();
                            if (!$hwId) {
                                YAPI::addRefreshEvent($fun);
                            }
                        }
                        if (self::$_firstArrival && !is_null(self::$_arrivalCallback)) {
                            // call callback on first RegisterDeviceArrival call
                            $module = YModule::FindModule($serial . '.module');
                            // force (re)loading the module object with up-to-date information
                            // this will also ensure we have a valid serialNumber in cache on unplug
                            $module->load(YAPI::$defaultCacheValidity);
                            self::$_pendingCallbacks[] = ['event' => '+', 'serial' => $serial, 'module' => $module];
                        }
                    }
                    if (isset($devinfo['index'])) {
                        $devydx = $devinfo['index'];
                        $hub->serialByYdx[$devydx] = $serial;
                    }
                    if (!isset(self::$_devs[$serial])) {
                        // Add new device
                        new YDevice($rooturl, $devinfo, $loadval["services"]["yellowPages"]);
                        if (!is_null(self::$_arrivalCallback)) {
                            $module = YModule::FindModule($serial . ".module");
                            // force (re)loading the module object with up-to-date information
                            // this will also ensure we have a valid serialNumber in cache on unplug
                            $module->load(YAPI::$defaultCacheValidity);
                            self::$_pendingCallbacks[] = ['event' => '+', 'serial' => $serial, 'module' => $module];
                        }
                    } elseif ($currdev->getLogicalName() != $devinfo['logicalName']) {
                        // Reindex device from its own data
                        $currdev->refresh();
                        if (!is_null(self::$_namechgCallback)) {
                            self::$_pendingCallbacks[] = ['event' => '/', 'serial' => $serial, 'module' => YModule::FindModule($serial . ".module")];
                        }
                    } elseif (isset($refresh[$serial]) || $currdev->getRootUrl() != $rooturl ||
                        $currdev->getBeacon() != $devinfo['beacon']) {
                        // Reindex device from its own data in case of discrepency
                        $currdev->refresh();
                    }
                    $hub->missing[$serial] = false;
                }

                // Keep track of all unplugged devices on this hub
                foreach ($hub->missing as $serial => $missing) {
                    if ($missing) {
                        self::_unplugDevice($serial);
                    }
                }

                // enable monitoring for this hub if not yet done
                self::monitorEvents($hub);
                if ($hub->isNotifWorking) {
                    $hub->devListExpires = $now + YAPI::$_yapiContext->_deviceListValidityMs;
                } else {
                    $hub->devListExpires = $now + 500;
                }
            }
            if ($alldone) {
                break;
            }
        }

        // after processing all hubs, invoke pending callbacks if required
        if ($bool_invokecallbacks) {
            $nbevents = sizeof(self::$_pendingCallbacks);
            for ($i = 0; $i < $nbevents; $i++) {
                /** @var array $evt */
                $evt = self::$_pendingCallbacks[$i];
                $serial = $evt['serial'];
                switch (substr($evt['event'], 0, 1)) {
                    case '+':
                        if (!is_null(self::$_arrivalCallback)) {
                            $cb = self::$_arrivalCallback;
                            $cb($evt['module']);
                        }
                        break;
                    case '/':
                        if (!is_null(self::$_namechgCallback)) {
                            $cb = self::$_namechgCallback;
                            $cb($evt['module']);
                        }
                        break;
                    case '-':
                        if (!is_null(self::$_removalCallback)) {
                            $cb = self::$_removalCallback;
                            $cb($evt['module']);
                        }
                        if (isset(self::$_devs[$serial])) {
                            self::forgetDevice(self::$_devs[$serial]);
                        }
                        break;
                }
            }
            self::$_pendingCallbacks = array_slice(self::$_pendingCallbacks, $nbevents);
            if (!is_null(self::$_arrivalCallback) && self::$_firstArrival) {
                self::$_firstArrival = false;
            }
        }

        // report any error seen during scan
        foreach ($hubs as $hub) {
            if (!$hub->isEnable()) {
                continue;
            }
            $req = $hub->devListReq;
            if ($req->errorType != YAPI::SUCCESS) {
                return new YAPI_YReq("", $req->errorType,
                    'Error while scanning ' . $hub->getRooturl() . ': ' . $req->errorMsg,
                    $req->errorType);
            }
        }
        return new YAPI_YReq("", YAPI::SUCCESS, "no error", YAPI::SUCCESS);
    }

    /**
     * @throws YAPI_Exception
     */
    public static function _handleEvents_internal(int $int_maxwait): bool
    {
        $something_done = false;

        // start event monitoring if needed
        foreach (self::$_hubs as $hub) {
            if (!$hub->isEnable()) {
                continue;
            }
            $req = $hub->notifReq;
            if ($req) {
                if ($req->eof()) {
                    //Printf("Event channel at eof, reopen\n");
                    $something_done = true;
                    $hub->notifReq = $req = null;
                    $hub->connectionState = YHub::RECONNECTING;
                    self::monitorEvents($hub);
                }
            } elseif ($hub->retryExpires > 0 && $hub->retryExpires <= self::GetTickCount()) {
                Printf("RetryExpires, calling monitorEvents\n");
                $something_done = true;
                self::monitorEvents($hub);
            }
        }

        // Monitor all pending request for logs
        foreach (self::$_devs as $dev) {
            $dev->triggerLogPull();
        }


        // monitor all pending requests
        $streams = array();
        foreach (self::$_pendingRequests as $req) {
            /** @noinspection PhpConditionCheckedByNextConditionInspection */
            if (is_null($req->skt) || !is_resource($req->skt)) {
                $req->process();
            }
            /** @noinspection PhpConditionCheckedByNextConditionInspection */
            if (!is_null($req->skt) && is_resource($req->skt)) {
                $streams[] = $req->skt;
            }
        }

        if (sizeof($streams) == 0) {
            usleep($int_maxwait * 1000);
            return false;
        }
        $wr = null;
        $ex = null;
        /** @noinspection PhpUnusedLocalVariableInspection */
        if (false === ($select_res = stream_select($streams, $wr, $ex, 0, $int_maxwait * 1000))) {
            Printf("stream_select error\n");
            return false;
        }
        for ($idx = 0; $idx < sizeof(self::$_pendingRequests); $idx++) {
            $req = self::$_pendingRequests[$idx];
            $hub = $req->hub;
            // generic request processing
            $req->process();
            if ($req->eof()) {
                array_splice(self::$_pendingRequests, $idx, 1);
            }
            // handle notification channel
            if ($req === $hub->notifReq) {
                $linepos = strpos($req->reply, "\n");
                while ($linepos !== false) {
                    $ev = trim(substr($req->reply, 0, $linepos));
                    $req->reply = substr($req->reply, $linepos + 1);
                    $linepos = strpos($req->reply, "\n");
                    $firstCode = substr($ev, 0, 1);
                    if (strlen($ev) == 0) {
                        // empty line to send ping
                        continue;
                    }
                    if (strlen($ev) >= 3 && $firstCode >= NOTIFY_NETPKT_CONFCHGYDX && $firstCode <= NOTIFY_NETPKT_TIMEAVGYDX) {
                        // function value ydx (tiny notification)
                        $hub->isNotifWorking = true;
                        $hub->retryDelay = 15;
                        if ($hub->notifPos >= 0) {
                            $hub->notifPos += strlen($ev) + 1;
                        }
                        $devydx = ord($ev[1]) - 65; // from 'A'
                        $funydx = ord($ev[2]) - 48; // from '0'
                        if ($funydx >= 64) { // high bit of devydx is on second character
                            $funydx -= 64;
                            $devydx += 128;
                        }
                        if (isset($hub->serialByYdx[$devydx])) {
                            $serial = $hub->serialByYdx[$devydx];
                            if (isset(self::$_devs[$serial])) {
                                $funcid = ($funydx == 0xf ? 'time' : self::$_devs[$serial]->functionIdByFunYdx($funydx));
                                if ($funcid != "") {
                                    $value = substr($ev, 3);
                                    switch ($firstCode) {
                                        case NOTIFY_NETPKT_FUNCVALYDX:
                                            // function value ydx (tiny notification)
                                            $value = explode("\0", $value);
                                            $value = $value[0];
                                            YAPI::setFunctionValue($serial . '.' . $funcid, $value);
                                            break;
                                        case NOTIFY_NETPKT_DEVLOGYDX:
                                            // log notification
                                            $dev = self::$_devs[$serial];
                                            $dev->setDeviceLogPending();
                                            break;
                                        case NOTIFY_NETPKT_CONFCHGYDX:
                                            // configuration change notification
                                            YAPI::setConfChange($serial);
                                            break;
                                        case NOTIFY_NETPKT_TIMEVALYDX:
                                        case NOTIFY_NETPKT_TIMEAVGYDX:
                                        case NOTIFY_NETPKT_TIMEV2YDX:
                                            // timed value report
                                            $arr = array($firstCode == 'x' ? 0 : ($firstCode == 'z' ? 1 : 2));
                                            for ($pos = 0; $pos < strlen($value); $pos += 2) {
                                                $arr[] = hexdec(substr($value, $pos, 2));
                                            }
                                            $dev = self::$_devs[$serial];
                                            if ($funcid == 'time') {
                                                $time = $arr[1] + 0x100 * $arr[2] + 0x10000 * $arr[3] + 0x1000000 * $arr[4];
                                                $ms = $arr[5] * 4;
                                                if (sizeof($arr) >= 7) {
                                                    $ms += $arr[6] >> 6;
                                                    $duration_ms = $arr[7];
                                                    $duration_ms += ($arr[6] & 0xf) * 0x100;
                                                    if ($arr[6] & 0x10) {
                                                        $duration = $duration_ms;
                                                    } else {
                                                        $duration = $duration_ms / 1000.0;
                                                    }
                                                } else {
                                                    $duration = 0.0;
                                                }
                                                $dev->setTimeRef($time + $ms / 1000.0, $duration);
                                            } else {
                                                YAPI::setTimedReport($serial . '.' . $funcid, $dev->getLastTimeRef(), $dev->getLastDuration(), $arr);
                                            }
                                            break;
                                        case NOTIFY_NETPKT_FUNCV2YDX:
                                            $rawval = YAPI::decodeNetFuncValV2($value);
                                            if ($rawval != null) {
                                                $decodedval = YAPI::decodePubVal($rawval[0], $rawval, 1, 6);
                                                YAPI::setFunctionValue($serial . '.' . $funcid, $decodedval);
                                            }
                                            break;
                                        case NOTIFY_NETPKT_FLUSHV2YDX:
                                            // To be implemented later
                                        default:
                                            break;
                                    }
                                }
                            }
                        }
                    } elseif (strlen($ev) > 5 && substr($ev, 0, 4) == 'YN01') {
                        $hub->isNotifWorking = true;
                        $hub->connectionState = YHub::CONNECTED;
                        $hub->retryDelay = 15;
                        if ($hub->notifPos >= 0) {
                            $hub->notifPos += strlen($ev) + 1;
                        }
                        $notype = substr($ev, 4, 1);
                        if ($notype == NOTIFY_NETPKT_NOT_SYNC) {
                            $hub->notifPos = intVal(substr($ev, 5));
                        } else {
                            switch (intVal($notype)) {
                                /** @noinspection PhpMissingBreakStatementInspection */
                                case 0: // device name change, or arrival
                                    $parts = explode(',', substr($ev, 5));
                                    YAPI::setBeaconChange($parts[0], intval($parts[2]));
                                    $hub->devListExpires = 0;
                                    break;
                                case 2: // device plug/unplug
                                    $parts = explode(',', substr($ev, 5));
                                    if ($parts[2] == '0') {
                                        YAPI::_unplugDevice($parts[1]);
                                    }
                                // no break on purpose
                                case 4: // function name change
                                case 8: // function name change (ydx)
                                    $hub->devListExpires = 0;
                                    break;
                                case 5: // function value (long notification)
                                    $parts = explode(',', substr($ev, 5));
                                    $value = explode("\0", $parts[2]);
                                    YAPI::setFunctionValue($parts[0] . '.' . $parts[1], $value[0]);
                                    break;
                            }
                        }
                    } else {
                        // oops, bad notification ? be safe until a good one comes
                        $hub->isNotifWorking = false;
                        $hub->devListExpires = 0;
                        $hub->notifPos = -1;
                    }
                }
            }
        }

        return $something_done;
    }

    public static function flushConnections(): void
    {
        foreach (self::$_pendingRequests as $req) {
            if ($req->async) {
                while (!$req->eof()) {
                    try {
                        self::_handleEvents_internal(200);
                    } catch (YAPI_Exception $ignore) {
                    }
                }
            }
        }
    }

    public static function monitorEvents(YTcpHub $hub): void
    {
        if (!is_null($hub->notifReq)) {
            return;
        }
        if ($hub->retryExpires > self::GetTickCount()) {
            return;
        }
        if ($hub->isCachedHub()) {
            return;
        }

        $url = $hub->notifurl . '?len=0';
        if ($hub->notifPos >= 0) {
            $url .= '&abs=' . $hub->notifPos;
        }
        $req = new YTcpReq($hub, 'GET /' . $url, false);
        $errmsg = '';
        if ($req->process($errmsg) != YAPI::SUCCESS) {
            if ($hub->retryDelay == 0) {
                $hub->retryDelay = 15;
            } elseif ($hub->retryDelay < 15000) {
                $hub->retryDelay = 2 * $hub->retryDelay;
            }
            $hub->retryExpires = self::GetTickCount() + $hub->retryDelay;
            return;
        }
        self::$_pendingRequests[] = $req;
        $hub->notifReq = $req;
    }

    // Convert Yoctopuce 16-bit decimal floats to standard double-precision floats
    //
    public static function _decimalToDouble(int $val): float
    {
        $negate = false;
        $mantis = $val & 2047;
        if ($mantis == 0) {
            return 0.0;
        }
        if ($val > 32767) {
            $negate = true;
            $val = 65536 - $val;
        } elseif ($val < 0) {
            $negate = true;
            $val = -$val;
        }
        $decexp = self::$_decExp[$val >> 11];
        if ($decexp >= 1.0) {
            $res = ($mantis) * $decexp;
        } else {
            $res = ($mantis) / round(1.0 / $decexp);
        }

        return ($negate ? -$res : $res);
    }

    // Convert standard double-precision floats to Yoctopuce 16-bit decimal floats
    //
    public static function _doubleToDecimal(float $val): float
    {
        $negate = false;

        if ($val == 0.0) {
            return 0;
        }
        if ($val < 0) {
            $negate = true;
            $val = -$val;
        }
        $comp = $val / 1999.0;
        $decpow = 0;
        while ($comp > self::$_decExp[$decpow] && $decpow < 15) {
            $decpow++;
        }
        $mant = $val / self::$_decExp[$decpow];
        if ($decpow == 15 && $mant > 2047.0) {
            $res = (15 << 11) + 2047; // overflow
        } else {
            $res = ($decpow << 11) + round($mant);
        }
        return ($negate ? -$res : $res);
    }

    // Return the calibration handler for a given type
    public static function _getCalibrationHandler(int $calibType): ?callable
    {
        if (!isset(self::$_calibHandlers[strVal($calibType)])) {
            return null;
        }
        return self::$_calibHandlers[strVal($calibType)];
    }

    // Parse an array of u16 encoded in a base64-like string with memory-based compresssion
    public static function _decodeWords(string $data): array
    {
        $datalen = strlen($data);
        $udata = array();
        for ($i = 0; $i < $datalen;) {
            $c = $data[$i];
            if ($c == '*') {
                $val = 0;
                $i++;
            } elseif ($c == 'X') {
                $val = 0xffff;
                $i++;
            } elseif ($c == 'Y') {
                $val = 0x7fff;
                $i++;
            } elseif ($c >= 'a') {
                $srcpos = sizeof($udata) - 1 - (ord($data[$i++]) - 97);
                if ($srcpos < 0) {
                    $val = 0;
                } else {
                    $val = $udata[$srcpos];
                }
            } else {
                if ($i + 2 > $datalen) {
                    return [];
                }
                $val = ord($data[$i++]) - 48;
                $val += (ord($data[$i++]) - 48) << 5;
                if ($data[$i] == 'z') {
                    $data[$i] = '\\';
                }
                $val += (ord($data[$i++]) - 48) << 10;
            }
            $udata[] = $val;
        }
        return $udata;
    }

    // Parse an array of u16 encoded in a base64-like string with memory-based compresssion
    public static function _decodeFloats(string $data): array
    {
        $datalen = strlen($data);
        $idata = array();
        $p = 0;
        while ($p < $datalen) {
            $val = 0;
            $sign = 1;
            $dec = 0;
            $decInc = 0;
            $c = $data[$p++];
            while ($c != '-' && ($c < '0' || $c > '9')) {
                if ($p >= $datalen) {
                    return $idata;
                }
                $c = $data[$p++];
            }
            if ($c == '-') {
                if ($p >= $datalen) {
                    return $idata;
                }
                $sign = -$sign;
                $c = $data[$p++];
            }
            while (($c >= '0' && $c <= '9') || $c == '.') {
                if ($c == '.') {
                    $decInc = 1;
                } elseif ($dec < 3) {
                    $val = $val * 10 + (ord($c) - 48);
                    $dec += $decInc;
                }
                if ($p < $datalen) {
                    $c = $data[$p++];
                } else {
                    $c = '\0';
                }
            }
            if ($dec < 3) {
                if ($dec == 0) {
                    $val *= 1000;
                } elseif ($dec == 1) {
                    $val *= 100;
                } else {
                    $val *= 10;
                }
            }
            $idata[] = $sign * $val;
        }
        return $idata;
    }

    public static function _bytesToHexStr(string $data): string
    {
        return strtoupper(bin2hex($data));
    }

    public static function _hexStrToBin(string $data): string
    {
        $pos = 0;
        $result = '';
        while ($pos < strlen($data)) {
            $code = hexdec(substr($data, $pos, 2));
            $pos = $pos + 2;
            $result .= chr($code);
        }
        return $result;
    }


    public static function _bincrc(string $data, int $ofs, int $len): int
    {
        $crc = crc32(substr($data, $ofs, $len));
        if ($crc > 0x7fffffff) {
            return $crc - 0x100000000;
        }
        return $crc;
    }

    public static function _unplugDevice(string $serial): void
    {
        if (!is_null(self::$_removalCallback)) {
            self::$_pendingCallbacks[] = ['event' => '-', 'serial' => $serial, 'module' => YModule::FindModule($serial . ".module")];
        }
        self::forgetDevice(self::$_devs[$serial]);

    }


    /**
     * Return a Device object for a specified URL, serial number or logical device name
     * This function will not cause any network access
     * @param string $str_device a specified URL, serial number or logical device name
     * @return ?YDevice
     */
    public static function getDevice(string $str_device): ?YDevice
    {
        $dev = null;

        if (substr($str_device, 0, 7) == 'http://' || substr($str_device, 0, 8) == 'https://') {
            if (isset(self::$_snByUrl[$str_device])) {
                $serial = self::$_snByUrl[$str_device];
                if (isset(self::$_devs[$serial])) {
                    $dev = self::$_devs[$serial];
                }
            }
        } else {
            // lookup by serial
            if (isset(self::$_devs[$str_device])) {
                $dev = self::$_devs[$str_device];
            } else {
                // fallback to lookup by logical name
                if (isset(self::$_snByName[$str_device])) {
                    $serial = self::$_snByName[$str_device];
                    $dev = self::$_devs[$serial];
                }
            }
        }
        return $dev;
    }

    // Return the class name for a given function ID or full Hardware Id
    // Also make sure that the function type is registered in the API
    public static function functionClass(string $str_funcid): string
    {
        $dotpos = strpos($str_funcid, '.');
        if ($dotpos !== false) {
            $str_funcid = substr($str_funcid, $dotpos + 1);
        }
        $classlen = strlen($str_funcid);
        while (ord($str_funcid[$classlen - 1]) <= 57) {
            $classlen--;
        }
        $classname = strtoupper($str_funcid[0]) . substr($str_funcid, 1, $classlen - 1);
        if (!isset(self::$_fnByType[$classname])) {
            self::$_fnByType[$classname] = new YFunctionType($classname);
        }

        return $classname;
    }

    // Reindex a device in YAPI after a name change detected by device refresh

    /**
     * @throws YAPI_Exception
     */
    public static function reindexDevice(YDevice $obj_dev): void
    {
        $rootUrl = $obj_dev->getRootUrl();
        $serial = $obj_dev->getSerialNumber();
        $lname = $obj_dev->getLogicalName();
        self::$_devs[$serial] = $obj_dev;
        self::$_snByUrl[$rootUrl] = $serial;
        if ($lname != '') {
            self::$_snByName[$lname] = $serial;
        }
        self::$_fnByType['Module']->reindexFunction("$serial.module", $lname, null, null);
        $count = $obj_dev->functionCount();
        for ($i = 0; $i < $count; $i++) {
            $funcid = $obj_dev->functionId($i);
            $funcname = $obj_dev->functionName($i);
            $classname = self::functionClass($funcid);
            self::$_fnByType[$classname]->reindexFunction("$serial.$funcid", $funcname, null, null);
        }
    }

    // Remove a device from YAPI after an unplug detected by device refresh

    /**
     * @throws YAPI_Exception
     */
    public static function forgetDevice(YDevice $obj_dev): void
    {
        $rootUrl = $obj_dev->getRootUrl();
        $serial = $obj_dev->getSerialNumber();
        $lname = $obj_dev->getLogicalName();
        unset(self::$_devs[$serial]);
        unset(self::$_snByUrl[$rootUrl]);
        if (isset(self::$_snByName[$lname]) && self::$_snByName[$lname] == $serial) {
            unset(self::$_snByName[$lname]);
        }
        self::$_fnByType['Module']->forgetFunction("$serial.module");
        $count = $obj_dev->functionCount();
        for ($i = 0; $i < $count; $i++) {
            $funcid = $obj_dev->functionId($i);
            $classname = self::functionClass($funcid);
            self::$_fnByType[$classname]->forgetFunction("$serial.$funcid");
        }
    }

    /**
     * Find the best known identifier (hardware Id) for a given function
     * @param string $str_className
     * @param string $str_func
     * @return YAPI_YReq
     */
    public static function resolveFunction(string $str_className, string $str_func): YAPI_YReq
    {
        if (!isset(self::$BASETYPES[$str_className])) {
            // using a regular function type
            if (!isset(self::$_fnByType[$str_className])) {
                self::$_fnByType[$str_className] = new YFunctionType($str_className);
            }
            return self::$_fnByType[$str_className]->resolve($str_func);
        }
        // using an abstract baseType
        $baseType = self::$BASETYPES[$str_className];
        /** @noinspection PhpForeachVariableOverwritesAlreadyDefinedVariableInspection */
        foreach (self::$_fnByType as $str_className => $funtype) {
            if ($funtype->matchBaseType($baseType)) {
                $res = $funtype->resolve($str_func);
                if ($res->errorType == YAPI::SUCCESS) {
                    return $res;
                }
            }
        }
        return new YAPI_YReq($str_func,
            YAPI::DEVICE_NOT_FOUND,
            "No $str_className [$str_func] found (old firmware?)",
            null);
    }

    // return a firendly name for of a given function

    public static function getFriendlyNameFunction(string $str_className, string $str_func): YAPI_YReq
    {
        if (!isset(self::$BASETYPES[$str_className])) {
            // using a regular function type
            if (!isset(self::$_fnByType[$str_className])) {
                self::$_fnByType[$str_className] = new YFunctionType($str_className);
            }
            return self::$_fnByType[$str_className]->getFriendlyName($str_func);
        }
        // using an abstract baseType
        $baseType = self::$BASETYPES[$str_className];
        /** @noinspection PhpForeachVariableOverwritesAlreadyDefinedVariableInspection */
        foreach (self::$_fnByType as $str_className => $funtype) {
            if ($funtype->matchBaseType($baseType)) {
                $res = $funtype->getFriendlyName($str_func);
                if ($res->errorType == YAPI::SUCCESS) {
                    return $res;
                }
            }
        }
        return new YAPI_YReq($str_func,
            YAPI::DEVICE_NOT_FOUND,
            "No $str_className [$str_func] found (old firmware?)",
            null);
    }

    /**
     * Retrieve a function object by hardware id, updating the indexes on the fly if needed
     * @throws YAPI_Exception
     */
    public static function setFunction(string $str_className, string $str_func, YFunction $obj_func): void
    {
        if (!isset(self::$_fnByType[$str_className])) {
            self::$_fnByType[$str_className] = new YFunctionType($str_className);
        }
        self::$_fnByType[$str_className]->setFunction($str_func, $obj_func);
    }

    /**
     * Retrieve a function object by hardware id, updating the indexes on the fly if needed
     * @throws YAPI_Exception
     */
    public static function getFunction(string $str_className, string $str_func): ?YFunction
    {
        if (is_null(self::$_hubs)) {
            self::_init();
        }

        if (!isset(self::$_fnByType[$str_className])) {
            self::$_fnByType[$str_className] = new YFunctionType($str_className);
        }
        return self::$_fnByType[$str_className]->getFunction($str_func);
    }

    /**
     * Set a function advertised value by hardware id
     * @throws YAPI_Exception
     */
    public static function setFunctionValue(string $str_hwid, string $str_pubval): void
    {
        $classname = self::functionClass($str_hwid);
        self::$_fnByType[$classname]->setFunctionValue($str_hwid, $str_pubval);
    }

    /**
     * Set add a timed value report for a function
     * @throws YAPI_Exception
     */
    public static function setTimedReport(string $str_hwid, float $float_timestamp, float $float_duration, array $arr_report): void
    {
        $classname = self::functionClass($str_hwid);
        self::$_fnByType[$classname]->setTimedReport($str_hwid, $float_timestamp, $float_duration, $arr_report);
    }

    /**
     * Publish a configuration change event
     */
    public static function setConfChange(string $str_serial): void
    {
        $module = YModule::FindModule($str_serial . ".module");
        $module->_invokeConfigChangeCallback();
    }

    // Publish a configuration change event
    public static function setBeaconChange(string $str_serial, int $int_beacon): void
    {
        if (!array_key_exists($str_serial, self::$_beacons) || self::$_beacons[$str_serial] != $int_beacon) {
            self::$_beacons[$str_serial] = $int_beacon;
            $module = YModule::FindModule($str_serial . ".module");
            $module->_invokeBeaconCallback($int_beacon);
        }
    }

    /**
     * Retrieve a function advertised value by hardware id
     */
    public static function getFunctionValue(string $str_hwid): string
    {
        $classname = self::functionClass($str_hwid);
        return self::$_fnByType[$classname]->getFunctionValue($str_hwid);
    }

    /**
     * Retrieve a function base type
     */
    public static function getFunctionBaseType(string $str_hwid): int
    {
        $classname = self::functionClass($str_hwid);
        return self::$_fnByType[$classname]->getBaseType();
    }

    // Queue a function value event
    public static function addValueEvent(YFunction $obj_func, string $str_newval): void
    {
        self::$_data_events[] = array($obj_func, $str_newval);
    }


    // Queue a function value event
    public static function addRefreshEvent(YFunction $obj_func): void
    {
        self::$_data_events[] = array($obj_func);
    }

    // Queue a function value event
    public static function addTimedReportEvent(YFunction $obj_func, float $float_timestamp, float $float_duration, array $arr_report): void
    {
        self::$_data_events[] = array($obj_func, $float_timestamp, $float_duration, $arr_report);
    }

    /**
     * Find the hardwareId for the first instance of a given function class
     */
    public static function getFirstHardwareId(string $str_className): ?string
    {
        if (is_null(self::$_hubs)) {
            self::_init();
        }

        if (!isset(self::$BASETYPES[$str_className])) {
            // enumeration of a regular function type
            if (!isset(self::$_fnByType[$str_className])) {
                self::$_fnByType[$str_className] = new YFunctionType($str_className);
            }
            return self::$_fnByType[$str_className]->getFirstHardwareId();
        }
        // enumeration of an abstract class
        $baseType = self::$BASETYPES[$str_className];
        foreach (self::$_fnByType as $funtype) {
            if ($funtype->matchBaseType($baseType)) {
                $res = $funtype->getFirstHardwareId();
                if (!is_null($res)) {
                    return $res;
                }
            }
        }
        return null;
    }

    /**
     * Find the hardwareId for the next instance of a given function class
     */
    public static function getNextHardwareId(string $str_className, string $str_hwid): ?string
    {
        if (!isset(self::$BASETYPES[$str_className])) {
            // enumeration of a regular function type
            return self::$_fnByType[$str_className]->getNextHardwareId($str_hwid);
        }

        // enumeration of an abstract class
        $baseType = self::$BASETYPES[$str_className];
        $prevclass = self::functionClass($str_hwid);
        $res = self::$_fnByType[$prevclass]->getNextHardwareId($str_hwid);
        if (!is_null($res)) {
            return $res;
        }
        foreach (self::$_fnByType as $str_className => $funtype) {
            if ($prevclass != "") {
                if ($str_className != $prevclass) {
                    continue;
                }
                $prevclass = "";
                continue;
            }
            if ($funtype->matchBaseType($baseType)) {
                $res = $funtype->getFirstHardwareId();
                if (!is_null($res)) {
                    return $res;
                }
            }
        }
        /** @noinspection PhpExpressionAlwaysNullInspection */
        return $res;
    }

    /**
     * Perform an HTTP request on a device, by URL or identifier.
     * When loading the REST API from a device by identifier, the device cache will be used
     * @param string $str_device
     * @param string $str_request
     * @param bool $async
     * @param string $body
     * @return YAPI_YReq a strucure including errorType, errorMsg and result
     * @throws YAPI_Exception
     */
    public static function devRequest(string $str_device, string $str_request, bool $async = false, string $body = ''): YAPI_YReq
    {
        $lines = explode("\n", $str_request);
        $dev = null;
        $baseUrl = $str_device;
        if (substr($str_device, 0, 7) == 'http://' || substr($str_device, 0, 8) == 'https://') {
            if (substr($baseUrl, -1) != '/') {
                $baseUrl .= '/';
            }
            if (isset(self::$_snByUrl[$baseUrl])) {
                $serial = self::$_snByUrl[$baseUrl];
                if (isset(self::$_devs[$serial])) {
                    $dev = self::$_devs[$serial];
                }
            }
        } else {
            $dev = self::getDevice($str_device);
            if (!$dev) {
                return new YAPI_YReq("", YAPI::DEVICE_NOT_FOUND,
                    "Device [$str_device] not online",
                    null);
            }
            // use the device cache when loading the whole API
            if ($lines[0] == 'GET /api.json') {
                return $dev->requestAPI();
            }
            $baseUrl = $dev->getRootUrl();
        }
        // map str_device to a URL
        $words = explode(' ', $lines[0]);
        if (sizeof($words) < 2) {
            return new YAPI_YReq("", YAPI::INVALID_ARGUMENT,
                'Invalid request, not enough words; expected a method name and a URL',
                null);
        } elseif (sizeof($words) > 2) {
            return new YAPI_YReq("", YAPI::INVALID_ARGUMENT,
                'Invalid request, too many words; make sure the URL is URI-encoded',
                null);
        }
        $method = $words[0];
        $devUrl = $words[1];
        $pos = strpos($baseUrl, '/bySerial');
        if ($pos !== false) {
            // $baseURL end with a / and $devUrl start with / -> remove first char or $devUrl
            $devUrl = substr($baseUrl, $pos) . substr($devUrl, 1);
            $rooturl = substr($baseUrl, 0, $pos);
        } else {
            $devUrl = "$devUrl";
            if (substr($baseUrl, -1) == '/') {
                $rooturl = substr($baseUrl, 0, -1);
            } else {
                $rooturl = $baseUrl;
            }
        }
        if (!isset(self::$_hubs[$rooturl])) {
            return new YAPI_YReq("", YAPI::DEVICE_NOT_FOUND, 'No hub registered on ' . $rooturl, null);
        }
        $hub = self::$_hubs[$rooturl];
        if ($async && $hub->writeProtected && $hub->user != 'admin' && !$hub->isCachedHub()) {
            // async query, make sure the hub is not write-protected
            return new YAPI_YReq("", YAPI::UNAUTHORIZED,
                'Access denied: admin credentials required',
                null);
        }
        if (strpos($devUrl, '@YCB+') && !$hub->isCachedHub()) {
            return new YAPI_YReq("", YAPI::INVALID_ARGUMENT,
                'Preloading of URL is only supported for HTTP callback.',
                null);
        }
        $tcpreq = new YTcpReq($hub, "$method $devUrl", $async, $body);
        if (!is_null($dev)) {
            $dev->prepRequest($tcpreq);
        }
        if ($tcpreq->process() != YAPI::SUCCESS) {
            return new YAPI_YReq("", $tcpreq->errorType, $tcpreq->errorMsg, null);
        }
        self::$_pendingRequests[] = $tcpreq;
        if (!$async) {
            // normal query, wait for completion until timeout
            $mstimeout = YIO_DEFAULT_TCP_TIMEOUT;
            if (strpos($devUrl, '/testcb.txt') !== false) {
                $mstimeout = YIO_1_MINUTE_TCP_TIMEOUT;
            } elseif (strpos($devUrl, '/logger.json') !== false) {
                $mstimeout = YIO_1_MINUTE_TCP_TIMEOUT;
            } elseif (strpos($devUrl, '/rxmsg.json') !== false) {
                $mstimeout = YIO_1_MINUTE_TCP_TIMEOUT;
            } elseif (strpos($devUrl, '/rxdata.bin') !== false) {
                $mstimeout = YIO_1_MINUTE_TCP_TIMEOUT;
            } elseif (strpos($devUrl, '/at.txt') !== false) {
                $mstimeout = YIO_1_MINUTE_TCP_TIMEOUT;
            } elseif (strpos($devUrl, '/files.json') !== false) {
                $mstimeout = YIO_1_MINUTE_TCP_TIMEOUT;
            } elseif (strpos($devUrl, '/upload.html') !== false) {
                $mstimeout = YIO_10_MINUTES_TCP_TIMEOUT;
            } elseif (strpos($devUrl, '/flash.json') !== false) {
                $mstimeout = YIO_10_MINUTES_TCP_TIMEOUT;
            }
            if ($mstimeout < $hub->get_networkTimeout()) {
                $mstimeout = $hub->get_networkTimeout();
            }
            $timeout = YAPI::GetTickCount() + $mstimeout;
            do {
                self::_handleEvents_internal(100);
            } while (!$tcpreq->eof() && YAPI::GetTickCount() < $timeout);
            if (!$tcpreq->eof()) {
                $tcpreq->close();
                return new YAPI_YReq("", YAPI::TIMEOUT,
                    'Timeout waiting for device reply',
                    null);
            }
            if ($tcpreq->errorType == YAPI::UNAUTHORIZED) {
                return new YAPI_YReq("", YAPI::UNAUTHORIZED,
                    'Access denied, authorization required',
                    null);
            } elseif ($tcpreq->errorType != YAPI::SUCCESS) {
                return new YAPI_YReq("", $tcpreq->errorType,
                    'Network error while reading from device',
                    null);
            }
            if (strpos($tcpreq->meta, "OK\r\n") === 0) {
                return new YAPI_YReq("", YAPI::SUCCESS,
                    'no error',
                    $tcpreq->reply);
            }
            if (strpos($tcpreq->meta, "0K\r\n") === 0) {
                return new YAPI_YReq("", YAPI::SUCCESS,
                    'no error',
                    $tcpreq->reply);
            }
            $matches = null;
            $preg_match = preg_match('/^HTTP[^ ]* (?P<status>\d+) (?P<statusmsg>.)+\r\n/', $tcpreq->meta, $matches);
            if (!$preg_match) {
                return new YAPI_YReq("", YAPI::IO_ERROR,
                    'Unexpected HTTP response header: ' . $tcpreq->meta,
                    null);
            }
            if ($matches['status'] != '200' && $matches['status'] != '304') {
                return new YAPI_YReq("", YAPI::IO_ERROR,
                    'Received HTTP status ' . $matches['status'] . ' (' . $matches['statusmsg'] . ')',
                    null);
            }
        }

        return new YAPI_YReq("", YAPI::SUCCESS,
            'no error',
            $tcpreq->reply);
    }


    public static function isReadOnly(string $str_device): bool
    {
        $dev = self::getDevice($str_device);
        if (!$dev) {
            return true;
        }
        $rooturl = $dev->getRootUrl();
        $pos = strpos($rooturl, '/bySerial', 7);
        if ($pos >= 0) {
            $rooturl = substr($rooturl, 0, $pos + 1);
        }
        if (substr($rooturl, -1) == '/') {
            $rooturl = substr($rooturl, 0, -1);
        }

        if (!isset(self::$_hubs[$rooturl])) {
            return true;
        }

        $hub = self::$_hubs[$rooturl];
        if ($hub->writeProtected && $hub->user != 'admin' && !$hub->isCachedHub()) {
            // async query, make sure the hub is not write-protected
            return true;
        }
        return false;
    }


    /**
     * Retrun the serialnummber of all subdevcies
     * @param string $str_device
     * @return array of string
     * @throws YAPI_Exception
     */
    public static function getSubDevicesFrom(string $str_device): array
    {
        $dev = self::getDevice($str_device);
        if (!$dev) {
            return [];
        }
        $baseUrl = $dev->getRootUrl();
        $pos = strpos($baseUrl, '/bySerial');
        if ($pos !== false) {
            $baseUrl = substr($baseUrl, 0, $pos);
        }
        if (substr($baseUrl, -1) == '/') {
            $baseUrl = substr($baseUrl, 0, -1);
        }
        $rooturl = $baseUrl;
        if (!isset(self::$_hubs[$rooturl])) {
            throw new YAPI_Exception('No hub registered on ' . $baseUrl, YAPI::DEVICE_NOT_FOUND);
        }
        $hub = self::$_hubs[$rooturl];
        if ($hub->serialByYdx[0] == $str_device) {
            return array_slice($hub->serialByYdx, 1);
        }
        return array();
    }


    /**
     * Retrun the serialnumber of the hub
     * @param string $str_device
     * @return string the serial of the hub on which the device is plugged
     * @throws YAPI_Exception
     */
    public static function getHubSerialFrom(string $str_device): string
    {
        $dev = self::getDevice($str_device);
        if (!$dev) {
            return '';
        }
        $baseUrl = $dev->getRootUrl();
        $pos = strpos($baseUrl, '/bySerial');
        if ($pos !== false) {
            $baseUrl = substr($baseUrl, 0, $pos);
        }
        if (substr($baseUrl, -1) == '/') {
            $baseUrl = substr($baseUrl, 0, -1);
        }
        $rooturl = $baseUrl;
        if (!isset(self::$_hubs[$rooturl])) {
            throw new YAPI_Exception('No hub registered on ' . $baseUrl, YAPI::DEVICE_NOT_FOUND);
        }
        $hub = self::$_hubs[$rooturl];
        return $hub->serialByYdx[0];
    }

    public static function getHubURLFrom(string $str_device): string
    {
        $dev = self::getDevice($str_device);
        if (!$dev) {
            return '';
        }
        $baseUrl = $dev->getRootUrl();
        $devurl = "";
        $pos = strpos($baseUrl, '/bySerial');
        if ($pos !== false) {
            $devurl = substr($baseUrl, $pos + 1);
            $baseUrl = substr($baseUrl, 0, $pos);
        }
        if (substr($baseUrl, -1) == '/') {
            $baseUrl = substr($baseUrl, 0, -1);
        }
        if (!isset(self::$_hubs[$baseUrl])) {
            throw new YAPI_Exception('No hub registered on ' . $baseUrl, YAPI::DEVICE_NOT_FOUND);
        }
        $hub = self::$_hubs[$baseUrl];
        $url = $hub->getBaseURL() . $devurl;
        return $url;
    }


    /**
     * Load and parse the REST API for a function given by class name and identifier, possibly applying changes
     * Device cache will be preloaded when loading function "module" and leveraged for other modules
     * @param string $str_className
     * @param string $str_func
     * @param string $str_extra
     * @return YAPI_YReq
     * @throws YAPI_Exception
     */
    public static function funcRequest(string $str_className, string $str_func, string $str_extra): YAPI_YReq
    {
        $resolve = self::resolveFunction($str_className, $str_func);
        if ($resolve->errorType != YAPI::SUCCESS) {
            if ($resolve->errorType == YAPI::DEVICE_NOT_FOUND && sizeof(self::$_hubs) == 0) {
                // when USB is supported, check if no USB device is connected before outputing this message
                $resolve->errorMsg = "Impossible to contact any device because no hub has been registered";
            } else {
                $resolve = self::_updateDeviceList_internal(true, false);
                if ($resolve->errorType != YAPI::SUCCESS) {
                    return $resolve;
                }
                $resolve = self::resolveFunction($str_className, $str_func);
            }
            if ($resolve->errorType != YAPI::SUCCESS) {
                return $resolve;
            }
        }
        $str_func = $resolve->result;
        $dotpos = strpos($str_func, '.');
        $devid = substr($str_func, 0, $dotpos);
        $funcid = substr($str_func, $dotpos + 1);
        $dev = self::getDevice($devid);
        if (!$dev) {
            // try to force a device list update to check if the device arrived in between
            $resolve = self::_updateDeviceList_internal(true, false);
            if ($resolve->errorType != YAPI::SUCCESS) {
                return $resolve;
            }
            $dev = self::getDevice($devid);
            if (!$dev) {
                return new YAPI_YReq("{$devid}.{$funcid}", YAPI::DEVICE_NOT_FOUND,
                    "Device [$devid] not online",
                    null);
            }
        }
        $loadval = false;
        if ($str_extra == '') {
            // use a cached API string, without reloading unless module is requested
            $yreq = $dev->requestAPI();
            if (!is_null($yreq)) {
                $yreq->hwid = "{$devid}.{$funcid}";
                $yreq->deviceid = $devid;
                $yreq->functionid = $funcid;
                if ($yreq->errorType != YAPI::SUCCESS) {
                    return $yreq;
                }
                $loadval = json_decode(YAPI::Ybin2str($yreq->result), true);
                $loadval = $loadval[$funcid];
            }
        } else {
            $dev->dropCache();
            $yreq = new YAPI_YReq("{$devid}.{$funcid}", YAPI::NOT_INITIALIZED, "dummy", null);
        }
        if (!$loadval) {
            // request specified function only to minimize traffic
            if ($str_extra == "") {
                $httpreq = "GET /api/{$funcid}.json";
                $yreq = self::devRequest($devid, $httpreq);
                $yreq->hwid = "{$devid}.{$funcid}";
                $yreq->deviceid = $devid;
                $yreq->functionid = $funcid;
                if ($yreq->errorType != YAPI::SUCCESS) {
                    return $yreq;
                }
                $loadval = json_decode(YAPI::Ybin2str($yreq->result), true);
            } else {
                $httpreq = "GET /api/{$funcid}{$str_extra}";
                $yreq = self::devRequest($devid, $httpreq, true);
                $yreq->hwid = "{$devid}.{$funcid}";
                $yreq->deviceid = $devid;
                $yreq->functionid = $funcid;
                return $yreq;
            }
        }
        if (!$loadval) {
            return new YAPI_YReq("{$devid}.{$funcid}", YAPI::IO_ERROR,
                "Request failed, could not parse API value for function $str_func",
                null);
        }
        $yreq->result = $loadval;
        return $yreq;
    }

    /**
     * Perform an HTTP request on a device and return the result string
     * Throw an exception (or return YAPI_ERROR_STRING on error)
     * @throws YAPI_Exception
     */
    public static function HTTPRequest(string $str_device, string $str_request): string
    {
        $res = self::devRequest($str_device, $str_request);
        if ($res->errorType != YAPI::SUCCESS) {
            return self::_throw($res->errorType, $res->errorMsg, null);
        }
        return $res->result;
    }



//--- (generated code: YAPIContext yapiwrapper)

    /**
     * Modifies the delay between each forced enumeration of the used YoctoHubs.
     * By default, the library performs a full enumeration every 10 seconds.
     * To reduce network traffic, you can increase this delay.
     * It's particularly useful when a YoctoHub is connected to the GSM network
     * where traffic is billed. This parameter doesn't impact modules connected by USB,
     * nor the working of module arrival/removal callbacks.
     * Note: you must call this function after yInitAPI.
     *
     * @param int $deviceListValidity : nubmer of seconds between each enumeration.
     * @noreturn
     */
    public static function SetDeviceListValidity(int $deviceListValidity): void
    {
        if (is_null(self::$_hubs)) {
            self::_init();
        }
        self::$_yapiContext->SetDeviceListValidity($deviceListValidity);
    }
    /**
     * Returns the delay between each forced enumeration of the used YoctoHubs.
     * Note: you must call this function after yInitAPI.
     *
     * @return int  the number of seconds between each enumeration.
     */
    public static function GetDeviceListValidity(): int
    {
        if (is_null(self::$_hubs)) {
            self::_init();
        }
        return self::$_yapiContext->GetDeviceListValidity();
    }
    /**
     * Returns the path to the dynamic YAPI library. This function is useful for debugging problems loading the
     * dynamic library YAPI:: This function is supported by the C#, Python and VB languages. The other
     * libraries return an
     * empty string.
     *
     * @return string  a string containing the path of the YAPI dynamic library.
     */
    public static function GetYAPISharedLibraryPath(): string
    {
        if (is_null(self::$_hubs)) {
            self::_init();
        }
        return self::$_yapiContext->GetYAPISharedLibraryPath();
    }
    /**
     * Adds a UDEV rule which authorizes all users to access Yoctopuce modules
     * connected to the USB ports. This function works only under Linux. The process that
     * calls this method must have root privileges because this method changes the Linux configuration.
     *
     * @param boolean $force : if true, overwrites any existing rule.
     *
     * @return string  an empty string if the rule has been added.
     *
     * On failure, returns a string that starts with "error:".
     */
    public static function AddUdevRule(bool $force): string
    {
        if (is_null(self::$_hubs)) {
            self::_init();
        }
        return self::$_yapiContext->AddUdevRule($force);
    }
    /**
     * Download the TLS/SSL certificate from the hub. This function allows to download a TLS/SSL certificate to add it
     * to the list of trusted certificates using the AddTrustedCertificates method.
     *
     * @param string $url : the root URL of the VirtualHub V2 or HTTP server.
     * @param float $mstimeout : the number of milliseconds available to download the certificate.
     *
     * @return string  a string containing the certificate. In case of error, returns a string starting with "error:".
     */
    public static function DownloadHostCertificate(string $url, float $mstimeout): string
    {
        if (is_null(self::$_hubs)) {
            self::_init();
        }
        return self::$_yapiContext->DownloadHostCertificate($url, $mstimeout);
    }
    /**
     * Adds a TLS/SSL certificate to the list of trusted certificates. By default, the library
     * library will reject TLS/SSL connections to servers whose certificate is not known. This function
     * function allows to add a list of known certificates. It is also possible to disable the verification
     * using the SetNetworkSecurityOptions method.
     *
     * @param string $certificate : a string containing one or more certificates.
     *
     * @return string  an empty string if the certificate has been added correctly.
     *         In case of error, returns a string starting with "error:".
     */
    public static function AddTrustedCertificates(string $certificate): string
    {
        if (is_null(self::$_hubs)) {
            self::_init();
        }
        return self::$_yapiContext->AddTrustedCertificates($certificate);
    }
    /**
     * Set the path of Certificate Authority file on local filesystem. This method takes as a parameter
     * the path of a file containing all certificates in PEM format.
     * For technical reasons, only one file can be specified. So if you need to connect to several Hubs
     * instances with self-signed certificates, you'll need to use
     * a single file containing all the certificates end-to-end. Passing a empty string will restore the
     * default settings. This option is only supported by PHP library.
     *
     * @param string $certificatePath : the path of the file containing all certificates in PEM format.
     *
     * @return string  an empty string if the certificate has been added correctly.
     *         In case of error, returns a string starting with "error:".
     */
    public static function SetTrustedCertificatesList(string $certificatePath): string
    {
        if (is_null(self::$_hubs)) {
            self::_init();
        }
        return self::$_yapiContext->SetTrustedCertificatesList($certificatePath);
    }
    /**
     * Enables or disables certain TLS/SSL certificate checks.
     *
     * @param int $opts : The options are YAPI::NO_TRUSTED_CA_CHECK,
     *         YAPI::NO_EXPIRATION_CHECK, YAPI::NO_HOSTNAME_CHECK.
     *
     * @return string  an empty string if the options are taken into account.
     *         On error, returns a string beginning with "error:".
     */
    public static function SetNetworkSecurityOptions(int $opts): string
    {
        if (is_null(self::$_hubs)) {
            self::_init();
        }
        return self::$_yapiContext->SetNetworkSecurityOptions($opts);
    }
    /**
     * Modifies the network connection delay for yRegisterHub() and yUpdateDeviceList().
     * This delay impacts only the YoctoHubs and VirtualHub
     * which are accessible through the network. By default, this delay is of 20000 milliseconds,
     * but depending on your network you may want to change this delay,
     * gor example if your network infrastructure is based on a GSM connection.
     *
     * @param int $networkMsTimeout : the network connection delay in milliseconds.
     * @noreturn
     */
    public static function SetNetworkTimeout(int $networkMsTimeout): void
    {
        if (is_null(self::$_hubs)) {
            self::_init();
        }
        self::$_yapiContext->SetNetworkTimeout($networkMsTimeout);
    }
    /**
     * Returns the network connection delay for yRegisterHub() and yUpdateDeviceList().
     * This delay impacts only the YoctoHubs and VirtualHub
     * which are accessible through the network. By default, this delay is of 20000 milliseconds,
     * but depending on your network you may want to change this delay,
     * for example if your network infrastructure is based on a GSM connection.
     *
     * @return int  the network connection delay in milliseconds.
     */
    public static function GetNetworkTimeout(): int
    {
        if (is_null(self::$_hubs)) {
            self::_init();
        }
        return self::$_yapiContext->GetNetworkTimeout();
    }
    /**
     * Change the validity period of the data loaded by the library.
     * By default, when accessing a module, all the attributes of the
     * module functions are automatically kept in cache for the standard
     * duration (5 ms). This method can be used to change this standard duration,
     * for example in order to reduce network or USB traffic. This parameter
     * does not affect value change callbacks
     * Note: This function must be called after yInitAPI.
     *
     * @param float $cacheValidityMs : an integer corresponding to the validity attributed to the
     *         loaded function parameters, in milliseconds.
     * @noreturn
     */
    public static function SetCacheValidity(float $cacheValidityMs): void
    {
        if (is_null(self::$_hubs)) {
            self::_init();
        }
        self::$_yapiContext->SetCacheValidity($cacheValidityMs);
    }
    /**
     * Returns the validity period of the data loaded by the library.
     * This method returns the cache validity of all attributes
     * module functions.
     * Note: This function must be called after yInitAPI .
     *
     * @return float  an integer corresponding to the validity attributed to the
     *         loaded function parameters, in milliseconds
     */
    public static function GetCacheValidity(): float
    {
        if (is_null(self::$_hubs)) {
            self::_init();
        }
        return self::$_yapiContext->GetCacheValidity();
    }
    /**
     * @throws YAPI_Exception on error
     */
    public static function nextHubInUseInternal(int $hubref): ?YHub
    {
        if (is_null(self::$_hubs)) {
            self::_init();
        }
        return self::$_yapiContext->nextHubInUseInternal($hubref);
    }
    /**
     * @throws YAPI_Exception on error
     */
    public static function getYHubObj(int $hubref): ?YHub
    {
        if (is_null(self::$_hubs)) {
            self::_init();
        }
        return self::$_yapiContext->getYHubObj($hubref);
    }
    /**
     * @throws YAPI_Exception on error
     */
    public static function findYHubFromID(string $id): ?YHub
    {
        if (is_null(self::$_hubs)) {
            self::_init();
        }
        return self::$_yapiContext->findYHubFromID($id);
    }
   #--- (end of generated code: YAPIContext yapiwrapper)


    /**
     * Returns the version identifier for the Yoctopuce library in use.
     * The version is a string in the form "Major.Minor.Build",
     * for instance "1.01.5535". For languages using an external
     * DLL (for instance C#, VisualBasic or Delphi), the character string
     * includes as well the DLL version, for instance
     * "1.01.5535 (1.01.5439)".
     *
     * If you want to verify in your code that the library version is
     * compatible with the version that you have used during development,
     * verify that the major number is strictly equal and that the minor
     * number is greater or equal. The build number is not relevant
     * with respect to the library compatibility.
     *
     * @return string  a character string describing the library version.
     */
    public static function GetAPIVersion(): string
    {
        return "PATCH_WITH_VERSION";
    }

    /**
     * Enables the HTTP callback cache. When enabled, this cache reduces the quantity of data sent to the
     * PHP script by 50% to 70%. To enable this cache, the method ySetHTTPCallbackCacheDir()
     * must be called before any call to yRegisterHub(). This method takes in parameter the path
     * of the directory used for saving data between each callback. This folder must exist and the
     * PHP script needs to have write access to it. It is recommended to use a folder that is not published
     * on the Web server since the library will save some data of Yoctopuce devices into this folder.
     *
     * Note: This feature is supported by YoctoHub and VirtualHub since version 27750.
     *
     * @param string $directory : the path of the folder that will be used as cache.
     *
     * On failure, throws an exception.
     * @throws YAPI_Exception on error
     */
    public static function SetHTTPCallbackCacheDir(string $directory): void
    {
        if (is_null(self::$_hubs)) {
            self::_init();
        }
        if (!is_dir($directory)) {
            throw new YAPI_Exception("Directory does not exist");
        }
        if (!is_dir($directory)) {
            throw new YAPI_Exception("Directory does not exist");
        }
        if (!is_writable($directory)) {
            throw new YAPI_Exception("Directory is not writable");
        }

        if (substr($directory, -1) != '/') {
            $directory .= '/';
        }
        self::$_jzonCacheDir = $directory;
    }

    /**
     * Disables the HTTP callback cache. This method disables the HTTP callback cache, and
     * can additionally cleanup the cache directory.
     *
     * @param boolean $removeFiles : True to clear the content of the cache.
     *         On failure, throws an exception.
     * @throws YAPI_Exception on error
     */
    public static function ClearHTTPCallbackCacheDir(bool $removeFiles): void
    {
        if (is_null(self::$_hubs) or is_null(self::$_jzonCacheDir)) {
            return;
        }

        if ($removeFiles && is_dir(self::$_jzonCacheDir)) {
            $files = glob(self::$_jzonCacheDir . "{,.}*.json", GLOB_BRACE); // get all file names
            foreach ($files as $file) {
                if (is_file($file)) {
                    unlink($file);
                }
            }
        }
        self::$_jzonCacheDir = null;
    }

    /**
     * Initializes the Yoctopuce programming library explicitly.
     * It is not strictly needed to call yInitAPI(), as the library is
     * automatically  initialized when calling yRegisterHub() for the
     * first time.
     *
     * When YAPI::DETECT_NONE is used as detection mode,
     * you must explicitly use yRegisterHub() to point the API to the
     * VirtualHub on which your devices are connected before trying to access them.
     *
     * @param int $mode : an integer corresponding to the type of automatic
     *         device detection to use. Possible values are
     *         YAPI::DETECT_NONE, YAPI::DETECT_USB, YAPI::DETECT_NET,
     *         and YAPI::DETECT_ALL.
     * @param string $errmsg : a string passed by reference to receive any error message.
     *
     * @return int  YAPI::SUCCESS when the call succeeds.
     *
     * On failure returns a negative error code.
     */
    public static function InitAPI(int $mode = YAPI::DETECT_NONE, ?string &$errmsg = ''): int
    {
        if (is_null(self::$_hubs)) {
            self::_init();
        }
        $errmsg = '';

        return YAPI::SUCCESS;
    }

    /**
     * Waits for all pending communications with Yoctopuce devices to be
     * completed then frees dynamically allocated resources used by
     * the Yoctopuce library.
     *
     * From an operating system standpoint, it is generally not required to call
     * this function since the OS will automatically free allocated resources
     * once your program is completed. However, there are two situations when
     * you may really want to use that function:
     *
     * - Free all dynamically allocated memory blocks in order to
     * track a memory leak.
     *
     * - Send commands to devices right before the end
     * of the program. Since commands are sent in an asynchronous way
     * the program could exit before all commands are effectively sent.
     *
     * You should not call any other library function after calling
     * yFreeAPI(), or your program will crash.
     */
    public static function FreeAPI(): void
    {
        // leave max 10 second to finish pending requests
        $timeout = YAPI::GetTickCount() + 10000;
        foreach (self::$_pendingRequests as $tcpreq) {
            $request = trim($tcpreq->request);
            if (substr($request, 0, 12) == 'GET /not.byn') {
                continue;
            }
            while (!$tcpreq->eof() && YAPI::GetTickCount() < $timeout) {
                try {
                    self::_handleEvents_internal(100);
                } catch (YAPI_Exception $ignore) {
                }
            }
        }
        // clear all caches
        self::_init();
    }

    /**
     * Disables the use of exceptions to report runtime errors.
     * When exceptions are disabled, every function returns a specific
     * error value which depends on its type and which is documented in
     * this reference manual.
     */
    public static function DisableExceptions(): void
    {
        if (is_null(self::$_hubs)) {
            self::_init();
        }

        self::$exceptionsDisabled = true;
    }

    /**
     * Re-enables the use of exceptions for runtime error handling.
     * Be aware than when exceptions are enabled, every function that fails
     * triggers an exception. If the exception is not caught by the user code,
     * it either fires the debugger or aborts (i.e. crash) the program.
     */
    public static function EnableExceptions(): void
    {
        if (is_null(self::$_hubs)) {
            self::_init();
        }

        self::$exceptionsDisabled = false;
    }

    public static function _parseRegisteredURL(string $str_url): array
    {
        $res = [];
        $res['org_url'] = $str_url;
        $res['proto'] = 'auto';
        $res['port'] = 4444;
        $rh_proto = 'http';


        if (substr($str_url, 0, 7) == 'auto://') {
            $str_url = substr($str_url, 7);
        } elseif (substr($str_url, 0, 7) == 'http://') {
            $str_url = substr($str_url, 7);
            $res['proto'] = "http";
        } elseif (substr($str_url, 0, 8) == 'https://') {
            $str_url = substr($str_url, 8);
            $res['port'] = 4443;
            $res['proto'] = "https";
            $rh_proto = 'https';
        } elseif (substr($str_url, 0, 5) == 'ws://') {
            $str_url = substr($str_url, 5);
            $res['proto'] = "ws";
            $rh_proto = 'ws';
        } elseif (substr($str_url, 0, 6) == 'wss://') {
            $str_url = substr($str_url, 6);
            $res['proto'] = "wss";
            $rh_proto = 'wss';
        } elseif (substr($str_url, 0, 9) == 'secure://') {
            $str_url = substr($str_url, 9);
            $res['proto'] = "secure";
            $rh_proto = 'https';
            $res['port'] = 4443;

        }
        $subdompos = strpos($str_url, '/');
        if ($subdompos === false) {
            $res['subdomain'] = '';
        } else {
            $res['subdomain'] = substr($str_url, $subdompos);
            while (substr($res['subdomain'], -1) == '/') {
                $res['subdomain'] = substr($res['subdomain'], 0, -1);
            }
            $str_url = substr($str_url, 0, $subdompos);
        }
        $authpos = strpos($str_url, '@');
        if ($authpos === false) {
            $res['auth'] = '';
        } else {
            $res['auth'] = substr($str_url, 0, $authpos);
            $str_url = substr($str_url, $authpos + 1);
        }
        $endv6 = strpos($str_url, ']');
        $p_ofs = strpos($str_url, ':');
        if ($p_ofs > 0 && $endv6 > 0 && $p_ofs < $endv6) {
            // ipv6 URL
            $p_ofs = strpos($str_url, ':', $endv6);
        }
        if ($p_ofs !== false) {
            $res['host'] = substr($str_url, 0, $p_ofs);
            $res['port'] = (int)substr($str_url, $p_ofs + 1);
        } else {
            $res['host'] = $str_url;
            if ($res['subdomain'] != '') {
                if ($rh_proto == 'http') {
                    $res['port'] = 80;
                } elseif ($rh_proto == 'https') {
                    $res['port'] = 443;
                }
            }
        }
        if (strcasecmp(substr($str_url, 0, 8), "callback") == 0) {
            $res['rooturl'] = "http://" . strtoupper($str_url);
        } else {
            $res['rooturl'] = "{$rh_proto}://{$res['host']}:{$res['port']}";
        }
        return $res;
    }

    private static function getHubFromUrl(string $url): array
    {
        if (is_null(self::$_hubs)) {
            return [];
        }
        $res = [];
        $url_detail = self::_parseRegisteredURL($url);
        /** @var YTcpHub $hub */
        foreach (self::$_hubs as $hub_url => $hub) {
            if ($url == $hub->url_info['org_url']) {
                $res[] = $hub;
            } elseif ($hub_url == $url_detail['rooturl']) {
                $res[] = $hub;
            } else {
                if ($hub->isURLKnown($url)) {
                    $res[] = $hub;
                }
            }
        }
        return $res;
    }


    /**
     * Set up the Yoctopuce library to use modules connected on a given machine. Idealy this
     * call will be made once at the begining of your application.  The
     * parameter will determine how the API will work. Use the following values:
     *
     * <b>usb</b>: When the usb keyword is used, the API will work with
     * devices connected directly to the USB bus. Some programming languages such a JavaScript,
     * PHP, and Java don't provide direct access to USB hardware, so usb will
     * not work with these. In this case, use a VirtualHub or a networked YoctoHub (see below).
     *
     * <b><i>x.x.x.x</i></b> or <b><i>hostname</i></b>: The API will use the devices connected to the
     * host with the given IP address or hostname. That host can be a regular computer
     * running a <i>native VirtualHub</i>, a <i>VirtualHub for web</i> hosted on a server,
     * or a networked YoctoHub such as YoctoHub-Ethernet or
     * YoctoHub-Wireless. If you want to use the VirtualHub running on you local
     * computer, use the IP address 127.0.0.1. If the given IP is unresponsive, yRegisterHub
     * will not return until a time-out defined by ySetNetworkTimeout has elapsed.
     * However, it is possible to preventively test a connection  with yTestHub.
     * If you cannot afford a network time-out, you can use the non-blocking yPregisterHub
     * function that will establish the connection as soon as it is available.
     *
     *
     * <b>callback</b>: that keyword make the API run in "<i>HTTP Callback</i>" mode.
     * This a special mode allowing to take control of Yoctopuce devices
     * through a NAT filter when using a VirtualHub or a networked YoctoHub. You only
     * need to configure your hub to call your server script on a regular basis.
     * This mode is currently available for PHP and Node.JS only.
     *
     * Be aware that only one application can use direct USB access at a
     * given time on a machine. Multiple access would cause conflicts
     * while trying to access the USB modules. In particular, this means
     * that you must stop the VirtualHub software before starting
     * an application that uses direct USB access. The workaround
     * for this limitation is to set up the library to use the VirtualHub
     * rather than direct USB access.
     *
     * If access control has been activated on the hub, virtual or not, you want to
     * reach, the URL parameter should look like:
     *
     * http://username:password@address:port
     *
     * You can call <i>RegisterHub</i> several times to connect to several machines. On
     * the other hand, it is useless and even counterproductive to call <i>RegisterHub</i>
     * with to same address multiple times during the life of the application.
     *
     * @param string $url : a string containing either "usb","callback" or the
     *         root URL of the hub to monitor
     * @param string $errmsg : a string passed by reference to receive any error message.
     *
     * @return int  YAPI::SUCCESS when the call succeeds.
     *
     * On failure returns a negative error code.
     */
    public static function RegisterHub(string $url, ?string &$errmsg = ''): int
    {
        if (is_null(self::$_hubs)) {
            self::_init();
        }

        $previousHub = self::getHubFromUrl($url);
        if (sizeof($previousHub) > 0) {
            /** @var YTcpHub $h */
            foreach ($previousHub as $h) {
                if ($h->isEnable()) {
                    $h->addKnownUrl($url);
                    $h->setMandatory(true);
                }
            }
            return YAPI::SUCCESS;
        }
        $url_detail = self::_parseRegisteredURL($url);
        $errmsg = '';
        if ($url_detail['proto'] == "wss" || $url_detail['proto'] == "ws") {
            $errmsg = "Websocket is not available in PHP";
            return YAPI::NOT_SUPPORTED;
        }
        // Test hub
        $tcphub = new YTcpHub($url_detail, true);
        $timeout = YAPI::GetTickCount() + $tcphub->get_networkTimeout();
        $res = $tcphub->verfiyStreamAddr(true, $errmsg);
        if ($res < 0) {
            return YAPI::IO_ERROR;
        }
        $tickCount = (int)YAPI::GetTickCount();
        if ($tickCount >= $timeout) {
            $errmsg = 'Timeout waiting for device reply';
            return YAPI::TIMEOUT;
        }
        $tcpreq = new YTcpReq($tcphub, "GET /api/module.json", false, '', $tickCount);
        if ($tcpreq->process($errmsg) != YAPI::SUCCESS) {
            return $tcpreq->errorType;
        }
        self::$_pendingRequests[] = $tcpreq;
        do {
            self::_handleEvents_internal(100);
        } while (!$tcpreq->eof() && YAPI::GetTickCount() < $timeout);
        if (!$tcpreq->eof()) {
            $tcpreq->close();
            $errmsg = 'Timeout waiting for device reply';
            return YAPI::TIMEOUT;
        }
        if ($tcpreq->errorType == YAPI::UNAUTHORIZED) {
            $errmsg = 'Access denied, authorization required';
            return YAPI::UNAUTHORIZED;
        } elseif ($tcpreq->errorType != YAPI::SUCCESS) {
            $errmsg = 'Network error while testing hub :' . $tcpreq->errorMsg;
            return $tcpreq->errorType;
        }
        /** @var YTcpHub $hub */
        foreach (self::$_hubs as $hub) {
            if ($hub->getSerialNumber() == $tcphub->getSerialNumber()) {
                print("Find duplicate hub: new=" . $tcphub->url_info['org_url'] . " old=" . $hub->url_info['org_url'] . "\n");
                $hub->mergeFrom($tcphub);
                return YAPI::SUCCESS;
            }
        }
        // Add hub to known list
        if (!isset(self::$_hubs[$url_detail['rooturl']])) {
            self::$_hubs[$url_detail['rooturl']] = $tcphub;
        }

        // Register device list
        $yreq = self::_updateDeviceList_internal(true, false);
        if ($yreq->errorType != YAPI::SUCCESS) {
            $errmsg = $yreq->errorMsg;
            return $yreq->errorType;
        }

        return YAPI::SUCCESS;
    }

    /**
     * Fault-tolerant alternative to yRegisterHub(). This function has the same
     * purpose and same arguments as yRegisterHub(), but does not trigger
     * an error when the selected hub is not available at the time of the function call.
     * If the connexion cannot be established immediately, a background task will automatically
     * perform periodic retries. This makes it possible to register a network hub independently of the current
     * connectivity, and to try to contact it only when a device is actively needed.
     *
     * @param string $url : a string containing either "usb","callback" or the
     *         root URL of the hub to monitor
     * @param string $errmsg : a string passed by reference to receive any error message.
     *
     * @return int  YAPI::SUCCESS when the call succeeds.
     *
     * On failure returns a negative error code.
     */
    public static function PreregisterHub(string $url, ?string &$errmsg = ''): int
    {
        if (is_null(self::$_hubs)) {
            self::_init();
        }
        $previousHub = self::getHubFromUrl($url);
        if (sizeof($previousHub) > 0) {
            /** @var YTcpHub $h */
            foreach ($previousHub as $h) {
                if ($h->isEnable()) {
                    $h->addKnownUrl($url);
                    $h->setMandatory(false);
                }
            }
            return YAPI::SUCCESS;
        }
        $url_detail = self::_parseRegisteredURL($url);
        if ($url_detail['proto'] == "wss" || $url_detail['proto'] == "ws") {
            $errmsg = "Websocket is not available in PHP";
            return YAPI::NOT_SUPPORTED;
        }
        // Add hub to known list
        if (!isset(self::$_hubs[$url_detail['rooturl']])) {
            self::$_hubs[$url_detail['rooturl']] = new YTcpHub($url_detail, false);
            if (self::$_hubs[$url_detail['rooturl']]->verfiyStreamAddr(true, $errmsg) < 0) {
                return YAPI::IO_ERROR;
            }
        }

        return YAPI::SUCCESS;
    }


    /**
     * Set up the Yoctopuce library to no more use modules connected on a previously
     * registered machine with RegisterHub.
     *
     * @param string $url : a string containing either "usb" or the
     *         root URL of the hub to monitor
     */
    public static function UnregisterHub(string $url): void
    {
        if (is_null(self::$_hubs)) {
            return;
        }

        /** @var YTcpHub[] $hubs */
        $hubs = self::getHubFromUrl($url);
        foreach ($hubs as $hub) {
            // leave max 10 second to finish pending requests
            $timeout = YAPI::GetTickCount() + 10000;
            foreach (self::$_pendingRequests as $tcpreq) {
                if ($tcpreq->hub->getRooturl() === $hub->getRooturl()) {
                    $request = trim($tcpreq->request);
                    if (substr($request, 0, 12) == 'GET /not.byn') {
                        continue;
                    }
                    while (!$tcpreq->eof() && YAPI::GetTickCount() < $timeout) {
                        self::_handleEvents_internal(100);
                    }
                }
            }
            // remove all connected devices
            foreach ($hub->serialByYdx as $serial) {
                self::_unplugDevice($serial);
            }
            if ($hub->notifReq) {
                $hub->notifReq->close();
                for ($idx = 0; $idx < sizeof(self::$_pendingRequests); $idx++) {
                    $req = self::$_pendingRequests[$idx];
                    if ($req == $hub->notifReq) {
                        array_splice(self::$_pendingRequests, $idx, 1);
                    }
                }
            }

            $key = array_search($hub, self::$_hubs, true);
            if ($key !== false) {
                unset(self::$_hubs[$key]);
            }
        }

    }

    /**
     * Test if the hub is reachable. This method do not register the hub, it only test if the
     * hub is usable. The url parameter follow the same convention as the yRegisterHub
     * method. This method is useful to verify the authentication parameters for a hub. It
     * is possible to force this method to return after mstimeout milliseconds.
     *
     * @param string $url : a string containing either "usb","callback" or the
     *         root URL of the hub to monitor
     * @param int $mstimeout : the number of millisecond available to test the connection.
     * @param string $errmsg : a string passed by reference to receive any error message.
     *
     * @return int  YAPI::SUCCESS when the call succeeds.
     *
     * On failure returns a negative error code.
     */
    public static function TestHub(string $url, int $mstimeout, ?string &$errmsg = ''): int
    {
        if ($url == 'net') {
            $errmsg = "Invalid URL";
            return YAPI::INVALID_ARGUMENT;
        } elseif ($url == 'usb') {
            $errmsg = "USB is not available in PHP";
            return YAPI::NOT_SUPPORTED;
        }
        if (is_null(self::$_hubs)) {
            self::_init();
        }
        $url_detail = self::_parseRegisteredURL($url);
        if ($url_detail['proto'] == "wss" || $url_detail['proto'] == "ws") {
            $errmsg = "Websocket is not available in PHP";
            return YAPI::NOT_SUPPORTED;
        }
        // Test hub
        $tcphub = new YTcpHub($url_detail, false);
        $timeout = YAPI::GetTickCount() + $mstimeout;
        $tcphub->set_networkTimeout($mstimeout);
        $res = $tcphub->verfiyStreamAddr(false, $errmsg);
        if ($res < 0) {
            return YAPI::IO_ERROR;
        }
        if ($tcphub->streamaddr == 'tcp://CALLBACK') {
            return YAPI::SUCCESS;
        }
        $tickCount = (int)YAPI::GetTickCount();
        if ($tickCount >= $timeout) {
            $errmsg = 'Timeout waiting for device reply';
            return YAPI::TIMEOUT;
        }
        $tcpreq = new YTcpReq($tcphub, "GET /api/module.json", false, '', $mstimeout - $tickCount);
        do {
            if ($tcpreq->process($errmsg) != YAPI::SUCCESS) {
                return $tcpreq->errorType;
            }
        } while (!$tcpreq->eof() && YAPI::GetTickCount() < $timeout);
        if (!$tcpreq->eof()) {
            $tcpreq->close();
            $errmsg = 'Timeout waiting for device reply';
            return YAPI::TIMEOUT;
        }
        if ($tcpreq->errorType == YAPI::UNAUTHORIZED) {
            $errmsg = 'Access denied, authorization required';
            return YAPI::UNAUTHORIZED;
        } elseif ($tcpreq->errorType != YAPI::SUCCESS) {
            $errmsg = 'Network error while testing hub :' . $tcpreq->errorMsg;
            return $tcpreq->errorType;
        }
        return YAPI::SUCCESS;
    }

    /**
     * @param string $host
     * @param string $relurl
     * @param $cbdata
     * @param string $errmsg
     * @return int
     */
    static public function _forwardHTTPreq(string $proto, string $host, string $relurl, $cbdata, ?string &$errmsg): int
    {
        $errno = 0;
        $errstr = '';
        $implicitPort = '';
        if (strpos($host, ':') === false) {
            if ($proto == 'tls://') {
                $implicitPort = ':443';
            } else {
                $implicitPort = ':80';
            }
        }
        $skt = stream_socket_client($proto . $host . $implicitPort, $errno, $errstr, 10);
        if ($skt === false) {
            $errmsg = "failed to open socket ($errno): $errstr";
            return YAPI::IO_ERROR;
        }
        $request = "POST $relurl HTTP/1.1\r\nHost: $host\r\nConnection: close\r\n";
        $request .= "User-Agent: " . $_SERVER['HTTP_USER_AGENT'] . "\r\n";
        $request .= "Content-Type: application/json\r\n";
        $request .= "Content-Length: " . strlen($cbdata) . "\r\n\r\n";
        $reqlen = strlen($request);
        if (fwrite($skt, $request, $reqlen) != $reqlen) {
            fclose($skt);
            $errmsg = "failed to write to socket";
            return YAPI::IO_ERROR;
        }
        $bodylen = strlen($cbdata);
        fwrite($skt, $cbdata, $bodylen);
        stream_set_blocking($skt, false);
        $header = '';
        $headerOK = false;
        $chunked = false;
        $chunkhdr = '';
        $chunksize = 0;
        while (true) {
            $data = fread($skt, 8192);
            if ($data === false || !is_resource($skt)) {
                fclose($skt);
                $errmsg = "failed to read from socket";
                return YAPI::IO_ERROR;
            }
            if (strlen($data) == 0) {
                if (feof($skt)) {
                    fclose($skt);
                    if (!$headerOK) {
                        $errmsg = "connection closed unexpectly";
                        return YAPI::IO_ERROR;
                    }
                    return YAPI::SUCCESS;
                } else {
                    $rd = array($skt);
                    $wr = null;
                    $ex = null;
                    /** @noinspection PhpUnusedLocalVariableInspection */
                    if (false === ($select_res = stream_select($rd, $wr, $ex, 0, 1000000))) {
                        $errmsg = "stream select error";
                        return YAPI::IO_ERROR;
                    }
                }
                continue;
            }
            if (!$headerOK) {
                $header .= $data;
                $data = '';
                $eoh = strpos($header, "\r\n\r\n");
                if ($eoh !== false) {
                    // fully received header
                    $headerOK = true;
                    $data = substr($header, $eoh + 4);
                    $header = substr($header, 0, $eoh + 4);
                    $lines = explode("\r\n", preg_replace('/\x0D\x0A[\x09\x20]+/', ' ', $header));
                    $meta = array();
                    foreach ($lines as $line) {
                        if (preg_match('/([^:]+): (.+)/m', $line, $match)) {
                            $match[1] = preg_replace_callback('/(?<=^|[\x09\x20\x2D])./', function ($matches) {
                                return strtoupper($matches[0]);
                            }, strtolower(trim($match[1])));
                            $meta[strtolower($match[1])] = trim($match[2]);
                        }
                    }
                    $firstline = $lines[0];
                    $words = explode(' ', $firstline);
                    $code = $words[1];
                    if ($code == '401') {
                        fclose($skt);
                        $errmsg = "HTTP Authentication not supported";
                        return YAPI::UNAUTHORIZED;
                    } elseif ($code == '101') {
                        fclose($skt);
                        $errmsg = "Websocket not supported";
                        return YAPI::NOT_SUPPORTED;
                    } elseif ($code >= '300' && $code <= '302' && isset($meta['location'])) {
                        fclose($skt);
                        return self::_forwardHTTPreq($proto, $host, $meta['location'], $cbdata, $errmsg);
                    } elseif (substr($code, 0, 2) != '20' || $code[2] == '3') {
                        fclose($skt);
                        $errmsg = "HTTP error" . substr($firstline, strlen($words[0]));
                        return YAPI::NOT_SUPPORTED;
                    }
                    $chunked = isset($meta['transfer-encoding']) && strtolower($meta['transfer-encoding']) == 'chunked';
                }
            }
            // process body according to encoding
            if (!$chunked) {
                print $data;
                continue;
            }
            // chunk decoding
            while (strlen($data) > 0) {
                if ($chunksize == 0) {
                    // reading chunk size
                    $chunkhdr .= $data;
                    if (substr($chunkhdr, 0, 2) == "\r\n") {
                        $chunkhdr = substr($chunkhdr, 2);
                    }
                    $endhdr = strpos($chunkhdr, "\r\n");
                    if ($endhdr !== false) {
                        $data = substr($chunkhdr, $endhdr + 2);
                        $sizestr = substr($chunkhdr, 0, $endhdr);
                        $chunksize = hexdec($sizestr);
                        $chunkhdr = '';
                    } else {
                        $data = '';
                    }
                } else {
                    // reading chunk data
                    $datalen = strlen($data);
                    if ($datalen > $chunksize) {
                        $datalen = $chunksize;
                    }
                    print(substr($data, 0, $datalen));
                    $data = substr($data, $datalen);
                    $chunksize -= $datalen;
                }
            }
        }
    }

    /**
     * Trigger an HTTP request to another server, and forward the HTTP callback data
     * previously received from a YoctoHub. This function only works after a successful
     * call to yRegisterHub("callback")
     *
     * @param string $url a string containing the URL of the server to which the HTTP callback
     *              should be forwarded
     * @param string $errmsg : a string passed by reference to receive any error message.
     *
     * @return int  YAPI::SUCCESS when the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     */
    public static function ForwardHTTPCallback(string $url, ?string &$errmsg = ""): int
    {
        $url_detail = self::_parseRegisteredURL('callback');
        if (isset(self::$_hubs[$url_detail['rooturl']])) {
            $cb_hub = self::$_hubs[$url_detail['rooturl']];
            // data to post is found in $cb_hub->callbackData
            $fwd_proto = 'tcp://';
            if (strpos($url, 'http://') === 0) {
                $url = substr($url, 7);
            } elseif (strpos($url, 'https://') === 0) {
                $fwd_proto = 'tls://';
                $url = substr($url, 8);
            }
            $url = str_replace(['http://', 'https://'], ['', ''], $url);
            $pos = strpos($url, '/');
            if ($pos === false) {
                $relurl = '/';
            } else {
                $relurl = substr($url, $pos);
                $url = substr($url, 0, $pos);
            }
            return self::_forwardHTTPreq($fwd_proto, $url, $relurl, $cb_hub->callbackData, $errmsg);
        } else {
            $errmsg = 'ForwardHTTPCallback must be called AFTER RegisterHub("callback")';
            return YAPI::NOT_INITIALIZED;
        }
    }

    /**
     * Triggers a (re)detection of connected Yoctopuce modules.
     * The library searches the machines or USB ports previously registered using
     * yRegisterHub(), and invokes any user-defined callback function
     * in case a change in the list of connected devices is detected.
     *
     * This function can be called as frequently as desired to refresh the device list
     * and to make the application aware of hot-plug events. However, since device
     * detection is quite a heavy process, UpdateDeviceList shouldn't be called more
     * than once every two seconds.
     *
     * @param string $errmsg : a string passed by reference to receive any error message.
     *
     * @return int  YAPI::SUCCESS when the call succeeds.
     *
     * On failure returns a negative error code.
     */
    public static function UpdateDeviceList(?string &$errmsg = ''): int
    {
        $yreq = self::_updateDeviceList_internal(false, true);
        if ($yreq->errorType != YAPI::SUCCESS) {
            $errmsg = $yreq->errorMsg;
            return self::_throw($yreq->errorType, $yreq->errorMsg, $yreq->errorType);
        }
        return YAPI::SUCCESS;
    }

    /**
     * Maintains the device-to-library communication channel.
     * If your program includes significant loops, you may want to include
     * a call to this function to make sure that the library takes care of
     * the information pushed by the modules on the communication channels.
     * This is not strictly necessary, but it may improve the reactivity
     * of the library for the following commands.
     *
     * This function may signal an error in case there is a communication problem
     * while contacting a module.
     *
     * @param string $errmsg : a string passed by reference to receive any error message.
     *
     * @return int  YAPI::SUCCESS when the call succeeds.
     *
     * On failure returns a negative error code.
     */
    public static function HandleEvents(?string &$errmsg = ''): int
    {
        // monitor hubs for events
        /** @noinspection PhpStatementHasEmptyBodyInspection */
        while (self::_handleEvents_internal(0)) {
        }

        // handle pending events
        $nEvents = sizeof(self::$_data_events);
        for ($i = 0; $i < $nEvents; $i++) {
            $evt = self::$_data_events[$i];
            if (sizeof($evt) == 1) {
                $evt[0]->isOnline();
            } else {
                if (is_string($evt[1])) {
                    /** @var YFunction $fun */
                    $fun = $evt[0];
                    // event object is an advertised value
                    $fun->_invokeValueCallback($evt[1]);

                } else {
                    /** @var YSensor $ysensor */
                    $ysensor = $evt[0];
                    // event object is an array of bytes (encoded timed report)
                    try {
                        $dev = YAPI::getDevice($ysensor->get_module()->get_serialNumber());
                        if (!is_null($dev)) {
                            $report = $ysensor->_decodeTimedReport($evt[1], $evt[2], $evt[3]);
                            $ysensor->_invokeTimedReportCallback($report);
                        }
                    } catch (YAPI_Exception $ignore) {
                        // module is offline
                    }
                }
            }
        }
        self::$_data_events = array_slice(self::$_data_events, $nEvents);
        $errmsg = '';

        return YAPI::SUCCESS;
    }

    /**
     * Pauses the execution flow for a specified duration.
     * This function implements a passive waiting loop, meaning that it does not
     * consume CPU cycles significantly. The processor is left available for
     * other threads and processes. During the pause, the library nevertheless
     * reads from time to time information from the Yoctopuce modules by
     * calling yHandleEvents(), in order to stay up-to-date.
     *
     * This function may signal an error in case there is a communication problem
     * while contacting a module.
     *
     * @param float $ms_duration : an integer corresponding to the duration of the pause,
     *         in milliseconds.
     * @param string $errmsg : a string passed by reference to receive any error message.
     *
     * @return int  YAPI::SUCCESS when the call succeeds.
     *
     * On failure returns a negative error code.
     */
    public static function Sleep(float $ms_duration, ?string &$errmsg = ''): int
    {
        $end = YAPI::GetTickCount() + $ms_duration;
        self::HandleEvents($errmsg);
        $remain = $end - YAPI::GetTickCount();
        while ($remain > 0) {
            if ($remain > 999) {
                $remain = 999;
            }
            self::_handleEvents_internal((int)$remain);
            self::HandleEvents($errmsg);
            $remain = $end - YAPI::GetTickCount();
        }
        $errmsg = '';

        return YAPI::SUCCESS;
    }

    /**
     * Returns the current value of a monotone millisecond-based time counter.
     * This counter can be used to compute delays in relation with
     * Yoctopuce devices, which also uses the millisecond as timebase.
     *
     * @return float  a long integer corresponding to the millisecond counter.
     */
    public static function GetTickCount(): float
    {
        return round(microtime(true) * 1000);
    }

    /**
     * Checks if a given string is valid as logical name for a module or a function.
     * A valid logical name has a maximum of 19 characters, all among
     * A...Z, a...z, 0...9, _, and -.
     * If you try to configure a logical name with an incorrect string,
     * the invalid characters are ignored.
     *
     * @param string $name : a string containing the name to check.
     *
     * @return boolean  true if the name is valid, false otherwise.
     */
    public static function CheckLogicalName(string $name): bool
    {
        if ($name == '') {
            return true;
        }
        if (!$name) {
            return false;
        }
        if (strlen($name) > 19) {
            return false;
        }
        return preg_match('/^[A-Za-z0-9_\-]*$/', $name) > 0;
    }

    /**
     * Register a callback function, to be called each time
     * a device is plugged. This callback will be invoked while yUpdateDeviceList
     * is running. You will have to call this function on a regular basis.
     *
     * @param callable $arrivalCallback : a procedure taking a YModule parameter, or null
     *         to unregister a previously registered  callback.
     */
    public static function RegisterDeviceArrivalCallback(?callable $arrivalCallback): void
    {
        self::$_arrivalCallback = $arrivalCallback;
    }

    /**
     * Register a device logical name change callback
     */
    public static function RegisterDeviceChangeCallback(?callable $changeCallback): void
    {
        self::$_namechgCallback = $changeCallback;
    }

    /**
     * Register a callback function, to be called each time
     * a device is unplugged. This callback will be invoked while yUpdateDeviceList
     * is running. You will have to call this function on a regular basis.
     *
     * @param callable $removalCallback : a procedure taking a YModule parameter, or null
     *         to unregister a previously registered  callback.
     */
    public static function RegisterDeviceRemovalCallback(?callable $removalCallback): void
    {
        self::$_removalCallback = $removalCallback;
    }

    // Register a new value calibration handler for a given calibration type
    //
    public static function RegisterCalibrationHandler(int $calibrationType, ?callable $calibrationHandler): void
    {
        self::$_calibHandlers[$calibrationType] = $calibrationHandler;
    }

    // Standard value calibration handler (n-point linear error correction)
    //
    public static function LinearCalibrationHandler(
        float $float_rawValue,
        int $int_calibType,
        array $arr_calibParams,
        array $arr_calibRawValues,
        array $arr_calibRefValues
    ): float {
        $x = $arr_calibRawValues[0];
        $adj = $arr_calibRefValues[0] - $x;
        $i = 0;

        if ($int_calibType < YOCTO_CALIB_TYPE_OFS) {
            // calibration types n=1..10 are meant for linear calibration using n points
            $npt = min($int_calibType % 10, sizeof($arr_calibRawValues), sizeof($arr_calibRefValues));
        } else {
            $npt = sizeof($arr_calibRefValues);
        }
        while ($float_rawValue > $arr_calibRawValues[$i] && ++$i < $npt) {
            $x2 = $x;
            $adj2 = $adj;

            $x = $arr_calibRawValues[$i];
            $adj = $arr_calibRefValues[$i] - $x;

            if ($float_rawValue < $x && $x > $x2) {
                $adj = $adj2 + ($adj - $adj2) * ($float_rawValue - $x2) / ($x - $x2);
            }
        }
        return $float_rawValue + $adj;
    }

    // Network notification format: 7x7bit (mapped to 7 chars in range 32..159)
    //                              used to represent 1 flag (RAW6BYTES) + 6 bytes
    // INPUT:  [R765432][1076543][2107654][3210765][4321076][5432107][6543210]
    // OUTPUT: 7 bytes array (1 byte for the funcTypeV2 and 6 bytes of USB like data
    //                     funcTypeV2 + [R][-byte 0][-byte 1-][-byte 2-][-byte 3-][-byte 4-][-byte 5-]
    //
    // return null on error
    //
    private static function decodeNetFuncValV2(string $p): ?array
    {
        $p_ofs = 0;
        $ch = ord($p[$p_ofs]);
        $len = 0;
        $funcVal = array_fill(0, 7, 0);

        if ($ch < 32 || $ch > 32 + 127) {
            return null;
        }
        // get the 7 first bits
        $ch -= 32;
        $funcVal[0] = (($ch & 0x40) != 0 ? NOTIFY_V2_6RAWBYTES : NOTIFY_V2_TYPEDDATA);
        // clear flag
        $ch &= 0x3f;
        while ($len < YOCTO_PUBVAL_SIZE) {
            $p_ofs++;
            if ($p_ofs >= strlen($p)) {
                break;
            }
            $newCh = ord($p[$p_ofs]);
            if ($newCh == NOTIFY_NETPKT_STOP) {
                break;
            }
            if ($newCh < 32 || $newCh > 32 + 127) {
                return null;
            }
            $newCh -= 32;
            $ch = ($ch << 7) + $newCh;
            $funcVal[$len + 1] = ($ch >> (5 - $len)) & 0xff;
            $len++;
        }
        return $funcVal;
    }

    private static function decodePubVal(int $typeV2, array $funcval, int $ofs, int $funcvalen): string
    {
        $buffer = "";
        if ($typeV2 == NOTIFY_V2_6RAWBYTES || $typeV2 == NOTIFY_V2_TYPEDDATA) {
            if ($typeV2 == NOTIFY_V2_6RAWBYTES) {
                $funcValType = PUBVAL_6RAWBYTES;
            } else {
                $funcValType = $funcval[$ofs++];
            }
            switch ($funcValType) {
                case PUBVAL_LEGACY:
                    // fallback to legacy handling, just in case
                    break;
                case PUBVAL_1RAWBYTE:
                case PUBVAL_2RAWBYTES:
                case PUBVAL_3RAWBYTES:
                case PUBVAL_4RAWBYTES:
                case PUBVAL_5RAWBYTES:
                case PUBVAL_6RAWBYTES:
                    // 1..5 hex bytes
                    for ($i = 0; $i < $funcValType; $i++) {
                        $c = $funcval[$ofs++];
                        $b = $c >> 4;
                        $buffer .= dechex($b);
                        $b = $c & 0xf;
                        $buffer .= dechex($b);
                    }
                    return $buffer;
                case PUBVAL_C_LONG:
                case PUBVAL_YOCTO_FLOAT_E3:
                    // 32bit integer in little endian format or Yoctopuce 10-3 format
                    $numVal = $funcval[$ofs++];
                    $numVal += $funcval[$ofs++] << 8;
                    $numVal += $funcval[$ofs++] << 16;
                    $numVal += $funcval[$ofs] << 24;
                    if ($funcValType == PUBVAL_C_LONG) {
                        return sprintf("%d", $numVal);
                    } else {
                        $buffer = sprintf("%.3f", $numVal / 1000.0);
                        $endp = strlen($buffer);
                        while ($endp > 0 && $buffer[$endp - 1] == '0') {
                            --$endp;
                        }
                        if ($endp > 0 && $buffer[$endp - 1] == '.') {
                            --$endp;
                            $buffer = substr($buffer, 0, $endp);
                        }
                        return $buffer;
                    }
                case PUBVAL_C_FLOAT:
                    // 32bit (short) float
                    $v = $funcval[$ofs++];
                    $v += $funcval[$ofs++] << 8;
                    $v += $funcval[$ofs++] << 16;
                    $v += $funcval[$ofs] << 24;
                    $fraction = ($v & ((1 << 23) - 1)) + (1 << 23) * ($v >> 31 | 1);
                    $exp = ($v >> 23 & 0xFF) - 127;
                    $floatVal = $fraction * pow(2, $exp - 23);
                    $buffer = sprintf("%.6f", $floatVal);
                    $endp = strlen($buffer);
                    while ($endp > 0 && $buffer[$endp - 1] == '0') {
                        --$endp;
                    }
                    if ($endp > 0 && $buffer[$endp - 1] == '.') {
                        --$endp;
                        $buffer = substr($buffer, 0, $endp);
                    }
                    return $buffer;
                default:
                    return "?";
            }
        }
        // Legacy handling: just pad with NUL up to 7 chars
        $len = 0;
        /** @noinspection PhpConditionAlreadyCheckedInspection */
        $buffer = '';
        while ($len < YOCTO_PUBVAL_SIZE && $len < $funcvalen) {
            if ($funcval[$len] == 0) {
                break;
            }
            $buffer .= chr($funcval[$len]);
            $len++;
        }
        return $buffer;
    }

    public static function nextHubRef(int $hubref): int
    {
        if (is_null(self::$_hubs)) {
            self::_init();
        }

        if ($hubref < 0) {
            $next = 0;
        } else {
            $next = $hubref + 1;
        }
        $c = 0;
        foreach (self::$_hubs as $hub) {
            /** @var YTcpHub $hub */
            if ($c == $next && $hub->isEnable()) {
                return $c;
            }
            $c++;
        }

        return -1;
    }

    public static function getTcpHubFromRef(int $hubref): ?YTcpHub
    {
        $c = 0;
        foreach (self::$_hubs as $hub) {
            /** @var YTcpHub $hub */
            if ($c == $hubref && $hub->isEnable()) {
                return $hub;
            }
            $c++;
        }
        return null;
    }

    public static function _checkForDuplicateHub(YTcpHub $newHub): bool
    {
        $serialNumber = $newHub->getSerialNumber();
        foreach (self::$_hubs as $hub) {
            if ($hub->isEnable() && $hub !== $newHub && $hub->getSerialNumber() == $serialNumber) {
                $hub->mergeFrom($newHub);
                return true;
            }
        }
        return false;
    }

}

//^^^^ YAPI.php

//--- (generated code: YMeasure declaration)
//vvvv YMeasure.php

/**
 * YMeasure Class: Measured value, returned in particular by the methods of the YDataSet class.
 *
 * YMeasure objects are used within the API to represent
 * a value measured at a specified time. These objects are
 * used in particular in conjunction with the YDataSet class,
 * but also for sensors periodic timed reports
 * (see sensor.registerTimedReportCallback).
 */
class YMeasure
{
    //--- (end of generated code: YMeasure declaration)
    const DATA_INVALID = YAPI::INVALID_DOUBLE;

    //--- (generated code: YMeasure attributes)
    protected float $_start = 0;                            // float
    protected float $_end = 0;                            // float
    protected float $_minVal = 0;                            // float
    protected float $_avgVal = 0;                            // float
    protected float $_maxVal = 0;                            // float

    //--- (end of generated code: YMeasure attributes)

    public function __construct(float $float_start, float $float_end, float $float_minVal, float $float_avgVal, float $float_maxVal)
    {
        //--- (generated code: YMeasure constructor)
        //--- (end of generated code: YMeasure constructor)

        $this->_start = $float_start;
        $this->_end = $float_end;
        $this->_minVal = $float_minVal;
        $this->_avgVal = $float_avgVal;
        $this->_maxVal = $float_maxVal;
    }

    //--- (generated code: YMeasure implementation)

    /**
     * Returns the start time of the measure, relative to the Jan 1, 1970 UTC
     * (Unix timestamp). When the recording rate is higher then 1 sample
     * per second, the timestamp may have a fractional part.
     *
     * @return float  a floating point number corresponding to the number of seconds
     *         between the Jan 1, 1970 UTC and the beginning of this measure.
     */
    public function get_startTimeUTC(): float
    {
        return $this->_start;
    }

    /**
     * Returns the end time of the measure, relative to the Jan 1, 1970 UTC
     * (Unix timestamp). When the recording rate is higher than 1 sample
     * per second, the timestamp may have a fractional part.
     *
     * @return float  a floating point number corresponding to the number of seconds
     *         between the Jan 1, 1970 UTC and the end of this measure.
     */
    public function get_endTimeUTC(): float
    {
        return $this->_end;
    }

    /**
     * Returns the smallest value observed during the time interval
     * covered by this measure.
     *
     * @return float  a floating-point number corresponding to the smallest value observed.
     */
    public function get_minValue(): float
    {
        return $this->_minVal;
    }

    /**
     * Returns the average value observed during the time interval
     * covered by this measure.
     *
     * @return float  a floating-point number corresponding to the average value observed.
     */
    public function get_averageValue(): float
    {
        return $this->_avgVal;
    }

    /**
     * Returns the largest value observed during the time interval
     * covered by this measure.
     *
     * @return float  a floating-point number corresponding to the largest value observed.
     */
    public function get_maxValue(): float
    {
        return $this->_maxVal;
    }

    //--- (end of generated code: YMeasure implementation)
}

//^^^^ YMeasure.php

//--- (generated code: YFirmwareUpdate declaration)
//vvvv YFirmwareUpdate.php

/**
 * YFirmwareUpdate Class: Firmware update process control interface, returned by module.updateFirmware method.
 *
 * The YFirmwareUpdate class let you control the firmware update of a Yoctopuce
 * module. This class should not be instantiate directly, but instances should be retrieved
 * using the YModule method module.updateFirmware.
 */
class YFirmwareUpdate
{
    //--- (end of generated code: YFirmwareUpdate declaration)
    const DATA_INVALID = YAPI::INVALID_DOUBLE;

    //--- (generated code: YFirmwareUpdate attributes)
    protected string $_serial = "";                           // str
    protected string $_settings = "";                           // bin
    protected string $_firmwarepath = "";                           // str
    protected string $_progress_msg = "";                           // str
    protected int $_progress_c = 0;                            // int
    protected int $_progress = 0;                            // int
    protected int $_restore_step = 0;                            // int
    protected bool $_force = false;                        // bool

    //--- (end of generated code: YFirmwareUpdate attributes)

    public function __construct(string $serial, string $path, string $settings, bool $force)
    {
        //--- (generated code: YFirmwareUpdate constructor)
        //--- (end of generated code: YFirmwareUpdate constructor)
        $this->_serial = $serial;
        $this->_firmwarepath = $path;
        $this->_settings = $settings;
        $this->_force = $force;
    }

    private function _processMore_internal(int $i): int
    {
        //not yet implemented
        $this->_progress = -1;
        $this->_progress_msg = "Not supported in PHP";
        return $this->_progress;
    }

    private static function CheckFirmware_internal(string $serial, string $path, int $minrelease): string
    {
        if ($path == "http://www.yoctopuce.com" || $path == "http://www.yoctopuce.com" || $path == "www.yoctopuce.com") {
            $yoctopuce_infos = file_get_contents('https://www.yoctopuce.com/FR/common/getLastFirmwareLink.php?serial=' . $serial);
            if ($yoctopuce_infos === false) {
                return 'error: Unable to get last firmware info from www.yoctopuce.com';
            }
            $jsonData = json_decode($yoctopuce_infos, true);
            if (!array_key_exists('link', $jsonData) || !array_key_exists('version', $jsonData)) {
                return 'error: Invalid JSON response from www.yoctopuce.com';
            }
            $link = $jsonData['link'];
            $version = intVal($jsonData['version']);
            if ($minrelease > 0) {
                if ($version > $minrelease) {
                    return $link;
                }
            } else {
                return $link;
            }
            return '';
        } else {
            return 'error: Not yet supported in PHP';
        }
    }

    private static function GetAllBootLoaders_internal(): array
    {
        return array();
    }


    //--- (generated code: YFirmwareUpdate implementation)

    /**
     * @throws YAPI_Exception on error
     */
    public function _processMore(int $newupdate): int
    {
        return $this->_processMore_internal($newupdate);
    }

    //cannot be generated for PHP:
    //private function _processMore_internal(int $newupdate)

    /**
     * Returns a list of all the modules in "firmware update" mode.
     *
     * @return string[]  an array of strings containing the serial numbers of devices in "firmware update" mode.
     */
    public static function GetAllBootLoaders(): array
    {
        return self::GetAllBootLoaders_internal();
    }

    //cannot be generated for PHP:
    //private static function GetAllBootLoaders_internal()

    /**
     * Test if the byn file is valid for this module. It is possible to pass a directory instead of a file.
     * In that case, this method returns the path of the most recent appropriate byn file. This method will
     * ignore any firmware older than minrelease.
     *
     * @param string $serial : the serial number of the module to update
     * @param string $path : the path of a byn file or a directory that contains byn files
     * @param int $minrelease : a positive integer
     *
     * @return string  : the path of the byn file to use, or an empty string if no byn files matches the requirement
     *
     * On failure, returns a string that starts with "error:".
     */
    public static function CheckFirmware(string $serial, string $path, int $minrelease): string
    {
        return self::CheckFirmware_internal($serial, $path, $minrelease);
    }

    //cannot be generated for PHP:
    //private static function CheckFirmware_internal(string $serial, string $path, int $minrelease)

    /**
     * Returns the progress of the firmware update, on a scale from 0 to 100. When the object is
     * instantiated, the progress is zero. The value is updated during the firmware update process until
     * the value of 100 is reached. The 100 value means that the firmware update was completed
     * successfully. If an error occurs during the firmware update, a negative value is returned, and the
     * error message can be retrieved with get_progressMessage.
     *
     * @return int  an integer in the range 0 to 100 (percentage of completion)
     *         or a negative error code in case of failure.
     */
    public function get_progress(): int
    {
        if ($this->_progress >= 0) {
            $this->_processMore(0);
        }
        return $this->_progress;
    }

    /**
     * Returns the last progress message of the firmware update process. If an error occurs during the
     * firmware update process, the error message is returned
     *
     * @return string  a string  with the latest progress message, or the error message.
     */
    public function get_progressMessage(): string
    {
        return $this->_progress_msg;
    }

    /**
     * Starts the firmware update process. This method starts the firmware update process in background. This method
     * returns immediately. You can monitor the progress of the firmware update with the get_progress()
     * and get_progressMessage() methods.
     *
     * @return int  an integer in the range 0 to 100 (percentage of completion),
     *         or a negative error code in case of failure.
     *
     * On failure returns a negative error code.
     */
    public function startUpdate(): int
    {
        // $err                    is a str;
        // $leng                   is a int;
        $err = YAPI::Ybin2str($this->_settings);
        $leng = strlen($err);
        if (($leng >= 6) && ('error:' == substr($err, 0, 6))) {
            $this->_progress = -1;
            $this->_progress_msg = substr($err, 6, $leng - 6);
        } else {
            $this->_progress = 0;
            $this->_progress_c = 0;
            $this->_processMore(1);
        }
        return $this->_progress;
    }

    //--- (end of generated code: YFirmwareUpdate implementation)
}

//^^^^ YFirmwareUpdate.php
//--- (generated code: YDataStream declaration)
//vvvv YDataStream.php

/**
 * YDataStream Class: Unformatted data sequence
 *
 * DataStream objects represent bare recorded measure sequences,
 * exactly as found within the data logger present on Yoctopuce
 * sensors.
 *
 * In most cases, it is not necessary to use DataStream objects
 * directly, as the DataSet objects (returned by the
 * get_recordedData() method from sensors and the
 * get_dataSets() method from the data logger) provide
 * a more convenient interface.
 */
class YDataStream
{
    //--- (end of generated code: YDataStream declaration)
    const DATA_INVALID = YAPI::INVALID_DOUBLE;
    protected mixed $_cal = null;

    //--- (generated code: YDataStream attributes)
    protected ?YFunction $_parent = null;                         // YFunction
    protected int $_runNo = 0;                            // int
    protected float $_utcStamp = 0;                            // u32
    protected int $_nCols = 0;                            // int
    protected int $_nRows = 0;                            // int
    protected float $_startTime = 0;                            // float
    protected float $_duration = 0;                            // float
    protected float $_dataSamplesInterval = 0;                            // float
    protected float $_firstMeasureDuration = 0;                            // float
    protected array $_columnNames = [];                           // strArr
    protected string $_functionId = "";                           // str
    protected bool $_isClosed = false;                        // bool
    protected bool $_isAvg = false;                        // bool
    protected float $_minVal = 0;                            // float
    protected float $_avgVal = 0;                            // float
    protected float $_maxVal = 0;                            // float
    protected array $_values = [];                           // floatArrArr
    protected bool $_isLoaded = false;                        // bool

    //--- (end of generated code: YDataStream attributes)
    private mixed $_calhdl;

    public function __construct(YFunction $obj_parent, ?YDataSet $obj_dataset = null, ?array $encoded = null)
    {
        //--- (generated code: YDataStream constructor)
        //--- (end of generated code: YDataStream constructor)
        $this->_parent = $obj_parent;
        $this->_calhdl = null;
        if (!is_null($obj_dataset)) {
            $this->_initFromDataSet($obj_dataset, $encoded);
        }
    }

    //--- (generated code: YDataStream implementation)

    /**
     * @throws YAPI_Exception on error
     */
    public function _parseCalibArr(array $iCalib): int
    {
        // $caltyp                 is a int;
        // $calhdl                 is a yCalibrationHandler;
        // $maxpos                 is a int;
        // $position               is a int;
        $calpar = [];           // intArr;
        $calraw = [];           // floatArr;
        $calref = [];           // floatArr;
        // $fRaw                   is a float;
        // $fRef                   is a float;
        $caltyp = intVal($iCalib[0] / 1000);
        if ($caltyp < YOCTO_CALIB_TYPE_OFS) {
            // Unknown calibration type: calibrated value will be provided by the device
            $this->_cal = null;
            return YAPI::SUCCESS;
        }
        $calhdl = YAPI::_getCalibrationHandler($caltyp);
        if (!(!is_null($calhdl))) {
            // Unknown calibration type: calibrated value will be provided by the device
            $this->_cal = null;
            return YAPI::SUCCESS;
        }
        // New 32 bits text format
        $maxpos = sizeof($iCalib);
        while (sizeof($calpar) > 0) {
            array_pop($calpar);
        };
        $position = 1;
        while ($position < $maxpos) {
            $calpar[] = $iCalib[$position];
            $position = $position + 1;
        }
        while (sizeof($calraw) > 0) {
            array_pop($calraw);
        };
        while (sizeof($calref) > 0) {
            array_pop($calref);
        };
        $position = 1;
        while ($position + 1 < $maxpos) {
            $fRaw = $iCalib[$position];
            $fRaw = $fRaw / 1000.0;
            $fRef = $iCalib[$position + 1];
            $fRef = $fRef / 1000.0;
            $calraw[] = $fRaw;
            $calref[] = $fRef;
            $position = $position + 2;
        }
        $this->_cal = new YCalibCtx('', $calhdl, $caltyp, $calpar, $calraw, $calref);
        return YAPI::SUCCESS;
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function _initFromDataSet(?YDataSet $dataset, array $encoded): int
    {
        // $val                    is a int;
        // $ms_offset              is a int;
        // $samplesPerHour         is a int;
        // $caltyp                 is a int;
        $iCalib = [];           // intArr;
        // decode sequence header to extract data
        $this->_runNo = $encoded[0] + (($encoded[1] << 16));
        $this->_utcStamp = $encoded[2] + (($encoded[3] << 16));
        $val = $encoded[4];
        $this->_isAvg = (($val & 0x100) == 0);
        $samplesPerHour = ($val & 0xff);
        if (($val & 0x100) != 0) {
            $samplesPerHour = $samplesPerHour * 3600;
        } else {
            if (($val & 0x200) != 0) {
                $samplesPerHour = $samplesPerHour * 60;
            }
        }
        $this->_dataSamplesInterval = 3600.0 / $samplesPerHour;
        $ms_offset = $encoded[6];
        if ($ms_offset < 1000) {
            // new encoding -> add the ms to the UTC timestamp
            $this->_startTime = $this->_utcStamp + ($ms_offset / 1000.0);
        } else {
            // legacy encoding subtract the measure interval form the UTC timestamp
            $this->_startTime = $this->_utcStamp - $this->_dataSamplesInterval;
        }
        $this->_firstMeasureDuration = $encoded[5];
        if (!($this->_isAvg)) {
            $this->_firstMeasureDuration = $this->_firstMeasureDuration / 1000.0;
        }
        $val = $encoded[7];
        $this->_isClosed = ($val != 0xffff);
        if ($val == 0xffff) {
            $val = 0;
        }
        $this->_nRows = $val;
        if ($this->_nRows > 0) {
            if ($this->_firstMeasureDuration > 0) {
                $this->_duration = $this->_firstMeasureDuration + ($this->_nRows - 1) * $this->_dataSamplesInterval;
            } else {
                $this->_duration = $this->_nRows * $this->_dataSamplesInterval;
            }
        } else {
            $this->_duration = 0;
        }
        // precompute decoding parameters
        $iCalib = $dataset->_get_calibration();
        $caltyp = $iCalib[0];
        if ($caltyp == 0) {
            $this->_cal = null;
        } else {
            $this->_parseCalibArr($iCalib);
        }
        // preload column names for backward-compatibility
        $this->_functionId = $dataset->get_functionId();
        if ($this->_isAvg) {
            while (sizeof($this->_columnNames) > 0) {
                array_pop($this->_columnNames);
            };
            $this->_columnNames[] = sprintf('%s_min', $this->_functionId);
            $this->_columnNames[] = sprintf('%s_avg', $this->_functionId);
            $this->_columnNames[] = sprintf('%s_max', $this->_functionId);
            $this->_nCols = 3;
        } else {
            while (sizeof($this->_columnNames) > 0) {
                array_pop($this->_columnNames);
            };
            $this->_columnNames[] = $this->_functionId;
            $this->_nCols = 1;
        }
        // decode min/avg/max values for the sequence
        if ($this->_nRows > 0) {
            $this->_avgVal = $this->_decodeAvg($encoded[8] + ((($encoded[9] ^ 0x8000) << 16)), 1);
            $this->_minVal = $this->_decodeVal($encoded[10] + (($encoded[11] << 16)));
            $this->_maxVal = $this->_decodeVal($encoded[12] + (($encoded[13] << 16)));
        }
        return 0;
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function _parseStream(string $sdata): int
    {
        // $idx                    is a int;
        $udat = [];             // intArr;
        $dat = [];              // floatArr;
        if ($this->_isLoaded && !($this->_isClosed)) {
            return YAPI::SUCCESS;
        }
        if (strlen($sdata) == 0) {
            $this->_nRows = 0;
            return YAPI::SUCCESS;
        }

        $udat = YAPI::_decodeWords($this->_parent->_json_get_string($sdata));
        while (sizeof($this->_values) > 0) {
            array_pop($this->_values);
        };
        $idx = 0;
        if ($this->_isAvg) {
            while ($idx + 3 < sizeof($udat)) {
                while (sizeof($dat) > 0) {
                    array_pop($dat);
                };
                if (($udat[$idx] == 65535) && ($udat[$idx + 1] == 65535)) {
                    $dat[] = NAN;
                    $dat[] = NAN;
                    $dat[] = NAN;
                } else {
                    $dat[] = $this->_decodeVal($udat[$idx + 2] + ((($udat[$idx + 3]) << 16)));
                    $dat[] = $this->_decodeAvg($udat[$idx] + (((($udat[$idx + 1]) ^ 0x8000) << 16)), 1);
                    $dat[] = $this->_decodeVal($udat[$idx + 4] + ((($udat[$idx + 5]) << 16)));
                }
                $idx = $idx + 6;
                $this->_values[] = $dat;
            }
        } else {
            while ($idx + 1 < sizeof($udat)) {
                while (sizeof($dat) > 0) {
                    array_pop($dat);
                };
                if (($udat[$idx] == 65535) && ($udat[$idx + 1] == 65535)) {
                    $dat[] = NAN;
                } else {
                    $dat[] = $this->_decodeAvg($udat[$idx] + (((($udat[$idx + 1]) ^ 0x8000) << 16)), 1);
                }
                $this->_values[] = $dat;
                $idx = $idx + 2;
            }
        }

        $this->_nRows = sizeof($this->_values);
        $this->_isLoaded = true;
        return YAPI::SUCCESS;
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function _wasLoaded(): bool
    {
        return $this->_isLoaded;
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function _get_url(): string
    {
        // $url                    is a str;
        $url = sprintf('logger.json?id=%s&run=%d&utc=%u',
                       $this->_functionId,$this->_runNo,$this->_utcStamp);
        return $url;
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function _get_baseurl(): string
    {
        // $url                    is a str;
        $url = sprintf('logger.json?id=%s&run=%d&utc=',
                       $this->_functionId,$this->_runNo);
        return $url;
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function _get_urlsuffix(): string
    {
        // $url                    is a str;
        $url = sprintf('%u',$this->_utcStamp);
        return $url;
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function loadStream(): int
    {
        return $this->_parseStream($this->_parent->_download($this->_get_url()));
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function _decodeVal(int $w): float
    {
        // $val                    is a float;
        $val = ($w) / 1000.0;
        if (!($this->_cal == null)) {
            $val = call_user_func($this->_cal->hdl, $val, $this->_cal->typ, $this->_cal->par, $this->_cal->raw, $this->_cal->cal);
        }
        return $val;
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function _decodeAvg(int $dw, int $count): float
    {
        // $val                    is a float;
        $val = ($dw) / 1000.0;
        if (!($this->_cal == null)) {
            $val = call_user_func($this->_cal->hdl, $val, $this->_cal->typ, $this->_cal->par, $this->_cal->raw, $this->_cal->cal);
        }
        return $val;
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function isClosed(): bool
    {
        return $this->_isClosed;
    }

    /**
     * Returns the run index of the data stream. A run can be made of
     * multiple datastreams, for different time intervals.
     *
     * @return int  an unsigned number corresponding to the run index.
     */
    public function get_runIndex(): int
    {
        return $this->_runNo;
    }

    /**
     * Returns the relative start time of the data stream, measured in seconds.
     * For recent firmwares, the value is relative to the present time,
     * which means the value is always negative.
     * If the device uses a firmware older than version 13000, value is
     * relative to the start of the time the device was powered on, and
     * is always positive.
     * If you need an absolute UTC timestamp, use get_realStartTimeUTC().
     *
     * <b>DEPRECATED</b>: This method has been replaced by get_realStartTimeUTC().
     *
     * @return int  an unsigned number corresponding to the number of seconds
     *         between the start of the run and the beginning of this data
     *         stream.
     */
    public function get_startTime(): int
    {
        return $this->_utcStamp - time();
    }

    /**
     * Returns the start time of the data stream, relative to the Jan 1, 1970.
     * If the UTC time was not set in the datalogger at the time of the recording
     * of this data stream, this method returns 0.
     *
     * <b>DEPRECATED</b>: This method has been replaced by get_realStartTimeUTC().
     *
     * @return float  an unsigned number corresponding to the number of seconds
     *         between the Jan 1, 1970 and the beginning of this data
     *         stream (i.e. Unix time representation of the absolute time).
     */
    public function get_startTimeUTC(): float
    {
        return round($this->_startTime);
    }

    /**
     * Returns the start time of the data stream, relative to the Jan 1, 1970.
     * If the UTC time was not set in the datalogger at the time of the recording
     * of this data stream, this method returns 0.
     *
     * @return float  a floating-point number  corresponding to the number of seconds
     *         between the Jan 1, 1970 and the beginning of this data
     *         stream (i.e. Unix time representation of the absolute time).
     */
    public function get_realStartTimeUTC(): float
    {
        return $this->_startTime;
    }

    /**
     * Returns the number of milliseconds between two consecutive
     * rows of this data stream. By default, the data logger records one row
     * per second, but the recording frequency can be changed for
     * each device function
     *
     * @return int  an unsigned number corresponding to a number of milliseconds.
     */
    public function get_dataSamplesIntervalMs(): int
    {
        return intval(round($this->_dataSamplesInterval*1000));
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function get_dataSamplesInterval(): float
    {
        return $this->_dataSamplesInterval;
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function get_firstDataSamplesInterval(): float
    {
        return $this->_firstMeasureDuration;
    }

    /**
     * Returns the number of data rows present in this stream.
     *
     * If the device uses a firmware older than version 13000,
     * this method fetches the whole data stream from the device
     * if not yet done, which can cause a little delay.
     *
     * @return int  an unsigned number corresponding to the number of rows.
     *
     * On failure, throws an exception or returns zero.
     * @throws YAPI_Exception on error
     */
    public function get_rowCount(): int
    {
        if (($this->_nRows != 0) && $this->_isClosed) {
            return $this->_nRows;
        }
        $this->loadStream();
        return $this->_nRows;
    }

    /**
     * Returns the number of data columns present in this stream.
     * The meaning of the values present in each column can be obtained
     * using the method get_columnNames().
     *
     * If the device uses a firmware older than version 13000,
     * this method fetches the whole data stream from the device
     * if not yet done, which can cause a little delay.
     *
     * @return int  an unsigned number corresponding to the number of columns.
     *
     * On failure, throws an exception or returns zero.
     * @throws YAPI_Exception on error
     */
    public function get_columnCount(): int
    {
        if ($this->_nCols != 0) {
            return $this->_nCols;
        }
        $this->loadStream();
        return $this->_nCols;
    }

    /**
     * Returns the title (or meaning) of each data column present in this stream.
     * In most case, the title of the data column is the hardware identifier
     * of the sensor that produced the data. For streams recorded at a lower
     * recording rate, the dataLogger stores the min, average and max value
     * during each measure interval into three columns with suffixes _min,
     * _avg and _max respectively.
     *
     * If the device uses a firmware older than version 13000,
     * this method fetches the whole data stream from the device
     * if not yet done, which can cause a little delay.
     *
     * @return string[]  a list containing as many strings as there are columns in the
     *         data stream.
     *
     * On failure, throws an exception or returns an empty array.
     * @throws YAPI_Exception on error
     */
    public function get_columnNames(): array
    {
        if (sizeof($this->_columnNames) != 0) {
            return $this->_columnNames;
        }
        $this->loadStream();
        return $this->_columnNames;
    }

    /**
     * Returns the smallest measure observed within this stream.
     * If the device uses a firmware older than version 13000,
     * this method will always return YDataStream::DATA_INVALID.
     *
     * @return float  a floating-point number corresponding to the smallest value,
     *         or YDataStream::DATA_INVALID if the stream is not yet complete (still recording).
     *
     * On failure, throws an exception or returns YDataStream::DATA_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_minValue(): float
    {
        return $this->_minVal;
    }

    /**
     * Returns the average of all measures observed within this stream.
     * If the device uses a firmware older than version 13000,
     * this method will always return YDataStream::DATA_INVALID.
     *
     * @return float  a floating-point number corresponding to the average value,
     *         or YDataStream::DATA_INVALID if the stream is not yet complete (still recording).
     *
     * On failure, throws an exception or returns YDataStream::DATA_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_averageValue(): float
    {
        return $this->_avgVal;
    }

    /**
     * Returns the largest measure observed within this stream.
     * If the device uses a firmware older than version 13000,
     * this method will always return YDataStream::DATA_INVALID.
     *
     * @return float  a floating-point number corresponding to the largest value,
     *         or YDataStream::DATA_INVALID if the stream is not yet complete (still recording).
     *
     * On failure, throws an exception or returns YDataStream::DATA_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_maxValue(): float
    {
        return $this->_maxVal;
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function get_realDuration(): float
    {
        if ($this->_isClosed) {
            return $this->_duration;
        }
        return time() - $this->_utcStamp;
    }

    /**
     * Returns the whole data set contained in the stream, as a bidimensional
     * table of numbers.
     * The meaning of the values present in each column can be obtained
     * using the method get_columnNames().
     *
     * This method fetches the whole data stream from the device,
     * if not yet done.
     *
     * @return float[][]  a list containing as many elements as there are rows in the
     *         data stream. Each row itself is a list of floating-point
     *         numbers.
     *
     * On failure, throws an exception or returns an empty array.
     * @throws YAPI_Exception on error
     */
    public function get_dataRows(): array
    {
        if ((sizeof($this->_values) == 0) || !($this->_isClosed)) {
            $this->loadStream();
        }
        return $this->_values;
    }

    /**
     * Returns a single measure from the data stream, specified by its
     * row and column index.
     * The meaning of the values present in each column can be obtained
     * using the method get_columnNames().
     *
     * This method fetches the whole data stream from the device,
     * if not yet done.
     *
     * @param int $row : row index
     * @param int $col : column index
     *
     * @return float  a floating-point number
     *
     * On failure, throws an exception or returns YDataStream::DATA_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_data(int $row, int $col): float
    {
        if ((sizeof($this->_values) == 0) || !($this->_isClosed)) {
            $this->loadStream();
        }
        if ($row >= sizeof($this->_values)) {
            return self::DATA_INVALID;
        }
        if ($col >= sizeof($this->_values[$row])) {
            return self::DATA_INVALID;
        }
        return $this->_values[$row][$col];
    }

    //--- (end of generated code: YDataStream implementation)
}

//^^^^ YDataStream.php

//--- (generated code: YDataSet declaration)
//vvvv YDataSet.php
//use Exception;

/**
 * YDataSet Class: Recorded data sequence, as returned by sensor.get_recordedData()
 *
 * YDataSet objects make it possible to retrieve a set of recorded measures
 * for a given sensor and a specified time interval. They can be used
 * to load data points with a progress report. When the YDataSet object is
 * instantiated by the sensor.get_recordedData()  function, no data is
 * yet loaded from the module. It is only when the loadMore()
 * method is called over and over than data will be effectively loaded
 * from the dataLogger.
 *
 * A preview of available measures is available using the function
 * get_preview() as soon as loadMore() has been called
 * once. Measures themselves are available using function get_measures()
 * when loaded by subsequent calls to loadMore().
 *
 * This class can only be used on devices that use a relatively recent firmware,
 * as YDataSet objects are not supported by firmwares older than version 13000.
 */
class YDataSet
{
    //--- (end of generated code: YDataSet declaration)
    const DATA_INVALID = YAPI::INVALID_DOUBLE;

    //--- (generated code: YDataSet attributes)
    protected ?YFunction $_parent = null;                         // YFunction
    protected string $_hardwareId = "";                           // str
    protected string $_functionId = "";                           // str
    protected string $_unit = "";                           // str
    protected int $_bulkLoad = 0;                            // int
    protected float $_startTimeMs = 0;                            // float
    protected float $_endTimeMs = 0;                            // float
    protected int $_progress = 0;                            // int
    protected array $_calib = [];                           // intArr
    protected array $_streams = [];                           // YDataStreamArr
    protected ?YMeasure $_summary = null;                         // YMeasure
    protected array $_preview = [];                           // YMeasureArr
    protected array $_measures = [];                           // YMeasureArr
    protected float $_summaryMinVal = 0;                            // float
    protected float $_summaryMaxVal = 0;                            // float
    protected float $_summaryTotalAvg = 0;                            // float
    protected float $_summaryTotalTime = 0;                            // float

    //--- (end of generated code: YDataSet attributes)

    public function __construct(YFunction $obj_parent, ?string $str_functionId = null, ?string $str_unit = null, ?float $float_startTime = null, ?float $float_endTime = null)
    {
        //--- (generated code: YDataSet constructor)
        //--- (end of generated code: YDataSet constructor)
        $this->_summary = new YMeasure(0, 0, 0, 0, 0);
        $this->_parent = $obj_parent;
        if (is_null($str_unit)) {
            // 1st version of constructor, called from YDataLogger
            $this->_startTimeMs = 0;
            $this->_endTimeMs = 0;
        } else {
            // 2nd version of constructor, called from YFunction
            $this->_functionId = $str_functionId;
            $this->_unit = $str_unit;
            $this->_startTimeMs = $float_startTime * 1000;
            $this->_endTimeMs = $float_endTime * 1000;
            $this->_progress = -1;
        }
    }

    //--- (generated code: YDataSet implementation)

    /**
     * @throws YAPI_Exception on error
     */
    public function _get_calibration(): array
    {
        return $this->_calib;
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function loadSummary(string $data): int
    {
        $dataRows = [];         // floatArrArr;
        // $tim                    is a float;
        // $mitv                   is a float;
        // $itv                    is a float;
        // $fitv                   is a float;
        // $end_                   is a float;
        // $nCols                  is a int;
        // $minCol                 is a int;
        // $avgCol                 is a int;
        // $maxCol                 is a int;
        // $res                    is a int;
        // $m_pos                  is a int;
        // $previewTotalTime       is a float;
        // $previewTotalAvg        is a float;
        // $previewMinVal          is a float;
        // $previewMaxVal          is a float;
        // $previewAvgVal          is a float;
        // $previewStartMs         is a float;
        // $previewStopMs          is a float;
        // $previewDuration        is a float;
        // $streamStartTimeMs      is a float;
        // $streamDuration         is a float;
        // $streamEndTimeMs        is a float;
        // $minVal                 is a float;
        // $avgVal                 is a float;
        // $maxVal                 is a float;
        // $summaryStartMs         is a float;
        // $summaryStopMs          is a float;
        // $summaryTotalTime       is a float;
        // $summaryTotalAvg        is a float;
        // $summaryMinVal          is a float;
        // $summaryMaxVal          is a float;
        // $url                    is a str;
        // $strdata                is a str;
        $measure_data = [];     // floatArr;

        if ($this->_progress < 0) {
            $strdata = YAPI::Ybin2str($data);
            if ($strdata == '{}') {
                $this->_parent->_throw(YAPI::VERSION_MISMATCH, 'device firmware is too old');
                return YAPI::VERSION_MISMATCH;
            }
            $res = $this->_parse($strdata);
            if ($res < 0) {
                return $res;
            }
        }
        $summaryTotalTime = 0;
        $summaryTotalAvg = 0;
        $summaryMinVal = YAPI::MAX_DOUBLE;
        $summaryMaxVal = YAPI::MIN_DOUBLE;
        $summaryStartMs = YAPI::MAX_DOUBLE;
        $summaryStopMs = YAPI::MIN_DOUBLE;

        // Parse complete streams
        foreach ($this->_streams as $ii_0) {
            $streamStartTimeMs = round($ii_0->get_realStartTimeUTC() * 1000);
            $streamDuration = $ii_0->get_realDuration();
            $streamEndTimeMs = $streamStartTimeMs + round($streamDuration * 1000);
            if (($streamStartTimeMs >= $this->_startTimeMs) && (($this->_endTimeMs == 0) || ($streamEndTimeMs <= $this->_endTimeMs))) {
                // stream that are completely inside the dataset
                $previewMinVal = $ii_0->get_minValue();
                $previewAvgVal = $ii_0->get_averageValue();
                $previewMaxVal = $ii_0->get_maxValue();
                $previewStartMs = $streamStartTimeMs;
                $previewStopMs = $streamEndTimeMs;
                $previewDuration = $streamDuration;
            } else {
                // stream that are partially in the dataset
                // we need to parse data to filter value outside the dataset
                if (!($ii_0->_wasLoaded())) {
                    $url = $ii_0->_get_url();
                    $data = $this->_parent->_download($url);
                    $ii_0->_parseStream($data);
                }
                $dataRows = $ii_0->get_dataRows();
                if (sizeof($dataRows) == 0) {
                    return $this->get_progress();
                }
                $tim = $streamStartTimeMs;
                $fitv = round($ii_0->get_firstDataSamplesInterval() * 1000);
                $itv = round($ii_0->get_dataSamplesInterval() * 1000);
                $nCols = sizeof($dataRows[0]);
                $minCol = 0;
                if ($nCols > 2) {
                    $avgCol = 1;
                } else {
                    $avgCol = 0;
                }
                if ($nCols > 2) {
                    $maxCol = 2;
                } else {
                    $maxCol = 0;
                }
                $previewTotalTime = 0;
                $previewTotalAvg = 0;
                $previewStartMs = $streamEndTimeMs;
                $previewStopMs = $streamStartTimeMs;
                $previewMinVal = YAPI::MAX_DOUBLE;
                $previewMaxVal = YAPI::MIN_DOUBLE;
                $m_pos = 0;
                while ($m_pos < sizeof($dataRows)) {
                    $measure_data = $dataRows[$m_pos];
                    if ($m_pos == 0) {
                        $mitv = $fitv;
                    } else {
                        $mitv = $itv;
                    }
                    $end_ = $tim + $mitv;
                    if (($end_ > $this->_startTimeMs) && (($this->_endTimeMs == 0) || ($tim < $this->_endTimeMs))) {
                        $minVal = $measure_data[$minCol];
                        $avgVal = $measure_data[$avgCol];
                        $maxVal = $measure_data[$maxCol];
                        if ($previewStartMs > $tim) {
                            $previewStartMs = $tim;
                        }
                        if ($previewStopMs < $end_) {
                            $previewStopMs = $end_;
                        }
                        if ($previewMinVal > $minVal) {
                            $previewMinVal = $minVal;
                        }
                        if ($previewMaxVal < $maxVal) {
                            $previewMaxVal = $maxVal;
                        }
                        if (!(is_nan($avgVal))) {
                            $previewTotalAvg = $previewTotalAvg + ($avgVal * $mitv);
                            $previewTotalTime = $previewTotalTime + $mitv;
                        }
                    }
                    $tim = $end_;
                    $m_pos = $m_pos + 1;
                }
                if ($previewTotalTime > 0) {
                    $previewAvgVal = $previewTotalAvg / $previewTotalTime;
                    $previewDuration = ($previewStopMs - $previewStartMs) / 1000.0;
                } else {
                    $previewAvgVal = 0.0;
                    $previewDuration = 0.0;
                }
            }
            $this->_preview[] = new YMeasure($previewStartMs / 1000.0, $previewStopMs / 1000.0, $previewMinVal, $previewAvgVal, $previewMaxVal);
            if ($summaryMinVal > $previewMinVal) {
                $summaryMinVal = $previewMinVal;
            }
            if ($summaryMaxVal < $previewMaxVal) {
                $summaryMaxVal = $previewMaxVal;
            }
            if ($summaryStartMs > $previewStartMs) {
                $summaryStartMs = $previewStartMs;
            }
            if ($summaryStopMs < $previewStopMs) {
                $summaryStopMs = $previewStopMs;
            }
            $summaryTotalAvg = $summaryTotalAvg + ($previewAvgVal * $previewDuration);
            $summaryTotalTime = $summaryTotalTime + $previewDuration;
        }
        if (($this->_startTimeMs == 0) || ($this->_startTimeMs > $summaryStartMs)) {
            $this->_startTimeMs = $summaryStartMs;
        }
        if (($this->_endTimeMs == 0) || ($this->_endTimeMs < $summaryStopMs)) {
            $this->_endTimeMs = $summaryStopMs;
        }
        if ($summaryTotalTime > 0) {
            $this->_summary = new YMeasure($summaryStartMs / 1000.0, $summaryStopMs / 1000.0, $summaryMinVal, $summaryTotalAvg / $summaryTotalTime, $summaryMaxVal);
        } else {
            $this->_summary = new YMeasure(0.0, 0.0, YAPI::INVALID_DOUBLE, YAPI::INVALID_DOUBLE, YAPI::INVALID_DOUBLE);
        }
        return $this->get_progress();
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function processMore(int $progress, string $data): int
    {
        // $stream                 is a YDataStream;
        $dataRows = [];         // floatArrArr;
        // $tim                    is a float;
        // $itv                    is a float;
        // $fitv                   is a float;
        // $avgv                   is a float;
        // $end_                   is a float;
        // $nCols                  is a int;
        // $minCol                 is a int;
        // $avgCol                 is a int;
        // $maxCol                 is a int;
        // $firstMeasure           is a bool;
        // $baseurl                is a str;
        // $url                    is a str;
        // $suffix                 is a str;
        $suffixes = [];         // strArr;
        // $idx                    is a int;
        // $bulkFile               is a bin;
        // $urlIdx                 is a int;
        $streamBin = [];        // binArr;

        if ($progress != $this->_progress) {
            return $this->_progress;
        }
        if ($this->_progress < 0) {
            return $this->loadSummary($data);
        }
        $stream = $this->_streams[$this->_progress];
        if (!($stream->_wasLoaded())) {
            $stream->_parseStream($data);
        }
        $dataRows = $stream->get_dataRows();
        $this->_progress = $this->_progress + 1;
        if (sizeof($dataRows) == 0) {
            return $this->get_progress();
        }
        $tim = round($stream->get_realStartTimeUTC() * 1000);
        $fitv = round($stream->get_firstDataSamplesInterval() * 1000);
        $itv = round($stream->get_dataSamplesInterval() * 1000);
        if ($fitv == 0) {
            $fitv = $itv;
        }
        if ($tim < $itv) {
            $tim = $itv;
        }
        $nCols = sizeof($dataRows[0]);
        $minCol = 0;
        if ($nCols > 2) {
            $avgCol = 1;
        } else {
            $avgCol = 0;
        }
        if ($nCols > 2) {
            $maxCol = 2;
        } else {
            $maxCol = 0;
        }

        $firstMeasure = true;
        foreach ($dataRows as $ii_0) {
            if ($firstMeasure) {
                $end_ = $tim + $fitv;
                $firstMeasure = false;
            } else {
                $end_ = $tim + $itv;
            }
            $avgv = $ii_0[$avgCol];
            if (($end_ > $this->_startTimeMs) && (($this->_endTimeMs == 0) || ($tim < $this->_endTimeMs)) && !(is_nan($avgv))) {
                $this->_measures[] = new YMeasure($tim / 1000, $end_ / 1000, $ii_0[$minCol], $avgv, $ii_0[$maxCol]);
            }
            $tim = $end_;
        }
        // Perform bulk preload to speed-up network transfer
        if (($this->_bulkLoad > 0) && ($this->_progress < sizeof($this->_streams))) {
            $stream = $this->_streams[$this->_progress];
            if ($stream->_wasLoaded()) {
                return $this->get_progress();
            }
            $baseurl = $stream->_get_baseurl();
            $url = $stream->_get_url();
            $suffix = $stream->_get_urlsuffix();
            $suffixes[] = $suffix;
            $idx = $this->_progress + 1;
            while (($idx < sizeof($this->_streams)) && (sizeof($suffixes) < $this->_bulkLoad)) {
                $stream = $this->_streams[$idx];
                if (!($stream->_wasLoaded()) && ($stream->_get_baseurl() == $baseurl)) {
                    $suffix = $stream->_get_urlsuffix();
                    $suffixes[] = $suffix;
                    $url = $url . ',' . $suffix;
                }
                $idx = $idx + 1;
            }
            $bulkFile = $this->_parent->_download($url);
            $streamBin = $this->_parent->_json_get_array($bulkFile);
            $urlIdx = 0;
            $idx = $this->_progress;
            while (($idx < sizeof($this->_streams)) && ($urlIdx < sizeof($suffixes)) && ($urlIdx < sizeof($streamBin))) {
                $stream = $this->_streams[$idx];
                if (($stream->_get_baseurl() == $baseurl) && ($stream->_get_urlsuffix() == $suffixes[$urlIdx])) {
                    $stream->_parseStream($streamBin[$urlIdx]);
                    $urlIdx = $urlIdx + 1;
                }
                $idx = $idx + 1;
            }
        }
        return $this->get_progress();
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function get_privateDataStreams(): array
    {
        return $this->_streams;
    }

    /**
     * Returns the unique hardware identifier of the function who performed the measures,
     * in the form SERIAL.FUNCTIONID. The unique hardware identifier is composed of the
     * device serial number and of the hardware identifier of the function
     * (for example THRMCPL1-123456.temperature1)
     *
     * @return string  a string that uniquely identifies the function (ex: THRMCPL1-123456.temperature1)
     *
     * On failure, throws an exception or returns  YDataSet::HARDWAREID_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_hardwareId(): string
    {
        // $mo                     is a YModule;
        if (!($this->_hardwareId == '')) {
            return $this->_hardwareId;
        }
        $mo = $this->_parent->get_module();
        $this->_hardwareId = sprintf('%s.%s', $mo->get_serialNumber(), $this->get_functionId());
        return $this->_hardwareId;
    }

    /**
     * Returns the hardware identifier of the function that performed the measure,
     * without reference to the module. For example temperature1.
     *
     * @return string  a string that identifies the function (ex: temperature1)
     */
    public function get_functionId(): string
    {
        return $this->_functionId;
    }

    /**
     * Returns the measuring unit for the measured value.
     *
     * @return string  a string that represents a physical unit.
     *
     * On failure, throws an exception or returns  YDataSet::UNIT_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_unit(): string
    {
        return $this->_unit;
    }

    /**
     * Returns the start time of the dataset, relative to the Jan 1, 1970.
     * When the YDataSet object is created, the start time is the value passed
     * in parameter to the get_dataSet() function. After the
     * very first call to loadMore(), the start time is updated
     * to reflect the timestamp of the first measure actually found in the
     * dataLogger within the specified range.
     *
     * <b>DEPRECATED</b>: This method has been replaced by get_summary()
     * which contain more precise informations.
     *
     * @return float  an unsigned number corresponding to the number of seconds
     *         between the Jan 1, 1970 and the beginning of this data
     *         set (i.e. Unix time representation of the absolute time).
     */
    public function get_startTimeUTC(): float
    {
        return $this->imm_get_startTimeUTC();
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function imm_get_startTimeUTC(): float
    {
        return ($this->_startTimeMs / 1000.0);
    }

    /**
     * Returns the end time of the dataset, relative to the Jan 1, 1970.
     * When the YDataSet object is created, the end time is the value passed
     * in parameter to the get_dataSet() function. After the
     * very first call to loadMore(), the end time is updated
     * to reflect the timestamp of the last measure actually found in the
     * dataLogger within the specified range.
     *
     * <b>DEPRECATED</b>: This method has been replaced by get_summary()
     * which contain more precise informations.
     *
     * @return float  an unsigned number corresponding to the number of seconds
     *         between the Jan 1, 1970 and the end of this data
     *         set (i.e. Unix time representation of the absolute time).
     */
    public function get_endTimeUTC(): float
    {
        return $this->imm_get_endTimeUTC();
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function imm_get_endTimeUTC(): float
    {
        return round($this->_endTimeMs / 1000.0);
    }

    /**
     * Returns the progress of the downloads of the measures from the data logger,
     * on a scale from 0 to 100. When the object is instantiated by get_dataSet,
     * the progress is zero. Each time loadMore() is invoked, the progress
     * is updated, to reach the value 100 only once all measures have been loaded.
     *
     * @return int  an integer in the range 0 to 100 (percentage of completion).
     */
    public function get_progress(): int
    {
        if ($this->_progress < 0) {
            return 0;
        }
        // index not yet loaded
        if ($this->_progress >= sizeof($this->_streams)) {
            return 100;
        }
        return intVal((1 + (1 + $this->_progress) * 98) / (1 + sizeof($this->_streams)));
    }

    /**
     * Loads the next block of measures from the dataLogger, and updates
     * the progress indicator.
     *
     * @return int  an integer in the range 0 to 100 (percentage of completion),
     *         or a negative error code in case of failure.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function loadMore(): int
    {
        // $url                    is a str;
        // $stream                 is a YDataStream;
        if ($this->_progress < 0) {
            $url = sprintf('logger.json?id=%s',$this->_functionId);
            if ($this->_startTimeMs != 0) {
                $url = sprintf('%s&from=%u',$url,$this->imm_get_startTimeUTC());
            }
            if ($this->_endTimeMs != 0) {
                $url = sprintf('%s&to=%u',$url,$this->imm_get_endTimeUTC() + 1);
            }
        } else {
            if ($this->_progress >= sizeof($this->_streams)) {
                return 100;
            } else {
                $stream = $this->_streams[$this->_progress];
                if ($stream->_wasLoaded()) {
                    // Do not reload stream if it was already loaded
                    return $this->processMore($this->_progress, YAPI::Ystr2bin(''));
                }
                $url = $stream->_get_url();
            }
        }
        try {
            return $this->processMore($this->_progress, $this->_parent->_download($url));
        } catch (Exception $ex) {
            return $this->processMore($this->_progress, $this->_parent->_download($url));
        }
    }

    /**
     * Returns an YMeasure object which summarizes the whole
     * YDataSet:: In includes the following information:
     * - the start of a time interval
     * - the end of a time interval
     * - the minimal value observed during the time interval
     * - the average value observed during the time interval
     * - the maximal value observed during the time interval
     *
     * This summary is available as soon as loadMore() has
     * been called for the first time.
     *
     * @return ?YMeasure  an YMeasure object
     */
    public function get_summary(): ?YMeasure
    {
        return $this->_summary;
    }

    /**
     * Returns a condensed version of the measures that can
     * retrieved in this YDataSet, as a list of YMeasure
     * objects. Each item includes:
     * - the start of a time interval
     * - the end of a time interval
     * - the minimal value observed during the time interval
     * - the average value observed during the time interval
     * - the maximal value observed during the time interval
     *
     * This preview is available as soon as loadMore() has
     * been called for the first time.
     *
     * @return YMeasure[]  a table of records, where each record depicts the
     *         measured values during a time interval
     *
     * On failure, throws an exception or returns an empty array.
     * @throws YAPI_Exception on error
     */
    public function get_preview(): array
    {
        return $this->_preview;
    }

    /**
     * Returns the detailed set of measures for the time interval corresponding
     * to a given condensed measures previously returned by get_preview().
     * The result is provided as a list of YMeasure objects.
     *
     * @param YMeasure $measure : condensed measure from the list previously returned by
     *         get_preview().
     *
     * @return YMeasure[]  a table of records, where each record depicts the
     *         measured values during a time interval
     *
     * On failure, throws an exception or returns an empty array.
     * @throws YAPI_Exception on error
     */
    public function get_measuresAt(YMeasure $measure): array
    {
        // $startUtcMs             is a float;
        // $stream                 is a YDataStream;
        $dataRows = [];         // floatArrArr;
        $measures = [];         // YMeasureArr;
        // $tim                    is a float;
        // $itv                    is a float;
        // $end_                   is a float;
        // $nCols                  is a int;
        // $minCol                 is a int;
        // $avgCol                 is a int;
        // $maxCol                 is a int;

        $startUtcMs = $measure->get_startTimeUTC() * 1000;
        $stream = null;
        foreach ($this->_streams as $ii_0) {
            if (round($ii_0->get_realStartTimeUTC() *1000) == $startUtcMs) {
                $stream = $ii_0;
            }
        }
        if ($stream == null) {
            return $measures;
        }
        $dataRows = $stream->get_dataRows();
        if (sizeof($dataRows) == 0) {
            return $measures;
        }
        $tim = round($stream->get_realStartTimeUTC() * 1000);
        $itv = round($stream->get_dataSamplesInterval() * 1000);
        if ($tim < $itv) {
            $tim = $itv;
        }
        $nCols = sizeof($dataRows[0]);
        $minCol = 0;
        if ($nCols > 2) {
            $avgCol = 1;
        } else {
            $avgCol = 0;
        }
        if ($nCols > 2) {
            $maxCol = 2;
        } else {
            $maxCol = 0;
        }

        foreach ($dataRows as $ii_1) {
            $end_ = $tim + $itv;
            if (($end_ > $this->_startTimeMs) && (($this->_endTimeMs == 0) || ($tim < $this->_endTimeMs))) {
                $measures[] = new YMeasure($tim / 1000.0, $end_ / 1000.0, $ii_1[$minCol], $ii_1[$avgCol], $ii_1[$maxCol]);
            }
            $tim = $end_;
        }
        return $measures;
    }

    /**
     * Returns all measured values currently available for this DataSet,
     * as a list of YMeasure objects. Each item includes:
     * - the start of the measure time interval
     * - the end of the measure time interval
     * - the minimal value observed during the time interval
     * - the average value observed during the time interval
     * - the maximal value observed during the time interval
     *
     * Before calling this method, you should call loadMore()
     * to load data from the device. You may have to call loadMore()
     * several time until all rows are loaded, but you can start
     * looking at available data rows before the load is complete.
     *
     * The oldest measures are always loaded first, and the most
     * recent measures will be loaded last. As a result, timestamps
     * are normally sorted in ascending order within the measure table,
     * unless there was an unexpected adjustment of the datalogger UTC
     * clock.
     *
     * @return YMeasure[]  a table of records, where each record depicts the
     *         measured value for a given time interval
     *
     * On failure, throws an exception or returns an empty array.
     * @throws YAPI_Exception on error
     */
    public function get_measures(): array
    {
        return $this->_measures;
    }

    //--- (end of generated code: YDataSet implementation)

    // YDataSet parser for stream list
    public function _parse(string $str_json)
    {
        $loadval = json_decode(YAPI::Ybin2str($str_json), true);

        $this->_functionId = $loadval['id'];
        $this->_unit = $loadval['unit'];
        $this->_bulkLoad = (isset($loadval['bulk']) ? intval($loadval['bulk']) : 0);
        if (isset($loadval['calib'])) {
            $this->_calib = YAPI::_decodeFloats($loadval['calib']);
            $this->_calib[0] = intVal($this->_calib[0] / 1000);
        } else {
            $this->_calib = YAPI::_decodeWords($loadval['cal']);
        }
        $this->_summary = new YMeasure(0, 0, 0, 0, 0);
        $this->_streams = array();
        $this->_preview = array();
        $this->_measures = array();
        for ($i = 0; $i < sizeof($loadval['streams']); $i++) {
            /** @var YDataStream $stream */
            $stream = $this->_parent->_findDataStream($this, $loadval['streams'][$i]);
            $streamStartTime = $stream->get_realstartTimeUTC() * 1000;
            $streamEndTime = $streamStartTime + $stream->get_realDuration() * 1000;
            /** @noinspection PhpStatementHasEmptyBodyInspection */
            if ($this->_startTimeMs > 0 && $streamEndTime <= $this->_startTimeMs) {
                // this stream is too early, drop it
            } else {
                /** @noinspection PhpStatementHasEmptyBodyInspection */
                if ($this->_endTimeMs > 0 && $streamStartTime >= $this->_endTimeMs) {
                    // this stream is too late, drop it
                } else {
                    $this->_streams[] = $stream;
                }
            }
        }
        $this->_progress = 0;
        return $this->get_progress();
    }
}

//^^^^ YDataSet.php

//--- (generated code: YConsolidatedDataSet declaration)
//vvvv YConsolidatedDataSet.php

/**
 * YConsolidatedDataSet Class: Cross-sensor consolidated data sequence.
 *
 * YConsolidatedDataSet objects make it possible to retrieve a set of
 * recorded measures from multiple sensors, for a specified time interval.
 * They can be used to load data points progressively, and to receive
 * data records by timestamp, one by one..
 */
class YConsolidatedDataSet
{
    //--- (end of generated code: YConsolidatedDataSet declaration)

    //--- (generated code: YConsolidatedDataSet attributes)
    protected float $_start = 0;                            // float
    protected float $_end = 0;                            // float
    protected int $_nsensors = 0;                            // int
    protected array $_sensors = [];                           // YSensorArr
    protected array $_datasets = [];                           // YDataSetArr
    protected array $_progresss = [];                           // intArr
    protected array $_nextidx = [];                           // intArr
    protected array $_nexttim = [];                           // floatArr

    //--- (end of generated code: YConsolidatedDataSet attributes)

    public function __construct(float $float_startTime, float $float_endTime, array $obj_sensorList)
    {
        //--- (generated code: YConsolidatedDataSet constructor)
        //--- (end of generated code: YConsolidatedDataSet constructor)
        $this->imm_init($float_startTime, $float_endTime, $obj_sensorList);
    }

    //--- (generated code: YConsolidatedDataSet implementation)

    /**
     * @throws YAPI_Exception on error
     */
    public function imm_init(float $startt, float $endt, array $sensorList): int
    {
        $this->_start = $startt;
        $this->_end = $endt;
        $this->_sensors = $sensorList;
        $this->_nsensors = -1;
        return YAPI::SUCCESS;
    }

    /**
     * Returns an object holding historical data for multiple
     * sensors, for a specified time interval.
     * The measures will be retrieved from the data logger, which must have been turned
     * on at the desired time. The resulting object makes it possible to load progressively
     * a large set of measures from multiple sensors, consolidating data on the fly
     * to align records based on measurement timestamps.
     *
     * @param string[] $sensorNames : array of logical names or hardware identifiers of the sensors
     *         for which data must be loaded from their data logger.
     * @param float $startTime : the start of the desired measure time interval,
     *         as a Unix timestamp, i.e. the number of seconds since
     *         January 1, 1970 UTC. The special value 0 can be used
     *         to include any measure, without initial limit.
     * @param float $endTime : the end of the desired measure time interval,
     *         as a Unix timestamp, i.e. the number of seconds since
     *         January 1, 1970 UTC. The special value 0 can be used
     *         to include any measure, without ending limit.
     *
     * @return ?YConsolidatedDataSet  an instance of YConsolidatedDataSet, providing access to
     *         consolidated historical data. Records can be loaded progressively
     *         using the YConsolidatedDataSet::nextRecord() method.
     */
    public static function Init(array $sensorNames, float $startTime, float $endTime): ?YConsolidatedDataSet
    {
        // $nSensors               is a int;
        $sensorList = [];       // YSensorArr;
        // $idx                    is a int;
        // $sensorName             is a str;
        // $s                      is a YSensor;
        // $obj                    is a YConsolidatedDataSet;
        $nSensors = sizeof($sensorNames);
        while (sizeof($sensorList) > 0) {
            array_pop($sensorList);
        };
        $idx = 0;
        while ($idx < $nSensors) {
            $sensorName = $sensorNames[$idx];
            $s = YSensor::FindSensor($sensorName);
            $sensorList[] = $s;
            $idx = $idx + 1;
        }
        $obj = new YConsolidatedDataSet($startTime, $endTime, $sensorList);
        return $obj;
    }

    /**
     * Extracts the next data record from the data logger of all sensors linked to this
     * object.
     *
     * @param float[] $datarec : array of floating point numbers, that will be filled by the
     *         function with the timestamp of the measure in first position,
     *         followed by the measured value in next positions.
     *
     * @return int  an integer in the range 0 to 100 (percentage of completion),
     *         or a negative error code in case of failure.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function nextRecord(array &$datarec): int
    {
        // $s                      is a int;
        // $idx                    is a int;
        // $sensor                 is a YSensor;
        // $newdataset             is a YDataSet;
        // $globprogress           is a int;
        // $currprogress           is a int;
        // $currnexttim            is a float;
        // $newvalue               is a float;
        $measures = [];         // YMeasureArr;
        // $nexttime               is a float;
        //
        // Ensure the dataset have been retrieved
        //
        if ($this->_nsensors == -1) {
            $this->_nsensors = sizeof($this->_sensors);
            while (sizeof($this->_datasets) > 0) {
                array_pop($this->_datasets);
            };
            while (sizeof($this->_progresss) > 0) {
                array_pop($this->_progresss);
            };
            while (sizeof($this->_nextidx) > 0) {
                array_pop($this->_nextidx);
            };
            while (sizeof($this->_nexttim) > 0) {
                array_pop($this->_nexttim);
            };
            $s = 0;
            while ($s < $this->_nsensors) {
                $sensor = $this->_sensors[$s];
                $newdataset = $sensor->get_recordedData($this->_start, $this->_end);
                $this->_datasets[] = $newdataset;
                $this->_progresss[] = 0;
                $this->_nextidx[] = 0;
                $this->_nexttim[] = 0.0;
                $s = $s + 1;
            }
        }
        while (sizeof($datarec) > 0) {
            array_pop($datarec);
        };
        //
        // Find next timestamp to process
        //
        $nexttime = 0;
        $s = 0;
        while ($s < $this->_nsensors) {
            $currnexttim = $this->_nexttim[$s];
            if ($currnexttim == 0) {
                $idx = $this->_nextidx[$s];
                $measures = $this->_datasets[$s]->get_measures();
                $currprogress = $this->_progresss[$s];
                while (($idx >= sizeof($measures)) && ($currprogress < 100)) {
                    $currprogress = $this->_datasets[$s]->loadMore();
                    if ($currprogress < 0) {
                        $currprogress = 100;
                    }
                    $this->_progresss[$s] = $currprogress;
                    $measures = $this->_datasets[$s]->get_measures();
                }
                if ($idx < sizeof($measures)) {
                    $currnexttim = $measures[$idx]->get_endTimeUTC();
                    $this->_nexttim[$s] = $currnexttim;
                }
            }
            if ($currnexttim > 0) {
                if (($nexttime == 0) || ($nexttime > $currnexttim)) {
                    $nexttime = $currnexttim;
                }
            }
            $s = $s + 1;
        }
        if ($nexttime == 0) {
            return 100;
        }
        //
        // Extract data for $this timestamp
        //
        while (sizeof($datarec) > 0) {
            array_pop($datarec);
        };
        $datarec[] = $nexttime;
        $globprogress = 0;
        $s = 0;
        while ($s < $this->_nsensors) {
            if ($this->_nexttim[$s] == $nexttime) {
                $idx = $this->_nextidx[$s];
                $measures = $this->_datasets[$s]->get_measures();
                $newvalue = $measures[$idx]->get_averageValue();
                $datarec[] = $newvalue;
                $this->_nexttim[$s] = 0.0;
                $this->_nextidx[$s] = $idx + 1;
            } else {
                $datarec[] = NAN;
            }
            $currprogress = $this->_progresss[$s];
            $globprogress = $globprogress + $currprogress;
            $s = $s + 1;
        }
        if ($globprogress > 0) {
            $globprogress = intVal($globprogress / ($this->_nsensors));
            if ($globprogress > 99) {
                $globprogress = 99;
            }
        }
        return $globprogress;
    }

    //--- (end of generated code: YConsolidatedDataSet implementation)
}

//^^^^ YConsolidatedDataSet.php

//--- (generated code: YHub definitions)
//--- (end of generated code: YHub definitions)

//--- (generated code: YHub declaration)
//vvvv YHub.php

/**
 * YHub Class: YoctoHub or VirtualHub currently in use by the API.
 *
 *
 */
class YHub
{
    const TRYING                         = 1;
    const CONNECTED                      = 2;
    const RECONNECTING                   = 3;
    const ABORTED                        = 4;
    const UNREGISTERED                   = 5;
    //--- (end of generated code: YHub declaration)

//--- (generated code: YHub attributes)
    protected ?YAPIContext $_ctx = null;                         // YAPIContext
    protected int $_hubref = 0;                            // int
    protected mixed $_userData = null;                         // any

    //--- (end of generated code: YHub attributes)

    function __construct(YAPIContext $ctx, int $_hubref)
    {
        //--- (generated code: YHub constructor)
        //--- (end of generated code: YHub constructor)
        $this->_hubref = $_hubref;
        $this->_ctx = $ctx;
    }

    private function _getStrAttr_internal(string $attrName): string
    {
        /** @var YTcpHub $hub */
        $hub = $this->_ctx->getTcpHubFromRef($this->_hubref);
        if ($hub == null) {
            return "";
        }
        switch ($attrName) {
            case "registeredUrl":
                return $hub->getRegisteredUrl();
            case "connectionUrl":
                return $hub->getBaseURL();
            case "serialNumber":
                return $hub->getSerialNumber();
            case "errorMessage":
                return $hub->getLastErrorMessage();
            default:
                return "";
        }
    }

    private function _getIntAttr_internal(string $attrName): int
    {
        /** @var YTcpHub $hub */
        $hub = $this->_ctx->getTcpHubFromRef($this->_hubref);
        if ($attrName == "isInUse") {
            return $hub != null ? 1 : 0;
        }
        if ($attrName == "connectionState") {
            if ($hub == null) {
                return YHub::UNREGISTERED;
            }
            return $hub->getConnectionState();
        }


        if ($hub == null) {
            return -1;
        }
        switch ($attrName) {
            case "isOnline":
                return $hub->isOnline() ? 1 : 0;
            case "isReadOnly":
                return $hub->isReadOnly() ? 1 : 0;
            case "networkTimeout":
                return $hub->get_networkTimeout();
            case "errorType":
                return $hub->getLastErrorType();
            default:
                return -1;
        }
    }

    private function _setIntAttr_internal(string $attrName, int $value): void
    {
        /** @var YTcpHub $hub */
        $hub = $this->_ctx->getTcpHubFromRef($this->_hubref);
        if ($hub != null && $attrName == "networkTimeout") {
            $hub->set_networkTimeout($value);
        }
    }

    private function get_knownUrls_internal(): array
    {
        $hub = $this->_ctx->getTcpHubFromRef($this->_hubref);
        if ($hub != null) {
            return $hub->getKnownUrls();
        }
        return [];
    }

//--- (generated code: YHub implementation)

    /**
     * @throws YAPI_Exception on error
     */
    public function _getStrAttr(string $attrName): string
    {
        return $this->_getStrAttr_internal($attrName);
    }

    //cannot be generated for PHP:
    //private function _getStrAttr_internal(string $attrName)

    /**
     * @throws YAPI_Exception on error
     */
    public function _getIntAttr(string $attrName): int
    {
        return $this->_getIntAttr_internal($attrName);
    }

    //cannot be generated for PHP:
    //private function _getIntAttr_internal(string $attrName)

    /**
     * @throws YAPI_Exception on error
     */
    public function _setIntAttr(string $attrName, int $value): void
    {
        $this->_setIntAttr_internal($attrName, $value);
    }

    //cannot be generated for PHP:
    //private function _setIntAttr_internal(string $attrName, int $value)

    /**
     * Returns the URL that has been used first to register this hub.
     */
    public function get_registeredUrl(): string
    {
        return $this->_getStrAttr('registeredUrl');
    }

    /**
     * Returns all known URLs that have been used to register this hub.
     * URLs are pointing to the same hub when the devices connected
     * are sharing the same serial number.
     */
    public function get_knownUrls(): array
    {
        return $this->get_knownUrls_internal();
    }

    //cannot be generated for PHP:
    //private function get_knownUrls_internal()

    /**
     * Returns the URL currently in use to communicate with this hub.
     */
    public function get_connectionUrl(): string
    {
        return $this->_getStrAttr('connectionUrl');
    }

    /**
     * Returns the state of the connection with this hub. (TRYING, CONNECTED, RECONNECTING, ABORTED, UNREGISTERED)
     */
    public function get_connectionState(): int
    {
        return $this->_getIntAttr('connectionState');
    }

    /**
     * Returns the hub serial number, if the hub was already connected once.
     */
    public function get_serialNumber(): string
    {
        return $this->_getStrAttr('serialNumber');
    }

    /**
     * Tells if this hub is still registered within the API.
     *
     * @return boolean  true if the hub has not been unregistered.
     */
    public function isInUse(): bool
    {
        return $this->_getIntAttr('isInUse') > 0;
    }

    /**
     * Tells if there is an active communication channel with this hub.
     *
     * @return boolean  true if the hub is currently connected.
     */
    public function isOnline(): bool
    {
        return $this->_getIntAttr('isOnline') > 0;
    }

    /**
     * Tells if write access on this hub is blocked. Return true if it
     * is not possible to change attributes on this hub
     *
     * @return boolean  true if it is not possible to change attributes on this hub.
     */
    public function isReadOnly(): bool
    {
        return $this->_getIntAttr('isReadOnly') > 0;
    }

    /**
     * Modifies tthe network connection delay for this hub.
     * The default value is inherited from ySetNetworkTimeout
     * at the time when the hub is registered, but it can be updated
     * afterward for each specific hub if necessary.
     *
     * @param int $networkMsTimeout : the network connection delay in milliseconds.
     * @noreturn
     */
    public function set_networkTimeout(int $networkMsTimeout): void
    {
        $this->_setIntAttr('networkTimeout',$networkMsTimeout);
    }

    /**
     * Returns the network connection delay for this hub.
     * The default value is inherited from ySetNetworkTimeout
     * at the time when the hub is registered, but it can be updated
     * afterward for each specific hub if necessary.
     *
     * @return int  the network connection delay in milliseconds.
     */
    public function get_networkTimeout(): int
    {
        return $this->_getIntAttr('networkTimeout');
    }

    /**
     * Returns the numerical error code of the latest error with the hub.
     * This method is mostly useful when using the Yoctopuce library with
     * exceptions disabled.
     *
     * @return int  a number corresponding to the code of the latest error that occurred while
     *         using the hub object
     */
    public function get_errorType(): int
    {
        return $this->_getIntAttr('errorType');
    }

    /**
     * Returns the error message of the latest error with the hub.
     * This method is mostly useful when using the Yoctopuce library with
     * exceptions disabled.
     *
     * @return string  a string corresponding to the latest error message that occured while
     *         using the hub object
     */
    public function get_errorMessage(): string
    {
        return $this->_getStrAttr('errorMessage');
    }

    /**
     * Returns the value of the userData attribute, as previously stored
     * using method set_userData.
     * This attribute is never touched directly by the API, and is at
     * disposal of the caller to store a context.
     *
     * @return Object  the object stored previously by the caller.
     */
    public function get_userData(): mixed
    {
        return $this->_userData;
    }

    /**
     * Stores a user context provided as argument in the userData
     * attribute of the function.
     * This attribute is never touched by the API, and is at
     * disposal of the caller to store a context.
     *
     * @param Object $data : any kind of object to be stored
     * @noreturn
     */
    public function set_userData(mixed $data): void
    {
        $this->_userData = $data;
    }

    /**
     * Starts the enumeration of hubs currently in use by the API.
     * Use the method YHub::nextHubInUse() to iterate on the
     * next hubs.
     *
     * @return ?YHub  a pointer to a YHub object, corresponding to
     *         the first hub currently in use by the API, or a
     *         null pointer if none has been registered.
     */
    public static function FirstHubInUse(): ?YHub
    {
        return YAPI::nextHubInUseInternal(-1);
    }

    /**
     * Retrieves hub for a given identifier. The identifier can be the URL or the
     * serial of the hub.
     *
     * @param string $url : The url or serial of the hub.
     *
     * @return YHub  a pointer to a YHub object, corresponding to
     *         the first hub currently in use by the API, or a
     *         null pointer if none has been registered.
     */
    public static function FindHubInUse(string $url): ?YHub
    {
        return YAPI::findYHubFromID($url);
    }

    /**
     * Continues the module enumeration started using YHub::FirstHubInUse().
     * Caution: You can't make any assumption about the order of returned hubs.
     *
     * @return ?YHub  a pointer to a YHub object, corresponding to
     *         the next hub currently in use, or a null pointer
     *         if there are no more hubs to enumerate.
     */
    public function nextHubInUse(): ?YHub
    {
        return $this->_ctx->nextHubInUseInternal($this->_hubref);
    }

    //--- (end of generated code: YHub implementation)

}

//^^^^ YHub.php

//--- (generated code: YFunction declaration)
//vvvv YFunction.php
//use Exception;

/**
 * YFunction Class: Common function interface
 *
 * This is the parent class for all public objects representing device functions documented in
 * the high-level programming API. This abstract class does all the real job, but without
 * knowledge of the specific function attributes.
 *
 * Instantiating a child class of YFunction does not cause any communication.
 * The instance simply keeps track of its function identifier, and will dynamically bind
 * to a matching device at the time it is really being used to read or set an attribute.
 * In order to allow true hot-plug replacement of one device by another, the binding stay
 * dynamic through the life of the object.
 *
 * The YFunction class implements a generic high-level cache for the attribute values of
 * the specified function, pre-parsed from the REST API string.
 */
class YFunction
{
    const LOGICALNAME_INVALID = YAPI::INVALID_STRING;
    const ADVERTISEDVALUE_INVALID = YAPI::INVALID_STRING;
    //--- (end of generated code: YFunction declaration)
    const FUNCTIONDESCRIPTOR_INVALID = YAPI::INVALID_STRING;
    const HARDWAREID_INVALID = YAPI::INVALID_STRING;
    const FUNCTIONID_INVALID = YAPI::INVALID_STRING;
    const FRIENDLYNAME_INVALID = YAPI::INVALID_STRING;

    /** @var YFunction[] */
    public static array $_TimedReportCallbackList = array();
    /** @var YFunction[] */
    public static array $_ValueCallbackList = array();

    protected string $_className = 'Function';
    protected string $_func;
    protected int $_lastErrorType = YAPI::SUCCESS;
    protected string $_lastErrorMsg = 'no error';
    protected array $_dataStreams;
    protected mixed $_userData = null;
    protected array $_cache;
    //--- (generated code: YFunction attributes)
    protected string $_logicalName = self::LOGICALNAME_INVALID;    // Text
    protected string $_advertisedValue = self::ADVERTISEDVALUE_INVALID; // PubText
    protected mixed $_valueCallbackFunction = null;                         // YFunctionValueCallback
    protected float $_cacheExpiration = 0;                            // ulong
    protected string $_serial = "";                           // str
    protected string $_funId = "";                           // str
    protected string $_hwId = "";                           // str

    //--- (end of generated code: YFunction attributes)

    function __construct(string $str_func)
    {
        $this->_func = $str_func;
        $this->_cache = array();
        $this->_dataStreams = array();

        //--- (generated code: YFunction constructor)
        //--- (end of generated code: YFunction constructor)
    }

    // internal helper for YFunctionType
    function _getHwId(): string
    {
        return $this->_hwId;
    }


    private function isReadOnly_internal(): bool
    {
        try {
            $serial = $this->get_serialNumber();
            return YAPI::isReadOnly($serial);
        } catch (Exception $ignore) {
            return true;
        }
    }


    //--- (generated code: YFunction implementation)

    function _parseAttr(string $name, mixed $val): int
    {
        switch ($name) {
        case 'logicalName':
            $this->_logicalName = $val;
            return 1;
        case 'advertisedValue':
            $this->_advertisedValue = $val;
            return 1;
        }
        return 0;
    }

    /**
     * Returns the logical name of the function.
     *
     * @return string  a string corresponding to the logical name of the function
     *
     * On failure, throws an exception or returns YFunction.LOGICALNAME_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_logicalName(): string
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::LOGICALNAME_INVALID;
            }
        }
        $res = $this->_logicalName;
        return $res;
    }

    /**
     * Changes the logical name of the function. You can use yCheckLogicalName()
     * prior to this call to make sure that your parameter is valid.
     * Remember to call the saveToFlash() method of the module if the
     * modification must be kept.
     *
     * @param string $newval : a string corresponding to the logical name of the function
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function set_logicalName(string $newval): int
    {
        if (!YAPI::CheckLogicalName($newval)) {
            return $this->_throw(YAPI::INVALID_ARGUMENT,'Invalid name :'.$newval);
        }
        $rest_val = $newval;
        return $this->_setAttr("logicalName", $rest_val);
    }

    /**
     * Returns a short string representing the current state of the function.
     *
     * @return string  a string corresponding to a short string representing the current state of the function
     *
     * On failure, throws an exception or returns YFunction.ADVERTISEDVALUE_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_advertisedValue(): string
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::ADVERTISEDVALUE_INVALID;
            }
        }
        $res = $this->_advertisedValue;
        return $res;
    }

    /**
     * @throws YAPI_Exception
     */
    public function set_advertisedValue(string $newval): int
    {
        $rest_val = $newval;
        return $this->_setAttr("advertisedValue", $rest_val);
    }

    /**
     * Retrieves a function for a given identifier.
     * The identifier can be specified using several formats:
     *
     * - FunctionLogicalName
     * - ModuleSerialNumber.FunctionIdentifier
     * - ModuleSerialNumber.FunctionLogicalName
     * - ModuleLogicalName.FunctionIdentifier
     * - ModuleLogicalName.FunctionLogicalName
     *
     *
     * This function does not require that the function is online at the time
     * it is invoked. The returned object is nevertheless valid.
     * Use the method isOnline() to test if the function is
     * indeed online at a given time. In case of ambiguity when looking for
     * a function by logical name, no error is notified: the first instance
     * found is returned. The search is performed first by hardware name,
     * then by logical name.
     *
     * If a call to this object's is_online() method returns FALSE although
     * you are certain that the matching device is plugged, make sure that you did
     * call registerHub() at application initialization time.
     *
     * @param string $func : a string that uniquely characterizes the function, for instance
     *         MyDevice..
     *
     * @return YFunction  a YFunction object allowing you to drive the function.
     */
    public static function FindFunction(string $func): YFunction
    {
        // $obj                    is a YFunction;
        $obj = YFunction::_FindFromCache('Function', $func);
        if ($obj == null) {
            $obj = new YFunction($func);
            YFunction::_AddToCache('Function', $func, $obj);
        }
        return $obj;
    }

    /**
     * Registers the callback function that is invoked on every change of advertised value.
     * The callback is then invoked only during the execution of ySleep or yHandleEvents.
     * This provides control over the time when the callback is triggered. For good responsiveness,
     * remember to call one of these two functions periodically. The callback is called once juste after beeing
     * registered, passing the current advertised value  of the function, provided that it is not an empty string.
     * To unregister a callback, pass a null pointer as argument.
     *
     * @param callable $callback : the callback function to call, or a null pointer. The callback function
     * should take two
     *         arguments: the function object of which the value has changed, and the character string describing
     *         the new advertised value.
     * @noreturn
     */
    public function registerValueCallback(mixed $callback): int
    {
        // $val                    is a str;
        if (!is_null($callback)) {
            YFunction::_UpdateValueCallbackList($this, true);
        } else {
            YFunction::_UpdateValueCallbackList($this, false);
        }
        $this->_valueCallbackFunction = $callback;
        // Immediately invoke value callback with current value
        if (!is_null($callback) && $this->isOnline()) {
            $val = $this->_advertisedValue;
            if (!($val == '')) {
                $this->_invokeValueCallback($val);
            }
        }
        return 0;
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function _invokeValueCallback(string $value): int
    {
        if (!is_null($this->_valueCallbackFunction)) {
            call_user_func($this->_valueCallbackFunction, $this, $value);
        }
        return 0;
    }

    /**
     * Disables the propagation of every new advertised value to the parent hub.
     * You can use this function to save bandwidth and CPU on computers with limited
     * resources, or to prevent unwanted invocations of the HTTP callback.
     * Remember to call the saveToFlash() method of the module if the
     * modification must be kept.
     *
     * @return int  YAPI::SUCCESS when the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function muteValueCallbacks(): int
    {
        return $this->set_advertisedValue('SILENT');
    }

    /**
     * Re-enables the propagation of every new advertised value to the parent hub.
     * This function reverts the effect of a previous call to muteValueCallbacks().
     * Remember to call the saveToFlash() method of the module if the
     * modification must be kept.
     *
     * @return int  YAPI::SUCCESS when the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function unmuteValueCallbacks(): int
    {
        return $this->set_advertisedValue('');
    }

    /**
     * Returns the current value of a single function attribute, as a text string, as quickly as
     * possible but without using the cached value.
     *
     * @param string $attrName : the name of the requested attribute
     *
     * @return string  a string with the value of the the attribute
     *
     * On failure, throws an exception or returns an empty string.
     * @throws YAPI_Exception on error
     */
    public function loadAttribute(string $attrName): string
    {
        // $url                    is a str;
        // $attrVal                is a bin;
        $url = sprintf('api/%s/%s', $this->get_functionId(), $attrName);
        $attrVal = $this->_download($url);
        return YAPI::Ybin2str($attrVal);
    }

    /**
     * Indicates whether changes to the function are prohibited or allowed.
     * Returns true if the function is blocked by an admin password
     * or if the function is not available.
     *
     * @return boolean  true if the function is write-protected or not online.
     */
    public function isReadOnly(): bool
    {
        return $this->isReadOnly_internal();
    }

    //cannot be generated for PHP:
    //private function isReadOnly_internal()

    /**
     * Returns the serial number of the module, as set by the factory.
     *
     * @return string  a string corresponding to the serial number of the module, as set by the factory.
     *
     * On failure, throws an exception or returns YFunction.SERIALNUMBER_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_serialNumber(): string
    {
        // $m                      is a YModule;
        $m = $this->get_module();
        return $m->get_serialNumber();
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function _parserHelper(): int
    {
        return 0;
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function _is_valid_pass(string $passwd): bool
    {
        // $tmp                    is a str;
        if (strlen($passwd) > YAPI_HASH_BUF_SIZE) {
            $tmp = sprintf('Password too long (max %d chars) :%s', YAPI_HASH_BUF_SIZE, $passwd);
            $this->_throw(YAPI::INVALID_ARGUMENT, $tmp);
            return false;
        }
        if (YAPI::Ystrpos($passwd,'@') >=0) {
            $this->_throw(YAPI::INVALID_ARGUMENT, 'Character @ is not allowed in password');
            return false;
        }
        if (YAPI::Ystrpos($passwd,'/') >=0) {
            $this->_throw(YAPI::INVALID_ARGUMENT, 'Character / is not allowed in password');
            return false;
        }
        return true;
    }

    /**
     * @throws YAPI_Exception
     */
    public function logicalName(): string
{
    return $this->get_logicalName();
}

    /**
     * @throws YAPI_Exception
     */
    public function setLogicalName(string $newval): int
{
    return $this->set_logicalName($newval);
}

    /**
     * @throws YAPI_Exception
     */
    public function advertisedValue(): string
{
    return $this->get_advertisedValue();
}

    /**
     * @throws YAPI_Exception
     */
    public function setAdvertisedValue(string $newval): int
{
    return $this->set_advertisedValue($newval);
}

    /**
     * comment from .yc definition
     */
    public function nextFunction(): ?YFunction
    {
        $resolve = YAPI::resolveFunction($this->_className, $this->_func);
        if ($resolve->errorType != YAPI::SUCCESS) {
            return null;
        }
        $next_hwid = YAPI::getNextHardwareId($this->_className, $resolve->result);
        if ($next_hwid == null) {
            return null;
        }
        return self::FindFunction($next_hwid);
    }

    /**
     * comment from .yc definition
     */
    public static function FirstFunction(): ?YFunction
    {
        $next_hwid = YAPI::getFirstHardwareId('Function');
        if ($next_hwid == null) {
            return null;
        }
        return self::FindFunction($next_hwid);
    }

    //--- (end of generated code: YFunction implementation)

    public static function _FindFromCache(string $className, string $func): ?YFunction
    {
        return YAPI::getFunction($className, $func);
    }

    public static function _AddToCache(string $className, string $func, YFunction $obj): void
    {
        YAPI::setFunction($className, $func, $obj);
    }

    public static function _ClearCache(): void
    {
        YAPI::_init();
    }

    /**
     * internal function
     * @param YFunction $obj_func
     * @param bool $bool_add
     */
    public static function _UpdateValueCallbackList(YFunction $obj_func, bool $bool_add): void
    {
        $index = array_search($obj_func, self::$_ValueCallbackList);
        if ($bool_add) {
            $obj_func->isOnline();
            if ($index === false) {
                self::$_ValueCallbackList[] = $obj_func;
            }
        } elseif ($index !== false) {
            array_splice(self::$_ValueCallbackList, $index, 1);
        }
    }

    /**
     * internal function
     * @param YFunction $obj_func
     * @param bool $bool_add
     */
    public static function _UpdateTimedReportCallbackList(YFunction $obj_func, bool $bool_add): void
    {
        $index = array_search($obj_func, self::$_TimedReportCallbackList);
        if ($bool_add) {
            $obj_func->isOnline();
            if ($index === false) {
                self::$_TimedReportCallbackList[] = $obj_func;
            }
        } elseif ($index !== false) {
            array_splice(self::$_TimedReportCallbackList, $index, 1);
        }
    }

    /**
     *  Throw an exception, keeping track of it in the object itself
     * @throws YAPI_Exception
     */
    public function _throw(int $int_errType, string $str_errMsg, mixed $obj_retVal = null): mixed
    {
        $this->_lastErrorType = $int_errType;
        $this->_lastErrorMsg = $str_errMsg;

        if (YAPI::$exceptionsDisabled) {
            return $obj_retVal;
        }
        // throw an exception
        throw new YAPI_Exception($str_errMsg, $int_errType);
    }

    /**
     * Returns a short text that describes unambiguously the instance of the function in the form
     * TYPE(NAME)=SERIAL&#46;FUNCTIONID.
     * More precisely,
     * TYPE       is the type of the function,
     * NAME       it the name used for the first access to the function,
     * SERIAL     is the serial number of the module if the module is connected or "unresolved", and
     * FUNCTIONID is  the hardware identifier of the function if the module is connected.
     * For example, this method returns Relay(MyCustomName.relay1)=RELAYLO1-123456.relay1 if the
     * module is connected or Relay(BadCustomeName.relay1)=unresolved if the module is
     * not connected. This method does not trigger any USB or TCP transaction and can therefore be used in
     * a debugger.
     *
     * @return string  a string that describes the function
     *         (ex: Relay(MyCustomName.relay1)=RELAYLO1-123456.relay1)
     */
    public function describe(): string
    {
        $resolve = YAPI::resolveFunction($this->_className, $this->_func);
        if ($resolve->errorType != YAPI::SUCCESS && $resolve->result != $this->_func) {
            return $this->_className . "({$this->_func})=unresolved";
        }
        return $this->_className . "({$this->_func})={$resolve->result}";
    }

    /**
     * Returns the unique hardware identifier of the function in the form SERIAL.FUNCTIONID.
     * The unique hardware identifier is composed of the device serial
     * number and of the hardware identifier of the function (for example RELAYLO1-123456.relay1).
     *
     * @return string  a string that uniquely identifies the function (ex: RELAYLO1-123456.relay1)
     *
     * On failure, throws an exception or returns  YFunction.HARDWAREID_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_hardwareId(): string
    {
        $resolve = YAPI::resolveFunction($this->_className, $this->_func);
        if ($resolve->errorType != YAPI::SUCCESS) {
            $this->isOnline();
            $resolve = YAPI::resolveFunction($this->_className, $this->_func);
            if ($resolve->errorType != YAPI::SUCCESS) {
                return $this->_throw($resolve->errorType, $resolve->errorMsg, YFunction::HARDWAREID_INVALID);
            }
        }
        return $resolve->result;
    }

    /**
     * Returns the hardware identifier of the function, without reference to the module. For example
     * relay1
     *
     * @return string  a string that identifies the function (ex: relay1)
     *
     * On failure, throws an exception or returns  YFunction.FUNCTIONID_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_functionId(): string
    {
        $resolve = YAPI::resolveFunction($this->_className, $this->_func);
        if ($resolve->errorType != YAPI::SUCCESS) {
            $this->isOnline();
            $resolve = YAPI::resolveFunction($this->_className, $this->_func);
            if ($resolve->errorType != YAPI::SUCCESS) {
                return $this->_throw($resolve->errorType, $resolve->errorMsg, YFunction::FUNCTIONID_INVALID);
            }
        }
        return substr($resolve->result, strpos($resolve->result, '.') + 1);
    }

    /**
     * Returns a global identifier of the function in the format MODULE_NAME&#46;FUNCTION_NAME.
     * The returned string uses the logical names of the module and of the function if they are defined,
     * otherwise the serial number of the module and the hardware identifier of the function
     * (for example: MyCustomName.relay1)
     *
     * @return string  a string that uniquely identifies the function using logical names
     *         (ex: MyCustomName.relay1)
     *
     * On failure, throws an exception or returns  YFunction.FRIENDLYNAME_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_friendlyName(): string
    {
        $resolve = YAPI::getFriendlyNameFunction($this->_className, $this->_func);
        if ($resolve->errorType != YAPI::SUCCESS) {
            $this->isOnline();
            $resolve = YAPI::getFriendlyNameFunction($this->_className, $this->_func);
            if ($resolve->errorType != YAPI::SUCCESS) {
                return $this->_throw($resolve->errorType, $resolve->errorMsg, YFunction::FRIENDLYNAME_INVALID);
            }
        }
        return $resolve->result;
    }


    // Store and parse a an API request for current function
    //
    protected function _parse(YAPI_YReq $yreq, float $msValidity): void
    {
        // save the whole structure for backward-compatibility
        $this->_cacheExpiration = YAPI::GetTickCount() + $msValidity;
        $this->_serial = $yreq->deviceid;
        $this->_funId = $yreq->functionid;
        $this->_hwId = $yreq->hwid;
        $this->_cache = $yreq->result;
        // process each attribute in turn for class-oriented processing
        foreach ($yreq->result as $key => $val) {
            $this->_parseAttr($key, $val);
        }
        $this->_parserHelper();
    }

    // Return the value of an attribute from function cache, after reloading it from device if needed
    // Note: the function cache is a typed (parsed) cache, contrarily to the agnostic device cache
    protected function _getAttr(string $str_attr): ?string
    {
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            // no valid cached value, reload from device
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI::SUCCESS) {
                return null;
            }
        }
        if (!isset($this->_cache[$str_attr])) {
            $this->_throw(YAPI::VERSION_MISMATCH, 'No such attribute $str_attr in function', null);
        }
        return $this->_cache[$str_attr];
    }

    // Return the value of an attribute from function cache, after loading it from device if never done
    protected function _getFixedAttr(string $str_attr): ?string
    {
        if ($this->_cacheExpiration == 0) {
            // no cached value, load from device
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI::SUCCESS) {
                return null;
            }
        }
        if (!isset($this->_cache[$str_attr])) {
            $this->_throw(YAPI::VERSION_MISMATCH, "No such attribute $str_attr in function", null);
        }
        return $this->_cache[$str_attr];
    }

    /**
     * urlencode according to RFC 3986 instead of php default RFC 1738
     * BUT use iso-8859-1 encoding since this is for Yoctopuce modules
     */
    public function _escapeAttr(string $str_val): string
    {
        $safecodes = ['%21', '%23', '%24', '%27', '%28', '%29', '%2A', '%2C', '%2F', '%3A', '%3B', '%40', '%3F', '%5B', '%5D'];
        $safechars = ['!', "#", "$", "'", "(", ")", '*', ",", "/", ":", ";", "@", "?", "[", "]"];
        $isAscii = !preg_match('~[\x7f-\xff]~', $str_val);
        if (!$isAscii) {
            // check if string is made of utf-8 characters that can be converted to iso-8859-1
            $isUtf8 = preg_match('~^([\x00-\x7f]|[\xC2-\xC3][\x80-\xBF])+$~', $str_val);
            if ($isUtf8) {
                $str_val = iconv("UTF-8", "ISO-8859-1", $str_val);
            }
        }
        return str_replace($safecodes, $safechars, urlencode($str_val));
    }

    /**
     * Change the value of an attribute on a device, and update cache on the fly
     * Note: the function cache is a typed (parsed) cache, contrarily to the agnostic device cache
     * @throws YAPI_Exception
     */
    protected function _setAttr(string $str_attr, string $str_newval): int
    {
        if (!isset($str_newval)) {
            $this->_throw(YAPI::INVALID_ARGUMENT, "Undefined value to set for attribute $str_attr", null);
        }
        $attrname = $this->_escapeAttr($str_attr);
        $str_newval = $this->_escapeAttr($str_newval);
        $extra = "/{$attrname}?{$attrname}={$str_newval}&.";
        $yreq = YAPI::funcRequest($this->_className, $this->_func, $extra);
        if ($this->_cacheExpiration != 0) {
            $this->_cacheExpiration = YAPI::GetTickCount();
        }
        if ($yreq->errorType != YAPI::SUCCESS) {
            return $this->_throw($yreq->errorType, $yreq->errorMsg, $yreq->errorType);
        }
        return YAPI::SUCCESS;
    }

    /**
     * Execute an arbitrary HTTP GET request on the device and return the binary content
     * @throws YAPI_Exception
     */
    public function _download(string $str_path): mixed
    {
        // get the device serial number
        $devid = $this->module()->get_serialNumber();
        if ($devid == YModule::SERIALNUMBER_INVALID) {
            return '';
        }
        $yreq = YAPI::devRequest($devid, "GET /$str_path");
        if ($yreq->errorType != YAPI::SUCCESS) {
            return $this->_throw($yreq->errorType, $yreq->errorMsg, '');
        }
        return $yreq->result;
    }

    /**
     * Upload a file to the filesystem, to the specified full path name.
     * If a file already exists with the same path name, its content is overwritten.
     * @param string $str_path
     * @param mixed $bin_content
     * @return int
     * @throws YAPI_Exception
     */
    public function _upload(string $str_path, mixed $bin_content): int
    {
        // get the device serial number
        $devid = $this->module()->get_serialNumber();
        if ($devid == YModule::SERIALNUMBER_INVALID) {
            return $this->get_errorType();
        }
        if (is_array($bin_content)) {
            $bin_content = call_user_func_array('pack', array_merge(array("C*"), $bin_content));
        }
        $httpreq = 'POST /upload.html';
        $body = "Content-Disposition: form-data; name=\"$str_path\"; filename=\"api\"\r\n" .
            "Content-Type: application/octet-stream\r\n" .
            "Content-Transfer-Encoding: binary\r\n\r\n" . $bin_content;
        $yreq = YAPI::devRequest($devid, $httpreq, true, $body);
        if ($yreq->errorType != YAPI::SUCCESS) {
            return $yreq->errorType;
        }
        return YAPI::SUCCESS;
    }

    // Upload a file to the filesystem, to the specified full path name.
    // If a file already exists with the same path name, its content is overwritten.
    //
    public function _uploadEx(string $str_path, mixed $bin_content)
    {
        // get the device serial number
        $devid = $this->module()->get_serialNumber();
        if ($devid == YModule::SERIALNUMBER_INVALID) {
            return $this->get_errorType();
        }
        if (is_array($bin_content)) {
            $bin_content = call_user_func_array('pack', array_merge(array("C*"), $bin_content));
        }
        $httpreq = 'POST /upload.html';
        $body = "Content-Disposition: form-data; name=\"$str_path\"; filename=\"api\"\r\n" .
            "Content-Type: application/octet-stream\r\n" .
            "Content-Transfer-Encoding: binary\r\n\r\n" . $bin_content;
        $yreq = YAPI::devRequest($devid, $httpreq, false, $body);
        if ($yreq->errorType != YAPI::SUCCESS) {
            return $this->_throw($yreq->errorType, $yreq->errorMsg, '');
        }
        return $yreq->result;
    }


    // Get a value from a JSON buffer
    //
    public function _json_get_key(string $bin_jsonbuff, string $str_key): mixed
    {
        $loadval = json_decode(YAPI::Ybin2str($bin_jsonbuff), true);
        if (isset($loadval[$str_key])) {
            return $loadval[$str_key];
        }
        return "";
    }

    // Get a string from a JSON buffer
    //
    public function _json_get_string(string $bin_jsonbuff): string
    {
        return json_decode(YAPI::Ybin2str($bin_jsonbuff), true);
    }

    // Get an array of strings from a JSON buffer
    //
    public function _json_get_array(string $bin_jsonbuff): array
    {
        $loadval = json_decode(YAPI::Ybin2str($bin_jsonbuff), true);
        $res = array();
        foreach ($loadval as $record) {
            $res[] = YAPI::Ystr2bin(json_encode($record, JSON_UNESCAPED_UNICODE));
        }
        return $res;
    }

    public function _get_json_path(string $bin_jsonbuff, string $path): string
    {
        $json = json_decode(YAPI::Ybin2str($bin_jsonbuff), true);
        $paths = explode('|', $path);
        foreach ($paths as $key) {
            if (array_key_exists($key, $json)) {
                $json = $json[$key];
            } else {
                return '';
            }
        }
        return YAPI::Ystr2bin(json_encode($json, JSON_UNESCAPED_UNICODE));
    }

    public function _decode_json_string(string $bin_json): string
    {
        $decoded = json_decode(YAPI::Ybin2str($bin_json));
        if (is_null($decoded)) {
            return '';
        }
        return $decoded;
    }

    public function _decode_json_int(string $bin_json): int
    {
        $decoded = json_decode(YAPI::Ybin2str($bin_json));
        if (is_null($decoded)) {
            return 0;
        }
        return $decoded;
    }

    /**
     * Method used to cache DataStream objects (new DataLogger)
     * @param YDataSet $obj_dataset
     * @param string $str_def
     * @return ?YDataStream
     */
    public function _findDataStream(YDataSet $obj_dataset, string $str_def): ?YDataStream
    {
        $key = $obj_dataset->get_functionId() . ":" . $str_def;
        if (isset($this->_dataStreams[$key])) {
            return $this->_dataStreams[$key];
        }

        $words = YAPI::_decodeWords($str_def);
        if (sizeof($words) < 14) {
            $this->_throw(YAPI::VERSION_MISMATCH, "device firmware is too old");
            return null;
        }
        $newDataStream = new YDataStream($this, $obj_dataset, $words);
        $this->_dataStreams[$key] = $newDataStream;
        return $newDataStream;
    }

    // Method used to clear cache of DataStream object (undocumented)
    public function _clearDataStreamCache(): void
    {
        $this->_dataStreams = array();
    }


    public function _getValueCallback(): callable
    {
        return $this->_valueCallbackFunction;
    }

    /**
     * Checks if the function is currently reachable, without raising any error.
     * If there is a cached value for the function in cache, that has not yet
     * expired, the device is considered reachable.
     * No exception is raised if there is an error while trying to contact the
     * device hosting the function.
     *
     * @return boolean  true if the function can be reached, and false otherwise
     */
    public function isOnline(): bool
    {
        // A valid value in cache means that the device is online
        if ($this->_cacheExpiration > YAPI::GetTickCount()) {
            return true;
        }

        // Check that the function is available without throwing exceptions
        $yreq = YAPI::funcRequest($this->_className, $this->_func, '');
        if ($yreq->errorType != YAPI::SUCCESS) {
            return false;
        }
        // save result in cache anyway
        $this->_parse($yreq, YAPI::$defaultCacheValidity);

        return true;
    }

    /**
     * Returns the numerical error code of the latest error with the function.
     * This method is mostly useful when using the Yoctopuce library with
     * exceptions disabled.
     *
     * @return int  a number corresponding to the code of the latest error that occurred while
     *         using the function object
     */
    public function get_errorType(): int
    {
        return $this->_lastErrorType;
    }

    public function errorType(): int
    {
        return $this->_lastErrorType;
    }

    public function errType(): int
    {
        return $this->_lastErrorType;
    }

    /**
     * Returns the error message of the latest error with the function.
     * This method is mostly useful when using the Yoctopuce library with
     * exceptions disabled.
     *
     * @return string  a string corresponding to the latest error message that occured while
     *         using the function object
     */
    public function get_errorMessage(): string
    {
        return $this->_lastErrorMsg;
    }

    public function errorMessage(): string
    {
        return $this->_lastErrorMsg;
    }

    public function errMessage(): string
    {
        return $this->_lastErrorMsg;
    }

    /**
     * Preloads the function cache with a specified validity duration.
     * By default, whenever accessing a device, all function attributes
     * are kept in cache for the standard duration (5 ms). This method can be
     * used to temporarily mark the cache as valid for a longer period, in order
     * to reduce network traffic for instance.
     *
     * @param float $msValidity : an integer corresponding to the validity attributed to the
     *         loaded function parameters, in milliseconds
     *
     * @return int  YAPI::SUCCESS when the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function load(float $msValidity): int
    {
        $yreq = YAPI::funcRequest($this->_className, $this->_func, '');
        if ($yreq->errorType != YAPI::SUCCESS) {
            return $this->_throw($yreq->errorType, $yreq->errorMsg, $yreq->errorType);
        }
        $this->_parse($yreq, $msValidity);

        return YAPI::SUCCESS;
    }

    /**
     * Invalidates the cache. Invalidates the cache of the function attributes. Forces the
     * next call to get_xxx() or loadxxx() to use values that come from the device.
     *
     * @noreturn
     */
    public function clearCache(): void
    {
        $resolve = YAPI::resolveFunction($this->_className, $this->_func);
        if ($resolve->errorType != YAPI::SUCCESS) {
            return;
        }
        $str_func = $resolve->result;
        $dotpos = strpos($str_func, '.');
        $devid = substr($str_func, 0, $dotpos);
        $funcid = substr($str_func, $dotpos + 1);
        $dev = YAPI::getDevice($devid);
        if (is_null($dev)) {
            return;
        }
        $dev->dropCache();
        if ($this->_cacheExpiration > 0) {
            $this->_cacheExpiration = YAPI::GetTickCount();
        }
    }

    // Internal method to force reloading even lazy attributes (eg. displayWidth, etc)
    public function _clearLazyCache(): void
    {
        $this->clearCache();
        $this->_cacheExpiration = 0;
    }

    /**
     * Gets the YModule object for the device on which the function is located.
     * If the function cannot be located on any module, the returned instance of
     * YModule is not shown as on-line.
     *
     * @return ?YModule  an instance of YModule
     */
    public function get_module(): YModule
    {
        // try to resolve the function name to a device id without query
        if ($this->_serial != '') {
            return YModule::FindModule($this->_serial . '.module');
        }
        $hwid = $this->_func;
        if (strpos($hwid, '.') === false) {
            $resolve = YAPI::resolveFunction($this->_className, $this->_func);
            if ($resolve->errorType == YAPI::SUCCESS) {
                $hwid = $resolve->result;
            }
        }
        $dotidx = strpos($hwid, '.');
        if ($dotidx !== false) {
            // resolution worked
            return YModule::FindModule(substr($hwid, 0, $dotidx) . '.module');
        }

        // device not resolved for now, force a communication for a last chance resolution
        if ($this->load(YAPI::$defaultCacheValidity) == YAPI::SUCCESS) {
            $resolve = YAPI::resolveFunction($this->_className, $this->_func);
            if ($resolve->errorType == YAPI::SUCCESS) {
                $hwid = $resolve->result;
            }
        }
        $dotidx = strpos($hwid, '.');
        if ($dotidx !== false) {
            // resolution worked
            return YModule::FindModule(substr($hwid, 0, $dotidx) . '.module');
        }
        // return a true YModule object even if it is not a module valid for communicating
        return YModule::FindModule('module_of_' . $this->_className . '_' . $this->_func);
    }

    public function module(): YModule
    {
        return $this->get_module();
    }

    /**
     * Returns a unique identifier of type YFUN_DESCR corresponding to the function.
     * This identifier can be used to test if two instances of YFunction reference the same
     * physical function on the same physical device.
     *
     * @return string  an identifier of type YFUN_DESCR.
     *
     * If the function has never been contacted, the returned value is Y$CLASSNAME$.FUNCTIONDESCRIPTOR_INVALID.
     */
    public function get_functionDescriptor(): string
    {
        // try to resolve the function name to a device id without query
        $hwid = $this->_func;
        if (strpos($hwid, '.') === false) {
            $resolve = YAPI::resolveFunction($this->_className, $this->_func);
            if ($resolve->errorType != YAPI::SUCCESS) {
                $hwid = $resolve->result;
            }
        }
        $dotidx = strpos($hwid, '.');
        if ($dotidx !== false) {
            // resolution worked
            return $hwid;
        }
        return YFunction::FUNCTIONDESCRIPTOR_INVALID;
    }

    public function getFunctionDescriptor(): string
    {
        return $this->get_functionDescriptor();
    }

    /**
     * Returns the value of the userData attribute, as previously stored using method
     * set_userData.
     * This attribute is never touched directly by the API, and is at disposal of the caller to
     * store a context.
     *
     * @return Object  the object stored previously by the caller.
     */
    public function get_userData(): mixed
    {
        return $this->_userData;
    }

    public function userData(): mixed
    {
        return $this->_userData;
    }

    /**
     * Stores a user context provided as argument in the userData attribute of the function.
     * This attribute is never touched by the API, and is at disposal of the caller to store a context.
     *
     * @param Object $data : any kind of object to be stored
     * @noreturn
     */
    public function set_userData(mixed $data): void
    {
        $this->_userData = $data;
    }

    public function setUserData(mixed $data): void
    {
        $this->_userData = $data;
    }
}

//^^^^ YFunction.php

class YCalibCtx
{
    public string $src;
    public int $typ;
    public array $par;
    public array $raw;
    public array $cal;
    public mixed $hdl;

    /**
     * @param string $src
     * @param int $typ
     * @param array $par
     * @param array $raw
     * @param array $cal
     * @param mixed $hdl
     */
    public function __construct(string $src, mixed $hdl, int $typ, array $par, array $raw, array $cal)
    {
        $this->src = $src;
        $this->typ = $typ;
        $this->par = $par;
        $this->raw = $raw;
        $this->cal = $cal;
        $this->hdl = $hdl;
    }
}

//--- (generated code: YSensor declaration)
//vvvv YSensor.php

/**
 * YSensor Class: Sensor function interface.
 *
 * The YSensor class is the parent class for all Yoctopuce sensor types. It can be
 * used to read the current value and unit of any sensor, read the min/max
 * value, configure autonomous recording frequency and access recorded data.
 * It also provides a function to register a callback invoked each time the
 * observed value changes, or at a predefined interval. Using this class rather
 * than a specific subclass makes it possible to create generic applications
 * that work with any Yoctopuce sensor, even those that do not yet exist.
 * Note: The YAnButton class is the only analog input which does not inherit
 * from YSensor::
 */
class YSensor extends YFunction
{
    const UNIT_INVALID = YAPI::INVALID_STRING;
    const CURRENTVALUE_INVALID = YAPI::INVALID_DOUBLE;
    const LOWESTVALUE_INVALID = YAPI::INVALID_DOUBLE;
    const HIGHESTVALUE_INVALID = YAPI::INVALID_DOUBLE;
    const CURRENTRAWVALUE_INVALID = YAPI::INVALID_DOUBLE;
    const LOGFREQUENCY_INVALID = YAPI::INVALID_STRING;
    const REPORTFREQUENCY_INVALID = YAPI::INVALID_STRING;
    const ADVMODE_IMMEDIATE = 0;
    const ADVMODE_PERIOD_AVG = 1;
    const ADVMODE_PERIOD_MIN = 2;
    const ADVMODE_PERIOD_MAX = 3;
    const ADVMODE_INVALID = -1;
    const CALIBRATIONPARAM_INVALID = YAPI::INVALID_STRING;
    const RESOLUTION_INVALID = YAPI::INVALID_DOUBLE;
    const SENSORSTATE_INVALID = YAPI::INVALID_INT;
    //--- (end of generated code: YSensor declaration)
    const DATA_INVALID = YAPI::INVALID_DOUBLE;
    protected mixed $_cal = null;

    //--- (generated code: YSensor attributes)
    protected string $_unit = self::UNIT_INVALID;           // Text
    protected float $_currentValue = self::CURRENTVALUE_INVALID;   // MeasureVal
    protected float $_lowestValue = self::LOWESTVALUE_INVALID;    // MeasureVal
    protected float $_highestValue = self::HIGHESTVALUE_INVALID;   // MeasureVal
    protected float $_currentRawValue = self::CURRENTRAWVALUE_INVALID; // MeasureVal
    protected string $_logFrequency = self::LOGFREQUENCY_INVALID;   // YFrequency
    protected string $_reportFrequency = self::REPORTFREQUENCY_INVALID; // YFrequency
    protected int $_advMode = self::ADVMODE_INVALID;        // AdvertisingMode
    protected string $_calibrationParam = self::CALIBRATIONPARAM_INVALID; // CalibParams
    protected float $_resolution = self::RESOLUTION_INVALID;     // MeasureVal
    protected int $_sensorState = self::SENSORSTATE_INVALID;    // Int
    protected mixed $_timedReportCallbackSensor = null;                         // YSensorTimedReportCallback
    protected float $_prevTR = 0;                            // float
    protected float $_iresol = 0;                            // float

    //--- (end of generated code: YSensor attributes)

    function __construct(string $str_func)
    {
        //--- (generated code: YSensor constructor)
        parent::__construct($str_func);
        $this->_className = 'Sensor';

        //--- (end of generated code: YSensor constructor)
    }

    public function _getTimedReportCallback(): callable
    {
        return $this->_timedReportCallbackSensor;
    }

    //--- (generated code: YSensor implementation)

    function _parseAttr(string $name, mixed $val): int
    {
        switch ($name) {
        case 'unit':
            $this->_unit = $val;
            return 1;
        case 'currentValue':
            $this->_currentValue = round($val / 65.536) / 1000.0;
            return 1;
        case 'lowestValue':
            $this->_lowestValue = round($val / 65.536) / 1000.0;
            return 1;
        case 'highestValue':
            $this->_highestValue = round($val / 65.536) / 1000.0;
            return 1;
        case 'currentRawValue':
            $this->_currentRawValue = round($val / 65.536) / 1000.0;
            return 1;
        case 'logFrequency':
            $this->_logFrequency = $val;
            return 1;
        case 'reportFrequency':
            $this->_reportFrequency = $val;
            return 1;
        case 'advMode':
            $this->_advMode = intval($val);
            return 1;
        case 'calibrationParam':
            $this->_calibrationParam = $val;
            return 1;
        case 'resolution':
            $this->_resolution = round($val / 65.536) / 1000.0;
            return 1;
        case 'sensorState':
            $this->_sensorState = intval($val);
            return 1;
        }
        return parent::_parseAttr($name, $val);
    }

    /**
     * Returns the measuring unit for the measure.
     *
     * @return string  a string corresponding to the measuring unit for the measure
     *
     * On failure, throws an exception or returns YSensor.UNIT_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_unit(): string
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::UNIT_INVALID;
            }
        }
        $res = $this->_unit;
        return $res;
    }

    /**
     * Returns the current value of the measure, in the specified unit, as a floating point number.
     * Note that a get_currentValue() call will *not* start a measure in the device, it
     * will just return the last measure that occurred in the device. Indeed, internally, each Yoctopuce
     * devices is continuously making measurements at a hardware specific frequency.
     *
     * If continuously calling  get_currentValue() leads you to performances issues, then
     * you might consider to switch to callback programming model. Check the "advanced
     * programming" chapter in in your device user manual for more information.
     *
     * @return float  a floating point number corresponding to the current value of the measure, in the
     * specified unit, as a floating point number
     *
     * On failure, throws an exception or returns YSensor.CURRENTVALUE_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_currentValue(): float
    {
        // $res                    is a double;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::CURRENTVALUE_INVALID;
            }
        }
        if ($this->_cal == null) {
            $res = $this->_currentValue;
        } else {
            $res = $this->_applyCalibration($this->_currentRawValue);
        }
        if ($res == self::CURRENTVALUE_INVALID) {
            return $res;
        }
        $res = round($res * $this->_iresol) / $this->_iresol;
        return $res;
    }

    /**
     * Changes the recorded minimal value observed. Can be used to reset the value returned
     * by get_lowestValue().
     *
     * @param float $newval : a floating point number corresponding to the recorded minimal value observed
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function set_lowestValue(float $newval): int
    {
        $rest_val = strval(round($newval * 65536.0));
        return $this->_setAttr("lowestValue", $rest_val);
    }

    /**
     * Returns the minimal value observed for the measure since the device was started.
     * Can be reset to an arbitrary value thanks to set_lowestValue().
     *
     * @return float  a floating point number corresponding to the minimal value observed for the measure
     * since the device was started
     *
     * On failure, throws an exception or returns YSensor.LOWESTVALUE_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_lowestValue(): float
    {
        // $res                    is a double;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::LOWESTVALUE_INVALID;
            }
        }
        $res = round($this->_lowestValue * $this->_iresol) / $this->_iresol;
        return $res;
    }

    /**
     * Changes the recorded maximal value observed. Can be used to reset the value returned
     * by get_lowestValue().
     *
     * @param float $newval : a floating point number corresponding to the recorded maximal value observed
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function set_highestValue(float $newval): int
    {
        $rest_val = strval(round($newval * 65536.0));
        return $this->_setAttr("highestValue", $rest_val);
    }

    /**
     * Returns the maximal value observed for the measure since the device was started.
     * Can be reset to an arbitrary value thanks to set_highestValue().
     *
     * @return float  a floating point number corresponding to the maximal value observed for the measure
     * since the device was started
     *
     * On failure, throws an exception or returns YSensor.HIGHESTVALUE_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_highestValue(): float
    {
        // $res                    is a double;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::HIGHESTVALUE_INVALID;
            }
        }
        $res = round($this->_highestValue * $this->_iresol) / $this->_iresol;
        return $res;
    }

    /**
     * Returns the uncalibrated, unrounded raw value returned by the
     * sensor, in the specified unit, as a floating point number.
     *
     * @return float  a floating point number corresponding to the uncalibrated, unrounded raw value returned by the
     *         sensor, in the specified unit, as a floating point number
     *
     * On failure, throws an exception or returns YSensor.CURRENTRAWVALUE_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_currentRawValue(): float
    {
        // $res                    is a double;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::CURRENTRAWVALUE_INVALID;
            }
        }
        $res = $this->_currentRawValue;
        return $res;
    }

    /**
     * Returns the datalogger recording frequency for this function, or "OFF"
     * when measures are not stored in the data logger flash memory.
     *
     * @return string  a string corresponding to the datalogger recording frequency for this function, or "OFF"
     *         when measures are not stored in the data logger flash memory
     *
     * On failure, throws an exception or returns YSensor.LOGFREQUENCY_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_logFrequency(): string
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::LOGFREQUENCY_INVALID;
            }
        }
        $res = $this->_logFrequency;
        return $res;
    }

    /**
     * Changes the datalogger recording frequency for this function.
     * The frequency can be specified as samples per second,
     * as sample per minute (for instance "15/m") or in samples per
     * hour (eg. "4/h"). To disable recording for this function, use
     * the value "OFF". Note that setting the  datalogger recording frequency
     * to a greater value than the sensor native sampling frequency is useless,
     * and even counterproductive: those two frequencies are not related.
     * Remember to call the saveToFlash() method of the module if the modification must be kept.
     *
     * @param string $newval : a string corresponding to the datalogger recording frequency for this function
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function set_logFrequency(string $newval): int
    {
        $rest_val = $newval;
        return $this->_setAttr("logFrequency", $rest_val);
    }

    /**
     * Returns the timed value notification frequency, or "OFF" if timed
     * value notifications are disabled for this function.
     *
     * @return string  a string corresponding to the timed value notification frequency, or "OFF" if timed
     *         value notifications are disabled for this function
     *
     * On failure, throws an exception or returns YSensor.REPORTFREQUENCY_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_reportFrequency(): string
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::REPORTFREQUENCY_INVALID;
            }
        }
        $res = $this->_reportFrequency;
        return $res;
    }

    /**
     * Changes the timed value notification frequency for this function.
     * The frequency can be specified as samples per second,
     * as sample per minute (for instance "15/m") or in samples per
     * hour (e.g. "4/h"). To disable timed value notifications for this
     * function, use the value "OFF". Note that setting the  timed value
     * notification frequency to a greater value than the sensor native
     * sampling frequency is unless, and even counterproductive: those two
     * frequencies are not related.
     * Remember to call the saveToFlash() method of the module if the modification must be kept.
     *
     * @param string $newval : a string corresponding to the timed value notification frequency for this function
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function set_reportFrequency(string $newval): int
    {
        $rest_val = $newval;
        return $this->_setAttr("reportFrequency", $rest_val);
    }

    /**
     * Returns the measuring mode used for the advertised value pushed to the parent hub.
     *
     * @return int  a value among YSensor.ADVMODE_IMMEDIATE, YSensor.ADVMODE_PERIOD_AVG,
     * YSensor.ADVMODE_PERIOD_MIN and YSensor.ADVMODE_PERIOD_MAX corresponding to the measuring mode used
     * for the advertised value pushed to the parent hub
     *
     * On failure, throws an exception or returns YSensor.ADVMODE_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_advMode(): int
    {
        // $res                    is a enumADVERTISINGMODE;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::ADVMODE_INVALID;
            }
        }
        $res = $this->_advMode;
        return $res;
    }

    /**
     * Changes the measuring mode used for the advertised value pushed to the parent hub.
     * Remember to call the saveToFlash() method of the module if the modification must be kept.
     *
     * @param int $newval : a value among YSensor.ADVMODE_IMMEDIATE, YSensor.ADVMODE_PERIOD_AVG,
     * YSensor.ADVMODE_PERIOD_MIN and YSensor.ADVMODE_PERIOD_MAX corresponding to the measuring mode used
     * for the advertised value pushed to the parent hub
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function set_advMode(int $newval): int
    {
        $rest_val = strval($newval);
        return $this->_setAttr("advMode", $rest_val);
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function get_calibrationParam(): string
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::CALIBRATIONPARAM_INVALID;
            }
        }
        $res = $this->_calibrationParam;
        return $res;
    }

    /**
     * @throws YAPI_Exception
     */
    public function set_calibrationParam(string $newval): int
    {
        $rest_val = $newval;
        return $this->_setAttr("calibrationParam", $rest_val);
    }

    /**
     * Changes the resolution of the measured physical values. The resolution corresponds to the numerical precision
     * when displaying value. It does not change the precision of the measure itself.
     * Remember to call the saveToFlash() method of the module if the modification must be kept.
     *
     * @param float $newval : a floating point number corresponding to the resolution of the measured physical values
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function set_resolution(float $newval): int
    {
        $rest_val = strval(round($newval * 65536.0));
        return $this->_setAttr("resolution", $rest_val);
    }

    /**
     * Returns the resolution of the measured values. The resolution corresponds to the numerical precision
     * of the measures, which is not always the same as the actual precision of the sensor.
     * Remember to call the saveToFlash() method of the module if the modification must be kept.
     *
     * @return float  a floating point number corresponding to the resolution of the measured values
     *
     * On failure, throws an exception or returns YSensor.RESOLUTION_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_resolution(): float
    {
        // $res                    is a double;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::RESOLUTION_INVALID;
            }
        }
        $res = $this->_resolution;
        return $res;
    }

    /**
     * Returns the sensor state code, which is zero when there is an up-to-date measure
     * available or a positive code if the sensor is not able to provide a measure right now.
     *
     * @return int  an integer corresponding to the sensor state code, which is zero when there is an
     * up-to-date measure
     *         available or a positive code if the sensor is not able to provide a measure right now
     *
     * On failure, throws an exception or returns YSensor.SENSORSTATE_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_sensorState(): int
    {
        // $res                    is a int;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::SENSORSTATE_INVALID;
            }
        }
        $res = $this->_sensorState;
        return $res;
    }

    /**
     * Retrieves a sensor for a given identifier.
     * The identifier can be specified using several formats:
     *
     * - FunctionLogicalName
     * - ModuleSerialNumber.FunctionIdentifier
     * - ModuleSerialNumber.FunctionLogicalName
     * - ModuleLogicalName.FunctionIdentifier
     * - ModuleLogicalName.FunctionLogicalName
     *
     *
     * This function does not require that the sensor is online at the time
     * it is invoked. The returned object is nevertheless valid.
     * Use the method isOnline() to test if the sensor is
     * indeed online at a given time. In case of ambiguity when looking for
     * a sensor by logical name, no error is notified: the first instance
     * found is returned. The search is performed first by hardware name,
     * then by logical name.
     *
     * If a call to this object's is_online() method returns FALSE although
     * you are certain that the matching device is plugged, make sure that you did
     * call registerHub() at application initialization time.
     *
     * @param string $func : a string that uniquely characterizes the sensor, for instance
     *         MyDevice..
     *
     * @return YSensor  a YSensor object allowing you to drive the sensor.
     */
    public static function FindSensor(string $func): YSensor
    {
        // $obj                    is a YSensor;
        $obj = YFunction::_FindFromCache('Sensor', $func);
        if ($obj == null) {
            $obj = new YSensor($func);
            YFunction::_AddToCache('Sensor', $func, $obj);
        }
        return $obj;
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function _parserHelper(): int
    {
        // $calibStr               is a str;
        // Store inverted resolution, to provide better rounding
        if ($this->_resolution > 0) {
            $this->_iresol = round(1.0 / $this->_resolution);
        } else {
            $this->_iresol = 10000;
        }
        // Shortcut when there is no calibration parameter
        $calibStr = $this->_calibrationParam;
        if ($calibStr == '0,' || $calibStr == '' || $calibStr == '0') {
            $this->_cal = null;
            return 0;
        }
        // Parse calibration parameters only if they have changed
        if ($this->_cal == null || !($this->_cal->src == $calibStr)) {
            $this->_parseCalibStr($calibStr);
        }
        return 0;
    }

    /**
     * Checks if the sensor is currently able to provide an up-to-date measure.
     * Returns false if the device is unreachable, or if the sensor does not have
     * a current measure to transmit. No exception is raised if there is an error
     * while trying to contact the device hosting $THEFUNCTION$.
     *
     * @return boolean  true if the sensor can provide an up-to-date measure, and false otherwise
     */
    public function isSensorReady(): bool
    {
        try {
            if ($this->get_sensorState() != 0) {
                return false;
            }
        } catch (Exception $ex) {
            return false;
        }
        return true;
    }

    /**
     * Returns the YDatalogger object of the device hosting the sensor. This method returns an object
     * that can control global parameters of the data logger. The returned object
     * should not be freed.
     *
     * @return ?YDataLogger  an YDatalogger object, or null on error.
     */
    public function get_dataLogger(): ?YDataLogger
    {
        // $logger                 is a YDataLogger;
        // $modu                   is a YModule;
        // $serial                 is a str;
        // $hwid                   is a str;

        $modu = $this->get_module();
        $serial = $modu->get_serialNumber();
        if ($serial == YAPI::INVALID_STRING) {
            return null;
        }
        $hwid = $serial . '.dataLogger';
        $logger = YDataLogger::FindDataLogger($hwid);
        return $logger;
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function _parseCalibStr(string $calibStr): int
    {
        $iCalib = [];           // intArr;
        // $caltyp                 is a int;
        // $calhdl                 is a yCalibrationHandler;
        // $maxpos                 is a int;
        // $position               is a int;
        $calpar = [];           // intArr;
        $calraw = [];           // floatArr;
        $calref = [];           // floatArr;
        // $fRaw                   is a float;
        // $fRef                   is a float;
        // $iRaw                   is a int;
        // $iRef                   is a int;
        if (YAPI::Ystrpos($calibStr,',') >= 0) {
            // Plain text format
            $iCalib = YAPI::_decodeFloats($calibStr);
            $caltyp = intVal($iCalib[0] / 1000);
            if ($caltyp < YOCTO_CALIB_TYPE_OFS) {
                // Unknown calibration type: calibrated value will be provided by the device
                $this->_cal = null;
                return YAPI::SUCCESS;
            }
            $calhdl = YAPI::_getCalibrationHandler($caltyp);
            if (!(!is_null($calhdl))) {
                // Unknown calibration type: calibrated value will be provided by the device
                $this->_cal = null;
                return YAPI::SUCCESS;
            }
            // New 32 bits text format
            $maxpos = sizeof($iCalib);
            while (sizeof($calpar) > 0) {
                array_pop($calpar);
            };
            $position = 1;
            while ($position < $maxpos) {
                $calpar[] = $iCalib[$position];
                $position = $position + 1;
            }
            while (sizeof($calraw) > 0) {
                array_pop($calraw);
            };
            while (sizeof($calref) > 0) {
                array_pop($calref);
            };
            $position = 1;
            while ($position + 1 < $maxpos) {
                $fRaw = $iCalib[$position];
                $fRaw = $fRaw / 1000.0;
                $fRef = $iCalib[$position + 1];
                $fRef = $fRef / 1000.0;
                $calraw[] = $fRaw;
                $calref[] = $fRef;
                $position = $position + 2;
            }
        } else {
            // Old recorder-encoded format, including encoding
            $iCalib = YAPI::_decodeWords($calibStr);
            if (sizeof($iCalib) <= 2) {
                // Unknown calibration type: calibrated value will be provided by the device
                $this->_cal = null;
                return YAPI::SUCCESS;
            }
            $caltyp = $iCalib[2];
            $calhdl = YAPI::_getCalibrationHandler($caltyp);
            if (!(!is_null($calhdl))) {
                // Unknown calibration type: calibrated value will be provided by the device
                $this->_cal = null;
                return YAPI::SUCCESS;
            }
            if ($caltyp <= 10) {
                $maxpos = $caltyp;
            } else {
                if ($caltyp <= 20) {
                    $maxpos = $caltyp - 10;
                } else {
                    $maxpos = 5;
                }
            }
            $maxpos = 3 + 2 * $maxpos;
            if ($maxpos > sizeof($iCalib)) {
                $maxpos = sizeof($iCalib);
            }
            while (sizeof($calpar) > 0) {
                array_pop($calpar);
            };
            while (sizeof($calraw) > 0) {
                array_pop($calraw);
            };
            while (sizeof($calref) > 0) {
                array_pop($calref);
            };
            $position = 3;
            while ($position + 1 < $maxpos) {
                $iRaw = $iCalib[$position];
                $iRef = $iCalib[$position + 1];
                $calpar[] = $iRaw;
                $calpar[] = $iRef;
                $calraw[] = YAPI::_decimalToDouble($iRaw);
                $calref[] = YAPI::_decimalToDouble($iRef);
                $position = $position + 2;
            }
        }
        $this->_cal = new YCalibCtx($calibStr, $calhdl, $caltyp, $calpar, $calraw, $calref);
        return YAPI::SUCCESS;
    }

    /**
     * Starts the data logger on the device. Note that the data logger
     * will only save the measures on this sensor if the logFrequency
     * is not set to "OFF".
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     */
    public function startDataLogger(): int
    {
        // $res                    is a bin;

        $res = $this->_download('api/dataLogger/recording?recording=1');
        if (!(strlen($res) > 0)) return $this->_throw(YAPI::IO_ERROR,'unable to start datalogger',YAPI::IO_ERROR);
        return YAPI::SUCCESS;
    }

    /**
     * Stops the datalogger on the device.
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     */
    public function stopDataLogger(): int
    {
        // $res                    is a bin;

        $res = $this->_download('api/dataLogger/recording?recording=0');
        if (!(strlen($res) > 0)) return $this->_throw(YAPI::IO_ERROR,'unable to stop datalogger',YAPI::IO_ERROR);
        return YAPI::SUCCESS;
    }

    /**
     * Retrieves a YDataSet object holding historical data for this
     * sensor, for a specified time interval. The measures will be
     * retrieved from the data logger, which must have been turned
     * on at the desired time. See the documentation of the YDataSet
     * class for information on how to get an overview of the
     * recorded data, and how to load progressively a large set
     * of measures from the data logger.
     *
     * This function only works if the device uses a recent firmware,
     * as YDataSet objects are not supported by firmwares older than
     * version 13000.
     *
     * @param float $startTime : the start of the desired measure time interval,
     *         as a Unix timestamp, i.e. the number of seconds since
     *         January 1, 1970 UTC. The special value 0 can be used
     *         to include any measure, without initial limit.
     * @param float $endTime : the end of the desired measure time interval,
     *         as a Unix timestamp, i.e. the number of seconds since
     *         January 1, 1970 UTC. The special value 0 can be used
     *         to include any measure, without ending limit.
     *
     * @return ?YDataSet  an instance of YDataSet, providing access to historical
     *         data. Past measures can be loaded progressively
     *         using methods from the YDataSet object.
     */
    public function get_recordedData(float $startTime, float $endTime): ?YDataSet
    {
        // $funcid                 is a str;
        // $funit                  is a str;

        $funcid = $this->get_functionId();
        $funit = $this->get_unit();
        return new YDataSet($this, $funcid, $funit, $startTime, $endTime);
    }

    /**
     * Registers the callback function that is invoked on every periodic timed notification.
     * The callback is invoked only during the execution of ySleep or yHandleEvents.
     * This provides control over the time when the callback is triggered. For good responsiveness, remember to call
     * one of these two functions periodically. To unregister a callback, pass a null pointer as argument.
     *
     * @param callable $callback : the callback function to call, or a null pointer. The callback function
     * should take two
     *         arguments: the function object of which the value has changed, and an YMeasure object describing
     *         the new advertised value.
     * @noreturn
     */
    public function registerTimedReportCallback(mixed $callback): int
    {
        // $sensor                 is a YSensor;
        $sensor = $this;
        if (!is_null($callback)) {
            YFunction::_UpdateTimedReportCallbackList($sensor, true);
        } else {
            YFunction::_UpdateTimedReportCallbackList($sensor, false);
        }
        $this->_timedReportCallbackSensor = $callback;
        return 0;
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function _invokeTimedReportCallback(YMeasure $value): int
    {
        if (!is_null($this->_timedReportCallbackSensor)) {
            call_user_func($this->_timedReportCallbackSensor, $this, $value);
        }
        return 0;
    }

    /**
     * Configures error correction data points, in particular to compensate for
     * a possible perturbation of the measure caused by an enclosure. It is possible
     * to configure up to five correction points. Correction points must be provided
     * in ascending order, and be in the range of the sensor. The device will automatically
     * perform a linear interpolation of the error correction between specified
     * points. Remember to call the saveToFlash() method of the module if the
     * modification must be kept.
     *
     * For more information on advanced capabilities to refine the calibration of
     * sensors, please contact support@yoctopuce.com.
     *
     * @param float[] $rawValues : array of floating point numbers, corresponding to the raw
     *         values returned by the sensor for the correction points.
     * @param float[] $refValues : array of floating point numbers, corresponding to the corrected
     *         values for the correction points.
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function calibrateFromPoints(array $rawValues, array $refValues): int
    {
        // $rest_val               is a str;
        // $res                    is a int;

        $rest_val = $this->_encodeCalibrationPoints($rawValues, $refValues);
        $res = $this->_setAttr('calibrationParam', $rest_val);
        return $res;
    }

    /**
     * Retrieves error correction data points previously entered using the method
     * calibrateFromPoints.
     *
     * @param float[] $rawValues : array of floating point numbers, that will be filled by the
     *         function with the raw sensor values for the correction points.
     * @param float[] $refValues : array of floating point numbers, that will be filled by the
     *         function with the desired values for the correction points.
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function loadCalibrationPoints(array &$rawValues, array &$refValues): int
    {
        while (sizeof($rawValues) > 0) {
            array_pop($rawValues);
        };
        while (sizeof($refValues) > 0) {
            array_pop($refValues);
        };
        // Load function parameters if not yet loaded
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return YAPI::DEVICE_NOT_FOUND;
            }
        }
        if ($this->_cal == null) {
            return YAPI::SUCCESS;
        }
        while (sizeof($rawValues) > 0) {
            array_pop($rawValues);
        };
        while (sizeof($refValues) > 0) {
            array_pop($refValues);
        };
        foreach ($this->_cal->raw as $ii_0) {
            $rawValues[] = $ii_0;
        }
        foreach ($this->_cal->cal as $ii_1) {
            $refValues[] = $ii_1;
        }
        return YAPI::SUCCESS;
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function _encodeCalibrationPoints(array $rawValues, array $refValues): string
    {
        // $res                    is a str;
        // $npt                    is a int;
        // $idx                    is a int;
        $npt = sizeof($rawValues);
        if ($npt != sizeof($refValues)) {
            $this->_throw(YAPI::INVALID_ARGUMENT, 'Invalid calibration parameters (size mismatch)');
            return YAPI::INVALID_STRING;
        }
        // Shortcut when building empty calibration parameters
        if ($npt == 0) {
            return '0';
        }
        // Encode using newer 32-bit fixed-point method
        $res = sprintf('%d', YOCTO_CALIB_TYPE_OFS);
        $idx = 0;
        while ($idx < $npt) {
            $res = sprintf('%s,%F,%F', $res, $rawValues[$idx], $refValues[$idx]);
            $idx = $idx + 1;
        }
        return $res;
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function _applyCalibration(float $rawValue): float
    {
        if ($this->_cal == null) {
            return $rawValue;
        }
        if ($rawValue == self::CURRENTVALUE_INVALID) {
            return self::CURRENTVALUE_INVALID;
        }
        return call_user_func($this->_cal->hdl, $rawValue, $this->_cal->typ, $this->_cal->par, $this->_cal->raw, $this->_cal->cal);
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function _decodeTimedReport(float $timestamp, float $duration, array $report): ?YMeasure
    {
        // $i                      is a int;
        // $byteVal                is a int;
        // $poww                   is a float;
        // $minRaw                 is a float;
        // $avgRaw                 is a float;
        // $maxRaw                 is a float;
        // $sublen                 is a int;
        // $difRaw                 is a float;
        // $startTime              is a float;
        // $endTime                is a float;
        // $minVal                 is a float;
        // $avgVal                 is a float;
        // $maxVal                 is a float;
        if ($duration > 0) {
            $startTime = $timestamp - $duration;
        } else {
            $startTime = $this->_prevTR;
        }
        $endTime = $timestamp;
        $this->_prevTR = $endTime;
        if ($startTime == 0) {
            $startTime = $endTime;
        }
        // 32 bits timed report format
        if (sizeof($report) <= 5) {
            // sub-second report, 1-4 bytes
            $poww = 1;
            $avgRaw = 0;
            $byteVal = 0;
            $i = 1;
            while ($i < sizeof($report)) {
                $byteVal = $report[$i];
                $avgRaw = $avgRaw + $poww * $byteVal;
                $poww = $poww * 0x100;
                $i = $i + 1;
            }
            if (($byteVal & 0x80) != 0) {
                $avgRaw = $avgRaw - $poww;
            }
            $avgVal = $avgRaw / 1000.0;
            if (!($this->_cal == null)) {
                $avgVal = call_user_func($this->_cal->hdl, $avgVal, $this->_cal->typ, $this->_cal->par, $this->_cal->raw, $this->_cal->cal);
            }
            $minVal = $avgVal;
            $maxVal = $avgVal;
        } else {
            // averaged report: avg,avg-min,max-avg
            $sublen = 1 + ($report[1] & 3);
            $poww = 1;
            $avgRaw = 0;
            $byteVal = 0;
            $i = 2;
            while (($sublen > 0) && ($i < sizeof($report))) {
                $byteVal = $report[$i];
                $avgRaw = $avgRaw + $poww * $byteVal;
                $poww = $poww * 0x100;
                $i = $i + 1;
                $sublen = $sublen - 1;
            }
            if (($byteVal & 0x80) != 0) {
                $avgRaw = $avgRaw - $poww;
            }
            $sublen = 1 + (($report[1] >> 2) & 3);
            $poww = 1;
            $difRaw = 0;
            while (($sublen > 0) && ($i < sizeof($report))) {
                $byteVal = $report[$i];
                $difRaw = $difRaw + $poww * $byteVal;
                $poww = $poww * 0x100;
                $i = $i + 1;
                $sublen = $sublen - 1;
            }
            $minRaw = $avgRaw - $difRaw;
            $sublen = 1 + (($report[1] >> 4) & 3);
            $poww = 1;
            $difRaw = 0;
            while (($sublen > 0) && ($i < sizeof($report))) {
                $byteVal = $report[$i];
                $difRaw = $difRaw + $poww * $byteVal;
                $poww = $poww * 0x100;
                $i = $i + 1;
                $sublen = $sublen - 1;
            }
            $maxRaw = $avgRaw + $difRaw;
            $avgVal = $avgRaw / 1000.0;
            $minVal = $minRaw / 1000.0;
            $maxVal = $maxRaw / 1000.0;
            if (!($this->_cal == null)) {
                $avgVal = call_user_func($this->_cal->hdl, $avgVal, $this->_cal->typ, $this->_cal->par, $this->_cal->raw, $this->_cal->cal);
                $minVal = call_user_func($this->_cal->hdl, $minVal, $this->_cal->typ, $this->_cal->par, $this->_cal->raw, $this->_cal->cal);
                $maxVal = call_user_func($this->_cal->hdl, $maxVal, $this->_cal->typ, $this->_cal->par, $this->_cal->raw, $this->_cal->cal);
            }
        }
        return new YMeasure($startTime, $endTime, $minVal, $avgVal, $maxVal);
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function _decodeVal(int $w): float
    {
        // $val                    is a float;
        $val = $w;
        if (!($this->_cal == null)) {
            $val = call_user_func($this->_cal->hdl, $val, $this->_cal->typ, $this->_cal->par, $this->_cal->raw, $this->_cal->cal);
        }
        return $val;
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function _decodeAvg(int $dw): float
    {
        // $val                    is a float;
        $val = $dw;
        if (!($this->_cal == null)) {
            $val = call_user_func($this->_cal->hdl, $val, $this->_cal->typ, $this->_cal->par, $this->_cal->raw, $this->_cal->cal);
        }
        return $val;
    }

    /**
     * @throws YAPI_Exception
     */
    public function unit(): string
{
    return $this->get_unit();
}

    /**
     * @throws YAPI_Exception
     */
    public function currentValue(): float
{
    return $this->get_currentValue();
}

    /**
     * @throws YAPI_Exception
     */
    public function setLowestValue(float $newval): int
{
    return $this->set_lowestValue($newval);
}

    /**
     * @throws YAPI_Exception
     */
    public function lowestValue(): float
{
    return $this->get_lowestValue();
}

    /**
     * @throws YAPI_Exception
     */
    public function setHighestValue(float $newval): int
{
    return $this->set_highestValue($newval);
}

    /**
     * @throws YAPI_Exception
     */
    public function highestValue(): float
{
    return $this->get_highestValue();
}

    /**
     * @throws YAPI_Exception
     */
    public function currentRawValue(): float
{
    return $this->get_currentRawValue();
}

    /**
     * @throws YAPI_Exception
     */
    public function logFrequency(): string
{
    return $this->get_logFrequency();
}

    /**
     * @throws YAPI_Exception
     */
    public function setLogFrequency(string $newval): int
{
    return $this->set_logFrequency($newval);
}

    /**
     * @throws YAPI_Exception
     */
    public function reportFrequency(): string
{
    return $this->get_reportFrequency();
}

    /**
     * @throws YAPI_Exception
     */
    public function setReportFrequency(string $newval): int
{
    return $this->set_reportFrequency($newval);
}

    /**
     * @throws YAPI_Exception
     */
    public function advMode(): int
{
    return $this->get_advMode();
}

    /**
     * @throws YAPI_Exception
     */
    public function setAdvMode(int $newval): int
{
    return $this->set_advMode($newval);
}

    /**
     * @throws YAPI_Exception
     */
    public function calibrationParam(): string
{
    return $this->get_calibrationParam();
}

    /**
     * @throws YAPI_Exception
     */
    public function setCalibrationParam(string $newval): int
{
    return $this->set_calibrationParam($newval);
}

    /**
     * @throws YAPI_Exception
     */
    public function setResolution(float $newval): int
{
    return $this->set_resolution($newval);
}

    /**
     * @throws YAPI_Exception
     */
    public function resolution(): float
{
    return $this->get_resolution();
}

    /**
     * @throws YAPI_Exception
     */
    public function sensorState(): int
{
    return $this->get_sensorState();
}

    /**
     * Continues the enumeration of sensors started using yFirstSensor().
     * Caution: You can't make any assumption about the returned sensors order.
     * If you want to find a specific a sensor, use Sensor.findSensor()
     * and a hardwareID or a logical name.
     *
     * @return ?YSensor  a pointer to a YSensor object, corresponding to
     *         a sensor currently online, or a null pointer
     *         if there are no more sensors to enumerate.
     */
    public function nextSensor(): ?YSensor
    {
        $resolve = YAPI::resolveFunction($this->_className, $this->_func);
        if ($resolve->errorType != YAPI::SUCCESS) {
            return null;
        }
        $next_hwid = YAPI::getNextHardwareId($this->_className, $resolve->result);
        if ($next_hwid == null) {
            return null;
        }
        return self::FindSensor($next_hwid);
    }

    /**
     * Starts the enumeration of sensors currently accessible.
     * Use the method YSensor::nextSensor() to iterate on
     * next sensors.
     *
     * @return ?YSensor  a pointer to a YSensor object, corresponding to
     *         the first sensor currently online, or a null pointer
     *         if there are none.
     */
    public static function FirstSensor(): ?YSensor
    {
        $next_hwid = YAPI::getFirstHardwareId('Sensor');
        if ($next_hwid == null) {
            return null;
        }
        return self::FindSensor($next_hwid);
    }

    //--- (end of generated code: YSensor implementation)
}

//^^^^ YSensor.php

//--- (generated code: YModule declaration)
//vvvv YModule.php

/**
 * YModule Class: Global parameters control interface for all Yoctopuce devices
 *
 * The YModule class can be used with all Yoctopuce USB devices.
 * It can be used to control the module global parameters, and
 * to enumerate the functions provided by each module.
 */
class YModule extends YFunction
{
    const PRODUCTNAME_INVALID = YAPI::INVALID_STRING;
    const SERIALNUMBER_INVALID = YAPI::INVALID_STRING;
    const PRODUCTID_INVALID = YAPI::INVALID_UINT;
    const PRODUCTRELEASE_INVALID = YAPI::INVALID_UINT;
    const FIRMWARERELEASE_INVALID = YAPI::INVALID_STRING;
    const PERSISTENTSETTINGS_LOADED = 0;
    const PERSISTENTSETTINGS_SAVED = 1;
    const PERSISTENTSETTINGS_MODIFIED = 2;
    const PERSISTENTSETTINGS_INVALID = -1;
    const LUMINOSITY_INVALID = YAPI::INVALID_UINT;
    const BEACON_OFF = 0;
    const BEACON_ON = 1;
    const BEACON_INVALID = -1;
    const UPTIME_INVALID = YAPI::INVALID_LONG;
    const USBCURRENT_INVALID = YAPI::INVALID_UINT;
    const REBOOTCOUNTDOWN_INVALID = YAPI::INVALID_INT;
    const USERVAR_INVALID = YAPI::INVALID_INT;
    //--- (end of generated code: YModule declaration)

    //--- (generated code: YModule attributes)
    protected string $_productName = self::PRODUCTNAME_INVALID;    // Text
    protected string $_serialNumber = self::SERIALNUMBER_INVALID;   // Text
    protected int $_productId = self::PRODUCTID_INVALID;      // XWord
    protected int $_productRelease = self::PRODUCTRELEASE_INVALID; // XWord
    protected string $_firmwareRelease = self::FIRMWARERELEASE_INVALID; // Text
    protected int $_persistentSettings = self::PERSISTENTSETTINGS_INVALID; // FlashSettings
    protected int $_luminosity = self::LUMINOSITY_INVALID;     // Percent
    protected int $_beacon = self::BEACON_INVALID;         // OnOff
    protected float $_upTime = self::UPTIME_INVALID;         // Time
    protected int $_usbCurrent = self::USBCURRENT_INVALID;     // UsedCurrent
    protected int $_rebootCountdown = self::REBOOTCOUNTDOWN_INVALID; // Int
    protected int $_userVar = self::USERVAR_INVALID;        // Int
    protected mixed $_logCallback = null;                         // YModuleLogCallback
    protected mixed $_confChangeCallback = null;                         // YModuleConfigChangeCallback
    protected mixed $_beaconCallback = null;                         // YModuleBeaconCallback

    //--- (end of generated code: YModule attributes)
    protected static array $_moduleCallbackList = array();

    function __construct(string $str_func)
    {
        //--- (generated code: YModule constructor)
        parent::__construct($str_func);
        $this->_className = 'Module';

        //--- (end of generated code: YModule constructor)
    }

    private static function _updateModuleCallbackList(YModule $module, bool $add): void
    {
    }

    /**
     * Return the internal device object hosting the function
     * @throws YAPI_Exception
     */
    protected function _getDev(): ?YDevice
    {
        $devid = $this->_func;
        $dotidx = strpos($devid, '.');
        if ($dotidx !== false) {
            $devid = substr($devid, 0, $dotidx);
        }
        $dev = YAPI::getDevice($devid);
        if (is_null($dev)) {
            $this->_throw(YAPI::DEVICE_NOT_FOUND, "Device [$devid] is not online", null);
        }
        return $dev;
    }

    /**
     * Returns the number of functions (beside the "module" interface) available on the module.
     *
     * @return int  the number of functions on the module
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function functionCount(): int
    {
        $dev = $this->_getDev();
        return $dev->functionCount();
    }

    /**
     * Retrieves the hardware identifier of the <i>n</i>th function on the module.
     *
     * @param int $functionIndex : the index of the function for which the information is desired,
     * starting at 0 for the first function.
     *
     * @return string  a string corresponding to the unambiguous hardware identifier of the requested module function
     *
     * On failure, throws an exception or returns an empty string.
     * @throws YAPI_Exception on error
     */
    public function functionId(int $functionIndex): string
    {
        $dev = $this->_getDev();
        return $dev->functionId($functionIndex);
    }

    public function functionIdByFunYdx(int $functionIndex): string
    {
        $dev = $this->_getDev();
        return $dev->functionIdByFunYdx($functionIndex);
    }

    /**
     * Retrieves the type of the <i>n</i>th function on the module. Yoctopuce functions type names match
     * their class names without the <i>Y</i> prefix, for instance <i>Relay</i>, <i>Temperature</i> etc..
     *
     * @param int $functionIndex : the index of the function for which the information is desired,
     * starting at 0 for the first function.
     *
     * @return string  a string corresponding to the type of the function.
     *
     * On failure, throws an exception or returns an empty string.
     * @throws YAPI_Exception on error
     */
    public function functionType(int $functionIndex): string
    {
        $dev = $this->_getDev();
        return $dev->functionType($functionIndex);
    }

    /**
     * Retrieves the base type of the <i>n</i>th function on the module.
     * For instance, the base type of all measuring functions is "Sensor".
     *
     * @param int $functionIndex : the index of the function for which the information is desired,
     * starting at 0 for the first function.
     *
     * @return string  a string corresponding to the base type of the function
     *
     * On failure, throws an exception or returns an empty string.
     * @throws YAPI_Exception on error
     */
    public function functionBaseType(int $functionIndex): string
    {
        $dev = $this->_getDev();
        return $dev->functionBaseType($functionIndex);
    }


    /**
     * Retrieves the logical name of the <i>n</i>th function on the module.
     *
     * @param int $functionIndex : the index of the function for which the information is desired,
     * starting at 0 for the first function.
     *
     * @return string  a string corresponding to the logical name of the requested module function
     *
     * On failure, throws an exception or returns an empty string.
     * @throws YAPI_Exception on error
     */
    public function functionName(int $functionIndex): string
    {
        $devid = $this->_func;
        $dotidx = strpos($devid, '.');
        if ($dotidx !== false) {
            $devid = substr($devid, 0, $dotidx);
        }
        $dev = YAPI::getDevice($devid);
        return $dev->functionName($functionIndex);
    }

    /**
     * Retrieves the advertised value of the <i>n</i>th function on the module.
     *
     * @param int $functionIndex : the index of the function for which the information is desired,
     * starting at 0 for the first function.
     *
     * @return string  a short string (up to 6 characters) corresponding to the advertised value of the
     * requested module function
     *
     * On failure, throws an exception or returns an empty string.
     * @throws YAPI_Exception on error
     */
    public function functionValue(int $functionIndex): string
    {
        $dev = $this->_getDev();
        return $dev->functionValue($functionIndex);
    }

    protected function _flattenJsonStruct_internal(string $jsoncomplex): string
    {
        $decoded = json_decode($jsoncomplex);
        if ($decoded == null) {
            $this->_throw(YAPI::INVALID_ARGUMENT, 'Invalid json structure');
            return "";
        }
        $attrs = array();
        foreach ($decoded as $function_name => $fuction_attrs) {
            if ($function_name == "services") {
                continue;
            }
            foreach ($fuction_attrs as $attr_name => $attr_value) {
                if (is_object($attr_value)) {
                    // skip complext attributes (move and pulse)
                    continue;
                }
                $flat = $function_name . '/' . $attr_name . '=' . $attr_value;
                $attrs[] = $flat;
            }
        }
        return json_encode($attrs);
    }

    private function get_subDevices_internal(): array
    {
        $serial = $this->get_serialNumber();
        return YAPI::getSubDevicesFrom($serial);
    }

    private function get_parentHub_internal(): string
    {
        $serial = $this->get_serialNumber();
        $hubserial = YAPI::getHubSerialFrom($serial);
        if ($hubserial == $serial) {
            return '';
        }
        return $hubserial;
    }

    private function get_url_internal(): string
    {
        $serial = $this->get_serialNumber();
        return YAPI::getHubURLFrom($serial);
    }

    private function _startStopDevLog_internal(string $str_serial, bool $bool_start): void
    {
        $dev = $this->_getDev();
        if (!($dev == null)) {
            $dev->registerLogCallback($this->_logCallback);
        }
    }

    //--- (generated code: YModule implementation)

    function _parseAttr(string $name, mixed $val): int
    {
        switch ($name) {
        case 'productName':
            $this->_productName = $val;
            return 1;
        case 'serialNumber':
            $this->_serialNumber = $val;
            return 1;
        case 'productId':
            $this->_productId = intval($val);
            return 1;
        case 'productRelease':
            $this->_productRelease = intval($val);
            return 1;
        case 'firmwareRelease':
            $this->_firmwareRelease = $val;
            return 1;
        case 'persistentSettings':
            $this->_persistentSettings = intval($val);
            return 1;
        case 'luminosity':
            $this->_luminosity = intval($val);
            return 1;
        case 'beacon':
            $this->_beacon = intval($val);
            return 1;
        case 'upTime':
            $this->_upTime = intval($val);
            return 1;
        case 'usbCurrent':
            $this->_usbCurrent = intval($val);
            return 1;
        case 'rebootCountdown':
            $this->_rebootCountdown = intval($val);
            return 1;
        case 'userVar':
            $this->_userVar = intval($val);
            return 1;
        }
        return parent::_parseAttr($name, $val);
    }

    /**
     * Returns the commercial name of the module, as set by the factory.
     *
     * @return string  a string corresponding to the commercial name of the module, as set by the factory
     *
     * On failure, throws an exception or returns YModule::PRODUCTNAME_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_productName(): string
    {
        // $res                    is a string;
        // $dev                    is a YDevice;
        if ($this->_cacheExpiration == 0) {
            $dev = $this->_getDev();
            if (!($dev == null)) {
                return $dev->getProductName();
            }
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::PRODUCTNAME_INVALID;
            }
        }
        $res = $this->_productName;
        return $res;
    }

    /**
     * Returns the serial number of the module, as set by the factory.
     *
     * @return string  a string corresponding to the serial number of the module, as set by the factory
     *
     * On failure, throws an exception or returns YModule::SERIALNUMBER_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_serialNumber(): string
    {
        // $res                    is a string;
        // $dev                    is a YDevice;
        if ($this->_cacheExpiration == 0) {
            $dev = $this->_getDev();
            if (!($dev == null)) {
                return $dev->getSerialNumber();
            }
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::SERIALNUMBER_INVALID;
            }
        }
        $res = $this->_serialNumber;
        return $res;
    }

    /**
     * Returns the USB device identifier of the module.
     *
     * @return int  an integer corresponding to the USB device identifier of the module
     *
     * On failure, throws an exception or returns YModule::PRODUCTID_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_productId(): int
    {
        // $res                    is a int;
        // $dev                    is a YDevice;
        if ($this->_cacheExpiration == 0) {
            $dev = $this->_getDev();
            if (!($dev == null)) {
                return $dev->getProductId();
            }
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::PRODUCTID_INVALID;
            }
        }
        $res = $this->_productId;
        return $res;
    }

    /**
     * Returns the release number of the module hardware, preprogrammed at the factory.
     * The original hardware release returns value 1, revision B returns value 2, etc.
     *
     * @return int  an integer corresponding to the release number of the module hardware, preprogrammed at the factory
     *
     * On failure, throws an exception or returns YModule::PRODUCTRELEASE_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_productRelease(): int
    {
        // $res                    is a int;
        if ($this->_cacheExpiration == 0) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::PRODUCTRELEASE_INVALID;
            }
        }
        $res = $this->_productRelease;
        return $res;
    }

    /**
     * Returns the version of the firmware embedded in the module.
     *
     * @return string  a string corresponding to the version of the firmware embedded in the module
     *
     * On failure, throws an exception or returns YModule::FIRMWARERELEASE_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_firmwareRelease(): string
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::FIRMWARERELEASE_INVALID;
            }
        }
        $res = $this->_firmwareRelease;
        return $res;
    }

    /**
     * Returns the current state of persistent module settings.
     *
     * @return int  a value among YModule::PERSISTENTSETTINGS_LOADED, YModule::PERSISTENTSETTINGS_SAVED and
     * YModule::PERSISTENTSETTINGS_MODIFIED corresponding to the current state of persistent module settings
     *
     * On failure, throws an exception or returns YModule::PERSISTENTSETTINGS_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_persistentSettings(): int
    {
        // $res                    is a enumFLASHSETTINGS;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::PERSISTENTSETTINGS_INVALID;
            }
        }
        $res = $this->_persistentSettings;
        return $res;
    }

    /**
     * @throws YAPI_Exception
     */
    public function set_persistentSettings(int $newval): int
    {
        $rest_val = strval($newval);
        return $this->_setAttr("persistentSettings", $rest_val);
    }

    /**
     * Returns the luminosity of the  module informative LEDs (from 0 to 100).
     *
     * @return int  an integer corresponding to the luminosity of the  module informative LEDs (from 0 to 100)
     *
     * On failure, throws an exception or returns YModule::LUMINOSITY_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_luminosity(): int
    {
        // $res                    is a int;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::LUMINOSITY_INVALID;
            }
        }
        $res = $this->_luminosity;
        return $res;
    }

    /**
     * Changes the luminosity of the module informative leds. The parameter is a
     * value between 0 and 100.
     * Remember to call the saveToFlash() method of the module if the
     * modification must be kept.
     *
     * @param int $newval : an integer corresponding to the luminosity of the module informative leds
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function set_luminosity(int $newval): int
    {
        $rest_val = strval($newval);
        return $this->_setAttr("luminosity", $rest_val);
    }

    /**
     * Returns the state of the localization beacon.
     *
     * @return int  either YModule::BEACON_OFF or YModule::BEACON_ON, according to the state of the localization beacon
     *
     * On failure, throws an exception or returns YModule::BEACON_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_beacon(): int
    {
        // $res                    is a enumONOFF;
        // $dev                    is a YDevice;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            $dev = $this->_getDev();
            if (!($dev == null)) {
                return $dev->getBeacon();
            }
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::BEACON_INVALID;
            }
        }
        $res = $this->_beacon;
        return $res;
    }

    /**
     * Turns on or off the module localization beacon.
     *
     * @param int $newval : either YModule::BEACON_OFF or YModule::BEACON_ON
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function set_beacon(int $newval): int
    {
        $rest_val = strval($newval);
        return $this->_setAttr("beacon", $rest_val);
    }

    /**
     * Returns the number of milliseconds spent since the module was powered on.
     *
     * @return float  an integer corresponding to the number of milliseconds spent since the module was powered on
     *
     * On failure, throws an exception or returns YModule::UPTIME_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_upTime(): float
    {
        // $res                    is a long;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::UPTIME_INVALID;
            }
        }
        $res = $this->_upTime;
        return $res;
    }

    /**
     * Returns the current consumed by the module on the USB bus, in milli-amps.
     *
     * @return int  an integer corresponding to the current consumed by the module on the USB bus, in milli-amps
     *
     * On failure, throws an exception or returns YModule::USBCURRENT_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_usbCurrent(): int
    {
        // $res                    is a int;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::USBCURRENT_INVALID;
            }
        }
        $res = $this->_usbCurrent;
        return $res;
    }

    /**
     * Returns the remaining number of seconds before the module restarts, or zero when no
     * reboot has been scheduled.
     *
     * @return int  an integer corresponding to the remaining number of seconds before the module
     * restarts, or zero when no
     *         reboot has been scheduled
     *
     * On failure, throws an exception or returns YModule::REBOOTCOUNTDOWN_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_rebootCountdown(): int
    {
        // $res                    is a int;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::REBOOTCOUNTDOWN_INVALID;
            }
        }
        $res = $this->_rebootCountdown;
        return $res;
    }

    /**
     * @throws YAPI_Exception
     */
    public function set_rebootCountdown(int $newval): int
    {
        $rest_val = strval($newval);
        return $this->_setAttr("rebootCountdown", $rest_val);
    }

    /**
     * Returns the value previously stored in this attribute.
     * On startup and after a device reboot, the value is always reset to zero.
     *
     * @return int  an integer corresponding to the value previously stored in this attribute
     *
     * On failure, throws an exception or returns YModule::USERVAR_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_userVar(): int
    {
        // $res                    is a int;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::USERVAR_INVALID;
            }
        }
        $res = $this->_userVar;
        return $res;
    }

    /**
     * Stores a 32 bit value in the device RAM. This attribute is at programmer disposal,
     * should he need to store a state variable.
     * On startup and after a device reboot, the value is always reset to zero.
     *
     * @param int $newval : an integer
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function set_userVar(int $newval): int
    {
        $rest_val = strval($newval);
        return $this->_setAttr("userVar", $rest_val);
    }

    /**
     * Allows you to find a module from its serial number or from its logical name.
     *
     * This function does not require that the module is online at the time
     * it is invoked. The returned object is nevertheless valid.
     * Use the method isOnline() to test if the module is
     * indeed online at a given time. In case of ambiguity when looking for
     * a module by logical name, no error is notified: the first instance
     * found is returned. The search is performed first by hardware name,
     * then by logical name.
     *
     *
     * If a call to this object's is_online() method returns FALSE although
     * you are certain that the device is plugged, make sure that you did
     * call registerHub() at application initialization time.
     *
     * @param string $func : a string containing either the serial number or
     *         the logical name of the desired module
     *
     * @return YModule  a YModule object allowing you to drive the module
     *         or get additional information on the module.
     */
    public static function FindModule(string $func): YModule
    {
        // $obj                    is a YModule;
        // $cleanHwId              is a str;
        // $modpos                 is a int;
        $cleanHwId = $func;
        $modpos = YAPI::Ystrpos($func,'.module');
        if ($modpos != (strlen($func) - 7)) {
            $cleanHwId = $func . '.module';
        }
        $obj = YFunction::_FindFromCache('Module', $cleanHwId);
        if ($obj == null) {
            $obj = new YModule($cleanHwId);
            YFunction::_AddToCache('Module', $cleanHwId, $obj);
        }
        return $obj;
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function get_productNameAndRevision(): string
    {
        // $prodname               is a str;
        // $prodrel                is a int;
        // $fullname               is a str;

        $prodname = $this->get_productName();
        $prodrel = $this->get_productRelease();
        if ($prodrel > 1) {
            $fullname = sprintf('%s rev. %c', $prodname, 64 + $prodrel);
        } else {
            $fullname = $prodname;
        }
        return $fullname;
    }

    /**
     * Saves current settings in the nonvolatile memory of the module.
     * Warning: the number of allowed save operations during a module life is
     * limited (about 100000 cycles). Do not call this function within a loop.
     *
     * @return int  YAPI::SUCCESS when the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function saveToFlash(): int
    {
        return $this->set_persistentSettings(self::PERSISTENTSETTINGS_SAVED);
    }

    /**
     * Reloads the settings stored in the nonvolatile memory, as
     * when the module is powered on.
     *
     * @return int  YAPI::SUCCESS when the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function revertFromFlash(): int
    {
        // $res                    is a int;

        $res = $this->set_persistentSettings(self::PERSISTENTSETTINGS_LOADED);
        if (!($res==YAPI::SUCCESS)) return $this->_throw($res,'unable to trigger revert settings',$res);
        $this->_clearLazyCache();
        return $res;
    }

    /**
     * Schedules a simple module reboot after the given number of seconds.
     *
     * @param int $secBeforeReboot : number of seconds before rebooting
     *
     * @return int  YAPI::SUCCESS when the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function reboot(int $secBeforeReboot): int
    {
        return $this->set_rebootCountdown($secBeforeReboot);
    }

    /**
     * Schedules a module reboot into special firmware update mode.
     *
     * @param int $secBeforeReboot : number of seconds before rebooting
     *
     * @return int  YAPI::SUCCESS when the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function triggerFirmwareUpdate(int $secBeforeReboot): int
    {
        return $this->set_rebootCountdown(-$secBeforeReboot);
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function _startStopDevLog(string $serial, bool $start): void
    {
        $this->_startStopDevLog_internal($serial, $start);
    }

    //cannot be generated for PHP:
    //private function _startStopDevLog_internal(string $serial, bool $start)

    /**
     * Registers a device log callback function. This callback will be called each time
     * that a module sends a new log message. Mostly useful to debug a Yoctopuce module.
     *
     * @param callable $callback : the callback function to call, or a null pointer.
     *         The callback function should take two
     *         arguments: the module object that emitted the log message,
     *         and the character string containing the log.
     *         On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function registerLogCallback(mixed $callback): int
    {
        // $serial                 is a str;

        $serial = $this->get_serialNumber();
        if ($serial == YAPI::INVALID_STRING) {
            return YAPI::DEVICE_NOT_FOUND;
        }
        $this->_logCallback = $callback;
        $this->_startStopDevLog($serial, !is_null($callback));
        return 0;
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function get_logCallback(): mixed
    {
        return $this->_logCallback;
    }

    /**
     * Register a callback function, to be called when a persistent settings in
     * a device configuration has been changed (e.g. change of unit, etc).
     *
     * @param callable $callback : a procedure taking a YModule parameter, or null
     *         to unregister a previously registered  callback.
     */
    public function registerConfigChangeCallback(mixed $callback): int
    {
        if (!is_null($callback)) {
            YModule::_updateModuleCallbackList($this, true);
        } else {
            YModule::_updateModuleCallbackList($this, false);
        }
        $this->_confChangeCallback = $callback;
        return 0;
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function _invokeConfigChangeCallback(): int
    {
        if (!is_null($this->_confChangeCallback)) {
            call_user_func($this->_confChangeCallback, $this);
        }
        return 0;
    }

    /**
     * Register a callback function, to be called when the localization beacon of the module
     * has been changed. The callback function should take two arguments: the YModule object of
     * which the beacon has changed, and an integer describing the new beacon state.
     *
     * @param callable $callback : The callback function to call, or null to unregister a
     *         previously registered callback.
     */
    public function registerBeaconCallback(mixed $callback): int
    {
        if (!is_null($callback)) {
            YModule::_updateModuleCallbackList($this, true);
        } else {
            YModule::_updateModuleCallbackList($this, false);
        }
        $this->_beaconCallback = $callback;
        return 0;
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function _invokeBeaconCallback(int $beaconState): int
    {
        if (!is_null($this->_beaconCallback)) {
            call_user_func($this->_beaconCallback, $this, $beaconState);
        }
        return 0;
    }

    /**
     * Triggers a configuration change callback, to check if they are supported or not.
     */
    public function triggerConfigChangeCallback(): int
    {
        $this->_setAttr('persistentSettings', '2');
        return 0;
    }

    /**
     * Tests whether the byn file is valid for this module. This method is useful to test if the module
     * needs to be updated.
     * It is possible to pass a directory as argument instead of a file. In this case, this method returns
     * the path of the most recent
     * appropriate .byn file. If the parameter onlynew is true, the function discards firmwares that are older or
     * equal to the installed firmware.
     *
     * @param string $path : the path of a byn file or a directory that contains byn files
     * @param boolean $onlynew : returns only files that are strictly newer
     *
     * @return string  the path of the byn file to use or a empty string if no byn files matches the requirement
     *
     * On failure, throws an exception or returns a string that start with "error:".
     * @throws YAPI_Exception on error
     */
    public function checkFirmware(string $path, bool $onlynew): string
    {
        // $serial                 is a str;
        // $release                is a int;
        // $tmp_res                is a str;
        if ($onlynew) {
            $release = intVal($this->get_firmwareRelease());
        } else {
            $release = 0;
        }
        //may throw an exception
        $serial = $this->get_serialNumber();
        $tmp_res = YFirmwareUpdate::CheckFirmware($serial, $path, $release);
        if (YAPI::Ystrpos($tmp_res,'error:') == 0) {
            $this->_throw(YAPI::INVALID_ARGUMENT, $tmp_res);
        }
        return $tmp_res;
    }

    /**
     * Prepares a firmware update of the module. This method returns a YFirmwareUpdate object which
     * handles the firmware update process.
     *
     * @param string $path : the path of the .byn file to use.
     * @param boolean $force : true to force the firmware update even if some prerequisites appear not to be met
     *
     * @return ?YFirmwareUpdate  a YFirmwareUpdate object or NULL on error.
     */
    public function updateFirmwareEx(string $path, bool $force): ?YFirmwareUpdate
    {
        // $serial                 is a str;
        // $settings               is a bin;

        $serial = $this->get_serialNumber();
        $settings = $this->get_allSettings();
        if (strlen($settings) == 0) {
            $this->_throw(YAPI::IO_ERROR, 'Unable to get device settings');
            $settings = YAPI::Ystr2bin('error:Unable to get device settings');
        }
        return new YFirmwareUpdate($serial, $path, $settings, $force);
    }

    /**
     * Prepares a firmware update of the module. This method returns a YFirmwareUpdate object which
     * handles the firmware update process.
     *
     * @param string $path : the path of the .byn file to use.
     *
     * @return ?YFirmwareUpdate  a YFirmwareUpdate object or NULL on error.
     */
    public function updateFirmware(string $path): ?YFirmwareUpdate
    {
        return $this->updateFirmwareEx($path, false);
    }

    /**
     * Returns all the settings and uploaded files of the module. Useful to backup all the
     * logical names, calibrations parameters, and uploaded files of a device.
     *
     * @return string  a binary buffer with all the settings.
     *
     * On failure, throws an exception or returns an binary object of size 0.
     * @throws YAPI_Exception on error
     */
    public function get_allSettings(): string
    {
        // $settings               is a bin;
        // $json                   is a bin;
        // $res                    is a bin;
        // $sep                    is a str;
        // $name                   is a str;
        // $item                   is a str;
        // $t_type                 is a str;
        // $pageid                 is a str;
        // $url                    is a str;
        // $file_data              is a str;
        // $file_data_bin          is a bin;
        // $temp_data_bin          is a bin;
        // $ext_settings           is a str;
        $filelist = [];         // binArr;
        $templist = [];         // strArr;

        $settings = $this->_download('api.json');
        if (strlen($settings) == 0) {
            return $settings;
        }
        $ext_settings = ', "extras":[';
        $templist = $this->get_functionIds('Temperature');
        $sep = '';
        foreach ($templist as $ii_0) {
            if (intVal($this->get_firmwareRelease()) > 9000) {
                $url = sprintf('api/%s/sensorType',$ii_0);
                $t_type = YAPI::Ybin2str($this->_download($url));
                if ($t_type == 'RES_NTC' || $t_type == 'RES_LINEAR') {
                    $pageid = substr($ii_0, 11, strlen($ii_0) - 11);
                    if ($pageid == '') {
                        $pageid = '1';
                    }
                    $temp_data_bin = $this->_download(sprintf('extra.json?page=%s', $pageid));
                    if (strlen($temp_data_bin) > 0) {
                        $item = sprintf('%s{"fid":"%s", "json":%s}'."\n".'', $sep, $ii_0, YAPI::Ybin2str($temp_data_bin));
                        $ext_settings = $ext_settings . $item;
                        $sep = ',';
                    }
                }
            }
        }
        $ext_settings = $ext_settings . '],'."\n".'"files":[';
        if ($this->hasFunction('files')) {
            $json = $this->_download('files.json?a=dir&d=1&f=');
            if (strlen($json) == 0) {
                return $json;
            }
            $filelist = $this->_json_get_array($json);
            $sep = '';
            foreach ($filelist as $ii_1) {
                $name = $this->_json_get_key($ii_1, 'name');
                if ((strlen($name) > 0) && !($name == 'startupConf.json')) {
                    if (substr($name, strlen($name)-1, 1) == '/') {
                        $file_data = '';
                    } else {
                        $file_data_bin = $this->_download($this->_escapeAttr($name));
                        $file_data = YAPI::_bytesToHexStr($file_data_bin);
                    }
                    $item = sprintf('%s{"name":"%s", "data":"%s"}'."\n".'', $sep, $name, $file_data);
                    $ext_settings = $ext_settings . $item;
                    $sep = ',';
                }
            }
        }
        $res = YAPI::Ystr2bin('{ "api":' . YAPI::Ybin2str($settings) . $ext_settings . ']}');
        return $res;
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function loadThermistorExtra(string $funcId, string $jsonExtra): int
    {
        $values = [];           // binArr;
        // $url                    is a str;
        // $curr                   is a str;
        // $binCurr                is a bin;
        // $currTemp               is a str;
        // $binCurrTemp            is a bin;
        // $ofs                    is a int;
        // $size                   is a int;
        $url = 'api/' . $funcId . '.json?command=Z';

        $this->_download($url);
        // add records in growing resistance value
        $values = $this->_json_get_array(YAPI::Ystr2bin($jsonExtra));
        $ofs = 0;
        $size = sizeof($values);
        while ($ofs + 1 < $size) {
            $binCurr = $values[$ofs];
            $binCurrTemp = $values[$ofs + 1];
            $curr = $this->_json_get_string($binCurr);
            $currTemp = $this->_json_get_string($binCurrTemp);
            $url = sprintf('api/%s.json?command=m%s:%s', $funcId, $curr, $currTemp);
            $this->_download($url);
            $ofs = $ofs + 2;
        }
        return YAPI::SUCCESS;
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function set_extraSettings(string $jsonExtra): int
    {
        $extras = [];           // binArr;
        // $tmp                    is a bin;
        // $functionId             is a str;
        // $data                   is a bin;
        $extras = $this->_json_get_array(YAPI::Ystr2bin($jsonExtra));
        foreach ($extras as $ii_0) {
            $tmp = $this->_get_json_path($ii_0, 'fid');
            $functionId = $this->_json_get_string($tmp);
            $data = $this->_get_json_path($ii_0, 'json');
            if ($this->hasFunction($functionId)) {
                $this->loadThermistorExtra($functionId, YAPI::Ybin2str($data));
            }
        }
        return YAPI::SUCCESS;
    }

    /**
     * Restores all the settings and uploaded files to the module.
     * This method is useful to restore all the logical names and calibrations parameters,
     * uploaded files etc. of a device from a backup.
     * Remember to call the saveToFlash() method of the module if the
     * modifications must be kept.
     *
     * @param string $settings : a binary buffer with all the settings.
     *
     * @return int  YAPI::SUCCESS when the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function set_allSettingsAndFiles(string $settings): int
    {
        // $down                   is a bin;
        // $json_api               is a bin;
        // $json_files             is a bin;
        // $json_extra             is a bin;
        // $fuperror               is a int;
        // $globalres              is a int;
        $fuperror = 0;
        $json_api = $this->_get_json_path($settings, 'api');
        if (strlen($json_api) == 0) {
            return $this->set_allSettings($settings);
        }
        $json_extra = $this->_get_json_path($settings, 'extras');
        if (strlen($json_extra) > 0) {
            $this->set_extraSettings(YAPI::Ybin2str($json_extra));
        }
        $this->set_allSettings($json_api);
        if ($this->hasFunction('files')) {
            $files = [];            // binArr;
            // $res                    is a str;
            // $tmp                    is a bin;
            // $name                   is a str;
            // $data                   is a str;
            $down = $this->_download('files.json?a=format');
            $down = $this->_get_json_path($down, 'res');
            $res = $this->_json_get_string($down);
            if (!($res == 'ok')) return $this->_throw(YAPI::IO_ERROR,'format failed',YAPI::IO_ERROR);
            $json_files = $this->_get_json_path($settings, 'files');
            $files = $this->_json_get_array($json_files);
            foreach ($files as $ii_0) {
                $tmp = $this->_get_json_path($ii_0, 'name');
                $name = $this->_json_get_string($tmp);
                $tmp = $this->_get_json_path($ii_0, 'data');
                $data = $this->_json_get_string($tmp);
                if ($name == '') {
                    $fuperror = $fuperror + 1;
                } else {
                    $this->_upload($name, YAPI::_hexStrToBin($data));
                }
            }
        }
        // Apply settings a second time for file-dependent settings and dynamic sensor nodes
        $globalres = $this->set_allSettings($json_api);
        if (!($fuperror == 0)) return $this->_throw(YAPI::IO_ERROR,'Error during file upload',YAPI::IO_ERROR);
        return $globalres;
    }

    /**
     * Tests if the device includes a specific function. This method takes a function identifier
     * and returns a boolean.
     *
     * @param string $funcId : the requested function identifier
     *
     * @return boolean  true if the device has the function identifier
     */
    public function hasFunction(string $funcId): bool
    {
        // $count                  is a int;
        // $i                      is a int;
        // $fid                    is a str;

        $count = $this->functionCount();
        $i = 0;
        while ($i < $count) {
            $fid = $this->functionId($i);
            if ($fid == $funcId) {
                return true;
            }
            $i = $i + 1;
        }
        return false;
    }

    /**
     * Retrieve all hardware identifier that match the type passed in argument.
     *
     * @param string $funType : The type of function (Relay, LightSensor, Voltage,...)
     *
     * @return string[]  an array of strings.
     */
    public function get_functionIds(string $funType): array
    {
        // $count                  is a int;
        // $i                      is a int;
        // $ftype                  is a str;
        $res = [];              // strArr;

        $count = $this->functionCount();
        $i = 0;
        while ($i < $count) {
            $ftype = $this->functionType($i);
            if ($ftype == $funType) {
                $res[] = $this->functionId($i);
            } else {
                $ftype = $this->functionBaseType($i);
                if ($ftype == $funType) {
                    $res[] = $this->functionId($i);
                }
            }
            $i = $i + 1;
        }
        return $res;
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function _flattenJsonStruct(string $jsoncomplex): string
    {
        return $this->_flattenJsonStruct_internal($jsoncomplex);
    }

    //cannot be generated for PHP:
    //private function _flattenJsonStruct_internal(string $jsoncomplex)

    /**
     * @throws YAPI_Exception on error
     */
    public function calibVersion(string $cparams): int
    {
        if ($cparams == '0,') {
            return 3;
        }
        if (YAPI::Ystrpos($cparams,',') >= 0) {
            if (YAPI::Ystrpos($cparams,' ') > 0) {
                return 3;
            } else {
                return 1;
            }
        }
        if ($cparams == '' || $cparams == '0') {
            return 1;
        }
        if ((strlen($cparams) < 2) || (YAPI::Ystrpos($cparams,'.') >= 0)) {
            return 0;
        } else {
            return 2;
        }
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function calibScale(string $unit_name, string $sensorType): int
    {
        if ($unit_name == 'g' || $unit_name == 'gauss' || $unit_name == 'W') {
            return 1000;
        }
        if ($unit_name == 'C') {
            if ($sensorType == '') {
                return 16;
            }
            if (intVal($sensorType) < 8) {
                return 16;
            } else {
                return 100;
            }
        }
        if ($unit_name == 'm' || $unit_name == 'deg') {
            return 10;
        }
        return 1;
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function calibOffset(string $unit_name): int
    {
        if ($unit_name == '% RH' || $unit_name == 'mbar' || $unit_name == 'lx') {
            return 0;
        }
        return 32767;
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function calibConvert(string $param, string $currentFuncValue, string $unit_name, string $sensorType): string
    {
        // $paramVer               is a int;
        // $funVer                 is a int;
        // $funScale               is a int;
        // $funOffset              is a int;
        // $paramScale             is a int;
        // $paramOffset            is a int;
        $words = [];            // intArr;
        $words_str = [];        // strArr;
        $calibData = [];        // floatArr;
        $iCalib = [];           // intArr;
        // $calibType              is a int;
        // $i                      is a int;
        // $maxSize                is a int;
        // $ratio                  is a float;
        // $nPoints                is a int;
        // $wordVal                is a float;
        // Initial guess for parameter encoding
        $paramVer = $this->calibVersion($param);
        $funVer = $this->calibVersion($currentFuncValue);
        $funScale = $this->calibScale($unit_name, $sensorType);
        $funOffset = $this->calibOffset($unit_name);
        $paramScale = $funScale;
        $paramOffset = $funOffset;
        if ($funVer < 3) {
            // Read the effective device scale if available
            if ($funVer == 2) {
                $words = YAPI::_decodeWords($currentFuncValue);
                if (($words[0] == 1366) && ($words[1] == 12500)) {
                    // Yocto-3D RefFrame used a special encoding
                    $funScale = 1;
                    $funOffset = 0;
                } else {
                    $funScale = $words[1];
                    $funOffset = $words[0];
                }
            } else {
                if ($funVer == 1) {
                    if ($currentFuncValue == '' || (intVal($currentFuncValue) > 10)) {
                        $funScale = 0;
                    }
                }
            }
        }
        while (sizeof($calibData) > 0) {
            array_pop($calibData);
        };
        $calibType = 0;
        if ($paramVer < 3) {
            // Handle old 16 bit parameters formats
            if ($paramVer == 2) {
                $words = YAPI::_decodeWords($param);
                if (($words[0] == 1366) && ($words[1] == 12500)) {
                    // Yocto-3D RefFrame used a special encoding
                    $paramScale = 1;
                    $paramOffset = 0;
                } else {
                    $paramScale = $words[1];
                    $paramOffset = $words[0];
                }
                if ((sizeof($words) >= 3) && ($words[2] > 0)) {
                    $maxSize = 3 + 2 * (($words[2]) % (10));
                    if ($maxSize > sizeof($words)) {
                        $maxSize = sizeof($words);
                    }
                    $i = 3;
                    while ($i < $maxSize) {
                        $calibData[] = $words[$i];
                        $i = $i + 1;
                    }
                }
            } else {
                if ($paramVer == 1) {
                    $words_str = explode(',', $param);
                    foreach ($words_str as $ii_0) {
                        $words[] = intVal($ii_0);
                    }
                    if ($param == '' || ($words[0] > 10)) {
                        $paramScale = 0;
                    }
                    if ((sizeof($words) > 0) && ($words[0] > 0)) {
                        $maxSize = 1 + 2 * (($words[0]) % (10));
                        if ($maxSize > sizeof($words)) {
                            $maxSize = sizeof($words);
                        }
                        $i = 1;
                        while ($i < $maxSize) {
                            $calibData[] = $words[$i];
                            $i = $i + 1;
                        }
                    }
                } else {
                    if ($paramVer == 0) {
                        $ratio = floatval($param);
                        if ($ratio > 0) {
                            $calibData[] = 0.0;
                            $calibData[] = 0.0;
                            $calibData[] = round(65535 / $ratio);
                            $calibData[] = 65535.0;
                        }
                    }
                }
            }
            $i = 0;
            while ($i < sizeof($calibData)) {
                if ($paramScale > 0) {
                    // scalar decoding
                    $calibData[$i] = ($calibData[$i] - $paramOffset) / $paramScale;
                } else {
                    // floating-point decoding
                    $calibData[$i] = YAPI::_decimalToDouble(intval(round($calibData[$i])));
                }
                $i = $i + 1;
            }
        } else {
            // Handle latest 32bit parameter format
            $iCalib = YAPI::_decodeFloats($param);
            $calibType = intval(round($iCalib[0] / 1000.0));
            if ($calibType >= 30) {
                $calibType = $calibType - 30;
            }
            $i = 1;
            while ($i < sizeof($iCalib)) {
                $calibData[] = $iCalib[$i] / 1000.0;
                $i = $i + 1;
            }
        }
        if ($funVer >= 3) {
            // Encode parameters in new format
            if (sizeof($calibData) == 0) {
                $param = '0,';
            } else {
                $param = 30 + $calibType;
                $i = 0;
                while ($i < sizeof($calibData)) {
                    if (($i & 1) > 0) {
                        $param = $param . ':';
                    } else {
                        $param = $param . ' ';
                    }
                    $param = $param . intval(round($calibData[$i] * 1000.0 / 1000.0));
                    $i = $i + 1;
                }
                $param = $param . ',';
            }
        } else {
            if ($funVer >= 1) {
                // Encode parameters for older devices
                $nPoints = intVal(sizeof($calibData) / 2);
                $param = $nPoints;
                $i = 0;
                while ($i < 2 * $nPoints) {
                    if ($funScale == 0) {
                        $wordVal = YAPI::_doubleToDecimal(intval(round($calibData[$i])));
                    } else {
                        $wordVal = $calibData[$i] * $funScale + $funOffset;
                    }
                    $param = $param . ',' . round($wordVal);
                    $i = $i + 1;
                }
            } else {
                // Initial V0 encoding used for old Yocto-Light
                if (sizeof($calibData) == 4) {
                    $param = round(1000 * ($calibData[3] - $calibData[1]) / $calibData[2] - $calibData[0]);
                }
            }
        }
        return $param;
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function _tryExec(string $url): int
    {
        // $res                    is a int;
        // $done                   is a int;
        $res = YAPI::SUCCESS;
        $done = 1;
        try {
            $this->_download($url);
        } catch (Exception $ex) {
            $done = 0;
        }
        if ($done == 0) {
            // retry silently after a short wait
            try {
                YAPI::Sleep(500);
                $this->_download($url);
            } catch (Exception $ex) {
                // second failure, return error code
                $res = $this->get_errorType();
            }
        }
        return $res;
    }

    /**
     * Restores all the settings of the device. Useful to restore all the logical names and calibrations parameters
     * of a module from a backup.Remember to call the saveToFlash() method of the module if the
     * modifications must be kept.
     *
     * @param string $settings : a binary buffer with all the settings.
     *
     * @return int  YAPI::SUCCESS when the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function set_allSettings(string $settings): int
    {
        $restoreLast = [];      // strArr;
        // $old_json_flat          is a bin;
        $old_dslist = [];       // binArr;
        $old_jpath = [];        // strArr;
        $old_jpath_len = [];    // intArr;
        $old_val_arr = [];      // strArr;
        // $actualSettings         is a bin;
        $new_dslist = [];       // binArr;
        $new_jpath = [];        // strArr;
        $new_jpath_len = [];    // intArr;
        $new_val_arr = [];      // strArr;
        // $cpos                   is a int;
        // $eqpos                  is a int;
        // $leng                   is a int;
        // $i                      is a int;
        // $j                      is a int;
        // $subres                 is a int;
        // $res                    is a int;
        // $njpath                 is a str;
        // $jpath                  is a str;
        // $fun                    is a str;
        // $attr                   is a str;
        // $value                  is a str;
        // $old_serial             is a str;
        // $new_serial             is a str;
        // $url                    is a str;
        // $tmp                    is a str;
        // $binTmp                 is a bin;
        // $sensorType             is a str;
        // $unit_name              is a str;
        // $newval                 is a str;
        // $oldval                 is a str;
        // $old_calib              is a str;
        // $each_str               is a str;
        // $do_update              is a bool;
        // $found                  is a bool;
        $res = YAPI::SUCCESS;
        $binTmp = $this->_get_json_path($settings, 'api');
        if (strlen($binTmp) > 0) {
            $settings = $binTmp;
        }
        $old_serial = '';
        $oldval = '';
        $newval = '';
        $old_json_flat = $this->_flattenJsonStruct($settings);
        $old_dslist = $this->_json_get_array($old_json_flat);
        foreach ($old_dslist as $ii_0) {
            $each_str = $this->_json_get_string($ii_0);
            // split json path and attr
            $leng = strlen($each_str);
            $eqpos = YAPI::Ystrpos($each_str,'=');
            if (($eqpos < 0) || ($leng == 0)) {
                $this->_throw(YAPI::INVALID_ARGUMENT, 'Invalid settings');
                return YAPI::INVALID_ARGUMENT;
            }
            $jpath = substr($each_str, 0, $eqpos);
            $eqpos = $eqpos + 1;
            $value = substr($each_str, $eqpos, $leng - $eqpos);
            $old_jpath[] = $jpath;
            $old_jpath_len[] = strlen($jpath);
            $old_val_arr[] = $value;
            if ($jpath == 'module/serialNumber') {
                $old_serial = $value;
            }
        }

        try {
            $actualSettings = $this->_download('api.json');
        } catch (Exception $ex) {
            // retry silently after a short wait
            YAPI::Sleep(500);
            $actualSettings = $this->_download('api.json');
        }
        $new_serial = $this->get_serialNumber();
        if ($old_serial == $new_serial || $old_serial == '') {
            $old_serial = '_NO_SERIAL_FILTER_';
        }
        $actualSettings = $this->_flattenJsonStruct($actualSettings);
        $new_dslist = $this->_json_get_array($actualSettings);
        foreach ($new_dslist as $ii_1) {
            // remove quotes
            $each_str = $this->_json_get_string($ii_1);
            // split json path and attr
            $leng = strlen($each_str);
            $eqpos = YAPI::Ystrpos($each_str,'=');
            if (($eqpos < 0) || ($leng == 0)) {
                $this->_throw(YAPI::INVALID_ARGUMENT, 'Invalid settings');
                return YAPI::INVALID_ARGUMENT;
            }
            $jpath = substr($each_str, 0, $eqpos);
            $eqpos = $eqpos + 1;
            $value = substr($each_str, $eqpos, $leng - $eqpos);
            $new_jpath[] = $jpath;
            $new_jpath_len[] = strlen($jpath);
            $new_val_arr[] = $value;
        }
        $i = 0;
        while ($i < sizeof($new_jpath)) {
            $njpath = $new_jpath[$i];
            $leng = strlen($njpath);
            $cpos = YAPI::Ystrpos($njpath,'/');
            if (($cpos < 0) || ($leng == 0)) {
                continue;
            }
            $fun = substr($njpath, 0, $cpos);
            $cpos = $cpos + 1;
            $attr = substr($njpath, $cpos, $leng - $cpos);
            $do_update = true;
            if ($fun == 'services') {
                $do_update = false;
            }
            if ($do_update && ($attr == 'firmwareRelease')) {
                $do_update = false;
            }
            if ($do_update && ($attr == 'usbCurrent')) {
                $do_update = false;
            }
            if ($do_update && ($attr == 'upTime')) {
                $do_update = false;
            }
            if ($do_update && ($attr == 'persistentSettings')) {
                $do_update = false;
            }
            if ($do_update && ($attr == 'adminPassword')) {
                $do_update = false;
            }
            if ($do_update && ($attr == 'userPassword')) {
                $do_update = false;
            }
            if ($do_update && ($attr == 'rebootCountdown')) {
                $do_update = false;
            }
            if ($do_update && ($attr == 'advertisedValue')) {
                $do_update = false;
            }
            if ($do_update && ($attr == 'poeCurrent')) {
                $do_update = false;
            }
            if ($do_update && ($attr == 'readiness')) {
                $do_update = false;
            }
            if ($do_update && ($attr == 'ipAddress')) {
                $do_update = false;
            }
            if ($do_update && ($attr == 'subnetMask')) {
                $do_update = false;
            }
            if ($do_update && ($attr == 'router')) {
                $do_update = false;
            }
            if ($do_update && ($attr == 'linkQuality')) {
                $do_update = false;
            }
            if ($do_update && ($attr == 'ssid')) {
                $do_update = false;
            }
            if ($do_update && ($attr == 'channel')) {
                $do_update = false;
            }
            if ($do_update && ($attr == 'security')) {
                $do_update = false;
            }
            if ($do_update && ($attr == 'message')) {
                $do_update = false;
            }
            if ($do_update && ($attr == 'signalValue')) {
                $do_update = false;
            }
            if ($do_update && ($attr == 'currentValue')) {
                $do_update = false;
            }
            if ($do_update && ($attr == 'currentRawValue')) {
                $do_update = false;
            }
            if ($do_update && ($attr == 'currentRunIndex')) {
                $do_update = false;
            }
            if ($do_update && ($attr == 'pulseTimer')) {
                $do_update = false;
            }
            if ($do_update && ($attr == 'lastTimePressed')) {
                $do_update = false;
            }
            if ($do_update && ($attr == 'lastTimeReleased')) {
                $do_update = false;
            }
            if ($do_update && ($attr == 'filesCount')) {
                $do_update = false;
            }
            if ($do_update && ($attr == 'freeSpace')) {
                $do_update = false;
            }
            if ($do_update && ($attr == 'timeUTC')) {
                $do_update = false;
            }
            if ($do_update && ($attr == 'rtcTime')) {
                $do_update = false;
            }
            if ($do_update && ($attr == 'unixTime')) {
                $do_update = false;
            }
            if ($do_update && ($attr == 'dateTime')) {
                $do_update = false;
            }
            if ($do_update && ($attr == 'rawValue')) {
                $do_update = false;
            }
            if ($do_update && ($attr == 'lastMsg')) {
                $do_update = false;
            }
            if ($do_update && ($attr == 'delayedPulseTimer')) {
                $do_update = false;
            }
            if ($do_update && ($attr == 'rxCount')) {
                $do_update = false;
            }
            if ($do_update && ($attr == 'txCount')) {
                $do_update = false;
            }
            if ($do_update && ($attr == 'msgCount')) {
                $do_update = false;
            }
            if ($do_update && ($attr == 'rxMsgCount')) {
                $do_update = false;
            }
            if ($do_update && ($attr == 'txMsgCount')) {
                $do_update = false;
            }
            if ($do_update) {
                $do_update = false;
                $j = 0;
                $found = false;
                $newval = $new_val_arr[$i];
                while (($j < sizeof($old_jpath)) && !($found)) {
                    if (($new_jpath_len[$i] == $old_jpath_len[$j]) && ($new_jpath[$i] == $old_jpath[$j])) {
                        $found = true;
                        $oldval = $old_val_arr[$j];
                        if (!($newval == $oldval) && !($oldval == $old_serial)) {
                            $do_update = true;
                        }
                    }
                    $j = $j + 1;
                }
            }
            if ($do_update) {
                if ($attr == 'calibrationParam') {
                    $old_calib = '';
                    $unit_name = '';
                    $sensorType = '';
                    $j = 0;
                    $found = false;
                    while (($j < sizeof($old_jpath)) && !($found)) {
                        if (($new_jpath_len[$i] == $old_jpath_len[$j]) && ($new_jpath[$i] == $old_jpath[$j])) {
                            $found = true;
                            $old_calib = $old_val_arr[$j];
                        }
                        $j = $j + 1;
                    }
                    $tmp = $fun . '/unit';
                    $j = 0;
                    $found = false;
                    while (($j < sizeof($new_jpath)) && !($found)) {
                        if ($tmp == $new_jpath[$j]) {
                            $found = true;
                            $unit_name = $new_val_arr[$j];
                        }
                        $j = $j + 1;
                    }
                    $tmp = $fun . '/sensorType';
                    $j = 0;
                    $found = false;
                    while (($j < sizeof($new_jpath)) && !($found)) {
                        if ($tmp == $new_jpath[$j]) {
                            $found = true;
                            $sensorType = $new_val_arr[$j];
                        }
                        $j = $j + 1;
                    }
                    $newval = $this->calibConvert($old_calib, $new_val_arr[$i], $unit_name, $sensorType);
                    $url = 'api/' . $fun . '.json?' . $attr . '=' . $this->_escapeAttr($newval);
                    $subres = $this->_tryExec($url);
                    if (($res == YAPI::SUCCESS) && ($subres != YAPI::SUCCESS)) {
                        $res = $subres;
                    }
                } else {
                    $url = 'api/' . $fun . '.json?' . $attr . '=' . $this->_escapeAttr($oldval);
                    if ($attr == 'resolution') {
                        $restoreLast[] = $url;
                    } else {
                        $subres = $this->_tryExec($url);
                        if (($res == YAPI::SUCCESS) && ($subres != YAPI::SUCCESS)) {
                            $res = $subres;
                        }
                    }
                }
            }
            $i = $i + 1;
        }
        foreach ($restoreLast as $ii_2) {
            $subres = $this->_tryExec($ii_2);
            if (($res == YAPI::SUCCESS) && ($subres != YAPI::SUCCESS)) {
                $res = $subres;
            }
        }
        $this->clearCache();
        return $res;
    }

    /**
     * Adds a file to the uploaded data at the next HTTP callback.
     * This function only affects the next HTTP callback and only works in
     * HTTP callback mode.
     *
     * @param string $filename : the name of the file to upload at the next HTTP callback
     *
     * @return int  nothing.
     */
    public function addFileToHTTPCallback(string $filename): int
    {
        // $content                is a bin;

        $content = $this->_download('@YCB+' . $filename);
        if (strlen($content) == 0) {
            return YAPI::NOT_SUPPORTED;
        }
        return YAPI::SUCCESS;
    }

    /**
     * Returns the unique hardware identifier of the module.
     * The unique hardware identifier is made of the device serial
     * number followed by string ".module".
     *
     * @return string  a string that uniquely identifies the module
     */
    public function get_hardwareId(): string
    {
        // $serial                 is a str;

        $serial = $this->get_serialNumber();
        return $serial . '.module';
    }

    /**
     * Downloads the specified built-in file and returns a binary buffer with its content.
     *
     * @param string $pathname : name of the new file to load
     *
     * @return string  a binary buffer with the file content
     *
     * On failure, throws an exception or returns an empty content.
     * @throws YAPI_Exception on error
     */
    public function download(string $pathname): string
    {
        return $this->_download($pathname);
    }

    /**
     * Returns the icon of the module. The icon is a PNG image and does not
     * exceeds 1536 bytes.
     *
     * @return string  a binary buffer with module icon, in png format.
     *         On failure, throws an exception or returns an empty content.
     * @throws YAPI_Exception on error
     */
    public function get_icon2d(): string
    {
        return $this->_download('icon2d.png');
    }

    /**
     * Returns a string with last logs of the module. This method return only
     * logs that are still in the module.
     *
     * @return string  a string with last logs of the module.
     *         On failure, throws an exception or returns  YAPI::INVALID_STRING.
     * @throws YAPI_Exception on error
     */
    public function get_lastLogs(): string
    {
        // $content                is a bin;

        $content = $this->_download('logs.txt');
        if (strlen($content) == 0) {
            return YAPI::INVALID_STRING;
        }
        return YAPI::Ybin2str($content);
    }

    /**
     * Adds a text message to the device logs. This function is useful in
     * particular to trace the execution of HTTP callbacks. If a newline
     * is desired after the message, it must be included in the string.
     *
     * @param string $text : the string to append to the logs.
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function log(string $text): int
    {
        return $this->_upload('logs.txt', YAPI::Ystr2bin($text));
    }

    /**
     * Returns a list of all the modules that are plugged into the current module.
     * This method only makes sense when called for a YoctoHub/VirtualHub.
     * Otherwise, an empty array will be returned.
     *
     * @return string[]  an array of strings containing the sub modules.
     */
    public function get_subDevices(): array
    {
        return $this->get_subDevices_internal();
    }

    //cannot be generated for PHP:
    //private function get_subDevices_internal()

    /**
     * Returns the serial number of the YoctoHub on which this module is connected.
     * If the module is connected by USB, or if the module is the root YoctoHub, an
     * empty string is returned.
     *
     * @return string  a string with the serial number of the YoctoHub or an empty string
     */
    public function get_parentHub(): string
    {
        return $this->get_parentHub_internal();
    }

    //cannot be generated for PHP:
    //private function get_parentHub_internal()

    /**
     * Returns the URL used to access the module. If the module is connected by USB, the
     * string 'usb' is returned.
     *
     * @return string  a string with the URL of the module.
     */
    public function get_url(): string
    {
        return $this->get_url_internal();
    }

    //cannot be generated for PHP:
    //private function get_url_internal()

    /**
     * @throws YAPI_Exception
     */
    public function productName(): string
{
    return $this->get_productName();
}

    /**
     * @throws YAPI_Exception
     */
    public function serialNumber(): string
{
    return $this->get_serialNumber();
}

    /**
     * @throws YAPI_Exception
     */
    public function productId(): int
{
    return $this->get_productId();
}

    /**
     * @throws YAPI_Exception
     */
    public function productRelease(): int
{
    return $this->get_productRelease();
}

    /**
     * @throws YAPI_Exception
     */
    public function firmwareRelease(): string
{
    return $this->get_firmwareRelease();
}

    /**
     * @throws YAPI_Exception
     */
    public function persistentSettings(): int
{
    return $this->get_persistentSettings();
}

    /**
     * @throws YAPI_Exception
     */
    public function setPersistentSettings(int $newval): int
{
    return $this->set_persistentSettings($newval);
}

    /**
     * @throws YAPI_Exception
     */
    public function luminosity(): int
{
    return $this->get_luminosity();
}

    /**
     * @throws YAPI_Exception
     */
    public function setLuminosity(int $newval): int
{
    return $this->set_luminosity($newval);
}

    /**
     * @throws YAPI_Exception
     */
    public function beacon(): int
{
    return $this->get_beacon();
}

    /**
     * @throws YAPI_Exception
     */
    public function setBeacon(int $newval): int
{
    return $this->set_beacon($newval);
}

    /**
     * @throws YAPI_Exception
     */
    public function upTime(): float
{
    return $this->get_upTime();
}

    /**
     * @throws YAPI_Exception
     */
    public function usbCurrent(): int
{
    return $this->get_usbCurrent();
}

    /**
     * @throws YAPI_Exception
     */
    public function rebootCountdown(): int
{
    return $this->get_rebootCountdown();
}

    /**
     * @throws YAPI_Exception
     */
    public function setRebootCountdown(int $newval): int
{
    return $this->set_rebootCountdown($newval);
}

    /**
     * @throws YAPI_Exception
     */
    public function userVar(): int
{
    return $this->get_userVar();
}

    /**
     * @throws YAPI_Exception
     */
    public function setUserVar(int $newval): int
{
    return $this->set_userVar($newval);
}

    /**
     * Continues the module enumeration started using yFirstModule().
     * Caution: You can't make any assumption about the returned modules order.
     * If you want to find a specific module, use Module.findModule()
     * and a hardwareID or a logical name.
     *
     * @return ?YModule  a pointer to a YModule object, corresponding to
     *         the next module found, or a null pointer
     *         if there are no more modules to enumerate.
     */
    public function nextModule(): ?YModule
    {
        $resolve = YAPI::resolveFunction($this->_className, $this->_func);
        if ($resolve->errorType != YAPI::SUCCESS) {
            return null;
        }
        $next_hwid = YAPI::getNextHardwareId($this->_className, $resolve->result);
        if ($next_hwid == null) {
            return null;
        }
        return self::FindModule($next_hwid);
    }

    /**
     * Starts the enumeration of modules currently accessible.
     * Use the method YModule::nextModule() to iterate on the
     * next modules.
     *
     * @return ?YModule  a pointer to a YModule object, corresponding to
     *         the first module currently online, or a null pointer
     *         if there are none.
     */
    public static function FirstModule(): ?YModule
    {
        $next_hwid = YAPI::getFirstHardwareId('Module');
        if ($next_hwid == null) {
            return null;
        }
        return self::FindModule($next_hwid);
    }

    //--- (end of generated code: YModule implementation)
}

//^^^^ YModule.php

/**
 * Enables the HTTP callback cache. When enabled, this cache reduces the quantity of data sent to the
 * PHP script by 50% to 70%. To enable this cache, the method ySetHTTPCallbackCacheDir()
 * must be called before any call to yRegisterHub(). This method takes in parameter the path
 * of the directory used for saving data between each callback. This folder must exist and the
 * PHP script needs to have write access to it. It is recommended to use a folder that is not published
 * on the Web server since the library will save some data of Yoctopuce devices into this folder.
 *
 * Note: This feature is supported by YoctoHub and VirtualHub since version 27750.
 *
 * @param string $directory : the path of the folder that will be used as cache.
 *
 * On failure, throws an exception.
 * @throws YAPI_Exception on error
 */
function ySetHTTPCallbackCacheDir(string $directory): void
{
    YAPI::SetHTTPCallbackCacheDir($directory);
}

/**
 * Disables the HTTP callback cache. This method disables the HTTP callback cache, and
 * can additionally cleanup the cache directory.
 *
 * @param boolean $removeFiles : True to clear the content of the cache.
 *         On failure, throws an exception.
 * @throws YAPI_Exception on error
 */
function yClearHTTPCallbackCacheDir(bool $removeFiles): void
{
    YAPI::ClearHTTPCallbackCacheDir($removeFiles);
}


/**
 * Returns the version identifier for the Yoctopuce library in use.
 * The version is a string in the form "Major.Minor.Build",
 * for instance "1.01.5535". For languages using an external
 * DLL (for instance C#, VisualBasic or Delphi), the character string
 * includes as well the DLL version, for instance
 * "1.01.5535 (1.01.5439)".
 *
 * If you want to verify in your code that the library version is
 * compatible with the version that you have used during development,
 * verify that the major number is strictly equal and that the minor
 * number is greater or equal. The build number is not relevant
 * with respect to the library compatibility.
 *
 * @return string  a character string describing the library version.
 */
function yGetAPIVersion(): string
{
    return YAPI::GetAPIVersion();
}

/**
 * Initializes the Yoctopuce programming library explicitly.
 * It is not strictly needed to call yInitAPI(), as the library is
 * automatically  initialized when calling yRegisterHub() for the
 * first time.
 *
 * When YAPI::DETECT_NONE is used as detection mode,
 * you must explicitly use yRegisterHub() to point the API to the
 * VirtualHub on which your devices are connected before trying to access them.
 *
 * @param int $mode : an integer corresponding to the type of automatic
 *         device detection to use. Possible values are
 *         YAPI::DETECT_NONE, YAPI::DETECT_USB, YAPI::DETECT_NET,
 *         and YAPI::DETECT_ALL.
 * @param string $errmsg : a string passed by reference to receive any error message.
 *
 * @return int  YAPI::SUCCESS when the call succeeds.
 *
 * On failure returns a negative error code.
 */
function yInitAPI(int $mode = 0, ?string &$errmsg = ""): int
{
    return YAPI::InitAPI($mode, $errmsg);
}

/**
 * Waits for all pending communications with Yoctopuce devices to be
 * completed then frees dynamically allocated resources used by
 * the Yoctopuce library.
 *
 * From an operating system standpoint, it is generally not required to call
 * this function since the OS will automatically free allocated resources
 * once your program is completed. However, there are two situations when
 * you may really want to use that function:
 *
 * - Free all dynamically allocated memory blocks in order to
 * track a memory leak.
 *
 * - Send commands to devices right before the end
 * of the program. Since commands are sent in an asynchronous way
 * the program could exit before all commands are effectively sent.
 *
 * You should not call any other library function after calling
 * yFreeAPI(), or your program will crash.
 */
function yFreeAPI(): void
{
    YAPI::FreeAPI();
}

/**
 * Disables the use of exceptions to report runtime errors.
 * When exceptions are disabled, every function returns a specific
 * error value which depends on its type and which is documented in
 * this reference manual.
 */
function yDisableExceptions(): void
{
    YAPI::DisableExceptions();
}

/**
 * Re-enables the use of exceptions for runtime error handling.
 * Be aware than when exceptions are enabled, every function that fails
 * triggers an exception. If the exception is not caught by the user code,
 * it either fires the debugger or aborts (i.e. crash) the program.
 */
function yEnableExceptions(): void
{
    YAPI::EnableExceptions();
}

/**
 * Set up the Yoctopuce library to use modules connected on a given machine. Idealy this
 * call will be made once at the begining of your application.  The
 * parameter will determine how the API will work. Use the following values:
 *
 * <b>usb</b>: When the usb keyword is used, the API will work with
 * devices connected directly to the USB bus. Some programming languages such a JavaScript,
 * PHP, and Java don't provide direct access to USB hardware, so usb will
 * not work with these. In this case, use a VirtualHub or a networked YoctoHub (see below).
 *
 * <b><i>x.x.x.x</i></b> or <b><i>hostname</i></b>: The API will use the devices connected to the
 * host with the given IP address or hostname. That host can be a regular computer
 * running a <i>native VirtualHub</i>, a <i>VirtualHub for web</i> hosted on a server,
 * or a networked YoctoHub such as YoctoHub-Ethernet or
 * YoctoHub-Wireless. If you want to use the VirtualHub running on you local
 * computer, use the IP address 127.0.0.1. If the given IP is unresponsive, yRegisterHub
 * will not return until a time-out defined by ySetNetworkTimeout has elapsed.
 * However, it is possible to preventively test a connection  with yTestHub.
 * If you cannot afford a network time-out, you can use the non-blocking yPregisterHub
 * function that will establish the connection as soon as it is available.
 *
 *
 * <b>callback</b>: that keyword make the API run in "<i>HTTP Callback</i>" mode.
 * This a special mode allowing to take control of Yoctopuce devices
 * through a NAT filter when using a VirtualHub or a networked YoctoHub. You only
 * need to configure your hub to call your server script on a regular basis.
 * This mode is currently available for PHP and Node.JS only.
 *
 * Be aware that only one application can use direct USB access at a
 * given time on a machine. Multiple access would cause conflicts
 * while trying to access the USB modules. In particular, this means
 * that you must stop the VirtualHub software before starting
 * an application that uses direct USB access. The workaround
 * for this limitation is to set up the library to use the VirtualHub
 * rather than direct USB access.
 *
 * If access control has been activated on the hub, virtual or not, you want to
 * reach, the URL parameter should look like:
 *
 * http://username:password@address:port
 *
 * You can call <i>RegisterHub</i> several times to connect to several machines. On
 * the other hand, it is useless and even counterproductive to call <i>RegisterHub</i>
 * with to same address multiple times during the life of the application.
 *
 * @param string $url : a string containing either "usb","callback" or the
 *         root URL of the hub to monitor
 * @param string $errmsg : a string passed by reference to receive any error message.
 *
 * @return int  YAPI::SUCCESS when the call succeeds.
 *
 * On failure returns a negative error code.
 */
function yRegisterHub(string $url, ?string &$errmsg = ""): int
{
    return YAPI::RegisterHub($url, $errmsg);
}

/**
 * Fault-tolerant alternative to yRegisterHub(). This function has the same
 * purpose and same arguments as yRegisterHub(), but does not trigger
 * an error when the selected hub is not available at the time of the function call.
 * If the connexion cannot be established immediately, a background task will automatically
 * perform periodic retries. This makes it possible to register a network hub independently of the current
 * connectivity, and to try to contact it only when a device is actively needed.
 *
 * @param string $url : a string containing either "usb","callback" or the
 *         root URL of the hub to monitor
 * @param string $errmsg : a string passed by reference to receive any error message.
 *
 * @return int  YAPI::SUCCESS when the call succeeds.
 *
 * On failure returns a negative error code.
 */
function yPreregisterHub(string $url, ?string &$errmsg = ""): int
{
    return YAPI::PreregisterHub($url, $errmsg);
}

/**
 * Set up the Yoctopuce library to no more use modules connected on a previously
 * registered machine with RegisterHub.
 *
 * @param string $url : a string containing either "usb" or the
 *         root URL of the hub to monitor
 */
function yUnregisterHub(string $url): void
{
    YAPI::UnregisterHub($url);
}

/**
 * Test if the hub is reachable. This method do not register the hub, it only test if the
 * hub is usable. The url parameter follow the same convention as the yRegisterHub
 * method. This method is useful to verify the authentication parameters for a hub. It
 * is possible to force this method to return after mstimeout milliseconds.
 *
 * @param string $url : a string containing either "usb","callback" or the
 *         root URL of the hub to monitor
 * @param int $mstimeout : the number of millisecond available to test the connection.
 * @param string $errmsg : a string passed by reference to receive any error message.
 *
 * @return int  YAPI::SUCCESS when the call succeeds.
 *
 * On failure returns a negative error code.
 */
function yTestHub(string $url, int $mstimeout, ?string &$errmsg = ""): int
{
    return YAPI::TestHub($url, $mstimeout, $errmsg);
}

/**
 * Trigger an HTTP request to another server, and forward the HTTP callback data
 * previously received from a YoctoHub. This function only works after a successful
 * call to yRegisterHub("callback")
 *
 * @param string url : a string containing the URL of the server to which the HTTP callback
 *              should be forwarded
 * @param string errmsg : a string passed by reference to receive any error message.
 *
 * @return integer : YAPI::SUCCESS when the call succeeds.
 *
 * On failure, throws an exception or returns a negative error code.
 */
function yForwardHTTPCallback(string $url, ?string &$errmsg = ""): int
{
    return YAPI::ForwardHTTPCallback($url, $errmsg);
}

/**
 * Triggers a (re)detection of connected Yoctopuce modules.
 * The library searches the machines or USB ports previously registered using
 * yRegisterHub(), and invokes any user-defined callback function
 * in case a change in the list of connected devices is detected.
 *
 * This function can be called as frequently as desired to refresh the device list
 * and to make the application aware of hot-plug events. However, since device
 * detection is quite a heavy process, UpdateDeviceList shouldn't be called more
 * than once every two seconds.
 *
 * @param string $errmsg : a string passed by reference to receive any error message.
 *
 * @return int  YAPI::SUCCESS when the call succeeds.
 *
 * On failure returns a negative error code.
 */
function yUpdateDeviceList(?string &$errmsg = ""): int
{
    return YAPI::UpdateDeviceList($errmsg);
}

/**
 * Maintains the device-to-library communication channel.
 * If your program includes significant loops, you may want to include
 * a call to this function to make sure that the library takes care of
 * the information pushed by the modules on the communication channels.
 * This is not strictly necessary, but it may improve the reactivity
 * of the library for the following commands.
 *
 * This function may signal an error in case there is a communication problem
 * while contacting a module.
 *
 * @param string $errmsg : a string passed by reference to receive any error message.
 *
 * @return int  YAPI::SUCCESS when the call succeeds.
 *
 * On failure returns a negative error code.
 */
function yHandleEvents(?string &$errmsg = ""): int
{
    return YAPI::HandleEvents($errmsg);
}

/**
 * Pauses the execution flow for a specified duration.
 * This function implements a passive waiting loop, meaning that it does not
 * consume CPU cycles significantly. The processor is left available for
 * other threads and processes. During the pause, the library nevertheless
 * reads from time to time information from the Yoctopuce modules by
 * calling yHandleEvents(), in order to stay up-to-date.
 *
 * This function may signal an error in case there is a communication problem
 * while contacting a module.
 *
 * @param float $ms_duration : an integer corresponding to the duration of the pause,
 *         in milliseconds.
 * @param string $errmsg : a string passed by reference to receive any error message.
 *
 * @return int  YAPI::SUCCESS when the call succeeds.
 *
 * On failure returns a negative error code.
 */
function ySleep(float $ms_duration, ?string &$errmsg = ""): int
{
    return YAPI::Sleep($ms_duration, $errmsg);
}

/**
 * Returns the current value of a monotone millisecond-based time counter.
 * This counter can be used to compute delays in relation with
 * Yoctopuce devices, which also uses the millisecond as timebase.
 *
 * @return float  a long integer corresponding to the millisecond counter.
 */
function yGetTickCount(): float
{
    return YAPI::GetTickCount();
}

/**
 * Checks if a given string is valid as logical name for a module or a function.
 * A valid logical name has a maximum of 19 characters, all among
 * A...Z, a...z, 0...9, _, and -.
 * If you try to configure a logical name with an incorrect string,
 * the invalid characters are ignored.
 *
 * @param string $name : a string containing the name to check.
 *
 * @return boolean  true if the name is valid, false otherwise.
 */
function yCheckLogicalName(string $name): bool
{
    return YAPI::CheckLogicalName($name);
}

/**
 * Register a callback function, to be called each time
 * a device is plugged. This callback will be invoked while yUpdateDeviceList
 * is running. You will have to call this function on a regular basis.
 *
 * @param callable $arrivalCallback : a procedure taking a YModule parameter, or null
 *         to unregister a previously registered  callback.
 */
function yRegisterDeviceArrivalCallback(?callable $arrivalCallback): void
{
    YAPI::RegisterDeviceArrivalCallback($arrivalCallback);
}

/**
 * Register a device logical name change callback
 */
function yRegisterDeviceChangeCallback(?callable $changeCallback): void
{
    YAPI::RegisterDeviceChangeCallback($changeCallback);
}

/**
 * Register a callback function, to be called each time
 * a device is unplugged. This callback will be invoked while yUpdateDeviceList
 * is running. You will have to call this function on a regular basis.
 *
 * @param callable $removalCallback : a procedure taking a YModule parameter, or null
 *         to unregister a previously registered  callback.
 */
function yRegisterDeviceRemovalCallback(?callable $removalCallback): void
{
    YAPI::RegisterDeviceRemovalCallback($removalCallback);
}

// Register a new value calibration handler for a given calibration type
//
function yRegisterCalibrationHandler(int $int_calibrationType, ?callable $calibrationHandler): void
{
    YAPI::RegisterCalibrationHandler($int_calibrationType, $calibrationHandler);
}

// Standard value calibration handler (n-point linear error correction)
//
function yLinearCalibrationHandler(
    float $float_rawValue,
    int $int_calibType,
    array $arr_calibParams,
    array $arr_calibRawValues,
    array $arr_calibRefValues
): float {
    return YAPI::LinearCalibrationHandler($float_rawValue, $int_calibType, $arr_calibParams,
        $arr_calibRawValues, $arr_calibRefValues);
}


//--- (generated code: YFunction functions)

/**
 * Retrieves a function for a given identifier.
 * The identifier can be specified using several formats:
 *
 * - FunctionLogicalName
 * - ModuleSerialNumber.FunctionIdentifier
 * - ModuleSerialNumber.FunctionLogicalName
 * - ModuleLogicalName.FunctionIdentifier
 * - ModuleLogicalName.FunctionLogicalName
 *
 *
 * This function does not require that the function is online at the time
 * it is invoked. The returned object is nevertheless valid.
 * Use the method isOnline() to test if the function is
 * indeed online at a given time. In case of ambiguity when looking for
 * a function by logical name, no error is notified: the first instance
 * found is returned. The search is performed first by hardware name,
 * then by logical name.
 *
 * If a call to this object's is_online() method returns FALSE although
 * you are certain that the matching device is plugged, make sure that you did
 * call registerHub() at application initialization time.
 *
 * @param string $func : a string that uniquely characterizes the function, for instance
 *         MyDevice..
 *
 * @return YFunction  a YFunction object allowing you to drive the function.
 */
function yFindFunction(string $func): YFunction
{
    return YFunction::FindFunction($func);
}

/**
 * comment from .yc definition
 */
function yFirstFunction(): ?YFunction
{
    return YFunction::FirstFunction();
}

//--- (end of generated code: YFunction functions)


//--- (generated code: YSensor functions)

/**
 * Retrieves a sensor for a given identifier.
 * The identifier can be specified using several formats:
 *
 * - FunctionLogicalName
 * - ModuleSerialNumber.FunctionIdentifier
 * - ModuleSerialNumber.FunctionLogicalName
 * - ModuleLogicalName.FunctionIdentifier
 * - ModuleLogicalName.FunctionLogicalName
 *
 *
 * This function does not require that the sensor is online at the time
 * it is invoked. The returned object is nevertheless valid.
 * Use the method isOnline() to test if the sensor is
 * indeed online at a given time. In case of ambiguity when looking for
 * a sensor by logical name, no error is notified: the first instance
 * found is returned. The search is performed first by hardware name,
 * then by logical name.
 *
 * If a call to this object's is_online() method returns FALSE although
 * you are certain that the matching device is plugged, make sure that you did
 * call registerHub() at application initialization time.
 *
 * @param string $func : a string that uniquely characterizes the sensor, for instance
 *         MyDevice..
 *
 * @return YSensor  a YSensor object allowing you to drive the sensor.
 */
function yFindSensor(string $func): YSensor
{
    return YSensor::FindSensor($func);
}

/**
 * Starts the enumeration of sensors currently accessible.
 * Use the method YSensor::nextSensor() to iterate on
 * next sensors.
 *
 * @return ?YSensor  a pointer to a YSensor object, corresponding to
 *         the first sensor currently online, or a null pointer
 *         if there are none.
 */
function yFirstSensor(): ?YSensor
{
    return YSensor::FirstSensor();
}

//--- (end of generated code: YSensor functions)

//--- (generated code: YModule functions)

/**
 * Allows you to find a module from its serial number or from its logical name.
 *
 * This function does not require that the module is online at the time
 * it is invoked. The returned object is nevertheless valid.
 * Use the method isOnline() to test if the module is
 * indeed online at a given time. In case of ambiguity when looking for
 * a module by logical name, no error is notified: the first instance
 * found is returned. The search is performed first by hardware name,
 * then by logical name.
 *
 *
 * If a call to this object's is_online() method returns FALSE although
 * you are certain that the device is plugged, make sure that you did
 * call registerHub() at application initialization time.
 *
 * @param string $func : a string containing either the serial number or
 *         the logical name of the desired module
 *
 * @return YModule  a YModule object allowing you to drive the module
 *         or get additional information on the module.
 */
function yFindModule(string $func): YModule
{
    return YModule::FindModule($func);
}

/**
 * Starts the enumeration of modules currently accessible.
 * Use the method YModule::nextModule() to iterate on the
 * next modules.
 *
 * @return ?YModule  a pointer to a YModule object, corresponding to
 *         the first module currently online, or a null pointer
 *         if there are none.
 */
function yFirstModule(): ?YModule
{
    return YModule::FirstModule();
}

//--- (end of generated code: YModule functions)


//--- (generated code: YDataLogger definitions)
if (!defined('Y_RECORDING_OFF')) {
    define('Y_RECORDING_OFF', 0);
}
if (!defined('Y_RECORDING_ON')) {
    define('Y_RECORDING_ON', 1);
}
if (!defined('Y_RECORDING_PENDING')) {
    define('Y_RECORDING_PENDING', 2);
}
if (!defined('Y_RECORDING_INVALID')) {
    define('Y_RECORDING_INVALID', -1);
}
if (!defined('Y_AUTOSTART_OFF')) {
    define('Y_AUTOSTART_OFF', 0);
}
if (!defined('Y_AUTOSTART_ON')) {
    define('Y_AUTOSTART_ON', 1);
}
if (!defined('Y_AUTOSTART_INVALID')) {
    define('Y_AUTOSTART_INVALID', -1);
}
if (!defined('Y_BEACONDRIVEN_OFF')) {
    define('Y_BEACONDRIVEN_OFF', 0);
}
if (!defined('Y_BEACONDRIVEN_ON')) {
    define('Y_BEACONDRIVEN_ON', 1);
}
if (!defined('Y_BEACONDRIVEN_INVALID')) {
    define('Y_BEACONDRIVEN_INVALID', -1);
}
if (!defined('Y_CLEARHISTORY_FALSE')) {
    define('Y_CLEARHISTORY_FALSE', 0);
}
if (!defined('Y_CLEARHISTORY_TRUE')) {
    define('Y_CLEARHISTORY_TRUE', 1);
}
if (!defined('Y_CLEARHISTORY_INVALID')) {
    define('Y_CLEARHISTORY_INVALID', -1);
}
if (!defined('Y_CURRENTRUNINDEX_INVALID')) {
    define('Y_CURRENTRUNINDEX_INVALID', YAPI_INVALID_UINT);
}
if (!defined('Y_TIMEUTC_INVALID')) {
    define('Y_TIMEUTC_INVALID', YAPI_INVALID_LONG);
}
if (!defined('Y_USAGE_INVALID')) {
    define('Y_USAGE_INVALID', YAPI_INVALID_UINT);
}
//--- (end of generated code: YDataLogger definitions)


//--- (generated code: YDataLogger declaration)
//vvvv YDataLogger.php

/**
 * YDataLogger Class: DataLogger control interface, available on most Yoctopuce sensors.
 *
 * A non-volatile memory for storing ongoing measured data is available on most Yoctopuce
 * sensors. Recording can happen automatically, without requiring a permanent
 * connection to a computer.
 * The YDataLogger class controls the global parameters of the internal data
 * logger. Recording control (start/stop) as well as data retrieval is done at
 * sensor objects level.
 */
class YDataLogger extends YFunction
{
    const CURRENTRUNINDEX_INVALID = YAPI::INVALID_UINT;
    const TIMEUTC_INVALID = YAPI::INVALID_LONG;
    const RECORDING_OFF = 0;
    const RECORDING_ON = 1;
    const RECORDING_PENDING = 2;
    const RECORDING_INVALID = -1;
    const AUTOSTART_OFF = 0;
    const AUTOSTART_ON = 1;
    const AUTOSTART_INVALID = -1;
    const BEACONDRIVEN_OFF = 0;
    const BEACONDRIVEN_ON = 1;
    const BEACONDRIVEN_INVALID = -1;
    const USAGE_INVALID = YAPI::INVALID_UINT;
    const CLEARHISTORY_FALSE = 0;
    const CLEARHISTORY_TRUE = 1;
    const CLEARHISTORY_INVALID = -1;
    //--- (end of generated code: YDataLogger declaration)

    //--- (generated code: YDataLogger attributes)
    protected int $_currentRunIndex = self::CURRENTRUNINDEX_INVALID; // UInt31
    protected float $_timeUTC = self::TIMEUTC_INVALID;        // UTCTime
    protected int $_recording = self::RECORDING_INVALID;      // OffOnPending
    protected int $_autoStart = self::AUTOSTART_INVALID;      // OnOff
    protected int $_beaconDriven = self::BEACONDRIVEN_INVALID;   // OnOff
    protected int $_usage = self::USAGE_INVALID;          // Percent
    protected int $_clearHistory = self::CLEARHISTORY_INVALID;   // Bool

    //--- (end of generated code: YDataLogger attributes)
    protected ?string $dataLoggerURL = null;

    function __construct(string $str_func)
    {
        //--- (generated code: YDataLogger constructor)
        parent::__construct($str_func);
        $this->_className = 'DataLogger';

        //--- (end of generated code: YDataLogger constructor)
    }

    // Internal function to retrieve datalogger memory
    //
    public function getData(int $runIdx, ?int $timeIdx, string &$loadval): int
    {
        if (is_null($this->dataLoggerURL)) {
            $this->dataLoggerURL = "/logger.json";
        }

        // get the device serial number
        $devid = $this->module()->get_serialNumber();
        if ($devid == YModule::SERIALNUMBER_INVALID) {
            return $this->get_errorType();
        }
        $httpreq = "GET " . $this->dataLoggerURL;
        if (!is_null($timeIdx)) {
            $httpreq .= "?run={$runIdx}&time={$timeIdx}";
        }
        $yreq = YAPI::devRequest($devid, $httpreq);
        if ($yreq->errorType != YAPI::SUCCESS) {
            if (strpos($yreq->errorMsg, 'HTTP status 404') !== false && $this->dataLoggerURL != "/dataLogger.json") {
                $this->dataLoggerURL = "/dataLogger.json";
                return $this->getData($runIdx, $timeIdx, $loadval);
            }
            return $yreq->errorType;
        }
        $loadval = json_decode($yreq->result, true);

        return YAPI::SUCCESS;
    }

    //--- (generated code: YDataLogger implementation)

    function _parseAttr(string $name, mixed $val): int
    {
        switch ($name) {
        case 'currentRunIndex':
            $this->_currentRunIndex = intval($val);
            return 1;
        case 'timeUTC':
            $this->_timeUTC = intval($val);
            return 1;
        case 'recording':
            $this->_recording = intval($val);
            return 1;
        case 'autoStart':
            $this->_autoStart = intval($val);
            return 1;
        case 'beaconDriven':
            $this->_beaconDriven = intval($val);
            return 1;
        case 'usage':
            $this->_usage = intval($val);
            return 1;
        case 'clearHistory':
            $this->_clearHistory = intval($val);
            return 1;
        }
        return parent::_parseAttr($name, $val);
    }

    /**
     * Returns the current run number, corresponding to the number of times the module was
     * powered on with the dataLogger enabled at some point.
     *
     * @return int  an integer corresponding to the current run number, corresponding to the number of
     * times the module was
     *         powered on with the dataLogger enabled at some point
     *
     * On failure, throws an exception or returns YDataLogger::CURRENTRUNINDEX_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_currentRunIndex(): int
    {
        // $res                    is a int;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::CURRENTRUNINDEX_INVALID;
            }
        }
        $res = $this->_currentRunIndex;
        return $res;
    }

    /**
     * Returns the Unix timestamp for current UTC time, if known.
     *
     * @return float  an integer corresponding to the Unix timestamp for current UTC time, if known
     *
     * On failure, throws an exception or returns YDataLogger::TIMEUTC_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_timeUTC(): float
    {
        // $res                    is a long;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::TIMEUTC_INVALID;
            }
        }
        $res = $this->_timeUTC;
        return $res;
    }

    /**
     * Changes the current UTC time reference used for recorded data.
     *
     * @param float $newval : an integer corresponding to the current UTC time reference used for recorded data
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function set_timeUTC(float $newval): int
    {
        $rest_val = strval($newval);
        return $this->_setAttr("timeUTC", $rest_val);
    }

    /**
     * Returns the current activation state of the data logger.
     *
     * @return int  a value among YDataLogger::RECORDING_OFF, YDataLogger::RECORDING_ON and
     * YDataLogger::RECORDING_PENDING corresponding to the current activation state of the data logger
     *
     * On failure, throws an exception or returns YDataLogger::RECORDING_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_recording(): int
    {
        // $res                    is a enumOFFONPENDING;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::RECORDING_INVALID;
            }
        }
        $res = $this->_recording;
        return $res;
    }

    /**
     * Changes the activation state of the data logger to start/stop recording data.
     *
     * @param int $newval : a value among YDataLogger::RECORDING_OFF, YDataLogger::RECORDING_ON and
     * YDataLogger::RECORDING_PENDING corresponding to the activation state of the data logger to
     * start/stop recording data
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function set_recording(int $newval): int
    {
        $rest_val = strval($newval);
        return $this->_setAttr("recording", $rest_val);
    }

    /**
     * Returns the default activation state of the data logger on power up.
     *
     * @return int  either YDataLogger::AUTOSTART_OFF or YDataLogger::AUTOSTART_ON, according to the default
     * activation state of the data logger on power up
     *
     * On failure, throws an exception or returns YDataLogger::AUTOSTART_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_autoStart(): int
    {
        // $res                    is a enumONOFF;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::AUTOSTART_INVALID;
            }
        }
        $res = $this->_autoStart;
        return $res;
    }

    /**
     * Changes the default activation state of the data logger on power up.
     * Do not forget to call the saveToFlash() method of the module to save the
     * configuration change.  Note: if the device doesn't have any time source at his disposal when
     * starting up, it will wait for ~8 seconds before automatically starting to record  with
     * an arbitrary timestamp
     *
     * @param int $newval : either YDataLogger::AUTOSTART_OFF or YDataLogger::AUTOSTART_ON, according to the
     * default activation state of the data logger on power up
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function set_autoStart(int $newval): int
    {
        $rest_val = strval($newval);
        return $this->_setAttr("autoStart", $rest_val);
    }

    /**
     * Returns true if the data logger is synchronised with the localization beacon.
     *
     * @return int  either YDataLogger::BEACONDRIVEN_OFF or YDataLogger::BEACONDRIVEN_ON, according to true
     * if the data logger is synchronised with the localization beacon
     *
     * On failure, throws an exception or returns YDataLogger::BEACONDRIVEN_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_beaconDriven(): int
    {
        // $res                    is a enumONOFF;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::BEACONDRIVEN_INVALID;
            }
        }
        $res = $this->_beaconDriven;
        return $res;
    }

    /**
     * Changes the type of synchronisation of the data logger.
     * Remember to call the saveToFlash() method of the module if the
     * modification must be kept.
     *
     * @param int $newval : either YDataLogger::BEACONDRIVEN_OFF or YDataLogger::BEACONDRIVEN_ON, according
     * to the type of synchronisation of the data logger
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function set_beaconDriven(int $newval): int
    {
        $rest_val = strval($newval);
        return $this->_setAttr("beaconDriven", $rest_val);
    }

    /**
     * Returns the percentage of datalogger memory in use.
     *
     * @return int  an integer corresponding to the percentage of datalogger memory in use
     *
     * On failure, throws an exception or returns YDataLogger::USAGE_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_usage(): int
    {
        // $res                    is a int;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::USAGE_INVALID;
            }
        }
        $res = $this->_usage;
        return $res;
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function get_clearHistory(): int
    {
        // $res                    is a enumBOOL;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::CLEARHISTORY_INVALID;
            }
        }
        $res = $this->_clearHistory;
        return $res;
    }

    /**
     * @throws YAPI_Exception
     */
    public function set_clearHistory(int $newval): int
    {
        $rest_val = strval($newval);
        return $this->_setAttr("clearHistory", $rest_val);
    }

    /**
     * Retrieves a data logger for a given identifier.
     * The identifier can be specified using several formats:
     *
     * - FunctionLogicalName
     * - ModuleSerialNumber.FunctionIdentifier
     * - ModuleSerialNumber.FunctionLogicalName
     * - ModuleLogicalName.FunctionIdentifier
     * - ModuleLogicalName.FunctionLogicalName
     *
     *
     * This function does not require that the data logger is online at the time
     * it is invoked. The returned object is nevertheless valid.
     * Use the method isOnline() to test if the data logger is
     * indeed online at a given time. In case of ambiguity when looking for
     * a data logger by logical name, no error is notified: the first instance
     * found is returned. The search is performed first by hardware name,
     * then by logical name.
     *
     * If a call to this object's is_online() method returns FALSE although
     * you are certain that the matching device is plugged, make sure that you did
     * call registerHub() at application initialization time.
     *
     * @param string $func : a string that uniquely characterizes the data logger, for instance
     *         LIGHTMK4.dataLogger.
     *
     * @return YDataLogger  a YDataLogger object allowing you to drive the data logger.
     */
    public static function FindDataLogger(string $func): YDataLogger
    {
        // $obj                    is a YDataLogger;
        $obj = YFunction::_FindFromCache('DataLogger', $func);
        if ($obj == null) {
            $obj = new YDataLogger($func);
            YFunction::_AddToCache('DataLogger', $func, $obj);
        }
        return $obj;
    }

    /**
     * Clears the data logger memory and discards all recorded data streams.
     * This method also resets the current run index to zero.
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function forgetAllDataStreams(): int
    {
        return $this->set_clearHistory(self::CLEARHISTORY_TRUE);
    }

    /**
     * Returns a list of YDataSet objects that can be used to retrieve
     * all measures stored by the data logger.
     *
     * This function only works if the device uses a recent firmware,
     * as YDataSet objects are not supported by firmwares older than
     * version 13000.
     *
     * @return YDataSet[]  a list of YDataSet object.
     *
     * On failure, throws an exception or returns an empty list.
     * @throws YAPI_Exception on error
     */
    public function get_dataSets(): array
    {
        return $this->parse_dataSets($this->_download('logger.json'));
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function parse_dataSets(string $jsonbuff): array
    {
        $dslist = [];           // binArr;
        // $dataset                is a YDataSetPtr;
        $res = [];              // YDataSetArr;

        $dslist = $this->_json_get_array($jsonbuff);
        while (sizeof($res) > 0) {
            array_pop($res);
        };
        foreach ($dslist as $ii_0) {
            $dataset = new YDataSet($this);
            $dataset->_parse(YAPI::Ybin2str($ii_0));
            $res[] = $dataset;
        }
        return $res;
    }

    /**
     * @throws YAPI_Exception
     */
    public function currentRunIndex(): int
{
    return $this->get_currentRunIndex();
}

    /**
     * @throws YAPI_Exception
     */
    public function timeUTC(): float
{
    return $this->get_timeUTC();
}

    /**
     * @throws YAPI_Exception
     */
    public function setTimeUTC(float $newval): int
{
    return $this->set_timeUTC($newval);
}

    /**
     * @throws YAPI_Exception
     */
    public function recording(): int
{
    return $this->get_recording();
}

    /**
     * @throws YAPI_Exception
     */
    public function setRecording(int $newval): int
{
    return $this->set_recording($newval);
}

    /**
     * @throws YAPI_Exception
     */
    public function autoStart(): int
{
    return $this->get_autoStart();
}

    /**
     * @throws YAPI_Exception
     */
    public function setAutoStart(int $newval): int
{
    return $this->set_autoStart($newval);
}

    /**
     * @throws YAPI_Exception
     */
    public function beaconDriven(): int
{
    return $this->get_beaconDriven();
}

    /**
     * @throws YAPI_Exception
     */
    public function setBeaconDriven(int $newval): int
{
    return $this->set_beaconDriven($newval);
}

    /**
     * @throws YAPI_Exception
     */
    public function usage(): int
{
    return $this->get_usage();
}

    /**
     * @throws YAPI_Exception
     */
    public function clearHistory(): int
{
    return $this->get_clearHistory();
}

    /**
     * @throws YAPI_Exception
     */
    public function setClearHistory(int $newval): int
{
    return $this->set_clearHistory($newval);
}

    /**
     * Continues the enumeration of data loggers started using yFirstDataLogger().
     * Caution: You can't make any assumption about the returned data loggers order.
     * If you want to find a specific a data logger, use DataLogger.findDataLogger()
     * and a hardwareID or a logical name.
     *
     * @return ?YDataLogger  a pointer to a YDataLogger object, corresponding to
     *         a data logger currently online, or a null pointer
     *         if there are no more data loggers to enumerate.
     */
    public function nextDataLogger(): ?YDataLogger
    {
        $resolve = YAPI::resolveFunction($this->_className, $this->_func);
        if ($resolve->errorType != YAPI::SUCCESS) {
            return null;
        }
        $next_hwid = YAPI::getNextHardwareId($this->_className, $resolve->result);
        if ($next_hwid == null) {
            return null;
        }
        return self::FindDataLogger($next_hwid);
    }

    /**
     * Starts the enumeration of data loggers currently accessible.
     * Use the method YDataLogger::nextDataLogger() to iterate on
     * next data loggers.
     *
     * @return ?YDataLogger  a pointer to a YDataLogger object, corresponding to
     *         the first data logger currently online, or a null pointer
     *         if there are none.
     */
    public static function FirstDataLogger(): ?YDataLogger
    {
        $next_hwid = YAPI::getFirstHardwareId('DataLogger');
        if ($next_hwid == null) {
            return null;
        }
        return self::FindDataLogger($next_hwid);
    }

    //--- (end of generated code: YDataLogger implementation)
}

//^^^^ YDataLogger.php

//--- (generated code: YDataLogger functions)

/**
 * Retrieves a data logger for a given identifier.
 * The identifier can be specified using several formats:
 *
 * - FunctionLogicalName
 * - ModuleSerialNumber.FunctionIdentifier
 * - ModuleSerialNumber.FunctionLogicalName
 * - ModuleLogicalName.FunctionIdentifier
 * - ModuleLogicalName.FunctionLogicalName
 *
 *
 * This function does not require that the data logger is online at the time
 * it is invoked. The returned object is nevertheless valid.
 * Use the method isOnline() to test if the data logger is
 * indeed online at a given time. In case of ambiguity when looking for
 * a data logger by logical name, no error is notified: the first instance
 * found is returned. The search is performed first by hardware name,
 * then by logical name.
 *
 * If a call to this object's is_online() method returns FALSE although
 * you are certain that the matching device is plugged, make sure that you did
 * call registerHub() at application initialization time.
 *
 * @param string $func : a string that uniquely characterizes the data logger, for instance
 *         LIGHTMK4.dataLogger.
 *
 * @return YDataLogger  a YDataLogger object allowing you to drive the data logger.
 */
function yFindDataLogger(string $func): YDataLogger
{
    return YDataLogger::FindDataLogger($func);
}

/**
 * Starts the enumeration of data loggers currently accessible.
 * Use the method YDataLogger::nextDataLogger() to iterate on
 * next data loggers.
 *
 * @return ?YDataLogger  a pointer to a YDataLogger object, corresponding to
 *         the first data logger currently online, or a null pointer
 *         if there are none.
 */
function yFirstDataLogger(): ?YDataLogger
{
    return YDataLogger::FirstDataLogger();
}

//--- (end of generated code: YDataLogger functions)
