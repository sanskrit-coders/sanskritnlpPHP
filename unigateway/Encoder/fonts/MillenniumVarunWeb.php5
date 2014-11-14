<?php
/* ***** BEGIN LICENSE BLOCK *****
 *
 *  Copyright (C) 2009 Harshita Vani <harshita@atc.tcs.com>
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

//MillenniumVarunWeb Devanagari
class MillenniumVarunWeb
{
function MillenniumVarunWeb()
{
}

//The interface every dynamic font encoding should implement
var $maxLookupLen = 4;
var $fontFace     = "MillenniumVarunWeb";
var $displayName  = "MillenniumVarunWeb";
var $script       = Padma::Padma_script_DEVANAGARI;
var $hasSuffixes  = true;

function lookup ($str)
{
  global $MillenniumVarunWeb_toPadma;
   if(array_key_exists($str,$MillenniumVarunWeb_toPadma))
    return $MillenniumVarunWeb_toPadma[$str];
   return false;
}

function isPrefixSymbol ($str)
{
    global $MillenniumVarunWeb_prefixList;
    return array_key_exists($str,$MillenniumVarunWeb_prefixList);
}

function isSuffixSymbol ($str)
{
    global $MillenniumVarunWeb_suffixList;
    return array_key_exists($str,$MillenniumVarunWeb_suffixList);
}

function isOverloaded ($str)
{
    global $MillenniumVarunWeb_overloadList;
    return array_key_exists($str,$MillenniumVarunWeb_overloadList);
}

function handleTwoPartVowelSigns ($sign1, $sign2)
{
  /*  if (($sign1 == Padma::Padma_vowelsn_EE && $sign2 == Padma::Padma_vowelsn_AA) ||
        ($sign1 == Padma::Padma_vowelsn_AA && $sign2 == Padma::Padma_vowelsn_EE))
    return Padma::Padma_vowelsn_OO;*/
    if (($sign1 == Padma::Padma_vowelsn_CDR_E && $sign2 == Padma::Padma_vowelsn_AA) ||
        ($sign1 == Padma::Padma_vowelsn_AA && $sign2 == Padma::Padma_vowelsn_CDR_E))
    return Padma::Padma_vowelsn_CDR_O;
/*    if (($sign1 == Padma::Padma_vowelsn_AI && $sign2 == Padma::Padma_vowelsn_AA) ||
        ($sign1 == Padma::Padma_vowelsn_AA && $sign2 == Padma::Padma_vowelsn_AI))
        return Padma::Padma_vowelsn_AU;*/
    return $sign1 . $sign2;
}

function isRedundant ($str)
{
    return false;
    //global $MillenniumVarunWeb_redundantList;
    //return array_key_exists($str,$MillenniumVarunWeb_redundantList);
}


//Implementation details start here
//TODO:00D5,00D9,00F4,0192,02C6,02DC,2013,2014,201A,201E,2020,2021,2022,2026,007C
//Verify: 2018,2019,201C,201D,2022,2039,203A,2122

//Specials
const MillenniumVarunWeb_avagraha       = "\x65";
const MillenniumVarunWeb_anusvara       = "\x62";
const MillenniumVarunWeb_candrabindu    = "\x42";
const MillenniumVarunWeb_virama         = "\x64";
//const MillenniumVarunWeb_visarga        = "\x3A";

//Vowels
const MillenniumVarunWeb_vowel_A        = "\x44\xC3\xA7";
const MillenniumVarunWeb_vowel_AA       = "\x44\xC3\xA7\xC3\xA7";
const MillenniumVarunWeb_vowel_I        = "\x46";
const MillenniumVarunWeb_vowel_II       = "\x46\x26";
const MillenniumVarunWeb_vowel_U        = "\x47";
const MillenniumVarunWeb_vowel_UU       = "\x54";
const MillenniumVarunWeb_vowel_R        = "\x24\xC3\xA7\x2B";
const MillenniumVarunWeb_vowel_EE       = "\x53";
const MillenniumVarunWeb_vowel_AI       = "\x53\xC3\xAD";
const MillenniumVarunWeb_vowel_OO       = "\x44\xC3\xA7\xC3\xB2";
const MillenniumVarunWeb_vowel_AU_1     = "\x44\xC3\xA7\xC3\xB3";
const MillenniumVarunWeb_vowel_AU_2     = "\x44\xC3\xA7\xC3\xA7\xC3\x8C";

//Consonants
const MillenniumVarunWeb_consnt_KA_1    = "\x4A\xC3\xA7\xC3\x80";
const MillenniumVarunWeb_consnt_KA_2    = "\x6B\xC3\xA7\xC3\x80";
const MillenniumVarunWeb_consnt_KHA     = "\x4B\xC3\xA7";
const MillenniumVarunWeb_consnt_GA      = "\x69\xC3\xA7";
const MillenniumVarunWeb_consnt_GHA     = "\x49\xC3\xA7";
const MillenniumVarunWeb_consnt_NGA     = "\x2A";

const MillenniumVarunWeb_consnt_CA      = "\xC2\xAE\xC3\xA7";
const MillenniumVarunWeb_consnt_CHA     = "\x73";
const MillenniumVarunWeb_consnt_JA      = "\x70\xC3\xA7";
const MillenniumVarunWeb_consnt_JHA     = "\x50\xC3\xA7";

const MillenniumVarunWeb_consnt_TTA     = "\xC3\xAC";
const MillenniumVarunWeb_consnt_TTHA_1  = "\x22";
const MillenniumVarunWeb_consnt_TTHA_2  = "\xC3\xBE";
const MillenniumVarunWeb_consnt_DDA     = "\x5B";
const MillenniumVarunWeb_consnt_DDDHA   = "\xE2\x80\xBA";
const MillenniumVarunWeb_consnt_DDHA    = "\x7B";
const MillenniumVarunWeb_consnt_NNA     = "\x43\xC3\xA7";

const MillenniumVarunWeb_consnt_TA      = "\x6C\xC3\xA7";
const MillenniumVarunWeb_consnt_THA     = "\x4C\xC3\xA7";
const MillenniumVarunWeb_consnt_DA      = "\x6F";
const MillenniumVarunWeb_consnt_DHA     = "\x4F\xC3\xA7";
const MillenniumVarunWeb_consnt_NA      = "\x76\xC3\xA7";

const MillenniumVarunWeb_consnt_PA_1    = "\x48\xC3\xA7";
const MillenniumVarunWeb_consnt_PA_2    = "\x68\xC3\xA7";
const MillenniumVarunWeb_consnt_PHA     = "\x48\xC3\xA7\xC3\x80";
const MillenniumVarunWeb_consnt_BA      = "\x79\xC3\xA7";
const MillenniumVarunWeb_consnt_BHA     = "\x59\xC3\xA7";
const MillenniumVarunWeb_consnt_MA      = "\x63\xC3\xA7";

const MillenniumVarunWeb_consnt_YA_1    = "\xC2\xAD\xC3\xA7";
const MillenniumVarunWeb_consnt_YA_2    = "\xC2\xB3\xC3\xA7";
const MillenniumVarunWeb_consnt_YA_3    = "\xC3\xAE\xC3\xA7";
const MillenniumVarunWeb_consnt_RA      = "\x6A";
const MillenniumVarunWeb_consnt_LA_1    = "\x7D";
const MillenniumVarunWeb_consnt_LA_2    = "\x75\xC3\xA7";
const MillenniumVarunWeb_consnt_VA_1    = "\x4A\xC3\xA7";
const MillenniumVarunWeb_consnt_VA_2    = "\x6B\xC3\xA7";
const MillenniumVarunWeb_consnt_SHA_1   = "\x4D\xC3\xA7";
const MillenniumVarunWeb_consnt_SHA_2   = "\xC2\xB5\xC3\xA7";

const MillenniumVarunWeb_consnt_SSA_1   = "\x3C\xC3\xA7";
const MillenniumVarunWeb_consnt_SSA_2   = "\xC3\xB8\xC3\xA7";
const MillenniumVarunWeb_consnt_SA      = "\x6D\xC3\xA7";
const MillenniumVarunWeb_consnt_HA      = "\x6E";
const MillenniumVarunWeb_consnt_LLA     = "\x55";
const MillenniumVarunWeb_consnt_LLLA    = "\x5D\x55";

//Gunintamulu
const MillenniumVarunWeb_vowelsn_AA     = "\xC3\xA7";
const MillenniumVarunWeb_vowelsn_I_1    = "\xC3\xA7\x71";
const MillenniumVarunWeb_vowelsn_I_2    = "\xC3\xA7\xC3\x86";
const MillenniumVarunWeb_vowelsn_II_1   = "\xC3\xA7\xC3\x87";
const MillenniumVarunWeb_vowelsn_II_2   = "\xC2\xBE";
const MillenniumVarunWeb_vowelsn_U_1    = "\xC2\xA7";
const MillenniumVarunWeb_vowelsn_U_2    = "\xC3\xA1";
const MillenniumVarunWeb_vowelsn_U_3    = "\xE2\x80\xB0";
const MillenniumVarunWeb_vowelsn_UU_1   = "\xC3\x93";
const MillenniumVarunWeb_vowelsn_UU_2   = "\xC3\xA8";
const MillenniumVarunWeb_vowelsn_R_1    = "\x3D";
const MillenniumVarunWeb_vowelsn_R_2    = "\xC3\x89";
const MillenniumVarunWeb_vowelsn_R_3    = "\xC3\xA3";
const MillenniumVarunWeb_vowelsn_CDR_E  = "\x40";
const MillenniumVarunWeb_vowelsn_EE     = "\xC3\xAD";
const MillenniumVarunWeb_vowelsn_AI_1   = "\xC3\x8C";
const MillenniumVarunWeb_vowelsn_AI_2   = "\xC3\xAD\xC3\xAD";
const MillenniumVarunWeb_vowelsn_OO_1   = "\xC3\xA7\xC3\xAD";
const MillenniumVarunWeb_vowelsn_OO_2   = "\xC3\xB2";
const MillenniumVarunWeb_vowelsn_AU     = "\xC3\xB3";

//Matra . anusvara
const MillenniumVarunWeb_vowelsn_IIM    = "\xC3\x84";
const MillenniumVarunWeb_vowelsn_EEM    = "\x57";
const MillenniumVarunWeb_vowelsn_IM     = "\xC3\xA7\x45";
const MillenniumVarunWeb_vowelsn_AUM    = "\xE2\x80\xA6";
const MillenniumVarunWeb_vowelsn_OM     = "\xE2\x80\x9A";
const MillenniumVarunWeb_vowelsn_ER     = "\xC6\x92";
const MillenniumVarunWeb_vowelsn_AIR    = "\x7A";
const MillenniumVarunWeb_vowelsn_RIIM   = "\xC3\x95";

//Half Forms
const MillenniumVarunWeb_halffm_KA_1    = "\x4A\xC3\xA7\x77";
const MillenniumVarunWeb_halffm_KA_2    = "\x6B\xC3\xA7\x77";
const MillenniumVarunWeb_halffm_KR_1    = "\xC2\xAC\xC3\xA7\x77";
const MillenniumVarunWeb_halffm_KR_2    = "\xC2\xAF\xC3\xA7\x77";
const MillenniumVarunWeb_halffm_KHA     = "\x4B";
const MillenniumVarunWeb_halffm_KHHA    = "\xE2\x84\xA2";
const MillenniumVarunWeb_halffm_KHR     = "\xC2\xB8";
const MillenniumVarunWeb_halffm_GA      = "\x69";
const MillenniumVarunWeb_halffm_GR      = "\xC3\xBB";
const MillenniumVarunWeb_halffm_GHHA    = "\xC5\x93";
const MillenniumVarunWeb_halffm_GHA     = "\x49";
const MillenniumVarunWeb_halffm_NYA     = "\x5F";
const MillenniumVarunWeb_halffm_NYC     = "\x67";
const MillenniumVarunWeb_halffm_NYJ     = "\xC2\xA1";
const MillenniumVarunWeb_halffm_CA      = "\xC2\xAE";
const MillenniumVarunWeb_halffm_JA      = "\x70";
const MillenniumVarunWeb_halffm_JR_1    = "\xC3\xBC";
const MillenniumVarunWeb_halffm_JR_2    = "\xC3\xBD";
const MillenniumVarunWeb_halffm_JNY     = "\x25";
const MillenniumVarunWeb_halffm_JHA     = "\x50";
const MillenniumVarunWeb_halffm_NNA     = "\x43";
const MillenniumVarunWeb_halffm_TA      = "\x6C";
const MillenniumVarunWeb_halffm_TT      = "\xC3\x8A";
const MillenniumVarunWeb_halffm_TR      = "\x24";
const MillenniumVarunWeb_halffm_THA     = "\x4C";
const MillenniumVarunWeb_halffm_DY      = "\xC3\x90";
const MillenniumVarunWeb_halffm_DHA     = "\x4F";
const MillenniumVarunWeb_halffm_NA      = "\x76";
const MillenniumVarunWeb_halffm_NN      = "\x56";
const MillenniumVarunWeb_halffm_PA_1    = "\x48";
const MillenniumVarunWeb_halffm_PA_2    = "\x68";
const MillenniumVarunWeb_halffm_PR_1    = "\xC3\x92";
const MillenniumVarunWeb_halffm_PR_2    = "\xC3\x96";
const MillenniumVarunWeb_halffm_PHA     = "\x48\xC3\xA7\x77";
const MillenniumVarunWeb_halffm_BA      = "\x79";
const MillenniumVarunWeb_halffm_BHA     = "\x59";
const MillenniumVarunWeb_halffm_MA      = "\x63";
const MillenniumVarunWeb_halffm_YA_1    = "\xC2\xAD";
const MillenniumVarunWeb_halffm_YA_2    = "\xC2\xB3";
const MillenniumVarunWeb_halffm_YA_3    = "\xC3\xAE";
const MillenniumVarunWeb_halffm_RA      = "\x26";
const MillenniumVarunWeb_halffm_LA      = "\x75";
const MillenniumVarunWeb_halffm_VA_1    = "\x4A";
const MillenniumVarunWeb_halffm_VA_2    = "\x6B";
const MillenniumVarunWeb_halffm_VR_1    = "\xC2\xAC";
const MillenniumVarunWeb_halffm_VR_2    = "\xC2\xAF";
const MillenniumVarunWeb_halffm_VN      = "\xC3\x98";
const MillenniumVarunWeb_halffm_SHA_1   = "\x4D";
const MillenniumVarunWeb_halffm_SHA_2   = "\xC2\xB5";
const MillenniumVarunWeb_halffm_SHA_3   = "\xC3\x8D";
const MillenniumVarunWeb_halffm_SHR_1   = "\xC3\x8D\xC2\xB4";
const MillenniumVarunWeb_halffm_SHR_2   = "\xC3\x9E";
const MillenniumVarunWeb_halffm_SSA_1   = "\x3C";
const MillenniumVarunWeb_halffm_SSA_2   = "\xC3\xB8";
const MillenniumVarunWeb_halffm_SA      = "\x6D";
const MillenniumVarunWeb_halffm_SR      = "\xC3\xB1";
const MillenniumVarunWeb_halffm_HA      = "\xC3\x94";
const MillenniumVarunWeb_halffm_LLA     = "\xC3\x88";
const MillenniumVarunWeb_halffm_RRA     = "\x4E";
const MillenniumVarunWeb_halffm_KSH     = "\x23";


//Conjuncts
const MillenniumVarunWeb_conjct_KT      = "\xC3\x8A\xC3\xA7\xC3\x80";//Check
const MillenniumVarunWeb_conjct_KR_1    = "\xC2\xAC\xC3\xA7\xC3\x80";
const MillenniumVarunWeb_conjct_KR_2    = "\xC2\xAF\xC3\xA7\xC3\x80";
const MillenniumVarunWeb_conjct_KHR     = "\xC2\xB8\xC3\xA7";
const MillenniumVarunWeb_conjct_KRU     = "\xC2\xAC\xE2\x80\xB0\xC3\x80";
const MillenniumVarunWeb_conjct_VRU     = "\xC2\xAC\xE2\x80\xB0";
const MillenniumVarunWeb_conjct_SHRU    = "\xC3\x9E\xE2\x80\xB0";
const MillenniumVarunWeb_conjct_KSH     = "\x23\xC3\xA7";
const MillenniumVarunWeb_conjct_GR      = "\xC3\xBB\xC3\xA7";
const MillenniumVarunWeb_conjct_JNY     = "\x25\xC3\xA7";
const MillenniumVarunWeb_conjct_JNYE    = "\x25\xC3\xB2";
const MillenniumVarunWeb_conjct_TTTT    = "\x66";
const MillenniumVarunWeb_conjct_TT_TTH  = "\xC3\xB9";
const MillenniumVarunWeb_conjct_TTHTTH  = "\x72";
const MillenniumVarunWeb_conjct_DDDD_1  = "\xC2\xB7";
const MillenniumVarunWeb_conjct_DDDD_2  = "\xC2\xBA";
const MillenniumVarunWeb_conjct_DD_DDH  = "\xC3\xBA";
const MillenniumVarunWeb_conjct_DDHDDH  = "\xC2\xB6";
const MillenniumVarunWeb_conjct_TT      = "\xC3\x8A\xC3\xA7";
const MillenniumVarunWeb_conjct_TR      = "\x24\xC3\xA7";
const MillenniumVarunWeb_conjct_TREE    = "\x24\xC3\xB2";
const MillenniumVarunWeb_conjct_DG      = "\xC3\x83";
const MillenniumVarunWeb_conjct_DD      = "\xC3\x8E";
const MillenniumVarunWeb_conjct_D_DH_1  = "\xC3\x97";
const MillenniumVarunWeb_conjct_D_DH_2  = "\xC3\xA0";
const MillenniumVarunWeb_conjct_DB      = "\xC3\x82";
const MillenniumVarunWeb_conjct_DBH     = "\x74";
const MillenniumVarunWeb_conjct_DM      = "\xC2\xA8\xC3\xA7";
const MillenniumVarunWeb_conjct_DY      = "\xC3\x90\xC3\xA7";
const MillenniumVarunWeb_conjct_DYU     = "\xC3\x90\xE2\x80\xB0";
const MillenniumVarunWeb_conjct_TRU     = "\x24\xE2\x80\xB0";
const MillenniumVarunWeb_conjct_HYU     = "\xC2\xBF\xE2\x80\xB0";
const MillenniumVarunWeb_conjct_DV      = "\xC3\x9C";
const MillenniumVarunWeb_conjct_DR      = "\xC3\xAA";
const MillenniumVarunWeb_conjct_NN      = "\x56\xC3\xA7";
const MillenniumVarunWeb_conjct_PR_1    = "\x48\xC3\xA7\x26";
const MillenniumVarunWeb_conjct_PR_2    = "\xC3\x92\xC3\xA7";
const MillenniumVarunWeb_conjct_PR_3    = "\xC3\x96\xC3\xA7";
const MillenniumVarunWeb_conjct_RPE     = "\x48\xC6\x92";
const MillenniumVarunWeb_conjct_RGE     = "\x69\xC6\x92";
const MillenniumVarunWeb_conjct_RSSE    = "\xC3\xB8\xC6\x92";
const MillenniumVarunWeb_conjct_SR      = "\xC3\xB1\xC3\xA7";
const MillenniumVarunWeb_conjct_SRE     = "\x6D\xC6\x92";
const MillenniumVarunWeb_conjct_PHR_1   = "\x48\xC3\xA7\x26\xC3\x80";
const MillenniumVarunWeb_conjct_PHR_2   = "\xC3\x96\xC3\xA7\xC3\x80";
const MillenniumVarunWeb_conjct_VR_1    = "\x6B\xC3\xA7\x26";
const MillenniumVarunWeb_conjct_VR_2    = "\xC2\xAC\xC3\xA7";
const MillenniumVarunWeb_conjct_VR_3    = "\xC2\xAF\xC3\xA7";
const MillenniumVarunWeb_conjct_VN      = "\xC3\x98\xC3\xA7";
const MillenniumVarunWeb_conjct_SHR     = "\xC3\x9E\xC3\xA7";
const MillenniumVarunWeb_conjct_KRE     = "\xC2\xAC\xC3\xB2\xC3\x80";
const MillenniumVarunWeb_conjct_GRE     = "\xC3\xBB\xC3\xB2";
const MillenniumVarunWeb_conjct_VRE     = "\xC2\xAC\xC3\xB2";
const MillenniumVarunWeb_conjct_PRE_1   = "\xC3\x92\xC3\xB2";
const MillenniumVarunWeb_conjct_PRE_2   = "\xC3\x96\xC3\xB2";
const MillenniumVarunWeb_conjct_PHRE_1  = "\xC3\x92\xC3\xB2\xC3\x80";
const MillenniumVarunWeb_conjct_PHRE_2  = "\xC3\x96\xC3\xB2\xC3\x80";
const MillenniumVarunWeb_conjct_SHRE    = "\xC3\x9E\xC3\xB2";
const MillenniumVarunWeb_conjct_DHRE    = "\x4F\xC6\x92";
const MillenniumVarunWeb_conjct_SHV     = "\xC3\xA9\xC3\xA7";
const MillenniumVarunWeb_conjct_SSTT    = "\xC3\xA4";
const MillenniumVarunWeb_conjct_SSTTH_1 = "\xC3\xB7";
const MillenniumVarunWeb_conjct_SSTTH_2 = "\xC3\xBF";
const MillenniumVarunWeb_conjct_HNN     = "\xE2\x80\x9D";
const MillenniumVarunWeb_conjct_HL      = "\xC2\xBC";
const MillenniumVarunWeb_conjct_HV      = "\xC2\xBB";
const MillenniumVarunWeb_conjct_HYA     = "\xC2\xBF\xC3\xA7";
const MillenniumVarunWeb_conjct_HMA     = "\xC3\xAF\xC3\xA7";
const MillenniumVarunWeb_conjct_RK      = "\x6B\xC3\xA7\x26\xC3\x80";

//Combos
const MillenniumVarunWeb_combo_HR       = "\xC3\x8B";
const MillenniumVarunWeb_combo_K_CDR_E  = "\x6B\xC3\xA7\x40\xC3\x80";
const MillenniumVarunWeb_combo_P_CDR_E  = "\x48\xC3\xA7\x40";
const MillenniumVarunWeb_combo_PH_CDR_E = "\x48\xC3\xA7\x40\xC3\x80";
const MillenniumVarunWeb_combo_V_CDR_E  = "\x6B\xC3\xA7\x40";


const MillenniumVarunWeb_combo_KHAI     = "\x4B\xC3\xB3";
const MillenniumVarunWeb_combo_GAI      = "\x69\xC3\xB3";
const MillenniumVarunWeb_combo_PAI      = "\x48\xC3\xB3";
const MillenniumVarunWeb_combo_PHAI     = "\x48\xC3\xB3\xC3\x80";
const MillenniumVarunWeb_combo_MAI      = "\x63\xC3\xB3";
const MillenniumVarunWeb_combo_JAI      = "\x70\xC3\xB3";
const MillenniumVarunWeb_combo_SAI      = "\x6D\xC3\xB3";
const MillenniumVarunWeb_combo_LAI      = "\x75\xC3\xB3";
const MillenniumVarunWeb_combo_NAI      = "\x76\xC3\xB3";
const MillenniumVarunWeb_combo_BAI      = "\x79\xC3\xB3";
const MillenniumVarunWeb_combo_VAI      = "\x4A\xC3\xB3";
const MillenniumVarunWeb_combo_SHAI     = "\x4D\xC3\xB3";
const MillenniumVarunWeb_combo_DHAI     = "\x4F\xC3\xB3";

const MillenniumVarunWeb_combo_VE_1     = "\x6B\xC3\xA7\xC3\xAD";
const MillenniumVarunWeb_combo_VE_2     = "\x6B\xC3\xB2";
const MillenniumVarunWeb_combo_VE_3     = "\x4A\xC3\xB2";
const MillenniumVarunWeb_combo_KE_1     = "\x6B\xC3\xA7\xC3\xAD\xC3\x80";
const MillenniumVarunWeb_combo_KE_2     = "\x6B\xC3\xB2\xC3\x80";
const MillenniumVarunWeb_combo_KHE      = "\x4B\xC3\xB2";
const MillenniumVarunWeb_combo_DHYE     = "\x4F\xC2\xB3\xC3\xB2";
const MillenniumVarunWeb_combo_NNE      = "\x43\xC3\xB2";
const MillenniumVarunWeb_combo_GE       = "\x69\xC3\xB2";
const MillenniumVarunWeb_combo_GHE      = "\x49\xC3\xB2";
const MillenniumVarunWeb_combo_CE       = "\xC2\xAE\xC3\xB2";
const MillenniumVarunWeb_combo_JE       = "\x70\xC3\xB2";
const MillenniumVarunWeb_combo_TE       = "\x6C\xC3\xB2";
const MillenniumVarunWeb_combo_THE      = "\x4C\xC3\xB2";
const MillenniumVarunWeb_combo_DHE      = "\x4F\xC3\xB2";
const MillenniumVarunWeb_combo_NE       = "\x76\xC3\xB2";
const MillenniumVarunWeb_combo_PE_1     = "\x48\xC3\xB2";
const MillenniumVarunWeb_combo_PE_2     = "\x48\xC3\xA7\xC3\xAD";
const MillenniumVarunWeb_combo_PHE_1    = "\x48\xC3\xB2\xC3\x80";
const MillenniumVarunWeb_combo_PHE_2    = "\x48\xC3\xA7\xC3\xAD\xC3\x80";
const MillenniumVarunWeb_combo_BE       = "\x79\xC3\xB2";
const MillenniumVarunWeb_combo_BHE      = "\x59\xC3\xB2";
const MillenniumVarunWeb_combo_ME_1     = "\x63\xC3\xB2";
const MillenniumVarunWeb_combo_ME_2     = "\x63\xE2\x80\x9A";
const MillenniumVarunWeb_combo_YE       = "\xC2\xB3\xC3\xB2";
const MillenniumVarunWeb_combo_LE       = "\x75\xC3\xB2";
const MillenniumVarunWeb_combo_SE       = "\x6D\xC3\xB2";
const MillenniumVarunWeb_combo_SSE_1    = "\x3C\xC3\xB2";
const MillenniumVarunWeb_combo_SSE_2    = "\xC3\xB8\xC3\xB2";
const MillenniumVarunWeb_combo_SHE      = "\x4D\xC3\xB2";
const MillenniumVarunWeb_combo_KSHE     = "\x23\xC3\xB2";

const MillenniumVarunWeb_combo_GU       = "\x69\xE2\x80\xB0";
const MillenniumVarunWeb_combo_GHU      = "\x49\xE2\x80\xB0";
const MillenniumVarunWeb_combo_CU       = "\xC2\xAE\xE2\x80\xB0";
const MillenniumVarunWeb_combo_JU       = "\x70\xE2\x80\xB0";
const MillenniumVarunWeb_combo_NU       = "\x76\xE2\x80\xB0";
const MillenniumVarunWeb_combo_NNU      = "\x43\xE2\x80\xB0";
const MillenniumVarunWeb_combo_PU       = "\x48\xE2\x80\xB0";
const MillenniumVarunWeb_combo_PHU      = "\x48\xE2\x80\xB0\xC3\x80";
const MillenniumVarunWeb_combo_BU       = "\x79\xE2\x80\xB0";
const MillenniumVarunWeb_combo_BHU      = "\x59\xE2\x80\xB0";
const MillenniumVarunWeb_combo_RU       = "\xC2\xA9";
const MillenniumVarunWeb_combo_LU       = "\x75\xE2\x80\xB0";
const MillenniumVarunWeb_combo_TU       = "\x6C\xE2\x80\xB0";
const MillenniumVarunWeb_combo_MU       = "\x63\xE2\x80\xB0";
const MillenniumVarunWeb_combo_SU       = "\x6D\xE2\x80\xB0";
const MillenniumVarunWeb_combo_YU       = "\xC2\xB3\xE2\x80\xB0";
const MillenniumVarunWeb_combo_SHU      = "\x4D\xE2\x80\xB0";
const MillenniumVarunWeb_combo_DHU      = "\x4F\xE2\x80\xB0";
const MillenniumVarunWeb_combo_VU       = "\x6B\xE2\x80\xB0";
const MillenniumVarunWeb_combo_KU       = "\x6B\xE2\x80\xB0\xC3\x80";
const MillenniumVarunWeb_combo_KHU      = "\x4B\xE2\x80\xB0";

const MillenniumVarunWeb_combo_KRU      = "\x6B\xC3\xA7\x3D\xC3\x80";
const MillenniumVarunWeb_combo_DRU      = "\xC2\xA2";
const MillenniumVarunWeb_combo_VRU      = "\x6B\xC3\xA7\x3D";
const MillenniumVarunWeb_combo_MRU      = "\x63\xC3\xA7\xC3\x89";

const MillenniumVarunWeb_combo_KUU      = "\x6B\xC3\xA7\xC3\x93\xC3\x80";
const MillenniumVarunWeb_combo_VUU      = "\x6B\xC3\xA7\xC3\x93";
const MillenniumVarunWeb_combo_RUU      = "\xC2\xAA";
const MillenniumVarunWeb_combo_PUU      = "\x48\xC3\xA7\xC3\x93";
const MillenniumVarunWeb_combo_PHUU     = "\x48\xC3\xA7\xC3\x93\xC3\x80";

const MillenniumVarunWeb_combo_KEM      = "\x6B\xC3\xB2\x62\xC3\x80";
const MillenniumVarunWeb_combo_VEM      = "\x6B\xC3\xB2\x62";
const MillenniumVarunWeb_combo_CEEM     = "\xC2\xAE\xE2\x80\x9A";
const MillenniumVarunWeb_combo_NNEM     = "\x43\xE2\x80\x9A";
const MillenniumVarunWeb_combo_PEM      = "\x48\xE2\x80\x9A";

const MillenniumVarunWeb_combo_KAM      = "\x6B\xC3\xA7\x62\xC3\x80";
const MillenniumVarunWeb_combo_VAM      = "\x6B\xC3\xA7\x62";

//Half forms of RA
const MillenniumVarunWeb_halffm_RII     = "\xC3\x91";
const MillenniumVarunWeb_halffm_REE     = "\x78";
const MillenniumVarunWeb_halffm_RA_ANU  = "\xC2\xA5";

//rakar
const MillenniumVarunWeb_vattu_RA_1     = "\xC3\x8F";
const MillenniumVarunWeb_vattu_RA_2     = "\xC2\xA3";
const MillenniumVarunWeb_vattu_RA_3     = "\xC2\xB4";
const MillenniumVarunWeb_vattu_RA_4     = "\x5E";
const MillenniumVarunWeb_vattu_LA       = "\xC3\x81";

const MillenniumVarunWeb_misc_OM        = "\xC3\x9F";

//Matches ASCII
const MillenniumVarunWeb_EXCLAM         = "\x21";
const MillenniumVarunWeb_PAREN_LEFT     = "\x28";
const MillenniumVarunWeb_PAREN_RIGHT    = "\x29";
const MillenniumVarunWeb_COMMA          = "\x2C";
const MillenniumVarunWeb_HYPHEN         = "\x2D";
const MillenniumVarunWeb_PERIOD         = "\x2E";
const MillenniumVarunWeb_SLASH          = "\x2F";
const MillenniumVarunWeb_SEMICOLON      = "\x3B";
const MillenniumVarunWeb_QUESTION       = "\x3F";

//Does not match ASCII
//Devanagari Digits
const MillenniumVarunWeb_digit_ZERO_DE  = "\x30";
const MillenniumVarunWeb_digit_ONE_DE   = "\x31";
const MillenniumVarunWeb_digit_TWO_DE   = "\x32";
const MillenniumVarunWeb_digit_THREE_DE = "\x33";
const MillenniumVarunWeb_digit_FOUR_DE  = "\x34";
const MillenniumVarunWeb_digit_FIVE_DE  = "\x35";
const MillenniumVarunWeb_digit_SIX_DE   = "\x36";
const MillenniumVarunWeb_digit_SEVEN_DE = "\x37";
const MillenniumVarunWeb_digit_EIGHT_DE = "\x38";
const MillenniumVarunWeb_digit_NINE_DE  = "\x39";

//Digits
const MillenniumVarunWeb_digit_TWO      = "\xC5\xA0";
const MillenniumVarunWeb_digit_FOUR     = "\xC5\x92";
const MillenniumVarunWeb_digit_NINE     = "\xE2\x80\x98";

const MillenniumVarunWeb_PLUS           = "\xC4\xA9";//TODO
const MillenniumVarunWeb_LQTDOUBLE      = "\xE2\x80\x99";
const MillenniumVarunWeb_RQTDOUBLE      = "\xE2\x80\x9C";

}


$MillenniumVarunWeb_toPadma = array();
//Specials
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_avagraha]    = Padma::Padma_avagraha;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_anusvara]    = Padma::Padma_anusvara;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_candrabindu] = Padma::Padma_candrabindu;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_virama]      = Padma::Padma_syllbreak;
//$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_visarga]     = Padma::Padma_visarga;

//Vowels
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_vowel_A]    = Padma::Padma_vowel_A;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_vowel_AA]   = Padma::Padma_vowel_AA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_vowel_I]    = Padma::Padma_vowel_I;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_vowel_II]   = Padma::Padma_vowel_II;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_vowel_U]    = Padma::Padma_vowel_U;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_vowel_UU]   = Padma::Padma_vowel_UU;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_vowel_R]    = Padma::Padma_vowel_R;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_vowel_EE]   = Padma::Padma_vowel_EE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_vowel_AI]   = Padma::Padma_vowel_AI;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_vowel_OO]   = Padma::Padma_vowel_OO;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_vowel_AU_1] = Padma::Padma_vowel_AU;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_vowel_AU_2] = Padma::Padma_vowel_AU;

//consonants
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_consnt_KA_1]   = Padma::Padma_consnt_KA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_consnt_KA_2]   = Padma::Padma_consnt_KA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_consnt_KHA]    = Padma::Padma_consnt_KHA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_consnt_GA]     = Padma::Padma_consnt_GA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_consnt_GHA]    = Padma::Padma_consnt_GHA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_consnt_NGA]    = Padma::Padma_consnt_NGA;

$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_consnt_CA]     = Padma::Padma_consnt_CA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_consnt_CHA]    = Padma::Padma_consnt_CHA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_consnt_JA]     = Padma::Padma_consnt_JA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_consnt_JHA]    = Padma::Padma_consnt_JHA;

$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_consnt_TTA]    = Padma::Padma_consnt_TTA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_consnt_TTHA_1] = Padma::Padma_consnt_TTHA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_consnt_TTHA_2] = Padma::Padma_consnt_TTHA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_consnt_DDA]    = Padma::Padma_consnt_DDA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_consnt_DDDHA]  = Padma::Padma_consnt_DDDHA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_consnt_DDHA]   = Padma::Padma_consnt_DDHA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_consnt_NNA]    = Padma::Padma_consnt_NNA;

$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_consnt_TA]     = Padma::Padma_consnt_TA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_consnt_THA]    = Padma::Padma_consnt_THA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_consnt_DA]     = Padma::Padma_consnt_DA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_consnt_DHA]    = Padma::Padma_consnt_DHA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_consnt_NA]     = Padma::Padma_consnt_NA;

$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_consnt_PA_1]   = Padma::Padma_consnt_PA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_consnt_PA_2]   = Padma::Padma_consnt_PA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_consnt_PHA]    = Padma::Padma_consnt_PHA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_consnt_BA]     = Padma::Padma_consnt_BA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_consnt_BHA]    = Padma::Padma_consnt_BHA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_consnt_MA]     = Padma::Padma_consnt_MA;

$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_consnt_YA_1]   = Padma::Padma_consnt_YA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_consnt_YA_2]   = Padma::Padma_consnt_YA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_consnt_YA_3]   = Padma::Padma_consnt_YA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_consnt_RA]     = Padma::Padma_consnt_RA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_consnt_LA_1]   = Padma::Padma_consnt_LA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_consnt_LA_2]   = Padma::Padma_consnt_LA;

$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_consnt_VA_1]   = Padma::Padma_consnt_VA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_consnt_VA_2]   = Padma::Padma_consnt_VA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_consnt_SHA_1]  = Padma::Padma_consnt_SHA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_consnt_SHA_2]  = Padma::Padma_consnt_SHA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_consnt_SSA_1]  = Padma::Padma_consnt_SSA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_consnt_SSA_2]  = Padma::Padma_consnt_SSA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_consnt_SA]     = Padma::Padma_consnt_SA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_consnt_HA]     = Padma::Padma_consnt_HA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_consnt_LLA]    = Padma::Padma_consnt_LLA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_consnt_LLLA]   = "\xE0\xA4\xB4";
//change this to padma equivalent after adding LLLA to padma and devanagari

//Gunintamulu
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_vowelsn_AA]    = Padma::Padma_vowelsn_AA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_vowelsn_I_1]   = Padma::Padma_vowelsn_I;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_vowelsn_I_2]   = Padma::Padma_vowelsn_I;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_vowelsn_II_1]  = Padma::Padma_vowelsn_II;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_vowelsn_II_2]  = Padma::Padma_vowelsn_II;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_vowelsn_U_1]   = Padma::Padma_vowelsn_U;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_vowelsn_U_2]   = Padma::Padma_vowelsn_U;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_vowelsn_U_3]   = Padma::Padma_vowelsn_U;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_vowelsn_UU_1]  = Padma::Padma_vowelsn_UU;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_vowelsn_UU_2]  = Padma::Padma_vowelsn_UU;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_vowelsn_R_1]   = Padma::Padma_vowelsn_R;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_vowelsn_R_2]   = Padma::Padma_vowelsn_R;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_vowelsn_R_3]   = Padma::Padma_vowelsn_R;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_vowelsn_CDR_E] = Padma::Padma_vowelsn_CDR_E;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_vowelsn_EE]    = Padma::Padma_vowelsn_EE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_vowelsn_AI_1]  = Padma::Padma_vowelsn_AI;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_vowelsn_AI_2]  = Padma::Padma_vowelsn_AI;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_vowelsn_OO_1]  = Padma::Padma_vowelsn_OO;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_vowelsn_OO_2]  = Padma::Padma_vowelsn_OO;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_vowelsn_AU]    = Padma::Padma_vowelsn_AU;

//Matra . anusvara
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_vowelsn_IIM]  = Padma::Padma_vowelsn_II . Padma::Padma_anusvara;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_vowelsn_EEM]  = Padma::Padma_vowelsn_EE . Padma::Padma_anusvara;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_vowelsn_IM]   = Padma::Padma_vowelsn_I . Padma::Padma_anusvara;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_vowelsn_AUM]  = Padma::Padma_vowelsn_AU . Padma::Padma_anusvara;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_vowelsn_OM]   = Padma::Padma_vowelsn_OO . Padma::Padma_anusvara;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_vowelsn_ER]   = Padma::Padma_vowelsn_EE . Padma::Padma_vattu_RA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_vowelsn_AIR]  = Padma::Padma_vowelsn_AI . Padma::Padma_vattu_RA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_vowelsn_RIIM] = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_II . Padma::Padma_anusvara;

//half forms
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_KA_1]  = Padma::Padma_halffm_KA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_KA_2]  = Padma::Padma_halffm_KA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_KR_1]  = Padma::Padma_halffm_KA . Padma::Padma_halffm_RA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_KR_2]  = Padma::Padma_halffm_KA . Padma::Padma_halffm_RA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_KHA]   = Padma::Padma_halffm_KHA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_KHHA]  = Padma::Padma_halffm_KHHA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_KHR]   = Padma::Padma_halffm_KHA . Padma::Padma_halffm_RA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_GA]    = Padma::Padma_halffm_GA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_GR]    = Padma::Padma_halffm_GA . Padma::Padma_halffm_RA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_GHHA]  = Padma::Padma_halffm_GHHA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_GHA]   = Padma::Padma_halffm_GHA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_NYA]   = Padma::Padma_halffm_NYA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_NYC]   = Padma::Padma_halffm_NYA . Padma::Padma_halffm_CA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_NYJ]   = Padma::Padma_halffm_NYA . Padma::Padma_halffm_JA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_CA]    = Padma::Padma_halffm_CA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_JA]    = Padma::Padma_halffm_JA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_JR_1]  = Padma::Padma_halffm_JA . Padma::Padma_halffm_RA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_JR_2]  = Padma::Padma_halffm_JA . Padma::Padma_halffm_RA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_JNY]   = Padma::Padma_halffm_JA . Padma::Padma_halffm_NYA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_JHA]   = Padma::Padma_halffm_JHA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_NNA]   = Padma::Padma_halffm_NNA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_TA]    = Padma::Padma_halffm_TA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_TT]    = Padma::Padma_halffm_TA . Padma::Padma_halffm_TA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_TR]    = Padma::Padma_halffm_TA . Padma::Padma_halffm_RA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_THA]   = Padma::Padma_halffm_THA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_DY]    = Padma::Padma_halffm_DA . Padma::Padma_halffm_YA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_DHA]   = Padma::Padma_halffm_DHA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_NA]    = Padma::Padma_halffm_NA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_NN]    = Padma::Padma_halffm_NA . Padma::Padma_halffm_NA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_PA_1]  = Padma::Padma_halffm_PA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_PA_2]  = Padma::Padma_halffm_PA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_PR_1]  = Padma::Padma_halffm_PA . Padma::Padma_halffm_RA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_PR_2]  = Padma::Padma_halffm_PA . Padma::Padma_halffm_RA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_PHA]   = Padma::Padma_halffm_PHA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_BA]    = Padma::Padma_halffm_BA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_BHA]   = Padma::Padma_halffm_BHA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_MA]    = Padma::Padma_halffm_MA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_YA_1]  = Padma::Padma_halffm_YA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_YA_2]  = Padma::Padma_halffm_YA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_YA_3]  = Padma::Padma_halffm_YA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_RA]    = Padma::Padma_halffm_RA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_LA]    = Padma::Padma_halffm_LA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_VA_1]  = Padma::Padma_halffm_VA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_VA_2]  = Padma::Padma_halffm_VA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_VR_1]  = Padma::Padma_halffm_VA . Padma::Padma_halffm_RA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_VR_2]  = Padma::Padma_halffm_VA . Padma::Padma_halffm_RA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_VN]    = Padma::Padma_halffm_VA . Padma::Padma_halffm_NA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_SHA_1] = Padma::Padma_halffm_SHA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_SHA_2] = Padma::Padma_halffm_SHA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_SHA_3] = Padma::Padma_halffm_SHA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_SHR_1] = Padma::Padma_halffm_SHA . Padma::Padma_halffm_RA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_SHR_2] = Padma::Padma_halffm_SHA . Padma::Padma_halffm_RA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_SSA_1] = Padma::Padma_halffm_SSA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_SSA_2] = Padma::Padma_halffm_SSA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_SA]    = Padma::Padma_halffm_SA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_SR]    = Padma::Padma_halffm_SA . Padma::Padma_halffm_RA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_HA]    = Padma::Padma_halffm_HA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_LLA]   = Padma::Padma_halffm_LLA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_RRA]   = Padma::Padma_halffm_RRA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_KSH]   = Padma::Padma_halffm_KA . Padma::Padma_halffm_SSA;

//Conjuncts
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_KT]     = Padma::Padma_consnt_KA . Padma::Padma_vattu_TA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_KR_1]   = Padma::Padma_consnt_KA . Padma::Padma_vattu_RA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_KR_2]   = Padma::Padma_consnt_KA . Padma::Padma_vattu_RA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_KHR]    = Padma::Padma_consnt_KHA . Padma::Padma_vattu_RA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_KRU]    = Padma::Padma_consnt_KA . Padma::Padma_vattu_RA . Padma::Padma_vowelsn_U;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_VRU]    = Padma::Padma_consnt_VA . Padma::Padma_vattu_RA . Padma::Padma_vowelsn_U;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_SHRU]   = Padma::Padma_consnt_SHA . Padma::Padma_vattu_RA . Padma::Padma_vowelsn_U;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_KSH]    = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_GR]     = Padma::Padma_consnt_GA . Padma::Padma_vattu_RA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_JNY]    = Padma::Padma_consnt_JA . Padma::Padma_vattu_NYA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_JNYE]   = Padma::Padma_consnt_JA . Padma::Padma_vattu_NYA . Padma::Padma_vowelsn_EE;


$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_TTTT]   = Padma::Padma_consnt_TTA . Padma::Padma_vattu_TTA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_TT_TTH] = Padma::Padma_consnt_TTA . Padma::Padma_vattu_TTHA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_TTHTTH] = Padma::Padma_consnt_TTHA . Padma::Padma_vattu_TTHA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_DDDD_1] = Padma::Padma_consnt_DDA . Padma::Padma_vattu_DDA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_DDDD_2] = Padma::Padma_consnt_DDA . Padma::Padma_vattu_DDA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_DD_DDH] = Padma::Padma_consnt_DDA . Padma::Padma_vattu_DDHA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_DDHDDH] = Padma::Padma_consnt_DDHA . Padma::Padma_vattu_DDHA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_TT]     = Padma::Padma_consnt_TA . Padma::Padma_vattu_TA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_TR]     = Padma::Padma_consnt_TA . Padma::Padma_vattu_RA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_TREE]   = Padma::Padma_consnt_TA . Padma::Padma_vattu_RA . Padma::Padma_vowelsn_EE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_DG]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_GA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_DD]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_DA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_D_DH_1] = Padma::Padma_consnt_DA . Padma::Padma_vattu_DHA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_D_DH_2] = Padma::Padma_consnt_DA . Padma::Padma_vattu_DHA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_DB]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_BA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_DBH]    = Padma::Padma_consnt_DA . Padma::Padma_vattu_BHA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_DM]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_MA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_DY]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_YA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_DYU]    = Padma::Padma_consnt_DA . Padma::Padma_vattu_YA . Padma::Padma_vowelsn_U;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_TRU]    = Padma::Padma_consnt_TA . Padma::Padma_vattu_RA . Padma::Padma_vowelsn_U;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_HYU]    = Padma::Padma_consnt_HA . Padma::Padma_vattu_YA . Padma::Padma_vowelsn_U;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_DV]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_VA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_DR]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_RA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_NN]     = Padma::Padma_consnt_NA . Padma::Padma_vattu_NA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_PR_1]   = Padma::Padma_consnt_PA . Padma::Padma_vattu_RA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_PR_2]   = Padma::Padma_consnt_PA . Padma::Padma_vattu_RA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_PR_3]   = Padma::Padma_consnt_PA . Padma::Padma_vattu_RA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_RPE]    = Padma::Padma_consnt_RA . Padma::Padma_vattu_PA . Padma::Padma_vowelsn_EE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_RGE]    = Padma::Padma_consnt_RA . Padma::Padma_vattu_GA . Padma::Padma_vowelsn_EE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_RSSE]   = Padma::Padma_consnt_RA . Padma::Padma_vattu_SSA . Padma::Padma_vowelsn_EE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_SR]     = Padma::Padma_consnt_SA . Padma::Padma_vattu_RA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_SRE]    = Padma::Padma_consnt_RA . Padma::Padma_vattu_SA . Padma::Padma_vowelsn_EE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_PHR_1]  = Padma::Padma_consnt_PHA . Padma::Padma_vattu_RA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_PHR_2]  = Padma::Padma_consnt_PHA . Padma::Padma_vattu_RA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_VR_1]   = Padma::Padma_consnt_VA . Padma::Padma_vattu_RA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_VR_2]   = Padma::Padma_consnt_VA . Padma::Padma_vattu_RA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_VR_3]   = Padma::Padma_consnt_VA . Padma::Padma_vattu_RA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_VN]     = Padma::Padma_consnt_VA . Padma::Padma_vattu_NA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_SHR]    = Padma::Padma_consnt_SHA . Padma::Padma_vattu_RA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_KRE]    = Padma::Padma_consnt_KA . Padma::Padma_vattu_RA . Padma::Padma_vowelsn_EE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_GRE]    = Padma::Padma_consnt_GA . Padma::Padma_vattu_RA . Padma::Padma_vowelsn_EE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_VRE]    = Padma::Padma_consnt_VA . Padma::Padma_vattu_RA . Padma::Padma_vowelsn_EE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_PRE_1]  = Padma::Padma_consnt_PA . Padma::Padma_vattu_RA . Padma::Padma_vowelsn_EE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_PRE_2]  = Padma::Padma_consnt_PA . Padma::Padma_vattu_RA . Padma::Padma_vowelsn_EE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_PHRE_1] = Padma::Padma_consnt_PHA . Padma::Padma_vattu_RA . Padma::Padma_vowelsn_EE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_PHRE_2] = Padma::Padma_consnt_PHA . Padma::Padma_vattu_RA . Padma::Padma_vowelsn_EE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_SHRE]   = Padma::Padma_consnt_SHA . Padma::Padma_vattu_RA . Padma::Padma_vowelsn_EE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_DHRE]   = Padma::Padma_consnt_RA . Padma::Padma_vattu_DHA . Padma::Padma_vowelsn_EE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_SHV]    = Padma::Padma_consnt_SHA . Padma::Padma_vattu_VA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_SSTT]   = Padma::Padma_consnt_SSA . Padma::Padma_vattu_TTA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_SSTTH_1]= Padma::Padma_consnt_SSA . Padma::Padma_vattu_TTHA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_SSTTH_2]= Padma::Padma_consnt_SSA . Padma::Padma_vattu_TTHA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_HNN]    = Padma::Padma_consnt_HA . Padma::Padma_vattu_NNA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_HL]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_LA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_HV]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_VA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_HYA]    = Padma::Padma_consnt_HA . Padma::Padma_vattu_YA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_HMA]    = Padma::Padma_consnt_HA . Padma::Padma_vattu_MA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_conjct_RK]     = Padma::Padma_consnt_RA . Padma::Padma_vattu_KA;

//Combos
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_HR]       = Padma::Padma_consnt_HA . Padma::Padma_vowelsn_R;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_K_CDR_E]  = Padma::Padma_consnt_KA . Padma::Padma_vowelsn_CDR_E;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_P_CDR_E]  = Padma::Padma_consnt_PA . Padma::Padma_vowelsn_CDR_E;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_PH_CDR_E] = Padma::Padma_consnt_PHA . Padma::Padma_vowelsn_CDR_E;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_V_CDR_E]  = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_CDR_E;

$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_KHAI] = Padma::Padma_consnt_KHA . Padma::Padma_vowelsn_AI;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_GAI]  = Padma::Padma_consnt_GA . Padma::Padma_vowelsn_AI;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_PAI]  = Padma::Padma_consnt_PA . Padma::Padma_vowelsn_AI;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_PHAI] = Padma::Padma_consnt_PHA . Padma::Padma_vowelsn_AI;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_MAI]  = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_AI;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_JAI]  = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_AI;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_SAI]  = Padma::Padma_consnt_SA . Padma::Padma_vowelsn_AI;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_LAI]  = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_AI;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_NAI]  = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_AI;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_BAI]  = Padma::Padma_consnt_BA . Padma::Padma_vowelsn_AI;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_VAI]  = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_AI;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_SHAI] = Padma::Padma_consnt_SHA . Padma::Padma_vowelsn_AI;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_DHAI] = Padma::Padma_consnt_DHA . Padma::Padma_vowelsn_AI;

$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_VE_1] = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_EE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_VE_2] = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_EE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_VE_3] = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_EE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_KE_1] = Padma::Padma_consnt_KA . Padma::Padma_vowelsn_EE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_KE_2] = Padma::Padma_consnt_KA . Padma::Padma_vowelsn_EE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_KHE]  = Padma::Padma_consnt_KHA . Padma::Padma_vowelsn_EE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_DHYE] = Padma::Padma_consnt_DHA . Padma::Padma_vattu_YA . Padma::Padma_vowelsn_EE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_NNE]   = Padma::Padma_consnt_NNA . Padma::Padma_vowelsn_EE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_GE]    = Padma::Padma_consnt_GA . Padma::Padma_vowelsn_EE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_GHE]   = Padma::Padma_consnt_GHA . Padma::Padma_vowelsn_EE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_CE]    = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_EE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_JE]    = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_EE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_TE]    = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_EE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_THE]   = Padma::Padma_consnt_THA . Padma::Padma_vowelsn_EE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_DHE]   = Padma::Padma_consnt_DHA . Padma::Padma_vowelsn_EE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_NE]    = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_EE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_PE_1]  = Padma::Padma_consnt_PA . Padma::Padma_vowelsn_EE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_PE_2]  = Padma::Padma_consnt_PA . Padma::Padma_vowelsn_EE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_PHE_1] = Padma::Padma_consnt_PHA . Padma::Padma_vowelsn_EE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_PHE_2] = Padma::Padma_consnt_PHA . Padma::Padma_vowelsn_EE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_BE]    = Padma::Padma_consnt_BA . Padma::Padma_vowelsn_EE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_BHE]   = Padma::Padma_consnt_BHA . Padma::Padma_vowelsn_EE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_ME_1]  = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_EE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_ME_2]  = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_EE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_YE]    = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_EE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_LE]    = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_EE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_SE]    = Padma::Padma_consnt_SA . Padma::Padma_vowelsn_EE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_SSE_1] = Padma::Padma_consnt_SSA . Padma::Padma_vowelsn_EE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_SSE_2] = Padma::Padma_consnt_SSA . Padma::Padma_vowelsn_EE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_SHE]   = Padma::Padma_consnt_SHA . Padma::Padma_vowelsn_EE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_KSHE]  = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA . Padma::Padma_vowelsn_EE;

$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_GU]  = Padma::Padma_consnt_GA . Padma::Padma_vowelsn_U;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_GHU] = Padma::Padma_consnt_GHA . Padma::Padma_vowelsn_U;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_CU]  = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_U;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_JU]  = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_U;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_NU]  = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_U;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_NNU] = Padma::Padma_consnt_NNA . Padma::Padma_vowelsn_U;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_PU]  = Padma::Padma_consnt_PA . Padma::Padma_vowelsn_U;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_PHU] = Padma::Padma_consnt_PHA . Padma::Padma_vowelsn_U;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_BU]  = Padma::Padma_consnt_BA . Padma::Padma_vowelsn_U;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_BHU] = Padma::Padma_consnt_BHA . Padma::Padma_vowelsn_U;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_RU]  = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_U;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_LU]  = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_U;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_TU]  = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_U;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_MU]  = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_U;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_SU]  = Padma::Padma_consnt_SA . Padma::Padma_vowelsn_U;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_YU]  = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_U;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_SHU] = Padma::Padma_consnt_SHA . Padma::Padma_vowelsn_U;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_DHU] = Padma::Padma_consnt_DHA . Padma::Padma_vowelsn_U;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_VU]  = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_U;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_KU]  = Padma::Padma_consnt_KA . Padma::Padma_vowelsn_U;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_KHU] = Padma::Padma_consnt_KHA . Padma::Padma_vowelsn_U;

$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_KRU] = Padma::Padma_consnt_KA . Padma::Padma_vowelsn_R;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_DRU] = Padma::Padma_consnt_DA . Padma::Padma_vowelsn_R;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_VRU] = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_R;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_MRU] = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_R;

$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_KUU]  = Padma::Padma_consnt_KA . Padma::Padma_vowelsn_UU;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_VUU]  = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_UU;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_RUU]  = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_UU;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_PUU]  = Padma::Padma_consnt_PA . Padma::Padma_vowelsn_UU;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_PHUU] = Padma::Padma_consnt_PHA . Padma::Padma_vowelsn_UU;

$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_KEM]  = Padma::Padma_consnt_KA . Padma::Padma_vowelsn_EE . Padma::Padma_anusvara;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_VEM]  = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_EE . Padma::Padma_anusvara;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_CEEM] = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_EE . Padma::Padma_anusvara;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_NNEM] = Padma::Padma_consnt_NNA . Padma::Padma_vowelsn_EE . Padma::Padma_anusvara;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_PEM]  = Padma::Padma_consnt_PA . Padma::Padma_vowelsn_EE . Padma::Padma_anusvara;

$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_KAM] = Padma::Padma_consnt_KA . Padma::Padma_anusvara;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_combo_VAM] = Padma::Padma_consnt_VA . Padma::Padma_anusvara;

//Half forms of RA
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_RII]    = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_II;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_REE]    = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_EE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_halffm_RA_ANU] = Padma::Padma_halffm_RA . Padma::Padma_anusvara;

$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_vattu_RA_1] = Padma::Padma_vattu_RA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_vattu_RA_2] = Padma::Padma_vattu_RA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_vattu_RA_3] = Padma::Padma_vattu_RA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_vattu_RA_4] = Padma::Padma_vattu_RA;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_vattu_LA]   = Padma::Padma_vattu_LA;

$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_misc_OM]    = Padma::Padma_om;

//Devanagari Digits
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_digit_ZERO_DE]  = Padma::Padma_digit_ZERO;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_digit_ONE_DE]   = Padma::Padma_digit_ONE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_digit_TWO_DE]   = Padma::Padma_digit_TWO;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_digit_THREE_DE] = Padma::Padma_digit_THREE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_digit_FOUR_DE]  = Padma::Padma_digit_FOUR;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_digit_FIVE_DE]  = Padma::Padma_digit_FIVE;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_digit_SIX_DE]   = Padma::Padma_digit_SIX;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_digit_SEVEN_DE] = Padma::Padma_digit_SEVEN;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_digit_EIGHT_DE] = Padma::Padma_digit_EIGHT;
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_digit_NINE_DE]  = Padma::Padma_digit_NINE;

//Digits
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_digit_TWO]  = '2';
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_digit_FOUR] = '4';
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_digit_NINE] = '9';

$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_PLUS]       = "\x2B";
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_LQTDOUBLE]  = "\xE2\x80\x9C";
$MillenniumVarunWeb_toPadma[MillenniumVarunWeb::MillenniumVarunWeb_RQTDOUBLE]  = "\xE2\x80\x9D";


$MillenniumVarunWeb_prefixList = array();
$MillenniumVarunWeb_prefixList[MillenniumVarunWeb::MillenniumVarunWeb_vowelsn_I_1] = true;
$MillenniumVarunWeb_prefixList[MillenniumVarunWeb::MillenniumVarunWeb_vowelsn_I_2] = true;
$MillenniumVarunWeb_prefixList[MillenniumVarunWeb::MillenniumVarunWeb_vowelsn_IM]  = true;

$MillenniumVarunWeb_suffixList = array();
$MillenniumVarunWeb_suffixList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_RA]     = true;
$MillenniumVarunWeb_suffixList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_RII]    = true;
$MillenniumVarunWeb_suffixList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_REE]    = true;
$MillenniumVarunWeb_suffixList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_RA_ANU] = true;
$MillenniumVarunWeb_suffixList[MillenniumVarunWeb::MillenniumVarunWeb_vowelsn_RIIM]  = true;
$MillenniumVarunWeb_suffixList[MillenniumVarunWeb::MillenniumVarunWeb_vowelsn_ER]    = true;

$MillenniumVarunWeb_redundantList = array();

$MillenniumVarunWeb_overloadList = array();
$MillenniumVarunWeb_overloadList["\x44"]         = true;
$MillenniumVarunWeb_overloadList["\x5D"]         = true;
$MillenniumVarunWeb_overloadList["\xC2\xA8"]     = true;
$MillenniumVarunWeb_overloadList["\xC3\xA9"]     = true;
$MillenniumVarunWeb_overloadList["\xC2\xBF"]     = true;
$MillenniumVarunWeb_overloadList["\xC3\xAF"]     = true;
$MillenniumVarunWeb_overloadList["\x4F\xC2\xB3"] = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_vowel_A]     = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_vowel_AA]    = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_vowel_EE]    = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_vowel_I]     = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_vowelsn_AA]  = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_KSH]  = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_KHA]  = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_KHHA] = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_KHR]  = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_GA]   = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_GR]   = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_GHHA] = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_GHA]  = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_NYC]  = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_NYJ]  = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_NYA]  = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_CA]   = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_JA]   = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_JNY]  = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_JHA]  = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_NNA]  = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_TA]   = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_TT]   = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_TR]   = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_THA]  = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_DY]   = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_DHA]  = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_NA]   = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_NN]   = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_PA_1] = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_PA_2] = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_PR_1] = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_PR_2] = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_BA]   = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_BHA]  = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_MA]   = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_YA_1] = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_YA_2] = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_YA_3] = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_LA]   = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_VA_1] = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_VA_2] = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_VR_1] = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_VR_2] = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_SR]   = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_consnt_PA_1] = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_consnt_MA]   = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_consnt_VA_1] = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_consnt_VA_2] = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_combo_VE_1]  = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_combo_VE_2]  = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_combo_VE_3]  = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_combo_PAI]   = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_combo_VEM]   = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_combo_VRU]   = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_combo_VU]    = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_combo_PUU]   = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_combo_VAM]   = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_combo_PU]    = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_combo_P_CDR_E]= true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_combo_V_CDR_E]= true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_combo_VUU]   = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_combo_PE_1]  = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_combo_PE_2]  = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_conjct_TT]   = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_conjct_TR]   = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_conjct_PR_1] = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_conjct_PR_3] = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_conjct_VR_1] = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_conjct_VR_2] = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_conjct_VR_3] = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_conjct_VRE]  = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_conjct_PRE_1]= true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_conjct_PRE_2]= true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_conjct_VRU]  = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_VN]   = true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_SHA_1]= true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_SHA_2]= true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_SHA_3]= true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_SHR_1]= true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_SHR_2]= true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_SSA_1]= true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_SSA_2]= true;
$MillenniumVarunWeb_overloadList[MillenniumVarunWeb::MillenniumVarunWeb_halffm_SA]   = true;

function MillenniumVarunWeb_initialize()
{
    global $fontinfo;

    $fontinfo["millenniumvarunweb"]["language"] = "Devanagari";
    $fontinfo["millenniumvarunweb"]["class"] = "MillenniumVarunWeb";
}

?>
