<?php
/* ***** BEGIN LICENSE BLOCK *****
 *
 *  This file is originally part of Padma.
 *
 *  Copyright (C) 2005-2006 Nagarjuna Venna <vnagarjuna@yahoo.com>
 *  Copyright (C) 2006 Radhika Thammishetty  <radhika@atc.tcs.com>
 *  Copyright (C) 2006 Harshita Vani     <harshita@atc.tcs.com>
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

//The font files used by Dainik Bhaskar (Bhaskar), Dainik Jagran (Jagran),
//Amar Ujala (AU) and Rajasthan Patrika (ePatrika), Punjab Kesari (Chanakya)
// are identical except for minor differences.

class BEJA
{
function BEJA()
{
}

//Generate the slightly different lookup tables
function initialize()
{
    global $BEJA_toPadma;
    global $BEJA_toPadma_BE;
    global $BEJA_toPadma_JA;
    global $BEJA_overloadList;
    global $BEJA_overloadList_JA;
   
   foreach ($BEJA_toPadma as $name => $value )
      $BEJA_toPadma_BE[$name] = $BEJA_toPadma_JA[$name] = $value;

   foreach ($BEJA_overloadList as $name => $value)
        $BEJA_overloadList_JA[$name] = $value;
    }

var $maxLookupLen = 3;

function isPrefixSymbol($str)
{
    global $BEJA_prefixList;
    return $BEJA_prefixList[$str] != null;
}

function isSuffixSymbol($str)
{
    global $BEJA_suffixList;
    return $BEJA_suffixList[$str] != null;
}

function isOverloaded($str)
{
    global $BEJA_overloadList;
    return $BEJA_overloadList[$str] != null;
}

function handleTwoPartVowelSigns($sign1, $sign2)
{
    if (($sign1 == Padma::Padma_vowelsn_EE && $sign2 == Padma::Padma_vowelsn_AA) ||
        ($sign1 == Padma::Padma_vowelsn_AA && $sign2 ==Padma::Padma_vowelsn_EE))
    return Padma::Padma_vowelsn_OO;  //Y
    if (($sign1 == Padma::Padma_vowelsn_CDR_E && $sign2 == Padma::Padma_vowelsn_AA) ||
        ($sign1 == Padma::Padma_vowelsn_AA && $sign2 == Padma::Padma_vowelsn_CDR_E))
    return Padma::Padma_vowelsn_CDR_O;  //Y
    if (($sign1 == Padma::Padma_vowelsn_AI && $sign2 == Padma::Padma_vowelsn_AA) ||
        ($sign1 == Padma::Padma_vowelsn_AA && $sign2 == Padma::Padma_vowelsn_AI))
        return Padma::Padma_vowelsn_AU;
    return $sign1 . $sign2;    
}

function isRedundant($str)
{
    global $BEJA_redundantList;
    return $BEJA_redundantList[$str] != null;
}

//TODO: 52, B2, DE, EE, 97 (2014), 9B (203A), 9C (153), 9D
//_JA: 7C
//Common stuff
//Specials
const BEJA_avagraha       = "\xC3\xB9";
const BEJA_anusvara_1     = "\xC2\xA2";
const BEJA_anusvara_2     = "\xC2\xB4";
const BEJA_candrabindu    = "\xC2\xA1";
const BEJA_virama         = "\xC3\xB7";
//const BEJA_visarga        = "\xC3\x91";

//Vowels
const BEJA_vowel_A        = "\xC2\xA5";
const BEJA_vowel_AA       = "\xC2\xA5\xC3\xA6";
const BEJA_vowel_I        = "\xC2\xA7";
const BEJA_vowel_II       = "\xC2\xA7\xC3\xBC";
const BEJA_vowel_U        = "\xC2\xA9";
const BEJA_vowel_UU       = "\xC2\xAA";
const BEJA_vowel_R        = "\xC2\xAB";
const BEJA_vowel_RR       = "\xC2\xAC";
const BEJA_vowel_CDR_E    = "\xC2\xB0\xC3\xB2";
const BEJA_vowel_EE       = "\xC2\xB0";
const BEJA_vowel_AI       = "\xC2\xB0\xC3\xB0";
const BEJA_vowel_CDR_O    = "\xC2\xA5\xC3\xA6\xC3\xB2";
const BEJA_vowel_OO_1     = "\xC2\xA5\xC3\xA6\xC3\xB0";
const BEJA_vowel_OO_2     = "\xC2\xA5\xC3\xB4";
const BEJA_vowel_AU_1     = "\xC2\xA5\xC3\xA6\xC3\xB1";
const BEJA_vowel_AU_2     = "\xC2\xA5\xC3\xB5";

//Consonants
const BEJA_consnt_KA      = "\xC2\xB7";
const BEJA_consnt_KHA_1   = "\xC2\x81\xC3\xA6";
const BEJA_consnt_KHA_2   = "\xC2\xB9";
const BEJA_consnt_GA_1    = "\xE2\x80\x9A\xC3\xA6";
const BEJA_consnt_GA_2    = "\xC2\xBB";
const BEJA_consnt_GHA     = "\xC6\x92\xC3\xA6";
const BEJA_consnt_NGA     = "\xC2\xBE";

const BEJA_consnt_CA_1    = "\xE2\x80\x98\xC3\xA6";
const BEJA_consnt_CA_2    = "\xC2\xBF";
const BEJA_consnt_CHA     = "\xC3\x80";
const BEJA_consnt_JA      = "\xC3\x81";
const BEJA_consnt_ZA_1    = "\xE2\x80\xA2\xC3\xA6";
const BEJA_consnt_ZA_2    = "\xC3\x8A\xC3\xA6";
const BEJA_consnt_JHA     = "\xC3\x9B\xC3\xA6";

const BEJA_consnt_TTA     = "\xC3\x85";
const BEJA_consnt_TTHA    = "\xC3\x86";
const BEJA_consnt_DDA     = "\xC3\x87";
const BEJA_consnt_DDDHA   = "\xC3\x87\xC2\xB8";
const BEJA_consnt_DDHA    = "\xC3\x89";
const BEJA_consnt_RHA     = "\xC3\x89\xC2\xB8";
const BEJA_consnt_NNA     = "\xE2\x80\xA1\xC3\xA6";

const BEJA_consnt_TA_1    = "\xCB\x86\xC3\xA6";
const BEJA_consnt_TA_2    = "\xC3\x8C";
const BEJA_consnt_TA_3    = "\xC3\xA6";
const BEJA_consnt_THA_1   = "\xE2\x80\xB0\xC3\xA6";
const BEJA_consnt_THA_2   = "\xC3\x8D";
const BEJA_consnt_DA_1    = "\xC2\xBC";
const BEJA_consnt_DA_2    = "\xC3\x8E";
const BEJA_consnt_DHA_1   = "\xC5\xA0\xC3\xA6";
const BEJA_consnt_DHA_2   = "\xC3\x8F";
const BEJA_consnt_NA      = "\xC3\x99";

const BEJA_consnt_PA_1    = "\xC3\x82";
const BEJA_consnt_PA_2    = "\xC5\x92\xC3\xA6";
const BEJA_consnt_PHA     = "\xC3\x88";
const BEJA_consnt_BA      = "\xC3\x95";
const BEJA_consnt_BHA_1   = "\xC2\x8F\xC3\xA6";
const BEJA_consnt_BHA_2   = "\xC3\x96";
const BEJA_consnt_MA_1    = "\xC2\x90\xC3\xA6";
const BEJA_consnt_MA_2    = "\xC3\x97";

const BEJA_consnt_YA_1    = "\xC3\x84\xC3\xA6";
const BEJA_consnt_YA_2    = "\xC3\x98";
const BEJA_consnt_RA      = "\xC3\x9A";
const BEJA_consnt_LA_1    = "\xC2\xB6";
const BEJA_consnt_LA_2    = "\xC3\x8B\xC3\xA6";
const BEJA_consnt_LA_3    = "\xC3\x9C";
const BEJA_consnt_VA      = "\xC3\x9F";
const BEJA_consnt_SHA_1   = "\xC3\xA0\xC3\xA6";
const BEJA_consnt_SHA_2   = "\x6F";
const BEJA_consnt_SSA_1   = "\x63\xC3\xA6";
const BEJA_consnt_SSA_2   = "\xC3\xA1";
const BEJA_consnt_SA      = "\xC3\xA2";
const BEJA_consnt_HA      = "\xC3\xA3";
const BEJA_consnt_LLA     = "\xC3\x9D";

//Gunintamulu
const BEJA_vowelsn_AA     = "\xC3\xA6";
const BEJA_vowelsn_I      = "\xC3\xA7";
const BEJA_vowelsn_II     = "\xC3\xA8";
const BEJA_vowelsn_U_1    = "\xC3\xA4";
const BEJA_vowelsn_U_2    = "\xC3\xA9";
const BEJA_vowelsn_UU_1   = "\xC3\xA5";
const BEJA_vowelsn_UU_2   = "\xC3\xAA";
const BEJA_vowelsn_R      = "\xC3\xAB";
const BEJA_vowelsn_CDR_E  = "\xC3\xB2";
const BEJA_vowelsn_EE_1   = "\xC3\xB0";
const BEJA_vowelsn_EE_2   = "\xC3\x94";
const BEJA_vowelsn_AI     = "\xC3\xB1";
const BEJA_vowelsn_OO     = "\xC3\xB4";
const BEJA_vowelsn_AU     = "\xC3\xB5";

//Vowel + anusvara
const BEJA_vowel_IIM      = "\xC2\xA7\x5A";
//Matra + modifier
const BEJA_vowelsn_IM     = "\xC2\xA8";
const BEJA_vowelsn_U_BINDU = "\xC5\xA1";

//Half Forms
const BEJA_halffm_KA      = "\xE2\x82\xAC";
const BEJA_halffm_KSH     = "\xC3\xBF";
const BEJA_halffm_KHA     = "\xC2\x81";
const BEJA_halffm_GA      = "\xE2\x80\x9A";
const BEJA_halffm_GHA     = "\xC6\x92";
const BEJA_halffm_CA      = "\xE2\x80\x98";
const BEJA_halffm_CC      = "\xE2\x80\x9C";
const BEJA_halffm_JA_1    = "\xE2\x80\xA6";
const BEJA_halffm_JA_2    = "\xE2\x80\x99";
const BEJA_halffm_JJ      = "\xE2\x80\x9D";
const BEJA_halffm_JNY     = "\xE2\x84\xA2";
const BEJA_halffm_ZA_1    = "\xE2\x80\xA2";
const BEJA_halffm_ZA_2    = "\xC3\x8A";
const BEJA_halffm_JHA     = "\xC3\x9B";
const BEJA_halffm_NYA     = "\xE2\x80\xA0";
const BEJA_halffm_NNA     = "\xE2\x80\xA1";
const BEJA_halffm_TA      = "\xCB\x86";
const BEJA_halffm_TT      = "\xC5\xBE";
const BEJA_halffm_TR      = "\xCB\x9C";
const BEJA_halffm_THA     = "\xE2\x80\xB0";
const BEJA_halffm_DHA     = "\xC5\xA0";
const BEJA_halffm_NA      = "\xE2\x80\xB9";
const BEJA_halffm_NN      = "\xC3\xB3";
const BEJA_halffm_PA      = "\xC5\x92";
const BEJA_halffm_PHA     = "\xC2\x8D";
const BEJA_halffm_BA      = "\xC5\xBD";
const BEJA_halffm_BHA     = "\xC2\x8F";
const BEJA_halffm_MA      = "\xC2\x90";
const BEJA_halffm_YA      = "\xC3\x84";
const BEJA_halffm_RA      = "\xC3\xBC";
const BEJA_halffm_LA      = "\xC3\x8B";
const BEJA_halffm_VA      = "\xC3\x83";
const BEJA_halffm_SHA_1   = "\xC2\xB3";
const BEJA_halffm_SHA_2   = "\xC3\xA0";
const BEJA_halffm_SHR     = "\xC5\xB8";
const BEJA_halffm_SSA     = "\x63";
const BEJA_halffm_SA      = "\x53";
const BEJA_halffm_HA      = "\xC2\xB1";
const BEJA_halffm_LLA     = "\xC3\xBB";
const BEJA_halffm_RRA     = "\x3A";

//Conjuncts
const BEJA_conjct_KK      = "\x50";
const BEJA_conjct_KC      = "\x42";
const BEJA_conjct_KV      = "\x60";
const BEJA_conjct_KT      = "\x51";
const BEJA_conjct_KSH     = "\xC3\xBF\xC3\xA6";
const BEJA_conjct_KSHEE   = "\xC3\xBF\xC3\xB4";
const BEJA_conjct_KHN     = "\xC2\xAF";
const BEJA_conjct_KHR     = "\xC2\xBA";
const BEJA_conjct_NGK     = "\x56";
const BEJA_conjct_NGKH    = "\x57";
const BEJA_conjct_NGKT    = "\xE2\x80\x93";
const BEJA_conjct_NGG     = "\x58";
const BEJA_conjct_NGGH    = "\x59";
const BEJA_conjct_CC      = "\xE2\x80\x9C\xC3\xA6";
const BEJA_conjct_CHV     = "\x4A";
const BEJA_conjct_JNY     = "\xE2\x84\xA2\xC3\xA6";
const BEJA_conjct_JHR     = "\x5C";
const BEJA_conjct_NYC     = "\x40";
const BEJA_conjct_NYJ     = "\x54";
const BEJA_conjct_JJ      = "\xE2\x80\x9D\xC3\xA6";
const BEJA_conjct_TTTT    = "\x5E";
const BEJA_conjct_TT_TTH  = "\x5F";
const BEJA_conjct_TTHTTH  = "\x6E";
const BEJA_conjct_DDTT    = "\xC2\xBD";
const BEJA_conjct_DDDD    = "\x61";
const BEJA_conjct_DD_DDH  = "\x62";
const BEJA_conjct_DDHDDH  = "\x49";
const BEJA_conjct_TT      = "\xC5\xBE\xC3\xA6";
const BEJA_conjct_TR_1    = "\x47";
const BEJA_conjct_TR_2    = "\xCB\x9C\xC3\xA6";
const BEJA_conjct_TN      = "\x25";
const BEJA_conjct_DG      = "\x65";
const BEJA_conjct_DGH     = "\x66";
const BEJA_conjct_DD      = "\x67";
const BEJA_conjct_D_DH    = "\x68";
const BEJA_conjct_DB      = "\x69";
const BEJA_conjct_DBR     = "\xC2\xB5";
const BEJA_conjct_DBH     = "\x6A";
const BEJA_conjct_DM      = "\x6B";
const BEJA_conjct_DY      = "\x6C";
const BEJA_conjct_DV      = "\x6D";
const BEJA_conjct_NN      = "\xC3\xB3\xC3\xA6";
const BEJA_conjct_PT      = "\x23";
const BEJA_conjct_LL      = "\xE2\x80\x9E";
const BEJA_conjct_SHC     = "\x70";
const BEJA_conjct_SHR     = "\xC5\xB8\xC3\xA6";
const BEJA_conjct_SHREE   = "\xC5\xB8\xC3\xB4";
const BEJA_conjct_SHV     = "\x45";
const BEJA_conjct_SSTT    = "\x43";
const BEJA_conjct_SSTTV   = "\xC2\xA6";
const BEJA_conjct_SSTTH   = "\x44";
const BEJA_conjct_STR     = "\x64";
const BEJA_conjct_SN      = "\x46";
const BEJA_conjct_HNN     = "\xC3\xB6";
const BEJA_conjct_HN      = "\x71";
const BEJA_conjct_HM      = "\x72";
const BEJA_conjct_HY      = "\x73";
const BEJA_conjct_HR      = "\x4F";
const BEJA_conjct_HL      = "\x74";
const BEJA_conjct_HV      = "\x75";

//Combos
const BEJA_combo_RU       = "\x4C";
const BEJA_combo_RUU      = "\x4D";
const BEJA_conjct_SHAU    = "\xC3\xA0\xC3\xB5";
const BEJA_combo_HR       = "\x4E";

//Half forms of RA
const BEJA_halffm_RI      = "\xC3\xAD";
const BEJA_halffm_RIM     = "\xC3\xAC";
const BEJA_halffm_RA_ANU  = "\x5A";

const BEJA_vattu_YA       = "\x4B";
const BEJA_vattu_RA_1     = "\x41";
const BEJA_vattu_RA_2     = "\xC3\xBD";
const BEJA_vattu_RA_3     = "\xC3\xBE";
const BEJA_vattu_LA       = "\xC2\xA3";

const BEJA_misc_DANDA     = "\xC3\x90";
const BEJA_misc_DDANDA    = "\x48";
const BEJA_misc_OM        = "\xC3\xBA";
const BEJA_misc_ABBREV    = "\xC3\xB8";
const BEJA_nukta_1        = "\x24";
const BEJA_nukta_2        = "\xC2\xB8";

//Digits
const BEJA_digit_ZERO     = "\x30";
const BEJA_digit_ZERO_ext = "\xC2\xAE";
const BEJA_digit_ONE      = "\x31";
const BEJA_digit_TWO      = "\x32";
const BEJA_digit_THREE    = "\x33";
const BEJA_digit_FOUR     = "\x34";
const BEJA_digit_FIVE     = "\x35";
const BEJA_digit_SIX      = "\x36";
const BEJA_digit_SEVEN    = "\x37";
const BEJA_digit_EIGHT    = "\x38";
const BEJA_digit_NINE     = "\x39";

//Matches ASCII
const BEJA_EXCLAM         = "\x21";
const BEJA_PAREN_LEFT     = "\x28";
const BEJA_PAREN_RIGHT    = "\x29";
const BEJA_ASTERISK       = "\x2A";
const BEJA_PLUS           = "\x2B";
const BEJA_COMMA          = "\x2C";
const BEJA_PERIOD         = "\x2E";
const BEJA_SLASH          = "\x2F";
const BEJA_SEMICOLON      = "\x3B";
const BEJA_LESSTHAN       = "\x3C";
const BEJA_EQUALS         = "\x3D";
const BEJA_GREATERTHAN    = "\x3E";
const BEJA_QUESTION       = "\x3F";
const BEJA_LEFTSQBKT      = "\x5B";
const BEJA_RIGHTSQBKT     = "\x5D";

//Does not match ASCII
const BEJA_extra_QTSINGLE_1 = "\xC3\x92";
const BEJA_extra_QTSINGLE_2 = "\xC3\x93";
const BEJA_MULTIPLY       = "\x26";
const BEJA_PERCENT        = "\x27";
const BEJA_extra_COLON    = "\xC3\x91";

const BEJA_misc_UNKNOWN_1 = "\x55";
const BEJA_misc_UNKNOWN_2 = "\xC2\xA4";
const BEJA_misc_UNKNOWN_3 = "\xC3\xAF";

//Specific to const Bhaskar and ePatrika fonts
const BEJA_DIVIDE_BE      = "\x22";
const BEJA_digit_ONE_BE   = "\x76";
const BEJA_digit_TWO_BE   = "\x77";
const BEJA_digit_THREE_BE = "\x78";
const BEJA_digit_FOUR_BE  = "\x79";
const BEJA_digit_FIVE_BE  = "\x7A";
const BEJA_digit_SIX_BE   = "\x7B";
const BEJA_digit_SEVEN_BE = "\x7C";
const BEJA_digit_EIGHT_BE = "\x7D";
const BEJA_digit_NINE_BE  = "\x7E";

//Specific to Jagran and AU fonts
const BEJA_SWASTIKA_JA    = "\x22"; //TODO
const BEJA_consnt_KHA_JA  = "\x77\xC3\xA6";
const BEJA_consnt_BA_JA   = "\x79\xC3\xA6";
const BEJA_consnt_BHA_JA  = "\x7A\xC3\xA6";
const BEJA_consnt_MA_JA   = "\x7B\xC3\xA6";
const BEJA_conjct_TT_JA   = "\x7D\xC3\xA6";
const BEJA_halffm_KA_JA   = "\x76";
const BEJA_halffm_KHA_JA  = "\x77";
const BEJA_halffm_PHA_JA  = "\x78";
const BEJA_halffm_BA_JA   = "\x79";
const BEJA_halffm_BHA_JA  = "\x7A";
const BEJA_halffm_MA_JA   = "\x7B";
const BEJA_halffm_TT_JA   = "\x7D";
const BEJA_vowelsn_EE_JA  = "\x7E";

}

$BEJA_toPadma = array();
$BEJA_toPadma[BEJA::BEJA_avagraha]    = Padma::Padma_avagraha;
$BEJA_toPadma[BEJA::BEJA_anusvara_1]  = Padma::Padma_anusvara;
$BEJA_toPadma[BEJA::BEJA_anusvara_2]  = Padma::Padma_anusvara;
$BEJA_toPadma[BEJA::BEJA_candrabindu] = Padma::Padma_candrabindu;
$BEJA_toPadma[BEJA::BEJA_virama]      = Padma::Padma_syllbreak;
//$BEJA_toPadma[BEJA::BEJA_visarga]     = Padma::Padma_visarga;

$BEJA_toPadma[BEJA::BEJA_vowel_A]    = Padma::Padma_vowel_A;
$BEJA_toPadma[BEJA::BEJA_vowel_AA]   = Padma::Padma_vowel_AA;
$BEJA_toPadma[BEJA::BEJA_vowel_I]    = Padma::Padma_vowel_I;
$BEJA_toPadma[BEJA::BEJA_vowel_II]   = Padma::Padma_vowel_II;
$BEJA_toPadma[BEJA::BEJA_vowel_U]    = Padma::Padma_vowel_U;
$BEJA_toPadma[BEJA::BEJA_vowel_UU]   = Padma::Padma_vowel_UU;
$BEJA_toPadma[BEJA::BEJA_vowel_R]    = Padma::Padma_vowel_R;
$BEJA_toPadma[BEJA::BEJA_vowel_RR]   = Padma::Padma_vowel_RR;
$BEJA_toPadma[BEJA::BEJA_vowel_CDR_E] = Padma::Padma_vowel_CDR_E;
$BEJA_toPadma[BEJA::BEJA_vowel_EE]   = Padma::Padma_vowel_EE;
$BEJA_toPadma[BEJA::BEJA_vowel_AI]   = Padma::Padma_vowel_AI;
$BEJA_toPadma[BEJA::BEJA_vowel_CDR_O] = Padma::Padma_vowel_CDR_O;
$BEJA_toPadma[BEJA::BEJA_vowel_OO_1] = Padma::Padma_vowel_OO;
$BEJA_toPadma[BEJA::BEJA_vowel_OO_2] = Padma::Padma_vowel_OO;
$BEJA_toPadma[BEJA::BEJA_vowel_AU_1] = Padma::Padma_vowel_AU;
$BEJA_toPadma[BEJA::BEJA_vowel_AU_2] = Padma::Padma_vowel_AU;

$BEJA_toPadma[BEJA::BEJA_consnt_KA]    = Padma::Padma_consnt_KA;
$BEJA_toPadma[BEJA::BEJA_consnt_KHA_1] = Padma::Padma_consnt_KHA;
$BEJA_toPadma[BEJA::BEJA_consnt_KHA_2] = Padma::Padma_consnt_KHA;
$BEJA_toPadma[BEJA::BEJA_consnt_GA_1]  = Padma::Padma_consnt_GA;
$BEJA_toPadma[BEJA::BEJA_consnt_GA_2]  = Padma::Padma_consnt_GA;
$BEJA_toPadma[BEJA::BEJA_consnt_GHA]   = Padma::Padma_consnt_GHA;
$BEJA_toPadma[BEJA::BEJA_consnt_NGA]   = Padma::Padma_consnt_NGA;

$BEJA_toPadma[BEJA::BEJA_consnt_CA_1]  = Padma::Padma_consnt_CA;
$BEJA_toPadma[BEJA::BEJA_consnt_CA_2]  = Padma::Padma_consnt_CA;
$BEJA_toPadma[BEJA::BEJA_consnt_CHA]   = Padma::Padma_consnt_CHA;
$BEJA_toPadma[BEJA::BEJA_consnt_JA]    = Padma::Padma_consnt_JA;
$BEJA_toPadma[BEJA::BEJA_consnt_ZA_1]  = Padma::Padma_consnt_ZA;
$BEJA_toPadma[BEJA::BEJA_consnt_ZA_2]  = Padma::Padma_consnt_ZA;
$BEJA_toPadma[BEJA::BEJA_consnt_JHA]   = Padma::Padma_consnt_JHA;

$BEJA_toPadma[BEJA::BEJA_consnt_TTA]   = Padma::Padma_consnt_TTA;
$BEJA_toPadma[BEJA::BEJA_consnt_TTHA]  = Padma::Padma_consnt_TTHA;
$BEJA_toPadma[BEJA::BEJA_consnt_DDA]   = Padma::Padma_consnt_DDA;
$BEJA_toPadma[BEJA::BEJA_consnt_DDDHA] = Padma::Padma_consnt_DDDHA;
$BEJA_toPadma[BEJA::BEJA_consnt_DDHA]  = Padma::Padma_consnt_DDHA;
$BEJA_toPadma[BEJA::BEJA_consnt_RHA]   = Padma::Padma_consnt_RHA;
$BEJA_toPadma[BEJA::BEJA_consnt_NNA]   = Padma::Padma_consnt_NNA;

$BEJA_toPadma[BEJA::BEJA_consnt_TA_1]  = Padma::Padma_consnt_TA;
$BEJA_toPadma[BEJA::BEJA_consnt_TA_2]  = Padma::Padma_consnt_TA;
$BEJA_toPadma[BEJA::BEJA_consnt_TA_3]  = Padma::Padma_consnt_TA;
$BEJA_toPadma[BEJA::BEJA_consnt_THA_1] = Padma::Padma_consnt_THA;
$BEJA_toPadma[BEJA::BEJA_consnt_THA_2] = Padma::Padma_consnt_THA;
$BEJA_toPadma[BEJA::BEJA_consnt_DA_1]  = Padma::Padma_consnt_DA;
$BEJA_toPadma[BEJA::BEJA_consnt_DA_2]  = Padma::Padma_consnt_DA;
$BEJA_toPadma[BEJA::BEJA_consnt_DHA_1] = Padma::Padma_consnt_DHA;
$BEJA_toPadma[BEJA::BEJA_consnt_DHA_2] = Padma::Padma_consnt_DHA;
$BEJA_toPadma[BEJA::BEJA_consnt_NA]    = Padma::Padma_consnt_NA;

$BEJA_toPadma[BEJA::BEJA_consnt_PA_1]  = Padma::Padma_consnt_PA;
$BEJA_toPadma[BEJA::BEJA_consnt_PA_2]  = Padma::Padma_consnt_PA;
$BEJA_toPadma[BEJA::BEJA_consnt_PHA]   = Padma::Padma_consnt_PHA;
$BEJA_toPadma[BEJA::BEJA_consnt_BA]    = Padma::Padma_consnt_BA;
$BEJA_toPadma[BEJA::BEJA_consnt_BHA_1] = Padma::Padma_consnt_BHA;
$BEJA_toPadma[BEJA::BEJA_consnt_BHA_2] = Padma::Padma_consnt_BHA;
$BEJA_toPadma[BEJA::BEJA_consnt_MA_1]  = Padma::Padma_consnt_MA;
$BEJA_toPadma[BEJA::BEJA_consnt_MA_2]  = Padma::Padma_consnt_MA;

$BEJA_toPadma[BEJA::BEJA_consnt_YA_1]  = Padma::Padma_consnt_YA;
$BEJA_toPadma[BEJA::BEJA_consnt_YA_2]  = Padma::Padma_consnt_YA;
$BEJA_toPadma[BEJA::BEJA_consnt_RA]    = Padma::Padma_consnt_RA;
$BEJA_toPadma[BEJA::BEJA_consnt_LA_1]  = Padma::Padma_consnt_LA;
$BEJA_toPadma[BEJA::BEJA_consnt_LA_2]  = Padma::Padma_consnt_LA;
$BEJA_toPadma[BEJA::BEJA_consnt_LA_3]  = Padma::Padma_consnt_LA;
$BEJA_toPadma[BEJA::BEJA_consnt_VA]    = Padma::Padma_consnt_VA;
$BEJA_toPadma[BEJA::BEJA_consnt_SHA_1] = Padma::Padma_consnt_SHA;
$BEJA_toPadma[BEJA::BEJA_consnt_SHA_2] = Padma::Padma_consnt_SHA;
$BEJA_toPadma[BEJA::BEJA_consnt_SSA_1] = Padma::Padma_consnt_SSA;
$BEJA_toPadma[BEJA::BEJA_consnt_SSA_2] = Padma::Padma_consnt_SSA;
$BEJA_toPadma[BEJA::BEJA_consnt_SA]    = Padma::Padma_consnt_SA;
$BEJA_toPadma[BEJA::BEJA_consnt_HA]    = Padma::Padma_consnt_HA;
$BEJA_toPadma[BEJA::BEJA_consnt_LLA]   = Padma::Padma_consnt_LLA;

//Gunintamulu
$BEJA_toPadma[BEJA::BEJA_vowelsn_AA]   = Padma::Padma_vowelsn_AA;
$BEJA_toPadma[BEJA::BEJA_vowelsn_I]    = Padma::Padma_vowelsn_I;
$BEJA_toPadma[BEJA::BEJA_vowelsn_II]   = Padma::Padma_vowelsn_II;
$BEJA_toPadma[BEJA::BEJA_vowelsn_U_1]  = Padma::Padma_vowelsn_U;
$BEJA_toPadma[BEJA::BEJA_vowelsn_U_2]  = Padma::Padma_vowelsn_U;
$BEJA_toPadma[BEJA::BEJA_vowelsn_UU_1] = Padma::Padma_vowelsn_UU;
$BEJA_toPadma[BEJA::BEJA_vowelsn_UU_2] = Padma::Padma_vowelsn_UU;
$BEJA_toPadma[BEJA::BEJA_vowelsn_R]    = Padma::Padma_vowelsn_R;
$BEJA_toPadma[BEJA::BEJA_vowelsn_CDR_E]= Padma::Padma_vowelsn_CDR_E;
$BEJA_toPadma[BEJA::BEJA_vowelsn_EE_1] = Padma::Padma_vowelsn_EE;
$BEJA_toPadma[BEJA::BEJA_vowelsn_EE_2] = Padma::Padma_vowelsn_EE;
$BEJA_toPadma[BEJA::BEJA_vowelsn_AI]   = Padma::Padma_vowelsn_AI;
$BEJA_toPadma[BEJA::BEJA_vowelsn_OO]   = Padma::Padma_vowelsn_OO;
$BEJA_toPadma[BEJA::BEJA_vowelsn_AU]   = Padma::Padma_vowelsn_AU;

//Vowel + anusvara
$BEJA_toPadma[BEJA::BEJA_vowel_IIM]    = Padma::Padma_vowel_II . Padma::Padma_anusvara;
//matra . modifier
$BEJA_toPadma[BEJA::BEJA_vowelsn_IM]   = Padma::Padma_vowelsn_I . Padma::Padma_anusvara;
$BEJA_toPadma[BEJA::BEJA_vowelsn_U_BINDU] = Padma::Padma_vowelsn_U . Padma::Padma_candrabindu;

//Halffm
$BEJA_toPadma[BEJA::BEJA_halffm_KA]   = Padma::Padma_halffm_KA;
$BEJA_toPadma[BEJA::BEJA_halffm_KSH]  = Padma::Padma_halffm_KA . Padma::Padma_halffm_SSA;
$BEJA_toPadma[BEJA::BEJA_halffm_KHA]  = Padma::Padma_halffm_KHA;
$BEJA_toPadma[BEJA::BEJA_halffm_GA]   = Padma::Padma_halffm_GA;
$BEJA_toPadma[BEJA::BEJA_halffm_GHA]  = Padma::Padma_halffm_GHA;
$BEJA_toPadma[BEJA::BEJA_halffm_CA]   = Padma::Padma_halffm_CA;
$BEJA_toPadma[BEJA::BEJA_halffm_CC]   = Padma::Padma_halffm_CA . Padma::Padma_halffm_CA;
$BEJA_toPadma[BEJA::BEJA_halffm_JA_1] = Padma::Padma_halffm_JA;
$BEJA_toPadma[BEJA::BEJA_halffm_JA_2] = Padma::Padma_halffm_JA;
$BEJA_toPadma[BEJA::BEJA_halffm_JJ]   = Padma::Padma_halffm_JA . Padma::Padma_halffm_JA;
$BEJA_toPadma[BEJA::BEJA_halffm_JNY]  = Padma::Padma_halffm_JA . Padma::Padma_halffm_NYA;
$BEJA_toPadma[BEJA::BEJA_halffm_ZA_1] = Padma::Padma_halffm_ZA;
$BEJA_toPadma[BEJA::BEJA_halffm_ZA_2] = Padma::Padma_halffm_ZA;
$BEJA_toPadma[BEJA::BEJA_halffm_JHA]  = Padma::Padma_halffm_JHA;
$BEJA_toPadma[BEJA::BEJA_halffm_NYA]  = Padma::Padma_halffm_NYA;
$BEJA_toPadma[BEJA::BEJA_halffm_NNA]  = Padma::Padma_halffm_NNA;
$BEJA_toPadma[BEJA::BEJA_halffm_TA]   = Padma::Padma_halffm_TA;
$BEJA_toPadma[BEJA::BEJA_halffm_TT]   = Padma::Padma_halffm_TA . Padma::Padma_halffm_TA;
$BEJA_toPadma[BEJA::BEJA_halffm_TR]   = Padma::Padma_halffm_TA . Padma::Padma_halffm_RA;
$BEJA_toPadma[BEJA::BEJA_halffm_THA]  = Padma::Padma_halffm_THA;
$BEJA_toPadma[BEJA::BEJA_halffm_DHA]  = Padma::Padma_halffm_DHA;
$BEJA_toPadma[BEJA::BEJA_halffm_NA]   = Padma::Padma_halffm_NA;
$BEJA_toPadma[BEJA::BEJA_halffm_NN]   = Padma::Padma_halffm_NA . Padma::Padma_halffm_NA;
$BEJA_toPadma[BEJA::BEJA_halffm_PA]   = Padma::Padma_halffm_PA;
$BEJA_toPadma[BEJA::BEJA_halffm_PHA]  = Padma::Padma_halffm_PHA;
$BEJA_toPadma[BEJA::BEJA_halffm_BA]   = Padma::Padma_halffm_BA;
$BEJA_toPadma[BEJA::BEJA_halffm_BHA]  = Padma::Padma_halffm_BHA;
$BEJA_toPadma[BEJA::BEJA_halffm_MA]   = Padma::Padma_halffm_MA;
$BEJA_toPadma[BEJA::BEJA_halffm_YA]   = Padma::Padma_halffm_YA;
$BEJA_toPadma[BEJA::BEJA_halffm_RA]   = Padma::Padma_halffm_RA;
$BEJA_toPadma[BEJA::BEJA_halffm_LA]   = Padma::Padma_halffm_LA;
$BEJA_toPadma[BEJA::BEJA_halffm_VA]   = Padma::Padma_halffm_VA;
$BEJA_toPadma[BEJA::BEJA_halffm_SHA_1]= Padma::Padma_halffm_SHA;
$BEJA_toPadma[BEJA::BEJA_halffm_SHA_2]= Padma::Padma_halffm_SHA;
$BEJA_toPadma[BEJA::BEJA_halffm_SHR]  = Padma::Padma_halffm_SHA . Padma::Padma_halffm_RA;
$BEJA_toPadma[BEJA::BEJA_halffm_SSA]  = Padma::Padma_halffm_SSA;
$BEJA_toPadma[BEJA::BEJA_halffm_SA]   = Padma::Padma_halffm_SA;
$BEJA_toPadma[BEJA::BEJA_halffm_HA]   = Padma::Padma_halffm_HA;
$BEJA_toPadma[BEJA::BEJA_halffm_LLA]  = Padma::Padma_halffm_LLA;
$BEJA_toPadma[BEJA::BEJA_halffm_RRA]  = Padma::Padma_halffm_RRA;

//Conjuncts
$BEJA_toPadma[BEJA::BEJA_conjct_KK]     = Padma::Padma_consnt_KA . Padma::Padma_vattu_KA;
$BEJA_toPadma[BEJA::BEJA_conjct_KC]     = Padma::Padma_consnt_KA . Padma::Padma_vattu_CA;
$BEJA_toPadma[BEJA::BEJA_conjct_KV]     = Padma::Padma_consnt_KA . Padma::Padma_vattu_VA;
$BEJA_toPadma[BEJA::BEJA_conjct_KT]     = Padma::Padma_consnt_KA . Padma::Padma_vattu_TA;
$BEJA_toPadma[BEJA::BEJA_conjct_KSH]    = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA;
$BEJA_toPadma[BEJA::BEJA_conjct_KSHEE]  = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA . Padma::Padma_vowelsn_EE;
$BEJA_toPadma[BEJA::BEJA_conjct_KHN]    = Padma::Padma_consnt_KHA . Padma::Padma_vattu_NA;
$BEJA_toPadma[BEJA::BEJA_conjct_KHR]    = Padma::Padma_consnt_KHA . Padma::Padma_vattu_RA;
$BEJA_toPadma[BEJA::BEJA_conjct_NGK]    = Padma::Padma_consnt_NGA . Padma::Padma_vattu_KA;
$BEJA_toPadma[BEJA::BEJA_conjct_NGKH]   = Padma::Padma_consnt_NGA . Padma::Padma_vattu_KHA;
$BEJA_toPadma[BEJA::BEJA_conjct_NGKT]   = Padma::Padma_consnt_NGA . Padma::Padma_vattu_KA . Padma::Padma_vattu_TA;
$BEJA_toPadma[BEJA::BEJA_conjct_NGG]    = Padma::Padma_consnt_NGA . Padma::Padma_vattu_GA;
$BEJA_toPadma[BEJA::BEJA_conjct_NGGH]   = Padma::Padma_consnt_NGA . Padma::Padma_vattu_GHA;
$BEJA_toPadma[BEJA::BEJA_conjct_CC]     = Padma::Padma_consnt_CA . Padma::Padma_vattu_CA;
$BEJA_toPadma[BEJA::BEJA_conjct_CHV]    = Padma::Padma_consnt_CHA . Padma::Padma_vattu_VA;
$BEJA_toPadma[BEJA::BEJA_conjct_JNY]    = Padma::Padma_consnt_JA . Padma::Padma_vattu_NYA;
$BEJA_toPadma[BEJA::BEJA_conjct_JHR]    = Padma::Padma_consnt_JHA . Padma::Padma_vattu_RA;
$BEJA_toPadma[BEJA::BEJA_conjct_NYC]    = Padma::Padma_consnt_NYA . Padma::Padma_vattu_CA;
$BEJA_toPadma[BEJA::BEJA_conjct_NYJ]    = Padma::Padma_consnt_NYA . Padma::Padma_vattu_JA;
$BEJA_toPadma[BEJA::BEJA_conjct_JJ]     = Padma::Padma_consnt_JA . Padma::Padma_vattu_JA;
$BEJA_toPadma[BEJA::BEJA_conjct_TTTT]   = Padma::Padma_consnt_TTA . Padma::Padma_vattu_TTA;
$BEJA_toPadma[BEJA::BEJA_conjct_TT_TTH] = Padma::Padma_consnt_TTA . Padma::Padma_vattu_TTHA;
$BEJA_toPadma[BEJA::BEJA_conjct_TTHTTH] = Padma::Padma_consnt_TTHA . Padma::Padma_vattu_TTHA;
$BEJA_toPadma[BEJA::BEJA_conjct_DDTT]   = Padma::Padma_consnt_DDA . Padma::Padma_vattu_TTA;
$BEJA_toPadma[BEJA::BEJA_conjct_DDDD]   = Padma::Padma_consnt_DDA . Padma::Padma_vattu_DDA;
$BEJA_toPadma[BEJA::BEJA_conjct_DD_DDH] = Padma::Padma_consnt_DDA . Padma::Padma_vattu_DDHA;
$BEJA_toPadma[BEJA::BEJA_conjct_DDHDDH] = Padma::Padma_consnt_DDHA . Padma::Padma_vattu_DDHA;
$BEJA_toPadma[BEJA::BEJA_conjct_TT]     = Padma::Padma_consnt_TA . Padma::Padma_vattu_TA;
$BEJA_toPadma[BEJA::BEJA_conjct_TR_1]   = Padma::Padma_consnt_TA . Padma::Padma_vattu_RA;
$BEJA_toPadma[BEJA::BEJA_conjct_TR_2]   = Padma::Padma_consnt_TA . Padma::Padma_vattu_RA;
$BEJA_toPadma[BEJA::BEJA_conjct_TN]     = Padma::Padma_consnt_TA . Padma::Padma_vattu_NA;
$BEJA_toPadma[BEJA::BEJA_conjct_DG]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_GA;
$BEJA_toPadma[BEJA::BEJA_conjct_DGH]    = Padma::Padma_consnt_DA . Padma::Padma_vattu_GHA;
$BEJA_toPadma[BEJA::BEJA_conjct_DD]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_DA;
$BEJA_toPadma[BEJA::BEJA_conjct_D_DH]   = Padma::Padma_consnt_DA . Padma::Padma_vattu_DHA;
$BEJA_toPadma[BEJA::BEJA_conjct_DB]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_BA;
$BEJA_toPadma[BEJA::BEJA_conjct_DBR]    = Padma::Padma_consnt_DA . Padma::Padma_vattu_BA . Padma::Padma_vattu_RA;
$BEJA_toPadma[BEJA::BEJA_conjct_DBH]    = Padma::Padma_consnt_DA . Padma::Padma_vattu_BHA;
$BEJA_toPadma[BEJA::BEJA_conjct_DM]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_MA;
$BEJA_toPadma[BEJA::BEJA_conjct_DY]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_YA;
$BEJA_toPadma[BEJA::BEJA_conjct_DV]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_VA;
$BEJA_toPadma[BEJA::BEJA_conjct_NN]     = Padma::Padma_consnt_NA . Padma::Padma_vattu_NA;
$BEJA_toPadma[BEJA::BEJA_conjct_PT]     = Padma::Padma_consnt_PA . Padma::Padma_vattu_TA;
$BEJA_toPadma[BEJA::BEJA_conjct_LL]     = Padma::Padma_consnt_LA . Padma::Padma_vattu_LA;
$BEJA_toPadma[BEJA::BEJA_conjct_SHC]    = Padma::Padma_consnt_SHA . Padma::Padma_vattu_CA;
$BEJA_toPadma[BEJA::BEJA_conjct_SHR]    = Padma::Padma_consnt_SHA . Padma::Padma_vattu_RA;
$BEJA_toPadma[BEJA::BEJA_conjct_SHREE]  = Padma::Padma_consnt_SHA . Padma::Padma_vattu_RA . Padma::Padma_vowelsn_EE;
$BEJA_toPadma[BEJA::BEJA_conjct_SHV]    = Padma::Padma_consnt_SHA . Padma::Padma_vattu_VA;
$BEJA_toPadma[BEJA::BEJA_conjct_SSTT]   = Padma::Padma_consnt_SSA . Padma::Padma_vattu_TTA;
$BEJA_toPadma[BEJA::BEJA_conjct_SSTTV]  = Padma::Padma_consnt_SSA . Padma::Padma_vattu_TTA . Padma::Padma_vattu_VA;
$BEJA_toPadma[BEJA::BEJA_conjct_SSTTH]  = Padma::Padma_consnt_SSA . Padma::Padma_vattu_TTHA;
$BEJA_toPadma[BEJA::BEJA_conjct_STR]    = Padma::Padma_consnt_SA . Padma::Padma_vattu_TA . Padma::Padma_vattu_RA;
$BEJA_toPadma[BEJA::BEJA_conjct_HNN]    = Padma::Padma_consnt_HA . Padma::Padma_vattu_NNA;
$BEJA_toPadma[BEJA::BEJA_conjct_HN]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_NA;
$BEJA_toPadma[BEJA::BEJA_conjct_HM]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_MA;
$BEJA_toPadma[BEJA::BEJA_conjct_HY]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_YA;
$BEJA_toPadma[BEJA::BEJA_conjct_HR]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_RA;
$BEJA_toPadma[BEJA::BEJA_conjct_HL]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_LA;
$BEJA_toPadma[BEJA::BEJA_conjct_HV]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_VA;

//Combos
$BEJA_toPadma[BEJA::BEJA_combo_RU]      = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_U;
$BEJA_toPadma[BEJA::BEJA_combo_RUU]     = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_UU;
$BEJA_toPadma[BEJA::BEJA_conjct_SHAU]   = Padma::Padma_consnt_SHA . Padma::Padma_vowelsn_AU;
$BEJA_toPadma[BEJA::BEJA_combo_HR]      = Padma::Padma_consnt_HA . Padma::Padma_vowelsn_R;

$BEJA_toPadma[BEJA::BEJA_halffm_RI]     = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_I;
$BEJA_toPadma[BEJA::BEJA_halffm_RIM]    = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_I . Padma::Padma_anusvara;
$BEJA_toPadma[BEJA::BEJA_halffm_RA_ANU] = Padma::Padma_halffm_RA . Padma::Padma_anusvara;

$BEJA_toPadma[BEJA::BEJA_vattu_YA]      = Padma::Padma_vattu_YA;
$BEJA_toPadma[BEJA::BEJA_vattu_RA_1]    = Padma::Padma_vattu_RA;
$BEJA_toPadma[BEJA::BEJA_vattu_RA_2]    = Padma::Padma_vattu_RA;
$BEJA_toPadma[BEJA::BEJA_vattu_RA_3]    = Padma::Padma_vattu_RA;
$BEJA_toPadma[BEJA::BEJA_vattu_LA]      = Padma::Padma_vattu_LA;

$BEJA_toPadma[BEJA::BEJA_digit_ZERO_ext] = '0';

$BEJA_toPadma[BEJA::BEJA_misc_DANDA]    = Padma::Padma_danda;
$BEJA_toPadma[BEJA::BEJA_misc_DDANDA]   = Padma::Padma_ddanda;
$BEJA_toPadma[BEJA::BEJA_misc_OM]       = Padma::Padma_om;
$BEJA_toPadma[BEJA::BEJA_misc_ABBREV]   = Padma::Padma_abbrev;
$BEJA_toPadma[BEJA::BEJA_nukta_1]       = Padma::Padma_nukta;
$BEJA_toPadma[BEJA::BEJA_nukta_2]       = Padma::Padma_nukta;

//Does not match ASCII
$BEJA_toPadma[BEJA::BEJA_extra_QTSINGLE_1] = "\xE2\x80\x98"; //Left single quotation mark
$BEJA_toPadma[BEJA::BEJA_extra_QTSINGLE_2] = "\xE2\x80\x99"; //Right single quotation mark
$BEJA_toPadma[BEJA::BEJA_MULTIPLY]         = "\xC3\x97"; //Unicode for multiplication symbol
$BEJA_toPadma[BEJA::BEJA_PERCENT]          = "%";
$BEJA_toPadma[BEJA::BEJA_extra_COLON]      = ":";

//$BE specfic
$BEJA_toPadma_BE = array();
$BEJA_toPadma_BE[BEJA::BEJA_DIVIDE_BE]     = "\xC3\xB7"; //Unicode for division symbol
$BEJA_toPadma_BE[BEJA::BEJA_digit_ONE_BE]  = '1';
$BEJA_toPadma_BE[BEJA::BEJA_digit_TWO_BE]  = '2';
$BEJA_toPadma_BE[BEJA::BEJA_digit_THREE_BE]= '3';
$BEJA_toPadma_BE[BEJA::BEJA_digit_FOUR_BE] = '4';
$BEJA_toPadma_BE[BEJA::BEJA_digit_FIVE_BE] = '5';
$BEJA_toPadma_BE[BEJA::BEJA_digit_SIX_BE]  = '6';
$BEJA_toPadma_BE[BEJA::BEJA_digit_SEVEN_BE]= '7';
$BEJA_toPadma_BE[BEJA::BEJA_digit_EIGHT_BE]= '8';
$BEJA_toPadma_BE[BEJA::BEJA_digit_NINE_BE] = '9';

//JA specific
$BEJA_toPadma_JA = array();
$BEJA_toPadma_JA[BEJA::BEJA_consnt_KHA_JA] = Padma::Padma_consnt_KHA;
$BEJA_toPadma_JA[BEJA::BEJA_consnt_BA_JA]  = Padma::Padma_consnt_BA;
$BEJA_toPadma_JA[BEJA::BEJA_consnt_BHA_JA] = Padma::Padma_consnt_BHA;
$BEJA_toPadma_JA[BEJA::BEJA_consnt_MA_JA]  = Padma::Padma_consnt_MA;
$BEJA_toPadma_JA[BEJA::BEJA_conjct_TT_JA]  = Padma::Padma_consnt_TA . Padma::Padma_vattu_TA;
$BEJA_toPadma_JA[BEJA::BEJA_halffm_KA_JA]  = Padma::Padma_halffm_KA;
$BEJA_toPadma_JA[BEJA::BEJA_halffm_KHA_JA] = Padma::Padma_halffm_KHA;
$BEJA_toPadma_JA[BEJA::BEJA_halffm_PHA_JA] = Padma::Padma_halffm_PHA;
$BEJA_toPadma_JA[BEJA::BEJA_halffm_BA_JA]  = Padma::Padma_halffm_BA;
$BEJA_toPadma_JA[BEJA::BEJA_halffm_BHA_JA] = Padma::Padma_halffm_BHA;
$BEJA_toPadma_JA[BEJA::BEJA_halffm_MA_JA]  = Padma::Padma_halffm_MA;
$BEJA_toPadma_JA[BEJA::BEJA_halffm_TT_JA]  = Padma::Padma_halffm_TA . Padma::Padma_halffm_TA;
$BEJA_toPadma_JA[BEJA::BEJA_vowelsn_EE_JA] = Padma::Padma_vowelsn_EE;

$BEJA_prefixList = array();
$BEJA_prefixList[BEJA::BEJA_vowelsn_I]  = true;
$BEJA_prefixList[BEJA::BEJA_vowelsn_IM] = true;
$BEJA_prefixList[BEJA::BEJA_nukta_1]    = true;
$BEJA_prefixList[BEJA::BEJA_halffm_RI]  = true;
$BEJA_prefixList[BEJA::BEJA_halffm_RIM] = true;

$BEJA_suffixList = array();
$BEJA_suffixList[BEJA::BEJA_halffm_RA]     = true;
$BEJA_suffixList[BEJA::BEJA_halffm_RA_ANU] = true;

$BEJA_redundantList = array();
$BEJA_redundantList[BEJA::BEJA_misc_UNKNOWN_1] = true;
$BEJA_redundantList[BEJA::BEJA_misc_UNKNOWN_2] = true;
$BEJA_redundantList[BEJA::BEJA_misc_UNKNOWN_3] = true;

$BEJA_overloadList = array();
$BEJA_overloadList[BEJA::BEJA_vowel_A]     = true;
$BEJA_overloadList[BEJA::BEJA_vowel_AA]    = true;
$BEJA_overloadList[BEJA::BEJA_vowel_EE]    = true;
$BEJA_overloadList[BEJA::BEJA_vowel_I]     = true;
$BEJA_overloadList[BEJA::BEJA_consnt_DDA]  = true;
$BEJA_overloadList[BEJA::BEJA_consnt_DDHA] = true;
$BEJA_overloadList[BEJA::BEJA_vowelsn_AA]  = true;
$BEJA_overloadList[BEJA::BEJA_halffm_KSH]  = true;
$BEJA_overloadList[BEJA::BEJA_halffm_KHA]  = true;
$BEJA_overloadList[BEJA::BEJA_halffm_GA]   = true;
$BEJA_overloadList[BEJA::BEJA_halffm_GHA]  = true;
$BEJA_overloadList[BEJA::BEJA_halffm_CA]   = true;
$BEJA_overloadList[BEJA::BEJA_halffm_CC]   = true;
$BEJA_overloadList[BEJA::BEJA_halffm_JJ]   = true;
$BEJA_overloadList[BEJA::BEJA_halffm_JNY]  = true;
$BEJA_overloadList[BEJA::BEJA_halffm_ZA_1] = true;
$BEJA_overloadList[BEJA::BEJA_halffm_ZA_2] = true;
$BEJA_overloadList[BEJA::BEJA_halffm_JHA]  = true;
$BEJA_overloadList[BEJA::BEJA_halffm_NNA]  = true;
$BEJA_overloadList[BEJA::BEJA_halffm_TA]   = true;
$BEJA_overloadList[BEJA::BEJA_halffm_TT]   = true;
$BEJA_overloadList[BEJA::BEJA_halffm_TR]   = true;
$BEJA_overloadList[BEJA::BEJA_halffm_THA]  = true;
$BEJA_overloadList[BEJA::BEJA_halffm_DHA]  = true;
$BEJA_overloadList[BEJA::BEJA_halffm_NN]   = true;
$BEJA_overloadList[BEJA::BEJA_halffm_BHA]  = true;
$BEJA_overloadList[BEJA::BEJA_halffm_PA]   = true;
$BEJA_overloadList[BEJA::BEJA_halffm_MA]   = true;
$BEJA_overloadList[BEJA::BEJA_halffm_YA]   = true;
$BEJA_overloadList[BEJA::BEJA_halffm_LA]   = true;
$BEJA_overloadList[BEJA::BEJA_halffm_SHA_2]= true;
$BEJA_overloadList[BEJA::BEJA_halffm_SHR]  = true;
$BEJA_overloadList[BEJA::BEJA_halffm_SSA]  = true;

$BEJA_overloadList_JA = array();
$BEJA_overloadList_JA[BEJA::BEJA_halffm_KHA_JA]  = true;
$BEJA_overloadList_JA[BEJA::BEJA_halffm_BA_JA]   = true;
$BEJA_overloadList_JA[BEJA::BEJA_halffm_BHA_JA]  = true;
$BEJA_overloadList_JA[BEJA::BEJA_halffm_MA_JA]   = true;
$BEJA_overloadList_JA[BEJA::BEJA_halffm_TT_JA]   = true;

function BEJA_initialize()
{
    global $fontinfo;

    //$fontinfo[""]["language"] = "Devanagari";
    //$fontinfo[""]["class"] = "BEJA";
}

?>
