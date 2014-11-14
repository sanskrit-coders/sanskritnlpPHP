<?php
/* ***** BEGIN LICENSE BLOCK *****
 *
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


//TL_HEMALATHA Telugu
class TL_Hemalatha
{
function TL_Hemalatha()
{
}

//The interface every dynamic font encoding should implement
var $maxLookupLen = 4;
var $fontFace     = "TL-TTHemalatha";
var $displayName  = "TL-TTHemalatha";
var $script       = Padma::Padma_script_TELUGU;

function lookup($str) 
{
    global $TL_Hemalatha_toPadma;
    return $TL_Hemalatha_toPadma[$str];
}

function isPrefixSymbol($str)
{
    global $TL_Hemalatha_prefixList;
    return $TL_Hemalatha_prefixList[$str] != null;
}

function isOverloaded ($str)
{
    global $TL_Hemalatha_overloadList;
    return $TL_Hemalatha_overloadList[$str] != null;
}

function handleTwoPartVowelSigns ($sign1, $sign2)
{
    if ($sign2 == Padma::Padma_vowelsn_E) {
        if ($sign1 == Padma::Padma_vowelsn_AILEN)
            return Padma::Padma_vowelsn_AI;
        if ($sign1 == Padma::Padma_vowelsn_EELEN)
            return Padma::Padma_vowelsn_EE;
        if ($sign1 == Padma::Padma_vowelsn_AA)
            return Padma::Padma_vowelsn_OO;
        if ($sign1 == Padma::Padma_vowelsn_U)
            return Padma::Padma_vowelsn_O;
    }
    return $sign1 . $sign2;
}

//Baby steps
//1_ Remove redundant symbols
//2_ Insert some talakattus (that we have just removed) that will help with ra Gunintam (anusvara and ra are overloaded)
function preprocessMessage ($input)
{
    $output = "";
    $last = null;
    //1_
    $input_len=utf8_strlen($input);
    for($i = 0; $i < $input_len; ++$i) {
         $cur = utf8_substr($input,$i,1);
	// echo "\n cur is:".$cur;
	if(!TL_Hemalatha::isRedundant($cur, $last))
	 {
            $output .= $last = $cur;
	 //   echo "\n o/p is".$output;
	 }
    }
   $out_len = utf8_strlen($output);
    for($i = 0; $i < $out_len; ++$i) {
         $cur1 = utf8_substr($output,$i,1);
         $cur2 = utf8_substr($output,$i+1,1);
            if($cur1 == "\xC3\xA1")
            {
             if($cur2 == "\x5B")
             {
             $output1 = $output1 . $cur1 . $cur2;
             $i++;
             }
            }
            else
            {
              $output1 .= $cur1;
            }
    } 
    //2_
    return TL_Hemalatha::insertTalakattuForRaGunintam($output1);
}

//Terrible hack because this font overloads anusvara and ra
//This will take care of all cases when a vattu follows ra
function insertTalakattuForRaGunintam ($str)
{
    $output = ""; $last = null; $added = false;

    $str_len=utf8_strlen($str);
//    echo "\n str length in ITFRG".$str_len;
    for($i = 0; $i < $str_len; ++$i) {
         $cur = utf8_substr($str,$i,1);
        if ($last ==TL_Hemalatha::TL_Hemalatha_anusvara && !$added) {
            $val = TL_Hemalatha::lookup($cur);
	             $symbol=utf8_substr($val,0,1);
            if ($val != null && Padma::getType($symbol) == Padma::Padma_type_vattu && !TL_Hemalatha::isPrefixSymbol($cur))
                    {
		    $output .=TL_Hemalatha::TL_Hemalatha_misc_TICK_1;
		    }
            $output .= $cur;
        }
        else if ($cur == TL_Hemalatha::TL_Hemalatha_anusvara && $last != null && TL_Hemalatha::isPrefixSymbol($last)) {
            $val = TL_Hemalatha::lookup($last);
            $output .= $cur;
            if ($val == Padma::Padma_vowelsn_E) {
                $output .= TL_Hemalatha::TL_Hemalatha_misc_TICK_1;
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

function isRedundant ($str, $prev)
{
    global $TL_Hemalatha_redundantList;
    if ($str == TL_Hemalatha::TL_Hemalatha_misc_TICK_1 && $prev == TL_Hemalatha::TL_Hemalatha_anusvara)
        return false;
    return $TL_Hemalatha_redundantList[$str] != null;
}


//Implementation details start here

//Specials
const TL_Hemalatha_candrabindu    = "\xC2\xB7";
const TL_Hemalatha_candrabindu_2  = "\xE2\x88\x99";
const TL_Hemalatha_avagraha       = "\xE3\x80\xB0";
const TL_Hemalatha_visarga        = "\x4D";
const TL_Hemalatha_anusvara       = "\x4C";
const TL_Hemalatha_virama_1       = "\x60";
const TL_Hemalatha_virama_2       = "\xC2\xA3";
const TL_Hemalatha_virama_3       = "\xC2\xB1";
const TL_Hemalatha_virama_4       = "\xC2\xBA";
const TL_Hemalatha_virama_5       = "\xC3\x9E";

//Vowels
const TL_Hemalatha_vowel_A        = "\x40";
const TL_Hemalatha_vowel_AA       = "\x41";
const TL_Hemalatha_vowel_I        = "\x42";
const TL_Hemalatha_vowel_II       = "\x43";
const TL_Hemalatha_vowel_U        = "\x44";
const TL_Hemalatha_vowel_UU       = "\x45";
const TL_Hemalatha_vowel_R        = "\xC3\x8A\x56\x56";
const TL_Hemalatha_vowel_E        = "\x46";
const TL_Hemalatha_vowel_EE       = "\x47";
const TL_Hemalatha_vowel_AI       = "\x48";
const TL_Hemalatha_vowel_O        = "\x49";
const TL_Hemalatha_vowel_OO       = "\x4A";
const TL_Hemalatha_vowel_AU       = "\x4B";

//Consonants
const TL_Hemalatha_consnt_KA      = "\x4E";
const TL_Hemalatha_consnt_KHA_1   = "\xC3\x85";
const TL_Hemalatha_consnt_KHA_2   = "\xC3\x86";
const TL_Hemalatha_consnt_GA      = "\x67";
const TL_Hemalatha_consnt_GHA     = "\x6D\x6E\x56";
const TL_Hemalatha_consnt_NGA     = "\xC3\x83";

const TL_Hemalatha_consnt_CA      = "\xC2\xBF";
const TL_Hemalatha_consnt_CHA     = "\xC2\xBF\xC2\xB3";
const TL_Hemalatha_consnt_JA      = "\xC3\x87";
const TL_Hemalatha_consnt_JHA     = "\x4C\x52\x26\x56"; 
const TL_Hemalatha_consnt_NYA     = "\xC3\x84";

const TL_Hemalatha_consnt_TTA_1   = "\xC3\x88";
const TL_Hemalatha_consnt_TTA_2   = "\xC3\x89";
const TL_Hemalatha_consnt_TTHA    = "\x68";
const TL_Hemalatha_consnt_DDA     = "\xC2\xB2";
const TL_Hemalatha_consnt_DDHA    = "\xC2\xB2\xC2\xB3";         
const TL_Hemalatha_consnt_NNA     = "\xC3\x9F";               

const TL_Hemalatha_consnt_TA      = "\xC2\xBB";
const TL_Hemalatha_consnt_THA     = "\xC2\xB4";
const TL_Hemalatha_consnt_DA      = "\xC2\xB5";
const TL_Hemalatha_consnt_DHA     = "\xC2\xB5\xC2\xB3";
const TL_Hemalatha_consnt_NA      = "\xC2\xA9";

const TL_Hemalatha_consnt_PA      = "\x6D";
const TL_Hemalatha_consnt_PHA     = "\x6D\x6E";  
const TL_Hemalatha_consnt_BA_1    = "\xC3\x8A";
const TL_Hemalatha_consnt_BA_2    = "\xC3\x8B";
const TL_Hemalatha_consnt_BHA     = "\xC3\x8B\xC2\xB3";
const TL_Hemalatha_consnt_MA      = "\xC2\xAA\x56";

const TL_Hemalatha_consnt_YA      = "\xC2\xB8\x56";
const TL_Hemalatha_consnt_RA      = "\x4C\x52";
const TL_Hemalatha_consnt_LA_1    = "\xC3\x8C";
const TL_Hemalatha_consnt_LA_2    = "\xC3\x8D";         
const TL_Hemalatha_consnt_VA      = "\xC2\xAA";
const TL_Hemalatha_consnt_SHA     = "\x61";
const TL_Hemalatha_consnt_SSA_1   = "\x74";
const TL_Hemalatha_consnt_SSA_2   = "\x75";
const TL_Hemalatha_consnt_SA_1    = "\x71";
const TL_Hemalatha_consnt_SA_2    = "\x72";

const TL_Hemalatha_consnt_HA      = "\xC2\xA4";
const TL_Hemalatha_consnt_LLA     = "\xC3\x8E";
const TL_Hemalatha_conjct_KSHA    = "\x4F";
const TL_Hemalatha_consnt_RRA     = "\xC3\xA0";  

//Gunintamulu
const TL_Hemalatha_vowelsn_AA_1   = "\x53";
const TL_Hemalatha_vowelsn_AA_2   = "\x79";
const TL_Hemalatha_vowelsn_AA_3   = "\xC3\x98";
const TL_Hemalatha_vowelsn_I_1    = "\x54";
const TL_Hemalatha_vowelsn_I_2    = "\x6A";
const TL_Hemalatha_vowelsn_I_3    = "\x7A";
const TL_Hemalatha_vowelsn_I_4    = "\xC3\x93";
const TL_Hemalatha_vowelsn_II_1   = "\x55";
const TL_Hemalatha_vowelsn_II_2   = "\x6B";
const TL_Hemalatha_vowelsn_II_3   = "\x7B";
const TL_Hemalatha_vowelsn_II_4   = "\xC3\x94";
const TL_Hemalatha_vowelsn_U_1    = "\x56";
const TL_Hemalatha_vowelsn_U_2    = "\x6F";
const TL_Hemalatha_vowelsn_U_3    = "\x76";
const TL_Hemalatha_vowelsn_U_4    = "\xC2\xA7";
const TL_Hemalatha_vowelsn_U_5    = "\xC3\x99";
const TL_Hemalatha_vowelsn_UU_1   = "\x57";
const TL_Hemalatha_vowelsn_UU_2   = "\x70";
const TL_Hemalatha_vowelsn_UU_3   = "\x77";
const TL_Hemalatha_vowelsn_UU_4   = "\xC2\xA8";
const TL_Hemalatha_vowelsn_UU_5   = "\xC3\x9A";
const TL_Hemalatha_vowelsn_R      = "\x58";
const TL_Hemalatha_vowelsn_RR     = "\x59";
const TL_Hemalatha_vowelsn_E_1    = "\x5A";
const TL_Hemalatha_vowelsn_E_2    = "\x6C";
const TL_Hemalatha_vowelsn_E_3    = "\x7C";
const TL_Hemalatha_vowelsn_E_4    = "\xC2\xAE";
const TL_Hemalatha_vowelsn_E_5    = "\xC2\xB9";
const TL_Hemalatha_vowelsn_E_6    = "\xC2\xBE";
const TL_Hemalatha_vowelsn_E_7    = "\xC3\x82";
const TL_Hemalatha_vowelsn_E_8    = "\xC3\x9B";
const TL_Hemalatha_vowelsn_E_9    = "\xC3\xA1";
const TL_Hemalatha_vowelsn_E_10   = "\xC3\xA2";
const TL_Hemalatha_vowelsn_EE_1   = "\x7D";
const TL_Hemalatha_vowelsn_EE_2   = "\xC3\xA1\x5B";
const TL_Hemalatha_vowelsn_O_1    = "\x5D";
const TL_Hemalatha_vowelsn_O_2    = "\x7E";
const TL_Hemalatha_vowelsn_O_3    = "\xC2\xAF";
const TL_Hemalatha_vowelsn_O_4    = "\xC3\x9C";
const TL_Hemalatha_vowelsn_OO_1   = "\x5D\x5B";
const TL_Hemalatha_vowelsn_OO_2   = "\xC2\xA1";
const TL_Hemalatha_vowelsn_OO_3   = "\xC2\xAF\x5B";
const TL_Hemalatha_vowelsn_OO_4   = "\xC3\x9C\x5B";
const TL_Hemalatha_vowelsn_AU_1   = "\x5F";
const TL_Hemalatha_vowelsn_AU_2   = "\x66";
const TL_Hemalatha_vowelsn_AU_3   = "\xC2\xA2";
const TL_Hemalatha_vowelsn_AU_4   = "\xC3\x9D";

const TL_Hemalatha_vowelsn_EELEN    = "\x5B";
const TL_Hemalatha_vowelsn_AILEN_1  = "\x5C";
const TL_Hemalatha_vowelsn_AILEN_2  = "\x5E";

//Special Combinations
const TL_Hemalatha_combo_KHI      = "\xC3\x90";
const TL_Hemalatha_combo_KHII     = "\xC3\x90\x64";
const TL_Hemalatha_combo_GHAA     = "\x6D\x6E\x57";

const TL_Hemalatha_combo_CI       = "\xC3\x80";
const TL_Hemalatha_combo_CII      = "\xC3\x80\x64";
const TL_Hemalatha_combo_CHI      = "\xC3\x80\xC2\xB3";
const TL_Hemalatha_combo_CHII     = "\xC3\x80\xC2\xB3\x64";
const TL_Hemalatha_combo_JI       = "\xC3\x91";
const TL_Hemalatha_combo_JII      = "\xC3\x92";
const TL_Hemalatha_combo_JHAA     = "\x4C\x52\x26\x57";

const TL_Hemalatha_combo_TI       = "\xC2\xBC";
const TL_Hemalatha_combo_TII      = "\xC2\xBC\x64";
const TL_Hemalatha_combo_NI       = "\xC2\xAC";
const TL_Hemalatha_combo_NII      = "\xC2\xAC\x64";

const TL_Hemalatha_combo_PAA      = "\x46\x79";
const TL_Hemalatha_combo_PO       = "\x46\x7E";
const TL_Hemalatha_combo_POO      = "\x46\xC2\xA1";
const TL_Hemalatha_combo_PAU      = "\x46\xC2\xA2";
const TL_Hemalatha_combo_PHAA     = "\x46\x6E\x79";
const TL_Hemalatha_combo_PHO      = "\x46\x6E\x7E";
const TL_Hemalatha_combo_PHOO     = "\x46\x6E\xC2\xA1";
const TL_Hemalatha_combo_PHAU     = "\x46\x6E\xC2\xA2";
const TL_Hemalatha_combo_PDA      = "\x46\xC3\xB4";
const TL_Hemalatha_combo_PLA      = "\x46\xC3\xBD";
const TL_Hemalatha_combo_PHDA     = "\x46\x6E\xC3\xB4";
const TL_Hemalatha_combo_PHLA     = "\x46\x6E\xC3\xBD";
const TL_Hemalatha_combo_BI       = "\xC3\x95";
const TL_Hemalatha_combo_BII      = "\xC3\x95\x64";
const TL_Hemalatha_combo_BHI      = "\xC3\x95\xC2\xB3";
const TL_Hemalatha_combo_BHII     = "\xC3\x95\xC2\xB3\x64";
const TL_Hemalatha_combo_MAA      = "\xC2\xAA\x57";
const TL_Hemalatha_combo_MI       = "\x25\x56";
const TL_Hemalatha_combo_MII      = "\x25\x64\x56";
const TL_Hemalatha_combo_MAU      = "\xC2\xAA\xC2\xB0";
const TL_Hemalatha_combo_MEELEN   = "\xC2\xAA\x5B\x56";
const TL_Hemalatha_combo_MPOLLU   = "\xC2\xAA\xC2\xB1\x56";

const TL_Hemalatha_combo_YAA      = "\xC2\xB8\x57";
const TL_Hemalatha_combo_YI       = "\x4C\x56\x56";
const TL_Hemalatha_combo_YII      = "\x4C\x56\x57";
const TL_Hemalatha_combo_YEELEN   = "\xC2\xB8\x5B\x56";
const TL_Hemalatha_combo_YPOLLU   = "\xC2\xB8\xC2\xBA\x56";
const TL_Hemalatha_combo_RAA      = "\x4C\x53";
const TL_Hemalatha_combo_RI       = "\x4C\x6A";
const TL_Hemalatha_combo_RII      = "\x4C\x6B";
const TL_Hemalatha_combo_RU       = "\x4C\x52\x56";
const TL_Hemalatha_combo_RAU      = "\x4C\x5F";
const TL_Hemalatha_combo_RO       = "\x4C\x5D";
const TL_Hemalatha_combo_ROO      = "\x4C\x5D\x5B";
const TL_Hemalatha_combo_REELEN   = "\x4C\x5B";
const TL_Hemalatha_combo_RPOLLU   = "\x4C\x60";
const TL_Hemalatha_combo_LI       = "\xC3\x96";
const TL_Hemalatha_combo_LII      = "\xC3\x96\x64";               
const TL_Hemalatha_combo_VI       = "\x25";
const TL_Hemalatha_combo_VII      = "\x25\x64";
const TL_Hemalatha_combo_SHI      = "\x62";
const TL_Hemalatha_combo_SHII     = "\x62\x64";               

const TL_Hemalatha_combo_HAA      = "\xC2\xA5";
const TL_Hemalatha_combo_LLI      = "\xC3\x97";
const TL_Hemalatha_combo_LLII     = "\xC3\x97\x64";               

const TL_Hemalatha_combo_SHRII    = "\x24";

//Vattulu
const TL_Hemalatha_vattu_KA       = "\xC3\xA4";
const TL_Hemalatha_vattu_KHA      = "\xC3\xA5";
const TL_Hemalatha_vattu_GA       = "\xC3\xA6";
const TL_Hemalatha_vattu_GHA      = "\xC3\xA7";
//const TL_Hemalatha_vattu_NGA      = "\u00??";

const TL_Hemalatha_vattu_CA       = "\xC3\xA8";
const TL_Hemalatha_vattu_CHA      = "\xC3\xA8\xC3\xA9";
const TL_Hemalatha_vattu_JA       = "\xC3\xAA";
const TL_Hemalatha_vattu_JHA      = "\xC3\xAB";
const TL_Hemalatha_vattu_NYA      = "\xC3\xAC";

const TL_Hemalatha_vattu_TTA      = "\xC3\xAD";
const TL_Hemalatha_vattu_TTHA     = "\xC3\xAE";
const TL_Hemalatha_vattu_DDA      = "\xC3\xAF";
const TL_Hemalatha_vattu_DDHA     = "\xC3\xAF\xC3\xB0";
const TL_Hemalatha_vattu_NNA      = "\xC3\xB1";

const TL_Hemalatha_vattu_TA       = "\xC3\xB2";
const TL_Hemalatha_vattu_THA      = "\xC3\xB3";
const TL_Hemalatha_vattu_DA       = "\xC3\xB4";
const TL_Hemalatha_vattu_DHA      = "\xC3\xB4\xC3\xB0";
const TL_Hemalatha_vattu_NA       = "\xC3\xB5";

const TL_Hemalatha_vattu_PA       = "\xC3\xB6";
const TL_Hemalatha_vattu_PHA      = "\xC3\xB6\xC3\xA9";
const TL_Hemalatha_vattu_BA       = "\xC3\xB7";
const TL_Hemalatha_vattu_BHA      = "\xC3\xB7\xC3\xA9";
const TL_Hemalatha_vattu_MA       = "\xC3\xB8";

const TL_Hemalatha_vattu_YA       = "\xC3\xB9";
const TL_Hemalatha_vattu_RA_1     = "\xC3\xBA";
const TL_Hemalatha_vattu_RA_2     = "\xC3\xBB";
const TL_Hemalatha_vattu_LA       = "\xC3\xBD";
const TL_Hemalatha_vattu_VA       = "\x2A";
const TL_Hemalatha_vattu_SHA      = "\x2B";
const TL_Hemalatha_vattu_SSA      = "\x3C";
const TL_Hemalatha_vattu_SA       = "\x3D";
const TL_Hemalatha_vattu_HA       = "\x3E";
const TL_Hemalatha_vattu_LLA      = "\xC3\xBE";
const TL_Hemalatha_vattu_RRA      = "\xC3\xBC";

//Digits
const TL_Hemalatha_digit_ZERO     = "\x30";
const TL_Hemalatha_digit_ONE      = "\x31";
const TL_Hemalatha_digit_TWO      = "\x32";
const TL_Hemalatha_digit_THREE    = "\x33";
const TL_Hemalatha_digit_FOUR     = "\x34";
const TL_Hemalatha_digit_FIVE     = "\x35";
const TL_Hemalatha_digit_SIX      = "\x36";
const TL_Hemalatha_digit_SEVEN    = "\x37";
const TL_Hemalatha_digit_EIGHT    = "\x38";
const TL_Hemalatha_digit_NINE     = "\x39";

//Matches ASCII
const TL_Hemalatha_EXCLAM         = "\x21";
const TL_Hemalatha_QTSINGLE       = "\x27";
const TL_Hemalatha_PARENLEFT      = "\x28";
const TL_Hemalatha_PARENRIGT      = "\x29";
const TL_Hemalatha_COMMA          = "\x2C"; 
const TL_Hemalatha_PERIOD         = "\x2E";
const TL_Hemalatha_SLASH          = "\x2F";
const TL_Hemalatha_COLON          = "\x3A";
const TL_Hemalatha_SEMICOLON      = "\x3B";
const TL_Hemalatha_QUESTION       = "\x3F";

//Does not match ASCII
const TL_Hemalatha_extra_QTSINGLE = "\x22"; 
const TL_Hemalatha_HYPHEN         = "\x63";
const TL_Hemalatha_PIPE           = "\x65";

//Kommu
const TL_Hemalatha_misc_TICK_1    = "\x52";
const TL_Hemalatha_misc_TICK_2    = "\x78";
const TL_Hemalatha_misc_TICK_3    = "\xC2\xAB";
const TL_Hemalatha_misc_TICK_4    = "\xC3\x8F";

//
const TL_Hemalatha_misc_vattu     = "\xC2\xB3";
           

//What are these for?
const TL_Hemalatha_misc_UNKNOWN_1  = "\x2D";
const TL_Hemalatha_misc_UNKNOWN_2  = "\x50";
const TL_Hemalatha_misc_UNKNOWN_3  = "\x51";
const TL_Hemalatha_misc_UNKNOWN_4  = "\x69";
const TL_Hemalatha_misc_UNKNOWN_5  = "\x73";
const TL_Hemalatha_misc_UNKNOWN_6  = "\xC2\xB6";
const TL_Hemalatha_misc_UNKNOWN_7  = "\xC2\xA6";
const TL_Hemalatha_misc_UNKNOWN_8  = "\xC2\xBD";
const TL_Hemalatha_misc_UNKNOWN_9  = "\xC3\x81";
//const TL_Hemalatha_misc_UNKNOWN_10 = "\xC3\xA1";
const TL_Hemalatha_misc_UNKNOWN_11 = "\xC3\xA3";
const TL_Hemalatha_misc_UNKNOWN_12 = "\x23";
}

$TL_Hemalatha_toPadma = array();

$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_candrabindu]   = Padma::Padma_candrabindu;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_candrabindu_2] = Padma::Padma_candrabindu;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_avagraha] = Padma::Padma_avagraha;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_visarga]  = Padma::Padma_visarga;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_virama_1] = Padma::Padma_syllbreak;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_virama_2] = Padma::Padma_syllbreak;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_virama_3] = Padma::Padma_syllbreak;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_virama_4] = Padma::Padma_syllbreak;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_virama_5] = Padma::Padma_syllbreak;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_anusvara] = Padma::Padma_anusvara;

$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowel_A]  = Padma::Padma_vowel_A;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowel_AA] = Padma::Padma_vowel_AA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowel_I]  = Padma::Padma_vowel_I;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowel_II] = Padma::Padma_vowel_II;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowel_U]  = Padma::Padma_vowel_U;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowel_UU] = Padma::Padma_vowel_UU;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowel_R]  = Padma::Padma_vowel_R;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowel_E]  = Padma::Padma_vowel_E;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowel_EE] = Padma::Padma_vowel_EE;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowel_AI] = Padma::Padma_vowel_AI;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowel_O]  = Padma::Padma_vowel_O;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowel_OO] = Padma::Padma_vowel_OO;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowel_AU] = Padma::Padma_vowel_AU;

$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_consnt_KA]    = Padma::Padma_consnt_KA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_consnt_KHA_1] = Padma::Padma_consnt_KHA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_consnt_KHA_2] = Padma::Padma_consnt_KHA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_consnt_GA]    = Padma::Padma_consnt_GA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_consnt_GHA] = Padma::Padma_consnt_GHA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_consnt_NGA] = Padma::Padma_consnt_NGA;

$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_consnt_CA] = Padma::Padma_consnt_CA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_consnt_CHA] = Padma::Padma_consnt_CHA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_consnt_JA] = Padma::Padma_consnt_JA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_consnt_JHA] = Padma::Padma_consnt_JHA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_consnt_NYA] = Padma::Padma_consnt_NYA;

$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_consnt_TTA_1] = Padma::Padma_consnt_TTA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_consnt_TTA_2] = Padma::Padma_consnt_TTA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_consnt_TTHA] = Padma::Padma_consnt_TTHA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_consnt_DDA] = Padma::Padma_consnt_DDA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_consnt_DDHA] = Padma::Padma_consnt_DDHA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_consnt_NNA] = Padma::Padma_consnt_NNA;

$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_consnt_TA] = Padma::Padma_consnt_TA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_consnt_THA] = Padma::Padma_consnt_THA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_consnt_DA] = Padma::Padma_consnt_DA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_consnt_DHA] = Padma::Padma_consnt_DHA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_consnt_NA] = Padma::Padma_consnt_NA;

$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_consnt_PA]   = Padma::Padma_consnt_PA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_consnt_PHA]  = Padma::Padma_consnt_PHA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_consnt_BA_1] = Padma::Padma_consnt_BA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_consnt_BA_2] = Padma::Padma_consnt_BA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_consnt_BHA]  = Padma::Padma_consnt_BHA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_consnt_MA]  = Padma::Padma_consnt_MA;

$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_consnt_YA] = Padma::Padma_consnt_YA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_consnt_RA] = Padma::Padma_consnt_RA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_consnt_LA_1] = Padma::Padma_consnt_LA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_consnt_LA_2] = Padma::Padma_consnt_LA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_consnt_VA] = Padma::Padma_consnt_VA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_consnt_SHA] = Padma::Padma_consnt_SHA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_consnt_SSA_1] = Padma::Padma_consnt_SSA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_consnt_SSA_2] = Padma::Padma_consnt_SSA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_consnt_SA_1] = Padma::Padma_consnt_SA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_consnt_SA_2] = Padma::Padma_consnt_SA;

$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_consnt_HA] = Padma::Padma_consnt_HA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_consnt_LLA] = Padma::Padma_consnt_LLA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_consnt_RRA] = Padma::Padma_consnt_RRA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_conjct_KSHA] =Padma::Padma_consnt_KA .Padma::Padma_vattu_SSA;

//Gunintamulu
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_AA_1]  = Padma::Padma_vowelsn_AA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_AA_2]  = Padma::Padma_vowelsn_AA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_AA_3]  = Padma::Padma_vowelsn_AA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_I_1]   = Padma::Padma_vowelsn_I;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_I_2]   = Padma::Padma_vowelsn_I;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_I_3]   = Padma::Padma_vowelsn_I;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_I_4]   = Padma::Padma_vowelsn_I;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_II_1]  = Padma::Padma_vowelsn_II;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_II_2]  = Padma::Padma_vowelsn_II;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_II_3]  = Padma::Padma_vowelsn_II;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_II_4]  = Padma::Padma_vowelsn_II;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_U_1]   = Padma::Padma_vowelsn_U;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_U_2]   = Padma::Padma_vowelsn_U;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_U_3]   = Padma::Padma_vowelsn_U;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_U_4]   = Padma::Padma_vowelsn_U;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_U_5]   = Padma::Padma_vowelsn_U;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_UU_1]  = Padma::Padma_vowelsn_UU;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_UU_2]  = Padma::Padma_vowelsn_UU;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_UU_3]  = Padma::Padma_vowelsn_UU;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_UU_4]  = Padma::Padma_vowelsn_UU;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_UU_5]  = Padma::Padma_vowelsn_UU;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_R]     = Padma::Padma_vowelsn_R;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_RR]    = Padma::Padma_vowelsn_RR;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_E_1]   = Padma::Padma_vowelsn_E;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_E_2]   = Padma::Padma_vowelsn_E;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_E_3]   = Padma::Padma_vowelsn_E;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_E_4]   = Padma::Padma_vowelsn_E;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_E_5]   = Padma::Padma_vowelsn_E;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_E_6]   = Padma::Padma_vowelsn_E;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_E_7]   = Padma::Padma_vowelsn_E;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_E_8]   = Padma::Padma_vowelsn_E;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_E_9]   = Padma::Padma_vowelsn_E;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_EE_1]  = Padma::Padma_vowelsn_EE;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_EE_2]  = Padma::Padma_vowelsn_EE;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_O_1]   = Padma::Padma_vowelsn_O;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_O_2]   = Padma::Padma_vowelsn_O;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_O_3]   = Padma::Padma_vowelsn_O;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_O_4]   = Padma::Padma_vowelsn_O;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_OO_1]  = Padma::Padma_vowelsn_OO;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_OO_2]  = Padma::Padma_vowelsn_OO;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_OO_3]  = Padma::Padma_vowelsn_OO;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_OO_4]  = Padma::Padma_vowelsn_OO;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_AU_1]  = Padma::Padma_vowelsn_AU;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_AU_2]  = Padma::Padma_vowelsn_AU;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_AU_3]  = Padma::Padma_vowelsn_AU;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_AU_4]  = Padma::Padma_vowelsn_AU;

$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_EELEN]   = Padma::Padma_vowelsn_EELEN;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_AILEN_1] = Padma::Padma_vowelsn_AILEN;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vowelsn_AILEN_2] = Padma::Padma_vowelsn_AILEN;

//Special Combinations
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_KHI]     = Padma::Padma_consnt_KHA .  Padma::Padma_vowelsn_I;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_KHII]    = Padma::Padma_consnt_KHA . Padma::Padma_vowelsn_II;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_GHAA]    = Padma::Padma_consnt_GHA . Padma::Padma_vowelsn_AA;

$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_CI]      = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_I;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_CII]     = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_II;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_CHI]     = Padma::Padma_consnt_CHA . Padma::Padma_vowelsn_I;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_CHII]    = Padma::Padma_consnt_CHA . Padma::Padma_vowelsn_II;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_JI]      = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_I;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_JII]     = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_II;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_JHAA]    = Padma::Padma_consnt_JHA . Padma::Padma_vowelsn_AA;

$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_TI]      = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_I;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_TII]     = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_II;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_NI]      = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_I;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_NII]     = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_II;

$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_PAA]     = Padma::Padma_consnt_PA . Padma::Padma_vowelsn_AA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_PO]      = Padma::Padma_consnt_PA . Padma::Padma_vowelsn_O;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_POO]     = Padma::Padma_consnt_PA . Padma::Padma_vowelsn_OO;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_PAU]     = Padma::Padma_consnt_PA . Padma::Padma_vowelsn_AU;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_PDA]     = Padma::Padma_consnt_PA . Padma::Padma_vattu_DA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_PLA]     = Padma::Padma_consnt_PA . Padma::Padma_vattu_LA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_PHDA]    = Padma::Padma_consnt_PHA . Padma::Padma_vattu_DA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_PHLA]    = Padma::Padma_consnt_PHA . Padma::Padma_vattu_LA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_PHAA]    = Padma::Padma_consnt_PHA . Padma::Padma_vowelsn_AA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_PHO]     = Padma::Padma_consnt_PHA . Padma::Padma_vowelsn_O;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_PHOO]    = Padma::Padma_consnt_PHA . Padma::Padma_vowelsn_OO;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_PHAU]    = Padma::Padma_consnt_PHA . Padma::Padma_vowelsn_AU;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_BI]      = Padma::Padma_consnt_BA . Padma::Padma_vowelsn_I;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_BII]     = Padma::Padma_consnt_BA . Padma::Padma_vowelsn_II;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_BHI]     = Padma::Padma_consnt_BHA . Padma::Padma_vowelsn_I;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_BHII]    = Padma::Padma_consnt_BHA . Padma::Padma_vowelsn_II;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_MAA]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_AA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_MI]      = Padma::Padma_consnt_MA .  Padma::Padma_vowelsn_I;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_MII]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_II;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_MAU]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_AU;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_MEELEN]  = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_EELEN;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_MPOLLU]  = Padma::Padma_consnt_MA . Padma::Padma_syllbreak;

$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_YAA]     = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_AA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_YI]      = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_I;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_YII]     = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_II;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_YEELEN]  = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_EELEN;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_YPOLLU]  = Padma::Padma_consnt_YA . Padma::Padma_syllbreak;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_RAA]     = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_AA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_RI]      = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_I;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_RII]     = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_II;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_RU]      = Padma::Padma_consnt_RA .  Padma::Padma_vowelsn_U;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_RAU]     = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_AU;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_RO]      = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_O;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_ROO]     = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_OO;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_REELEN]  = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_EELEN;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_RPOLLU]  = Padma::Padma_consnt_RA . Padma::Padma_syllbreak;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_LI]      = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_I;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_LII]     = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_II;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_VI]      = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_I;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_VII]     = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_II;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_SHI]     = Padma::Padma_consnt_SHA . Padma::Padma_vowelsn_I;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_SHII]    = Padma::Padma_consnt_SHA . Padma::Padma_vowelsn_II;

$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_HAA]     = Padma::Padma_consnt_HA . Padma::Padma_vowelsn_AA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_LLI]     = Padma::Padma_consnt_LLA . Padma::Padma_vowelsn_I;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_LLII]    = Padma::Padma_consnt_LLA . Padma::Padma_vowelsn_II;

$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_combo_SHRII]   = Padma::Padma_consnt_SHA .Padma::Padma_vattu_RA . Padma::Padma_vowelsn_II;

//Vattulu
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vattu_KA]      = Padma::Padma_vattu_KA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vattu_KHA]     = Padma::Padma_vattu_KHA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vattu_GA]      = Padma::Padma_vattu_GA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vattu_GHA]     = Padma::Padma_vattu_GHA;
//$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vattu_NGA]     = Padma::Padma_vattu_NGA;

$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vattu_CA]      = Padma::Padma_vattu_CA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vattu_CHA]     = Padma::Padma_vattu_CHA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vattu_JA]      = Padma::Padma_vattu_JA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vattu_JHA]     = Padma::Padma_vattu_JHA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vattu_NYA]     = Padma::Padma_vattu_NYA;

$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vattu_TTA]     = Padma::Padma_vattu_TTA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vattu_TTHA]    = Padma::Padma_vattu_TTHA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vattu_DDA]     = Padma::Padma_vattu_DDA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vattu_DDHA]    = Padma::Padma_vattu_DDHA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vattu_NNA]     = Padma::Padma_vattu_NNA;

$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vattu_TA]      = Padma::Padma_vattu_TA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vattu_THA]     = Padma::Padma_vattu_THA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vattu_DA]      = Padma::Padma_vattu_DA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vattu_DHA]     = Padma::Padma_vattu_DHA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vattu_NA]      = Padma::Padma_vattu_NA;

$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vattu_PA]      = Padma::Padma_vattu_PA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vattu_PHA]     = Padma::Padma_vattu_PHA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vattu_BA]      = Padma::Padma_vattu_BA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vattu_BHA]     = Padma::Padma_vattu_BHA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vattu_MA]      = Padma::Padma_vattu_MA;

$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vattu_YA]      = Padma::Padma_vattu_YA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vattu_RA_1]    = Padma::Padma_vattu_RA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vattu_RA_2]    = Padma::Padma_vattu_RA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vattu_LA]      = Padma::Padma_vattu_LA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vattu_VA]      = Padma::Padma_vattu_VA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vattu_SHA]     = Padma::Padma_vattu_SHA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vattu_SSA]     = Padma::Padma_vattu_SSA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vattu_SA]      = Padma::Padma_vattu_SA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vattu_HA]      = Padma::Padma_vattu_HA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vattu_LLA]     = Padma::Padma_vattu_LLA;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_vattu_RRA]     = Padma::Padma_vattu_RRA;

//Miscellaneous(where it doesn't match ASCII representation)
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_extra_QTSINGLE] = TL_Hemalatha::TL_Hemalatha_QTSINGLE;
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_HYPHEN]         = "-";
$TL_Hemalatha_toPadma[TL_Hemalatha::TL_Hemalatha_PIPE]           = "|";

$TL_Hemalatha_redundantList = array();
$TL_Hemalatha_redundantList[TL_Hemalatha::TL_Hemalatha_misc_TICK_1] = true;
$TL_Hemalatha_redundantList[TL_Hemalatha::TL_Hemalatha_misc_TICK_2] = true;
$TL_Hemalatha_redundantList[TL_Hemalatha::TL_Hemalatha_misc_TICK_3] = true;
$TL_Hemalatha_redundantList[TL_Hemalatha::TL_Hemalatha_misc_TICK_4] = true;
$TL_Hemalatha_redundantList[TL_Hemalatha::TL_Hemalatha_misc_UNKNOWN_1]  = true;
$TL_Hemalatha_redundantList[TL_Hemalatha::TL_Hemalatha_misc_UNKNOWN_2]  = true;
$TL_Hemalatha_redundantList[TL_Hemalatha::TL_Hemalatha_misc_UNKNOWN_3]  = true;
$TL_Hemalatha_redundantList[TL_Hemalatha::TL_Hemalatha_misc_UNKNOWN_4]  = true;
$TL_Hemalatha_redundantList[TL_Hemalatha::TL_Hemalatha_misc_UNKNOWN_5]  = true;
$TL_Hemalatha_redundantList[TL_Hemalatha::TL_Hemalatha_misc_UNKNOWN_6]  = true;
$TL_Hemalatha_redundantList[TL_Hemalatha::TL_Hemalatha_misc_UNKNOWN_7]  = true;
$TL_Hemalatha_redundantList[TL_Hemalatha::TL_Hemalatha_misc_UNKNOWN_8]  = true;
$TL_Hemalatha_redundantList[TL_Hemalatha::TL_Hemalatha_misc_UNKNOWN_9]  = true;
//$TL_Hemalatha_redundantList[TL_Hemalatha::TL_Hemalatha_misc_UNKNOWN_10] = true;
$TL_Hemalatha_redundantList[TL_Hemalatha::TL_Hemalatha_misc_UNKNOWN_11] = true;
$TL_Hemalatha_redundantList[TL_Hemalatha::TL_Hemalatha_misc_UNKNOWN_12] = true;
$TL_Hemalatha_redundantList[TL_Hemalatha::TL_Hemalatha_vowelsn_E_10] = true;

$TL_Hemalatha_prefixList = array();
$TL_Hemalatha_prefixList[TL_Hemalatha::TL_Hemalatha_virama_2]     = true;
$TL_Hemalatha_prefixList[TL_Hemalatha::TL_Hemalatha_vowelsn_I_3]  = true;
$TL_Hemalatha_prefixList[TL_Hemalatha::TL_Hemalatha_vowelsn_II_3] = true;
$TL_Hemalatha_prefixList[TL_Hemalatha::TL_Hemalatha_vowelsn_E_1]  = true;
$TL_Hemalatha_prefixList[TL_Hemalatha::TL_Hemalatha_vowelsn_E_2]  = true;
$TL_Hemalatha_prefixList[TL_Hemalatha::TL_Hemalatha_vowelsn_E_3]  = true;
$TL_Hemalatha_prefixList[TL_Hemalatha::TL_Hemalatha_vowelsn_E_4]  = true;
$TL_Hemalatha_prefixList[TL_Hemalatha::TL_Hemalatha_vowelsn_E_5]  = true;
$TL_Hemalatha_prefixList[TL_Hemalatha::TL_Hemalatha_vowelsn_E_6]  = true;
$TL_Hemalatha_prefixList[TL_Hemalatha::TL_Hemalatha_vowelsn_E_7]  = true;
$TL_Hemalatha_prefixList[TL_Hemalatha::TL_Hemalatha_vowelsn_E_8]  = true;
$TL_Hemalatha_prefixList[TL_Hemalatha::TL_Hemalatha_vowelsn_EE_1] = true;
$TL_Hemalatha_prefixList[TL_Hemalatha::TL_Hemalatha_vowelsn_AILEN_1] = true;
$TL_Hemalatha_prefixList[TL_Hemalatha::TL_Hemalatha_vattu_RA_1]   = true;

$TL_Hemalatha_overloadList = array();
$TL_Hemalatha_overloadList[TL_Hemalatha::TL_Hemalatha_anusvara]    = true;
$TL_Hemalatha_overloadList[TL_Hemalatha::TL_Hemalatha_vowel_E]     = true;
$TL_Hemalatha_overloadList[TL_Hemalatha::TL_Hemalatha_consnt_CA]   = true;
$TL_Hemalatha_overloadList[TL_Hemalatha::TL_Hemalatha_consnt_DDA]  = true;
$TL_Hemalatha_overloadList[TL_Hemalatha::TL_Hemalatha_consnt_DA]   = true;
$TL_Hemalatha_overloadList[TL_Hemalatha::TL_Hemalatha_consnt_PA]   = true;
$TL_Hemalatha_overloadList[TL_Hemalatha::TL_Hemalatha_consnt_PHA]  = true;
$TL_Hemalatha_overloadList[TL_Hemalatha::TL_Hemalatha_consnt_BA_1] = true;
$TL_Hemalatha_overloadList[TL_Hemalatha::TL_Hemalatha_consnt_BA_2] = true;
$TL_Hemalatha_overloadList[TL_Hemalatha::TL_Hemalatha_consnt_RA]   = true;
$TL_Hemalatha_overloadList[TL_Hemalatha::TL_Hemalatha_consnt_VA]   = true;
$TL_Hemalatha_overloadList[TL_Hemalatha::TL_Hemalatha_vowelsn_E_9] = true;
$TL_Hemalatha_overloadList[TL_Hemalatha::TL_Hemalatha_vowelsn_O_1] = true;
$TL_Hemalatha_overloadList[TL_Hemalatha::TL_Hemalatha_vowelsn_O_3] = true;
$TL_Hemalatha_overloadList[TL_Hemalatha::TL_Hemalatha_vowelsn_O_4] = true;
$TL_Hemalatha_overloadList[TL_Hemalatha::TL_Hemalatha_combo_KHI]   = true;
$TL_Hemalatha_overloadList[TL_Hemalatha::TL_Hemalatha_combo_CI]    = true;
$TL_Hemalatha_overloadList[TL_Hemalatha::TL_Hemalatha_combo_CHI]   = true;
$TL_Hemalatha_overloadList[TL_Hemalatha::TL_Hemalatha_combo_TI]    = true;
$TL_Hemalatha_overloadList[TL_Hemalatha::TL_Hemalatha_combo_NI]    = true;
$TL_Hemalatha_overloadList[TL_Hemalatha::TL_Hemalatha_combo_PHAA]  = true;
$TL_Hemalatha_overloadList[TL_Hemalatha::TL_Hemalatha_combo_BI]    = true;
$TL_Hemalatha_overloadList[TL_Hemalatha::TL_Hemalatha_combo_BHI]   = true;
$TL_Hemalatha_overloadList[TL_Hemalatha::TL_Hemalatha_combo_LI]    = true;
$TL_Hemalatha_overloadList[TL_Hemalatha::TL_Hemalatha_combo_VI]    = true;
$TL_Hemalatha_overloadList[TL_Hemalatha::TL_Hemalatha_combo_VII]   = true;
$TL_Hemalatha_overloadList[TL_Hemalatha::TL_Hemalatha_combo_SHI]   = true;
$TL_Hemalatha_overloadList[TL_Hemalatha::TL_Hemalatha_combo_LLI]   = true;
$TL_Hemalatha_overloadList[TL_Hemalatha::TL_Hemalatha_vattu_CA]    = true;
$TL_Hemalatha_overloadList[TL_Hemalatha::TL_Hemalatha_vattu_DDA]   = true;
$TL_Hemalatha_overloadList[TL_Hemalatha::TL_Hemalatha_vattu_DA]    = true;
$TL_Hemalatha_overloadList[TL_Hemalatha::TL_Hemalatha_vattu_PA]    = true;
$TL_Hemalatha_overloadList[TL_Hemalatha::TL_Hemalatha_vattu_BA]    = true;
$TL_Hemalatha_overloadList["\x46\x6E"]        = true;
$TL_Hemalatha_overloadList["\x46\xC3\xBD"]        = true;
$TL_Hemalatha_overloadList["\x4C\x52\x26"]  = true;
$TL_Hemalatha_overloadList["\x4C\x56"]        = true;
$TL_Hemalatha_overloadList["\x4C\x5D"]        = true;
$TL_Hemalatha_overloadList["\xC2\xAA\x5B"]        = true;
$TL_Hemalatha_overloadList["\xC2\xAA\xC2\xB1"]        = true;
$TL_Hemalatha_overloadList["\xC2\xB8"]              = true;
$TL_Hemalatha_overloadList["\xC2\xB8\x5B"]        = true;
$TL_Hemalatha_overloadList["\xC2\xB8\xC2\xBA"]        = true;
$TL_Hemalatha_overloadList["\xC3\x8A\x56"]        = true;


function TL_Hemalatha_initialize()
{
    global $fontinfo;

    $fontinfo["tl-tthemalatha"]["language"] = "Telugu";
    $fontinfo["tl-tthemalatha"]["class"] = "TL_Hemalatha";
}
?>
