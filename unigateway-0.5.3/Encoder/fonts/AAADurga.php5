<?php
/* ***** BEGIN LICENSE BLOCK *****
 *
 *  This file is originally part of Padma.
 *
 *  Copyright (C) 2008 Golam Mortuza Hossain <gmhossain@gmail.com> 
 *  Copyright (C) 2008 Nagarjuna Venna <vnagarjuna@yahoo.com>
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

//AAADurga
class AAADurga {
function AAADurga()
{
}

//The interface every dynamic font encoding should implement
var $maxLookupLen = 3;
var $fontFace     = "AAADurga";
var $displayName  = "AAADurga";
var $script       = Padma::Padma_script_BENGALI;
var $hasSuffixes  = true;

function lookup ($str)
{
    global $AAADurga_toPadma;
    return $AAADurga_toPadma[$str];
}

function isPrefixSymbol ($str)
{
    global $AAADurga_prefixList;
    return array_key_exists($str, $AAADurga_prefixList);
}

function isSuffixSymbol ($str)
{
    global $AAADurga_suffixList;
    return array_key_exists($str, $AAADurga_suffixList);
}

function isOverloaded ($str)
{
    global $AAADurga_overloadList;
    return array_key_exists($str, $AAADurga_overloadList);
}

function handleTwoPartVowelSigns ($sign1, $sign2)
{
    if (($sign1 == Padma::Padma_vowelsn_E && $sign2 == Padma::Padma_vowelsn_AA) ||
        ($sign1 == Padma::Padma_vowelsn_AA && $sign2 == Padma::Padma_vowelsn_E))
        return Padma::Padma_vowelsn_OO;
    if (($sign1 == Padma::Padma_vowelsn_AULEN && $sign2 == Padma::Padma_vowelsn_E) ||
        ($sign1 == Padma::Padma_vowelsn_E && $sign2 == Padma::Padma_vowelsn_AULEN))
        return Padma::Padma_vowelsn_AU;
    return $sign1 . $sign2;    
}

function isRedundant ($str)
{
    global $AAADurga_redundantList;
    return array_key_exists($str, $AAADurga_redundantList);
}

/* Map from AAADurga   starts here */

const AAADurga_halffm_RA_1    = "\x27";
const AAADurga_halffm_RA_2    = "\xC3\x95";
const AAADurga_halffm_RA_3    = "\xC3\xB1";
const AAADurga_candrabindu_1  = "\x3C"; 
const AAADurga_candrabindu_2  = "\x3E"; 
const AAADurga_candrabindu_3  = "\x40"; 
const AAADurga_virama_1       = "\x51";
const AAADurga_virama_2       = "\xC2\xA1";
const AAADurga_virama_3       = "\xC2\xAB";
const AAADurga_virama_4       = "\xC2\xBF";
const AAADurga_virama_5       = "\xC3\x80";
const AAADurga_virama_6       = "\xC3\x83";


//Vowels
const AAADurga_vowel_A        = "\x57";
const AAADurga_vowel_AA       = "\x58";
const AAADurga_vowel_I        = "\x59";
const AAADurga_vowel_II       = "\x5A";
const AAADurga_vowel_U        = "\x5B";
const AAADurga_vowel_UU       = "\x5C";
const AAADurga_vowel_R        = "\x5D";
//AAADurga.vowel_RR       = "\x5E";
const AAADurga_vowel_E        = "\x5E";
const AAADurga_vowel_AI       = "\x5F";
const AAADurga_vowel_O        = "\x60";
const AAADurga_vowel_AU       = "\x61";


//Consonants
const AAADurga_consnt_KA      = "\x62";
const AAADurga_consnt_KHA     = "\x63";
const AAADurga_consnt_GA      = "\x64";
const AAADurga_consnt_GHA     = "\x65";
const AAADurga_consnt_NGA     = "\x66";

const AAADurga_consnt_CA      = "\x67";
const AAADurga_consnt_CHA     = "\x68";
const AAADurga_consnt_JA      = "\x69";
const AAADurga_consnt_JHA     = "\x6A";
const AAADurga_consnt_NYA     = "\x6B";

const AAADurga_consnt_TTA     = "\x6C";
const AAADurga_consnt_TTHA    = "\x6D";
const AAADurga_consnt_DDA     = "\x6E";
const AAADurga_consnt_DDHA    = "\x6F";
const AAADurga_consnt_NNA     = "\x70";

const AAADurga_consnt_TA      = "\x71";
const AAADurga_consnt_THA     = "\x72";
const AAADurga_consnt_DA      = "\x73";
const AAADurga_consnt_DHA     = "\x74";
const AAADurga_consnt_NA      = "\x75";

const AAADurga_consnt_PA      = "\x76";
const AAADurga_consnt_PHA     = "\x77";
const AAADurga_consnt_BA      = "\x78";
const AAADurga_consnt_BHA     = "\x79";
const AAADurga_consnt_MA      = "\x7A";


const AAADurga_consnt_YA      = "\x7B";
const AAADurga_consnt_RA      = "\x7C";
const AAADurga_consnt_LA      = "\x7D";
const AAADurga_consnt_SHA     = "\x7E";
const AAADurga_consnt_SSA     = "\xC2\xA6";
const AAADurga_consnt_SA      = "\xC2\xA8";
const AAADurga_consnt_HA      = "\xC2\xAA";

const AAADurga_consnt_KHANDA_TA     = "\xC3\xA0";

const AAADurga_consnt_RRA     = "\xC2\xAC";
const AAADurga_consnt_RHA     = "\xC2\xAF";
const AAADurga_consnt_YYA     = "\xC2\xAE";



//Gunintamulu
const AAADurga_vowelsn_AA     = "\x53";

const AAADurga_vowelsn_I_1    = "\x41";
const AAADurga_vowelsn_I_2    = "\x42";
const AAADurga_vowelsn_I_3    = "\x43";
const AAADurga_vowelsn_I_4    = "\x44";
const AAADurga_vowelsn_I_candrabindu_1   = "\x45";
const AAADurga_vowelsn_I_candrabindu_2   = "\xC2\xB1";
const AAADurga_vowelsn_I_candrabindu_3   = "\xC3\x86";
const AAADurga_vowelsn_I_candrabindu_4   = "\xC3\x98";

const AAADurga_vowelsn_R_II_1 = "\x46";
const AAADurga_vowelsn_R_II_2 = "\x47";
const AAADurga_vowelsn_II_1   = "\x48";
const AAADurga_vowelsn_II_2   = "\x49";
const AAADurga_vowelsn_II_candrabindu_1   = "\xC3\xA2";
const AAADurga_vowelsn_II_candrabindu_2   = "\xC3\xA4";

const AAADurga_vowelsn_U_1    = "\x4A";
const AAADurga_vowelsn_U_2    = "\xC3\x81";
const AAADurga_vowelsn_U_3    = "\xC3\x82";
const AAADurga_vowelsn_U_4    = "\xC3\x8C";
const AAADurga_vowelsn_U_5    = "\xC3\x8D";
const AAADurga_vowelsn_U_6    = "\xC3\x9A";

const AAADurga_vowelsn_UU_1   = "\x4C";
const AAADurga_vowelsn_UU_2   = "\xC3\x8A";
const AAADurga_vowelsn_UU_3   = "\xC3\x8B";
const AAADurga_vowelsn_UU_4   = "\xC3\x8E";
const AAADurga_vowelsn_UU_5   = "\xC3\x93";
const AAADurga_vowelsn_UU_6   = "\xC3\x9B";

//const AAADurga_vowelsn_R_1    = "\u00RF";
const AAADurga_vowelsn_R_2    = "\xC3\x88";
const AAADurga_vowelsn_R_3    = "\xC3\x8F";
const AAADurga_vowelsn_R_4    = "\xC3\x92";
const AAADurga_vowelsn_R_5    = "\xC3\x94";
const AAADurga_vowelsn_R_6    = "\xC3\x99";

const AAADurga_vowelsn_E_1   = "\x4D";
const AAADurga_vowelsn_E_2   = "\x50";

const AAADurga_vowelsn_AI_1   = "\x4B";
const AAADurga_vowelsn_AI_2   = "\x4E";

const AAADurga_vowelsn_AULEN_1   = "\x52";
const AAADurga_vowelsn_AULEN_2   = "\x54";
const AAADurga_vowelsn_AULEN_candrabindu_1   = "\x55";
const AAADurga_vowelsn_AULEN_candrabindu_2   = "\x56";
const AAADurga_vowelsn_AULEN_candrabindu_3   = "\xC3\xAF";

//Conjuncts
const AAADurga_conjct_NNDD    = "\xC2\xA2";
const AAADurga_conjct_NN_NN   = "\xC2\xA3";
const AAADurga_conjct_TT      = "\xC2\xA7";

const AAADurga_conjct_NTR     = "\xC2\xB0";
const AAADurga_conjct_TM_1    = "\xC2\xB2";
const AAADurga_conjct_NNTT_1  = "\xC2\xB3";
const AAADurga_conjct_DM_1    = "\xC2\xB4";
const AAADurga_conjct_SHR     = "\xC2\xB5";
const AAADurga_conjct_NDH     = "\xC2\xB6";
const AAADurga_conjct_D_DB    = "\xC2\xB7";
const AAADurga_conjct_D_DH    = "\xC2\xB8";
const AAADurga_conjct_PP      = "\xC2\xB9";
const AAADurga_conjct_DB      = "\xC2\xBA";
const AAADurga_conjct_DR      = "\xC2\xBB";
const AAADurga_conjct_PR      = "\xC2\xBC";
const AAADurga_conjct_PL      = "\xC2\xBD";
const AAADurga_conjct_DDR     = "\xC2\xBE";
const AAADurga_conjct_NN      = "\xC3\x85";
const AAADurga_conjct_NM      = "\xC3\x87";
const AAADurga_conjct_PTT     = "\xC3\x89";
const AAADurga_conjct_PS      = "\xC3\x90";
const AAADurga_conjct_ND      = "\xC3\x97";
const AAADurga_conjct_NDR     = "\xC3\x9C";
const AAADurga_conjct_NDB     = "\xC3\x9D";
const AAADurga_conjct_DHB     = "\xC3\x9E";
const AAADurga_conjct_TM_2    = "\xC3\x9F";
const AAADurga_conjct_NDHR    = "\xC3\xA1";
const AAADurga_conjct_KK      = "\xC3\xA3";
const AAADurga_conjct_KT      = "\xC3\xA5";
const AAADurga_conjct_KR      = "\xC3\xA7";
const AAADurga_conjct_KL      = "\xC3\xA8";
const AAADurga_conjct_GR      = "\xC3\xA9";
const AAADurga_conjct_KSH     = "\xC3\xAA";

const AAADurga_conjct_GM      = "\xC3\xAC";
const AAADurga_conjct_GDH     = "\xC3\xAD";
const AAADurga_conjct_GN      = "\xC3\xAE";
const AAADurga_conjct_NTTR    = "\xC3\xB0";

const AAADurga_conjct_NGG     = "\xC3\xB2";
const AAADurga_conjct_NGK     = "\xC3\xB3";
const AAADurga_conjct_CC      = "\xC3\xB4";
const AAADurga_conjct_JJ      = "\xC3\xB5";
const AAADurga_conjct_CCH     = "\xC3\xB6";
const AAADurga_conjct_TR      = "\xC3\xB7";
const AAADurga_conjct_SHR_II  = "\xC3\xB8";
const AAADurga_conjct_DM_2    = "\xC3\xB9";
const AAADurga_conjct_GL      = "\xC3\xBA";
const AAADurga_conjct_DDDD    = "\xC3\xBB";
const AAADurga_conjct_NNTT_2  = "\xC3\xBC";
const AAADurga_conjct_NTH     = "\xC3\xBD";


// YA-phala
const AAADurga_vattu_YA       = "\xC2\xA9";

//Devanagari Digits
const AAADurga_digit_ZERO     = "\x30";
const AAADurga_digit_ONE      = "\x31";
const AAADurga_digit_TWO      = "\x32";
const AAADurga_digit_THREE    = "\x33";
const AAADurga_digit_FOUR     = "\x34";
const AAADurga_digit_FIVE     = "\x35";
const AAADurga_digit_SIX      = "\x36";
const AAADurga_digit_SEVEN    = "\x37";
const AAADurga_digit_EIGHT    = "\x38";
const AAADurga_digit_NINE     = "\x39";

////Does not match ASCII
const AAADurga_misc_DANDA       = "\xC2\xA5";

const AAADurga_misc_UNKNOWN_1 = "\xC3\x84";
const AAADurga_misc_UNKNOWN_2 = "\xC3\xA6";
const AAADurga_misc_UNKNOWN_3 = "\xC3\xBE";

//AAADurga.misc_UNKNOWN_3 = "\xC3\xAB";

}

//end

$AAADurga_toPadma = array();

$AAADurga_toPadma[AAADurga::AAADurga_candrabindu_1] = Padma::Padma_candrabindu;
$AAADurga_toPadma[AAADurga::AAADurga_candrabindu_2] = Padma::Padma_candrabindu;
$AAADurga_toPadma[AAADurga::AAADurga_candrabindu_3] = Padma::Padma_candrabindu;
$AAADurga_toPadma[AAADurga::AAADurga_virama_1]      = Padma::Padma_syllbreak;
$AAADurga_toPadma[AAADurga::AAADurga_virama_2]      = Padma::Padma_syllbreak;
$AAADurga_toPadma[AAADurga::AAADurga_virama_3]      = Padma::Padma_syllbreak;
$AAADurga_toPadma[AAADurga::AAADurga_virama_4]      = Padma::Padma_syllbreak;
$AAADurga_toPadma[AAADurga::AAADurga_virama_5]      = Padma::Padma_syllbreak;
$AAADurga_toPadma[AAADurga::AAADurga_virama_6]      = Padma::Padma_syllbreak;


$AAADurga_toPadma[AAADurga::AAADurga_vowel_A]  = Padma::Padma_vowel_A;
$AAADurga_toPadma[AAADurga::AAADurga_vowel_AA] = Padma::Padma_vowel_AA;
$AAADurga_toPadma[AAADurga::AAADurga_vowel_I]  = Padma::Padma_vowel_I;
$AAADurga_toPadma[AAADurga::AAADurga_vowel_II] = Padma::Padma_vowel_II;
$AAADurga_toPadma[AAADurga::AAADurga_vowel_U]  = Padma::Padma_vowel_U;
$AAADurga_toPadma[AAADurga::AAADurga_vowel_UU] = Padma::Padma_vowel_UU;
$AAADurga_toPadma[AAADurga::AAADurga_vowel_R]  = Padma::Padma_vowel_R;
//AAADurga.toPadma[AAADurga.vowel_RR] = Padma::Padma_vowel_RR;
$AAADurga_toPadma[AAADurga::AAADurga_vowel_E] = Padma::Padma_vowel_E;
$AAADurga_toPadma[AAADurga::AAADurga_vowel_AI] = Padma::Padma_vowel_AI;
$AAADurga_toPadma[AAADurga::AAADurga_vowel_O]  = Padma::Padma_vowel_O;
$AAADurga_toPadma[AAADurga::AAADurga_vowel_AU] = Padma::Padma_vowel_AU;

$AAADurga_toPadma[AAADurga::AAADurga_consnt_KA]  = Padma::Padma_consnt_KA;
$AAADurga_toPadma[AAADurga::AAADurga_consnt_KHA] = Padma::Padma_consnt_KHA;
$AAADurga_toPadma[AAADurga::AAADurga_consnt_GA]  = Padma::Padma_consnt_GA;
$AAADurga_toPadma[AAADurga::AAADurga_consnt_GHA] = Padma::Padma_consnt_GHA;
$AAADurga_toPadma[AAADurga::AAADurga_consnt_NGA] = Padma::Padma_consnt_NGA;

$AAADurga_toPadma[AAADurga::AAADurga_consnt_CA]  = Padma::Padma_consnt_CA;
$AAADurga_toPadma[AAADurga::AAADurga_consnt_CHA] = Padma::Padma_consnt_CHA;
$AAADurga_toPadma[AAADurga::AAADurga_consnt_JA]  = Padma::Padma_consnt_JA;
$AAADurga_toPadma[AAADurga::AAADurga_consnt_JHA] = Padma::Padma_consnt_JHA;
//AAADurga.toPadma[AAADurga.consnt_NYA] = Padma::Padma_consnt_NYA;

$AAADurga_toPadma[AAADurga::AAADurga_consnt_TTA] = Padma::Padma_consnt_TTA;
$AAADurga_toPadma[AAADurga::AAADurga_consnt_TTHA] = Padma::Padma_consnt_TTHA;
$AAADurga_toPadma[AAADurga::AAADurga_consnt_DDA] = Padma::Padma_consnt_DDA;
$AAADurga_toPadma[AAADurga::AAADurga_consnt_DDHA] = Padma::Padma_consnt_DDHA;
$AAADurga_toPadma[AAADurga::AAADurga_consnt_NNA] = Padma::Padma_consnt_NNA;

$AAADurga_toPadma[AAADurga::AAADurga_consnt_TA]  = Padma::Padma_consnt_TA;
$AAADurga_toPadma[AAADurga::AAADurga_consnt_THA] = Padma::Padma_consnt_THA;
$AAADurga_toPadma[AAADurga::AAADurga_consnt_DA]  = Padma::Padma_consnt_DA;
$AAADurga_toPadma[AAADurga::AAADurga_consnt_DHA] = Padma::Padma_consnt_DHA;
$AAADurga_toPadma[AAADurga::AAADurga_consnt_NA]  = Padma::Padma_consnt_NA;

$AAADurga_toPadma[AAADurga::AAADurga_consnt_PA]   = Padma::Padma_consnt_PA;
$AAADurga_toPadma[AAADurga::AAADurga_consnt_PHA]  = Padma::Padma_consnt_PHA;
$AAADurga_toPadma[AAADurga::AAADurga_consnt_BA]   = Padma::Padma_consnt_BA;
$AAADurga_toPadma[AAADurga::AAADurga_consnt_BHA]  = Padma::Padma_consnt_BHA;
$AAADurga_toPadma[AAADurga::AAADurga_consnt_MA]   = Padma::Padma_consnt_MA;

$AAADurga_toPadma[AAADurga::AAADurga_consnt_YA]   = Padma::Padma_consnt_YA;
$AAADurga_toPadma[AAADurga::AAADurga_consnt_RA]   = Padma::Padma_consnt_RA;
$AAADurga_toPadma[AAADurga::AAADurga_consnt_LA]   = Padma::Padma_consnt_LA;
$AAADurga_toPadma[AAADurga::AAADurga_consnt_SHA]  = Padma::Padma_consnt_SHA;
$AAADurga_toPadma[AAADurga::AAADurga_consnt_SSA]  = Padma::Padma_consnt_SSA;
$AAADurga_toPadma[AAADurga::AAADurga_consnt_SA]   = Padma::Padma_consnt_SA;
$AAADurga_toPadma[AAADurga::AAADurga_consnt_HA] = Padma::Padma_consnt_HA;
$AAADurga_toPadma[AAADurga::AAADurga_consnt_RRA]  = Padma::Padma_consnt_RRA;
$AAADurga_toPadma[AAADurga::AAADurga_consnt_RHA]  = Padma::Padma_consnt_RHA;
$AAADurga_toPadma[AAADurga::AAADurga_consnt_YYA]  = Padma::Padma_consnt_YYA;
$AAADurga_toPadma[AAADurga::AAADurga_consnt_KHANDA_TA]  = Padma::Padma_consnt_KHANDA_TA;


//Gunintamulu
$AAADurga_toPadma[AAADurga::AAADurga_vowelsn_AA]   = Padma::Padma_vowelsn_AA;
$AAADurga_toPadma[AAADurga::AAADurga_vowelsn_I_1]  = Padma::Padma_vowelsn_I;
$AAADurga_toPadma[AAADurga::AAADurga_vowelsn_I_2]  = Padma::Padma_vowelsn_I;
$AAADurga_toPadma[AAADurga::AAADurga_vowelsn_I_3]  = Padma::Padma_vowelsn_I;
$AAADurga_toPadma[AAADurga::AAADurga_vowelsn_I_4]  = Padma::Padma_vowelsn_I;
$AAADurga_toPadma[AAADurga::AAADurga_vowelsn_I_candrabindu_1]   = Padma::Padma_vowelsn_I . Padma::Padma_candrabindu;
$AAADurga_toPadma[AAADurga::AAADurga_vowelsn_I_candrabindu_2]   = Padma::Padma_vowelsn_I . Padma::Padma_candrabindu;
$AAADurga_toPadma[AAADurga::AAADurga_vowelsn_I_candrabindu_3]   = Padma::Padma_vowelsn_I . Padma::Padma_candrabindu;
$AAADurga_toPadma[AAADurga::AAADurga_vowelsn_I_candrabindu_4]   = Padma::Padma_vowelsn_I . Padma::Padma_candrabindu;
$AAADurga_toPadma[AAADurga::AAADurga_vowelsn_R_II_1] = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_II;
$AAADurga_toPadma[AAADurga::AAADurga_vowelsn_R_II_2] = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_II;
$AAADurga_toPadma[AAADurga::AAADurga_vowelsn_II_1] = Padma::Padma_vowelsn_II;
$AAADurga_toPadma[AAADurga::AAADurga_vowelsn_II_2] = Padma::Padma_vowelsn_II;
$AAADurga_toPadma[AAADurga::AAADurga_vowelsn_U_1]  = Padma::Padma_vowelsn_U;
$AAADurga_toPadma[AAADurga::AAADurga_vowelsn_U_2]  = Padma::Padma_vowelsn_U;
$AAADurga_toPadma[AAADurga::AAADurga_vowelsn_U_3]  = Padma::Padma_vowelsn_U;
$AAADurga_toPadma[AAADurga::AAADurga_vowelsn_U_4]  = Padma::Padma_vowelsn_U;
$AAADurga_toPadma[AAADurga::AAADurga_vowelsn_U_5]  = Padma::Padma_vowelsn_U;
$AAADurga_toPadma[AAADurga::AAADurga_vowelsn_U_6]  = Padma::Padma_vowelsn_U;
$AAADurga_toPadma[AAADurga::AAADurga_vowelsn_UU_1] = Padma::Padma_vowelsn_UU;
$AAADurga_toPadma[AAADurga::AAADurga_vowelsn_UU_2] = Padma::Padma_vowelsn_UU;
$AAADurga_toPadma[AAADurga::AAADurga_vowelsn_UU_3] = Padma::Padma_vowelsn_UU;
$AAADurga_toPadma[AAADurga::AAADurga_vowelsn_UU_4] = Padma::Padma_vowelsn_UU;
$AAADurga_toPadma[AAADurga::AAADurga_vowelsn_UU_5] = Padma::Padma_vowelsn_UU;
$AAADurga_toPadma[AAADurga::AAADurga_vowelsn_UU_6] = Padma::Padma_vowelsn_UU;
//$AAADurga_toPadma[AAADurga::AAADurga_vowelsn_R_1]  = Padma::Padma_vowelsn_R;
$AAADurga_toPadma[AAADurga::AAADurga_vowelsn_R_2]  = Padma::Padma_vowelsn_R;
$AAADurga_toPadma[AAADurga::AAADurga_vowelsn_R_3]  = Padma::Padma_vowelsn_R;
$AAADurga_toPadma[AAADurga::AAADurga_vowelsn_R_4]  = Padma::Padma_vowelsn_R;
$AAADurga_toPadma[AAADurga::AAADurga_vowelsn_R_5]  = Padma::Padma_vowelsn_R;
$AAADurga_toPadma[AAADurga::AAADurga_vowelsn_R_6]  = Padma::Padma_vowelsn_R;
//AAADurga.toPadma[AAADurga.vowelsn_RR]   = Padma::Padma_vowelsn_RR;
$AAADurga_toPadma[AAADurga::AAADurga_vowelsn_E_1] = Padma::Padma_vowelsn_E;
$AAADurga_toPadma[AAADurga::AAADurga_vowelsn_E_2] = Padma::Padma_vowelsn_E;
//AAADurga.toPadma[AAADurga.vowelsn_AI]   = Padma::Padma_vowelsn_AI;
$AAADurga_toPadma[AAADurga::AAADurga_vowelsn_AI_1]   = Padma::Padma_vowelsn_AI;
$AAADurga_toPadma[AAADurga::AAADurga_vowelsn_AI_2]   = Padma::Padma_vowelsn_AI;
//AAADurga.toPadma[AAADurga.vowelsn_AU]   = Padma::Padma_vowelsn_AU;
$AAADurga_toPadma[AAADurga::AAADurga_vowelsn_AULEN_1]   = Padma::Padma_vowelsn_AULEN;
$AAADurga_toPadma[AAADurga::AAADurga_vowelsn_AULEN_2]   = Padma::Padma_vowelsn_AULEN;
$AAADurga_toPadma[AAADurga::AAADurga_vowelsn_AULEN_candrabindu_1]   = Padma::Padma_vowelsn_AULEN . Padma::Padma_candrabindu;
$AAADurga_toPadma[AAADurga::AAADurga_vowelsn_AULEN_candrabindu_2]   = Padma::Padma_vowelsn_AULEN . Padma::Padma_candrabindu;
$AAADurga_toPadma[AAADurga::AAADurga_vowelsn_AULEN_candrabindu_3]   = Padma::Padma_vowelsn_AULEN . Padma::Padma_candrabindu;

// Halffm
$AAADurga_toPadma[AAADurga::AAADurga_halffm_RA_1]   = Padma::Padma_halffm_RA;
$AAADurga_toPadma[AAADurga::AAADurga_halffm_RA_2]   = Padma::Padma_halffm_RA;
$AAADurga_toPadma[AAADurga::AAADurga_halffm_RA_3]   = Padma::Padma_halffm_RA;

//Conjuncts
$AAADurga_toPadma[AAADurga::AAADurga_conjct_NN_NN]  = Padma::Padma_consnt_NNA . Padma::Padma_vattu_NNA;
$AAADurga_toPadma[AAADurga::AAADurga_conjct_NTR]    = Padma::Padma_consnt_NA . Padma::Padma_vattu_TA . Padma::Padma_vattu_RA;
$AAADurga_toPadma[AAADurga::AAADurga_conjct_KK]     = Padma::Padma_consnt_KA . Padma::Padma_vattu_KA;
$AAADurga_toPadma[AAADurga::AAADurga_conjct_KT]     = Padma::Padma_consnt_KA . Padma::Padma_vattu_TA;
$AAADurga_toPadma[AAADurga::AAADurga_conjct_KR]     = Padma::Padma_consnt_KA . Padma::Padma_vattu_RA;
$AAADurga_toPadma[AAADurga::AAADurga_conjct_KL]     = Padma::Padma_consnt_KA . Padma::Padma_vattu_LA;
$AAADurga_toPadma[AAADurga::AAADurga_conjct_GR]     = Padma::Padma_consnt_GA . Padma::Padma_vattu_RA;
$AAADurga_toPadma[AAADurga::AAADurga_conjct_KSH]    = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA;
//AAADurga.toPadma[AAADurga.conjct_JNY]  = Padma::Padma_consnt_JA . Padma::Padma_vattu_NYA;

$AAADurga_toPadma[AAADurga::AAADurga_conjct_GM]     = Padma::Padma_consnt_GA . Padma::Padma_vattu_MA;
$AAADurga_toPadma[AAADurga::AAADurga_conjct_GDH]    = Padma::Padma_consnt_GA . Padma::Padma_vattu_DHA;
$AAADurga_toPadma[AAADurga::AAADurga_conjct_GN]     = Padma::Padma_consnt_GA . Padma::Padma_vattu_NA;
$AAADurga_toPadma[AAADurga::AAADurga_conjct_GL]     = Padma::Padma_consnt_GA . Padma::Padma_vattu_LA;
$AAADurga_toPadma[AAADurga::AAADurga_conjct_NGK]    = Padma::Padma_consnt_NGA . Padma::Padma_vattu_KA;
$AAADurga_toPadma[AAADurga::AAADurga_conjct_NGG]    = Padma::Padma_consnt_NGA . Padma::Padma_vattu_GA;
$AAADurga_toPadma[AAADurga::AAADurga_conjct_CC]     = Padma::Padma_consnt_CA . Padma::Padma_vattu_CA;
$AAADurga_toPadma[AAADurga::AAADurga_conjct_CCH]    = Padma::Padma_consnt_CA . Padma::Padma_vattu_CHA;
$AAADurga_toPadma[AAADurga::AAADurga_conjct_JJ]     = Padma::Padma_consnt_JA . Padma::Padma_vattu_JA;
$AAADurga_toPadma[AAADurga::AAADurga_conjct_NNTT_1] = Padma::Padma_consnt_NNA . Padma::Padma_vattu_TTA;
$AAADurga_toPadma[AAADurga::AAADurga_conjct_NNTT_2] = Padma::Padma_consnt_NNA . Padma::Padma_vattu_TTA;
$AAADurga_toPadma[AAADurga::AAADurga_conjct_DDDD]   = Padma::Padma_consnt_DDA . Padma::Padma_vattu_DDA;
$AAADurga_toPadma[AAADurga::AAADurga_conjct_NNDD]   = Padma::Padma_consnt_NNA . Padma::Padma_vattu_DDA;
$AAADurga_toPadma[AAADurga::AAADurga_conjct_TT]     = Padma::Padma_consnt_TA . Padma::Padma_vattu_TA;
$AAADurga_toPadma[AAADurga::AAADurga_conjct_TM_1]   = Padma::Padma_consnt_TA . Padma::Padma_vattu_MA;
$AAADurga_toPadma[AAADurga::AAADurga_conjct_TM_2]   = Padma::Padma_consnt_TA . Padma::Padma_vattu_MA;
$AAADurga_toPadma[AAADurga::AAADurga_conjct_TR]     = Padma::Padma_consnt_TA . Padma::Padma_vattu_RA;
$AAADurga_toPadma[AAADurga::AAADurga_conjct_DM_1]   = Padma::Padma_consnt_DA . Padma::Padma_vattu_MA;
$AAADurga_toPadma[AAADurga::AAADurga_conjct_DM_2]   = Padma::Padma_consnt_DA . Padma::Padma_vattu_MA;
$AAADurga_toPadma[AAADurga::AAADurga_conjct_SHR]    = Padma::Padma_consnt_SHA . Padma::Padma_vattu_RA;
$AAADurga_toPadma[AAADurga::AAADurga_conjct_NDH]    = Padma::Padma_consnt_NA . Padma::Padma_vattu_DHA;
$AAADurga_toPadma[AAADurga::AAADurga_conjct_D_DB]   = Padma::Padma_consnt_DA . Padma::Padma_vattu_DA . Padma::Padma_vattu_BA;
$AAADurga_toPadma[AAADurga::AAADurga_conjct_D_DH]   = Padma::Padma_consnt_DA . Padma::Padma_vattu_DHA;
$AAADurga_toPadma[AAADurga::AAADurga_conjct_PP]     = Padma::Padma_consnt_PA . Padma::Padma_vattu_PA;
$AAADurga_toPadma[AAADurga::AAADurga_conjct_DB]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_BA;
$AAADurga_toPadma[AAADurga::AAADurga_conjct_DR]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_RA;
$AAADurga_toPadma[AAADurga::AAADurga_conjct_PR]     = Padma::Padma_consnt_PA . Padma::Padma_vattu_RA;
$AAADurga_toPadma[AAADurga::AAADurga_conjct_PL]     = Padma::Padma_consnt_PA . Padma::Padma_vattu_LA;
$AAADurga_toPadma[AAADurga::AAADurga_conjct_DDR]    = Padma::Padma_consnt_DDA . Padma::Padma_vattu_RA;
$AAADurga_toPadma[AAADurga::AAADurga_conjct_NN]     = Padma::Padma_consnt_NA . Padma::Padma_vattu_NA;
$AAADurga_toPadma[AAADurga::AAADurga_conjct_NM]     = Padma::Padma_consnt_NA . Padma::Padma_vattu_MA;
$AAADurga_toPadma[AAADurga::AAADurga_conjct_PTT]    = Padma::Padma_consnt_PA . Padma::Padma_vattu_TTA;
$AAADurga_toPadma[AAADurga::AAADurga_conjct_PS]     = Padma::Padma_consnt_PA . Padma::Padma_vattu_SA;
$AAADurga_toPadma[AAADurga::AAADurga_conjct_ND]     = Padma::Padma_consnt_NA . Padma::Padma_vattu_DA;
$AAADurga_toPadma[AAADurga::AAADurga_conjct_NDR]    = Padma::Padma_consnt_NA . Padma::Padma_vattu_DA . Padma::Padma_vattu_RA;
$AAADurga_toPadma[AAADurga::AAADurga_conjct_DHB]    = Padma::Padma_consnt_DHA . Padma::Padma_vattu_BA;
$AAADurga_toPadma[AAADurga::AAADurga_conjct_NDHR]   = Padma::Padma_consnt_NA . Padma::Padma_vattu_DHA . Padma::Padma_vattu_RA;
$AAADurga_toPadma[AAADurga::AAADurga_conjct_NTTR]   = Padma::Padma_consnt_NA . Padma::Padma_vattu_TTA . Padma::Padma_vattu_RA;
$AAADurga_toPadma[AAADurga::AAADurga_conjct_NTH]    = Padma::Padma_consnt_NA . Padma::Padma_vattu_THA;
$AAADurga_toPadma[AAADurga::AAADurga_conjct_SHR_II] = Padma::Padma_consnt_SHA . Padma::Padma_vattu_RA . Padma::Padma_vowelsn_II;


$AAADurga_toPadma[AAADurga::AAADurga_vattu_YA]      = Padma::Padma_vattu_YA;

//Digits
$AAADurga_toPadma[AAADurga::AAADurga_digit_ZERO]    = Padma::Padma_digit_ZERO;
$AAADurga_toPadma[AAADurga::AAADurga_digit_ONE]     = Padma::Padma_digit_ONE;
$AAADurga_toPadma[AAADurga::AAADurga_digit_TWO]     = Padma::Padma_digit_TWO;
$AAADurga_toPadma[AAADurga::AAADurga_digit_THREE]   = Padma::Padma_digit_THREE;
$AAADurga_toPadma[AAADurga::AAADurga_digit_FOUR]    = Padma::Padma_digit_FOUR;
$AAADurga_toPadma[AAADurga::AAADurga_digit_FIVE]    = Padma::Padma_digit_FIVE;
$AAADurga_toPadma[AAADurga::AAADurga_digit_SIX]     = Padma::Padma_digit_SIX;
$AAADurga_toPadma[AAADurga::AAADurga_digit_SEVEN]   = Padma::Padma_digit_SEVEN;
$AAADurga_toPadma[AAADurga::AAADurga_digit_EIGHT]   = Padma::Padma_digit_EIGHT;
$AAADurga_toPadma[AAADurga::AAADurga_digit_NINE]    = Padma::Padma_digit_NINE;

$AAADurga_toPadma[AAADurga::AAADurga_misc_DANDA]     = Padma::Padma_danda;

$AAADurga_prefixList = array();
$AAADurga_prefixList[AAADurga::AAADurga_vowelsn_I_1]  = true;
$AAADurga_prefixList[AAADurga::AAADurga_vowelsn_I_2]  = true;
$AAADurga_prefixList[AAADurga::AAADurga_vowelsn_I_3]  = true;
$AAADurga_prefixList[AAADurga::AAADurga_vowelsn_I_4]  = true;
$AAADurga_prefixList[AAADurga::AAADurga_vowelsn_I_candrabindu_1] = true;
$AAADurga_prefixList[AAADurga::AAADurga_vowelsn_I_candrabindu_2] = true;
$AAADurga_prefixList[AAADurga::AAADurga_vowelsn_I_candrabindu_3] = true;
$AAADurga_prefixList[AAADurga::AAADurga_vowelsn_I_candrabindu_4] = true;
//AAADurga.prefixList[AAADurga.vowelsn_R_II_1] = true;
//AAADurga.prefixList[AAADurga.vowelsn_R_II_2] = true;
$AAADurga_prefixList[AAADurga::AAADurga_vowelsn_E_1] = true;
$AAADurga_prefixList[AAADurga::AAADurga_vowelsn_E_2] = true;
$AAADurga_prefixList[AAADurga::AAADurga_vowelsn_AI_1] = true;
$AAADurga_prefixList[AAADurga::AAADurga_vowelsn_AI_2] = true;
//AAADurga.prefixList[AAADurga.candrabindu_1] = true;
//AAADurga.prefixList[AAADurga.candrabindu_2] = true;
//AAADurga.prefixList[AAADurga.candrabindu_3] = true;


$AAADurga_suffixList = array();
$AAADurga_suffixList[AAADurga::AAADurga_halffm_RA_1]  = true;
$AAADurga_suffixList[AAADurga::AAADurga_halffm_RA_2]  = true;
$AAADurga_suffixList[AAADurga::AAADurga_halffm_RA_3]  = true;

$AAADurga_redundantList = array();
$AAADurga_redundantList[AAADurga::AAADurga_misc_UNKNOWN_1] = true;
$AAADurga_redundantList[AAADurga::AAADurga_misc_UNKNOWN_2] = true;
$AAADurga_redundantList[AAADurga::AAADurga_misc_UNKNOWN_3] = true;
//AAADurga.redundantList[AAADurga.misc_UNKNOWN_4] = true;

$AAADurga_overloadList = array();

function AAADurga_initialize()
{
    global $fontinfo;

    $fontinfo["aaadurga"]["language"] = "Bengali";
    $fontinfo["aaadurga"]["class"] = "AAADurga";
}

?>
