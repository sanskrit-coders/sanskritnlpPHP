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

class TeluguFont
{
function TeluguFont()
{
}

//The interface every dynamic font encoding should implement
var $maxLookupLen = 3;
var $fontFace     = "TeluguFont";
var $displayName  = "TeluguFont";
var $script       = Padma::Padma_script_TELUGU;

function lookup  ($str) 
{
    global $TeluguFont_toPadma;
    return $TeluguFont_toPadma[$str];
}

function isPrefixSymbol  ($str)
{
    global $TeluguFont_prefixList;
    return $TeluguFont_prefixList[$str] != null;
}

function isOverloaded  ($str)
{
    global $TeluguFont_overloadList;
    return $TeluguFont_overloadList[$str] != null;
}

function  handleTwoPartVowelSigns  ($sign1, $sign2)
{
    if ($sign2 == Padma::Padma_vowelsn_E && $sign1 == Padma::Padma_vowelsn_AILEN)
        return Padma::Padma_vowelsn_AI;
    if ($sign2 == Padma::Padma_vowelsn_E && $sign1 == Padma::Padma_vowelsn_EELEN)
        return Padma::Padma_vowelsn_EE;
    if ($sign1 == Padma::Padma_vowelsn_I && $sign2 == Padma::Padma_vowelsn_IILEN)
        return Padma::Padma_vowelsn_II;
    if ($sign1 == Padma::Padma_vowelsn_O && $sign2 == Padma::Padma_vowelsn_EELEN)
        return Padma::Padma_vowelsn_OO;
    if ($sign2 == Padma::Padma_vowelsn_E && $sign1 == Padma::Padma_vowelsn_U)
        return Padma::Padma_vowelsn_O;
    if ($sign2 == Padma::Padma_vowelsn_E && ($sign1 == Padma::Padma_vowelsn_II || $sign1 == Padma::Padma_vowelsn_AA))
        return Padma::Padma_vowelsn_OO;
    return $sign1 . $sign2;    
}

//1. Remove redundant symbols (ra and sunna are overloaded... argh!!!)
//2. Insert some talakattus (that we have just removed) that will help with ra Gunintam (anusvara and ra are overloaded)
 function  preprocessMessage  ($input)
{
    $output = ""; $last = null;
    //1.
    $input_len=utf8_strlen($input);
    for($i = 0; $i < $input_len; ++$i) {
    $cur = utf8_substr($input,$i,1);
    if (!TeluguFont::isRedundant($cur, $last))
            $output .= $last = $cur;
    }

    //2.
    return TeluguFont::insertTalakattuForRaGunintam($output);
}


//Terrible hack because this font overloads anusvara and ra
//This will take care of all cases when a vattu follows ra
 function  insertTalakattuForRaGunintam  ($str)
{
    $output = "";
    $last = null;
    $added = false;
     $str_len=utf8_strlen($str);
    for($i = 0; $i < $str_len; ++$i) {
        $cur = utf8_substr($str,$i,1);
	if ($last == TeluguFont::TeluguFont_anusvara && !$added) {
            $val = TeluguFont::lookup($cur);
	    $symbol=utf8_substr($val,0,1);
            if ($val != null && Padma::getType($symbol) == Padma::Padma_type_vattu && !TeluguFont::isPrefixSymbol($cur))
                    $output .= TeluguFont::TeluguFont_misc_TICK_1;
            $output .= $cur;
        }
        else if ($cur == TeluguFont::TeluguFont_anusvara && $last != null && TeluguFont::isPrefixSymbol($last)) {
            $val = TeluguFont::lookup($last);
            $output .= $cur;
            if ($val == Padma::Padma_vowelsn_E) {
                $output .= TeluguFont::TeluguFont_misc_TICK_1;
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

function isRedundant  ($str, $prev)
{
    global $TeluguFont_redundantList;
    if ($str == TeluguFont::TeluguFont_misc_TICK_1 && $prev == TeluguFont::TeluguFont_anusvara)
        return false;
    return $TeluguFont_redundantList[$str] != null;
}

//Implementation details start here

//0x 23, 26 (jha), 

//Specials
const TeluguFont_candrabindu    = "\xC2\xB7";
const TeluguFont_visarga        = "\x4D";
const TeluguFont_virama_1       = "\x60";
const TeluguFont_virama_2       = "\xE2\x80\x99";
const TeluguFont_virama_3       = "\xC2\xA3";
const TeluguFont_virama_4       = "\xC2\xB1";
const TeluguFont_virama_5       = "\xC2\xBA";
const TeluguFont_anusvara       = "\x4C";

//Vowels
const TeluguFont_vowel_A        = "\x40";
const TeluguFont_vowel_AA       = "\x41";
const TeluguFont_vowel_I        = "\x42";
const TeluguFont_vowel_II       = "\x43";
const TeluguFont_vowel_U        = "\x44";
const TeluguFont_vowel_UU       = "\x45";
const TeluguFont_vowel_E        = "\x46";
const TeluguFont_vowel_EE       = "\x47";
const TeluguFont_vowel_AI       = "\x48";
const TeluguFont_vowel_O        = "\x49";
const TeluguFont_vowel_OO       = "\x4A";
const TeluguFont_vowel_AU       = "\x4B";

//Consonants
const TeluguFont_consnt_KA      = "\x4E";
const TeluguFont_consnt_KHA_1   = "\xC3\x85";
const TeluguFont_consnt_KHA_2   = "\xC3\x86";
const TeluguFont_consnt_GA      = "\x67";
const TeluguFont_consnt_GHA     = "\x6D\x6E\xC2\xA7";
const TeluguFont_consnt_NGA     = "\xC3\x83";

const TeluguFont_consnt_CA      = "\xC2\xBF";
const TeluguFont_consnt_CHA     = "\xC2\xBF\x6E";
const TeluguFont_consnt_JA      = "\xC3\x87";
//const TeluguFont_consnt_JHA     = "\xC2\xAA\xE2\x80\x94";
const TeluguFont_consnt_NYA     = "\xC3\x84";

const TeluguFont_consnt_TTA     = "\xC3\x88";
const TeluguFont_consnt_TTHA    = "\x68";
const TeluguFont_consnt_DDA     = "\xC6\x92";
const TeluguFont_consnt_DDHA    = "\xC6\x92\x6E";
const TeluguFont_consnt_NNA     = "\xC3\x9F";

const TeluguFont_consnt_TA      = "\xC2\xBB";
const TeluguFont_consnt_THA     = "\xC2\xB4";
const TeluguFont_consnt_DA      = "\x63";
const TeluguFont_consnt_DHA     = "\x63\x6E";
const TeluguFont_consnt_NA      = "\xC2\xA9";

const TeluguFont_consnt_PA      = "\x6D";
const TeluguFont_consnt_PHA_1   = "\x46\x6E";
const TeluguFont_consnt_PHA_2   = "\x6D\x6E";
const TeluguFont_consnt_BA      = "\xC3\x8A";
const TeluguFont_consnt_BHA     = "\xC3\x8A\x6E";
const TeluguFont_consnt_MA      = "\xC2\xAA\xC2\xA7";

const TeluguFont_consnt_YA      = "\xC2\xB8\xC2\xA7";
const TeluguFont_consnt_RA      = "\x4C\x52";
const TeluguFont_consnt_LA      = "\xC3\x8C";
const TeluguFont_consnt_VA      = "\xC2\xAA";
const TeluguFont_consnt_SHA     = "\x61";
const TeluguFont_consnt_SSA_1   = "\x74";
const TeluguFont_consnt_SSA_2   = "\x75";
const TeluguFont_consnt_SA_1    = "\x71";
const TeluguFont_consnt_SA_2    = "\x72";
const TeluguFont_consnt_HA      = "\xC2\xA4";
const TeluguFont_consnt_LLA     = "\xC3\x8E";
const TeluguFont_consnt_RRA     = "\xC3\xA0";

//Gunintamulu
const TeluguFont_vowelsn_AA_1   = "\x53";
const TeluguFont_vowelsn_AA_2   = "\x79";
const TeluguFont_vowelsn_AA_3   = "\xC3\x98";
const TeluguFont_vowelsn_I_1    = "\x54";
const TeluguFont_vowelsn_I_2    = "\x6A";
const TeluguFont_vowelsn_I_3    = "\x7A";
const TeluguFont_vowelsn_I_4    = "\xC3\x93";
const TeluguFont_vowelsn_II_1   = "\x55";
const TeluguFont_vowelsn_II_2   = "\x6B";
const TeluguFont_vowelsn_II_3   = "\x7B";
const TeluguFont_vowelsn_II_4   = "\xC3\x94";
const TeluguFont_vowelsn_U_1    = "\x56";
const TeluguFont_vowelsn_U_2    = "\x6F";
const TeluguFont_vowelsn_U_3    = "\x76";
const TeluguFont_vowelsn_U_4    = "\xC2\xA7";
const TeluguFont_vowelsn_U_5    = "\xC3\x99";
const TeluguFont_vowelsn_UU_1   = "\x57";
const TeluguFont_vowelsn_UU_2   = "\x70";
const TeluguFont_vowelsn_UU_3   = "\x77";
const TeluguFont_vowelsn_UU_4   = "\xC2\xA8";
const TeluguFont_vowelsn_UU_5   = "\xC3\x9A";
const TeluguFont_vowelsn_R      = "\x58";
const TeluguFont_vowelsn_RR     = "\x59";
const TeluguFont_vowelsn_E_1    = "\x5A";
const TeluguFont_vowelsn_E_2    = "\x6C";
const TeluguFont_vowelsn_E_3    = "\x7C";
const TeluguFont_vowelsn_E_4    = "\xE2\x80\xA6";
const TeluguFont_vowelsn_E_5    = "\xCB\x86";
const TeluguFont_vowelsn_E_6    = "\xC2\xAE";
const TeluguFont_vowelsn_E_7    = "\xC3\x82";
const TeluguFont_vowelsn_E_8    = "\xC3\x9B";
const TeluguFont_vowelsn_E_9    = "\xC3\xA2";
const TeluguFont_vowelsn_EE     = "\x7D";
const TeluguFont_vowelsn_O_1    = "\x5D";
const TeluguFont_vowelsn_O_2    = "\x7E";
const TeluguFont_vowelsn_O_3    = "\xC2\xAF";
const TeluguFont_vowelsn_O_4    = "\xC3\x9C";
const TeluguFont_vowelsn_OO     = "\xC2\xA1";
const TeluguFont_vowelsn_AU_1   = "\x5F";
const TeluguFont_vowelsn_AU_2   = "\x66";
const TeluguFont_vowelsn_AU_3   = "\xE2\x80\x98";
const TeluguFont_vowelsn_AU_4   = "\xC2\xA2";

const TeluguFont_vowelsn_IILEN_1 = "\x64";
const TeluguFont_vowelsn_IILEN_2 = "\xC3\x89";
const TeluguFont_vowelsn_EELEN_1 = "\x5B";
const TeluguFont_vowelsn_EELEN_2 = "\xC3\x8D";
const TeluguFont_vowelsn_AILEN_1 = "\x5C";
const TeluguFont_vowelsn_AILEN_2 = "\x5E";

//Special Combinations
const TeluguFont_combo_KSHA     = "\x4F";
const TeluguFont_combo_KHI      = "\xE2\x80\xB9";
const TeluguFont_combo_GHAA     = "\x6D\x6E\x57";

const TeluguFont_combo_CI       = "\xC3\x80";
const TeluguFont_combo_CHI      = "\xC3\x80\x6E";
const TeluguFont_combo_JI       = "\xC3\x91";
const TeluguFont_combo_JII      = "\xC3\x92";

const TeluguFont_combo_TI       = "\xE2\x80\xA0";
const TeluguFont_combo_NI       = "\xC2\xAC";

const TeluguFont_combo_PAA      = "\x46\x79";
const TeluguFont_combo_PO       = "\x46\x7E";
const TeluguFont_combo_POO      = "\x46\xC2\xA1";
const TeluguFont_combo_PAU      = "\x46\xC2\xA2";
const TeluguFont_combo_PPOLLU   = "\xC2\xA3\x6D";
const TeluguFont_combo_PHPOLLU  = "\xC2\xA3\x6D\x6E";
const TeluguFont_combo_BI       = "\xC3\x95";
const TeluguFont_combo_BHI      = "\xC3\x95\x6E";
const TeluguFont_combo_MAA_1    = "\xC2\xAA\x57";
const TeluguFont_combo_MAA_2    = "\xC2\xAA\x77";
const TeluguFont_combo_MI       = "\xE2\x80\x9A\xC2\xA7";
const TeluguFont_combo_MII      = "\xE2\x80\x9A\x64\xC2\xA7";
const TeluguFont_combo_MEELEN   = "\xC2\xAA\xC3\x8D\xC2\xA7";
const TeluguFont_combo_MAU      = "\xC2\xAA\xC2\xB0";
const TeluguFont_combo_MPOLLU   = "\xC2\xAA\xC2\xBA\xC2\xA7";

const TeluguFont_combo_YAA      = "\xC2\xB8\x77";
const TeluguFont_combo_YI       = "\x4C\x56\x56";
const TeluguFont_combo_YII_1    = "\x4C\x56\x57";
const TeluguFont_combo_YII_2    = "\xC2\xB8\x57";
const TeluguFont_combo_YEELEN   = "\xC2\xB8\xC3\x8D\xC2\xA7";
const TeluguFont_combo_YPOLLU   = "\xC2\xB8\xC2\xBA\xC2\xA7";
const TeluguFont_combo_RAA      = "\x4C\x53";
const TeluguFont_combo_RI       = "\x4C\x6A";
const TeluguFont_combo_RII      = "\x4C\x6B\x6A"; //handle broken telugupeople_com
const TeluguFont_combo_REELEN   = "\x4C\xC3\x8D";
const TeluguFont_combo_RO       = "\x4C\xC2\xAF";
const TeluguFont_combo_RPOLLU   = "\x4C\xC2\xBA";
const TeluguFont_combo_LI       = "\xC3\x96";
const TeluguFont_combo_VI_1     = "\x25";
const TeluguFont_combo_VI_2     = "\xE2\x80\x9A";
const TeluguFont_combo_SHI      = "\x62";
const TeluguFont_combo_SHRII    = "\x24";
const TeluguFont_combo_SSPOLLU_1 = "\xC2\xA3\x74";
const TeluguFont_combo_SSPOLLU_2 = "\xC2\xA3\x75";
const TeluguFont_combo_SPOLLU_1 = "\xC2\xA3\x71";
const TeluguFont_combo_SPOLLU_2 = "\xC2\xA3\x71";
const TeluguFont_combo_LLI      = "\xC5\x92";
const TeluguFont_combo_HAA      = "\xC2\xA5";

//Vattulu
const TeluguFont_vattu_KA       = "\xC3\xA4";
const TeluguFont_vattu_KHA      = "\xC3\xA5";
const TeluguFont_vattu_GA       = "\xC3\xA6";
const TeluguFont_vattu_GHA      = "\xC3\xA7";

const TeluguFont_vattu_CA       = "\xC3\xA8";
const TeluguFont_vattu_CHA      = "\xC3\xA8\xC3\xA9";
const TeluguFont_vattu_JA       = "\xC3\xAA";
const TeluguFont_vattu_JHA      = "\xC3\xAB";
const TeluguFont_vattu_NYA      = "\xC3\xAC";

const TeluguFont_vattu_TTA      = "\xC3\xAD";
const TeluguFont_vattu_TTHA     = "\xC3\xAE";
const TeluguFont_vattu_DDA      = "\xC3\xAF";
const TeluguFont_vattu_NNA      = "\xC3\xB1";

const TeluguFont_vattu_TA       = "\xC3\xB2";
const TeluguFont_vattu_THA      = "\xC3\xB3";
const TeluguFont_vattu_DA       = "\xC3\xB4";
const TeluguFont_vattu_DHA      = "\xC3\xB4\xE2\x80\x9C";
const TeluguFont_vattu_NA       = "\xC3\xB5";

const TeluguFont_vattu_PA       = "\xC3\xB6";
const TeluguFont_vattu_PHA      = "\xC3\xB6\xC3\xA9";
const TeluguFont_vattu_BA       = "\xC3\xB7";
const TeluguFont_vattu_BHA      = "\xC3\xB7\xC3\xA9";
const TeluguFont_vattu_MA       = "\xC3\xB8";

const TeluguFont_vattu_YA       = "\xC3\xB9";
const TeluguFont_vattu_RA_1     = "\xC3\xBA";
const TeluguFont_vattu_RA_2     = "\xC3\xBB";
const TeluguFont_vattu_LA       = "\xE2\x80\x9D";
const TeluguFont_vattu_VA       = "\x2A";
const TeluguFont_vattu_SHA      = "\x2B";
const TeluguFont_vattu_SSA      = "\x3C";
const TeluguFont_vattu_SA       = "\x3D";
const TeluguFont_vattu_HA       = "\x3E";
const TeluguFont_vattu_LLA      = "\xE2\x80\xA2";
const TeluguFont_vattu_RRA      = "\xC3\xBC";

const TeluguFont_LQTSINGLE      = "\x22";
const TeluguFont_RQTSINGLE      = "\x27";
const TeluguFont_misc_DANDA     = "\x65";

//Matches ASCII
const TeluguFont_EXCLAM         = "\x21";
const TeluguFont_PARENLEFT      = "\x28";
const TeluguFont_PARENRIGT      = "\x29";
const TeluguFont_COMMA          = "\x2C";
const TeluguFont_PERIOD         = "\x2E";
const TeluguFont_SLASH          = "\x2F";
const TeluguFont_COLON          = "\x3A";
const TeluguFont_SEMICOLON      = "\x3B";
const TeluguFont_QUESTION       = "\x3F";
const TeluguFont_digit_ZERO     = "\x30";
const TeluguFont_digit_ONE      = "\x31";
const TeluguFont_digit_TWO      = "\x32";
const TeluguFont_digit_THREE    = "\x33";
const TeluguFont_digit_FOUR     = "\x34";
const TeluguFont_digit_FIVE     = "\x35";
const TeluguFont_digit_SIX      = "\x36";
const TeluguFont_digit_SEVEN    = "\x37";
const TeluguFont_digit_EIGHT    = "\x38";
const TeluguFont_digit_NINE     = "\x39";

//does not match ASCII
const TeluguFont_extra_HYPHEN   = "\xE2\x80\x94";

//Kommu
const TeluguFont_misc_TICK_1    = "\x52";
const TeluguFont_misc_TICK_2    = "\x78";
const TeluguFont_misc_TICK_3    = "\xC2\xAB";
const TeluguFont_misc_TICK_4    = "\xC3\x8F";

const TeluguFont_misc_UNKNOWN_1 = "\x50";
const TeluguFont_misc_UNKNOWN_2 = "\x51";
const TeluguFont_misc_UNKNOWN_3 = "\x69";
const TeluguFont_misc_UNKNOWN_4 = "\x73";
const TeluguFont_misc_UNKNOWN_5 = "\xC3\x8B";
const TeluguFont_misc_UNKNOWN_6 = "\xC3\xA3";

const TeluguFont_misc_vattu_1   = "\x6E";
const TeluguFont_misc_vattu_2   = "\xE2\x80\x9E";
const TeluguFont_misc_vattu_3   = "\xE2\x80\x9C";
const TeluguFont_misc_vattu_4   = "\xC3\xA9";

}


$TeluguFont_toPadma = array();

$TeluguFont_toPadma[TeluguFont::TeluguFont_candrabindu] = Padma::Padma_candrabindu;
$TeluguFont_toPadma[TeluguFont::TeluguFont_visarga]  = Padma::Padma_visarga;
$TeluguFont_toPadma[TeluguFont::TeluguFont_virama_1] = Padma::Padma_syllbreak;
$TeluguFont_toPadma[TeluguFont::TeluguFont_virama_2] = Padma::Padma_syllbreak;
$TeluguFont_toPadma[TeluguFont::TeluguFont_virama_3] = Padma::Padma_syllbreak;
$TeluguFont_toPadma[TeluguFont::TeluguFont_virama_4] = Padma::Padma_syllbreak;
$TeluguFont_toPadma[TeluguFont::TeluguFont_virama_5] = Padma::Padma_syllbreak;
$TeluguFont_toPadma[TeluguFont::TeluguFont_anusvara] = Padma::Padma_anusvara;

$TeluguFont_toPadma[TeluguFont::TeluguFont_vowel_A]  = Padma::Padma_vowel_A;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowel_AA] = Padma::Padma_vowel_AA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowel_I]  = Padma::Padma_vowel_I;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowel_II] = Padma::Padma_vowel_II;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowel_U]  = Padma::Padma_vowel_U;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowel_UU] = Padma::Padma_vowel_UU;
//$TeluguFont_toPadma[TeluguFont::TeluguFont_vowel_R]  = Padma::Padma_vowel_R;
//$TeluguFont_toPadma[TeluguFont::TeluguFont_vowel_RR] = Padma::Padma_vowel_RR;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowel_E]  = Padma::Padma_vowel_E;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowel_EE] = Padma::Padma_vowel_EE;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowel_AI] = Padma::Padma_vowel_AI;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowel_O]  = Padma::Padma_vowel_O;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowel_OO] = Padma::Padma_vowel_OO;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowel_AU] = Padma::Padma_vowel_AU;

$TeluguFont_toPadma[TeluguFont::TeluguFont_consnt_KA]    = Padma::Padma_consnt_KA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_consnt_KHA_1] = Padma::Padma_consnt_KHA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_consnt_KHA_2] = Padma::Padma_consnt_KHA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_consnt_GA]    = Padma::Padma_consnt_GA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_consnt_GHA]   = Padma::Padma_consnt_GHA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_consnt_NGA]   = Padma::Padma_consnt_NGA;

$TeluguFont_toPadma[TeluguFont::TeluguFont_consnt_CA]  = Padma::Padma_consnt_CA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_consnt_CHA] = Padma::Padma_consnt_CHA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_consnt_JA]  = Padma::Padma_consnt_JA;
//$TeluguFont_toPadma[TeluguFont::TeluguFont_consnt_JHA] = Padma::Padma_consnt_JHA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_consnt_NYA] = Padma::Padma_consnt_NYA;

$TeluguFont_toPadma[TeluguFont::TeluguFont_consnt_TTA]  = Padma::Padma_consnt_TTA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_consnt_TTHA] = Padma::Padma_consnt_TTHA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_consnt_DDA]  = Padma::Padma_consnt_DDA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_consnt_DDHA] = Padma::Padma_consnt_DDHA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_consnt_NNA]  = Padma::Padma_consnt_NNA;

$TeluguFont_toPadma[TeluguFont::TeluguFont_consnt_TA]  = Padma::Padma_consnt_TA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_consnt_THA] = Padma::Padma_consnt_THA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_consnt_DA]  = Padma::Padma_consnt_DA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_consnt_DHA] = Padma::Padma_consnt_DHA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_consnt_NA]  = Padma::Padma_consnt_NA;

$TeluguFont_toPadma[TeluguFont::TeluguFont_consnt_PA]  = Padma::Padma_consnt_PA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_consnt_PHA_1] = Padma::Padma_consnt_PHA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_consnt_PHA_2] = Padma::Padma_consnt_PHA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_consnt_BA]  = Padma::Padma_consnt_BA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_consnt_BHA] = Padma::Padma_consnt_BHA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_consnt_MA]  = Padma::Padma_consnt_MA;

$TeluguFont_toPadma[TeluguFont::TeluguFont_consnt_YA]  = Padma::Padma_consnt_YA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_consnt_RA]  = Padma::Padma_consnt_RA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_consnt_LA]  = Padma::Padma_consnt_LA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_consnt_VA]  = Padma::Padma_consnt_VA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_consnt_SHA]  = Padma::Padma_consnt_SHA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_consnt_SSA_1] = Padma::Padma_consnt_SSA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_consnt_SSA_2] = Padma::Padma_consnt_SSA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_consnt_SA_1] = Padma::Padma_consnt_SA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_consnt_SA_2] = Padma::Padma_consnt_SA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_consnt_HA]  = Padma::Padma_consnt_HA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_consnt_LLA] = Padma::Padma_consnt_LLA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_consnt_RRA] = Padma::Padma_consnt_RRA;

//Gunintamulu
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowelsn_AA_1]  = Padma::Padma_vowelsn_AA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowelsn_AA_2]  = Padma::Padma_vowelsn_AA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowelsn_AA_3]  = Padma::Padma_vowelsn_AA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowelsn_I_1]   = Padma::Padma_vowelsn_I;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowelsn_I_2]   = Padma::Padma_vowelsn_I;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowelsn_I_3]   = Padma::Padma_vowelsn_I;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowelsn_I_4]   = Padma::Padma_vowelsn_I;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowelsn_II_1]  = Padma::Padma_vowelsn_II;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowelsn_II_2]  = Padma::Padma_vowelsn_II;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowelsn_II_3]  = Padma::Padma_vowelsn_II;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowelsn_II_4]  = Padma::Padma_vowelsn_II;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowelsn_U_1]   = Padma::Padma_vowelsn_U;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowelsn_U_2]   = Padma::Padma_vowelsn_U;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowelsn_U_3]   = Padma::Padma_vowelsn_U;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowelsn_U_4]   = Padma::Padma_vowelsn_U;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowelsn_U_5]   = Padma::Padma_vowelsn_U;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowelsn_UU_1]  = Padma::Padma_vowelsn_UU;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowelsn_UU_2]  = Padma::Padma_vowelsn_UU;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowelsn_UU_3]  = Padma::Padma_vowelsn_UU;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowelsn_UU_4]  = Padma::Padma_vowelsn_UU;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowelsn_UU_5]  = Padma::Padma_vowelsn_UU;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowelsn_R]     = Padma::Padma_vowelsn_R;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowelsn_RR]    = Padma::Padma_vowelsn_RR;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowelsn_E_1]   = Padma::Padma_vowelsn_E;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowelsn_E_2]   = Padma::Padma_vowelsn_E;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowelsn_E_3]   = Padma::Padma_vowelsn_E;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowelsn_E_4]   = Padma::Padma_vowelsn_E;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowelsn_E_5]   = Padma::Padma_vowelsn_E;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowelsn_E_6]   = Padma::Padma_vowelsn_E;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowelsn_E_7]   = Padma::Padma_vowelsn_E;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowelsn_E_8]   = Padma::Padma_vowelsn_E;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowelsn_E_9]   = Padma::Padma_vowelsn_E;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowelsn_EE]    = Padma::Padma_vowelsn_EE;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowelsn_O_1]   = Padma::Padma_vowelsn_O;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowelsn_O_2]   = Padma::Padma_vowelsn_O;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowelsn_O_3]   = Padma::Padma_vowelsn_O;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowelsn_O_4]   = Padma::Padma_vowelsn_O;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowelsn_OO]    = Padma::Padma_vowelsn_OO;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowelsn_AU_1]  = Padma::Padma_vowelsn_AU;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowelsn_AU_2]  = Padma::Padma_vowelsn_AU;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowelsn_AU_3]  = Padma::Padma_vowelsn_AU;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowelsn_AU_4]  = Padma::Padma_vowelsn_AU;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowelsn_IILEN_1] = Padma::Padma_vowelsn_IILEN;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowelsn_IILEN_2] = Padma::Padma_vowelsn_IILEN;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowelsn_EELEN_1] = Padma::Padma_vowelsn_EELEN;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowelsn_EELEN_2] = Padma::Padma_vowelsn_EELEN;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowelsn_AILEN_1] = Padma::Padma_vowelsn_AILEN;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vowelsn_AILEN_2] = Padma::Padma_vowelsn_AILEN;

//Special Combinations
$TeluguFont_toPadma[TeluguFont::TeluguFont_combo_KSHA]    = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_combo_KHI]     = Padma::Padma_consnt_KHA . Padma::Padma_vowelsn_I;
$TeluguFont_toPadma[TeluguFont::TeluguFont_combo_GHAA]    = Padma::Padma_consnt_GHA . Padma::Padma_vowelsn_AA;

$TeluguFont_toPadma[TeluguFont::TeluguFont_combo_CI]      = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_I;
$TeluguFont_toPadma[TeluguFont::TeluguFont_combo_CHI]     = Padma::Padma_consnt_CHA . Padma::Padma_vowelsn_I;
$TeluguFont_toPadma[TeluguFont::TeluguFont_combo_JI]      = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_I;
$TeluguFont_toPadma[TeluguFont::TeluguFont_combo_JII]     = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_II;

$TeluguFont_toPadma[TeluguFont::TeluguFont_combo_TI]      = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_I;
$TeluguFont_toPadma[TeluguFont::TeluguFont_combo_NI]      = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_I;

$TeluguFont_toPadma[TeluguFont::TeluguFont_combo_PAA]     = Padma::Padma_consnt_PA . Padma::Padma_vowelsn_AA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_combo_PO]      = Padma::Padma_consnt_PA . Padma::Padma_vowelsn_O;
$TeluguFont_toPadma[TeluguFont::TeluguFont_combo_POO]     = Padma::Padma_consnt_PA . Padma::Padma_vowelsn_OO;
$TeluguFont_toPadma[TeluguFont::TeluguFont_combo_PAU]     = Padma::Padma_consnt_PA . Padma::Padma_vowelsn_AU;
$TeluguFont_toPadma[TeluguFont::TeluguFont_combo_PPOLLU]  = Padma::Padma_consnt_PA . Padma::Padma_syllbreak;
$TeluguFont_toPadma[TeluguFont::TeluguFont_combo_PHPOLLU] = Padma::Padma_consnt_PHA . Padma::Padma_syllbreak;
$TeluguFont_toPadma[TeluguFont::TeluguFont_combo_BI]      = Padma::Padma_consnt_BA . Padma::Padma_vowelsn_I;
$TeluguFont_toPadma[TeluguFont::TeluguFont_combo_BHI]     = Padma::Padma_consnt_BHA . Padma::Padma_vowelsn_I;
$TeluguFont_toPadma[TeluguFont::TeluguFont_combo_MAA_1]   = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_AA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_combo_MAA_2]   = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_AA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_combo_MI]      = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_I;
$TeluguFont_toPadma[TeluguFont::TeluguFont_combo_MII]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_II;
$TeluguFont_toPadma[TeluguFont::TeluguFont_combo_MEELEN]  = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_EELEN;
$TeluguFont_toPadma[TeluguFont::TeluguFont_combo_MAU]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_AU;
$TeluguFont_toPadma[TeluguFont::TeluguFont_combo_MPOLLU]  = Padma::Padma_consnt_MA . Padma::Padma_syllbreak;

$TeluguFont_toPadma[TeluguFont::TeluguFont_combo_YAA]     = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_AA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_combo_YI]      = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_I;
$TeluguFont_toPadma[TeluguFont::TeluguFont_combo_YII_1]   = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_II;
$TeluguFont_toPadma[TeluguFont::TeluguFont_combo_YII_2]   = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_II;
$TeluguFont_toPadma[TeluguFont::TeluguFont_combo_YEELEN]  = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_EELEN;
$TeluguFont_toPadma[TeluguFont::TeluguFont_combo_YPOLLU]  = Padma::Padma_consnt_YA . Padma::Padma_syllbreak;
$TeluguFont_toPadma[TeluguFont::TeluguFont_combo_RAA]     = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_AA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_combo_RI]      = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_I;
$TeluguFont_toPadma[TeluguFont::TeluguFont_combo_RII]     = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_II;
$TeluguFont_toPadma[TeluguFont::TeluguFont_combo_REELEN]  = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_EELEN;
$TeluguFont_toPadma[TeluguFont::TeluguFont_combo_RO]      = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_O;
$TeluguFont_toPadma[TeluguFont::TeluguFont_combo_RPOLLU]  = Padma::Padma_consnt_RA . Padma::Padma_syllbreak;
$TeluguFont_toPadma[TeluguFont::TeluguFont_combo_LI]      = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_I;
$TeluguFont_toPadma[TeluguFont::TeluguFont_combo_VI_1]    = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_I;
$TeluguFont_toPadma[TeluguFont::TeluguFont_combo_VI_2]    = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_I;
$TeluguFont_toPadma[TeluguFont::TeluguFont_combo_SHI]     = Padma::Padma_consnt_SHA . Padma::Padma_vowelsn_I;
$TeluguFont_toPadma[TeluguFont::TeluguFont_combo_SHRII]   = Padma::Padma_consnt_SHA . Padma::Padma_vattu_RA . Padma::Padma_vowelsn_II;
$TeluguFont_toPadma[TeluguFont::TeluguFont_combo_SSPOLLU_1] = Padma::Padma_consnt_SSA . Padma::Padma_syllbreak;
$TeluguFont_toPadma[TeluguFont::TeluguFont_combo_SSPOLLU_2] = Padma::Padma_consnt_SSA . Padma::Padma_syllbreak;
$TeluguFont_toPadma[TeluguFont::TeluguFont_combo_SPOLLU_1] = Padma::Padma_consnt_SA . Padma::Padma_syllbreak;
$TeluguFont_toPadma[TeluguFont::TeluguFont_combo_SPOLLU_2] = Padma::Padma_consnt_SA . Padma::Padma_syllbreak;
$TeluguFont_toPadma[TeluguFont::TeluguFont_combo_LLI]     = Padma::Padma_consnt_LLA . Padma::Padma_vowelsn_I;
$TeluguFont_toPadma[TeluguFont::TeluguFont_combo_HAA]     = Padma::Padma_consnt_HA . Padma::Padma_vowelsn_AA;

//Vattulu
$TeluguFont_toPadma[TeluguFont::TeluguFont_vattu_KA]      = Padma::Padma_vattu_KA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vattu_KHA]     = Padma::Padma_vattu_KHA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vattu_GA]      = Padma::Padma_vattu_GA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vattu_GHA]     = Padma::Padma_vattu_GHA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vattu_CA]      = Padma::Padma_vattu_CA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vattu_CHA]     = Padma::Padma_vattu_CHA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vattu_JA]      = Padma::Padma_vattu_JA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vattu_JHA]     = Padma::Padma_vattu_JHA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vattu_NYA]     = Padma::Padma_vattu_NYA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vattu_TTA]     = Padma::Padma_vattu_TTA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vattu_TTHA]    = Padma::Padma_vattu_TTHA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vattu_DDA]     = Padma::Padma_vattu_DDA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vattu_NNA]     = Padma::Padma_vattu_NNA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vattu_TA]      = Padma::Padma_vattu_TA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vattu_THA]     = Padma::Padma_vattu_THA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vattu_DA]      = Padma::Padma_vattu_DA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vattu_DHA]     = Padma::Padma_vattu_DHA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vattu_NA]      = Padma::Padma_vattu_NA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vattu_PA]      = Padma::Padma_vattu_PA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vattu_PHA]     = Padma::Padma_vattu_PHA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vattu_BA]      = Padma::Padma_vattu_BA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vattu_BHA]     = Padma::Padma_vattu_BHA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vattu_MA]      = Padma::Padma_vattu_MA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vattu_YA]      = Padma::Padma_vattu_YA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vattu_RA_1]    = Padma::Padma_vattu_RA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vattu_RA_2]    = Padma::Padma_vattu_RA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vattu_LA]      = Padma::Padma_vattu_LA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vattu_VA]      = Padma::Padma_vattu_VA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vattu_SHA]     = Padma::Padma_vattu_SHA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vattu_SSA]     = Padma::Padma_vattu_SSA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vattu_SA]      = Padma::Padma_vattu_SA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vattu_HA]      = Padma::Padma_vattu_HA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vattu_LLA]     = Padma::Padma_vattu_LLA;
$TeluguFont_toPadma[TeluguFont::TeluguFont_vattu_RRA]     = Padma::Padma_vattu_RRA;

$TeluguFont_toPadma[TeluguFont::TeluguFont_LQTSINGLE]  = "\xE2\x80\x98";
$TeluguFont_toPadma[TeluguFont::TeluguFont_RQTSINGLE]  = "\xE2\x80\x99";
$TeluguFont_toPadma[TeluguFont::TeluguFont_misc_DANDA] = Padma::Padma_danda;

$TeluguFont_toPadma[TeluguFont::TeluguFont_extra_HYPHEN] = '-';

$TeluguFont_redundantList = array();
$TeluguFont_redundantList[TeluguFont::TeluguFont_misc_TICK_1]    = true;
$TeluguFont_redundantList[TeluguFont::TeluguFont_misc_TICK_2]    = true;
$TeluguFont_redundantList[TeluguFont::TeluguFont_misc_TICK_3]    = true;
$TeluguFont_redundantList[TeluguFont::TeluguFont_misc_TICK_4]    = true;
$TeluguFont_redundantList[TeluguFont::TeluguFont_misc_UNKNOWN_1] = true;
$TeluguFont_redundantList[TeluguFont::TeluguFont_misc_UNKNOWN_2] = true;
$TeluguFont_redundantList[TeluguFont::TeluguFont_misc_UNKNOWN_3] = true;
$TeluguFont_redundantList[TeluguFont::TeluguFont_misc_UNKNOWN_4] = true;
$TeluguFont_redundantList[TeluguFont::TeluguFont_misc_UNKNOWN_5] = true;
$TeluguFont_redundantList[TeluguFont::TeluguFont_misc_UNKNOWN_6] = true;

$TeluguFont_prefixList = array();
$TeluguFont_prefixList[TeluguFont::TeluguFont_vowelsn_I_3]     = true;
$TeluguFont_prefixList[TeluguFont::TeluguFont_vowelsn_II_3]    = true;
$TeluguFont_prefixList[TeluguFont::TeluguFont_vowelsn_E_1]     = true;
$TeluguFont_prefixList[TeluguFont::TeluguFont_vowelsn_E_2]     = true;
$TeluguFont_prefixList[TeluguFont::TeluguFont_vowelsn_E_3]     = true;
$TeluguFont_prefixList[TeluguFont::TeluguFont_vowelsn_E_4]     = true;
$TeluguFont_prefixList[TeluguFont::TeluguFont_vowelsn_E_5]     = true;
$TeluguFont_prefixList[TeluguFont::TeluguFont_vowelsn_E_6]     = true;
$TeluguFont_prefixList[TeluguFont::TeluguFont_vowelsn_E_7]     = true;
$TeluguFont_prefixList[TeluguFont::TeluguFont_vowelsn_E_8]     = true;
$TeluguFont_prefixList[TeluguFont::TeluguFont_vowelsn_E_9]     = true;
$TeluguFont_prefixList[TeluguFont::TeluguFont_vowelsn_EE]      = true;
$TeluguFont_prefixList[TeluguFont::TeluguFont_vowelsn_AILEN_1] = true;
$TeluguFont_prefixList[TeluguFont::TeluguFont_vattu_RA_1]      = true;

$TeluguFont_overloadList = array();
$TeluguFont_overloadList[TeluguFont::TeluguFont_virama_3]      = true;
$TeluguFont_overloadList[TeluguFont::TeluguFont_anusvara]      = true;
$TeluguFont_overloadList[TeluguFont::TeluguFont_vowel_E]       = true;
$TeluguFont_overloadList[TeluguFont::TeluguFont_consnt_CA]     = true;
$TeluguFont_overloadList[TeluguFont::TeluguFont_consnt_DA]     = true;
$TeluguFont_overloadList[TeluguFont::TeluguFont_consnt_DDA]    = true;
$TeluguFont_overloadList[TeluguFont::TeluguFont_consnt_PA]     = true;
$TeluguFont_overloadList[TeluguFont::TeluguFont_consnt_PHA_2]  = true;
$TeluguFont_overloadList[TeluguFont::TeluguFont_consnt_BA]     = true;
$TeluguFont_overloadList[TeluguFont::TeluguFont_consnt_VA]     = true;
$TeluguFont_overloadList[TeluguFont::TeluguFont_vattu_CA]      = true;
$TeluguFont_overloadList[TeluguFont::TeluguFont_vattu_DA]      = true;
$TeluguFont_overloadList[TeluguFont::TeluguFont_vattu_PA]      = true;
$TeluguFont_overloadList[TeluguFont::TeluguFont_vattu_BA]      = true;
$TeluguFont_overloadList[TeluguFont::TeluguFont_combo_CI]      = true;
$TeluguFont_overloadList[TeluguFont::TeluguFont_combo_PPOLLU]  = true;
$TeluguFont_overloadList[TeluguFont::TeluguFont_combo_BI]      = true;
$TeluguFont_overloadList[TeluguFont::TeluguFont_combo_VI_2]    = true;
$TeluguFont_overloadList["\x4C\x56"]           = true;
$TeluguFont_overloadList["\x4C\x6B"]           = true;
$TeluguFont_overloadList["\xE2\x80\x9A\x64"]           = true;
$TeluguFont_overloadList["\xC2\xAA\xC2\xBA"]           = true;
$TeluguFont_overloadList["\xC2\xAA\xC3\x8D"]           = true;
$TeluguFont_overloadList["\xC2\xB8"]                 = true;
$TeluguFont_overloadList["\xC2\xB8\xC2\xBA"]           = true;
$TeluguFont_overloadList["\xC2\xB8\xC3\x8D"]           = true;

function TeluguFont_initialize()
{
    global $fontinfo;

    $fontinfo["telugufont"]["language"] = "Telugu";
    $fontinfo["telugufont"]["class"] = "TeluguFont";
}
?>
