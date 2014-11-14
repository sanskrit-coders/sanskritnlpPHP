<?php
/* ***** BEGIN LICENSE BLOCK *****
 *
 *  This file is originally part of Padma.
 *
 *  Copyright (C) 2006 AnvarLal Hasbulla  <padma@anvarlal.in>
 *  Copyright (C) 2006 Nagarjuna Venna    <vnagarjuna@yahoo.com>
 *  Copyright (C) 2006 Harshita Vani      <harshita@atc.tcs.com>
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

//Matweb Malayalam
class Matweb
{
function Matweb()
{
}

//The interface every dynamic font encoding should implement
var $maxLookupLen = 2;
var $fontFace     = "Matweb";
var $displayName  = "Matweb";
var $script       = Padma::Padma_script_MALAYALAM;

function lookup($str) 
{
    global $Matweb_toPadma;
    return $Matweb_toPadma[$str];
}

function isPrefixSymbol($str)
{
    global $Matweb_prefixList;
    return $Matweb_prefixList[$str] != null;
}

function isOverloaded($str)
{
    global $Matweb_overloadList;
    return $Matweb_overloadList[$str] != null;
}

function handleTwoPartVowelSigns($sign1, $sign2)
{
    if (($sign1 == Padma::Padma_vowelsn_E && $sign2 == Padma::Padma_vowelsn_AA) ||
        ($sign1 == Padma::Padma_vowelsn_AA && $sign2 == Padma::Padma_vowelsn_E))
        return Padma::Padma_vowelsn_O;
    if (($sign1 == Padma::Padma_vowelsn_EE && $sign2 == Padma::Padma_vowelsn_AA) ||
        ($sign1 == Padma::Padma_vowelsn_AA && $sign2 == Padma::Padma_vowelsn_EE))
        return Padma::Padma_vowelsn_OO;
    return $sign1 . $sign2;
}

function isRedundant($str)
{
    global $Matweb_redundantList;
    return $Matweb_redundantList[$str] != null;
}

//Implementation details start here

//Specials
const Matweb_visarga        = "\xC3\xBC";
const Matweb_anusvara       = "\xC3\xB9";
const Matweb_virama         = "\xC3\xBA"; //Chandrakkala

//Vowels
const Matweb_vowel_A        = "\x41";
const Matweb_vowel_AA       = "\x42";
const Matweb_vowel_I        = "\x43";
const Matweb_vowel_II       = "\x43\xC3\xB8";
const Matweb_vowel_U        = "\x44";
const Matweb_vowel_UU       = "\x44\xC3\xB8";
const Matweb_vowel_R        = "\x63";
const Matweb_vowel_RR       = "\x63\xC3\xB8";
const Matweb_vowel_E        = "\x46";
const Matweb_vowel_EE       = "\x47";               
const Matweb_vowel_AI       = "\xC3\xB6\x46";
const Matweb_vowel_O        = "\x48";
const Matweb_vowel_OO       = "\x48\xC3\xAA";
const Matweb_vowel_AU       = "\x48\xC3\xB8";

//Consonants
const Matweb_consnt_KA      = "\x4A";
const Matweb_consnt_KHA     = "\x4B";
const Matweb_consnt_GA      = "\x4C";
const Matweb_consnt_GHA     = "\x4D";
const Matweb_consnt_NGA     = "\x4E";

const Matweb_consnt_CA      = "\x4F";
const Matweb_consnt_CHA     = "\x50";
const Matweb_consnt_JA      = "\x51";
const Matweb_consnt_JHA     = "\x52";
const Matweb_consnt_NYA     = "\x53";

const Matweb_consnt_TTA     = "\x54";
const Matweb_consnt_TTHA    = "\x55";
const Matweb_consnt_DDA     = "\x56";
const Matweb_consnt_DDHA    = "\x57";
const Matweb_consnt_NNA     = "\x58";

const Matweb_consnt_TA      = "\x59";
const Matweb_consnt_THA     = "\x5A";
const Matweb_consnt_DA      = "\x61";
const Matweb_consnt_DHA     = "\x62";
const Matweb_consnt_NA      = "\x45";

const Matweb_consnt_PA      = "\x64";
const Matweb_consnt_PHA     = "\x65";
const Matweb_consnt_BA      = "\x66";
const Matweb_consnt_BHA     = "\x67";
const Matweb_consnt_MA      = "\x68";

const Matweb_consnt_YA      = "\x69";
const Matweb_consnt_RA      = "\x6A";
const Matweb_consnt_LA      = "\x6B";
const Matweb_consnt_VA      = "\x6C";
const Matweb_consnt_SHA     = "\x6D";
const Matweb_consnt_SSA     = "\x6E";
const Matweb_consnt_SA      = "\x6F";

const Matweb_consnt_HA      = "\x70";
const Matweb_consnt_LLA     = "\x71";
const Matweb_consnt_ZHA     = "\x72";
const Matweb_consnt_RRA     = "\x73";

//Gunintamulu
const Matweb_vowelsn_AA     = "\xC3\xAA";
const Matweb_vowelsn_I      = "\xC3\xAF";
const Matweb_vowelsn_II     = "\xC3\xB0";
const Matweb_vowelsn_U      = "\xC3\xB1";
const Matweb_vowelsn_UU     = "\xC3\xB2";
const Matweb_vowelsn_R      = "\xC3\xB3";
const Matweb_vowelsn_RR     = "\xC3\xB3\xC3\xB8";
const Matweb_vowelsn_E      = "\xC3\xB6";
const Matweb_vowelsn_EE     = "\xC3\xB7";
const Matweb_vowelsn_AI     = "\xC3\xB6\xC3\xB6";
//vowelsigns o and O have two separate glyphs, one on left and one on right.
const Matweb_vowelsn_AU     = "\xC3\xB8";

//Chillu (5)
const Matweb_chillu_ENN     = "\x78";
const Matweb_chillu_IN      = "\x75";
const Matweb_chillu_IR      = "\x74";
const Matweb_chillu_IL      = "\x76";
const Matweb_chillu_ILL     = "\x77";

//vattulu (consonant signs)
const Matweb_vattu_YA       = "\xC3\xA1";
const Matweb_vattu_RA       = "\xC3\xA2";
const Matweb_vattu_VA       = "\xC3\xB4";
//half forms
const Matweb_vattu_KA       = "\xC3\xA3";
const Matweb_vattu_MA       = "\xC3\xA4";
const Matweb_vattu_NNA      = "\xC3\xA5";
const Matweb_vattu_SA       = "\xC3\xA6";
const Matweb_vattu_PA       = "\xC3\xA7";
const Matweb_vattu_DHA      = "\xC3\xA8";
const Matweb_vattu_TTA      = "\xC3\xA9";
const Matweb_vattu_PHA      = "\xC3\xAC";
const Matweb_vattu_LA       = "\xC3\xAB";
const Matweb_vattu_TA       = "\xC3\xAD";
const Matweb_vattu_NA       = "\xC3\xAE";
const Matweb_vattu_TTHA     = "\xC3\xB5";
const Matweb_vattu_R        = "\xC3\xBD";
const Matweb_below_double   = "\xC3\xBE";//the character used to double CA,VA,BA


//kooTTaksharangngaL

const Matweb_conj_KK        = "\xC2\xBC";
const Matweb_conj_KTT       = "\xC3\x85";
const Matweb_conj_KT        = "\xC2\xB9";
const Matweb_conj_KSS       = "\x26";
const Matweb_conj_GG        = "\x24";
const Matweb_conj_GN        = "\xC2\xAC";
const Matweb_conj_GM        = "\xC3\x9E";
const Matweb_conj_NGK       = "\xC3\x8B";  
const Matweb_conj_NGNG      = "\xC5\xB8";
const Matweb_conj_GBH       = "\xC3\x9F"; //addition
const Matweb_conj_GD        = "\xE2\x80\xA6"; //addition

const Matweb_conj_CC        = "\x4F\xC3\xBE";

const Matweb_conj_CCH       = "\xE2\x80\xA2";
const Matweb_conj_JJ        = "\xE2\x80\x9E";
const Matweb_conj_JNY       = "\xC3\x89";
const Matweb_conj_NYC       = "\xC3\x96";
const Matweb_conj_NYNY      = "\xC6\x92";
const Matweb_conj_NYJ       = "\xC3\x92";//addition

const Matweb_conj_TTTT      = "\xCB\x86";
const Matweb_conj_NNTT      = "\xC3\xBB";
const Matweb_conj_NNDD      = "\x7E";
const Matweb_conj_NNNN      = "\xC2\xAF";

const Matweb_conj_NNM       = "\xC2\xB4";
const Matweb_conj_DDDDH     = "\xC2\xA9"; 
const Matweb_conj_DDJ       = "\xE2\x80\xBA"; //addition


const Matweb_conj_T_T       = "\xC5\x92";
const Matweb_conj_T_TH      = "\x3C";
const Matweb_conj_TBH       = "\xC2\xA7";
const Matweb_conj_TM        = "\x23";
const Matweb_conj_TS        = "\xC2\xA8";
const Matweb_conj_TN        = "\xC2\xBA"; //addition

const Matweb_conj_DD        = "\xE2\x80\xB0";
const Matweb_conj_D_DH      = "\xC5\xA0";
const Matweb_conj_NT        = "\xC2\x8D";
const Matweb_conj_NTH       = "\xE2\x84\xA2";
const Matweb_conj_ND        = "\x3E";
const Matweb_conj_NDH       = "\xE2\x80\xA1";
const Matweb_conj_N_N       = "\xC2\xAA";
const Matweb_conj_NM        = "\xC3\x93";
const Matweb_conj_NRR_2     = "\x75\x73"; 
const Matweb_conj_NAU       = "\xC3\x95"; //npollu for me, nau for paul

const Matweb_conj_BD        = "\x7D";
const Matweb_conj_BB        = "\x66\xC3\xBE";
const Matweb_conj_MP        = "\xC5\x93";
const Matweb_conj_MM        = "\xCB\x9C";
const Matweb_conj_MLL       = "\xE2\x80\x93";

const Matweb_conj_YY_1      = "\xC3\xA0";
const Matweb_conj_YY_2      = "\x69\xC3\xBE";
const Matweb_conj_YKK       = "\xC3\x80";
const Matweb_conj_VV        = "\x6C\xC3\xBE";
const Matweb_conj_ZHV       = "\xC2\xB0"; //addition

const Matweb_conj_SHC       = "\xC3\x8A";
const Matweb_conj_SHSH      = "\xC2\x8F";
const Matweb_conj_STH       = "\x7A";
const Matweb_conj_SRRRR     = "\xE2\x80\x9A";

const Matweb_conj_HN        = "\xC2\xBB";
const Matweb_conj_HM        = "\xC2\x9D";
const Matweb_conj_LLLL      = "\xC3\x88";

const Matweb_conj_RRRR     = "\xC5\xA1"; //ta as in steel

//Consonat(s) + koottaksharas complex combinations
const Matweb_conj_LKK       = "\x22";
const Matweb_conj_GDDH      = "\x40";
const Matweb_conj_YK_K      = "\xC3\x80";
const Matweb_conj_YM        = "\xC3\x81";
const Matweb_conj_YT        = "\xC3\x82";
const Matweb_conj_NYCH      = "\xC3\x8D"; 
const Matweb_conj_ZHC       = "\xC3\x97";
const Matweb_conj_ZHK       = "\xC3\x99";
const Matweb_conj_ZHN_N     = "\xC3\x9A";
const Matweb_conj_ZHT_T     = "\xC3\x9B"; 
const Matweb_conj_YT_T      = "\xE2\x80\x99";

//Consonants + ra and r
const Matweb_conj_SR      = "\x49";
const Matweb_conj_SSTTRA   = "\x5E";
const Matweb_conj_SRA     = "\x79";
const Matweb_conj_BRA     = "\x7B";
const Matweb_conj_JR      = "\x7C";
const Matweb_conj_GHRA    = "\xC2\x90"; 
const Matweb_conj_MPRA    = "\xC2\xA1";
const Matweb_conj_SMR     = "\xC2\xA2";
const Matweb_conj_STRA    = "\xC2\xA3";
const Matweb_conj_SKR     = "\xC2\xA4";
const Matweb_conj_TR      = "\xC2\xA5";
const Matweb_conj_TRA     = "\xC2\xA6";
const Matweb_conj_DHRA    = "\xC2\xAB"; 
const Matweb_conj_DHR     = "\xC2\xAE";
const Matweb_conj_SHRA    = "\xC2\xB1";
const Matweb_conj_SHR     = "\xC2\xB3";
const Matweb_conj_NR      = "\xC2\xB5";
const Matweb_conj_NNDHRA  = "\xC2\xB6";
const Matweb_conj_NDHRA   = "\xC2\xB8"; 
const Matweb_conj_DDRA    = "\xC2\xBD";
const Matweb_conj_MRA     = "\xC2\xBE";
const Matweb_conj_SSPRA   = "\xC3\x83";
const Matweb_conj_KTRA    = "\xC3\x84";
const Matweb_conj_KRA     = "\xC3\x86";
const Matweb_conj_KR      = "\xC3\x87"; 
const Matweb_conj_DR      = "\xC3\x8C";
const Matweb_conj_DRA     = "\xC3\x8E";
const Matweb_conj_BHRA    = "\xC3\x8F";
const Matweb_conj_BHR     = "\xC3\x90";
const Matweb_conj_TTRA    = "\xC3\x91";
const Matweb_conj_NTRA    = "\xC3\x94"; 
const Matweb_conj_VRA     = "\xC3\x98";
const Matweb_conj_GRA     = "\xC3\x9C";
const Matweb_conj_GR      = "\xC3\x9D";
const Matweb_conj_NDRA    = "\xC3\xBF";
const Matweb_conj_JRA     = "\xE2\x80\x94"; 
const Matweb_conj_PHRA    = "\xE2\x80\x98";
const Matweb_conj_HR      = "\xE2\x80\x9C";
const Matweb_conj_HRA     = "\xE2\x80\x9D";
const Matweb_conj_SSKR    = "\xE2\x80\xA0"; 
const Matweb_conj_PRA     = "\xE2\x80\xB9";




//Digits
const Matweb_digit_ZERO     = "\x30";
const Matweb_digit_ONE      = "\x31";
const Matweb_digit_TWO      = "\x32";
const Matweb_digit_THREE    = "\x33";
const Matweb_digit_FOUR     = "\x34";
const Matweb_digit_FIVE     = "\x35";
const Matweb_digit_SIX      = "\x36";
const Matweb_digit_SEVEN    = "\x37";
const Matweb_digit_EIGHT    = "\x38";
const Matweb_digit_NINE     = "\x39";

//Matches ASCII
const Matweb_EXCLAM         = "\x21";
const Matweb_PERCENT        = "\x25";
const Matweb_QTSINGLE       = "\x27";
const Matweb_PARENLEFT      = "\x28";
const Matweb_PARENRIGT      = "\x29";
const Matweb_ASTERISK       = "\x2A";
const Matweb_PLUS           = "\x2B";
const Matweb_COMMA          = "\x2C";
const Matweb_PERIOD         = "\x2E";
const Matweb_SLASH          = "\x2F";
const Matweb_COLON          = "\x3A";
const Matweb_SEMICOLON      = "\x3B";
const Matweb_EQUALS         = "\x3D";
const Matweb_QUESTION       = "\x3F";

//Does not match ASCII
const Matweb_extra_QTSINGLE = "\x60";
const Matweb_extra_ASTERISK = "\xC2\xB2";
const Matweb_extra_LOWLINE   = "\x5F";//matches the unicode lowline character

//Dont need
const Matweb_misc_UNKNOWN_1  = "\x2D";
}

$Matweb_toPadma = array();

$Matweb_toPadma[Matweb::Matweb_anusvara] = Padma::Padma_anusvara;
$Matweb_toPadma[Matweb::Matweb_visarga]  = Padma::Padma_visarga;
$Matweb_toPadma[Matweb::Matweb_virama]   = Padma::Padma_chandrakkala;

$Matweb_toPadma[Matweb::Matweb_vowel_A]  = Padma::Padma_vowel_A;
$Matweb_toPadma[Matweb::Matweb_vowel_AA] = Padma::Padma_vowel_AA;
$Matweb_toPadma[Matweb::Matweb_vowel_I]  = Padma::Padma_vowel_I;
$Matweb_toPadma[Matweb::Matweb_vowel_II] = Padma::Padma_vowel_II;
$Matweb_toPadma[Matweb::Matweb_vowel_U]  = Padma::Padma_vowel_U;
$Matweb_toPadma[Matweb::Matweb_vowel_UU] = Padma::Padma_vowel_UU;
$Matweb_toPadma[Matweb::Matweb_vowel_R]  = Padma::Padma_vowel_R;
$Matweb_toPadma[Matweb::Matweb_vowel_RR] = Padma::Padma_vowel_RR;
$Matweb_toPadma[Matweb::Matweb_vowel_E]  = Padma::Padma_vowel_E;
$Matweb_toPadma[Matweb::Matweb_vowel_EE] = Padma::Padma_vowel_EE;
$Matweb_toPadma[Matweb::Matweb_vowel_AI] = Padma::Padma_vowel_AI;
$Matweb_toPadma[Matweb::Matweb_vowel_O]  = Padma::Padma_vowel_O;
$Matweb_toPadma[Matweb::Matweb_vowel_OO] = Padma::Padma_vowel_OO;
$Matweb_toPadma[Matweb::Matweb_vowel_AU] = Padma::Padma_vowel_AU;

$Matweb_toPadma[Matweb::Matweb_consnt_KA]  = Padma::Padma_consnt_KA;
$Matweb_toPadma[Matweb::Matweb_consnt_KHA] = Padma::Padma_consnt_KHA;
$Matweb_toPadma[Matweb::Matweb_consnt_GA]  = Padma::Padma_consnt_GA;
$Matweb_toPadma[Matweb::Matweb_consnt_GHA] = Padma::Padma_consnt_GHA;
$Matweb_toPadma[Matweb::Matweb_consnt_NGA] = Padma::Padma_consnt_NGA;

$Matweb_toPadma[Matweb::Matweb_consnt_CA]  = Padma::Padma_consnt_CA;
$Matweb_toPadma[Matweb::Matweb_consnt_CHA] = Padma::Padma_consnt_CHA;
$Matweb_toPadma[Matweb::Matweb_consnt_JA]  = Padma::Padma_consnt_JA;
$Matweb_toPadma[Matweb::Matweb_consnt_JHA] = Padma::Padma_consnt_JHA;
$Matweb_toPadma[Matweb::Matweb_consnt_NYA] = Padma::Padma_consnt_NYA;

$Matweb_toPadma[Matweb::Matweb_consnt_TTA]  = Padma::Padma_consnt_TTA;
$Matweb_toPadma[Matweb::Matweb_consnt_TTHA] = Padma::Padma_consnt_TTHA;
$Matweb_toPadma[Matweb::Matweb_consnt_DDA]  = Padma::Padma_consnt_DDA;
$Matweb_toPadma[Matweb::Matweb_consnt_DDHA] = Padma::Padma_consnt_DDHA;
$Matweb_toPadma[Matweb::Matweb_consnt_NNA]  = Padma::Padma_consnt_NNA;

$Matweb_toPadma[Matweb::Matweb_consnt_TA]  = Padma::Padma_consnt_TA;
$Matweb_toPadma[Matweb::Matweb_consnt_THA] = Padma::Padma_consnt_THA;
$Matweb_toPadma[Matweb::Matweb_consnt_DA]  = Padma::Padma_consnt_DA;
$Matweb_toPadma[Matweb::Matweb_consnt_DHA] = Padma::Padma_consnt_DHA;
$Matweb_toPadma[Matweb::Matweb_consnt_NA]  = Padma::Padma_consnt_NA;

$Matweb_toPadma[Matweb::Matweb_consnt_PA]  = Padma::Padma_consnt_PA;
$Matweb_toPadma[Matweb::Matweb_consnt_PHA] = Padma::Padma_consnt_PHA;
$Matweb_toPadma[Matweb::Matweb_consnt_BA]  = Padma::Padma_consnt_BA;
$Matweb_toPadma[Matweb::Matweb_consnt_BHA] = Padma::Padma_consnt_BHA;
$Matweb_toPadma[Matweb::Matweb_consnt_MA]  = Padma::Padma_consnt_MA;

$Matweb_toPadma[Matweb::Matweb_consnt_YA]  = Padma::Padma_consnt_YA;
$Matweb_toPadma[Matweb::Matweb_consnt_RA]  = Padma::Padma_consnt_RA;
$Matweb_toPadma[Matweb::Matweb_consnt_LA]  = Padma::Padma_consnt_LA;
$Matweb_toPadma[Matweb::Matweb_consnt_VA]  = Padma::Padma_consnt_VA;
$Matweb_toPadma[Matweb::Matweb_consnt_SHA] = Padma::Padma_consnt_SHA;
$Matweb_toPadma[Matweb::Matweb_consnt_SSA] = Padma::Padma_consnt_SSA;
$Matweb_toPadma[Matweb::Matweb_consnt_SA]  = Padma::Padma_consnt_SA;

$Matweb_toPadma[Matweb::Matweb_consnt_HA] = Padma::Padma_consnt_HA;
$Matweb_toPadma[Matweb::Matweb_consnt_LLA] = Padma::Padma_consnt_LLA;
$Matweb_toPadma[Matweb::Matweb_consnt_ZHA] = Padma::Padma_consnt_ZHA;
$Matweb_toPadma[Matweb::Matweb_consnt_RRA] = Padma::Padma_consnt_RRA;

//Gunintamulu
$Matweb_toPadma[Matweb::Matweb_vowelsn_AA] = Padma::Padma_vowelsn_AA;
$Matweb_toPadma[Matweb::Matweb_vowelsn_I]  = Padma::Padma_vowelsn_I;
$Matweb_toPadma[Matweb::Matweb_vowelsn_II] = Padma::Padma_vowelsn_II;
$Matweb_toPadma[Matweb::Matweb_vowelsn_U]  = Padma::Padma_vowelsn_U;
$Matweb_toPadma[Matweb::Matweb_vowelsn_UU] = Padma::Padma_vowelsn_UU;
$Matweb_toPadma[Matweb::Matweb_vowelsn_R]  = Padma::Padma_vowelsn_R;
$Matweb_toPadma[Matweb::Matweb_vowelsn_E]  = Padma::Padma_vowelsn_E;
$Matweb_toPadma[Matweb::Matweb_vowelsn_EE] = Padma::Padma_vowelsn_EE;
$Matweb_toPadma[Matweb::Matweb_vowelsn_AI] = Padma::Padma_vowelsn_AI;
$Matweb_toPadma[Matweb::Matweb_vowelsn_AU] = Padma::Padma_vowelsn_AU;

//Chillu
$Matweb_toPadma[Matweb::Matweb_chillu_ENN] = Padma::Padma_consnt_NNA . Padma::Padma_chillu;
$Matweb_toPadma[Matweb::Matweb_chillu_IN]  = Padma::Padma_consnt_NA . Padma::Padma_chillu;
$Matweb_toPadma[Matweb::Matweb_chillu_IR]  = Padma::Padma_consnt_RA . Padma::Padma_chillu;
$Matweb_toPadma[Matweb::Matweb_chillu_IL]  = Padma::Padma_consnt_LA . Padma::Padma_chillu;
$Matweb_toPadma[Matweb::Matweb_chillu_ILL] = Padma::Padma_consnt_LLA . Padma::Padma_chillu;

//half forms
$Matweb_toPadma[Matweb::Matweb_vattu_YA]  = Padma::Padma_vattu_YA;
$Matweb_toPadma[Matweb::Matweb_vattu_RA]  = Padma::Padma_vattu_RA;
$Matweb_toPadma[Matweb::Matweb_vattu_VA]  = Padma::Padma_vattu_VA;
$Matweb_toPadma[Matweb::Matweb_vattu_KA]  = Padma::Padma_vattu_KA;
$Matweb_toPadma[Matweb::Matweb_vattu_MA]  = Padma::Padma_vattu_MA;
$Matweb_toPadma[Matweb::Matweb_vattu_NNA] = Padma::Padma_vattu_NNA;
$Matweb_toPadma[Matweb::Matweb_vattu_SA]  = Padma::Padma_vattu_SA;
$Matweb_toPadma[Matweb::Matweb_vattu_PA]  = Padma::Padma_vattu_PA;
$Matweb_toPadma[Matweb::Matweb_vattu_PHA]  = Padma::Padma_vattu_PHA;
$Matweb_toPadma[Matweb::Matweb_vattu_DHA] = Padma::Padma_vattu_DHA;
$Matweb_toPadma[Matweb::Matweb_vattu_TTA] = Padma::Padma_vattu_TTA;
$Matweb_toPadma[Matweb::Matweb_vattu_LA]  = Padma::Padma_vattu_LA;
$Matweb_toPadma[Matweb::Matweb_vattu_TA]  = Padma::Padma_vattu_TA;
$Matweb_toPadma[Matweb::Matweb_vattu_NA]  = Padma::Padma_vattu_NA;
$Matweb_toPadma[Matweb::Matweb_vattu_TTHA] = Padma::Padma_vattu_TTHA;
$Matweb_toPadma[Matweb::Matweb_vattu_R]   = Padma::Padma_vowelsn_R;


//kooTTaksharangngaL


$Matweb_toPadma[Matweb::Matweb_conj_KK]   = Padma::Padma_consnt_KA .  Padma::Padma_vattu_KA;
$Matweb_toPadma[Matweb::Matweb_conj_KTT]  = Padma::Padma_consnt_KA .  Padma::Padma_vattu_TTA;
$Matweb_toPadma[Matweb::Matweb_conj_KT]   = Padma::Padma_consnt_KA .  Padma::Padma_vattu_TA;
$Matweb_toPadma[Matweb::Matweb_conj_KSS]  = Padma::Padma_consnt_KA .  Padma::Padma_vattu_SSA;
$Matweb_toPadma[Matweb::Matweb_conj_GG]   = Padma::Padma_consnt_GA .  Padma::Padma_vattu_GA;
$Matweb_toPadma[Matweb::Matweb_conj_GN]   = Padma::Padma_consnt_GA .  Padma::Padma_vattu_NA;
$Matweb_toPadma[Matweb::Matweb_conj_GM]   = Padma::Padma_consnt_GA .  Padma::Padma_vattu_MA;
$Matweb_toPadma[Matweb::Matweb_conj_NGK]  = Padma::Padma_consnt_NGA .  Padma::Padma_vattu_KA;
$Matweb_toPadma[Matweb::Matweb_conj_NGNG] = Padma::Padma_consnt_NGA .  Padma::Padma_vattu_NGA;

$Matweb_toPadma[Matweb::Matweb_conj_CC]   = Padma::Padma_consnt_CA .  Padma::Padma_vattu_CA;
$Matweb_toPadma[Matweb::Matweb_conj_CCH]  = Padma::Padma_consnt_CA .  Padma::Padma_vattu_CHA;
$Matweb_toPadma[Matweb::Matweb_conj_JJ]   = Padma::Padma_consnt_JA .  Padma::Padma_vattu_JA;
$Matweb_toPadma[Matweb::Matweb_conj_JNY]  = Padma::Padma_consnt_JA .  Padma::Padma_vattu_NYA;
$Matweb_toPadma[Matweb::Matweb_conj_NYC]  = Padma::Padma_consnt_NYA .  Padma::Padma_vattu_CA;
$Matweb_toPadma[Matweb::Matweb_conj_NYNY] = Padma::Padma_consnt_NYA .  Padma::Padma_vattu_NYA;
$Matweb_toPadma[Matweb::Matweb_conj_NYJ]  = Padma::Padma_consnt_NYA .  Padma::Padma_vattu_JA;

$Matweb_toPadma[Matweb::Matweb_conj_TTTT] = Padma::Padma_consnt_TTA .  Padma::Padma_vattu_TTA;
$Matweb_toPadma[Matweb::Matweb_conj_NNTT] = Padma::Padma_consnt_NNA .  Padma::Padma_vattu_TTA;
$Matweb_toPadma[Matweb::Matweb_conj_NNDD] = Padma::Padma_consnt_NNA .  Padma::Padma_vattu_DDA;
$Matweb_toPadma[Matweb::Matweb_conj_NNNN] = Padma::Padma_consnt_NNA .  Padma::Padma_vattu_NNA;
$Matweb_toPadma[Matweb::Matweb_conj_NNM]  = Padma::Padma_consnt_NNA .  Padma::Padma_vattu_MA;
$Matweb_toPadma[Matweb::Matweb_conj_DDDDH] = Padma::Padma_consnt_DDA .  Padma::Padma_vattu_DDHA;

$Matweb_toPadma[Matweb::Matweb_conj_T_T]  = Padma::Padma_consnt_TA .  Padma::Padma_vattu_TA;
$Matweb_toPadma[Matweb::Matweb_conj_T_TH] = Padma::Padma_consnt_TA .  Padma::Padma_vattu_THA;
$Matweb_toPadma[Matweb::Matweb_conj_TBH]  = Padma::Padma_consnt_TA .  Padma::Padma_vattu_BHA;
$Matweb_toPadma[Matweb::Matweb_conj_TM]   = Padma::Padma_consnt_TA .  Padma::Padma_vattu_MA;
$Matweb_toPadma[Matweb::Matweb_conj_TS]   = Padma::Padma_consnt_TA .  Padma::Padma_vattu_SA;
$Matweb_toPadma[Matweb::Matweb_conj_DD]   = Padma::Padma_consnt_DA .  Padma::Padma_vattu_DA;
$Matweb_toPadma[Matweb::Matweb_conj_D_DH] = Padma::Padma_consnt_DA .  Padma::Padma_vattu_DHA;
$Matweb_toPadma[Matweb::Matweb_conj_NT]   = Padma::Padma_consnt_NA .  Padma::Padma_vattu_TA;
$Matweb_toPadma[Matweb::Matweb_conj_NTH]  = Padma::Padma_consnt_NA .  Padma::Padma_vattu_THA;
$Matweb_toPadma[Matweb::Matweb_conj_ND]   = Padma::Padma_consnt_NA .  Padma::Padma_vattu_DA;
$Matweb_toPadma[Matweb::Matweb_conj_NDH]  = Padma::Padma_consnt_NA .  Padma::Padma_vattu_DHA;
$Matweb_toPadma[Matweb::Matweb_conj_N_N]  = Padma::Padma_consnt_NA .  Padma::Padma_vattu_NA;
$Matweb_toPadma[Matweb::Matweb_conj_NM]   = Padma::Padma_consnt_NA .  Padma::Padma_vattu_MA;
$Matweb_toPadma[Matweb::Matweb_conj_NRR_2]  = Padma::Padma_consnt_NA .  Padma::Padma_vattu_RRA;
$Matweb_toPadma[Matweb::Matweb_conj_NAU]  = Padma::Padma_consnt_NA .  Padma::Padma_chandrakkala;


$Matweb_toPadma[Matweb::Matweb_conj_BD]  = Padma::Padma_consnt_BA .  Padma::Padma_vattu_DA;
$Matweb_toPadma[Matweb::Matweb_conj_BB]  = Padma::Padma_consnt_BA .  Padma::Padma_vattu_BA;
$Matweb_toPadma[Matweb::Matweb_conj_MP]  = Padma::Padma_consnt_MA .  Padma::Padma_vattu_PA;
$Matweb_toPadma[Matweb::Matweb_conj_MM]  = Padma::Padma_consnt_MA .  Padma::Padma_vattu_MA;
$Matweb_toPadma[Matweb::Matweb_conj_MLL] = Padma::Padma_consnt_MA .  Padma::Padma_vattu_LLA;
$Matweb_toPadma[Matweb::Matweb_conj_YY_2]= Padma::Padma_consnt_YA .  Padma::Padma_vattu_YA;
$Matweb_toPadma[Matweb::Matweb_conj_YY_1]= Padma::Padma_consnt_YA .  Padma::Padma_vattu_YA;
$Matweb_toPadma[Matweb::Matweb_conj_YKK] = Padma::Padma_consnt_YA .  Padma::Padma_vattu_KA .  Padma::Padma_vattu_KA;
$Matweb_toPadma[Matweb::Matweb_conj_VV]  = Padma::Padma_consnt_VA .  Padma::Padma_vattu_VA;

$Matweb_toPadma[Matweb::Matweb_conj_SHC]  = Padma::Padma_consnt_SHA .  Padma::Padma_vattu_CA;
$Matweb_toPadma[Matweb::Matweb_conj_SHSH] = Padma::Padma_consnt_SHA .  Padma::Padma_vattu_SHA;
$Matweb_toPadma[Matweb::Matweb_conj_STH]  = Padma::Padma_consnt_SA .  Padma::Padma_vattu_THA;
$Matweb_toPadma[Matweb::Matweb_conj_SRRRR]  = Padma::Padma_consnt_SA .  Padma::Padma_vattu_RRA . Padma::Padma_vattu_RRA;

$Matweb_toPadma[Matweb::Matweb_conj_HN]   = Padma::Padma_consnt_HA .  Padma::Padma_vattu_NA;
$Matweb_toPadma[Matweb::Matweb_conj_HM]   = Padma::Padma_consnt_HA .  Padma::Padma_vattu_MA;
$Matweb_toPadma[Matweb::Matweb_conj_LLLL] = Padma::Padma_consnt_LLA .  Padma::Padma_vattu_LLA;

$Matweb_toPadma[Matweb::Matweb_conj_RRRR] = Padma::Padma_consnt_RRA .  Padma::Padma_vattu_RRA;

$Matweb_toPadma[Matweb::Matweb_conj_ZHV] = Padma::Padma_consnt_ZHA .  Padma::Padma_vattu_VA;
$Matweb_toPadma[Matweb::Matweb_conj_TN] = Padma::Padma_consnt_TA .  Padma::Padma_vattu_NA;
$Matweb_toPadma[Matweb::Matweb_conj_DDJ] = Padma::Padma_consnt_DDA .  Padma::Padma_vattu_JA;
$Matweb_toPadma[Matweb::Matweb_conj_GBH] = Padma::Padma_consnt_GA .  Padma::Padma_vattu_BHA;
$Matweb_toPadma[Matweb::Matweb_conj_GD]  = Padma::Padma_consnt_GA .  Padma::Padma_vattu_DA;


//Consonant(s) . Vowel Sign
$Matweb_toPadma[Matweb::Matweb_conj_LKK]   = Padma::Padma_consnt_LA . Padma::Padma_vattu_KA . Padma::Padma_vattu_KA;
$Matweb_toPadma[Matweb::Matweb_conj_GDDH]  = Padma::Padma_consnt_GA .  Padma::Padma_vattu_DA . Padma::Padma_vattu_DHA;
$Matweb_toPadma[Matweb::Matweb_conj_YK_K]  = Padma::Padma_consnt_YA .  Padma::Padma_vattu_KA . Padma::Padma_vattu_KA;
$Matweb_toPadma[Matweb::Matweb_conj_YM]    = Padma::Padma_consnt_YA . Padma::Padma_vattu_MA;
$Matweb_toPadma[Matweb::Matweb_conj_YT]    = Padma::Padma_consnt_YA . Padma::Padma_vattu_TA;
$Matweb_toPadma[Matweb::Matweb_conj_NYCH]  = Padma::Padma_consnt_NYA .  Padma::Padma_vattu_CHA ;
$Matweb_toPadma[Matweb::Matweb_conj_ZHC]   = Padma::Padma_consnt_ZHA . Padma::Padma_vattu_CA;
$Matweb_toPadma[Matweb::Matweb_conj_ZHK]   = Padma::Padma_consnt_ZHA . Padma::Padma_vattu_KA;
$Matweb_toPadma[Matweb::Matweb_conj_ZHN_N] = Padma::Padma_consnt_ZHA . Padma::Padma_vattu_NA . Padma::Padma_vattu_NA;
$Matweb_toPadma[Matweb::Matweb_conj_ZHT_T] = Padma::Padma_consnt_ZHA .  Padma::Padma_vattu_TA . Padma::Padma_vattu_TA;
$Matweb_toPadma[Matweb::Matweb_conj_YT_T]  = Padma::Padma_consnt_YA . Padma::Padma_vattu_TA . Padma::Padma_vattu_TA;

//Consonants conjugates with R
$Matweb_toPadma[Matweb::Matweb_conj_SR]   = Padma::Padma_consnt_SA .  Padma::Padma_vowelsn_R;
$Matweb_toPadma[Matweb::Matweb_conj_JR]   = Padma::Padma_consnt_JA .  Padma::Padma_vowelsn_R;
$Matweb_toPadma[Matweb::Matweb_conj_SMR]   = Padma::Padma_consnt_SA . Padma::Padma_vattu_MA . Padma::Padma_vowelsn_R;
$Matweb_toPadma[Matweb::Matweb_conj_SKR]   = Padma::Padma_consnt_SA . Padma::Padma_vattu_KA . Padma::Padma_vowelsn_R;
$Matweb_toPadma[Matweb::Matweb_conj_TR]   = Padma::Padma_consnt_TA .  Padma::Padma_vowelsn_R;
$Matweb_toPadma[Matweb::Matweb_conj_DHR]   = Padma::Padma_consnt_DHA .  Padma::Padma_vowelsn_R;
$Matweb_toPadma[Matweb::Matweb_conj_SHR]   = Padma::Padma_consnt_SHA .  Padma::Padma_vowelsn_R;
$Matweb_toPadma[Matweb::Matweb_conj_NR]   = Padma::Padma_consnt_NA .  Padma::Padma_vowelsn_R;
$Matweb_toPadma[Matweb::Matweb_conj_KR]   = Padma::Padma_consnt_KA .  Padma::Padma_vowelsn_R;
$Matweb_toPadma[Matweb::Matweb_conj_SSKR]   = Padma::Padma_consnt_SSA . Padma::Padma_vattu_KA . Padma::Padma_vowelsn_R;
$Matweb_toPadma[Matweb::Matweb_conj_BHR]   = Padma::Padma_consnt_BHA .  Padma::Padma_vowelsn_R;
$Matweb_toPadma[Matweb::Matweb_conj_DR]   = Padma::Padma_consnt_DA .  Padma::Padma_vowelsn_R;
$Matweb_toPadma[Matweb::Matweb_conj_GR]   = Padma::Padma_consnt_GA .  Padma::Padma_vowelsn_R;
$Matweb_toPadma[Matweb::Matweb_conj_HR]   = Padma::Padma_consnt_HA .  Padma::Padma_vowelsn_R;

//Consonants conjugates with RA

$Matweb_toPadma[Matweb::Matweb_conj_SSTTRA]   = Padma::Padma_consnt_SSA . Padma::Padma_vattu_TTA . Padma::Padma_vattu_RA;
$Matweb_toPadma[Matweb::Matweb_conj_STRA]   = Padma::Padma_consnt_SA . Padma::Padma_vattu_TA . Padma::Padma_vattu_RA;
$Matweb_toPadma[Matweb::Matweb_conj_NNDHRA]   = Padma::Padma_consnt_NNA . Padma::Padma_vattu_DHA . Padma::Padma_vattu_RA;
$Matweb_toPadma[Matweb::Matweb_conj_NDHRA]   = Padma::Padma_consnt_NA . Padma::Padma_vattu_DHA . Padma::Padma_vattu_RA;
$Matweb_toPadma[Matweb::Matweb_conj_SSPRA]   = Padma::Padma_consnt_SSA . Padma::Padma_vattu_PA . Padma::Padma_vattu_RA;
$Matweb_toPadma[Matweb::Matweb_conj_KTRA]   = Padma::Padma_consnt_KA . Padma::Padma_vattu_TA . Padma::Padma_vattu_RA;
$Matweb_toPadma[Matweb::Matweb_conj_NDRA]   = Padma::Padma_consnt_NA . Padma::Padma_vattu_DA . Padma::Padma_vattu_RA;
$Matweb_toPadma[Matweb::Matweb_conj_NTRA]   = Padma::Padma_consnt_NA . Padma::Padma_vattu_TA . Padma::Padma_vattu_RA;
$Matweb_toPadma[Matweb::Matweb_conj_MPRA]   = Padma::Padma_consnt_MA . Padma::Padma_vattu_PA . Padma::Padma_vattu_RA;
$Matweb_toPadma[Matweb::Matweb_conj_BRA]   = Padma::Padma_consnt_BA .  Padma::Padma_vattu_RA;
$Matweb_toPadma[Matweb::Matweb_conj_SRA]   = Padma::Padma_consnt_SA  . Padma::Padma_vattu_RA;
$Matweb_toPadma[Matweb::Matweb_conj_GHRA]   = Padma::Padma_consnt_GHA .  Padma::Padma_vattu_RA;
$Matweb_toPadma[Matweb::Matweb_conj_TRA]   = Padma::Padma_consnt_TA .  Padma::Padma_vattu_RA;
$Matweb_toPadma[Matweb::Matweb_conj_SHRA]   = Padma::Padma_consnt_SHA  . Padma::Padma_vattu_RA;
$Matweb_toPadma[Matweb::Matweb_conj_DHRA]   = Padma::Padma_consnt_DHA .  Padma::Padma_vattu_RA;
$Matweb_toPadma[Matweb::Matweb_conj_MRA]   = Padma::Padma_consnt_MA .  Padma::Padma_vattu_RA;
$Matweb_toPadma[Matweb::Matweb_conj_KRA]   = Padma::Padma_consnt_KA  . Padma::Padma_vattu_RA;
$Matweb_toPadma[Matweb::Matweb_conj_BHRA]   = Padma::Padma_consnt_BHA .  Padma::Padma_vattu_RA;
$Matweb_toPadma[Matweb::Matweb_conj_DRA]   = Padma::Padma_consnt_DA .  Padma::Padma_vattu_RA;
$Matweb_toPadma[Matweb::Matweb_conj_TTRA]   = Padma::Padma_consnt_TTA  . Padma::Padma_vattu_RA;
$Matweb_toPadma[Matweb::Matweb_conj_DDRA]   = Padma::Padma_consnt_DDA .  Padma::Padma_vattu_RA;
$Matweb_toPadma[Matweb::Matweb_conj_VRA]   = Padma::Padma_consnt_VA .  Padma::Padma_vattu_RA;
$Matweb_toPadma[Matweb::Matweb_conj_JRA]   = Padma::Padma_consnt_JA  . Padma::Padma_vattu_RA;
$Matweb_toPadma[Matweb::Matweb_conj_GRA]   = Padma::Padma_consnt_GA .  Padma::Padma_vattu_RA;
$Matweb_toPadma[Matweb::Matweb_conj_PRA]   = Padma::Padma_consnt_PA .  Padma::Padma_vattu_RA;
$Matweb_toPadma[Matweb::Matweb_conj_HRA]   = Padma::Padma_consnt_HA  . Padma::Padma_vattu_RA;
$Matweb_toPadma[Matweb::Matweb_conj_PHRA]   = Padma::Padma_consnt_PHA .  Padma::Padma_vattu_RA;

//Miscellaneous(where it doesn't match ASCII representation)
$Matweb_toPadma[Matweb::Matweb_extra_QTSINGLE] = Matweb::Matweb_QTSINGLE;
$Matweb_toPadma[Matweb::Matweb_extra_ASTERISK] = '*';
$Matweb_toPadma[Matweb::Matweb_below_double] = '';//strip this character if used alone erroneousely

$Matweb_redundantList = array();
$Matweb_redundantList[Matweb::Matweb_misc_UNKNOWN_1] = true;

$Matweb_prefixList = array();
$Matweb_prefixList[Matweb::Matweb_vattu_RA]   = true;
$Matweb_prefixList[Matweb::Matweb_vowelsn_E]  = true;
$Matweb_prefixList[Matweb::Matweb_vowelsn_EE] = true;
$Matweb_prefixList[Matweb::Matweb_vowelsn_AI] = true;

$Matweb_overloadList = array();
$Matweb_overloadList[Matweb::Matweb_vowel_I]        = true;
$Matweb_overloadList[Matweb::Matweb_vowel_U]        = true;
$Matweb_overloadList[Matweb::Matweb_vowel_R]        = true;
$Matweb_overloadList[Matweb::Matweb_vowel_O]        = true;
$Matweb_overloadList[Matweb::Matweb_consnt_CA]        = true;
$Matweb_overloadList[Matweb::Matweb_consnt_VA]        = true;
$Matweb_overloadList[Matweb::Matweb_consnt_BA]        = true;
$Matweb_overloadList[Matweb::Matweb_consnt_YA]        = true;
$Matweb_overloadList[Matweb::Matweb_vowelsn_R]      = true;
$Matweb_overloadList[Matweb::Matweb_vowelsn_E]      = true;
$Matweb_overloadList[Matweb::Matweb_chillu_IN]      = true;

function Matweb_initialize()
{
    global $fontinfo;

    $fontinfo["matweb"]["language"] = "Malayalam";
    $fontinfo["matweb"]["class"] = "Matweb";
}

?>
