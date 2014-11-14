<?php
/* ***** BEGIN LICENSE BLOCK *****
 *
 *  Copyright (C) 2009 Harshita Vani   <harshita@atc.tcs.com>
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

class VaarthaText {
function VaarthaText()
{
}

//The interface every dynamic font encoding should implement
var $maxLookupLen = 4;
var $fontFace     = "VaarthaText";
var $displayName  = "VaarthaText";
var $script       = Padma::Padma_script_TELUGU;

function lookup($str)
{
   global $VaarthaText_toPadma;
    if(array_key_exists($str,$VaarthaText_toPadma))
    return $VaarthaText_toPadma[$str];
   return false;
}

function isPrefixSymbol($str)
{
    global $VaarthaText_prefixList;
    return array_key_exists($str,$VaarthaText_prefixList);
    //return $VaarthaText_prefixList[$str];
}

function isOverloaded($str)
{
    global $VaarthaText_overloadList;
    return array_key_exists($str, $VaarthaText_overloadList);
    //return $VaarthaText_overloadList[$str] != null;
}

function handleTwoPartVowelSigns ($sign1, $sign2)
{
    if (($sign2 == Padma::Padma_vowelsn_E && $sign1 == Padma::Padma_vowelsn_AILEN) ||
        ($sign1 == Padma::Padma_vowelsn_E && $sign2 == Padma::Padma_vowelsn_AILEN) )
        return Padma::Padma_vowelsn_AI;
    if (($sign2 == Padma::Padma_vowelsn_E && $sign1 == Padma::Padma_vowelsn_U) ||
        ($sign1 == Padma::Padma_vowelsn_E && $sign2 == Padma::Padma_vowelsn_U))
        return Padma::Padma_vowelsn_O;
    if (($sign2 == Padma::Padma_vowelsn_E && $sign1 == Padma::Padma_vowelsn_AA) ||
        ($sign1 == Padma::Padma_vowelsn_E && $sign2 == Padma::Padma_vowelsn_AA))
        return Padma::Padma_vowelsn_OO;
    return $sign1 . $sign2;
}

//\xC3\x87 is used mostly for AA gunintam - unfortunately it is also used for writing HA, so it needs to be handled specially
function preprocessMessage($input)
{
   $output = "";
   $ctxt = 0;
   $input_len=utf8_strlen($input);
   for($i = 0; $i < $input_len; ++$i){
      $cur=utf8_substr($input,$i,1);
        if (VaarthaText::isRedundant($cur))
            continue;
        if ($ctxt == 1){
          if ($cur == VaarthaText::VaarthaText_vowelsn_AA_2){
            $ctxt = 0;
            continue;
           }
          $val = VaarthaText::lookup($cur);
          if ($val != null){
            $val_exploded[0]=utf8_substr($val,0,1);
            $type = Padma::getType($val_exploded[0]);
             if ($type != Padma::Padma_type_vattu &&
                 $type != Padma::Padma_type_gunintam &&
                 $type != Padma::Padma_type_hallu_mod)
                  $ctxt = 0;
           }
          else $ctxt = 0;
        }
        else if ($cur == VaarthaText::VaarthaText_consnt_HA)
         $ctxt = 1;
        $output .= $cur;
    }
    return $output;
}

function isRedundant($str)
{
    global $VaarthaText_redundantList;
      return array_key_exists($str, $VaarthaText_redundantList);
}



//Implementation details start here

//Specials
const VaarthaText_candrabindu    = "\xE2\x80\x9C";
const VaarthaText_visarga        = "\xC3\x93";
//VaarthaText.virama_1       = "\xCB\x99";
const VaarthaText_virama_2       = "\xC3\xBB";
const VaarthaText_virama_3       = "\xC2\xB8";
const VaarthaText_virama_4       = "\xC3\xBF";
const VaarthaText_virama_5       = "\xC3\xBA";
const VaarthaText_virama_6       = "\xC3\xBC";
const VaarthaText_virama_7       = "\xC3\xBD";
const VaarthaText_virama_8       = "\xC3\xBE";
const VaarthaText_anusvara       = "\xC2\x8D";

//Vowels
//VaarthaText.vowel_A_1      = "\xE2\x82\xAC";
const VaarthaText_vowel_A_2      = "\xC2\x81";
const VaarthaText_vowel_AA_1     = "\xC2\x82";
const VaarthaText_vowel_AA_2     = "\xE2\x80\x9A";
const VaarthaText_vowel_I_1      = "\xC2\x83";
const VaarthaText_vowel_I_2      = "\xC6\x92";
const VaarthaText_vowel_II_1     = "\xC2\x84";
const VaarthaText_vowel_II_2     = "\xE2\x80\x9E";
const VaarthaText_vowel_U_1      = "\xC2\x85";
const VaarthaText_vowel_U_2      = "\xE2\x80\xA6";
const VaarthaText_vowel_UU_1     = "\xC2\x86";
const VaarthaText_vowel_UU_2     = "\xE2\x80\xA0";
const VaarthaText_vowel_R        = "\xC2\xA5\xC3\x95\xC3\x95";
const VaarthaText_vowel_RR       = "\xC2\xA5\xC3\x95\xC3\x96";
const VaarthaText_vowel_E_1      = "\xC2\x87";
const VaarthaText_vowel_E_2      = "\xE2\x80\xA1";
const VaarthaText_vowel_EE_1     = "\xC2\x88";
const VaarthaText_vowel_EE_2     = "\xCB\x86";
const VaarthaText_vowel_AI_1     = "\xC2\x89";
const VaarthaText_vowel_AI_2     = "\xE2\x80\xB0";
const VaarthaText_vowel_O_1      = "\xC2\x8A";
const VaarthaText_vowel_O_2      = "\xC5\xA0";
const VaarthaText_vowel_OO_1     = "\xC2\x8B";
const VaarthaText_vowel_OO_2     = "\xE2\x80\xB9";
const VaarthaText_vowel_AU_1     = "\xC2\x8C";
const VaarthaText_vowel_AU_2     = "\xC5\x92";

//Consonants
const VaarthaText_consnt_KA_1    = "\xC2\x8E";
const VaarthaText_consnt_KA_2    = "\xC2\x8F";
const VaarthaText_consnt_KA_3    = "\xC5\xBD";
const VaarthaText_consnt_KHA_1   = "\xC2\x90";
const VaarthaText_consnt_KHA_2   = "\xE2\x80\x98";
const VaarthaText_consnt_GA      = "\xE2\x80\x99";
const VaarthaText_consnt_GHA     = "\xC2\xA1\xC2\xB6\xC3\x95";
const VaarthaText_consnt_NGA     = "\xE2\x80\x9C";

const VaarthaText_consnt_CA      = "\xE2\x80\x9D";
const VaarthaText_consnt_CHA     = "\xE2\x80\x9D\xC2\xB5";
const VaarthaText_consnt_JA_1    = "\xE2\x80\xA2";
const VaarthaText_consnt_JA_2    = "\xE2\x80\x93";
const VaarthaText_consnt_JHA     = "\xC2\xA8\xE2\x80\x94";
const VaarthaText_consnt_NYA     = "\xC2\x98";

const VaarthaText_consnt_TTA_1   = "\xC2\x99";
const VaarthaText_consnt_TTA_2   = "\xC2\x9A";
const VaarthaText_consnt_TTA_3   = "\xC2\x9B";
const VaarthaText_consnt_TTA_4   = "\xE2\x84\xA2";
const VaarthaText_consnt_TTA_5   = "\xC5\xA1";
const VaarthaText_consnt_TTA_6   = "\xE2\x80\xBA";
const VaarthaText_consnt_TTHA    = "\xC2\xA8\xC2\xB8";
const VaarthaText_consnt_DDA_1   = "\xC2\x9C";
const VaarthaText_consnt_DDA_2   = "\xC5\x93";
const VaarthaText_consnt_DDHA_1  = "\xC2\x9C\xC2\xB5";
const VaarthaText_consnt_DDHA_2  = "\xC5\x93\xC2\xB5";
const VaarthaText_consnt_NNA     = "\xC2\x9D";

const VaarthaText_consnt_TA_1    = "\xC2\x9E";
const VaarthaText_consnt_TA_2    = "\xC5\xBE";
const VaarthaText_consnt_THA_1   = "\xC2\x9F\xC2\xB7";
const VaarthaText_consnt_THA_2   = "\xC5\xB8\xC2\xB7";
const VaarthaText_consnt_DA_1    = "\xC2\x9F";
const VaarthaText_consnt_DA_2    = "\xC5\xB8";
const VaarthaText_consnt_DHA_1   = "\xC2\x9F\xC2\xB5";
const VaarthaText_consnt_DHA_2   = "\xC5\xB8\xC2\xB5";
const VaarthaText_consnt_NA_1    = "\xC2\xA0";
const VaarthaText_consnt_NA_2    = "\xC2\xAF";
const VaarthaText_consnt_NA_3    = "\x24";

const VaarthaText_consnt_PA_1    = "\xC2\xA1";
const VaarthaText_consnt_PA_2    = "\xC2\xA4";
const VaarthaText_consnt_PHA_1   = "\xC2\xA1\xC2\xB6";
const VaarthaText_consnt_PHA_2   = "\xC2\xA4\xC2\xB6";
const VaarthaText_consnt_BA_1    = "\xC2\xA5";
const VaarthaText_consnt_BA_2    = "\xC2\xA6";
const VaarthaText_consnt_BHA     = "\xC2\xA6\xC2\xB5";
const VaarthaText_consnt_MA_1    = "\xC2\xAB\xC3\x95";
const VaarthaText_consnt_MA_2    = "\xC2\xA2\xC3\x95";

//VaarthaText.consnt_YA_1    = "\xC2\xA7";
const VaarthaText_consnt_YA_2    = "\xC2\xA7\xC3\x95";
const VaarthaText_consnt_RA      = "\xC2\xA8";
const VaarthaText_consnt_LA_1    = "\xC2\xAA";
const VaarthaText_consnt_LA_2    = "\xC2\xA9";
const VaarthaText_consnt_VA_1    = "\xC2\xAB";
const VaarthaText_consnt_VA_2    = "\xC2\xA2";
const VaarthaText_consnt_SHA     = "\xC2\xAC";
const VaarthaText_consnt_SSA_1   = "\xC2\xAD";
const VaarthaText_consnt_SSA_2   = "\xC2\xB3";
const VaarthaText_consnt_SA_1    = "\xC2\xAE";
const VaarthaText_consnt_SA_2    = "\xC2\xB2";
const VaarthaText_consnt_HA      = "\xC2\xA3";
const VaarthaText_consnt_LLA     = "\xC2\xB0";
const VaarthaText_consnt_RRA     = "\xC2\xB1";
const VaarthaText_conjct_KSHA    = "\xC2\x8E\x7E";

//Gunintamulu
const VaarthaText_vowelsn_AA_1   = "\xC3\x82";
const VaarthaText_vowelsn_AA_2   = "\xC3\x87";
const VaarthaText_vowelsn_AA_3   = "\xC3\x83";
const VaarthaText_vowelsn_AA_4   = "\xC3\x85";
const VaarthaText_vowelsn_AA_5   = "\xC3\x86";
const VaarthaText_vowelsn_AA_6   = "\xC3\x84";
const VaarthaText_vowelsn_AA_7   = "\xC3\x88";
const VaarthaText_vowelsn_AA_8   = "\xC3\x89";
const VaarthaText_vowelsn_I_1    = "\xC3\x8B";
const VaarthaText_vowelsn_I_2    = "\xC3\x8D";
const VaarthaText_vowelsn_I_3    = "\xC3\x8F";
const VaarthaText_vowelsn_II_1   = "\xC3\x8C";
const VaarthaText_vowelsn_II_2   = "\xC3\x8E";
const VaarthaText_vowelsn_II_3   = "\xC3\x94";
const VaarthaText_vowelsn_U_1    = "\xC3\x97";
const VaarthaText_vowelsn_U_2    = "\xC3\x95";
const VaarthaText_vowelsn_U_3    = "\xC3\x9B";
const VaarthaText_vowelsn_U_4    = "\xC3\x99";
const VaarthaText_vowelsn_U_5    = "\xC3\x9F";
const VaarthaText_vowelsn_U_6    = "\xC3\x9D";
const VaarthaText_vowelsn_U_7    = "\xC3\xA1";
const VaarthaText_vowelsn_UU_1   = "\xC3\x98";
const VaarthaText_vowelsn_UU_2   = "\xC3\x96";
const VaarthaText_vowelsn_UU_3   = "\xC3\x9C";
const VaarthaText_vowelsn_UU_4   = "\xC3\x9A";
const VaarthaText_vowelsn_UU_5   = "\xC3\xA0";
const VaarthaText_vowelsn_UU_6   = "\xC3\x9E";
////VaarthaText.vowelsn_UU_7   = "\xC3\xA2";
const VaarthaText_vowelsn_R_1    = "\x5B";
const VaarthaText_vowelsn_R_2    = "\x5D";
const VaarthaText_vowelsn_RR_1   = "\x5B\xC3\x87";
const VaarthaText_vowelsn_RR_2   = "\x5D\xC3\x87";
const VaarthaText_vowelsn_E_1    = "\xC3\xA9";
const VaarthaText_vowelsn_E_2    = "\xC3\xA3";
const VaarthaText_vowelsn_E_3    = "\xC3\xA7";
const VaarthaText_vowelsn_E_4    = "\xC3\xAB";
const VaarthaText_vowelsn_E_5    = "\xC3\xA5";
const VaarthaText_vowelsn_EE_1   = "\xC3\xAA";
const VaarthaText_vowelsn_EE_2   = "\xC3\xA4";
const VaarthaText_vowelsn_EE_3   = "\xC3\xA8";
const VaarthaText_vowelsn_EE_4   = "\xC3\xAC";
const VaarthaText_vowelsn_EE_5   = "\xC3\xA6";
const VaarthaText_vowelsn_O_1    = "\xC3\xAD";
const VaarthaText_vowelsn_O_2    = "\xC3\xAF";
const VaarthaText_vowelsn_O_3    = "\xC3\xB1";
const VaarthaText_vowelsn_O_4    = "\xC3\xB3";
const VaarthaText_vowelsn_OO_1   = "\xC3\xAE";
const VaarthaText_vowelsn_OO_2   = "\xC3\xB0";
const VaarthaText_vowelsn_OO_3   = "\xC3\xB2";
const VaarthaText_vowelsn_OO_4   = "\xC3\xB4";
//VaarthaText.vowelsn_OO_5   = "\xC3\xA3\xC3\x96";
const VaarthaText_vowelsn_AU_1   = "\xC3\xB5";
const VaarthaText_vowelsn_AU_2   = "\xC3\xB7";
const VaarthaText_vowelsn_AU_3   = "\xC3\xB6";
const VaarthaText_vowelsn_AU_4   = "\xC3\xB9";
const VaarthaText_vowelsn_AU_5   = "\xC3\xB8";
const VaarthaText_vowelsn_AILEN_1 = "\x69";
const VaarthaText_vowelsn_AILEN_2 = "\x6A";
const VaarthaText_vowelsn_AILEN_3 = "\x6B";

////Special Combinations
const VaarthaText_combo_KHI_1    = "\xC3\x92";
const VaarthaText_combo_KHI_2    = "\x22";
const VaarthaText_combo_KHII     = "\x26";
const VaarthaText_combo_GI       = "\x54";
const VaarthaText_combo_GII      = "\x55";
const VaarthaText_combo_GHAA_1   = "\xC2\xA1\xC2\xB6\xC3\x96";
//VaarthaText.combo_GHAA_2   = "\x58\xC2\xB6\xC3\x96";
const VaarthaText_combo_GHI      = "\xC2\xA1\xC2\xB6\xC3\x8F\xC3\x95";
const VaarthaText_combo_GHII     = "\xC2\xA1\xC2\xB6\xC3\x94\xC3\x95";
const VaarthaText_combo_GHU      = "\xC2\xA1\xC2\xB6\xC3\xA1";
const VaarthaText_combo_GHUU     = "\xC2\xA1\xC2\xB6\xC3\xA2";
const VaarthaText_combo_GHPOLLU  = "\xC2\xA1\xC2\xB6\xC3\xBF\xC3\x95";

const VaarthaText_combo_CI       = "\x2A";
const VaarthaText_combo_CII      = "\x3C";
const VaarthaText_combo_CHI      = "\x2A\xC2\xB5";
const VaarthaText_combo_CHII     = "\x3C\xC2\xB5";
const VaarthaText_combo_JI       = "\x3E";
const VaarthaText_combo_JII      = "\x40";
const VaarthaText_combo_JU       = "\x56";
const VaarthaText_combo_JUU      = "\x57";
const VaarthaText_combo_JHI      = "\x4A\xE2\x80\x94";
const VaarthaText_combo_JHII     = "\x4B\xE2\x80\x94";
////VaarthaText.combo_JHPOLLU  = "\xC2\xAA\xC3\xBD\xE2\x80\x94";

const VaarthaText_combo_TTHI     = "\x4A\xC2\xB8";
const VaarthaText_combo_TTHII    = "\x4B\xC2\xB8";

const VaarthaText_combo_TI       = "\x41";
const VaarthaText_combo_TII      = "\x42";
const VaarthaText_combo_THI      = "\x43\xC2\xB7";
const VaarthaText_combo_THII     = "\x44\xC2\xB7";
const VaarthaText_combo_DI       = "\x43";
const VaarthaText_combo_DII      = "\x44";
const VaarthaText_combo_DHI      = "\x43\xC2\xB5";
const VaarthaText_combo_DHII     = "\x44\xC2\xB5";
const VaarthaText_combo_NI       = "\x45";
const VaarthaText_combo_NII      = "\x46";

//VaarthaText.combo_PI       = "\xC3\x8F";
//VaarthaText.combo_PII      = "\xC3\x94";
const VaarthaText_combo_BI       = "\x47";
const VaarthaText_combo_BII      = "\x48";
const VaarthaText_combo_BHI      = "\x47\xC2\xB5";
const VaarthaText_combo_BHII     = "\x48\xC2\xB5";
const VaarthaText_combo_MAA      = "\xC2\xAB\xC3\x96";
const VaarthaText_combo_MI       = "\x4E\xC3\x95";
const VaarthaText_combo_MII      = "\x4F\xC3\x95";
const VaarthaText_combo_MU       = "\xC2\xAB\xC3\xA1";
const VaarthaText_combo_MUU      = "\xC2\xAB\xC3\xA2";
const VaarthaText_combo_ME_1     = "\xC2\xA2\xC3\xA7\xC3\x95";
//VaarthaText.combo_ME_2     = "\xE2\x80\x9E\xC3\xA7\xC3\x95";
const VaarthaText_combo_MEE      = "\xC2\xA2\xC3\xA8\xC3\x95";
//VaarthaText.combo_MAI      = "\xE2\x80\x9E\xC3\xA7\xC3\x95\x69";
const VaarthaText_combo_MO       = "\xC2\xA2\xC3\xA7\xC3\xA1";
const VaarthaText_combo_MOO      = "\xC2\xA2\xC3\xA7\xC3\x96";
const VaarthaText_combo_MPOLLU   = "\xC2\xA2\xC3\xBE\xC3\x95";

const VaarthaText_combo_YAA      = "\xC2\xA7\xC3\x96";
const VaarthaText_combo_YI       = "\xC2\xA8\xC3\xA1";
const VaarthaText_combo_YII      = "\xC2\xA8\xC3\xA2";
const VaarthaText_combo_YU       = "\xC2\xA7\xC3\xA1";
const VaarthaText_combo_YUU      = "\xC2\xA7\xC3\xA2";
const VaarthaText_combo_YE       = "\xC2\xA7\xC3\xA7\xC3\x95";
const VaarthaText_combo_YEE      = "\xC2\xA7\xC3\xA8\xC3\x95";
const VaarthaText_combo_YAI      = "\xC2\xA7\xC3\xA7\x69\xC3\x95";
const VaarthaText_combo_YO       = "\xC2\xA7\xC3\xA7\xC3\xA1";
const VaarthaText_combo_YOO      = "\xC2\xA7\xC3\xA7\xC3\x96";
//VaarthaText.combo_YPOLLU_1 = "\xC2\xA7\xC3\xBC\xC3\x95";
//VaarthaText.combo_YPOLLU_2 = "\xC2\xA7\xC3\xBD\xC3\x95";

const VaarthaText_combo_RI       = "\x4A";
const VaarthaText_combo_RII      = "\x4B";
const VaarthaText_combo_LI       = "\x4C";
const VaarthaText_combo_LII      = "\x4D";
const VaarthaText_combo_VI       = "\x4E";
const VaarthaText_combo_VII      = "\x4F";
const VaarthaText_combo_SHI      = "\x50";
const VaarthaText_combo_SHII     = "\x51";
const VaarthaText_combo_LLI      = "\x52";
const VaarthaText_combo_LLII     = "\x53";

const VaarthaText_combo_SHRII    = "\x58";

//Vattulu
const VaarthaText_vattu_KA       = "\x5C";
const VaarthaText_vattu_KHA      = "\x5E";
const VaarthaText_vattu_GA       = "\x5F";
const VaarthaText_vattu_GHA      = "\x60";

const VaarthaText_vattu_CA       = "\x61";
const VaarthaText_vattu_CHA      = "\x61\xC2\xB4";
const VaarthaText_vattu_JA       = "\x62";
////VaarthaText.vattu_JHA      = "\x6D";
const VaarthaText_vattu_NYA_1    = "\x63";
const VaarthaText_vattu_NYA_2    = "\xC3\x91";

const VaarthaText_vattu_TTA      = "\x64";
const VaarthaText_vattu_TTHA     = "\x65";
const VaarthaText_vattu_DDA      = "\x66";
const VaarthaText_vattu_NNA      = "\x67";

const VaarthaText_vattu_TA_1     = "\x68";
//VaarthaText.vattu_TA_2     = "\x6B";
const VaarthaText_vattu_THA      = "\x6E";
const VaarthaText_vattu_DA       = "\x6C";
const VaarthaText_vattu_DHA      = "\x6D";
const VaarthaText_vattu_NA       = "\x6F";

const VaarthaText_vattu_PA       = "\x70";
const VaarthaText_vattu_PHA      = "\x70\xC2\xB4";
const VaarthaText_vattu_BA       = "\x73";
const VaarthaText_vattu_BHA      = "\x73\xC2\xB4";
const VaarthaText_vattu_MA       = "\x74";

const VaarthaText_vattu_YA       = "\x75";
const VaarthaText_vattu_RA_1     = "\x76";
//VaarthaText.vattu_RA_2     = "\xE2\x80\x9C";
//VaarthaText.vattu_RA_3     = "\x77";
const VaarthaText_vattu_LA       = "\x78";
const VaarthaText_vattu_VA       = "\x79";
const VaarthaText_vattu_SHA      = "\x7A";
const VaarthaText_vattu_SSA_1    = "\x7B";
//VaarthaText.vattu_SSA_2    = "\xC2\xA5";
const VaarthaText_vattu_SSA_3    = "\x7E";
const VaarthaText_vattu_SA       = "\x71";
const VaarthaText_vattu_HA       = "\x7C";
const VaarthaText_vattu_LLA      = "\x7D";
//VaarthaText.vattu_RRA      = "\xC3\x84";

//Conjuncts
const VaarthaText_vattu_PU       = "\x72";
//VaarthaText.vattu_TRA      = "\x59";
//VaarthaText.vattu_TTRA     = "\x5A";

//Matches ASCII
//VaarthaText.EXCLAM         = "\x21";
//VaarthaText.QTSINGLE       = "\x27";
//VaarthaText.PARENLEFT      = "\x28";
//VaarthaText.PARENRIGT      = "\x29";
//VaarthaText.PLUS           = "\x2B";
//VaarthaText.COMMA          = "\x2C";
//VaarthaText.PERIOD         = "\x2E";
//VaarthaText.SLASH          = "\x2F";
//VaarthaText.COLON          = "\x3A";
//VaarthaText.SEMICOLON      = "\x3B";
//VaarthaText.EQUALS         = "\x3D";
//VaarthaText.QUESTION       = "\x3F";

//VaarthaText.digit_ZERO     = "\x30";
//VaarthaText.digit_ONE      = "\x31";
//VaarthaText.digit_TWO      = "\x32";
//VaarthaText.digit_THREE    = "\x33";
//VaarthaText.digit_FOUR     = "\x34";
//VaarthaText.digit_FIVE     = "\x35";
//VaarthaText.digit_SIX      = "\x36";
//VaarthaText.digit_SEVEN    = "\x37";
//VaarthaText.digit_EIGHT    = "\x38";
//VaarthaText.digit_NINE     = "\x39";

//Does not match ASCII
//VaarthaText.DIVIDE         = "\x25";
//VaarthaText.MULTIPLY       = "\x24";
//VaarthaText.PIPE           = "\x49";
//VaarthaText.ASTERISK       = "\x5B";
//VaarthaText.PERCENT        = "\x5D";
const VaarthaText_HYPHEN         = "\xC3\x90";

//Kommu
const VaarthaText_misc_TICK_1    = "\xC3\x80";
const VaarthaText_misc_TICK_2    = "\xE2\x88\xAB";
const VaarthaText_misc_TICK_3    = "\xC2\xBE";
const VaarthaText_misc_TICK_4    = "\xC2\xBA";
const VaarthaText_misc_TICK_5    = "\xCE\xA9";
//VaarthaText.misc_TICK_6    = "\xC3\xA6";
//VaarthaText.misc_TICK_7    = "\xC3\xB8";
//VaarthaText.misc_TICK_8    = "\xC2\xA1";
const VaarthaText_misc_TICK_9    = "\xC2\xBF";
const VaarthaText_misc_TICK_10   = "\xC2\xB9";
const VaarthaText_misc_TICK_11   = "\xC2\xBB";
const VaarthaText_misc_TICK_12   = "\xC2\xBC";
const VaarthaText_misc_TICK_13   = "\xC2\xBD";
const VaarthaText_misc_TICK_14   = "\xC3\x81";

const VaarthaText_misc_UNKNOWN_1 = "\x23";
const VaarthaText_misc_UNKNOWN_2 = "\x2D";
const VaarthaText_misc_UNKNOWN_3 = "\xC3\x8A";

//VaarthaText.misc_vattu_1   = "\xC2\xB4";               //This seems to be for vattulu
//VaarthaText.misc_vattu_2   = "\xC2\xB5";               //This seems to be for consonants
//VaarthaText.misc_vattu_3   = "\xC2\xB6";               //Gha, pha etc

//VaarthaText.extra_HYPHEN   = "\xC3\x90";
////VaarthaText.extra_QTSINGLE = "\xC3\x91";

}

$VaarthaText_toPadma = array();

$VaarthaText_toPadma[VaarthaText::VaarthaText_candrabindu] = Padma::Padma_candrabindu;
$VaarthaText_toPadma[VaarthaText::VaarthaText_visarga]  = Padma::Padma_visarga;
//VaarthaText.toPadma[VaarthaText.virama_1] = Padma::Padma_syllbreak;
$VaarthaText_toPadma[VaarthaText::VaarthaText_virama_2] = Padma::Padma_syllbreak;
$VaarthaText_toPadma[VaarthaText::VaarthaText_virama_3] = Padma::Padma_syllbreak;
$VaarthaText_toPadma[VaarthaText::VaarthaText_virama_4] = Padma::Padma_syllbreak;
$VaarthaText_toPadma[VaarthaText::VaarthaText_virama_5] = Padma::Padma_syllbreak;
$VaarthaText_toPadma[VaarthaText::VaarthaText_virama_6] = Padma::Padma_syllbreak;
$VaarthaText_toPadma[VaarthaText::VaarthaText_virama_7] = Padma::Padma_syllbreak;
$VaarthaText_toPadma[VaarthaText::VaarthaText_virama_8] = Padma::Padma_syllbreak;
$VaarthaText_toPadma[VaarthaText::VaarthaText_anusvara] = Padma::Padma_anusvara;

//VaarthaText.toPadma[VaarthaText.vowel_A_1] = Padma::Padma_vowel_A;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowel_A_2] = Padma::Padma_vowel_A;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowel_AA_1] = Padma::Padma_vowel_AA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowel_AA_2] = Padma::Padma_vowel_AA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowel_I_1] = Padma::Padma_vowel_I;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowel_I_2] = Padma::Padma_vowel_I;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowel_II_1] = Padma::Padma_vowel_II;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowel_II_2] = Padma::Padma_vowel_II;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowel_U_1] = Padma::Padma_vowel_U;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowel_U_2] = Padma::Padma_vowel_U;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowel_UU_1] = Padma::Padma_vowel_UU;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowel_UU_2] = Padma::Padma_vowel_UU;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowel_R] = Padma::Padma_vowel_R;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowel_RR] = Padma::Padma_vowel_RR;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowel_E_1] = Padma::Padma_vowel_E;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowel_E_2] = Padma::Padma_vowel_E;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowel_EE_1] = Padma::Padma_vowel_EE;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowel_EE_2] = Padma::Padma_vowel_EE;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowel_AI_1] = Padma::Padma_vowel_AI;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowel_AI_2] = Padma::Padma_vowel_AI;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowel_O_1] = Padma::Padma_vowel_O;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowel_O_2] = Padma::Padma_vowel_O;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowel_OO_1] = Padma::Padma_vowel_OO;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowel_OO_2] = Padma::Padma_vowel_OO;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowel_AU_1] = Padma::Padma_vowel_AU;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowel_AU_2] = Padma::Padma_vowel_AU;

$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_KA_1] = Padma::Padma_consnt_KA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_KA_2] = Padma::Padma_consnt_KA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_KA_3] = Padma::Padma_consnt_KA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_KHA_1] = Padma::Padma_consnt_KHA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_KHA_2] = Padma::Padma_consnt_KHA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_GA] = Padma::Padma_consnt_GA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_GHA] = Padma::Padma_consnt_GHA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_NGA] = Padma::Padma_consnt_NGA;

$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_CA] = Padma::Padma_consnt_CA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_CHA] = Padma::Padma_consnt_CHA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_JA_1] = Padma::Padma_consnt_JA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_JA_2] = Padma::Padma_consnt_JA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_JHA] = Padma::Padma_consnt_JHA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_NYA] = Padma::Padma_consnt_NYA;

$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_TTA_1] = Padma::Padma_consnt_TTA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_TTA_2] = Padma::Padma_consnt_TTA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_TTA_3] = Padma::Padma_consnt_TTA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_TTA_4] = Padma::Padma_consnt_TTA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_TTA_5] = Padma::Padma_consnt_TTA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_TTA_6] = Padma::Padma_consnt_TTA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_TTHA] = Padma::Padma_consnt_TTHA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_DDA_1] = Padma::Padma_consnt_DDA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_DDA_2] = Padma::Padma_consnt_DDA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_DDHA_1] = Padma::Padma_consnt_DDHA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_DDHA_2] = Padma::Padma_consnt_DDHA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_NNA] = Padma::Padma_consnt_NNA;

$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_TA_1] = Padma::Padma_consnt_TA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_TA_2] = Padma::Padma_consnt_TA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_THA_1] = Padma::Padma_consnt_THA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_THA_2] = Padma::Padma_consnt_THA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_DA_1] = Padma::Padma_consnt_DA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_DA_2] = Padma::Padma_consnt_DA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_DHA_1] = Padma::Padma_consnt_DHA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_DHA_2] = Padma::Padma_consnt_DHA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_NA_1] = Padma::Padma_consnt_NA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_NA_2] = Padma::Padma_consnt_NA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_NA_3] = Padma::Padma_consnt_NA;

$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_PA_1] = Padma::Padma_consnt_PA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_PA_2] = Padma::Padma_consnt_PA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_PHA_1]  = Padma::Padma_consnt_PHA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_PHA_2]  = Padma::Padma_consnt_PHA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_BA_1] = Padma::Padma_consnt_BA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_BA_2] = Padma::Padma_consnt_BA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_BHA]  = Padma::Padma_consnt_BHA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_MA_1] = Padma::Padma_consnt_MA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_MA_2] = Padma::Padma_consnt_MA;

//VaarthaText.toPadma[VaarthaText.consnt_YA_1] = Padma::Padma_consnt_YA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_YA_2] = Padma::Padma_consnt_YA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_RA] = Padma::Padma_consnt_RA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_LA_1] = Padma::Padma_consnt_LA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_LA_2] = Padma::Padma_consnt_LA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_VA_1] = Padma::Padma_consnt_VA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_VA_2] = Padma::Padma_consnt_VA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_SHA] = Padma::Padma_consnt_SHA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_SSA_1] = Padma::Padma_consnt_SSA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_SSA_2] = Padma::Padma_consnt_SSA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_SA_1] = Padma::Padma_consnt_SA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_SA_2] = Padma::Padma_consnt_SA;

$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_HA] = Padma::Padma_consnt_HA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_LLA] = Padma::Padma_consnt_LLA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_consnt_RRA] = Padma::Padma_consnt_RRA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_conjct_KSHA] = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA;

//Gunintamulu
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_AA_1]  = Padma::Padma_vowelsn_AA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_AA_2]  = Padma::Padma_vowelsn_AA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_AA_3]  = Padma::Padma_vowelsn_AA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_AA_4]  = Padma::Padma_vowelsn_AA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_AA_5]  = Padma::Padma_vowelsn_AA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_AA_6]  = Padma::Padma_vowelsn_AA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_AA_7]  = Padma::Padma_vowelsn_AA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_AA_8]  = Padma::Padma_vowelsn_AA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_I_1]   = Padma::Padma_vowelsn_I;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_I_2]   = Padma::Padma_vowelsn_I;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_I_3]   = Padma::Padma_vowelsn_I;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_II_1]  = Padma::Padma_vowelsn_II;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_II_2]  = Padma::Padma_vowelsn_II;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_II_3]  = Padma::Padma_vowelsn_II;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_U_1]   = Padma::Padma_vowelsn_U;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_U_2]   = Padma::Padma_vowelsn_U;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_U_3]   = Padma::Padma_vowelsn_U;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_U_4]   = Padma::Padma_vowelsn_U;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_U_5]   = Padma::Padma_vowelsn_U;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_U_6]   = Padma::Padma_vowelsn_U;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_U_7]   = Padma::Padma_vowelsn_U;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_UU_1]  = Padma::Padma_vowelsn_UU;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_UU_2]  = Padma::Padma_vowelsn_UU;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_UU_3]  = Padma::Padma_vowelsn_UU;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_UU_4]  = Padma::Padma_vowelsn_UU;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_UU_5]  = Padma::Padma_vowelsn_UU;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_UU_6]  = Padma::Padma_vowelsn_UU;
//VaarthaText.toPadma[VaarthaText.vowelsn_UU_7]  = Padma::Padma_vowelsn_UU;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_R_1]   = Padma::Padma_vowelsn_R;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_R_2]   = Padma::Padma_vowelsn_R;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_RR_1]  = Padma::Padma_vowelsn_RR;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_RR_2]  = Padma::Padma_vowelsn_RR;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_E_1]   = Padma::Padma_vowelsn_E;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_E_2]   = Padma::Padma_vowelsn_E;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_E_3]   = Padma::Padma_vowelsn_E;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_E_4]   = Padma::Padma_vowelsn_E;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_E_5]   = Padma::Padma_vowelsn_E;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_EE_1]  = Padma::Padma_vowelsn_EE;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_EE_2]  = Padma::Padma_vowelsn_EE;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_EE_3]  = Padma::Padma_vowelsn_EE;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_EE_4]  = Padma::Padma_vowelsn_EE;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_EE_5]  = Padma::Padma_vowelsn_EE;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_O_1]   = Padma::Padma_vowelsn_O;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_O_2]   = Padma::Padma_vowelsn_O;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_O_3]   = Padma::Padma_vowelsn_O;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_O_4]   = Padma::Padma_vowelsn_O;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_OO_1]  = Padma::Padma_vowelsn_OO;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_OO_2]  = Padma::Padma_vowelsn_OO;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_OO_3]  = Padma::Padma_vowelsn_OO;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_OO_4]  = Padma::Padma_vowelsn_OO;
//VaarthaText.toPadma[VaarthaText.vowelsn_OO_5]  = Padma::Padma_vowelsn_OO;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_AU_1]  = Padma::Padma_vowelsn_AU;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_AU_2]  = Padma::Padma_vowelsn_AU;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_AU_3]  = Padma::Padma_vowelsn_AU;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_AU_4]  = Padma::Padma_vowelsn_AU;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_AU_5]  = Padma::Padma_vowelsn_AU;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_AILEN_1] = Padma::Padma_vowelsn_AILEN;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_AILEN_2] = Padma::Padma_vowelsn_AILEN;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vowelsn_AILEN_3] = Padma::Padma_vowelsn_AILEN;

//Special Combinations
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_KHI_1]     = Padma::Padma_consnt_KHA . Padma::Padma_vowelsn_I;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_KHI_2]     = Padma::Padma_consnt_KHA . Padma::Padma_vowelsn_I;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_KHII]    = Padma::Padma_consnt_KHA . Padma::Padma_vowelsn_II;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_GI]      = Padma::Padma_consnt_GA . Padma::Padma_vowelsn_I;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_GII]     = Padma::Padma_consnt_GA . Padma::Padma_vowelsn_II;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_GHAA_1]  = Padma::Padma_consnt_GHA . Padma::Padma_vowelsn_AA;
//VaarthaText.toPadma[VaarthaText.combo_GHAA_2]  = Padma::Padma_consnt_GHA . Padma::Padma_vowelsn_AA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_GHI]     = Padma::Padma_consnt_GHA . Padma::Padma_vowelsn_I;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_GHII]    = Padma::Padma_consnt_GHA . Padma::Padma_vowelsn_II;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_GHU]     = Padma::Padma_consnt_GHA . Padma::Padma_vowelsn_U;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_GHUU]    = Padma::Padma_consnt_GHA . Padma::Padma_vowelsn_UU;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_GHPOLLU] = Padma::Padma_consnt_GHA . Padma::Padma_syllbreak;

$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_CI]      = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_I;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_CII]     = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_II;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_CHI]     = Padma::Padma_consnt_CHA . Padma::Padma_vowelsn_I;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_CHII]    = Padma::Padma_consnt_CHA . Padma::Padma_vowelsn_II;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_JI]      = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_I;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_JII]     = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_II;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_JU]      = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_U;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_JUU]     = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_UU;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_JHI]     = Padma::Padma_consnt_JHA . Padma::Padma_vowelsn_I;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_JHII]    = Padma::Padma_consnt_JHA . Padma::Padma_vowelsn_II;
//VaarthaText.toPadma[VaarthaText.combo_JHPOLLU] = Padma::Padma_consnt_JHA . Padma::Padma_syllbreak;

$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_TTHI]    = Padma::Padma_consnt_TTHA . Padma::Padma_vowelsn_I;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_TTHII]   = Padma::Padma_consnt_TTHA . Padma::Padma_vowelsn_II;

$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_TI]      = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_I;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_TII]     = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_II;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_THI]     = Padma::Padma_consnt_THA . Padma::Padma_vowelsn_I;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_THII]    = Padma::Padma_consnt_THA . Padma::Padma_vowelsn_II;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_DI]      = Padma::Padma_consnt_DA . Padma::Padma_vowelsn_I;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_DII]     = Padma::Padma_consnt_DA . Padma::Padma_vowelsn_II;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_DHI]     = Padma::Padma_consnt_DHA . Padma::Padma_vowelsn_I;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_DHII]    = Padma::Padma_consnt_DHA . Padma::Padma_vowelsn_II;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_NI]      = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_I;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_NII]     = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_II;

//VaarthaText.toPadma[VaarthaText.combo_PI]      = Padma::Padma_consnt_PA . Padma::Padma_vowelsn_I;
//VaarthaText.toPadma[VaarthaText.combo_PII]     = Padma::Padma_consnt_PA . Padma::Padma_vowelsn_II;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_BI]      = Padma::Padma_consnt_BA . Padma::Padma_vowelsn_I;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_BII]     = Padma::Padma_consnt_BA . Padma::Padma_vowelsn_II;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_BHI]     = Padma::Padma_consnt_BHA . Padma::Padma_vowelsn_I;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_BHII]    = Padma::Padma_consnt_BHA . Padma::Padma_vowelsn_II;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_MAA]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_AA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_MI]      = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_I;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_MII]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_II;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_MU]      = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_U;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_MUU]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_UU;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_ME_1]    = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_E;
//VaarthaText.toPadma[VaarthaText.combo_ME_2]    = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_E;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_MEE]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_EE;
//VaarthaText.toPadma[VaarthaText.combo_MAI]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_AI;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_MO]      = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_O;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_MOO]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_OO;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_MPOLLU]  = Padma::Padma_consnt_MA . Padma::Padma_syllbreak;

$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_YAA]     = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_AA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_YI]      = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_I;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_YII]     = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_II;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_YU]      = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_U;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_YUU]     = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_UU;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_YE]      = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_E;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_YEE]     = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_EE;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_YAI]     = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_AI;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_YO]      = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_O;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_YOO]     = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_OO;
//VaarthaText.toPadma[VaarthaText.combo_YPOLLU_1]= Padma::Padma_consnt_YA . Padma::Padma_syllbreak;
//VaarthaText.toPadma[VaarthaText.combo_YPOLLU_2]= Padma::Padma_consnt_YA . Padma::Padma_syllbreak;

$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_RI]      = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_I;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_RII]     = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_II;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_LI]      = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_I;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_LII]     = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_II;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_VI]      = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_I;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_VII]     = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_II;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_SHI]     = Padma::Padma_consnt_SHA . Padma::Padma_vowelsn_I;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_SHII]    = Padma::Padma_consnt_SHA . Padma::Padma_vowelsn_II;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_LLI]     = Padma::Padma_consnt_LLA . Padma::Padma_vowelsn_I;
$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_LLII]    = Padma::Padma_consnt_LLA . Padma::Padma_vowelsn_II;

$VaarthaText_toPadma[VaarthaText::VaarthaText_combo_SHRII]   = Padma::Padma_consnt_SHA . Padma::Padma_vattu_RA . Padma::Padma_vowelsn_II;

//Vattulu
$VaarthaText_toPadma[VaarthaText::VaarthaText_vattu_KA]      = Padma::Padma_vattu_KA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vattu_KHA]     = Padma::Padma_vattu_KHA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vattu_GA]      = Padma::Padma_vattu_GA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vattu_GHA]     = Padma::Padma_vattu_GHA;

$VaarthaText_toPadma[VaarthaText::VaarthaText_vattu_CA]      = Padma::Padma_vattu_CA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vattu_CHA]     = Padma::Padma_vattu_CHA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vattu_JA]      = Padma::Padma_vattu_JA;
//VaarthaText.toPadma[VaarthaText.vattu_JHA]     = Padma::Padma_vattu_JHA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vattu_NYA_1]   = Padma::Padma_vattu_NYA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vattu_NYA_2]   = Padma::Padma_vattu_NYA;

$VaarthaText_toPadma[VaarthaText::VaarthaText_vattu_TTA]     = Padma::Padma_vattu_TTA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vattu_TTHA]    = Padma::Padma_vattu_TTHA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vattu_DDA]     = Padma::Padma_vattu_DDA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vattu_NNA]     = Padma::Padma_vattu_NNA;

$VaarthaText_toPadma[VaarthaText::VaarthaText_vattu_TA_1]    = Padma::Padma_vattu_TA;
//VaarthaText.toPadma[VaarthaText.vattu_TA_2]    = Padma::Padma_vattu_TA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vattu_THA]     = Padma::Padma_vattu_THA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vattu_DA]      = Padma::Padma_vattu_DA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vattu_DHA]     = Padma::Padma_vattu_DHA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vattu_NA]      = Padma::Padma_vattu_NA;

$VaarthaText_toPadma[VaarthaText::VaarthaText_vattu_PA]      = Padma::Padma_vattu_PA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vattu_PHA]     = Padma::Padma_vattu_PHA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vattu_BA]      = Padma::Padma_vattu_BA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vattu_BHA]     = Padma::Padma_vattu_BHA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vattu_MA]      = Padma::Padma_vattu_MA;

$VaarthaText_toPadma[VaarthaText::VaarthaText_vattu_YA]      = Padma::Padma_vattu_YA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vattu_RA_1]    = Padma::Padma_vattu_RA;
//VaarthaText.toPadma[VaarthaText.vattu_RA_2]    = Padma::Padma_vattu_RA;
//VaarthaText.toPadma[VaarthaText.vattu_RA_3]    = Padma::Padma_vattu_RA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vattu_LA]      = Padma::Padma_vattu_LA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vattu_VA]      = Padma::Padma_vattu_VA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vattu_SHA]     = Padma::Padma_vattu_SHA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vattu_SSA_1]   = Padma::Padma_vattu_SSA;
//VaarthaText.toPadma[VaarthaText.vattu_SSA_2]   = Padma::Padma_vattu_SSA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vattu_SSA_3]   = Padma::Padma_vattu_SSA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vattu_SA]      = Padma::Padma_vattu_SA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vattu_HA]      = Padma::Padma_vattu_HA;
$VaarthaText_toPadma[VaarthaText::VaarthaText_vattu_LLA]     = Padma::Padma_vattu_LLA;
//VaarthaText.toPadma[VaarthaText.vattu_RRA]     = Padma::Padma_vattu_RRA;

//Conjuncts
$VaarthaText_toPadma[VaarthaText::VaarthaText_vattu_PU]      = Padma::Padma_vattu_PA . Padma::Padma_vowelsn_U;
//VaarthaText.toPadma[VaarthaText.vattu_TRA]     = Padma::Padma_vattu_TA . Padma::Padma_vattu_RA;
//VaarthaText.toPadma[VaarthaText.vattu_TTRA]    = Padma::Padma_vattu_TTA . Padma::Padma_vattu_RA;

//Miscellaneous(where it doesn't match ASCII representation)
//VaarthaText.toPadma[VaarthaText.extra_HYPHEN]   = VaarthaText::VaarthaText_HYPHEN;
//VaarthaText.toPadma[VaarthaText.extra_QTSINGLE] = VaarthaText::VaarthaText_QTSINGLE;
//VaarthaText.toPadma[VaarthaText.DIVIDE]         = "/"; 
//VaarthaText.toPadma[VaarthaText.MULTIPLY]       = "X";
//VaarthaText.toPadma[VaarthaText.PIPE]           = "|";
//VaarthaText.toPadma[VaarthaText.ASTERISK]       = "*";
//VaarthaText.toPadma[VaarthaText.PERCENT]        = "%";
$VaarthaText_toPadma[VaarthaText::VaarthaText_HYPHEN]         = "-";

$VaarthaText_redundantList = array();
$VaarthaText_redundantList[VaarthaText::VaarthaText_misc_TICK_1] = true;
$VaarthaText_redundantList[VaarthaText::VaarthaText_misc_TICK_2] = true;
$VaarthaText_redundantList[VaarthaText::VaarthaText_misc_TICK_3] = true;
$VaarthaText_redundantList[VaarthaText::VaarthaText_misc_TICK_4] = true;
$VaarthaText_redundantList[VaarthaText::VaarthaText_misc_TICK_5] = true;
//VaarthaText.redundantList[VaarthaText.misc_TICK_6] = true;
//VaarthaText.redundantList[VaarthaText.misc_TICK_7] = true;
//VaarthaText.redundantList[VaarthaText.misc_TICK_8] = true;
$VaarthaText_redundantList[VaarthaText::VaarthaText_misc_TICK_9] = true;
$VaarthaText_redundantList[VaarthaText::VaarthaText_misc_TICK_10] = true;
$VaarthaText_redundantList[VaarthaText::VaarthaText_misc_TICK_11] = true;
$VaarthaText_redundantList[VaarthaText::VaarthaText_misc_TICK_12] = true;
$VaarthaText_redundantList[VaarthaText::VaarthaText_misc_TICK_13] = true;
$VaarthaText_redundantList[VaarthaText::VaarthaText_misc_TICK_14] = true;
$VaarthaText_redundantList[VaarthaText::VaarthaText_misc_UNKNOWN_1] = true;
$VaarthaText_redundantList[VaarthaText::VaarthaText_misc_UNKNOWN_2] = true;
$VaarthaText_redundantList[VaarthaText::VaarthaText_misc_UNKNOWN_3] = true;

$VaarthaText_prefixList = array();
$VaarthaText_prefixList[VaarthaText::VaarthaText_vattu_RA_1]   = true;
//VaarthaText.prefixList[VaarthaText.vattu_RA_2]   = true;
//VaarthaText.prefixList[VaarthaText.vattu_RA_3]   = true;
$VaarthaText_prefixList[VaarthaText::VaarthaText_vowelsn_E_1]  = true;
//VaarthaText.prefixList[VaarthaText.vowelsn_E_2]  = true;
//VaarthaText.prefixList[VaarthaText.vowelsn_E_3]  = true;
$VaarthaText_prefixList[VaarthaText::VaarthaText_vowelsn_E_5]  = true;
//VaarthaText.prefixList[VaarthaText.vowelsn_E_4]  = true;
$VaarthaText_prefixList[VaarthaText::VaarthaText_vowelsn_EE_1] = true;
$VaarthaText_prefixList[VaarthaText::VaarthaText_vowelsn_EE_5] = true;
//VaarthaText.prefixList[VaarthaText.vowelsn_EE_3] = true;


$VaarthaText_overloadList = array();
$VaarthaText_overloadList[VaarthaText::VaarthaText_consnt_KA_1]   = true;
$VaarthaText_overloadList[VaarthaText::VaarthaText_consnt_CA]     = true;
$VaarthaText_overloadList[VaarthaText::VaarthaText_consnt_DDA_1]    = true;
$VaarthaText_overloadList[VaarthaText::VaarthaText_consnt_DDA_2]    = true;
$VaarthaText_overloadList[VaarthaText::VaarthaText_consnt_DA_1]     = true;
$VaarthaText_overloadList[VaarthaText::VaarthaText_consnt_DA_2]     = true;
$VaarthaText_overloadList[VaarthaText::VaarthaText_consnt_PA_1]   = true;
$VaarthaText_overloadList[VaarthaText::VaarthaText_consnt_PA_2]   = true;
$VaarthaText_overloadList[VaarthaText::VaarthaText_consnt_PHA_1]  = true;
$VaarthaText_overloadList[VaarthaText::VaarthaText_consnt_BA_1]   = true;
$VaarthaText_overloadList[VaarthaText::VaarthaText_consnt_BA_2]   = true;
//VaarthaText.overloadList[VaarthaText.consnt_YA_1]   = true;
$VaarthaText_overloadList[VaarthaText::VaarthaText_consnt_RA]     = true;
$VaarthaText_overloadList[VaarthaText::VaarthaText_consnt_VA_1]   = true;
$VaarthaText_overloadList[VaarthaText::VaarthaText_consnt_VA_2]   = true;
$VaarthaText_overloadList[VaarthaText::VaarthaText_vowelsn_R_1]   = true;
$VaarthaText_overloadList[VaarthaText::VaarthaText_vowelsn_R_2]   = true;
//VaarthaText.overloadList[VaarthaText.vowelsn_E_1]   = true;
$VaarthaText_overloadList[VaarthaText::VaarthaText_combo_CI]      = true;
$VaarthaText_overloadList[VaarthaText::VaarthaText_combo_CII]     = true;
$VaarthaText_overloadList[VaarthaText::VaarthaText_combo_DI]      = true;
$VaarthaText_overloadList[VaarthaText::VaarthaText_combo_DII]     = true;
$VaarthaText_overloadList[VaarthaText::VaarthaText_combo_BI]      = true;
$VaarthaText_overloadList[VaarthaText::VaarthaText_combo_BII]     = true;
$VaarthaText_overloadList[VaarthaText::VaarthaText_combo_VI]      = true;
$VaarthaText_overloadList[VaarthaText::VaarthaText_combo_VII]     = true;
$VaarthaText_overloadList[VaarthaText::VaarthaText_combo_RI]      = true;
$VaarthaText_overloadList[VaarthaText::VaarthaText_combo_RII]     = true;
$VaarthaText_overloadList[VaarthaText::VaarthaText_vattu_CA]      = true;
$VaarthaText_overloadList[VaarthaText::VaarthaText_vattu_DA]      = true;
$VaarthaText_overloadList[VaarthaText::VaarthaText_vattu_PA]      = true;
$VaarthaText_overloadList[VaarthaText::VaarthaText_vattu_BA]      = true;
//VaarthaText.overloadList["\x58\xC2\xB6\xC3\x8F"] = true;
//VaarthaText.overloadList["\x58\xC2\xB6\xC3\x94"] = true;
//VaarthaText.overloadList["\x58\xC2\xB6\xC3\xBD"] = true;
//VaarthaText.overloadList["\xC2\xAA\xC3\xBD"]       = true;
$VaarthaText_overloadList["\xE2\x80\x9E\xC3\xA3"]       = true;
$VaarthaText_overloadList["\xE2\x80\x9E\xC3\xA4"]       = true;
$VaarthaText_overloadList["\xE2\x80\x9E\xC3\xA7"]       = true;
$VaarthaText_overloadList["\xE2\x80\x9E\xC3\xA7\xC3\x95"] = true;
//VaarthaText.overloadList["\xE2\x80\x9E\xC3\xBE"]       = true;
//VaarthaText.overloadList["\xC2\xA6\xC3\x95"]       = true;
$VaarthaText_overloadList["\xC2\xA7\xC3\xA8"]       = true;
$VaarthaText_overloadList["\xC2\xA7\xC3\xA7"]       = true;
$VaarthaText_overloadList["\xC2\xA7\xC3\xA7\x69"] = true;
//VaarthaText.overloadList["\xC2\xA7\xC3\xBC"]       = true;
//VaarthaText.overloadList["\xC2\xA7\xC3\xBD"]       = true;
$VaarthaText_overloadList["\xC2\xA5\xC3\x95"]       = true;
$VaarthaText_overloadList["\xC2\xA2\xC3\xA7"]       = true;
$VaarthaText_overloadList["\xC2\xA2\xC3\xA8"]       = true;
$VaarthaText_overloadList["\xC2\xA2\xC3\xBE"]       = true;
$VaarthaText_overloadList["\xC2\xA7"]       = true;
$VaarthaText_overloadList["\xC2\xA1\xC2\xB6\xC3\x8F"]       = true;
$VaarthaText_overloadList["\xC2\xA1\xC2\xB6\xC3\x94"]       = true;
$VaarthaText_overloadList["\xC2\xA1\xC2\xB6\xC3\xBF"]       = true;

function VaarthaText_initialize()
{
    global $fontinfo;

    $fontinfo["vaarthatext"]["language"] = "Telugu";
    $fontinfo["vaarthatext"]["class"] = "VaarthaText";
}

?>
