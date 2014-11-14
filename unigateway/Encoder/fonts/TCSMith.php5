<?php
/* ***** BEGIN LICENSE BLOCK *****
 *
 *  This file is originally part of Padma.
 *
 *  Copyright (C) 2005-2006 Nagarjuna Venna <vnagarjuna@yahoo.com>
 *  Copyright (C) 2006 Harshita Vani   <harshita@atc.tcs.com>
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

class TCSMith
{
function TCSMith()
{
}

//The interface every dynamic font encoding should implement
var $maxLookupLen = 3;
var $fontFace     = "TLGmith0";
var $displayName  = "TLGmith0";
var $script       = Padma::Padma_script_TELUGU;

function lookup($str) 
{
    global $TCSMith_toPadma;
    return $TCSMith_toPadma[$str];
}

function isPrefixSymbol($str)
{
    global $TCSMith_prefixList;
    return $TCSMith_prefixList[$str] != null;
}

function isOverloaded($str)
{
   global $TCSMith_overloadList;
   return $TCSMith_overloadList[$str] != null;
}

function handleTwoPartVowelSigns($sign1, $sign2)
{
    if (($sign1 == Padma::Padma_vowelsn_E && $sign2 == Padma::Padma_vowelsn_EELEN) ||
        ($sign2 == Padma::Padma_vowelsn_E && $sign1 == Padma::Padma_vowelsn_EELEN)) {
            return Padma::Padma_vowelsn_EE;
    }
    if (($sign1 == Padma::Padma_vowelsn_E && $sign2 == Padma::Padma_vowelsn_AILEN) ||
        ($sign2 == Padma::Padma_vowelsn_E && $sign1 == Padma::Padma_vowelsn_AILEN)) {
            return Padma::Padma_vowelsn_AI;
    }
    if (($sign1 == Padma::Padma_vowelsn_E && $sign2 == Padma::Padma_vowelsn_AA) ||
        ($sign2 == Padma::Padma_vowelsn_E && $sign1 == Padma::Padma_vowelsn_AA)) {
            return Padma::Padma_vowelsn_OO;
    }
    if (($sign1 == Padma::Padma_vowelsn_O && $sign2 == Padma::Padma_vowelsn_EELEN) ||
        ($sign2 == Padma::Padma_vowelsn_O && $sign1 == Padma::Padma_vowelsn_EELEN)) {
            return Padma::Padma_vowelsn_OO;
    }
    if (($sign1 == Padma::Padma_vowelsn_E && $sign2 == Padma::Padma_vowelsn_U) ||
        ($sign2 == Padma::Padma_vowelsn_E && $sign1 == Padma::Padma_vowelsn_U)) {
            return Padma::Padma_vowelsn_O;
    }
    if (($sign1 == Padma::Padma_vowelsn_E && $sign2 == Padma::Padma_vowelsn_II) ||
        ($sign2 == Padma::Padma_vowelsn_E && $sign1 == Padma::Padma_vowelsn_II)) {
            return Padma::Padma_vowelsn_OO;
    }
    return $sign1 . $sign2;
}

//Baby steps
//1. Remove redundant symbols
//2. Insert some talakattus (that we have just removed) that will help with ra Gunintam (anusvara and ra are overloaded... argh!!!)
function preprocessMessage($input)
{
    $output = "";
    $last = null;
    
     $input_len=utf8_strlen($input); 
    //1.
    for($i = 0; $i < $input_len; ++$i) {
       $cur = utf8_substr($input,$i,1);
        if (!TCSMith::isRedundant($cur, $last))
            $output .= $last = $cur;
    }

    //2.
    return TCSMith::insertTalakattuForRaGunintam($output);
}

function isRedundant($str, $prev)
{
    global $TCSMith_redundantList;
    if ($str == TCSMith::TCSMith_misc_TICK_1 && ($prev == TCSMith::TCSMith_anusvara || 
                                                 $prev == TCSMith::TCSMith_misc_YBASE))
            return false;
	        return $TCSMith_redundantList[$str] != null;
		}
		
//Terrible hack because this font overloads anusvara and ra
//This will take care of all cases when a vattu follows ra
function insertTalakattuForRaGunintam($str)
{
    $output = "";
    $last = null;
    $added = false;
     
     $str_len=utf8_strlen($str); 
     for($i = 0; $i < $str_len; ++$i) {
       $cur = utf8_substr($str,$i,1);
        if ($last == TCSMith::TCSMith_anusvara && !$added) {
            $val   = TCSMith::lookup($cur);
       
       $val_cur = utf8_substr($val,0,1);
            if ($val != null && Padma::getType($val_cur) == Padma::Padma_type_vattu && 
                                                                  !TCSMith::isPrefixSymbol($cur))
                    $output .= TCSMith::TCSMith_misc_TICK_1;
            $output .= $cur;
        }
        else if ($cur == TCSMith::TCSMith_anusvara && $last != null && TCSMith::isPrefixSymbol($last)) {
            $val = TCSMith::lookup($last);
            $output .= $cur;
            if ($val == Padma::Padma_vowelsn_E) {
                $output .= TCSMith::TCSMith_misc_TICK_1;
                $added = true;
            }
        }
        else {
            $output .= $cur;
            $added = false;
        }
        $last = $cur;
    }
    return $output;
}
																														
//Implementation details start here
//0x84, 0xAB, 0xAD, 0xC4, 0xD5, 0xDC,

//Specials
 const TCSMith_candrabindu    = "\xE2\x80\xA1";
 const TCSMith_visarga        = "\xE2\x80\xA6";
 const TCSMith_virama_1       = "\xC3\xA9";
 const TCSMith_virama_2       = "\xC3\xAA";
 const TCSMith_virama_3       = "\xC3\xAB";
 const TCSMith_virama_4       = "\xC3\xAC";
 const TCSMith_virama_5       = "\xC3\xAD";
 const TCSMith_anusvara       = "\x4D";

//Vowels
 const TCSMith_vowel_A        = "\x41";
 const TCSMith_vowel_AA       = "\x42";
 const TCSMith_vowel_I        = "\x43";
 const TCSMith_vowel_II       = "\x44";
 const TCSMith_vowel_U        = "\x45";
 const TCSMith_vowel_UU       = "\x46";
 const TCSMith_vowel_R        = "\x65\xC3\x80\xC3\x80";
 const TCSMith_vowel_E        = "\x47";
 const TCSMith_vowel_EE       = "\x48";
 const TCSMith_vowel_AI       = "\x49";
 const TCSMith_vowel_O        = "\x4A";
 const TCSMith_vowel_OO       = "\x4B";
 const TCSMith_vowel_AU       = "\x4C";

//Consonants
 const TCSMith_consnt_KA      = "\x4E";
 const TCSMith_consnt_KHA_1   = "\x50";
 const TCSMith_consnt_KHA_2   = "\x51";
 const TCSMith_consnt_GA      = "\x52";
 const TCSMith_consnt_GHA     = "\x64\xC3\x8C\xC3\x80";
 const TCSMith_consnt_NGA     = "\xC3\x85";

 const TCSMith_consnt_CA      = "\x53";
 const TCSMith_consnt_CHA     = "\x53\xC3\x8B";
 const TCSMith_consnt_JA      = "\x54";
 const TCSMith_consnt_NYA     = "\xC3\x86";

 const TCSMith_consnt_TTA_1   = "\x55";
 const TCSMith_consnt_TTA_2   = "\x56";
 const TCSMith_consnt_TTHA    = "\x57";
 const TCSMith_consnt_DDA     = "\x58";
 const TCSMith_consnt_DDHA    = "\x58\xC3\x8B";
 const TCSMith_consnt_NNA     = "\x59";

 const TCSMith_consnt_TA      = "\x5A";
 const TCSMith_consnt_THA     = "\x61";
 const TCSMith_consnt_DA      = "\x62";
 const TCSMith_consnt_DHA     = "\x62\xC3\x8B";
 const TCSMith_consnt_NA      = "\x63";

 const TCSMith_consnt_PA      = "\x64";
 const TCSMith_consnt_PHA_1   = "\x47\xC3\x8C";
 const TCSMith_consnt_PHA_2   = "\x64\xC3\x8C";
 const TCSMith_consnt_BA_1    = "\x65";
 const TCSMith_consnt_BA_2    = "\x66";
 const TCSMith_consnt_BHA     = "\x66\xC3\x8B";
 const TCSMith_consnt_MA      = "\x67\xC3\x80";

 const TCSMith_consnt_YA      = "\x68\xC3\x90\xC3\x80";
 const TCSMith_consnt_RA      = "\x4D\xC3\x90";
 const TCSMith_consnt_LA_1    = "\x69";
 const TCSMith_consnt_LA_2    = "\x6A";
 const TCSMith_consnt_VA      = "\x67";
 const TCSMith_consnt_SHA     = "\x6C";
 const TCSMith_consnt_SSA_1   = "\x6F";
 const TCSMith_consnt_SSA_2   = "\x70";
 const TCSMith_consnt_SA_1    = "\x6D";
 const TCSMith_consnt_SA_2    = "\x6E";
 const TCSMith_consnt_HA      = "\x71";
 const TCSMith_consnt_LLA     = "\x6B";
 const TCSMith_consnt_RRA     = "\xC5\xB8";

//Gunintamulu
 const TCSMith_vowelsn_AA_1   = "\xC2\xB0";
 const TCSMith_vowelsn_AA_2   = "\xC2\xB1";
 const TCSMith_vowelsn_AA_3   = "\xC2\xB2";
 const TCSMith_vowelsn_I_1    = "\xC3\x94";
 const TCSMith_vowelsn_I_2    = "\xC3\x95";
 const TCSMith_vowelsn_I_3    = "\xC3\x96";
 const TCSMith_vowelsn_I_4    = "\xC3\x97";
 const TCSMith_vowelsn_II_1   = "\xC3\x98";
 const TCSMith_vowelsn_II_2   = "\xC3\x99";
 const TCSMith_vowelsn_II_3   = "\xC3\x9A";
 const TCSMith_vowelsn_II_4   = "\xC3\x9B";
 const TCSMith_vowelsn_U_1    = "\xC2\xB9";
 const TCSMith_vowelsn_U_2    = "\xC2\xBB";
 const TCSMith_vowelsn_U_3    = "\xC2\xBD";
 const TCSMith_vowelsn_U_4    = "\xC3\x80";
 const TCSMith_vowelsn_U_5    = "\xC3\x82";
 const TCSMith_vowelsn_UU_1   = "\xC2\xBA";
 const TCSMith_vowelsn_UU_2   = "\xC2\xBC";
 const TCSMith_vowelsn_UU_3   = "\xC2\xBE";
 const TCSMith_vowelsn_UU_4   = "\xC3\x81";
 const TCSMith_vowelsn_UU_5   = "\xC3\x83";
 const TCSMith_vowelsn_R      = "\xC2\xBF";
 const TCSMith_vowelsn_RR     = "\xE2\x80\x98";
 const TCSMith_vowelsn_E_1    = "\xC3\x9D";
 const TCSMith_vowelsn_E_2    = "\xC3\x9E";
 const TCSMith_vowelsn_E_3    = "\xC3\x9F";
 const TCSMith_vowelsn_E_4    = "\xC3\xA0";
 const TCSMith_vowelsn_E_5    = "\xC3\xA1";
 const TCSMith_vowelsn_E_6    = "\xC3\xA2";
 const TCSMith_vowelsn_E_7    = "\xC3\xA3";
 const TCSMith_vowelsn_E_8    = "\xC3\xA4";
 const TCSMith_vowelsn_E_9    = "\xC3\xA5";
 const TCSMith_vowelsn_EE     = "\xC3\xA7";
 const TCSMith_vowelsn_O_1    = "\xC3\xAE";
 const TCSMith_vowelsn_O_2    = "\xC3\xAF";
 const TCSMith_vowelsn_O_3    = "\xC3\xB0";
 const TCSMith_vowelsn_O_4    = "\xC3\xB1";
 const TCSMith_vowelsn_OO     = "\xC2\xB3";
 const TCSMith_vowelsn_AU_1   = "\xC2\xB4";
 const TCSMith_vowelsn_AU_2   = "\xC2\xB5";
 const TCSMith_vowelsn_AU_3   = "\xC2\xB6";
 const TCSMith_vowelsn_AU_4   = "\xC2\xB7";
 const TCSMith_vowelsn_AU_5   = "\xC2\xB8";

 const TCSMith_vowelsn_EELEN  = "\xC3\xA6";
 const TCSMith_vowelsn_AILEN_1 = "\xE2\x80\x9D";
 const TCSMith_vowelsn_AILEN_2 = "\xC3\xA8";

//Special Combinations
 const TCSMith_combo_KSHA     = "\x4F";
 const TCSMith_combo_KHI      = "\x77";
 const TCSMith_combo_GHAA     = "\x64\xC3\x8C\xC3\x81";

 const TCSMith_combo_CI       = "\x76";
 const TCSMith_combo_CII      = "\x76\xC3\x9C";
 const TCSMith_combo_CHI      = "\x76\xC3\x8B";
 const TCSMith_combo_CHII     = "\x76\xC3\x8B\xC3\x9C";
 const TCSMith_combo_JI       = "\xC3\x89";
 const TCSMith_combo_JII      = "\xC3\x8A";

 const TCSMith_combo_TI       = "\x75";
 const TCSMith_combo_TII      = "\x75\xC3\x9C";
 const TCSMith_combo_NI       = "\x74";
 const TCSMith_combo_NII      = "\x74\xC3\x9C";

 const TCSMith_combo_PAA      = "\x47\xC2\xB1";
 const TCSMith_combo_PO       = "\x47\xC3\xAF";
 const TCSMith_combo_POO      = "\x47\xC2\xB3";
 const TCSMith_combo_PAU      = "\x47\xC2\xB6";
 const TCSMith_combo_BI       = "\x78";
 const TCSMith_combo_BII      = "\x78\xC3\x9C";
 const TCSMith_combo_BHI      = "\x78\xC3\x8B";
 const TCSMith_combo_BHII     = "\x78\xC3\x8B\xC3\x9C";
 const TCSMith_combo_MAA      = "\x67\xC3\x81";
 const TCSMith_combo_MI       = "\x73\xC3\x80";
 const TCSMith_combo_MII      = "\x73\xC3\x9C\xC3\x80";
 const TCSMith_combo_MAU      = "\x67\xC2\xB7";
 const TCSMith_combo_MPOLLU   = "\x67\xC3\xAB\xC3\x80";
 const TCSMith_combo_M_EELEN  = "\x67\xC3\xA6\xC3\x80";

 const TCSMith_combo_YAA      = "\x68\xC3\x90\xC3\x81";
 const TCSMith_combo_YI       = "\x68\xC3\x80";
 const TCSMith_combo_YII      = "\x68\xC3\x81";
 const TCSMith_combo_Y_EELEN  = "\x68\xC3\xA6\xC3\x80";
 const TCSMith_combo_RAA      = "\x4D\xC2\xB0";
 const TCSMith_combo_RI       = "\x4D\xC3\x95";
 const TCSMith_combo_RII      = "\x4D\xC3\x99";
 const TCSMith_combo_RPOLLU   = "\x4D\xC3\xA9";
 const TCSMith_combo_RO       = "\x4D\xC3\xAE";
 const TCSMith_combo_ROO      = "\x4D\xC3\xAE\xC3\xA6";
 const TCSMith_combo_LI       = "\x79";
 const TCSMith_combo_LII      = "\x79\xC3\x9C";
 const TCSMith_combo_VI       = "\x73";
 const TCSMith_combo_VII      = "\x73\xC3\x9C";
 const TCSMith_combo_SHI      = "\x72";
 const TCSMith_combo_SHII     = "\x72\xC3\x9C";
 const TCSMith_combo_SHRII    = "\xCB\x86";
 const TCSMith_combo_LLI      = "\x7A";
 const TCSMith_combo_LLII     = "\x7A\xC3\x9C";
 const TCSMith_combo_HAA      = "\xC3\x87";

//Vattulu
 const TCSMith_vattu_KA       = "\xC2\xA4";
 const TCSMith_vattu_KHA      = "\xE2\x80\xA2";
 const TCSMith_vattu_GA       = "\xC3\x8D";
 const TCSMith_vattu_GHA      = "\xE2\x80\x93";

 const TCSMith_vattu_CA       = "\xC2\xA5";
 const TCSMith_vattu_CHA      = "\xC2\xA5\xC2\xAE";
 const TCSMith_vattu_JA       = "\xE2\x80\x94";
 const TCSMith_vattu_JHA      = "\xCB\x9C";
 const TCSMith_vattu_NYA      = "\xE2\x84\xA2";

 const TCSMith_vattu_TTA      = "\xC3\x8E";
 const TCSMith_vattu_TTHA     = "\xC3\xB3";
 const TCSMith_vattu_DDA      = "\xC3\x8F";
 const TCSMith_vattu_NNA      = "\xC5\xA1";

 const TCSMith_vattu_TA       = "\xC3\xB2";
 const TCSMith_vattu_THA      = "\xE2\x80\xBA";
 const TCSMith_vattu_DA       = "\xC3\xB4";
 const TCSMith_vattu_DHA      = "\xC3\xB4\xC2\xAF";
 const TCSMith_vattu_NA       = "\xC2\xA6";

 const TCSMith_vattu_PA       = "\xC2\xA7";
 const TCSMith_vattu_PHA      = "\xC2\xA7\xC2\xAE";
 const TCSMith_vattu_BA       = "\xC2\xA8";
 const TCSMith_vattu_BHA      = "\xC2\xA8\xC2\xAE";
 const TCSMith_vattu_MA       = "\xC2\xA9";

 const TCSMith_vattu_YA       = "\xC2\xAA";
 const TCSMith_vattu_RA_1     = "\xC2\xAB";
 const TCSMith_vattu_RA_2     = "\xC3\x88";
 const TCSMith_vattu_LA       = "\xC3\xB5";
 const TCSMith_vattu_VA       = "\xC2\xA1";
 const TCSMith_vattu_SHA      = "\xC2\xA2";
 const TCSMith_vattu_SSA      = "\xE2\x80\x99";
 const TCSMith_vattu_SA       = "\xC2\xA3";
 const TCSMith_vattu_HA       = "\xE2\x80\x9C";
 const TCSMith_vattu_LLA      = "\xC2\xAC";
 const TCSMith_vattu_RRA      = "\xC5\x93";

//Danda and double danda
 const TCSMith_misc_danda     = "\xE2\x80\xA0";
 const TCSMith_misc_ddanda    = "\xE2\x80\xA0\xE2\x80\xA0";

 const TCSMith_misc_YBASE     = "\x68";

//Matches ASCII
 const TCSMith_EXCLAM         = "\x21";
 const TCSMith_QTDOUBLE       = "\x22";
 const TCSMith_POUND          = "\x23";
 const TCSMith_DOLLAR         = "\x24";
 const TCSMith_PERCENT        = "\x25";
 const TCSMith_AMPERSAND      = "\x26";
 const TCSMith_QTSINGLE       = "\x27";
 const TCSMith_PARENLEFT      = "\x28";
 const TCSMith_PARENRIGT      = "\x29";
 const TCSMith_ASTERISK       = "\x2A";
 const TCSMith_PLUS           = "\x2B";
 const TCSMith_COMMA          = "\x2C";
 const TCSMith_HYPHEN         = "\x2D";
 const TCSMith_PERIOD         = "\x2E";
 const TCSMith_SLASH          = "\x2F";
 const TCSMith_digit_ZERO     = "\x30";
 const TCSMith_digit_ONE      = "\x31";
 const TCSMith_digit_TWO      = "\x32";
 const TCSMith_digit_THREE    = "\x33";
 const TCSMith_digit_FOUR     = "\x34";
 const TCSMith_digit_FIVE     = "\x35";
 const TCSMith_digit_SIX      = "\x36";
 const TCSMith_digit_SEVEN    = "\x37";
 const TCSMith_digit_EIGHT    = "\x38";
 const TCSMith_digit_NINE     = "\x39";
 const TCSMith_COLON          = "\x3A";
 const TCSMith_SEMICOLON      = "\x3B";
 const TCSMith_LESSTHAN       = "\x3C";
 const TCSMith_EQUALS         = "\x3D";
 const TCSMith_GREATERTHAN    = "\x3E";
 const TCSMith_QUESTION       = "\x3F";
 const TCSMith_ATSIGN         = "\x40";
 //const TCSMith_PARENLEFT      = "\x5B";
 const TCSMith_BACKSLASH      = "\x5C";
 const TCSMith_PARENRIGHT     = "\x5D";
 const TCSMith_CARET          = "\x5E";
 const TCSMith_UNDERSCORE     = "\x5F";
 const TCSMith_BACKQUOTE      = "\x60"; //circumflex?
 const TCSMith_CURLYBKTLEFT   = "\x7B";
 const TCSMith_PIPE           = "\x7C";
 const TCSMith_CURLYBKTRIGHT  = "\x7D";
 const TCSMith_TILDE          = "\x7E";

//Kommu
 const TCSMith_misc_TICK_1    = "\xC3\x90";
 const TCSMith_misc_TICK_2    = "\xC3\x91";
 const TCSMith_misc_TICK_3    = "\xC3\x92";
 const TCSMith_misc_TICK_4    = "\xC3\x93";
 const TCSMith_misc_UNKNOWN_1 = "\xC3\xB6";
 const TCSMith_misc_UNKNOWN_2 = "\xC3\xB7";
 const TCSMith_misc_UNKNOWN_3 = "\xC3\xB8";
 const TCSMith_misc_UNKNOWN_4 = "\xC3\xB9";
 const TCSMith_misc_UNKNOWN_5 = "\xC3\xBA";
 const TCSMith_misc_UNKNOWN_6 = "\xC3\xBB";
 const TCSMith_misc_UNKNOWN_7 = "\xC3\xBC";
 const TCSMith_misc_UNKNOWN_8 = "\xC3\xBD";
 const TCSMith_misc_UNKNOWN_9 = "\xC3\xBE";
 const TCSMith_misc_UNKNOWN_A = "\xC3\xBF";

 const TCSMith_misc_vattu_1   = "\xC2\xAE";
 const TCSMith_misc_vattu_2   = "\xC2\xAF";
 const TCSMith_misc_vattu_3   = "\xC3\x8B";
 const TCSMith_misc_vattu_4   = "\xC3\x8C";
}
$TCSMith_toPadma = array();

$TCSMith_toPadma[TCSMith::TCSMith_candrabindu] = Padma::Padma_candrabindu;
$TCSMith_toPadma[TCSMith::TCSMith_visarga]  = Padma::Padma_visarga;
$TCSMith_toPadma[TCSMith::TCSMith_virama_1] = Padma::Padma_syllbreak;
$TCSMith_toPadma[TCSMith::TCSMith_virama_2] = Padma::Padma_syllbreak;
$TCSMith_toPadma[TCSMith::TCSMith_virama_3] = Padma::Padma_syllbreak;
$TCSMith_toPadma[TCSMith::TCSMith_virama_4] = Padma::Padma_syllbreak;
$TCSMith_toPadma[TCSMith::TCSMith_virama_5] = Padma::Padma_syllbreak;
$TCSMith_toPadma[TCSMith::TCSMith_anusvara] = Padma::Padma_anusvara;

$TCSMith_toPadma[TCSMith::TCSMith_vowel_A]  = Padma::Padma_vowel_A;
$TCSMith_toPadma[TCSMith::TCSMith_vowel_AA] = Padma::Padma_vowel_AA;
$TCSMith_toPadma[TCSMith::TCSMith_vowel_I]  = Padma::Padma_vowel_I;
$TCSMith_toPadma[TCSMith::TCSMith_vowel_II] = Padma::Padma_vowel_II;
$TCSMith_toPadma[TCSMith::TCSMith_vowel_U]  = Padma::Padma_vowel_U;
$TCSMith_toPadma[TCSMith::TCSMith_vowel_UU] = Padma::Padma_vowel_UU;
$TCSMith_toPadma[TCSMith::TCSMith_vowel_R]  = Padma::Padma_vowel_R;
$TCSMith_toPadma[TCSMith::TCSMith_vowel_E]  = Padma::Padma_vowel_E;
$TCSMith_toPadma[TCSMith::TCSMith_vowel_EE] = Padma::Padma_vowel_EE;
$TCSMith_toPadma[TCSMith::TCSMith_vowel_AI] = Padma::Padma_vowel_AI;
$TCSMith_toPadma[TCSMith::TCSMith_vowel_O]  = Padma::Padma_vowel_O;
$TCSMith_toPadma[TCSMith::TCSMith_vowel_OO] = Padma::Padma_vowel_OO;
$TCSMith_toPadma[TCSMith::TCSMith_vowel_AU] = Padma::Padma_vowel_AU;

$TCSMith_toPadma[TCSMith::TCSMith_consnt_KA]    = Padma::Padma_consnt_KA;
$TCSMith_toPadma[TCSMith::TCSMith_consnt_KHA_1] = Padma::Padma_consnt_KHA;
$TCSMith_toPadma[TCSMith::TCSMith_consnt_KHA_2] = Padma::Padma_consnt_KHA;
$TCSMith_toPadma[TCSMith::TCSMith_consnt_GA]    = Padma::Padma_consnt_GA;
$TCSMith_toPadma[TCSMith::TCSMith_consnt_GHA]   = Padma::Padma_consnt_GHA;
$TCSMith_toPadma[TCSMith::TCSMith_consnt_NGA]   = Padma::Padma_consnt_NGA;

$TCSMith_toPadma[TCSMith::TCSMith_consnt_CA]  = Padma::Padma_consnt_CA;
$TCSMith_toPadma[TCSMith::TCSMith_consnt_CHA] = Padma::Padma_consnt_CHA;
$TCSMith_toPadma[TCSMith::TCSMith_consnt_JA]  = Padma::Padma_consnt_JA;
$TCSMith_toPadma[TCSMith::TCSMith_consnt_NYA] = Padma::Padma_consnt_NYA;

$TCSMith_toPadma[TCSMith::TCSMith_consnt_TTA_1] = Padma::Padma_consnt_TTA;
$TCSMith_toPadma[TCSMith::TCSMith_consnt_TTA_2] = Padma::Padma_consnt_TTA;
$TCSMith_toPadma[TCSMith::TCSMith_consnt_TTHA]  = Padma::Padma_consnt_TTHA;
$TCSMith_toPadma[TCSMith::TCSMith_consnt_DDA]   = Padma::Padma_consnt_DDA;
$TCSMith_toPadma[TCSMith::TCSMith_consnt_DDHA]  = Padma::Padma_consnt_DDHA;
$TCSMith_toPadma[TCSMith::TCSMith_consnt_NNA]   = Padma::Padma_consnt_NNA;

$TCSMith_toPadma[TCSMith::TCSMith_consnt_TA]  = Padma::Padma_consnt_TA;
$TCSMith_toPadma[TCSMith::TCSMith_consnt_THA] = Padma::Padma_consnt_THA;
$TCSMith_toPadma[TCSMith::TCSMith_consnt_DA]  = Padma::Padma_consnt_DA;
$TCSMith_toPadma[TCSMith::TCSMith_consnt_DHA] = Padma::Padma_consnt_DHA;
$TCSMith_toPadma[TCSMith::TCSMith_consnt_NA]  = Padma::Padma_consnt_NA;

$TCSMith_toPadma[TCSMith::TCSMith_consnt_PA]  = Padma::Padma_consnt_PA;
$TCSMith_toPadma[TCSMith::TCSMith_consnt_PHA_1] = Padma::Padma_consnt_PHA;
$TCSMith_toPadma[TCSMith::TCSMith_consnt_PHA_2] = Padma::Padma_consnt_PHA;
$TCSMith_toPadma[TCSMith::TCSMith_consnt_BA_1] = Padma::Padma_consnt_BA;
$TCSMith_toPadma[TCSMith::TCSMith_consnt_BA_2] = Padma::Padma_consnt_BA;
$TCSMith_toPadma[TCSMith::TCSMith_consnt_BHA]  = Padma::Padma_consnt_BHA;
$TCSMith_toPadma[TCSMith::TCSMith_consnt_MA] = Padma::Padma_consnt_MA;

$TCSMith_toPadma[TCSMith::TCSMith_consnt_YA] = Padma::Padma_consnt_YA;
$TCSMith_toPadma[TCSMith::TCSMith_consnt_RA] = Padma::Padma_consnt_RA;
$TCSMith_toPadma[TCSMith::TCSMith_consnt_LA_1] = Padma::Padma_consnt_LA;
$TCSMith_toPadma[TCSMith::TCSMith_consnt_LA_2] = Padma::Padma_consnt_LA;
$TCSMith_toPadma[TCSMith::TCSMith_consnt_VA] = Padma::Padma_consnt_VA;
$TCSMith_toPadma[TCSMith::TCSMith_consnt_SHA] = Padma::Padma_consnt_SHA;
$TCSMith_toPadma[TCSMith::TCSMith_consnt_SSA_1] = Padma::Padma_consnt_SSA;
$TCSMith_toPadma[TCSMith::TCSMith_consnt_SSA_2] = Padma::Padma_consnt_SSA;
$TCSMith_toPadma[TCSMith::TCSMith_consnt_SA_1] = Padma::Padma_consnt_SA;
$TCSMith_toPadma[TCSMith::TCSMith_consnt_SA_2] = Padma::Padma_consnt_SA;
$TCSMith_toPadma[TCSMith::TCSMith_consnt_HA] = Padma::Padma_consnt_HA;
$TCSMith_toPadma[TCSMith::TCSMith_consnt_LLA] = Padma::Padma_consnt_LLA;
$TCSMith_toPadma[TCSMith::TCSMith_consnt_RRA] = Padma::Padma_consnt_RRA;

//Gunintamulu
$TCSMith_toPadma[TCSMith::TCSMith_vowelsn_AA_1]  = Padma::Padma_vowelsn_AA;
$TCSMith_toPadma[TCSMith::TCSMith_vowelsn_AA_2]  = Padma::Padma_vowelsn_AA;
$TCSMith_toPadma[TCSMith::TCSMith_vowelsn_AA_3]  = Padma::Padma_vowelsn_AA;
$TCSMith_toPadma[TCSMith::TCSMith_vowelsn_I_1]   = Padma::Padma_vowelsn_I;
$TCSMith_toPadma[TCSMith::TCSMith_vowelsn_I_2]   = Padma::Padma_vowelsn_I;
$TCSMith_toPadma[TCSMith::TCSMith_vowelsn_I_3]   = Padma::Padma_vowelsn_I;
$TCSMith_toPadma[TCSMith::TCSMith_vowelsn_I_4]   = Padma::Padma_vowelsn_I;
$TCSMith_toPadma[TCSMith::TCSMith_vowelsn_II_1]  = Padma::Padma_vowelsn_II;
$TCSMith_toPadma[TCSMith::TCSMith_vowelsn_II_2]  = Padma::Padma_vowelsn_II;
$TCSMith_toPadma[TCSMith::TCSMith_vowelsn_II_3]  = Padma::Padma_vowelsn_II;
$TCSMith_toPadma[TCSMith::TCSMith_vowelsn_II_4]  = Padma::Padma_vowelsn_II;
$TCSMith_toPadma[TCSMith::TCSMith_vowelsn_U_1]   = Padma::Padma_vowelsn_U;
$TCSMith_toPadma[TCSMith::TCSMith_vowelsn_U_2]   = Padma::Padma_vowelsn_U;
$TCSMith_toPadma[TCSMith::TCSMith_vowelsn_U_3]   = Padma::Padma_vowelsn_U;
$TCSMith_toPadma[TCSMith::TCSMith_vowelsn_U_4]   = Padma::Padma_vowelsn_U;
$TCSMith_toPadma[TCSMith::TCSMith_vowelsn_U_5]   = Padma::Padma_vowelsn_U;
$TCSMith_toPadma[TCSMith::TCSMith_vowelsn_UU_1]  = Padma::Padma_vowelsn_UU;
$TCSMith_toPadma[TCSMith::TCSMith_vowelsn_UU_2]  = Padma::Padma_vowelsn_UU;
$TCSMith_toPadma[TCSMith::TCSMith_vowelsn_UU_3]  = Padma::Padma_vowelsn_UU;
$TCSMith_toPadma[TCSMith::TCSMith_vowelsn_UU_4]  = Padma::Padma_vowelsn_UU;
$TCSMith_toPadma[TCSMith::TCSMith_vowelsn_UU_5]  = Padma::Padma_vowelsn_UU;
$TCSMith_toPadma[TCSMith::TCSMith_vowelsn_R]     = Padma::Padma_vowelsn_R;
$TCSMith_toPadma[TCSMith::TCSMith_vowelsn_RR]    = Padma::Padma_vowelsn_RR;
$TCSMith_toPadma[TCSMith::TCSMith_vowelsn_E_1]   = Padma::Padma_vowelsn_E;
$TCSMith_toPadma[TCSMith::TCSMith_vowelsn_E_2]   = Padma::Padma_vowelsn_E;
$TCSMith_toPadma[TCSMith::TCSMith_vowelsn_E_3]   = Padma::Padma_vowelsn_E;
$TCSMith_toPadma[TCSMith::TCSMith_vowelsn_E_4]   = Padma::Padma_vowelsn_E;
$TCSMith_toPadma[TCSMith::TCSMith_vowelsn_E_5]   = Padma::Padma_vowelsn_E;
$TCSMith_toPadma[TCSMith::TCSMith_vowelsn_E_6]   = Padma::Padma_vowelsn_E;
$TCSMith_toPadma[TCSMith::TCSMith_vowelsn_E_7]   = Padma::Padma_vowelsn_E;
$TCSMith_toPadma[TCSMith::TCSMith_vowelsn_E_8]   = Padma::Padma_vowelsn_E;
$TCSMith_toPadma[TCSMith::TCSMith_vowelsn_E_9]   = Padma::Padma_vowelsn_E;
$TCSMith_toPadma[TCSMith::TCSMith_vowelsn_EE]    = Padma::Padma_vowelsn_EE;
$TCSMith_toPadma[TCSMith::TCSMith_vowelsn_O_1]   = Padma::Padma_vowelsn_O;
$TCSMith_toPadma[TCSMith::TCSMith_vowelsn_O_2]   = Padma::Padma_vowelsn_O;
$TCSMith_toPadma[TCSMith::TCSMith_vowelsn_O_3]   = Padma::Padma_vowelsn_O;
$TCSMith_toPadma[TCSMith::TCSMith_vowelsn_O_4]   = Padma::Padma_vowelsn_O;
$TCSMith_toPadma[TCSMith::TCSMith_vowelsn_OO]    = Padma::Padma_vowelsn_OO;
$TCSMith_toPadma[TCSMith::TCSMith_vowelsn_AU_1]  = Padma::Padma_vowelsn_AU;
$TCSMith_toPadma[TCSMith::TCSMith_vowelsn_AU_2]  = Padma::Padma_vowelsn_AU;
$TCSMith_toPadma[TCSMith::TCSMith_vowelsn_AU_3]  = Padma::Padma_vowelsn_AU;
$TCSMith_toPadma[TCSMith::TCSMith_vowelsn_AU_4]  = Padma::Padma_vowelsn_AU;
$TCSMith_toPadma[TCSMith::TCSMith_vowelsn_AU_5]  = Padma::Padma_vowelsn_AU;
$TCSMith_toPadma[TCSMith::TCSMith_vowelsn_EELEN] = Padma::Padma_vowelsn_EELEN;
$TCSMith_toPadma[TCSMith::TCSMith_vowelsn_AILEN_1] = Padma::Padma_vowelsn_AILEN;
$TCSMith_toPadma[TCSMith::TCSMith_vowelsn_AILEN_2] = Padma::Padma_vowelsn_AILEN;

//Special Combinations
$TCSMith_toPadma[TCSMith::TCSMith_combo_KSHA]    = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA;
$TCSMith_toPadma[TCSMith::TCSMith_combo_KHI]     = Padma::Padma_consnt_KHA . Padma::Padma_vowelsn_I;
$TCSMith_toPadma[TCSMith::TCSMith_combo_GHAA]    = Padma::Padma_consnt_GHA . Padma::Padma_vowelsn_AA;

$TCSMith_toPadma[TCSMith::TCSMith_combo_CI]      = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_I;
$TCSMith_toPadma[TCSMith::TCSMith_combo_CII]     = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_II;
$TCSMith_toPadma[TCSMith::TCSMith_combo_CHI]     = Padma::Padma_consnt_CHA . Padma::Padma_vowelsn_I;
$TCSMith_toPadma[TCSMith::TCSMith_combo_CHII]    = Padma::Padma_consnt_CHA . Padma::Padma_vowelsn_II;
$TCSMith_toPadma[TCSMith::TCSMith_combo_JI]      = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_I;
$TCSMith_toPadma[TCSMith::TCSMith_combo_JII]     = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_II;

$TCSMith_toPadma[TCSMith::TCSMith_combo_TI]      = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_I;
$TCSMith_toPadma[TCSMith::TCSMith_combo_TII]     = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_II;
$TCSMith_toPadma[TCSMith::TCSMith_combo_NI]      = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_I;
$TCSMith_toPadma[TCSMith::TCSMith_combo_NII]     = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_II;

$TCSMith_toPadma[TCSMith::TCSMith_combo_PAA]     = Padma::Padma_consnt_PA . Padma::Padma_vowelsn_AA;
$TCSMith_toPadma[TCSMith::TCSMith_combo_PO]      = Padma::Padma_consnt_PA . Padma::Padma_vowelsn_O;
$TCSMith_toPadma[TCSMith::TCSMith_combo_POO]     = Padma::Padma_consnt_PA . Padma::Padma_vowelsn_OO;
$TCSMith_toPadma[TCSMith::TCSMith_combo_PAU]     = Padma::Padma_consnt_PA . Padma::Padma_vowelsn_AU;
$TCSMith_toPadma[TCSMith::TCSMith_combo_BI]      = Padma::Padma_consnt_BA . Padma::Padma_vowelsn_I;
$TCSMith_toPadma[TCSMith::TCSMith_combo_BII]     = Padma::Padma_consnt_BA . Padma::Padma_vowelsn_II;
$TCSMith_toPadma[TCSMith::TCSMith_combo_BHI]     = Padma::Padma_consnt_BHA . Padma::Padma_vowelsn_I;
$TCSMith_toPadma[TCSMith::TCSMith_combo_BHII]    = Padma::Padma_consnt_BHA . Padma::Padma_vowelsn_II;
$TCSMith_toPadma[TCSMith::TCSMith_combo_MAA]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_AA;
$TCSMith_toPadma[TCSMith::TCSMith_combo_MI]      = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_I;
$TCSMith_toPadma[TCSMith::TCSMith_combo_MII]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_II;
$TCSMith_toPadma[TCSMith::TCSMith_combo_MAU]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_AU;
$TCSMith_toPadma[TCSMith::TCSMith_combo_MPOLLU]  = Padma::Padma_consnt_MA . Padma::Padma_syllbreak;
$TCSMith_toPadma[TCSMith::TCSMith_combo_M_EELEN] = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_EELEN;

$TCSMith_toPadma[TCSMith::TCSMith_combo_YAA]     = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_AA;
$TCSMith_toPadma[TCSMith::TCSMith_combo_YI]      = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_I;
$TCSMith_toPadma[TCSMith::TCSMith_combo_YII]     = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_II;
$TCSMith_toPadma[TCSMith::TCSMith_combo_Y_EELEN] = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_EELEN;
$TCSMith_toPadma[TCSMith::TCSMith_combo_RAA]     = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_AA;
$TCSMith_toPadma[TCSMith::TCSMith_combo_RI]      = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_I;
$TCSMith_toPadma[TCSMith::TCSMith_combo_RII]     = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_II;
$TCSMith_toPadma[TCSMith::TCSMith_combo_RO]      = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_O;
$TCSMith_toPadma[TCSMith::TCSMith_combo_ROO]     = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_OO;
$TCSMith_toPadma[TCSMith::TCSMith_combo_RPOLLU]  = Padma::Padma_consnt_RA . Padma::Padma_syllbreak;
$TCSMith_toPadma[TCSMith::TCSMith_combo_LI]      = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_I;
$TCSMith_toPadma[TCSMith::TCSMith_combo_LII]     = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_II;
$TCSMith_toPadma[TCSMith::TCSMith_combo_VI]      = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_I;
$TCSMith_toPadma[TCSMith::TCSMith_combo_VII]     = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_II;
$TCSMith_toPadma[TCSMith::TCSMith_combo_SHI]     = Padma::Padma_consnt_SHA . Padma::Padma_vowelsn_I;
$TCSMith_toPadma[TCSMith::TCSMith_combo_SHII]    = Padma::Padma_consnt_SHA . Padma::Padma_vowelsn_II;
$TCSMith_toPadma[TCSMith::TCSMith_combo_SHRII]   = Padma::Padma_consnt_SHA . Padma::Padma_vattu_RA . Padma::Padma_vowelsn_II;
$TCSMith_toPadma[TCSMith::TCSMith_combo_LLI]     = Padma::Padma_consnt_LLA . Padma::Padma_vowelsn_I;
$TCSMith_toPadma[TCSMith::TCSMith_combo_LLII]    = Padma::Padma_consnt_LLA . Padma::Padma_vowelsn_II;
$TCSMith_toPadma[TCSMith::TCSMith_combo_HAA]     = Padma::Padma_consnt_HA . Padma::Padma_vowelsn_AA;

//Vattulu
$TCSMith_toPadma[TCSMith::TCSMith_vattu_KA]      = Padma::Padma_vattu_KA;
$TCSMith_toPadma[TCSMith::TCSMith_vattu_KHA]     = Padma::Padma_vattu_KHA;
$TCSMith_toPadma[TCSMith::TCSMith_vattu_GA]      = Padma::Padma_vattu_GA;
$TCSMith_toPadma[TCSMith::TCSMith_vattu_GHA]     = Padma::Padma_vattu_GHA;
$TCSMith_toPadma[TCSMith::TCSMith_vattu_CA]      = Padma::Padma_vattu_CA;
$TCSMith_toPadma[TCSMith::TCSMith_vattu_CHA]     = Padma::Padma_vattu_CHA;
$TCSMith_toPadma[TCSMith::TCSMith_vattu_JA]      = Padma::Padma_vattu_JA;
$TCSMith_toPadma[TCSMith::TCSMith_vattu_JHA]     = Padma::Padma_vattu_JHA;
$TCSMith_toPadma[TCSMith::TCSMith_vattu_NYA]     = Padma::Padma_vattu_NYA;
$TCSMith_toPadma[TCSMith::TCSMith_vattu_TTA]     = Padma::Padma_vattu_TTA;
$TCSMith_toPadma[TCSMith::TCSMith_vattu_TTHA]    = Padma::Padma_vattu_TTHA;
$TCSMith_toPadma[TCSMith::TCSMith_vattu_DDA]     = Padma::Padma_vattu_DDA;
$TCSMith_toPadma[TCSMith::TCSMith_vattu_NNA]     = Padma::Padma_vattu_NNA;
$TCSMith_toPadma[TCSMith::TCSMith_vattu_TA]      = Padma::Padma_vattu_TA;
$TCSMith_toPadma[TCSMith::TCSMith_vattu_THA]     = Padma::Padma_vattu_THA;
$TCSMith_toPadma[TCSMith::TCSMith_vattu_DA]      = Padma::Padma_vattu_DA;
$TCSMith_toPadma[TCSMith::TCSMith_vattu_DHA]     = Padma::Padma_vattu_DHA;
$TCSMith_toPadma[TCSMith::TCSMith_vattu_NA]      = Padma::Padma_vattu_NA;
$TCSMith_toPadma[TCSMith::TCSMith_vattu_PA]      = Padma::Padma_vattu_PA;
$TCSMith_toPadma[TCSMith::TCSMith_vattu_PHA]     = Padma::Padma_vattu_PHA;
$TCSMith_toPadma[TCSMith::TCSMith_vattu_BA]      = Padma::Padma_vattu_BA;
$TCSMith_toPadma[TCSMith::TCSMith_vattu_BHA]     = Padma::Padma_vattu_BHA;
$TCSMith_toPadma[TCSMith::TCSMith_vattu_MA]      = Padma::Padma_vattu_MA;
$TCSMith_toPadma[TCSMith::TCSMith_vattu_YA]      = Padma::Padma_vattu_YA;
$TCSMith_toPadma[TCSMith::TCSMith_vattu_RA_1]    = Padma::Padma_vattu_RA;
$TCSMith_toPadma[TCSMith::TCSMith_vattu_RA_2]    = Padma::Padma_vattu_RA;
$TCSMith_toPadma[TCSMith::TCSMith_vattu_LA]      = Padma::Padma_vattu_LA;
$TCSMith_toPadma[TCSMith::TCSMith_vattu_VA]      = Padma::Padma_vattu_VA;
$TCSMith_toPadma[TCSMith::TCSMith_vattu_SHA]     = Padma::Padma_vattu_SHA;
$TCSMith_toPadma[TCSMith::TCSMith_vattu_SSA]     = Padma::Padma_vattu_SSA;
$TCSMith_toPadma[TCSMith::TCSMith_vattu_SA]      = Padma::Padma_vattu_SA;
$TCSMith_toPadma[TCSMith::TCSMith_vattu_HA]      = Padma::Padma_vattu_HA;
$TCSMith_toPadma[TCSMith::TCSMith_vattu_LLA]     = Padma::Padma_vattu_LLA;
$TCSMith_toPadma[TCSMith::TCSMith_vattu_RRA]     = Padma::Padma_vattu_RRA;

$TCSMith_toPadma[TCSMith::TCSMith_misc_danda]     = Padma::Padma_danda;
$TCSMith_toPadma[TCSMith::TCSMith_misc_ddanda]    = Padma::Padma_ddanda;

$TCSMith_redundantList = array();
$TCSMith_redundantList[TCSMith::TCSMith_misc_TICK_1]    = true;
$TCSMith_redundantList[TCSMith::TCSMith_misc_TICK_2]    = true;
$TCSMith_redundantList[TCSMith::TCSMith_misc_TICK_3]    = true;
$TCSMith_redundantList[TCSMith::TCSMith_misc_TICK_4]    = true;
$TCSMith_redundantList[TCSMith::TCSMith_misc_UNKNOWN_1] = true;
$TCSMith_redundantList[TCSMith::TCSMith_misc_UNKNOWN_2] = true;
$TCSMith_redundantList[TCSMith::TCSMith_misc_UNKNOWN_3] = true;
$TCSMith_redundantList[TCSMith::TCSMith_misc_UNKNOWN_4] = true;
$TCSMith_redundantList[TCSMith::TCSMith_misc_UNKNOWN_5] = true;
$TCSMith_redundantList[TCSMith::TCSMith_misc_UNKNOWN_6] = true;
$TCSMith_redundantList[TCSMith::TCSMith_misc_UNKNOWN_7] = true;
$TCSMith_redundantList[TCSMith::TCSMith_misc_UNKNOWN_8] = true;
$TCSMith_redundantList[TCSMith::TCSMith_misc_UNKNOWN_9] = true;
$TCSMith_redundantList[TCSMith::TCSMith_misc_UNKNOWN_A] = true;
//$TCSMith_redundantList[TCSMith::TCSMith_HYPHEN]      = true;

$TCSMith_prefixList = array();
$TCSMith_prefixList[TCSMith::TCSMith_virama_2]        = true;
$TCSMith_prefixList[TCSMith::TCSMith_vattu_RA_2]      = true;
$TCSMith_prefixList[TCSMith::TCSMith_vowelsn_I_3]     = true;
$TCSMith_prefixList[TCSMith::TCSMith_vowelsn_II_3]    = true;
$TCSMith_prefixList[TCSMith::TCSMith_vowelsn_E_1]     = true;
$TCSMith_prefixList[TCSMith::TCSMith_vowelsn_E_2]     = true;
$TCSMith_prefixList[TCSMith::TCSMith_vowelsn_E_3]     = true;
$TCSMith_prefixList[TCSMith::TCSMith_vowelsn_E_4]     = true;
$TCSMith_prefixList[TCSMith::TCSMith_vowelsn_E_5]     = true;
$TCSMith_prefixList[TCSMith::TCSMith_vowelsn_E_6]     = true;
$TCSMith_prefixList[TCSMith::TCSMith_vowelsn_E_7]     = true;
$TCSMith_prefixList[TCSMith::TCSMith_vowelsn_E_8]     = true;
$TCSMith_prefixList[TCSMith::TCSMith_vowelsn_E_9]     = true;
$TCSMith_prefixList[TCSMith::TCSMith_vowelsn_EE]      = true;
$TCSMith_prefixList[TCSMith::TCSMith_vowelsn_AILEN_2] = true;

$TCSMith_overloadList = array();
$TCSMith_overloadList[TCSMith::TCSMith_anusvara]    = true;
$TCSMith_overloadList[TCSMith::TCSMith_vowel_E]     = true;
$TCSMith_overloadList[TCSMith::TCSMith_consnt_CA]   = true;
$TCSMith_overloadList[TCSMith::TCSMith_consnt_DDA]  = true;
$TCSMith_overloadList[TCSMith::TCSMith_consnt_DA]   = true;
$TCSMith_overloadList[TCSMith::TCSMith_consnt_PA]   = true;
$TCSMith_overloadList[TCSMith::TCSMith_consnt_PHA_2] = true;
$TCSMith_overloadList[TCSMith::TCSMith_consnt_BA_1] = true;
$TCSMith_overloadList[TCSMith::TCSMith_consnt_BA_2] = true;
$TCSMith_overloadList[TCSMith::TCSMith_consnt_VA]   = true;
$TCSMith_overloadList[TCSMith::TCSMith_vattu_CA]    = true;
$TCSMith_overloadList[TCSMith::TCSMith_vattu_DA]    = true;
$TCSMith_overloadList[TCSMith::TCSMith_vattu_PA]    = true;
$TCSMith_overloadList[TCSMith::TCSMith_vattu_BA]    = true;
$TCSMith_overloadList[TCSMith::TCSMith_combo_CI]    = true;
$TCSMith_overloadList[TCSMith::TCSMith_combo_CHI]   = true;
$TCSMith_overloadList[TCSMith::TCSMith_combo_TI]    = true;
$TCSMith_overloadList[TCSMith::TCSMith_combo_NI]    = true;
$TCSMith_overloadList[TCSMith::TCSMith_combo_BI]    = true;
$TCSMith_overloadList[TCSMith::TCSMith_combo_BHI]   = true;
$TCSMith_overloadList[TCSMith::TCSMith_combo_RO]    = true;
$TCSMith_overloadList[TCSMith::TCSMith_combo_LI]    = true;
$TCSMith_overloadList[TCSMith::TCSMith_combo_VI]    = true;
$TCSMith_overloadList[TCSMith::TCSMith_combo_VII]   = true;
$TCSMith_overloadList[TCSMith::TCSMith_combo_SHI]   = true;
$TCSMith_overloadList[TCSMith::TCSMith_combo_LLI]   = true;
$TCSMith_overloadList["\x65\xC3\x80"]      = true;
$TCSMith_overloadList["\x67\xC3\xA6"]      = true;
$TCSMith_overloadList["\x67\xC3\xAB"]      = true;
$TCSMith_overloadList[TCSMith::TCSMith_misc_YBASE]  = true;
$TCSMith_overloadList["\x68\xC3\x90"]      = true;
$TCSMith_overloadList["\x68\xC3\xA6"]      = true;
$TCSMith_overloadList[TCSMith::TCSMith_misc_danda]  = true;

function TCSMith_initialize()
{
    global $fontinfo;

    $fontinfo["tcsmith"]["language"] = "Telugu";
    $fontinfo["tcsmith"]["class"] = "TCSMith";
}
?>
