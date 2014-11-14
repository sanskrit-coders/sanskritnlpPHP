<?php

/* ***** BEGIN LICENSE BLOCK ***** 
 *
 *  This file is originally part of Padma.
 *
 *  Copyright 2006 Nagarjuna Venna     <vnagarjuna@yahoo.com>
 *  Copyright (C) 2006 Harshita Vani   <harshita@atc.tcs.com>
 *
 *  Padma is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.

 *  Padma is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with Padma; if not, write to the Free Software
 *  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * ***** END LICENSE BLOCK ***** */

class Kannada
{

function Kannada()
{
}

//Generate map entries for vattulu and half-forms
 function initialize () {
  global $Kannada_fromPadma;
    for($i = Padma::Padma_vattu_START; $i <= Padma::Padma_vattu_END; $i++)
        $Kannada_fromPadma[utf8_from_unicode($i)] = Kannada::Kannada_codePoints_misc_VIRAMA . 
	                                            $Kannada_fromPadma[Padma::fast_baseFormFromVattu($i)];
    for($i = Padma::Padma_half_START; $i <= Padma::Padma_half_END; $i++)
        $Kannada_fromPadma[utf8_from_unicode($i)] = $Kannada_fromPadma[Padma::fast_baseFormFromHalfForm($i)] .
	                                            Kannada::Kannada_codePoints_misc_VIRAMA;
}

//Unicode Codepoints
//$Kannada_codePoints =  array();

//Vowel Modifiers
const Kannada_codePoints_anusvara    = "\xE0\xB2\x82";  //sunna
const Kannada_codePoints_visarga     = "\xE0\xB2\x83";

//Independent Vowels
const Kannada_codePoints_letter_A    = "\xE0\xB2\x85";
const Kannada_codePoints_letter_AA   = "\xE0\xB2\x86";
const Kannada_codePoints_letter_I    = "\xE0\xB2\x87";
const Kannada_codePoints_letter_II   = "\xE0\xB2\x88";
const Kannada_codePoints_letter_U    = "\xE0\xB2\x89";
const Kannada_codePoints_letter_UU   = "\xE0\xB2\x8A";
const Kannada_codePoints_letter_R    = "\xE0\xB2\x8B";   //vocalic R
const Kannada_codePoints_letter_RR   = "\xE0\xB3\xA0";   //vocalic R
const Kannada_codePoints_letter_L    = "\xE0\xB2\x8C";   //vocalic L
const Kannada_codePoints_letter_LL   = "\xE0\xB3\xA1";   //vocalic L
const Kannada_codePoints_letter_E    = "\xE0\xB2\x8E";
const Kannada_codePoints_letter_EE   = "\xE0\xB2\x8F";
const Kannada_codePoints_letter_AI   = "\xE0\xB2\x90";
const Kannada_codePoints_letter_O    = "\xE0\xB2\x92";
const Kannada_codePoints_letter_OO   = "\xE0\xB2\x93";
const Kannada_codePoints_letter_AU   = "\xE0\xB2\x94";

//Consonants
const Kannada_codePoints_letter_KA   = "\xE0\xB2\x95";
const Kannada_codePoints_letter_KHA  = "\xE0\xB2\x96";
const Kannada_codePoints_letter_GA   = "\xE0\xB2\x97";
const Kannada_codePoints_letter_GHA  = "\xE0\xB2\x98";
const Kannada_codePoints_letter_NGA  = "\xE0\xB2\x99";
const Kannada_codePoints_letter_CA   = "\xE0\xB2\x9A";
const Kannada_codePoints_letter_CHA  = "\xE0\xB2\x9B";
const Kannada_codePoints_letter_JA   = "\xE0\xB2\x9C";
const Kannada_codePoints_letter_JHA  = "\xE0\xB2\x9D";
const Kannada_codePoints_letter_NYA  = "\xE0\xB2\x9E";
const Kannada_codePoints_letter_TTA  = "\xE0\xB2\x9F";
const Kannada_codePoints_letter_TTHA = "\xE0\xB2\xA0";
const Kannada_codePoints_letter_DDA  = "\xE0\xB2\xA1";
const Kannada_codePoints_letter_DDHA = "\xE0\xB2\xA2";
const Kannada_codePoints_letter_NNA  = "\xE0\xB2\xA3";
const Kannada_codePoints_letter_TA   = "\xE0\xB2\xA4";
const Kannada_codePoints_letter_THA  = "\xE0\xB2\xA5";
const Kannada_codePoints_letter_DA   = "\xE0\xB2\xA6";
const Kannada_codePoints_letter_DHA  = "\xE0\xB2\xA7";
const Kannada_codePoints_letter_NA   = "\xE0\xB2\xA8";
const Kannada_codePoints_letter_PA   = "\xE0\xB2\xAA";
const Kannada_codePoints_letter_PHA  = "\xE0\xB2\xAB";
const Kannada_codePoints_letter_BA   = "\xE0\xB2\xAC";
const Kannada_codePoints_letter_BHA  = "\xE0\xB2\xAD";
const Kannada_codePoints_letter_MA   = "\xE0\xB2\xAE";
const Kannada_codePoints_letter_YA   = "\xE0\xB2\xAF";
const Kannada_codePoints_letter_RA   = "\xE0\xB2\xB0";
const Kannada_codePoints_letter_RRA  = "\xE0\xB2\xB1";
const Kannada_codePoints_letter_LA   = "\xE0\xB2\xB2";
const Kannada_codePoints_letter_LLA  = "\xE0\xB2\xB3";
const Kannada_codePoints_letter_VA   = "\xE0\xB2\xB5";
const Kannada_codePoints_letter_SHA  = "\xE0\xB2\xB6";
const Kannada_codePoints_letter_SSA  = "\xE0\xB2\xB7";
const Kannada_codePoints_letter_SA   = "\xE0\xB2\xB8";
const Kannada_codePoints_letter_HA   = "\xE0\xB2\xB9";

//addition*****
//const Kannada_codePoints_letter_FA   = "\xE0\xB3\x9E";
//*****


//Dependent Vowel Signs
const Kannada_codePoints_vowelsn_AA  = "\xE0\xB2\xBE";
const Kannada_codePoints_vowelsn_I   = "\xE0\xB2\xBF";
const Kannada_codePoints_vowelsn_II  = "\xE0\xB3\x80";
const Kannada_codePoints_vowelsn_U   = "\xE0\xB3\x81";
const Kannada_codePoints_vowelsn_UU  = "\xE0\xB3\x82";
const Kannada_codePoints_vowelsn_R   = "\xE0\xB3\x83";
const Kannada_codePoints_vowelsn_RR  = "\xE0\xB3\x84";
const Kannada_codePoints_vowelsn_E   = "\xE0\xB3\x86";
const Kannada_codePoints_vowelsn_EE  = "\xE0\xB3\x87";   //this is the same as 0CC6 followed by 0CD5
const Kannada_codePoints_vowelsn_AI  = "\xE0\xB3\x88";   //this is the same as 0CC6 followed by 0CD6
const Kannada_codePoints_vowelsn_O   = "\xE0\xB3\x8A";   //this is the same as 0CC6 followed by 0CC2
const Kannada_codePoints_vowelsn_OO  = "\xE0\xB3\x8B";   //this is the same as 0CCA followed by 0CD5
const Kannada_codePoints_vowelsn_AU  = "\xE0\xB3\x8C";

//Miscellaneous Signs
const Kannada_codePoints_misc_NUKTA    = "\xE0\xB2\xBC";   //nukta
const Kannada_codePoints_misc_AVAGRAHA = "\xE0\xB2\xBD";
const Kannada_codePoints_misc_VIRAMA   = "\xE0\xB3\x8D";   //halant
const Kannada_codePoints_misc_LENGTH   = "\xE0\xB3\x95";
const Kannada_codePoints_misc_AILEN    = "\xE0\xB3\x96";

//Digits
const Kannada_codePoints_digit_ZERO  = "\xE0\xB3\xA6";
const Kannada_codePoints_digit_ONE   = "\xE0\xB3\xA7";
const Kannada_codePoints_digit_TWO   = "\xE0\xB3\xA8";
const Kannada_codePoints_digit_THREE = "\xE0\xB3\xA9";
const Kannada_codePoints_digit_FOUR  = "\xE0\xB3\xAA";
const Kannada_codePoints_digit_FIVE  = "\xE0\xB3\xAB";
const Kannada_codePoints_digit_SIX   = "\xE0\xB3\xAC";
const Kannada_codePoints_digit_SEVEN = "\xE0\xB3\xAD";
const Kannada_codePoints_digit_EIGHT = "\xE0\xB3\xAE";
const Kannada_codePoints_digit_NINE  = "\xE0\xB3\xAF";

}

$Kannada_fromPadma = array();

$Kannada_fromPadma[Padma::Padma_anusvara]    = Kannada::Kannada_codePoints_anusvara;
$Kannada_fromPadma[Padma::Padma_visarga]     = Kannada::Kannada_codePoints_visarga;
$Kannada_fromPadma[Padma::Padma_pollu]       = Kannada::Kannada_codePoints_misc_VIRAMA;
$Kannada_fromPadma[Padma::Padma_chillu]      = Kannada::Kannada_codePoints_misc_VIRAMA . Shared::Unicode_Shared_ZWJ;
$Kannada_fromPadma[Padma::Padma_syllbreak]   = Kannada::Kannada_codePoints_misc_VIRAMA . Shared::Unicode_Shared_ZWNJ;
//$Kannada_fromPadma[Padma::Padma_candrabindu] = Kannada::Kannada_codePoints_candrabindu;
$Kannada_fromPadma[Padma::Padma_avagraha]    = Kannada::Kannada_codePoints_misc_AVAGRAHA;
$Kannada_fromPadma[Padma::Padma_udAtta]      = Shared::Unicode_Shared_UDATTA;
$Kannada_fromPadma[Padma::Padma_anudAtta]    = Shared::Unicode_Shared_ANUDATTA;
$Kannada_fromPadma[Padma::Padma_svarita]     = Shared::Unicode_Shared_SVARITA;
$Kannada_fromPadma[Padma::Padma_danda]       = Shared::Unicode_Shared_DANDA;
$Kannada_fromPadma[Padma::Padma_ddanda]      = Shared::Unicode_Shared_DDANDA;
$Kannada_fromPadma[Padma::Padma_abbrev]      = Shared::Unicode_Shared_abbrev;
$Kannada_fromPadma[Padma::Padma_om]          = Shared::Unicode_Shared_OM;
$Kannada_fromPadma[Padma::Padma_nukta]       = Kannada::Kannada_codePoints_misc_NUKTA;

//digits
$Kannada_fromPadma[Padma::Padma_digit_ZERO]  = Kannada::Kannada_codePoints_digit_ZERO;
$Kannada_fromPadma[Padma::Padma_digit_ONE]   = Kannada::Kannada_codePoints_digit_ONE;
$Kannada_fromPadma[Padma::Padma_digit_TWO]   = Kannada::Kannada_codePoints_digit_TWO;
$Kannada_fromPadma[Padma::Padma_digit_THREE] = Kannada::Kannada_codePoints_digit_THREE;
$Kannada_fromPadma[Padma::Padma_digit_FOUR]  = Kannada::Kannada_codePoints_digit_FOUR;
$Kannada_fromPadma[Padma::Padma_digit_FIVE]  = Kannada::Kannada_codePoints_digit_FIVE;
$Kannada_fromPadma[Padma::Padma_digit_SIX]   = Kannada::Kannada_codePoints_digit_SIX;
$Kannada_fromPadma[Padma::Padma_digit_SEVEN] = Kannada::Kannada_codePoints_digit_SEVEN;
$Kannada_fromPadma[Padma::Padma_digit_EIGHT] = Kannada::Kannada_codePoints_digit_EIGHT;
$Kannada_fromPadma[Padma::Padma_digit_NINE]  = Kannada::Kannada_codePoints_digit_NINE;

//Vowels
$Kannada_fromPadma[Padma::Padma_vowel_A]     = Kannada::Kannada_codePoints_letter_A;
$Kannada_fromPadma[Padma::Padma_vowel_AA]    = Kannada::Kannada_codePoints_letter_AA;
$Kannada_fromPadma[Padma::Padma_vowel_I]     = Kannada::Kannada_codePoints_letter_I;
$Kannada_fromPadma[Padma::Padma_vowel_II]    = Kannada::Kannada_codePoints_letter_II;
$Kannada_fromPadma[Padma::Padma_vowel_U]     = Kannada::Kannada_codePoints_letter_U;
$Kannada_fromPadma[Padma::Padma_vowel_UU]    = Kannada::Kannada_codePoints_letter_UU;
$Kannada_fromPadma[Padma::Padma_vowel_R]     = Kannada::Kannada_codePoints_letter_R;
$Kannada_fromPadma[Padma::Padma_vowel_RR]    = Kannada::Kannada_codePoints_letter_RR;
$Kannada_fromPadma[Padma::Padma_vowel_L]     = Kannada::Kannada_codePoints_letter_L;
$Kannada_fromPadma[Padma::Padma_vowel_LL]    = Kannada::Kannada_codePoints_letter_LL;
$Kannada_fromPadma[Padma::Padma_vowel_E]     = Kannada::Kannada_codePoints_letter_E;
$Kannada_fromPadma[Padma::Padma_vowel_EE]    = Kannada::Kannada_codePoints_letter_EE;
$Kannada_fromPadma[Padma::Padma_vowel_AI]    = Kannada::Kannada_codePoints_letter_AI;
$Kannada_fromPadma[Padma::Padma_vowel_O]     = Kannada::Kannada_codePoints_letter_O;
$Kannada_fromPadma[Padma::Padma_vowel_OO]    = Kannada::Kannada_codePoints_letter_OO;
$Kannada_fromPadma[Padma::Padma_vowel_AU]    = Kannada::Kannada_codePoints_letter_AU;

//Consonants
$Kannada_fromPadma[Padma::Padma_consnt_KA]   = Kannada::Kannada_codePoints_letter_KA;
$Kannada_fromPadma[Padma::Padma_consnt_KHA]  = Kannada::Kannada_codePoints_letter_KHA;
$Kannada_fromPadma[Padma::Padma_consnt_GA]   = Kannada::Kannada_codePoints_letter_GA;
$Kannada_fromPadma[Padma::Padma_consnt_GHA]  = Kannada::Kannada_codePoints_letter_GHA;
$Kannada_fromPadma[Padma::Padma_consnt_NGA]  = Kannada::Kannada_codePoints_letter_NGA;
$Kannada_fromPadma[Padma::Padma_consnt_CA]   = Kannada::Kannada_codePoints_letter_CA;
$Kannada_fromPadma[Padma::Padma_consnt_CHA]  = Kannada::Kannada_codePoints_letter_CHA;
$Kannada_fromPadma[Padma::Padma_consnt_JA]   = Kannada::Kannada_codePoints_letter_JA;
$Kannada_fromPadma[Padma::Padma_consnt_JHA]  = Kannada::Kannada_codePoints_letter_JHA;
$Kannada_fromPadma[Padma::Padma_consnt_NYA]  = Kannada::Kannada_codePoints_letter_NYA;
$Kannada_fromPadma[Padma::Padma_consnt_TTA]  = Kannada::Kannada_codePoints_letter_TTA;
$Kannada_fromPadma[Padma::Padma_consnt_TTHA] = Kannada::Kannada_codePoints_letter_TTHA;
$Kannada_fromPadma[Padma::Padma_consnt_DDA]  = Kannada::Kannada_codePoints_letter_DDA;
$Kannada_fromPadma[Padma::Padma_consnt_DDHA] = Kannada::Kannada_codePoints_letter_DDHA;
$Kannada_fromPadma[Padma::Padma_consnt_NNA]  = Kannada::Kannada_codePoints_letter_NNA;
$Kannada_fromPadma[Padma::Padma_consnt_TA]   = Kannada::Kannada_codePoints_letter_TA;
$Kannada_fromPadma[Padma::Padma_consnt_THA]  = Kannada::Kannada_codePoints_letter_THA;
$Kannada_fromPadma[Padma::Padma_consnt_DA]   = Kannada::Kannada_codePoints_letter_DA;
$Kannada_fromPadma[Padma::Padma_consnt_DHA]  = Kannada::Kannada_codePoints_letter_DHA;
$Kannada_fromPadma[Padma::Padma_consnt_NA]   = Kannada::Kannada_codePoints_letter_NA;
$Kannada_fromPadma[Padma::Padma_consnt_PA]   = Kannada::Kannada_codePoints_letter_PA;
$Kannada_fromPadma[Padma::Padma_consnt_PHA]  = Kannada::Kannada_codePoints_letter_PHA;
$Kannada_fromPadma[Padma::Padma_consnt_BA]   = Kannada::Kannada_codePoints_letter_BA;
$Kannada_fromPadma[Padma::Padma_consnt_BHA]  = Kannada::Kannada_codePoints_letter_BHA;
$Kannada_fromPadma[Padma::Padma_consnt_MA]   = Kannada::Kannada_codePoints_letter_MA;
$Kannada_fromPadma[Padma::Padma_consnt_YA]   = Kannada::Kannada_codePoints_letter_YA;
$Kannada_fromPadma[Padma::Padma_consnt_RA]   = Kannada::Kannada_codePoints_letter_RA;
$Kannada_fromPadma[Padma::Padma_consnt_LA]   = Kannada::Kannada_codePoints_letter_LA;
$Kannada_fromPadma[Padma::Padma_consnt_VA]   = Kannada::Kannada_codePoints_letter_VA;
$Kannada_fromPadma[Padma::Padma_consnt_SHA]  = Kannada::Kannada_codePoints_letter_SHA;
$Kannada_fromPadma[Padma::Padma_consnt_SSA]  = Kannada::Kannada_codePoints_letter_SSA;
$Kannada_fromPadma[Padma::Padma_consnt_SA]   = Kannada::Kannada_codePoints_letter_SA;
$Kannada_fromPadma[Padma::Padma_consnt_HA]   = Kannada::Kannada_codePoints_letter_HA;
$Kannada_fromPadma[Padma::Padma_consnt_LLA]  = Kannada::Kannada_codePoints_letter_LLA;
$Kannada_fromPadma[Padma::Padma_consnt_RRA]  = Kannada::Kannada_codePoints_letter_RRA;

//Gunimtaalu
$Kannada_fromPadma[Padma::Padma_vowelsn_AA]  = Kannada::Kannada_codePoints_vowelsn_AA;
$Kannada_fromPadma[Padma::Padma_vowelsn_I]   = Kannada::Kannada_codePoints_vowelsn_I;
$Kannada_fromPadma[Padma::Padma_vowelsn_II]  = Kannada::Kannada_codePoints_vowelsn_II;
$Kannada_fromPadma[Padma::Padma_vowelsn_U]   = Kannada::Kannada_codePoints_vowelsn_U;
$Kannada_fromPadma[Padma::Padma_vowelsn_UU]  = Kannada::Kannada_codePoints_vowelsn_UU;
$Kannada_fromPadma[Padma::Padma_vowelsn_R]   = Kannada::Kannada_codePoints_vowelsn_R;
$Kannada_fromPadma[Padma::Padma_vowelsn_RR]  = Kannada::Kannada_codePoints_vowelsn_RR;
$Kannada_fromPadma[Padma::Padma_vowelsn_E]   = Kannada::Kannada_codePoints_vowelsn_E;
$Kannada_fromPadma[Padma::Padma_vowelsn_EE]  = Kannada::Kannada_codePoints_vowelsn_EE;
$Kannada_fromPadma[Padma::Padma_vowelsn_AI]  = Kannada::Kannada_codePoints_vowelsn_AI;
$Kannada_fromPadma[Padma::Padma_vowelsn_O]   = Kannada::Kannada_codePoints_vowelsn_O;
$Kannada_fromPadma[Padma::Padma_vowelsn_OO]  = Kannada::Kannada_codePoints_vowelsn_OO;
$Kannada_fromPadma[Padma::Padma_vowelsn_AU]  = Kannada::Kannada_codePoints_vowelsn_AU;
$Kannada_fromPadma[Padma::Padma_vowelsn_AILEN]  = Kannada::Kannada_codePoints_misc_AILEN;
$Kannada_fromPadma[Padma::Padma_vowelsn_LEN]  = Kannada::Kannada_codePoints_misc_LENGTH;

//The following are not directly present in $Kannada - equivalent transliteration
$Kannada_fromPadma[Padma::Padma_vowel_SHT_A]   = Kannada::Kannada_codePoints_letter_A;
$Kannada_fromPadma[Padma::Padma_vowel_CDR_E]   = Kannada::Kannada_codePoints_letter_E;
$Kannada_fromPadma[Padma::Padma_vowel_CDR_O]   = Kannada::Kannada_codePoints_letter_O;
$Kannada_fromPadma[Padma::Padma_consnt_QA]     = Kannada::Kannada_codePoints_letter_KA;
$Kannada_fromPadma[Padma::Padma_consnt_KHHA]   = Kannada::Kannada_codePoints_letter_KHA;
$Kannada_fromPadma[Padma::Padma_consnt_GHHA]   = Kannada::Kannada_codePoints_letter_GHA;
$Kannada_fromPadma[Padma::Padma_consnt_ZA]     = Kannada::Kannada_codePoints_letter_JA;
$Kannada_fromPadma[Padma::Padma_consnt_DDDHA]  = Kannada::Kannada_codePoints_letter_DDA;
$Kannada_fromPadma[Padma::Padma_consnt_RHA]    = Kannada::Kannada_codePoints_letter_DDHA;
$Kannada_fromPadma[Padma::Padma_consnt_NNNA]   = Kannada::Kannada_codePoints_letter_NNA;
$Kannada_fromPadma[Padma::Padma_consnt_FA]     = Kannada::Kannada_codePoints_letter_PHA;
$Kannada_fromPadma[Padma::Padma_consnt_YYA]    = Kannada::Kannada_codePoints_letter_YA;
$Kannada_fromPadma[Padma::Padma_consnt_ZHA]    = Kannada::Kannada_codePoints_letter_LLA;
$Kannada_fromPadma[Padma::Padma_vowelsn_CDR_E] = Kannada::Kannada_codePoints_vowelsn_E;
$Kannada_fromPadma[Padma::Padma_vowelsn_CDR_O] = Kannada::Kannada_codePoints_vowelsn_O;
?>
