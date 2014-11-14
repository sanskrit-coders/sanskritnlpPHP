<?php
/* ***** BEGIN LICENSE BLOCK *****
 *
 *  This file is originally part of Padma.
 *
 *  Copyright (C) 2006 G Karunakar <karunakar@freedomink.org> 
 *  Copyright (C) 2006 Nagarjuna Venna <vnagarjuna@yahoo.com>
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

class Shusha
{
function Shusha()
{
}

//The interface every dynamic font encoding should implement
var $maxLookupLen = 3;
var $fontFace     = "Shusha";
var $displayName  = "Shusha";
var $script       = Padma::Padma_script_DEVANAGARI;
var $hasSuffixes  = true;

function lookup($str) 
{
    global $Shusha_toPadma;
    return $Shusha_toPadma[$str];
}

function isPrefixSymbol($str)
{
    global $Shusha_prefixList;
    return $Shusha_prefixList[$str] != null;
}

function isSuffixSymbol($str)
{
    global $Shusha_suffixList;
    return $Shusha_suffixList[$str] != null;
}

function isOverloaded($str)
{
    global $Shusha_overloadList;
    return $Shusha_overloadList[$str] != null;
}

function handleTwoPartVowelSigns($sign1, $sign2)
{
    if (($sign1 == Padma::Padma_vowelsn_EE && $sign2 == Padma::Padma_vowelsn_AA) ||
        ($sign1 == Padma::Padma_vowelsn_AA && $sign2 == Padma::Padma_vowelsn_EE))
        return Padma::Padma_vowelsn_OO;
    if (($sign1 == Padma::Padma_vowelsn_AI && $sign2 == Padma::Padma_vowelsn_AA) ||
        ($sign1 == Padma::Padma_vowelsn_AA && $sign2 == Padma::Padma_vowelsn_AI))
        return Padma::Padma_vowelsn_AU;
    return $sign1 . $sign2;    
}

function isRedundant($str)
{
    global $Shusha_redundantList;
    return $Shusha_redundantList[$str] != null;
}

//This font unfortunately overloads period and nukta...
//TODO: 218, 214,  181-184, 149-151, 130, 132 - 135, 153, 173, 

//Vowel modifiers
const Shusha_avagraha	    = "\x7C";
const Shusha_anusvara       = "\x4D";
const Shusha_candrabindu    = "\xC3\x90";
const Shusha_visarga	    = "\x3A";
const Shusha_virama         = "\x5C";

//Vowels
const Shusha_vowel_A        = "\x41";
const Shusha_vowel_AA       = "\x41\x61";
const Shusha_vowel_I        = "\x5B";
const Shusha_vowel_II_1     = "\x5B\x2D";
const Shusha_vowel_II_2     = "\xC5\xA1";
const Shusha_vowel_U        = "\x5D";
const Shusha_vowel_UU       = "\x7D";
const Shusha_vowel_R        = "\x3F";
const Shusha_vowel_CDR_E    = "\x65\x5E";
const Shusha_vowel_EE       = "\x65";
const Shusha_vowel_AI       = "\x65\x6F";
const Shusha_vowel_CDR_O    = "\x41\x61\x5E";
const Shusha_vowel_OO_1     = "\x41\x61\x6F";
const Shusha_vowel_OO_2     = "\x41\xC3\x9C";
const Shusha_vowel_AU_1     = "\x41\x61\x4F";
const Shusha_vowel_AU_2     = "\x41\xC3\x9D";

//Consonants
const Shusha_consnt_KA      = "\x6B";
const Shusha_consnt_KHA_1   = "\x23\x61";
const Shusha_consnt_KHA_2   = "\x4B";
const Shusha_consnt_KHHA_1  = "\x4B\x2C";
const Shusha_consnt_KHHA_2  = "\xC3\x93";
const Shusha_consnt_GA      = "\x67\x61";
const Shusha_consnt_GHHA    = "\x67\x61\x2C";
const Shusha_consnt_GHA     = "\x47\x61";
const Shusha_consnt_NGA     = "\x3D";

const Shusha_consnt_CA      = "\x63\x61";
const Shusha_consnt_CHA     = "\x43";
const Shusha_consnt_JA      = "\x6A\x61";
const Shusha_consnt_ZA_1    = "\x6A\x2C\x61";
const Shusha_consnt_ZA_2    = "\x6A\x61\x2C";
const Shusha_consnt_JHA     = "\x4A\x61";
const Shusha_consnt_NYA     = "\x48\x61";

const Shusha_consnt_TTA     = "\x54";
const Shusha_consnt_TTHA    = "\x7A";
const Shusha_consnt_DDA     = "\x44";
const Shusha_consnt_DDDHA   = "\x44\x2C";
const Shusha_consnt_DDHA    = "\x5A";
const Shusha_consnt_RHA     = "\x5A\x2C";
const Shusha_consnt_NNA     = "\x4E\x61";

const Shusha_consnt_TA      = "\x74";
const Shusha_consnt_THA     = "\x71\x61";
const Shusha_consnt_DA      = "\x64";
const Shusha_consnt_DHA     = "\x51\x61";
const Shusha_consnt_NA      = "\x6E\x61";

const Shusha_consnt_PA      = "\x70";
const Shusha_consnt_PHA     = "\x66";
const Shusha_consnt_FA_1    = "\x66\x2C";
const Shusha_consnt_FA_2    = "\xC3\x94";
const Shusha_consnt_BA      = "\x62\x61";
const Shusha_consnt_BHA     = "\x42\x61";
const Shusha_consnt_MA      = "\x6D\x61";

const Shusha_consnt_YA      = "\x79\x61";
const Shusha_consnt_RA      = "\x72";
const Shusha_consnt_LA      = "\x6C\x61";
const Shusha_consnt_VA      = "\x76\x61";
const Shusha_consnt_SHA_1   = "\x53\x61";
const Shusha_consnt_SHA_2   = "\x58\x61";
const Shusha_consnt_SHA_3   = "\xC3\x8F\x61";
const Shusha_consnt_SSA     = "\x59\x61";
const Shusha_consnt_SA      = "\x73\x61";
const Shusha_consnt_HA      = "\x68";
const Shusha_consnt_LLA     = "\x4C";

//Vowel signs
const Shusha_vowelsn_AA     = "\x61";
const Shusha_vowelsn_I      = "\x69";
const Shusha_vowelsn_II     = "\x49";
const Shusha_vowelsn_U      = "\x75";
const Shusha_vowelsn_UU     = "\x55";
const Shusha_vowelsn_R      = "\x52";
const Shusha_vowelsn_CDR_E  = "\x5E";
const Shusha_vowelsn_EE     = "\x6F";
const Shusha_vowelsn_AI     = "\x4F";
const Shusha_vowelsn_CDR_O  = "\x61\x5E";
const Shusha_vowelsn_OO     = "\xC3\x9C";
const Shusha_vowelsn_AU     = "\xC3\x9D";

// Half forms
const Shusha_halffm_KA      = "\x40";
const Shusha_halffm_KSH     = "\x78";
const Shusha_halffm_KHA     = "\x23";
const Shusha_halffm_GA      = "\x67";
const Shusha_halffm_GHA     = "\x47";
const Shusha_halffm_CA      = "\x63";
const Shusha_halffm_JA      = "\x6A";
const Shusha_halffm_ZA      = "\x6A\x2C";
const Shusha_halffm_JHA     = "\x4A";
const Shusha_halffm_NYA     = "\x48";
const Shusha_halffm_NNA     = "\x4E";
const Shusha_halffm_TA      = "\x25";
const Shusha_halffm_TT      = "\x3C";
const Shusha_halffm_THA     = "\x71";
const Shusha_halffm_DHA     = "\x51";
const Shusha_halffm_NA      = "\x6E";
const Shusha_halffm_PA      = "\x50";
const Shusha_halffm_PHA     = "\x46";
const Shusha_halffm_BA      = "\x62";
const Shusha_halffm_BHA     = "\x42";
const Shusha_halffm_MA      = "\x6D";
const Shusha_halffm_YA      = "\x79";
const Shusha_halffm_RA      = "\x2D"; //reph according to Karunakar
const Shusha_halffm_LA      = "\x6C";
const Shusha_halffm_VA      = "\x76";
const Shusha_halffm_SHA_1   = "\x53";
const Shusha_halffm_SHA_2   = "\x58";
const Shusha_halffm_SHA_3   = "\xC3\x8F";
const Shusha_halffm_SHR     = "\x45";
const Shusha_halffm_SSA     = "\x59";
const Shusha_halffm_SA      = "\x73";
const Shusha_halffm_HA      = "\x2A";

//Conjuncts
const Shusha_conjct_KT      = "\x3E";
const Shusha_conjct_KSH     = "\x78\x61";
const Shusha_conjct_KR      = "\xC3\x8B";
const Shusha_conjct_JNY     = "\x26";
const Shusha_conjct_TTTT    = "\x2B";
const Shusha_conjct_TTHTTH  = "\x7B";
const Shusha_conjct_T_T     = "\x3C\x61";
const Shusha_conjct_TR      = "\x7E";
const Shusha_conjct_D_D     = "\x5F";
const Shusha_conjct_D_DH    = "\x77";
const Shusha_conjct_DY      = "\x56";
const Shusha_conjct_DV      = "\x57";
const Shusha_conjct_NN      = "\xC3\x99";
const Shusha_conjct_PHR     = "\xC3\x8D";
const Shusha_conjct_SHR     = "\x45\x61";
const Shusha_conjct_HR      = "\xC5\x93";
const Shusha_conjct_HY      = "\x28";

//rakar
const Shusha_vattu_RA_1     = "\x2F";
const Shusha_vattu_RA_2     = "\x60";

// Combos
const Shusha_combo_KR       = "\xC3\x8C";
const Shusha_combo_JI       = "\xC5\xB8";
const Shusha_combo_PHR      = "\xC3\x8E";
const Shusha_combo_RU       = "\xC3\x89";
const Shusha_combo_RUU      = "\x24";
const Shusha_combo_LR       = "\x3B";
const Shusha_combo_NEE      = "\x6E\xC3\x9C";
const Shusha_combo_SEE      = "\x73\xC3\x9C";
const Shusha_combo_HR       = "\x29";

const Shusha_misc_OM        = "\x21";
const Shusha_misc_DANDA     = "\x2E";

//Matches ASCII
const Shusha_digit_ZERO     = "\x30";
const Shusha_digit_ONE      = "\x31";
const Shusha_digit_TWO      = "\x32";
const Shusha_digit_THREE    = "\x33";
const Shusha_digit_FOUR     = "\x34";
const Shusha_digit_FIVE     = "\x35";
const Shusha_digit_SIX      = "\x36";
const Shusha_digit_SEVEN    = "\x37";
const Shusha_digit_EIGHT    = "\x38";
const Shusha_digit_NINE     = "\x39";
const Shusha_misc_QTDOUBLE  = "\x22";
const Shusha_misc_QTSINGLE  = "\x27";

//Does not match ASCII
const Shusha_PERIOD_1       = "\x2C";
const Shusha_PERCENT        = "\xE2\x80\xB0";
const Shusha_LESSTHAN_1     = "\xE2\x80\xB9";
const Shusha_LQTSINGLE      = "\xE2\x80\x98";
const Shusha_RQTSINGLE      = "\xE2\x80\x99";
const Shusha_LQTDOUBLE      = "\xE2\x80\x9C";
const Shusha_RQTDOUBLE      = "\xE2\x80\x9D";
const Shusha_TILDE          = "\xCB\x9C";
const Shusha_GREATERTHAN_1  = "\xE2\x80\xBA";
const Shusha_CURLYLEFT      = "\xC2\xA1";
const Shusha_CURLYRIGHT     = "\xC2\xA3";
const Shusha_SQBKTLEFT      = "\xC2\xA4";
const Shusha_SQBKTRIGHT     = "\xC2\xA5";
const Shusha_BACKQUOTE      = "\xC2\xAA";
const Shusha_PARENLEFT      = "\xC2\xB3";
const Shusha_PARENRIGHT     = "\xC2\xB4";
const Shusha_HYPHEN         = "\xC2\xB9";
const Shusha_PERIOD_2       = "\xC2\xBA";
const Shusha_SLASH          = "\xC3\x80";
const Shusha_COLON          = "\xC3\x81";
const Shusha_SEMICOLON      = "\xC3\x82";
const Shusha_LESSTHAN_2     = "\xC3\x83";
const Shusha_EQUALS         = "\xC3\x84";
const Shusha_GREATERTHAN_2  = "\xC3\x85";
const Shusha_QUESTION       = "\xC3\x86";
const Shusha_ATSIGN         = "\xC3\x87";
const Shusha_PIPE           = "\xC3\x88";
const Shusha_COMMA          = "\xC3\x8A";
const Shusha_EXCLAMATION_1  = "\xC2\xB2";
const Shusha_EXCLAMATION_2  = "\xC3\x91";
const Shusha_BACKSLASH      = "\xC3\x92";
const Shusha_SQUAREROOT     = "\xC3\x95";
const Shusha_CIRCUMFLEX     = "\xC3\x98";
}

$Shusha_toPadma = Array();

$Shusha_toPadma[Shusha::Shusha_avagraha]   = Padma::Padma_avagraha;
$Shusha_toPadma[Shusha::Shusha_anusvara]   = Padma::Padma_anusvara;
$Shusha_toPadma[Shusha::Shusha_candrabindu] = Padma::Padma_candrabindu;
$Shusha_toPadma[Shusha::Shusha_visarga]    = Shusha::Shusha_visarga;
$Shusha_toPadma[Shusha::Shusha_virama]     = Padma::Padma_syllbreak;

$Shusha_toPadma[Shusha::Shusha_vowel_A]    = Padma::Padma_vowel_A;
$Shusha_toPadma[Shusha::Shusha_vowel_AA]   = Padma::Padma_vowel_AA;
$Shusha_toPadma[Shusha::Shusha_vowel_I]    = Padma::Padma_vowel_I;
$Shusha_toPadma[Shusha::Shusha_vowel_II_1] = Padma::Padma_vowel_II;
$Shusha_toPadma[Shusha::Shusha_vowel_II_2] = Padma::Padma_vowel_II;
$Shusha_toPadma[Shusha::Shusha_vowel_U]    = Padma::Padma_vowel_U;
$Shusha_toPadma[Shusha::Shusha_vowel_UU]   = Padma::Padma_vowel_UU;
$Shusha_toPadma[Shusha::Shusha_vowel_R]    = Padma::Padma_vowel_R;
$Shusha_toPadma[Shusha::Shusha_vowel_CDR_E] = Padma::Padma_vowel_CDR_E;
$Shusha_toPadma[Shusha::Shusha_vowel_EE]   = Padma::Padma_vowel_EE;
$Shusha_toPadma[Shusha::Shusha_vowel_AI]   = Padma::Padma_vowel_AI;
$Shusha_toPadma[Shusha::Shusha_vowel_CDR_O] = Padma::Padma_vowel_CDR_O;
$Shusha_toPadma[Shusha::Shusha_vowel_OO_1] = Padma::Padma_vowel_OO;
$Shusha_toPadma[Shusha::Shusha_vowel_OO_2] = Padma::Padma_vowel_OO;
$Shusha_toPadma[Shusha::Shusha_vowel_AU_1] = Padma::Padma_vowel_AU;
$Shusha_toPadma[Shusha::Shusha_vowel_AU_2] = Padma::Padma_vowel_AU;

$Shusha_toPadma[Shusha::Shusha_consnt_KA]  = Padma::Padma_consnt_KA;
$Shusha_toPadma[Shusha::Shusha_consnt_KHA_1] = Padma::Padma_consnt_KHA;
$Shusha_toPadma[Shusha::Shusha_consnt_KHA_2] = Padma::Padma_consnt_KHA;
$Shusha_toPadma[Shusha::Shusha_consnt_KHHA_1] = Padma::Padma_consnt_KHHA;
$Shusha_toPadma[Shusha::Shusha_consnt_KHHA_2] = Padma::Padma_consnt_KHHA;
$Shusha_toPadma[Shusha::Shusha_consnt_GA]  = Padma::Padma_consnt_GA;
$Shusha_toPadma[Shusha::Shusha_consnt_GHHA] = Padma::Padma_consnt_GHHA;
$Shusha_toPadma[Shusha::Shusha_consnt_GHA] = Padma::Padma_consnt_GHA;
$Shusha_toPadma[Shusha::Shusha_consnt_NGA] = Padma::Padma_consnt_NGA;

$Shusha_toPadma[Shusha::Shusha_consnt_CA]  = Padma::Padma_consnt_CA;
$Shusha_toPadma[Shusha::Shusha_consnt_CHA] = Padma::Padma_consnt_CHA;
$Shusha_toPadma[Shusha::Shusha_consnt_JA]  = Padma::Padma_consnt_JA;
$Shusha_toPadma[Shusha::Shusha_consnt_ZA_1]  = Padma::Padma_consnt_ZA;
$Shusha_toPadma[Shusha::Shusha_consnt_ZA_2]  = Padma::Padma_consnt_ZA;
$Shusha_toPadma[Shusha::Shusha_consnt_JHA] = Padma::Padma_consnt_JHA;
$Shusha_toPadma[Shusha::Shusha_consnt_NYA] = Padma::Padma_consnt_NYA;

$Shusha_toPadma[Shusha::Shusha_consnt_TTA] = Padma::Padma_consnt_TTA;
$Shusha_toPadma[Shusha::Shusha_consnt_TTHA] = Padma::Padma_consnt_TTHA;
$Shusha_toPadma[Shusha::Shusha_consnt_DDA] = Padma::Padma_consnt_DDA;
$Shusha_toPadma[Shusha::Shusha_consnt_DDDHA] = Padma::Padma_consnt_DDDHA;
$Shusha_toPadma[Shusha::Shusha_consnt_DDHA] = Padma::Padma_consnt_DDHA;
$Shusha_toPadma[Shusha::Shusha_consnt_RHA] = Padma::Padma_consnt_RHA;
$Shusha_toPadma[Shusha::Shusha_consnt_NNA] = Padma::Padma_consnt_NNA;

$Shusha_toPadma[Shusha::Shusha_consnt_TA]  = Padma::Padma_consnt_TA;
$Shusha_toPadma[Shusha::Shusha_consnt_THA] = Padma::Padma_consnt_THA;
$Shusha_toPadma[Shusha::Shusha_consnt_DA]  = Padma::Padma_consnt_DA;
$Shusha_toPadma[Shusha::Shusha_consnt_DHA] = Padma::Padma_consnt_DHA;
$Shusha_toPadma[Shusha::Shusha_consnt_NA]  = Padma::Padma_consnt_NA;

$Shusha_toPadma[Shusha::Shusha_consnt_PA]  = Padma::Padma_consnt_PA;
$Shusha_toPadma[Shusha::Shusha_consnt_PHA] = Padma::Padma_consnt_PHA;
$Shusha_toPadma[Shusha::Shusha_consnt_FA_1] = Padma::Padma_consnt_FA;
$Shusha_toPadma[Shusha::Shusha_consnt_FA_2] = Padma::Padma_consnt_FA;
$Shusha_toPadma[Shusha::Shusha_consnt_BA]  = Padma::Padma_consnt_BA;
$Shusha_toPadma[Shusha::Shusha_consnt_BHA] = Padma::Padma_consnt_BHA;
$Shusha_toPadma[Shusha::Shusha_consnt_MA]  = Padma::Padma_consnt_MA;

$Shusha_toPadma[Shusha::Shusha_consnt_YA]  = Padma::Padma_consnt_YA;
$Shusha_toPadma[Shusha::Shusha_consnt_RA]  = Padma::Padma_consnt_RA;
$Shusha_toPadma[Shusha::Shusha_consnt_LA]  = Padma::Padma_consnt_LA;
$Shusha_toPadma[Shusha::Shusha_consnt_VA]  = Padma::Padma_consnt_VA;
$Shusha_toPadma[Shusha::Shusha_consnt_SHA_1] = Padma::Padma_consnt_SHA;
$Shusha_toPadma[Shusha::Shusha_consnt_SHA_2] = Padma::Padma_consnt_SHA;
$Shusha_toPadma[Shusha::Shusha_consnt_SHA_3] = Padma::Padma_consnt_SHA;
$Shusha_toPadma[Shusha::Shusha_consnt_SSA] = Padma::Padma_consnt_SSA;
$Shusha_toPadma[Shusha::Shusha_consnt_SA]  = Padma::Padma_consnt_SA;
$Shusha_toPadma[Shusha::Shusha_consnt_HA]  = Padma::Padma_consnt_HA;
$Shusha_toPadma[Shusha::Shusha_consnt_LLA] = Padma::Padma_consnt_LLA;

//Gunintamulu
$Shusha_toPadma[Shusha::Shusha_vowelsn_AA] = Padma::Padma_vowelsn_AA;
$Shusha_toPadma[Shusha::Shusha_vowelsn_I]  = Padma::Padma_vowelsn_I;
$Shusha_toPadma[Shusha::Shusha_vowelsn_II] = Padma::Padma_vowelsn_II;
$Shusha_toPadma[Shusha::Shusha_vowelsn_U]  = Padma::Padma_vowelsn_U;
$Shusha_toPadma[Shusha::Shusha_vowelsn_UU] = Padma::Padma_vowelsn_UU;
$Shusha_toPadma[Shusha::Shusha_vowelsn_R]  = Padma::Padma_vowelsn_R;
$Shusha_toPadma[Shusha::Shusha_vowelsn_CDR_E] = Padma::Padma_vowelsn_CDR_E;
$Shusha_toPadma[Shusha::Shusha_vowelsn_EE] = Padma::Padma_vowelsn_EE;
$Shusha_toPadma[Shusha::Shusha_vowelsn_AI] = Padma::Padma_vowelsn_AI;
$Shusha_toPadma[Shusha::Shusha_vowelsn_CDR_O] = Padma::Padma_vowelsn_CDR_O;
$Shusha_toPadma[Shusha::Shusha_vowelsn_OO] = Padma::Padma_vowelsn_OO;
$Shusha_toPadma[Shusha::Shusha_vowelsn_AU] = Padma::Padma_vowelsn_AU;

//Halffm
$Shusha_toPadma[Shusha::Shusha_halffm_KA]    = Padma::Padma_halffm_KA;
$Shusha_toPadma[Shusha::Shusha_halffm_KSH]   = Padma::Padma_halffm_KA . Padma::Padma_halffm_SSA;
$Shusha_toPadma[Shusha::Shusha_halffm_KHA]   = Padma::Padma_halffm_KHA;
$Shusha_toPadma[Shusha::Shusha_halffm_GA]    = Padma::Padma_halffm_GA;
$Shusha_toPadma[Shusha::Shusha_halffm_GHA]   = Padma::Padma_halffm_GHA;
$Shusha_toPadma[Shusha::Shusha_halffm_CA]    = Padma::Padma_halffm_CA;
$Shusha_toPadma[Shusha::Shusha_halffm_JA]    = Padma::Padma_halffm_JA;
$Shusha_toPadma[Shusha::Shusha_halffm_ZA]    = Padma::Padma_halffm_ZA;
$Shusha_toPadma[Shusha::Shusha_halffm_JHA]   = Padma::Padma_halffm_JHA;
$Shusha_toPadma[Shusha::Shusha_halffm_NYA]   = Padma::Padma_halffm_NYA;
$Shusha_toPadma[Shusha::Shusha_halffm_NNA]   = Padma::Padma_halffm_NNA;
$Shusha_toPadma[Shusha::Shusha_halffm_TA]    = Padma::Padma_halffm_TA;
$Shusha_toPadma[Shusha::Shusha_halffm_TT]    = Padma::Padma_halffm_TA . Padma::Padma_halffm_TA;
$Shusha_toPadma[Shusha::Shusha_halffm_THA]   = Padma::Padma_halffm_THA;
$Shusha_toPadma[Shusha::Shusha_halffm_DHA]   = Padma::Padma_halffm_DHA;
$Shusha_toPadma[Shusha::Shusha_halffm_NA]    = Padma::Padma_halffm_NA;
$Shusha_toPadma[Shusha::Shusha_halffm_PA]    = Padma::Padma_halffm_PA;
$Shusha_toPadma[Shusha::Shusha_halffm_PHA]   = Padma::Padma_halffm_PHA;
$Shusha_toPadma[Shusha::Shusha_halffm_BA]    = Padma::Padma_halffm_BA;
$Shusha_toPadma[Shusha::Shusha_halffm_BHA]   = Padma::Padma_halffm_BHA;
$Shusha_toPadma[Shusha::Shusha_halffm_MA]    = Padma::Padma_halffm_MA;
$Shusha_toPadma[Shusha::Shusha_halffm_YA]    = Padma::Padma_halffm_YA;
$Shusha_toPadma[Shusha::Shusha_halffm_RA]    = Padma::Padma_halffm_RA;
$Shusha_toPadma[Shusha::Shusha_halffm_LA]    = Padma::Padma_halffm_LA;
$Shusha_toPadma[Shusha::Shusha_halffm_VA]    = Padma::Padma_halffm_VA;
$Shusha_toPadma[Shusha::Shusha_halffm_SHA_1] = Padma::Padma_halffm_SHA;
$Shusha_toPadma[Shusha::Shusha_halffm_SHA_2] = Padma::Padma_halffm_SHA;
$Shusha_toPadma[Shusha::Shusha_halffm_SHA_3] = Padma::Padma_halffm_SHA;
$Shusha_toPadma[Shusha::Shusha_halffm_SHR]   = Padma::Padma_halffm_SHA . Padma::Padma_halffm_RA;
$Shusha_toPadma[Shusha::Shusha_halffm_SSA]   = Padma::Padma_halffm_SSA;
$Shusha_toPadma[Shusha::Shusha_halffm_SA]    = Padma::Padma_halffm_SA;
$Shusha_toPadma[Shusha::Shusha_halffm_HA]    = Padma::Padma_halffm_HA;

//Conjuncts
$Shusha_toPadma[Shusha::Shusha_conjct_KT]     = Padma::Padma_consnt_KA . Padma::Padma_vattu_TA;
$Shusha_toPadma[Shusha::Shusha_conjct_KSH]    = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA;
$Shusha_toPadma[Shusha::Shusha_conjct_KR]     = Padma::Padma_consnt_KA . Padma::Padma_vattu_RA;
$Shusha_toPadma[Shusha::Shusha_conjct_JNY]    = Padma::Padma_consnt_JA . Padma::Padma_vattu_NYA;
$Shusha_toPadma[Shusha::Shusha_conjct_TTTT]   = Padma::Padma_consnt_TTA . Padma::Padma_vattu_TTA;
$Shusha_toPadma[Shusha::Shusha_conjct_TTHTTH] = Padma::Padma_consnt_TTHA . Padma::Padma_vattu_TTHA;
$Shusha_toPadma[Shusha::Shusha_conjct_T_T]    = Padma::Padma_consnt_TA . Padma::Padma_vattu_TA;
$Shusha_toPadma[Shusha::Shusha_conjct_TR]     = Padma::Padma_consnt_TA . Padma::Padma_vattu_RA;
$Shusha_toPadma[Shusha::Shusha_conjct_D_D]    = Padma::Padma_consnt_DA . Padma::Padma_vattu_DA;
$Shusha_toPadma[Shusha::Shusha_conjct_D_DH]   = Padma::Padma_consnt_DA . Padma::Padma_vattu_DHA;
$Shusha_toPadma[Shusha::Shusha_conjct_DY]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_YA;
$Shusha_toPadma[Shusha::Shusha_conjct_DV]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_VA;
$Shusha_toPadma[Shusha::Shusha_conjct_NN]     = Padma::Padma_consnt_NA . Padma::Padma_vattu_NA;
$Shusha_toPadma[Shusha::Shusha_conjct_PHR]    = Padma::Padma_consnt_PHA . Padma::Padma_vattu_RA;
$Shusha_toPadma[Shusha::Shusha_conjct_SHR]    = Padma::Padma_consnt_SHA . Padma::Padma_vattu_RA;
$Shusha_toPadma[Shusha::Shusha_conjct_HR]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_RA;
$Shusha_toPadma[Shusha::Shusha_conjct_HY]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_YA;

$Shusha_toPadma[Shusha::Shusha_vattu_RA_1]    = Padma::Padma_vattu_RA;
$Shusha_toPadma[Shusha::Shusha_vattu_RA_2]    = Padma::Padma_vattu_RA;

$Shusha_toPadma[Shusha::Shusha_combo_KR]      = Padma::Padma_consnt_KA . Padma::Padma_vowelsn_R;
$Shusha_toPadma[Shusha::Shusha_combo_JI]      = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_I;
$Shusha_toPadma[Shusha::Shusha_combo_PHR]     = Padma::Padma_consnt_PHA . Padma::Padma_vowelsn_R;
$Shusha_toPadma[Shusha::Shusha_combo_RU]      = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_U;
$Shusha_toPadma[Shusha::Shusha_combo_RUU]     = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_UU;
$Shusha_toPadma[Shusha::Shusha_combo_NEE]     = Padma::Padma_consnt_SA . Padma::Padma_vowelsn_EE;
$Shusha_toPadma[Shusha::Shusha_combo_SEE]     = Padma::Padma_consnt_SA . Padma::Padma_vowelsn_EE;
$Shusha_toPadma[Shusha::Shusha_combo_LR]      = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_R;
$Shusha_toPadma[Shusha::Shusha_combo_HR]      = Padma::Padma_consnt_HA . Padma::Padma_vowelsn_R;

$Shusha_toPadma[Shusha::Shusha_misc_OM]       = Padma::Padma_om;
$Shusha_toPadma[Shusha::Shusha_misc_DANDA]    = Padma::Padma_danda;

$Shusha_toPadma[Shusha::Shusha_PERIOD_1]      = ".";
$Shusha_toPadma[Shusha::Shusha_PERCENT]       = "%";
$Shusha_toPadma[Shusha::Shusha_LESSTHAN_1]    = "<";
$Shusha_toPadma[Shusha::Shusha_LQTSINGLE]     = "\xE2\x80\x98";
$Shusha_toPadma[Shusha::Shusha_RQTSINGLE]     = "\xE2\x80\x99";
$Shusha_toPadma[Shusha::Shusha_LQTDOUBLE]     = "\xE2\x80\x9C";
$Shusha_toPadma[Shusha::Shusha_RQTDOUBLE]     = "\xE2\x80\x9D";
$Shusha_toPadma[Shusha::Shusha_TILDE]         = "~";
$Shusha_toPadma[Shusha::Shusha_GREATERTHAN_1] = ">";
$Shusha_toPadma[Shusha::Shusha_CURLYLEFT]     = "{";
$Shusha_toPadma[Shusha::Shusha_CURLYRIGHT]    = "}";
$Shusha_toPadma[Shusha::Shusha_SQBKTLEFT]     = "[";
$Shusha_toPadma[Shusha::Shusha_SQBKTRIGHT]    = "]";
$Shusha_toPadma[Shusha::Shusha_BACKQUOTE]     = "`";
$Shusha_toPadma[Shusha::Shusha_PARENLEFT]     = "(";
$Shusha_toPadma[Shusha::Shusha_PARENRIGHT]    = ")";
$Shusha_toPadma[Shusha::Shusha_HYPHEN]        = "-";
$Shusha_toPadma[Shusha::Shusha_PERIOD_2]      = ".";
$Shusha_toPadma[Shusha::Shusha_SLASH]         = "/";
$Shusha_toPadma[Shusha::Shusha_COLON]         = ":";
$Shusha_toPadma[Shusha::Shusha_SEMICOLON]     = ";";
$Shusha_toPadma[Shusha::Shusha_LESSTHAN_2]    = "<";
$Shusha_toPadma[Shusha::Shusha_EQUALS]        = "=";
$Shusha_toPadma[Shusha::Shusha_GREATERTHAN_2] = ">";
$Shusha_toPadma[Shusha::Shusha_QUESTION]      = "?";
$Shusha_toPadma[Shusha::Shusha_ATSIGN]        = "@";
$Shusha_toPadma[Shusha::Shusha_PIPE]          = "|";
$Shusha_toPadma[Shusha::Shusha_COMMA]         = ",";
$Shusha_toPadma[Shusha::Shusha_EXCLAMATION_1] = "!";
$Shusha_toPadma[Shusha::Shusha_EXCLAMATION_2] = "!";
$Shusha_toPadma[Shusha::Shusha_BACKSLASH]     = "\\";
$Shusha_toPadma[Shusha::Shusha_SQUAREROOT]    = "\xE2\x88\x9A";
$Shusha_toPadma[Shusha::Shusha_CIRCUMFLEX]    = "^";

$Shusha_prefixList = Array();
$Shusha_prefixList[Shusha::Shusha_vowelsn_I]  = true;

$Shusha_suffixList = Array();
$Shusha_suffixList[Shusha::Shusha_halffm_RA]  = true;

$Shusha_redundantList = Array();

$Shusha_overloadList = Array();
$Shusha_overloadList[Shusha::Shusha_vowel_A]     = true;
$Shusha_overloadList[Shusha::Shusha_vowel_AA]    = true;
$Shusha_overloadList[Shusha::Shusha_vowel_I]     = true;
$Shusha_overloadList[Shusha::Shusha_vowel_EE]    = true;
$Shusha_overloadList[Shusha::Shusha_consnt_KHA_2] = true;
$Shusha_overloadList[Shusha::Shusha_consnt_GA]   = true;
$Shusha_overloadList[Shusha::Shusha_consnt_JA]   = true;
$Shusha_overloadList[Shusha::Shusha_consnt_DDA]  = true;
$Shusha_overloadList[Shusha::Shusha_consnt_DDHA] = true;
$Shusha_overloadList[Shusha::Shusha_consnt_PHA]  = true;
$Shusha_overloadList[Shusha::Shusha_vowelsn_AA]  = true;
$Shusha_overloadList[Shusha::Shusha_halffm_KSH]  = true;
$Shusha_overloadList[Shusha::Shusha_halffm_KHA]  = true;
$Shusha_overloadList[Shusha::Shusha_halffm_GA]   = true;
$Shusha_overloadList[Shusha::Shusha_halffm_GHA]  = true;
$Shusha_overloadList[Shusha::Shusha_halffm_CA]   = true;
$Shusha_overloadList[Shusha::Shusha_halffm_JA]   = true;
$Shusha_overloadList[Shusha::Shusha_halffm_ZA]   = true;
$Shusha_overloadList[Shusha::Shusha_halffm_JHA]  = true;
$Shusha_overloadList[Shusha::Shusha_halffm_NYA]  = true;
$Shusha_overloadList[Shusha::Shusha_halffm_NNA]  = true;
$Shusha_overloadList[Shusha::Shusha_halffm_TT]   = true;
$Shusha_overloadList[Shusha::Shusha_halffm_THA]  = true;
$Shusha_overloadList[Shusha::Shusha_halffm_DHA]  = true;
$Shusha_overloadList[Shusha::Shusha_halffm_NA]   = true;
$Shusha_overloadList[Shusha::Shusha_halffm_BA]   = true;
$Shusha_overloadList[Shusha::Shusha_halffm_BHA]  = true;
$Shusha_overloadList[Shusha::Shusha_halffm_MA]   = true;
$Shusha_overloadList[Shusha::Shusha_halffm_YA]   = true;
$Shusha_overloadList[Shusha::Shusha_halffm_LA]   = true;
$Shusha_overloadList[Shusha::Shusha_halffm_VA]   = true;
$Shusha_overloadList[Shusha::Shusha_halffm_SHA_1] = true;
$Shusha_overloadList[Shusha::Shusha_halffm_SHA_2] = true;
$Shusha_overloadList[Shusha::Shusha_halffm_SHA_3] = true;
$Shusha_overloadList[Shusha::Shusha_halffm_SHR]  = true;
$Shusha_overloadList[Shusha::Shusha_halffm_SSA]  = true;
$Shusha_overloadList[Shusha::Shusha_halffm_SA]   = true;

function Shusha_initialize()
{
    global $fontinfo;

    $fontinfo["shusha"]["language"] = "Devanagari";
    $fontinfo["shusha"]["class"] = "Shusha";
}
?>
