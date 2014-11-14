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

//MillenniumVarun, MillenniumVarunFX Devanagari
class MillenniumVarun
{
function MillenniumVarun()
{
}

//The interface every dynamic font encoding should implement
var $maxLookupLen = 5;
var $fontFace     = "MillenniumVarun";
var $displayName  = "MillenniumVarun";
var $script       = Padma::Padma_script_DEVANAGARI;
var $hasSuffixes  = true;

function lookup ($str)
{
  global $MillenniumVarun_toPadma;
   if(array_key_exists($str,$MillenniumVarun_toPadma))
    return $MillenniumVarun_toPadma[$str];
   return false;
}

function isPrefixSymbol ($str)
{
    global $MillenniumVarun_prefixList;
    return array_key_exists($str,$MillenniumVarun_prefixList);
}

function isSuffixSymbol ($str)
{
    global $MillenniumVarun_suffixList;
    return array_key_exists($str,$MillenniumVarun_suffixList);
}

function isOverloaded ($str)
{
    global $MillenniumVarun_overloadList;
    return array_key_exists($str,$MillenniumVarun_overloadList);
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
    global $MillenniumVarun_redundantList;
    return array_key_exists($str,$MillenniumVarun_redundantList);
}

//Implementation details start here

//Specials
const MillenniumVarun_avagraha       = "\x65";
const MillenniumVarun_anusvara       = "\x62";
const MillenniumVarun_candrabindu    = "\x42";
const MillenniumVarun_virama         = "\x64";
//MillenniumVarun.visarga        = "\xC3\xAB";

//Vowels
const MillenniumVarun_vowel_A_1      = "\x44\xC3\x95";
const MillenniumVarun_vowel_A_2      = "\x44\xC3\xA7";
const MillenniumVarun_vowel_AA_1     = "\x44\xC3\x95\xC3\x95";
const MillenniumVarun_vowel_AA_2     = "\x44\xC3\xA7\xC3\xA7";
const MillenniumVarun_vowel_I        = "\x46";
const MillenniumVarun_vowel_II       = "\x46\x26";
const MillenniumVarun_vowel_U        = "\x47";
const MillenniumVarun_vowel_UU       = "\x54";
const MillenniumVarun_vowel_R        = "\x24\xC3\x95\x2B";
const MillenniumVarun_vowel_EE       = "\x53";
const MillenniumVarun_vowel_AI       = "\x53\xC3\xAD";
const MillenniumVarun_vowel_CDR_O    = "\x44\xC3\x95\xC3\x95\x40";
const MillenniumVarun_vowel_OO_1     = "\x44\xC3\xA7\xC3\xA7\xC3\xAD";
const MillenniumVarun_vowel_OO_2     = "\x44\xC3\xA7\xC3\xA7\xC3\xAD";
const MillenniumVarun_vowel_AU_1     = "\x44\xC3\x95\xC3\x95\xC3\x8C";
const MillenniumVarun_vowel_AU_2     = "\x44\xC3\xA7\xC3\xA7\xC3\x8C";

//Consonants
const MillenniumVarun_consnt_KA_1    = "\x4A\xC3\x95\xC3\x80";
const MillenniumVarun_consnt_KA_2    = "\x4A\xC3\xA7\xC3\x80";
const MillenniumVarun_consnt_KA_3    = "\x6B\xC3\x95\xC3\x80";
const MillenniumVarun_consnt_KA_4    = "\x6B\xC3\xA7\xC3\x80";
const MillenniumVarun_consnt_KHA_1   = "\x4B\xC3\x95";
const MillenniumVarun_consnt_KHA_2   = "\x4B\xC3\xA7";
const MillenniumVarun_consnt_KHHA    = "\xE2\x84\xA2\xC3\x95";
const MillenniumVarun_consnt_GA_1    = "\x69\xC3\x95";
const MillenniumVarun_consnt_GA_2    = "\x69\xC3\xA7";
const MillenniumVarun_consnt_GHHA    = "\xC5\x93\xC3\x95";
const MillenniumVarun_consnt_GHA_1   = "\x49\xC3\x95";
const MillenniumVarun_consnt_GHA_2   = "\x49\xC3\xA7";
const MillenniumVarun_consnt_NGA     = "\x2A";

const MillenniumVarun_consnt_CA_1    = "\xC2\xAE\xC3\x95";
const MillenniumVarun_consnt_CA_2    = "\xC2\xAE\xC3\xA7";
const MillenniumVarun_consnt_CHA     = "\x73";
const MillenniumVarun_consnt_JA_1    = "\x70\xC3\x95";
const MillenniumVarun_consnt_JA_2    = "\x70\xC3\xA7";
const MillenniumVarun_consnt_JHA_1   = "\x50\xC3\x95";
const MillenniumVarun_consnt_JHA_2   = "\x50\xC3\xA7";
const MillenniumVarun_consnt_NYA     = "\x5F\xC3\x95";

const MillenniumVarun_consnt_TTA     = "\xC3\xAC";
const MillenniumVarun_consnt_TTHA_1  = "\x22";
const MillenniumVarun_consnt_TTHA_2  = "\xC3\xBE";
const MillenniumVarun_consnt_DDA     = "\x5B";
const MillenniumVarun_consnt_DDDHA   = "\xE2\x80\xBA";
const MillenniumVarun_consnt_DDHA    = "\x7B";
const MillenniumVarun_consnt_NNA_1   = "\x43\xC3\x95";
const MillenniumVarun_consnt_NNA_2   = "\x43\xC3\xA7";

const MillenniumVarun_consnt_TA_1    = "\x6C\xC3\x95";
const MillenniumVarun_consnt_TA_2    = "\x6C\xC3\xA7";
const MillenniumVarun_consnt_THA_1   = "\x4C\xC3\x95";
const MillenniumVarun_consnt_THA_2   = "\x4C\xC3\xA7";
const MillenniumVarun_consnt_DA_1    = "\x6F";
const MillenniumVarun_consnt_DHA_1   = "\x4F\xC3\x95";
const MillenniumVarun_consnt_DHA_2   = "\x4F\xC3\xA7";
const MillenniumVarun_consnt_NA_1    = "\x76\xC3\x95";
const MillenniumVarun_consnt_NA_2    = "\x76\xC3\xA7";

const MillenniumVarun_consnt_PA_1    = "\x48\xC3\x95";
const MillenniumVarun_consnt_PA_2    = "\x48\xC3\xA7";
const MillenniumVarun_consnt_PA_3    = "\x68\xC3\x95";
const MillenniumVarun_consnt_PA_4    = "\x68\xC3\xA7";
const MillenniumVarun_consnt_PHA_1   = "\x48\xC3\x95\xC3\x80";
const MillenniumVarun_consnt_PHA_2   = "\x48\xC3\xA7\xC3\x80";
const MillenniumVarun_consnt_PHA_3   = "\x68\xC3\x95\xC3\x80";
const MillenniumVarun_consnt_PHA_4   = "\x68\xC3\xA7\xC3\x80";
const MillenniumVarun_consnt_BA_1    = "\x79\xC3\x95";
const MillenniumVarun_consnt_BA_2    = "\x79\xC3\xA7";
const MillenniumVarun_consnt_BHA_1   = "\x59\xC3\x95";
const MillenniumVarun_consnt_BHA_2   = "\x59\xC3\xA7";
const MillenniumVarun_consnt_MA_1    = "\x63\xC3\x95";
const MillenniumVarun_consnt_MA_2    = "\x63\xC3\xA7";

const MillenniumVarun_consnt_YA_1    = "\xC2\xAD\xC3\x95";
const MillenniumVarun_consnt_YA_2    = "\xC2\xAD\xC3\xA7";
const MillenniumVarun_consnt_YA_3    = "\xC2\xB3\xC3\x95";
const MillenniumVarun_consnt_YA_4    = "\xC2\xB3\xC3\xA7";
const MillenniumVarun_consnt_YA_5    = "\xC3\xAE\xC3\x95";
const MillenniumVarun_consnt_YA_6    = "\xC3\xAE\xC3\xA7";
const MillenniumVarun_consnt_RA      = "\x6A";
const MillenniumVarun_consnt_LA_1    = "\x75\xC3\x95";
const MillenniumVarun_consnt_LA_2    = "\x7D";
const MillenniumVarun_consnt_LA_3    = "\x75\xC3\xA7";
const MillenniumVarun_consnt_VA_1    = "\x4A\xC3\x95";
const MillenniumVarun_consnt_VA_2    = "\x4A\xC3\xA7";
const MillenniumVarun_consnt_VA_3    = "\x6B\xC3\x95";
const MillenniumVarun_consnt_VA_4    = "\x6B\xC3\xA7";
const MillenniumVarun_consnt_SHA_1   = "\x4D\xC3\x95";
const MillenniumVarun_consnt_SHA_2   = "\x4D\xC3\xA7";
const MillenniumVarun_consnt_SHA_3   = "\xC2\xB5\xC3\x95";
const MillenniumVarun_consnt_SHA_4   = "\xC2\xB5\xC3\xA7";
const MillenniumVarun_consnt_SSA_1   = "\x3C\xC3\x95";
const MillenniumVarun_consnt_SSA_2   = "\x3C\xC3\xA7";
const MillenniumVarun_consnt_SSA_3   = "\xC3\xB8\xC3\x95";
const MillenniumVarun_consnt_SSA_4   = "\xC3\xB8\xC3\xA7";
const MillenniumVarun_consnt_SA_1    = "\x6D\xC3\x95";
const MillenniumVarun_consnt_SA_2    = "\x6D\xC3\xA7";
const MillenniumVarun_consnt_HA      = "\x6E";
const MillenniumVarun_consnt_LLA     = "\x55";

//Gunintamulu
const MillenniumVarun_vowelsn_AA_1   = "\xC3\x95";
const MillenniumVarun_vowelsn_AA_2   = "\xC3\xA7";
const MillenniumVarun_vowelsn_I_1    = "\xC3\x95\xC3\x86";
const MillenniumVarun_vowelsn_I_2    = "\xC3\xA7\xC3\x86";
const MillenniumVarun_vowelsn_I_3    = "\xC3\xA7\x71";
const MillenniumVarun_vowelsn_II_1   = "\xC3\x95\xC3\x87";
const MillenniumVarun_vowelsn_II_2   = "\xC3\xA7\xC3\x87";
const MillenniumVarun_vowelsn_U_1    = "\xC2\xA7";
const MillenniumVarun_vowelsn_U_2    = "\xC3\xA1";
const MillenniumVarun_vowelsn_UU_1   = "\xC3\x93";
const MillenniumVarun_vowelsn_UU_2   = "\xC3\xA8";
const MillenniumVarun_vowelsn_R_1    = "\x3D";
const MillenniumVarun_vowelsn_R_2    = "\xC3\x89";
const MillenniumVarun_vowelsn_R_3    = "\xC3\xA3";
const MillenniumVarun_vowelsn_CDR_E  = "\x40";
const MillenniumVarun_vowelsn_CDR_O  = "\xC3\xA7\x40";
const MillenniumVarun_vowelsn_EE_1   = "\xC3\xAD";
const MillenniumVarun_vowelsn_AI_1   = "\xC3\x8C";
const MillenniumVarun_vowelsn_AI_2   = "\xC3\xAD\xC3\xAD";
const MillenniumVarun_vowelsn_OO     = "\xC3\xA7\xC3\xAD";

//Matra . anusvara
const MillenniumVarun_vowelsn_IM     = "\xC3\x95\xC3\x85";
const MillenniumVarun_vowelsn_IIM_1  = "\xC3\x95\x52";
const MillenniumVarun_vowelsn_IIM_2  = "\xC3\xA7\x52";
const MillenniumVarun_vowelsn_IIM_3  = "\xC3\xA7\x62\xC3\x87";
const MillenniumVarun_vowelsn_AIM    = "\x51";
const MillenniumVarun_vowelsn_OOM    = "\xC3\xA7\x57";
const MillenniumVarun_vowelsn_EEM    = "\x57";

//Half Forms
const MillenniumVarun_halffm_KA_1     = "\x4A\xC3\x95\x77";
const MillenniumVarun_halffm_KA_2     = "\x4A\xC3\xA7\x77";
const MillenniumVarun_halffm_KA_3     = "\x6B\xC3\x95\x77";
const MillenniumVarun_halffm_KA_4     = "\x6B\xC3\xA7\x77";
const MillenniumVarun_halffm_KR_1     = "\xC2\xAC\xC3\x95\x77";
const MillenniumVarun_halffm_KR_2     = "\xC2\xAC\xC3\xA7\x77";
const MillenniumVarun_halffm_KR_3     = "\xC2\xAF\xC3\x95\x77";
const MillenniumVarun_halffm_KR_4     = "\xC2\xAF\xC3\xA7\x77";
const MillenniumVarun_halffm_KSH      = "\x23";
const MillenniumVarun_halffm_KHA_1    = "\x4B";
const MillenniumVarun_halffm_KHHA     = "\xE2\x84\xA2";
const MillenniumVarun_halffm_KHR      = "\xC2\xB8";
const MillenniumVarun_halffm_GA       = "\x69";
const MillenniumVarun_halffm_GR       = "\xC3\xBB";
const MillenniumVarun_halffm_GHHA     = "\xC5\x93";
const MillenniumVarun_halffm_GHA      = "\x49";
const MillenniumVarun_halffm_CA       = "\xC2\xAE";
const MillenniumVarun_halffm_JA_1     = "\x70";
const MillenniumVarun_halffm_JR_1     = "\xC3\xBC";
const MillenniumVarun_halffm_JR_2     = "\xC3\xBD";
const MillenniumVarun_halffm_NYC      = "\x67";
const MillenniumVarun_halffm_NYJ      = "\xC2\xA1";
const MillenniumVarun_halffm_JNY      = "\x25";
const MillenniumVarun_halffm_JHA      = "\x50";
const MillenniumVarun_halffm_NYA      = "\x5F";
const MillenniumVarun_halffm_NNA      = "\x43";
const MillenniumVarun_halffm_TA       = "\x6C";
const MillenniumVarun_halffm_TT       = "\xC3\x8A";
const MillenniumVarun_halffm_TR       = "\x24";
const MillenniumVarun_halffm_THA_1    = "\x4C";
const MillenniumVarun_halffm_DY       = "\xC3\x90";
const MillenniumVarun_halffm_DHA      = "\x4F";
const MillenniumVarun_halffm_NA       = "\x76";
const MillenniumVarun_halffm_NN       = "\x56";
const MillenniumVarun_halffm_PA_1     = "\x48";
const MillenniumVarun_halffm_PA_2     = "\x68";
const MillenniumVarun_halffm_PR_1     = "\xC3\x92";
const MillenniumVarun_halffm_PR_2     = "\xC3\x96";
const MillenniumVarun_halffm_PHA_1    = "\x68\xC3\x95\x77";
const MillenniumVarun_halffm_PHA_2    = "\x68\xC3\xA7\x77";
const MillenniumVarun_halffm_PHA_3    = "\x48\xC3\x95\x77";
const MillenniumVarun_halffm_PHA_4    = "\x48\xC3\xA7\x77";
const MillenniumVarun_halffm_BA       = "\x79";
const MillenniumVarun_halffm_BHA      = "\x59";
const MillenniumVarun_halffm_MA       = "\x63";
const MillenniumVarun_halffm_YA_1     = "\xC2\xAD";
const MillenniumVarun_halffm_YA_2     = "\xC2\xB3";
const MillenniumVarun_halffm_YA_3     = "\xC3\xAE";
const MillenniumVarun_halffm_RA       = "\x26";
const MillenniumVarun_halffm_LA       = "\x75";
const MillenniumVarun_halffm_VA_1     = "\x4A";
const MillenniumVarun_halffm_VA_2     = "\x6B";
const MillenniumVarun_halffm_VR_1     = "\xC2\xAC";
const MillenniumVarun_halffm_VR_2     = "\xC2\xAF";
const MillenniumVarun_halffm_VN       = "\xC3\x98";
const MillenniumVarun_halffm_SHA_1    = "\x4D";
const MillenniumVarun_halffm_SHA_2    = "\xC2\xB5";
const MillenniumVarun_halffm_SHA_3    = "\xC3\x8D";
const MillenniumVarun_halffm_SHR_1    = "\xC3\x8D\xC2\xB4";
const MillenniumVarun_halffm_SHR_2    = "\xC3\x9E";
const MillenniumVarun_halffm_SSA_1    = "\x3C";
const MillenniumVarun_halffm_SSA_2    = "\xC3\xB8";
const MillenniumVarun_halffm_SA       = "\x6D";
const MillenniumVarun_halffm_HA       = "\xC3\x94";
const MillenniumVarun_halffm_LLA      = "\xC3\x88";
const MillenniumVarun_halffm_RRA      = "\x4E";


//Conjuncts
const MillenniumVarun_conjct_KT_1    = "\xC3\x8A\xC3\x95\xC3\x80";
const MillenniumVarun_conjct_KT_2    = "\xC3\x8A\xC3\xA7\xC3\x80";
const MillenniumVarun_conjct_KR_1    = "\xC2\xAC\xC3\x95\xC3\x80";
const MillenniumVarun_conjct_KR_2    = "\xC2\xAC\xC3\xA7\xC3\x80";
const MillenniumVarun_conjct_KR_3    = "\xC2\xAF\xC3\x95\xC3\x80";
const MillenniumVarun_conjct_KR_4    = "\xC2\xAF\xC3\xA7\xC3\x80";
const MillenniumVarun_conjct_RK      = "\x6B\xC3\xA7\x26\xC3\x80";
const MillenniumVarun_conjct_KSH_1   = "\x23\xC3\x95";
const MillenniumVarun_conjct_KSH_2   = "\x23\xC3\xA7";
const MillenniumVarun_conjct_KHR_1   = "\xC2\xB8\xC3\x95";
const MillenniumVarun_conjct_KHR_2   = "\xC2\xB8\xC3\xA7";
const MillenniumVarun_conjct_GR_1    = "\xC3\xBB\xC3\x95";
const MillenniumVarun_conjct_GR_2    = "\xC3\xBB\xC3\xA7";
const MillenniumVarun_conjct_JNY_1   = "\x25\xC3\x95";
const MillenniumVarun_conjct_JNY_2   = "\x25\xC3\xA7";
const MillenniumVarun_conjct_NYC     = "\x67\xC3\x95";
const MillenniumVarun_conjct_NYJ     = "\xC2\xA1\xC3\x95";
const MillenniumVarun_conjct_JR_1    = "\xC3\xBC\xC3\x95";
const MillenniumVarun_conjct_JR_2    = "\xC3\xBD\xC3\x95";
const MillenniumVarun_conjct_TTTT    = "\x66";
const MillenniumVarun_conjct_TT_TTH  = "\xC3\xB9";
const MillenniumVarun_conjct_TTHTTH  = "\x72";
const MillenniumVarun_conjct_DDDD_1  = "\xC2\xB7";
const MillenniumVarun_conjct_DDDD_2  = "\xC2\xBA";
const MillenniumVarun_conjct_DD_DDH  = "\xC3\xBA";
const MillenniumVarun_conjct_DDHDDH  = "\xC2\xB6";
const MillenniumVarun_conjct_TT_1    = "\xC3\x8A\xC3\x95";
const MillenniumVarun_conjct_TT_2    = "\xC3\x8A\xC3\xA7";
const MillenniumVarun_conjct_TR_1    = "\x24\xC3\x95";
const MillenniumVarun_conjct_TR_2    = "\x24\xC3\xA7";
const MillenniumVarun_conjct_DG      = "\xC3\x83";
const MillenniumVarun_conjct_DD      = "\xC3\x8E";
const MillenniumVarun_conjct_D_DH_1  = "\xC3\x97";
const MillenniumVarun_conjct_D_DH_2  = "\xC3\xA0";
const MillenniumVarun_conjct_DB      = "\xC3\x82";
const MillenniumVarun_conjct_DBH     = "\x74";
const MillenniumVarun_conjct_DY_1    = "\xC3\x90\xC3\x95";
const MillenniumVarun_conjct_DY_2    = "\xC3\x90\xC3\xA7";
const MillenniumVarun_conjct_DV      = "\xC3\x9C";
const MillenniumVarun_conjct_DR      = "\xC3\xAA";
const MillenniumVarun_conjct_NN_1    = "\x56\xC3\x95";
const MillenniumVarun_conjct_NN_2    = "\x56\xC3\xA7";
const MillenniumVarun_conjct_PR_1    = "\xC3\x92\xC3\x95";
const MillenniumVarun_conjct_PR_2    = "\xC3\x92\xC3\xA7";
const MillenniumVarun_conjct_PR_3    = "\xC3\x96\xC3\x95";
const MillenniumVarun_conjct_PR_4    = "\xC3\x96\xC3\xA7";
const MillenniumVarun_conjct_VR_1    = "\xC2\xAC\xC3\x95";
const MillenniumVarun_conjct_VR_2    = "\xC2\xAC\xC3\xA7";
const MillenniumVarun_conjct_VR_3    = "\xC2\xAF\xC3\x95";
const MillenniumVarun_conjct_VR_4    = "\xC2\xAF\xC3\xA7";
const MillenniumVarun_conjct_VN      = "\xC3\x98\xC3\x95";
const MillenniumVarun_conjct_SHR_1   = "\xC3\x8D\xC2\xB4\xC3\x95";
const MillenniumVarun_conjct_SHR_2   = "\xC3\x9E\xC3\xA7";
const MillenniumVarun_conjct_SHC     = "\xC2\xBD\xC3\xA7";
const MillenniumVarun_conjct_SHV_1   = "\xC3\xA9\xC3\x95";
const MillenniumVarun_conjct_SHV_2   = "\xC3\xA9\xC3\xA7";
const MillenniumVarun_conjct_SSTT    = "\xC3\xA4";
const MillenniumVarun_conjct_SSTTH_1 = "\xC3\xB7";
const MillenniumVarun_conjct_SSTTH_2 = "\xC3\xBF";
const MillenniumVarun_conjct_HNN     = "\xE2\x80\x9D";
const MillenniumVarun_conjct_HL      = "\xC2\xBC";
const MillenniumVarun_conjct_HV      = "\xC2\xBB";
const MillenniumVarun_conjct_HY      = "\xC2\xBF\xC3\xA7";
const MillenniumVarun_conjct_RPHE    = "\x48\xC3\xA7\x26\xC3\xAD\xC3\x80";

//Combos
const MillenniumVarun_combo_KE       = "\x6B\xC3\xA7\xC3\xAD\xC3\x80";
const MillenniumVarun_combo_KEM      = "\x6B\xC3\xA7\x57\xC3\x80";
const MillenniumVarun_combo_KAM      = "\x6B\xC3\xA7\x62\xC3\x80";
const MillenniumVarun_combo_KUM      = "\x6B\xC3\xA7\xC3\xA1\x62\xC3\x80";
const MillenniumVarun_combo_KR       = "\x6B\xC3\xA7\x3D\xC3\x80";
const MillenniumVarun_combo_KU       = "\x6B\xC3\xA7\xC3\xA1\xC3\x80";
const MillenniumVarun_combo_KUU      = "\x6B\xC3\xA7\xC3\x93\xC3\x80";
const MillenniumVarun_combo_PHAI     = "\x48\xC3\xA7\xC3\x8C\xC3\x80";
const MillenniumVarun_combo_RU       = "\xC2\xA9";
const MillenniumVarun_combo_RUU      = "\xC2\xAA";
const MillenniumVarun_combo_HR       = "\xC3\x8B";

//Half forms of RA
const MillenniumVarun_halffm_RA_ANU  = "\xC2\xA5";
const MillenniumVarun_halffm_IIR     = "\xC3\xA7\x61";
const MillenniumVarun_halffm_EER_1   = "\x78";
const MillenniumVarun_halffm_EER_2   = "\x26\xC3\xAD";

//rakar
const MillenniumVarun_vattu_RA_1     = "\xC3\x8F";
const MillenniumVarun_vattu_RA_2     = "\xC2\xA3";
const MillenniumVarun_vattu_RA_3     = "\xC2\xB4";
const MillenniumVarun_vattu_RA_4     = "\x5E";

const MillenniumVarun_vattu_LA       = "\xC3\x81";
const MillenniumVarun_vattu_NA       = "\x3E";

const MillenniumVarun_misc_OM        = "\xC3\x9F";

//Matches ASCII
const MillenniumVarun_EXCLAM         = "\x21";
const MillenniumVarun_PAREN_LEFT     = "\x28";
const MillenniumVarun_PAREN_RIGHT    = "\x29";
const MillenniumVarun_COMMA          = "\x2C";
const MillenniumVarun_HYPHEN         = "\x2D";
const MillenniumVarun_PERIOD         = "\x2E";
const MillenniumVarun_SLASH          = "\x2F";
const MillenniumVarun_SEMICOLON      = "\x3B";
const MillenniumVarun_EQUALS         = "\xE2\x80\xA0";
const MillenniumVarun_QUESTION       = "\x3F";

//Does not match ASCII

//Devanagari Digits
const MillenniumVarun_digit_ZERO_DE  = "\x30";
const MillenniumVarun_digit_ONE_DE   = "\x31";
const MillenniumVarun_digit_TWO_DE   = "\x32";
const MillenniumVarun_digit_THREE_DE = "\x33";
const MillenniumVarun_digit_FOUR_DE  = "\x34";
const MillenniumVarun_digit_FIVE_DE  = "\x35";
const MillenniumVarun_digit_SIX_DE   = "\x36";
const MillenniumVarun_digit_SEVEN_DE = "\x37";
const MillenniumVarun_digit_EIGHT_DE = "\x38";
const MillenniumVarun_digit_NINE_DE  = "\x39";

//Digits
const MillenniumVarun_digit_ZERO  = "\xCB\x86";
const MillenniumVarun_digit_ONE   = "\xE2\x80\xB0";
const MillenniumVarun_digit_TWO   = "\xC5\xA0";
const MillenniumVarun_digit_FOUR  = "\xC5\x92";
const MillenniumVarun_digit_NINE  = "\xE2\x80\x98";

const MillenniumVarun_PLUS        = "\xC4\xA9";
const MillenniumVarun_MULTIPLY    = "\xC6\x92";
const MillenniumVarun_PERCENT     = "\xE2\x80\xA6";
const MillenniumVarun_LQTDOUBLE   = "\xE2\x80\x99";
const MillenniumVarun_RQTDOUBLE   = "\xE2\x80\x9C";

}

$MillenniumVarun_toPadma = array();

//Specials
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_avagraha]    = Padma::Padma_avagraha;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_anusvara]    = Padma::Padma_anusvara;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_candrabindu] = Padma::Padma_candrabindu;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_virama]      = Padma::Padma_syllbreak;
//MillenniumVarun.toPadma[MillenniumVarun.visarga]     = Padma::Padma_visarga;

//Vowels
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vowel_A_1]  = Padma::Padma_vowel_A;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vowel_A_2]  = Padma::Padma_vowel_A;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vowel_AA_1] = Padma::Padma_vowel_AA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vowel_AA_2] = Padma::Padma_vowel_AA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vowel_I]    = Padma::Padma_vowel_I;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vowel_II]   = Padma::Padma_vowel_II;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vowel_U]    = Padma::Padma_vowel_U;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vowel_UU]   = Padma::Padma_vowel_UU;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vowel_R]    = Padma::Padma_vowel_R;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vowel_EE]   = Padma::Padma_vowel_EE;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vowel_AI]   = Padma::Padma_vowel_AI;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vowel_CDR_O]= Padma::Padma_vowel_CDR_O;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vowel_OO_1] = Padma::Padma_vowel_OO;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vowel_OO_2] = Padma::Padma_vowel_OO;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vowel_AU_1] = Padma::Padma_vowel_AU;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vowel_AU_2] = Padma::Padma_vowel_AU;

//consonants
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_KA_1]  = Padma::Padma_consnt_KA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_KA_2]  = Padma::Padma_consnt_KA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_KA_3]  = Padma::Padma_consnt_KA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_KA_4]  = Padma::Padma_consnt_KA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_KHA_1] = Padma::Padma_consnt_KHA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_KHA_2] = Padma::Padma_consnt_KHA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_KHHA]  = Padma::Padma_consnt_KHHA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_GA_1]  = Padma::Padma_consnt_GA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_GA_2]  = Padma::Padma_consnt_GA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_GHHA]  = Padma::Padma_consnt_GHHA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_GHA_1] = Padma::Padma_consnt_GHA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_GHA_2] = Padma::Padma_consnt_GHA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_NGA]   = Padma::Padma_consnt_NGA;

$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_CA_1]  = Padma::Padma_consnt_CA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_CA_2]  = Padma::Padma_consnt_CA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_CHA]   = Padma::Padma_consnt_CHA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_JA_1]  = Padma::Padma_consnt_JA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_JA_2]  = Padma::Padma_consnt_JA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_JHA_1] = Padma::Padma_consnt_JHA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_JHA_2] = Padma::Padma_consnt_JHA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_NYA]   = Padma::Padma_consnt_NYA;

$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_TTA]   = Padma::Padma_consnt_TTA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_TTHA_1]= Padma::Padma_consnt_TTHA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_TTHA_2]= Padma::Padma_consnt_TTHA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_DDA]   = Padma::Padma_consnt_DDA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_DDDHA] = Padma::Padma_consnt_DDDHA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_DDHA]  = Padma::Padma_consnt_DDHA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_NNA_1] = Padma::Padma_consnt_NNA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_NNA_2] = Padma::Padma_consnt_NNA;

$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_TA_1]  = Padma::Padma_consnt_TA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_TA_2]  = Padma::Padma_consnt_TA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_THA_1] = Padma::Padma_consnt_THA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_THA_2] = Padma::Padma_consnt_THA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_DA_1]  = Padma::Padma_consnt_DA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_DHA_1] = Padma::Padma_consnt_DHA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_DHA_2] = Padma::Padma_consnt_DHA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_NA_1]  = Padma::Padma_consnt_NA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_NA_2]  = Padma::Padma_consnt_NA;

$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_PA_1]  = Padma::Padma_consnt_PA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_PA_2]  = Padma::Padma_consnt_PA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_PA_3]  = Padma::Padma_consnt_PA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_PA_4]  = Padma::Padma_consnt_PA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_PHA_1] = Padma::Padma_consnt_PHA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_PHA_2] = Padma::Padma_consnt_PHA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_PHA_3] = Padma::Padma_consnt_PHA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_PHA_4] = Padma::Padma_consnt_PHA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_BA_1]  = Padma::Padma_consnt_BA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_BA_2]  = Padma::Padma_consnt_BA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_BHA_1] = Padma::Padma_consnt_BHA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_BHA_2] = Padma::Padma_consnt_BHA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_MA_1]  = Padma::Padma_consnt_MA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_MA_2]  = Padma::Padma_consnt_MA;

$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_YA_1]  = Padma::Padma_consnt_YA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_YA_2]  = Padma::Padma_consnt_YA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_YA_3]  = Padma::Padma_consnt_YA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_YA_4]  = Padma::Padma_consnt_YA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_YA_5]  = Padma::Padma_consnt_YA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_YA_6]  = Padma::Padma_consnt_YA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_RA]    = Padma::Padma_consnt_RA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_LA_1]  = Padma::Padma_consnt_LA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_LA_2]  = Padma::Padma_consnt_LA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_LA_3]  = Padma::Padma_consnt_LA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_VA_1]  = Padma::Padma_consnt_VA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_VA_2]  = Padma::Padma_consnt_VA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_VA_3]  = Padma::Padma_consnt_VA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_VA_4]  = Padma::Padma_consnt_VA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_SHA_1] = Padma::Padma_consnt_SHA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_SHA_2] = Padma::Padma_consnt_SHA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_SHA_3] = Padma::Padma_consnt_SHA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_SHA_4] = Padma::Padma_consnt_SHA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_SSA_1] = Padma::Padma_consnt_SSA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_SSA_2] = Padma::Padma_consnt_SSA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_SSA_3] = Padma::Padma_consnt_SSA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_SSA_4] = Padma::Padma_consnt_SSA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_SA_1]  = Padma::Padma_consnt_SA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_SA_2]  = Padma::Padma_consnt_SA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_HA]    = Padma::Padma_consnt_HA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_consnt_LLA]   = Padma::Padma_consnt_LLA;

//Gunintamulu
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vowelsn_AA_1] = Padma::Padma_vowelsn_AA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vowelsn_AA_2] = Padma::Padma_vowelsn_AA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vowelsn_I_1]  = Padma::Padma_vowelsn_I;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vowelsn_I_2]  = Padma::Padma_vowelsn_I;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vowelsn_I_3]  = Padma::Padma_vowelsn_I;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vowelsn_II_1] = Padma::Padma_vowelsn_II;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vowelsn_II_2] = Padma::Padma_vowelsn_II;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vowelsn_U_1]  = Padma::Padma_vowelsn_U;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vowelsn_U_2]  = Padma::Padma_vowelsn_U;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vowelsn_UU_1] = Padma::Padma_vowelsn_UU;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vowelsn_UU_2] = Padma::Padma_vowelsn_UU;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vowelsn_R_1]  = Padma::Padma_vowelsn_R;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vowelsn_R_2]  = Padma::Padma_vowelsn_R;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vowelsn_R_3]  = Padma::Padma_vowelsn_R;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vowelsn_CDR_E]= Padma::Padma_vowelsn_CDR_E;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vowelsn_CDR_O]= Padma::Padma_vowelsn_CDR_O;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vowelsn_EE_1] = Padma::Padma_vowelsn_EE;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vowelsn_AI_1] = Padma::Padma_vowelsn_AI;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vowelsn_AI_2] = Padma::Padma_vowelsn_AI;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vowelsn_OO]   = Padma::Padma_vowelsn_OO;

//Matra . anusvara
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vowelsn_IM]   = Padma::Padma_vowelsn_I . Padma::Padma_anusvara;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vowelsn_IIM_1]= Padma::Padma_vowelsn_II . Padma::Padma_anusvara;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vowelsn_IIM_2]= Padma::Padma_vowelsn_II . Padma::Padma_anusvara;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vowelsn_IIM_3]= Padma::Padma_vowelsn_II . Padma::Padma_anusvara;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vowelsn_AIM]  = Padma::Padma_vowelsn_AI . Padma::Padma_anusvara;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vowelsn_OOM]  = Padma::Padma_vowelsn_OO . Padma::Padma_anusvara;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vowelsn_EEM]  = Padma::Padma_vowelsn_EE . Padma::Padma_anusvara;

//half forms
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_KA_1] = Padma::Padma_halffm_KA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_KA_2] = Padma::Padma_halffm_KA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_KA_3] = Padma::Padma_halffm_KA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_KA_4] = Padma::Padma_halffm_KA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_KR_1] = Padma::Padma_halffm_KA . Padma::Padma_halffm_RA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_KR_2] = Padma::Padma_halffm_KA . Padma::Padma_halffm_RA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_KR_3] = Padma::Padma_halffm_KA . Padma::Padma_halffm_RA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_KR_4] = Padma::Padma_halffm_KA . Padma::Padma_halffm_RA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_KSH]  = Padma::Padma_halffm_KA . Padma::Padma_halffm_SSA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_KHA_1]= Padma::Padma_halffm_KHA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_KHHA] = Padma::Padma_halffm_KHHA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_KHR]  = Padma::Padma_halffm_KHA . Padma::Padma_halffm_RA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_GA]   = Padma::Padma_halffm_GA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_GR]   = Padma::Padma_halffm_GA . Padma::Padma_halffm_RA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_GHHA] = Padma::Padma_halffm_GHHA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_GHA]  = Padma::Padma_halffm_GHA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_CA]   = Padma::Padma_halffm_CA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_JA_1] = Padma::Padma_halffm_JA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_JR_1] = Padma::Padma_halffm_JA . Padma::Padma_halffm_RA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_JR_2] = Padma::Padma_halffm_JA . Padma::Padma_halffm_RA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_NYC]  = Padma::Padma_halffm_NYA . Padma::Padma_halffm_CA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_NYJ]  = Padma::Padma_halffm_NYA . Padma::Padma_halffm_JA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_JNY]  = Padma::Padma_halffm_JA . Padma::Padma_halffm_NYA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_JHA]  = Padma::Padma_halffm_JHA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_NYA]  = Padma::Padma_halffm_NYA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_NNA]  = Padma::Padma_halffm_NNA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_TA]   = Padma::Padma_halffm_TA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_TT]   = Padma::Padma_halffm_TA . Padma::Padma_halffm_TA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_TR]   = Padma::Padma_halffm_TA . Padma::Padma_halffm_RA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_THA_1]= Padma::Padma_halffm_THA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_DY]   = Padma::Padma_halffm_DA . Padma::Padma_halffm_YA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_DHA]  = Padma::Padma_halffm_DHA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_NA]   = Padma::Padma_halffm_NA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_NN]   = Padma::Padma_halffm_NA . Padma::Padma_halffm_NA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_PA_1] = Padma::Padma_halffm_PA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_PA_2] = Padma::Padma_halffm_PA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_PR_1] = Padma::Padma_halffm_PA . Padma::Padma_halffm_RA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_PR_2] = Padma::Padma_halffm_PA . Padma::Padma_halffm_RA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_PHA_1]= Padma::Padma_halffm_PHA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_PHA_2]= Padma::Padma_halffm_PHA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_PHA_3]= Padma::Padma_halffm_PHA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_PHA_4]= Padma::Padma_halffm_PHA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_BA]   = Padma::Padma_halffm_BA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_BHA]  = Padma::Padma_halffm_BHA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_MA]   = Padma::Padma_halffm_MA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_YA_1] = Padma::Padma_halffm_YA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_YA_2] = Padma::Padma_halffm_YA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_YA_3] = Padma::Padma_halffm_YA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_RA]   = Padma::Padma_halffm_RA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_LA]   = Padma::Padma_halffm_LA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_VA_1] = Padma::Padma_halffm_VA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_VA_2] = Padma::Padma_halffm_VA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_VR_1] = Padma::Padma_halffm_VA . Padma::Padma_halffm_RA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_VR_2] = Padma::Padma_halffm_VA . Padma::Padma_halffm_RA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_SHA_1]= Padma::Padma_halffm_SHA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_SHA_2]= Padma::Padma_halffm_SHA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_SHA_3]= Padma::Padma_halffm_SHA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_SHR_1]= Padma::Padma_halffm_SHA . Padma::Padma_halffm_RA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_SHR_2]= Padma::Padma_halffm_SHA . Padma::Padma_halffm_RA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_SSA_1]= Padma::Padma_halffm_SSA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_SSA_2]= Padma::Padma_halffm_SSA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_SA]   = Padma::Padma_halffm_SA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_HA]   = Padma::Padma_halffm_HA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_LLA]  = Padma::Padma_halffm_LLA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_RRA]  = Padma::Padma_halffm_RRA;

//Conjuncts
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_KT_1]  = Padma::Padma_consnt_KA . Padma::Padma_vattu_TA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_KT_2]  = Padma::Padma_consnt_KA . Padma::Padma_vattu_TA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_KR_1]  = Padma::Padma_consnt_KA . Padma::Padma_vattu_RA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_KR_2]  = Padma::Padma_consnt_KA . Padma::Padma_vattu_RA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_KR_3]  = Padma::Padma_consnt_KA . Padma::Padma_vattu_RA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_KR_4]  = Padma::Padma_consnt_KA . Padma::Padma_vattu_RA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_RK]    = Padma::Padma_consnt_RA . Padma::Padma_vattu_KA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_KSH_1] = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_KSH_2] = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_KHR_1] = Padma::Padma_consnt_KHA . Padma::Padma_vattu_RA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_KHR_2] = Padma::Padma_consnt_KHA . Padma::Padma_vattu_RA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_GR_1]  = Padma::Padma_consnt_GA . Padma::Padma_vattu_RA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_GR_2]  = Padma::Padma_consnt_GA . Padma::Padma_vattu_RA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_JNY_1] = Padma::Padma_consnt_JA . Padma::Padma_vattu_NYA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_JNY_2] = Padma::Padma_consnt_JA . Padma::Padma_vattu_NYA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_NYC]   = Padma::Padma_consnt_NYA . Padma::Padma_vattu_CA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_NYJ]   = Padma::Padma_consnt_NYA . Padma::Padma_vattu_JA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_JR_1]  = Padma::Padma_consnt_JA . Padma::Padma_vattu_JA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_JR_2]  = Padma::Padma_consnt_JA . Padma::Padma_vattu_JA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_TTTT]  = Padma::Padma_consnt_TTA . Padma::Padma_vattu_TTA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_TT_TTH]= Padma::Padma_consnt_TTA . Padma::Padma_vattu_TTHA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_TTHTTH]= Padma::Padma_consnt_TTHA . Padma::Padma_vattu_TTHA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_DDDD_1]= Padma::Padma_consnt_DDA . Padma::Padma_vattu_DDA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_DDDD_2]= Padma::Padma_consnt_DDA . Padma::Padma_vattu_DDA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_DD_DDH]= Padma::Padma_consnt_DDA . Padma::Padma_vattu_DDHA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_DDHDDH]= Padma::Padma_consnt_DDHA . Padma::Padma_vattu_DDHA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_TT_1]  = Padma::Padma_consnt_TA . Padma::Padma_vattu_TA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_TT_2]  = Padma::Padma_consnt_TA . Padma::Padma_vattu_TA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_TR_1]  = Padma::Padma_consnt_TA . Padma::Padma_vattu_RA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_TR_2]  = Padma::Padma_consnt_TA . Padma::Padma_vattu_RA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_DG]    = Padma::Padma_consnt_DA . Padma::Padma_vattu_GA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_DD]    = Padma::Padma_consnt_DA . Padma::Padma_vattu_DA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_D_DH_1]= Padma::Padma_consnt_DA . Padma::Padma_vattu_DHA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_D_DH_2]= Padma::Padma_consnt_DA . Padma::Padma_vattu_DHA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_DB]    = Padma::Padma_consnt_DA . Padma::Padma_vattu_BA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_DBH]   = Padma::Padma_consnt_DA . Padma::Padma_vattu_BHA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_DY_1]  = Padma::Padma_consnt_DA . Padma::Padma_vattu_YA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_DY_2]  = Padma::Padma_consnt_DA . Padma::Padma_vattu_YA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_DV]    = Padma::Padma_consnt_DA . Padma::Padma_vattu_VA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_DR]    = Padma::Padma_consnt_DA . Padma::Padma_vattu_RA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_NN_1]  = Padma::Padma_consnt_NA . Padma::Padma_vattu_NA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_NN_2]  = Padma::Padma_consnt_NA . Padma::Padma_vattu_NA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_PR_1]  = Padma::Padma_consnt_PA . Padma::Padma_vattu_RA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_PR_2]  = Padma::Padma_consnt_PA . Padma::Padma_vattu_RA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_PR_3]  = Padma::Padma_consnt_PA . Padma::Padma_vattu_RA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_PR_4]  = Padma::Padma_consnt_PA . Padma::Padma_vattu_RA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_VR_1]  = Padma::Padma_consnt_VA . Padma::Padma_vattu_RA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_VR_2]  = Padma::Padma_consnt_VA . Padma::Padma_vattu_RA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_VR_3]  = Padma::Padma_consnt_VA . Padma::Padma_vattu_RA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_VR_4]  = Padma::Padma_consnt_VA . Padma::Padma_vattu_RA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_VN]    = Padma::Padma_consnt_VA . Padma::Padma_vattu_NA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_SHR_1] = Padma::Padma_consnt_SHA . Padma::Padma_vattu_RA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_SHR_2] = Padma::Padma_consnt_SHA . Padma::Padma_vattu_RA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_SHC]   = Padma::Padma_consnt_SHA . Padma::Padma_vattu_CA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_SHV_1] = Padma::Padma_consnt_SHA . Padma::Padma_vattu_VA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_SHV_2] = Padma::Padma_consnt_SHA . Padma::Padma_vattu_VA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_SSTT]  = Padma::Padma_consnt_SSA . Padma::Padma_vattu_TTA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_SSTTH_1]= Padma::Padma_consnt_SSA . Padma::Padma_vattu_TTHA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_SSTTH_2]= Padma::Padma_consnt_SSA . Padma::Padma_vattu_TTHA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_HNN]    = Padma::Padma_consnt_HA . Padma::Padma_vattu_NNA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_HL]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_LA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_HV]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_VA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_HY]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_YA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_conjct_RPHE]   = Padma::Padma_consnt_RA . Padma::Padma_vattu_PHA . Padma::Padma_vowelsn_EE;

//Combos
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_combo_KE]  = Padma::Padma_consnt_KA . Padma::Padma_vowelsn_EE;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_combo_KEM] = Padma::Padma_consnt_KA . Padma::Padma_vowelsn_EE . Padma::Padma_anusvara;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_combo_KAM] = Padma::Padma_consnt_KA . Padma::Padma_anusvara;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_combo_KUM] = Padma::Padma_consnt_KA . Padma::Padma_vowelsn_U . Padma::Padma_anusvara;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_combo_KR]  = Padma::Padma_consnt_KA . Padma::Padma_vowelsn_R;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_combo_KU]  = Padma::Padma_consnt_KA . Padma::Padma_vowelsn_U;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_combo_KUU] = Padma::Padma_consnt_KA . Padma::Padma_vowelsn_UU;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_combo_PHAI]= Padma::Padma_consnt_PHA . Padma::Padma_vowelsn_AI;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_combo_RU]  = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_U;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_combo_RUU] = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_UU;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_combo_HR]  = Padma::Padma_consnt_HA . Padma::Padma_vowelsn_R;

//Half forms of RA
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_RA_ANU] = Padma::Padma_halffm_RA . Padma::Padma_anusvara;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_IIR]    = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_II;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_EER_1]  = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_EE;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_halffm_EER_2]  = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_EE;

$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vattu_RA_1]    = Padma::Padma_vattu_RA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vattu_RA_2]    = Padma::Padma_vattu_RA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vattu_RA_3]    = Padma::Padma_vattu_RA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vattu_RA_4]    = Padma::Padma_vattu_RA;

$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vattu_LA]      = Padma::Padma_vattu_LA;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_vattu_NA]      = Padma::Padma_vattu_NA;

$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_misc_OM]       = Padma::Padma_om;

//Devanagari Digits
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_digit_ZERO_DE]  = Padma::Padma_digit_ZERO;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_digit_ONE_DE]   = Padma::Padma_digit_ONE;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_digit_TWO_DE]   = Padma::Padma_digit_TWO;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_digit_THREE_DE] = Padma::Padma_digit_THREE;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_digit_FOUR_DE]  = Padma::Padma_digit_FOUR;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_digit_FIVE_DE]  = Padma::Padma_digit_FIVE;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_digit_SIX_DE]   = Padma::Padma_digit_SIX;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_digit_SEVEN_DE] = Padma::Padma_digit_SEVEN;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_digit_EIGHT_DE] = Padma::Padma_digit_EIGHT;
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_digit_NINE_DE]  = Padma::Padma_digit_NINE;

//Digits
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_digit_ZERO]  = '0';
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_digit_ONE]   = '1';
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_digit_TWO]   = '2';
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_digit_FOUR]  = '4';
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_digit_NINE]  = '9';

$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_PLUS]        = "\x2B";
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_MULTIPLY]    = "\xC3\x97";
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_PERCENT]     = "%";
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_LQTDOUBLE]   = "\xE2\x80\x9C";
$MillenniumVarun_toPadma[MillenniumVarun::MillenniumVarun_RQTDOUBLE]   = "\xE2\x80\x9D";


$MillenniumVarun_prefixList = array();
$MillenniumVarun_prefixList[MillenniumVarun::MillenniumVarun_vowelsn_I_1] = true;
$MillenniumVarun_prefixList[MillenniumVarun::MillenniumVarun_vowelsn_I_2] = true;
$MillenniumVarun_prefixList[MillenniumVarun::MillenniumVarun_vowelsn_I_3] = true;
$MillenniumVarun_prefixList[MillenniumVarun::MillenniumVarun_vowelsn_IM]  = true;

$MillenniumVarun_suffixList = array();
$MillenniumVarun_suffixList[MillenniumVarun::MillenniumVarun_halffm_RA]     = true;
$MillenniumVarun_suffixList[MillenniumVarun::MillenniumVarun_halffm_RA_ANU] = true;
$MillenniumVarun_suffixList[MillenniumVarun::MillenniumVarun_halffm_IIR]    = true;
$MillenniumVarun_suffixList[MillenniumVarun::MillenniumVarun_halffm_EER_1]  = true;
$MillenniumVarun_suffixList[MillenniumVarun::MillenniumVarun_halffm_EER_2]  = true;

$MillenniumVarun_redundantList = array();

$MillenniumVarun_overloadList = array();
$MillenniumVarun_overloadList["\x44"]     = true;
$MillenniumVarun_overloadList["\x44\xC3\x95\xC3\xA7"] = true;
$MillenniumVarun_overloadList["\xC3\xA7"] = true;
$MillenniumVarun_overloadList["\xC3\xA9"] = true;
$MillenniumVarun_overloadList["\xC2\xBF"] = true;
$MillenniumVarun_overloadList["\xC2\xBD"] = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_vowel_A_1]   = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_vowel_A_2]   = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_vowel_AA_1]  = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_vowel_AA_2]  = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_vowel_EE]    = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_vowel_I]     = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_vowelsn_AA_1]= true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_vowelsn_AA_2]= true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_halffm_KSH]  = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_halffm_KHA_1]= true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_halffm_KHHA] = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_halffm_KHR]  = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_halffm_GA]   = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_halffm_GR]   = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_halffm_GHHA] = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_halffm_GHA]  = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_halffm_CA]   = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_halffm_JA_1] = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_halffm_NYC]  = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_halffm_NYJ]  = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_halffm_NYA]  = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_halffm_JNY]  = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_halffm_JHA]  = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_halffm_NNA]  = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_halffm_TA]   = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_halffm_TT]   = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_conjct_TT_1] = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_conjct_TT_2] = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_halffm_TR]   = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_conjct_TR_1] = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_conjct_TR_2] = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_halffm_THA_1]= true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_halffm_DY]   = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_halffm_DHA]  = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_halffm_NA]   = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_halffm_NN]   = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_halffm_PA_1] = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_halffm_PA_2] = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_consnt_PA_1] = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_consnt_PA_2] = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_consnt_PA_3] = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_consnt_PA_4] = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_halffm_PR_1] = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_halffm_PR_2] = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_halffm_BA]   = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_halffm_BHA]  = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_halffm_MA]   = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_halffm_YA_1] = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_halffm_YA_2] = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_halffm_YA_3] = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_halffm_LA]   = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_consnt_VA_1] = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_consnt_VA_2] = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_consnt_VA_3] = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_consnt_VA_4] = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_halffm_VA_1] = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_halffm_VA_2] = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_halffm_VR_1] = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_halffm_VR_2] = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_conjct_VR_1] = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_conjct_VR_2] = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_conjct_VR_3] = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_conjct_VR_4] = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_halffm_VN]   = true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_halffm_SHA_1]= true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_halffm_SHA_2]= true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_halffm_SHA_3]= true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_halffm_SHR_1]= true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_halffm_SHR_2]= true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_halffm_SSA_1]= true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_halffm_SSA_2]= true;
$MillenniumVarun_overloadList[MillenniumVarun::MillenniumVarun_halffm_SA]   = true;
$MillenniumVarun_overloadList["\x6B\xC3\xA7\xC3\xAD"]     = true;
$MillenniumVarun_overloadList["\x6B\xC3\xA7\x3D"]         = true;
$MillenniumVarun_overloadList["\x6B\xC3\xA7\xC3\xA1"]     = true;
$MillenniumVarun_overloadList["\x6B\xC3\xA7\xC3\xA1\x62"] = true;
$MillenniumVarun_overloadList["\x6B\xC3\xA7\x57"]         = true;
$MillenniumVarun_overloadList["\x6B\xC3\xA7\x62"]         = true;
$MillenniumVarun_overloadList["\xC3\xA7\x62"]             = true;
$MillenniumVarun_overloadList["\x6B\xC3\xA7\xC3\x93"]     = true;
$MillenniumVarun_overloadList["\x48\xC3\xA7\xC3\x8C"]     = true;
$MillenniumVarun_overloadList["\x6B\xC3\xA7\x26"]         = true;
$MillenniumVarun_overloadList["\x48\xC3\xA7\x26"]         = true;
$MillenniumVarun_overloadList["\x48\xC3\xA7\x26\xC3\xAD"] = true;

function MillenniumVarun_initialize()
{
    global $fontinfo;

    $fontinfo["millenniumvarun"]["language"] = "Devanagari";
    $fontinfo["millenniumvarun"]["class"] = "MillenniumVarun";
    $fontinfo["millenniumvarunfx"]["language"] = "Devanagari";
    $fontinfo["millenniumvarunfx"]["class"] = "MillenniumVarun";
}

?>
