<?php
/* ***** BEGIN LICENSE BLOCK ***** 
 *  This file is part of Padma
 *
 *  Padma is free software; you can redi$stribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.

 *  Padma is di$stributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with Padma; if not, write to the Free Software
 *  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * ***** END LICENSE BLOCK ***** */

class VikaasWebFont
{
function VikaasWebFont()
{
}

//The interface every dynamic font encoding should implement
var $maxLookupLen = 4;
var $fontFace     = "VikaasWebFont";
var $displayName  = "VikaasWebFont";
var $script       = Padma::Padma_script_TELUGU;

function lookup($str)
{
   global $VikaasWebFont_toPadma;
    if(array_key_exists($str,$VikaasWebFont_toPadma))
    return $VikaasWebFont_toPadma[$str];
   return false;
}

function isPrefixSymbol($str)
{
    global $VikaasWebFont_prefixList;
    return array_key_exists($str,$VikaasWebFont_prefixList);
    //return $VikaasWebFont_prefixList[$str];
}

function isOverloaded($str)
{
    global $VikaasWebFont_overloadList;
    return array_key_exists($str, $VikaasWebFont_overloadList);
    //return $VikaasWebFont_overloadList[$str] != null;
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

//\xC2\xB2 is used mostly for AA gunintam - unfortunately it is also used for writing HA, so it needs to be handled specially
function preprocessMessage($input)
{
   $output = "";
   $ctxt = 0;
   $input_len=utf8_strlen($input);
   for($i = 0; $i < $input_len; ++$i)
    {
      $cur=utf8_substr($input,$i,1);
        if (VikaasWebFont::isRedundant($cur))
            continue;
        if ($ctxt == 1)
        {
          if ($cur == VikaasWebFont::VikaasWebFont_vowelsn_AA_5)
           {
            $ctxt = 0;
            continue;
           }
          $val = VikaasWebFont::lookup($cur);
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
        else if ($cur == VikaasWebFont::VikaasWebFont_consnt_HA_1)
         $ctxt = 1;

       $output .= $cur;   
    }
    return $output;
}

function isRedundant($str)
{
    global $VikaasWebFont_redundantList;
      return array_key_exists($str, $VikaasWebFont_redundantList);
}



//Implementation details start here
//TODO :0098,00AD,00B6,00F6,

//Specials
const VikaasWebFont_candrabindu    = "\x22";
const VikaasWebFont_visarga        = "\x27";
const VikaasWebFont_virama_1       = "\x59";
const VikaasWebFont_virama_2       = "\x74";
const VikaasWebFont_virama_3       = "\xC2\x8E";
const VikaasWebFont_virama_4       = "\xC2\xB4";
const VikaasWebFont_virama_5       = "\xC3\x99";
const VikaasWebFont_virama_6       = "\xC3\xB9";
const VikaasWebFont_virama_7       = "\xC5\xBD";
const VikaasWebFont_anusvara       = "\x2B";

//Vowels
const VikaasWebFont_vowel_A        = "\x6E";
const VikaasWebFont_vowel_AA_1     = "\xC2\x80";
const VikaasWebFont_vowel_AA_2     = "\xE2\x82\xAC";
const VikaasWebFont_vowel_I_1      = "\xC2\x82";
const VikaasWebFont_vowel_I_2      = "\xE2\x80\x9A";
const VikaasWebFont_vowel_II_1     = "\xC2\x87";
const VikaasWebFont_vowel_II_2     = "\xE2\x80\xA1";
const VikaasWebFont_vowel_U_1      = "\xC2\x96";
const VikaasWebFont_vowel_U_2      = "\xE2\x80\x93";
const VikaasWebFont_vowel_UU       = "\x7D";
const VikaasWebFont_vowel_R_1      = "\xE2\x80\xB9\x54\x54";
const VikaasWebFont_vowel_R_2      = "\xC2\x8B\x54\x54";
const VikaasWebFont_vowel_RR_1     = "\xE2\x80\xB9\x54\xC3\x96";
const VikaasWebFont_vowel_RR_2     = "\xC2\x8B\x54\xC3\x96";
const VikaasWebFont_vowel_E        = "\x6D";
const VikaasWebFont_vowel_EE       = "\x40";
const VikaasWebFont_vowel_AI       = "\xC3\x97";
const VikaasWebFont_vowel_O        = "\xC3\xBF";
const VikaasWebFont_vowel_OO       = "\x7A";
const VikaasWebFont_vowel_AU       = "\x57";

//Consonants
const VikaasWebFont_consnt_KA_1    = "\xC2\xBF";
const VikaasWebFont_consnt_KA_2    = "\xC3\x85";
const VikaasWebFont_consnt_KHA_1   = "\x4B";
const VikaasWebFont_consnt_KHA_2   = "\x55";
const VikaasWebFont_consnt_GA      = "\x3E";
const VikaasWebFont_consnt_GHA_1   = "\x7C\xCB\x9C\x54";
const VikaasWebFont_consnt_GHA_2   = "\x7C\xC2\x98\x54";
const VikaasWebFont_consnt_NGA     = "\x76";

const VikaasWebFont_consnt_CA      = "\x23";
const VikaasWebFont_consnt_CHA_1   = "\x23\xC3\xB3";
const VikaasWebFont_consnt_CHA_2   = "\x23\xC3\x9B";
const VikaasWebFont_consnt_JA_1    = "\x43";
const VikaasWebFont_consnt_JA_2    = "\xC3\x88";
const VikaasWebFont_consnt_JHA     = "\x73\x61";
const VikaasWebFont_consnt_NYA     = "\x78";

const VikaasWebFont_consnt_TTA_1   = "\x66";
const VikaasWebFont_consnt_TTA_2   = "\x7B";
const VikaasWebFont_consnt_TTA_3   = "\xC2\xB3";
const VikaasWebFont_consnt_TTHA    = "\x73\xC3\x84";
const VikaasWebFont_consnt_DDA     = "\x26";
const VikaasWebFont_consnt_DDHA    = "\x26\xC3\xB3";
const VikaasWebFont_consnt_NNA     = "\x44";

const VikaasWebFont_consnt_TA      = "\xC3\x94";
const VikaasWebFont_consnt_THA_1   = "\x3C\xC2\xB8";
//const VikaasWebFont_consnt_THA_2   = "\u";
const VikaasWebFont_consnt_DA      = "\x3C";
const VikaasWebFont_consnt_DHA     = "\x3C\xC3\xB3";
const VikaasWebFont_consnt_NA_1    = "\x71";
const VikaasWebFont_consnt_NA_2    = "\x48";

const VikaasWebFont_consnt_PA_1    = "\x62";
//VikaasWebFont.consnt_PA_2    = "\x79";
const VikaasWebFont_consnt_PA_3    = "\x7C";
const VikaasWebFont_consnt_PHA_1   = "\x7C\xCB\x9C";
const VikaasWebFont_consnt_PHA_2   = "\x7C\xC2\x98";
const VikaasWebFont_consnt_PHA_3   = "\x62\xCB\x9C";
const VikaasWebFont_consnt_PHA_4   = "\x62\xC2\x98";
const VikaasWebFont_consnt_BA_1    = "\x75";
const VikaasWebFont_consnt_BA_2    = "\xC2\x8B";
const VikaasWebFont_consnt_BA_3    = "\xE2\x80\xB9";
const VikaasWebFont_consnt_BHA     = "\x75\xC3\xB3";
const VikaasWebFont_consnt_MA      = "\x65\x54";

const VikaasWebFont_consnt_YA_1    = "\x6A\x54";
//const VikaasWebFont_consnt_YA_2    = "\u";
const VikaasWebFont_consnt_RA      = "\x73";
const VikaasWebFont_consnt_LA_1    = "\x5C";
const VikaasWebFont_consnt_LA_2    = "\xC3\xBD";
const VikaasWebFont_consnt_VA_1    = "\x65";
const VikaasWebFont_consnt_VA_2    = "\x79";
const VikaasWebFont_consnt_SHA     = "\x58";
const VikaasWebFont_consnt_SSA_1   = "\x77";
const VikaasWebFont_consnt_SSA_2   = "\x63";
const VikaasWebFont_consnt_SA_1    = "\x64";
const VikaasWebFont_consnt_SA_2    = "\x6B";
const VikaasWebFont_consnt_HA_1    = "\x56";
const VikaasWebFont_consnt_LLA     = "\xC3\x9E";
const VikaasWebFont_consnt_RRA     = "\x69";
//const VikaasWebFont_conjct_KSHA    = "\u";

const VikaasWebFont_conjct_STR     = "\x67";
const VikaasWebFont_conjct_SSTTR   = "\x68";

//Gunintamulu
const VikaasWebFont_vowelsn_AA_1   = "\xC2\x86";
const VikaasWebFont_vowelsn_AA_2   = "\xC2\x90";
const VikaasWebFont_vowelsn_AA_3   = "\xC2\x91";
const VikaasWebFont_vowelsn_AA_4   = "\xC2\xB1";
const VikaasWebFont_vowelsn_AA_5   = "\xC2\xB2";
const VikaasWebFont_vowelsn_AA_6   = "\xC3\x8D";
const VikaasWebFont_vowelsn_AA_7   = "\xC3\xA4";
const VikaasWebFont_vowelsn_AA_8   = "\xC3\xA6";
const VikaasWebFont_vowelsn_AA_9   = "\xE2\x80\x98";
const VikaasWebFont_vowelsn_AA_10  = "\xE2\x80\xA0";
const VikaasWebFont_vowelsn_AA_11  = "\x41";
const VikaasWebFont_vowelsn_I_1    = "\xC2\x8D";
const VikaasWebFont_vowelsn_I_2    = "\xC2\xBE";
const VikaasWebFont_vowelsn_I_3    = "\xC3\xAC";
const VikaasWebFont_vowelsn_II_1   = "\xC2\x9E";
const VikaasWebFont_vowelsn_II_2   = "\xC2\xA1";
const VikaasWebFont_vowelsn_II_3   = "\xC3\x93";
const VikaasWebFont_vowelsn_II_4   = "\xC5\xBE";
const VikaasWebFont_vowelsn_U_1    = "\x51";
const VikaasWebFont_vowelsn_U_2    = "\x54";
const VikaasWebFont_vowelsn_U_3    = "\xC2\x94";
const VikaasWebFont_vowelsn_U_4    = "\xC2\x97";
const VikaasWebFont_vowelsn_U_5    = "\xC2\xA7";
const VikaasWebFont_vowelsn_U_6    = "\xC3\x9A";
const VikaasWebFont_vowelsn_U_7    = "\xE2\x80\x9D";
const VikaasWebFont_vowelsn_U_8    = "\xE2\x80\x94";
const VikaasWebFont_vowelsn_UU_1   = "\x4C";
const VikaasWebFont_vowelsn_UU_2   = "\x4F";
const VikaasWebFont_vowelsn_UU_3   = "\x50";
const VikaasWebFont_vowelsn_UU_4   = "\x53";
const VikaasWebFont_vowelsn_UU_5   = "\xC3\x96";
const VikaasWebFont_vowelsn_R_1    = "\x7F";
const VikaasWebFont_vowelsn_R_2    = "\xC2\x8F";
//const VikaasWebFont_vowelsn_RR     = "\u";
const VikaasWebFont_vowelsn_E_1    = "\xC2\x99";
const VikaasWebFont_vowelsn_E_2    = "\xC3\x82";
const VikaasWebFont_vowelsn_E_3    = "\xC3\x89";
const VikaasWebFont_vowelsn_E_4    = "\xC3\xA8";
const VikaasWebFont_vowelsn_E_5    = "\xC3\xAE";
const VikaasWebFont_vowelsn_E_6    = "\xE2\x84\xA2";
const VikaasWebFont_vowelsn_EE_1   = "\xC2\x9D";
const VikaasWebFont_vowelsn_EE_2   = "\xC2\xB9";
const VikaasWebFont_vowelsn_EE_3   = "\xC3\xA2";
const VikaasWebFont_vowelsn_EE_4   = "\xC3\xB1";
const VikaasWebFont_vowelsn_EE_5   = "\xC3\xBB";
const VikaasWebFont_vowelsn_O_1    = "\x3D";
const VikaasWebFont_vowelsn_O_2    = "\xC2\xA4";
const VikaasWebFont_vowelsn_O_3    = "\xC3\xB5";
//const VikaasWebFont_vowelsn_O_4    = "\u";
const VikaasWebFont_vowelsn_OO_1   = "\xC3\x83";
const VikaasWebFont_vowelsn_OO_2   = "\xC3\x8B";
const VikaasWebFont_vowelsn_OO_3   = "\xC3\xBE";
//const VikaasWebFont_vowelsn_OO_4   = "\u";
//const VikaasWebFont_vowelsn_OO_5   = "\u";
const VikaasWebFont_vowelsn_AU_1   = "\xC2\x85";
const VikaasWebFont_vowelsn_AU_2   = "\xC2\x9A";
const VikaasWebFont_vowelsn_AU_3   = "\xC3\xA5";
const VikaasWebFont_vowelsn_AU_4   = "\xC3\xAA";
const VikaasWebFont_vowelsn_AU_5   = "\xC3\xB2";
const VikaasWebFont_vowelsn_AU_6   = "\xC5\xA1";
const VikaasWebFont_vowelsn_AU_7   = "\xE2\x80\xA6";
const VikaasWebFont_vowelsn_AILEN_1 = "\xC2\xAE";
const VikaasWebFont_vowelsn_AILEN_2 = "\xC3\x95";
const VikaasWebFont_vowelsn_AILEN_3 = "\xC3\xAD";

//Special Combinations
const VikaasWebFont_combo_KHI      = "\xC3\x8F";
const VikaasWebFont_combo_KHII     = "\x46";
const VikaasWebFont_combo_GI       = "\xC3\x90";
const VikaasWebFont_combo_GII      = "\x5E";
const VikaasWebFont_combo_GHAA     = "\x7C\xC2\x98\xC3\x96";
//const VikaasWebFont_combo_GHAA_2   = "\u";
const VikaasWebFont_combo_GHI_1    = "\x7C\xC2\x98\xC2\xBE\x54";
const VikaasWebFont_combo_GHI_2    = "\x7C\xCB\x9C\xC2\xBE\x54";
const VikaasWebFont_combo_GHII     = "\x7C\xC2\x98\xC3\x93\x54";
//const VikaasWebFont_combo_GHU      = "\u";
//const VikaasWebFont_combo_GHUU     = "\u";
//const VikaasWebFont_combo_GHPOLLU  = "\u";

const VikaasWebFont_combo_CI       = "\xC2\xBA";
const VikaasWebFont_combo_CII      = "\x4E";
const VikaasWebFont_combo_CHI      = "\xC2\xBA\xC3\xB3";
const VikaasWebFont_combo_CHII     = "\x4E\xC3\xB3";
const VikaasWebFont_combo_JI_1     = "\xC2\x9B";
const VikaasWebFont_combo_JI_2     = "\xE2\x80\xBA";
const VikaasWebFont_combo_JII      = "\x4A";
const VikaasWebFont_combo_JU       = "\x45";
const VikaasWebFont_combo_JUU      = "\x70";
const VikaasWebFont_combo_JHI      = "\x5D\x61";
const VikaasWebFont_combo_JHII     = "\xC2\xAF\x61";
//const VikaasWebFont_combo_JHPOLLU  = "\u";

//const VikaasWebFont_combo_TTHI     = "\u";
//const VikaasWebFont_combo_TTHII    = "\u";

const VikaasWebFont_combo_TI       = "\xC3\x9C";
const VikaasWebFont_combo_TII      = "\x72";
//const VikaasWebFont_combo_THI      = "\u";
//const VikaasWebFont_combo_THII     = "\u";
const VikaasWebFont_combo_DI       = "\x7E";
const VikaasWebFont_combo_DII      = "\x42";
const VikaasWebFont_combo_DHI      = "\x7E\xC3\xB3";
const VikaasWebFont_combo_DHII     = "\x42\xC3\xB3";
const VikaasWebFont_combo_NI_1     = "\xC2\x93";
const VikaasWebFont_combo_NI_2     = "\xE2\x80\x9C";
const VikaasWebFont_combo_NII      = "\xC3\xBA";

const VikaasWebFont_combo_BAA      = "\x75\xC2\xB2";
const VikaasWebFont_combo_BOO      = "\x75\xC3\x8B";
const VikaasWebFont_combo_BI       = "\x5F";
const VikaasWebFont_combo_BII      = "\x3B";
const VikaasWebFont_combo_BHI      = "\x5F\xC3\xB3";
const VikaasWebFont_combo_BHII     = "\x3B\xC3\xB3";
const VikaasWebFont_combo_MAA      = "\x65\xC3\x96";
const VikaasWebFont_combo_MI       = "\x24\x54";
const VikaasWebFont_combo_MII_1    = "\x4D\x54";
const VikaasWebFont_combo_MII_2    = "\x24\x4C";
//const VikaasWebFont_combo_MU       = "\u";
//const VikaasWebFont_combo_MUU      = "\u";
const VikaasWebFont_combo_VE       = "\x79\xC3\xAE";
const VikaasWebFont_combo_VEE      = "\x79\xC3\xBB";
const VikaasWebFont_combo_ME_1     = "\x79\xC3\xAE\x54";
//const VikaasWebFont_combo_ME_2     = "\x6A\xC3\xAE\x54";
const VikaasWebFont_combo_MEE      = "\x79\xC3\xBB\x54";
//const VikaasWebFont_combo_MAI      = "\u";
//const VikaasWebFont_combo_MO       = "\u";
const VikaasWebFont_combo_MOO      = "\x79\xC3\xAE\xC3\x96";
const VikaasWebFont_combo_MPOLLU   = "\x79\xC5\xBD\x54";

const VikaasWebFont_combo_YAA      = "\x6A\xC3\x96";
const VikaasWebFont_combo_YI       = "\x73\x54\x54";
const VikaasWebFont_combo_YII_1    = "\x73\x54\xC3\x96";
const VikaasWebFont_combo_YII_2    = "\x73\x54\x54\xC2\xB1";
const VikaasWebFont_combo_YE       = "\x6A\xC3\xAE\x54";
const VikaasWebFont_combo_YEE      = "\x6A\xC3\xBB\x54";
const VikaasWebFont_combo_YAI      = "\x6A\xC3\xAE\xC2\xAE\x54";
//const VikaasWebFont_combo_YO       = "\u";
const VikaasWebFont_combo_YOO      = "\x6A\xC3\xAE\xC3\x96";
const VikaasWebFont_combo_YPOLLU_1 = "\x6A\x59\x54";
//const VikaasWebFont_combo_YPOLLU_2 = "\u";
const VikaasWebFont_combo_RI       = "\x5D";
const VikaasWebFont_combo_RII      = "\xC2\xAF";
const VikaasWebFont_combo_LI       = "\x2A";
const VikaasWebFont_combo_LII      = "\xC2\xA9";
const VikaasWebFont_combo_VI       = "\x24";
const VikaasWebFont_combo_VII      = "\x4D";
const VikaasWebFont_combo_SHI      = "\xC2\xA5";
const VikaasWebFont_combo_SHII     = "\x6F";
const VikaasWebFont_combo_LLI      = "\x5B";
const VikaasWebFont_combo_LLII     = "\xC2\xB0";

const VikaasWebFont_combo_SHRII    = "\x6C";
const VikaasWebFont_combo_HOO      = "\xC2\xAC";

//Vattulu
const VikaasWebFont_vattu_KA       = "\xC3\x98";
const VikaasWebFont_vattu_KHA      = "\xC2\x89";
const VikaasWebFont_vattu_GA       = "\x5A";
const VikaasWebFont_vattu_GHA      = "\xC3\xA9";

const VikaasWebFont_vattu_CA       = "\xC3\x8C";
const VikaasWebFont_vattu_CHA      = "\xC3\x8C\xC3\x9B";
const VikaasWebFont_vattu_JA       = "\xC2\xA8";
//const VikaasWebFont_vattu_JHA      = "\u";
const VikaasWebFont_vattu_NYA      = "\xC3\xA3";

const VikaasWebFont_vattu_TTA      = "\xC2\xBC";
const VikaasWebFont_vattu_TTHA     = "\xC3\xB7";
const VikaasWebFont_vattu_DDA      = "\xC2\xA6";
const VikaasWebFont_vattu_NNA_1    = "\xC2\x92";
const VikaasWebFont_vattu_NNA_2    = "\xE2\x80\x99";

const VikaasWebFont_vattu_TA_1     = "\xC3\xAF";
//const VikaasWebFont_vattu_TA_2     = "\u";
const VikaasWebFont_vattu_THA_1    = "\xC2\x9C";
const VikaasWebFont_vattu_THA_2    = "\xC5\x93";
const VikaasWebFont_vattu_DA       = "\xC3\x9D";
const VikaasWebFont_vattu_DHA      = "\xC3\x86";
const VikaasWebFont_vattu_NA_1     = "\xC2\x95";
const VikaasWebFont_vattu_NA_2     = "\xE2\x80\xA2";

const VikaasWebFont_vattu_PA       = "\xC3\x8E";
const VikaasWebFont_vattu_PHA      = "\xC3\x8E\xC3\x9B";
const VikaasWebFont_vattu_BA       = "\xC3\x92";
const VikaasWebFont_vattu_BHA      = "\xC3\x92\xC3\x9B";
const VikaasWebFont_vattu_MA_1     = "\xC2\x88";
const VikaasWebFont_vattu_MA_2     = "\xCB\x86";

const VikaasWebFont_vattu_YA       = "\xC2\xAB";
const VikaasWebFont_vattu_RA_1     = "\xC2\x81";
const VikaasWebFont_vattu_RA_2     = "\xC3\xA7";
const VikaasWebFont_vattu_LA       = "\xC2\xA2";
const VikaasWebFont_vattu_VA       = "\xC3\x87";
const VikaasWebFont_vattu_SHA      = "\xC3\xB4";
const VikaasWebFont_vattu_SSA_1    = "\xC2\x8C";
const VikaasWebFont_vattu_SSA_2    = "\xC3\xAB";
const VikaasWebFont_vattu_SSA_3    = "\xC3\xBC";
const VikaasWebFont_vattu_SSA_4    = "\xC5\x92";
const VikaasWebFont_vattu_SA       = "\xC3\xA0";
const VikaasWebFont_vattu_HA       = "\xC2\xBD";
const VikaasWebFont_vattu_LLA      = "\xC3\x9F";
const VikaasWebFont_vattu_RRA      = "\xC3\x80";

//Conjuncts
//const VikaasWebFont_vattu_TRA      = "\u";
//const VikaasWebFont_vattu_TTRA     = "\u";
const VikaasWebFont_vattu_PPU      = "\xC3\xB0";

//Matches ASCII
const VikaasWebFont_EXCLAM         = "\x21";
const VikaasWebFont_PARENLEFT      = "\x28";
const VikaasWebFont_PARENRIGT      = "\x29";
const VikaasWebFont_COMMA          = "\x2C";
const VikaasWebFont_HYPHEN_1       = "\x2D";   //I don't know what the $significance is, shows up as '-' on Linux, not displayed on Windows in Firefox
const VikaasWebFont_PERIOD         = "\x2E";
const VikaasWebFont_SLASH          = "\x2F";
const VikaasWebFont_COLON          = "\x3A";
const VikaasWebFont_QUESTION       = "\x3F";

const VikaasWebFont_digit_ZERO     = "\x30";
const VikaasWebFont_digit_ONE      = "\x31";
const VikaasWebFont_digit_TWO      = "\x32";
const VikaasWebFont_digit_THREE    = "\x33";
const VikaasWebFont_digit_FOUR     = "\x34";
const VikaasWebFont_digit_FIVE     = "\x35";
const VikaasWebFont_digit_SIX      = "\x36";
const VikaasWebFont_digit_SEVEN    = "\x37";
const VikaasWebFont_digit_EIGHT    = "\x38";
const VikaasWebFont_digit_NINE     = "\x39";

//Does not match ASCII
const VikaasWebFont_PLUS           = "\x47";
const VikaasWebFont_MULTIPLY       = "\x49";
const VikaasWebFont_EQUALS         = "\x52";
const VikaasWebFont_HYPHEN_2       = "\x60";
const VikaasWebFont_DIVIDE         = "\xC2\xAA";
const VikaasWebFont_AMPERSAND      = "\xC3\x8A";
const VikaasWebFont_SEMICOLON      = "\xC3\x91";
const VikaasWebFont_PIPE           = "\xC3\xB6";
const VikaasWebFont_PERCENT        = "\x25";
const VikaasWebFont_LQTSINGLE      = "\xC2\xBB";
const VikaasWebFont_RQTSINGLE      = "\xC2\xB5";

//Kommu
const VikaasWebFont_misc_TICK_1    = "\xC2\x83";
const VikaasWebFont_misc_TICK_2    = "\xC2\x84";
const VikaasWebFont_misc_TICK_3    = "\xC2\x8A";
const VikaasWebFont_misc_TICK_4    = "\xC2\x9F";
const VikaasWebFont_misc_TICK_5    = "\xC2\xA3";
const VikaasWebFont_misc_TICK_6    = "\xC2\xB7";
const VikaasWebFont_misc_TICK_7    = "\xC3\x81";
const VikaasWebFont_misc_TICK_8    = "\xC3\xA1";
const VikaasWebFont_misc_TICK_9    = "\xC3\xB8";
const VikaasWebFont_misc_TICK_10   = "\xC5\xA0";
const VikaasWebFont_misc_TICK_11   = "\xC6\x92";
const VikaasWebFont_misc_TICK_12   = "\xC5\xB8";
const VikaasWebFont_misc_TICK_13   = "\xE2\x80\x9E";

}

$VikaasWebFont_toPadma = array();

$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_candrabindu] = Padma::Padma_candrabindu;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_visarga]  = Padma::Padma_visarga;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_virama_1] = Padma::Padma_syllbreak;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_virama_2] = Padma::Padma_syllbreak;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_virama_3] = Padma::Padma_syllbreak;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_virama_4] = Padma::Padma_syllbreak;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_virama_5] = Padma::Padma_syllbreak;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_virama_6] = Padma::Padma_syllbreak;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_virama_7] = Padma::Padma_syllbreak;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_anusvara] = Padma::Padma_anusvara;

$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowel_A] = Padma::Padma_vowel_A;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowel_AA_1] = Padma::Padma_vowel_AA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowel_AA_2] = Padma::Padma_vowel_AA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowel_I_1] = Padma::Padma_vowel_I;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowel_I_2] = Padma::Padma_vowel_I;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowel_II_1] = Padma::Padma_vowel_II;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowel_II_2] = Padma::Padma_vowel_II;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowel_U_1] = Padma::Padma_vowel_U;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowel_U_2] = Padma::Padma_vowel_U;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowel_UU] = Padma::Padma_vowel_UU;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowel_R_1] = Padma::Padma_vowel_R;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowel_R_2] = Padma::Padma_vowel_R;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowel_RR_1] = Padma::Padma_vowel_RR;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowel_RR_2] = Padma::Padma_vowel_RR;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowel_E] = Padma::Padma_vowel_E;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowel_EE] = Padma::Padma_vowel_EE;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowel_AI] = Padma::Padma_vowel_AI;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowel_O] = Padma::Padma_vowel_O;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowel_OO] = Padma::Padma_vowel_OO;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowel_AU] = Padma::Padma_vowel_AU;

$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_KA_1] = Padma::Padma_consnt_KA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_KA_2] = Padma::Padma_consnt_KA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_KHA_1] = Padma::Padma_consnt_KHA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_KHA_2] = Padma::Padma_consnt_KHA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_GA] = Padma::Padma_consnt_GA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_GHA_1] = Padma::Padma_consnt_GHA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_GHA_2] = Padma::Padma_consnt_GHA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_NGA] = Padma::Padma_consnt_NGA;

$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_CA] = Padma::Padma_consnt_CA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_CHA_1] = Padma::Padma_consnt_CHA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_CHA_2] = Padma::Padma_consnt_CHA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_JA_1] = Padma::Padma_consnt_JA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_JA_2] = Padma::Padma_consnt_JA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_JHA] = Padma::Padma_consnt_JHA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_NYA] = Padma::Padma_consnt_NYA;

$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_TTA_1] = Padma::Padma_consnt_TTA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_TTA_2] = Padma::Padma_consnt_TTA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_TTA_3] = Padma::Padma_consnt_TTA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_TTHA] = Padma::Padma_consnt_TTHA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_DDA] = Padma::Padma_consnt_DDA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_DDHA] = Padma::Padma_consnt_DDHA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_NNA] = Padma::Padma_consnt_NNA;

$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_TA] = Padma::Padma_consnt_TA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_THA_1] = Padma::Padma_consnt_THA;
//$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_THA_2] = Padma::Padma_consnt_THA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_DA] = Padma::Padma_consnt_DA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_DHA] = Padma::Padma_consnt_DHA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_NA_1] = Padma::Padma_consnt_NA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_NA_2] = Padma::Padma_consnt_NA;

$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_PA_1] = Padma::Padma_consnt_PA;
//VikaasWebFont.toPadma[VikaasWebFont.consnt_PA_2] = Padma::Padma_consnt_PA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_PA_3] = Padma::Padma_consnt_PA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_PHA_1]  = Padma::Padma_consnt_PHA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_PHA_2]  = Padma::Padma_consnt_PHA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_PHA_3]  = Padma::Padma_consnt_PHA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_PHA_4]  = Padma::Padma_consnt_PHA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_BA_1] = Padma::Padma_consnt_BA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_BA_2] = Padma::Padma_consnt_BA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_BA_3] = Padma::Padma_consnt_BA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_BHA]  = Padma::Padma_consnt_BHA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_MA] = Padma::Padma_consnt_MA;

$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_YA_1] = Padma::Padma_consnt_YA;
//$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_YA_2] = Padma::Padma_consnt_YA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_RA] = Padma::Padma_consnt_RA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_LA_1] = Padma::Padma_consnt_LA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_LA_2] = Padma::Padma_consnt_LA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_VA_1] = Padma::Padma_consnt_VA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_VA_2] = Padma::Padma_consnt_VA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_SHA] = Padma::Padma_consnt_SHA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_SSA_1] = Padma::Padma_consnt_SSA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_SSA_2] = Padma::Padma_consnt_SSA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_SA_1] = Padma::Padma_consnt_SA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_SA_2] = Padma::Padma_consnt_SA;

$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_HA_1] = Padma::Padma_consnt_HA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_LLA] = Padma::Padma_consnt_LLA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_consnt_RRA] = Padma::Padma_consnt_RRA;
//$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_conjct_KSHA] = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA;

$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_conjct_STR]   = Padma::Padma_consnt_SA . Padma::Padma_vattu_TA . Padma::Padma_vattu_RA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_conjct_SSTTR] = Padma::Padma_consnt_SSA . Padma::Padma_vattu_TTA . Padma::Padma_vattu_RA;


//Gunintamulu
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_AA_1]  = Padma::Padma_vowelsn_AA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_AA_2]  = Padma::Padma_vowelsn_AA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_AA_3]  = Padma::Padma_vowelsn_AA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_AA_4]  = Padma::Padma_vowelsn_AA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_AA_5]  = Padma::Padma_vowelsn_AA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_AA_6]  = Padma::Padma_vowelsn_AA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_AA_7]  = Padma::Padma_vowelsn_AA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_AA_8]  = Padma::Padma_vowelsn_AA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_AA_9]  = Padma::Padma_vowelsn_AA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_AA_10] = Padma::Padma_vowelsn_AA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_AA_11] = Padma::Padma_vowelsn_AA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_I_1]   = Padma::Padma_vowelsn_I;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_I_2]   = Padma::Padma_vowelsn_I;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_I_3]   = Padma::Padma_vowelsn_I;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_II_1]  = Padma::Padma_vowelsn_II;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_II_2]  = Padma::Padma_vowelsn_II;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_II_3]  = Padma::Padma_vowelsn_II;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_II_4]  = Padma::Padma_vowelsn_II;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_U_1]   = Padma::Padma_vowelsn_U;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_U_2]   = Padma::Padma_vowelsn_U;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_U_3]   = Padma::Padma_vowelsn_U;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_U_4]   = Padma::Padma_vowelsn_U;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_U_5]   = Padma::Padma_vowelsn_U;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_U_6]   = Padma::Padma_vowelsn_U;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_U_7]   = Padma::Padma_vowelsn_U;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_U_8]   = Padma::Padma_vowelsn_U;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_UU_1]  = Padma::Padma_vowelsn_UU;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_UU_2]  = Padma::Padma_vowelsn_UU;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_UU_3]  = Padma::Padma_vowelsn_UU;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_UU_4]  = Padma::Padma_vowelsn_UU;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_UU_5]  = Padma::Padma_vowelsn_UU;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_R_1]   = Padma::Padma_vowelsn_R;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_R_2]   = Padma::Padma_vowelsn_R;
//$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_RR]    = Padma::Padma_vowelsn_RR;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_E_1]   = Padma::Padma_vowelsn_E;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_E_2]   = Padma::Padma_vowelsn_E;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_E_3]   = Padma::Padma_vowelsn_E;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_E_4]   = Padma::Padma_vowelsn_E;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_E_5]   = Padma::Padma_vowelsn_E;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_E_6]   = Padma::Padma_vowelsn_E;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_EE_1]  = Padma::Padma_vowelsn_EE;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_EE_2]  = Padma::Padma_vowelsn_EE;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_EE_3]  = Padma::Padma_vowelsn_EE;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_EE_4]  = Padma::Padma_vowelsn_EE;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_EE_5]  = Padma::Padma_vowelsn_EE;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_O_1]   = Padma::Padma_vowelsn_O;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_O_2]   = Padma::Padma_vowelsn_O;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_O_3]   = Padma::Padma_vowelsn_O;
//$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_O_4]   = Padma::Padma_vowelsn_O;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_OO_1]  = Padma::Padma_vowelsn_OO;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_OO_2]  = Padma::Padma_vowelsn_OO;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_OO_3]  = Padma::Padma_vowelsn_OO;
//$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_OO_4]  = Padma::Padma_vowelsn_OO;
//$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_OO_5]  = Padma::Padma_vowelsn_OO;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_AU_1]  = Padma::Padma_vowelsn_AU;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_AU_2]  = Padma::Padma_vowelsn_AU;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_AU_3]  = Padma::Padma_vowelsn_AU;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_AU_4]  = Padma::Padma_vowelsn_AU;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_AU_5]  = Padma::Padma_vowelsn_AU;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_AU_6]  = Padma::Padma_vowelsn_AU;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_AU_7]  = Padma::Padma_vowelsn_AU;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_AILEN_1] = Padma::Padma_vowelsn_AILEN;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_AILEN_2] = Padma::Padma_vowelsn_AILEN;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vowelsn_AILEN_3] = Padma::Padma_vowelsn_AILEN;

//Special Combinations
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_KHI]     = Padma::Padma_consnt_KHA . Padma::Padma_vowelsn_I;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_KHII]    = Padma::Padma_consnt_KHA . Padma::Padma_vowelsn_II;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_GI]      = Padma::Padma_consnt_GA . Padma::Padma_vowelsn_I;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_GII]     = Padma::Padma_consnt_GA . Padma::Padma_vowelsn_II;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_GHAA]  = Padma::Padma_consnt_GHA . Padma::Padma_vowelsn_AA;
//$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_GHAA_2]  = Padma::Padma_consnt_GHA . Padma::Padma_vowelsn_AA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_GHI_1]   = Padma::Padma_consnt_GHA . Padma::Padma_vowelsn_I;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_GHI_2]   = Padma::Padma_consnt_GHA . Padma::Padma_vowelsn_I;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_GHII]    = Padma::Padma_consnt_GHA . Padma::Padma_vowelsn_II;
//$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_GHU]     = Padma::Padma_consnt_GHA . Padma::Padma_vowelsn_U;
//$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_GHUU]    = Padma::Padma_consnt_GHA . Padma::Padma_vowelsn_UU;
//$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_GHPOLLU] = Padma::Padma_consnt_GHA . Padma::Padma_syllbreak;

$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_CI]      = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_I;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_CII]     = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_II;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_CHI]     = Padma::Padma_consnt_CHA . Padma::Padma_vowelsn_I;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_CHII]    = Padma::Padma_consnt_CHA . Padma::Padma_vowelsn_II;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_JI_1]    = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_I;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_JI_2]    = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_I;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_JII]     = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_II;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_JU]      = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_U;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_JUU]     = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_UU;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_JHI]     = Padma::Padma_consnt_JHA . Padma::Padma_vowelsn_I;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_JHII]    = Padma::Padma_consnt_JHA . Padma::Padma_vowelsn_II;
//$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_JHPOLLU] = Padma::Padma_consnt_JHA . Padma::Padma_syllbreak;

//$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_TTHI]    = Padma::Padma_consnt_TTHA . Padma::Padma_vowelsn_I;
//$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_TTHII]   = Padma::Padma_consnt_TTHA . Padma::Padma_vowelsn_II;

$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_TI]      = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_I;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_TII]     = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_II;
//$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_THI]     = Padma::Padma_consnt_THA . Padma::Padma_vowelsn_I;
//$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_THII]    = Padma::Padma_consnt_THA . Padma::Padma_vowelsn_II;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_DI]      = Padma::Padma_consnt_DA . Padma::Padma_vowelsn_I;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_DII]     = Padma::Padma_consnt_DA . Padma::Padma_vowelsn_II;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_DHI]     = Padma::Padma_consnt_DHA . Padma::Padma_vowelsn_I;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_DHII]    = Padma::Padma_consnt_DHA . Padma::Padma_vowelsn_II;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_NI_1]    = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_I;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_NI_2]    = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_I;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_NII]     = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_II;

$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_BAA]     = Padma::Padma_consnt_BA . Padma::Padma_vowelsn_AA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_BOO]     = Padma::Padma_consnt_BA . Padma::Padma_vowelsn_OO;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_BI]      = Padma::Padma_consnt_BA . Padma::Padma_vowelsn_I;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_BII]     = Padma::Padma_consnt_BA . Padma::Padma_vowelsn_II;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_BHI]     = Padma::Padma_consnt_BHA . Padma::Padma_vowelsn_I;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_BHII]    = Padma::Padma_consnt_BHA . Padma::Padma_vowelsn_II;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_MAA]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_AA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_MI]      = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_I;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_MII_1]   = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_II;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_MII_2]   = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_II;
//$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_MU]      = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_U;
//$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_MUU]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_UU;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_VE]      = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_E;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_VEE]     = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_EE;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_ME_1]    = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_E;
//$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_ME_2]    = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_E;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_MEE]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_EE;
//$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_MAI]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_AI;
//$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_MO]      = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_O;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_MOO]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_OO;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_MPOLLU]  = Padma::Padma_consnt_MA . Padma::Padma_syllbreak;

$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_YAA]     = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_AA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_YI]      = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_I;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_YII_1]   = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_II;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_YII_2]   = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_II;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_YE]      = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_E;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_YEE]     = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_EE;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_YAI]     = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_AI;
//$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_YO]      = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_O;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_YOO]     = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_OO;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_YPOLLU_1]= Padma::Padma_consnt_YA . Padma::Padma_syllbreak;
//$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_YPOLLU_2]= Padma::Padma_consnt_YA . Padma::Padma_syllbreak;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_RI]      = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_I;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_RII]     = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_II;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_LI]      = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_I;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_LII]     = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_II;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_VI]      = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_I;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_VII]     = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_II;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_SHI]     = Padma::Padma_consnt_SHA . Padma::Padma_vowelsn_I;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_SHII]    = Padma::Padma_consnt_SHA . Padma::Padma_vowelsn_II;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_LLI]     = Padma::Padma_consnt_LLA . Padma::Padma_vowelsn_I;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_LLII]    = Padma::Padma_consnt_LLA . Padma::Padma_vowelsn_II;

$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_SHRII]   = Padma::Padma_consnt_SHA . Padma::Padma_vattu_RA . Padma::Padma_vowelsn_II;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_combo_HOO]     = Padma::Padma_consnt_HA . Padma::Padma_vowelsn_OO;

//Vattulu
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vattu_KA]      = Padma::Padma_vattu_KA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vattu_KHA]     = Padma::Padma_vattu_KHA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vattu_GA]      = Padma::Padma_vattu_GA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vattu_GHA]     = Padma::Padma_vattu_GHA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vattu_CA]      = Padma::Padma_vattu_CA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vattu_CHA]     = Padma::Padma_vattu_CHA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vattu_JA]      = Padma::Padma_vattu_JA;
//$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vattu_JHA]     = Padma::Padma_vattu_JHA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vattu_NYA]     = Padma::Padma_vattu_NYA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vattu_TTA]     = Padma::Padma_vattu_TTA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vattu_TTHA]    = Padma::Padma_vattu_TTHA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vattu_DDA]     = Padma::Padma_vattu_DDA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vattu_NNA_1]   = Padma::Padma_vattu_NNA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vattu_NNA_2]   = Padma::Padma_vattu_NNA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vattu_TA_1]    = Padma::Padma_vattu_TA;
//$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vattu_TA_2]    = Padma::Padma_vattu_TA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vattu_THA_1]   = Padma::Padma_vattu_THA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vattu_THA_2]   = Padma::Padma_vattu_THA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vattu_DA]      = Padma::Padma_vattu_DA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vattu_DHA]     = Padma::Padma_vattu_DHA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vattu_NA_1]    = Padma::Padma_vattu_NA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vattu_NA_2]    = Padma::Padma_vattu_NA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vattu_PA]      = Padma::Padma_vattu_PA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vattu_PHA]     = Padma::Padma_vattu_PHA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vattu_BA]      = Padma::Padma_vattu_BA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vattu_BHA]     = Padma::Padma_vattu_BHA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vattu_MA_1]    = Padma::Padma_vattu_MA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vattu_MA_2]    = Padma::Padma_vattu_MA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vattu_YA]      = Padma::Padma_vattu_YA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vattu_RA_1]    = Padma::Padma_vattu_RA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vattu_RA_2]    = Padma::Padma_vattu_RA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vattu_LA]      = Padma::Padma_vattu_LA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vattu_VA]      = Padma::Padma_vattu_VA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vattu_SHA]     = Padma::Padma_vattu_SHA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vattu_SSA_1]   = Padma::Padma_vattu_SSA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vattu_SSA_2]   = Padma::Padma_vattu_SSA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vattu_SSA_3]   = Padma::Padma_vattu_SSA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vattu_SSA_4]   = Padma::Padma_vattu_SSA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vattu_SA]      = Padma::Padma_vattu_SA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vattu_HA]      = Padma::Padma_vattu_HA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vattu_LLA]     = Padma::Padma_vattu_LLA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vattu_RRA]     = Padma::Padma_vattu_RRA;

//Conjuncts
//$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vattu_TRA]     = Padma::Padma_vattu_TA . Padma::Padma_vattu_RA;
//$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vattu_TTRA]    = Padma::Padma_vattu_TTA . Padma::Padma_vattu_RA;
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_vattu_PPU]     = Padma::Padma_vattu_PA . Padma::Padma_vowelsn_U;

//Miscellaneous(where it doesn't match ASCII representation)
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_PLUS]           = ".";
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_MULTIPLY]       = "X";
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_EQUALS]         = "=";
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_HYPHEN_2]       = "-";
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_DIVIDE]         = "/";
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_AMPERSAND]      = "&";
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_SEMICOLON]      = ";";
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_PIPE]           = "|";
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_PERCENT]        = "%";
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_LQTSINGLE]      = "\xE2\x80\x98";
$VikaasWebFont_toPadma[VikaasWebFont::VikaasWebFont_RQTSINGLE]      = "\xE2\x80\x99";

$VikaasWebFont_redundantList = array();
$VikaasWebFont_redundantList[VikaasWebFont::VikaasWebFont_misc_TICK_1] = true;
$VikaasWebFont_redundantList[VikaasWebFont::VikaasWebFont_misc_TICK_2] = true;
$VikaasWebFont_redundantList[VikaasWebFont::VikaasWebFont_misc_TICK_3] = true;
$VikaasWebFont_redundantList[VikaasWebFont::VikaasWebFont_misc_TICK_4] = true;
$VikaasWebFont_redundantList[VikaasWebFont::VikaasWebFont_misc_TICK_5] = true;
$VikaasWebFont_redundantList[VikaasWebFont::VikaasWebFont_misc_TICK_6] = true;
$VikaasWebFont_redundantList[VikaasWebFont::VikaasWebFont_misc_TICK_7] = true;
$VikaasWebFont_redundantList[VikaasWebFont::VikaasWebFont_misc_TICK_8] = true;
$VikaasWebFont_redundantList[VikaasWebFont::VikaasWebFont_misc_TICK_9] = true;
$VikaasWebFont_redundantList[VikaasWebFont::VikaasWebFont_misc_TICK_10]= true;
$VikaasWebFont_redundantList[VikaasWebFont::VikaasWebFont_misc_TICK_11]= true;
$VikaasWebFont_redundantList[VikaasWebFont::VikaasWebFont_misc_TICK_12]= true;
$VikaasWebFont_redundantList[VikaasWebFont::VikaasWebFont_misc_TICK_13]= true;

$VikaasWebFont_prefixList = array();
$VikaasWebFont_prefixList[VikaasWebFont::VikaasWebFont_vattu_RA_1]   = true;
$VikaasWebFont_prefixList[VikaasWebFont::VikaasWebFont_vattu_RA_2]   = true;
$VikaasWebFont_prefixList[VikaasWebFont::VikaasWebFont_vowelsn_E_1]  = true;
$VikaasWebFont_prefixList[VikaasWebFont::VikaasWebFont_vowelsn_E_2]  = true;
//$VikaasWebFont_prefixList[VikaasWebFont::VikaasWebFont_vowelsn_E_4]  = true;//shouldn't
$VikaasWebFont_prefixList[VikaasWebFont::VikaasWebFont_vowelsn_E_6]  = true;
$VikaasWebFont_prefixList[VikaasWebFont::VikaasWebFont_vowelsn_EE_1] = true;
$VikaasWebFont_prefixList[VikaasWebFont::VikaasWebFont_vowelsn_EE_2] = true;
//VikaasWebFont.prefixList[VikaasWebFont.vowelsn_EE_3] = true;//shouldn't
//VikaasWebFont.prefixList[VikaasWebFont.vowelsn_EE_5] = true;//shouldn't

$VikaasWebFont_overloadList = array();
$VikaasWebFont_overloadList[VikaasWebFont::VikaasWebFont_consnt_KA_2]   = true;
$VikaasWebFont_overloadList[VikaasWebFont::VikaasWebFont_consnt_CA]     = true;
$VikaasWebFont_overloadList[VikaasWebFont::VikaasWebFont_consnt_DDA]    = true;
$VikaasWebFont_overloadList[VikaasWebFont::VikaasWebFont_consnt_DA]     = true;
$VikaasWebFont_overloadList[VikaasWebFont::VikaasWebFont_consnt_PA_1]   = true;
//VikaasWebFont.overloadList[VikaasWebFont.consnt_PA_2]   = true;
$VikaasWebFont_overloadList[VikaasWebFont::VikaasWebFont_consnt_PA_3]   = true;
$VikaasWebFont_overloadList[VikaasWebFont::VikaasWebFont_consnt_PHA_1]  = true;
$VikaasWebFont_overloadList[VikaasWebFont::VikaasWebFont_consnt_BA_1]   = true;
$VikaasWebFont_overloadList[VikaasWebFont::VikaasWebFont_consnt_BA_2]   = true;
$VikaasWebFont_overloadList[VikaasWebFont::VikaasWebFont_consnt_BA_3]   = true;
$VikaasWebFont_overloadList[VikaasWebFont::VikaasWebFont_consnt_YA_1]   = true;
$VikaasWebFont_overloadList[VikaasWebFont::VikaasWebFont_consnt_RA]     = true;
$VikaasWebFont_overloadList[VikaasWebFont::VikaasWebFont_consnt_VA_1]   = true;
$VikaasWebFont_overloadList[VikaasWebFont::VikaasWebFont_consnt_VA_2]   = true;
$VikaasWebFont_overloadList[VikaasWebFont::VikaasWebFont_vowelsn_R_1]   = true;
$VikaasWebFont_overloadList[VikaasWebFont::VikaasWebFont_vowelsn_R_2]   = true;
$VikaasWebFont_overloadList[VikaasWebFont::VikaasWebFont_vowelsn_E_1]   = true;
$VikaasWebFont_overloadList[VikaasWebFont::VikaasWebFont_vowelsn_EE_1]  = true;
$VikaasWebFont_overloadList[VikaasWebFont::VikaasWebFont_combo_CI]      = true;
$VikaasWebFont_overloadList[VikaasWebFont::VikaasWebFont_combo_CII]     = true;
$VikaasWebFont_overloadList[VikaasWebFont::VikaasWebFont_combo_DI]      = true;
$VikaasWebFont_overloadList[VikaasWebFont::VikaasWebFont_combo_DII]     = true;
$VikaasWebFont_overloadList[VikaasWebFont::VikaasWebFont_combo_BI]      = true;
$VikaasWebFont_overloadList[VikaasWebFont::VikaasWebFont_combo_BII]     = true;
$VikaasWebFont_overloadList[VikaasWebFont::VikaasWebFont_combo_YI]      = true;
$VikaasWebFont_overloadList[VikaasWebFont::VikaasWebFont_combo_VI]      = true;
$VikaasWebFont_overloadList[VikaasWebFont::VikaasWebFont_combo_VII]     = true;
$VikaasWebFont_overloadList[VikaasWebFont::VikaasWebFont_combo_VE]      = true;
$VikaasWebFont_overloadList[VikaasWebFont::VikaasWebFont_combo_VEE]     = true;
$VikaasWebFont_overloadList[VikaasWebFont::VikaasWebFont_combo_RI]      = true;
$VikaasWebFont_overloadList[VikaasWebFont::VikaasWebFont_combo_RII]     = true;
$VikaasWebFont_overloadList[VikaasWebFont::VikaasWebFont_vattu_CA]      = true;
$VikaasWebFont_overloadList[VikaasWebFont::VikaasWebFont_vattu_DA]      = true;
$VikaasWebFont_overloadList[VikaasWebFont::VikaasWebFont_vattu_PA]      = true;
$VikaasWebFont_overloadList[VikaasWebFont::VikaasWebFont_vattu_BA]      = true;
$VikaasWebFont_overloadList["\x7C\xCB\x9C"] = true;
$VikaasWebFont_overloadList["\x7C\xCB\x9C\xC2\xBE"] = true;
$VikaasWebFont_overloadList["\x7C\xC2\x98"] = true;
$VikaasWebFont_overloadList["\x6A"] = true;
$VikaasWebFont_overloadList["\x6A\xC3\xAE"] = true;
$VikaasWebFont_overloadList["\x6A\x59"] = true;
$VikaasWebFont_overloadList["\x6A\xC3\xBB"] = true;
$VikaasWebFont_overloadList["\xE2\x80\xB9\x54"] = true;
$VikaasWebFont_overloadList["\xC2\x8B\x54"] = true;
$VikaasWebFont_overloadList["\x73\x54"] = true;
$VikaasWebFont_overloadList["\x7C\xC2\x98\xC2\xBE"] = true;
$VikaasWebFont_overloadList["\x6A\xC3\xAE\xC2\xAE"] = true;
$VikaasWebFont_overloadList["\x7C\xC2\x98\xC3\x93"] = true;
$VikaasWebFont_overloadList["\x79\xC5\xBD"] = true;

function VikaasWebFont_initialize()
{
    global $fontinfo;

    $fontinfo["vikaaswebfont"]["language"] = "Telugu";
    $fontinfo["vikaaswebfont"]["class"] = "VikaasWebFont";
    $fontinfo["priyaankaboldwebfont"]["language"] = "Telugu";
    $fontinfo["priyaankaboldwebfont"]["class"] = "VikaasWebFont";
    $fontinfo["pallaviboldwebfont"]["language"] = "Telugu";
    $fontinfo["pallaviboldwebfont"]["class"] = "VikaasWebFont";
}

?>
