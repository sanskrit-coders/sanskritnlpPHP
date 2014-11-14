<?php
/* ***** BEGIN LICENSE BLOCK *****
 *
 *  This file is originally part of Padma.
 *
 *  Copyright (C) 2006 Nagarjuna Venna <vnagarjuna@yahoo.com>
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

class Bengali
{
//Generate map entries for vattulu and half-forms
    function initialize () 
    {
        global $Bengali_fromPadma;
        for($i = Padma::Padma_vattu_START; $i <= Padma::Padma_vattu_END; $i++)
            $Bengali_fromPadma[utf8_from_unicode($i)] = Bengali::Bengali_codePoints_misc_VIRAMA .
                                               $Bengali_fromPadma[Padma::fast_baseFormFromVattu($i)];
        for($i = Padma::Padma_half_START; $i <= Padma::Padma_half_END; $i++)
            $Bengali_fromPadma[utf8_from_unicode($i)] = $Bengali_fromPadma[Padma::fast_baseFormFromHalfForm($i)] .
                                               Bengali::Bengali_codePoints_misc_VIRAMA;
    }

//Unicode Codepoints
//$Bengali_codePoints = Array();

const Bengali_codePoints_candrabindu  = "\xE0\xA6\x81";
//Vowel Modifiers
const Bengali_codePoints_anusvara     = "\xE0\xA6\x82";  //sunna
const Bengali_codePoints_visarga      = "\xE0\xA6\x83";

//Independent Vowels
const Bengali_codePoints_letter_A     = "\xE0\xA6\x85";
const Bengali_codePoints_letter_AA    = "\xE0\xA6\x86";
const Bengali_codePoints_letter_I     = "\xE0\xA6\x87";
const Bengali_codePoints_letter_II    = "\xE0\xA6\x88";
const Bengali_codePoints_letter_U     = "\xE0\xA6\x89";
const Bengali_codePoints_letter_UU    = "\xE0\xA6\x8A";
const Bengali_codePoints_letter_R     = "\xE0\xA6\x8B";   //vocalic R
const Bengali_codePoints_letter_RR    = "\xE0\xA7\xA0";   //vocalic R
const Bengali_codePoints_letter_L     = "\xE0\xA6\x8C";   //vocalic L
const Bengali_codePoints_letter_LL    = "\xE0\xA7\xA1";   //vocalic L
const Bengali_codePoints_letter_EE    = "\xE0\xA6\x8F";
const Bengali_codePoints_letter_AI    = "\xE0\xA6\x90";
const Bengali_codePoints_letter_OO    = "\xE0\xA6\x93";
const Bengali_codePoints_letter_AU    = "\xE0\xA6\x94";

//Consonants
const Bengali_codePoints_letter_KA   = "\xE0\xA6\x95";
const Bengali_codePoints_letter_KHA  = "\xE0\xA6\x96";
const Bengali_codePoints_letter_GA   = "\xE0\xA6\x97";
const Bengali_codePoints_letter_GHA  = "\xE0\xA6\x98";
const Bengali_codePoints_letter_NGA  = "\xE0\xA6\x99";
const Bengali_codePoints_letter_CA   = "\xE0\xA6\x9A";
const Bengali_codePoints_letter_CHA  = "\xE0\xA6\x9B";
const Bengali_codePoints_letter_JA   = "\xE0\xA6\x9C";
const Bengali_codePoints_letter_JHA  = "\xE0\xA6\x9D";
const Bengali_codePoints_letter_NYA  = "\xE0\xA6\x9E";
const Bengali_codePoints_letter_TTA  = "\xE0\xA6\x9F";
const Bengali_codePoints_letter_TTHA = "\xE0\xA6\xA0";
const Bengali_codePoints_letter_DDA  = "\xE0\xA6\xA1";
const Bengali_codePoints_letter_DDHA = "\xE0\xA6\xA2";
const Bengali_codePoints_letter_NNA  = "\xE0\xA6\xA3";
const Bengali_codePoints_letter_TA   = "\xE0\xA6\xA4";
const Bengali_codePoints_letter_THA  = "\xE0\xA6\xA5";
const Bengali_codePoints_letter_DA   = "\xE0\xA6\xA6";
const Bengali_codePoints_letter_DHA  = "\xE0\xA6\xA7";
const Bengali_codePoints_letter_NA   = "\xE0\xA6\xA8";
const Bengali_codePoints_letter_PA   = "\xE0\xA6\xAA";
const Bengali_codePoints_letter_PHA  = "\xE0\xA6\xAB";
const Bengali_codePoints_letter_BA   = "\xE0\xA6\xAC";
const Bengali_codePoints_letter_BHA  = "\xE0\xA6\xAD";
const Bengali_codePoints_letter_MA   = "\xE0\xA6\xAE";
const Bengali_codePoints_letter_YA   = "\xE0\xA6\xAF";
const Bengali_codePoints_letter_RA   = "\xE0\xA6\xB0";
const Bengali_codePoints_letter_LA   = "\xE0\xA6\xB2";
const Bengali_codePoints_letter_SHA  = "\xE0\xA6\xB6";
const Bengali_codePoints_letter_SSA  = "\xE0\xA6\xB7";
const Bengali_codePoints_letter_SA   = "\xE0\xA6\xB8";
const Bengali_codePoints_letter_HA   = "\xE0\xA6\xB9";
const Bengali_codePoints_letter_DDDHA= "\xE0\xA7\x9C"; //RRA
const Bengali_codePoints_letter_RHA  = "\xE0\xA7\x9D";
const Bengali_codePoints_letter_YYA  = "\xE0\xA7\x9F";
const Bengali_codePoints_letter_KHANDATA  = "\xE0\xA7\x8E";
const Bengali_codePoints_letter_RA_MD = "\xE0\xA7\xB0";
const Bengali_codePoints_letter_RA_LD = "\xE0\xA7\xB1";

//Dependent Vowel Signs
const Bengali_codePoints_vowelsn_AA    = "\xE0\xA6\xBE";
const Bengali_codePoints_vowelsn_I     = "\xE0\xA6\xBF";
const Bengali_codePoints_vowelsn_II    = "\xE0\xA7\x80";
const Bengali_codePoints_vowelsn_U     = "\xE0\xA7\x81";
const Bengali_codePoints_vowelsn_UU    = "\xE0\xA7\x82";
const Bengali_codePoints_vowelsn_R     = "\xE0\xA7\x83";
const Bengali_codePoints_vowelsn_RR    = "\xE0\xA7\x84";
const Bengali_codePoints_vowelsn_L     = "\xE0\xA7\xA2";
const Bengali_codePoints_vowelsn_LL    = "\xE0\xA7\xA3";
const Bengali_codePoints_vowelsn_EE    = "\xE0\xA7\x87";
const Bengali_codePoints_vowelsn_AI    = "\xE0\xA7\x88";
const Bengali_codePoints_vowelsn_OO    = "\xE0\xA7\x8B";
const Bengali_codePoints_vowelsn_AU    = "\xE0\xA7\x8C";

//Miscellaneous Signs
const Bengali_codePoints_misc_VIRAMA   = "\xE0\xA7\x8D";   //hasant
const Bengali_codePoints_misc_NUKTA    = "\xE0\xA6\xBC";
const Bengali_codePoints_misc_AVAGRAHA = "\xE0\xA6\xBD";
const Bengali_codePoints_misc_AULENGTH = "\xE0\xA7\x97";

//Digits
const Bengali_codePoints_digit_ZERO  = "\xE0\xA7\xA6";
const Bengali_codePoints_digit_ONE   = "\xE0\xA7\xA7";
const Bengali_codePoints_digit_TWO   = "\xE0\xA7\xA8";
const Bengali_codePoints_digit_THREE = "\xE0\xA7\xA9";
const Bengali_codePoints_digit_FOUR  = "\xE0\xA7\xAA";
const Bengali_codePoints_digit_FIVE  = "\xE0\xA7\xAB";
const Bengali_codePoints_digit_SIX   = "\xE0\xA7\xAC";
const Bengali_codePoints_digit_SEVEN = "\xE0\xA7\xAD";
const Bengali_codePoints_digit_EIGHT = "\xE0\xA7\xAE";
const Bengali_codePoints_digit_NINE  = "\xE0\xA7\xAF";

}

$Bengali_fromPadma = Array();

$Bengali_fromPadma[Padma::Padma_anusvara]    = Bengali::Bengali_codePoints_anusvara;
$Bengali_fromPadma[Padma::Padma_visarga]     = Bengali::Bengali_codePoints_visarga;
$Bengali_fromPadma[Padma::Padma_candrabindu] = Bengali::Bengali_codePoints_candrabindu;
$Bengali_fromPadma[Padma::Padma_halant]      = Bengali::Bengali_codePoints_misc_VIRAMA;
$Bengali_fromPadma[Padma::Padma_chillu]      = Bengali::Bengali_codePoints_misc_VIRAMA . Shared::Unicode_Shared_ZWJ;
$Bengali_fromPadma[Padma::Padma_syllbreak]   = Bengali::Bengali_codePoints_misc_VIRAMA . Shared::Unicode_Shared_ZWNJ;
$Bengali_fromPadma[Padma::Padma_avagraha]    = Bengali::Bengali_codePoints_misc_AVAGRAHA;
$Bengali_fromPadma[Padma::Padma_udAtta]      = Shared::Unicode_Shared_UDATTA;
$Bengali_fromPadma[Padma::Padma_anudAtta]    = Shared::Unicode_Shared_ANUDATTA;
$Bengali_fromPadma[Padma::Padma_svarita]     = Shared::Unicode_Shared_SVARITA;
$Bengali_fromPadma[Padma::Padma_danda]       = Shared::Unicode_Shared_DANDA;
$Bengali_fromPadma[Padma::Padma_ddanda]      = Shared::Unicode_Shared_DDANDA;
$Bengali_fromPadma[Padma::Padma_om]          = Shared::Unicode_Shared_OM;
$Bengali_fromPadma[Padma::Padma_abbrev]      = Shared::Unicode_Shared_abbrev;
$Bengali_fromPadma[Padma::Padma_nukta]       = Bengali::Bengali_codePoints_misc_NUKTA;

//digits
$Bengali_fromPadma[Padma::Padma_digit_ZERO]  = Bengali::Bengali_codePoints_digit_ZERO;
$Bengali_fromPadma[Padma::Padma_digit_ONE]   = Bengali::Bengali_codePoints_digit_ONE;
$Bengali_fromPadma[Padma::Padma_digit_TWO]   = Bengali::Bengali_codePoints_digit_TWO;
$Bengali_fromPadma[Padma::Padma_digit_THREE] = Bengali::Bengali_codePoints_digit_THREE;
$Bengali_fromPadma[Padma::Padma_digit_FOUR]  = Bengali::Bengali_codePoints_digit_FOUR;
$Bengali_fromPadma[Padma::Padma_digit_FIVE]  = Bengali::Bengali_codePoints_digit_FIVE;
$Bengali_fromPadma[Padma::Padma_digit_SIX]   = Bengali::Bengali_codePoints_digit_SIX;
$Bengali_fromPadma[Padma::Padma_digit_SEVEN] = Bengali::Bengali_codePoints_digit_SEVEN;
$Bengali_fromPadma[Padma::Padma_digit_EIGHT] = Bengali::Bengali_codePoints_digit_EIGHT;
$Bengali_fromPadma[Padma::Padma_digit_NINE]  = Bengali::Bengali_codePoints_digit_NINE;

//Vowels
$Bengali_fromPadma[Padma::Padma_vowel_A]     = Bengali::Bengali_codePoints_letter_A;
$Bengali_fromPadma[Padma::Padma_vowel_AA]    = Bengali::Bengali_codePoints_letter_AA;
$Bengali_fromPadma[Padma::Padma_vowel_I]     = Bengali::Bengali_codePoints_letter_I;
$Bengali_fromPadma[Padma::Padma_vowel_II]    = Bengali::Bengali_codePoints_letter_II;
$Bengali_fromPadma[Padma::Padma_vowel_U]     = Bengali::Bengali_codePoints_letter_U;
$Bengali_fromPadma[Padma::Padma_vowel_UU]    = Bengali::Bengali_codePoints_letter_UU;
$Bengali_fromPadma[Padma::Padma_vowel_R]     = Bengali::Bengali_codePoints_letter_R;
$Bengali_fromPadma[Padma::Padma_vowel_RR]    = Bengali::Bengali_codePoints_letter_RR;
$Bengali_fromPadma[Padma::Padma_vowel_L]     = Bengali::Bengali_codePoints_letter_L;
$Bengali_fromPadma[Padma::Padma_vowel_LL]    = Bengali::Bengali_codePoints_letter_LL;
$Bengali_fromPadma[Padma::Padma_vowel_EE]    = Bengali::Bengali_codePoints_letter_EE;
$Bengali_fromPadma[Padma::Padma_vowel_AI]    = Bengali::Bengali_codePoints_letter_AI;
$Bengali_fromPadma[Padma::Padma_vowel_OO]    = Bengali::Bengali_codePoints_letter_OO;
$Bengali_fromPadma[Padma::Padma_vowel_AU]    = Bengali::Bengali_codePoints_letter_AU;

//Consonants
$Bengali_fromPadma[Padma::Padma_consnt_KA]   = Bengali::Bengali_codePoints_letter_KA;
$Bengali_fromPadma[Padma::Padma_consnt_KHA]  = Bengali::Bengali_codePoints_letter_KHA;
$Bengali_fromPadma[Padma::Padma_consnt_GA]   = Bengali::Bengali_codePoints_letter_GA;
$Bengali_fromPadma[Padma::Padma_consnt_GHA]  = Bengali::Bengali_codePoints_letter_GHA;
$Bengali_fromPadma[Padma::Padma_consnt_NGA]  = Bengali::Bengali_codePoints_letter_NGA;
$Bengali_fromPadma[Padma::Padma_consnt_CA]   = Bengali::Bengali_codePoints_letter_CA;
$Bengali_fromPadma[Padma::Padma_consnt_CHA]  = Bengali::Bengali_codePoints_letter_CHA;
$Bengali_fromPadma[Padma::Padma_consnt_JA]   = Bengali::Bengali_codePoints_letter_JA;
$Bengali_fromPadma[Padma::Padma_consnt_JHA]  = Bengali::Bengali_codePoints_letter_JHA;
$Bengali_fromPadma[Padma::Padma_consnt_NYA]  = Bengali::Bengali_codePoints_letter_NYA;
$Bengali_fromPadma[Padma::Padma_consnt_TTA]  = Bengali::Bengali_codePoints_letter_TTA;
$Bengali_fromPadma[Padma::Padma_consnt_TTHA] = Bengali::Bengali_codePoints_letter_TTHA;
$Bengali_fromPadma[Padma::Padma_consnt_DDA]  = Bengali::Bengali_codePoints_letter_DDA;
$Bengali_fromPadma[Padma::Padma_consnt_DDHA] = Bengali::Bengali_codePoints_letter_DDHA;
$Bengali_fromPadma[Padma::Padma_consnt_NNA]  = Bengali::Bengali_codePoints_letter_NNA;
$Bengali_fromPadma[Padma::Padma_consnt_TA]   = Bengali::Bengali_codePoints_letter_TA;
$Bengali_fromPadma[Padma::Padma_consnt_THA]  = Bengali::Bengali_codePoints_letter_THA;
$Bengali_fromPadma[Padma::Padma_consnt_DA]   = Bengali::Bengali_codePoints_letter_DA;
$Bengali_fromPadma[Padma::Padma_consnt_DHA]  = Bengali::Bengali_codePoints_letter_DHA;
$Bengali_fromPadma[Padma::Padma_consnt_NA]   = Bengali::Bengali_codePoints_letter_NA;
$Bengali_fromPadma[Padma::Padma_consnt_PA]   = Bengali::Bengali_codePoints_letter_PA;
$Bengali_fromPadma[Padma::Padma_consnt_PHA]  = Bengali::Bengali_codePoints_letter_PHA;
$Bengali_fromPadma[Padma::Padma_consnt_BA]   = Bengali::Bengali_codePoints_letter_BA;
$Bengali_fromPadma[Padma::Padma_consnt_BHA]  = Bengali::Bengali_codePoints_letter_BHA;
$Bengali_fromPadma[Padma::Padma_consnt_MA]   = Bengali::Bengali_codePoints_letter_MA;
$Bengali_fromPadma[Padma::Padma_consnt_YA]   = Bengali::Bengali_codePoints_letter_YA;
$Bengali_fromPadma[Padma::Padma_consnt_RA]   = Bengali::Bengali_codePoints_letter_RA;
$Bengali_fromPadma[Padma::Padma_consnt_LA]   = Bengali::Bengali_codePoints_letter_LA;
$Bengali_fromPadma[Padma::Padma_consnt_SHA]  = Bengali::Bengali_codePoints_letter_SHA;
$Bengali_fromPadma[Padma::Padma_consnt_SSA]  = Bengali::Bengali_codePoints_letter_SSA;
$Bengali_fromPadma[Padma::Padma_consnt_SA]   = Bengali::Bengali_codePoints_letter_SA;
$Bengali_fromPadma[Padma::Padma_consnt_HA]   = Bengali::Bengali_codePoints_letter_HA;
$Bengali_fromPadma[Padma::Padma_consnt_DDDHA]= Bengali::Bengali_codePoints_letter_DDDHA;
$Bengali_fromPadma[Padma::Padma_consnt_RHA]  = Bengali::Bengali_codePoints_letter_RHA;
$Bengali_fromPadma[Padma::Padma_consnt_YYA]  = Bengali::Bengali_codePoints_letter_YYA;
$Bengali_fromPadma[Padma::Padma_consnt_KHANDA_TA]  = Bengali::Bengali_codePoints_letter_KHANDATA;
$Bengali_fromPadma[Padma::Padma_consnt_RA_MD] = Bengali::Bengali_codePoints_letter_RA_MD;
$Bengali_fromPadma[Padma::Padma_consnt_RA_LD] = Bengali::Bengali_codePoints_letter_RA_LD;

//Gunimtaalu
$Bengali_fromPadma[Padma::Padma_vowelsn_AA]  = Bengali::Bengali_codePoints_vowelsn_AA;
$Bengali_fromPadma[Padma::Padma_vowelsn_I]   = Bengali::Bengali_codePoints_vowelsn_I;
$Bengali_fromPadma[Padma::Padma_vowelsn_II]  = Bengali::Bengali_codePoints_vowelsn_II;
$Bengali_fromPadma[Padma::Padma_vowelsn_U]   = Bengali::Bengali_codePoints_vowelsn_U;
$Bengali_fromPadma[Padma::Padma_vowelsn_UU]  = Bengali::Bengali_codePoints_vowelsn_UU;
$Bengali_fromPadma[Padma::Padma_vowelsn_R]   = Bengali::Bengali_codePoints_vowelsn_R;
$Bengali_fromPadma[Padma::Padma_vowelsn_RR]  = Bengali::Bengali_codePoints_vowelsn_RR;
$Bengali_fromPadma[Padma::Padma_vowelsn_EE]  = Bengali::Bengali_codePoints_vowelsn_EE;
$Bengali_fromPadma[Padma::Padma_vowelsn_AI]  = Bengali::Bengali_codePoints_vowelsn_AI;
$Bengali_fromPadma[Padma::Padma_vowelsn_OO]  = Bengali::Bengali_codePoints_vowelsn_OO;
$Bengali_fromPadma[Padma::Padma_vowelsn_AU]  = Bengali::Bengali_codePoints_vowelsn_AU;
$Bengali_fromPadma[Padma::Padma_vowelsn_AULEN] = Bengali::Bengali_codePoints_misc_AULENGTH;

//The following are not directly present in Bengali - equivalent transliteration
$Bengali_fromPadma[Padma::Padma_vowel_SHT_A]   = Bengali::Bengali_codePoints_letter_A;
$Bengali_fromPadma[Padma::Padma_vowel_CDR_E]   = Bengali::Bengali_codePoints_letter_EE;
$Bengali_fromPadma[Padma::Padma_vowel_E]       = Bengali::Bengali_codePoints_letter_EE;
$Bengali_fromPadma[Padma::Padma_vowel_CDR_O]   = Bengali::Bengali_codePoints_letter_OO;
$Bengali_fromPadma[Padma::Padma_vowel_O]       = Bengali::Bengali_codePoints_letter_OO;
$Bengali_fromPadma[Padma::Padma_consnt_NNNA]   = Bengali::Bengali_codePoints_letter_NNA;
$Bengali_fromPadma[Padma::Padma_consnt_RRA]    = Bengali::Bengali_codePoints_letter_DDDHA;
$Bengali_fromPadma[Padma::Padma_consnt_LLA]    = Bengali::Bengali_codePoints_letter_LA;
$Bengali_fromPadma[Padma::Padma_consnt_ZHA]    = Bengali::Bengali_codePoints_letter_LA;
$Bengali_fromPadma[Padma::Padma_consnt_VA]     = Bengali::Bengali_codePoints_letter_BA;
$Bengali_fromPadma[Padma::Padma_consnt_QA]     = Bengali::Bengali_codePoints_letter_KA;
$Bengali_fromPadma[Padma::Padma_consnt_KHHA]   = Bengali::Bengali_codePoints_letter_KHA;
$Bengali_fromPadma[Padma::Padma_consnt_GHHA]   = Bengali::Bengali_codePoints_letter_GHA;
$Bengali_fromPadma[Padma::Padma_consnt_ZA]     = Bengali::Bengali_codePoints_letter_JA;
$Bengali_fromPadma[Padma::Padma_consnt_FA]     = Bengali::Bengali_codePoints_letter_PHA;
$Bengali_fromPadma[Padma::Padma_vowelsn_CDR_E] = Bengali::Bengali_codePoints_vowelsn_EE;
$Bengali_fromPadma[Padma::Padma_vowelsn_E]     = Bengali::Bengali_codePoints_vowelsn_EE;
$Bengali_fromPadma[Padma::Padma_vowelsn_CDR_O] = Bengali::Bengali_codePoints_vowelsn_OO;
$Bengali_fromPadma[Padma::Padma_vowelsn_O]     = Bengali::Bengali_codePoints_vowelsn_OO;
$Bengali_fromPadma[Padma::Padma_consnt_GGA]    = Bengali::Bengali_codePoints_letter_GA;
$Bengali_fromPadma[Padma::Padma_consnt_JJA]    = Bengali::Bengali_codePoints_letter_JA;
$Bengali_fromPadma[Padma::Padma_consnt_DDDA]   = Bengali::Bengali_codePoints_letter_DDA;
$Bengali_fromPadma[Padma::Padma_consnt_BBA]    = Bengali::Bengali_codePoints_letter_BA;
?>
