<?php
/* ***** BEGIN LICENSE BLOCK *****
 *
 *  This file is originally part of Padma.
 *
 *  Copyright (C) 2006 Nagarjuna Venna <vnagarjuna@yahoo.com>
 *  Copyright (C) 2006 Golam Mortuza Hossain <gmhossain@gmail.com> 
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

//Aabpbengalixx Bengali
class Aabpbengalixx
{
function Aabpbengalixx()
{
}

var $maxLookupLen = 1;
var $fontFace     = "Aabpbengalixx";
var $displayName  = "Aabpbengalixx";
var $script       =  Padma::Padma_script_BENGALI;
var $hasSuffixes  = true;

function lookup ($str) 
{
    global $Aabpbengalixx_toPadma;
    return $Aabpbengalixx_toPadma[$str];
}

function isPrefixSymbol ($str)
{
    return Aabpbengalix::isPrefixSymbol($str);
}

function isSuffixSymbol ($str)
{
    return Aabpbengalix::isSuffixSymbol($str);
}

function isOverloaded ($str)
{
    return Aabpbengalix::isOverloaded($str);
}

function handleTwoPartVowelSigns ($sign1, $sign2)
{
    return Aabpbengalix::handleTwoPartVowelSigns($sign1, $sign2);
}

function isRedundant ($str)
{
    return Aabpbengalix::isRedundant($str);
}


// Aabpnebgalixx map starts here 

const Aabpbengalixx_halffm_RA      = "\x27";
const Aabpbengalixx_conjct_SSPH_1  = "\x30"; 
const Aabpbengalixx_conjct_NTU     = "\x31"; 
const Aabpbengalixx_conjct_SHM     = "\x32"; 
//const Aabpbengalixx_conjct_SHCH    = "\x33"; 
const Aabpbengalixx_conjct_SHN     = "\x34"; 
const Aabpbengalixx_conjct_SHL     = "\x35"; 
const Aabpbengalixx_conjct_HNN_1   = "\x36"; 
const Aabpbengalixx_conjct_HL      = "\x37"; 
const Aabpbengalixx_conjct_HR      = "\x38"; 
const Aabpbengalixx_conjct_KSSM    = "\x39"; 
const Aabpbengalixx_conjct_NGA_KSS = "\x3A"; 
const Aabpbengalixx_conjct_CCHR    = "\x3B"; 
const Aabpbengalixx_conjct_JJH     = "\x3C"; 
const Aabpbengalixx_conjct_NYA_JH  = "\x3D"; 
const Aabpbengalixx_conjct_TTB     = "\x3E"; 
const Aabpbengalixx_conjct_NNDDH   = "\x3F"; 
const Aabpbengalixx_conjct_SPL     = "\x40"; 
const Aabpbengalixx_conjct_THB     = "\x41"; 
//Aabpbengalixx.conjct_RTI     = "\x42"; 
const Aabpbengalixx_conjct_DGH     = "\x43"; 
const Aabpbengalixx_conjct_SKH     = "\x44"; 
const Aabpbengalixx_conjct_KTR     = "\x45"; 
const Aabpbengalixx_conjct_KSSB    = "\x46"; 
const Aabpbengalixx_conjct_GHB     = "\x47"; 
const Aabpbengalixx_conjct_NGA_GHR = "\x48"; 
const Aabpbengalixx_conjct_TTM     = "\x49"; 
const Aabpbengalixx_conjct_DDM     = "\x4A"; 
const Aabpbengalixx_conjct_BHL     = "\x4B"; 
const Aabpbengalixx_combo_RUU      = "\x4C"; //combo
const Aabpbengalixx_conjct_BHB     = "\x4D"; 
const Aabpbengalixx_conjct_DDHR    = "\x4E"; 
const Aabpbengalixx_conjct_NGA_KR  = "\x4F"; 
const Aabpbengalixx_conjct_DG      = "\x50"; 
const Aabpbengalixx_conjct_LDD     = "\x51"; 
const Aabpbengalixx_conjct_MBHR    = "\x52"; 
const Aabpbengalixx_conjct_SPR     = "\x53"; 
const Aabpbengalixx_combo_RU       = "\x54"; //combo
const Aabpbengalixx_conjct_DHRUU   = "\x55"; 

//
const Aabpbengalixx_vowelsn_II_1   = "\x57";
const Aabpbengalixx_vowelsn_II_2   = "\x58";
const Aabpbengalixx_consnt_RRA     = "\x59";
const Aabpbengalixx_consnt_YYA     = "\x5A";
const Aabpbengalixx_consnt_RHA     = "\x5C";

const Aabpbengalixx_vowelsn_UU_1   = "\x6D";
const Aabpbengalixx_vowelsn_U_1    = "\x6E";
const Aabpbengalixx_vowelsn_R_1    = "\x6F";
const Aabpbengalixx_vowelsn_U_2    = "\x70";
const Aabpbengalixx_vowelsn_UU_2   = "\x71";
const Aabpbengalixx_vowelsn_R_2    = "\x72";
const Aabpbengalixx_vowelsn_UU_3   = "\x7B";
const Aabpbengalixx_vowelsn_U_3    = "\x7C";
const Aabpbengalixx_vowelsn_R_3    = "\x7D";
const Aabpbengalixx_vowelsn_U_4    = "\xC2\xAB";
const Aabpbengalixx_vowelsn_R_4    = "\xC2\xB8";
const Aabpbengalixx_vowelsn_U_5    = "\xC3\x80";
const Aabpbengalixx_vowelsn_U_6    = "\xC3\x81";
const Aabpbengalixx_vowelsn_U_7    = "\xC3\x82";
const Aabpbengalixx_vowelsn_UU_4   = "\xC3\x83";
const Aabpbengalixx_vowelsn_R_5    = "\xC3\x88";
const Aabpbengalixx_vowelsn_UU_5   = "\xC3\x8A";
const Aabpbengalixx_vowelsn_UU_6   = "\xC3\x8B";
const Aabpbengalixx_vowelsn_U_8    = "\xC3\x8C";
const Aabpbengalixx_vowelsn_U_9    = "\xC3\x8D";
const Aabpbengalixx_vowelsn_UU_7   = "\xC3\x8E";
const Aabpbengalixx_vowelsn_R_6    = "\xC3\x8F";
const Aabpbengalixx_vowelsn_R_7    = "\xC3\x92";
const Aabpbengalixx_vowelsn_UU_8   = "\xC3\x93";
const Aabpbengalixx_vowelsn_R_8    = "\xC3\x94";
const Aabpbengalixx_vowelsn_UU_9   = "\xC3\x95";
const Aabpbengalixx_vowelsn_R_9    = "\xC3\x99";
const Aabpbengalixx_vowelsn_U_10   = "\xC3\x9A";
const Aabpbengalixx_vowelsn_UU_10  = "\xC3\x9B";
//


const Aabpbengalixx_conjct_RRG     = "\x60"; 
const Aabpbengalixx_conjct_JNYA    = "\x61"; 
const Aabpbengalixx_conjct_NYA_J   = "\x62"; 
const Aabpbengalixx_conjct_TRU     = "\x63"; 
const Aabpbengalixx_conjct_NNDDR   = "\x64"; 
const Aabpbengalixx_conjct_DRU     = "\x65"; 
const Aabpbengalixx_conjct_HB      = "\x66"; 

const Aabpbengalixx_conjct_PN      = "\x73"; 
const Aabpbengalixx_conjct_TN      = "\x74"; 
const Aabpbengalixx_conjct_KTB     = "\x7A"; 

const Aabpbengalixx_conjct_SSPH_2  = "\xC3\x84"; 
const Aabpbengalixx_conjct_SHCH    = "\xC3\x87"; 
const Aabpbengalixx_visarga	= "\xC3\x86";

const Aabpbengalixx_conjct_HNN_2   = "\xC3\x89"; 

}

$Aabpbengalixx_toPadma = array();
//H
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_consnt_RRA]     = Padma::Padma_consnt_RRA;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_consnt_YYA]     = Padma::Padma_consnt_YYA;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_consnt_RHA]     = Padma::Padma_consnt_RHA;

$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_halffm_RA]      = Padma::Padma_halffm_RA;

$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_vowelsn_II_1]   = Padma::Padma_vowelsn_II;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_vowelsn_II_2]   = Padma::Padma_vowelsn_II;

$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_vowelsn_U_1]    = Padma::Padma_vowelsn_U;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_vowelsn_U_2]    = Padma::Padma_vowelsn_U;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_vowelsn_U_3]    = Padma::Padma_vowelsn_U;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_vowelsn_U_4]    = Padma::Padma_vowelsn_U;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_vowelsn_U_5]    = Padma::Padma_vowelsn_U;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_vowelsn_U_6]    = Padma::Padma_vowelsn_U;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_vowelsn_U_7]    = Padma::Padma_vowelsn_U;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_vowelsn_U_8]    = Padma::Padma_vowelsn_U;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_vowelsn_U_9]    = Padma::Padma_vowelsn_U;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_vowelsn_U_10]   = Padma::Padma_vowelsn_U;

$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_vowelsn_UU_1]   = Padma::Padma_vowelsn_UU;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_vowelsn_UU_2]   = Padma::Padma_vowelsn_UU;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_vowelsn_UU_3]   = Padma::Padma_vowelsn_UU;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_vowelsn_UU_4]   = Padma::Padma_vowelsn_UU;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_vowelsn_UU_5]   = Padma::Padma_vowelsn_UU;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_vowelsn_UU_6]   = Padma::Padma_vowelsn_UU;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_vowelsn_UU_7]   = Padma::Padma_vowelsn_UU;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_vowelsn_UU_8]   = Padma::Padma_vowelsn_UU;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_vowelsn_UU_9]   = Padma::Padma_vowelsn_UU;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_vowelsn_UU_10]  = Padma::Padma_vowelsn_UU;

$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_vowelsn_R_1]    = Padma::Padma_vowelsn_R;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_vowelsn_R_2]    = Padma::Padma_vowelsn_R;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_vowelsn_R_3]    = Padma::Padma_vowelsn_R;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_vowelsn_R_4]    = Padma::Padma_vowelsn_R;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_vowelsn_R_5]    = Padma::Padma_vowelsn_R;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_vowelsn_R_6]    = Padma::Padma_vowelsn_R;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_vowelsn_R_7]    = Padma::Padma_vowelsn_R;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_vowelsn_R_8]    = Padma::Padma_vowelsn_R;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_vowelsn_R_9]    = Padma::Padma_vowelsn_R;

$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_conjct_SSPH_1]  = Padma::Padma_consnt_SSA . Padma::Padma_vattu_PHA;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_conjct_SSPH_2]  = Padma::Padma_consnt_SSA . Padma::Padma_vattu_PHA;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_conjct_NTU]     = Padma::Padma_consnt_NA . Padma::Padma_vattu_TA . Padma::Padma_vowelsn_U;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_conjct_SHM]     = Padma::Padma_consnt_SHA . Padma::Padma_vattu_MA;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_conjct_SHCH]    = Padma::Padma_consnt_SHA . Padma::Padma_vattu_CHA;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_conjct_SHN]     = Padma::Padma_consnt_SHA . Padma::Padma_vattu_NA;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_conjct_SHL]     = Padma::Padma_consnt_SHA . Padma::Padma_vattu_LA;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_conjct_HNN_1]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_NNA;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_conjct_HNN_2]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_NNA;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_conjct_HL]      = Padma::Padma_consnt_HA . Padma::Padma_vattu_LA;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_conjct_HR]      = Padma::Padma_consnt_HA . Padma::Padma_vattu_RA;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_conjct_KSSM]    = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA . Padma::Padma_vattu_MA;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_conjct_NGA_KSS] = Padma::Padma_consnt_NGA . Padma::Padma_vattu_KA . Padma::Padma_vattu_SSA;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_conjct_CCHR]    = Padma::Padma_consnt_CA . Padma::Padma_vattu_CHA . Padma::Padma_vattu_RA;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_conjct_JJH]     = Padma::Padma_consnt_JA . Padma::Padma_vattu_JHA;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_conjct_NYA_JH]     = Padma::Padma_consnt_NYA . Padma::Padma_vattu_JHA;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_conjct_TTB]     = Padma::Padma_consnt_TTA . Padma::Padma_vattu_BA;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_conjct_NNDDH]     = Padma::Padma_consnt_NNA . Padma::Padma_vattu_DDHA;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_conjct_SPL]     = Padma::Padma_consnt_SA . Padma::Padma_vattu_PA . Padma::Padma_vattu_LA;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_conjct_THB]     = Padma::Padma_consnt_THA . Padma::Padma_vattu_BA;
//Aabpbengalixx.conjct_RTI     = "\x42"; 
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_conjct_DGH]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_GHA;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_conjct_SKH]     = Padma::Padma_consnt_SA . Padma::Padma_vattu_KHA;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_conjct_KTR]     = Padma::Padma_consnt_KA . Padma::Padma_vattu_TA . Padma::Padma_vattu_RA;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_conjct_KSSB]    = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA . Padma::Padma_vattu_BA;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_conjct_GHB]     = Padma::Padma_consnt_GHA . Padma::Padma_vattu_BA;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_conjct_NGA_GHR] = Padma::Padma_consnt_NGA . Padma::Padma_vattu_GHA . Padma::Padma_vattu_RA;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_conjct_TTM]     = Padma::Padma_consnt_TTA . Padma::Padma_vattu_MA;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_conjct_DDM]     = Padma::Padma_consnt_DDA . Padma::Padma_vattu_MA;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_conjct_BHL]     = Padma::Padma_consnt_BHA . Padma::Padma_vattu_LA;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_combo_RUU]      = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_UU;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_conjct_BHB]     = Padma::Padma_consnt_BHA . Padma::Padma_vattu_BA;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_conjct_DDHR]    = Padma::Padma_consnt_DDHA . Padma::Padma_vattu_RA;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_conjct_NGA_KR]  = Padma::Padma_consnt_NGA . Padma::Padma_vattu_KA . Padma::Padma_vattu_RA;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_conjct_DG]      = Padma::Padma_consnt_DA . Padma::Padma_vattu_GA;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_conjct_LDD]     = Padma::Padma_consnt_LA . Padma::Padma_vattu_DDA;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_conjct_MBHR]    = Padma::Padma_consnt_MA . Padma::Padma_vattu_BHA . Padma::Padma_vattu_RA;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_conjct_SPR]     = Padma::Padma_consnt_SA . Padma::Padma_vattu_PA . Padma::Padma_vattu_RA;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_combo_RU]       = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_U;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_conjct_DHRUU]   = Padma::Padma_consnt_DHA .  Padma::Padma_vattu_RA . Padma::Padma_vowelsn_UU;
// H

$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_conjct_RRG]    = Padma::Padma_consnt_RRA . Padma::Padma_vattu_GA;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_conjct_JNYA]    = Padma::Padma_consnt_JA . Padma::Padma_vattu_NYA;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_conjct_NYA_J]   = Padma::Padma_consnt_NYA . Padma::Padma_vattu_JA;

$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_conjct_TRU]     = Padma::Padma_consnt_TA . Padma::Padma_vattu_RA . Padma::Padma_vowelsn_U;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_conjct_DRU]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_RA . Padma::Padma_vowelsn_U;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_conjct_HB]      = Padma::Padma_consnt_HA . Padma::Padma_vattu_BA;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_conjct_PN]      = Padma::Padma_consnt_PA . Padma::Padma_vattu_NA;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_conjct_TN]      = Padma::Padma_consnt_TA . Padma::Padma_vattu_NA;
$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_conjct_KTB]     = Padma::Padma_consnt_KA . Padma::Padma_vattu_TA . Padma::Padma_vattu_BA;
//$Aabpbengalixx_toPadma[Aabpbengalixx::Aabpbengalixx_conjct_SHCH]    = Padma::Padma_consnt_SHA . Padma::Padma_vattu_CHA;

function Aabpbengalixx_initialize()
{
    global $fontinfo;

    $fontinfo["aabpbengalixx"]["language"] = "Bengali";
    $fontinfo["aabpbengalixx"]["class"] = "Aabpbengalixx";
}

?>
