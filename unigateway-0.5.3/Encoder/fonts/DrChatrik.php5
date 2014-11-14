<?php
/* ***** BEGIN LICENSE BLOCK *****
 *
 *  This file is originally part of Padma.
 *
 *  Copyright (C) 2006-2007 AP Singh Alam <aalam@users.sf.net> 
 *  Copyright (C) 2006-2007 Punjabi Open Source Team (POST) http://www.satluj.org/ 
 *  Copyright (C) 2007 Nagarjuna Venna <vnagarjuna@yahoo.com>
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
/* drchatrik means 'Dani Ram Chatrik */

//DRChatrikWeb
class DrChatrik
{
function DrChatrik()
{
}

//The inter45ce every dynamic font encoding should implement
var $maxLookupLen = 2;
var $fontFace     = "drchatrikweb";
var $displayName  = "DrChatrik";
var $script       = Padma::Padma_script_GURMUKHI;
var $hasSuffixes  = false;

function lookup ($str) 
{
    global $DrChatrik_toPadma;
    return $DrChatrik_toPadma[$str];
}

function isPrefixSymbol ($str)
{
    global $DrChatrik_prefixList;
    return array_key_exists($str, $DrChatrik_prefixList);
}

function isSuffixSymbol ($str)
{
    global $DrChatrik_suffixList;
    return array_key_exists($str, $DrChatrik_suffixList);
}

function isOverloaded ($str)
{
    global $DrChatrik_overloadList;
    return array_key_exists($str, $DrChatrik_overloadList);
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
    global $DrChatrik_redundantList;
    return array_key_exists($str, $DrChatrik_redundantList);
}

//This font unfortunately overloads period and nukta...
//TODO: 218, 214,  181-184, 149-151, 130, 132 - 135, 153, 173, 

//Vowels
const DrChatrik_vowel_A        = "\x61";
const DrChatrik_vowel_AA       = "\x61\x66";
const DrChatrik_vowel_I        = "\x65\x69";
const DrChatrik_vowel_II       = "\x65\x49";
const DrChatrik_vowel_U        = "\x41\x75";
const DrChatrik_vowel_UU_1     = "\x41\x55";
const DrChatrik_vowel_UU_2     = "\x41\xC2\xA8";
const DrChatrik_vowel_EE       = "\x69\x79";
const DrChatrik_vowel_AI       = "\x61\x59";
const DrChatrik_vowel_OO       = "\x45";
const DrChatrik_vowel_AU       = "\x61\x4F";

//Consonants
const DrChatrik_consnt_KA	= "\x6B";
const DrChatrik_consnt_KHA	= "\x4B";
const DrChatrik_consnt_GA	= "\x67";
const DrChatrik_consnt_GHA	= "\x47";
const DrChatrik_consnt_NGA	= "\xC3\x95";
const DrChatrik_consnt_CA	= "\x63";
const DrChatrik_consnt_CHA	= "\x43";
const DrChatrik_consnt_JA	= "\x6A";
const DrChatrik_consnt_JHA	= "\x4A";
const DrChatrik_consnt_NYA	= "\xC3\x96";
const DrChatrik_consnt_TTA	= "\x74";
const DrChatrik_consnt_TTHA	= "\x54";
const DrChatrik_consnt_DDA	= "\x7A";
const DrChatrik_consnt_DDHA	= "\x5A";
const DrChatrik_consnt_NNA	= "\x78";
const DrChatrik_consnt_TA	= "\x71";
const DrChatrik_consnt_THA	= "\x51";
const DrChatrik_consnt_DA	= "\x64";
const DrChatrik_consnt_DHA	= "\x44";
const DrChatrik_consnt_NA	= "\x6E";
const DrChatrik_consnt_PA	= "\x70";
const DrChatrik_consnt_PHA	= "\x50";
const DrChatrik_consnt_BA	= "\x62";
const DrChatrik_consnt_BHA	= "\x42";
const DrChatrik_consnt_MA	= "\x6D";
const DrChatrik_consnt_YA	= "\x58";
const DrChatrik_consnt_RA	= "\x72";
const DrChatrik_consnt_LA	= "\x6C";
const DrChatrik_consnt_LLA	= "\xC3\x9C";
const DrChatrik_consnt_VA	= "\x76";
const DrChatrik_consnt_SHA	= "\xC3\x88";
const DrChatrik_consnt_SA	= "\x73";
const DrChatrik_consnt_HA	= "\x68";

//Additional consonants
const DrChatrik_consnt_KHHA	= "\xC3\x89";
const DrChatrik_consnt_GHHA	= "\xC3\x8A";
const DrChatrik_consnt_ZA	= "\xC3\x8B";
const DrChatrik_consnt_RRA	= "\x56";
const DrChatrik_consnt_FA	= "\xC3\x8C";

//Vowel $signs
const DrChatrik_vowelsn_AA    = "\x66";     //kaana
const DrChatrik_vowelsn_I     = "\x69";     //sihari
const DrChatrik_vowelsn_II    = "\x49";     //bihari
const DrChatrik_vowelsn_U     = "\x75";     //aunkar
const DrChatrik_vowelsn_UU_1  = "\x55";     //dulainkar
const DrChatrik_vowelsn_UU_2  = "\xC2\xA8";     //dulainkar
const DrChatrik_vowelsn_EE    = "\x79";     //lanvan
const DrChatrik_vowelsn_AI    = "\x59";     //dulanvan
const DrChatrik_vowelsn_OO    = "\x6F";     //hora
const DrChatrik_vowelsn_AU    = "\x4F";     //kanaura

/* Latin Digit - Used in Punjabi - Updated on 19 March 2007*/
const DrChatrik_digit_ZERO    = "\x30";
const DrChatrik_digit_ONE     = "\x31";
const DrChatrik_digit_TWO     = "\x32";
const DrChatrik_digit_THREE   = "\x33";
const DrChatrik_digit_FOUR    = "\x34";
const DrChatrik_digit_FIVE    = "\x35";
const DrChatrik_digit_SIX     = "\x36";
const DrChatrik_digit_SEVEN   = "\x37";
const DrChatrik_digit_EIGHT   = "\x38";
const DrChatrik_digit_NINE    = "\x39";

//Conjuncts - half forms KA is only for Reference*/
const DrChatrik_vattu_RA_1    = "\x52";
const DrChatrik_vattu_RA_2    = "\xC2\xAE";
const DrChatrik_vattu_CA      = "\xC3\xA7";
const DrChatrik_vattu_TTA     = "\xE2\x80\xA0";
const DrChatrik_vattu_TA      = "\xC5\x93";
const DrChatrik_vattu_NA      = "\xCB\x9C";
const DrChatrik_vattu_HA      = "\x48";
const DrChatrik_vattu_VA      = "\xC3\x8D";
const DrChatrik_vattu_YA_1    = "\xC3\x8E";
const DrChatrik_vattu_YA_2    = "\xC3\x8F";

//
const DrChatrik_vowelsn_AA_BINDI = "\x46";
const DrChatrik_conjct_NA_vowelUU_TIPPi = "\xC6\x92";

//Gurmukhi Misc - Updated on 19March2007/
const DrChatrik_misc_BINDI    = "\x4E";
const DrChatrik_misc_TIPPI_1	= "\x53";
const DrChatrik_misc_TIPPI_2	= "\xC2\xB5";
const DrChatrik_misc_TIPPI_3	= "\xC2\xBC";
const DrChatrik_misc_TIPPI_4	= "\x4D";
const DrChatrik_misc_TIPPI_5	= "\xC3\x80";
const DrChatrik_misc_TIPPI_6	= "\xC3\x81";
const DrChatrik_misc_ADDAK_1  = "\x77";
const DrChatrik_misc_ADDAK_2  = "\x57";
const DrChatrik_misc_DANDA_1  = "\xC2\xAE";
const DrChatrik_misc_DANDA_2  = "\xC2\xBB";
const DrChatrik_misc_DANDA_3  = "\x7C";
const DrChatrik_misc_DDANDA_1 = "\x5D";
const DrChatrik_misc_DDANDA_2 = "\xC2\xAB";
const DrChatrik_misc_DDANDA_3 = "\xC3\x92";
const DrChatrik_misc_IRI      = "\x69";
const DrChatrik_misc_URA      = "\x41";
const DrChatrik_misc_EKONKAR_1 = "\xC3\x83";
const DrChatrik_misc_EKONKAR_2 = "\xC3\x85";
const DrChatrik_misc_KHANDA   = "\xC3\x87";


//Matches ASCII
const DrChatrik_misc_QTDOUBLE  = "\x22";
const DrChatrik_misc_QTSINGLE  = "\x27";

//Does not match ASCII
const DrChatrik_PERIOD         = "\x2E";
const DrChatrik_PERCENT        = "\x25";
const DrChatrik_LESSTHAN       = "\x3C";
const DrChatrik_LQTSINGLE      = "\xC3\x92";
const DrChatrik_RQTSINGLE      = "\xC3\x93";
const DrChatrik_LQTDOUBLE      = "\x54";
const DrChatrik_RQTDOUBLE      = "\x55";
const DrChatrik_TILDE          = "\xCB\x9C";
const DrChatrik_GREATERTHAN    = "\x3E";
const DrChatrik_SQBKTLEFT      = "\x5B";
const DrChatrik_SQBKTRIGHT     = "\x5D";
const DrChatrik_PARENLEFT      = "\x28";
const DrChatrik_PARENRIGHT     = "\x29";
const DrChatrik_HYPHEN         = "\x2D";
const DrChatrik_SLASH          = "\x5C";
const DrChatrik_COLON          = "\x3A";
const DrChatrik_SEMICOLON      = "\x3B";
const DrChatrik_EQUALS         = "\x3D";
const DrChatrik_QUESTION       = "\x3F";
const DrChatrik_ATSIGN         = "\x27";
const DrChatrik_COMMA          = "\xC2\xAD";
const DrChatrik_EXCLAMATION    = "\x21";
const DrChatrik_BACKSLASH      = "\x2F";

}

$DrChatrik_toPadma = array();

$DrChatrik_toPadma[DrChatrik::DrChatrik_vowel_A]    = Padma::Padma_vowel_A;
$DrChatrik_toPadma[DrChatrik::DrChatrik_vowel_AA]   = Padma::Padma_vowel_AA;
$DrChatrik_toPadma[DrChatrik::DrChatrik_vowel_I]    = Padma::Padma_vowel_I;
$DrChatrik_toPadma[DrChatrik::DrChatrik_vowel_II]   = Padma::Padma_vowel_II;
$DrChatrik_toPadma[DrChatrik::DrChatrik_vowel_U]    = Padma::Padma_vowel_U;
$DrChatrik_toPadma[DrChatrik::DrChatrik_vowel_UU_1] = Padma::Padma_vowel_UU;
$DrChatrik_toPadma[DrChatrik::DrChatrik_vowel_UU_2] = Padma::Padma_vowel_UU;
$DrChatrik_toPadma[DrChatrik::DrChatrik_vowel_EE]   = Padma::Padma_vowel_EE;
$DrChatrik_toPadma[DrChatrik::DrChatrik_vowel_AI]   = Padma::Padma_vowel_AI;
$DrChatrik_toPadma[DrChatrik::DrChatrik_vowel_OO]   = Padma::Padma_vowel_OO;
$DrChatrik_toPadma[DrChatrik::DrChatrik_vowel_AU]   = Padma::Padma_vowel_AU;

$DrChatrik_toPadma[DrChatrik::DrChatrik_consnt_KA]  = Padma::Padma_consnt_KA;
$DrChatrik_toPadma[DrChatrik::DrChatrik_consnt_KHA] = Padma::Padma_consnt_KHA;
$DrChatrik_toPadma[DrChatrik::DrChatrik_consnt_GA]  = Padma::Padma_consnt_GA;
$DrChatrik_toPadma[DrChatrik::DrChatrik_consnt_GHA] = Padma::Padma_consnt_GHA;
$DrChatrik_toPadma[DrChatrik::DrChatrik_consnt_NGA] = Padma::Padma_consnt_NGA;
$DrChatrik_toPadma[DrChatrik::DrChatrik_consnt_CA]  = Padma::Padma_consnt_CA;
$DrChatrik_toPadma[DrChatrik::DrChatrik_consnt_CHA] = Padma::Padma_consnt_CHA;
$DrChatrik_toPadma[DrChatrik::DrChatrik_consnt_JA]  = Padma::Padma_consnt_JA;
$DrChatrik_toPadma[DrChatrik::DrChatrik_consnt_JHA] = Padma::Padma_consnt_JHA;
$DrChatrik_toPadma[DrChatrik::DrChatrik_consnt_NYA] = Padma::Padma_consnt_NYA;
$DrChatrik_toPadma[DrChatrik::DrChatrik_consnt_TTA] = Padma::Padma_consnt_TTA;
$DrChatrik_toPadma[DrChatrik::DrChatrik_consnt_TTHA] = Padma::Padma_consnt_TTHA;
$DrChatrik_toPadma[DrChatrik::DrChatrik_consnt_DDA] = Padma::Padma_consnt_DDA;
$DrChatrik_toPadma[DrChatrik::DrChatrik_consnt_DDHA] = Padma::Padma_consnt_DDHA;
$DrChatrik_toPadma[DrChatrik::DrChatrik_consnt_NNA] = Padma::Padma_consnt_NNA;
$DrChatrik_toPadma[DrChatrik::DrChatrik_consnt_TA]  = Padma::Padma_consnt_TA;
$DrChatrik_toPadma[DrChatrik::DrChatrik_consnt_THA] = Padma::Padma_consnt_THA;
$DrChatrik_toPadma[DrChatrik::DrChatrik_consnt_DA]  = Padma::Padma_consnt_DA;
$DrChatrik_toPadma[DrChatrik::DrChatrik_consnt_DHA] = Padma::Padma_consnt_DHA;
$DrChatrik_toPadma[DrChatrik::DrChatrik_consnt_NA]  = Padma::Padma_consnt_NA;
$DrChatrik_toPadma[DrChatrik::DrChatrik_consnt_PA]  = Padma::Padma_consnt_PA;
$DrChatrik_toPadma[DrChatrik::DrChatrik_consnt_PHA] = Padma::Padma_consnt_PHA;
$DrChatrik_toPadma[DrChatrik::DrChatrik_consnt_BA]  = Padma::Padma_consnt_BA;
$DrChatrik_toPadma[DrChatrik::DrChatrik_consnt_BHA] = Padma::Padma_consnt_BHA;
$DrChatrik_toPadma[DrChatrik::DrChatrik_consnt_MA]  = Padma::Padma_consnt_MA;
$DrChatrik_toPadma[DrChatrik::DrChatrik_consnt_YA]  = Padma::Padma_consnt_YA;
$DrChatrik_toPadma[DrChatrik::DrChatrik_consnt_RA]  = Padma::Padma_consnt_RA;
$DrChatrik_toPadma[DrChatrik::DrChatrik_consnt_LA]  = Padma::Padma_consnt_LA;
$DrChatrik_toPadma[DrChatrik::DrChatrik_consnt_LLA] = Padma::Padma_consnt_LLA;
$DrChatrik_toPadma[DrChatrik::DrChatrik_consnt_VA]  = Padma::Padma_consnt_VA;
$DrChatrik_toPadma[DrChatrik::DrChatrik_consnt_SHA] = Padma::Padma_consnt_SHA;
$DrChatrik_toPadma[DrChatrik::DrChatrik_consnt_SA]  = Padma::Padma_consnt_SA;
$DrChatrik_toPadma[DrChatrik::DrChatrik_consnt_HA]  = Padma::Padma_consnt_HA;
$DrChatrik_toPadma[DrChatrik::DrChatrik_consnt_KHHA] = Padma::Padma_consnt_KHHA; 
$DrChatrik_toPadma[DrChatrik::DrChatrik_consnt_GHHA] = Padma::Padma_consnt_GHHA;
$DrChatrik_toPadma[DrChatrik::DrChatrik_consnt_ZA]	=  Padma::Padma_consnt_ZA;
$DrChatrik_toPadma[DrChatrik::DrChatrik_consnt_RRA] = Padma::Padma_consnt_RRA;
$DrChatrik_toPadma[DrChatrik::DrChatrik_consnt_FA]	=  Padma::Padma_consnt_FA;

//Gunintamulu
$DrChatrik_toPadma[DrChatrik::DrChatrik_vowelsn_AA] = Padma::Padma_vowelsn_AA;
$DrChatrik_toPadma[DrChatrik::DrChatrik_vowelsn_I]  = Padma::Padma_vowelsn_I;
$DrChatrik_toPadma[DrChatrik::DrChatrik_vowelsn_II] = Padma::Padma_vowelsn_II;
$DrChatrik_toPadma[DrChatrik::DrChatrik_vowelsn_U]  = Padma::Padma_vowelsn_U;
$DrChatrik_toPadma[DrChatrik::DrChatrik_vowelsn_UU_1] = Padma::Padma_vowelsn_UU;
$DrChatrik_toPadma[DrChatrik::DrChatrik_vowelsn_UU_2] = Padma::Padma_vowelsn_UU;
$DrChatrik_toPadma[DrChatrik::DrChatrik_vowelsn_EE] = Padma::Padma_vowelsn_EE;
$DrChatrik_toPadma[DrChatrik::DrChatrik_vowelsn_AI] = Padma::Padma_vowelsn_AI;
$DrChatrik_toPadma[DrChatrik::DrChatrik_vowelsn_OO] = Padma::Padma_vowelsn_OO;
$DrChatrik_toPadma[DrChatrik::DrChatrik_vowelsn_AU] = Padma::Padma_vowelsn_AU;

//Half forms-Vattu
$DrChatrik_toPadma[DrChatrik::DrChatrik_vattu_RA_1] = Padma::Padma_vattu_RA;
$DrChatrik_toPadma[DrChatrik::DrChatrik_vattu_RA_2] = Padma::Padma_vattu_RA;
$DrChatrik_toPadma[DrChatrik::DrChatrik_vattu_CA]   = Padma::Padma_vattu_CA;
$DrChatrik_toPadma[DrChatrik::DrChatrik_vattu_TTA]  = Padma::Padma_vattu_TTA;
$DrChatrik_toPadma[DrChatrik::DrChatrik_vattu_TA]   = Padma::Padma_vattu_TA;
$DrChatrik_toPadma[DrChatrik::DrChatrik_vattu_NA]   = Padma::Padma_vattu_NA;
$DrChatrik_toPadma[DrChatrik::DrChatrik_vattu_HA]   = Padma::Padma_vattu_HA;
$DrChatrik_toPadma[DrChatrik::DrChatrik_vattu_VA]   = Padma::Padma_vattu_VA;
$DrChatrik_toPadma[DrChatrik::DrChatrik_vattu_YA_1] = Padma::Padma_vattu_YA;
$DrChatrik_toPadma[DrChatrik::DrChatrik_vattu_YA_2] = Padma::Padma_vattu_YA;

//conjuncts
$DrChatrik_toPadma[DrChatrik::DrChatrik_vowelsn_AA_BINDI] = Padma::Padma_vowelsn_AA . Padma::Padma_anusvara;
//DrChatrik_toPadma[DrChatrik::DrChatrik_conjct_NA_vowelUU_TIPPi] = "ਨੂੰ"; TODO for Alam, what is this?

//Gurmukhi Misc - updated on 19March2007
$DrChatrik_toPadma[DrChatrik::DrChatrik_misc_BINDI]  = Padma::Padma_anusvara; //0a02
$DrChatrik_toPadma[DrChatrik::DrChatrik_misc_TIPPI_1] = Padma::Padma_tippi;
$DrChatrik_toPadma[DrChatrik::DrChatrik_misc_TIPPI_2] = Padma::Padma_tippi;
$DrChatrik_toPadma[DrChatrik::DrChatrik_misc_TIPPI_3] = Padma::Padma_tippi;
$DrChatrik_toPadma[DrChatrik::DrChatrik_misc_TIPPI_4] = Padma::Padma_tippi;
$DrChatrik_toPadma[DrChatrik::DrChatrik_misc_TIPPI_5] = Padma::Padma_tippi;
$DrChatrik_toPadma[DrChatrik::DrChatrik_misc_TIPPI_6] = Padma::Padma_tippi;
$DrChatrik_toPadma[DrChatrik::DrChatrik_misc_ADDAK_1] = Padma::Padma_addak;
$DrChatrik_toPadma[DrChatrik::DrChatrik_misc_ADDAK_2] = Padma::Padma_addak;
$DrChatrik_toPadma[DrChatrik::DrChatrik_misc_DANDA_1] = Padma::Padma_danda;
$DrChatrik_toPadma[DrChatrik::DrChatrik_misc_DANDA_2] = Padma::Padma_danda;
$DrChatrik_toPadma[DrChatrik::DrChatrik_misc_DANDA_3] = Padma::Padma_danda;
$DrChatrik_toPadma[DrChatrik::DrChatrik_misc_DDANDA_1] = Padma::Padma_ddanda;
$DrChatrik_toPadma[DrChatrik::DrChatrik_misc_DDANDA_2] = Padma::Padma_ddanda;
$DrChatrik_toPadma[DrChatrik::DrChatrik_misc_DDANDA_3] = Padma::Padma_ddanda;
//DrChatrik_toPadma[DrChatrik::DrChatrik_misc_IRI] = "ੲ";
//DrChatrik_toPadma[DrChatrik::DrChatrik_misc_URA] = "ੳ";
$DrChatrik_toPadma[DrChatrik::DrChatrik_misc_EKONKAR_1] = Padma::Padma_ekonkar;
$DrChatrik_toPadma[DrChatrik::DrChatrik_misc_EKONKAR_2] = Padma::Padma_ekonkar;
//DrChatrik_toPadma[DrChatrik::DrChatrik_misc_KHANDA] = Padma::Padma_khanda;

//More
$DrChatrik_toPadma[DrChatrik::DrChatrik_PERIOD]        = ".";
$DrChatrik_toPadma[DrChatrik::DrChatrik_PERCENT]       = "%";
$DrChatrik_toPadma[DrChatrik::DrChatrik_LESSTHAN]      = "<";
$DrChatrik_toPadma[DrChatrik::DrChatrik_LQTSINGLE]     = "\xE2\x80\x98";
$DrChatrik_toPadma[DrChatrik::DrChatrik_RQTSINGLE]     = "\xE2\x80\x99";
$DrChatrik_toPadma[DrChatrik::DrChatrik_LQTDOUBLE]     = "\xE2\x80\x9C";
$DrChatrik_toPadma[DrChatrik::DrChatrik_RQTDOUBLE]     = "\xE2\x80\x9D";
$DrChatrik_toPadma[DrChatrik::DrChatrik_GREATERTHAN]   = ">";
$DrChatrik_toPadma[DrChatrik::DrChatrik_SQBKTLEFT]     = "[";
$DrChatrik_toPadma[DrChatrik::DrChatrik_SQBKTRIGHT]    = "]";
$DrChatrik_toPadma[DrChatrik::DrChatrik_PARENLEFT]     = "(";
$DrChatrik_toPadma[DrChatrik::DrChatrik_PARENRIGHT]    = ")";
$DrChatrik_toPadma[DrChatrik::DrChatrik_HYPHEN]        = "-";
$DrChatrik_toPadma[DrChatrik::DrChatrik_SLASH]         = "/";
$DrChatrik_toPadma[DrChatrik::DrChatrik_COLON]         = ":";
$DrChatrik_toPadma[DrChatrik::DrChatrik_SEMICOLON]     = ";";
$DrChatrik_toPadma[DrChatrik::DrChatrik_EQUALS]        = "=";
$DrChatrik_toPadma[DrChatrik::DrChatrik_QUESTION]      = "?";
$DrChatrik_toPadma[DrChatrik::DrChatrik_ATSIGN]        = "@";
$DrChatrik_toPadma[DrChatrik::DrChatrik_COMMA]         = ",";
$DrChatrik_toPadma[DrChatrik::DrChatrik_EXCLAMATION]   = "!";
$DrChatrik_toPadma[DrChatrik::DrChatrik_BACKSLASH]     = "\\";

$DrChatrik_prefixList = array();
$DrChatrik_prefixList[DrChatrik::DrChatrik_vowelsn_I]  = true;

$DrChatrik_suffixList = array();
//DrChatrik_suffixList[DrChatrik::DrChatrik_halffm_RA]  = true;


$DrChatrik_redundantList = array();

$DrChatrik_overloadList = array();
$DrChatrik_overloadList[DrChatrik::DrChatrik_vowel_A]     = true;
$DrChatrik_overloadList["\x65"]            = true;
$DrChatrik_overloadList[DrChatrik::DrChatrik_vowelsn_I] = true;
$DrChatrik_overloadList[DrChatrik::DrChatrik_misc_URA]  = true;

function DrChatrik_initialize()
{
    global $fontinfo;
    $fontinfo["drchatrikweb"]["language"] = "Gurmukhi";
    $fontinfo["drchatrikweb"]["class"] = "DrChatrik";
}

?>
