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

class Gujarati
{
function Gujarati()
{
}

//Generate map entries for vattulu and half-forms
function initialize() {
     global $Gujarati_fromPadma;
    for($i = Padma::Padma_vattu_START; $i <= Padma::Padma_vattu_END; $i++)
        $Gujarati_fromPadma[utf8_from_unicode($i)] = Gujarati::Gujarati_codePoints_misc_VIRAMA . 
                                                     $Gujarati_fromPadma[Padma::fast_baseFormFromVattu($i)];
    for($i = Padma::Padma_half_START; $i <= Padma::Padma_half_END; $i++)
        $Gujarati_fromPadma[utf8_from_unicode($i)] = $Gujarati_fromPadma[Padma::fast_baseFormFromHalfForm($i)] . 
                                                     Gujarati::Gujarati_codePoints_misc_VIRAMA;
}

//Unicode Codepoints
//$Gujarati_codePoints = array();

const Gujarati_codePoints_candrabindu  = "\xE0\xAA\x81";
//Vowel Modifiers
const Gujarati_codePoints_anusvara     = "\xE0\xAA\x82";
const Gujarati_codePoints_visarga      = "\xE0\xAA\x83";

//Independent Vowels
const Gujarati_codePoints_letter_A     = "\xE0\xAA\x85";
const Gujarati_codePoints_letter_AA    = "\xE0\xAA\x86";
const Gujarati_codePoints_letter_I     = "\xE0\xAA\x87";
const Gujarati_codePoints_letter_II    = "\xE0\xAA\x88";
const Gujarati_codePoints_letter_U     = "\xE0\xAA\x89";
const Gujarati_codePoints_letter_UU    = "\xE0\xAA\x8A";
const Gujarati_codePoints_letter_R     = "\xE0\xAA\x8B";
const Gujarati_codePoints_letter_RR    = "\xE0\xAB\xA0";
const Gujarati_codePoints_letter_L     = "\xE0\xAA\x8C";
const Gujarati_codePoints_letter_LL    = "\xE0\xAB\xA1";
const Gujarati_codePoints_letter_CDR_E = "\xE0\xAA\x8D";
const Gujarati_codePoints_letter_EE    = "\xE0\xAA\x8F";
const Gujarati_codePoints_letter_AI    = "\xE0\xAA\x90";
const Gujarati_codePoints_letter_CDR_O = "\xE0\xAA\x91";
const Gujarati_codePoints_letter_OO    = "\xE0\xAA\x93";
const Gujarati_codePoints_letter_AU    = "\xE0\xAA\x94";

//Consonants
const Gujarati_codePoints_letter_KA   = "\xE0\xAA\x95";
const Gujarati_codePoints_letter_KHA  = "\xE0\xAA\x96";
const Gujarati_codePoints_letter_GA   = "\xE0\xAA\x97";
const Gujarati_codePoints_letter_GHA  = "\xE0\xAA\x98";
const Gujarati_codePoints_letter_NGA  = "\xE0\xAA\x99";
const Gujarati_codePoints_letter_CA   = "\xE0\xAA\x9A";
const Gujarati_codePoints_letter_CHA  = "\xE0\xAA\x9B";
const Gujarati_codePoints_letter_JA   = "\xE0\xAA\x9C";
const Gujarati_codePoints_letter_JHA  = "\xE0\xAA\x9D";
const Gujarati_codePoints_letter_NYA  = "\xE0\xAA\x9E";
const Gujarati_codePoints_letter_TTA  = "\xE0\xAA\x9F";
const Gujarati_codePoints_letter_TTHA = "\xE0\xAA\xA0";
const Gujarati_codePoints_letter_DDA  = "\xE0\xAA\xA1";
const Gujarati_codePoints_letter_DDHA = "\xE0\xAA\xA2";
const Gujarati_codePoints_letter_NNA  = "\xE0\xAA\xA3";
const Gujarati_codePoints_letter_TA   = "\xE0\xAA\xA4";
const Gujarati_codePoints_letter_THA  = "\xE0\xAA\xA5";
const Gujarati_codePoints_letter_DA   = "\xE0\xAA\xA6";
const Gujarati_codePoints_letter_DHA  = "\xE0\xAA\xA7";
const Gujarati_codePoints_letter_NA   = "\xE0\xAA\xA8";
const Gujarati_codePoints_letter_PA   = "\xE0\xAA\xAA";
const Gujarati_codePoints_letter_PHA  = "\xE0\xAA\xAB";
const Gujarati_codePoints_letter_BA   = "\xE0\xAA\xAC";
const Gujarati_codePoints_letter_BHA  = "\xE0\xAA\xAD";
const Gujarati_codePoints_letter_MA   = "\xE0\xAA\xAE";
const Gujarati_codePoints_letter_YA   = "\xE0\xAA\xAF";
const Gujarati_codePoints_letter_RA   = "\xE0\xAA\xB0";
const Gujarati_codePoints_letter_LA   = "\xE0\xAA\xB2";
const Gujarati_codePoints_letter_LLA  = "\xE0\xAA\xB3";
const Gujarati_codePoints_letter_VA   = "\xE0\xAA\xB5";
const Gujarati_codePoints_letter_SHA  = "\xE0\xAA\xB6";
const Gujarati_codePoints_letter_SSA  = "\xE0\xAA\xB7";
const Gujarati_codePoints_letter_SA   = "\xE0\xAA\xB8";
const Gujarati_codePoints_letter_HA   = "\xE0\xAA\xB9";

//Dependent Vowel Signs
const Gujarati_codePoints_vowelsn_AA    = "\xE0\xAA\xBE";
const Gujarati_codePoints_vowelsn_I     = "\xE0\xAA\xBF";
const Gujarati_codePoints_vowelsn_II    = "\xE0\xAB\x80";
const Gujarati_codePoints_vowelsn_U     = "\xE0\xAB\x81";
const Gujarati_codePoints_vowelsn_UU    = "\xE0\xAB\x82";
const Gujarati_codePoints_vowelsn_R     = "\xE0\xAB\x83";
const Gujarati_codePoints_vowelsn_RR    = "\xE0\xAB\x84";
const Gujarati_codePoints_vowelsn_L     = "\xE0\xAB\xA2";
const Gujarati_codePoints_vowelsn_LL    = "\xE0\xAB\xA3";
const Gujarati_codePoints_vowelsn_CDR_E = "\xE0\xAB\x85";
const Gujarati_codePoints_vowelsn_EE    = "\xE0\xAB\x87";
const Gujarati_codePoints_vowelsn_AI    = "\xE0\xAB\x88";
const Gujarati_codePoints_vowelsn_CDR_O = "\xE0\xAB\x89";
const Gujarati_codePoints_vowelsn_OO    = "\xE0\xAB\x8B";
const Gujarati_codePoints_vowelsn_AU    = "\xE0\xAB\x8C";

//Miscellaneous Signs
const Gujarati_codePoints_misc_VIRAMA   = "\xE0\xAB\x8D";
const Gujarati_codePoints_misc_NUKTA    = "\xE0\xAA\xBC";
const Gujarati_codePoints_misc_AVAGRAHA = "\xE0\xAA\xBD";
const Gujarati_codePoints_misc_OM       = "\xE0\xAB\x90";
const Gujarati_codePoints_misc_RUPEE    = "\xE0\xAB\xB1";

//Digits
const Gujarati_codePoints_digit_ZERO  = "\xE0\xAB\xA6";
const Gujarati_codePoints_digit_ONE   = "\xE0\xAB\xA7";
const Gujarati_codePoints_digit_TWO   = "\xE0\xAB\xA8";
const Gujarati_codePoints_digit_THREE = "\xE0\xAB\xA9";
const Gujarati_codePoints_digit_FOUR  = "\xE0\xAB\xAA";
const Gujarati_codePoints_digit_FIVE  = "\xE0\xAB\xAB";
const Gujarati_codePoints_digit_SIX   = "\xE0\xAB\xAC";
const Gujarati_codePoints_digit_SEVEN = "\xE0\xAB\xAD";
const Gujarati_codePoints_digit_EIGHT = "\xE0\xAB\xAE";
const Gujarati_codePoints_digit_NINE  = "\xE0\xAB\xAF";
}

$Gujarati_fromPadma = array();
$Gujarati_fromPadma[Padma::Padma_anusvara]    = Gujarati::Gujarati_codePoints_anusvara;
$Gujarati_fromPadma[Padma::Padma_visarga]     = Gujarati::Gujarati_codePoints_visarga;
$Gujarati_fromPadma[Padma::Padma_halant]      = Gujarati::Gujarati_codePoints_misc_VIRAMA;
$Gujarati_fromPadma[Padma::Padma_chillu]      = Gujarati::Gujarati_codePoints_misc_VIRAMA . Shared::Unicode_Shared_ZWJ;
$Gujarati_fromPadma[Padma::Padma_syllbreak]   = Gujarati::Gujarati_codePoints_misc_VIRAMA . Shared::Unicode_Shared_ZWNJ;
$Gujarati_fromPadma[Padma::Padma_nukta]       = Gujarati::Gujarati_codePoints_misc_NUKTA;
$Gujarati_fromPadma[Padma::Padma_candrabindu] = Gujarati::Gujarati_codePoints_candrabindu;
$Gujarati_fromPadma[Padma::Padma_avagraha]    = Gujarati::Gujarati_codePoints_misc_AVAGRAHA;
$Gujarati_fromPadma[Padma::Padma_udAtta]      = Shared::Unicode_Shared_UDATTA;
$Gujarati_fromPadma[Padma::Padma_anudAtta]    = Shared::Unicode_Shared_ANUDATTA;
$Gujarati_fromPadma[Padma::Padma_svarita]     = Shared::Unicode_Shared_SVARITA;
$Gujarati_fromPadma[Padma::Padma_danda]       = Shared::Unicode_Shared_DANDA;
$Gujarati_fromPadma[Padma::Padma_ddanda]      = Shared::Unicode_Shared_DDANDA;
$Gujarati_fromPadma[Padma::Padma_om]          = Gujarati::Gujarati_codePoints_misc_OM;
$Gujarati_fromPadma[Padma::Padma_abbrev]      = Shared::Unicode_Shared_abbrev;

//digits
$Gujarati_fromPadma[Padma::Padma_digit_ZERO]  = Gujarati::Gujarati_codePoints_digit_ZERO;
$Gujarati_fromPadma[Padma::Padma_digit_ONE]   = Gujarati::Gujarati_codePoints_digit_ONE;
$Gujarati_fromPadma[Padma::Padma_digit_TWO]   = Gujarati::Gujarati_codePoints_digit_TWO;
$Gujarati_fromPadma[Padma::Padma_digit_THREE] = Gujarati::Gujarati_codePoints_digit_THREE;
$Gujarati_fromPadma[Padma::Padma_digit_FOUR]  = Gujarati::Gujarati_codePoints_digit_FOUR;
$Gujarati_fromPadma[Padma::Padma_digit_FIVE]  = Gujarati::Gujarati_codePoints_digit_FIVE;
$Gujarati_fromPadma[Padma::Padma_digit_SIX]   = Gujarati::Gujarati_codePoints_digit_SIX;
$Gujarati_fromPadma[Padma::Padma_digit_SEVEN] = Gujarati::Gujarati_codePoints_digit_SEVEN;
$Gujarati_fromPadma[Padma::Padma_digit_EIGHT] = Gujarati::Gujarati_codePoints_digit_EIGHT;
$Gujarati_fromPadma[Padma::Padma_digit_NINE]  = Gujarati::Gujarati_codePoints_digit_NINE;

//Vowels
$Gujarati_fromPadma[Padma::Padma_vowel_A]     = Gujarati::Gujarati_codePoints_letter_A;
$Gujarati_fromPadma[Padma::Padma_vowel_AA]    = Gujarati::Gujarati_codePoints_letter_AA;
$Gujarati_fromPadma[Padma::Padma_vowel_I]     = Gujarati::Gujarati_codePoints_letter_I;
$Gujarati_fromPadma[Padma::Padma_vowel_II]    = Gujarati::Gujarati_codePoints_letter_II;
$Gujarati_fromPadma[Padma::Padma_vowel_U]     = Gujarati::Gujarati_codePoints_letter_U;
$Gujarati_fromPadma[Padma::Padma_vowel_UU]    = Gujarati::Gujarati_codePoints_letter_UU;
$Gujarati_fromPadma[Padma::Padma_vowel_R]     = Gujarati::Gujarati_codePoints_letter_R;
$Gujarati_fromPadma[Padma::Padma_vowel_RR]    = Gujarati::Gujarati_codePoints_letter_RR;
$Gujarati_fromPadma[Padma::Padma_vowel_L]     = Gujarati::Gujarati_codePoints_letter_L;
$Gujarati_fromPadma[Padma::Padma_vowel_LL]    = Gujarati::Gujarati_codePoints_letter_LL;
$Gujarati_fromPadma[Padma::Padma_vowel_CDR_E] = Gujarati::Gujarati_codePoints_letter_CDR_E;
$Gujarati_fromPadma[Padma::Padma_vowel_EE]    = Gujarati::Gujarati_codePoints_letter_EE;
$Gujarati_fromPadma[Padma::Padma_vowel_AI]    = Gujarati::Gujarati_codePoints_letter_AI;
$Gujarati_fromPadma[Padma::Padma_vowel_CDR_O] = Gujarati::Gujarati_codePoints_letter_CDR_O;
$Gujarati_fromPadma[Padma::Padma_vowel_OO]    = Gujarati::Gujarati_codePoints_letter_OO;
$Gujarati_fromPadma[Padma::Padma_vowel_AU]    = Gujarati::Gujarati_codePoints_letter_AU;

//Consonants
$Gujarati_fromPadma[Padma::Padma_consnt_KA]   = Gujarati::Gujarati_codePoints_letter_KA;
$Gujarati_fromPadma[Padma::Padma_consnt_KHA]  = Gujarati::Gujarati_codePoints_letter_KHA;
$Gujarati_fromPadma[Padma::Padma_consnt_GA]   = Gujarati::Gujarati_codePoints_letter_GA;
$Gujarati_fromPadma[Padma::Padma_consnt_GHA]  = Gujarati::Gujarati_codePoints_letter_GHA;
$Gujarati_fromPadma[Padma::Padma_consnt_NGA]  = Gujarati::Gujarati_codePoints_letter_NGA;
$Gujarati_fromPadma[Padma::Padma_consnt_CA]   = Gujarati::Gujarati_codePoints_letter_CA;
$Gujarati_fromPadma[Padma::Padma_consnt_CHA]  = Gujarati::Gujarati_codePoints_letter_CHA;
$Gujarati_fromPadma[Padma::Padma_consnt_JA]   = Gujarati::Gujarati_codePoints_letter_JA;
$Gujarati_fromPadma[Padma::Padma_consnt_JHA]  = Gujarati::Gujarati_codePoints_letter_JHA;
$Gujarati_fromPadma[Padma::Padma_consnt_NYA]  = Gujarati::Gujarati_codePoints_letter_NYA;
$Gujarati_fromPadma[Padma::Padma_consnt_TTA]  = Gujarati::Gujarati_codePoints_letter_TTA;
$Gujarati_fromPadma[Padma::Padma_consnt_TTHA] = Gujarati::Gujarati_codePoints_letter_TTHA;
$Gujarati_fromPadma[Padma::Padma_consnt_DDA]  = Gujarati::Gujarati_codePoints_letter_DDA;
$Gujarati_fromPadma[Padma::Padma_consnt_DDHA] = Gujarati::Gujarati_codePoints_letter_DDHA;
$Gujarati_fromPadma[Padma::Padma_consnt_NNA]  = Gujarati::Gujarati_codePoints_letter_NNA;
$Gujarati_fromPadma[Padma::Padma_consnt_TA]   = Gujarati::Gujarati_codePoints_letter_TA;
$Gujarati_fromPadma[Padma::Padma_consnt_THA]  = Gujarati::Gujarati_codePoints_letter_THA;
$Gujarati_fromPadma[Padma::Padma_consnt_DA]   = Gujarati::Gujarati_codePoints_letter_DA;
$Gujarati_fromPadma[Padma::Padma_consnt_DHA]  = Gujarati::Gujarati_codePoints_letter_DHA;
$Gujarati_fromPadma[Padma::Padma_consnt_NA]   = Gujarati::Gujarati_codePoints_letter_NA;
$Gujarati_fromPadma[Padma::Padma_consnt_PA]   = Gujarati::Gujarati_codePoints_letter_PA;
$Gujarati_fromPadma[Padma::Padma_consnt_PHA]  = Gujarati::Gujarati_codePoints_letter_PHA;
$Gujarati_fromPadma[Padma::Padma_consnt_BA]   = Gujarati::Gujarati_codePoints_letter_BA;
$Gujarati_fromPadma[Padma::Padma_consnt_BHA]  = Gujarati::Gujarati_codePoints_letter_BHA;
$Gujarati_fromPadma[Padma::Padma_consnt_MA]   = Gujarati::Gujarati_codePoints_letter_MA;
$Gujarati_fromPadma[Padma::Padma_consnt_YA]   = Gujarati::Gujarati_codePoints_letter_YA;
$Gujarati_fromPadma[Padma::Padma_consnt_RA]   = Gujarati::Gujarati_codePoints_letter_RA;
$Gujarati_fromPadma[Padma::Padma_consnt_LA]   = Gujarati::Gujarati_codePoints_letter_LA;
$Gujarati_fromPadma[Padma::Padma_consnt_LLA]  = Gujarati::Gujarati_codePoints_letter_LLA;
$Gujarati_fromPadma[Padma::Padma_consnt_VA]   = Gujarati::Gujarati_codePoints_letter_VA;
$Gujarati_fromPadma[Padma::Padma_consnt_SHA]  = Gujarati::Gujarati_codePoints_letter_SHA;
$Gujarati_fromPadma[Padma::Padma_consnt_SSA]  = Gujarati::Gujarati_codePoints_letter_SSA;
$Gujarati_fromPadma[Padma::Padma_consnt_SA]   = Gujarati::Gujarati_codePoints_letter_SA;
$Gujarati_fromPadma[Padma::Padma_consnt_HA]   = Gujarati::Gujarati_codePoints_letter_HA;

//$Gunimtaalu
$Gujarati_fromPadma[Padma::Padma_vowelsn_AA]  = Gujarati::Gujarati_codePoints_vowelsn_AA;
$Gujarati_fromPadma[Padma::Padma_vowelsn_I]   = Gujarati::Gujarati_codePoints_vowelsn_I;
$Gujarati_fromPadma[Padma::Padma_vowelsn_II]  = Gujarati::Gujarati_codePoints_vowelsn_II;
$Gujarati_fromPadma[Padma::Padma_vowelsn_U]   = Gujarati::Gujarati_codePoints_vowelsn_U;
$Gujarati_fromPadma[Padma::Padma_vowelsn_UU]  = Gujarati::Gujarati_codePoints_vowelsn_UU;
$Gujarati_fromPadma[Padma::Padma_vowelsn_R]   = Gujarati::Gujarati_codePoints_vowelsn_R;
$Gujarati_fromPadma[Padma::Padma_vowelsn_RR]  = Gujarati::Gujarati_codePoints_vowelsn_RR;
$Gujarati_fromPadma[Padma::Padma_vowelsn_CDR_E] = Gujarati::Gujarati_codePoints_vowelsn_CDR_E;
$Gujarati_fromPadma[Padma::Padma_vowelsn_EE]  = Gujarati::Gujarati_codePoints_vowelsn_EE;
$Gujarati_fromPadma[Padma::Padma_vowelsn_AI]  = Gujarati::Gujarati_codePoints_vowelsn_AI;
$Gujarati_fromPadma[Padma::Padma_vowelsn_CDR_O] = Gujarati::Gujarati_codePoints_vowelsn_CDR_O;
$Gujarati_fromPadma[Padma::Padma_vowelsn_OO]  = Gujarati::Gujarati_codePoints_vowelsn_OO;
$Gujarati_fromPadma[Padma::Padma_vowelsn_AU]  = Gujarati::Gujarati_codePoints_vowelsn_AU;

//The following are not directly present in $Gujarati - equivalent transliteration
$Gujarati_fromPadma[Padma::Padma_vowel_SHT_A]  = Gujarati::Gujarati_codePoints_letter_A;
$Gujarati_fromPadma[Padma::Padma_vowel_E]      = Gujarati::Gujarati_codePoints_letter_EE;
$Gujarati_fromPadma[Padma::Padma_vowel_O]      = Gujarati::Gujarati_codePoints_letter_OO;
$Gujarati_fromPadma[Padma::Padma_consnt_QA]    = Gujarati::Gujarati_codePoints_letter_KA;
$Gujarati_fromPadma[Padma::Padma_consnt_KHHA]  = Gujarati::Gujarati_codePoints_letter_KHA;
$Gujarati_fromPadma[Padma::Padma_consnt_GHHA]  = Gujarati::Gujarati_codePoints_letter_GHA;
$Gujarati_fromPadma[Padma::Padma_consnt_ZA]    = Gujarati::Gujarati_codePoints_letter_JA;
$Gujarati_fromPadma[Padma::Padma_consnt_DDDHA] = Gujarati::Gujarati_codePoints_letter_DDA;
$Gujarati_fromPadma[Padma::Padma_consnt_RHA]   = Gujarati::Gujarati_codePoints_letter_DDHA;
$Gujarati_fromPadma[Padma::Padma_consnt_NNNA]  = Gujarati::Gujarati_codePoints_letter_NNA;
$Gujarati_fromPadma[Padma::Padma_consnt_FA]    = Gujarati::Gujarati_codePoints_letter_PHA;
$Gujarati_fromPadma[Padma::Padma_consnt_YYA]   = Gujarati::Gujarati_codePoints_letter_YA;
$Gujarati_fromPadma[Padma::Padma_consnt_ZHA]   = Gujarati::Gujarati_codePoints_letter_LLA;
$Gujarati_fromPadma[Padma::Padma_vowelsn_E]    = Gujarati::Gujarati_codePoints_vowelsn_EE;
$Gujarati_fromPadma[Padma::Padma_vowelsn_O]    = Gujarati::Gujarati_codePoints_vowelsn_OO;
?>
