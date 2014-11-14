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

class Devanagari
{
function Devanagari()
{
}

//Generate map entries for vattulu and half-forms
function initialize() {
     global $Devanagari_fromPadma;
    for($i = Padma::Padma_vattu_START; $i <= Padma::Padma_vattu_END; $i++)
        $Devanagari_fromPadma[utf8_from_unicode($i)] = Devanagari::Devanagari_codePoints_misc_VIRAMA . 
                                                       $Devanagari_fromPadma[Padma::fast_baseFormFromVattu($i)];

    for($i = Padma::Padma_half_START; $i <= Padma::Padma_half_END; $i++)
        $Devanagari_fromPadma[utf8_from_unicode($i)] = $Devanagari_fromPadma[Padma::fast_baseFormFromHalfForm($i)] .
                                                       Devanagari::Devanagari_codePoints_misc_VIRAMA;
}

//Unicode Codepoints
//$Devanagari_codePoints = array();

const Devanagari_codePoints_candrabindu  = "\xE0\xA4\x81";
//Vowel Modifiers
const Devanagari_codePoints_anusvara     = "\xE0\xA4\x82";  //sunna
const Devanagari_codePoints_visarga      = "\xE0\xA4\x83";

//Independent Vowels
const Devanagari_codePoints_letter_SHT_A = "\xE0\xA4\x84";
const Devanagari_codePoints_letter_A     = "\xE0\xA4\x85";
const Devanagari_codePoints_letter_AA    = "\xE0\xA4\x86";
const Devanagari_codePoints_letter_I     = "\xE0\xA4\x87";
const Devanagari_codePoints_letter_II    = "\xE0\xA4\x88";
const Devanagari_codePoints_letter_U     = "\xE0\xA4\x89";
const Devanagari_codePoints_letter_UU    = "\xE0\xA4\x8A";
const Devanagari_codePoints_letter_R     = "\xE0\xA4\x8B";   //vocalic R
const Devanagari_codePoints_letter_RR    = "\xE0\xA5\xA0";   //vocalic R
const Devanagari_codePoints_letter_L     = "\xE0\xA4\x8C";   //vocalic L
const Devanagari_codePoints_letter_LL    = "\xE0\xA5\xA1";   //vocalic L
const Devanagari_codePoints_letter_CDR_E = "\xE0\xA4\x8D";
const Devanagari_codePoints_letter_E     = "\xE0\xA4\x8E";
const Devanagari_codePoints_letter_EE    = "\xE0\xA4\x8F";
const Devanagari_codePoints_letter_AI    = "\xE0\xA4\x90";
const Devanagari_codePoints_letter_CDR_O = "\xE0\xA4\x91";
const Devanagari_codePoints_letter_O     = "\xE0\xA4\x92";
const Devanagari_codePoints_letter_OO    = "\xE0\xA4\x93";
const Devanagari_codePoints_letter_AU    = "\xE0\xA4\x94";

//Consonants
const Devanagari_codePoints_letter_KA   = "\xE0\xA4\x95";
const Devanagari_codePoints_letter_KHA  = "\xE0\xA4\x96";
const Devanagari_codePoints_letter_GA   = "\xE0\xA4\x97";
const Devanagari_codePoints_letter_GHA  = "\xE0\xA4\x98";
const Devanagari_codePoints_letter_NGA  = "\xE0\xA4\x99";
const Devanagari_codePoints_letter_CA   = "\xE0\xA4\x9A";
const Devanagari_codePoints_letter_CHA  = "\xE0\xA4\x9B";
const Devanagari_codePoints_letter_JA   = "\xE0\xA4\x9C";
const Devanagari_codePoints_letter_JHA  = "\xE0\xA4\x9D";
const Devanagari_codePoints_letter_NYA  = "\xE0\xA4\x9E";
const Devanagari_codePoints_letter_TTA  = "\xE0\xA4\x9F";
const Devanagari_codePoints_letter_TTHA = "\xE0\xA4\xA0";
const Devanagari_codePoints_letter_DDA  = "\xE0\xA4\xA1";
const Devanagari_codePoints_letter_DDHA = "\xE0\xA4\xA2";
const Devanagari_codePoints_letter_NNA  = "\xE0\xA4\xA3";
const Devanagari_codePoints_letter_TA   = "\xE0\xA4\xA4";
const Devanagari_codePoints_letter_THA  = "\xE0\xA4\xA5";
const Devanagari_codePoints_letter_DA   = "\xE0\xA4\xA6";
const Devanagari_codePoints_letter_DHA  = "\xE0\xA4\xA7";
const Devanagari_codePoints_letter_NA   = "\xE0\xA4\xA8";
const Devanagari_codePoints_letter_NNNA = "\xE0\xA4\xA9";
const Devanagari_codePoints_letter_PA   = "\xE0\xA4\xAA";
const Devanagari_codePoints_letter_PHA  = "\xE0\xA4\xAB";
const Devanagari_codePoints_letter_BA   = "\xE0\xA4\xAC";
const Devanagari_codePoints_letter_BHA  = "\xE0\xA4\xAD";
const Devanagari_codePoints_letter_MA   = "\xE0\xA4\xAE";
const Devanagari_codePoints_letter_YA   = "\xE0\xA4\xAF";
const Devanagari_codePoints_letter_RA   = "\xE0\xA4\xB0";
const Devanagari_codePoints_letter_RRA  = "\xE0\xA4\xB1";
const Devanagari_codePoints_letter_LA   = "\xE0\xA4\xB2";
const Devanagari_codePoints_letter_LLA  = "\xE0\xA4\xB3";
const Devanagari_codePoints_letter_ZHA  = "\xE0\xA4\xB4";  //LLLA
const Devanagari_codePoints_letter_VA   = "\xE0\xA4\xB5";
const Devanagari_codePoints_letter_SHA  = "\xE0\xA4\xB6";
const Devanagari_codePoints_letter_SSA  = "\xE0\xA4\xB7";
const Devanagari_codePoints_letter_SA   = "\xE0\xA4\xB8";
const Devanagari_codePoints_letter_HA   = "\xE0\xA4\xB9";
const Devanagari_codePoints_letter_QA   = "\xE0\xA5\x98";
const Devanagari_codePoints_letter_KHHA = "\xE0\xA5\x99";
const Devanagari_codePoints_letter_GHHA = "\xE0\xA5\x9A";
const Devanagari_codePoints_letter_ZA   = "\xE0\xA5\x9B";
const Devanagari_codePoints_letter_DDDHA= "\xE0\xA5\x9C";
const Devanagari_codePoints_letter_RHA  = "\xE0\xA5\x9D";
const Devanagari_codePoints_letter_FA   = "\xE0\xA5\x9E";
const Devanagari_codePoints_letter_YYA  = "\xE0\xA5\x9F";
const Devanagari_codePoints_letter_GGA  = "\xE0\xA5\xBB";   //Sindhi
const Devanagari_codePoints_letter_JJA  = "\xE0\xA5\xBC";   //Sindhi
const Devanagari_codePoints_letter_DDDA = "\xE0\xA5\xBE";   //Sindhi
const Devanagari_codePoints_letter_BBA  = "\xE0\xA5\xBF";   //Sindhi
const Devanagari_codePoints_GLOTTALSTOP = "\xE0\xA5\xBD";

//const Dependent Vowel Signs
const Devanagari_codePoints_vowelsn_AA    = "\xE0\xA4\xBE";
const Devanagari_codePoints_vowelsn_I     = "\xE0\xA4\xBF";
const Devanagari_codePoints_vowelsn_II    = "\xE0\xA5\x80";
const Devanagari_codePoints_vowelsn_U     = "\xE0\xA5\x81";
const Devanagari_codePoints_vowelsn_UU    = "\xE0\xA5\x82";
const Devanagari_codePoints_vowelsn_R     = "\xE0\xA5\x83";
const Devanagari_codePoints_vowelsn_RR    = "\xE0\xA5\x84";
const Devanagari_codePoints_vowelsn_L     = "\xE0\xA5\xA2";
const Devanagari_codePoints_vowelsn_LL    = "\xE0\xA5\xA3";
const Devanagari_codePoints_vowelsn_CDR_E = "\xE0\xA5\x85";
const Devanagari_codePoints_vowelsn_E     = "\xE0\xA5\x86";
const Devanagari_codePoints_vowelsn_EE    = "\xE0\xA5\x87";
const Devanagari_codePoints_vowelsn_AI    = "\xE0\xA5\x88";
const Devanagari_codePoints_vowelsn_CDR_O = "\xE0\xA5\x89";
const Devanagari_codePoints_vowelsn_O     = "\xE0\xA5\x8A";
const Devanagari_codePoints_vowelsn_OO    = "\xE0\xA5\x8B";
const Devanagari_codePoints_vowelsn_AU    = "\xE0\xA5\x8C";

//Miscellaneous Signs
const Devanagari_codePoints_misc_NUKTA    = "\xE0\xA4\xBC";   
const Devanagari_codePoints_misc_AVAGRAHA = "\xE0\xA4\xBD";   
const Devanagari_codePoints_misc_VIRAMA   = "\xE0\xA5\x8D";   //halant
const Devanagari_codePoints_misc_OM       = "\xE0\xA5\x90";
const Devanagari_codePoints_misc_ABBREV   = "\xE0\xA5\xB0";

//const Digits
const Devanagari_codePoints_digit_ZERO  = "\xE0\xA5\xA6";
const Devanagari_codePoints_digit_ONE   = "\xE0\xA5\xA7";
const Devanagari_codePoints_digit_TWO   = "\xE0\xA5\xA8";
const Devanagari_codePoints_digit_THREE = "\xE0\xA5\xA9";
const Devanagari_codePoints_digit_FOUR  = "\xE0\xA5\xAA";
const Devanagari_codePoints_digit_FIVE  = "\xE0\xA5\xAB";
const Devanagari_codePoints_digit_SIX   = "\xE0\xA5\xAC";
const Devanagari_codePoints_digit_SEVEN = "\xE0\xA5\xAD";
const Devanagari_codePoints_digit_EIGHT = "\xE0\xA5\xAE";
const Devanagari_codePoints_digit_NINE  = "\xE0\xA5\xAF";
}

$Devanagari_fromPadma = array();
$Devanagari_fromPadma[Padma::Padma_anusvara]    = Devanagari::Devanagari_codePoints_anusvara;
$Devanagari_fromPadma[Padma::Padma_visarga]     = Devanagari::Devanagari_codePoints_visarga;
$Devanagari_fromPadma[Padma::Padma_candrabindu] = Devanagari::Devanagari_codePoints_candrabindu;
$Devanagari_fromPadma[Padma::Padma_halant]      = Devanagari::Devanagari_codePoints_misc_VIRAMA;
$Devanagari_fromPadma[Padma::Padma_chillu]      = Devanagari::Devanagari_codePoints_misc_VIRAMA . Shared::Unicode_Shared_ZWJ;
$Devanagari_fromPadma[Padma::Padma_syllbreak]   = Devanagari::Devanagari_codePoints_misc_VIRAMA . Shared::Unicode_Shared_ZWNJ;
$Devanagari_fromPadma[Padma::Padma_avagraha]    = Devanagari::Devanagari_codePoints_misc_AVAGRAHA;
$Devanagari_fromPadma[Padma::Padma_udAtta]      = Shared::Unicode_Shared_UDATTA;
$Devanagari_fromPadma[Padma::Padma_anudAtta]    = Shared::Unicode_Shared_ANUDATTA;
$Devanagari_fromPadma[Padma::Padma_svarita]     = Shared::Unicode_Shared_SVARITA;
$Devanagari_fromPadma[Padma::Padma_danda]       = Shared::Unicode_Shared_DANDA;
$Devanagari_fromPadma[Padma::Padma_ddanda]      = Shared::Unicode_Shared_DDANDA;
$Devanagari_fromPadma[Padma::Padma_om]          = Devanagari::Devanagari_codePoints_misc_OM;
$Devanagari_fromPadma[Padma::Padma_abbrev]      = Devanagari::Devanagari_codePoints_misc_ABBREV;
$Devanagari_fromPadma[Padma::Padma_nukta]       = Devanagari::Devanagari_codePoints_misc_NUKTA;

//digits
$Devanagari_fromPadma[Padma::Padma_digit_ZERO]  = Devanagari::Devanagari_codePoints_digit_ZERO;
$Devanagari_fromPadma[Padma::Padma_digit_ONE]   = Devanagari::Devanagari_codePoints_digit_ONE;
$Devanagari_fromPadma[Padma::Padma_digit_TWO]   = Devanagari::Devanagari_codePoints_digit_TWO;
$Devanagari_fromPadma[Padma::Padma_digit_THREE] = Devanagari::Devanagari_codePoints_digit_THREE;
$Devanagari_fromPadma[Padma::Padma_digit_FOUR]  = Devanagari::Devanagari_codePoints_digit_FOUR;
$Devanagari_fromPadma[Padma::Padma_digit_FIVE]  = Devanagari::Devanagari_codePoints_digit_FIVE;
$Devanagari_fromPadma[Padma::Padma_digit_SIX]   = Devanagari::Devanagari_codePoints_digit_SIX;
$Devanagari_fromPadma[Padma::Padma_digit_SEVEN] = Devanagari::Devanagari_codePoints_digit_SEVEN;
$Devanagari_fromPadma[Padma::Padma_digit_EIGHT] = Devanagari::Devanagari_codePoints_digit_EIGHT;
$Devanagari_fromPadma[Padma::Padma_digit_NINE]  = Devanagari::Devanagari_codePoints_digit_NINE;

//Vowels
$Devanagari_fromPadma[Padma::Padma_vowel_SHT_A] = Devanagari::Devanagari_codePoints_letter_SHT_A;
$Devanagari_fromPadma[Padma::Padma_vowel_A]     = Devanagari::Devanagari_codePoints_letter_A;
$Devanagari_fromPadma[Padma::Padma_vowel_AA]    = Devanagari::Devanagari_codePoints_letter_AA;
$Devanagari_fromPadma[Padma::Padma_vowel_I]     = Devanagari::Devanagari_codePoints_letter_I;
$Devanagari_fromPadma[Padma::Padma_vowel_II]    = Devanagari::Devanagari_codePoints_letter_II;
$Devanagari_fromPadma[Padma::Padma_vowel_U]     = Devanagari::Devanagari_codePoints_letter_U;
$Devanagari_fromPadma[Padma::Padma_vowel_UU]    = Devanagari::Devanagari_codePoints_letter_UU;
$Devanagari_fromPadma[Padma::Padma_vowel_R]     = Devanagari::Devanagari_codePoints_letter_R;
$Devanagari_fromPadma[Padma::Padma_vowel_RR]    = Devanagari::Devanagari_codePoints_letter_RR;
$Devanagari_fromPadma[Padma::Padma_vowel_L]     = Devanagari::Devanagari_codePoints_letter_L;
$Devanagari_fromPadma[Padma::Padma_vowel_LL]    = Devanagari::Devanagari_codePoints_letter_LL;
$Devanagari_fromPadma[Padma::Padma_vowel_CDR_E] = Devanagari::Devanagari_codePoints_letter_CDR_E;
$Devanagari_fromPadma[Padma::Padma_vowel_E]     = Devanagari::Devanagari_codePoints_letter_E;
$Devanagari_fromPadma[Padma::Padma_vowel_EE]    = Devanagari::Devanagari_codePoints_letter_EE;
$Devanagari_fromPadma[Padma::Padma_vowel_AI]    = Devanagari::Devanagari_codePoints_letter_AI;
$Devanagari_fromPadma[Padma::Padma_vowel_CDR_O] = Devanagari::Devanagari_codePoints_letter_CDR_O;
$Devanagari_fromPadma[Padma::Padma_vowel_O]     = Devanagari::Devanagari_codePoints_letter_O;
$Devanagari_fromPadma[Padma::Padma_vowel_OO]    = Devanagari::Devanagari_codePoints_letter_OO;
$Devanagari_fromPadma[Padma::Padma_vowel_AU]    = Devanagari::Devanagari_codePoints_letter_AU;

//Consonants
$Devanagari_fromPadma[Padma::Padma_consnt_KA]   = Devanagari::Devanagari_codePoints_letter_KA;
$Devanagari_fromPadma[Padma::Padma_consnt_KHA]  = Devanagari::Devanagari_codePoints_letter_KHA;
$Devanagari_fromPadma[Padma::Padma_consnt_GA]   = Devanagari::Devanagari_codePoints_letter_GA;
$Devanagari_fromPadma[Padma::Padma_consnt_GHA]  = Devanagari::Devanagari_codePoints_letter_GHA;
$Devanagari_fromPadma[Padma::Padma_consnt_NGA]  = Devanagari::Devanagari_codePoints_letter_NGA;
$Devanagari_fromPadma[Padma::Padma_consnt_CA]   = Devanagari::Devanagari_codePoints_letter_CA;
$Devanagari_fromPadma[Padma::Padma_consnt_CHA]  = Devanagari::Devanagari_codePoints_letter_CHA;
$Devanagari_fromPadma[Padma::Padma_consnt_JA]   = Devanagari::Devanagari_codePoints_letter_JA;
$Devanagari_fromPadma[Padma::Padma_consnt_JHA]  = Devanagari::Devanagari_codePoints_letter_JHA;
$Devanagari_fromPadma[Padma::Padma_consnt_NYA]  = Devanagari::Devanagari_codePoints_letter_NYA;
$Devanagari_fromPadma[Padma::Padma_consnt_TTA]  = Devanagari::Devanagari_codePoints_letter_TTA;
$Devanagari_fromPadma[Padma::Padma_consnt_TTHA] = Devanagari::Devanagari_codePoints_letter_TTHA;
$Devanagari_fromPadma[Padma::Padma_consnt_DDA]  = Devanagari::Devanagari_codePoints_letter_DDA;
$Devanagari_fromPadma[Padma::Padma_consnt_DDHA] = Devanagari::Devanagari_codePoints_letter_DDHA;
$Devanagari_fromPadma[Padma::Padma_consnt_NNA]  = Devanagari::Devanagari_codePoints_letter_NNA;
$Devanagari_fromPadma[Padma::Padma_consnt_NNNA] = Devanagari::Devanagari_codePoints_letter_NNNA;
$Devanagari_fromPadma[Padma::Padma_consnt_TA]   = Devanagari::Devanagari_codePoints_letter_TA;
$Devanagari_fromPadma[Padma::Padma_consnt_THA]  = Devanagari::Devanagari_codePoints_letter_THA;
$Devanagari_fromPadma[Padma::Padma_consnt_DA]   = Devanagari::Devanagari_codePoints_letter_DA;
$Devanagari_fromPadma[Padma::Padma_consnt_DHA]  = Devanagari::Devanagari_codePoints_letter_DHA;
$Devanagari_fromPadma[Padma::Padma_consnt_NA]   = Devanagari::Devanagari_codePoints_letter_NA;
$Devanagari_fromPadma[Padma::Padma_consnt_PA]   = Devanagari::Devanagari_codePoints_letter_PA;
$Devanagari_fromPadma[Padma::Padma_consnt_PHA]  = Devanagari::Devanagari_codePoints_letter_PHA;
$Devanagari_fromPadma[Padma::Padma_consnt_BA]   = Devanagari::Devanagari_codePoints_letter_BA;
$Devanagari_fromPadma[Padma::Padma_consnt_BHA]  = Devanagari::Devanagari_codePoints_letter_BHA;
$Devanagari_fromPadma[Padma::Padma_consnt_MA]   = Devanagari::Devanagari_codePoints_letter_MA;
$Devanagari_fromPadma[Padma::Padma_consnt_YA]   = Devanagari::Devanagari_codePoints_letter_YA;
$Devanagari_fromPadma[Padma::Padma_consnt_RA]   = Devanagari::Devanagari_codePoints_letter_RA;
$Devanagari_fromPadma[Padma::Padma_consnt_LA]   = Devanagari::Devanagari_codePoints_letter_LA;
$Devanagari_fromPadma[Padma::Padma_consnt_VA]   = Devanagari::Devanagari_codePoints_letter_VA;
$Devanagari_fromPadma[Padma::Padma_consnt_SHA]  = Devanagari::Devanagari_codePoints_letter_SHA;
$Devanagari_fromPadma[Padma::Padma_consnt_SSA]  = Devanagari::Devanagari_codePoints_letter_SSA;
$Devanagari_fromPadma[Padma::Padma_consnt_SA]   = Devanagari::Devanagari_codePoints_letter_SA;
$Devanagari_fromPadma[Padma::Padma_consnt_HA]   = Devanagari::Devanagari_codePoints_letter_HA;
$Devanagari_fromPadma[Padma::Padma_consnt_LLA]  = Devanagari::Devanagari_codePoints_letter_LLA;
$Devanagari_fromPadma[Padma::Padma_consnt_ZHA]  = Devanagari::Devanagari_codePoints_letter_ZHA;
$Devanagari_fromPadma[Padma::Padma_consnt_RRA]  = Devanagari::Devanagari_codePoints_letter_RRA;
$Devanagari_fromPadma[Padma::Padma_consnt_QA]   = Devanagari::Devanagari_codePoints_letter_QA;
$Devanagari_fromPadma[Padma::Padma_consnt_KHHA] = Devanagari::Devanagari_codePoints_letter_KHHA;
$Devanagari_fromPadma[Padma::Padma_consnt_GHHA] = Devanagari::Devanagari_codePoints_letter_GHHA;
$Devanagari_fromPadma[Padma::Padma_consnt_ZA]   = Devanagari::Devanagari_codePoints_letter_ZA;
$Devanagari_fromPadma[Padma::Padma_consnt_DDDHA]= Devanagari::Devanagari_codePoints_letter_DDDHA;
$Devanagari_fromPadma[Padma::Padma_consnt_RHA]  = Devanagari::Devanagari_codePoints_letter_RHA;
$Devanagari_fromPadma[Padma::Padma_consnt_FA]   = Devanagari::Devanagari_codePoints_letter_FA;
$Devanagari_fromPadma[Padma::Padma_consnt_YYA]  = Devanagari::Devanagari_codePoints_letter_YYA;
$Devanagari_fromPadma[Padma::Padma_consnt_GGA]  = Devanagari::Devanagari_codePoints_letter_GGA;
$Devanagari_fromPadma[Padma::Padma_consnt_JJA]  = Devanagari::Devanagari_codePoints_letter_JJA;
$Devanagari_fromPadma[Padma::Padma_consnt_DDDA] = Devanagari::Devanagari_codePoints_letter_DDDA;
$Devanagari_fromPadma[Padma::Padma_consnt_BBA]  = Devanagari::Devanagari_codePoints_letter_BBA;

//Gunimtaalu
$Devanagari_fromPadma[Padma::Padma_vowelsn_AA]  = Devanagari::Devanagari_codePoints_vowelsn_AA;
$Devanagari_fromPadma[Padma::Padma_vowelsn_I]   = Devanagari::Devanagari_codePoints_vowelsn_I;
$Devanagari_fromPadma[Padma::Padma_vowelsn_II]  = Devanagari::Devanagari_codePoints_vowelsn_II;
$Devanagari_fromPadma[Padma::Padma_vowelsn_U]   = Devanagari::Devanagari_codePoints_vowelsn_U;
$Devanagari_fromPadma[Padma::Padma_vowelsn_UU]  = Devanagari::Devanagari_codePoints_vowelsn_UU;
$Devanagari_fromPadma[Padma::Padma_vowelsn_R]   = Devanagari::Devanagari_codePoints_vowelsn_R;
$Devanagari_fromPadma[Padma::Padma_vowelsn_RR]  = Devanagari::Devanagari_codePoints_vowelsn_RR;
$Devanagari_fromPadma[Padma::Padma_vowelsn_CDR_E] = Devanagari::Devanagari_codePoints_vowelsn_CDR_E;
$Devanagari_fromPadma[Padma::Padma_vowelsn_E]   = Devanagari::Devanagari_codePoints_vowelsn_E;
$Devanagari_fromPadma[Padma::Padma_vowelsn_EE]  = Devanagari::Devanagari_codePoints_vowelsn_EE;
$Devanagari_fromPadma[Padma::Padma_vowelsn_AI]  = Devanagari::Devanagari_codePoints_vowelsn_AI;
$Devanagari_fromPadma[Padma::Padma_vowelsn_CDR_O] = Devanagari::Devanagari_codePoints_vowelsn_CDR_O;
$Devanagari_fromPadma[Padma::Padma_vowelsn_O]   = Devanagari::Devanagari_codePoints_vowelsn_O;
$Devanagari_fromPadma[Padma::Padma_vowelsn_OO]  = Devanagari::Devanagari_codePoints_vowelsn_OO;
$Devanagari_fromPadma[Padma::Padma_vowelsn_AU]  = Devanagari::Devanagari_codePoints_vowelsn_AU;
?>
