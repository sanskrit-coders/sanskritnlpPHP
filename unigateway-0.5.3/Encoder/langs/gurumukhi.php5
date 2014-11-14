<?php
/* ***** BEGIN LICENSE BLOCK *****
 *
 *  This file is originally part of Padma.
 *
 *  Copyright (C) 2005-2007 A S Alam <aalam@users::users_sf_net>
 *  Copyright (C) 2005-2007 Punjabi OpenSource Team (POST) http://www::www_satluj_org/
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


class Gurmukhi
{
function Gurmukhi()
{
}

//Generate map entries for vattulu and half-forms
function initialize () {
    global $Gurmukhi_fromPadma;
    for($i = Padma::Padma_vattu_START; $i <= Padma::Padma_vattu_END; $i++)
        $Gurmukhi_fromPadma[utf8_from_unicode($i)] = Gurmukhi::Gurmukhi_codePoints_misc_VIRAMA . 
	                                             $Gurmukhi_fromPadma[Padma::fast_baseFormFromVattu($i)];
    for($i = Padma::Padma_half_START; $i <= Padma::Padma_half_END; $i++)
        $Gurmukhi_fromPadma[utf8_from_unicode($i)] = $Gurmukhi_fromPadma[Padma::fast_baseFormFromHalfForm($i)] . 
	                                             Gurmukhi::Gurmukhi_codePoints_misc_VIRAMA;
}

//Unicode Codepoints
//$Gurmukhi_codePoints = array();

const Gurmukhi_codePoints_candrabindu = "\xE0\xA8\x81";
//Vowel Modifiers
const Gurmukhi_codePoints_anusvara    = "\xE0\xA8\x82";
const Gurmukhi_codePoints_visarga     = "\xE0\xA8\x83";

//Independent Vowels
const Gurmukhi_codePoints_letter_A    = "\xE0\xA8\x85";
const Gurmukhi_codePoints_letter_AA   = "\xE0\xA8\x86";
const Gurmukhi_codePoints_letter_I    = "\xE0\xA8\x87";
const Gurmukhi_codePoints_letter_II   = "\xE0\xA8\x88";
const Gurmukhi_codePoints_letter_U    = "\xE0\xA8\x89";
const Gurmukhi_codePoints_letter_UU   = "\xE0\xA8\x8A";
const Gurmukhi_codePoints_letter_EE   = "\xE0\xA8\x8F";
const Gurmukhi_codePoints_letter_AI   = "\xE0\xA8\x90";
const Gurmukhi_codePoints_letter_OO   = "\xE0\xA8\x93";
const Gurmukhi_codePoints_letter_AU   = "\xE0\xA8\x94";

//Consonants
const Gurmukhi_codePoints_letter_KA   = "\xE0\xA8\x95";
const Gurmukhi_codePoints_letter_KHA  = "\xE0\xA8\x96";
const Gurmukhi_codePoints_letter_GA   = "\xE0\xA8\x97";
const Gurmukhi_codePoints_letter_GHA  = "\xE0\xA8\x98";
const Gurmukhi_codePoints_letter_NGA  = "\xE0\xA8\x99";
const Gurmukhi_codePoints_letter_CA   = "\xE0\xA8\x9A";
const Gurmukhi_codePoints_letter_CHA  = "\xE0\xA8\x9B";
const Gurmukhi_codePoints_letter_JA   = "\xE0\xA8\x9C";
const Gurmukhi_codePoints_letter_JHA  = "\xE0\xA8\x9D";
const Gurmukhi_codePoints_letter_NYA  = "\xE0\xA8\x9E";
const Gurmukhi_codePoints_letter_TTA  = "\xE0\xA8\x9F";
const Gurmukhi_codePoints_letter_TTHA = "\xE0\xA8\xA0";
const Gurmukhi_codePoints_letter_DDA  = "\xE0\xA8\xA1";
const Gurmukhi_codePoints_letter_DDHA = "\xE0\xA8\xA2";
const Gurmukhi_codePoints_letter_NNA  = "\xE0\xA8\xA3";
const Gurmukhi_codePoints_letter_TA   = "\xE0\xA8\xA4";
const Gurmukhi_codePoints_letter_THA  = "\xE0\xA8\xA5";
const Gurmukhi_codePoints_letter_DA   = "\xE0\xA8\xA6";
const Gurmukhi_codePoints_letter_DHA  = "\xE0\xA8\xA7";
const Gurmukhi_codePoints_letter_NA   = "\xE0\xA8\xA8";
const Gurmukhi_codePoints_letter_PA   = "\xE0\xA8\xAA";
const Gurmukhi_codePoints_letter_PHA  = "\xE0\xA8\xAB";
const Gurmukhi_codePoints_letter_BA   = "\xE0\xA8\xAC";
const Gurmukhi_codePoints_letter_BHA  = "\xE0\xA8\xAD";
const Gurmukhi_codePoints_letter_MA   = "\xE0\xA8\xAE";
const Gurmukhi_codePoints_letter_YA   = "\xE0\xA8\xAF";
const Gurmukhi_codePoints_letter_RA   = "\xE0\xA8\xB0";
const Gurmukhi_codePoints_letter_LA   = "\xE0\xA8\xB2";
const Gurmukhi_codePoints_letter_LLA  = "\xE0\xA8\xB3";
const Gurmukhi_codePoints_letter_VA   = "\xE0\xA8\xB5";
const Gurmukhi_codePoints_letter_SHA  = "\xE0\xA8\xB6";
const Gurmukhi_codePoints_letter_SA   = "\xE0\xA8\xB8";
const Gurmukhi_codePoints_letter_HA   = "\xE0\xA8\xB9";

const Gurmukhi_codePoints_letter_KHHA = "\xE0\xA9\x99";
const Gurmukhi_codePoints_letter_GHHA = "\xE0\xA9\x9A";
const Gurmukhi_codePoints_letter_ZA   = "\xE0\xA9\x9B";
const Gurmukhi_codePoints_letter_RRA  = "\xE0\xA9\x9C";
const Gurmukhi_codePoints_letter_FA   = "\xE0\xA9\x9E";

//Dependent Vowel Signs
const Gurmukhi_codePoints_vowelsn_AA  = "\xE0\xA8\xBE";
const Gurmukhi_codePoints_vowelsn_I   = "\xE0\xA8\xBF";
const Gurmukhi_codePoints_vowelsn_II  = "\xE0\xA9\x80";
const Gurmukhi_codePoints_vowelsn_U   = "\xE0\xA9\x81";
const Gurmukhi_codePoints_vowelsn_UU  = "\xE0\xA9\x82";
const Gurmukhi_codePoints_vowelsn_EE  = "\xE0\xA9\x87";
const Gurmukhi_codePoints_vowelsn_AI  = "\xE0\xA9\x88";
const Gurmukhi_codePoints_vowelsn_OO  = "\xE0\xA9\x8B";
const Gurmukhi_codePoints_vowelsn_AU  = "\xE0\xA9\x8C";

//Miscellaneous Signs
const Gurmukhi_codePoints_misc_NUKTA   = "\xE0\xA8\xBC";
const Gurmukhi_codePoints_misc_VIRAMA   = "\xE0\xA9\x8D";

const Gurmukhi_codePoints_misc_TIPPI    = "\xE0\xA9\xB0";
const Gurmukhi_codePoints_misc_ADDAK    = "\xE0\xA9\xB1";
const Gurmukhi_codePoints_misc_IRI      = "\xE0\xA9\xB2";
const Gurmukhi_codePoints_misc_URA      = "\xE0\xA9\xB3";
const Gurmukhi_codePoints_misc_EKONKAR = "\xE0\xA9\xB4";
const Gurmukhi_codePoints_misc_KHANDA = "\xE2\x98\xAC";

//Digits
const Gurmukhi_codePoints_digit_ZERO  = "\xE0\xA9\xA6";
const Gurmukhi_codePoints_digit_ONE   = "\xE0\xA9\xA7";
const Gurmukhi_codePoints_digit_TWO   = "\xE0\xA9\xA8";
const Gurmukhi_codePoints_digit_THREE = "\xE0\xA9\xA9";
const Gurmukhi_codePoints_digit_FOUR  = "\xE0\xA9\xAA";
const Gurmukhi_codePoints_digit_FIVE  = "\xE0\xA9\xAB";
const Gurmukhi_codePoints_digit_SIX   = "\xE0\xA9\xAC";
const Gurmukhi_codePoints_digit_SEVEN = "\xE0\xA9\xAD";
const Gurmukhi_codePoints_digit_EIGHT = "\xE0\xA9\xAE";
const Gurmukhi_codePoints_digit_NINE  = "\xE0\xA9\xAF";

}

$Gurmukhi_fromPadma = array();

$Gurmukhi_fromPadma[Padma::Padma_anusvara]    = Gurmukhi::Gurmukhi_codePoints_anusvara;
$Gurmukhi_fromPadma[Padma::Padma_visarga]     = Gurmukhi::Gurmukhi_codePoints_visarga;
$Gurmukhi_fromPadma[Padma::Padma_candrabindu] = Gurmukhi::Gurmukhi_codePoints_candrabindu;
$Gurmukhi_fromPadma[Padma::Padma_halant]      = Gurmukhi::Gurmukhi_codePoints_misc_VIRAMA;
$Gurmukhi_fromPadma[Padma::Padma_udAtta]      = Shared::Unicode_Shared_UDATTA;
$Gurmukhi_fromPadma[Padma::Padma_anudAtta]    = Shared::Unicode_Shared_ANUDATTA;
$Gurmukhi_fromPadma[Padma::Padma_svarita]     = Shared::Unicode_Shared_SVARITA;
$Gurmukhi_fromPadma[Padma::Padma_danda]       = Shared::Unicode_Shared_DANDA;
$Gurmukhi_fromPadma[Padma::Padma_ddanda]      = Shared::Unicode_Shared_DDANDA;
$Gurmukhi_fromPadma[Padma::Padma_nukta]       = Gurmukhi::Gurmukhi_codePoints_misc_NUKTA;

//digits
$Gurmukhi_fromPadma[Padma::Padma_digit_ZERO]  = Gurmukhi::Gurmukhi_codePoints_digit_ZERO;
$Gurmukhi_fromPadma[Padma::Padma_digit_ONE]   = Gurmukhi::Gurmukhi_codePoints_digit_ONE;
$Gurmukhi_fromPadma[Padma::Padma_digit_TWO]   = Gurmukhi::Gurmukhi_codePoints_digit_TWO;
$Gurmukhi_fromPadma[Padma::Padma_digit_THREE] = Gurmukhi::Gurmukhi_codePoints_digit_THREE;
$Gurmukhi_fromPadma[Padma::Padma_digit_FOUR]  = Gurmukhi::Gurmukhi_codePoints_digit_FOUR;
$Gurmukhi_fromPadma[Padma::Padma_digit_FIVE]  = Gurmukhi::Gurmukhi_codePoints_digit_FIVE;
$Gurmukhi_fromPadma[Padma::Padma_digit_SIX]   = Gurmukhi::Gurmukhi_codePoints_digit_SIX;
$Gurmukhi_fromPadma[Padma::Padma_digit_SEVEN] = Gurmukhi::Gurmukhi_codePoints_digit_SEVEN;
$Gurmukhi_fromPadma[Padma::Padma_digit_EIGHT] = Gurmukhi::Gurmukhi_codePoints_digit_EIGHT;
$Gurmukhi_fromPadma[Padma::Padma_digit_NINE]  = Gurmukhi::Gurmukhi_codePoints_digit_NINE;

//Vowels
$Gurmukhi_fromPadma[Padma::Padma_vowel_A]     = Gurmukhi::Gurmukhi_codePoints_letter_A;
$Gurmukhi_fromPadma[Padma::Padma_vowel_AA]    = Gurmukhi::Gurmukhi_codePoints_letter_AA;
$Gurmukhi_fromPadma[Padma::Padma_vowel_I]     = Gurmukhi::Gurmukhi_codePoints_letter_I;
$Gurmukhi_fromPadma[Padma::Padma_vowel_II]    = Gurmukhi::Gurmukhi_codePoints_letter_II;
$Gurmukhi_fromPadma[Padma::Padma_vowel_U]     = Gurmukhi::Gurmukhi_codePoints_letter_U;
$Gurmukhi_fromPadma[Padma::Padma_vowel_UU]    = Gurmukhi::Gurmukhi_codePoints_letter_UU;
$Gurmukhi_fromPadma[Padma::Padma_vowel_EE]    = Gurmukhi::Gurmukhi_codePoints_letter_EE;
$Gurmukhi_fromPadma[Padma::Padma_vowel_AI]    = Gurmukhi::Gurmukhi_codePoints_letter_AI;
$Gurmukhi_fromPadma[Padma::Padma_vowel_OO]    = Gurmukhi::Gurmukhi_codePoints_letter_OO;
$Gurmukhi_fromPadma[Padma::Padma_vowel_AU]    = Gurmukhi::Gurmukhi_codePoints_letter_AU;

//Consonants
$Gurmukhi_fromPadma[Padma::Padma_consnt_KA]   = Gurmukhi::Gurmukhi_codePoints_letter_KA;
$Gurmukhi_fromPadma[Padma::Padma_consnt_KHA]  = Gurmukhi::Gurmukhi_codePoints_letter_KHA;
$Gurmukhi_fromPadma[Padma::Padma_consnt_GA]   = Gurmukhi::Gurmukhi_codePoints_letter_GA;
$Gurmukhi_fromPadma[Padma::Padma_consnt_GHA]  = Gurmukhi::Gurmukhi_codePoints_letter_GHA;
$Gurmukhi_fromPadma[Padma::Padma_consnt_NGA]  = Gurmukhi::Gurmukhi_codePoints_letter_NGA;
$Gurmukhi_fromPadma[Padma::Padma_consnt_CA]   = Gurmukhi::Gurmukhi_codePoints_letter_CA;
$Gurmukhi_fromPadma[Padma::Padma_consnt_CHA]  = Gurmukhi::Gurmukhi_codePoints_letter_CHA;
$Gurmukhi_fromPadma[Padma::Padma_consnt_JA]   = Gurmukhi::Gurmukhi_codePoints_letter_JA;
$Gurmukhi_fromPadma[Padma::Padma_consnt_JHA]  = Gurmukhi::Gurmukhi_codePoints_letter_JHA;
$Gurmukhi_fromPadma[Padma::Padma_consnt_NYA]  = Gurmukhi::Gurmukhi_codePoints_letter_NYA;
$Gurmukhi_fromPadma[Padma::Padma_consnt_TTA]  = Gurmukhi::Gurmukhi_codePoints_letter_TTA;
$Gurmukhi_fromPadma[Padma::Padma_consnt_TTHA] = Gurmukhi::Gurmukhi_codePoints_letter_TTHA;
$Gurmukhi_fromPadma[Padma::Padma_consnt_DDA]  = Gurmukhi::Gurmukhi_codePoints_letter_DDA;
$Gurmukhi_fromPadma[Padma::Padma_consnt_DDHA] = Gurmukhi::Gurmukhi_codePoints_letter_DDHA;
$Gurmukhi_fromPadma[Padma::Padma_consnt_NNA]  = Gurmukhi::Gurmukhi_codePoints_letter_NNA;
$Gurmukhi_fromPadma[Padma::Padma_consnt_TA]   = Gurmukhi::Gurmukhi_codePoints_letter_TA;
$Gurmukhi_fromPadma[Padma::Padma_consnt_THA]  = Gurmukhi::Gurmukhi_codePoints_letter_THA;
$Gurmukhi_fromPadma[Padma::Padma_consnt_DA]   = Gurmukhi::Gurmukhi_codePoints_letter_DA;
$Gurmukhi_fromPadma[Padma::Padma_consnt_DHA]  = Gurmukhi::Gurmukhi_codePoints_letter_DHA;
$Gurmukhi_fromPadma[Padma::Padma_consnt_NA]   = Gurmukhi::Gurmukhi_codePoints_letter_NA;
$Gurmukhi_fromPadma[Padma::Padma_consnt_PA]   = Gurmukhi::Gurmukhi_codePoints_letter_PA;
$Gurmukhi_fromPadma[Padma::Padma_consnt_PHA]  = Gurmukhi::Gurmukhi_codePoints_letter_PHA;
$Gurmukhi_fromPadma[Padma::Padma_consnt_BA]   = Gurmukhi::Gurmukhi_codePoints_letter_BA;
$Gurmukhi_fromPadma[Padma::Padma_consnt_BHA]  = Gurmukhi::Gurmukhi_codePoints_letter_BHA;
$Gurmukhi_fromPadma[Padma::Padma_consnt_MA]   = Gurmukhi::Gurmukhi_codePoints_letter_MA;
$Gurmukhi_fromPadma[Padma::Padma_consnt_YA]   = Gurmukhi::Gurmukhi_codePoints_letter_YA;
$Gurmukhi_fromPadma[Padma::Padma_consnt_RA]   = Gurmukhi::Gurmukhi_codePoints_letter_RA;
$Gurmukhi_fromPadma[Padma::Padma_consnt_LA]   = Gurmukhi::Gurmukhi_codePoints_letter_LA;
$Gurmukhi_fromPadma[Padma::Padma_consnt_LLA]  = Gurmukhi::Gurmukhi_codePoints_letter_LLA;
$Gurmukhi_fromPadma[Padma::Padma_consnt_VA]   = Gurmukhi::Gurmukhi_codePoints_letter_VA;
$Gurmukhi_fromPadma[Padma::Padma_consnt_SHA]  = Gurmukhi::Gurmukhi_codePoints_letter_SHA;
$Gurmukhi_fromPadma[Padma::Padma_consnt_SA]   = Gurmukhi::Gurmukhi_codePoints_letter_SA;
$Gurmukhi_fromPadma[Padma::Padma_consnt_HA]   = Gurmukhi::Gurmukhi_codePoints_letter_HA;

$Gurmukhi_fromPadma[Padma::Padma_consnt_KHHA] = Gurmukhi::Gurmukhi_codePoints_letter_KHHA;
$Gurmukhi_fromPadma[Padma::Padma_consnt_GHHA] = Gurmukhi::Gurmukhi_codePoints_letter_GHHA;
$Gurmukhi_fromPadma[Padma::Padma_consnt_ZA]   = Gurmukhi::Gurmukhi_codePoints_letter_ZA;
$Gurmukhi_fromPadma[Padma::Padma_consnt_RRA]  = Gurmukhi::Gurmukhi_codePoints_letter_RRA;
$Gurmukhi_fromPadma[Padma::Padma_consnt_FA]   = Gurmukhi::Gurmukhi_codePoints_letter_FA;

$Gurmukhi_fromPadma[Padma::Padma_tippi]       = Gurmukhi::Gurmukhi_codePoints_misc_TIPPI;
$Gurmukhi_fromPadma[Padma::Padma_addak]       = Gurmukhi::Gurmukhi_codePoints_misc_ADDAK;
$Gurmukhi_fromPadma[Padma::Padma_ekonkar]     = Gurmukhi::Gurmukhi_codePoints_misc_EKONKAR;

//Dependent Vowel Signs
$Gurmukhi_fromPadma[Padma::Padma_vowelsn_AA]  = Gurmukhi::Gurmukhi_codePoints_vowelsn_AA;
$Gurmukhi_fromPadma[Padma::Padma_vowelsn_I]   = Gurmukhi::Gurmukhi_codePoints_vowelsn_I;
$Gurmukhi_fromPadma[Padma::Padma_vowelsn_II]  = Gurmukhi::Gurmukhi_codePoints_vowelsn_II;
$Gurmukhi_fromPadma[Padma::Padma_vowelsn_U]   = Gurmukhi::Gurmukhi_codePoints_vowelsn_U;
$Gurmukhi_fromPadma[Padma::Padma_vowelsn_UU]  = Gurmukhi::Gurmukhi_codePoints_vowelsn_UU;
$Gurmukhi_fromPadma[Padma::Padma_vowelsn_EE]  = Gurmukhi::Gurmukhi_codePoints_vowelsn_EE;
$Gurmukhi_fromPadma[Padma::Padma_vowelsn_AI]  = Gurmukhi::Gurmukhi_codePoints_vowelsn_AI;
$Gurmukhi_fromPadma[Padma::Padma_vowelsn_OO]  = Gurmukhi::Gurmukhi_codePoints_vowelsn_OO;
$Gurmukhi_fromPadma[Padma::Padma_vowelsn_AU]  = Gurmukhi::Gurmukhi_codePoints_vowelsn_AU;

//The following are not directly present in Gurmukhi - equivalent transliteration
$Gurmukhi_fromPadma[Padma::Padma_vowel_SHT_A]   = Gurmukhi::Gurmukhi_codePoints_letter_A;
$Gurmukhi_fromPadma[Padma::Padma_vowel_CDR_E]   = Gurmukhi::Gurmukhi_codePoints_letter_EE;
$Gurmukhi_fromPadma[Padma::Padma_vowel_E]       = Gurmukhi::Gurmukhi_codePoints_letter_EE;
$Gurmukhi_fromPadma[Padma::Padma_vowel_CDR_O]   = Gurmukhi::Gurmukhi_codePoints_letter_OO;
$Gurmukhi_fromPadma[Padma::Padma_vowel_O]       = Gurmukhi::Gurmukhi_codePoints_letter_OO;
$Gurmukhi_fromPadma[Padma::Padma_consnt_NNNA]   = Gurmukhi::Gurmukhi_codePoints_letter_NA;
$Gurmukhi_fromPadma[Padma::Padma_consnt_SSA]    = Gurmukhi::Gurmukhi_codePoints_letter_SA;
$Gurmukhi_fromPadma[Padma::Padma_vowelsn_CDR_E] = Gurmukhi::Gurmukhi_codePoints_vowelsn_EE;
$Gurmukhi_fromPadma[Padma::Padma_vowelsn_E]     = Gurmukhi::Gurmukhi_codePoints_vowelsn_EE;
$Gurmukhi_fromPadma[Padma::Padma_vowelsn_CDR_O] = Gurmukhi::Gurmukhi_codePoints_vowelsn_OO;
$Gurmukhi_fromPadma[Padma::Padma_vowelsn_O]     = Gurmukhi::Gurmukhi_codePoints_vowelsn_OO;
?>
