<?php
/* ***** BEGIN LICENSE BLOCK *****
 *
 *  Copyright (C) 2007 Radhesh <guptaradhesh@gmail.com> 
 *  Copyright (C) 2007 Harshita Vani <harshita@atc.tcs.com>
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

//Kiran fonts -- Kiran,Amruta and Aarti
class Kiran
{
function Kiran()
{
}

//The interface every dynamic font encoding should implement
var $maxLookupLen = 3;
var $fontFace     = "Kiran";
var $displayName  = "Kiran";
var $script       = Padma::Padma_script_DEVANAGARI;
var $hasSuffixes  = true;

function lookup ($str)
{
  global $Kiran_toPadma;
   if(array_key_exists($str,$Kiran_toPadma))
    return $Kiran_toPadma[$str];
   return false;
}

function isPrefixSymbol ($str)
{
    global $Kiran_prefixList;
    return array_key_exists($str,$Kiran_prefixList);
}

function isSuffixSymbol ($str)
{
    global $Kiran_suffixList;
    return array_key_exists($str,$Kiran_suffixList);
}

function isOverloaded ($str)
{
    global $Kiran_overloadList;
    return array_key_exists($str,$Kiran_overloadList);
}

function handleTwoPartVowelSigns ($sign1, $sign2)
{
    if (($sign1 == Padma::Padma_vowelsn_EE && $sign2 == Padma::Padma_vowelsn_AA) ||
        ($sign1 == Padma::Padma_vowelsn_AA && $sign2 == Padma::Padma_vowelsn_EE))
        return Padma::Padma_vowelsn_OO;
    if (($sign1 == Padma::Padma_vowelsn_AI && $sign2 == Padma::Padma_vowelsn_AA) ||
        ($sign1 == Padma::Padma_vowelsn_AA && $sign2 == Padma::Padma_vowelsn_AI))
        return Padma::Padma_vowelsn_AU;
    return $sign1 . $sign2;    
}

function isRedundant ($str)
{
    global $Kiran_redundantList;
    return array_key_exists($str,$Kiran_redundantList);
}

//TODO: 00DE,00E7,00ED,00EE,00EF
//Doubts: 0045,005D,00CB,00E6

//Vowel modifiers
const Kiran_avagraha	   = "\x23";
const Kiran_anusvara       = "\x4D";
const Kiran_candrabindu    = "\x5E\x4D";
const Kiran_visarga	   = "\x3A";
const Kiran_virama         = "\x5C";

//Vowels
const Kiran_vowel_A        = "\x41";
const Kiran_vowel_AA       = "\x41\x61";
const Kiran_vowel_I        = "\x5B";
const Kiran_vowel_II       = "\x5B\x2D";
const Kiran_vowel_U        = "\x7B";
const Kiran_vowel_UU       = "\x7B\x5D";
const Kiran_vowel_R        = "\x50";
const Kiran_vowel_CDR_E    = "\x65\x5E";
const Kiran_vowel_EE       = "\x65";
const Kiran_vowel_AI       = "\x65\x6F";
const Kiran_vowel_CDR_O    = "\x41\x61\x5E";
const Kiran_vowel_OO       = "\x41\x61\x6F";
const Kiran_vowel_AU       = "\x41\x61\x4F";

//Consonants
const Kiran_consnt_KA      = "\x6B";
const Kiran_consnt_KHA     = "\x4B\x61";
const Kiran_consnt_KHHA    = "\x4B\x61\xC3\x9C";
const Kiran_consnt_GA      = "\x67\x61";
const Kiran_consnt_GHHA    = "\x67\x61\xC3\x9C";
const Kiran_consnt_GHA     = "\x47\x61";
const Kiran_consnt_NGA     = "\xC3\x88";

const Kiran_consnt_CA      = "\x63\x61";
const Kiran_consnt_CHA     = "\x43";
const Kiran_consnt_JA      = "\x6A\x61";
const Kiran_consnt_ZA_1    = "\x6A\xC3\x9C\x61";
const Kiran_consnt_ZA_2    = "\x6A\x61\xC3\x9C";
const Kiran_consnt_JHA     = "\x4A\x61";
const Kiran_consnt_NYA     = "\xC3\x89\x61";

const Kiran_consnt_TTA     = "\x54";
const Kiran_consnt_TTHA    = "\x7A";
const Kiran_consnt_DDA     = "\x44";
const Kiran_consnt_DDDHA   = "\x44\xC3\x9C";
const Kiran_consnt_DDHA    = "\x5A";
const Kiran_consnt_RHA     = "\x5A\xC3\x9C";
const Kiran_consnt_NNA     = "\x4E\x61";

const Kiran_consnt_TA      = "\x74\x61";
const Kiran_consnt_THA     = "\x71\x61";
const Kiran_consnt_DA      = "\x64";
const Kiran_consnt_DHA     = "\x51\x61";
const Kiran_consnt_NA      = "\x6E\x61";

const Kiran_consnt_PA      = "\x70\x61";
const Kiran_consnt_PHA     = "\x66";
const Kiran_consnt_FA      = "\x66\xC3\x9C";
const Kiran_consnt_BA      = "\x62\x61";
const Kiran_consnt_BHA     = "\x42\x61";
const Kiran_consnt_MA      = "\x6D\x61";

const Kiran_consnt_YA_1    = "\x79\x61";
const Kiran_consnt_YA_2    = "\xC3\x8B";
const Kiran_consnt_RA      = "\x72";
const Kiran_consnt_LA_1    = "\x6C\x61";
const Kiran_consnt_LA_2    = "\xC3\x8A";
const Kiran_consnt_VA      = "\x76\x61";
const Kiran_consnt_SHA_1   = "\x53\x61";
const Kiran_consnt_SHA_2   = "\xC3\x8C\x61";
const Kiran_consnt_SSA     = "\x59\x61";
const Kiran_consnt_SA      = "\x73\x61";
const Kiran_consnt_HA      = "\x68";
const Kiran_consnt_LLA     = "\x4C";

//Vowel $signs
const Kiran_vowelsn_AA     = "\x61";
const Kiran_vowelsn_I      = "\x69";
const Kiran_vowelsn_II     = "\x49";
const Kiran_vowelsn_U_1    = "\x75";
const Kiran_vowelsn_U_2    = "\x7D";
const Kiran_vowelsn_UU     = "\x55";
const Kiran_vowelsn_R      = "\x52";
const Kiran_vowelsn_CDR_E  = "\x5E";
const Kiran_vowelsn_EE     = "\x6F";
const Kiran_vowelsn_AI     = "\x4F";
const Kiran_vowelsn_CDR_O  = "\x61\x5E";

// Half forms
const Kiran_halffm_KA      = "\x40";
const Kiran_halffm_KSH     = "\x58";
const Kiran_halffm_KHA     = "\x4B";
const Kiran_halffm_GA      = "\x67";
const Kiran_halffm_GHA     = "\x47";

const Kiran_halffm_CA      = "\x63";
const Kiran_halffm_JA      = "\x6A";
const Kiran_halffm_ZA      = "\x6A\xC3\x9C";
const Kiran_halffm_JHA     = "\x4A";
const Kiran_halffm_NYA     = "\xC3\x89";
const Kiran_halffm_NNA     = "\x4E";

const Kiran_halffm_TA      = "\x74";
const Kiran_halffm_TT      = "\x3C";
const Kiran_halffm_THA     = "\x71";
const Kiran_halffm_DHA     = "\x51";
const Kiran_halffm_NA      = "\x6E";
const Kiran_halffm_PA      = "\x70";
const Kiran_halffm_PHA     = "\x46";

const Kiran_halffm_BA      = "\x62";
const Kiran_halffm_BHA     = "\x42";
const Kiran_halffm_MA      = "\x6D";
const Kiran_halffm_YA      = "\x79";
const Kiran_halffm_RA      = "\x2D"; 
const Kiran_halffm_RRA     = "\x25";
const Kiran_halffm_LA      = "\x6C";
const Kiran_halffm_VA      = "\x76";

const Kiran_halffm_SHA_1   = "\x53";
const Kiran_halffm_SHA_2   = "\xC3\x8C";
const Kiran_halffm_SSA     = "\x59";
const Kiran_halffm_SA      = "\x73";
const Kiran_halffm_HA      = "\x48";

const Kiran_halffm_SHR     = "\x45";
const Kiran_halffm_TR      = "\x7E"; 
const Kiran_halffm_JNY     = "\x26";
const Kiran_halffm_NN      = "\xC3\x99";


//Conjuncts
const Kiran_conjct_KT      = "\x3E";
const Kiran_conjct_KSH     = "\x58\x61";
const Kiran_conjct_JNY     = "\x26\x61";
const Kiran_conjct_TTTT    = "\xC3\x95";
const Kiran_conjct_TTTTH   = "\xC3\x96";
const Kiran_conjct_TTHTTH  = "\x24";
const Kiran_conjct_T_T     = "\x3C\x61";
const Kiran_conjct_TR      = "\x7E\x61";

const Kiran_conjct_D_D     = "\x5F";
const Kiran_conjct_D_DH    = "\x77";
const Kiran_conjct_DM      = "\xC3\x94";
const Kiran_conjct_DY      = "\x56";
const Kiran_conjct_DV      = "\x57";
const Kiran_conjct_DD_DD   = "\xC3\x97";
const Kiran_conjct_DD_DDH  = "\xC3\x98";
const Kiran_conjct_NN      = "\xC3\x99\x61";

const Kiran_conjct_PHR     = "\x66\x60";
const Kiran_conjct_SHR     = "\x45\x61\x60";
const Kiran_conjct_HR      = "\xC3\x92";
const Kiran_conjct_HM      = "\xC3\x93";
const Kiran_conjct_HY      = "\x2B";
const Kiran_conjct_KTR     = "\xC3\x9A";

//rakar
const Kiran_vattu_RA_1     = "\x2F";
const Kiran_vattu_RA_2     = "\x60";

// Combos
const Kiran_combo_JI       = "\x69\x6A\x61";
const Kiran_combo_RU       = "\x72\x5D";
const Kiran_combo_RUU      = "\x72\x7D";
const Kiran_combo_LR       = "\xC3\x8D";
const Kiran_combo_TII      = "\x74\x49";
const Kiran_combo_NEE      = "\x6E\x61\x6F";
const Kiran_combo_SEE      = "\x73\x61\x6F";
const Kiran_combo_HR       = "\x3D";
const Kiran_combo_KAVA     = "\xC3\x9B";
const Kiran_combo_TRAY_1   = "\x7E\xC3\x8B";
const Kiran_combo_TRAY_2   = "\x7E\x79\x61";

const Kiran_misc_OM        = "\x2A";
const Kiran_misc_DANDA     = "\x7C";
const Kiran_nukta          = "\xC3\x9C"; 

//Matches ASCII
const Kiran_EXCLAMATION    = "\x21";
const Kiran_QTDOUBLE       = "\x22";
const Kiran_QTSINGLE       = "\x27";
const Kiran_PARENLEFT      = "\x28";
const Kiran_PARENRIGHT     = "\x29";
const Kiran_COMMA          = "\x2C";
const Kiran_FULLSTOP       = "\x2E";
const Kiran_SEMICOLON      = "\x3B";
const Kiran_QUESTION       = "\x3F";
const Kiran_LQTSINGLE      = "\xE2\x80\x98";
const Kiran_RQTSINGLE      = "\xE2\x80\x99";
const Kiran_LQTDOUBLE      = "\xE2\x80\x9C";
const Kiran_RQTDOUBLE      = "\xE2\x80\x9D";

//Does not match ASCII
const Kiran_digit_ZERO     = "\x30";
const Kiran_digit_ONE      = "\x31";
const Kiran_digit_TWO      = "\x32";
const Kiran_digit_THREE    = "\x33";
const Kiran_digit_FOUR     = "\x34";
const Kiran_digit_FIVE     = "\x35";
const Kiran_digit_SIX      = "\x36";
const Kiran_digit_SEVEN    = "\x37";
const Kiran_digit_EIGHT    = "\x38";
const Kiran_digit_NINE     = "\x39";
//const Kiran_SWASTIK        = "\xC3\x9E";
const Kiran_PLUS           = "\xC3\x9F";
const Kiran_HYPHEN         = "\xC3\xA0";
const Kiran_MULTIPLY       = "\xC3\xA1";
const Kiran_DIVIDE         = "\xC3\xA2";
const Kiran_EQUALS         = "\xC3\xA3";
const Kiran_LESSTHAN       = "\xC3\xA4";
const Kiran_GREATERTHAN    = "\xC3\xA5";
const Kiran_CIRCUMFLEX     = "\xC3\xA6";
const Kiran_CURLYLEFT      = "\xC3\xA8";
const Kiran_CURLYRIGHT     = "\xC3\xA9";
const Kiran_SQBKTLEFT      = "\xC3\xAA";
const Kiran_SQBKTRIGHT     = "\xC3\xAB";
const Kiran_ATSIGN         = "\xC3\xAC";
const Kiran_LIRA	   = "\xC3\xB0";
const Kiran_DOLLAR	   = "\xC3\xB1";
const Kiran_HASH	   = "\xC3\xB2";
const Kiran_SLASH          = "\xC3\xB3";
const Kiran_BACKSLASH      = "\xC3\xB4";
const Kiran_PERCENT        = "\xC3\xB5";
const Kiran_UNDERSCORE     = "\xC3\xB6";

//redundantList
const Kiran_space_1 = "\x78";

}

$Kiran_toPadma = array();

$Kiran_toPadma[Kiran::Kiran_avagraha]   = Padma::Padma_avagraha;
$Kiran_toPadma[Kiran::Kiran_anusvara]   = Padma::Padma_anusvara;
$Kiran_toPadma[Kiran::Kiran_candrabindu]= Padma::Padma_candrabindu;
$Kiran_toPadma[Kiran::Kiran_visarga]    = Padma::Padma_visarga;
$Kiran_toPadma[Kiran::Kiran_virama]     = Padma::Padma_syllbreak;

$Kiran_toPadma[Kiran::Kiran_vowel_A]    = Padma::Padma_vowel_A;
$Kiran_toPadma[Kiran::Kiran_vowel_AA]   = Padma::Padma_vowel_AA;
$Kiran_toPadma[Kiran::Kiran_vowel_I]    = Padma::Padma_vowel_I;
$Kiran_toPadma[Kiran::Kiran_vowel_II]   = Padma::Padma_vowel_II;
$Kiran_toPadma[Kiran::Kiran_vowel_U]    = Padma::Padma_vowel_U;
$Kiran_toPadma[Kiran::Kiran_vowel_UU]   = Padma::Padma_vowel_UU;
$Kiran_toPadma[Kiran::Kiran_vowel_R]    = Padma::Padma_vowel_R;
$Kiran_toPadma[Kiran::Kiran_vowel_CDR_E]= Padma::Padma_vowel_CDR_E;
$Kiran_toPadma[Kiran::Kiran_vowel_EE]   = Padma::Padma_vowel_EE;
$Kiran_toPadma[Kiran::Kiran_vowel_AI]   = Padma::Padma_vowel_AI;
$Kiran_toPadma[Kiran::Kiran_vowel_CDR_O]= Padma::Padma_vowel_CDR_O;
$Kiran_toPadma[Kiran::Kiran_vowel_OO]   = Padma::Padma_vowel_OO;
$Kiran_toPadma[Kiran::Kiran_vowel_AU]   = Padma::Padma_vowel_AU;

$Kiran_toPadma[Kiran::Kiran_consnt_KA]  = Padma::Padma_consnt_KA;
$Kiran_toPadma[Kiran::Kiran_consnt_KHA] = Padma::Padma_consnt_KHA;
$Kiran_toPadma[Kiran::Kiran_consnt_KHHA]= Padma::Padma_consnt_KHHA;
$Kiran_toPadma[Kiran::Kiran_consnt_GA]  = Padma::Padma_consnt_GA;
$Kiran_toPadma[Kiran::Kiran_consnt_GHHA]= Padma::Padma_consnt_GHHA;
$Kiran_toPadma[Kiran::Kiran_consnt_GHA] = Padma::Padma_consnt_GHA;
$Kiran_toPadma[Kiran::Kiran_consnt_NGA] = Padma::Padma_consnt_NGA;

$Kiran_toPadma[Kiran::Kiran_consnt_CA]  = Padma::Padma_consnt_CA;
$Kiran_toPadma[Kiran::Kiran_consnt_CHA] = Padma::Padma_consnt_CHA;
$Kiran_toPadma[Kiran::Kiran_consnt_JA]  = Padma::Padma_consnt_JA;
$Kiran_toPadma[Kiran::Kiran_consnt_ZA_1]= Padma::Padma_consnt_ZA;
$Kiran_toPadma[Kiran::Kiran_consnt_ZA_2]= Padma::Padma_consnt_ZA;
$Kiran_toPadma[Kiran::Kiran_consnt_JHA] = Padma::Padma_consnt_JHA;
$Kiran_toPadma[Kiran::Kiran_consnt_NYA] = Padma::Padma_consnt_NYA;

$Kiran_toPadma[Kiran::Kiran_consnt_TTA] = Padma::Padma_consnt_TTA;
$Kiran_toPadma[Kiran::Kiran_consnt_TTHA]= Padma::Padma_consnt_TTHA;
$Kiran_toPadma[Kiran::Kiran_consnt_DDA] = Padma::Padma_consnt_DDA;
$Kiran_toPadma[Kiran::Kiran_consnt_DDDHA]= Padma::Padma_consnt_DDDHA;
$Kiran_toPadma[Kiran::Kiran_consnt_DDHA] = Padma::Padma_consnt_DDHA;
$Kiran_toPadma[Kiran::Kiran_consnt_RHA] = Padma::Padma_consnt_RHA;
$Kiran_toPadma[Kiran::Kiran_consnt_NNA] = Padma::Padma_consnt_NNA;

$Kiran_toPadma[Kiran::Kiran_consnt_TA]  = Padma::Padma_consnt_TA;
$Kiran_toPadma[Kiran::Kiran_consnt_THA] = Padma::Padma_consnt_THA;
$Kiran_toPadma[Kiran::Kiran_consnt_DA]  = Padma::Padma_consnt_DA;
$Kiran_toPadma[Kiran::Kiran_consnt_DHA] = Padma::Padma_consnt_DHA;
$Kiran_toPadma[Kiran::Kiran_consnt_NA]  = Padma::Padma_consnt_NA;

$Kiran_toPadma[Kiran::Kiran_consnt_PA]  = Padma::Padma_consnt_PA;
$Kiran_toPadma[Kiran::Kiran_consnt_PHA] = Padma::Padma_consnt_PHA;
$Kiran_toPadma[Kiran::Kiran_consnt_FA]  = Padma::Padma_consnt_FA;
$Kiran_toPadma[Kiran::Kiran_consnt_BA]  = Padma::Padma_consnt_BA;
$Kiran_toPadma[Kiran::Kiran_consnt_BHA] = Padma::Padma_consnt_BHA;
$Kiran_toPadma[Kiran::Kiran_consnt_MA]  = Padma::Padma_consnt_MA;

$Kiran_toPadma[Kiran::Kiran_consnt_YA_1]  = Padma::Padma_consnt_YA;
$Kiran_toPadma[Kiran::Kiran_consnt_YA_2]  = Padma::Padma_consnt_YA;
$Kiran_toPadma[Kiran::Kiran_consnt_RA]    = Padma::Padma_consnt_RA;
$Kiran_toPadma[Kiran::Kiran_consnt_LA_1]  = Padma::Padma_consnt_LA;
$Kiran_toPadma[Kiran::Kiran_consnt_LA_2]  = Padma::Padma_consnt_LA;
$Kiran_toPadma[Kiran::Kiran_consnt_VA]    = Padma::Padma_consnt_VA;
$Kiran_toPadma[Kiran::Kiran_consnt_SHA_1] = Padma::Padma_consnt_SHA;
$Kiran_toPadma[Kiran::Kiran_consnt_SHA_2] = Padma::Padma_consnt_SHA;
$Kiran_toPadma[Kiran::Kiran_consnt_SSA] = Padma::Padma_consnt_SSA;
$Kiran_toPadma[Kiran::Kiran_consnt_SA]  = Padma::Padma_consnt_SA;
$Kiran_toPadma[Kiran::Kiran_consnt_HA]  = Padma::Padma_consnt_HA;
$Kiran_toPadma[Kiran::Kiran_consnt_LLA] = Padma::Padma_consnt_LLA;

//Gunintamulu
$Kiran_toPadma[Kiran::Kiran_vowelsn_AA] = Padma::Padma_vowelsn_AA;
$Kiran_toPadma[Kiran::Kiran_vowelsn_I]  = Padma::Padma_vowelsn_I;
$Kiran_toPadma[Kiran::Kiran_vowelsn_II] = Padma::Padma_vowelsn_II;
$Kiran_toPadma[Kiran::Kiran_vowelsn_U_1]= Padma::Padma_vowelsn_U;
$Kiran_toPadma[Kiran::Kiran_vowelsn_U_2]= Padma::Padma_vowelsn_U;
$Kiran_toPadma[Kiran::Kiran_vowelsn_UU] = Padma::Padma_vowelsn_UU;
$Kiran_toPadma[Kiran::Kiran_vowelsn_R]  = Padma::Padma_vowelsn_R;
$Kiran_toPadma[Kiran::Kiran_vowelsn_CDR_E] = Padma::Padma_vowelsn_CDR_E;
$Kiran_toPadma[Kiran::Kiran_vowelsn_EE] = Padma::Padma_vowelsn_EE;
$Kiran_toPadma[Kiran::Kiran_vowelsn_AI] = Padma::Padma_vowelsn_AI;
$Kiran_toPadma[Kiran::Kiran_vowelsn_CDR_O] = Padma::Padma_vowelsn_CDR_O;

//Halffm
$Kiran_toPadma[Kiran::Kiran_halffm_KA]    = Padma::Padma_halffm_KA;
$Kiran_toPadma[Kiran::Kiran_halffm_KSH]   = Padma::Padma_halffm_KA . Padma::Padma_halffm_SSA;
$Kiran_toPadma[Kiran::Kiran_halffm_KHA]   = Padma::Padma_halffm_KHA;
$Kiran_toPadma[Kiran::Kiran_halffm_GA]    = Padma::Padma_halffm_GA;
$Kiran_toPadma[Kiran::Kiran_halffm_GHA]   = Padma::Padma_halffm_GHA;

$Kiran_toPadma[Kiran::Kiran_halffm_CA]    = Padma::Padma_halffm_CA;
$Kiran_toPadma[Kiran::Kiran_halffm_JA]    = Padma::Padma_halffm_JA;
$Kiran_toPadma[Kiran::Kiran_halffm_ZA]    = Padma::Padma_halffm_ZA;
$Kiran_toPadma[Kiran::Kiran_halffm_JHA]   = Padma::Padma_halffm_JHA;
$Kiran_toPadma[Kiran::Kiran_halffm_NYA]   = Padma::Padma_halffm_NYA;
$Kiran_toPadma[Kiran::Kiran_halffm_NNA]   = Padma::Padma_halffm_NNA;

$Kiran_toPadma[Kiran::Kiran_halffm_TA]    = Padma::Padma_halffm_TA;
$Kiran_toPadma[Kiran::Kiran_halffm_TT]    = Padma::Padma_halffm_TA . Padma::Padma_halffm_TA;
$Kiran_toPadma[Kiran::Kiran_halffm_THA]   = Padma::Padma_halffm_THA;
$Kiran_toPadma[Kiran::Kiran_halffm_DHA]   = Padma::Padma_halffm_DHA;
$Kiran_toPadma[Kiran::Kiran_halffm_NA]    = Padma::Padma_halffm_NA;
$Kiran_toPadma[Kiran::Kiran_halffm_PA]    = Padma::Padma_halffm_PA;
$Kiran_toPadma[Kiran::Kiran_halffm_PHA]   = Padma::Padma_halffm_PHA;

$Kiran_toPadma[Kiran::Kiran_halffm_BA]    = Padma::Padma_halffm_BA;
$Kiran_toPadma[Kiran::Kiran_halffm_BHA]   = Padma::Padma_halffm_BHA;
$Kiran_toPadma[Kiran::Kiran_halffm_MA]    = Padma::Padma_halffm_MA;
$Kiran_toPadma[Kiran::Kiran_halffm_YA]    = Padma::Padma_halffm_YA;
$Kiran_toPadma[Kiran::Kiran_halffm_RA]    = Padma::Padma_halffm_RA;
$Kiran_toPadma[Kiran::Kiran_halffm_RRA]   = Padma::Padma_halffm_RRA;
$Kiran_toPadma[Kiran::Kiran_halffm_LA]    = Padma::Padma_halffm_LA;
$Kiran_toPadma[Kiran::Kiran_halffm_VA]    = Padma::Padma_halffm_VA;

$Kiran_toPadma[Kiran::Kiran_halffm_SHA_1] = Padma::Padma_halffm_SHA;
$Kiran_toPadma[Kiran::Kiran_halffm_SHA_2] = Padma::Padma_halffm_SHA;
$Kiran_toPadma[Kiran::Kiran_halffm_SSA]   = Padma::Padma_halffm_SSA;
$Kiran_toPadma[Kiran::Kiran_halffm_SA]    = Padma::Padma_halffm_SA;
$Kiran_toPadma[Kiran::Kiran_halffm_HA]    = Padma::Padma_halffm_HA;

$Kiran_toPadma[Kiran::Kiran_halffm_SHR]   = Padma::Padma_halffm_SHA . Padma::Padma_halffm_RA;
$Kiran_toPadma[Kiran::Kiran_halffm_TR]    = Padma::Padma_halffm_TA . Padma::Padma_halffm_RA;
$Kiran_toPadma[Kiran::Kiran_halffm_JNY]   = Padma::Padma_halffm_JA . Padma::Padma_halffm_NYA;
$Kiran_toPadma[Kiran::Kiran_halffm_NN]    = Padma::Padma_halffm_NA . Padma::Padma_halffm_NA;

//Conjuncts
$Kiran_toPadma[Kiran::Kiran_conjct_KT]     = Padma::Padma_consnt_KA . Padma::Padma_vattu_TA;
$Kiran_toPadma[Kiran::Kiran_conjct_KSH]    = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA;
$Kiran_toPadma[Kiran::Kiran_conjct_JNY]    = Padma::Padma_consnt_JA . Padma::Padma_vattu_NYA;
$Kiran_toPadma[Kiran::Kiran_conjct_TTTT]   = Padma::Padma_consnt_TTA . Padma::Padma_vattu_TTA;
$Kiran_toPadma[Kiran::Kiran_conjct_TTTTH]  = Padma::Padma_consnt_TTA . Padma::Padma_vattu_TTHA;
$Kiran_toPadma[Kiran::Kiran_conjct_TTHTTH] = Padma::Padma_consnt_TTHA . Padma::Padma_vattu_TTHA;
$Kiran_toPadma[Kiran::Kiran_conjct_T_T]    = Padma::Padma_consnt_TA . Padma::Padma_vattu_TA;
$Kiran_toPadma[Kiran::Kiran_conjct_TR]     = Padma::Padma_consnt_TA . Padma::Padma_vattu_RA;

$Kiran_toPadma[Kiran::Kiran_conjct_D_D]    = Padma::Padma_consnt_DA . Padma::Padma_vattu_DA;
$Kiran_toPadma[Kiran::Kiran_conjct_D_DH]   = Padma::Padma_consnt_DA . Padma::Padma_vattu_DHA;
$Kiran_toPadma[Kiran::Kiran_conjct_DM]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_MA;
$Kiran_toPadma[Kiran::Kiran_conjct_DY]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_YA;
$Kiran_toPadma[Kiran::Kiran_conjct_DV]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_VA;
$Kiran_toPadma[Kiran::Kiran_conjct_DD_DD]  = Padma::Padma_consnt_DDA. Padma::Padma_vattu_DDA;
$Kiran_toPadma[Kiran::Kiran_conjct_DD_DDH] = Padma::Padma_consnt_DDA. Padma::Padma_vattu_DDHA;
$Kiran_toPadma[Kiran::Kiran_conjct_NN]     = Padma::Padma_consnt_NA . Padma::Padma_vattu_NA;

$Kiran_toPadma[Kiran::Kiran_conjct_PHR]    = Padma::Padma_consnt_PHA . Padma::Padma_vattu_RA;
$Kiran_toPadma[Kiran::Kiran_conjct_SHR]    = Padma::Padma_consnt_SHA . Padma::Padma_vattu_RA;
$Kiran_toPadma[Kiran::Kiran_conjct_HR]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_RA;
$Kiran_toPadma[Kiran::Kiran_conjct_HM]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_MA;
$Kiran_toPadma[Kiran::Kiran_conjct_HY]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_YA;
$Kiran_toPadma[Kiran::Kiran_conjct_KTR]    = Padma::Padma_consnt_TA . Padma::Padma_vattu_RA . Padma::Padma_vattu_KA;

//rakar
$Kiran_toPadma[Kiran::Kiran_vattu_RA_1]    = Padma::Padma_vattu_RA;
$Kiran_toPadma[Kiran::Kiran_vattu_RA_2]    = Padma::Padma_vattu_RA;

//Combos
$Kiran_toPadma[Kiran::Kiran_combo_JI]      = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_I;
$Kiran_toPadma[Kiran::Kiran_combo_RU]      = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_U;
$Kiran_toPadma[Kiran::Kiran_combo_RUU]     = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_UU;
$Kiran_toPadma[Kiran::Kiran_combo_TII]     = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_II;
$Kiran_toPadma[Kiran::Kiran_combo_NEE]     = Padma::Padma_consnt_SA . Padma::Padma_vowelsn_EE;
$Kiran_toPadma[Kiran::Kiran_combo_SEE]     = Padma::Padma_consnt_SA . Padma::Padma_vowelsn_EE;
$Kiran_toPadma[Kiran::Kiran_combo_LR]      = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_R;
$Kiran_toPadma[Kiran::Kiran_combo_HR]      = Padma::Padma_consnt_HA . Padma::Padma_vowelsn_R;
$Kiran_toPadma[Kiran::Kiran_combo_KAVA]    = Padma::Padma_consnt_KA . Padma::Padma_vattu_VA; 
$Kiran_toPadma[Kiran::Kiran_combo_TRAY_1]  = Padma::Padma_halffm_TA . Padma::Padma_halffm_RA . Padma::Padma_consnt_YA; 
$Kiran_toPadma[Kiran::Kiran_combo_TRAY_2]  = Padma::Padma_halffm_TA . Padma::Padma_halffm_RA . Padma::Padma_consnt_YA; 

$Kiran_toPadma[Kiran::Kiran_misc_OM]       = Padma::Padma_om;
$Kiran_toPadma[Kiran::Kiran_misc_DANDA]    = Padma::Padma_danda;
$Kiran_toPadma[Kiran::Kiran_nukta]         = Padma::Padma_nukta;

//Does not match ASCII
$Kiran_toPadma[Kiran::Kiran_digit_ZERO]    = Padma::Padma_digit_ZERO;
$Kiran_toPadma[Kiran::Kiran_digit_ONE]     = Padma::Padma_digit_ONE;
$Kiran_toPadma[Kiran::Kiran_digit_TWO]     = Padma::Padma_digit_TWO;
$Kiran_toPadma[Kiran::Kiran_digit_THREE]   = Padma::Padma_digit_THREE;
$Kiran_toPadma[Kiran::Kiran_digit_FOUR]    = Padma::Padma_digit_FOUR;
$Kiran_toPadma[Kiran::Kiran_digit_FIVE]    = Padma::Padma_digit_FIVE;
$Kiran_toPadma[Kiran::Kiran_digit_SIX]     = Padma::Padma_digit_SIX;
$Kiran_toPadma[Kiran::Kiran_digit_SEVEN]   = Padma::Padma_digit_SEVEN;
$Kiran_toPadma[Kiran::Kiran_digit_EIGHT]   = Padma::Padma_digit_EIGHT;
$Kiran_toPadma[Kiran::Kiran_digit_NINE]    = Padma::Padma_digit_NINE;
//$Kiran_toPadma[Kiran::Kiran_SWASTIK]       = "\xE5\x8D\x90";
$Kiran_toPadma[Kiran::Kiran_PLUS]          = ".";
$Kiran_toPadma[Kiran::Kiran_HYPHEN]        = "-";
$Kiran_toPadma[Kiran::Kiran_MULTIPLY]      = "\xC3\x97";//Unicode for multiplication symbol
$Kiran_toPadma[Kiran::Kiran_DIVIDE]        = "\xC3\xB7";//Unicode for division symbol
$Kiran_toPadma[Kiran::Kiran_EQUALS]        = "=";
$Kiran_toPadma[Kiran::Kiran_LESSTHAN]      = "<";
$Kiran_toPadma[Kiran::Kiran_GREATERTHAN]   = ">";
$Kiran_toPadma[Kiran::Kiran_CIRCUMFLEX]    = "^";
$Kiran_toPadma[Kiran::Kiran_CURLYLEFT]     = "{";
$Kiran_toPadma[Kiran::Kiran_CURLYRIGHT]    = "}";
$Kiran_toPadma[Kiran::Kiran_SQBKTLEFT]     = "[";
$Kiran_toPadma[Kiran::Kiran_SQBKTRIGHT]    = "]";
$Kiran_toPadma[Kiran::Kiran_ATSIGN]        = "@";
$Kiran_toPadma[Kiran::Kiran_LIRA]          = "\xE2\x82\xA4";
$Kiran_toPadma[Kiran::Kiran_DOLLAR]        = "$";
$Kiran_toPadma[Kiran::Kiran_HASH]          = "#";
$Kiran_toPadma[Kiran::Kiran_SLASH]         = "/";
$Kiran_toPadma[Kiran::Kiran_BACKSLASH]     = "\x5C";
$Kiran_toPadma[Kiran::Kiran_PERCENT]       = "%";
$Kiran_toPadma[Kiran::Kiran_UNDERSCORE]    = "_";


$Kiran_prefixList = array();
$Kiran_prefixList[Kiran::Kiran_vowelsn_I]  = true;

$Kiran_suffixList = array();
$Kiran_suffixList[Kiran::Kiran_halffm_RA]   = true;
$Kiran_suffixList[Kiran::Kiran_vowelsn_U_2] = true;
$Kiran_suffixList[Kiran::Kiran_vowelsn_UU]  = true;

$Kiran_redundantList = array();
$Kiran_redundantList[Kiran::Kiran_space_1] = true;

$Kiran_overloadList = array();
$Kiran_overloadList[Kiran::Kiran_vowel_A]     = true;
$Kiran_overloadList[Kiran::Kiran_vowel_AA]    = true;
$Kiran_overloadList[Kiran::Kiran_vowel_I]     = true;
$Kiran_overloadList[Kiran::Kiran_vowel_EE]    = true;
$Kiran_overloadList[Kiran::Kiran_vowelsn_AA]  = true;
$Kiran_overloadList[Kiran::Kiran_vowelsn_CDR_E]   = true;
$Kiran_overloadList[Kiran::Kiran_vowel_U]     = true;
$Kiran_overloadList[Kiran::Kiran_consnt_GA]   = true;
$Kiran_overloadList[Kiran::Kiran_consnt_JA]   = true;
$Kiran_overloadList[Kiran::Kiran_consnt_DDA]  = true;
$Kiran_overloadList[Kiran::Kiran_consnt_DDHA] = true;
$Kiran_overloadList[Kiran::Kiran_consnt_PHA]  = true;
$Kiran_overloadList[Kiran::Kiran_consnt_RA]   = true;
$Kiran_overloadList[Kiran::Kiran_halffm_KSH]  = true;
$Kiran_overloadList[Kiran::Kiran_halffm_KHA]  = true;
$Kiran_overloadList[Kiran::Kiran_halffm_GA]   = true;
$Kiran_overloadList[Kiran::Kiran_halffm_GHA]  = true;
$Kiran_overloadList[Kiran::Kiran_halffm_CA]   = true;
$Kiran_overloadList[Kiran::Kiran_halffm_JA]   = true;
$Kiran_overloadList[Kiran::Kiran_halffm_ZA]   = true;
$Kiran_overloadList[Kiran::Kiran_halffm_JHA]  = true;
$Kiran_overloadList[Kiran::Kiran_halffm_NYA]  = true;
$Kiran_overloadList[Kiran::Kiran_halffm_NNA]  = true;
$Kiran_overloadList[Kiran::Kiran_halffm_TT]   = true;
$Kiran_overloadList[Kiran::Kiran_halffm_THA]  = true;
$Kiran_overloadList[Kiran::Kiran_halffm_DHA]  = true;
$Kiran_overloadList[Kiran::Kiran_halffm_NA]   = true;
$Kiran_overloadList[Kiran::Kiran_halffm_BA]   = true;
$Kiran_overloadList[Kiran::Kiran_halffm_BHA]  = true;
$Kiran_overloadList[Kiran::Kiran_halffm_MA]   = true;
$Kiran_overloadList[Kiran::Kiran_halffm_YA]   = true;
$Kiran_overloadList[Kiran::Kiran_halffm_LA]   = true;
$Kiran_overloadList[Kiran::Kiran_halffm_VA]   = true;
$Kiran_overloadList[Kiran::Kiran_halffm_SHA_1]= true;
$Kiran_overloadList[Kiran::Kiran_halffm_SHA_2]= true;
$Kiran_overloadList[Kiran::Kiran_halffm_SHR]  = true;
$Kiran_overloadList[Kiran::Kiran_halffm_SSA]  = true;
$Kiran_overloadList[Kiran::Kiran_halffm_SA]   = true;
$Kiran_overloadList[Kiran::Kiran_halffm_PA]   = true;
$Kiran_overloadList[Kiran::Kiran_halffm_TA]   = true;
$Kiran_overloadList[Kiran::Kiran_halffm_TR]   = true;
$Kiran_overloadList[Kiran::Kiran_halffm_JA]   = true;
$Kiran_overloadList[Kiran::Kiran_halffm_NA]   = true;
$Kiran_overloadList[Kiran::Kiran_halffm_SA]   = true;
$Kiran_overloadList[Kiran::Kiran_halffm_JNY]  = true;
$Kiran_overloadList[Kiran::Kiran_halffm_NN]   = true;
$Kiran_overloadList["\x45\x61"]    = true;

function Kiran_initialize()
{
    global $fontinfo;

    $fontinfo["kiran"]["language"] = "Devanagari";
    $fontinfo["kiran"]["class"] = "Kiran";
    $fontinfo["amruta"]["language"] = "Devanagari";
    $fontinfo["amruta"]["class"] = "Kiran";
    $fontinfo["aarti"]["language"] = "Devanagari";
    $fontinfo["aarti"]["class"] = "Kiran";
}

?>
