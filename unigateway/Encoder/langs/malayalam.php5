<?php
/* ***** BEGIN LICENSE BLOCK *****
 *
 *  This file is originally part of Padma.
 *
 *  Copyright (C) 2005-2006 Nagarjuna Venna <vnagarjuna@yahoo.com>
 *  Copyright (C) 2006 Radhika Thammishetty  <radhika@atc.tcs.com>
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

class Malayalam
{
function Malayalam()
{
}

//Generate map entries for vattulu and half-forms
function initialize() {
   global $Malayalam_fromPadma;
    for($i = Padma::Padma_vattu_START; $i <= Padma::Padma_vattu_END; $i++)
        $Malayalam_fromPadma[utf8_from_unicode($i)] = Malayalam::Malayalam_codePoints_misc_VIRAMA . 
                                                      $Malayalam_fromPadma[Padma::fast_baseFormFromVattu($i)];
    for($i = Padma::Padma_half_START; $i <= Padma::Padma_half_END; $i++)
        $Malayalam_fromPadma[utf8_from_unicode($i)] = $Malayalam_fromPadma[Padma::fast_baseFormFromHalfForm($i)] .  
                                                      Malayalam::Malayalam_codePoints_misc_VIRAMA;
}

//Unicode Codepoints
//$Malayalam_codePoints = array();

//Vowel Modifiers
const Malayalam_codePoints_anusvara    = "\xE0\xB4\x82";  //sunna
const Malayalam_codePoints_visarga     = "\xE0\xB4\x83";

//Independent Vowels
const Malayalam_codePoints_letter_A    = "\xE0\xB4\x85";
const Malayalam_codePoints_letter_AA   = "\xE0\xB4\x86";
const Malayalam_codePoints_letter_I    = "\xE0\xB4\x87";
const Malayalam_codePoints_letter_II   = "\xE0\xB4\x88";
const Malayalam_codePoints_letter_U    = "\xE0\xB4\x89";
const Malayalam_codePoints_letter_UU   = "\xE0\xB4\x8A";
const Malayalam_codePoints_letter_R    = "\xE0\xB4\x8B";   //vocalic R
const Malayalam_codePoints_letter_RR   = "\xE0\xB5\xA0";   //vocalic R
const Malayalam_codePoints_letter_L    = "\xE0\xB4\x8C";   //vocalic L
const Malayalam_codePoints_letter_LL   = "\xE0\xB5\xA1";   //vocalic L
const Malayalam_codePoints_letter_E    = "\xE0\xB4\x8E";
const Malayalam_codePoints_letter_EE   = "\xE0\xB4\x8F";
const Malayalam_codePoints_letter_AI   = "\xE0\xB4\x90";
const Malayalam_codePoints_letter_O    = "\xE0\xB4\x92";
const Malayalam_codePoints_letter_OO   = "\xE0\xB4\x93";
const Malayalam_codePoints_letter_AU   = "\xE0\xB4\x94";

//Consonants
const Malayalam_codePoints_letter_KA   = "\xE0\xB4\x95";
const Malayalam_codePoints_letter_KHA  = "\xE0\xB4\x96";
const Malayalam_codePoints_letter_GA   = "\xE0\xB4\x97";
const Malayalam_codePoints_letter_GHA  = "\xE0\xB4\x98";
const Malayalam_codePoints_letter_NGA  = "\xE0\xB4\x99";
const Malayalam_codePoints_letter_CA   = "\xE0\xB4\x9A";
const Malayalam_codePoints_letter_CHA  = "\xE0\xB4\x9B";
const Malayalam_codePoints_letter_JA   = "\xE0\xB4\x9C";
const Malayalam_codePoints_letter_JHA  = "\xE0\xB4\x9D";
const Malayalam_codePoints_letter_NYA  = "\xE0\xB4\x9E";
const Malayalam_codePoints_letter_TTA  = "\xE0\xB4\x9F";
const Malayalam_codePoints_letter_TTHA = "\xE0\xB4\xA0";
const Malayalam_codePoints_letter_DDA  = "\xE0\xB4\xA1";
const Malayalam_codePoints_letter_DDHA = "\xE0\xB4\xA2";
const Malayalam_codePoints_letter_NNA  = "\xE0\xB4\xA3";
const Malayalam_codePoints_letter_TA   = "\xE0\xB4\xA4";
const Malayalam_codePoints_letter_THA  = "\xE0\xB4\xA5";
const Malayalam_codePoints_letter_DA   = "\xE0\xB4\xA6";
const Malayalam_codePoints_letter_DHA  = "\xE0\xB4\xA7";
const Malayalam_codePoints_letter_NA   = "\xE0\xB4\xA8";
const Malayalam_codePoints_letter_PA   = "\xE0\xB4\xAA";
const Malayalam_codePoints_letter_PHA  = "\xE0\xB4\xAB";
const Malayalam_codePoints_letter_BA   = "\xE0\xB4\xAC";
const Malayalam_codePoints_letter_BHA  = "\xE0\xB4\xAD";
const Malayalam_codePoints_letter_MA   = "\xE0\xB4\xAE";
const Malayalam_codePoints_letter_YA   = "\xE0\xB4\xAF";
const Malayalam_codePoints_letter_RA   = "\xE0\xB4\xB0";
const Malayalam_codePoints_letter_RRA  = "\xE0\xB4\xB1";
const Malayalam_codePoints_letter_LA   = "\xE0\xB4\xB2";
const Malayalam_codePoints_letter_LLA  = "\xE0\xB4\xB3";
const Malayalam_codePoints_letter_ZHA  = "\xE0\xB4\xB4";
const Malayalam_codePoints_letter_VA   = "\xE0\xB4\xB5";
const Malayalam_codePoints_letter_SHA  = "\xE0\xB4\xB6";
const Malayalam_codePoints_letter_SSA  = "\xE0\xB4\xB7";
const Malayalam_codePoints_letter_SA   = "\xE0\xB4\xB8";
const Malayalam_codePoints_letter_HA   = "\xE0\xB4\xB9";

//Dependent Vowel Signs
const Malayalam_codePoints_vowelsn_AA  = "\xE0\xB4\xBE";
const Malayalam_codePoints_vowelsn_I   = "\xE0\xB4\xBF";
const Malayalam_codePoints_vowelsn_II  = "\xE0\xB5\x80";
const Malayalam_codePoints_vowelsn_U   = "\xE0\xB5\x81";
const Malayalam_codePoints_vowelsn_UU  = "\xE0\xB5\x82";
const Malayalam_codePoints_vowelsn_R   = "\xE0\xB5\x83";
const Malayalam_codePoints_vowelsn_RR  = "\xE0\xB5\x83\xE0\xB5\x97";
const Malayalam_codePoints_vowelsn_E   = "\xE0\xB5\x86";
const Malayalam_codePoints_vowelsn_EE  = "\xE0\xB5\x87";
const Malayalam_codePoints_vowelsn_AI  = "\xE0\xB5\x88"; 
const Malayalam_codePoints_vowelsn_O   = "\xE0\xB5\x8A"; //Also 0D46 + 0D3E
const Malayalam_codePoints_vowelsn_OO  = "\xE0\xB5\x8B"; //Also 0D47 + 0D3E
const Malayalam_codePoints_vowelsn_AU  = "\xE0\xB5\x8C"; //Also 0D46 + 0D57

//const Miscellaneous Signs
const Malayalam_codePoints_misc_VIRAMA   = "\xE0\xB5\x8D";   //chandrakkala
const Malayalam_codePoints_misc_AULEN    = "\xE0\xB5\x97";

//Digits
const Malayalam_codePoints_digit_ZERO  = "\xE0\xB5\xA6";
const Malayalam_codePoints_digit_ONE   = "\xE0\xB5\xA7";
const Malayalam_codePoints_digit_TWO   = "\xE0\xB5\xA8";
const Malayalam_codePoints_digit_THREE = "\xE0\xB5\xA9";
const Malayalam_codePoints_digit_FOUR  = "\xE0\xB5\xAA";
const Malayalam_codePoints_digit_FIVE  = "\xE0\xB5\xAB";
const Malayalam_codePoints_digit_SIX   = "\xE0\xB5\xAC";
const Malayalam_codePoints_digit_SEVEN = "\xE0\xB5\xAD";
const Malayalam_codePoints_digit_EIGHT = "\xE0\xB5\xAE";
const Malayalam_codePoints_digit_NINE  = "\xE0\xB5\xAF";
}

$Malayalam_fromPadma = array();
$Malayalam_fromPadma[Padma::Padma_anusvara]    = Malayalam::Malayalam_codePoints_anusvara;
$Malayalam_fromPadma[Padma::Padma_visarga]     = Malayalam::Malayalam_codePoints_visarga;
$Malayalam_fromPadma[Padma::Padma_chandrakkala] = Malayalam::Malayalam_codePoints_misc_VIRAMA;
$Malayalam_fromPadma[Padma::Padma_chillu]      = Malayalam::Malayalam_codePoints_misc_VIRAMA . Shared::Unicode_Shared_ZWJ;
$Malayalam_fromPadma[Padma::Padma_syllbreak]   = Malayalam::Malayalam_codePoints_misc_VIRAMA . Shared::Unicode_Shared_ZWNJ;
$Malayalam_fromPadma[Padma::Padma_avagraha]    = Shared::Unicode_Shared_AVAGRAHA;
$Malayalam_fromPadma[Padma::Padma_udAtta]      = Shared::Unicode_Shared_UDATTA;
$Malayalam_fromPadma[Padma::Padma_anudAtta]    = Shared::Unicode_Shared_ANUDATTA;
$Malayalam_fromPadma[Padma::Padma_svarita]     = Shared::Unicode_Shared_SVARITA;
$Malayalam_fromPadma[Padma::Padma_danda]       = Shared::Unicode_Shared_DANDA;
$Malayalam_fromPadma[Padma::Padma_ddanda]      = Shared::Unicode_Shared_DDANDA;
$Malayalam_fromPadma[Padma::Padma_abbrev]      = Shared::Unicode_Shared_abbrev;
$Malayalam_fromPadma[Padma::Padma_om]          = Shared::Unicode_Shared_OM;

//digits
$Malayalam_fromPadma[Padma::Padma_digit_ZERO]  = Malayalam::Malayalam_codePoints_digit_ZERO;
$Malayalam_fromPadma[Padma::Padma_digit_ONE]   = Malayalam::Malayalam_codePoints_digit_ONE;
$Malayalam_fromPadma[Padma::Padma_digit_TWO]   = Malayalam::Malayalam_codePoints_digit_TWO;
$Malayalam_fromPadma[Padma::Padma_digit_THREE] = Malayalam::Malayalam_codePoints_digit_THREE;
$Malayalam_fromPadma[Padma::Padma_digit_FOUR]  = Malayalam::Malayalam_codePoints_digit_FOUR;
$Malayalam_fromPadma[Padma::Padma_digit_FIVE]  = Malayalam::Malayalam_codePoints_digit_FIVE;
$Malayalam_fromPadma[Padma::Padma_digit_SIX]   = Malayalam::Malayalam_codePoints_digit_SIX;
$Malayalam_fromPadma[Padma::Padma_digit_SEVEN] = Malayalam::Malayalam_codePoints_digit_SEVEN;
$Malayalam_fromPadma[Padma::Padma_digit_EIGHT] = Malayalam::Malayalam_codePoints_digit_EIGHT;
$Malayalam_fromPadma[Padma::Padma_digit_NINE]  = Malayalam::Malayalam_codePoints_digit_NINE;

//Vowels
$Malayalam_fromPadma[Padma::Padma_vowel_A]     = Malayalam::Malayalam_codePoints_letter_A;
$Malayalam_fromPadma[Padma::Padma_vowel_AA]    = Malayalam::Malayalam_codePoints_letter_AA;
$Malayalam_fromPadma[Padma::Padma_vowel_I]     = Malayalam::Malayalam_codePoints_letter_I;
$Malayalam_fromPadma[Padma::Padma_vowel_II]    = Malayalam::Malayalam_codePoints_letter_II;
$Malayalam_fromPadma[Padma::Padma_vowel_U]     = Malayalam::Malayalam_codePoints_letter_U;
$Malayalam_fromPadma[Padma::Padma_vowel_UU]    = Malayalam::Malayalam_codePoints_letter_UU;
$Malayalam_fromPadma[Padma::Padma_vowel_R]     = Malayalam::Malayalam_codePoints_letter_R;
$Malayalam_fromPadma[Padma::Padma_vowel_RR]    = Malayalam::Malayalam_codePoints_letter_RR;
$Malayalam_fromPadma[Padma::Padma_vowel_L]     = Malayalam::Malayalam_codePoints_letter_L;
$Malayalam_fromPadma[Padma::Padma_vowel_LL]    = Malayalam::Malayalam_codePoints_letter_LL;
$Malayalam_fromPadma[Padma::Padma_vowel_E]     = Malayalam::Malayalam_codePoints_letter_E;
$Malayalam_fromPadma[Padma::Padma_vowel_EE]    = Malayalam::Malayalam_codePoints_letter_EE;
$Malayalam_fromPadma[Padma::Padma_vowel_AI]    = Malayalam::Malayalam_codePoints_letter_AI;
$Malayalam_fromPadma[Padma::Padma_vowel_O]     = Malayalam::Malayalam_codePoints_letter_O;
$Malayalam_fromPadma[Padma::Padma_vowel_OO]    = Malayalam::Malayalam_codePoints_letter_OO;
$Malayalam_fromPadma[Padma::Padma_vowel_AU]    = Malayalam::Malayalam_codePoints_letter_AU;

//Consonants
$Malayalam_fromPadma[Padma::Padma_consnt_KA]   = Malayalam::Malayalam_codePoints_letter_KA;
$Malayalam_fromPadma[Padma::Padma_consnt_KHA]  = Malayalam::Malayalam_codePoints_letter_KHA;
$Malayalam_fromPadma[Padma::Padma_consnt_GA]   = Malayalam::Malayalam_codePoints_letter_GA;
$Malayalam_fromPadma[Padma::Padma_consnt_GHA]  = Malayalam::Malayalam_codePoints_letter_GHA;
$Malayalam_fromPadma[Padma::Padma_consnt_NGA]  = Malayalam::Malayalam_codePoints_letter_NGA;
$Malayalam_fromPadma[Padma::Padma_consnt_CA]   = Malayalam::Malayalam_codePoints_letter_CA;
$Malayalam_fromPadma[Padma::Padma_consnt_CHA]  = Malayalam::Malayalam_codePoints_letter_CHA;
$Malayalam_fromPadma[Padma::Padma_consnt_JA]   = Malayalam::Malayalam_codePoints_letter_JA;
$Malayalam_fromPadma[Padma::Padma_consnt_JHA]  = Malayalam::Malayalam_codePoints_letter_JHA;
$Malayalam_fromPadma[Padma::Padma_consnt_NYA]  = Malayalam::Malayalam_codePoints_letter_NYA;
$Malayalam_fromPadma[Padma::Padma_consnt_TTA]  = Malayalam::Malayalam_codePoints_letter_TTA;
$Malayalam_fromPadma[Padma::Padma_consnt_TTHA] = Malayalam::Malayalam_codePoints_letter_TTHA;
$Malayalam_fromPadma[Padma::Padma_consnt_DDA]  = Malayalam::Malayalam_codePoints_letter_DDA;
$Malayalam_fromPadma[Padma::Padma_consnt_DDHA] = Malayalam::Malayalam_codePoints_letter_DDHA;
$Malayalam_fromPadma[Padma::Padma_consnt_NNA]  = Malayalam::Malayalam_codePoints_letter_NNA;
$Malayalam_fromPadma[Padma::Padma_consnt_TA]   = Malayalam::Malayalam_codePoints_letter_TA;
$Malayalam_fromPadma[Padma::Padma_consnt_THA]  = Malayalam::Malayalam_codePoints_letter_THA;
$Malayalam_fromPadma[Padma::Padma_consnt_DA]   = Malayalam::Malayalam_codePoints_letter_DA;
$Malayalam_fromPadma[Padma::Padma_consnt_DHA]  = Malayalam::Malayalam_codePoints_letter_DHA;
$Malayalam_fromPadma[Padma::Padma_consnt_NA]   = Malayalam::Malayalam_codePoints_letter_NA;
$Malayalam_fromPadma[Padma::Padma_consnt_PA]   = Malayalam::Malayalam_codePoints_letter_PA;
$Malayalam_fromPadma[Padma::Padma_consnt_PHA]  = Malayalam::Malayalam_codePoints_letter_PHA;
$Malayalam_fromPadma[Padma::Padma_consnt_BA]   = Malayalam::Malayalam_codePoints_letter_BA;
$Malayalam_fromPadma[Padma::Padma_consnt_BHA]  = Malayalam::Malayalam_codePoints_letter_BHA;
$Malayalam_fromPadma[Padma::Padma_consnt_MA]   = Malayalam::Malayalam_codePoints_letter_MA;
$Malayalam_fromPadma[Padma::Padma_consnt_YA]   = Malayalam::Malayalam_codePoints_letter_YA;
$Malayalam_fromPadma[Padma::Padma_consnt_RA]   = Malayalam::Malayalam_codePoints_letter_RA;
$Malayalam_fromPadma[Padma::Padma_consnt_LA]   = Malayalam::Malayalam_codePoints_letter_LA;
$Malayalam_fromPadma[Padma::Padma_consnt_VA]   = Malayalam::Malayalam_codePoints_letter_VA;
$Malayalam_fromPadma[Padma::Padma_consnt_SHA]  = Malayalam::Malayalam_codePoints_letter_SHA;
$Malayalam_fromPadma[Padma::Padma_consnt_SSA]  = Malayalam::Malayalam_codePoints_letter_SSA;
$Malayalam_fromPadma[Padma::Padma_consnt_SA]   = Malayalam::Malayalam_codePoints_letter_SA;
$Malayalam_fromPadma[Padma::Padma_consnt_HA]   = Malayalam::Malayalam_codePoints_letter_HA;
$Malayalam_fromPadma[Padma::Padma_consnt_LLA]  = Malayalam::Malayalam_codePoints_letter_LLA;
$Malayalam_fromPadma[Padma::Padma_consnt_ZHA]  = Malayalam::Malayalam_codePoints_letter_ZHA;
$Malayalam_fromPadma[Padma::Padma_consnt_RRA]  = Malayalam::Malayalam_codePoints_letter_RRA;

//Gunimtaalu
$Malayalam_fromPadma[Padma::Padma_vowelsn_AA]  = Malayalam::Malayalam_codePoints_vowelsn_AA;
$Malayalam_fromPadma[Padma::Padma_vowelsn_I]   = Malayalam::Malayalam_codePoints_vowelsn_I;
$Malayalam_fromPadma[Padma::Padma_vowelsn_II]  = Malayalam::Malayalam_codePoints_vowelsn_II;
$Malayalam_fromPadma[Padma::Padma_vowelsn_U]   = Malayalam::Malayalam_codePoints_vowelsn_U;
$Malayalam_fromPadma[Padma::Padma_vowelsn_UU]  = Malayalam::Malayalam_codePoints_vowelsn_UU;
$Malayalam_fromPadma[Padma::Padma_vowelsn_R]   = Malayalam::Malayalam_codePoints_vowelsn_R;
$Malayalam_fromPadma[Padma::Padma_vowelsn_RR]  = Malayalam::Malayalam_codePoints_vowelsn_RR;
$Malayalam_fromPadma[Padma::Padma_vowelsn_E]   = Malayalam::Malayalam_codePoints_vowelsn_E;
$Malayalam_fromPadma[Padma::Padma_vowelsn_EE]  = Malayalam::Malayalam_codePoints_vowelsn_EE;
$Malayalam_fromPadma[Padma::Padma_vowelsn_AI]  = Malayalam::Malayalam_codePoints_vowelsn_AI;
$Malayalam_fromPadma[Padma::Padma_vowelsn_O]   = Malayalam::Malayalam_codePoints_vowelsn_O;
$Malayalam_fromPadma[Padma::Padma_vowelsn_OO]  = Malayalam::Malayalam_codePoints_vowelsn_OO;
$Malayalam_fromPadma[Padma::Padma_vowelsn_AU]  = Malayalam::Malayalam_codePoints_vowelsn_AU;
$Malayalam_fromPadma[Padma::Padma_vowelsn_AULEN]  = Malayalam::Malayalam_codePoints_misc_AULEN;

//The following are not directly present in $Malayalam - equivalent transliteration
$Malayalam_fromPadma[Padma::Padma_vowel_SHT_A]   = Malayalam::Malayalam_codePoints_letter_A;
$Malayalam_fromPadma[Padma::Padma_vowel_CDR_E]   = Malayalam::Malayalam_codePoints_letter_E;
$Malayalam_fromPadma[Padma::Padma_vowel_CDR_O]   = Malayalam::Malayalam_codePoints_letter_O;
$Malayalam_fromPadma[Padma::Padma_consnt_QA]     = Malayalam::Malayalam_codePoints_letter_KA;
$Malayalam_fromPadma[Padma::Padma_consnt_KHHA]   = Malayalam::Malayalam_codePoints_letter_KHA;
$Malayalam_fromPadma[Padma::Padma_consnt_GHHA]   = Malayalam::Malayalam_codePoints_letter_GHA;
$Malayalam_fromPadma[Padma::Padma_consnt_ZA]     = Malayalam::Malayalam_codePoints_letter_JA;
$Malayalam_fromPadma[Padma::Padma_consnt_DDDHA]  = Malayalam::Malayalam_codePoints_letter_DDA;
$Malayalam_fromPadma[Padma::Padma_consnt_RHA]    = Malayalam::Malayalam_codePoints_letter_DDHA;
$Malayalam_fromPadma[Padma::Padma_consnt_NNNA]   = Malayalam::Malayalam_codePoints_letter_NNA;
$Malayalam_fromPadma[Padma::Padma_consnt_FA]     = Malayalam::Malayalam_codePoints_letter_PHA;
$Malayalam_fromPadma[Padma::Padma_consnt_YYA]    = Malayalam::Malayalam_codePoints_letter_YA;
$Malayalam_fromPadma[Padma::Padma_vowelsn_CDR_E] = Malayalam::Malayalam_codePoints_vowelsn_E;
$Malayalam_fromPadma[Padma::Padma_vowelsn_CDR_O] = Malayalam::Malayalam_codePoints_vowelsn_O;
?>
