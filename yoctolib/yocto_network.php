<?php
/*********************************************************************
 *
 *  $Id: yocto_network.php Mon, 05 Oct 2026 14:58:44 +0000 generated $
 *
 *  Implements YNetwork, the high-level API for Network functions
 *
 *  - - - - - - - - - License information: - - - - - - - - -
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
 *  THE SOFTWARE AND DOCUMENTATION ARE PROVIDED 'AS IS' WITHOUT
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

//--- (YNetwork return codes)
//--- (end of YNetwork return codes)
//--- (YNetwork definitions)
if (!defined('Y_READINESS_DOWN')) {
    define('Y_READINESS_DOWN', 0);
}
if (!defined('Y_READINESS_EXISTS')) {
    define('Y_READINESS_EXISTS', 1);
}
if (!defined('Y_READINESS_LINKED')) {
    define('Y_READINESS_LINKED', 2);
}
if (!defined('Y_READINESS_LAN_OK')) {
    define('Y_READINESS_LAN_OK', 3);
}
if (!defined('Y_READINESS_WWW_OK')) {
    define('Y_READINESS_WWW_OK', 4);
}
if (!defined('Y_READINESS_INVALID')) {
    define('Y_READINESS_INVALID', -1);
}
if (!defined('Y_SECURITYMODE_UNDEFINED')) {
    define('Y_SECURITYMODE_UNDEFINED', 0);
}
if (!defined('Y_SECURITYMODE_LEGACY')) {
    define('Y_SECURITYMODE_LEGACY', 1);
}
if (!defined('Y_SECURITYMODE_MIXED')) {
    define('Y_SECURITYMODE_MIXED', 2);
}
if (!defined('Y_SECURITYMODE_SECURE')) {
    define('Y_SECURITYMODE_SECURE', 3);
}
if (!defined('Y_SECURITYMODE_INVALID')) {
    define('Y_SECURITYMODE_INVALID', -1);
}
if (!defined('Y_DISCOVERABLE_FALSE')) {
    define('Y_DISCOVERABLE_FALSE', 0);
}
if (!defined('Y_DISCOVERABLE_TRUE')) {
    define('Y_DISCOVERABLE_TRUE', 1);
}
if (!defined('Y_DISCOVERABLE_INVALID')) {
    define('Y_DISCOVERABLE_INVALID', -1);
}
if (!defined('Y_CALLBACKMETHOD_POST')) {
    define('Y_CALLBACKMETHOD_POST', 0);
}
if (!defined('Y_CALLBACKMETHOD_GET')) {
    define('Y_CALLBACKMETHOD_GET', 1);
}
if (!defined('Y_CALLBACKMETHOD_PUT')) {
    define('Y_CALLBACKMETHOD_PUT', 2);
}
if (!defined('Y_CALLBACKMETHOD_INVALID')) {
    define('Y_CALLBACKMETHOD_INVALID', -1);
}
if (!defined('Y_CALLBACKENCODING_FORM')) {
    define('Y_CALLBACKENCODING_FORM', 0);
}
if (!defined('Y_CALLBACKENCODING_JSON')) {
    define('Y_CALLBACKENCODING_JSON', 1);
}
if (!defined('Y_CALLBACKENCODING_JSON_ARRAY')) {
    define('Y_CALLBACKENCODING_JSON_ARRAY', 2);
}
if (!defined('Y_CALLBACKENCODING_CSV')) {
    define('Y_CALLBACKENCODING_CSV', 3);
}
if (!defined('Y_CALLBACKENCODING_YOCTO_API')) {
    define('Y_CALLBACKENCODING_YOCTO_API', 4);
}
if (!defined('Y_CALLBACKENCODING_JSON_NUM')) {
    define('Y_CALLBACKENCODING_JSON_NUM', 5);
}
if (!defined('Y_CALLBACKENCODING_EMONCMS')) {
    define('Y_CALLBACKENCODING_EMONCMS', 6);
}
if (!defined('Y_CALLBACKENCODING_AZURE')) {
    define('Y_CALLBACKENCODING_AZURE', 7);
}
if (!defined('Y_CALLBACKENCODING_INFLUXDB')) {
    define('Y_CALLBACKENCODING_INFLUXDB', 8);
}
if (!defined('Y_CALLBACKENCODING_MQTT')) {
    define('Y_CALLBACKENCODING_MQTT', 9);
}
if (!defined('Y_CALLBACKENCODING_YOCTO_API_JZON')) {
    define('Y_CALLBACKENCODING_YOCTO_API_JZON', 10);
}
if (!defined('Y_CALLBACKENCODING_PRTG')) {
    define('Y_CALLBACKENCODING_PRTG', 11);
}
if (!defined('Y_CALLBACKENCODING_INFLUXDB_V2')) {
    define('Y_CALLBACKENCODING_INFLUXDB_V2', 12);
}
if (!defined('Y_CALLBACKENCODING_INVALID')) {
    define('Y_CALLBACKENCODING_INVALID', -1);
}
if (!defined('Y_CALLBACKTEMPLATE_OFF')) {
    define('Y_CALLBACKTEMPLATE_OFF', 0);
}
if (!defined('Y_CALLBACKTEMPLATE_ON')) {
    define('Y_CALLBACKTEMPLATE_ON', 1);
}
if (!defined('Y_CALLBACKTEMPLATE_INVALID')) {
    define('Y_CALLBACKTEMPLATE_INVALID', -1);
}
if (!defined('Y_MACADDRESS_INVALID')) {
    define('Y_MACADDRESS_INVALID', YAPI_INVALID_STRING);
}
if (!defined('Y_IPADDRESS_INVALID')) {
    define('Y_IPADDRESS_INVALID', YAPI_INVALID_STRING);
}
if (!defined('Y_SUBNETMASK_INVALID')) {
    define('Y_SUBNETMASK_INVALID', YAPI_INVALID_STRING);
}
if (!defined('Y_ROUTER_INVALID')) {
    define('Y_ROUTER_INVALID', YAPI_INVALID_STRING);
}
if (!defined('Y_CURRENTDNS_INVALID')) {
    define('Y_CURRENTDNS_INVALID', YAPI_INVALID_STRING);
}
if (!defined('Y_IPCONFIG_INVALID')) {
    define('Y_IPCONFIG_INVALID', YAPI_INVALID_STRING);
}
if (!defined('Y_PRIMARYDNS_INVALID')) {
    define('Y_PRIMARYDNS_INVALID', YAPI_INVALID_STRING);
}
if (!defined('Y_SECONDARYDNS_INVALID')) {
    define('Y_SECONDARYDNS_INVALID', YAPI_INVALID_STRING);
}
if (!defined('Y_NTPSERVER_INVALID')) {
    define('Y_NTPSERVER_INVALID', YAPI_INVALID_STRING);
}
if (!defined('Y_USERPASSWORD_INVALID')) {
    define('Y_USERPASSWORD_INVALID', YAPI_INVALID_STRING);
}
if (!defined('Y_ADMINPASSWORD_INVALID')) {
    define('Y_ADMINPASSWORD_INVALID', YAPI_INVALID_STRING);
}
if (!defined('Y_HTTPPORT_INVALID')) {
    define('Y_HTTPPORT_INVALID', YAPI_INVALID_UINT);
}
if (!defined('Y_HTTPSPORT_INVALID')) {
    define('Y_HTTPSPORT_INVALID', YAPI_INVALID_UINT);
}
if (!defined('Y_DEFAULTPAGE_INVALID')) {
    define('Y_DEFAULTPAGE_INVALID', YAPI_INVALID_STRING);
}
if (!defined('Y_WWWWATCHDOGDELAY_INVALID')) {
    define('Y_WWWWATCHDOGDELAY_INVALID', YAPI_INVALID_UINT);
}
if (!defined('Y_CALLBACKURL_INVALID')) {
    define('Y_CALLBACKURL_INVALID', YAPI_INVALID_STRING);
}
if (!defined('Y_CALLBACKCREDENTIALS_INVALID')) {
    define('Y_CALLBACKCREDENTIALS_INVALID', YAPI_INVALID_STRING);
}
if (!defined('Y_CALLBACKINITIALDELAY_INVALID')) {
    define('Y_CALLBACKINITIALDELAY_INVALID', YAPI_INVALID_UINT);
}
if (!defined('Y_CALLBACKSCHEDULE_INVALID')) {
    define('Y_CALLBACKSCHEDULE_INVALID', YAPI_INVALID_STRING);
}
if (!defined('Y_CALLBACKMINDELAY_INVALID')) {
    define('Y_CALLBACKMINDELAY_INVALID', YAPI_INVALID_UINT);
}
if (!defined('Y_CALLBACKMAXDELAY_INVALID')) {
    define('Y_CALLBACKMAXDELAY_INVALID', YAPI_INVALID_UINT);
}
if (!defined('Y_POECURRENT_INVALID')) {
    define('Y_POECURRENT_INVALID', YAPI_INVALID_UINT);
}
//--- (end of YNetwork definitions)
    #--- (YNetwork yapiwrapper)

   #--- (end of YNetwork yapiwrapper)

//--- (YNetwork declaration)
//vvvv YNetwork.php

/**
 * YNetwork Class: network interface control interface, available for instance in the
 * YoctoHub-Ethernet, the YoctoHub-GSM-4G, the YoctoHub-Wireless-SR or the YoctoHub-Wireless-n
 *
 * YNetwork objects provide access to TCP/IP parameters of Yoctopuce
 * devices that include a built-in network interface.
 */
class YNetwork extends YFunction
{
    const READINESS_DOWN = 0;
    const READINESS_EXISTS = 1;
    const READINESS_LINKED = 2;
    const READINESS_LAN_OK = 3;
    const READINESS_WWW_OK = 4;
    const READINESS_INVALID = -1;
    const MACADDRESS_INVALID = YAPI::INVALID_STRING;
    const IPADDRESS_INVALID = YAPI::INVALID_STRING;
    const SUBNETMASK_INVALID = YAPI::INVALID_STRING;
    const ROUTER_INVALID = YAPI::INVALID_STRING;
    const CURRENTDNS_INVALID = YAPI::INVALID_STRING;
    const IPCONFIG_INVALID = YAPI::INVALID_STRING;
    const PRIMARYDNS_INVALID = YAPI::INVALID_STRING;
    const SECONDARYDNS_INVALID = YAPI::INVALID_STRING;
    const NTPSERVER_INVALID = YAPI::INVALID_STRING;
    const USERPASSWORD_INVALID = YAPI::INVALID_STRING;
    const ADMINPASSWORD_INVALID = YAPI::INVALID_STRING;
    const HTTPPORT_INVALID = YAPI::INVALID_UINT;
    const HTTPSPORT_INVALID = YAPI::INVALID_UINT;
    const SECURITYMODE_UNDEFINED = 0;
    const SECURITYMODE_LEGACY = 1;
    const SECURITYMODE_MIXED = 2;
    const SECURITYMODE_SECURE = 3;
    const SECURITYMODE_INVALID = -1;
    const DEFAULTPAGE_INVALID = YAPI::INVALID_STRING;
    const DISCOVERABLE_FALSE = 0;
    const DISCOVERABLE_TRUE = 1;
    const DISCOVERABLE_INVALID = -1;
    const WWWWATCHDOGDELAY_INVALID = YAPI::INVALID_UINT;
    const CALLBACKURL_INVALID = YAPI::INVALID_STRING;
    const CALLBACKMETHOD_POST = 0;
    const CALLBACKMETHOD_GET = 1;
    const CALLBACKMETHOD_PUT = 2;
    const CALLBACKMETHOD_INVALID = -1;
    const CALLBACKENCODING_FORM = 0;
    const CALLBACKENCODING_JSON = 1;
    const CALLBACKENCODING_JSON_ARRAY = 2;
    const CALLBACKENCODING_CSV = 3;
    const CALLBACKENCODING_YOCTO_API = 4;
    const CALLBACKENCODING_JSON_NUM = 5;
    const CALLBACKENCODING_EMONCMS = 6;
    const CALLBACKENCODING_AZURE = 7;
    const CALLBACKENCODING_INFLUXDB = 8;
    const CALLBACKENCODING_MQTT = 9;
    const CALLBACKENCODING_YOCTO_API_JZON = 10;
    const CALLBACKENCODING_PRTG = 11;
    const CALLBACKENCODING_INFLUXDB_V2 = 12;
    const CALLBACKENCODING_INVALID = -1;
    const CALLBACKTEMPLATE_OFF = 0;
    const CALLBACKTEMPLATE_ON = 1;
    const CALLBACKTEMPLATE_INVALID = -1;
    const CALLBACKCREDENTIALS_INVALID = YAPI::INVALID_STRING;
    const CALLBACKINITIALDELAY_INVALID = YAPI::INVALID_UINT;
    const CALLBACKSCHEDULE_INVALID = YAPI::INVALID_STRING;
    const CALLBACKMINDELAY_INVALID = YAPI::INVALID_UINT;
    const CALLBACKMAXDELAY_INVALID = YAPI::INVALID_UINT;
    const POECURRENT_INVALID = YAPI::INVALID_UINT;
    //--- (end of YNetwork declaration)

    //--- (YNetwork attributes)
    protected int $_readiness = self::READINESS_INVALID;      // Readiness
    protected string $_macAddress = self::MACADDRESS_INVALID;     // MACAddress
    protected string $_ipAddress = self::IPADDRESS_INVALID;      // IPAddress
    protected string $_subnetMask = self::SUBNETMASK_INVALID;     // IPAddress
    protected string $_router = self::ROUTER_INVALID;         // IPAddress
    protected string $_currentDNS = self::CURRENTDNS_INVALID;     // IPAddress
    protected string $_ipConfig = self::IPCONFIG_INVALID;       // IPConfig
    protected string $_primaryDNS = self::PRIMARYDNS_INVALID;     // IPAddress
    protected string $_secondaryDNS = self::SECONDARYDNS_INVALID;   // IPAddress
    protected string $_ntpServer = self::NTPSERVER_INVALID;      // IPAddress
    protected string $_userPassword = self::USERPASSWORD_INVALID;   // UserPassword
    protected string $_adminPassword = self::ADMINPASSWORD_INVALID;  // AdminPassword
    protected int $_httpPort = self::HTTPPORT_INVALID;       // UInt31
    protected int $_httpsPort = self::HTTPSPORT_INVALID;      // UInt31
    protected int $_securityMode = self::SECURITYMODE_INVALID;   // SecurityMode
    protected string $_defaultPage = self::DEFAULTPAGE_INVALID;    // Text
    protected int $_discoverable = self::DISCOVERABLE_INVALID;   // Bool
    protected int $_wwwWatchdogDelay = self::WWWWATCHDOGDELAY_INVALID; // UInt31
    protected string $_callbackUrl = self::CALLBACKURL_INVALID;    // Text
    protected int $_callbackMethod = self::CALLBACKMETHOD_INVALID; // HTTPMethod
    protected int $_callbackEncoding = self::CALLBACKENCODING_INVALID; // CallbackEncoding
    protected int $_callbackTemplate = self::CALLBACKTEMPLATE_INVALID; // OnOff
    protected string $_callbackCredentials = self::CALLBACKCREDENTIALS_INVALID; // Credentials
    protected int $_callbackInitialDelay = self::CALLBACKINITIALDELAY_INVALID; // UInt31
    protected string $_callbackSchedule = self::CALLBACKSCHEDULE_INVALID; // CallbackSchedule
    protected int $_callbackMinDelay = self::CALLBACKMINDELAY_INVALID; // UInt31
    protected int $_callbackMaxDelay = self::CALLBACKMAXDELAY_INVALID; // UInt31
    protected int $_poeCurrent = self::POECURRENT_INVALID;     // UsedCurrent

    //--- (end of YNetwork attributes)

    function __construct(string $str_func)
    {
        //--- (YNetwork constructor)
        parent::__construct($str_func);
        $this->_className = 'Network';

        //--- (end of YNetwork constructor)
    }

    //--- (YNetwork implementation)

    function _parseAttr(string $name, mixed $val): int
    {
        switch ($name) {
        case 'readiness':
            $this->_readiness = intval($val);
            return 1;
        case 'macAddress':
            $this->_macAddress = $val;
            return 1;
        case 'ipAddress':
            $this->_ipAddress = $val;
            return 1;
        case 'subnetMask':
            $this->_subnetMask = $val;
            return 1;
        case 'router':
            $this->_router = $val;
            return 1;
        case 'currentDNS':
            $this->_currentDNS = $val;
            return 1;
        case 'ipConfig':
            $this->_ipConfig = $val;
            return 1;
        case 'primaryDNS':
            $this->_primaryDNS = $val;
            return 1;
        case 'secondaryDNS':
            $this->_secondaryDNS = $val;
            return 1;
        case 'ntpServer':
            $this->_ntpServer = $val;
            return 1;
        case 'userPassword':
            $this->_userPassword = $val;
            return 1;
        case 'adminPassword':
            $this->_adminPassword = $val;
            return 1;
        case 'httpPort':
            $this->_httpPort = intval($val);
            return 1;
        case 'httpsPort':
            $this->_httpsPort = intval($val);
            return 1;
        case 'securityMode':
            $this->_securityMode = intval($val);
            return 1;
        case 'defaultPage':
            $this->_defaultPage = $val;
            return 1;
        case 'discoverable':
            $this->_discoverable = intval($val);
            return 1;
        case 'wwwWatchdogDelay':
            $this->_wwwWatchdogDelay = intval($val);
            return 1;
        case 'callbackUrl':
            $this->_callbackUrl = $val;
            return 1;
        case 'callbackMethod':
            $this->_callbackMethod = intval($val);
            return 1;
        case 'callbackEncoding':
            $this->_callbackEncoding = intval($val);
            return 1;
        case 'callbackTemplate':
            $this->_callbackTemplate = intval($val);
            return 1;
        case 'callbackCredentials':
            $this->_callbackCredentials = $val;
            return 1;
        case 'callbackInitialDelay':
            $this->_callbackInitialDelay = intval($val);
            return 1;
        case 'callbackSchedule':
            $this->_callbackSchedule = $val;
            return 1;
        case 'callbackMinDelay':
            $this->_callbackMinDelay = intval($val);
            return 1;
        case 'callbackMaxDelay':
            $this->_callbackMaxDelay = intval($val);
            return 1;
        case 'poeCurrent':
            $this->_poeCurrent = intval($val);
            return 1;
        }
        return parent::_parseAttr($name, $val);
    }

    /**
     * Returns the current established working mode of the network interface.
     * Level zero (DOWN_0) means that no hardware link has been detected. Either there is no signal
     * on the network cable, or the selected wireless access point cannot be detected.
     * Level 1 (LIVE_1) is reached when the network is detected, but is not yet connected.
     * For a wireless network, this shows that the requested SSID is present.
     * Level 2 (LINK_2) is reached when the hardware connection is established.
     * For a wired network connection, level 2 means that the cable is attached at both ends.
     * For a connection to a wireless access point, it shows that the security parameters
     * are properly configured. For an ad-hoc wireless connection, it means that there is
     * at least one other device connected on the ad-hoc network.
     * Level 3 (DHCP_3) is reached when an IP address has been obtained using DHCP.
     * Level 4 (DNS_4) is reached when the DNS server is reachable on the network.
     * Level 5 (WWW_5) is reached when global connectivity is demonstrated by properly loading the
     * current time from an NTP server.
     *
     * @return int  a value among YNetwork::READINESS_DOWN, YNetwork::READINESS_EXISTS,
     * YNetwork::READINESS_LINKED, YNetwork::READINESS_LAN_OK and YNetwork::READINESS_WWW_OK corresponding to
     * the current established working mode of the network interface
     *
     * On failure, throws an exception or returns YNetwork::READINESS_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_readiness(): int
    {
        // $res                    is a enumREADINESS;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::READINESS_INVALID;
            }
        }
        $res = $this->_readiness;
        return $res;
    }

    /**
     * Returns the MAC address of the network interface. The MAC address is also available on a sticker
     * on the module, in both numeric and barcode forms.
     *
     * @return string  a string corresponding to the MAC address of the network interface
     *
     * On failure, throws an exception or returns YNetwork::MACADDRESS_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_macAddress(): string
    {
        // $res                    is a string;
        if ($this->_cacheExpiration == 0) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::MACADDRESS_INVALID;
            }
        }
        $res = $this->_macAddress;
        return $res;
    }

    /**
     * Returns the IP address currently in use by the device. The address may have been configured
     * statically, or provided by a DHCP server.
     *
     * @return string  a string corresponding to the IP address currently in use by the device
     *
     * On failure, throws an exception or returns YNetwork::IPADDRESS_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_ipAddress(): string
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::IPADDRESS_INVALID;
            }
        }
        $res = $this->_ipAddress;
        return $res;
    }

    /**
     * Returns the subnet mask currently used by the device.
     *
     * @return string  a string corresponding to the subnet mask currently used by the device
     *
     * On failure, throws an exception or returns YNetwork::SUBNETMASK_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_subnetMask(): string
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::SUBNETMASK_INVALID;
            }
        }
        $res = $this->_subnetMask;
        return $res;
    }

    /**
     * Returns the IP address of the router on the device subnet (default gateway).
     *
     * @return string  a string corresponding to the IP address of the router on the device subnet (default gateway)
     *
     * On failure, throws an exception or returns YNetwork::ROUTER_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_router(): string
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::ROUTER_INVALID;
            }
        }
        $res = $this->_router;
        return $res;
    }

    /**
     * Returns the IP address of the DNS server currently used by the device.
     *
     * @return string  a string corresponding to the IP address of the DNS server currently used by the device
     *
     * On failure, throws an exception or returns YNetwork::CURRENTDNS_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_currentDNS(): string
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::CURRENTDNS_INVALID;
            }
        }
        $res = $this->_currentDNS;
        return $res;
    }

    /**
     * Returns the IP configuration of the network interface.
     *
     * If the network interface is set up to use a static IP address, the string starts with "STATIC:" and
     * is followed by three
     * parameters, separated by "/". The first is the device IP address, followed by the subnet mask
     * length, and finally the
     * router IP address (default gateway). For instance: "STATIC:192.168.1.14/16/192.168.1.1"
     *
     * If the network interface is configured to receive its IP from a DHCP server, the string start with
     * "DHCP:" and is followed by
     * three parameters separated by "/". The first is the fallback IP address, then the fallback subnet
     * mask length and finally the
     * fallback router IP address. These three parameters are used when no DHCP reply is received.
     *
     * @return string  a string corresponding to the IP configuration of the network interface
     *
     * On failure, throws an exception or returns YNetwork::IPCONFIG_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_ipConfig(): string
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::IPCONFIG_INVALID;
            }
        }
        $res = $this->_ipConfig;
        return $res;
    }

    /**
     * @throws YAPI_Exception
     */
    public function set_ipConfig(string $newval): int
    {
        $rest_val = $newval;
        return $this->_setAttr("ipConfig", $rest_val);
    }

    /**
     * Returns the IP address of the primary name server to be used by the module.
     *
     * @return string  a string corresponding to the IP address of the primary name server to be used by the module
     *
     * On failure, throws an exception or returns YNetwork::PRIMARYDNS_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_primaryDNS(): string
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::PRIMARYDNS_INVALID;
            }
        }
        $res = $this->_primaryDNS;
        return $res;
    }

    /**
     * Changes the IP address of the primary name server to be used by the module.
     * When using DHCP, if a value is specified, it overrides the value received from the DHCP server.
     * Remember to call the saveToFlash() method and then to reboot the module to apply this setting.
     *
     * @param string $newval : a string corresponding to the IP address of the primary name server to be
     * used by the module
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function set_primaryDNS(string $newval): int
    {
        $rest_val = $newval;
        return $this->_setAttr("primaryDNS", $rest_val);
    }

    /**
     * Returns the IP address of the secondary name server to be used by the module.
     *
     * @return string  a string corresponding to the IP address of the secondary name server to be used by the module
     *
     * On failure, throws an exception or returns YNetwork::SECONDARYDNS_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_secondaryDNS(): string
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::SECONDARYDNS_INVALID;
            }
        }
        $res = $this->_secondaryDNS;
        return $res;
    }

    /**
     * Changes the IP address of the secondary name server to be used by the module.
     * When using DHCP, if a value is specified, it overrides the value received from the DHCP server.
     * Remember to call the saveToFlash() method and then to reboot the module to apply this setting.
     *
     * @param string $newval : a string corresponding to the IP address of the secondary name server to be
     * used by the module
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function set_secondaryDNS(string $newval): int
    {
        $rest_val = $newval;
        return $this->_setAttr("secondaryDNS", $rest_val);
    }

    /**
     * Returns the IP address of the NTP server to be used by the device.
     *
     * @return string  a string corresponding to the IP address of the NTP server to be used by the device
     *
     * On failure, throws an exception or returns YNetwork::NTPSERVER_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_ntpServer(): string
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::NTPSERVER_INVALID;
            }
        }
        $res = $this->_ntpServer;
        return $res;
    }

    /**
     * Changes the IP address of the NTP server to be used by the module. Use an empty
     * string to restore the factory set  address.
     * Remember to call the saveToFlash() method and then to reboot the module to apply this setting.
     *
     * @param string $newval : a string corresponding to the IP address of the NTP server to be used by the module
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function set_ntpServer(string $newval): int
    {
        $rest_val = $newval;
        return $this->_setAttr("ntpServer", $rest_val);
    }

    /**
     * Returns a hash string if a password has been set for "user" user,
     * or an empty string otherwise.
     *
     * @return string  a string corresponding to a hash string if a password has been set for "user" user,
     *         or an empty string otherwise
     *
     * On failure, throws an exception or returns YNetwork::USERPASSWORD_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_userPassword(): string
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::USERPASSWORD_INVALID;
            }
        }
        $res = $this->_userPassword;
        return $res;
    }

    /**
     * Changes the password for the "user" user. This password becomes instantly required
     * to perform any use of the module. If the specified value is an
     * empty string, a password is not required anymore.
     * Remember to call the saveToFlash() method of the module if the
     * modification must be kept.
     *
     * @param string $newval : a string corresponding to the password for the "user" user
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function set_userPassword(string $newval): int
    {
        if (!$this->_is_valid_pass($newval)) {
            return YAPI::INVALID_ARGUMENT;
        }
        $rest_val = $newval;
        return $this->_setAttr("userPassword", $rest_val);
    }

    /**
     * Returns a hash string if a password has been set for user "admin",
     * or an empty string otherwise.
     *
     * @return string  a string corresponding to a hash string if a password has been set for user "admin",
     *         or an empty string otherwise
     *
     * On failure, throws an exception or returns YNetwork::ADMINPASSWORD_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_adminPassword(): string
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::ADMINPASSWORD_INVALID;
            }
        }
        $res = $this->_adminPassword;
        return $res;
    }

    /**
     * Changes the password for the "admin" user. This password becomes instantly required
     * to perform any change of the module state. If the specified value is an
     * empty string, a password is not required anymore.
     * Remember to call the saveToFlash() method of the module if the
     * modification must be kept.
     *
     * @param string $newval : a string corresponding to the password for the "admin" user
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function set_adminPassword(string $newval): int
    {
        if (!$this->_is_valid_pass($newval)) {
            return YAPI::INVALID_ARGUMENT;
        }
        $rest_val = $newval;
        return $this->_setAttr("adminPassword", $rest_val);
    }

    /**
     * Returns the TCP port used to serve the hub web UI.
     *
     * @return int  an integer corresponding to the TCP port used to serve the hub web UI
     *
     * On failure, throws an exception or returns YNetwork::HTTPPORT_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_httpPort(): int
    {
        // $res                    is a int;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::HTTPPORT_INVALID;
            }
        }
        $res = $this->_httpPort;
        return $res;
    }

    /**
     * Changes the the TCP port used to serve the hub web UI. The default value is port 80,
     * which is the default for all Web servers. Regardless of the value set here,
     * the hub will always reply on port 4444, which is used by default by Yoctopuce
     * API library. When you change this parameter, remember to call the saveToFlash()
     * method of the module if the modification must be kept.
     *
     * @param int $newval : an integer corresponding to the the TCP port used to serve the hub web UI
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function set_httpPort(int $newval): int
    {
        $rest_val = strval($newval);
        return $this->_setAttr("httpPort", $rest_val);
    }

    /**
     * Returns the secure TCP port used to serve the hub web UI.
     *
     * @return int  an integer corresponding to the secure TCP port used to serve the hub web UI
     *
     * On failure, throws an exception or returns YNetwork::HTTPSPORT_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_httpsPort(): int
    {
        // $res                    is a int;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::HTTPSPORT_INVALID;
            }
        }
        $res = $this->_httpsPort;
        return $res;
    }

    /**
     * Changes the secure TCP port used to serve the hub web UI. The default value is port 4443,
     * which is the default for all Web servers. When you change this parameter, remember to call the saveToFlash()
     * method of the module if the modification must be kept.
     *
     * @param int $newval : an integer corresponding to the secure TCP port used to serve the hub web UI
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function set_httpsPort(int $newval): int
    {
        $rest_val = strval($newval);
        return $this->_setAttr("httpsPort", $rest_val);
    }

    /**
     * Returns the security level chosen to prevent unauthorized access to the server.
     *
     * @return int  a value among YNetwork::SECURITYMODE_UNDEFINED, YNetwork::SECURITYMODE_LEGACY,
     * YNetwork::SECURITYMODE_MIXED and YNetwork::SECURITYMODE_SECURE corresponding to the security level
     * chosen to prevent unauthorized access to the server
     *
     * On failure, throws an exception or returns YNetwork::SECURITYMODE_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_securityMode(): int
    {
        // $res                    is a enumSECURITYMODE;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::SECURITYMODE_INVALID;
            }
        }
        $res = $this->_securityMode;
        return $res;
    }

    /**
     * Changes the security level used to prevent unauthorized access to the server.
     * The value UNDEFINED causes the security configuration wizard to be
     * displayed the next time you log on to the Web console.
     * The value LEGACY offers unencrypted HTTP access by default, and
     * is designed to provide compatibility with legacy applications that do not
     * handle password or do not support HTTPS. But it should
     * only be used when system security is guaranteed by other means, such as the
     * use of a firewall.
     * The value MIXED requires the configuration of passwords, and allows
     * access via both HTTP (unencrypted) and HTTPS (encrypted), while requiring
     * the Yoctopuce API to be tolerant of certificate characteristics.
     * The value SECURE requires the configuration of passwords and the
     * use of secure communications in all cases.
     * When you change this parameter, remember to call the saveToFlash()
     * method of the module if the modification must be kept.
     *
     * @param int $newval : a value among YNetwork::SECURITYMODE_UNDEFINED, YNetwork::SECURITYMODE_LEGACY,
     * YNetwork::SECURITYMODE_MIXED and YNetwork::SECURITYMODE_SECURE corresponding to the security level
     * used to prevent unauthorized access to the server
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function set_securityMode(int $newval): int
    {
        $rest_val = strval($newval);
        return $this->_setAttr("securityMode", $rest_val);
    }

    /**
     * Returns the HTML page to serve for the URL "/"" of the hub.
     *
     * @return string  a string corresponding to the HTML page to serve for the URL "/"" of the hub
     *
     * On failure, throws an exception or returns YNetwork::DEFAULTPAGE_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_defaultPage(): string
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::DEFAULTPAGE_INVALID;
            }
        }
        $res = $this->_defaultPage;
        return $res;
    }

    /**
     * Changes the default HTML page returned by the hub. If not value are set the hub return
     * "index.html" which is the web interface of the hub. It is possible to change this page
     * for file that has been uploaded on the hub. The maximum filename size is 15 characters.
     * When you change this parameter, remember to call the saveToFlash()
     * method of the module if the modification must be kept.
     *
     * @param string $newval : a string corresponding to the default HTML page returned by the hub
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function set_defaultPage(string $newval): int
    {
        $rest_val = $newval;
        return $this->_setAttr("defaultPage", $rest_val);
    }

    /**
     * Returns the activation state of the multicast announce protocols to allow easy
     * discovery of the module in the network neighborhood (uPnP/Bonjour protocol).
     *
     * @return int  either YNetwork::DISCOVERABLE_FALSE or YNetwork::DISCOVERABLE_TRUE, according to the
     * activation state of the multicast announce protocols to allow easy
     *         discovery of the module in the network neighborhood (uPnP/Bonjour protocol)
     *
     * On failure, throws an exception or returns YNetwork::DISCOVERABLE_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_discoverable(): int
    {
        // $res                    is a enumBOOL;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::DISCOVERABLE_INVALID;
            }
        }
        $res = $this->_discoverable;
        return $res;
    }

    /**
     * Changes the activation state of the multicast announce protocols to allow easy
     * discovery of the module in the network neighborhood (uPnP/Bonjour protocol).
     * Remember to call the saveToFlash()
     * method of the module if the modification must be kept.
     *
     * @param int $newval : either YNetwork::DISCOVERABLE_FALSE or YNetwork::DISCOVERABLE_TRUE, according to
     * the activation state of the multicast announce protocols to allow easy
     *         discovery of the module in the network neighborhood (uPnP/Bonjour protocol)
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function set_discoverable(int $newval): int
    {
        $rest_val = strval($newval);
        return $this->_setAttr("discoverable", $rest_val);
    }

    /**
     * Returns the allowed downtime of the WWW link (in seconds) before triggering an automated
     * reboot to try to recover Internet connectivity. A zero value disables automated reboot
     * in case of Internet connectivity loss.
     *
     * @return int  an integer corresponding to the allowed downtime of the WWW link (in seconds) before
     * triggering an automated
     *         reboot to try to recover Internet connectivity
     *
     * On failure, throws an exception or returns YNetwork::WWWWATCHDOGDELAY_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_wwwWatchdogDelay(): int
    {
        // $res                    is a int;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::WWWWATCHDOGDELAY_INVALID;
            }
        }
        $res = $this->_wwwWatchdogDelay;
        return $res;
    }

    /**
     * Changes the allowed downtime of the WWW link (in seconds) before triggering an automated
     * reboot to try to recover Internet connectivity. A zero value disables automated reboot
     * in case of Internet connectivity loss. The smallest valid non-zero timeout is
     * 90 seconds. Remember to call the saveToFlash()
     * method of the module if the modification must be kept.
     *
     * @param int $newval : an integer corresponding to the allowed downtime of the WWW link (in seconds)
     * before triggering an automated
     *         reboot to try to recover Internet connectivity
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function set_wwwWatchdogDelay(int $newval): int
    {
        $rest_val = strval($newval);
        return $this->_setAttr("wwwWatchdogDelay", $rest_val);
    }

    /**
     * Returns the callback URL to notify of significant state changes.
     *
     * @return string  a string corresponding to the callback URL to notify of significant state changes
     *
     * On failure, throws an exception or returns YNetwork::CALLBACKURL_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_callbackUrl(): string
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::CALLBACKURL_INVALID;
            }
        }
        $res = $this->_callbackUrl;
        return $res;
    }

    /**
     * Changes the callback URL to notify significant state changes. Remember to call the
     * saveToFlash() method of the module if the modification must be kept.
     *
     * @param string $newval : a string corresponding to the callback URL to notify significant state changes
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function set_callbackUrl(string $newval): int
    {
        $rest_val = $newval;
        return $this->_setAttr("callbackUrl", $rest_val);
    }

    /**
     * Returns the HTTP method used to notify callbacks for significant state changes.
     *
     * @return int  a value among YNetwork::CALLBACKMETHOD_POST, YNetwork::CALLBACKMETHOD_GET and
     * YNetwork::CALLBACKMETHOD_PUT corresponding to the HTTP method used to notify callbacks for
     * significant state changes
     *
     * On failure, throws an exception or returns YNetwork::CALLBACKMETHOD_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_callbackMethod(): int
    {
        // $res                    is a enumHTTPMETHOD;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::CALLBACKMETHOD_INVALID;
            }
        }
        $res = $this->_callbackMethod;
        return $res;
    }

    /**
     * Changes the HTTP method used to notify callbacks for significant state changes.
     * Remember to call the saveToFlash() method of the module if the
     * modification must be kept.
     *
     * @param int $newval : a value among YNetwork::CALLBACKMETHOD_POST, YNetwork::CALLBACKMETHOD_GET and
     * YNetwork::CALLBACKMETHOD_PUT corresponding to the HTTP method used to notify callbacks for
     * significant state changes
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function set_callbackMethod(int $newval): int
    {
        $rest_val = strval($newval);
        return $this->_setAttr("callbackMethod", $rest_val);
    }

    /**
     * Returns the encoding standard to use for representing notification values.
     *
     * @return int  a value among YNetwork::CALLBACKENCODING_FORM, YNetwork::CALLBACKENCODING_JSON,
     * YNetwork::CALLBACKENCODING_JSON_ARRAY, YNetwork::CALLBACKENCODING_CSV,
     * YNetwork::CALLBACKENCODING_YOCTO_API, YNetwork::CALLBACKENCODING_JSON_NUM,
     * YNetwork::CALLBACKENCODING_EMONCMS, YNetwork::CALLBACKENCODING_AZURE,
     * YNetwork::CALLBACKENCODING_INFLUXDB, YNetwork::CALLBACKENCODING_MQTT,
     * YNetwork::CALLBACKENCODING_YOCTO_API_JZON, YNetwork::CALLBACKENCODING_PRTG and
     * YNetwork::CALLBACKENCODING_INFLUXDB_V2 corresponding to the encoding standard to use for
     * representing notification values
     *
     * On failure, throws an exception or returns YNetwork::CALLBACKENCODING_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_callbackEncoding(): int
    {
        // $res                    is a enumCALLBACKENCODING;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::CALLBACKENCODING_INVALID;
            }
        }
        $res = $this->_callbackEncoding;
        return $res;
    }

    /**
     * Changes the encoding standard to use for representing notification values.
     * Remember to call the saveToFlash() method of the module if the
     * modification must be kept.
     *
     * @param int $newval : a value among YNetwork::CALLBACKENCODING_FORM, YNetwork::CALLBACKENCODING_JSON,
     * YNetwork::CALLBACKENCODING_JSON_ARRAY, YNetwork::CALLBACKENCODING_CSV,
     * YNetwork::CALLBACKENCODING_YOCTO_API, YNetwork::CALLBACKENCODING_JSON_NUM,
     * YNetwork::CALLBACKENCODING_EMONCMS, YNetwork::CALLBACKENCODING_AZURE,
     * YNetwork::CALLBACKENCODING_INFLUXDB, YNetwork::CALLBACKENCODING_MQTT,
     * YNetwork::CALLBACKENCODING_YOCTO_API_JZON, YNetwork::CALLBACKENCODING_PRTG and
     * YNetwork::CALLBACKENCODING_INFLUXDB_V2 corresponding to the encoding standard to use for
     * representing notification values
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function set_callbackEncoding(int $newval): int
    {
        $rest_val = strval($newval);
        return $this->_setAttr("callbackEncoding", $rest_val);
    }

    /**
     * Returns the activation state of the custom template file to customize callback
     * format. If the custom callback template is disabled, it will be ignored even
     * if present on the YoctoHub.
     *
     * @return int  either YNetwork::CALLBACKTEMPLATE_OFF or YNetwork::CALLBACKTEMPLATE_ON, according to the
     * activation state of the custom template file to customize callback
     *         format
     *
     * On failure, throws an exception or returns YNetwork::CALLBACKTEMPLATE_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_callbackTemplate(): int
    {
        // $res                    is a enumONOFF;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::CALLBACKTEMPLATE_INVALID;
            }
        }
        $res = $this->_callbackTemplate;
        return $res;
    }

    /**
     * Enable the use of a template file to customize callbacks format.
     * When the custom callback template file is enabled, the template file
     * will be loaded for each callback in order to build the data to post to the
     * server. If template file does not exist on the YoctoHub, the callback will
     * fail with an error message indicating the name of the expected template file.
     * Remember to call the saveToFlash() method of the module if the
     * modification must be kept.
     *
     * @param int $newval : either YNetwork::CALLBACKTEMPLATE_OFF or YNetwork::CALLBACKTEMPLATE_ON
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function set_callbackTemplate(int $newval): int
    {
        $rest_val = strval($newval);
        return $this->_setAttr("callbackTemplate", $rest_val);
    }

    /**
     * Returns a hashed version of the notification callback credentials if set,
     * or an empty string otherwise.
     *
     * @return string  a string corresponding to a hashed version of the notification callback credentials if set,
     *         or an empty string otherwise
     *
     * On failure, throws an exception or returns YNetwork::CALLBACKCREDENTIALS_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_callbackCredentials(): string
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::CALLBACKCREDENTIALS_INVALID;
            }
        }
        $res = $this->_callbackCredentials;
        return $res;
    }

    /**
     * Changes the credentials required to connect to the callback address. The credentials
     * must be provided as returned by function get_callbackCredentials,
     * in the form username:hash. The method used to compute the hash varies according
     * to the the authentication scheme implemented by the callback, For Basic authentication,
     * the hash is the MD5 of the string username:password. For Digest authentication,
     * the hash is the MD5 of the string username:realm:password. For a simpler
     * way to configure callback credentials, use function callbackLogin instead.
     * Remember to call the saveToFlash() method of the module if the
     * modification must be kept.
     *
     * @param string $newval : a string corresponding to the credentials required to connect to the callback address
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function set_callbackCredentials(string $newval): int
    {
        $rest_val = $newval;
        return $this->_setAttr("callbackCredentials", $rest_val);
    }

    /**
     * Connects to the notification callback and saves the credentials required to
     * log into it. The password is not stored into the module, only a hashed
     * copy of the credentials are saved. Remember to call the
     * saveToFlash() method of the module if the modification must be kept.
     *
     * @param string $username : username required to log to the callback
     * @param string $password : password required to log to the callback
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function callbackLogin(string $username,string $password): int
    {
        $rest_val = sprintf("%s:%s", $username, $password);
        return $this->_setAttr("callbackCredentials",$rest_val);
    }

    /**
     * Returns the initial waiting time before first callback notifications, in seconds.
     *
     * @return int  an integer corresponding to the initial waiting time before first callback
     * notifications, in seconds
     *
     * On failure, throws an exception or returns YNetwork::CALLBACKINITIALDELAY_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_callbackInitialDelay(): int
    {
        // $res                    is a int;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::CALLBACKINITIALDELAY_INVALID;
            }
        }
        $res = $this->_callbackInitialDelay;
        return $res;
    }

    /**
     * Changes the initial waiting time before first callback notifications, in seconds.
     * Remember to call the saveToFlash() method of the module if the modification must be kept.
     *
     * @param int $newval : an integer corresponding to the initial waiting time before first callback
     * notifications, in seconds
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function set_callbackInitialDelay(int $newval): int
    {
        $rest_val = strval($newval);
        return $this->_setAttr("callbackInitialDelay", $rest_val);
    }

    /**
     * Returns the HTTP callback schedule strategy, as a text string.
     *
     * @return string  a string corresponding to the HTTP callback schedule strategy, as a text string
     *
     * On failure, throws an exception or returns YNetwork::CALLBACKSCHEDULE_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_callbackSchedule(): string
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::CALLBACKSCHEDULE_INVALID;
            }
        }
        $res = $this->_callbackSchedule;
        return $res;
    }

    /**
     * Changes the HTTP callback schedule strategy, as a text string.
     * Remember to call the saveToFlash()
     * method of the module if the modification must be kept.
     *
     * @param string $newval : a string corresponding to the HTTP callback schedule strategy, as a text string
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function set_callbackSchedule(string $newval): int
    {
        $rest_val = $newval;
        return $this->_setAttr("callbackSchedule", $rest_val);
    }

    /**
     * Returns the minimum waiting time between two HTTP callbacks, in seconds.
     *
     * @return int  an integer corresponding to the minimum waiting time between two HTTP callbacks, in seconds
     *
     * On failure, throws an exception or returns YNetwork::CALLBACKMINDELAY_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_callbackMinDelay(): int
    {
        // $res                    is a int;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::CALLBACKMINDELAY_INVALID;
            }
        }
        $res = $this->_callbackMinDelay;
        return $res;
    }

    /**
     * Changes the minimum waiting time between two HTTP callbacks, in seconds.
     * Remember to call the saveToFlash() method of the module if the modification must be kept.
     *
     * @param int $newval : an integer corresponding to the minimum waiting time between two HTTP callbacks, in seconds
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function set_callbackMinDelay(int $newval): int
    {
        $rest_val = strval($newval);
        return $this->_setAttr("callbackMinDelay", $rest_val);
    }

    /**
     * Returns the waiting time between two HTTP callbacks when there is nothing new.
     *
     * @return int  an integer corresponding to the waiting time between two HTTP callbacks when there is nothing new
     *
     * On failure, throws an exception or returns YNetwork::CALLBACKMAXDELAY_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_callbackMaxDelay(): int
    {
        // $res                    is a int;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::CALLBACKMAXDELAY_INVALID;
            }
        }
        $res = $this->_callbackMaxDelay;
        return $res;
    }

    /**
     * Changes the waiting time between two HTTP callbacks when there is nothing new.
     * Remember to call the saveToFlash() method of the module if the modification must be kept.
     *
     * @param int $newval : an integer corresponding to the waiting time between two HTTP callbacks when
     * there is nothing new
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function set_callbackMaxDelay(int $newval): int
    {
        $rest_val = strval($newval);
        return $this->_setAttr("callbackMaxDelay", $rest_val);
    }

    /**
     * Returns the current consumed by the module from Power-over-Ethernet (PoE), in milliamps.
     * The current consumption is measured after converting PoE source to 5 Volt, and should
     * never exceed 1800 mA.
     *
     * @return int  an integer corresponding to the current consumed by the module from
     * Power-over-Ethernet (PoE), in milliamps
     *
     * On failure, throws an exception or returns YNetwork::POECURRENT_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_poeCurrent(): int
    {
        // $res                    is a int;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::POECURRENT_INVALID;
            }
        }
        $res = $this->_poeCurrent;
        return $res;
    }

    /**
     * Retrieves a network interface for a given identifier.
     * The identifier can be specified using several formats:
     *
     * - FunctionLogicalName
     * - ModuleSerialNumber.FunctionIdentifier
     * - ModuleSerialNumber.FunctionLogicalName
     * - ModuleLogicalName.FunctionIdentifier
     * - ModuleLogicalName.FunctionLogicalName
     *
     *
     * This function does not require that the network interface is online at the time
     * it is invoked. The returned object is nevertheless valid.
     * Use the method isOnline() to test if the network interface is
     * indeed online at a given time. In case of ambiguity when looking for
     * a network interface by logical name, no error is notified: the first instance
     * found is returned. The search is performed first by hardware name,
     * then by logical name.
     *
     * If a call to this object's is_online() method returns FALSE although
     * you are certain that the matching device is plugged, make sure that you did
     * call registerHub() at application initialization time.
     *
     * @param string $func : a string that uniquely characterizes the network interface, for instance
     *         YHUBETH1.network.
     *
     * @return YNetwork  a YNetwork object allowing you to drive the network interface.
     */
    public static function FindNetwork(string $func): YNetwork
    {
        // $obj                    is a YNetwork;
        $obj = YFunction::_FindFromCache('Network', $func);
        if ($obj == null) {
            $obj = new YNetwork($func);
            YFunction::_AddToCache('Network', $func, $obj);
        }
        return $obj;
    }

    /**
     * Changes the configuration of the network interface to enable the use of an
     * IP address received from a DHCP server. Until an address is received from a DHCP
     * server, the module uses the IP parameters specified to this function.
     * Remember to call the saveToFlash() method and then to reboot the module to apply this setting.
     *
     * @param string $fallbackIpAddr : fallback IP address, to be used when no DHCP reply is received
     * @param int $fallbackSubnetMaskLen : fallback subnet mask length when no DHCP reply is received, as an
     *         integer (e.g. 24 means 255.255.255.0)
     * @param string $fallbackRouter : fallback router IP address, to be used when no DHCP reply is received
     *
     * @return int  YAPI::SUCCESS when the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function useDHCP(string $fallbackIpAddr, int $fallbackSubnetMaskLen, string $fallbackRouter): int
    {
        return $this->set_ipConfig(sprintf('DHCP:%s/%d/%s', $fallbackIpAddr, $fallbackSubnetMaskLen, $fallbackRouter));
    }

    /**
     * Changes the configuration of the network interface to enable the use of an
     * IP address received from a DHCP server. Until an address is received from a DHCP
     * server, the module uses an IP of the network 169.254.0.0/16 (APIPA).
     * Remember to call the saveToFlash() method and then to reboot the module to apply this setting.
     *
     * @return int  YAPI::SUCCESS when the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function useDHCPauto(): int
    {
        return $this->set_ipConfig('DHCP:');
    }

    /**
     * Changes the configuration of the network interface to use a static IP address.
     * Remember to call the saveToFlash() method and then to reboot the module to apply this setting.
     *
     * @param string $ipAddress : device IP address
     * @param int $subnetMaskLen : subnet mask length, as an integer (e.g. 24 means 255.255.255.0)
     * @param string $router : router IP address (default gateway)
     *
     * @return int  YAPI::SUCCESS when the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function useStaticIP(string $ipAddress, int $subnetMaskLen, string $router): int
    {
        return $this->set_ipConfig(sprintf('STATIC:%s/%d/%s', $ipAddress, $subnetMaskLen, $router));
    }

    /**
     * Pings host to test the network connectivity. Sends four ICMP ECHO_REQUEST requests from the
     * module to the target host. This method returns a string with the result of the
     * 4 ICMP ECHO_REQUEST requests.
     *
     * @param string $host : the hostname or the IP address of the target
     *
     * @return string  a string with the result of the ping.
     */
    public function ping(string $host): string
    {
        // $content                is a bin;

        $content = $this->_download(sprintf('ping.txt?host=%s',$host));
        return YAPI::Ybin2str($content);
    }

    /**
     * Trigger an HTTP callback quickly. This function can even be called within
     * an HTTP callback, in which case the next callback will be triggered 5 seconds
     * after the end of the current callback, regardless if the minimum time between
     * callbacks configured in the device.
     *
     * @return int  YAPI::SUCCESS when the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function triggerCallback(): int
    {
        return $this->set_callbackMethod($this->get_callbackMethod());
    }

    /**
     * Set up periodic HTTP callbacks (simplified function).
     *
     * @param string $interval : a string representing the callback periodicity, expressed in
     *         seconds, minutes or hours, eg. "60s", "5m", "1h", "48h".
     * @param int $offset : an integer representing the time offset relative to the period
     *         when the callback should occur. For instance, if the periodicity is
     *         24h, an offset of 7 will make the callback occur each day at 7AM.
     *
     * @return int  YAPI::SUCCESS when the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function set_periodicCallbackSchedule(string $interval, int $offset): int
    {
        return $this->set_callbackSchedule(sprintf('every %s+%d',$interval,$offset));
    }

    /**
     * @throws YAPI_Exception
     */
    public function readiness(): int
{
    return $this->get_readiness();
}

    /**
     * @throws YAPI_Exception
     */
    public function macAddress(): string
{
    return $this->get_macAddress();
}

    /**
     * @throws YAPI_Exception
     */
    public function ipAddress(): string
{
    return $this->get_ipAddress();
}

    /**
     * @throws YAPI_Exception
     */
    public function subnetMask(): string
{
    return $this->get_subnetMask();
}

    /**
     * @throws YAPI_Exception
     */
    public function router(): string
{
    return $this->get_router();
}

    /**
     * @throws YAPI_Exception
     */
    public function currentDNS(): string
{
    return $this->get_currentDNS();
}

    /**
     * @throws YAPI_Exception
     */
    public function ipConfig(): string
{
    return $this->get_ipConfig();
}

    /**
     * @throws YAPI_Exception
     */
    public function setIpConfig(string $newval): int
{
    return $this->set_ipConfig($newval);
}

    /**
     * @throws YAPI_Exception
     */
    public function primaryDNS(): string
{
    return $this->get_primaryDNS();
}

    /**
     * @throws YAPI_Exception
     */
    public function setPrimaryDNS(string $newval): int
{
    return $this->set_primaryDNS($newval);
}

    /**
     * @throws YAPI_Exception
     */
    public function secondaryDNS(): string
{
    return $this->get_secondaryDNS();
}

    /**
     * @throws YAPI_Exception
     */
    public function setSecondaryDNS(string $newval): int
{
    return $this->set_secondaryDNS($newval);
}

    /**
     * @throws YAPI_Exception
     */
    public function ntpServer(): string
{
    return $this->get_ntpServer();
}

    /**
     * @throws YAPI_Exception
     */
    public function setNtpServer(string $newval): int
{
    return $this->set_ntpServer($newval);
}

    /**
     * @throws YAPI_Exception
     */
    public function userPassword(): string
{
    return $this->get_userPassword();
}

    /**
     * @throws YAPI_Exception
     */
    public function setUserPassword(string $newval): int
{
    return $this->set_userPassword($newval);
}

    /**
     * @throws YAPI_Exception
     */
    public function adminPassword(): string
{
    return $this->get_adminPassword();
}

    /**
     * @throws YAPI_Exception
     */
    public function setAdminPassword(string $newval): int
{
    return $this->set_adminPassword($newval);
}

    /**
     * @throws YAPI_Exception
     */
    public function httpPort(): int
{
    return $this->get_httpPort();
}

    /**
     * @throws YAPI_Exception
     */
    public function setHttpPort(int $newval): int
{
    return $this->set_httpPort($newval);
}

    /**
     * @throws YAPI_Exception
     */
    public function httpsPort(): int
{
    return $this->get_httpsPort();
}

    /**
     * @throws YAPI_Exception
     */
    public function setHttpsPort(int $newval): int
{
    return $this->set_httpsPort($newval);
}

    /**
     * @throws YAPI_Exception
     */
    public function securityMode(): int
{
    return $this->get_securityMode();
}

    /**
     * @throws YAPI_Exception
     */
    public function setSecurityMode(int $newval): int
{
    return $this->set_securityMode($newval);
}

    /**
     * @throws YAPI_Exception
     */
    public function defaultPage(): string
{
    return $this->get_defaultPage();
}

    /**
     * @throws YAPI_Exception
     */
    public function setDefaultPage(string $newval): int
{
    return $this->set_defaultPage($newval);
}

    /**
     * @throws YAPI_Exception
     */
    public function discoverable(): int
{
    return $this->get_discoverable();
}

    /**
     * @throws YAPI_Exception
     */
    public function setDiscoverable(int $newval): int
{
    return $this->set_discoverable($newval);
}

    /**
     * @throws YAPI_Exception
     */
    public function wwwWatchdogDelay(): int
{
    return $this->get_wwwWatchdogDelay();
}

    /**
     * @throws YAPI_Exception
     */
    public function setWwwWatchdogDelay(int $newval): int
{
    return $this->set_wwwWatchdogDelay($newval);
}

    /**
     * @throws YAPI_Exception
     */
    public function callbackUrl(): string
{
    return $this->get_callbackUrl();
}

    /**
     * @throws YAPI_Exception
     */
    public function setCallbackUrl(string $newval): int
{
    return $this->set_callbackUrl($newval);
}

    /**
     * @throws YAPI_Exception
     */
    public function callbackMethod(): int
{
    return $this->get_callbackMethod();
}

    /**
     * @throws YAPI_Exception
     */
    public function setCallbackMethod(int $newval): int
{
    return $this->set_callbackMethod($newval);
}

    /**
     * @throws YAPI_Exception
     */
    public function callbackEncoding(): int
{
    return $this->get_callbackEncoding();
}

    /**
     * @throws YAPI_Exception
     */
    public function setCallbackEncoding(int $newval): int
{
    return $this->set_callbackEncoding($newval);
}

    /**
     * @throws YAPI_Exception
     */
    public function callbackTemplate(): int
{
    return $this->get_callbackTemplate();
}

    /**
     * @throws YAPI_Exception
     */
    public function setCallbackTemplate(int $newval): int
{
    return $this->set_callbackTemplate($newval);
}

    /**
     * @throws YAPI_Exception
     */
    public function callbackCredentials(): string
{
    return $this->get_callbackCredentials();
}

    /**
     * @throws YAPI_Exception
     */
    public function setCallbackCredentials(string $newval): int
{
    return $this->set_callbackCredentials($newval);
}

    /**
     * @throws YAPI_Exception
     */
    public function callbackInitialDelay(): int
{
    return $this->get_callbackInitialDelay();
}

    /**
     * @throws YAPI_Exception
     */
    public function setCallbackInitialDelay(int $newval): int
{
    return $this->set_callbackInitialDelay($newval);
}

    /**
     * @throws YAPI_Exception
     */
    public function callbackSchedule(): string
{
    return $this->get_callbackSchedule();
}

    /**
     * @throws YAPI_Exception
     */
    public function setCallbackSchedule(string $newval): int
{
    return $this->set_callbackSchedule($newval);
}

    /**
     * @throws YAPI_Exception
     */
    public function callbackMinDelay(): int
{
    return $this->get_callbackMinDelay();
}

    /**
     * @throws YAPI_Exception
     */
    public function setCallbackMinDelay(int $newval): int
{
    return $this->set_callbackMinDelay($newval);
}

    /**
     * @throws YAPI_Exception
     */
    public function callbackMaxDelay(): int
{
    return $this->get_callbackMaxDelay();
}

    /**
     * @throws YAPI_Exception
     */
    public function setCallbackMaxDelay(int $newval): int
{
    return $this->set_callbackMaxDelay($newval);
}

    /**
     * @throws YAPI_Exception
     */
    public function poeCurrent(): int
{
    return $this->get_poeCurrent();
}

    /**
     * Continues the enumeration of network interfaces started using yFirstNetwork().
     * Caution: You can't make any assumption about the returned network interfaces order.
     * If you want to find a specific a network interface, use Network.findNetwork()
     * and a hardwareID or a logical name.
     *
     * @return ?YNetwork  a pointer to a YNetwork object, corresponding to
     *         a network interface currently online, or a null pointer
     *         if there are no more network interfaces to enumerate.
     */
    public function nextNetwork(): ?YNetwork
    {
        $resolve = YAPI::resolveFunction($this->_className, $this->_func);
        if ($resolve->errorType != YAPI::SUCCESS) {
            return null;
        }
        $next_hwid = YAPI::getNextHardwareId($this->_className, $resolve->result);
        if ($next_hwid == null) {
            return null;
        }
        return self::FindNetwork($next_hwid);
    }

    /**
     * Starts the enumeration of network interfaces currently accessible.
     * Use the method YNetwork::nextNetwork() to iterate on
     * next network interfaces.
     *
     * @return ?YNetwork  a pointer to a YNetwork object, corresponding to
     *         the first network interface currently online, or a null pointer
     *         if there are none.
     */
    public static function FirstNetwork(): ?YNetwork
    {
        $next_hwid = YAPI::getFirstHardwareId('Network');
        if ($next_hwid == null) {
            return null;
        }
        return self::FindNetwork($next_hwid);
    }

    //--- (end of YNetwork implementation)

}
//^^^^ YNetwork.php

//--- (YNetwork functions)

/**
 * Retrieves a network interface for a given identifier.
 * The identifier can be specified using several formats:
 *
 * - FunctionLogicalName
 * - ModuleSerialNumber.FunctionIdentifier
 * - ModuleSerialNumber.FunctionLogicalName
 * - ModuleLogicalName.FunctionIdentifier
 * - ModuleLogicalName.FunctionLogicalName
 *
 *
 * This function does not require that the network interface is online at the time
 * it is invoked. The returned object is nevertheless valid.
 * Use the method isOnline() to test if the network interface is
 * indeed online at a given time. In case of ambiguity when looking for
 * a network interface by logical name, no error is notified: the first instance
 * found is returned. The search is performed first by hardware name,
 * then by logical name.
 *
 * If a call to this object's is_online() method returns FALSE although
 * you are certain that the matching device is plugged, make sure that you did
 * call registerHub() at application initialization time.
 *
 * @param string $func : a string that uniquely characterizes the network interface, for instance
 *         YHUBETH1.network.
 *
 * @return YNetwork  a YNetwork object allowing you to drive the network interface.
 */
function yFindNetwork(string $func): YNetwork
{
    return YNetwork::FindNetwork($func);
}

/**
 * Starts the enumeration of network interfaces currently accessible.
 * Use the method YNetwork::nextNetwork() to iterate on
 * next network interfaces.
 *
 * @return ?YNetwork  a pointer to a YNetwork object, corresponding to
 *         the first network interface currently online, or a null pointer
 *         if there are none.
 */
function yFirstNetwork(): ?YNetwork
{
    return YNetwork::FirstNetwork();
}

//--- (end of YNetwork functions)

