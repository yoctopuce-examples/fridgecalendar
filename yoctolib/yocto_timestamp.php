<?php
/*********************************************************************
 *
 * $Id: pic24config.php 14463 2014-01-15 13:24:00Z mvuilleu $
 *
 * Implements YTimestamp, the high-level API for Timestamp functions
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

//--- (YTimestamp return codes)
//--- (end of YTimestamp return codes)
//--- (YTimestamp definitions)
if(!defined('Y_STAMP_INVALID'))              define('Y_STAMP_INVALID',             YAPI_INVALID_LONG);
//--- (end of YTimestamp definitions)

//--- (YTimestamp declaration)
/**
 * YTimestamp Class: Timestamp Interface
 * 
 * Missing documentation in the subfunction
 */
class YTimestamp extends YFunction
{
    const STAMP_INVALID                  = YAPI_INVALID_LONG;
    //--- (end of YTimestamp declaration)

    //--- (YTimestamp attributes)
    protected $_stamp                    = Y_STAMP_INVALID;              // UTCTime
    //--- (end of YTimestamp attributes)

    function __construct($str_func)
    {
        //--- (YTimestamp constructor)
        parent::__construct($str_func);
        $this->_className = 'Timestamp';

        //--- (end of YTimestamp constructor)
    }

    //--- (YTimestamp implementation)

    function _parseAttr($name, $val)
    {
        switch($name) {
        case 'stamp':
            $this->_stamp = intval($val);
            return 1;
        }
        return parent::_parseAttr($name, $val);
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
     * Use the method YTimestamp.isOnline() to test if the function is
     * indeed online at a given time. In case of ambiguity when looking for
     * a function by logical name, no error is notified: the first instance
     * found is returned. The search is performed first by hardware name,
     * then by logical name.
     * 
     * @param func : a string that uniquely characterizes the function
     * 
     * @return a YTimestamp object allowing you to drive the function.
     */
    public static function FindTimestamp($func)
    {
        // $obj                    is a YTimestamp;
        $obj = YFunction::_FindFromCache('Timestamp', $func);
        if ($obj == null) {
            $obj = new YTimestamp($func);
            YFunction::_AddToCache('Timestamp', $func, $obj);
        }
        return $obj;
    }

    public function stamp()
    { return get_stamp(); }

    /**
     * Continues the enumeration of functions started using yFirstTimestamp().
     * 
     * @return a pointer to a YTimestamp object, corresponding to
     *         a function currently online, or a null pointer
     *         if there are no more functions to enumerate.
     */
    public function nextTimestamp()
    {   $next_hwid = YAPI::getNextHardwareId($this->_className, $this->_func);
        if($next_hwid == null) return null;
        return yFindTimestamp($next_hwid);
    }

    /**
     * Starts the enumeration of functions currently accessible.
     * Use the method YTimestamp.nextTimestamp() to iterate on
     * next functions.
     * 
     * @return a pointer to a YTimestamp object, corresponding to
     *         the first function currently online, or a null pointer
     *         if there are none.
     */
    public static function FirstTimestamp()
    {   $next_hwid = YAPI::getFirstHardwareId('Timestamp');
        if($next_hwid == null) return null;
        return self::FindTimestamp($next_hwid);
    }

    //--- (end of YTimestamp implementation)

};

//--- (Timestamp functions)

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
 * Use the method YTimestamp.isOnline() to test if the function is
 * indeed online at a given time. In case of ambiguity when looking for
 * a function by logical name, no error is notified: the first instance
 * found is returned. The search is performed first by hardware name,
 * then by logical name.
 * 
 * @param func : a string that uniquely characterizes the function
 * 
 * @return a YTimestamp object allowing you to drive the function.
 */
function yFindTimestamp($func)
{
    return YTimestamp::FindTimestamp($func);
}

/**
 * Starts the enumeration of functions currently accessible.
 * Use the method YTimestamp.nextTimestamp() to iterate on
 * next functions.
 * 
 * @return a pointer to a YTimestamp object, corresponding to
 *         the first function currently online, or a null pointer
 *         if there are none.
 */
function yFirstTimestamp()
{
    return YTimestamp::FirstTimestamp();
}

//--- (end of Timestamp functions)
?>