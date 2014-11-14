<?php
/* ***** BEGIN LICENSE BLOCK *****
 *
 *  This program is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.

 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program; if not, write to the Free Software
 *  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * ***** END LICENSE BLOCK ***** */


function utf8_strlen($str)
{
    return strlen(utf8_decode($str));
}

function utf8_from_unicode($arr)
{
    ob_start();
    
//    foreach (array_keys($arr) as $k) {
        
        # ASCII range (including control chars)
        if ( ($arr >= 0) && ($arr <= 0x007f) ) {
            
            echo chr($arr);
        
        # 2 byte sequence
        } else if ($arr <= 0x07ff) {
            
            echo chr(0xc0 | ($arr >> 6));
            echo chr(0x80 | ($arr & 0x003f));
        
        # Byte order mark (skip)
        } else if($arr == 0xFEFF) {
            
            // nop -- zap the BOM
        
        # Test for illegal surrogates
        } else if ($arr >= 0xD800 && $arr <= 0xDFFF) {
            
            // found a surrogate
            trigger_error(
                'utf8_from_unicode: Illegal surrogate '.
                    'at index: '.$k.', value: '.$arr,
                E_USER_WARNING
                );
            
            return FALSE;
        
        # 3 byte sequence
        } else if ($arr <= 0xffff) {
            
            echo chr(0xe0 | ($arr >> 12));
            echo chr(0x80 | (($arr >> 6) & 0x003f));
            echo chr(0x80 | ($arr & 0x003f));
        
        # 4 byte sequence
        } else if ($arr <= 0x10ffff) {
            
            echo chr(0xf0 | ($arr >> 18));
            echo chr(0x80 | (($arr >> 12) & 0x3f));
            echo chr(0x80 | (($arr >> 6) & 0x3f));
            echo chr(0x80 | ($arr & 0x3f));
            
        } else {
            
            trigger_error(
                'utf8_from_unicode: Codepoint out of Unicode range '.
                    'at index: '.$k.', value: '.$arr,
                E_USER_WARNING
                );
            
            // out of range
            return FALSE;
        }
  //  }
    
    $result = ob_get_contents();
    ob_end_clean();
    return $result;
}

function utf8_substr($str, $offset, $length = NULL) {
    
    if ( $offset >= 0 && $length >= 0 ) {
    
        if ( $length === NULL ) {
            $length = '*';
        } else {
            if ( !preg_match('/^[0-9]+$/', $length) ) {
           //     trigger_error('utf8_substr expects parameter 3 to be long', E_USER_WARNING);
                return FALSE;
            }
            
            $strlen = strlen(utf8_decode($str));
            if ( $offset > $strlen ) {
                return '';
            }
            
            if ( ( $offset + $length ) > $strlen ) {
               $length = '*';
            } else {
                $length = '{'.$length.'}';
            }
        }
        
        if ( !preg_match('/^[0-9]+$/', $offset) ) {
         //   trigger_error('utf8_substr expects parameter 2 to be long', E_USER_WARNING);
            return FALSE;
        }
        
        $pattern = '/^.{'.$offset.'}(.'.$length.')/us';
        
        preg_match($pattern, $str, $matches);
        
        if ( isset($matches[1]) ) {
            return $matches[1];
        }
        
        return FALSE;
    
    } else {
        
        // Handle negatives using different, slower technique
        // From: http://www.php.net/manual/en/function.substr.php#44838
        preg_match_all('/./u', $str, $ar);
        if( $length !== NULL ) {
            return join('',array_slice($ar[0],$offset,$length));
	   
        } else {
            return join('',array_slice($ar[0],$offset));
        }
    }
}

function utf8_to_unicode($str) {
    $mState = 0;     // cached expected number of octets after the current octet
                     // until the beginning of the next UTF8 character sequence
    $mUcs4  = 0;     // cached Unicode character
    $mBytes = 1;     // cached expected number of octets in the current sequence
    
    $out = array();
    
    $len = strlen($str);
    
    for($i = 0; $i < $len; $i++) {
        
        $in = ord($str{$i});
        
        if ( $mState == 0) {
            
            // When mState is zero we expect either a US-ASCII character or a
            // multi-octet sequence.
            if (0 == (0x80 & ($in))) {
                // US-ASCII, pass straight through.
                $out[] = $in;
                $mBytes = 1;
                
            } else if (0xC0 == (0xE0 & ($in))) {
                // First octet of 2 octet sequence
                $mUcs4 = ($in);
                $mUcs4 = ($mUcs4 & 0x1F) << 6;
                $mState = 1;
                $mBytes = 2;
                
            } else if (0xE0 == (0xF0 & ($in))) {
                // First octet of 3 octet sequence
                $mUcs4 = ($in);
                $mUcs4 = ($mUcs4 & 0x0F) << 12;
                $mState = 2;
                $mBytes = 3;
                
            } else if (0xF0 == (0xF8 & ($in))) {
                // First octet of 4 octet sequence
                $mUcs4 = ($in);
                $mUcs4 = ($mUcs4 & 0x07) << 18;
                $mState = 3;
                $mBytes = 4;
                
            } else if (0xF8 == (0xFC & ($in))) {
                /* First octet of 5 octet sequence.
                *
                * This is illegal because the encoded codepoint must be either
                * (a) not the shortest form or
                * (b) outside the Unicode range of 0-0x10FFFF.
                * Rather than trying to resynchronize, we will carry on until the end
                * of the sequence and let the later error handling code catch it.
                */
                $mUcs4 = ($in);
                $mUcs4 = ($mUcs4 & 0x03) << 24;
                $mState = 4;
                $mBytes = 5;
                
            } else if (0xFC == (0xFE & ($in))) {
                // First octet of 6 octet sequence, see comments for 5 octet sequence.
                $mUcs4 = ($in);
                $mUcs4 = ($mUcs4 & 1) << 30;
                $mState = 5;
                $mBytes = 6;
                
            } else {
                /* Current octet is neither in the US-ASCII range nor a legal first
                 * octet of a multi-octet sequence.
                 */
                trigger_error(
                        'utf8_to_unicode: Illegal sequence identifier '.
                            'in UTF-8 at byte '.$i,
                        E_USER_WARNING
                    );
                return FALSE;
                
            }
        
        } else {
            
            // When mState is non-zero, we expect a continuation of the multi-octet
            // sequence
            if (0x80 == (0xC0 & ($in))) {
                
                // Legal continuation.
                $shift = ($mState - 1) * 6;
                $tmp = $in;
                $tmp = ($tmp & 0x0000003F) << $shift;
                $mUcs4 |= $tmp;
            
                /**
                * End of the multi-octet sequence. mUcs4 now contains the final
                * Unicode codepoint to be output
                */
                if (0 == --$mState) {
                    
                    /*
                    * Check for illegal sequences and codepoints.
                    */
                    // From Unicode 3.1, non-shortest form is illegal
                    if (((2 == $mBytes) && ($mUcs4 < 0x0080)) ||
                        ((3 == $mBytes) && ($mUcs4 < 0x0800)) ||
                        ((4 == $mBytes) && ($mUcs4 < 0x10000)) ||
                        (4 < $mBytes) ||
                        // From Unicode 3.2, surrogate characters are illegal
                        (($mUcs4 & 0xFFFFF800) == 0xD800) ||
                        // Codepoints outside the Unicode range are illegal
                        ($mUcs4 > 0x10FFFF)) {
                        
                        trigger_error(
                                'utf8_to_unicode: Illegal sequence or codepoint '.
                                    'in UTF-8 at byte '.$i,
                                E_USER_WARNING
                            );
                        
                        return FALSE;
                        
                    }
                    
                    if (0xFEFF != $mUcs4) {
                        // BOM is legal but we don't want to output it
                        $out[] = $mUcs4;
                    }
                    
                    //initialize UTF8 cache
                    $mState = 0;
                    $mUcs4  = 0;
                    $mBytes = 1;
                }
            
            } else {
                /**
                *((0xC0 & (*in) != 0x80) && (mState != 0))
                * Incomplete multi-octet sequence.
                */
                trigger_error(
                        'utf8_to_unicode: Incomplete multi-octet '.
                        '   sequence in UTF-8 at byte '.$i,
                        E_USER_WARNING
                    );
                
                return FALSE;
            }
        }
    }
    return $out;
}

function uniord($c)
{
  $ud = 0;
  if (ord($c{0})>=0 && ord($c{0})<=127)
   $ud = ord($c{0});
  if (ord($c{0})>=192 && ord($c{0})<=223)
   $ud = (ord($c{0})-192)*64 + (ord($c{1})-128);
  if (ord($c{0})>=224 && ord($c{0})<=239)
   $ud = (ord($c{0})-224)*4096 + (ord($c{1})-128)*64 + (ord($c{2})-128);
  if (ord($c{0})>=240 && ord($c{0})<=247)
   $ud = (ord($c{0})-240)*262144 + (ord($c{1})-128)*4096 + (ord($c{2})-128)*64 + (ord($c{3})-128);
  if (ord($c{0})>=248 && ord($c{0})<=251)
   $ud = (ord($c{0})-248)*16777216 + (ord($c{1})-128)*262144 + (ord($c{2})-128)*4096 + (ord($c{3})-128)*64 + (ord($c{4})-128);
  if (ord($c{0})>=252 && ord($c{0})<=253)
   $ud = (ord($c{0})-252)*1073741824 + (ord($c{1})-128)*16777216 + (ord($c{2})-128)*262144 + (ord($c{3})-128)*4096 + (ord($c{4})-128)*64 + (ord($c{5})-128);
  if (ord($c{0})>=254 && ord($c{0})<=255) //error
   $ud = false;
 return $ud;
}

function stringToCodePoints($str) {
 $str = fixCharacters($str);
 $str = preg_replace_callback(
 '/&#([0-9]+);/',
 create_function(
 '$s',
 'return $s[1];'
 ),
 $str
 );
 $str = preg_replace_callback(
 '/&#x([a-f0-9]+);/i',
 create_function(
 '$s',
 'return hexdec($s[1]);'
 ),
 $str
 );
 return $str;
}
function stringToUtf8($str) {
 $str = fixCharacters($str);
 $str = preg_replace_callback(
 '/&#([0-9]+);/',
 create_function(
 '$s',
 'return code2utf($s[1]);'
 ),
 $str
 );
 $str = preg_replace_callback(
 '/&#x([a-f0-9]+);/i',
 create_function(
 '$s',
 'return code2utf(hexdec($s[1]));'
 ),
 $str
 );
 return $str;
}
function fixCharacters($str) {
 $r = array(
 '&#128;' => '&#8364;',
 '&#129;' => '',
 '&#130;' => '&#8218;',
 '&#131;' => '&#402;',
 '&#132;' => '&#8222;',
 '&#133;' => '&#8230;',
 '&#134;' => '&#8224;',
 '&#135;' => '&#8225;',
 '&#136;' => '&#710;',
 '&#137;' => '&#8240;',
 '&#138;' => '&#352;',
 '&#139;' => '&#8249;',
 '&#140;' => '&#338;',
 '&#141;' => '',
 '&#142;' => '&#381;',
 '&#143;' => '',
 '&#144;' => '',
 '&#145;' => '&#8216;',
 '&#146;' => '&#8217;',
 '&#147;' => '&#8220;',
 '&#148;' => '&#8221;',
 '&#149;' => '&#8226;',
 '&#150;' => '&#8211;',
 '&#151;' => '&#8212;',
 '&#152;' => '&#732;',
 '&#153;' => '&#8482;',
 '&#154;' => '&#353;',
 '&#155;' => '&#8250;',
 '&#156;' => '&#339;',
 '&#157;' => '',
 '&#158;' => '&#382;',
 '&#159;' => '&#376;'
 );
 return strtr($str, $r);
}
// From php.net:
function code2utf($num){
 if ($num < 128) {
  return chr($num);
 }
 if ($num < 2048) {
  return chr(($num >> 6) + 192) . chr(($num & 63) + 128);
 }
 if ($num < 65536) {
  return chr(($num >> 12) + 224) . chr((($num >> 6) & 63) + 128) . chr(($num & 63) + 128);
 }
 if ($num < 2097152) {
  return chr(($num >> 18) + 240) . chr((($num >> 12) & 63) + 128) . chr((($num >> 6) & 63) + 128) . chr(($num & 63) + 128);
 }
 return '';
}

?>
