<?php
/* ***** BEGIN LICENSE BLOCK *****
 *
 *  Copyright (C) 2007 KulbirSaini   <kulbirsaini@students.iiit.ac.in>
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

//Shree-Dev-0714 Devanagari
class Shree_Dev_0714
{
function Shree_Dev_0714()
{
}

//The interface every dynamic font encoding should implement
var $maxLookupLen = 3;
var $fontFace     = "Shree-Dev-0714";
var $displayName  = "Shree Dev 714";
var $script       = Padma::Padma_script_DEVANAGARI;
var $hasSuffixes  = true;

function lookup ($str)
{
  global $Shree_Dev_0714_toPadma;
   if(array_key_exists($str,$Shree_Dev_0714_toPadma))
    return $Shree_Dev_0714_toPadma[$str];
   return false;
}

function isPrefixSymbol ($str)
{
    global $Shree_Dev_0714_prefixList;
    return array_key_exists($str,$Shree_Dev_0714_prefixList);
}

function isSuffixSymbol ($str)
{
    global $Shree_Dev_0714_suffixList;
    return array_key_exists($str,$Shree_Dev_0714_suffixList);
}

function isOverloaded ($str)
{
    global $Shree_Dev_0714_overloadList;
    return array_key_exists($str,$Shree_Dev_0714_overloadList);
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
    global $Shree_Dev_0714_redundantList;
    return array_key_exists($str,$Shree_Dev_0714_redundantList);
}

//TODO
//00A6,00AD,00AE,00AF,
//00B7,00D6,00FD,0161,2030

//Implementation details start here

//Specials
const Shree_Dev_0714_avagraha       = "\x40";
const Shree_Dev_0714_anusvara_1     = "\xC2\xA7";
const Shree_Dev_0714_anusvara_2     = "\xC2\xA8";
const Shree_Dev_0714_candrabindu    = "\xC2\xB1";
const Shree_Dev_0714_virama         = "\xC2\xB2";
const Shree_Dev_0714_visarga        = "\xE2\x80\xA6";

//Vowels
const Shree_Dev_0714_vowel_A        = "\x41";
const Shree_Dev_0714_vowel_AA       = "\x41\x6D";
const Shree_Dev_0714_vowel_I        = "\x42";
const Shree_Dev_0714_vowel_II       = "\x42\xC2\xA9";
const Shree_Dev_0714_vowel_U        = "\x43";
const Shree_Dev_0714_vowel_UU       = "\x44";
const Shree_Dev_0714_vowel_R_1      = "\x46";
const Shree_Dev_0714_vowel_R_2      = "\x47";
const Shree_Dev_0714_vowel_CDR_E    = "\x45\xC2\xB0";
const Shree_Dev_0714_vowel_EE       = "\x45";
const Shree_Dev_0714_vowel_AI       = "\x45\x6F";
const Shree_Dev_0714_vowel_CDR_O    = "\x41\x6D\xC2\xB0";
const Shree_Dev_0714_vowel_OO_1     = "\x41\x6D\x6F";
const Shree_Dev_0714_vowel_OO_2     = "\x41\x6D\x6F";
const Shree_Dev_0714_vowel_AU_1     = "\x41\x6D\xC2\xA1";
const Shree_Dev_0714_vowel_AU_2     = "\x41\x6D\xC2\xA1";

//Consonants
const Shree_Dev_0714_consnt_KA      = "\x48";
const Shree_Dev_0714_consnt_KHA_1   = "\xC2\xBB\x6D";
const Shree_Dev_0714_consnt_KHA_2   = "\x49";
const Shree_Dev_0714_consnt_KHHA_1  = "\xCB\x9C";
const Shree_Dev_0714_consnt_KHHA_2  = "\xE2\x84\xA2\x6D";
const Shree_Dev_0714_consnt_GA_1    = "\xC2\xBD\x6D";
const Shree_Dev_0714_consnt_GA_2    = "\x4A";
const Shree_Dev_0714_consnt_GHA_1   = "\xC2\xBF\x6D"; 	
const Shree_Dev_0714_consnt_GHA_2   = "\x4B"; 	
const Shree_Dev_0714_consnt_NGA     = "\x4C";

const Shree_Dev_0714_consnt_CA_1    = "\xC3\x80\x6D";
const Shree_Dev_0714_consnt_CA_2    = "\x4D";
const Shree_Dev_0714_consnt_CHA     = "\x4E";
const Shree_Dev_0714_consnt_JA_1    = "\x4F";
const Shree_Dev_0714_consnt_JA_2    = "\xC3\x81\x6D";
const Shree_Dev_0714_consnt_ZA_1    = "\xC3\x81\xE2\x80\xB9\x6D";
const Shree_Dev_0714_consnt_ZA_2    = "\xC3\x81\xE2\x80\xB9\x6D";
const Shree_Dev_0714_consnt_JHA_1   = "\xC3\x82\x6D";
const Shree_Dev_0714_consnt_JHA_2   = "\x50";			

const Shree_Dev_0714_consnt_TTA     = "\x51";
const Shree_Dev_0714_consnt_TTHA    = "\x52";
const Shree_Dev_0714_consnt_DDA     = "\x53";
const Shree_Dev_0714_consnt_DDDHA   = "\x53\xE2\x80\xB9";
const Shree_Dev_0714_consnt_DDHA    = "\x54";
const Shree_Dev_0714_consnt_RHA     = "\x54\xE2\x80\xB9";
const Shree_Dev_0714_consnt_NNA_1   = "\xC3\x8A\x6D"; 	
const Shree_Dev_0714_consnt_NNA_2   = "\x55"; 	

const Shree_Dev_0714_consnt_TA_1    = "\xC3\x8B\x6D";
const Shree_Dev_0714_consnt_TA_2    = "\x56";
const Shree_Dev_0714_consnt_THA_1   = "\xC3\x8F\x6D";
const Shree_Dev_0714_consnt_THA_2   = "\x57";
const Shree_Dev_0714_consnt_DA      = "\x58";
const Shree_Dev_0714_consnt_DHA_1   = "\xC3\x9C\x6D";
const Shree_Dev_0714_consnt_DHA_2   = "\x59";
const Shree_Dev_0714_consnt_NA      = "\x5A";

const Shree_Dev_0714_consnt_PA_1    = "\x6E";
const Shree_Dev_0714_consnt_PA_2    = "\xC3\x9F\x6D";
const Shree_Dev_0714_consnt_PHA     = "\x5C";
const Shree_Dev_0714_consnt_BA      = "\x7E";
const Shree_Dev_0714_consnt_BHA_1   = "\xC3\xA4\x6D";
const Shree_Dev_0714_consnt_BHA_2   = "\x5E";
const Shree_Dev_0714_consnt_MA_1    = "\xC3\xA5\x6D";
const Shree_Dev_0714_consnt_MA_2    = "\x5F";

const Shree_Dev_0714_consnt_YA_1    = "\xC3\xA6\x6D";
const Shree_Dev_0714_consnt_YA_2    = "\x60";
const Shree_Dev_0714_consnt_RA      = "\x61";
const Shree_Dev_0714_consnt_LA_1    = "\x63";
const Shree_Dev_0714_consnt_LA_2    = "\xC3\xAB\x6D";
const Shree_Dev_0714_consnt_LA_3    = "\x62";
const Shree_Dev_0714_consnt_VA      = "\x64";
const Shree_Dev_0714_consnt_SHA_1   = "\xC3\xAD\x6D";
const Shree_Dev_0714_consnt_SHA_2   = "\xC3\xBB\x6D";
const Shree_Dev_0714_consnt_SHA_3   = "\x65";			
const Shree_Dev_0714_consnt_SSA_1   = "\xC3\xAE\x6D";
const Shree_Dev_0714_consnt_SSA_2   = "\x66";
const Shree_Dev_0714_consnt_SA      = "\x67";
const Shree_Dev_0714_consnt_HA      = "\x68";
const Shree_Dev_0714_consnt_LLA     = "\x69";
const Shree_Dev_0714_consnt_KSH     = "\x6A"; 		

//Gunintamulu
const Shree_Dev_0714_vowelsn_AA     = "\x6D";
const Shree_Dev_0714_vowelsn_I      = "\x7B";			
const Shree_Dev_0714_vowelsn_I_1    = "\x5B";			
const Shree_Dev_0714_vowelsn_I_2    = "\x70"; 		
const Shree_Dev_0714_vowelsn_II_1   = "\x72"; 		
const Shree_Dev_0714_vowelsn_II_2   = "\x73";				
const Shree_Dev_0714_vowelsn_U_1    = "\x78";			
const Shree_Dev_0714_vowelsn_U_2    = "\x77";			
const Shree_Dev_0714_vowelsn_U_3    = "\xC3\xBE";			
const Shree_Dev_0714_vowelsn_UU_1   = "\x7A"; 		
const Shree_Dev_0714_vowelsn_UU_2   = "\x79"; 		
const Shree_Dev_0714_vowelsn_UU_3   = "\xC3\xBF"; 		
const Shree_Dev_0714_vowelsn_R      = "\xC2\xA5";
const Shree_Dev_0714_vowelsn_CDR_E  = "\xC2\xB0";
const Shree_Dev_0714_vowelsn_EE     = "\x6F";
const Shree_Dev_0714_vowelsn_AI     = "\xC2\xA1";
const Shree_Dev_0714_vowelsn_OO     = "\x6F\x6D";
const Shree_Dev_0714_vowelsn_AU     = "\xC2\xA1\x6D";

//Vowel + anusvara
const Shree_Dev_0714_vowel_IIM       = "\x42\xC2\xAA";

//Matra + modifier
const Shree_Dev_0714_vowelsn_IM      = "\x71";
const Shree_Dev_0714_vowelsn_IIM     = "\x74";			
const Shree_Dev_0714_vowelsn_EEM     = "\x7C";			
const Shree_Dev_0714_vowelsn_AIM     = "\xC2\xA2";			
const Shree_Dev_0714_vowelsn_U_BINDU = "\xC2\xB1\xC2\xB2";

//Half Forms
const Shree_Dev_0714_halffm_KA      = "\xC5\xA0";
const Shree_Dev_0714_halffm_KSH     = "\xC3\xBA";
const Shree_Dev_0714_halffm_KHA     = "\xC2\xBB";
const Shree_Dev_0714_halffm_KHHA    = "\xE2\x84\xA2";
const Shree_Dev_0714_halffm_GA      = "\xC2\xBD";
const Shree_Dev_0714_halffm_GHA     = "\xC2\xBF";
const Shree_Dev_0714_halffm_CA      = "\xC3\x80";
const Shree_Dev_0714_halffm_JA      = "\xC3\x81";
const Shree_Dev_0714_halffm_JJ      = "\xE2\x80\x9A";
const Shree_Dev_0714_halffm_ZA_1    = "\xC3\x81\xE2\x80\xB9";
const Shree_Dev_0714_halffm_ZA_2    = "\xC3\x81\xE2\x80\xB9";
const Shree_Dev_0714_halffm_JHA     = "\xC3\x82";
const Shree_Dev_0714_halffm_NYA     = "\xC3\x84";
const Shree_Dev_0714_halffm_NNA     = "\xC3\x8A";
const Shree_Dev_0714_halffm_TA      = "\xC3\x8B";
const Shree_Dev_0714_halffm_TT      = "\xC3\x8E"; 		
const Shree_Dev_0714_halffm_TR      = "\xC3\x8D";
const Shree_Dev_0714_halffm_THA     = "\xC3\x8F";
const Shree_Dev_0714_halffm_DHA     = "\xC3\x9C";
const Shree_Dev_0714_halffm_NA      = "\xC3\x9D";
const Shree_Dev_0714_halffm_NN      = "\xC3\x9E";
const Shree_Dev_0714_halffm_PA      = "\xC3\x9F";
const Shree_Dev_0714_halffm_PHA     = "\xC3\xA2";
const Shree_Dev_0714_halffm_BA      = "\xC3\xA3";
const Shree_Dev_0714_halffm_BHA     = "\xC3\xA4";
const Shree_Dev_0714_halffm_MA      = "\xC3\xA5";
const Shree_Dev_0714_halffm_YA      = "\xC3\xA6";
const Shree_Dev_0714_halffm_RA      = "\xC2\xA9";
const Shree_Dev_0714_halffm_LA      = "\xC3\xAB";
const Shree_Dev_0714_halffm_VA      = "\xC3\xAC";
const Shree_Dev_0714_halffm_SHA     = "\xC3\xAD";
const Shree_Dev_0714_halffm_SSA     = "\xC3\xAE";
const Shree_Dev_0714_halffm_SA      = "\xC3\xB1";
const Shree_Dev_0714_halffm_HA      = "\xC3\xB4";
const Shree_Dev_0714_halffm_LLA     = "\xC3\xB9";
const Shree_Dev_0714_halffm_RRA     = "\xC3\xA8";

//Conjuncts
const Shree_Dev_0714_conjct_KK      = "\xC2\xB8";
const Shree_Dev_0714_conjct_KV      = "\xC2\xB9";
const Shree_Dev_0714_conjct_KT      = "\xC2\xBA";
const Shree_Dev_0714_conjct_KSH     = "\xC3\xBA\x6D";
const Shree_Dev_0714_conjct_KSHEE   = "\xC3\xBA\x6D\x6F";
const Shree_Dev_0714_conjct_KHR     = "\xC2\xBC";
const Shree_Dev_0714_conjct_NGKSH   = "\xC2\xAC";
const Shree_Dev_0714_conjct_NGK     = "\xE2\x80\x98";
const Shree_Dev_0714_conjct_NGKH    = "\xE2\x80\x99";
const Shree_Dev_0714_conjct_NGG     = "\xE2\x80\x9C";
const Shree_Dev_0714_conjct_NGGH    = "\xE2\x80\x9D";
const Shree_Dev_0714_conjct_NGM     = "\xC2\xB6";
const Shree_Dev_0714_conjct_CC      = "\xC6\x92";
const Shree_Dev_0714_conjct_JNY     = "\x6B";
const Shree_Dev_0714_conjct_JHR     = "\xC3\x83";
const Shree_Dev_0714_conjct_NYC     = "\x23\x6D";
const Shree_Dev_0714_conjct_JJ      = "\xE2\x80\x9A\x6D";
const Shree_Dev_0714_conjct_TTTT    = "\xC3\x85";
const Shree_Dev_0714_conjct_TT_TTH  = "\xC3\x86";
const Shree_Dev_0714_conjct_TTHTTH  = "\xC3\x87";
const Shree_Dev_0714_conjct_DDDD    = "\xC3\x88";
const Shree_Dev_0714_conjct_DD_DDH  = "\xE2\x80\x93";
const Shree_Dev_0714_conjct_DDHDDH  = "\xC3\x89";
const Shree_Dev_0714_conjct_TT      = "\xC3\x8E\x6D"; 		
const Shree_Dev_0714_conjct_TR_2    = "\xC3\x8D\x6D";
const Shree_Dev_0714_conjct_TR_3    = "\xC3\x8C"; 		
const Shree_Dev_0714_conjct_DG      = "\xC3\x92";
const Shree_Dev_0714_conjct_DGH     = "\xC3\x93";
const Shree_Dev_0714_conjct_DD      = "\xC3\x94";
const Shree_Dev_0714_conjct_D_DH    = "\xC3\x95";
const Shree_Dev_0714_conjct_DB      = "\xC3\x97";
const Shree_Dev_0714_conjct_DBH     = "\xC3\x98";
const Shree_Dev_0714_conjct_DM      = "\xC3\x99";
const Shree_Dev_0714_conjct_DY      = "\xC3\x9A";
const Shree_Dev_0714_conjct_DV      = "\xC3\x9B";
const Shree_Dev_0714_conjct_NN      = "\xC3\x9E";
const Shree_Dev_0714_conjct_PT      = "\xC3\xA1";
const Shree_Dev_0714_conjct_LL      = "\xE2\x80\x9E";
const Shree_Dev_0714_conjct_SHC     = "\xC3\xBC";
const Shree_Dev_0714_conjct_SHR     = "\x6C";
const Shree_Dev_0714_conjct_SHREE   = "\x6C\x6F";
const Shree_Dev_0714_conjct_SHV     = "\xC5\x93";
const Shree_Dev_0714_conjct_SSTT    = "\xC3\xAF";
const Shree_Dev_0714_conjct_SSTTH   = "\xC3\xB0";
const Shree_Dev_0714_conjct_STR     = "\xC3\xB3";
const Shree_Dev_0714_conjct_SR      = "\xC3\xB2";
const Shree_Dev_0714_conjct_HNN     = "\xE2\x80\xA0";
const Shree_Dev_0714_conjct_HN      = "\xE2\x80\xA2";
const Shree_Dev_0714_conjct_HM      = "\xC3\xB7";
const Shree_Dev_0714_conjct_HY      = "\xC3\xB8";
const Shree_Dev_0714_conjct_HR      = "\xC3\xB5";
const Shree_Dev_0714_conjct_HL      = "\xE2\x80\xA1";
const Shree_Dev_0714_conjct_HV      = "\xCB\x86";
const Shree_Dev_0714_conjct_DRA     = "\xC3\x90"; 		
const Shree_Dev_0714_conjct_PRA     = "\xC3\xA0"; 		
const Shree_Dev_0714_conjct_GN      = "\xC2\xBE"; 		

//Combos
const Shree_Dev_0714_combo_RU       = "\xC3\xA9";
const Shree_Dev_0714_combo_RUU      = "\xC3\xAA";
const Shree_Dev_0714_conjct_SHAU    = "\x65\xC2\xA1";
const Shree_Dev_0714_combo_HR       = "\xC3\xB6";
const Shree_Dev_0714_combo_DR       = "\xC3\x91"; 		

//Half forms of RA
const Shree_Dev_0714_halffm_REE     = "\x7D";
const Shree_Dev_0714_halffm_RII     = "\x75";		
const Shree_Dev_0714_halffm_RIIM    = "\x76";		
const Shree_Dev_0714_halffm_RA_ANU  = "\xC2\xAA";
const Shree_Dev_0714_halffm_RAI     = "\xC2\xA3";		
const Shree_Dev_0714_halffm_RAIM    = "\xC2\xA4";		

const Shree_Dev_0714_vattu_YA       = "\xC3\xA7";
const Shree_Dev_0714_vattu_RA_1     = "\xC2\xB3";
const Shree_Dev_0714_vattu_RA_2     = "\xC2\xAB";
const Shree_Dev_0714_vattu_RA_3     = "\xE2\x80\x94";
const Shree_Dev_0714_vattu_RA_4     = "\xC2\xB4";		
const Shree_Dev_0714_vattu_RA_5     = "\xC5\x92";		

const Shree_Dev_0714_misc_DANDA     = "\x26";
const Shree_Dev_0714_misc_OM        = "\xE2\x80\xBA";
const Shree_Dev_0714_nukta_1        = "\xC2\xB5";
const Shree_Dev_0714_nukta_2        = "\xE2\x80\xB9";

//Digits
const Shree_Dev_0714_digit_ZERO     = "\x30";
const Shree_Dev_0714_digit_ONE      = "\x31";
const Shree_Dev_0714_digit_TWO      = "\x32";
const Shree_Dev_0714_digit_THREE    = "\x33";
const Shree_Dev_0714_digit_FOUR     = "\x34";
const Shree_Dev_0714_digit_FIVE     = "\x35";
const Shree_Dev_0714_digit_SIX      = "\x36";
const Shree_Dev_0714_digit_SEVEN    = "\x37";
const Shree_Dev_0714_digit_EIGHT    = "\x38";
const Shree_Dev_0714_digit_NINE     = "\x39";

//Matches ASCII
const Shree_Dev_0714_EXCLAM         = "\x21";
const Shree_Dev_0714_PAREN_LEFT     = "\x28";
const Shree_Dev_0714_PAREN_RIGHT    = "\x29";
const Shree_Dev_0714_ASTERISK       = "\x2A";
const Shree_Dev_0714_PLUS           = "\x2B";
const Shree_Dev_0714_COMMA          = "\x2C";
const Shree_Dev_0714_PERIOD         = "\x2E";
const Shree_Dev_0714_SLASH          = "\x2F";
const Shree_Dev_0714_COLON          = "\x3A";
const Shree_Dev_0714_SEMICOLON      = "\x3B";
const Shree_Dev_0714_EQUALS         = "\x3D";
const Shree_Dev_0714_QUESTION       = "\x3F";
const Shree_Dev_0714_HYPHEN 	    = "\x2D"; 		

//Does not match ASCII
const Shree_Dev_0714_LQTSINGLE = "\x22";
const Shree_Dev_0714_RQTSINGLE = "\x27";
const Shree_Dev_0714_MULTIPLY  = "\xC2\x81";
const Shree_Dev_0714_PERCENT   = "\x25";

const Shree_Dev_0714_misc_UNKNOWN_1 = "\x24";
const Shree_Dev_0714_misc_UNKNOWN_2 = "\x3E";
const Shree_Dev_0714_misc_UNKNOWN_3 = "\xC2\x90";
const Shree_Dev_0714_misc_UNKNOWN_4 = "\xC2\xA0";
const Shree_Dev_0714_misc_UNKNOWN_5 = "\xC5\xB8";

}

$Shree_Dev_0714_toPadma = array();

$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_avagraha]    = Padma::Padma_avagraha;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_anusvara_1]  = Padma::Padma_anusvara;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_anusvara_2]  = Padma::Padma_anusvara;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_candrabindu] = Padma::Padma_candrabindu;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_virama]      = Padma::Padma_syllbreak;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_visarga]     = Padma::Padma_visarga;

$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_vowel_A]    = Padma::Padma_vowel_A;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_vowel_AA]   = Padma::Padma_vowel_AA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_vowel_I]    = Padma::Padma_vowel_I;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_vowel_II]   = Padma::Padma_vowel_II;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_vowel_U]    = Padma::Padma_vowel_U;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_vowel_UU]   = Padma::Padma_vowel_UU;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_vowel_R_1]  = Padma::Padma_vowel_R;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_vowel_R_2]  = Padma::Padma_vowel_R;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_vowel_CDR_E]= Padma::Padma_vowel_CDR_E;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_vowel_EE]   = Padma::Padma_vowel_EE;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_vowel_AI]   = Padma::Padma_vowel_AI;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_vowel_CDR_O]= Padma::Padma_vowel_CDR_O;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_vowel_OO_1] = Padma::Padma_vowel_OO;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_vowel_OO_2] = Padma::Padma_vowel_OO;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_vowel_AU_1] = Padma::Padma_vowel_AU;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_vowel_AU_2] = Padma::Padma_vowel_AU;

$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_KA]    = Padma::Padma_consnt_KA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_KHA_1] = Padma::Padma_consnt_KHA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_KHA_2] = Padma::Padma_consnt_KHA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_KHHA_1]= Padma::Padma_consnt_KHHA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_KHHA_2]= Padma::Padma_consnt_KHHA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_GA_1]  = Padma::Padma_consnt_GA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_GA_2]  = Padma::Padma_consnt_GA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_GHA_1] = Padma::Padma_consnt_GHA; 		
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_GHA_2] = Padma::Padma_consnt_GHA; 		
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_NGA]   = Padma::Padma_consnt_NGA;

$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_CA_1]  = Padma::Padma_consnt_CA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_CA_2]  = Padma::Padma_consnt_CA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_CHA]   = Padma::Padma_consnt_CHA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_JA_1]  = Padma::Padma_consnt_JA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_JA_2]  = Padma::Padma_consnt_JA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_ZA_1]  = Padma::Padma_consnt_ZA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_ZA_2]  = Padma::Padma_consnt_ZA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_JHA_1] = Padma::Padma_consnt_JHA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_JHA_2] = Padma::Padma_consnt_JHA;			

$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_TTA]   = Padma::Padma_consnt_TTA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_TTHA]  = Padma::Padma_consnt_TTHA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_DDA]   = Padma::Padma_consnt_DDA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_DDDHA] = Padma::Padma_consnt_DDDHA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_DDHA]  = Padma::Padma_consnt_DDHA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_RHA]   = Padma::Padma_consnt_RHA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_NNA_1] = Padma::Padma_consnt_NNA; 		
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_NNA_2] = Padma::Padma_consnt_NNA; 		

$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_TA_1]  = Padma::Padma_consnt_TA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_TA_2]  = Padma::Padma_consnt_TA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_THA_1] = Padma::Padma_consnt_THA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_THA_2] = Padma::Padma_consnt_THA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_DA]    = Padma::Padma_consnt_DA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_DHA_1] = Padma::Padma_consnt_DHA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_DHA_2] = Padma::Padma_consnt_DHA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_NA]    = Padma::Padma_consnt_NA;

$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_PA_1]  = Padma::Padma_consnt_PA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_PA_2]  = Padma::Padma_consnt_PA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_PHA]   = Padma::Padma_consnt_PHA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_BA]    = Padma::Padma_consnt_BA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_BHA_1] = Padma::Padma_consnt_BHA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_BHA_2] = Padma::Padma_consnt_BHA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_MA_1]  = Padma::Padma_consnt_MA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_MA_2]  = Padma::Padma_consnt_MA;

$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_YA_1]  = Padma::Padma_consnt_YA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_YA_2]  = Padma::Padma_consnt_YA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_RA]    = Padma::Padma_consnt_RA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_LA_1]  = Padma::Padma_consnt_LA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_LA_2]  = Padma::Padma_consnt_LA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_LA_3]  = Padma::Padma_consnt_LA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_VA]    = Padma::Padma_consnt_VA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_SHA_1] = Padma::Padma_consnt_SHA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_SHA_2] = Padma::Padma_consnt_SHA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_SHA_3] = Padma::Padma_consnt_SHA; 		
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_SSA_1] = Padma::Padma_consnt_SSA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_SSA_2] = Padma::Padma_consnt_SSA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_SA]    = Padma::Padma_consnt_SA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_HA]    = Padma::Padma_consnt_HA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_LLA]   = Padma::Padma_consnt_LLA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_consnt_KSH]   = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA; 		
//Gunintamulu
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_vowelsn_AA]   = Padma::Padma_vowelsn_AA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_vowelsn_I]    = Padma::Padma_vowelsn_I; 		
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_vowelsn_I_1]  = Padma::Padma_vowelsn_I; 		
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_vowelsn_I_2]  = Padma::Padma_vowelsn_I; 		
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_vowelsn_II_1] = Padma::Padma_vowelsn_II;		
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_vowelsn_II_2] = Padma::Padma_vowelsn_II;		
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_vowelsn_U_1]  = Padma::Padma_vowelsn_U;			
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_vowelsn_U_2]  = Padma::Padma_vowelsn_U;			
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_vowelsn_U_3]  = Padma::Padma_vowelsn_U;			
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_vowelsn_UU_1] = Padma::Padma_vowelsn_UU;			
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_vowelsn_UU_2] = Padma::Padma_vowelsn_UU;			
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_vowelsn_UU_3] = Padma::Padma_vowelsn_UU;			
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_vowelsn_R]    = Padma::Padma_vowelsn_R;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_vowelsn_CDR_E]= Padma::Padma_vowelsn_CDR_E;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_vowelsn_EE]   = Padma::Padma_vowelsn_EE;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_vowelsn_AI]   = Padma::Padma_vowelsn_AI;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_vowelsn_OO]   = Padma::Padma_vowelsn_OO;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_vowelsn_AU]   = Padma::Padma_vowelsn_AU;

//Vowel + anusvara
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_vowel_IIM]    = Padma::Padma_vowel_II . Padma::Padma_anusvara;

//matra + modifier
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_vowelsn_IM]   = Padma::Padma_vowelsn_I . Padma::Padma_anusvara;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_vowelsn_IIM]  = Padma::Padma_vowelsn_II . Padma::Padma_anusvara;  		
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_vowelsn_EEM]  = Padma::Padma_vowelsn_EE . Padma::Padma_anusvara;  		
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_vowelsn_AIM]  = Padma::Padma_vowelsn_AI . Padma::Padma_anusvara;  		
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_vowelsn_U_BINDU] = Padma::Padma_vowelsn_U . Padma::Padma_candrabindu;

//Halffm
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_halffm_KA]   = Padma::Padma_halffm_KA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_halffm_KSH]  = Padma::Padma_halffm_KA . Padma::Padma_halffm_SSA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_halffm_KHA]  = Padma::Padma_halffm_KHA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_halffm_KHHA] = Padma::Padma_halffm_KHHA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_halffm_GA]   = Padma::Padma_halffm_GA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_halffm_GHA]  = Padma::Padma_halffm_GHA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_halffm_CA]   = Padma::Padma_halffm_CA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_halffm_JA]   = Padma::Padma_halffm_JA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_halffm_JJ]   = Padma::Padma_halffm_JA . Padma::Padma_halffm_JA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_halffm_ZA_1] = Padma::Padma_halffm_ZA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_halffm_ZA_2] = Padma::Padma_halffm_ZA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_halffm_JHA]  = Padma::Padma_halffm_JHA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_halffm_NYA]  = Padma::Padma_halffm_NYA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_halffm_NNA]  = Padma::Padma_halffm_NNA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_halffm_TA]   = Padma::Padma_halffm_TA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_halffm_TT]   = Padma::Padma_halffm_TA . Padma::Padma_halffm_TA; 		
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_halffm_TR]   = Padma::Padma_halffm_TA . Padma::Padma_halffm_RA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_halffm_THA]  = Padma::Padma_halffm_THA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_halffm_DHA]  = Padma::Padma_halffm_DHA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_halffm_NA]   = Padma::Padma_halffm_NA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_halffm_NN]   = Padma::Padma_halffm_NA . Padma::Padma_halffm_NA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_halffm_PA]   = Padma::Padma_halffm_PA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_halffm_PHA]  = Padma::Padma_halffm_PHA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_halffm_BA]   = Padma::Padma_halffm_BA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_halffm_BHA]  = Padma::Padma_halffm_BHA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_halffm_MA]   = Padma::Padma_halffm_MA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_halffm_YA]   = Padma::Padma_halffm_YA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_halffm_RA]   = Padma::Padma_halffm_RA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_halffm_LA]   = Padma::Padma_halffm_LA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_halffm_VA]   = Padma::Padma_halffm_VA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_halffm_SHA]  = Padma::Padma_halffm_SHA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_halffm_SSA]  = Padma::Padma_halffm_SSA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_halffm_SA]   = Padma::Padma_halffm_SA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_halffm_HA]   = Padma::Padma_halffm_HA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_halffm_LLA]  = Padma::Padma_halffm_LLA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_halffm_RRA]  = Padma::Padma_halffm_RRA;

//Conjuncts
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_KK]     = Padma::Padma_consnt_KA . Padma::Padma_vattu_KA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_KV]     = Padma::Padma_consnt_KA . Padma::Padma_vattu_VA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_KT]     = Padma::Padma_consnt_KA . Padma::Padma_vattu_TA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_KSH]    = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_KSHEE]  = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA . Padma::Padma_vowelsn_EE;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_KHR]    = Padma::Padma_consnt_KHA . Padma::Padma_vattu_RA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_NGKSH]  = Padma::Padma_consnt_NGA . Padma::Padma_vattu_KA . Padma::Padma_vattu_SSA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_NGK]    = Padma::Padma_consnt_NGA . Padma::Padma_vattu_KA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_NGKH]   = Padma::Padma_consnt_NGA . Padma::Padma_vattu_KHA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_NGG]    = Padma::Padma_consnt_NGA . Padma::Padma_vattu_GA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_NGGH]   = Padma::Padma_consnt_NGA . Padma::Padma_vattu_GHA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_NGM]    = Padma::Padma_consnt_NGA . Padma::Padma_vattu_MA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_CC]     = Padma::Padma_consnt_CA . Padma::Padma_vattu_CA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_JNY]    = Padma::Padma_consnt_JA . Padma::Padma_vattu_NYA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_JHR]    = Padma::Padma_consnt_JHA . Padma::Padma_vattu_RA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_NYC]    = Padma::Padma_consnt_NYA . Padma::Padma_vattu_CA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_JJ]     = Padma::Padma_consnt_JA . Padma::Padma_vattu_JA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_TTTT]   = Padma::Padma_consnt_TTA . Padma::Padma_vattu_TTA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_TT_TTH] = Padma::Padma_consnt_TTA . Padma::Padma_vattu_TTHA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_TTHTTH] = Padma::Padma_consnt_TTHA . Padma::Padma_vattu_TTHA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_DDDD]   = Padma::Padma_consnt_DDA . Padma::Padma_vattu_DDA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_DD_DDH] = Padma::Padma_consnt_DDA . Padma::Padma_vattu_DDHA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_DDHDDH] = Padma::Padma_consnt_DDHA . Padma::Padma_vattu_DDHA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_TT]     = Padma::Padma_consnt_TA . Padma::Padma_vattu_TA; 		
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_TR_2]   = Padma::Padma_consnt_TA . Padma::Padma_vattu_RA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_TR_3]   = Padma::Padma_consnt_TA . Padma::Padma_vattu_RA; 		
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_DG]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_GA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_DGH]    = Padma::Padma_consnt_DA . Padma::Padma_vattu_GHA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_DD]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_DA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_D_DH]   = Padma::Padma_consnt_DA . Padma::Padma_vattu_DHA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_DB]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_BA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_DBH]    = Padma::Padma_consnt_DA . Padma::Padma_vattu_BHA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_DM]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_MA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_DY]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_YA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_DV]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_VA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_NN]     = Padma::Padma_consnt_NA . Padma::Padma_vattu_NA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_PT]     = Padma::Padma_consnt_PA . Padma::Padma_vattu_TA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_LL]     = Padma::Padma_consnt_LA . Padma::Padma_vattu_LA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_SHC]    = Padma::Padma_consnt_SHA . Padma::Padma_vattu_CA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_SHR]    = Padma::Padma_consnt_SHA . Padma::Padma_vattu_RA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_SHREE]  = Padma::Padma_consnt_SHA . Padma::Padma_vattu_RA . Padma::Padma_vowelsn_EE;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_SHV]    = Padma::Padma_consnt_SHA . Padma::Padma_vattu_VA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_SSTT]   = Padma::Padma_consnt_SSA . Padma::Padma_vattu_TTA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_SSTTH]  = Padma::Padma_consnt_SSA . Padma::Padma_vattu_TTHA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_STR]    = Padma::Padma_consnt_SA . Padma::Padma_vattu_TA . Padma::Padma_vattu_RA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_SR]     = Padma::Padma_consnt_SA . Padma::Padma_vattu_RA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_HNN]    = Padma::Padma_consnt_HA . Padma::Padma_vattu_NNA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_HN]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_NA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_HM]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_MA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_HY]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_YA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_HR]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_RA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_HL]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_LA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_HV]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_VA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_DRA]    = Padma::Padma_consnt_DA . Padma::Padma_vattu_RA; 		
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_PRA]    = Padma::Padma_consnt_PA . Padma::Padma_vattu_RA; 		
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_GN]     = Padma::Padma_consnt_GA . Padma::Padma_vattu_NA; 		
//Combos
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_combo_RU]      = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_U;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_combo_RUU]     = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_UU;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_conjct_SHAU]   = Padma::Padma_consnt_SHA . Padma::Padma_vowelsn_AU;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_combo_HR]      = Padma::Padma_consnt_HA . Padma::Padma_vowelsn_R;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_combo_DR]      = Padma::Padma_consnt_DA . Padma::Padma_vowelsn_R;		
//Half forms of RA
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_halffm_REE]    = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_EE;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_halffm_RII]    = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_II;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_halffm_RIIM]   = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_II . Padma::Padma_anusvara;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_halffm_RA_ANU] = Padma::Padma_halffm_RA . Padma::Padma_anusvara;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_halffm_RAI]    = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_AI;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_halffm_RAIM]   = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_AI . Padma::Padma_anusvara;

$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_vattu_YA]      = Padma::Padma_vattu_YA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_vattu_RA_1]    = Padma::Padma_vattu_RA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_vattu_RA_2]    = Padma::Padma_vattu_RA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_vattu_RA_3]    = Padma::Padma_vattu_RA;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_vattu_RA_4]    = Padma::Padma_vattu_RA;		
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_vattu_RA_5]    = Padma::Padma_vattu_RA;		


$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_misc_DANDA]    = Padma::Padma_danda;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_misc_OM]       = Padma::Padma_om;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_nukta_1]       = Padma::Padma_nukta;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_nukta_2]       = Padma::Padma_nukta;

//Digits
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_digit_ZERO]    = Padma::Padma_digit_ZERO;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_digit_ONE]     = Padma::Padma_digit_ONE;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_digit_TWO]     = Padma::Padma_digit_TWO;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_digit_THREE]   = Padma::Padma_digit_THREE;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_digit_FOUR]    = Padma::Padma_digit_FOUR;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_digit_FIVE]    = Padma::Padma_digit_FIVE;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_digit_SIX]     = Padma::Padma_digit_SIX;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_digit_SEVEN]   = Padma::Padma_digit_SEVEN;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_digit_EIGHT]   = Padma::Padma_digit_EIGHT;
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_digit_NINE]    = Padma::Padma_digit_NINE;


//Does not match ASCII
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_LQTSINGLE]        = "\xE2\x80\x98";
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_RQTSINGLE]        = "\xE2\x80\x99"; 
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_MULTIPLY]         = "\xC3\x97"; //Unicode for multiplication symbol
$Shree_Dev_0714_toPadma[Shree_Dev_0714::Shree_Dev_0714_PERCENT]          = "%";

$Shree_Dev_0714_prefixList = array();
$Shree_Dev_0714_prefixList[Shree_Dev_0714::Shree_Dev_0714_vowelsn_I]  = true;
$Shree_Dev_0714_prefixList[Shree_Dev_0714::Shree_Dev_0714_vowelsn_I_1]= true;
$Shree_Dev_0714_prefixList[Shree_Dev_0714::Shree_Dev_0714_vowelsn_I_2]= true;
$Shree_Dev_0714_prefixList[Shree_Dev_0714::Shree_Dev_0714_vowelsn_IM] = true;
$Shree_Dev_0714_prefixList[Shree_Dev_0714::Shree_Dev_0714_nukta_1]    = true;
//$Shree_Dev_0714_prefixList[Shree_Dev_0714::Shree_Dev_0714_halffm_RI]  = true;
//$Shree_Dev_0714_prefixList[Shree_Dev_0714::Shree_Dev_0714_halffm_RIM] = true;

$Shree_Dev_0714_suffixList = array();
$Shree_Dev_0714_suffixList[Shree_Dev_0714::Shree_Dev_0714_halffm_RA]     = true;
$Shree_Dev_0714_suffixList[Shree_Dev_0714::Shree_Dev_0714_halffm_REE]    = true;
$Shree_Dev_0714_suffixList[Shree_Dev_0714::Shree_Dev_0714_halffm_RII]    = true;
$Shree_Dev_0714_suffixList[Shree_Dev_0714::Shree_Dev_0714_halffm_RA_ANU] = true;
$Shree_Dev_0714_suffixList[Shree_Dev_0714::Shree_Dev_0714_halffm_RAI]    = true;
$Shree_Dev_0714_suffixList[Shree_Dev_0714::Shree_Dev_0714_halffm_RAIM]   = true;


$Shree_Dev_0714_redundantList = array();
$Shree_Dev_0714_redundantList[Shree_Dev_0714::Shree_Dev_0714_misc_UNKNOWN_1] = true;
$Shree_Dev_0714_redundantList[Shree_Dev_0714::Shree_Dev_0714_misc_UNKNOWN_2] = true;
$Shree_Dev_0714_redundantList[Shree_Dev_0714::Shree_Dev_0714_misc_UNKNOWN_3] = true;
$Shree_Dev_0714_redundantList[Shree_Dev_0714::Shree_Dev_0714_misc_UNKNOWN_4] = true;
$Shree_Dev_0714_redundantList[Shree_Dev_0714::Shree_Dev_0714_misc_UNKNOWN_5] = true;
$Shree_Dev_0714_redundantList[Shree_Dev_0714::Shree_Dev_0714_HYPHEN]         = true;
$Shree_Dev_0714_redundantList[Shree_Dev_0714::Shree_Dev_0714_PERIOD]         = true;

$Shree_Dev_0714_overloadList = array();
$Shree_Dev_0714_overloadList[Shree_Dev_0714::Shree_Dev_0714_vowel_A]     = true;
$Shree_Dev_0714_overloadList[Shree_Dev_0714::Shree_Dev_0714_vowel_AA]    = true;
$Shree_Dev_0714_overloadList[Shree_Dev_0714::Shree_Dev_0714_vowel_EE]    = true;
$Shree_Dev_0714_overloadList[Shree_Dev_0714::Shree_Dev_0714_vowel_I]     = true;
$Shree_Dev_0714_overloadList[Shree_Dev_0714::Shree_Dev_0714_consnt_DDA]  = true;
$Shree_Dev_0714_overloadList[Shree_Dev_0714::Shree_Dev_0714_consnt_DDHA] = true;
$Shree_Dev_0714_overloadList[Shree_Dev_0714::Shree_Dev_0714_vowelsn_AA]  = true;
$Shree_Dev_0714_overloadList[Shree_Dev_0714::Shree_Dev_0714_halffm_KSH]  = true;
$Shree_Dev_0714_overloadList[Shree_Dev_0714::Shree_Dev_0714_halffm_KHA]  = true;
$Shree_Dev_0714_overloadList[Shree_Dev_0714::Shree_Dev_0714_halffm_KHHA] = true;
$Shree_Dev_0714_overloadList[Shree_Dev_0714::Shree_Dev_0714_halffm_GA]   = true;
$Shree_Dev_0714_overloadList[Shree_Dev_0714::Shree_Dev_0714_halffm_GHA]  = true;
$Shree_Dev_0714_overloadList[Shree_Dev_0714::Shree_Dev_0714_halffm_CA]   = true;
$Shree_Dev_0714_overloadList[Shree_Dev_0714::Shree_Dev_0714_halffm_JA]   = true;
$Shree_Dev_0714_overloadList[Shree_Dev_0714::Shree_Dev_0714_halffm_JJ]   = true;
//$Shree_Dev_0714_overloadList[Shree_Dev_0714::Shree_Dev_0714_halffm_JNY]  = true;
$Shree_Dev_0714_overloadList[Shree_Dev_0714::Shree_Dev_0714_halffm_ZA_1] = true;
$Shree_Dev_0714_overloadList[Shree_Dev_0714::Shree_Dev_0714_halffm_ZA_2] = true;
$Shree_Dev_0714_overloadList[Shree_Dev_0714::Shree_Dev_0714_halffm_JHA]  = true;
$Shree_Dev_0714_overloadList[Shree_Dev_0714::Shree_Dev_0714_halffm_NNA]  = true;
$Shree_Dev_0714_overloadList[Shree_Dev_0714::Shree_Dev_0714_halffm_TA]   = true;
$Shree_Dev_0714_overloadList[Shree_Dev_0714::Shree_Dev_0714_halffm_TT]   = true;
$Shree_Dev_0714_overloadList[Shree_Dev_0714::Shree_Dev_0714_halffm_TR]   = true;
$Shree_Dev_0714_overloadList[Shree_Dev_0714::Shree_Dev_0714_halffm_THA]  = true;
$Shree_Dev_0714_overloadList[Shree_Dev_0714::Shree_Dev_0714_halffm_DHA]  = true;
$Shree_Dev_0714_overloadList[Shree_Dev_0714::Shree_Dev_0714_halffm_NN]   = true;
$Shree_Dev_0714_overloadList[Shree_Dev_0714::Shree_Dev_0714_halffm_BHA]  = true;
$Shree_Dev_0714_overloadList[Shree_Dev_0714::Shree_Dev_0714_halffm_PA]   = true;
$Shree_Dev_0714_overloadList[Shree_Dev_0714::Shree_Dev_0714_halffm_MA]   = true;
$Shree_Dev_0714_overloadList[Shree_Dev_0714::Shree_Dev_0714_halffm_YA]   = true;
$Shree_Dev_0714_overloadList[Shree_Dev_0714::Shree_Dev_0714_halffm_LA]   = true;
$Shree_Dev_0714_overloadList[Shree_Dev_0714::Shree_Dev_0714_halffm_SHA]  = true;
//$Shree_Dev_0714_overloadList[Shree_Dev_0714::Shree_Dev_0714_halffm_SHR]  = true;
$Shree_Dev_0714_overloadList[Shree_Dev_0714::Shree_Dev_0714_halffm_SSA]  = true;

function Shree_Dev_0714_initialize()
{
    global $fontinfo;

    $fontinfo["shree-dev-0714"]["language"] = "Devanagari";
    $fontinfo["shree-dev-0714"]["class"] = "Shree_Dev_0714";
}

?>
