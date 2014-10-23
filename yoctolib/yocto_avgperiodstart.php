<?php
/*********************************************************************
 *
 * $Id: pic24config.php 14463 2014-01-15 13:24:00Z mvuilleu $
 *
 * Implements YAvgPeriodStart, the high-level API for AvgPeriodStart functions
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

//--- (YAvgPeriodStart return codes)
//--- (end of YAvgPeriodStart return codes)
//--- (YAvgPeriodStart definitions)
if(!defined('Y_PERIOD_INVALID'))             define('Y_PERIOD_INVALID',            YAPI_INVALID_UINT);
if(!defined('Y_STAMP_INVALID'))              define('Y_STAMP_INVALID',             YAPI_INVALID_LONG);
//--- (end of YAvgPeriodStart definitions)

//--- (YAvgPeriodStart declaration)
/**
 * YAvgPeriodStart Class: AvgPeriodStart Interface
 * 
 * The device can work on user-specified averaging periods.
 */
class YAvgPeriodStart extends YFunction
{
    const PERIOD_INVALID                 = YAPI_INVALID_UINT;
    const STAMP_INVALID                  = YAPI_INVALID_LONG;
    //--- (end of YAvgPeriodStart declaration)

    //--- (YAvgPeriodStart attributes)
    protected $_period                   = Y_PERIOD_INVALID;             // UInt31
    protected $_stamp                    = Y_STAMP_INVALID;              // UTCTime
    //--- (end of YAvgPeriodStart attributes)

    function __construct($str_func)
    {
        //--- (YAvgPeriodStart constructor)
        parent::__construct($str_func);
        $this->_className = 'AvgPeriodStart';

        //--- (end of YAvgPeriodStart constructor)
    }

    //--- (YAvgPeriodStart implementation)

    function _parseAttr($name, $val)
    {
        switch($name) {
        case 'period':
            $this->_period = intval($val);
            return 1;
        case 'stamp':
            $this->_stamp = intval($val);
            return 1;
        }
        return parent::_parseAttr($name, $val);
    }

    /**
     * Returns the averaging period duration, in seconds.
     * 
     * @return an integer corresponding to the averaging period duration, in seconds
     * 
     * On failure, throws an exception or returns Y_PERIOD_INVALID.
     */
    public function get_period()
    {
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_PERIOD_INVALID;
            }
        }
        return $this->_period;
    }

    /**
     * Changes the averaging period duration, in seconds.
     * 
     * @param newval : an integer corresponding to the averaging period duration, in seconds
     * 
     * @return YAPI_SUCCESS if the call succeeds.
     * 
     * On failure, throws an exception or returns a negative error code.
     */
    public function set_period($newval)
    {
        $rest_val = strval($newval);
        return $this->_setAttr("period",$rest_val);
    }

    /**
     * Returns the final timestamp of the last period.
     * 
     * @return an integer corresponding to the final timestamp of the last period
     * 
     * On failure, throws an exception or returns Y_STAMP_INVALID.
     */
    public function get_stamp()
    {
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_STAMP_INVALID;
            }
        }
        return $this->_stamp;
    }

    /**
     * Retrieves a function for a given identifier.
     * The identifier can be specified using several formats:
     * <ul>
     * <li>FunctionLogicalName</li>
     * <li>ModuleSerialNumber.FunctionIdentifier</li>
     * <li>ModuleSerialNumber.FunctionLogicalName</li>
     * <li>ModuleLogicalName.FunctionIdentifier</li>
     * <li>ModuleLogicalName.FunctionLogicalName</li>
     * </ul>
     * 
     * This function does not require that the function is online at the time
     * it is invoked. The returned object is nevertheless valid.
     * Use the method YAvgPeriodStart.isOnline() to test if the function is
     * indeed online at a given time. In case of ambiguity when looking for
     * a function by logical name, no error is notified: the first instance
     * found is returned. The search is performed first by hardware name,
     * then by logical name.
     * 
     * @param func : a string that uniquely characterizes the function
     * 
     * @return a YAvgPeriodStart object allowing you to drive the function.
     */
    public static function FindAvgPeriodStart($func)
    {
        // $obj                    is a YAvgPeriodStart;
        $obj = YFunction::_FindFromCache('AvgPeriodStart', $func);
        if ($obj == null) {
            $obj = new YAvgPeriodStart($func);
            YFunction::_AddToCache('AvgPeriodStart', $func, $obj);
        }
        return $obj;
    }

    public function period()
    { return get_period(); }

    public function setPeriod($newval)
    { return set_period($newval); }

    public function stamp()
    { return get_stamp(); }

    /**
     * Continues the enumeration of functions started using yFirstAvgPeriodStart().
     * 
     * @return a pointer to a YAvgPeriodStart object, corresponding to
     *         a function currently online, or a null pointer
     *         if there are no more functions to enumerate.
     */
    public function nextAvgPeriodStart()
    {   $next_hwid = YAPI::getNextHardwareId($this->_className, $this->_func);
        if($next_hwid == null) return null;
        return yFindAvgPeriodStart($next_hwid);
    }

    /**
     * Starts the enumeration of functions currently accessible.
     * Use the method YAvgPeriodStart.nextAvgPeriodStart() to iterate on
     * next functions.
     * 
     * @return a pointer to a YAvgPeriodStart object, corresponding to
     *         the first function currently online, or a null pointer
     *         if there are none.
     */
    public static function FirstAvgPeriodStart()
    {   $next_hwid = YAPI::getFirstHardwareId('AvgPeriodStart');
        if($next_hwid == null) return null;
        return self::FindAvgPeriodStart($next_hwid);
    }

    //--- (end of YAvgPeriodStart implementation)

};

//--- (AvgPeriodStart functions)

/**
 * Retrieves a function for a given identifier.
 * The identifier can be specified using several formats:
 * <ul>
 * <li>FunctionLogicalName</li>
 * <li>ModuleSerialNumber.FunctionIdentifier</li>
 * <li>ModuleSerialNumber.FunctionLogicalName</li>
 * <li>ModuleLogicalName.FunctionIdentifier</li>
 * <li>ModuleLogicalName.FunctionLogicalName</li>
 * </ul>
 * 
 * This function does not require that the function is online at the time
 * it is invoked. The returned object is nevertheless valid.
 * Use the method YAvgPeriodStart.isOnline() to test if the function is
 * indeed online at a given time. In case of ambiguity when looking for
 * a function by logical name, no error is notified: the first instance
 * found is returned. The search is performed first by hardware name,
 * then by logical name.
 * 
 * @param func : a string that uniquely characterizes the function
 * 
 * @return a YAvgPeriodStart object allowing you to drive the function.
 */
function yFindAvgPeriodStart($func)
{
    return YAvgPeriodStart::FindAvgPeriodStart($func);
}

/**
 * Starts the enumeration of functions currently accessible.
 * Use the method YAvgPeriodStart.nextAvgPeriodStart() to iterate on
 * next functions.
 * 
 * @return a pointer to a YAvgPeriodStart object, corresponding to
 *         the first function currently online, or a null pointer
 *         if there are none.
 */
function yFirstAvgPeriodStart()
{
    return YAvgPeriodStart::FirstAvgPeriodStart();
}

//--- (end of AvgPeriodStart functions)
?>