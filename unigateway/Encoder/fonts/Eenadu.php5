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

class Eenadu
{

  var $maxLookupLen=4;
  var $fontFace="Eenadu";
  var $displayName="Eenadu";
  var $script=0;

  function Eenadu()
  { 
  }


function lookup($str) 
{
    global $Eenadu_toPadma;
    return $Eenadu_toPadma[$str];
}

function isPrefixSymbol($str)
{
    global $Eenadu_prefixList;
    return array_key_exists($str, $Eenadu_prefixList);
//    return $Eenadu_prefixList[$str] != null;
}

 function isOverloaded($str)
{
    global $Eenadu_overloadList;
    return array_key_exists($str, $Eenadu_overloadList);
//    return $Eenadu_overloadList[$str] != null;
}

function handleTwoPartVowelSigns ($sign1, $sign2)
{
    if ($sign2 == Padma::Padma_vowelsn_E && $sign1 == Padma::Padma_vowelsn_AILEN ||
        $sign1 == Padma::Padma_vowelsn_E && $sign2 == Padma::Padma_vowelsn_AILEN)
        return Padma::Padma_vowelsn_AI;
    if ($sign2 == Padma::Padma_vowelsn_E && $sign1 == Padma::Padma_vowelsn_U)
        return Padma::Padma_vowelsn_O;
    if ($sign2 == Padma::Padma_vowelsn_E && $sign1 == Padma::Padma_vowelsn_AA)
        return Padma::Padma_vowelsn_OO;
    return $sign1 . $sign2;    
}

//\u00C7 is used mostly for AA gunintam - unfortunately it is also used for writing HA, so it needs to be handled specially


function preprocessMessage($input)
{
    $output = "";
    $ctxt = 0;

   $input_len=utf8_strlen($input);
   for($i = 0; $i < $input_len; ++$i) 
    {
      $cur=utf8_substr($input,$i,1);
        if (Eenadu::isRedundant($cur))
            continue;
	
        if ($ctxt == 1) 
	{
            if ($cur == Eenadu::Eenadu_vowelsn_AA_3) 
	    {
                $ctxt = 0;
                continue;
            }
	   $val = Eenadu::lookup($cur);
            if ($val != null) 
	    {   
	        $val_len=utf8_strlen($val);
		for($count=0;$count<$val_len;$count++)
		 {
	           $val_exploded[$count]=utf8_substr($val,$count,1);
	          }
             $type = Padma::getType($val_exploded[0]);
                if ($type != Padma::Padma_type_vattu && 
		    $type != Padma::Padma_type_gunintam && 
		    $type != Padma::Padma_type_hallu_mod)
                    $ctxt = 0;
            }
            else $ctxt = 0;
        }

        else if ($cur == Eenadu::Eenadu_consnt_HA)
        
	{
            $ctxt = 1;
	}
        $output .= $cur;
    }
    return $output;
  }

function isRedundant($str)
  {
    global $Eenadu_redundantList;
    return array_key_exists($str, $Eenadu_redundantList);
//    return $Eenadu_redundantList[$str] != null;
  }
	      

 //Specials
const Eenadu_candrabindu    = "\xC3\x92";
const Eenadu_visarga        = "\xC3\x93";
const Eenadu_virama_1       = "\x72";
const Eenadu_virama_2       = "\xC3\xBA";
const Eenadu_virama_3       = "\xC3\xBB";
const Eenadu_virama_4       = "\xC3\xBC";
const Eenadu_virama_5       = "\xC3\xBD";
const Eenadu_virama_6       = "\xC3\xBE";
const Eenadu_anusvara       = "\xC2\xA2";

//Vowels
const Eenadu_vowel_A_1      = "\xE2\x82\xAC";
const Eenadu_vowel_A_2      = "\xC3\x86";
const Eenadu_vowel_AA       = "\xE2\x80\x9A";
const Eenadu_vowel_I        = "\xC6\x92";
const Eenadu_vowel_II       = "\xC2\xA8";
const Eenadu_vowel_U        = "\xE2\x80\xA6";
const Eenadu_vowel_UU       = "\xC2\xAD";
const Eenadu_vowel_R        = "\xC2\xA6\xC3\x95\xC3\x95";
const Eenadu_vowel_RR       = "\xC2\xA6\xC3\x95\xC3\x96";
const Eenadu_vowel_E        = "\xE2\x80\xA1";
const Eenadu_vowel_EE       = "\x5C";
const Eenadu_vowel_AI       = "\xE2\x80\xB0";
const Eenadu_vowel_O        = "\xC5\xA0";
const Eenadu_vowel_OO       = "\xE2\x80\xB9";
const Eenadu_vowel_AU       = "\xC2\xBB";

//Consonants
const Eenadu_consnt_KA_1    = "\xC2\x8F";
const Eenadu_consnt_KA_2    = "\xC3\x82";
const Eenadu_consnt_KHA_1   = "\xE2\x80\x98";
const Eenadu_consnt_KHA_2   = "\xC3\x88";
const Eenadu_consnt_GA      = "\xE2\x80\x99";
const Eenadu_consnt_GHA     = "\x58\xC2\xB6\xC3\x95";
const Eenadu_consnt_NGA     = "\xE2\x80\xBA";

const Eenadu_consnt_CA      = "\xC3\x8D";
const Eenadu_consnt_CHA     = "\xC3\x8D\xC2\xB5";
const Eenadu_consnt_JA_1    = "\xE2\x80\xA2";
const Eenadu_consnt_JA_2    = "\xC3\xA8";
const Eenadu_consnt_JHA     = "\xC2\xAA\xE2\x80\x94";
const Eenadu_consnt_NYA     = "\x76";

const Eenadu_consnt_TTA_1   = "\x7B";
const Eenadu_consnt_TTA_2   = "\xCB\x9C";
const Eenadu_consnt_TTA_3   = "\xC5\xA1";
const Eenadu_consnt_TTHA    = "\xC2\xAA\xC2\xB8";
const Eenadu_consnt_DDA     = "\xC5\x93";
const Eenadu_consnt_DDHA    = "\xC5\x93\xC2\xB5";
const Eenadu_consnt_NNA     = "\xC2\xBA";

const Eenadu_consnt_TA      = "\xC3\x85";
const Eenadu_consnt_THA_1   = "\xC5\xB8\xC2\xB1";
const Eenadu_consnt_THA_2   = "\xC5\xB8\xC2\xB8";
const Eenadu_consnt_DA      = "\xC5\xB8";
const Eenadu_consnt_DHA     = "\xC5\xB8\xC2\xB5";
const Eenadu_consnt_NA_1    = "\xC3\x8A";
const Eenadu_consnt_NA_2    = "\xC2\xAF";

const Eenadu_consnt_PA_1    = "\x58";
const Eenadu_consnt_PA_2    = "\xC2\xA4";
const Eenadu_consnt_PHA_1   = "\x58\xC2\xB6";
const Eenadu_consnt_PHA_2   = "\xC2\xA4\xC2\xB6";
const Eenadu_consnt_BA_1    = "\xC2\xA6";
const Eenadu_consnt_BA_2    = "\xC3\xBF";
const Eenadu_consnt_BHA     = "\xC2\xA6\xC2\xB5";
const Eenadu_consnt_MA      = "\xC2\xAB\xC3\x95";

const Eenadu_consnt_YA_1    = "\xC2\xA7";
const Eenadu_consnt_YA_2    = "\xC2\xA7\xC3\x95";
const Eenadu_consnt_RA      = "\xC2\xAA";
const Eenadu_consnt_LA_1    = "\xE2\x84\xA2";
const Eenadu_consnt_LA_2    = "\xC2\xA9";
const Eenadu_consnt_VA_1    = "\xE2\x80\x9E";
const Eenadu_consnt_VA_2    = "\xC2\xAB";
const Eenadu_consnt_SHA     = "\xC2\xAC";
const Eenadu_consnt_SSA_1   = "\xE2\x80\xA0";
const Eenadu_consnt_SSA_2   = "\xC2\xB3";
const Eenadu_consnt_SA_1    = "\xC2\xAE";
const Eenadu_consnt_SA_2    = "\xC2\xB2";
const Eenadu_consnt_HA      = "\xC2\xA3";
const Eenadu_consnt_LLA     = "\x40";
const Eenadu_consnt_RRA     = "\xC2\xB7";
const Eenadu_conjct_KSHA    = "\xC3\x82\x7E";

//Gunintamulu
const Eenadu_vowelsn_AA_1   = "\xC3\x83";
const Eenadu_vowelsn_AA_2   = "\xC3\x84";
const Eenadu_vowelsn_AA_3   = "\xC3\x87";
const Eenadu_vowelsn_AA_4   = "\xC3\x89";
const Eenadu_vowelsn_I_1    = "\xC3\x8B";
const Eenadu_vowelsn_I_2    = "\xC3\x8F";
const Eenadu_vowelsn_II_1   = "\xC3\x8C";
const Eenadu_vowelsn_II_2   = "\xC3\x8E";
const Eenadu_vowelsn_II_3   = "\xC3\x94";
const Eenadu_vowelsn_U_1    = "\xC3\x95";
const Eenadu_vowelsn_U_2    = "\xC3\x97";
const Eenadu_vowelsn_U_3    = "\xC3\x99";
const Eenadu_vowelsn_U_4    = "\xC3\x9B";
const Eenadu_vowelsn_U_5    = "\xC3\x9D";
const Eenadu_vowelsn_U_6    = "\xC3\x9F";
const Eenadu_vowelsn_U_7    = "\xC3\xA1";
const Eenadu_vowelsn_UU_1   = "\xC3\x96";
const Eenadu_vowelsn_UU_2   = "\xC3\x98";
const Eenadu_vowelsn_UU_3   = "\xC3\x9A";
const Eenadu_vowelsn_UU_4   = "\xC3\x9C";
const Eenadu_vowelsn_UU_5   = "\xC3\x9E";
const Eenadu_vowelsn_UU_6   = "\xC3\xA0";
const Eenadu_vowelsn_UU_7   = "\xC3\xA2";
const Eenadu_vowelsn_R      = "\x25";
const Eenadu_vowelsn_RR     = "\x25\xC3\x87";
const Eenadu_vowelsn_E_1    = "\xC3\xA3";
const Eenadu_vowelsn_E_2    = "\xC3\xA5";
const Eenadu_vowelsn_E_3    = "\xC3\xA7";
const Eenadu_vowelsn_E_4    = "\xC3\xA9";
const Eenadu_vowelsn_E_5    = "\xC3\xAB";
const Eenadu_vowelsn_EE_1   = "\xC3\xA4";
const Eenadu_vowelsn_EE_2   = "\xC3\xA6";
const Eenadu_vowelsn_EE_3   = "\xC3\xAA";
const Eenadu_vowelsn_EE_4   = "\xC3\xAC";
const Eenadu_vowelsn_O_1    = "\xC3\xAD";
const Eenadu_vowelsn_O_2    = "\xC3\xAF";
const Eenadu_vowelsn_O_3    = "\xC3\xB1";
const Eenadu_vowelsn_O_4    = "\xC3\xB3";
const Eenadu_vowelsn_OO_1   = "\xC3\xAE";
const Eenadu_vowelsn_OO_2   = "\xC3\xB0";
const Eenadu_vowelsn_OO_3   = "\xC3\xB2";
const Eenadu_vowelsn_OO_4   = "\xC3\xB4";
const Eenadu_vowelsn_OO_5   = "\xC3\xA3\xC3\x96";
const Eenadu_vowelsn_AU_1   = "\xC3\xB5";
const Eenadu_vowelsn_AU_2   = "\xC3\xB6";
const Eenadu_vowelsn_AU_3   = "\xC3\xB7";
const Eenadu_vowelsn_AU_4   = "\xC3\xB8";
const Eenadu_vowelsn_AU_5   = "\xC3\xB9";

const Eenadu_vowelsn_AILEN_1 = "\x69";
const Eenadu_vowelsn_AILEN_2 = "\x6A";

//Special Combinations
const Eenadu_combo_KHI      = "\x22";
const Eenadu_combo_KHII     = "\x26";
const Eenadu_combo_GI       = "\x54";
const Eenadu_combo_GII      = "\x55";
const Eenadu_combo_GHAA_1   = "\x58\xC2\xB6\xC3\xA2";
const Eenadu_combo_GHAA_2   = "\x58\xC2\xB6\xC3\x96";
const Eenadu_combo_GHI      = "\x58\xC2\xB6\xC3\x8F\xC3\x95";
const Eenadu_combo_GHII     = "\x58\xC2\xB6\xC3\x94\xC3\x95";
const Eenadu_combo_GHU      = "\x58\xC2\xB6\xC3\xA1";
const Eenadu_combo_GHUU     = "\x58\xC2\xB6\xC3\xA2";
const Eenadu_combo_GHPOLLU  = "\x58\xC2\xB6\xC3\xBD\xC3\x95";

const Eenadu_combo_CI       = "\x2A";
const Eenadu_combo_CII      = "\x3C";
const Eenadu_combo_CHI      = "\x2A\xC2\xB5";
const Eenadu_combo_CHII     = "\x3C\xC2\xB5";
const Eenadu_combo_JI       = "\x3E";
const Eenadu_combo_JII      = "\xC2\xB0";
const Eenadu_combo_JU       = "\x56";
const Eenadu_combo_JUU      = "\x57";
const Eenadu_combo_JHI      = "\x4A\xE2\x80\x94";
const Eenadu_combo_JHII     = "\x4B\xE2\x80\x94";
const Eenadu_combo_JHPOLLU  = "\xC2\xAA\xC3\xBD\xE2\x80\x94";

const Eenadu_combo_TTHI     = "\x4A\xC2\xB8";
const Eenadu_combo_TTHII    = "\x4B\xC2\xB8";

const Eenadu_combo_TI       = "\x41";
const Eenadu_combo_TII      = "\x42";
const Eenadu_combo_THI      = "\x43\xC2\xB1";
const Eenadu_combo_THII     = "\x44\xC2\xB1";
const Eenadu_combo_DI       = "\x43";
const Eenadu_combo_DII      = "\x44";
const Eenadu_combo_DHI      = "\x43\xC2\xB5";
const Eenadu_combo_DHII     = "\x44\xC2\xB5";
const Eenadu_combo_NI       = "\x45";
const Eenadu_combo_NII      = "\x46";

const Eenadu_combo_BI       = "\x47";
const Eenadu_combo_BII      = "\x48";
const Eenadu_combo_BHI      = "\x47\xC2\xB5";
const Eenadu_combo_BHII     = "\x48\xC2\xB5";
const Eenadu_combo_MAA      = "\xC2\xAB\xC3\x96";
const Eenadu_combo_MI       = "\x4E\xC3\x95";
const Eenadu_combo_MII      = "\x4F\xC3\x95";
const Eenadu_combo_MU       = "\xC2\xAB\xC3\xA1";
const Eenadu_combo_MUU      = "\xC2\xAB\xC3\xA2";
const Eenadu_combo_ME_1     = "\xE2\x80\x9E\xC3\xA3\xC3\x95";
const Eenadu_combo_ME_2     = "\xE2\x80\x9E\xC3\xA7\xC3\x95";
const Eenadu_combo_MEE      = "\xE2\x80\x9E\xC3\xA4\xC3\x95";
const Eenadu_combo_MAI      = "\xE2\x80\x9E\xC3\xA7\xC3\x95\x69";
const Eenadu_combo_MO       = "\xE2\x80\x9E\xC3\xA7\xC3\xA1";
const Eenadu_combo_MOO      = "\xE2\x80\x9E\xC3\xA7\xC3\x96";
const Eenadu_combo_MPOLLU   = "\xE2\x80\x9E\xC3\xBE\xC3\x95";

const Eenadu_combo_YAA      = "\xC2\xA7\xC3\x96";
const Eenadu_combo_YI       = "\xC2\xAA\xC3\xA1";
const Eenadu_combo_YII      = "\xC2\xAA\xC3\xA2";
const Eenadu_combo_YE       = "\xC2\xA7\xC3\xA7\xC3\x95";
const Eenadu_combo_YEE      = "\xC2\xA7\xC3\xA4\xC3\x95";
const Eenadu_combo_YAI      = "\xC2\xA7\xC3\xA7\x69\xC3\x95";
const Eenadu_combo_YO       = "\xC2\xA7\xC3\xA7\xC3\xA1";
const Eenadu_combo_YOO      = "\xC2\xA7\xC3\xA7\xC3\x96";
const Eenadu_combo_YPOLLU_1 = "\xC2\xA7\xC3\xBC\xC3\x95";
const Eenadu_combo_YPOLLU_2 = "\xC2\xA7\xC3\xBD\xC3\x95";
const Eenadu_combo_RI       = "\x4A";
const Eenadu_combo_RII      = "\x4B";
const Eenadu_combo_LI       = "\x4C";
const Eenadu_combo_LII      = "\x4D";
const Eenadu_combo_VI       = "\x4E";
const Eenadu_combo_VII      = "\x4F";
const Eenadu_combo_SHI      = "\x50";
const Eenadu_combo_SHII     = "\x51";
const Eenadu_combo_LLI      = "\x52";
const Eenadu_combo_LLII     = "\x53";

const Eenadu_combo_SHRII    = "\xC2\xA1";

//Vattulu
const Eenadu_vattu_KA       = "\xCB\x86";
const Eenadu_vattu_KHA      = "\x5E";
const Eenadu_vattu_GA       = "\x5F";
const Eenadu_vattu_GHA      = "\x60";

const Eenadu_vattu_CA       = "\x61";
const Eenadu_vattu_CHA      = "\x61\xC2\xB4";
const Eenadu_vattu_JA       = "\x62";
const Eenadu_vattu_JHA      = "\x6D";
const Eenadu_vattu_NYA      = "\x63";

const Eenadu_vattu_TTA      = "\x64";
const Eenadu_vattu_TTHA     = "\x65";
const Eenadu_vattu_DDA      = "\x66";
const Eenadu_vattu_NNA      = "\x67";

const Eenadu_vattu_TA_1     = "\x68";
const Eenadu_vattu_TA_2     = "\x6B";
const Eenadu_vattu_THA      = "\x6E";
const Eenadu_vattu_DA       = "\x6C";
const Eenadu_vattu_DHA      = "\x6C\xC2\xB4";
const Eenadu_vattu_NA       = "\x6F";

const Eenadu_vattu_PA       = "\x70";
const Eenadu_vattu_PHA      = "\x70\xC2\xB4";
const Eenadu_vattu_BA       = "\x73";
const Eenadu_vattu_BHA      = "\x73\xC2\xB4";
const Eenadu_vattu_MA       = "\x74";

const Eenadu_vattu_YA       = "\x75";
const Eenadu_vattu_RA_1     = "\x77";
const Eenadu_vattu_RA_2     = "\xE2\x80\x9C";
const Eenadu_vattu_LA       = "\x78";
const Eenadu_vattu_VA       = "\x79";
const Eenadu_vattu_SHA      = "\x7A";
const Eenadu_vattu_SSA_1    = "\x7E";
const Eenadu_vattu_SSA_2    = "\xC2\xA5";
const Eenadu_vattu_SA       = "\x71";
const Eenadu_vattu_HA       = "\x7C";
const Eenadu_vattu_LLA      = "\x7D";
const Eenadu_vattu_RRA      = "\xC3\x80";

//Conjuncts
const Eenadu_vattu_TRA      = "\x59";
const Eenadu_vattu_TTRA     = "\x5A";

//Matches ASCII
const Eenadu_EXCLAM         = "\x21";
const Eenadu_QTSINGLE       = "\x27";
const Eenadu_PARENLEFT      = "\x28";
const Eenadu_PARENRIGT      = "\x29";
const Eenadu_PLUS           = "\x2B";
const Eenadu_COMMA          = "\x2C";
const Eenadu_HYPHEN         = "\x2D";   //I don't know what the significance is, shows up as '-' on Linux, not displayed on Windows in Firefox
const Eenadu_PERIOD         = "\x2E";
const Eenadu_SLASH          = "\x2F";
const Eenadu_COLON          = "\x3A";
const Eenadu_SEMICOLON      = "\x3B";
const Eenadu_EQUALS         = "\x3D";
const Eenadu_QUESTION       = "\x3F";

const Eenadu_digit_ZERO     = "\x30";
const Eenadu_digit_ONE      = "\x31";
const Eenadu_digit_TWO      = "\x32";
const Eenadu_digit_THREE    = "\x33";
const Eenadu_digit_FOUR     = "\x34";
const Eenadu_digit_FIVE     = "\x35";
const Eenadu_digit_SIX      = "\x36";
const Eenadu_digit_SEVEN    = "\x37";
const Eenadu_digit_EIGHT    = "\x38";
const Eenadu_digit_NINE     = "\x39";

//Does not match ASCII
const Eenadu_DIVIDE         = "\x23";
const Eenadu_MULTIPLY       = "\x24";
const Eenadu_PIPE           = "\x49";
const Eenadu_ASTERISK       = "\x5B";
const Eenadu_PERCENT        = "\x5D";

//Kommu
const Eenadu_misc_TICK_1    = "\xC5\x92";
const Eenadu_misc_TICK_2    = "\xC2\xB9";
const Eenadu_misc_TICK_3    = "\xC2\xBC";
const Eenadu_misc_TICK_4    = "\xC2\xBD";
const Eenadu_misc_TICK_5    = "\xC2\xBE";
const Eenadu_misc_TICK_6    = "\xC2\xBF";
const Eenadu_misc_TICK_7    = "\xC3\x81";

const Eenadu_misc_vattu_1   = "\xC2\xB4";               //This seems to be for vattulu
const Eenadu_misc_vattu_2   = "\xC2\xB5";               //This seems to be for consonants
const Eenadu_misc_vattu_3   = "\xC2\xB6";               //Gha, pha etc

const Eenadu_extra_HYPHEN   = "\xC3\x90";
const Eenadu_extra_QTSINGLE = "\xC3\x91";

}
 
 $Eenadu_toPadma = array();
 
 $Eenadu_toPadma[Eenadu::Eenadu_candrabindu] = Padma::Padma_candrabindu;
 $Eenadu_toPadma[Eenadu::Eenadu_visarga]     = Padma::Padma_visarga;
 $Eenadu_toPadma[Eenadu::Eenadu_virama_1]    = Padma::Padma_syllbreak;
 $Eenadu_toPadma[Eenadu::Eenadu_virama_2]    = Padma::Padma_syllbreak;
 $Eenadu_toPadma[Eenadu::Eenadu_virama_3]    = Padma::Padma_syllbreak;
 $Eenadu_toPadma[Eenadu::Eenadu_virama_4]    = Padma::Padma_syllbreak;
 $Eenadu_toPadma[Eenadu::Eenadu_virama_5]    = Padma::Padma_syllbreak;
 $Eenadu_toPadma[Eenadu::Eenadu_virama_6]    = Padma::Padma_syllbreak;
 $Eenadu_toPadma[Eenadu::Eenadu_anusvara]    = Padma::Padma_anusvara;

$Eenadu_toPadma[Eenadu::Eenadu_vowel_A_1] = Padma::Padma_vowel_A;
$Eenadu_toPadma[Eenadu::Eenadu_vowel_A_2] = Padma::Padma_vowel_A;
$Eenadu_toPadma[Eenadu::Eenadu_vowel_AA] = Padma::Padma_vowel_AA;
$Eenadu_toPadma[Eenadu::Eenadu_vowel_I] = Padma::Padma_vowel_I;
$Eenadu_toPadma[Eenadu::Eenadu_vowel_II] = Padma::Padma_vowel_II;
$Eenadu_toPadma[Eenadu::Eenadu_vowel_U] = Padma::Padma_vowel_U;
$Eenadu_toPadma[Eenadu::Eenadu_vowel_UU] = Padma::Padma_vowel_UU;
$Eenadu_toPadma[Eenadu::Eenadu_vowel_R] = Padma::Padma_vowel_R;
$Eenadu_toPadma[Eenadu::Eenadu_vowel_RR] = Padma::Padma_vowel_RR;
$Eenadu_toPadma[Eenadu::Eenadu_vowel_E] = Padma::Padma_vowel_E;
$Eenadu_toPadma[Eenadu::Eenadu_vowel_EE] = Padma::Padma_vowel_EE;
$Eenadu_toPadma[Eenadu::Eenadu_vowel_AI] = Padma::Padma_vowel_AI;
$Eenadu_toPadma[Eenadu::Eenadu_vowel_O] = Padma::Padma_vowel_O;
$Eenadu_toPadma[Eenadu::Eenadu_vowel_OO] = Padma::Padma_vowel_OO;
$Eenadu_toPadma[Eenadu::Eenadu_vowel_AU] = Padma::Padma_vowel_AU;

$Eenadu_toPadma[Eenadu::Eenadu_consnt_KA_1] = Padma::Padma_consnt_KA;
$Eenadu_toPadma[Eenadu::Eenadu_consnt_KA_2] = Padma::Padma_consnt_KA;
$Eenadu_toPadma[Eenadu::Eenadu_consnt_KHA_1] = Padma::Padma_consnt_KHA;
$Eenadu_toPadma[Eenadu::Eenadu_consnt_KHA_2] = Padma::Padma_consnt_KHA;
$Eenadu_toPadma[Eenadu::Eenadu_consnt_GA] = Padma::Padma_consnt_GA;
$Eenadu_toPadma[Eenadu::Eenadu_consnt_GHA] = Padma::Padma_consnt_GHA;
$Eenadu_toPadma[Eenadu::Eenadu_consnt_NGA] = Padma::Padma_consnt_NGA;

$Eenadu_toPadma[Eenadu::Eenadu_consnt_CA] = Padma::Padma_consnt_CA;
$Eenadu_toPadma[Eenadu::Eenadu_consnt_CHA] = Padma::Padma_consnt_CHA;
$Eenadu_toPadma[Eenadu::Eenadu_consnt_JA_1] = Padma::Padma_consnt_JA;
$Eenadu_toPadma[Eenadu::Eenadu_consnt_JA_2] = Padma::Padma_consnt_JA;
$Eenadu_toPadma[Eenadu::Eenadu_consnt_JHA] = Padma::Padma_consnt_JHA;
$Eenadu_toPadma[Eenadu::Eenadu_consnt_NYA] = Padma::Padma_consnt_NYA;

$Eenadu_toPadma[Eenadu::Eenadu_consnt_TTA_1] = Padma::Padma_consnt_TTA;
$Eenadu_toPadma[Eenadu::Eenadu_consnt_TTA_2] = Padma::Padma_consnt_TTA;
$Eenadu_toPadma[Eenadu::Eenadu_consnt_TTA_3] = Padma::Padma_consnt_TTA;
$Eenadu_toPadma[Eenadu::Eenadu_consnt_TTHA] = Padma::Padma_consnt_TTHA;
$Eenadu_toPadma[Eenadu::Eenadu_consnt_DDA] = Padma::Padma_consnt_DDA;
$Eenadu_toPadma[Eenadu::Eenadu_consnt_DDHA] = Padma::Padma_consnt_DDHA;
$Eenadu_toPadma[Eenadu::Eenadu_consnt_NNA] = Padma::Padma_consnt_NNA;

$Eenadu_toPadma[Eenadu::Eenadu_consnt_TA] = Padma::Padma_consnt_TA;
$Eenadu_toPadma[Eenadu::Eenadu_consnt_THA_1] = Padma::Padma_consnt_THA;
$Eenadu_toPadma[Eenadu::Eenadu_consnt_THA_2] = Padma::Padma_consnt_THA;
$Eenadu_toPadma[Eenadu::Eenadu_consnt_DA] = Padma::Padma_consnt_DA;
$Eenadu_toPadma[Eenadu::Eenadu_consnt_DHA] = Padma::Padma_consnt_DHA;
$Eenadu_toPadma[Eenadu::Eenadu_consnt_NA_1] = Padma::Padma_consnt_NA;
$Eenadu_toPadma[Eenadu::Eenadu_consnt_NA_2] = Padma::Padma_consnt_NA;

$Eenadu_toPadma[Eenadu::Eenadu_consnt_PA_1] = Padma::Padma_consnt_PA;
$Eenadu_toPadma[Eenadu::Eenadu_consnt_PA_2] = Padma::Padma_consnt_PA;
$Eenadu_toPadma[Eenadu::Eenadu_consnt_PHA_1]  = Padma::Padma_consnt_PHA;
$Eenadu_toPadma[Eenadu::Eenadu_consnt_PHA_2]  = Padma::Padma_consnt_PHA;
$Eenadu_toPadma[Eenadu::Eenadu_consnt_BA_1] = Padma::Padma_consnt_BA;
$Eenadu_toPadma[Eenadu::Eenadu_consnt_BA_2] = Padma::Padma_consnt_BA;
$Eenadu_toPadma[Eenadu::Eenadu_consnt_BHA]  = Padma::Padma_consnt_BHA;
$Eenadu_toPadma[Eenadu::Eenadu_consnt_MA] = Padma::Padma_consnt_MA;
	
$Eenadu_toPadma[Eenadu::Eenadu_consnt_YA_1] = Padma::Padma_consnt_YA;
$Eenadu_toPadma[Eenadu::Eenadu_consnt_YA_2] = Padma::Padma_consnt_YA;
$Eenadu_toPadma[Eenadu::Eenadu_consnt_RA] = Padma::Padma_consnt_RA;
$Eenadu_toPadma[Eenadu::Eenadu_consnt_LA_1] = Padma::Padma_consnt_LA;
$Eenadu_toPadma[Eenadu::Eenadu_consnt_LA_2] = Padma::Padma_consnt_LA;
$Eenadu_toPadma[Eenadu::Eenadu_consnt_VA_1] = Padma::Padma_consnt_VA;
$Eenadu_toPadma[Eenadu::Eenadu_consnt_VA_2] = Padma::Padma_consnt_VA;
$Eenadu_toPadma[Eenadu::Eenadu_consnt_SHA] = Padma::Padma_consnt_SHA;
$Eenadu_toPadma[Eenadu::Eenadu_consnt_SSA_1] = Padma::Padma_consnt_SSA;
$Eenadu_toPadma[Eenadu::Eenadu_consnt_SSA_2] = Padma::Padma_consnt_SSA;
$Eenadu_toPadma[Eenadu::Eenadu_consnt_SA_1] = Padma::Padma_consnt_SA;
$Eenadu_toPadma[Eenadu::Eenadu_consnt_SA_2] = Padma::Padma_consnt_SA;

$Eenadu_toPadma[Eenadu::Eenadu_consnt_HA] = Padma::Padma_consnt_HA;
$Eenadu_toPadma[Eenadu::Eenadu_consnt_LLA] = Padma::Padma_consnt_LLA;
$Eenadu_toPadma[Eenadu::Eenadu_consnt_RRA] = Padma::Padma_consnt_RRA;
$Eenadu_toPadma[Eenadu::Eenadu_conjct_KSHA] = Padma::Padma_consnt_KA.Padma::Padma_vattu_SSA;
												    
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_AA_1]  = Padma::Padma_vowelsn_AA;
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_AA_2]  = Padma::Padma_vowelsn_AA;
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_AA_3]  = Padma::Padma_vowelsn_AA;
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_AA_4]  = Padma::Padma_vowelsn_AA;
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_I_1]   = Padma::Padma_vowelsn_I;
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_I_2]   = Padma::Padma_vowelsn_I;
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_II_1]  = Padma::Padma_vowelsn_II;
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_II_2]  = Padma::Padma_vowelsn_II;
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_II_3]  = Padma::Padma_vowelsn_II;
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_U_1]   = Padma::Padma_vowelsn_U;
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_U_2]   = Padma::Padma_vowelsn_U;
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_U_3]   = Padma::Padma_vowelsn_U;
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_U_4]   = Padma::Padma_vowelsn_U;
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_U_5]   = Padma::Padma_vowelsn_U;
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_U_6]   = Padma::Padma_vowelsn_U;
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_U_7]   = Padma::Padma_vowelsn_U;
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_UU_1]  = Padma::Padma_vowelsn_UU;
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_UU_2]  = Padma::Padma_vowelsn_UU;
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_UU_3]  = Padma::Padma_vowelsn_UU;
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_UU_4]  = Padma::Padma_vowelsn_UU;
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_UU_5]  = Padma::Padma_vowelsn_UU;
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_UU_6]  = Padma::Padma_vowelsn_UU;
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_UU_7]  = Padma::Padma_vowelsn_UU;
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_R]     = Padma::Padma_vowelsn_R;
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_RR]    = Padma::Padma_vowelsn_RR;
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_E_1]   = Padma::Padma_vowelsn_E;
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_E_2]   = Padma::Padma_vowelsn_E;
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_E_3]   = Padma::Padma_vowelsn_E;
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_E_4]   = Padma::Padma_vowelsn_E;
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_E_5]   = Padma::Padma_vowelsn_E;
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_EE_1]  = Padma::Padma_vowelsn_EE;
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_EE_2]  = Padma::Padma_vowelsn_EE;
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_EE_3]  = Padma::Padma_vowelsn_EE;
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_EE_4]  = Padma::Padma_vowelsn_EE;
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_O_1]   = Padma::Padma_vowelsn_O;
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_O_2]   = Padma::Padma_vowelsn_O;
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_O_3]   = Padma::Padma_vowelsn_O;
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_O_4]   = Padma::Padma_vowelsn_O;
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_OO_1]  = Padma::Padma_vowelsn_OO;
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_OO_2]  = Padma::Padma_vowelsn_OO;
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_OO_3]  = Padma::Padma_vowelsn_OO;
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_OO_4]  = Padma::Padma_vowelsn_OO;

$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_OO_5]  = Padma::Padma_vowelsn_OO;
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_AU_1]  = Padma::Padma_vowelsn_AU;
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_AU_2]  = Padma::Padma_vowelsn_AU;
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_AU_3]  = Padma::Padma_vowelsn_AU;
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_AU_4]  = Padma::Padma_vowelsn_AU;
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_AU_5]  = Padma::Padma_vowelsn_AU;
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_AILEN_1] = Padma::Padma_vowelsn_AILEN;
$Eenadu_toPadma[Eenadu::Eenadu_vowelsn_AILEN_2] = Padma::Padma_vowelsn_AILEN;

//Special Combinations
$Eenadu_toPadma[Eenadu::Eenadu_combo_KHI]     = Padma::Padma_consnt_KHA .  Padma::Padma_vowelsn_I;
$Eenadu_toPadma[Eenadu::Eenadu_combo_KHII]    = Padma::Padma_consnt_KHA .  Padma::Padma_vowelsn_II;
$Eenadu_toPadma[Eenadu::Eenadu_combo_GI]      = Padma::Padma_consnt_GA  .  Padma::Padma_vowelsn_I;
$Eenadu_toPadma[Eenadu::Eenadu_combo_GII]     = Padma::Padma_consnt_GA  .  Padma::Padma_vowelsn_II;
$Eenadu_toPadma[Eenadu::Eenadu_combo_GHAA_1]  = Padma::Padma_consnt_GHA .  Padma::Padma_vowelsn_AA;
$Eenadu_toPadma[Eenadu::Eenadu_combo_GHAA_2]  = Padma::Padma_consnt_GHA .  Padma::Padma_vowelsn_AA;
$Eenadu_toPadma[Eenadu::Eenadu_combo_GHI]     = Padma::Padma_consnt_GHA .  Padma::Padma_vowelsn_I;
$Eenadu_toPadma[Eenadu::Eenadu_combo_GHII]    = Padma::Padma_consnt_GHA .  Padma::Padma_vowelsn_II;
$Eenadu_toPadma[Eenadu::Eenadu_combo_GHU]     = Padma::Padma_consnt_GHA .  Padma::Padma_vowelsn_U;
$Eenadu_toPadma[Eenadu::Eenadu_combo_GHUU]    = Padma::Padma_consnt_GHA .  Padma::Padma_vowelsn_UU;
$Eenadu_toPadma[Eenadu::Eenadu_combo_GHPOLLU] = Padma::Padma_consnt_GHA .  Padma::Padma_syllbreak;

$Eenadu_toPadma[Eenadu::Eenadu_combo_CI]      = Padma::Padma_consnt_CA  .   Padma::Padma_vowelsn_I;
$Eenadu_toPadma[Eenadu::Eenadu_combo_CII]     = Padma::Padma_consnt_CA  .   Padma::Padma_vowelsn_II;
$Eenadu_toPadma[Eenadu::Eenadu_combo_CHI]     = Padma::Padma_consnt_CHA  .   Padma::Padma_vowelsn_I;
$Eenadu_toPadma[Eenadu::Eenadu_combo_CHII]    = Padma::Padma_consnt_CHA  .   Padma::Padma_vowelsn_II;
$Eenadu_toPadma[Eenadu::Eenadu_combo_JI]      = Padma::Padma_consnt_JA  .   Padma::Padma_vowelsn_I;
$Eenadu_toPadma[Eenadu::Eenadu_combo_JII]     = Padma::Padma_consnt_JA  .   Padma::Padma_vowelsn_II;
$Eenadu_toPadma[Eenadu::Eenadu_combo_JU]      = Padma::Padma_consnt_JA  .   Padma::Padma_vowelsn_U;
$Eenadu_toPadma[Eenadu::Eenadu_combo_JUU]     = Padma::Padma_consnt_JA  .   Padma::Padma_vowelsn_UU;
$Eenadu_toPadma[Eenadu::Eenadu_combo_JHI]     = Padma::Padma_consnt_JHA  .   Padma::Padma_vowelsn_I;
$Eenadu_toPadma[Eenadu::Eenadu_combo_JHII]    = Padma::Padma_consnt_JHA  .   Padma::Padma_vowelsn_II;
$Eenadu_toPadma[Eenadu::Eenadu_combo_JHPOLLU] = Padma::Padma_consnt_JHA  .   Padma::Padma_syllbreak;

$Eenadu_toPadma[Eenadu::Eenadu_combo_TTHI]    = Padma::Padma_consnt_TTHA  .   Padma::Padma_vowelsn_I;
$Eenadu_toPadma[Eenadu::Eenadu_combo_TTHII]   = Padma::Padma_consnt_TTHA  .   Padma::Padma_vowelsn_II;

$Eenadu_toPadma[Eenadu::Eenadu_combo_TI]      = Padma::Padma_consnt_TA  .   Padma::Padma_vowelsn_I;
$Eenadu_toPadma[Eenadu::Eenadu_combo_TII]     = Padma::Padma_consnt_TA  .   Padma::Padma_vowelsn_II;
$Eenadu_toPadma[Eenadu::Eenadu_combo_THI]     = Padma::Padma_consnt_THA  .   Padma::Padma_vowelsn_I;
$Eenadu_toPadma[Eenadu::Eenadu_combo_THII]    = Padma::Padma_consnt_THA  .   Padma::Padma_vowelsn_II;
$Eenadu_toPadma[Eenadu::Eenadu_combo_DI]      = Padma::Padma_consnt_DA . Padma::Padma_vowelsn_I;

$Eenadu_toPadma[Eenadu::Eenadu_combo_DII]     = Padma::Padma_consnt_DA  .   Padma::Padma_vowelsn_II;
$Eenadu_toPadma[Eenadu::Eenadu_combo_DHI]     = Padma::Padma_consnt_DHA  .   Padma::Padma_vowelsn_I;
$Eenadu_toPadma[Eenadu::Eenadu_combo_DHII]    = Padma::Padma_consnt_DHA  .   Padma::Padma_vowelsn_II;
$Eenadu_toPadma[Eenadu::Eenadu_combo_NI]      = Padma::Padma_consnt_NA  .   Padma::Padma_vowelsn_I;
$Eenadu_toPadma[Eenadu::Eenadu_combo_NII]     = Padma::Padma_consnt_NA  .   Padma::Padma_vowelsn_II;

$Eenadu_toPadma[Eenadu::Eenadu_combo_BI]      = Padma::Padma_consnt_BA  .   Padma::Padma_vowelsn_I;
$Eenadu_toPadma[Eenadu::Eenadu_combo_BII]     = Padma::Padma_consnt_BA  .   Padma::Padma_vowelsn_II;
$Eenadu_toPadma[Eenadu::Eenadu_combo_BHI]     = Padma::Padma_consnt_BHA  .   Padma::Padma_vowelsn_I;
$Eenadu_toPadma[Eenadu::Eenadu_combo_BHII]    = Padma::Padma_consnt_BHA  .   Padma::Padma_vowelsn_II;
$Eenadu_toPadma[Eenadu::Eenadu_combo_MAA]     = Padma::Padma_consnt_MA  .   Padma::Padma_vowelsn_AA;
$Eenadu_toPadma[Eenadu::Eenadu_combo_MI]      = Padma::Padma_consnt_MA  .   Padma::Padma_vowelsn_I;
$Eenadu_toPadma[Eenadu::Eenadu_combo_MII]     = Padma::Padma_consnt_MA  .   Padma::Padma_vowelsn_II;
$Eenadu_toPadma[Eenadu::Eenadu_combo_MU]      = Padma::Padma_consnt_MA  .   Padma::Padma_vowelsn_U;
$Eenadu_toPadma[Eenadu::Eenadu_combo_MUU]     = Padma::Padma_consnt_MA  .   Padma::Padma_vowelsn_UU;
$Eenadu_toPadma[Eenadu::Eenadu_combo_ME_1]    = Padma::Padma_consnt_MA  .   Padma::Padma_vowelsn_E;
$Eenadu_toPadma[Eenadu::Eenadu_combo_ME_2]    = Padma::Padma_consnt_MA  .   Padma::Padma_vowelsn_E;
$Eenadu_toPadma[Eenadu::Eenadu_combo_MEE]     = Padma::Padma_consnt_MA  .   Padma::Padma_vowelsn_EE;
$Eenadu_toPadma[Eenadu::Eenadu_combo_MAI]     = Padma::Padma_consnt_MA  .   Padma::Padma_vowelsn_AI;
$Eenadu_toPadma[Eenadu::Eenadu_combo_MO]      = Padma::Padma_consnt_MA  .   Padma::Padma_vowelsn_O;
$Eenadu_toPadma[Eenadu::Eenadu_combo_MOO]     = Padma::Padma_consnt_MA  .   Padma::Padma_vowelsn_OO;
$Eenadu_toPadma[Eenadu::Eenadu_combo_MPOLLU]  = Padma::Padma_consnt_MA  .   Padma::Padma_syllbreak;

$Eenadu_toPadma[Eenadu::Eenadu_combo_YAA]     = Padma::Padma_consnt_YA  .   Padma::Padma_vowelsn_AA;
$Eenadu_toPadma[Eenadu::Eenadu_combo_YI]      = Padma::Padma_consnt_YA  .   Padma::Padma_vowelsn_I;
$Eenadu_toPadma[Eenadu::Eenadu_combo_YII]     = Padma::Padma_consnt_YA  .   Padma::Padma_vowelsn_II;
$Eenadu_toPadma[Eenadu::Eenadu_combo_YE]      = Padma::Padma_consnt_YA  .   Padma::Padma_vowelsn_E;
$Eenadu_toPadma[Eenadu::Eenadu_combo_YEE]     = Padma::Padma_consnt_YA  .   Padma::Padma_vowelsn_EE;
$Eenadu_toPadma[Eenadu::Eenadu_combo_YAI]     = Padma::Padma_consnt_YA  .   Padma::Padma_vowelsn_AI;
$Eenadu_toPadma[Eenadu::Eenadu_combo_YO]      = Padma::Padma_consnt_YA  .   Padma::Padma_vowelsn_O;
$Eenadu_toPadma[Eenadu::Eenadu_combo_YOO]     = Padma::Padma_consnt_YA  .   Padma::Padma_vowelsn_OO;
$Eenadu_toPadma[Eenadu::Eenadu_combo_YPOLLU_1]= Padma::Padma_consnt_YA  .   Padma::Padma_syllbreak;
$Eenadu_toPadma[Eenadu::Eenadu_combo_YPOLLU_2]= Padma::Padma_consnt_YA  .   Padma::Padma_syllbreak;
$Eenadu_toPadma[Eenadu::Eenadu_combo_RI]      = Padma::Padma_consnt_RA  .   Padma::Padma_vowelsn_I;
$Eenadu_toPadma[Eenadu::Eenadu_combo_RII]     = Padma::Padma_consnt_RA  .   Padma::Padma_vowelsn_II;
$Eenadu_toPadma[Eenadu::Eenadu_combo_LI]      = Padma::Padma_consnt_LA  .   Padma::Padma_vowelsn_I;
$Eenadu_toPadma[Eenadu::Eenadu_combo_LII]     = Padma::Padma_consnt_LA  .   Padma::Padma_vowelsn_II;
$Eenadu_toPadma[Eenadu::Eenadu_combo_VI]      = Padma::Padma_consnt_VA  .   Padma::Padma_vowelsn_I;
$Eenadu_toPadma[Eenadu::Eenadu_combo_VII]     = Padma::Padma_consnt_VA  .   Padma::Padma_vowelsn_II;
$Eenadu_toPadma[Eenadu::Eenadu_combo_SHI]     = Padma::Padma_consnt_SHA  .   Padma::Padma_vowelsn_I;
$Eenadu_toPadma[Eenadu::Eenadu_combo_SHII]    = Padma::Padma_consnt_SHA  .   Padma::Padma_vowelsn_II;
$Eenadu_toPadma[Eenadu::Eenadu_combo_LLI]     = Padma::Padma_consnt_LLA  .   Padma::Padma_vowelsn_I;
$Eenadu_toPadma[Eenadu::Eenadu_combo_LLII]    = Padma::Padma_consnt_LLA  .   Padma::Padma_vowelsn_II;
$Eenadu_toPadma[Eenadu::Eenadu_combo_SHRII]   = Padma::Padma_consnt_SHA  .   Padma::Padma_vattu_RA . Padma::Padma_vowelsn_II;

//Vattulu
$Eenadu_toPadma[Eenadu::Eenadu_vattu_KA]      = Padma::Padma_vattu_KA;
$Eenadu_toPadma[Eenadu::Eenadu_vattu_KHA]     = Padma::Padma_vattu_KHA;
$Eenadu_toPadma[Eenadu::Eenadu_vattu_GA]      = Padma::Padma_vattu_GA;
$Eenadu_toPadma[Eenadu::Eenadu_vattu_GHA]     = Padma::Padma_vattu_GHA;
$Eenadu_toPadma[Eenadu::Eenadu_vattu_CA]      = Padma::Padma_vattu_CA;
$Eenadu_toPadma[Eenadu::Eenadu_vattu_CHA]     = Padma::Padma_vattu_CHA;
$Eenadu_toPadma[Eenadu::Eenadu_vattu_JA]      = Padma::Padma_vattu_JA;
$Eenadu_toPadma[Eenadu::Eenadu_vattu_JHA]     = Padma::Padma_vattu_JHA;
$Eenadu_toPadma[Eenadu::Eenadu_vattu_NYA]     = Padma::Padma_vattu_NYA;
$Eenadu_toPadma[Eenadu::Eenadu_vattu_TTA]     = Padma::Padma_vattu_TTA;
$Eenadu_toPadma[Eenadu::Eenadu_vattu_TTHA]    = Padma::Padma_vattu_TTHA;
$Eenadu_toPadma[Eenadu::Eenadu_vattu_DDA]     = Padma::Padma_vattu_DDA;
$Eenadu_toPadma[Eenadu::Eenadu_vattu_NNA]     = Padma::Padma_vattu_NNA;
$Eenadu_toPadma[Eenadu::Eenadu_vattu_TA_1]    = Padma::Padma_vattu_TA;
$Eenadu_toPadma[Eenadu::Eenadu_vattu_TA_2]    = Padma::Padma_vattu_TA;
$Eenadu_toPadma[Eenadu::Eenadu_vattu_THA]     = Padma::Padma_vattu_THA;
$Eenadu_toPadma[Eenadu::Eenadu_vattu_DA]      = Padma::Padma_vattu_DA;
$Eenadu_toPadma[Eenadu::Eenadu_vattu_DHA]     = Padma::Padma_vattu_DHA;
$Eenadu_toPadma[Eenadu::Eenadu_vattu_NA]      = Padma::Padma_vattu_NA;
$Eenadu_toPadma[Eenadu::Eenadu_vattu_PA]      = Padma::Padma_vattu_PA;
$Eenadu_toPadma[Eenadu::Eenadu_vattu_PHA]     = Padma::Padma_vattu_PHA;
$Eenadu_toPadma[Eenadu::Eenadu_vattu_BA]      = Padma::Padma_vattu_BA;
$Eenadu_toPadma[Eenadu::Eenadu_vattu_BHA]     = Padma::Padma_vattu_BHA;
$Eenadu_toPadma[Eenadu::Eenadu_vattu_MA]      = Padma::Padma_vattu_MA;
$Eenadu_toPadma[Eenadu::Eenadu_vattu_YA]      = Padma::Padma_vattu_YA;
$Eenadu_toPadma[Eenadu::Eenadu_vattu_RA_1]    = Padma::Padma_vattu_RA;
$Eenadu_toPadma[Eenadu::Eenadu_vattu_RA_2]    = Padma::Padma_vattu_RA;
$Eenadu_toPadma[Eenadu::Eenadu_vattu_LA]      = Padma::Padma_vattu_LA;
$Eenadu_toPadma[Eenadu::Eenadu_vattu_VA]      = Padma::Padma_vattu_VA;
$Eenadu_toPadma[Eenadu::Eenadu_vattu_SHA]     = Padma::Padma_vattu_SHA;
$Eenadu_toPadma[Eenadu::Eenadu_vattu_SSA_1]   = Padma::Padma_vattu_SSA;
$Eenadu_toPadma[Eenadu::Eenadu_vattu_SSA_2]   = Padma::Padma_vattu_SSA;
$Eenadu_toPadma[Eenadu::Eenadu_vattu_SA]      = Padma::Padma_vattu_SA;
$Eenadu_toPadma[Eenadu::Eenadu_vattu_HA]      = Padma::Padma_vattu_HA;
$Eenadu_toPadma[Eenadu::Eenadu_vattu_LLA]     = Padma::Padma_vattu_LLA;
$Eenadu_toPadma[Eenadu::Eenadu_vattu_RRA]     = Padma::Padma_vattu_RRA;

//Conjuncts
$Eenadu_toPadma[Eenadu::Eenadu_vattu_TRA]     = Padma::Padma_vattu_TA   .   Padma::Padma_vattu_RA;
$Eenadu_toPadma[Eenadu::Eenadu_vattu_TTRA]    = Padma::Padma_vattu_TTA  .   Padma::Padma_vattu_RA;

//Miscellaneous(where it doesn't match ASCII representation)
$Eenadu_toPadma[Eenadu::Eenadu_extra_HYPHEN]   = Eenadu::Eenadu_HYPHEN;
$Eenadu_toPadma[Eenadu::Eenadu_extra_QTSINGLE] = Eenadu::Eenadu_QTSINGLE;
$Eenadu_toPadma[Eenadu::Eenadu_DIVIDE]         = "/";        //Should lookup Unicode standard for this and multiply
$Eenadu_toPadma[Eenadu::Eenadu_MULTIPLY]       = "X";
$Eenadu_toPadma[Eenadu::Eenadu_PIPE]           = "|";
$Eenadu_toPadma[Eenadu::Eenadu_ASTERISK]       = "*";
$Eenadu_toPadma[Eenadu::Eenadu_PERCENT]        = "%";


$Eenadu_redundantList =array();
$Eenadu_redundantList[Eenadu::Eenadu_misc_TICK_1] = true;
$Eenadu_redundantList[Eenadu::Eenadu_misc_TICK_2] = true;
$Eenadu_redundantList[Eenadu::Eenadu_misc_TICK_3] = true;
$Eenadu_redundantList[Eenadu::Eenadu_misc_TICK_4] = true;
$Eenadu_redundantList[Eenadu::Eenadu_misc_TICK_5] = true;
$Eenadu_redundantList[Eenadu::Eenadu_misc_TICK_6] = true;
$Eenadu_redundantList[Eenadu::Eenadu_misc_TICK_7] = true;
$Eenadu_redundantList[Eenadu::Eenadu_HYPHEN]      = true;


$Eenadu_prefixList = array();
$Eenadu_prefixList[Eenadu::Eenadu_vattu_RA_1]   = true;
$Eenadu_prefixList[Eenadu::Eenadu_vattu_RA_2]   = true;
$Eenadu_prefixList[Eenadu::Eenadu_vowelsn_E_2]  = true;
$Eenadu_prefixList[Eenadu::Eenadu_vowelsn_E_4]  = true;
$Eenadu_prefixList[Eenadu::Eenadu_vowelsn_EE_2] = true;
$Eenadu_prefixList[Eenadu::Eenadu_vowelsn_EE_3] = true;


$Eenadu_overloadList = array();
$Eenadu_overloadList["\xC2\xA7\xC3\xBC"]       = true;
$Eenadu_overloadList["\xC2\xA7\xC3\xBD"]       = true;
$Eenadu_overloadList["\x58\xC2\xB6\xC3\xBD"] = true;
$Eenadu_overloadList["\xC2\xAA\xC3\xBD"]       = true;
$Eenadu_overloadList["\xE2\x80\x9E\xC3\xAE"]       = true;
$Eenadu_overloadList[Eenadu::Eenadu_consnt_KA_2]   = true;
$Eenadu_overloadList[Eenadu::Eenadu_consnt_CA]     = true;
$Eenadu_overloadList[Eenadu::Eenadu_consnt_DDA]    = true;
$Eenadu_overloadList[Eenadu::Eenadu_consnt_DA]     = true;
$Eenadu_overloadList[Eenadu::Eenadu_consnt_PA_1]   = true;
$Eenadu_overloadList[Eenadu::Eenadu_consnt_PA_2]   = true;
$Eenadu_overloadList[Eenadu::Eenadu_consnt_PHA_1]  = true;
$Eenadu_overloadList[Eenadu::Eenadu_consnt_BA_1]   = true;
$Eenadu_overloadList[Eenadu::Eenadu_consnt_YA_1]   = true;
$Eenadu_overloadList[Eenadu::Eenadu_consnt_RA]     = true;
$Eenadu_overloadList[Eenadu::Eenadu_consnt_VA_1]   = true;
$Eenadu_overloadList[Eenadu::Eenadu_consnt_VA_2]   = true;
$Eenadu_overloadList["\x58\xC2\xB6\xC3\x8F"] = true;
$Eenadu_overloadList["\x58\xC2\xB6\xC3\x94"] = true;
$Eenadu_overloadList["\xE2\x80\x9E\xC3\xA7\xC3\x95"] = true;
$Eenadu_overloadList["\xC2\xA6\xC3\x95"]       = true;
$Eenadu_overloadList[Eenadu::Eenadu_vowelsn_R]     = true;
$Eenadu_overloadList[Eenadu::Eenadu_vowelsn_E_1]   = true;
$Eenadu_overloadList[Eenadu::Eenadu_combo_CI]      = true;
$Eenadu_overloadList[Eenadu::Eenadu_combo_CII]     = true;
$Eenadu_overloadList[Eenadu::Eenadu_combo_DI]      = true;
$Eenadu_overloadList[Eenadu::Eenadu_combo_DII]     = true;
$Eenadu_overloadList[Eenadu::Eenadu_combo_BI]      = true;
$Eenadu_overloadList[Eenadu::Eenadu_combo_BII]     = true;
$Eenadu_overloadList[Eenadu::Eenadu_combo_VI]      = true;
$Eenadu_overloadList[Eenadu::Eenadu_combo_VII]     = true;
$Eenadu_overloadList[Eenadu::Eenadu_combo_RI]      = true;
$Eenadu_overloadList[Eenadu::Eenadu_combo_RII]     = true;
$Eenadu_overloadList[Eenadu::Eenadu_vattu_CA]      = true;
$Eenadu_overloadList[Eenadu::Eenadu_vattu_DA]      = true;
$Eenadu_overloadList[Eenadu::Eenadu_vattu_PA]      = true;
$Eenadu_overloadList[Eenadu::Eenadu_vattu_BA]      = true;
$Eenadu_overloadList["\xE2\x80\x9E\xC3\xA3"]       = true;
$Eenadu_overloadList["\xE2\x80\x9E\xC3\xA4"]       = true;
$Eenadu_overloadList["\xE2\x80\x9E\xC3\xA7"]       = true;
$Eenadu_overloadList["\xE2\x80\x9E\xC3\xBE"]       = true;
$Eenadu_overloadList["\xC2\xA7\xC3\xA4"]       = true;
$Eenadu_overloadList["\xC2\xA7\xC3\xA7"]       = true;

function Eenadu_initialize()
{
    global $fontinfo;

    $fontinfo["eenadu"]["language"] = "Telugu";
    $fontinfo["eenadu"]["class"] = "Eenadu";
}

?>
