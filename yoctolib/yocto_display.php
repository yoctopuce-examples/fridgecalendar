<?php
/*********************************************************************
 *
 * $Id: yocto_display.php 76144 2026-10-05 07:54:08Z seb $
 *
 * Implements yFindDisplay(), the high-level API for Display functions
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

//--- (generated code: YDisplay return codes)
//--- (end of generated code: YDisplay return codes)
//--- (generated code: YDisplayLayer return codes)
//--- (end of generated code: YDisplayLayer return codes)
//--- (generated code: YDisplay definitions)
if (!defined('Y_ENABLED_FALSE')) {
    define('Y_ENABLED_FALSE', 0);
}
if (!defined('Y_ENABLED_TRUE')) {
    define('Y_ENABLED_TRUE', 1);
}
if (!defined('Y_ENABLED_INVALID')) {
    define('Y_ENABLED_INVALID', -1);
}
if (!defined('Y_ORIENTATION_LEFT')) {
    define('Y_ORIENTATION_LEFT', 0);
}
if (!defined('Y_ORIENTATION_UP')) {
    define('Y_ORIENTATION_UP', 1);
}
if (!defined('Y_ORIENTATION_RIGHT')) {
    define('Y_ORIENTATION_RIGHT', 2);
}
if (!defined('Y_ORIENTATION_DOWN')) {
    define('Y_ORIENTATION_DOWN', 3);
}
if (!defined('Y_ORIENTATION_INVALID')) {
    define('Y_ORIENTATION_INVALID', -1);
}
if (!defined('Y_DISPLAYTYPE_MONO')) {
    define('Y_DISPLAYTYPE_MONO', 0);
}
if (!defined('Y_DISPLAYTYPE_EPAPER_BW')) {
    define('Y_DISPLAYTYPE_EPAPER_BW', 1);
}
if (!defined('Y_DISPLAYTYPE_EPAPER_BWR')) {
    define('Y_DISPLAYTYPE_EPAPER_BWR', 2);
}
if (!defined('Y_DISPLAYTYPE_EPAPER_BWRY')) {
    define('Y_DISPLAYTYPE_EPAPER_BWRY', 3);
}
if (!defined('Y_DISPLAYTYPE_INVALID')) {
    define('Y_DISPLAYTYPE_INVALID', -1);
}
const Y_FASTREFRESH_WHENEVER_POSSIBLE = 0;
const Y_FASTREFRESH_WHENEVER_SUPPORTED = 1;
const Y_FASTREFRESH_NEVER = 2;
const Y_FASTREFRESH_INVALID = 3;
const Y_REGENERATE_ON_REQUEST_ONLY = 0;
const Y_REGENERATE_EVERY_DAY = 1;
const Y_REGENERATE_EVERY_12H = 2;
const Y_REGENERATE_EVERY_6H = 3;
const Y_REGENERATE_EVERY_3H = 4;
const Y_REGENERATE_EVERY_2H = 5;
const Y_REGENERATE_EVERY_HOUR = 6;
const Y_REGENERATE_EVERY_30MIN = 7;
const Y_REGENERATE_EVERY_15MIN = 8;
const Y_REGENERATE_EVERY_480 = 9;
const Y_REGENERATE_EVERY_432 = 10;
const Y_REGENERATE_EVERY_360 = 11;
const Y_REGENERATE_EVERY_288 = 12;
const Y_REGENERATE_EVERY_240 = 13;
const Y_REGENERATE_EVERY_192 = 14;
const Y_REGENERATE_EVERY_144 = 15;
const Y_REGENERATE_EVERY_96 = 16;
const Y_REGENERATE_EVERY_48 = 17;
const Y_REGENERATE_EVERY_36 = 18;
const Y_REGENERATE_EVERY_24 = 19;
const Y_REGENERATE_EVERY_12 = 20;
const Y_REGENERATE_EVERY_10 = 21;
const Y_REGENERATE_EVERY_8 = 22;
const Y_REGENERATE_EVERY_6 = 23;
const Y_REGENERATE_EVERY_4 = 24;
const Y_REGENERATE_ALWAYS = 25;
const Y_REGENERATE_INVALID = 26;
const Y_DISPLAYSTATE_FAILURE = 0;
const Y_DISPLAYSTATE_OFF = 1;
const Y_DISPLAYSTATE_POWERING = 2;
const Y_DISPLAYSTATE_IDLE = 3;
const Y_DISPLAYSTATE_REFRESHING = 4;
const Y_DISPLAYSTATE_INVALID = 5;
if (!defined('Y_STARTUPSEQ_INVALID')) {
    define('Y_STARTUPSEQ_INVALID', YAPI_INVALID_STRING);
}
if (!defined('Y_BRIGHTNESS_INVALID')) {
    define('Y_BRIGHTNESS_INVALID', YAPI_INVALID_UINT);
}
if (!defined('Y_AUTOINVERTDELAY_INVALID')) {
    define('Y_AUTOINVERTDELAY_INVALID', YAPI_INVALID_UINT);
}
if (!defined('Y_DISPLAYPANEL_INVALID')) {
    define('Y_DISPLAYPANEL_INVALID', YAPI_INVALID_STRING);
}
if (!defined('Y_DISPLAYWIDTH_INVALID')) {
    define('Y_DISPLAYWIDTH_INVALID', YAPI_INVALID_UINT);
}
if (!defined('Y_DISPLAYHEIGHT_INVALID')) {
    define('Y_DISPLAYHEIGHT_INVALID', YAPI_INVALID_UINT);
}
if (!defined('Y_LAYERWIDTH_INVALID')) {
    define('Y_LAYERWIDTH_INVALID', YAPI_INVALID_UINT);
}
if (!defined('Y_LAYERHEIGHT_INVALID')) {
    define('Y_LAYERHEIGHT_INVALID', YAPI_INVALID_UINT);
}
if (!defined('Y_LAYERCOUNT_INVALID')) {
    define('Y_LAYERCOUNT_INVALID', YAPI_INVALID_UINT);
}
if (!defined('Y_COMMAND_INVALID')) {
    define('Y_COMMAND_INVALID', YAPI_INVALID_STRING);
}
//--- (end of generated code: YDisplay definitions)
//--- (generated code: YDisplayLayer definitions)
const Y_ALIGN_TOP_LEFT = 0;
const Y_ALIGN_CENTER_LEFT = 1;
const Y_ALIGN_BASELINE_LEFT = 2;
const Y_ALIGN_BOTTOM_LEFT = 3;
const Y_ALIGN_TOP_CENTER = 4;
const Y_ALIGN_CENTER = 5;
const Y_ALIGN_BASELINE_CENTER = 6;
const Y_ALIGN_BOTTOM_CENTER = 7;
const Y_ALIGN_TOP_DECIMAL = 8;
const Y_ALIGN_CENTER_DECIMAL = 9;
const Y_ALIGN_BASELINE_DECIMAL = 10;
const Y_ALIGN_BOTTOM_DECIMAL = 11;
const Y_ALIGN_TOP_RIGHT = 12;
const Y_ALIGN_CENTER_RIGHT = 13;
const Y_ALIGN_BASELINE_RIGHT = 14;
const Y_ALIGN_BOTTOM_RIGHT = 15;
//--- (end of generated code: YDisplayLayer definitions)

//--- (generated code: YDisplayLayer declaration)
//vvvv YDisplayLayer.php

/**
 * YDisplayLayer Class: Interface for drawing into display layers, obtained by calling display.get_displayLayer.
 *
 * Each DisplayLayer represents an image layer containing objects
 * to display (bitmaps, text, etc.). The content is displayed only when
 * the layer is active on the screen (and not masked by other
 * overlapping layers).
 */
class YDisplayLayer
{
    const NO_INK                         = -1;
    const BG_INK                         = -2;
    const FG_INK                         = -3;
    const ALIGN_TOP_LEFT                 = 0;
    const ALIGN_CENTER_LEFT              = 1;
    const ALIGN_BASELINE_LEFT            = 2;
    const ALIGN_BOTTOM_LEFT              = 3;
    const ALIGN_TOP_CENTER               = 4;
    const ALIGN_CENTER                   = 5;
    const ALIGN_BASELINE_CENTER          = 6;
    const ALIGN_BOTTOM_CENTER            = 7;
    const ALIGN_TOP_DECIMAL              = 8;
    const ALIGN_CENTER_DECIMAL           = 9;
    const ALIGN_BASELINE_DECIMAL         = 10;
    const ALIGN_BOTTOM_DECIMAL           = 11;
    const ALIGN_TOP_RIGHT                = 12;
    const ALIGN_CENTER_RIGHT             = 13;
    const ALIGN_BASELINE_RIGHT           = 14;
    const ALIGN_BOTTOM_RIGHT             = 15;
    //--- (end of generated code: YDisplayLayer declaration)

    //--- (generated code: YDisplayLayer attributes)
    protected string $_cmdbuff = '';                           // str
    protected bool $_hidden = false;                        // bool
    protected int $_polyPrevX = 0;                            // int
    protected int $_polyPrevY = 0;                            // int

    //--- (end of generated code: YDisplayLayer attributes)
    protected YDisplay $_display;
    protected int $_id;

    function __construct(YDisplay $parent, int $id)
    {
        //--- (generated code: YDisplayLayer constructor)
        //--- (end of generated code: YDisplayLayer constructor)
        $this->_display = $parent;
        $this->_id = $id;
        $this->_cmdbuff = '';
        $this->_hidden = false;
    }

    //--- (generated code: YDisplayLayer implementation)

    /**
     * @throws YAPI_Exception on error
     */
    public function must_be_flushed(): bool
    {
        return strlen($this->_cmdbuff) > 0;
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function resetHiddenFlag(): int
    {
        $this->_hidden = false;
        return YAPI::SUCCESS;
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function flush_now(): int
    {
        // $res                    is a int;
        $res = YAPI::SUCCESS;
        if (strlen($this->_cmdbuff) > 0) {
            $res = $this->_display->sendCommand($this->_cmdbuff);
            $this->_cmdbuff = '';
        }
        return $res;
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function command_push(string $cmd): int
    {
        // $res                    is a int;
        $res = YAPI::SUCCESS;
        if (strlen($this->_cmdbuff) + strlen($cmd) >= 64) {
            // force flush before, to prevent overflow
            $this->flush_now();
        }
        if (strlen($this->_cmdbuff) == 0) {
            // always prepend layer ID first
            $this->_cmdbuff = $this->_id;
        }
        $this->_cmdbuff = $this->_cmdbuff . $cmd;
        return $res;
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function command_flush(string $cmd): int
    {
        // $res                    is a int;

        $res = $this->command_push($cmd);
        if ($this->_hidden) {
            return $res;
        }
        if ($this->_display->isFrozen()) {
            return $res;
        }
        return $this->flush_now();
    }

    /**
     * Reverts the layer to its initial state (fully transparent, default settings).
     * Reinitializes the drawing pointer to the upper left position,
     * and selects the most visible pen color. If you only want to erase the layer
     * content, use the method clear() instead.
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function reset(): int
    {
        $this->_hidden = false;
        return $this->command_flush('X');
    }

    /**
     * Erases the whole content of the layer (makes it fully transparent).
     * This method does not change any other attribute of the layer.
     * To reinitialize the layer attributes to defaults settings, use the method
     * reset() instead.
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function clear(): int
    {
        return $this->command_flush('x');
    }

    /**
     * Selects the color to be used for all subsequent drawing functions,
     * for filling as well as for line and text drawing.
     * To select a different fill and outline color, use
     * selectFillColor and selectLineColor.
     * The pen color is provided as an RGB value.
     * For grayscale or monochrome displays, the value is
     * automatically converted to the proper range.
     *
     * @param int $color : the desired pen color, as a 24-bit RGB value
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function selectColorPen(int $color): int
    {
        return $this->command_push(sprintf('c%06x',$color));
    }

    /**
     * Selects the pen gray level for all subsequent drawing functions,
     * for filling as well as for line and text drawing.
     * To select a different fill and outline color, use
     * selectFillColor and selectLineColor.
     * The gray level is provided as a number between
     * 0 (black) and 255 (white, or whichever the lightest color is).
     * For monochrome displays (without gray levels), any value
     * lower than 128 is rendered as black, and any value equal
     * or above to 128 is non-black.
     *
     * @param int $graylevel : the desired gray level, from 0 to 255
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function selectGrayPen(int $graylevel): int
    {
        return $this->command_push(sprintf('g%d',$graylevel));
    }

    /**
     * Selects an eraser instead of a pen for all subsequent drawing functions,
     * except for bitmap copy functions. Any point drawn using the eraser
     * becomes transparent (as when the layer is empty), showing the other
     * layers beneath it.
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function selectEraser(): int
    {
        return $this->command_push('e');
    }

    /**
     * Selects the color to be used for filling rectangular bars,
     * discs and polygons. The color is provided as an RGB value.
     * For grayscale or monochrome displays, the value is
     * automatically converted to the proper range.
     * You can also use the constants FG_INK to use the
     * default drawing colour, BG_INK to use the default
     * background colour, and NO_INK to disable filling.
     *
     * @param int $color : the desired drawing color, as a 24-bit RGB value,
     *         or one of the constants NO_INK, FG_INK
     *         or BG_INK
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function selectFillColor(int $color): int
    {
        // $r                      is a int;
        // $g                      is a int;
        // $b                      is a int;
        if ($color==-1) {
            return $this->command_push('f_');
        }
        if ($color==-2) {
            return $this->command_push('f-');
        }
        if ($color==-3) {
            return $this->command_push('f.');
        }
        $r = (($color >> 20) & 15);
        $g = (($color >> 12) & 15);
        $b = (($color >> 4) & 15);
        return $this->command_push(sprintf('f%x%x%x',$r,$g,$b));
    }

    /**
     * Selects the color to be used for drawing the outline of rectangular
     * bars, discs and polygons, as well as for drawing lines and text.
     * The color is provided as an RGB value.
     * For grayscale or monochrome displays, the value is
     * automatically converted to the proper range.
     * You can also use the constants FG_INK to use the
     * default drawing colour, BG_INK to use the default
     * background colour, and NO_INK to disable outline drawing.
     *
     * @param int $color : the desired drawing color, as a 24-bit RGB value,
     *         or one of the constants NO_INK, FG_INK
     *         or BG_INK
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function selectLineColor(int $color): int
    {
        // $r                      is a int;
        // $g                      is a int;
        // $b                      is a int;
        if ($color==-1) {
            return $this->command_push('l_');
        }
        if ($color==-2) {
            return $this->command_push('l-');
        }
        if ($color==-3) {
            return $this->command_push('l*');
        }
        $r = (($color >> 20) & 15);
        $g = (($color >> 12) & 15);
        $b = (($color >> 4) & 15);
        return $this->command_push(sprintf('l%x%x%x',$r,$g,$b));
    }

    /**
     * Selects the line width for drawing the outline of rectangular
     * bars, discs and polygons, as well as for drawing lines.
     *
     * @param int $width : the desired line width, in pixels
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function selectLineWidth(int $width): int
    {
        return $this->command_push(sprintf('t%d',$width));
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function setAntialiasingMode(bool $mode): int
    {
        return $this->command_push(sprintf('a%d',$mode));
    }

    /**
     * Draws a single pixel at the specified position.
     *
     * @param int $x : the distance from left of layer, in pixels
     * @param int $y : the distance from top of layer, in pixels
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function drawPixel(int $x, int $y): int
    {
        return $this->command_flush(sprintf('P%d,%d',$x,$y));
    }

    /**
     * Draws an empty rectangle at a specified position.
     *
     * @param int $x1 : the distance from left of layer to the left border of the rectangle, in pixels
     * @param int $y1 : the distance from top of layer to the top border of the rectangle, in pixels
     * @param int $x2 : the distance from left of layer to the right border of the rectangle, in pixels
     * @param int $y2 : the distance from top of layer to the bottom border of the rectangle, in pixels
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function drawRect(int $x1, int $y1, int $x2, int $y2): int
    {
        return $this->command_flush(sprintf('R%d,%d,%d,%d',$x1,$y1,$x2,$y2));
    }

    /**
     * Draws a filled rectangular bar at a specified position.
     *
     * @param int $x1 : the distance from left of layer to the left border of the rectangle, in pixels
     * @param int $y1 : the distance from top of layer to the top border of the rectangle, in pixels
     * @param int $x2 : the distance from left of layer to the right border of the rectangle, in pixels
     * @param int $y2 : the distance from top of layer to the bottom border of the rectangle, in pixels
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function drawBar(int $x1, int $y1, int $x2, int $y2): int
    {
        return $this->command_flush(sprintf('B%d,%d,%d,%d',$x1,$y1,$x2,$y2));
    }

    /**
     * Draws an empty circle at a specified position.
     *
     * @param int $x : the distance from left of layer to the center of the circle, in pixels
     * @param int $y : the distance from top of layer to the center of the circle, in pixels
     * @param int $r : the radius of the circle, in pixels
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function drawCircle(int $x, int $y, int $r): int
    {
        return $this->command_flush(sprintf('C%d,%d,%d',$x,$y,$r));
    }

    /**
     * Draws a filled disc at a given position.
     *
     * @param int $x : the distance from left of layer to the center of the disc, in pixels
     * @param int $y : the distance from top of layer to the center of the disc, in pixels
     * @param int $r : the radius of the disc, in pixels
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function drawDisc(int $x, int $y, int $r): int
    {
        return $this->command_flush(sprintf('D%d,%d,%d',$x,$y,$r));
    }

    /**
     * Selects a font to use for the next text drawing functions, by providing the name of the
     * font file. You can use a built-in font as well as a font file that you have previously
     * uploaded to the device built-in memory. If you experience problems selecting a font
     * file, check the device logs for any error message such as missing font file or bad font
     * file format.
     *
     * @param string $fontname : the font file name, embedded fonts are 8x8.yfm, Small.yfm, Medium.yfm,
     * Large.yfm (not available on Yocto-MiniDisplay).
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function selectFont(string $fontname): int
    {
        return $this->command_push(sprintf('&%s%c',$fontname,27));
    }

    /**
     * Draws a text string at the specified position. The point of the text that is aligned
     * to the specified pixel position is called the anchor point, and can be chosen among
     * several options. Text is rendered from left to right, without implicit wrapping.
     *
     * @param int $x : the distance from left of layer to the text anchor point, in pixels
     * @param int $y : the distance from top of layer to the text anchor point, in pixels
     * @param int $anchor : the text anchor point, chosen among the YDisplayLayer::ALIGN enumeration:
     *         YDisplayLayer::ALIGN_TOP_LEFT,         YDisplayLayer::ALIGN_CENTER_LEFT,
     *         YDisplayLayer::ALIGN_BASELINE_LEFT,    YDisplayLayer::ALIGN_BOTTOM_LEFT,
     *         YDisplayLayer::ALIGN_TOP_CENTER,       YDisplayLayer::ALIGN_CENTER,
     *         YDisplayLayer::ALIGN_BASELINE_CENTER,  YDisplayLayer::ALIGN_BOTTOM_CENTER,
     *         YDisplayLayer::ALIGN_TOP_DECIMAL,      YDisplayLayer::ALIGN_CENTER_DECIMAL,
     *         YDisplayLayer::ALIGN_BASELINE_DECIMAL, YDisplayLayer::ALIGN_BOTTOM_DECIMAL,
     *         YDisplayLayer::ALIGN_TOP_RIGHT,        YDisplayLayer::ALIGN_CENTER_RIGHT,
     *         YDisplayLayer::ALIGN_BASELINE_RIGHT,   YDisplayLayer::ALIGN_BOTTOM_RIGHT.
     * @param string $text : the text string to draw
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function drawText(int $x, int $y, int $anchor, string $text): int
    {
        // $textlen                is a int;
        // $destname               is a str;
        $textlen = strlen($text);
        if ($textlen > 60) {
            if ($textlen > 1000) {
                $this->_display->_throw(YAPI::INVALID_ARGUMENT, 'text too large (max 1000 characters)');
                return YAPI::INVALID_ARGUMENT;
            }
            $this->_display->flushLayers();
            $destname = sprintf('layer%d:T%d,%d,%d,',$this->_id,$x,$y,$anchor);
            return $this->_display->upload($destname,YAPI::Ystr2bin($text));
        }
        return $this->command_flush(sprintf('T%d,%d,%d,%s%c',$x,$y,$anchor,$text,27));
    }

    /**
     * Draws an image previously uploaded to the device filesystem, at the specified position.
     * At present time, GIF images are the only supported image format. If you experience
     * problems using an image file, check the device logs for any error message such as
     * missing image file or bad image file format.
     *
     * @param int $x : the distance from left of layer to the left of the image, in pixels
     * @param int $y : the distance from top of layer to the top of the image, in pixels
     * @param string $imagename : the GIF file name
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function drawImage(int $x, int $y, string $imagename): int
    {
        return $this->command_flush(sprintf('*%d,%d,%s%c',$x,$y,$imagename,27));
    }

    /**
     * Draws a GIF image provided as a binary buffer at the specified position.
     * If the image drawing must be included in an animation sequence, save it
     * in the device filesystem first and use drawImage instead.
     *
     * @param int $x : the distance from left of layer to the left of the image, in pixels
     * @param int $y : the distance from top of layer to the top of the image, in pixels
     * @param string $gifimage : a binary object with the content of a GIF file
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function drawGIF(int $x, int $y, string $gifimage): int
    {
        // $destname               is a str;
        $this->_display->flushLayers();
        $destname = sprintf('layer%d:G,-1@%d,%d',$this->_id,$x,$y);
        return $this->_display->upload($destname,$gifimage);
    }

    /**
     * Draws a bitmap at the specified position. The bitmap is provided as a binary object,
     * where each pixel maps to a bit, from left to right and from top to bottom.
     * The most significant bit of each byte maps to the leftmost pixel, and the least
     * significant bit maps to the rightmost pixel. Bits set to 1 are drawn using the
     * layer selected pen color. Bits set to 0 are drawn using the specified background
     * color, unless NO_INK (-1) is specified, in which case they are not
     * drawn at all (as if transparent).
     *
     * @param int $x : the distance from left of layer to the left of the bitmap, in pixels
     * @param int $y : the distance from top of layer to the top of the bitmap, in pixels
     * @param int $w : the width of the bitmap, in pixels
     * @param string $bitmap : a binary object
     * @param int $bgcol : the RGB background color to use for zero bits, as a 24-bit RGB value,
     *         or one of the constants NO_INK, FG_INK or BG_INK
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function drawBitmap(int $x, int $y, int $w, string $bitmap, int $bgcol): int
    {
        // $destname               is a str;
        // $r                      is a int;
        // $g                      is a int;
        // $b                      is a int;
        // $rgbcol                 is a str;
        if (($w < 0) || ($w > 512)) {
            $this->_display->_throw(YAPI::INVALID_ARGUMENT, 'bitmap width must be in range 1->.512');
            return YAPI::INVALID_ARGUMENT;
        }
        $this->_display->flushLayers();
        if ($bgcol <= 255) {
            if ($bgcol >= -1) {
                // backward-compatible behaviour (gray level)
                $rgbcol = sprintf('%d',$bgcol);
            } else {
                // background color or foreground color
                if ($bgcol <= -3) {
                    $rgbcol = '#.';
                } else {
                    $rgbcol = '#-';
                }
            }
        } else {
            // RGB color
            $r = (($bgcol >> 20) & 15);
            $g = (($bgcol >> 12) & 15);
            $b = (($bgcol >> 4) & 15);
            $rgbcol = sprintf('#%x%x%x',$r,$g,$b);
        }
        $destname = sprintf('layer%d:%d,%s@%d,%d',$this->_id,$w,$rgbcol,$x,$y);
        return $this->_display->upload($destname,$bitmap);
    }

    /**
     * Draws a color pixmap at the specified position. The pixmap is provided as a binary
     * object, where each byte maps to one pixel. The 24 bit RGB value corresponding to each
     * byte value is defined in the palette provided as extra argument.
     * The palette maximal size is 8, and it is recommended to use the smallest possible
     * palette size to optimize the size of data to be sent to the display.
     * The height of the pixmap is implicitely given by the pixmap buffer size.
     *
     * @param int $x : the distance from left of layer to the left of the pixmap, in pixels
     * @param int $y : the distance from top of layer to the top of the pixmap, in pixels
     * @param int $w : the width of the pixmap, in pixels
     * @param string $pixmap : a binary buffer where each byte maps to one pixel
     * @param Integer[] $palette : an array of 24-bit RGB values, defining the color for each byte value in pixmap
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function drawPixmap(int $x, int $y, int $w, string $pixmap, array $palette): int
    {
        // $gifimage               is a bin;
        $gifimage = $this->_display->gifEncode($pixmap, $palette, $w, false);
        return $this->drawGIF($x, $y, $gifimage);
    }

    /**
     * Moves the drawing pointer of this layer to the specified position.
     *
     * @param int $x : the distance from left of layer, in pixels
     * @param int $y : the distance from top of layer, in pixels
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function moveTo(int $x, int $y): int
    {
        return $this->command_push(sprintf('@%d,%d',$x,$y));
    }

    /**
     * Draws a line from current drawing pointer position to the specified position.
     * The specified destination pixel is included in the line. The pointer position
     * is then moved to the end point of the line.
     *
     * @param int $x : the distance from left of layer to the end point of the line, in pixels
     * @param int $y : the distance from top of layer to the end point of the line, in pixels
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function lineTo(int $x, int $y): int
    {
        return $this->command_flush(sprintf('-%d,%d',$x,$y));
    }

    /**
     * Starts drawing a polygon with the first corner at the specified position.
     *
     * @param int $x : the distance from left of layer, in pixels
     * @param int $y : the distance from top of layer, in pixels
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function polygonStart(int $x, int $y): int
    {
        $this->_polyPrevX = $x;
        $this->_polyPrevY = $y;
        return $this->command_push(sprintf('[%d,%d',$x,$y));
    }

    /**
     * Adds a point to the currently open polygon, previously opened using
     * polygonStart.
     *
     * @param int $x : the distance from left of layer to the new point, in pixels
     * @param int $y : the distance from top of layer to the new point, in pixels
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function polygonAdd(int $x, int $y): int
    {
        // $dx                     is a int;
        // $dy                     is a int;
        $dx = $x - $this->_polyPrevX;
        $dy = $y - $this->_polyPrevY;
        $this->_polyPrevX = $x;
        $this->_polyPrevY = $y;
        return $this->command_flush(sprintf(';%d,%d',$dx,$dy));
    }

    /**
     * Closes the currently open polygon, fill its content the fill color currently
     * selected for the layer, and draw its outline using the selected line color.
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function polygonEnd(): int
    {
        return $this->command_flush(']');
    }

    /**
     * Outputs a message in the console area, and advances the console pointer accordingly.
     * The console pointer position is automatically moved to the beginning
     * of the next line when a newline character is met, or when the right margin
     * is hit. When the new text to display extends below the lower margin, the
     * console area is automatically scrolled up.
     *
     * @param string $text : the message to display
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function consoleOut(string $text): int
    {
        // $textlen                is a int;
        // $destname               is a str;
        $textlen = strlen($text);
        if ($textlen > 60) {
            if ($textlen > 1000) {
                $this->_display->_throw(YAPI::INVALID_ARGUMENT, 'text too large (max 1000 characters)');
                return YAPI::INVALID_ARGUMENT;
            }
            $this->_display->flushLayers();
            $destname = sprintf('layer%d:!',$this->_id);
            return $this->_display->upload($destname,YAPI::Ystr2bin($text));
        }
        return $this->command_flush(sprintf('!%s%c',$text,27));
    }

    /**
     * Sets up display margins for the consoleOut function.
     *
     * @param int $x1 : the distance from left of layer to the left margin, in pixels
     * @param int $y1 : the distance from top of layer to the top margin, in pixels
     * @param int $x2 : the distance from left of layer to the right margin, in pixels
     * @param int $y2 : the distance from top of layer to the bottom margin, in pixels
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function setConsoleMargins(int $x1, int $y1, int $x2, int $y2): int
    {
        return $this->command_push(sprintf('m%d,%d,%d,%d',$x1,$y1,$x2,$y2));
    }

    /**
     * Sets up the background color used by the clearConsole function and by
     * the console scrolling feature.
     *
     * @param int $bgcol : the background gray level to use when scrolling (0 = black,
     *         255 = white), or -1 for transparent
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function setConsoleBackground(int $bgcol): int
    {
        return $this->command_push(sprintf('b%d',$bgcol));
    }

    /**
     * Sets up the wrapping behavior used by the consoleOut function.
     *
     * @param boolean $wordwrap : true to wrap only between words,
     *         false to wrap on the last column anyway.
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function setConsoleWordWrap(bool $wordwrap): int
    {
        return $this->command_push(sprintf('w%d',$wordwrap));
    }

    /**
     * Blanks the console area within console margins, and resets the console pointer
     * to the upper left corner of the console.
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function clearConsole(): int
    {
        return $this->command_flush('^');
    }

    /**
     * Sets the position of the layer relative to the display upper left corner.
     * When smooth scrolling is used, the display offset of the layer is
     * automatically updated during the next milliseconds to animate the move of the layer.
     *
     * @param int $x : the distance from left of display to the upper left corner of the layer
     * @param int $y : the distance from top of display to the upper left corner of the layer
     * @param int $scrollTime : number of milliseconds to use for smooth scrolling, or
     *         0 if the scrolling should be immediate.
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function setLayerPosition(int $x, int $y, int $scrollTime): int
    {
        return $this->command_flush(sprintf('#%d,%d,%d',$x,$y,$scrollTime));
    }

    /**
     * Hides the layer. The state of the layer is preserved but the layer is not displayed
     * on the screen until the next call to unhide(). Hiding the layer can positively
     * affect the drawing speed, since it postpones the rendering until all operations are
     * completed (double-buffering).
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function hide(): int
    {
        $this->command_push('h');
        $this->_hidden = true;
        return $this->flush_now();
    }

    /**
     * Shows the layer. Shows the layer again after a hide command.
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function unhide(): int
    {
        $this->_hidden = false;
        return $this->command_flush('s');
    }

    /**
     * Gets parent YDisplay. Returns the parent YDisplay object of the current YDisplayLayer::
     *
     * @return ?YDisplay  an YDisplay object
     */
    public function get_display(): ?YDisplay
    {
        return $this->_display;
    }

    /**
     * Returns the display width, in pixels.
     *
     * @return int  an integer corresponding to the display width, in pixels
     *
     * On failure, throws an exception or returns YDisplayLayer::DISPLAYWIDTH_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_displayWidth(): int
    {
        return $this->_display->get_displayWidth();
    }

    /**
     * Returns the display height, in pixels.
     *
     * @return int  an integer corresponding to the display height, in pixels
     *
     * On failure, throws an exception or returns YDisplayLayer::DISPLAYHEIGHT_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_displayHeight(): int
    {
        return $this->_display->get_displayHeight();
    }

    /**
     * Returns the width of the layers to draw on, in pixels.
     *
     * @return int  an integer corresponding to the width of the layers to draw on, in pixels
     *
     * On failure, throws an exception or returns YDisplayLayer::LAYERWIDTH_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_layerWidth(): int
    {
        return $this->_display->get_layerWidth();
    }

    /**
     * Returns the height of the layers to draw on, in pixels.
     *
     * @return int  an integer corresponding to the height of the layers to draw on, in pixels
     *
     * On failure, throws an exception or returns YDisplayLayer::LAYERHEIGHT_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_layerHeight(): int
    {
        return $this->_display->get_layerHeight();
    }

    //--- (end of generated code: YDisplayLayer implementation)
}

//^^^^ YDisplayLayer.php
//--- (generated code: YDisplay declaration)
//vvvv YDisplay.php

/**
 * YDisplay Class: display control interface, available for instance in the Yocto-Display, the
 * Yocto-MaxiDisplay, the Yocto-MaxiDisplay-G or the Yocto-MiniDisplay
 *
 * The YDisplay class allows to drive Yoctopuce displays.
 * Yoctopuce display interface has been designed to easily
 * show information and images. The device provides built-in
 * multi-layer rendering. Layers can be drawn offline, individually,
 * and freely moved on the display. It can also replay recorded
 * sequences (animations).
 *
 * In order to draw on the screen, you should use the
 * display.get_displayLayer method to retrieve the layer(s) on
 * which you want to draw, and then use methods defined in
 * YDisplayLayer to draw on the layers.
 */
class YDisplay extends YFunction
{
    const ENABLED_FALSE = 0;
    const ENABLED_TRUE = 1;
    const ENABLED_INVALID = -1;
    const STARTUPSEQ_INVALID = YAPI::INVALID_STRING;
    const BRIGHTNESS_INVALID = YAPI::INVALID_UINT;
    const AUTOINVERTDELAY_INVALID = YAPI::INVALID_UINT;
    const ORIENTATION_LEFT = 0;
    const ORIENTATION_UP = 1;
    const ORIENTATION_RIGHT = 2;
    const ORIENTATION_DOWN = 3;
    const ORIENTATION_INVALID = -1;
    const DISPLAYPANEL_INVALID = YAPI::INVALID_STRING;
    const DISPLAYWIDTH_INVALID = YAPI::INVALID_UINT;
    const DISPLAYHEIGHT_INVALID = YAPI::INVALID_UINT;
    const DISPLAYTYPE_MONO = 0;
    const DISPLAYTYPE_EPAPER_BW = 1;
    const DISPLAYTYPE_EPAPER_BWR = 2;
    const DISPLAYTYPE_EPAPER_BWRY = 3;
    const DISPLAYTYPE_INVALID = -1;
    const LAYERWIDTH_INVALID = YAPI::INVALID_UINT;
    const LAYERHEIGHT_INVALID = YAPI::INVALID_UINT;
    const LAYERCOUNT_INVALID = YAPI::INVALID_UINT;
    const COMMAND_INVALID = YAPI::INVALID_STRING;
    const FASTREFRESH_WHENEVER_POSSIBLE  = 0;
    const FASTREFRESH_WHENEVER_SUPPORTED = 1;
    const FASTREFRESH_NEVER              = 2;
    const FASTREFRESH_INVALID            = 3;
    const REGENERATE_ON_REQUEST_ONLY     = 0;
    const REGENERATE_EVERY_DAY           = 1;
    const REGENERATE_EVERY_12H           = 2;
    const REGENERATE_EVERY_6H            = 3;
    const REGENERATE_EVERY_3H            = 4;
    const REGENERATE_EVERY_2H            = 5;
    const REGENERATE_EVERY_HOUR          = 6;
    const REGENERATE_EVERY_30MIN         = 7;
    const REGENERATE_EVERY_15MIN         = 8;
    const REGENERATE_EVERY_480           = 9;
    const REGENERATE_EVERY_432           = 10;
    const REGENERATE_EVERY_360           = 11;
    const REGENERATE_EVERY_288           = 12;
    const REGENERATE_EVERY_240           = 13;
    const REGENERATE_EVERY_192           = 14;
    const REGENERATE_EVERY_144           = 15;
    const REGENERATE_EVERY_96            = 16;
    const REGENERATE_EVERY_48            = 17;
    const REGENERATE_EVERY_36            = 18;
    const REGENERATE_EVERY_24            = 19;
    const REGENERATE_EVERY_12            = 20;
    const REGENERATE_EVERY_10            = 21;
    const REGENERATE_EVERY_8             = 22;
    const REGENERATE_EVERY_6             = 23;
    const REGENERATE_EVERY_4             = 24;
    const REGENERATE_ALWAYS              = 25;
    const REGENERATE_INVALID             = 26;
    const DISPLAYSTATE_FAILURE           = 0;
    const DISPLAYSTATE_OFF               = 1;
    const DISPLAYSTATE_POWERING          = 2;
    const DISPLAYSTATE_IDLE              = 3;
    const DISPLAYSTATE_REFRESHING        = 4;
    const DISPLAYSTATE_INVALID           = 5;
    //--- (end of generated code: YDisplay declaration)

    //--- (generated code: YDisplay attributes)
    protected int $_enabled = self::ENABLED_INVALID;        // Bool
    protected string $_startupSeq = self::STARTUPSEQ_INVALID;     // Text
    protected int $_brightness = self::BRIGHTNESS_INVALID;     // Percent
    protected int $_autoInvertDelay = self::AUTOINVERTDELAY_INVALID; // UInt31
    protected int $_orientation = self::ORIENTATION_INVALID;    // DisplayOrientation
    protected string $_displayPanel = self::DISPLAYPANEL_INVALID;   // DisplayPanel
    protected int $_displayWidth = self::DISPLAYWIDTH_INVALID;   // UInt31
    protected int $_displayHeight = self::DISPLAYHEIGHT_INVALID;  // UInt31
    protected int $_displayType = self::DISPLAYTYPE_INVALID;    // DisplayType
    protected int $_layerWidth = self::LAYERWIDTH_INVALID;     // UInt31
    protected int $_layerHeight = self::LAYERHEIGHT_INVALID;    // UInt31
    protected int $_layerCount = self::LAYERCOUNT_INVALID;     // UInt31
    protected string $_command = self::COMMAND_INVALID;        // Text
    protected array $_allDisplayLayers = [];                           // YDisplayLayerArr
    protected float $_frozenUntil = 0;                            // u64
    protected bool $_recording = false;                        // bool
    protected string $_sequence = "";                           // str

    //--- (end of generated code: YDisplay attributes)

    function __construct(string $str_func)
    {
        //--- (generated code: YDisplay constructor)
        parent::__construct($str_func);
        $this->_className = 'Display';

        //--- (end of generated code: YDisplay constructor)
        $this->_recording = false;
        $this->_sequence = '';
    }

    //--- (generated code: YDisplay implementation)

    function _parseAttr(string $name, mixed $val): int
    {
        switch ($name) {
        case 'enabled':
            $this->_enabled = intval($val);
            return 1;
        case 'startupSeq':
            $this->_startupSeq = $val;
            return 1;
        case 'brightness':
            $this->_brightness = intval($val);
            return 1;
        case 'autoInvertDelay':
            $this->_autoInvertDelay = intval($val);
            return 1;
        case 'orientation':
            $this->_orientation = intval($val);
            return 1;
        case 'displayPanel':
            $this->_displayPanel = $val;
            return 1;
        case 'displayWidth':
            $this->_displayWidth = intval($val);
            return 1;
        case 'displayHeight':
            $this->_displayHeight = intval($val);
            return 1;
        case 'displayType':
            $this->_displayType = intval($val);
            return 1;
        case 'layerWidth':
            $this->_layerWidth = intval($val);
            return 1;
        case 'layerHeight':
            $this->_layerHeight = intval($val);
            return 1;
        case 'layerCount':
            $this->_layerCount = intval($val);
            return 1;
        case 'command':
            $this->_command = $val;
            return 1;
        }
        return parent::_parseAttr($name, $val);
    }

    /**
     * Returns true if the screen is powered, false otherwise.
     *
     * @return int  either YDisplay::ENABLED_FALSE or YDisplay::ENABLED_TRUE, according to true if the
     * screen is powered, false otherwise
     *
     * On failure, throws an exception or returns YDisplay::ENABLED_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_enabled(): int
    {
        // $res                    is a enumBOOL;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::ENABLED_INVALID;
            }
        }
        $res = $this->_enabled;
        return $res;
    }

    /**
     * Changes the power state of the display.
     *
     * @param int $newval : either YDisplay::ENABLED_FALSE or YDisplay::ENABLED_TRUE, according to the power
     * state of the display
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function set_enabled(int $newval): int
    {
        $rest_val = strval($newval);
        return $this->_setAttr("enabled", $rest_val);
    }

    /**
     * Returns the name of the sequence to play when the displayed is powered on.
     *
     * @return string  a string corresponding to the name of the sequence to play when the displayed is powered on
     *
     * On failure, throws an exception or returns YDisplay::STARTUPSEQ_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_startupSeq(): string
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::STARTUPSEQ_INVALID;
            }
        }
        $res = $this->_startupSeq;
        return $res;
    }

    /**
     * Changes the name of the sequence to play when the display is powered on.
     * Remember to call the saveToFlash() method of the module if the
     * modification must be kept.
     *
     * @param string $newval : a string corresponding to the name of the sequence to play when the display
     * is powered on
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function set_startupSeq(string $newval): int
    {
        $rest_val = $newval;
        return $this->_setAttr("startupSeq", $rest_val);
    }

    /**
     * Returns the luminosity of the  module informative LEDs (from 0 to 100).
     *
     * @return int  an integer corresponding to the luminosity of the  module informative LEDs (from 0 to 100)
     *
     * On failure, throws an exception or returns YDisplay::BRIGHTNESS_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_brightness(): int
    {
        // $res                    is a int;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::BRIGHTNESS_INVALID;
            }
        }
        $res = $this->_brightness;
        return $res;
    }

    /**
     * Changes the brightness of the display. The parameter is a value between 0 and
     * 100. Remember to call the saveToFlash() method of the module if the
     * modification must be kept.
     *
     * @param int $newval : an integer corresponding to the brightness of the display
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function set_brightness(int $newval): int
    {
        $rest_val = strval($newval);
        return $this->_setAttr("brightness", $rest_val);
    }

    /**
     * Returns the interval between automatic display inversions, or 0 if automatic
     * inversion is disabled. Using the automatic inversion mechanism reduces the
     * burn-in that occurs on OLED screens over long periods when the same content
     * remains displayed on the screen.
     *
     * @return int  an integer corresponding to the interval between automatic display inversions, or 0 if automatic
     *         inversion is disabled
     *
     * On failure, throws an exception or returns YDisplay::AUTOINVERTDELAY_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_autoInvertDelay(): int
    {
        // $res                    is a int;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::AUTOINVERTDELAY_INVALID;
            }
        }
        $res = $this->_autoInvertDelay;
        return $res;
    }

    /**
     * Changes the interval between automatic display inversions.
     * The parameter is the number of seconds, or 0 to disable automatic inversion.
     * Using the automatic inversion mechanism reduces the burn-in that occurs on OLED
     * screens over long periods when the same content remains displayed on the screen.
     * Remember to call the saveToFlash() method of the module if the
     * modification must be kept.
     *
     * @param int $newval : an integer corresponding to the interval between automatic display inversions
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function set_autoInvertDelay(int $newval): int
    {
        $rest_val = strval($newval);
        return $this->_setAttr("autoInvertDelay", $rest_val);
    }

    /**
     * Returns the currently selected display orientation. The orientation is defined as the side of the
     * screen where the
     * USB connector (for OLED displays) or the ribbon cable (for ePaper panels) is located when the
     * display is up straight.
     *
     * @return int  a value among YDisplay::ORIENTATION_LEFT, YDisplay::ORIENTATION_UP,
     * YDisplay::ORIENTATION_RIGHT and YDisplay::ORIENTATION_DOWN corresponding to the currently selected
     * display orientation
     *
     * On failure, throws an exception or returns YDisplay::ORIENTATION_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_orientation(): int
    {
        // $res                    is a enumDISPLAYORIENTATION;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::ORIENTATION_INVALID;
            }
        }
        $res = $this->_orientation;
        return $res;
    }

    /**
     * Changes the display orientation. he orientation is defined as the side of the screen where the
     * USB connector (for OLED displays) or the ribbon cable (for ePaper panels) is located when the
     * display is up straight. Remember to call the saveToFlash()
     * method of the module if the modification must be kept.
     *
     * @param int $newval : a value among YDisplay::ORIENTATION_LEFT, YDisplay::ORIENTATION_UP,
     * YDisplay::ORIENTATION_RIGHT and YDisplay::ORIENTATION_DOWN corresponding to the display orientation
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function set_orientation(int $newval): int
    {
        $rest_val = strval($newval);
        $res = $this->_setAttr("orientation", $rest_val);
        $this->_clearLazyCache();
        return $res;
    }

    /**
     * Returns the exact model of the display panel.
     *
     * @return string  a string corresponding to the exact model of the display panel
     *
     * On failure, throws an exception or returns YDisplay::DISPLAYPANEL_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_displayPanel(): string
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::DISPLAYPANEL_INVALID;
            }
        }
        $res = $this->_displayPanel;
        return $res;
    }

    /**
     * Changes the model of display to match the connected display panel.
     * Value examples:  "E2_266_KS0_C1" , "E2_290_QS_0F22 , "E2_370_KS_0C1", "E2_417_KS_0D0" etc..
     * This function has no effect if the module does not support the selected
     * display panel. Remember to call the saveToFlash()
     * method of the module if the modification must be kept.
     *
     * @param string $newval : a string corresponding to the model of display to match the connected display panel
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function set_displayPanel(string $newval): int
    {
        $rest_val = $newval;
        $res = $this->_setAttr("displayPanel", $rest_val);
        $this->_clearLazyCache();
        return $res;
    }

    /**
     * Returns the display width, in pixels.
     *
     * @return int  an integer corresponding to the display width, in pixels
     *
     * On failure, throws an exception or returns YDisplay::DISPLAYWIDTH_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_displayWidth(): int
    {
        // $res                    is a int;
        if ($this->_cacheExpiration == 0) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::DISPLAYWIDTH_INVALID;
            }
        }
        $res = $this->_displayWidth;
        return $res;
    }

    /**
     * Returns the display height, in pixels.
     *
     * @return int  an integer corresponding to the display height, in pixels
     *
     * On failure, throws an exception or returns YDisplay::DISPLAYHEIGHT_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_displayHeight(): int
    {
        // $res                    is a int;
        if ($this->_cacheExpiration == 0) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::DISPLAYHEIGHT_INVALID;
            }
        }
        $res = $this->_displayHeight;
        return $res;
    }

    /**
     * Returns the display type: monochrome OLED, black and white ePaper, color ePaper, and so on.
     *
     * @return int  a value among YDisplay::DISPLAYTYPE_MONO, YDisplay::DISPLAYTYPE_EPAPER_BW,
     * YDisplay::DISPLAYTYPE_EPAPER_BWR and YDisplay::DISPLAYTYPE_EPAPER_BWRY corresponding to the display
     * type: monochrome OLED, black and white ePaper, color ePaper, and so on
     *
     * On failure, throws an exception or returns YDisplay::DISPLAYTYPE_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_displayType(): int
    {
        // $res                    is a enumDISPLAYTYPE;
        if ($this->_cacheExpiration == 0) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::DISPLAYTYPE_INVALID;
            }
        }
        $res = $this->_displayType;
        return $res;
    }

    /**
     * Returns the width of the layers to draw on, in pixels.
     *
     * @return int  an integer corresponding to the width of the layers to draw on, in pixels
     *
     * On failure, throws an exception or returns YDisplay::LAYERWIDTH_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_layerWidth(): int
    {
        // $res                    is a int;
        if ($this->_cacheExpiration == 0) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::LAYERWIDTH_INVALID;
            }
        }
        $res = $this->_layerWidth;
        return $res;
    }

    /**
     * Returns the height of the layers to draw on, in pixels.
     *
     * @return int  an integer corresponding to the height of the layers to draw on, in pixels
     *
     * On failure, throws an exception or returns YDisplay::LAYERHEIGHT_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_layerHeight(): int
    {
        // $res                    is a int;
        if ($this->_cacheExpiration == 0) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::LAYERHEIGHT_INVALID;
            }
        }
        $res = $this->_layerHeight;
        return $res;
    }

    /**
     * Returns the number of available layers to draw on.
     *
     * @return int  an integer corresponding to the number of available layers to draw on
     *
     * On failure, throws an exception or returns YDisplay::LAYERCOUNT_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_layerCount(): int
    {
        // $res                    is a int;
        if ($this->_cacheExpiration == 0) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::LAYERCOUNT_INVALID;
            }
        }
        $res = $this->_layerCount;
        return $res;
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function get_command(): string
    {
        // $res                    is a string;
        if ($this->_cacheExpiration <= YAPI::GetTickCount()) {
            if ($this->load(YAPI::$_yapiContext->GetCacheValidity()) != YAPI::SUCCESS) {
                return self::COMMAND_INVALID;
            }
        }
        $res = $this->_command;
        return $res;
    }

    /**
     * @throws YAPI_Exception
     */
    public function set_command(string $newval): int
    {
        $rest_val = $newval;
        return $this->_setAttr("command", $rest_val);
    }

    /**
     * Retrieves a display for a given identifier.
     * The identifier can be specified using several formats:
     *
     * - FunctionLogicalName
     * - ModuleSerialNumber.FunctionIdentifier
     * - ModuleSerialNumber.FunctionLogicalName
     * - ModuleLogicalName.FunctionIdentifier
     * - ModuleLogicalName.FunctionLogicalName
     *
     *
     * This function does not require that the display is online at the time
     * it is invoked. The returned object is nevertheless valid.
     * Use the method isOnline() to test if the display is
     * indeed online at a given time. In case of ambiguity when looking for
     * a display by logical name, no error is notified: the first instance
     * found is returned. The search is performed first by hardware name,
     * then by logical name.
     *
     * If a call to this object's is_online() method returns FALSE although
     * you are certain that the matching device is plugged, make sure that you did
     * call registerHub() at application initialization time.
     *
     * @param string $func : a string that uniquely characterizes the display, for instance
     *         YD128X32.display.
     *
     * @return YDisplay  a YDisplay object allowing you to drive the display.
     */
    public static function FindDisplay(string $func): YDisplay
    {
        // $obj                    is a YDisplay;
        $obj = YFunction::_FindFromCache('Display', $func);
        if ($obj == null) {
            $obj = new YDisplay($func);
            YFunction::_AddToCache('Display', $func, $obj);
        }
        return $obj;
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function sendCommand(string $cmd): int
    {
        if (!($this->_recording)) {
            return $this->set_command($cmd);
        }
        $this->_sequence = sprintf('%s%s'."\n".'', $this->_sequence, $cmd);
        return YAPI::SUCCESS;
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function flushLayers(): int
    {
        foreach ($this->_allDisplayLayers as $ii_0) {
            if ($ii_0->must_be_flushed()) {
                $ii_0->flush_now();
            }
        }
        return YAPI::SUCCESS;
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function resetHiddenLayerFlags(): int
    {
        foreach ($this->_allDisplayLayers as $ii_0) {
            $ii_0->resetHiddenFlag();
        }
        return YAPI::SUCCESS;
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function isFrozen(): bool
    {
        if ($this->_frozenUntil == 0) {
            return false;
        }
        if ($this->_frozenUntil <= YAPI::GetTickCount()) {
            $this->_frozenUntil = 0;
            return false;
        }
        return true;
    }

    /**
     * Returns the fast refresh usage policy in use (ePaper displays only).
     * This setting is combined with the regenerate policy to determine when the screen
     * should be updated using a fast update versus or regenerated using a slower,
     * flickering full refresh.
     *
     * @return int  a value among the YDisplay::FASTREFRESH enumeration
     *         (YDisplay::FASTREFRESH_WHENEVER_POSSIBLE,
     *         YDisplay::FASTREFRESH_WHENEVER_SUPPORTED,
     *         YDisplay::FASTREFRESH_NEVER).
     *
     * On failure, throws an exception or returns YDisplay::FASTREFRESH_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_fastRefreshPolicy(): int
    {
        // $combined               is a int;
        // $fmod                   is a int;
        $combined = $this->get_brightness();
        if ($combined < 0) {
            return self::FASTREFRESH_INVALID;
        }
        $fmod = intVal($combined / 25);
        if ($fmod >= 2) {
            $fmod = $fmod - 2;
        }
        return $fmod;
    }

    /**
     * Returns the display regeneration minimal frequency (ePaper displays only).
     * This setting is combined with the fast refresh usage policy to determine
     * when the screen should be updated using a fast update versus or regenerated
     * using a slower, flickering full refresh. To change the display regeneration minimal
     * frequency, use methode set_fastRefreshPolicy().
     *
     * @return int  a value among the YDisplay::REGENERATE enumeration
     *         (YDisplay::REGENERATE_ON_REQUEST_ONLY,
     *         YDisplay::REGENERATE_EVERY_DAY, YDisplay::REGENERATE_EVERY_12H,
     *         YDisplay::REGENERATE_EVERY_6H, YDisplay::REGENERATE_EVERY_3H,
     *         YDisplay::REGENERATE_EVERY_2H, YDisplay::REGENERATE_EVERY_HOUR,
     *         YDisplay::REGENERATE_EVERY_30MIN, YDisplay::REGENERATE_EVERY_15MIN,
     *         YDisplay::REGENERATE_EVERY_480, YDisplay::REGENERATE_EVERY_432,
     *         YDisplay::REGENERATE_EVERY_360, YDisplay::REGENERATE_EVERY_288,
     *         YDisplay::REGENERATE_EVERY_240, YDisplay::REGENERATE_EVERY_192,
     *         YDisplay::REGENERATE_EVERY_144, YDisplay::REGENERATE_EVERY_96,
     *         YDisplay::REGENERATE_EVERY_48, YDisplay::REGENERATE_EVERY_36,
     *         YDisplay::REGENERATE_EVERY_24, YDisplay::REGENERATE_EVERY_12,
     *         YDisplay::REGENERATE_EVERY_10, YDisplay::REGENERATE_EVERY_8,
     *         YDisplay::REGENERATE_EVERY_6, YDisplay::REGENERATE_EVERY_4,
     *         YDisplay::REGENERATE_ALWAYS).
     *
     * On failure, throws an exception or returns YDisplay::REGENERATE_INVALID.
     * @throws YAPI_Exception on error
     */
    public function get_regeneratePolicy(): int
    {
        // $combined               is a int;
        // $fval                   is a int;
        $combined= $this->get_brightness();
        if ($combined < 0) {
            return self::REGENERATE_INVALID;
        }
        if ($combined >= 100) {
            $fval = 25;
        } else {
            $fval = ($combined % 25);
        }
        return $fval;
    }

    /**
     * Changes the fast refresh usage policy and display regeneration minimal frequency
     * (ePaper displays only). These settings jointly determine when the screen should be
     * updated using a fast update versus or regenerated using a slower, flickering full
     * refresh.
     *
     * @param fastRefresh : a value among the YDisplay::FASTREFRESH enumeration
     *         (YDisplay::FASTREFRESH_WHENEVER_POSSIBLE,
     *         YDisplay::FASTREFRESH_WHENEVER_SUPPORTED,
     *         YDisplay::FASTREFRESH_NEVER),
     *         corresponding to the policy for using fast refresh.
     * @param regenerate : a value among the enumeration YRefFrame.REGENERATE
     *         (YDisplay::REGENERATE_ON_REQUEST_ONLY,
     *         YDisplay::REGENERATE_EVERY_DAY, YDisplay::REGENERATE_EVERY_12H,
     *         YDisplay::REGENERATE_EVERY_6H, YDisplay::REGENERATE_EVERY_3H,
     *         YDisplay::REGENERATE_EVERY_2H, YDisplay::REGENERATE_EVERY_HOUR,
     *         YDisplay::REGENERATE_EVERY_30MIN, YDisplay::REGENERATE_EVERY_15MIN,
     *         YDisplay::REGENERATE_EVERY_480, YDisplay::REGENERATE_EVERY_432,
     *         YDisplay::REGENERATE_EVERY_360, YDisplay::REGENERATE_EVERY_288,
     *         YDisplay::REGENERATE_EVERY_240, YDisplay::REGENERATE_EVERY_192,
     *         YDisplay::REGENERATE_EVERY_144, YDisplay::REGENERATE_EVERY_96,
     *         YDisplay::REGENERATE_EVERY_48, YDisplay::REGENERATE_EVERY_36,
     *         YDisplay::REGENERATE_EVERY_24, YDisplay::REGENERATE_EVERY_12,
     *         YDisplay::REGENERATE_EVERY_10, YDisplay::REGENERATE_EVERY_8,
     *         YDisplay::REGENERATE_EVERY_6, YDisplay::REGENERATE_EVERY_4,
     *         YDisplay::REGENERATE_ALWAYS),
     *         corresponding to the display minimal regeneration frequency.
     *
     * Remember to call the saveToFlash()
     * method of the module if the modification must be kept.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function set_fastRefreshPolicy(int $fastRefresh, int $regenerate): int
    {
        // $combined               is a int;
        // $fmod                   is a int;
        // $fval                   is a int;
        $fmod = $fastRefresh;
        $fval = $regenerate;
        if (($fval == 25) || ($fmod == 2)) {
            $combined = 100;
        } else {
            $combined = 50 + $fmod * 25 + $fval;
        }
        return $this->set_brightness($combined);
    }

    /**
     * Clears the display screen and resets all display layers to their default state.
     * Using this function in a sequence will kill the sequence play-back. Do not use that
     * function to reset the display at sequence start-up.
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function resetAll(): int
    {
        $this->flushLayers();
        $this->resetHiddenLayerFlags();
        return $this->sendCommand('Z');
    }

    /**
     * Forces an ePaper screen to perform a regenerative update using the slow
     * update method. Periodic use of the slow method (total panel update with
     * multiple inversions) prevents ghosting effects and improves contrast.
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function regenerateDisplay(): int
    {
        return $this->sendCommand('z');
    }

    /**
     * Returns the current state of an ePaper display, specifically to
     * determine whether an update is in progress or whether a
     * configuration issue has been detected. If a display configuration
     * error has been detected, the error message can be retrieved.
     *
     * @param string $errmsg : a string passed by reference to receive the error message.
     *
     * @return int  a value among the enumeration YDisplay::DISPLAYSTATE
     *         (YDisplay::DISPLAYSTATE_FAILURE, YDisplay::DISPLAYSTATE_OFF,
     *         YDisplay::DISPLAYSTATE_POWERING, YDisplay::DISPLAYSTATE_IDLE,
     *         YDisplay::DISPLAYSTATE_REFRESHING)
     *         corresponding to the current display state.
     */
    public function get_ePaperState(string &$errmsg): int
    {
        // $json                   is a bin;
        // $dispError              is a str;
        // $dispState              is a int;

        if ($this->get_displayType() == self::DISPLAYTYPE_MONO) {
            $errmsg = 'Not an ePaper display';
            return 0;
        }
        $json = $this->_download('disp.json');
        if (strlen($json) == 0) {
            $errmsg = $this->get_errorMessage();
            return 0;
        } else {
            $dispError = $this->_json_get_string($this->_get_json_path($json, 'err'));
            $errmsg = $dispError;
            if (strlen($dispError) > 0) {
                return 0;
            }
            $dispState = intVal($this->_json_get_key($json, 'state'));
            if ($dispState > 10) {
                return 4;
            }
            if ($dispState == 10) {
                return 3;
            }
            if ($dispState > 0) {
                return 2;
            }
        }
        return 1;
    }

    /**
     * Disables screen refresh for a short period of time. The combination of
     * postponeRefresh and triggerRefresh can be used as an
     * alternative to double-buffering to avoid flickering during display updates.
     *
     * @param int $duration : duration of deactivation in milliseconds (max. 30 seconds)
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function postponeRefresh(int $duration): int
    {
        $this->_frozenUntil = YAPI::GetTickCount() + $duration;
        return $this->sendCommand(sprintf('H%d',$duration));
    }

    /**
     * Triggers an immediate screen refresh. The combination of
     * postponeRefresh and triggerRefresh can be used as an
     * alternative to double-buffering to avoid flickering during display updates.
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function triggerRefresh(): int
    {
        $this->_frozenUntil = 0;
        $this->flushLayers();
        return $this->sendCommand('H0');
    }

    /**
     * Smoothly changes the brightness of the screen to produce a fade-in or fade-out
     * effect.
     *
     * @param int $brightness : the new screen brightness
     * @param int $duration : duration of the brightness transition, in milliseconds.
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function fade(int $brightness, int $duration): int
    {
        $this->flushLayers();
        return $this->sendCommand(sprintf('+%d,%d',$brightness,$duration));
    }

    /**
     * Starts to record all display commands into a sequence, for later replay.
     * The name used to store the sequence is specified when calling
     * saveSequence(), once the recording is complete.
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function newSequence(): int
    {
        $this->flushLayers();
        $this->_sequence = '';
        $this->_recording = true;
        return YAPI::SUCCESS;
    }

    /**
     * Stops recording display commands and saves the sequence into the specified
     * file on the display internal memory. The sequence can be later replayed
     * using playSequence().
     *
     * @param string $sequenceName : the name of the newly created sequence
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function saveSequence(string $sequenceName): int
    {
        $this->flushLayers();
        $this->_recording = false;
        $this->_upload($sequenceName, YAPI::Ystr2bin($this->_sequence));
        //We need to use YPRINTF("") for Objective-C
        $this->_sequence = sprintf('');
        return YAPI::SUCCESS;
    }

    /**
     * Replays a display sequence previously recorded using
     * newSequence() and saveSequence().
     *
     * @param string $sequenceName : the name of the newly created sequence
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function playSequence(string $sequenceName): int
    {
        $this->flushLayers();
        return $this->sendCommand(sprintf('S%s',$sequenceName));
    }

    /**
     * Waits for a specified delay (in milliseconds) before playing next
     * commands in current sequence. This method can be used while
     * recording a display sequence, to insert a timed wait in the sequence
     * (without any immediate effect). It can also be used dynamically while
     * playing a pre-recorded sequence, to suspend or resume the execution of
     * the sequence. To cancel a delay, call the same method with a zero delay.
     *
     * @param int $delay_ms : the duration to wait, in milliseconds
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function pauseSequence(int $delay_ms): int
    {
        $this->flushLayers();
        return $this->sendCommand(sprintf('W%d',$delay_ms));
    }

    /**
     * Stops immediately any ongoing sequence replay.
     * The display is left as is.
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function stopSequence(): int
    {
        $this->flushLayers();
        return $this->sendCommand('S');
    }

    /**
     * Uploads an arbitrary file (for instance a GIF file) to the display, to the
     * specified full path name. If a file already exists with the same path name,
     * its content is overwritten.
     *
     * @param string $pathname : path and name of the new file to create
     * @param string $content : binary buffer with the content to set
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function upload(string $pathname, string $content): int
    {
        $this->flushLayers();
        return $this->_upload($pathname, $content);
    }

    /**
     * Copies the whole content of a layer to another layer. The color and transparency
     * of all the pixels from the destination layer are set to match the source pixels.
     * This method only affects the displayed content, but does not change any
     * property of the layer object.
     * Note that layer 0 has no transparency support (it is always completely opaque).
     *
     * @param int $srcLayerId : the identifier of the source layer (a number in range 0..layerCount-1)
     * @param int $dstLayerId : the identifier of the destination layer (a number in range 0..layerCount-1)
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function copyLayerContent(int $srcLayerId, int $dstLayerId): int
    {
        $this->flushLayers();
        return $this->sendCommand(sprintf('o%d,%d',$srcLayerId,$dstLayerId));
    }

    /**
     * Swaps the whole content of two layers. The color and transparency of all the pixels from
     * the two layers are swapped. This method only affects the displayed content, but does
     * not change any property of the layer objects. In particular, the visibility of each
     * layer stays unchanged. When used between one hidden layer and a visible layer,
     * this method makes it possible to easily implement double-buffering.
     * Note that layer 0 has no transparency support (it is always completely opaque).
     *
     * @param int $layerIdA : the first layer (a number in range 0..layerCount-1)
     * @param int $layerIdB : the second layer (a number in range 0..layerCount-1)
     *
     * @return int  YAPI::SUCCESS if the call succeeds.
     *
     * On failure, throws an exception or returns a negative error code.
     * @throws YAPI_Exception on error
     */
    public function swapLayerContent(int $layerIdA, int $layerIdB): int
    {
        $this->flushLayers();
        return $this->sendCommand(sprintf('E%d,%d',$layerIdA,$layerIdB));
    }

    /**
     * Returns a YDisplayLayer object that can be used to draw on the specified
     * layer. The content is displayed only when the layer is active on the
     * screen (and not masked by other overlapping layers).
     *
     * @param int $layerId : the identifier of the layer (a number in range 0..layerCount-1)
     *
     * @return ?YDisplayLayer  an YDisplayLayer object
     *
     * On failure, throws an exception or returns null.
     * @throws YAPI_Exception on error
     */
    public function get_displayLayer(int $layerId): ?YDisplayLayer
    {
        // $layercount             is a int;
        // $idx                    is a int;
        $layercount = $this->get_layerCount();
        if (!(($layerId >= 0) && ($layerId < $layercount))) return $this->_throw(YAPI::INVALID_ARGUMENT,'invalid DisplayLayer index',null);
        if (sizeof($this->_allDisplayLayers) == 0) {
            $idx = 0;
            while ($idx < $layercount) {
                $this->_allDisplayLayers[] = new YDisplayLayer($this, $idx);
                $idx = $idx + 1;
            }
        }
        return $this->_allDisplayLayers[$layerId];
    }

    /**
     * Returns a color image with the current content of the display.
     * The image is returned as a binary object, where each byte represents a pixel,
     * from left to right and from top to bottom. The palette used to map byte
     * values to RGB colors is filled into the list provided as argument.
     * In all cases, the first palette entry (value 0) corresponds to the
     * screen default background color.
     * The image dimensions are given by the display width and height.
     *
     * @param Integer[] $palette : a list to be filled with the image palette
     *
     * @return string  a binary object if the call succeeds.
     *
     * On failure, throws an exception or returns an empty binary object.
     * @throws YAPI_Exception on error
     */
    public function readDisplay(array $palette): string
    {
        // $zipmap                 is a bin;
        // $zipsize                is a int;
        // $zipwidth               is a int;
        // $zipheight              is a int;
        // $ziprotate              is a int;
        // $zipcolors              is a int;
        // $zipcol                 is a int;
        // $zipbits                is a int;
        // $zipmask                is a int;
        // $srcpos                 is a int;
        // $endrun                 is a int;
        // $srcpat                 is a int;
        // $srcbit                 is a int;
        // $srcval                 is a int;
        // $srcx                   is a int;
        // $srcy                   is a int;
        // $srci                   is a int;
        // $pixmap                 is a bin;
        // $pixcount               is a int;
        // $pixval                 is a int;
        // $pixpos                 is a int;
        // $rotmap                 is a bin;
        $pixmap = '';
        // Check if the display firmware has autoInvertDelay and pixels.bin support

        if ($this->get_autoInvertDelay() < 0) {
            // Old firmware, use uncompressed GIF output to rebuild pixmap
            $zipmap = $this->_download('display.gif');
            $zipsize = strlen($zipmap);
            if ($zipsize == 0) {
                return $pixmap;
            }
            if (!($zipsize >= 32)) return $this->_throw(YAPI::IO_ERROR,'not a GIF image',$pixmap);
            if (!((ord($zipmap[0]) == 71) && (ord($zipmap[2]) == 70))) return $this->_throw(YAPI::INVALID_ARGUMENT,'not a GIF image',$pixmap);
            $zipwidth = ord($zipmap[6]) + 256 * ord($zipmap[7]);
            $zipheight = ord($zipmap[8]) + 256 * ord($zipmap[9]);
            while (sizeof($palette) > 0) {
                array_pop($palette);
            };
            $zipcol = ord($zipmap[13]) * 65536 + ord($zipmap[14]) * 256 + ord($zipmap[15]);
            $palette[] = $zipcol;
            $zipcol = ord($zipmap[16]) * 65536 + ord($zipmap[17]) * 256 + ord($zipmap[18]);
            $palette[] = $zipcol;
            $pixcount = $zipwidth * $zipheight;
            $pixmap = ($pixcount > 0 ? pack('C',array_fill(0, $pixcount, 0)) : '');
            $pixpos = 0;
            $srcpos = 30;
            $zipsize = $zipsize - 2;
            while ($srcpos < $zipsize) {
                // load next run size
                $endrun = $srcpos + 1 + ord($zipmap[$srcpos]);
                $srcpos = $srcpos + 1;
                while ($srcpos < $endrun) {
                    $srcval = ord($zipmap[$srcpos]);
                    $srcpos = $srcpos + 1;
                    $srcbit = 8;
                    while ($srcbit != 0) {
                        if ($srcbit < 3) {
                            $srcval = $srcval + (ord($zipmap[$srcpos]) << $srcbit);
                            $srcpos = $srcpos + 1;
                        }
                        $pixval = ($srcval & 7);
                        $srcval = ($srcval >> 3);
                        if (!(($pixval > 1) && ($pixval != 4))) return $this->_throw(YAPI::INVALID_ARGUMENT,'unexpected encoding',$pixmap);
                        $pixmap[$pixpos] = pack('C', $pixval);
                        $pixpos = $pixpos + 1;
                        $srcbit = $srcbit - 3;
                    }
                }
            }
            return $pixmap;
        }
        // New firmware, use compressed pixels.bin
        $zipmap = $this->_download('pixels.bin');
        $zipsize = strlen($zipmap);
        if ($zipsize == 0) {
            return $pixmap;
        }
        if (!($zipsize >= 16)) return $this->_throw(YAPI::IO_ERROR,'not a pixmap',$pixmap);
        if (!((ord($zipmap[0]) == 80) && (ord($zipmap[2]) == 88))) return $this->_throw(YAPI::INVALID_ARGUMENT,'not a pixmap',$pixmap);
        $zipwidth = ord($zipmap[4]) + 256 * ord($zipmap[5]);
        $zipheight = ord($zipmap[6]) + 256 * ord($zipmap[7]);
        $ziprotate = ord($zipmap[8]);
        $zipcolors = ord($zipmap[9]);
        while (sizeof($palette) > 0) {
            array_pop($palette);
        };
        $srcpos = 10;
        $srci = 0;
        while ($srci < $zipcolors) {
            $zipcol = ord($zipmap[$srcpos]) * 65536 + ord($zipmap[$srcpos+1]) * 256 + ord($zipmap[$srcpos+2]);
            $palette[] = $zipcol;
            $srcpos = $srcpos + 3;
            $srci = $srci + 1;
        }
        $zipbits = 1;
        while ((1 << $zipbits) < $zipcolors) {
            $zipbits = $zipbits + 1;
        }
        $zipmask = (1 << $zipbits) - 1;
        $pixcount = $zipwidth * $zipheight;
        $pixmap = ($pixcount > 0 ? pack('C',array_fill(0, $pixcount, 0)) : '');
        $srcx = 0;
        $srcy = 0;
        $srcval = 0;
        while ($srcpos < $zipsize) {
            // load next compression pattern byte
            $srcpat = ord($zipmap[$srcpos]);
            $srcpos = $srcpos + 1;
            $srcbit = 7;
            while ($srcbit >= 0) {
                // get next bitmap byte
                if (($srcpat & 128) != 0) {
                    $srcval = ord($zipmap[$srcpos]);
                    $srcpos = $srcpos + 1;
                    if ($zipbits > 1) {
                        $srcval = ($srcval << 8) + ord($zipmap[$srcpos]);
                        $srcpos = $srcpos + 1;
                    }
                }
                $srcpat = ($srcpat << 1);
                $pixpos = $srcy * $zipwidth + $srcx;
                // produce 8 pixels
                $srci = 7 * $zipbits;
                while ($srci >= 0) {
                    $pixval = (($srcval >> $srci) & $zipmask);
                    $pixmap[$pixpos] = pack('C', $pixval);
                    $pixpos = $pixpos + 1;
                    $srci = $srci - $zipbits;
                }
                $srcy = $srcy + 1;
                if ($srcy >= $zipheight) {
                    $srcy = 0;
                    $srcx = $srcx + 8;
                    // drop last bytes if image is not a multiple of 8
                    if ($srcx >= $zipwidth) {
                        $srcbit = 0;
                    }
                }
                $srcbit = $srcbit - 1;
            }
        }
        // rotate pixmap to match display orientation
        if ($ziprotate == 0) {
            return $pixmap;
        }
        if (($ziprotate & 2) != 0) {
            // rotate buffer 180 degrees by swapping pixels
            $srcpos = 0;
            $pixpos = $pixcount - 1;
            while ($srcpos < $pixpos) {
                $pixval = ord($pixmap[$srcpos]);
                $pixmap[$srcpos] = pack('C', ord($pixmap[$pixpos]));
                $pixmap[$pixpos] = pack('C', $pixval);
                $srcpos = $srcpos + 1;
                $pixpos = $pixpos - 1;
            }
        }
        if (($ziprotate & 1) == 0) {
            return $pixmap;
        }
        // rotate 90 ccw: first pixel is bottom left
        $rotmap = ($pixcount > 0 ? pack('C',array_fill(0, $pixcount, 0)) : '');
        $srcx = 0;
        $srcy = $zipwidth - 1;
        $srcpos = 0;
        while ($srcpos < $pixcount) {
            $pixval = ord($pixmap[$srcpos]);
            $pixpos = $srcy * $zipheight + $srcx;
            $rotmap[$pixpos] = pack('C', $pixval);
            $srcy = $srcy - 1;
            if ($srcy < 0) {
                $srcx = $srcx + 1;
                $srcy = $zipwidth - 1;
            }
            $srcpos = $srcpos + 1;
        }
        return $rotmap;
    }

    /**
     * @throws YAPI_Exception on error
     */
    public function gifEncode(string $pixmap, array $palette, int $w, bool $shortHdr): string
    {
        // $minCodeSize            is a int;
        // $LZW_CLRCODE            is a int;
        // $LZW_ENDCODE            is a int;
        // $LZW_1STCODE            is a int;
        // $codeSize               is a int;
        // $maxCode                is a int;
        $codes = [];            // intArr;
        // $nCodes                 is a int;
        // $pixmapSize             is a int;
        // $dataStream             is a bin;
        // $blockStart             is a int;
        // $blockEnd               is a int;
        // $prevCode               is a int;
        // $pixPos                 is a int;
        // $wrBits                 is a int;
        // $wrBitCnt               is a int;
        // $outPos                 is a int;
        // $nextVal                is a int;
        // $i                      is a int;
        // $hdrSize                is a int;
        // $res                    is a bin;
        // $h                      is a int;

        if (sizeof($palette) > 8) {
            $this->_throw(YAPI::INVALID_ARGUMENT, 'Palette should have no more than 8 colors');
            $res = '';
            return $res;
        }
        if (sizeof($palette) <= 4) {
            $minCodeSize = 2;
        } else {
            $minCodeSize = 3;
        }
        $LZW_CLRCODE = (1 << $minCodeSize);
        $LZW_ENDCODE = $LZW_CLRCODE + 1;
        $LZW_1STCODE = $LZW_ENDCODE + 1;
        $codeSize = $minCodeSize + 1;
        $maxCode = (1 << $codeSize) - 1 - $LZW_1STCODE;
        while (sizeof($codes) > 0) {
            array_pop($codes);
        };
        $nCodes = 0;
        $pixmapSize = strlen($pixmap);
        $dataStream = (intVal((2 * $pixmapSize) / 3) + 8 > 0 ? pack('C',array_fill(0, intVal((2 * $pixmapSize) / 3) + 8, 0)) : '');
        $outPos = 0;
        $wrBits = $LZW_CLRCODE;
        $wrBitCnt = 3;
        // prefetch first byte
        $prevCode = ord($pixmap[0]);
        $pixPos = 1;
        while ($pixPos < $pixmapSize + 3) {
            $blockStart = $outPos;
            $outPos = $blockStart + 1;
            $blockEnd = $blockStart + 256;
            // flush any carry-over output byte from previous data sub-block
            while ($wrBitCnt >= 8) {
                $dataStream[$outPos] = pack('C', ($wrBits & 0xff));
                $outPos = $outPos + 1;
                $wrBits = ($wrBits >> 8);
                $wrBitCnt = $wrBitCnt - 8;
            }
            while (($outPos < $blockEnd) && ($pixPos < $pixmapSize)) {
                // search for an existing code matching the running input segment
                // printf("[%d] ", rdBits >> 12);
                $nextVal = ($prevCode | (ord($pixmap[$pixPos]) << 12));
                $pixPos = $pixPos + 1;
                if ($prevCode < $LZW_1STCODE) {
                    $i = 0;
                } else {
                    $i = $prevCode - $LZW_ENDCODE;
                }
                while (($i < $nCodes) && ($codes[$i] != $nextVal)) {
                    $i = $i + 1;
                }
                if ($i >= $nCodes) {
                    // not found, emit prevCode and create new code
                    $wrBits = ($wrBits | ($prevCode << $wrBitCnt));
                    $wrBitCnt = $wrBitCnt + $codeSize;
                    if ($nCodes <= $maxCode) {
                        //fprintf(stderr, "#%d: #%d + %d\n", nextCode, nextVal & 63, nextVal >> 6);
                        $codes[] = $nextVal;
                        $nCodes = $nCodes + 1;
                    } else {
                        $codeSize = $codeSize + 1;
                        if ($codeSize <= 12) {
                            //fprintf(stderr, "#%d: #%d + %d\n", nextCode, nextVal & 63, nextVal >> 6);
                            $codes[] = $nextVal;
                            $nCodes = $nCodes + 1;
                        } else {
                            $wrBits = ($wrBits | ($LZW_CLRCODE << $wrBitCnt));
                            $wrBitCnt = $wrBitCnt + $codeSize;
                            while (sizeof($codes) > 0) {
                                array_pop($codes);
                            };
                            $nCodes = 0;
                            $codeSize = $minCodeSize + 1;
                        }
                        $maxCode = (1 << $codeSize) - 1 - $LZW_1STCODE;
                    }
                    // flush one (or two) codes to output stream
                    while (($wrBitCnt >= 8) && ($outPos < $blockEnd)) {
                        $dataStream[$outPos] = pack('C', ($wrBits & 0xff));
                        $outPos = $outPos + 1;
                        $wrBits = ($wrBits >> 8);
                        $wrBitCnt = $wrBitCnt - 8;
                    }
                    $prevCode = ($nextVal >> 12);
                } else {
                    $prevCode = $i + $LZW_1STCODE;
                }
            }
            if ($pixPos >= $pixmapSize) {
                if (($outPos < $blockEnd) && ($pixPos == $pixmapSize)) {
                    // append code for last run
                    $wrBits = ($wrBits | ($prevCode << $wrBitCnt));
                    $wrBitCnt = $wrBitCnt + $codeSize;
                    while (($wrBitCnt >= 8) && ($outPos < $blockEnd)) {
                        $dataStream[$outPos] = pack('C', ($wrBits & 0xff));
                        $outPos = $outPos + 1;
                        $wrBits = ($wrBits >> 8);
                        $wrBitCnt = $wrBitCnt - 8;
                    }
                    $pixPos = $pixPos + 1;
                }
                if (($outPos < $blockEnd) && ($pixPos == $pixmapSize + 1)) {
                    // append end code
                    $wrBits = ($wrBits | ($LZW_ENDCODE << $wrBitCnt));
                    $wrBitCnt = $wrBitCnt + $codeSize;
                    while (($wrBitCnt >= 8) && ($outPos < $blockEnd)) {
                        $dataStream[$outPos] = pack('C', ($wrBits & 0xff));
                        $outPos = $outPos + 1;
                        $wrBits = ($wrBits >> 8);
                        $wrBitCnt = $wrBitCnt - 8;
                    }
                    $pixPos = $pixPos + 1;
                }
                if (($outPos < $blockEnd) && ($pixPos == $pixmapSize + 2)) {
                    // flush last 0-7 bits
                    if ($wrBitCnt > 0) {
                        $dataStream[$outPos] = pack('C', ($wrBits & 0xff));
                        $outPos = $outPos + 1;
                        $wrBitCnt = 0;
                    }
                    $pixPos = $pixPos + 1;
                }
            }
            $dataStream[$blockStart] = pack('C', $outPos - ($blockStart + 1));
        }
        $blockEnd = $outPos;
        // Now write final buffer
        $hdrSize = 24 + $LZW_CLRCODE * 3;
        $res = ($hdrSize + $outPos + 2 > 0 ? pack('C',array_fill(0, $hdrSize + $outPos + 2, 0)) : '');
        // GIF89a header
        $res[0x00] = pack('C', 0x47);
        $res[0x01] = pack('C', 0x49);
        $res[0x02] = pack('C', 0x46);
        $res[0x03] = pack('C', 0x38);
        $res[0x04] = pack('C', 0x39);
        $res[0x05] = pack('C', 0x61);
        // Logical screen descriptor
        $h = intVal(strlen($pixmap) / $w);
        $res[0x06] = pack('C', ($w & 0xff));
        $res[0x07] = pack('C', ($w >> 8));
        $res[0x08] = pack('C', ($h & 0xff));
        $res[0x09] = pack('C', ($h >> 8));
        $res[0x0a] = pack('C', 0xf0 + $minCodeSize - 1);
        $res[0x0b] = pack('C', 0);
        $res[0x0c] = pack('C', 0);
        // Palette
        $outPos = 0x0d;
        $i = 0;
        while ($i < $LZW_CLRCODE) {
            if ($i < sizeof($palette)) {
                $wrBits = $palette[$i];
                $res[$outPos] = pack('C', (($wrBits >> 16) & 0xff));
                $res[$outPos + 1] = pack('C', (($wrBits >> 8) & 0xff));
                $res[$outPos + 2] = pack('C', ($wrBits & 0xff));
            }
            $outPos = $outPos + 3;
            $i = $i + 1;
        }
        // Image descriptor
        $res[$outPos] = pack('C', 0x2c);
        $res[$outPos + 5] = pack('C', ($w & 0xff));
        $res[$outPos + 6] = pack('C', ($w >> 8));
        $res[$outPos + 7] = pack('C', ($h & 0xff));
        $res[$outPos + 8] = pack('C', ($h >> 8));
        $outPos = $outPos + 10;
        // Prepare to append Image data
        $res[$outPos] = pack('C', $minCodeSize);
        $i = 0;
        while ($i < $blockEnd) {
            $outPos = $outPos + 1;
            $res[$outPos] = pack('C', ord($dataStream[$i]));
            $i = $i + 1;
        }
        // Append zero-block and trailer
        $outPos = $outPos + 1;
        $res[$outPos] = pack('C', 0);
        $outPos = $outPos + 1;
        $res[$outPos] = pack('C', 0x3b);
        return $res;
    }

    /**
     * @throws YAPI_Exception
     */
    public function enabled(): int
{
    return $this->get_enabled();
}

    /**
     * @throws YAPI_Exception
     */
    public function setEnabled(int $newval): int
{
    return $this->set_enabled($newval);
}

    /**
     * @throws YAPI_Exception
     */
    public function startupSeq(): string
{
    return $this->get_startupSeq();
}

    /**
     * @throws YAPI_Exception
     */
    public function setStartupSeq(string $newval): int
{
    return $this->set_startupSeq($newval);
}

    /**
     * @throws YAPI_Exception
     */
    public function brightness(): int
{
    return $this->get_brightness();
}

    /**
     * @throws YAPI_Exception
     */
    public function setBrightness(int $newval): int
{
    return $this->set_brightness($newval);
}

    /**
     * @throws YAPI_Exception
     */
    public function autoInvertDelay(): int
{
    return $this->get_autoInvertDelay();
}

    /**
     * @throws YAPI_Exception
     */
    public function setAutoInvertDelay(int $newval): int
{
    return $this->set_autoInvertDelay($newval);
}

    /**
     * @throws YAPI_Exception
     */
    public function orientation(): int
{
    return $this->get_orientation();
}

    /**
     * @throws YAPI_Exception
     */
    public function setOrientation(int $newval): int
{
    return $this->set_orientation($newval);
}

    /**
     * @throws YAPI_Exception
     */
    public function displayPanel(): string
{
    return $this->get_displayPanel();
}

    /**
     * @throws YAPI_Exception
     */
    public function setDisplayPanel(string $newval): int
{
    return $this->set_displayPanel($newval);
}

    /**
     * @throws YAPI_Exception
     */
    public function displayWidth(): int
{
    return $this->get_displayWidth();
}

    /**
     * @throws YAPI_Exception
     */
    public function displayHeight(): int
{
    return $this->get_displayHeight();
}

    /**
     * @throws YAPI_Exception
     */
    public function displayType(): int
{
    return $this->get_displayType();
}

    /**
     * @throws YAPI_Exception
     */
    public function layerWidth(): int
{
    return $this->get_layerWidth();
}

    /**
     * @throws YAPI_Exception
     */
    public function layerHeight(): int
{
    return $this->get_layerHeight();
}

    /**
     * @throws YAPI_Exception
     */
    public function layerCount(): int
{
    return $this->get_layerCount();
}

    /**
     * @throws YAPI_Exception
     */
    public function command(): string
{
    return $this->get_command();
}

    /**
     * @throws YAPI_Exception
     */
    public function setCommand(string $newval): int
{
    return $this->set_command($newval);
}

    /**
     * Continues the enumeration of displays started using yFirstDisplay().
     * Caution: You can't make any assumption about the returned displays order.
     * If you want to find a specific a display, use Display.findDisplay()
     * and a hardwareID or a logical name.
     *
     * @return ?YDisplay  a pointer to a YDisplay object, corresponding to
     *         a display currently online, or a null pointer
     *         if there are no more displays to enumerate.
     */
    public function nextDisplay(): ?YDisplay
    {
        $resolve = YAPI::resolveFunction($this->_className, $this->_func);
        if ($resolve->errorType != YAPI::SUCCESS) {
            return null;
        }
        $next_hwid = YAPI::getNextHardwareId($this->_className, $resolve->result);
        if ($next_hwid == null) {
            return null;
        }
        return self::FindDisplay($next_hwid);
    }

    /**
     * Starts the enumeration of displays currently accessible.
     * Use the method YDisplay::nextDisplay() to iterate on
     * next displays.
     *
     * @return ?YDisplay  a pointer to a YDisplay object, corresponding to
     *         the first display currently online, or a null pointer
     *         if there are none.
     */
    public static function FirstDisplay(): ?YDisplay
    {
        $next_hwid = YAPI::getFirstHardwareId('Display');
        if ($next_hwid == null) {
            return null;
        }
        return self::FindDisplay($next_hwid);
    }

    //--- (end of generated code: YDisplay implementation)

}
//^^^^ YDisplay.php
//--- (generated code: YDisplay functions)

/**
 * Retrieves a display for a given identifier.
 * The identifier can be specified using several formats:
 *
 * - FunctionLogicalName
 * - ModuleSerialNumber.FunctionIdentifier
 * - ModuleSerialNumber.FunctionLogicalName
 * - ModuleLogicalName.FunctionIdentifier
 * - ModuleLogicalName.FunctionLogicalName
 *
 *
 * This function does not require that the display is online at the time
 * it is invoked. The returned object is nevertheless valid.
 * Use the method isOnline() to test if the display is
 * indeed online at a given time. In case of ambiguity when looking for
 * a display by logical name, no error is notified: the first instance
 * found is returned. The search is performed first by hardware name,
 * then by logical name.
 *
 * If a call to this object's is_online() method returns FALSE although
 * you are certain that the matching device is plugged, make sure that you did
 * call registerHub() at application initialization time.
 *
 * @param string $func : a string that uniquely characterizes the display, for instance
 *         YD128X32.display.
 *
 * @return YDisplay  a YDisplay object allowing you to drive the display.
 */
function yFindDisplay(string $func): YDisplay
{
    return YDisplay::FindDisplay($func);
}

/**
 * Starts the enumeration of displays currently accessible.
 * Use the method YDisplay::nextDisplay() to iterate on
 * next displays.
 *
 * @return ?YDisplay  a pointer to a YDisplay object, corresponding to
 *         the first display currently online, or a null pointer
 *         if there are none.
 */
function yFirstDisplay(): ?YDisplay
{
    return YDisplay::FirstDisplay();
}

//--- (end of generated code: YDisplay functions)
