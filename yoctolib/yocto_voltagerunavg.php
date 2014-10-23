<?php
/*********************************************************************
 *
 * $Id: pic24config.php 14463 2014-01-15 13:24:00Z mvuilleu $
 *
 * Implements YVoltageRunAvg, the high-level API for VoltageRunAvg functions
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

//--- (YVoltageRunAvg return codes)
//--- (end of YVoltageRunAvg return codes)
//--- (YVoltageRunAvg definitions)
if(!defined('Y_UNIT_INVALID'))               define('Y_UNIT_INVALID',              YAPI_INVALID_STRING);
if(!defined('Y_RUNNINGAVERAGE_INVALID'))     define('Y_RUNNINGAVERAGE_INVALID',    YAPI_INVALID_DOUBLE);
//--- (end of YVoltageRunAvg definitions)

//--- (YVoltageRunAvg declaration)
/**
 * YVoltageRunAvg Class: VoltageRunAvg Interface
 * 
 * Missing documentation in the subfunction
 */
class YVoltageRunAvg extends YFunction
{
    const UNIT_INVALID                   = YAPI_INVALID_STRING;
    const RUNNINGAVERAGE_INVALID         = YAPI_INVALID_DOUBLE;
    //--- (end of YVoltageRunAvg declaration)

    //--- (YVoltageRunAvg attributes)
    protected $_unit                     = Y_UNIT_INVALID;               // Text
    protected $_runningAverage           = Y_RUNNINGAVERAGE_INVALID;     // FloatingPoint
    //--- (end of YVoltageRunAvg attributes)

    function __construct($str_func)
    {
        //--- (YVoltageRunAvg constructor)
        parent::__construct($str_func);
        $this->_className = 'VoltageRunAvg';

        //--- (end of YVoltageRunAvg constructor)
    }

    //--- (YVoltageRunAvg implementation)

    function _parseAttr($name, $val)
    {
        switch($name) {
        case 'unit':
            $this->_unit = $val;
            return 1;
        case 'runningAverage':
            $this->_runningAverage = $val/65536;
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
     * On failure, throws an exception or returns Y_RUNNINGAVERAGE_INVALID.
     */
    public function get_runningAverage()
    {
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$defaultCacheValidity) != YAPI_SUCCESS) {
                return Y_RUNNINGAVERAGE_INVALID;
            }
        }
        return $this->_runningAverage;
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
     * Use the method YVoltageRunAvg.isOnline() to test if the function is
     * indeed online at a given time. In case of ambiguity when looking for
     * a function by logical name, no error is notified: the first instance
     * found is returned. The search is performed first by hardware name,
     * then by logical name.
     * 
     * @param func : a string that uniquely characterizes the function
     * 
     * @return a YVoltageRunAvg object allowing you to drive the function.
     */
    public static function FindVoltageRunAvg($func)
    {
        // $obj                    is a YVoltageRunAvg;
        $obj = YFunction::_FindFromCache('VoltageRunAvg', $func);
        if ($obj == null) {
            $obj = new YVoltageRunAvg($func);
            YFunction::_AddToCache('VoltageRunAvg', $func, $obj);
        }
        return $obj;
    }

    public function unit()
    { return get_unit(); }

    public function runningAverage()
    { return get_runningAverage(); }

    /**
     * Continues the enumeration of functions started using yFirstVoltageRunAvg().
     * 
     * @return a pointer to a YVoltageRunAvg object, corresponding to
     *         a function currently online, or a null pointer
     *         if there are no more functions to enumerate.
     */
    public function nextVoltageRunAvg()
    {   $next_hwid = YAPI::getNextHardwareId($this->_className, $this->_func);
        if($next_hwid == null) return null;
        return yFindVoltageRunAvg($next_hwid);
    }

    /**
     * Starts the enumeration of functions currently accessible.
     * Use the method YVoltageRunAvg.nextVoltageRunAvg() to iterate on
     * next functions.
     * 
     * @return a pointer to a YVoltageRunAvg object, corresponding to
     *         the first function currently online, or a null pointer
     *         if there are none.
     */
    public static function FirstVoltageRunAvg()
    {   $next_hwid = YAPI::getFirstHardwareId('VoltageRunAvg');
        if($next_hwid == null) return null;
        return self::FindVoltageRunAvg($next_hwid);
    }

    //--- (end of YVoltageRunAvg implementation)

};

//--- (VoltageRunAvg functions)

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
 * Use the method YVoltageRunAvg.isOnline() to test if the function is
 * indeed online at a given time. In case of ambiguity when looking for
 * a function by logical name, no error is notified: the first instance
 * found is returned. The search is performed first by hardware name,
 * then by logical name.
 * 
 * @param func : a string that uniquely characterizes the function
 * 
 * @return a YVoltageRunAvg object allowing you to drive the function.
 */
function yFindVoltageRunAvg($func)
{
    return YVoltageRunAvg::FindVoltageRunAvg($func);
}

/**
 * Starts the enumeration of functions currently accessible.
 * Use the method YVoltageRunAvg.nextVoltageRunAvg() to iterate on
 * next functions.
 * 
 * @return a pointer to a YVoltageRunAvg object, corresponding to
 *         the first function currently online, or a null pointer
 *         if there are none.
 */
function yFirstVoltageRunAvg()
{
    return YVoltageRunAvg::FirstVoltageRunAvg();
}

//--- (end of VoltageRunAvg functions)
?>