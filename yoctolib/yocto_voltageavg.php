<?php
/*********************************************************************
 *
 * $Id: pic24config.php 14463 2014-01-15 13:24:00Z mvuilleu $
 *
 * Implements YVoltageAvg, the high-level API for VoltageAvg functions
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

//--- (YVoltageAvg return codes)
//--- (end of YVoltageAvg return codes)
//--- (YVoltageAvg definitions)
if(!defined('Y_UNIT_INVALID'))               define('Y_UNIT_INVALID',              YAPI_INVALID_STRING);
if(!defined('Y_LASTAVERAGE_INVALID'))        define('Y_LASTAVERAGE_INVALID',       YAPI_INVALID_DOUBLE);
//--- (end of YVoltageAvg definitions)

//--- (YVoltageAvg declaration)
/**
 * YVoltageAvg Class: Voltage average function interface
 * 
 * The device can report the average measure during the last full period.
 */
class YVoltageAvg extends YFunction
{
    const UNIT_INVALID                   = YAPI_INVALID_STRING;
    const LASTAVERAGE_INVALID            = YAPI_INVALID_DOUBLE;
    //--- (end of YVoltageAvg declaration)

    //--- (YVoltageAvg attributes)
    protected $_unit                     = Y_UNIT_INVALID;               // Text
    protected $_lastAverage              = Y_LASTAVERAGE_INVALID;        // FloatingPoint
    //--- (end of YVoltageAvg attributes)

    function __construct($str_func)
    {
        //--- (YVoltageAvg constructor)
        parent::__construct($str_func);
        $this->_className = 'VoltageAvg';

        //--- (end of YVoltageAvg constructor)
    }

    //--- (YVoltageAvg implementation)

    function _parseAttr($name, $val)
    {
        switch($name) {
        case 'unit':
            $this->_unit = $val;
            return 1;
        case 'lastAverage':
            $this->_lastAverage = $val/65536;
            return 1;
        }
        return parent::_parseAttr($name, $val);
    }

    /**
     * Returns the measuring unit for the measured value.
     * 
     * @return a string corresponding to the measuring unit for the measured value
     * 
     * On failure, throws an exception or returns Y_UNIT_INVALID.
     */
    public function get_unit()
    {
        if ($this->_cacheExpiration == 0) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_UNIT_INVALID;
            }
        }
        return $this->_unit;
    }

    /**
     * Returns the average voltage in Volts, as a floating point number.
     * 
     * @return a floating point number corresponding to the average voltage in Volts, as a floating point number
     * 
     * On failure, throws an exception or returns Y_LASTAVERAGE_INVALID.
     */
    public function get_lastAverage()
    {
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_LASTAVERAGE_INVALID;
            }
        }
        return $this->_lastAverage;
    }

    /**
     * Retrieves a voltage average for a given identifier.
     * The identifier can be specified using several formats:
     * <ul>
     * <li>FunctionLogicalName</li>
     * <li>ModuleSerialNumber.FunctionIdentifier</li>
     * <li>ModuleSerialNumber.FunctionLogicalName</li>
     * <li>ModuleLogicalName.FunctionIdentifier</li>
     * <li>ModuleLogicalName.FunctionLogicalName</li>
     * </ul>
     * 
     * This function does not require that the voltage average is online at the time
     * it is invoked. The returned object is nevertheless valid.
     * Use the method YVoltageAvg.isOnline() to test if the voltage average is
     * indeed online at a given time. In case of ambiguity when looking for
     * a voltage average by logical name, no error is notified: the first instance
     * found is returned. The search is performed first by hardware name,
     * then by logical name.
     * 
     * @param func : a string that uniquely characterizes the voltage average
     * 
     * @return a YVoltageAvg object allowing you to drive the voltage average.
     */
    public static function FindVoltageAvg($func)
    {
        // $obj                    is a YVoltageAvg;
        $obj = YFunction::_FindFromCache('VoltageAvg', $func);
        if ($obj == null) {
            $obj = new YVoltageAvg($func);
            YFunction::_AddToCache('VoltageAvg', $func, $obj);
        }
        return $obj;
    }

    public function unit()
    { return get_unit(); }

    public function lastAverage()
    { return get_lastAverage(); }

    /**
     * Continues the enumeration of voltage averages started using yFirstVoltageAvg().
     * 
     * @return a pointer to a YVoltageAvg object, corresponding to
     *         a voltage average currently online, or a null pointer
     *         if there are no more voltage averages to enumerate.
     */
    public function nextVoltageAvg()
    {   $next_hwid = YAPI::getNextHardwareId($this->_className, $this->_func);
        if($next_hwid == null) return null;
        return yFindVoltageAvg($next_hwid);
    }

    /**
     * Starts the enumeration of voltage averages currently accessible.
     * Use the method YVoltageAvg.nextVoltageAvg() to iterate on
     * next voltage averages.
     * 
     * @return a pointer to a YVoltageAvg object, corresponding to
     *         the first voltage average currently online, or a null pointer
     *         if there are none.
     */
    public static function FirstVoltageAvg()
    {   $next_hwid = YAPI::getFirstHardwareId('VoltageAvg');
        if($next_hwid == null) return null;
        return self::FindVoltageAvg($next_hwid);
    }

    //--- (end of YVoltageAvg implementation)

};

//--- (VoltageAvg functions)

/**
 * Retrieves a voltage average for a given identifier.
 * The identifier can be specified using several formats:
 * <ul>
 * <li>FunctionLogicalName</li>
 * <li>ModuleSerialNumber.FunctionIdentifier</li>
 * <li>ModuleSerialNumber.FunctionLogicalName</li>
 * <li>ModuleLogicalName.FunctionIdentifier</li>
 * <li>ModuleLogicalName.FunctionLogicalName</li>
 * </ul>
 * 
 * This function does not require that the voltage average is online at the time
 * it is invoked. The returned object is nevertheless valid.
 * Use the method YVoltageAvg.isOnline() to test if the voltage average is
 * indeed online at a given time. In case of ambiguity when looking for
 * a voltage average by logical name, no error is notified: the first instance
 * found is returned. The search is performed first by hardware name,
 * then by logical name.
 * 
 * @param func : a string that uniquely characterizes the voltage average
 * 
 * @return a YVoltageAvg object allowing you to drive the voltage average.
 */
function yFindVoltageAvg($func)
{
    return YVoltageAvg::FindVoltageAvg($func);
}

/**
 * Starts the enumeration of voltage averages currently accessible.
 * Use the method YVoltageAvg.nextVoltageAvg() to iterate on
 * next voltage averages.
 * 
 * @return a pointer to a YVoltageAvg object, corresponding to
 *         the first voltage average currently online, or a null pointer
 *         if there are none.
 */
function yFirstVoltageAvg()
{
    return YVoltageAvg::FirstVoltageAvg();
}

//--- (end of VoltageAvg functions)
?>