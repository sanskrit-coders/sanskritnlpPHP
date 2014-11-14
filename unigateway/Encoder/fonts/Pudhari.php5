<?php
/* ***** BEGIN LICENSE BLOCK *****
 *
 *  Copyright (C) 2007 Kinshul Verma <kinshul20@gmail.com>
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

//SHREE-PUDHARI Devanagari
class Pudhari
{
function Pudhari()
{
}

//Generate the slightly different lookup tables

var $maxLookupLen      = 4;
var $fontFace          = "SHREE-PUDHARI";
var $displayName       = "Pudhari";
var $script            = Padma::Padma_script_DEVANAGARI;
var $hasSuffixes       = true;

function lookup ($str)
{
    global $Pudhari_toPadma;
    return $Pudhari_toPadma[$str];
}

function isPrefixSymbol ($str)
{
    global $Pudhari_prefixList;
    return array_key_exists($str, $Pudhari_prefixList);
}

function isSuffixSymbol ($str)
{
    global $Pudhari_suffixList;
    return array_key_exists($str, $Pudhari_suffixList);
}

function isOverloaded ($str)
{
    global $Pudhari_overloadList;
    return array_key_exists($str, $Pudhari_overloadList);
}

function handleTwoPartVowelSigns ($sign1, $sign2)
{
    if (($sign1 == Padma::Padma_vowelsn_EE && $sign2 == Padma::Padma_vowelsn_AA) ||
        ($sign1 == Padma::Padma_vowelsn_AA && $sign2 == Padma::Padma_vowelsn_EE))
    return Padma::Padma_vowelsn_OO;  
    if (($sign1 == Padma::Padma_vowelsn_CDR_E && $sign2 == Padma::Padma_vowelsn_AA) ||
        ($sign1 == Padma::Padma_vowelsn_AA && $sign2 == Padma::Padma_vowelsn_CDR_E))
    return Padma::Padma_vowelsn_CDR_O;  
    if (($sign1 == Padma::Padma_vowelsn_AI && $sign2 == Padma::Padma_vowelsn_AA) ||
        ($sign1 == Padma::Padma_vowelsn_AA && $sign2 == Padma::Padma_vowelsn_AI))
        return Padma::Padma_vowelsn_AU;
    return $sign1 . $sign2;    
}

function isRedundant ($str)
{
    global $Pudhari_redundantList;
    return array_key_exists($str, $Pudhari_redundantList);
}


//TODO: 
//Specials
const Pudhari_avagraha       = "\x40";
const Pudhari_anusvara_1     = "\xC2\xA7";
const Pudhari_anusvara_2     = "\xC2\xA8";
const Pudhari_candrabindu    = "\xC2\xB1";
const Pudhari_virama         = "\xC2\xB2";
const Pudhari_visarga        = "\x3A";//check

//Vowels
const Pudhari_vowel_A        = "\x41";
const Pudhari_vowel_AA       = "\x41\x6D";
const Pudhari_vowel_I        = "\x42";
const Pudhari_vowel_II       = "\x42\xC2\xA9";
const Pudhari_vowel_U        = "\x43";
const Pudhari_vowel_UU       = "\x44";
const Pudhari_vowel_R        = "\x47";         
const Pudhari_vowel_RR       = "\x46";      
const Pudhari_vowel_CDR_E    = "\x45\xC2\xB0";
const Pudhari_vowel_EE       = "\x45";
const Pudhari_vowel_AI       = "\x45\x6F";
const Pudhari_vowel_CDR_O    = "\x41\x6D\xC2\xB0";
const Pudhari_vowel_OO       = "\x41\x6D\x6F";
const Pudhari_vowel_AU       = "\x41\x6D\xC2\xA1";

//Consonants
const Pudhari_consnt_KA      = "\x48";
const Pudhari_consnt_KHA_1   = "\xC2\xBB\x6D";
const Pudhari_consnt_KHA_2   = "\x49";
const Pudhari_consnt_KHHA_1  = "\xCB\x9C";
const Pudhari_consnt_KHHA_2  = "\xE2\x84\xA2\x6D";
const Pudhari_consnt_GA_1    = "\xC2\xBD\x6D";
const Pudhari_consnt_GA_2    = "\x4A";
const Pudhari_consnt_GHA     = "\x4B";
const Pudhari_consnt_NGA     = "\x4C";

const Pudhari_consnt_CA_1    = "\xC3\x80\x6D";
const Pudhari_consnt_CA_2    = "\x4D";
const Pudhari_consnt_CHA     = "\x4E";
const Pudhari_consnt_JA      = "\x4F";
const Pudhari_consnt_ZA      = "\xC3\x81\xC2\xB5\x6D";
const Pudhari_consnt_JHA     = "\x50";

const Pudhari_consnt_TTA     = "\x51";
const Pudhari_consnt_TTHA    = "\x52";
const Pudhari_consnt_DDA     = "\x53";
const Pudhari_consnt_DDDHA   = "\x53\xE2\x80\xB9";
const Pudhari_consnt_DDHA    = "\x54";
const Pudhari_consnt_RHA     = "\x54\xE2\x80\xB9";
const Pudhari_consnt_NNA     = "\x55";

const Pudhari_consnt_TA_1    = "\xC3\x8B\x6D";
const Pudhari_consnt_TA_2    = "\x56";
//Pudhari.consnt_TA_3    = "\x6D";
const Pudhari_consnt_THA_1   = "\xC3\x8F\x6D";
const Pudhari_consnt_THA_2   = "\x57";
const Pudhari_consnt_DA      = "\x58";
const Pudhari_consnt_DHA_1   = "\xC3\x9C\x6D";
const Pudhari_consnt_DHA_2   = "\x59";
const Pudhari_consnt_NA_1    = "\x5A";
const Pudhari_consnt_NA_2    = "\xC3\x9D\x6D";
const Pudhari_consnt_SHA     = "\x65"; 

const Pudhari_consnt_PA_1    = "\x6E";
const Pudhari_consnt_PA_2    = "\xC3\x9F\x6D";
const Pudhari_consnt_PHA     = "\x5C";
const Pudhari_consnt_BA      = "\x7E";
const Pudhari_consnt_BHA_1   = "\xC3\xA4\x6D";
const Pudhari_consnt_BHA_2   = "\x5E";
const Pudhari_consnt_MA_1    = "\xC3\xA5\x6D";
const Pudhari_consnt_MA_2    = "\x5F";

const Pudhari_consnt_YA_1    = "\xC3\xA6\x6D";
const Pudhari_consnt_YA_2    = "\x60";
const Pudhari_consnt_RA      = "\x61";
const Pudhari_consnt_LA_1    = "\x63";
const Pudhari_consnt_LA_2    = "\xC3\xAB\x6D";
const Pudhari_consnt_LA_3    = "\x62";
const Pudhari_consnt_VA      = "\x64";
const Pudhari_consnt_SHA_1   = "\xC3\xAD\x6D";
const Pudhari_consnt_SHA_2   = "\xC3\xBB\x6D";
const Pudhari_consnt_SSA_1   = "\xC3\xAE\x6D";
const Pudhari_consnt_SSA_2   = "\x66";
const Pudhari_consnt_SA_1    = "\x67";
const Pudhari_consnt_SA_2    = "\xC3\xB1\x6D";
const Pudhari_consnt_HA      = "\x68";
const Pudhari_consnt_LLA     = "\x69";

//Gunintamulu
const Pudhari_vowelsn_AA     = "\x6D";
const Pudhari_vowelsn_I_1    = "\x70";
const Pudhari_vowelsn_I_2    = "\x7B";
const Pudhari_vowelsn_I_3    = "\x5B";
const Pudhari_vowelsn_II_1   = "\x72";
const Pudhari_vowelsn_II_2   = "\x73";
const Pudhari_vowelsn_U_1    = "\x78";
const Pudhari_vowelsn_U_2    = "\x77";       
const Pudhari_vowelsn_U_3    = "\xC3\xBE";       
const Pudhari_vowelsn_UU_1   = "\x7A";
const Pudhari_vowelsn_UU_2   = "\x79";   
const Pudhari_vowelsn_UU_3   = "\xC3\xBF";   
const Pudhari_vowelsn_R      = "\xC2\xA5";
const Pudhari_vowelsn_RR     = "\xC2\xA6";
const Pudhari_vowelsn_CDR_E  = "\xC2\xB0";
const Pudhari_vowelsn_EE     = "\x6F";
const Pudhari_vowelsn_AI     = "\xC2\xA1";
const Pudhari_vowelsn_OO     = "\x6F\x6D";
const Pudhari_vowelsn_AU     = "\xC2\xA1\x6D";

//Vowel + anusvara
const Pudhari_vowel_IIM      = "\x42\xC2\xAA";
//Matra + modifier
const Pudhari_vowelsn_IM     = "\x71";

//Half Forms
const Pudhari_halffm_KA      = "\xC5\xA0";    //NOT PRESENT IN AMARUJALA
const Pudhari_halffm_KSH     = "\xC3\xBA";
const Pudhari_halffm_KHA     = "\xC2\xBB";
const Pudhari_halffm_KHHA    = "\xE2\x84\xA2";
const Pudhari_halffm_GA      = "\xC2\xBD";
const Pudhari_halffm_GHA     = "\xC2\xBF";
const Pudhari_halffm_CA      = "\xC3\x80";
const Pudhari_halffm_JA_1    = "\xC3\x81";
const Pudhari_halffm_JJ      = "\xE2\x80\x9A";
const Pudhari_halffm_ZA_1    = "\xC3\x81\xC2\xB5";
const Pudhari_halffm_JHA     = "\xC3\x82";
const Pudhari_halffm_NYA     = "\xC3\x84";
const Pudhari_halffm_NNA     = "\xC3\x8A";
const Pudhari_halffm_TA      = "\xC3\x8B";
const Pudhari_halffm_TT      = "\xC3\x8E";   
const Pudhari_halffm_TR      = "\xC3\x8D";
const Pudhari_halffm_THA     = "\xC3\x8F";
const Pudhari_halffm_DHA     = "\xC3\x9C";
const Pudhari_halffm_NA      = "\xC3\x9D";
const Pudhari_halffm_PA      = "\xC3\x9F";
const Pudhari_halffm_PHA     = "\xC3\xA2";
const Pudhari_halffm_BA      = "\xC3\xA3";   
const Pudhari_halffm_BHA     = "\xC3\xA4";
const Pudhari_halffm_MA      = "\xC3\xA5";
const Pudhari_halffm_YA      = "\xC3\xA6";
const Pudhari_halffm_RA      = "\xC2\xA9";
const Pudhari_halffm_LA      = "\xC3\xAB";
const Pudhari_halffm_VA      = "\xC3\xAC";
const Pudhari_halffm_SHA_1   = "\xC3\xBB";  
const Pudhari_halffm_SHA_2   = "\xC3\xAD";
const Pudhari_halffm_SHR     = "\xC3\xBB\xC5\x92";
const Pudhari_halffm_SSA     = "\xC3\xAE";
const Pudhari_halffm_SA      = "\xC3\xB1";
const Pudhari_halffm_HA_1    = "\xC3\xB4";
const Pudhari_halffm_HA_2    = "\xC3\x91";
const Pudhari_halffm_LLA     = "\xC3\xB9";
const Pudhari_halffm_RRA     = "\xC3\xA8";

//Conjuncts
const Pudhari_conjct_KK      = "\xC2\xB8";
const Pudhari_conjct_KV      = "\xC2\xB9";
const Pudhari_conjct_KT      = "\xC2\xBA";
const Pudhari_conjct_KSH     = "\x6A";
const Pudhari_conjct_KSHA    = "\xC3\xBA\x6D";
//Pudhari.conjct_KSHEE   = "\xC3\xBA\x6D\x6F";//check
const Pudhari_conjct_KHR     = "\xC2\xBC";
const Pudhari_conjct_NGK     = "\xE2\x80\x98";
const Pudhari_conjct_NGKH    = "\xE2\x80\x99";
const Pudhari_conjct_GNA     = "\xC2\xBE";
const Pudhari_conjct_DNA     = "\xC3\x96";
const Pudhari_conjct_SNA     = "\xC3\xBD";
const Pudhari_conjct_SCA     = "\xC3\xBC";
const Pudhari_conjct_NGM     = "\xC2\xB6";
const Pudhari_conjct_NGG     = "\xE2\x80\x9C";
const Pudhari_conjct_NGGH    = "\xE2\x80\x9D";
const Pudhari_conjct_CC      = "\xC6\x92";
const Pudhari_conjct_JNY     = "\x6B";
const Pudhari_conjct_JHR     = "\xC3\x83";
const Pudhari_conjct_NYC     = "\x23\x6D";
const Pudhari_conjct_JJ      = "\xE2\x80\x9A\x6D";
const Pudhari_conjct_TT      = "\xC3\x8E\x6D";
const Pudhari_conjct_TTTT    = "\xC3\x85";
const Pudhari_conjct_TT_TTH  = "\xC3\x86";
const Pudhari_conjct_TTHTTH  = "\xC3\x87";  
const Pudhari_conjct_DDDD    = "\xC3\x88";
const Pudhari_conjct_DD_DDH  = "\xE2\x80\x93";
const Pudhari_conjct_DDHDDH  = "\xC3\x89";
const Pudhari_conjct_TR_1    = "\xC3\x8D\xC2\xAB\x6D";
const Pudhari_conjct_TR_2    = "\xC3\x8C";
//Pudhari.conjct_TN      = "\xC3\x8B\xC2\xB3\x6D"; //check
const Pudhari_conjct_DG      = "\xC3\x92";
const Pudhari_conjct_DGH     = "\xC3\x93";
const Pudhari_conjct_DD      = "\xC3\x94";
const Pudhari_conjct_D_DH    = "\xC3\x95";
const Pudhari_conjct_DB      = "\xC3\x97";
const Pudhari_conjct_DBH     = "\xC3\x98";
const Pudhari_conjct_DM      = "\xC3\x99";
const Pudhari_conjct_DY      = "\xC3\x9A";
const Pudhari_conjct_DV      = "\xC3\x9B";
const Pudhari_conjct_NN      = "\xC3\x9E";
const Pudhari_conjct_PT      = "\xC3\xA1";
const Pudhari_conjct_LL      = "\xE2\x80\x9E";  
const Pudhari_conjct_SHC     = "\xC3\xB3";
const Pudhari_conjct_SHR     = "\x6C";
const Pudhari_conjct_SHREE   = "\xC3\xBB\xC5\x92\x6F\x6D";
const Pudhari_conjct_SHV     = "\xC5\x93";
const Pudhari_conjct_SSTT    = "\xC3\xAF";
const Pudhari_conjct_SSTTV   = "\xC3\xAF\xE2\x80\xB0";
const Pudhari_conjct_SSTTH   = "\xC3\xB0";
const Pudhari_conjct_STR     = "\xC3\xB2";
const Pudhari_conjct_HNN     = "\xE2\x80\xA0";
const Pudhari_conjct_HN      = "\xE2\x80\xA2";
const Pudhari_conjct_HM      = "\xC3\xB7";
const Pudhari_conjct_HY      = "\xC3\xB8";
const Pudhari_conjct_HR      = "\xC3\xB5";
const Pudhari_conjct_HL      = "\xE2\x80\xA1";
const Pudhari_conjct_HV      = "\xCB\x86";
const Pudhari_conjct_PR      = "\xC3\xA0";
const Pudhari_conjct_DR      = "\xC3\x90";
const Pudhari_conjct_RU      = "\xC2\xAE";
const Pudhari_conjct_RUU     = "\xC2\xAF";


//Vowel $signs + anusvara
const Pudhari_vowelsn_IIN    = "\x74";
const Pudhari_vowelsn_EEN    = "\x7C";
const Pudhari_vowelsn_AIN    = "\xC2\xA2";

//Vowel $signs + RA
const Pudhari_vowelsn_II_RA  = "\x75";
const Pudhari_vowelsn_EE_RA  = "\x7D";
const Pudhari_vowelsn_AA_RA  = "\x6D\xC2\xA9";
const Pudhari_vowelsn_AI_RA  = "\xC2\xA3";

//Vowel $sign + anusvara + RA
const Pudhari_vowelsn_IIN_RA = "\x76";
const Pudhari_vowelsn_EEN_RA = "\x5D";
const Pudhari_vowelsn_AIN_RA = "\xC2\xA4";


//Combos
const Pudhari_combo_RU       = "\xC3\xA9";
const Pudhari_combo_RUU      = "\xC3\xAA";
const Pudhari_conjct_SHAU    = "\x65\xC2\xA1";
const Pudhari_combo_HR       = "\xC3\xB6";

//Half forms of RA
const Pudhari_halffm_RA_ANU  = "\xC2\xAA";

const Pudhari_vattu_YA       = "\xC3\xA7";
const Pudhari_vattu_RA_1     = "\xC5\x92";
const Pudhari_vattu_RA_2     = "\xC2\xAB";
const Pudhari_vattu_RA_3     = "\xE2\x80\x94";
const Pudhari_vattu_RA_4     = "\xC2\xB3";
const Pudhari_vattu_RA_5     = "\xC2\xB4";
const Pudhari_vattu_VA       = "\xE2\x80\xB2";

const Pudhari_misc_DANDA     = "\x26";
const Pudhari_misc_OM        = "\xE2\x80\xBA";
const Pudhari_misc_ABBREV    = "\x30";
const Pudhari_nukta_1        = "\xC2\xB5";
const Pudhari_nukta_2        = "\xE2\x80\xB9";

//Digits
const Pudhari_digit_ZERO     = "\x30";
const Pudhari_digit_ONE      = "\x31";
const Pudhari_digit_TWO      = "\x32";
const Pudhari_digit_THREE    = "\x33";
const Pudhari_digit_FOUR     = "\x34";
const Pudhari_digit_FIVE     = "\x35";
const Pudhari_digit_SIX      = "\x36";
const Pudhari_digit_SEVEN    = "\x37";
const Pudhari_digit_EIGHT    = "\x38";
const Pudhari_digit_NINE     = "\x39";

//Matches ASCII
const Pudhari_EXCLAM         = "\x21";
const Pudhari_PAREN_LEFT     = "\x28";
const Pudhari_PAREN_RIGHT    = "\x29";
const Pudhari_ASTERISK       = "\x2A";
const Pudhari_PLUS           = "\x2B";
const Pudhari_COMMA          = "\x2C";
const Pudhari_HYPHEN         = "\x2D";
const Pudhari_PERIOD         = "\x2E";
const Pudhari_SLASH          = "\x2F";
const Pudhari_SEMICOLON      = "\x3B";
const Pudhari_EQUALS         = "\x3D";
const Pudhari_QUESTION       = "\x3F";

//Does not match ASCII
const Pudhari_extra_QTSINGLE_1 = "\x22";
const Pudhari_extra_QTSINGLE_2 = "\x27";
const Pudhari_MULTIPLY         = "\xC2\x81";
const Pudhari_MINUS_1          = "\xC2\xAD";
const Pudhari_MINUS_2          = "\xC2\x8D";
const Pudhari_PERCENT          = "\x25";
const Pudhari_extra_COLON_1    = "\x3A";
const Pudhari_extra_COLON_2    = "\xE2\x80\xA6";
const Pudhari_underscore       = "\xC5\xA1";

//Unknown list
const Pudhari_misc_UNKNOWN_1 = "\x24";  
const Pudhari_misc_UNKNOWN_2 = "\x3E"; 
const Pudhari_misc_UNKNOWN_3 = "\xC5\xB8"; 

}

$Pudhari_toPadma = array();

$Pudhari_toPadma[Pudhari::Pudhari_avagraha]    = Padma::Padma_avagraha;
$Pudhari_toPadma[Pudhari::Pudhari_anusvara_1]  = Padma::Padma_anusvara;
$Pudhari_toPadma[Pudhari::Pudhari_anusvara_2]  = Padma::Padma_anusvara;
$Pudhari_toPadma[Pudhari::Pudhari_candrabindu] = Padma::Padma_candrabindu;
$Pudhari_toPadma[Pudhari::Pudhari_virama]      = Padma::Padma_syllbreak;
$Pudhari_toPadma[Pudhari::Pudhari_visarga]     = Padma::Padma_visarga;

$Pudhari_toPadma[Pudhari::Pudhari_vowel_A]    = Padma::Padma_vowel_A;
$Pudhari_toPadma[Pudhari::Pudhari_vowel_AA]   = Padma::Padma_vowel_AA;
$Pudhari_toPadma[Pudhari::Pudhari_vowel_I]    = Padma::Padma_vowel_I;
$Pudhari_toPadma[Pudhari::Pudhari_vowel_II]   = Padma::Padma_vowel_II;
$Pudhari_toPadma[Pudhari::Pudhari_vowel_U]    = Padma::Padma_vowel_U;
$Pudhari_toPadma[Pudhari::Pudhari_vowel_UU]   = Padma::Padma_vowel_UU;
$Pudhari_toPadma[Pudhari::Pudhari_vowel_R]    = Padma::Padma_vowel_R;
$Pudhari_toPadma[Pudhari::Pudhari_vowel_RR]   = Padma::Padma_vowel_RR;            
$Pudhari_toPadma[Pudhari::Pudhari_vowel_CDR_E]= Padma::Padma_vowel_CDR_E;
$Pudhari_toPadma[Pudhari::Pudhari_vowel_EE]   = Padma::Padma_vowel_EE;
$Pudhari_toPadma[Pudhari::Pudhari_vowel_AI]   = Padma::Padma_vowel_AI;
$Pudhari_toPadma[Pudhari::Pudhari_vowel_CDR_O]= Padma::Padma_vowel_CDR_O;
$Pudhari_toPadma[Pudhari::Pudhari_vowel_OO]   = Padma::Padma_vowel_OO;
$Pudhari_toPadma[Pudhari::Pudhari_vowel_AU]   = Padma::Padma_vowel_AU;

$Pudhari_toPadma[Pudhari::Pudhari_consnt_KA]    = Padma::Padma_consnt_KA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_KHA_1] = Padma::Padma_consnt_KHA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_KHA_2] = Padma::Padma_consnt_KHA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_KHHA_1]= Padma::Padma_consnt_KHHA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_KHHA_2]= Padma::Padma_consnt_KHHA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_GA_1]  = Padma::Padma_consnt_GA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_GA_2]  = Padma::Padma_consnt_GA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_GHA]   = Padma::Padma_consnt_GHA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_NGA]   = Padma::Padma_consnt_NGA;

$Pudhari_toPadma[Pudhari::Pudhari_consnt_CA_1]  = Padma::Padma_consnt_CA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_CA_2]  = Padma::Padma_consnt_CA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_CHA]   = Padma::Padma_consnt_CHA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_JA]    = Padma::Padma_consnt_JA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_ZA]    = Padma::Padma_consnt_ZA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_JHA]   = Padma::Padma_consnt_JHA;

$Pudhari_toPadma[Pudhari::Pudhari_consnt_TTA]   = Padma::Padma_consnt_TTA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_TTHA]  = Padma::Padma_consnt_TTHA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_DDA]   = Padma::Padma_consnt_DDA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_DDDHA] = Padma::Padma_consnt_DDDHA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_DDHA]  = Padma::Padma_consnt_DDHA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_RHA]   = Padma::Padma_consnt_RHA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_NNA]   = Padma::Padma_consnt_NNA;

$Pudhari_toPadma[Pudhari::Pudhari_consnt_TA_1]  = Padma::Padma_consnt_TA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_TA_2]  = Padma::Padma_consnt_TA;
//Pudhari.toPadma[Pudhari.consnt_TA_3]  = Padma::Padma_consnt_TA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_THA_1] = Padma::Padma_consnt_THA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_THA_2] = Padma::Padma_consnt_THA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_DA]    = Padma::Padma_consnt_DA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_DHA_1] = Padma::Padma_consnt_DHA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_DHA_2] = Padma::Padma_consnt_DHA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_NA_1]  = Padma::Padma_consnt_NA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_NA_2]  = Padma::Padma_consnt_NA;

$Pudhari_toPadma[Pudhari::Pudhari_consnt_PA_1]  = Padma::Padma_consnt_PA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_PA_2]  = Padma::Padma_consnt_PA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_PHA]   = Padma::Padma_consnt_PHA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_BA]    = Padma::Padma_consnt_BA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_BHA_1] = Padma::Padma_consnt_BHA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_BHA_2] = Padma::Padma_consnt_BHA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_MA_1]  = Padma::Padma_consnt_MA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_MA_2]  = Padma::Padma_consnt_MA;

$Pudhari_toPadma[Pudhari::Pudhari_consnt_YA_1]  = Padma::Padma_consnt_YA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_YA_2]  = Padma::Padma_consnt_YA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_RA]    = Padma::Padma_consnt_RA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_LA_1]  = Padma::Padma_consnt_LA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_LA_2]  = Padma::Padma_consnt_LA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_LA_3]  = Padma::Padma_consnt_LA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_VA]    = Padma::Padma_consnt_VA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_SHA]   = Padma::Padma_consnt_SHA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_SHA_1] = Padma::Padma_consnt_SHA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_SHA_2] = Padma::Padma_consnt_SHA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_SSA_1] = Padma::Padma_consnt_SSA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_SSA_2] = Padma::Padma_consnt_SSA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_SA_1]  = Padma::Padma_consnt_SA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_SA_2]  = Padma::Padma_consnt_SA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_HA]    = Padma::Padma_consnt_HA;
$Pudhari_toPadma[Pudhari::Pudhari_consnt_LLA]   = Padma::Padma_consnt_LLA;

//Gunintamulu
$Pudhari_toPadma[Pudhari::Pudhari_vowelsn_AA]   = Padma::Padma_vowelsn_AA;
$Pudhari_toPadma[Pudhari::Pudhari_vowelsn_I_1]  = Padma::Padma_vowelsn_I;
$Pudhari_toPadma[Pudhari::Pudhari_vowelsn_I_2]  = Padma::Padma_vowelsn_I;
$Pudhari_toPadma[Pudhari::Pudhari_vowelsn_I_3]  = Padma::Padma_vowelsn_I;
$Pudhari_toPadma[Pudhari::Pudhari_vowelsn_II_1] = Padma::Padma_vowelsn_II;
$Pudhari_toPadma[Pudhari::Pudhari_vowelsn_II_2] = Padma::Padma_vowelsn_II;
$Pudhari_toPadma[Pudhari::Pudhari_vowelsn_U_1]  = Padma::Padma_vowelsn_U;
$Pudhari_toPadma[Pudhari::Pudhari_vowelsn_U_2]  = Padma::Padma_vowelsn_U;
$Pudhari_toPadma[Pudhari::Pudhari_vowelsn_U_3]  = Padma::Padma_vowelsn_U;
$Pudhari_toPadma[Pudhari::Pudhari_vowelsn_UU_1] = Padma::Padma_vowelsn_UU;
$Pudhari_toPadma[Pudhari::Pudhari_vowelsn_UU_2] = Padma::Padma_vowelsn_UU;
$Pudhari_toPadma[Pudhari::Pudhari_vowelsn_UU_3] = Padma::Padma_vowelsn_UU;
$Pudhari_toPadma[Pudhari::Pudhari_vowelsn_R]    = Padma::Padma_vowelsn_R;
$Pudhari_toPadma[Pudhari::Pudhari_vowelsn_RR]   = Padma::Padma_vowelsn_RR;
$Pudhari_toPadma[Pudhari::Pudhari_vowelsn_CDR_E]= Padma::Padma_vowelsn_CDR_E;
$Pudhari_toPadma[Pudhari::Pudhari_vowelsn_EE]   = Padma::Padma_vowelsn_EE;
$Pudhari_toPadma[Pudhari::Pudhari_vowelsn_AI]   = Padma::Padma_vowelsn_AI;
$Pudhari_toPadma[Pudhari::Pudhari_vowelsn_OO]   = Padma::Padma_vowelsn_OO;
$Pudhari_toPadma[Pudhari::Pudhari_vowelsn_AU]   = Padma::Padma_vowelsn_AU;

//Vowel . anusvara
$Pudhari_toPadma[Pudhari::Pudhari_vowel_IIM]    = Padma::Padma_vowel_II . Padma::Padma_anusvara;
//matra . modifier
$Pudhari_toPadma[Pudhari::Pudhari_vowelsn_IM]   = Padma::Padma_vowelsn_I . Padma::Padma_anusvara;

//Halffm
$Pudhari_toPadma[Pudhari::Pudhari_halffm_KA]   = Padma::Padma_halffm_KA;
$Pudhari_toPadma[Pudhari::Pudhari_halffm_KSH]  = Padma::Padma_halffm_KA . Padma::Padma_halffm_SSA;
$Pudhari_toPadma[Pudhari::Pudhari_halffm_KHA]  = Padma::Padma_halffm_KHA;
$Pudhari_toPadma[Pudhari::Pudhari_halffm_KHHA] = Padma::Padma_halffm_KHHA;
$Pudhari_toPadma[Pudhari::Pudhari_halffm_GA]   = Padma::Padma_halffm_GA;
$Pudhari_toPadma[Pudhari::Pudhari_halffm_GHA]  = Padma::Padma_halffm_GHA;
$Pudhari_toPadma[Pudhari::Pudhari_halffm_CA]   = Padma::Padma_halffm_CA;
$Pudhari_toPadma[Pudhari::Pudhari_halffm_JA_1] = Padma::Padma_halffm_JA;
$Pudhari_toPadma[Pudhari::Pudhari_halffm_JJ]   = Padma::Padma_halffm_JA . Padma::Padma_halffm_JA;
$Pudhari_toPadma[Pudhari::Pudhari_halffm_ZA_1] = Padma::Padma_halffm_ZA;
$Pudhari_toPadma[Pudhari::Pudhari_halffm_JHA]  = Padma::Padma_halffm_JHA;
$Pudhari_toPadma[Pudhari::Pudhari_halffm_NYA]  = Padma::Padma_halffm_NYA;
$Pudhari_toPadma[Pudhari::Pudhari_halffm_NNA]  = Padma::Padma_halffm_NNA;
$Pudhari_toPadma[Pudhari::Pudhari_halffm_TA]   = Padma::Padma_halffm_TA;
$Pudhari_toPadma[Pudhari::Pudhari_halffm_TT]   = Padma::Padma_halffm_TA . Padma::Padma_halffm_TA;
$Pudhari_toPadma[Pudhari::Pudhari_halffm_TR]   = Padma::Padma_halffm_TA . Padma::Padma_halffm_RA;
$Pudhari_toPadma[Pudhari::Pudhari_halffm_THA]  = Padma::Padma_halffm_THA;
$Pudhari_toPadma[Pudhari::Pudhari_halffm_DHA]  = Padma::Padma_halffm_DHA;
$Pudhari_toPadma[Pudhari::Pudhari_halffm_NA]   = Padma::Padma_halffm_NA;
$Pudhari_toPadma[Pudhari::Pudhari_halffm_PA]   = Padma::Padma_halffm_PA;
$Pudhari_toPadma[Pudhari::Pudhari_halffm_PHA]  = Padma::Padma_halffm_PHA;
$Pudhari_toPadma[Pudhari::Pudhari_halffm_BA]   = Padma::Padma_halffm_BA;
$Pudhari_toPadma[Pudhari::Pudhari_halffm_BHA]  = Padma::Padma_halffm_BHA;
$Pudhari_toPadma[Pudhari::Pudhari_halffm_MA]   = Padma::Padma_halffm_MA;
$Pudhari_toPadma[Pudhari::Pudhari_halffm_YA]   = Padma::Padma_halffm_YA;
$Pudhari_toPadma[Pudhari::Pudhari_halffm_RA]   = Padma::Padma_halffm_RA;
$Pudhari_toPadma[Pudhari::Pudhari_halffm_LA]   = Padma::Padma_halffm_LA;
$Pudhari_toPadma[Pudhari::Pudhari_halffm_VA]   = Padma::Padma_halffm_VA;
$Pudhari_toPadma[Pudhari::Pudhari_halffm_SHA_1]= Padma::Padma_halffm_SHA;
$Pudhari_toPadma[Pudhari::Pudhari_halffm_SHA_2]= Padma::Padma_halffm_SHA;
$Pudhari_toPadma[Pudhari::Pudhari_halffm_SHR]  = Padma::Padma_halffm_SHA . Padma::Padma_halffm_RA;
$Pudhari_toPadma[Pudhari::Pudhari_halffm_SSA]  = Padma::Padma_halffm_SSA;
$Pudhari_toPadma[Pudhari::Pudhari_halffm_SA]   = Padma::Padma_halffm_SA;
$Pudhari_toPadma[Pudhari::Pudhari_halffm_HA_1] = Padma::Padma_halffm_HA;
$Pudhari_toPadma[Pudhari::Pudhari_halffm_HA_2] = Padma::Padma_halffm_HA;
$Pudhari_toPadma[Pudhari::Pudhari_halffm_LLA]  = Padma::Padma_halffm_LLA;
$Pudhari_toPadma[Pudhari::Pudhari_halffm_RRA]  = Padma::Padma_halffm_RRA;

//Conjuncts
$Pudhari_toPadma[Pudhari::Pudhari_conjct_KK]     = Padma::Padma_consnt_KA . Padma::Padma_vattu_KA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_KV]     = Padma::Padma_consnt_KA . Padma::Padma_vattu_VA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_KT]     = Padma::Padma_consnt_KA . Padma::Padma_vattu_TA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_KSH]    = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_KSHA]   = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA;
//Pudhari.toPadma[Pudhari.conjct_KSHEE]  = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA . Padma::Padma_vowelsn_EE;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_KHR]    = Padma::Padma_consnt_KHA . Padma::Padma_vattu_RA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_NGK]    = Padma::Padma_consnt_NGA . Padma::Padma_vattu_KA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_NGKH]   = Padma::Padma_consnt_NGA . Padma::Padma_vattu_KHA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_GNA]    = Padma::Padma_consnt_GA . Padma::Padma_vattu_NA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_DNA]    = Padma::Padma_consnt_DA . Padma::Padma_vattu_NA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_SNA]    = Padma::Padma_consnt_SHA . Padma::Padma_vattu_NA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_SCA]    = Padma::Padma_consnt_SHA . Padma::Padma_vattu_CA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_NGM]    = Padma::Padma_consnt_NGA . Padma::Padma_vattu_MA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_NGG]    = Padma::Padma_consnt_NGA . Padma::Padma_vattu_GA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_NGGH]   = Padma::Padma_consnt_NGA . Padma::Padma_vattu_GHA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_CC]     = Padma::Padma_consnt_CA . Padma::Padma_vattu_CA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_JNY]    = Padma::Padma_consnt_JA . Padma::Padma_vattu_NYA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_JHR]    = Padma::Padma_consnt_JHA . Padma::Padma_vattu_RA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_NYC]    = Padma::Padma_consnt_NYA . Padma::Padma_vattu_CA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_JJ]     = Padma::Padma_consnt_JA . Padma::Padma_vattu_JA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_TT]     = Padma::Padma_consnt_TA . Padma::Padma_vattu_TA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_TTTT]   = Padma::Padma_consnt_TTA . Padma::Padma_vattu_TTA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_TT_TTH] = Padma::Padma_consnt_TTA . Padma::Padma_vattu_TTHA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_TTHTTH] = Padma::Padma_consnt_TTHA . Padma::Padma_vattu_TTHA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_DDDD]   = Padma::Padma_consnt_DDA . Padma::Padma_vattu_DDA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_DD_DDH] = Padma::Padma_consnt_DDA . Padma::Padma_vattu_DDHA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_DDHDDH] = Padma::Padma_consnt_DDHA . Padma::Padma_vattu_DDHA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_TR_1]   = Padma::Padma_consnt_TA . Padma::Padma_vattu_RA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_TR_2]   = Padma::Padma_consnt_TA . Padma::Padma_vattu_RA;
//Pudhari.toPadma[Pudhari.conjct_TN]     = Padma::Padma_consnt_TA . Padma::Padma_vattu_NA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_DG]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_GA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_DGH]    = Padma::Padma_consnt_DA . Padma::Padma_vattu_GHA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_DD]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_DA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_D_DH]   = Padma::Padma_consnt_DA . Padma::Padma_vattu_DHA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_DB]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_BA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_DBH]    = Padma::Padma_consnt_DA . Padma::Padma_vattu_BHA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_DM]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_MA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_DY]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_YA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_DV]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_VA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_NN]     = Padma::Padma_consnt_NA . Padma::Padma_vattu_NA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_PT]     = Padma::Padma_consnt_PA . Padma::Padma_vattu_TA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_LL]     = Padma::Padma_consnt_LA . Padma::Padma_vattu_LA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_SHC]    = Padma::Padma_consnt_SHA . Padma::Padma_vattu_CA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_SHR]    = Padma::Padma_consnt_SHA . Padma::Padma_vattu_RA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_SHREE]  = Padma::Padma_consnt_SHA . Padma::Padma_vattu_RA . Padma::Padma_vowelsn_EE;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_SHV]    = Padma::Padma_consnt_SHA . Padma::Padma_vattu_VA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_SSTT]   = Padma::Padma_consnt_SSA . Padma::Padma_vattu_TTA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_SSTTV]  = Padma::Padma_consnt_SSA . Padma::Padma_vattu_TTA . Padma::Padma_vattu_VA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_SSTTH]  = Padma::Padma_consnt_SSA . Padma::Padma_vattu_TTHA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_STR]    = Padma::Padma_consnt_SA . Padma::Padma_vattu_TA . Padma::Padma_vattu_RA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_HNN]    = Padma::Padma_consnt_HA . Padma::Padma_vattu_NNA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_HN]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_NA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_HM]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_MA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_HY]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_YA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_HR]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_RA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_HL]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_LA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_HV]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_VA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_PR]     = Padma::Padma_consnt_PA . Padma::Padma_vattu_RA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_DR]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_RA;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_RU]     = Padma::Padma_vattu_RA . Padma::Padma_vowelsn_U;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_RUU]    = Padma::Padma_vattu_RA . Padma::Padma_vowelsn_UU;

//Vowel $signs . anusvara
$Pudhari_toPadma[Pudhari::Pudhari_vowelsn_IIN]  = Padma::Padma_vowelsn_II . Padma::Padma_anusvara;
$Pudhari_toPadma[Pudhari::Pudhari_vowelsn_EEN]   = Padma::Padma_vowelsn_EE . Padma::Padma_anusvara;
$Pudhari_toPadma[Pudhari::Pudhari_vowelsn_AIN]   = Padma::Padma_vowelsn_AI . Padma::Padma_anusvara;

//Vowel $signs . RA
$Pudhari_toPadma[Pudhari::Pudhari_vowelsn_II_RA]  = Padma::Padma_vowelsn_II . Padma::Padma_halffm_RA;
$Pudhari_toPadma[Pudhari::Pudhari_vowelsn_EE_RA]  = Padma::Padma_vowelsn_EE . Padma::Padma_halffm_RA;
$Pudhari_toPadma[Pudhari::Pudhari_vowelsn_AA_RA]  = Padma::Padma_vowelsn_AA . Padma::Padma_halffm_RA;
$Pudhari_toPadma[Pudhari::Pudhari_vowelsn_AI_RA]  = Padma::Padma_vowelsn_AI . Padma::Padma_halffm_RA;

//Vowel $sign . anusvara . RA
$Pudhari_toPadma[Pudhari::Pudhari_vowelsn_IIN_RA] = Padma::Padma_vowelsn_II . Padma::Padma_anusvara . Padma::Padma_halffm_RA;
$Pudhari_toPadma[Pudhari::Pudhari_vowelsn_EEN_RA] = Padma::Padma_vowelsn_EE . Padma::Padma_anusvara . Padma::Padma_halffm_RA;
$Pudhari_toPadma[Pudhari::Pudhari_vowelsn_AIN_RA] = Padma::Padma_vowelsn_AI . Padma::Padma_anusvara . Padma::Padma_halffm_RA;

//Combos
$Pudhari_toPadma[Pudhari::Pudhari_combo_RU]      = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_U;
$Pudhari_toPadma[Pudhari::Pudhari_combo_RUU]     = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_UU;
$Pudhari_toPadma[Pudhari::Pudhari_conjct_SHAU]   = Padma::Padma_consnt_SHA . Padma::Padma_vowelsn_AU;
$Pudhari_toPadma[Pudhari::Pudhari_combo_HR]      = Padma::Padma_consnt_HA . Padma::Padma_vowelsn_R;
$Pudhari_toPadma[Pudhari::Pudhari_halffm_RA_ANU] = Padma::Padma_halffm_RA . Padma::Padma_anusvara;

$Pudhari_toPadma[Pudhari::Pudhari_vattu_YA]      = Padma::Padma_vattu_YA;
$Pudhari_toPadma[Pudhari::Pudhari_vattu_RA_1]    = Padma::Padma_vattu_RA;
$Pudhari_toPadma[Pudhari::Pudhari_vattu_RA_2]    = Padma::Padma_vattu_RA;
$Pudhari_toPadma[Pudhari::Pudhari_vattu_RA_3]    = Padma::Padma_vattu_RA;
$Pudhari_toPadma[Pudhari::Pudhari_vattu_RA_4]    = Padma::Padma_vattu_RA;
$Pudhari_toPadma[Pudhari::Pudhari_vattu_RA_5]    = Padma::Padma_vattu_RA;
$Pudhari_toPadma[Pudhari::Pudhari_vattu_VA]      = Padma::Padma_vattu_VA;

$Pudhari_toPadma[Pudhari::Pudhari_misc_DANDA]    = Padma::Padma_danda;
$Pudhari_toPadma[Pudhari::Pudhari_misc_OM]       = Padma::Padma_om;
$Pudhari_toPadma[Pudhari::Pudhari_misc_ABBREV]   = Padma::Padma_abbrev;
$Pudhari_toPadma[Pudhari::Pudhari_nukta_1]       = Padma::Padma_nukta;
$Pudhari_toPadma[Pudhari::Pudhari_nukta_2]       = Padma::Padma_nukta;

//Does not match ASCII
$Pudhari_toPadma[Pudhari::Pudhari_extra_QTSINGLE_1] = "\xE2\x80\x98"; //Left single quotation mark
$Pudhari_toPadma[Pudhari::Pudhari_extra_QTSINGLE_2] = "\xE2\x80\x99"; //Right single quotation mark
$Pudhari_toPadma[Pudhari::Pudhari_MULTIPLY]         = "\xC3\x97"; //Unicode for multiplication symbol
$Pudhari_toPadma[Pudhari::Pudhari_MINUS_1]          = "\x2D"; //Unicode for sub$straction symbol
$Pudhari_toPadma[Pudhari::Pudhari_MINUS_2]          = "\x2D"; //Unicode for sub$straction symbol
$Pudhari_toPadma[Pudhari::Pudhari_PERCENT]          = "%";
$Pudhari_toPadma[Pudhari::Pudhari_extra_COLON_1]    = ":";
$Pudhari_toPadma[Pudhari::Pudhari_extra_COLON_2]    = ":";
$Pudhari_toPadma[Pudhari::Pudhari_underscore]       = "_";

//Digits
$Pudhari_toPadma[Pudhari::Pudhari_digit_ZERO]    = Padma::Padma_digit_ZERO;
$Pudhari_toPadma[Pudhari::Pudhari_digit_ONE]     = Padma::Padma_digit_ONE;
$Pudhari_toPadma[Pudhari::Pudhari_digit_TWO]     = Padma::Padma_digit_TWO;
$Pudhari_toPadma[Pudhari::Pudhari_digit_THREE]   = Padma::Padma_digit_THREE;
$Pudhari_toPadma[Pudhari::Pudhari_digit_FOUR]    = Padma::Padma_digit_FOUR;
$Pudhari_toPadma[Pudhari::Pudhari_digit_FIVE]    = Padma::Padma_digit_FIVE;
$Pudhari_toPadma[Pudhari::Pudhari_digit_SIX]     = Padma::Padma_digit_SIX;
$Pudhari_toPadma[Pudhari::Pudhari_digit_SEVEN]   = Padma::Padma_digit_SEVEN;
$Pudhari_toPadma[Pudhari::Pudhari_digit_EIGHT]   = Padma::Padma_digit_EIGHT;
$Pudhari_toPadma[Pudhari::Pudhari_digit_NINE]    = Padma::Padma_digit_NINE;


$Pudhari_prefixList = array();
$Pudhari_prefixList[Pudhari::Pudhari_vowelsn_I_1]= true;
$Pudhari_prefixList[Pudhari::Pudhari_vowelsn_I_2]= true;
$Pudhari_prefixList[Pudhari::Pudhari_vowelsn_I_3]= true;
$Pudhari_prefixList[Pudhari::Pudhari_vowelsn_IM] = true;
$Pudhari_prefixList[Pudhari::Pudhari_nukta_1]    = true;
//Pudhari.prefixList[Pudhari.halffm_NA]  = true;

$Pudhari_suffixList = array();
//Pudhari.suffixList[Pudhari.vowelsn_EE]    = true;
$Pudhari_suffixList[Pudhari::Pudhari_halffm_RA]     = true;
$Pudhari_suffixList[Pudhari::Pudhari_halffm_RA_ANU] = true;
$Pudhari_suffixList[Pudhari::Pudhari_vowelsn_AA_RA] = true;
$Pudhari_suffixList[Pudhari::Pudhari_vowelsn_II_RA] = true;
$Pudhari_suffixList[Pudhari::Pudhari_vowelsn_IIN_RA]= true;
$Pudhari_suffixList[Pudhari::Pudhari_vowelsn_EEN_RA]= true;
$Pudhari_suffixList[Pudhari::Pudhari_vowelsn_EE_RA] = true;

$Pudhari_redundantList = array();
$Pudhari_redundantList[Pudhari::Pudhari_misc_UNKNOWN_1] = true;
$Pudhari_redundantList[Pudhari::Pudhari_misc_UNKNOWN_2] = true;
$Pudhari_redundantList[Pudhari::Pudhari_misc_UNKNOWN_3] = true;

$Pudhari_overloadList = array();
$Pudhari_overloadList[Pudhari::Pudhari_vowel_A]      = true;
$Pudhari_overloadList[Pudhari::Pudhari_vowel_AA]     = true;
$Pudhari_overloadList[Pudhari::Pudhari_vowel_EE]     = true;
$Pudhari_overloadList[Pudhari::Pudhari_vowel_I]      = true;
$Pudhari_overloadList[Pudhari::Pudhari_consnt_DDA]   = true;
$Pudhari_overloadList[Pudhari::Pudhari_consnt_DDHA]  = true;
$Pudhari_overloadList[Pudhari::Pudhari_vowelsn_AA]   = true;
$Pudhari_overloadList[Pudhari::Pudhari_vowelsn_EE]   = true;
$Pudhari_overloadList[Pudhari::Pudhari_vowelsn_AI]   = true;
$Pudhari_overloadList[Pudhari::Pudhari_halffm_KSH]   = true;
$Pudhari_overloadList[Pudhari::Pudhari_halffm_KHA]   = true;
$Pudhari_overloadList[Pudhari::Pudhari_halffm_KHHA]  = true;
$Pudhari_overloadList[Pudhari::Pudhari_halffm_GA]    = true;
$Pudhari_overloadList[Pudhari::Pudhari_halffm_GHA]   = true;
$Pudhari_overloadList[Pudhari::Pudhari_halffm_CA]    = true;
$Pudhari_overloadList[Pudhari::Pudhari_halffm_JJ]    = true;
$Pudhari_overloadList[Pudhari::Pudhari_halffm_JA_1]  = true;
$Pudhari_overloadList[Pudhari::Pudhari_halffm_ZA_1]  = true;
$Pudhari_overloadList[Pudhari::Pudhari_halffm_JHA]   = true;
$Pudhari_overloadList[Pudhari::Pudhari_halffm_NNA]   = true;
$Pudhari_overloadList[Pudhari::Pudhari_halffm_TA]    = true;
$Pudhari_overloadList[Pudhari::Pudhari_halffm_TT]    = true;
$Pudhari_overloadList[Pudhari::Pudhari_halffm_TR]    = true;
$Pudhari_overloadList[Pudhari::Pudhari_halffm_THA]   = true;
$Pudhari_overloadList[Pudhari::Pudhari_halffm_DHA]   = true;
$Pudhari_overloadList[Pudhari::Pudhari_halffm_NA]    = true;
$Pudhari_overloadList[Pudhari::Pudhari_halffm_BHA]   = true;
$Pudhari_overloadList[Pudhari::Pudhari_halffm_PA]    = true;
$Pudhari_overloadList[Pudhari::Pudhari_halffm_MA]    = true;
$Pudhari_overloadList[Pudhari::Pudhari_halffm_YA]    = true;
$Pudhari_overloadList[Pudhari::Pudhari_halffm_LA]    = true;
$Pudhari_overloadList[Pudhari::Pudhari_halffm_SHA_2] = true;
$Pudhari_overloadList[Pudhari::Pudhari_halffm_SHR]   = true;
$Pudhari_overloadList[Pudhari::Pudhari_halffm_SSA]   = true;
$Pudhari_overloadList[Pudhari::Pudhari_halffm_SA]    = true;
$Pudhari_overloadList[Pudhari::Pudhari_conjct_KSH]   = true;
$Pudhari_overloadList[Pudhari::Pudhari_conjct_TR_2]  = true;
$Pudhari_overloadList[Pudhari::Pudhari_conjct_SSTT]  = true;
$Pudhari_overloadList["\xC3\xBB"]              = true;
$Pudhari_overloadList["\x65"]              = true;
$Pudhari_overloadList["\x23"]              = true;
$Pudhari_overloadList["\xC3\x8D\xC2\xAB"]        = true;
//Pudhari.overloadList["\xC3\x8B\xC2\xB3"]        = true;
$Pudhari_overloadList["\xC3\xBB\xC5\x92\x6F"]  = true;

function Pudhari_initialize()
{
    global $fontinfo;

    $fontinfo["shree-pudhari"]["language"] = "Devanagari";
    $fontinfo["shree-pudhari"]["class"] = "Pudhari";
    $fontinfo["shree-pud-77bl"]["language"] = "Devanagari";
    $fontinfo["shree-pud-77bl"]["class"] = "Pudhari";
    $fontinfo["shree-pud-77nl"]["language"] = "Devanagari";
    $fontinfo["shree-pud-77nl"]["class"] = "Pudhari";
    $fontinfo["shree-pud-77nw"]["language"] = "Devanagari";
    $fontinfo["shree-pud-77nw"]["class"] = "Pudhari";
}

?>
