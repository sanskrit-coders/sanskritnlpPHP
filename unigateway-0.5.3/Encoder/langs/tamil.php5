<?php
/* ***** BEGIN LICENSE BLOCK *****
 *
 *  This file is originally part of Padma.
 *
 *  Copyright (C) 2005-2006 Nagarjuna Venna <vnagarjuna@yahoo.com>
 *  Copyright (C) 2006 Harshita Vani   <harshita@atc.tcs.com>
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

class Tamil
{
function Tamil()
{
}

//Generate map entries for vattulu and half-forms
 function initialize () {
    
    //echo "\n in tamil initialize \n";
     global $Tamil_fromPadma;  
    for($i = Padma::Padma_vattu_START; $i <= Padma::Padma_vattu_END; $i++)
        $Tamil_fromPadma[utf8_from_unicode($i)] = Tamil::Tamil_codePoints_misc_VIRAMA . 
	                                         $Tamil_fromPadma[Padma::fast_baseFormFromVattu($i)];
    for($i = Padma::Padma_half_START; $i <= Padma::Padma_half_END; $i++)
        $Tamil_fromPadma[utf8_from_unicode($i)] =$Tamil_fromPadma[Padma::fast_baseFormFromHalfForm($i)] .
	                                          Tamil::Tamil_codePoints_misc_VIRAMA;
}

//Unicode Codepoints
//$Tamil_codePoints = array();

//Vowel Modifiers
const Tamil_codePoints_anusvara    = "\xE0\xAE\x82";  //not used in Tamil apparently
const Tamil_codePoints_visarga     = "\xE0\xAE\x83";  //aytham

//Independent Vowels
const Tamil_codePoints_letter_A    = "\xE0\xAE\x85";
const Tamil_codePoints_letter_AA   = "\xE0\xAE\x86";
const Tamil_codePoints_letter_I    = "\xE0\xAE\x87";
const Tamil_codePoints_letter_II   = "\xE0\xAE\x88";
const Tamil_codePoints_letter_U    = "\xE0\xAE\x89";
const Tamil_codePoints_letter_UU   = "\xE0\xAE\x8A";
const Tamil_codePoints_letter_E    = "\xE0\xAE\x8E";
const Tamil_codePoints_letter_EE   = "\xE0\xAE\x8F";
const Tamil_codePoints_letter_AI   = "\xE0\xAE\x90";
const Tamil_codePoints_letter_O    = "\xE0\xAE\x92";
const Tamil_codePoints_letter_OO   = "\xE0\xAE\x93";
const Tamil_codePoints_letter_AU   = "\xE0\xAE\x94";  //also 0B92 0BD7

//Consonants
const Tamil_codePoints_letter_KA   = "\xE0\xAE\x95";
const Tamil_codePoints_letter_NGA  = "\xE0\xAE\x99";
const Tamil_codePoints_letter_CA   = "\xE0\xAE\x9A";
const Tamil_codePoints_letter_JA   = "\xE0\xAE\x9C";
const Tamil_codePoints_letter_NYA  = "\xE0\xAE\x9E";
const Tamil_codePoints_letter_TTA  = "\xE0\xAE\x9F";
const Tamil_codePoints_letter_NNA  = "\xE0\xAE\xA3";
const Tamil_codePoints_letter_TA   = "\xE0\xAE\xA4";
const Tamil_codePoints_letter_NA   = "\xE0\xAE\xA8";
const Tamil_codePoints_letter_NNNA = "\xE0\xAE\xA9";
const Tamil_codePoints_letter_PA   = "\xE0\xAE\xAA";
const Tamil_codePoints_letter_MA   = "\xE0\xAE\xAE";
const Tamil_codePoints_letter_YA   = "\xE0\xAE\xAF";
const Tamil_codePoints_letter_RA   = "\xE0\xAE\xB0";
const Tamil_codePoints_letter_RRA  = "\xE0\xAE\xB1";
const Tamil_codePoints_letter_LA   = "\xE0\xAE\xB2";
const Tamil_codePoints_letter_LLA  = "\xE0\xAE\xB3";
const Tamil_codePoints_letter_ZHA  = "\xE0\xAE\xB4";
const Tamil_codePoints_letter_VA   = "\xE0\xAE\xB5";
const Tamil_codePoints_letter_SHA  = "\xE0\xAE\xB6";
const Tamil_codePoints_letter_SSA  = "\xE0\xAE\xB7";
const Tamil_codePoints_letter_SA   = "\xE0\xAE\xB8";
const Tamil_codePoints_letter_HA   = "\xE0\xAE\xB9";

//Dependent Vowel Signs
const Tamil_codePoints_vowelsn_AA  = "\xE0\xAE\xBE";
const Tamil_codePoints_vowelsn_I   = "\xE0\xAE\xBF";
const Tamil_codePoints_vowelsn_II  = "\xE0\xAF\x80";
const Tamil_codePoints_vowelsn_U   = "\xE0\xAF\x81";
const Tamil_codePoints_vowelsn_UU  = "\xE0\xAF\x82";
const Tamil_codePoints_vowelsn_E   = "\xE0\xAF\x86"; //left of consonat
const Tamil_codePoints_vowelsn_EE  = "\xE0\xAF\x87"; //left of consonant
const Tamil_codePoints_vowelsn_AI  = "\xE0\xAF\x88"; //left of consonat
const Tamil_codePoints_vowelsn_O   = "\xE0\xAF\x8A"; //Also 0BC6 + 0BBE
const Tamil_codePoints_vowelsn_OO  = "\xE0\xAF\x8B"; //Also 0BC7 + 0BBE
const Tamil_codePoints_vowelsn_AU  = "\xE0\xAF\x8C"; //Also 0BC6 + 0BD7

//Miscellaneous Signs
const Tamil_codePoints_misc_VIRAMA   = "\xE0\xAF\x8D";  //pulli
const Tamil_codePoints_misc_AULEN    = "\xE0\xAF\x97";

//Digits
const Tamil_codePoints_digit_ZERO  = "\xE0\xAF\xA6";
const Tamil_codePoints_digit_ONE   = "\xE0\xAF\xA7";
const Tamil_codePoints_digit_TWO   = "\xE0\xAF\xA8";
const Tamil_codePoints_digit_THREE = "\xE0\xAF\xA9";
const Tamil_codePoints_digit_FOUR  = "\xE0\xAF\xAA";
const Tamil_codePoints_digit_FIVE  = "\xE0\xAF\xAB";
const Tamil_codePoints_digit_SIX   = "\xE0\xAF\xAC";
const Tamil_codePoints_digit_SEVEN = "\xE0\xAF\xAD";
const Tamil_codePoints_digit_EIGHT = "\xE0\xAF\xAE";
const Tamil_codePoints_digit_NINE  = "\xE0\xAF\xAF";

const Tamil_codePoints_digit_TEN      = "\xE0\xAF\xB0";
const Tamil_codePoints_digit_HUNDRED  = "\xE0\xAF\xB1";
const Tamil_codePoints_digit_THOUSAND = "\xE0\xAF\xB2";
const Tamil_codePoints_sign_DAY       = "\xE0\xAF\xB3";
const Tamil_codePoints_sign_MONTH     = "\xE0\xAF\xB4";
const Tamil_codePoints_sign_YEAR      = "\xE0\xAF\xB5";
const Tamil_codePoints_sign_DEBIT     = "\xE0\xAF\xB6";
const Tamil_codePoints_sign_CREDIT    = "\xE0\xAF\xB7";
const Tamil_codePoints_sign_ASABOVE   = "\xE0\xAF\xB8";
const Tamil_codePoints_sign_RUPEE     = "\xE0\xAF\xB9";
const Tamil_codePoints_sign_NUMBER    = "\xE0\xAF\xBA";
}//end of class
$Tamil_fromPadma = array();

$Tamil_fromPadma[Padma::Padma_anusvara]    = Tamil::Tamil_codePoints_anusvara;
$Tamil_fromPadma[Padma::Padma_visarga]     = Tamil::Tamil_codePoints_visarga;
$Tamil_fromPadma[Padma::Padma_pulli]       = Tamil::Tamil_codePoints_misc_VIRAMA;
$Tamil_fromPadma[Padma::Padma_chillu]      = Tamil::Tamil_codePoints_misc_VIRAMA . Shared::Unicode_Shared_ZWJ;
$Tamil_fromPadma[Padma::Padma_syllbreak]   = Tamil::Tamil_codePoints_misc_VIRAMA . Shared::Unicode_Shared_ZWNJ;
$Tamil_fromPadma[Padma::Padma_avagraha]    = Shared::Unicode_Shared_AVAGRAHA;
$Tamil_fromPadma[Padma::Padma_udAtta]      = Shared::Unicode_Shared_UDATTA;
$Tamil_fromPadma[Padma::Padma_anudAtta]    = Shared::Unicode_Shared_ANUDATTA;
$Tamil_fromPadma[Padma::Padma_svarita]     = Shared::Unicode_Shared_SVARITA;
$Tamil_fromPadma[Padma::Padma_danda]       = Shared::Unicode_Shared_DANDA;
$Tamil_fromPadma[Padma::Padma_ddanda]      = Shared::Unicode_Shared_DDANDA;
$Tamil_fromPadma[Padma::Padma_abbrev]      = Shared::Unicode_Shared_abbrev;
$Tamil_fromPadma[Padma::Padma_om]          = Shared::Unicode_Shared_OM;

//digits
$Tamil_fromPadma[Padma::Padma_digit_ZERO]  = Tamil::Tamil_codePoints_digit_ZERO;
$Tamil_fromPadma[Padma::Padma_digit_ONE]   = Tamil::Tamil_codePoints_digit_ONE;
$Tamil_fromPadma[Padma::Padma_digit_TWO]   = Tamil::Tamil_codePoints_digit_TWO;
$Tamil_fromPadma[Padma::Padma_digit_THREE] = Tamil::Tamil_codePoints_digit_THREE;
$Tamil_fromPadma[Padma::Padma_digit_FOUR]  = Tamil::Tamil_codePoints_digit_FOUR;
$Tamil_fromPadma[Padma::Padma_digit_FIVE]  = Tamil::Tamil_codePoints_digit_FIVE;
$Tamil_fromPadma[Padma::Padma_digit_SIX]   = Tamil::Tamil_codePoints_digit_SIX;
$Tamil_fromPadma[Padma::Padma_digit_SEVEN] = Tamil::Tamil_codePoints_digit_SEVEN;
$Tamil_fromPadma[Padma::Padma_digit_EIGHT] = Tamil::Tamil_codePoints_digit_EIGHT;
$Tamil_fromPadma[Padma::Padma_digit_NINE]  = Tamil::Tamil_codePoints_digit_NINE;
$Tamil_fromPadma[Padma::Padma_digit_TEN]   = Tamil::Tamil_codePoints_digit_TEN;
$Tamil_fromPadma[Padma::Padma_digit_HUNDRED] = Tamil::Tamil_codePoints_digit_HUNDRED;
$Tamil_fromPadma[Padma::Padma_digit_THOUSAND] = Tamil::Tamil_codePoints_digit_THOUSAND;

//Vowels
$Tamil_fromPadma[Padma::Padma_vowel_A]     = Tamil::Tamil_codePoints_letter_A;
$Tamil_fromPadma[Padma::Padma_vowel_AA]    = Tamil::Tamil_codePoints_letter_AA;
$Tamil_fromPadma[Padma::Padma_vowel_I]     = Tamil::Tamil_codePoints_letter_I;
$Tamil_fromPadma[Padma::Padma_vowel_II]    = Tamil::Tamil_codePoints_letter_II;
$Tamil_fromPadma[Padma::Padma_vowel_U]     = Tamil::Tamil_codePoints_letter_U;
$Tamil_fromPadma[Padma::Padma_vowel_UU]    = Tamil::Tamil_codePoints_letter_UU;
$Tamil_fromPadma[Padma::Padma_vowel_E]     = Tamil::Tamil_codePoints_letter_E;
$Tamil_fromPadma[Padma::Padma_vowel_EE]    = Tamil::Tamil_codePoints_letter_EE;
$Tamil_fromPadma[Padma::Padma_vowel_AI]    = Tamil::Tamil_codePoints_letter_AI;
$Tamil_fromPadma[Padma::Padma_vowel_O]     = Tamil::Tamil_codePoints_letter_O;
$Tamil_fromPadma[Padma::Padma_vowel_OO]    = Tamil::Tamil_codePoints_letter_OO;
$Tamil_fromPadma[Padma::Padma_vowel_AU]    = Tamil::Tamil_codePoints_letter_AU;

//Consonants
$Tamil_fromPadma[Padma::Padma_consnt_KA]   = Tamil::Tamil_codePoints_letter_KA;
$Tamil_fromPadma[Padma::Padma_consnt_NGA]  = Tamil::Tamil_codePoints_letter_NGA;
$Tamil_fromPadma[Padma::Padma_consnt_CA]   = Tamil::Tamil_codePoints_letter_CA;
$Tamil_fromPadma[Padma::Padma_consnt_JA]   = Tamil::Tamil_codePoints_letter_JA;
$Tamil_fromPadma[Padma::Padma_consnt_NYA]  = Tamil::Tamil_codePoints_letter_NYA;
$Tamil_fromPadma[Padma::Padma_consnt_TTA]  = Tamil::Tamil_codePoints_letter_TTA;
$Tamil_fromPadma[Padma::Padma_consnt_NNA]  = Tamil::Tamil_codePoints_letter_NNA;
$Tamil_fromPadma[Padma::Padma_consnt_TA]   = Tamil::Tamil_codePoints_letter_TA;
$Tamil_fromPadma[Padma::Padma_consnt_NA]   = Tamil::Tamil_codePoints_letter_NA;
$Tamil_fromPadma[Padma::Padma_consnt_NNNA] = Tamil::Tamil_codePoints_letter_NNNA;
$Tamil_fromPadma[Padma::Padma_consnt_PA]   = Tamil::Tamil_codePoints_letter_PA;
$Tamil_fromPadma[Padma::Padma_consnt_MA]   = Tamil::Tamil_codePoints_letter_MA;
$Tamil_fromPadma[Padma::Padma_consnt_YA]   = Tamil::Tamil_codePoints_letter_YA;
$Tamil_fromPadma[Padma::Padma_consnt_RA]   = Tamil::Tamil_codePoints_letter_RA;
$Tamil_fromPadma[Padma::Padma_consnt_LA]   = Tamil::Tamil_codePoints_letter_LA;
$Tamil_fromPadma[Padma::Padma_consnt_VA]   = Tamil::Tamil_codePoints_letter_VA;
$Tamil_fromPadma[Padma::Padma_consnt_SHA]  = Tamil::Tamil_codePoints_letter_SHA;
$Tamil_fromPadma[Padma::Padma_consnt_SSA]  = Tamil::Tamil_codePoints_letter_SSA;
$Tamil_fromPadma[Padma::Padma_consnt_SA]   = Tamil::Tamil_codePoints_letter_SA;
$Tamil_fromPadma[Padma::Padma_consnt_HA]   = Tamil::Tamil_codePoints_letter_HA;
$Tamil_fromPadma[Padma::Padma_consnt_LLA]  = Tamil::Tamil_codePoints_letter_LLA;
$Tamil_fromPadma[Padma::Padma_consnt_ZHA]  = Tamil::Tamil_codePoints_letter_ZHA;
$Tamil_fromPadma[Padma::Padma_consnt_RRA]  = Tamil::Tamil_codePoints_letter_RRA;

//Gunimtaalu
$Tamil_fromPadma[Padma::Padma_vowelsn_AA]  = Tamil::Tamil_codePoints_vowelsn_AA;
$Tamil_fromPadma[Padma::Padma_vowelsn_I]   = Tamil::Tamil_codePoints_vowelsn_I;
$Tamil_fromPadma[Padma::Padma_vowelsn_II]  = Tamil::Tamil_codePoints_vowelsn_II;
$Tamil_fromPadma[Padma::Padma_vowelsn_U]   = Tamil::Tamil_codePoints_vowelsn_U;
$Tamil_fromPadma[Padma::Padma_vowelsn_UU]  = Tamil::Tamil_codePoints_vowelsn_UU;
$Tamil_fromPadma[Padma::Padma_vowelsn_E]   = Tamil::Tamil_codePoints_vowelsn_E;
$Tamil_fromPadma[Padma::Padma_vowelsn_EE]  = Tamil::Tamil_codePoints_vowelsn_EE;
$Tamil_fromPadma[Padma::Padma_vowelsn_AI]  = Tamil::Tamil_codePoints_vowelsn_AI;
$Tamil_fromPadma[Padma::Padma_vowelsn_O]   = Tamil::Tamil_codePoints_vowelsn_O;
$Tamil_fromPadma[Padma::Padma_vowelsn_OO]  = Tamil::Tamil_codePoints_vowelsn_OO;
$Tamil_fromPadma[Padma::Padma_vowelsn_AU]  = Tamil::Tamil_codePoints_vowelsn_AU;
$Tamil_fromPadma[Padma::Padma_vowelsn_AULEN]  = Tamil::Tamil_codePoints_misc_AULEN;

//Misc
$Tamil_fromPadma[Padma::Padma_sign_DAY]     = Tamil::Tamil_codePoints_sign_DAY;
$Tamil_fromPadma[Padma::Padma_sign_MONTH]   = Tamil::Tamil_codePoints_sign_MONTH;
$Tamil_fromPadma[Padma::Padma_sign_YEAR]    = Tamil::Tamil_codePoints_sign_YEAR;
$Tamil_fromPadma[Padma::Padma_sign_DEBIT]   = Tamil::Tamil_codePoints_sign_DEBIT;
$Tamil_fromPadma[Padma::Padma_sign_CREDIT]  = Tamil::Tamil_codePoints_sign_CREDIT;
$Tamil_fromPadma[Padma::Padma_sign_ASABOVE] = Tamil::Tamil_codePoints_sign_ASABOVE;
$Tamil_fromPadma[Padma::Padma_sign_RUPEE]   = Tamil::Tamil_codePoints_sign_RUPEE;
$Tamil_fromPadma[Padma::Padma_sign_NUMBER]  = Tamil::Tamil_codePoints_sign_NUMBER;

//$The following are not directly present in Tamil - equivalent transliteration
$Tamil_fromPadma[Padma::Padma_vowel_SHT_A]   = Tamil::Tamil_codePoints_letter_A;
$Tamil_fromPadma[Padma::Padma_vowel_CDR_E]   = Tamil::Tamil_codePoints_letter_E;
$Tamil_fromPadma[Padma::Padma_vowel_CDR_O]   = Tamil::Tamil_codePoints_letter_O;
$Tamil_fromPadma[Padma::Padma_consnt_QA]     = Tamil::Tamil_codePoints_letter_KA;
$Tamil_fromPadma[Padma::Padma_consnt_KHA]    = Tamil::Tamil_codePoints_letter_KA;
$Tamil_fromPadma[Padma::Padma_consnt_KHHA]   = Tamil::Tamil_codePoints_letter_KA;
$Tamil_fromPadma[Padma::Padma_consnt_GA]     = Tamil::Tamil_codePoints_letter_KA;
$Tamil_fromPadma[Padma::Padma_consnt_GHA]    = Tamil::Tamil_codePoints_letter_KA;
$Tamil_fromPadma[Padma::Padma_consnt_GHHA]   = Tamil::Tamil_codePoints_letter_KA;
$Tamil_fromPadma[Padma::Padma_consnt_CHA]    = Tamil::Tamil_codePoints_letter_CA;
$Tamil_fromPadma[Padma::Padma_consnt_ZA]     = Tamil::Tamil_codePoints_letter_JA;
$Tamil_fromPadma[Padma::Padma_consnt_JHA]    = Tamil::Tamil_codePoints_letter_JA;
$Tamil_fromPadma[Padma::Padma_consnt_TTHA]   = Tamil::Tamil_codePoints_letter_TTA;
$Tamil_fromPadma[Padma::Padma_consnt_DDA]    = Tamil::Tamil_codePoints_letter_TTA;
$Tamil_fromPadma[Padma::Padma_consnt_DDHA]   = Tamil::Tamil_codePoints_letter_TTA;
$Tamil_fromPadma[Padma::Padma_consnt_DDDHA]  = Tamil::Tamil_codePoints_letter_TTA;
$Tamil_fromPadma[Padma::Padma_consnt_RHA]    = Tamil::Tamil_codePoints_letter_TTA;
$Tamil_fromPadma[Padma::Padma_consnt_THA]    = Tamil::Tamil_codePoints_letter_TA;
$Tamil_fromPadma[Padma::Padma_consnt_DA]     = Tamil::Tamil_codePoints_letter_TA;
$Tamil_fromPadma[Padma::Padma_consnt_DHA]    = Tamil::Tamil_codePoints_letter_TA;
$Tamil_fromPadma[Padma::Padma_consnt_FA]     = Tamil::Tamil_codePoints_letter_PA;
$Tamil_fromPadma[Padma::Padma_consnt_PHA]    = Tamil::Tamil_codePoints_letter_PA;
$Tamil_fromPadma[Padma::Padma_consnt_BA]     = Tamil::Tamil_codePoints_letter_PA;
$Tamil_fromPadma[Padma::Padma_consnt_BHA]    = Tamil::Tamil_codePoints_letter_PA;
$Tamil_fromPadma[Padma::Padma_consnt_YYA]    = Tamil::Tamil_codePoints_letter_YA;
$Tamil_fromPadma[Padma::Padma_vowelsn_CDR_E] = Tamil::Tamil_codePoints_vowelsn_E;
$Tamil_fromPadma[Padma::Padma_vowelsn_CDR_O] = Tamil::Tamil_codePoints_vowelsn_O;
?>
