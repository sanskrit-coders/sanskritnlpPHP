<?php
/* ***** BEGIN LICENSE BLOCK *****
 *
 *  Copyright (C) 2007 Harshita Vani   <harshita@atc.tcs.com>
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

class Anu
{
function Anu()
{
}

//The interface every dynamic font encoding should implement
var $maxLookupLen = 4;
var $fontFace     = "Anu";
var $displayName  = "Anu";
var $script       = Padma::Padma_script_TELUGU;

function lookup($str) 
{
   global $Anu_toPadma;
    if(array_key_exists($str,$Anu_toPadma))
    return $Anu_toPadma[$str];
   return false;
}

function isPrefixSymbol($str)
{
    global $Anu_prefixList;
    return array_key_exists($str,$Anu_prefixList); 
    //return $Anu_prefixList[$str];
}

function isOverloaded($str)
{
    global $Anu_overloadList;
    return array_key_exists($str, $Anu_overloadList);
    //return $Anu_overloadList[$str] != null;
}

function handleTwoPartVowelSigns($sign1, $sign2)
{
    if ($sign1 == Padma::Padma_vowelsn_E && $sign2 == Padma::Padma_vowelsn_U)
        return Padma::Padma_vowelsn_O;
    if (($sign1 == Padma::Padma_vowelsn_E && $sign2 == Padma::Padma_vowelsn_AILEN)
        || ($sign2 == Padma::Padma_vowelsn_E && $sign1 == Padma::Padma_vowelsn_AILEN))
        return Padma::Padma_vowelsn_AI;
    if ($sign1 == Padma::Padma_vowelsn_E && $sign2 == Padma::Padma_vowelsn_AA)
        return Padma::Padma_vowelsn_OO;
    if ($sign1 == Padma::Padma_vowelsn_I && $sign2 == Padma::Padma_vowelsn_AA)
        return Padma::Padma_vowelsn_II;
    return $sign1 . $sign2;    
}

//Don't remove kommu if it is used with ya
function preprocessMessage($input)
{
   $output = "";
   $ctxt = 0;
   $input_len=utf8_strlen($input);
   for($i = 0; $i < $input_len; ++$i)
    {
      $cur=utf8_substr($input,$i,1);
        if (Anu::isRedundant($cur))
            continue;
        if ($ctxt == 1)
        {
          if ($cur == Anu::Anu_vowelsn_AA_6)
           {
            $ctxt = 0;
            continue;
           }
          $val = Anu::lookup($cur);
          if ($val != null)
           {
            $val_exploded[0]=utf8_substr($val,0,1);
            $type = Padma::getType($val_exploded[0]);
             if ($type != Padma::Padma_type_vattu &&
                 $type != Padma::Padma_type_gunintam &&
                 $type != Padma::Padma_type_hallu_mod)
                  $ctxt = 0;
           }
          else $ctxt = 0;
        }
        else if (($cur == Anu::Anu_consnt_HA_1) || ($cur == Anu::Anu_consnt_HA_2) )
         $ctxt = 1;
        
       $output .= $cur;
    }
    return $output;
}


function isRedundant($str)
{
    global $Anu_redundantList;
      return array_key_exists($str, $Anu_redundantList);
}
		

//Implementation details start here

//Specials
const Anu_candrabindu    = "\xC2\x96";
const Anu_visarga        = "\xC2\x97";
const Anu_virama_1       = "\xC2\x98";
const Anu_virama_2       = "\xC2\x9F";
const Anu_virama_3       = "\xC2\xA3";
const Anu_virama_4       = "\xC2\xB1";
const Anu_virama_5       = "\xC2\xB7";
const Anu_virama_6       = "\xC2\xB9";
const Anu_anusvara       = "\x4F";

//Vowels
const Anu_vowel_A        = "\x4A";
const Anu_vowel_AA       = "\x50";
const Anu_vowel_I        = "\x57";
const Anu_vowel_II       = "\x44";
const Anu_vowel_U        = "\x4C";
const Anu_vowel_UU       = "\x54";
const Anu_vowel_R_1      = "\x7C\xC2\xB0\xC2\xB0";
const Anu_vowel_R_2      = "\x7C\xC3\xB2";
const Anu_vowel_RR       = "\x7C\xC3\xBC";
const Anu_vowel_E        = "\x5A";
const Anu_vowel_EE       = "\x55";
const Anu_vowel_AI       = "\x53";
const Anu_vowel_O        = "\x58";
const Anu_vowel_OO       = "\x46";
const Anu_vowel_AU       = "\x42";

//Consonants
const Anu_consnt_KA_1    = "\x48";
const Anu_consnt_KA_2    = "\xC3\xA4";
//const Anu_consnt_KA_3    = "";
const Anu_consnt_KHA_1   = "\x4D";
const Anu_consnt_KHA_2   = "\x59";
const Anu_consnt_GA      = "\x51";
const Anu_consnt_GHA     = "\xC2\x84\xC2\xA6\xC2\xB0";
const Anu_consnt_NGA     = "\x56";

const Anu_consnt_CA      = "\x4B";
const Anu_consnt_CHA     = "\x4B\xC2\x8F";
const Anu_consnt_JA_1    = "\x2A";
const Anu_consnt_JA_2    = "\x5B";
const Anu_consnt_JHA     = "\x7E\xC2\xAD";
const Anu_consnt_NYA     = "\x26";

const Anu_consnt_TTA_1   = "\x3E";
const Anu_consnt_TTA_2   = "\x40";
const Anu_consnt_TTA_3   = "\x5C";
const Anu_consnt_TTHA_1  = "\x4F\xC2\x94";
const Anu_consnt_TTHA_2  = "\x7E\xC2\x94";
const Anu_consnt_DDA     = "\x5F";
const Anu_consnt_DDHA    = "\x5F\xC2\x8F";
const Anu_consnt_NNA     = "\x7D";

const Anu_consnt_TA      = "\x60";
const Anu_consnt_THA     = "\x5E\xC2\x8A";
const Anu_consnt_DA      = "\x5E";
const Anu_consnt_DHA     = "\x5E\xC2\x8F";
const Anu_consnt_NA      = "\x23";
const Anu_consnt_NA_2    = "\x3C";

const Anu_consnt_PA_1    = "\xC2\x84";
const Anu_consnt_PA_2    = "\xC2\x87";
const Anu_consnt_PA_3    = "\xE2\x80\xA1";
const Anu_consnt_PA_4    = "\xE2\x80\x9E";
const Anu_consnt_PHA_1   = "\xC2\x84\xC2\xA6";
const Anu_consnt_PHA_2   = "\xC2\x87\xC2\xA6";
const Anu_consnt_BA_1    = "\x7C";
const Anu_consnt_BA_2    = "\xC2\x83";
const Anu_consnt_BA_3    = "\xC6\x92";
const Anu_consnt_BHA_1   = "\xC2\x83\xC2\x8F";
const Anu_consnt_BHA_2   = "\xC6\x92\xC2\x8F";
const Anu_consnt_MA      = "\x3D\xC2\xB0";

const Anu_consnt_YA      = "\xC2\x86";
const Anu_consnt_YA_2    = "\xC2\x86\xC2\xB0";
const Anu_consnt_YA_3    = "\xE2\x80\xA0\xC2\xB0";
const Anu_consnt_RA      = "\x7E";
const Anu_consnt_LA_1    = "\xC2\x81";
const Anu_consnt_LA_2    = "\xC2\x85";
const Anu_consnt_LA_3    = "\xE2\x80\xA6";
const Anu_consnt_VA_1    = "\x3D";
const Anu_consnt_VA_2    = "\x22";
const Anu_consnt_SHA_1   = "\xC2\x89";
const Anu_consnt_SHA_2   = "\xE2\x80\xB0";
const Anu_consnt_SSA_1   = "\x2B";
const Anu_consnt_SSA_2   = "\xC2\x91";
const Anu_consnt_SA_1    = "\xC2\x8B";
const Anu_consnt_SA_2    = "\xC2\xAA";
const Anu_consnt_SA_3    = "\xE2\x80\xB9";
const Anu_consnt_HA_1    = "\xC2\x82";
const Anu_consnt_HA_2    = "\xE2\x80\x9A";
const Anu_consnt_LLA_1   = "\xC2\x88";
const Anu_consnt_LLA_2   = "\xCB\x86";
const Anu_consnt_RRA     = "\xC2\x8E";
const Anu_conjct_KSHA    = "\x48\xC3\x86";
const Anu_conjct_KSHU    = "\xC3\x86\xC2\xBD";

//Gunintamulu
const Anu_vowelsn_AA_1   = "\xC2\x8C";
const Anu_vowelsn_AA_2   = "\xC2\xA5";
const Anu_vowelsn_AA_3   = "\xC2\xA7";
const Anu_vowelsn_AA_4   = "\xC2\xA8";
const Anu_vowelsn_AA_5   = "\xC3\xAA";
const Anu_vowelsn_AA_6   = "\xC3\xAC";
const Anu_vowelsn_AA_7   = "\xC3\xB0";
const Anu_vowelsn_AA_8   = "\xC2\x90";
const Anu_vowelsn_AA_9   = "\xC5\x92";
const Anu_vowelsn_I_1    = "\xC2\x8D";
const Anu_vowelsn_I_2    = "\xC2\xB2";
const Anu_vowelsn_I_3    = "\xC3\xB7";
const Anu_vowelsn_II_1   = "\xC2\x99";
const Anu_vowelsn_II_2   = "\xC2\xA9";
const Anu_vowelsn_II_3   = "\xC3\x94";
const Anu_vowelsn_II_4   = "\xE2\x84\xA2";
const Anu_vowelsn_U_1    = "\xC2\x95";
const Anu_vowelsn_U_2    = "\xC2\xB0";
const Anu_vowelsn_U_3    = "\xC2\xB5";
const Anu_vowelsn_U_4    = "\xC3\x83";
const Anu_vowelsn_U_5    = "\xC3\xB2";
const Anu_vowelsn_U_6    = "\xC3\xB4";
const Anu_vowelsn_UU_1   = "\xC2\xAF";
const Anu_vowelsn_UU_2   = "\xC2\xB4";
const Anu_vowelsn_UU_3   = "\xC2\xB6";
const Anu_vowelsn_UU_4   = "\xC3\xAE";
const Anu_vowelsn_UU_5   = "\xC3\xBA";
const Anu_vowelsn_UU_6   = "\xC3\xBC";
const Anu_vowelsn_R      = "\x24";
const Anu_vowelsn_RR     = "\x24\xC3\xAC";
const Anu_vowelsn_E_1    = "\xC2\xB3";
const Anu_vowelsn_E_2    = "\xC3\x8C";
const Anu_vowelsn_E_3    = "\xC3\x9C";
const Anu_vowelsn_E_4    = "\xC3\xAF";
const Anu_vowelsn_E_5    = "\xC3\xBF";
const Anu_vowelsn_EE_1   = "\xC3\x80";
const Anu_vowelsn_EE_2   = "\xC3\x8D";
const Anu_vowelsn_EE_3   = "\xC3\xA8";
const Anu_vowelsn_EE_4   = "\xC3\xB5";
const Anu_vowelsn_EE_5   = "\xC3\xB6";
const Anu_vowelsn_O_1    = "\xC2\xB8";
const Anu_vowelsn_O_2    = "\xC3\x9A";
const Anu_vowelsn_O_3    = "\xC3\xA7";
const Anu_vowelsn_O_4    = "\xC3\xB9";
const Anu_vowelsn_OO_1   = "\xC3\x8B";
const Anu_vowelsn_OO_2   = "\xC3\x95";
const Anu_vowelsn_OO_3   = "\xC3\x99";
const Anu_vowelsn_OO_4   = "\xC3\xA9";
const Anu_vowelsn_AU_1   = "\xC2\xBA";
const Anu_vowelsn_AU_2   = "\xC2\xBF";
const Anu_vowelsn_AU_3   = "\xC3\x8F";
const Anu_vowelsn_AU_4   = "\xC3\x92";
const Anu_vowelsn_AU_5   = "\xC3\xB1";

const Anu_vowelsn_AILEN_1   = "\xC3\x98";
const Anu_vowelsn_AILEN_2   = "\xC3\xA1";
const Anu_vowelsn_AILEN_3   = "\xC3\xA5";

//Special Combinations
const Anu_combo_KHI      = "\x64";
const Anu_combo_KHII     = "\x76";
const Anu_combo_GI       = "\x79";
const Anu_combo_GII      = "\x77";
const Anu_combo_GHAA     = "\xC2\x84\xC2\xA6\xC2\xB6";
const Anu_combo_GHI      = "\xC2\x84\xC2\xA6\xC2\xB2\xC2\xB0";
const Anu_combo_GHII     = "\xC2\x84\xC2\xA6\xC3\x94\xC2\xB0";
const Anu_combo_GHU      = "\xC2\x84\xC2\xA6\xC3\xB2";
const Anu_combo_GHUU     = "\xC2\x84\xC2\xA6\xC3\xBC";
const Anu_combo_GHPOLLU  = "\xC2\x84\xC2\xA6\xC2\xB9\xC2\xB0";

const Anu_combo_CI       = "\x7A";
const Anu_combo_CII      = "\x70";
const Anu_combo_CHI      = "\x7A\xC2\x8F";
const Anu_combo_CHII     = "\x70\xC2\x8F";
const Anu_combo_JI       = "\x6C";
const Anu_combo_JII      = "\x72";
const Anu_combo_JU       = "\x41";
const Anu_combo_JUU      = "\x45";
const Anu_combo_JHI      = "\x69\xC2\xAD\xC2\xB0";
const Anu_combo_JHII     = "\x73\xC2\xAD\xC2\xB0";
const Anu_combo_JHPOLLU  = "\x7E\xC2\x9F\xC2\xAD\xC2\xB0";

const Anu_combo_TTHI     = "\x69\xC2\x94";
const Anu_combo_TTHII    = "\x73\xC2\x94";

const Anu_combo_TI       = "\x75";
const Anu_combo_TII      = "\x66";
const Anu_combo_THI      = "\x6B\xC2\x8A";
const Anu_combo_THII     = "\x6E\xC2\x8A";
const Anu_combo_DI       = "\x6B";
const Anu_combo_DII      = "\x6E";
const Anu_combo_DHI      = "\x6B\xC2\x8F";
const Anu_combo_DHII     = "\x6E\xC2\x8F";
const Anu_combo_NI       = "\x78";
const Anu_combo_NII      = "\x68";

const Anu_combo_BI       = "\x61";
const Anu_combo_BII      = "\x63";
const Anu_combo_BHI      = "\x61\xC2\x8F";
const Anu_combo_BHII     = "\x63\xC2\x8F";
const Anu_combo_MAA      = "\x3D\xC2\xB6";
const Anu_combo_MI       = "\x71\xC2\xB0";
const Anu_combo_MII      = "\x67\xC2\xB0";
const Anu_combo_MU       = "\x3D\xC3\xB2";
const Anu_combo_MUU      = "\x3D\xC3\xBC";
const Anu_combo_ME       = "\x22\xC2\xB3\xC2\xB0";
const Anu_combo_MEE      = "\x22\xC3\x8D\xC2\xB0";
const Anu_combo_MO       = "\x22\xC2\xB3\xC3\xB2";
const Anu_combo_MOO      = "\x22\xC2\xB3\xC2\xB6";
const Anu_combo_MPOLLU   = "\x22\xC2\xA3\xC2\xB0";

const Anu_combo_YAA_1    = "\xC2\x86\xC2\xB6";
const Anu_combo_YAA_2    = "\xE2\x80\xA0\xC2\xB6";
const Anu_combo_YI       = "\x7E\xC3\xB2";
const Anu_combo_YII      = "\x7E\xC3\xBC";
const Anu_combo_YE_1     = "\xC2\x86\xC2\xB3\xC2\xB0";
const Anu_combo_YE_2     = "\xE2\x80\xA0\xC2\xB3\xC2\xB0";
const Anu_combo_YEE_1    = "\xC2\x86\xC3\x8D\xC2\xB0";
const Anu_combo_YEE_2    = "\xE2\x80\xA0\xC3\x8D\xC2\xB0";
const Anu_combo_YAI_1    = "\xC2\x86\xC2\xB3\xC3\x98\xC2\xB0";
const Anu_combo_YAI_2    = "\xE2\x80\xA0\xC2\xB3\xC3\x98\xC2\xB0";
const Anu_combo_YOO_1    = "\xC2\x86\xC2\xB3\xC2\xB6";
const Anu_combo_YOO_2    = "\xE2\x80\xA0\xC2\xB3\xC2\xB6";
const Anu_combo_YPOLLU_1 = "\xC2\x86\xC2\x9F\xC2\xB0";
const Anu_combo_YPOLLU_2 = "\xE2\x80\xA0\xC2\x9F\xC2\xB0";
const Anu_combo_RI       = "\x69";
const Anu_combo_RII      = "\x73";
const Anu_combo_LI       = "\x65";
const Anu_combo_LII      = "\x62";
const Anu_combo_VI       = "\x71";
const Anu_combo_VII      = "\x67";
const Anu_combo_SHI      = "\x74";
const Anu_combo_SHII     = "\x6A";
const Anu_combo_LLI      = "\x6F";
const Anu_combo_LLII     = "\x6D";

const Anu_combo_SHRII    = "\x4E";
const Anu_combo_STRA     = "\x47";
const Anu_combo_SSTTRA   = "\x52";
const Anu_combo_KUU_1    = "\xC2\x80"; //Both KUU_1 & KUU_2 doesn't match in font file,but it is there as \\xC3\\xA4(00E4) is overloaded for KA & unnecessary symbol in some places.
const Anu_combo_KUU_2    = "\xE2\x82\xAC";
const Anu_combo_KU       = "\xC2\xBD";

//Vattulu
const Anu_vattu_KA       = "\xC3\xB8";
const Anu_vattu_KHA      = "\xC2\x9A";
const Anu_vattu_GA       = "\xC2\xBE";
const Anu_vattu_GHA      = "\xC3\x89";
//const Anu_vattu_NGA      = "\u";

const Anu_vattu_CA       = "\xC3\xB3";
const Anu_vattu_CHA      = "\xC3\xB3\xC2\x9D";
const Anu_vattu_JA       = "\xC3\xBB";
//const Anu_vattu_JHA      = "\u";
const Anu_vattu_NYA      = "\xC3\xBD";

const Anu_vattu_TTA_1    = "\xC2\x93";
const Anu_vattu_TTA_2    = "\xE2\x80\x9C";
const Anu_vattu_TTHA     = "\xC2\xBB";
const Anu_vattu_DDA      = "\xC3\x9B";
//const Anu_vattu_DDHA     = "\u";
const Anu_vattu_NNA      = "\xC3\xA2";

const Anu_vattu_TA       = "\xC3\xAB";
const Anu_vattu_THA      = "\xC3\x96";
const Anu_vattu_DA       = "\xC3\xAD";
const Anu_vattu_DHA      = "\xC2\x9C";
const Anu_vattu_NA       = "\xC3\x9F";

const Anu_vattu_PA       = "\xC3\xA6";
const Anu_vattu_PHA      = "\xC3\xA6\xC2\x9D";
const Anu_vattu_BA       = "\xC3\x84";
const Anu_vattu_BHA      = "\xC3\x84\xC2\x9D";
const Anu_vattu_MA       = "\xC3\xA0";

const Anu_vattu_YA       = "\xC2\xBC";
const Anu_vattu_RA_1     = "\xC2\xA2";
const Anu_vattu_RA_2     = "\xC3\xA3";
const Anu_vattu_LA       = "\xC3\x81";
const Anu_vattu_VA       = "\xC3\x9E";
const Anu_vattu_SHA      = "\xC3\x85";
const Anu_vattu_SSA_1    = "\xC3\x82";
const Anu_vattu_SSA_2    = "\xC3\x86";
const Anu_vattu_SA       = "\xC2\x9E";
const Anu_vattu_HA       = "\xC3\x9D";
const Anu_vattu_LLA      = "\xC2\xA4";
const Anu_vattu_RRA      = "\x5D";

//Conjuncts
const Anu_vattu_PU       = "\x43";
const Anu_vattu_SSMA     = "\x3B";

//Match ASCII
const Anu_EXCLAM            = "\x21";
const Anu_PERCENT           = "\x25";
const Anu_QTSINGLE_1	    = "\x27";
const Anu_PARENLEFT         = "\x28";
const Anu_PARENRIGHT        = "\x29";
const Anu_COMMA             = "\x2C";
const Anu_HYPHEN_1          = "\x2D";
const Anu_PERIOD            = "\x2E";
const Anu_SLASH             = "\x2F";
const Anu_digit_ZERO        = "\x30";
const Anu_digit_ONE         = "\x31";
const Anu_digit_TWO         = "\x32";
const Anu_digit_THREE       = "\x33";
const Anu_digit_FOUR        = "\x34";
const Anu_digit_FIVE        = "\x35";
const Anu_digit_SIX         = "\x36";
const Anu_digit_SEVEN       = "\x37";
const Anu_digit_EIGHT       = "\x38";
const Anu_digit_NINE        = "\x39";
const Anu_COLON             = "\x3A";
const Anu_QUESTION          = "\x3F";

//Does not match ASCII
const Anu_QTSINGLE_2	    = "\xC3\x91";
const Anu_HYPHEN_2          = "\xC3\x90";
const Anu_PIPE              = "\x49";
const Anu_PLUS              = "\x7B";
const Anu_SEMICOLON         = "\xC2\xA0";
const Anu_EQUALS            = "\xC2\xAB";
const Anu_AMPERSAND         = "\xC3\x8A";
const Anu_DIVIDE            = "\xC3\x93";

//Kommu
const Anu_misc_TICK_1      = "\xC2\x92";
const Anu_misc_TICK_2      = "\xC2\x9B";
const Anu_misc_TICK_3      = "\xC2\xA1";
const Anu_misc_TICK_4      = "\xC2\xAC";
const Anu_misc_TICK_5      = "\xC2\xAE";
const Anu_misc_TICK_6      = "\xC3\x87";
const Anu_misc_TICK_7      = "\xC3\x88";
const Anu_misc_TICK_8      = "\xC3\x97";
const Anu_misc_TICK_9      = "\xC3\x8E";
const Anu_misc_TICK_10     = "\xE2\x80\x99";

//What are these for?
const Anu_misc_UNKNOWN_1 = "\xC3\xA4";//check
const Anu_misc_UNKNOWN_2 = "\xE2\x80\xBA";
}

$Anu_toPadma = array();
$Anu_toPadma[Anu::Anu_candrabindu] = Padma::Padma_candrabindu;
$Anu_toPadma[Anu::Anu_visarga]  = Padma::Padma_visarga;
$Anu_toPadma[Anu::Anu_virama_1]   = Padma::Padma_syllbreak;
$Anu_toPadma[Anu::Anu_virama_2]   = Padma::Padma_syllbreak;
$Anu_toPadma[Anu::Anu_virama_3]   = Padma::Padma_syllbreak;
$Anu_toPadma[Anu::Anu_virama_4]   = Padma::Padma_syllbreak;
$Anu_toPadma[Anu::Anu_virama_5]   = Padma::Padma_syllbreak;
$Anu_toPadma[Anu::Anu_virama_6]   = Padma::Padma_syllbreak;
$Anu_toPadma[Anu::Anu_anusvara] = Padma::Padma_anusvara;

$Anu_toPadma[Anu::Anu_vowel_A]  = Padma::Padma_vowel_A;
$Anu_toPadma[Anu::Anu_vowel_AA] = Padma::Padma_vowel_AA;
$Anu_toPadma[Anu::Anu_vowel_I]  = Padma::Padma_vowel_I;
$Anu_toPadma[Anu::Anu_vowel_II] = Padma::Padma_vowel_II;
$Anu_toPadma[Anu::Anu_vowel_U]  = Padma::Padma_vowel_U;
$Anu_toPadma[Anu::Anu_vowel_UU] = Padma::Padma_vowel_UU;
$Anu_toPadma[Anu::Anu_vowel_R_1]= Padma::Padma_vowel_R;
$Anu_toPadma[Anu::Anu_vowel_R_2]= Padma::Padma_vowel_R;
$Anu_toPadma[Anu::Anu_vowel_RR] = Padma::Padma_vowel_RR;
$Anu_toPadma[Anu::Anu_vowel_E]  = Padma::Padma_vowel_E;
$Anu_toPadma[Anu::Anu_vowel_EE] = Padma::Padma_vowel_EE;
$Anu_toPadma[Anu::Anu_vowel_AI] = Padma::Padma_vowel_AI;
$Anu_toPadma[Anu::Anu_vowel_O]  = Padma::Padma_vowel_O;
$Anu_toPadma[Anu::Anu_vowel_OO] = Padma::Padma_vowel_OO;
$Anu_toPadma[Anu::Anu_vowel_AU] = Padma::Padma_vowel_AU;

$Anu_toPadma[Anu::Anu_consnt_KA_1]  = Padma::Padma_consnt_KA;
$Anu_toPadma[Anu::Anu_consnt_KHA_1] = Padma::Padma_consnt_KHA;
$Anu_toPadma[Anu::Anu_consnt_KHA_2] = Padma::Padma_consnt_KHA;
$Anu_toPadma[Anu::Anu_consnt_GA]  = Padma::Padma_consnt_GA;
$Anu_toPadma[Anu::Anu_consnt_GHA] = Padma::Padma_consnt_GHA;
$Anu_toPadma[Anu::Anu_consnt_NGA] = Padma::Padma_consnt_NGA;

$Anu_toPadma[Anu::Anu_consnt_CA]  = Padma::Padma_consnt_CA;
$Anu_toPadma[Anu::Anu_consnt_CHA] = Padma::Padma_consnt_CHA;
$Anu_toPadma[Anu::Anu_consnt_JA_1]  = Padma::Padma_consnt_JA;
$Anu_toPadma[Anu::Anu_consnt_JA_2]  = Padma::Padma_consnt_JA;
$Anu_toPadma[Anu::Anu_consnt_JHA] = Padma::Padma_consnt_JHA;
$Anu_toPadma[Anu::Anu_consnt_NYA] = Padma::Padma_consnt_NYA;

$Anu_toPadma[Anu::Anu_consnt_TTA_1] = Padma::Padma_consnt_TTA;
$Anu_toPadma[Anu::Anu_consnt_TTA_2] = Padma::Padma_consnt_TTA;
$Anu_toPadma[Anu::Anu_consnt_TTA_3] = Padma::Padma_consnt_TTA;
$Anu_toPadma[Anu::Anu_consnt_TTHA_1] = Padma::Padma_consnt_TTHA;
$Anu_toPadma[Anu::Anu_consnt_TTHA_2] = Padma::Padma_consnt_TTHA;
$Anu_toPadma[Anu::Anu_consnt_DDA] = Padma::Padma_consnt_DDA;
$Anu_toPadma[Anu::Anu_consnt_DDHA] = Padma::Padma_consnt_DDHA;
$Anu_toPadma[Anu::Anu_consnt_NNA] = Padma::Padma_consnt_NNA;

$Anu_toPadma[Anu::Anu_consnt_TA]  = Padma::Padma_consnt_TA;
$Anu_toPadma[Anu::Anu_consnt_THA] = Padma::Padma_consnt_THA;
$Anu_toPadma[Anu::Anu_consnt_DA]  = Padma::Padma_consnt_DA;
$Anu_toPadma[Anu::Anu_consnt_DHA] = Padma::Padma_consnt_DHA;
$Anu_toPadma[Anu::Anu_consnt_NA]  = Padma::Padma_consnt_NA;
$Anu_toPadma[Anu::Anu_consnt_NA_2]= Padma::Padma_consnt_NA;

$Anu_toPadma[Anu::Anu_consnt_PA_1]  = Padma::Padma_consnt_PA;
$Anu_toPadma[Anu::Anu_consnt_PA_2]  = Padma::Padma_consnt_PA;
$Anu_toPadma[Anu::Anu_consnt_PA_3]  = Padma::Padma_consnt_PA;
$Anu_toPadma[Anu::Anu_consnt_PA_4]  = Padma::Padma_consnt_PA;
$Anu_toPadma[Anu::Anu_consnt_PHA_1] = Padma::Padma_consnt_PHA;
$Anu_toPadma[Anu::Anu_consnt_PHA_2] = Padma::Padma_consnt_PHA;
$Anu_toPadma[Anu::Anu_consnt_BA_1]  = Padma::Padma_consnt_BA;
$Anu_toPadma[Anu::Anu_consnt_BA_2]  = Padma::Padma_consnt_BA;
$Anu_toPadma[Anu::Anu_consnt_BA_3]  = Padma::Padma_consnt_BA;
$Anu_toPadma[Anu::Anu_consnt_BHA_1] = Padma::Padma_consnt_BHA;
$Anu_toPadma[Anu::Anu_consnt_BHA_2] = Padma::Padma_consnt_BHA;
$Anu_toPadma[Anu::Anu_consnt_MA]    = Padma::Padma_consnt_MA;

$Anu_toPadma[Anu::Anu_consnt_YA]  = Padma::Padma_consnt_YA;
$Anu_toPadma[Anu::Anu_consnt_YA_2]  = Padma::Padma_consnt_YA;
$Anu_toPadma[Anu::Anu_consnt_YA_3]  = Padma::Padma_consnt_YA;
$Anu_toPadma[Anu::Anu_consnt_RA]  = Padma::Padma_consnt_RA;
$Anu_toPadma[Anu::Anu_consnt_LA_1]  = Padma::Padma_consnt_LA;
$Anu_toPadma[Anu::Anu_consnt_LA_2]  = Padma::Padma_consnt_LA;
$Anu_toPadma[Anu::Anu_consnt_LA_3]  = Padma::Padma_consnt_LA;
$Anu_toPadma[Anu::Anu_consnt_VA_1]  = Padma::Padma_consnt_VA;
$Anu_toPadma[Anu::Anu_consnt_VA_2]  = Padma::Padma_consnt_VA;
$Anu_toPadma[Anu::Anu_consnt_SHA_1] = Padma::Padma_consnt_SHA;
$Anu_toPadma[Anu::Anu_consnt_SHA_2] = Padma::Padma_consnt_SHA;
$Anu_toPadma[Anu::Anu_consnt_SSA_1] = Padma::Padma_consnt_SSA;
$Anu_toPadma[Anu::Anu_consnt_SSA_2] = Padma::Padma_consnt_SSA;
$Anu_toPadma[Anu::Anu_consnt_SA_1] = Padma::Padma_consnt_SA;
$Anu_toPadma[Anu::Anu_consnt_SA_2] = Padma::Padma_consnt_SA;
$Anu_toPadma[Anu::Anu_consnt_SA_3] = Padma::Padma_consnt_SA;
$Anu_toPadma[Anu::Anu_consnt_HA_1] = Padma::Padma_consnt_HA;
$Anu_toPadma[Anu::Anu_consnt_HA_2] = Padma::Padma_consnt_HA;
$Anu_toPadma[Anu::Anu_consnt_LLA_1]= Padma::Padma_consnt_LLA;
$Anu_toPadma[Anu::Anu_consnt_LLA_2]= Padma::Padma_consnt_LLA;
$Anu_toPadma[Anu::Anu_consnt_RRA] = Padma::Padma_consnt_RRA;
$Anu_toPadma[Anu::Anu_conjct_KSHA] = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA;
$Anu_toPadma[Anu::Anu_conjct_KSHU] = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA . Padma::Padma_vowelsn_U;

//Gunintamulu
$Anu_toPadma[Anu::Anu_vowelsn_AA_1]  = Padma::Padma_vowelsn_AA;
$Anu_toPadma[Anu::Anu_vowelsn_AA_2]  = Padma::Padma_vowelsn_AA;
$Anu_toPadma[Anu::Anu_vowelsn_AA_3]  = Padma::Padma_vowelsn_AA;
$Anu_toPadma[Anu::Anu_vowelsn_AA_4]  = Padma::Padma_vowelsn_AA;
$Anu_toPadma[Anu::Anu_vowelsn_AA_5]  = Padma::Padma_vowelsn_AA;
$Anu_toPadma[Anu::Anu_vowelsn_AA_6]  = Padma::Padma_vowelsn_AA;
$Anu_toPadma[Anu::Anu_vowelsn_AA_7]  = Padma::Padma_vowelsn_AA;
$Anu_toPadma[Anu::Anu_vowelsn_AA_8]  = Padma::Padma_vowelsn_AA;
$Anu_toPadma[Anu::Anu_vowelsn_AA_9]  = Padma::Padma_vowelsn_AA;
$Anu_toPadma[Anu::Anu_vowelsn_I_1]   = Padma::Padma_vowelsn_I;
$Anu_toPadma[Anu::Anu_vowelsn_I_2]   = Padma::Padma_vowelsn_I;
$Anu_toPadma[Anu::Anu_vowelsn_I_3]   = Padma::Padma_vowelsn_I;
$Anu_toPadma[Anu::Anu_vowelsn_II_1]  = Padma::Padma_vowelsn_II;
$Anu_toPadma[Anu::Anu_vowelsn_II_2]  = Padma::Padma_vowelsn_II;
$Anu_toPadma[Anu::Anu_vowelsn_II_3]  = Padma::Padma_vowelsn_II;
$Anu_toPadma[Anu::Anu_vowelsn_II_4]  = Padma::Padma_vowelsn_II;
$Anu_toPadma[Anu::Anu_vowelsn_U_1] = Padma::Padma_vowelsn_U;
$Anu_toPadma[Anu::Anu_vowelsn_U_2] = Padma::Padma_vowelsn_U;
$Anu_toPadma[Anu::Anu_vowelsn_U_3] = Padma::Padma_vowelsn_U;
$Anu_toPadma[Anu::Anu_vowelsn_U_4] = Padma::Padma_vowelsn_U;
$Anu_toPadma[Anu::Anu_vowelsn_U_5] = Padma::Padma_vowelsn_U;
$Anu_toPadma[Anu::Anu_vowelsn_U_6] = Padma::Padma_vowelsn_U;
$Anu_toPadma[Anu::Anu_vowelsn_UU_1] = Padma::Padma_vowelsn_UU;
$Anu_toPadma[Anu::Anu_vowelsn_UU_2] = Padma::Padma_vowelsn_UU;
$Anu_toPadma[Anu::Anu_vowelsn_UU_3] = Padma::Padma_vowelsn_UU;
$Anu_toPadma[Anu::Anu_vowelsn_UU_4] = Padma::Padma_vowelsn_UU;
$Anu_toPadma[Anu::Anu_vowelsn_UU_5] = Padma::Padma_vowelsn_UU;
$Anu_toPadma[Anu::Anu_vowelsn_UU_6] = Padma::Padma_vowelsn_UU;
$Anu_toPadma[Anu::Anu_vowelsn_R]   = Padma::Padma_vowelsn_R;
$Anu_toPadma[Anu::Anu_vowelsn_RR]  = Padma::Padma_vowelsn_RR;
$Anu_toPadma[Anu::Anu_vowelsn_E_1]   = Padma::Padma_vowelsn_E;
$Anu_toPadma[Anu::Anu_vowelsn_E_2]   = Padma::Padma_vowelsn_E;
$Anu_toPadma[Anu::Anu_vowelsn_E_3]   = Padma::Padma_vowelsn_E;
$Anu_toPadma[Anu::Anu_vowelsn_E_4]   = Padma::Padma_vowelsn_E;
$Anu_toPadma[Anu::Anu_vowelsn_E_5]   = Padma::Padma_vowelsn_E;
$Anu_toPadma[Anu::Anu_vowelsn_EE_1]  = Padma::Padma_vowelsn_EE;
$Anu_toPadma[Anu::Anu_vowelsn_EE_2]  = Padma::Padma_vowelsn_EE;
$Anu_toPadma[Anu::Anu_vowelsn_EE_3]  = Padma::Padma_vowelsn_EE;
$Anu_toPadma[Anu::Anu_vowelsn_EE_4]  = Padma::Padma_vowelsn_EE;
$Anu_toPadma[Anu::Anu_vowelsn_EE_5]  = Padma::Padma_vowelsn_EE;
$Anu_toPadma[Anu::Anu_vowelsn_O_1]   = Padma::Padma_vowelsn_O;
$Anu_toPadma[Anu::Anu_vowelsn_O_2]   = Padma::Padma_vowelsn_O;
$Anu_toPadma[Anu::Anu_vowelsn_O_3]   = Padma::Padma_vowelsn_O;
$Anu_toPadma[Anu::Anu_vowelsn_O_4]   = Padma::Padma_vowelsn_O;
$Anu_toPadma[Anu::Anu_vowelsn_OO_1]  = Padma::Padma_vowelsn_OO;
$Anu_toPadma[Anu::Anu_vowelsn_OO_2]  = Padma::Padma_vowelsn_OO;
$Anu_toPadma[Anu::Anu_vowelsn_OO_3]  = Padma::Padma_vowelsn_OO;
$Anu_toPadma[Anu::Anu_vowelsn_OO_4]  = Padma::Padma_vowelsn_OO;
$Anu_toPadma[Anu::Anu_vowelsn_AU_1]  = Padma::Padma_vowelsn_AU;
$Anu_toPadma[Anu::Anu_vowelsn_AU_2]  = Padma::Padma_vowelsn_AU;
$Anu_toPadma[Anu::Anu_vowelsn_AU_3]  = Padma::Padma_vowelsn_AU;
$Anu_toPadma[Anu::Anu_vowelsn_AU_4]  = Padma::Padma_vowelsn_AU;
$Anu_toPadma[Anu::Anu_vowelsn_AU_5]  = Padma::Padma_vowelsn_AU;


$Anu_toPadma[Anu::Anu_vowelsn_AILEN_1]  = Padma::Padma_vowelsn_AILEN;
$Anu_toPadma[Anu::Anu_vowelsn_AILEN_2]  = Padma::Padma_vowelsn_AILEN;
$Anu_toPadma[Anu::Anu_vowelsn_AILEN_3]  = Padma::Padma_vowelsn_AILEN;

//Special Combinations
$Anu_toPadma[Anu::Anu_combo_KHI]     = Padma::Padma_consnt_KHA . Padma::Padma_vowelsn_I;
$Anu_toPadma[Anu::Anu_combo_KHII]    = Padma::Padma_consnt_KHA . Padma::Padma_vowelsn_II;
$Anu_toPadma[Anu::Anu_combo_GI]      = Padma::Padma_consnt_GA . Padma::Padma_vowelsn_I;
$Anu_toPadma[Anu::Anu_combo_GII]     = Padma::Padma_consnt_GA . Padma::Padma_vowelsn_II;
$Anu_toPadma[Anu::Anu_combo_GHAA]    = Padma::Padma_consnt_GHA . Padma::Padma_vowelsn_AA;
$Anu_toPadma[Anu::Anu_combo_GHI]     = Padma::Padma_consnt_GHA . Padma::Padma_vowelsn_I;
$Anu_toPadma[Anu::Anu_combo_GHII]    = Padma::Padma_consnt_GHA . Padma::Padma_vowelsn_II;
$Anu_toPadma[Anu::Anu_combo_GHU]     = Padma::Padma_consnt_GHA . Padma::Padma_vowelsn_U;
$Anu_toPadma[Anu::Anu_combo_GHUU]    = Padma::Padma_consnt_GHA . Padma::Padma_vowelsn_UU;
$Anu_toPadma[Anu::Anu_combo_GHPOLLU] = Padma::Padma_consnt_GHA . Padma::Padma_syllbreak;

$Anu_toPadma[Anu::Anu_combo_CI]      = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_I;
$Anu_toPadma[Anu::Anu_combo_CII]     = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_II;
$Anu_toPadma[Anu::Anu_combo_CHI]     = Padma::Padma_consnt_CHA . Padma::Padma_vowelsn_I;
$Anu_toPadma[Anu::Anu_combo_CHII]    = Padma::Padma_consnt_CHA . Padma::Padma_vowelsn_II;
$Anu_toPadma[Anu::Anu_combo_JI]      = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_I;
$Anu_toPadma[Anu::Anu_combo_JII]     = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_II;
$Anu_toPadma[Anu::Anu_combo_JU]      = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_U;
$Anu_toPadma[Anu::Anu_combo_JUU]     = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_UU;
$Anu_toPadma[Anu::Anu_combo_JHI]     = Padma::Padma_consnt_JHA . Padma::Padma_vowelsn_I;
$Anu_toPadma[Anu::Anu_combo_JHII]    = Padma::Padma_consnt_JHA . Padma::Padma_vowelsn_II;
$Anu_toPadma[Anu::Anu_combo_JHPOLLU] = Padma::Padma_consnt_JHA . Padma::Padma_syllbreak;

$Anu_toPadma[Anu::Anu_combo_TTHI]    = Padma::Padma_consnt_TTHA . Padma::Padma_vowelsn_I;
$Anu_toPadma[Anu::Anu_combo_TTHII]   = Padma::Padma_consnt_TTHA . Padma::Padma_vowelsn_II;

$Anu_toPadma[Anu::Anu_combo_TI]      = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_I;
$Anu_toPadma[Anu::Anu_combo_TII]     = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_II;
$Anu_toPadma[Anu::Anu_combo_THI]     = Padma::Padma_consnt_THA . Padma::Padma_vowelsn_I;
$Anu_toPadma[Anu::Anu_combo_THII]    = Padma::Padma_consnt_THA . Padma::Padma_vowelsn_II;
$Anu_toPadma[Anu::Anu_combo_DI]      = Padma::Padma_consnt_DA . Padma::Padma_vowelsn_I;
$Anu_toPadma[Anu::Anu_combo_DII]     = Padma::Padma_consnt_DA . Padma::Padma_vowelsn_II;
$Anu_toPadma[Anu::Anu_combo_DHI]     = Padma::Padma_consnt_DHA . Padma::Padma_vowelsn_I;
$Anu_toPadma[Anu::Anu_combo_DHII]    = Padma::Padma_consnt_DHA . Padma::Padma_vowelsn_II;
$Anu_toPadma[Anu::Anu_combo_NI]      = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_I;
$Anu_toPadma[Anu::Anu_combo_NII]     = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_II;

$Anu_toPadma[Anu::Anu_combo_BI]      = Padma::Padma_consnt_BA . Padma::Padma_vowelsn_I;
$Anu_toPadma[Anu::Anu_combo_BII]     = Padma::Padma_consnt_BA . Padma::Padma_vowelsn_II;
$Anu_toPadma[Anu::Anu_combo_BHI]     = Padma::Padma_consnt_BHA . Padma::Padma_vowelsn_I;
$Anu_toPadma[Anu::Anu_combo_BHII]    = Padma::Padma_consnt_BHA . Padma::Padma_vowelsn_II;
$Anu_toPadma[Anu::Anu_combo_MAA]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_AA;
$Anu_toPadma[Anu::Anu_combo_MI]      = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_I;
$Anu_toPadma[Anu::Anu_combo_MII]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_II;
$Anu_toPadma[Anu::Anu_combo_MU]      = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_U;
$Anu_toPadma[Anu::Anu_combo_MUU]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_UU;
$Anu_toPadma[Anu::Anu_combo_ME]      = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_E;
$Anu_toPadma[Anu::Anu_combo_MEE]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_EE;
$Anu_toPadma[Anu::Anu_combo_MO]      = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_O;
$Anu_toPadma[Anu::Anu_combo_MOO]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_OO;
$Anu_toPadma[Anu::Anu_combo_MPOLLU]  = Padma::Padma_consnt_MA . Padma::Padma_syllbreak;

$Anu_toPadma[Anu::Anu_combo_YAA_1]   = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_AA;
$Anu_toPadma[Anu::Anu_combo_YAA_2]   = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_AA;
$Anu_toPadma[Anu::Anu_combo_YI]      = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_I;
$Anu_toPadma[Anu::Anu_combo_YII]     = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_II;
$Anu_toPadma[Anu::Anu_combo_YE_1]    = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_E;
$Anu_toPadma[Anu::Anu_combo_YE_2]    = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_E;
$Anu_toPadma[Anu::Anu_combo_YEE_1]   = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_EE;
$Anu_toPadma[Anu::Anu_combo_YEE_2]   = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_EE;
$Anu_toPadma[Anu::Anu_combo_YAI_1]   = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_AI;
$Anu_toPadma[Anu::Anu_combo_YAI_2]   = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_AI;
$Anu_toPadma[Anu::Anu_combo_YOO_1]   = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_OO;
$Anu_toPadma[Anu::Anu_combo_YOO_2]   = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_OO;
$Anu_toPadma[Anu::Anu_combo_YPOLLU_1]= Padma::Padma_consnt_YA . Padma::Padma_syllbreak;
$Anu_toPadma[Anu::Anu_combo_YPOLLU_2]= Padma::Padma_consnt_YA . Padma::Padma_syllbreak;
$Anu_toPadma[Anu::Anu_combo_RI]      = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_I;
$Anu_toPadma[Anu::Anu_combo_RII]     = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_II;
$Anu_toPadma[Anu::Anu_combo_LI]      = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_I;
$Anu_toPadma[Anu::Anu_combo_LII]     = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_II;
$Anu_toPadma[Anu::Anu_combo_VI]      = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_I;
$Anu_toPadma[Anu::Anu_combo_VII]     = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_II;
$Anu_toPadma[Anu::Anu_combo_SHI]     = Padma::Padma_consnt_SHA . Padma::Padma_vowelsn_I;
$Anu_toPadma[Anu::Anu_combo_SHII]    = Padma::Padma_consnt_SHA . Padma::Padma_vowelsn_II;
$Anu_toPadma[Anu::Anu_combo_LLI]     = Padma::Padma_consnt_LLA . Padma::Padma_vowelsn_I;
$Anu_toPadma[Anu::Anu_combo_LLII]    = Padma::Padma_consnt_LLA . Padma::Padma_vowelsn_II;

$Anu_toPadma[Anu::Anu_combo_SHRII]  = Padma::Padma_consnt_SHA . Padma::Padma_vattu_RA . Padma::Padma_vowelsn_II;
$Anu_toPadma[Anu::Anu_combo_STRA]   = Padma::Padma_consnt_SA . Padma::Padma_vattu_TA . Padma::Padma_vattu_RA;
$Anu_toPadma[Anu::Anu_combo_SSTTRA] = Padma::Padma_consnt_SSA . Padma::Padma_vattu_TTA . Padma::Padma_vattu_RA;
$Anu_toPadma[Anu::Anu_combo_LLII]   = Padma::Padma_consnt_LLA . Padma::Padma_vowelsn_II;
$Anu_toPadma[Anu::Anu_combo_KUU_1]  = Padma::Padma_consnt_KA . Padma::Padma_vowelsn_UU;
$Anu_toPadma[Anu::Anu_combo_KUU_2]  = Padma::Padma_consnt_KA . Padma::Padma_vowelsn_UU;
$Anu_toPadma[Anu::Anu_combo_KU]     = Padma::Padma_consnt_KA . Padma::Padma_vowelsn_U;

//Vattulu
$Anu_toPadma[Anu::Anu_vattu_KA]      = Padma::Padma_vattu_KA;
$Anu_toPadma[Anu::Anu_vattu_KHA]     = Padma::Padma_vattu_KHA;
$Anu_toPadma[Anu::Anu_vattu_GA]      = Padma::Padma_vattu_GA;
$Anu_toPadma[Anu::Anu_vattu_GHA]     = Padma::Padma_vattu_GHA;
//$Anu_toPadma[Anu::Anu_vattu_NGA]     = Padma::Padma_vattu_NGA;
$Anu_toPadma[Anu::Anu_vattu_CA]      = Padma::Padma_vattu_CA;
$Anu_toPadma[Anu::Anu_vattu_CHA]     = Padma::Padma_vattu_CHA;
$Anu_toPadma[Anu::Anu_vattu_JA]      = Padma::Padma_vattu_JA;
//$Anu_toPadma[Anu::Anu_vattu_JHA]     = Padma::Padma_vattu_JHA;
$Anu_toPadma[Anu::Anu_vattu_NYA]     = Padma::Padma_vattu_NYA;
$Anu_toPadma[Anu::Anu_vattu_TTA_1]   = Padma::Padma_vattu_TTA;
$Anu_toPadma[Anu::Anu_vattu_TTA_2]   = Padma::Padma_vattu_TTA;
$Anu_toPadma[Anu::Anu_vattu_TTHA]    = Padma::Padma_vattu_TTHA;
$Anu_toPadma[Anu::Anu_vattu_DDA]     = Padma::Padma_vattu_DDA;
//$Anu_toPadma[Anu::Anu_vattu_DDHA]    = Padma::Padma_vattu_DDHA;
$Anu_toPadma[Anu::Anu_vattu_NNA]     = Padma::Padma_vattu_NNA;
$Anu_toPadma[Anu::Anu_vattu_TA]      = Padma::Padma_vattu_TA;
$Anu_toPadma[Anu::Anu_vattu_THA]     = Padma::Padma_vattu_THA;
$Anu_toPadma[Anu::Anu_vattu_DA]      = Padma::Padma_vattu_DA;
$Anu_toPadma[Anu::Anu_vattu_DHA]     = Padma::Padma_vattu_DHA;
$Anu_toPadma[Anu::Anu_vattu_NA]      = Padma::Padma_vattu_NA;
$Anu_toPadma[Anu::Anu_vattu_PA]      = Padma::Padma_vattu_PA;
$Anu_toPadma[Anu::Anu_vattu_PHA]     = Padma::Padma_vattu_PHA;
$Anu_toPadma[Anu::Anu_vattu_BA]      = Padma::Padma_vattu_BA;
$Anu_toPadma[Anu::Anu_vattu_BHA]     = Padma::Padma_vattu_BHA;
$Anu_toPadma[Anu::Anu_vattu_MA]      = Padma::Padma_vattu_MA;
$Anu_toPadma[Anu::Anu_vattu_YA]      = Padma::Padma_vattu_YA;
$Anu_toPadma[Anu::Anu_vattu_RA_1]    = Padma::Padma_vattu_RA;
$Anu_toPadma[Anu::Anu_vattu_RA_2]    = Padma::Padma_vattu_RA;
$Anu_toPadma[Anu::Anu_vattu_LA]      = Padma::Padma_vattu_LA;
$Anu_toPadma[Anu::Anu_vattu_VA]      = Padma::Padma_vattu_VA;
$Anu_toPadma[Anu::Anu_vattu_SHA]     = Padma::Padma_vattu_SHA;
$Anu_toPadma[Anu::Anu_vattu_SSA_1]   = Padma::Padma_vattu_SSA;
$Anu_toPadma[Anu::Anu_vattu_SSA_2]   = Padma::Padma_vattu_SSA;
$Anu_toPadma[Anu::Anu_vattu_SA]      = Padma::Padma_vattu_SA;
$Anu_toPadma[Anu::Anu_vattu_HA]      = Padma::Padma_vattu_HA;
$Anu_toPadma[Anu::Anu_vattu_LLA]     = Padma::Padma_vattu_LLA;
$Anu_toPadma[Anu::Anu_vattu_RRA]     = Padma::Padma_vattu_RRA;

//Conjuncts
$Anu_toPadma[Anu::Anu_vattu_PU]     = Padma::Padma_vattu_PA . Padma::Padma_vowelsn_U;
$Anu_toPadma[Anu::Anu_vattu_SSMA]   = Padma::Padma_vattu_SSA . Padma::Padma_vattu_MA;

//Miscellaneous(where it doesn't match ASCII representation)
$Anu_toPadma[Anu::Anu_QTSINGLE_2]   = "'";
$Anu_toPadma[Anu::Anu_HYPHEN_2]     = "-";
$Anu_toPadma[Anu::Anu_PIPE]         = "|";
$Anu_toPadma[Anu::Anu_PLUS]         = "+";
$Anu_toPadma[Anu::Anu_SEMICOLON]    = ";";
$Anu_toPadma[Anu::Anu_EQUALS]       = "=";
$Anu_toPadma[Anu::Anu_AMPERSAND]    = "&";
$Anu_toPadma[Anu::Anu_DIVIDE]       = "/";

$Anu_redundantList = array();
$Anu_redundantList[Anu::Anu_misc_TICK_1] = true;
$Anu_redundantList[Anu::Anu_misc_TICK_2] = true;
$Anu_redundantList[Anu::Anu_misc_TICK_3] = true;
$Anu_redundantList[Anu::Anu_misc_TICK_4] = true;
$Anu_redundantList[Anu::Anu_misc_TICK_5] = true;
$Anu_redundantList[Anu::Anu_misc_TICK_6] = true;
$Anu_redundantList[Anu::Anu_misc_TICK_7] = true;
$Anu_redundantList[Anu::Anu_misc_TICK_8] = true;
$Anu_redundantList[Anu::Anu_misc_TICK_9] = true;
$Anu_redundantList[Anu::Anu_misc_TICK_10] = true;
$Anu_redundantList[Anu::Anu_misc_UNKNOWN_1] = true;
$Anu_redundantList[Anu::Anu_misc_UNKNOWN_2] = true;

$Anu_prefixList = array();
$Anu_prefixList[Anu::Anu_vattu_RA_1]   = true;
$Anu_prefixList[Anu::Anu_vattu_RA_2]   = true;
$Anu_prefixList[Anu::Anu_vowelsn_E_2]  = true;
$Anu_prefixList[Anu::Anu_vowelsn_E_4]  = true;
$Anu_prefixList[Anu::Anu_vowelsn_EE_1] = true;
$Anu_prefixList[Anu::Anu_vowelsn_EE_5] = true;

$Anu_overloadList = array();
$Anu_overloadList[Anu::Anu_anusvara]   = true;
$Anu_overloadList[Anu::Anu_vowelsn_R]   = true;
$Anu_overloadList[Anu::Anu_consnt_KA_1]   = true;
$Anu_overloadList[Anu::Anu_consnt_KA_2]   = true;
//$Anu_overloadList[Anu::Anu_consnt_KA_3]   = true;
$Anu_overloadList[Anu::Anu_consnt_CA]   = true;
$Anu_overloadList[Anu::Anu_consnt_DA]   = true;
$Anu_overloadList[Anu::Anu_consnt_DDA]   = true;
$Anu_overloadList[Anu::Anu_consnt_PA_1]   = true;
$Anu_overloadList[Anu::Anu_consnt_PA_2]   = true;
$Anu_overloadList[Anu::Anu_consnt_PA_3]   = true;
$Anu_overloadList[Anu::Anu_consnt_BA_1]   = true;
$Anu_overloadList[Anu::Anu_consnt_PHA_1]   = true;
$Anu_overloadList[Anu::Anu_consnt_VA_1]   = true;
$Anu_overloadList[Anu::Anu_consnt_VA_2]   = true;
$Anu_overloadList[Anu::Anu_consnt_BA_2]   = true;
$Anu_overloadList[Anu::Anu_consnt_BA_3]   = true;
$Anu_overloadList[Anu::Anu_consnt_RA]   = true;
$Anu_overloadList[Anu::Anu_consnt_YA]   = true;
$Anu_overloadList[Anu::Anu_combo_DI]   = true;
$Anu_overloadList[Anu::Anu_combo_DII]   = true;
$Anu_overloadList[Anu::Anu_combo_BI]   = true;
$Anu_overloadList[Anu::Anu_combo_BII]   = true;
$Anu_overloadList[Anu::Anu_combo_CI]   = true;
$Anu_overloadList[Anu::Anu_combo_CII]   = true;
$Anu_overloadList["\x22\xC2\xB3"]   = true;
$Anu_overloadList["\x22\xC2\xA3"]   = true;
$Anu_overloadList["\xC2\x84\xC2\xA6\xC2\xB9"]   = true;
$Anu_overloadList["\xC2\x84\xC2\xA6\xC2\xB2"]   = true;
$Anu_overloadList["\xC2\x84\xC2\xA6\xC3\x94"]   = true;
$Anu_overloadList["\xC2\x86\xC2\xB3"]   = true;
$Anu_overloadList["\xC2\x86\xC2\x9F"]   = true;
$Anu_overloadList["\xC2\x86\xC2\xB3\xC3\x98"]   = true;
$Anu_overloadList["\xC2\x86\xC3\x8D"]   = true;
$Anu_overloadList["\xE2\x80\xA0\xC2\xB3"]   = true;
$Anu_overloadList["\xE2\x80\xA0\xC2\x9F"]   = true;
$Anu_overloadList["\xE2\x80\xA0\xC2\xB3\xC3\x98"]   = true;
$Anu_overloadList["\xE2\x80\xA0\xC3\x8D"]   = true;
$Anu_overloadList[Anu::Anu_vattu_BA]   = true;
$Anu_overloadList[Anu::Anu_vattu_CA]   = true;
$Anu_overloadList[Anu::Anu_vattu_PA]   = true;
$Anu_overloadList[Anu::Anu_combo_RI]   = true;
$Anu_overloadList[Anu::Anu_combo_RII]  = true;
$Anu_overloadList[Anu::Anu_combo_VI]   = true;
$Anu_overloadList[Anu::Anu_combo_VII]   = true;
$Anu_overloadList["\x22\xC3\x8D"]   = true;
$Anu_overloadList["\x7C\xC2\xB0"]   = true;
$Anu_overloadList["\x73\xC2\xAD"]   = true;
$Anu_overloadList["\x69\xC2\xAD"]   = true;
$Anu_overloadList["\x7E\xC2\x9F"]   = true;
$Anu_overloadList["\x7E\xC2\x9F\xC2\xAD"]   = true;
$Anu_overloadList[Anu::Anu_vattu_SSA_2]   = true;
$Anu_overloadList["\xE2\x80\xA0"]   = true;
$Anu_overloadList["\xC3\xA4"]   = true;

function Anu_initialize()
{
    global $fontinfo;

    $fontinfo["priyaanka"]["language"] = "Telugu";
    $fontinfo["priyaanka"]["class"] = "Anu";
    $fontinfo["priyaankabold"]["language"] = "Telugu";
    $fontinfo["priyaankabold"]["class"] = "Anu";
    $fontinfo["anu"]["language"] = "Telugu";
    $fontinfo["anu"]["class"] = "Anu";
    $fontinfo["anupamabold"]["language"] = "Telugu";
    $fontinfo["anupamabold"]["class"] = "Anu";
    $fontinfo["anupamathin"]["language"] = "Telugu";
    $fontinfo["anupamathin"]["class"] = "Anu";
    $fontinfo["ramanabrush"]["language"] = "Telugu";
    $fontinfo["ramanabrush"]["class"] = "Anu";
    $fontinfo["ramanascript"]["language"] = "Telugu";
    $fontinfo["ramanascript"]["class"] = "Anu";
    $fontinfo["ramanascriptmedium"]["language"] = "Telugu";
    $fontinfo["ramanascriptmedium"]["class"] = "Anu";
    $fontinfo["kranthi"]["language"] = "Telugu";
    $fontinfo["kranthi"]["class"] = "Anu";
    $fontinfo["brahma"]["language"] = "Telugu";
    $fontinfo["brahma"]["class"] = "Anu";
}
?>
