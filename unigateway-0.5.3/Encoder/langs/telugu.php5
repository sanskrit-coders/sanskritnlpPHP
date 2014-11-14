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

class Telugu
{
//Generate map entries for vattulu and half-forms
    function initialize () 
    {
        global $Telugu_fromPadma;
        for($i = Padma::Padma_vattu_START; $i <= Padma::Padma_vattu_END; $i++)
            $Telugu_fromPadma[utf8_from_unicode($i)] = Telugu::Telugu_codePoints_misc_VIRAMA . 
                                               $Telugu_fromPadma[Padma::fast_baseFormFromVattu($i)];
        for($i = Padma::Padma_half_START; $i <= Padma::Padma_half_END; $i++)
            $Telugu_fromPadma[utf8_from_unicode($i)] = $Telugu_fromPadma[Padma::fast_baseFormFromHalfForm($i)] .
                                               Telugu::Telugu_codePoints_misc_VIRAMA;
    }


    //Unicode Codepoints
    //$Telugu_codePoints = Array();
    
    const Telugu_codePoints_candrabindu = "\xE0\xB0\x81";
    //Vowel Modifiers
    const Telugu_codePoints_anusvara    = "\xE0\xB0\x82";  //sunna
    const Telugu_codePoints_visarga     = "\xE0\xB0\x83";
    const Telugu_codePoints_ardhavisarga= "\xE0\xB1\xB1";
    
    //Independent Vowels
    const Telugu_codePoints_letter_A    = "\xE0\xB0\x85";
    const Telugu_codePoints_letter_AA   = "\xE0\xB0\x86";
    const Telugu_codePoints_letter_I    = "\xE0\xB0\x87";//"\u0C07";
    const Telugu_codePoints_letter_II   = "\xE0\xB0\x88";
    const Telugu_codePoints_letter_U    = "\xE0\xB0\x89";
    const Telugu_codePoints_letter_UU   = "\xE0\xB0\x8A";
    const Telugu_codePoints_letter_R    = "\xE0\xB0\x8B";   //vocalic R
    const Telugu_codePoints_letter_RR   = "\xE0\xB1\xA0";   //vocalic R
    const Telugu_codePoints_letter_L    = "\xE0\xB0\x8C";   //vocalic L
    const Telugu_codePoints_letter_LL   = "\xE0\xB1\xA1";   //vocalic L
    const Telugu_codePoints_letter_E    = "\xE0\xB0\x8E";
    const Telugu_codePoints_letter_EE   = "\xE0\xB0\x8F";
    const Telugu_codePoints_letter_AI   = "\xE0\xB0\x90";
    const Telugu_codePoints_letter_O    = "\xE0\xB0\x92";
    const Telugu_codePoints_letter_OO   = "\xE0\xB0\x93";
    const Telugu_codePoints_letter_AU   = "\xE0\xB0\x94";
    
    //Consonants
    const Telugu_codePoints_letter_KA   = "\xE0\xB0\x95";
    const Telugu_codePoints_letter_KHA  = "\xE0\xB0\x96";
    const Telugu_codePoints_letter_GA   = "\xE0\xB0\x97";
    const Telugu_codePoints_letter_GHA  = "\xE0\xB0\x98";
    const Telugu_codePoints_letter_NGA  = "\xE0\xB0\x99";
    const Telugu_codePoints_letter_CA   = "\xE0\xB0\x9A";
    const Telugu_codePoints_letter_CHA  = "\xE0\xB0\x9B";
    const Telugu_codePoints_letter_JA   = "\xE0\xB0\x9C";
    const Telugu_codePoints_letter_JHA  = "\xE0\xB0\x9D";
    const Telugu_codePoints_letter_NYA  = "\xE0\xB0\x9E";
    const Telugu_codePoints_letter_TTA  = "\xE0\xB0\x9F";
    const Telugu_codePoints_letter_TTHA = "\xE0\xB0\xA0";
    const Telugu_codePoints_letter_DDA  = "\xE0\xB0\xA1";
    const Telugu_codePoints_letter_DDHA = "\xE0\xB0\xA2";
    const Telugu_codePoints_letter_NNA  = "\xE0\xB0\xA3";
    const Telugu_codePoints_letter_TA   = "\xE0\xB0\xA4";
    const Telugu_codePoints_letter_THA  = "\xE0\xB0\xA5";
    const Telugu_codePoints_letter_DA   = "\xE0\xB0\xA6";
    const Telugu_codePoints_letter_DHA  = "\xE0\xB0\xA7";
    const Telugu_codePoints_letter_NA   = "\xE0\xB0\xA8";
    const Telugu_codePoints_letter_PA   = "\xE0\xB0\xAA";
    const Telugu_codePoints_letter_PHA  = "\xE0\xB0\xAB";
    const Telugu_codePoints_letter_BA   = "\xE0\xB0\xAC";
    const Telugu_codePoints_letter_BHA  = "\xE0\xB0\xAD";
    const Telugu_codePoints_letter_MA   = "\xE0\xB0\xAE";
    const Telugu_codePoints_letter_YA   = "\xE0\xB0\xAF";
    const Telugu_codePoints_letter_RA   = "\xE0\xB0\xB0";
    const Telugu_codePoints_letter_RRA  = "\xE0\xB0\xB1";
    const Telugu_codePoints_letter_LA   = "\xE0\xB0\xB2";
    const Telugu_codePoints_letter_LLA  = "\xE0\xB0\xB3";
    const Telugu_codePoints_letter_VA   = "\xE0\xB0\xB5";
    const Telugu_codePoints_letter_SHA  = "\xE0\xB0\xB6";
    const Telugu_codePoints_letter_SSA  = "\xE0\xB0\xB7";
    const Telugu_codePoints_letter_SA   = "\xE0\xB0\xB8";
    const Telugu_codePoints_letter_HA   = "\xE0\xB0\xB9";
    const Telugu_codePoints_letter_TSA  = "\xE0\xB1\x98";    
    const Telugu_codePoints_letter_DJA  = "\xE0\xB1\x99";    
    
    //Dependent Vowel Signs
    const Telugu_codePoints_vowelsn_AA  = "\xE0\xB0\xBE";
    const Telugu_codePoints_vowelsn_I   = "\xE0\xB0\xBF";
    const Telugu_codePoints_vowelsn_II  = "\xE0\xB1\x80";
    const Telugu_codePoints_vowelsn_U   = "\xE0\xB1\x81";
    const Telugu_codePoints_vowelsn_UU  = "\xE0\xB1\x82";
    const Telugu_codePoints_vowelsn_R   = "\xE0\xB1\x83";
    const Telugu_codePoints_vowelsn_RR  = "\xE0\xB1\x84";
    const Telugu_codePoints_vowelsn_L   = "\xE0\xB1\xA2";
    const Telugu_codePoints_vowelsn_LL  = "\xE0\xB1\xA3";
    const Telugu_codePoints_vowelsn_E   = "\xE0\xB1\x86";
    const Telugu_codePoints_vowelsn_EE  = "\xE0\xB1\x87";
    const Telugu_codePoints_vowelsn_AI  = "\xE0\xB1\x88";   //this is the same as 0C46 followed by 0C56
    const Telugu_codePoints_vowelsn_O   = "\xE0\xB1\x8A";
    const Telugu_codePoints_vowelsn_OO  = "\xE0\xB1\x8B";
    const Telugu_codePoints_vowelsn_AU  = "\xE0\xB1\x8C";
    
    //Miscellaneous Signs
    const Telugu_codePoints_misc_VIRAMA   = "\xE0\xB1\x8D";   //halant
    const Telugu_codePoints_misc_LENGTH   = "\xE0\xB1\x95";
    const Telugu_codePoints_misc_AILEN    = "\xE0\xB1\x96";
    const Telugu_codePoints_misc_AVAGRAHA = "\xE0\xB0\xBD";
    
    //Digits
    const Telugu_codePoints_digit_ZERO  = "\xE0\xB1\xA6";
    const Telugu_codePoints_digit_ONE   = "\xE0\xB1\xA7";
    const Telugu_codePoints_digit_TWO   = "\xE0\xB1\xA8";
    const Telugu_codePoints_digit_THREE = "\xE0\xB1\xA9";
    const Telugu_codePoints_digit_FOUR  = "\xE0\xB1\xAA";
    const Telugu_codePoints_digit_FIVE  = "\xE0\xB1\xAB";
    const Telugu_codePoints_digit_SIX   = "\xE0\xB1\xAC";
    const Telugu_codePoints_digit_SEVEN = "\xE0\xB1\xAD";
    const Telugu_codePoints_digit_EIGHT = "\xE0\xB1\xAE";
    const Telugu_codePoints_digit_NINE  = "\xE0\xB1\xAF";

}//close of class

$Telugu_fromPadma = Array();

$Telugu_fromPadma[Padma::Padma_anusvara]    = Telugu::Telugu_codePoints_anusvara;
$Telugu_fromPadma[Padma::Padma_visarga]     = Telugu::Telugu_codePoints_visarga;
$Telugu_fromPadma[Padma::Padma_ardhavisarga]= Telugu::Telugu_codePoints_ardhavisarga;
$Telugu_fromPadma[Padma::Padma_pollu]       = Telugu::Telugu_codePoints_misc_VIRAMA;
$Telugu_fromPadma[Padma::Padma_chillu]      = Telugu::Telugu_codePoints_misc_VIRAMA . Shared::Unicode_Shared_ZWJ;
$Telugu_fromPadma[Padma::Padma_syllbreak]   = Telugu::Telugu_codePoints_misc_VIRAMA . Shared::Unicode_Shared_ZWNJ;
$Telugu_fromPadma[Padma::Padma_candrabindu] = Telugu::Telugu_codePoints_candrabindu;
$Telugu_fromPadma[Padma::Padma_avagraha]    = Telugu::Telugu_codePoints_misc_AVAGRAHA;
$Telugu_fromPadma[Padma::Padma_udAtta]      = Shared::Unicode_Shared_UDATTA;
$Telugu_fromPadma[Padma::Padma_anudAtta]    = Shared::Unicode_Shared_ANUDATTA;
$Telugu_fromPadma[Padma::Padma_svarita]     = Shared::Unicode_Shared_SVARITA;
$Telugu_fromPadma[Padma::Padma_danda]       = Shared::Unicode_Shared_DANDA;
$Telugu_fromPadma[Padma::Padma_ddanda]      = Shared::Unicode_Shared_DDANDA;
$Telugu_fromPadma[Padma::Padma_abbrev]      = Shared::Unicode_Shared_abbrev;
$Telugu_fromPadma[Padma::Padma_om]          = Shared::Unicode_Shared_OM;

//digits
$Telugu_fromPadma[Padma::Padma_digit_ZERO]  = Telugu::Telugu_codePoints_digit_ZERO;
$Telugu_fromPadma[Padma::Padma_digit_ONE]   = Telugu::Telugu_codePoints_digit_ONE;
$Telugu_fromPadma[Padma::Padma_digit_TWO]   = Telugu::Telugu_codePoints_digit_TWO;
$Telugu_fromPadma[Padma::Padma_digit_THREE] = Telugu::Telugu_codePoints_digit_THREE;
$Telugu_fromPadma[Padma::Padma_digit_FOUR]  = Telugu::Telugu_codePoints_digit_FOUR;
$Telugu_fromPadma[Padma::Padma_digit_FIVE]  = Telugu::Telugu_codePoints_digit_FIVE;
$Telugu_fromPadma[Padma::Padma_digit_SIX]   = Telugu::Telugu_codePoints_digit_SIX;
$Telugu_fromPadma[Padma::Padma_digit_SEVEN] = Telugu::Telugu_codePoints_digit_SEVEN;
$Telugu_fromPadma[Padma::Padma_digit_EIGHT] = Telugu::Telugu_codePoints_digit_EIGHT;
$Telugu_fromPadma[Padma::Padma_digit_NINE]  = Telugu::Telugu_codePoints_digit_NINE;

//Vowels
$Telugu_fromPadma[Padma::Padma_vowel_A]     = Telugu::Telugu_codePoints_letter_A;
$Telugu_fromPadma[Padma::Padma_vowel_AA]    = Telugu::Telugu_codePoints_letter_AA;
$Telugu_fromPadma[Padma::Padma_vowel_I]     = Telugu::Telugu_codePoints_letter_I;
$Telugu_fromPadma[Padma::Padma_vowel_II]    = Telugu::Telugu_codePoints_letter_II;
$Telugu_fromPadma[Padma::Padma_vowel_U]     = Telugu::Telugu_codePoints_letter_U;
$Telugu_fromPadma[Padma::Padma_vowel_UU]    = Telugu::Telugu_codePoints_letter_UU;
$Telugu_fromPadma[Padma::Padma_vowel_R]     = Telugu::Telugu_codePoints_letter_R;
$Telugu_fromPadma[Padma::Padma_vowel_RR]    = Telugu::Telugu_codePoints_letter_RR;
$Telugu_fromPadma[Padma::Padma_vowel_L]     = Telugu::Telugu_codePoints_letter_L;
$Telugu_fromPadma[Padma::Padma_vowel_LL]    = Telugu::Telugu_codePoints_letter_LL;
$Telugu_fromPadma[Padma::Padma_vowel_E]     = Telugu::Telugu_codePoints_letter_E;
$Telugu_fromPadma[Padma::Padma_vowel_EE]    = Telugu::Telugu_codePoints_letter_EE;
$Telugu_fromPadma[Padma::Padma_vowel_AI]    = Telugu::Telugu_codePoints_letter_AI;
$Telugu_fromPadma[Padma::Padma_vowel_O]     = Telugu::Telugu_codePoints_letter_O;
$Telugu_fromPadma[Padma::Padma_vowel_OO]    = Telugu::Telugu_codePoints_letter_OO;
$Telugu_fromPadma[Padma::Padma_vowel_AU]    = Telugu::Telugu_codePoints_letter_AU;

//Consonants
$Telugu_fromPadma[Padma::Padma_consnt_KA]   = Telugu::Telugu_codePoints_letter_KA;
$Telugu_fromPadma[Padma::Padma_consnt_KHA]  = Telugu::Telugu_codePoints_letter_KHA;
$Telugu_fromPadma[Padma::Padma_consnt_GA]   = Telugu::Telugu_codePoints_letter_GA;
$Telugu_fromPadma[Padma::Padma_consnt_GHA]  = Telugu::Telugu_codePoints_letter_GHA;
$Telugu_fromPadma[Padma::Padma_consnt_NGA]  = Telugu::Telugu_codePoints_letter_NGA;
$Telugu_fromPadma[Padma::Padma_consnt_CA]   = Telugu::Telugu_codePoints_letter_CA;
$Telugu_fromPadma[Padma::Padma_consnt_CHA]  = Telugu::Telugu_codePoints_letter_CHA;
$Telugu_fromPadma[Padma::Padma_consnt_JA]   = Telugu::Telugu_codePoints_letter_JA;
$Telugu_fromPadma[Padma::Padma_consnt_JHA]  = Telugu::Telugu_codePoints_letter_JHA;
$Telugu_fromPadma[Padma::Padma_consnt_NYA]  = Telugu::Telugu_codePoints_letter_NYA;
$Telugu_fromPadma[Padma::Padma_consnt_TTA]  = Telugu::Telugu_codePoints_letter_TTA;
$Telugu_fromPadma[Padma::Padma_consnt_TTHA] = Telugu::Telugu_codePoints_letter_TTHA;
$Telugu_fromPadma[Padma::Padma_consnt_DDA]  = Telugu::Telugu_codePoints_letter_DDA;
$Telugu_fromPadma[Padma::Padma_consnt_DDHA] = Telugu::Telugu_codePoints_letter_DDHA;
$Telugu_fromPadma[Padma::Padma_consnt_NNA]  = Telugu::Telugu_codePoints_letter_NNA;
$Telugu_fromPadma[Padma::Padma_consnt_TA]   = Telugu::Telugu_codePoints_letter_TA;
$Telugu_fromPadma[Padma::Padma_consnt_THA]  = Telugu::Telugu_codePoints_letter_THA;
$Telugu_fromPadma[Padma::Padma_consnt_DA]   = Telugu::Telugu_codePoints_letter_DA;
$Telugu_fromPadma[Padma::Padma_consnt_DHA]  = Telugu::Telugu_codePoints_letter_DHA;
$Telugu_fromPadma[Padma::Padma_consnt_NA]   = Telugu::Telugu_codePoints_letter_NA;
$Telugu_fromPadma[Padma::Padma_consnt_PA]   = Telugu::Telugu_codePoints_letter_PA;
$Telugu_fromPadma[Padma::Padma_consnt_PHA]  = Telugu::Telugu_codePoints_letter_PHA;
$Telugu_fromPadma[Padma::Padma_consnt_BA]   = Telugu::Telugu_codePoints_letter_BA;
$Telugu_fromPadma[Padma::Padma_consnt_BHA]  = Telugu::Telugu_codePoints_letter_BHA;
$Telugu_fromPadma[Padma::Padma_consnt_MA]   = Telugu::Telugu_codePoints_letter_MA;
$Telugu_fromPadma[Padma::Padma_consnt_YA]   = Telugu::Telugu_codePoints_letter_YA;
$Telugu_fromPadma[Padma::Padma_consnt_RA]   = Telugu::Telugu_codePoints_letter_RA;
$Telugu_fromPadma[Padma::Padma_consnt_LA]   = Telugu::Telugu_codePoints_letter_LA;
$Telugu_fromPadma[Padma::Padma_consnt_VA]   = Telugu::Telugu_codePoints_letter_VA;
$Telugu_fromPadma[Padma::Padma_consnt_SHA]  = Telugu::Telugu_codePoints_letter_SHA;
$Telugu_fromPadma[Padma::Padma_consnt_SSA]  = Telugu::Telugu_codePoints_letter_SSA;
$Telugu_fromPadma[Padma::Padma_consnt_SA]   = Telugu::Telugu_codePoints_letter_SA;
$Telugu_fromPadma[Padma::Padma_consnt_HA]   = Telugu::Telugu_codePoints_letter_HA;
$Telugu_fromPadma[Padma::Padma_consnt_LLA]  = Telugu::Telugu_codePoints_letter_LLA;
$Telugu_fromPadma[Padma::Padma_consnt_RRA]  = Telugu::Telugu_codePoints_letter_RRA;
$Telugu_fromPadma[Padma::Padma_consnt_TSA]  = Telugu::Telugu_codePoints_letter_TSA;
$Telugu_fromPadma[Padma::Padma_consnt_DJA]  = Telugu::Telugu_codePoints_letter_DJA;

//Gunimtaalu
$Telugu_fromPadma[Padma::Padma_vowelsn_AA]  = Telugu::Telugu_codePoints_vowelsn_AA;
$Telugu_fromPadma[Padma::Padma_vowelsn_I]   = Telugu::Telugu_codePoints_vowelsn_I;
$Telugu_fromPadma[Padma::Padma_vowelsn_II]  = Telugu::Telugu_codePoints_vowelsn_II;
$Telugu_fromPadma[Padma::Padma_vowelsn_U]   = Telugu::Telugu_codePoints_vowelsn_U;
$Telugu_fromPadma[Padma::Padma_vowelsn_UU]  = Telugu::Telugu_codePoints_vowelsn_UU;
$Telugu_fromPadma[Padma::Padma_vowelsn_R]   = Telugu::Telugu_codePoints_vowelsn_R;
$Telugu_fromPadma[Padma::Padma_vowelsn_RR]  = Telugu::Telugu_codePoints_vowelsn_RR;
$Telugu_fromPadma[Padma::Padma_vowelsn_L]   = Telugu::Telugu_codePoints_vowelsn_L;
$Telugu_fromPadma[Padma::Padma_vowelsn_LL]  = Telugu::Telugu_codePoints_vowelsn_LL;
$Telugu_fromPadma[Padma::Padma_vowelsn_E]   = Telugu::Telugu_codePoints_vowelsn_E;
$Telugu_fromPadma[Padma::Padma_vowelsn_EE]  = Telugu::Telugu_codePoints_vowelsn_EE;
$Telugu_fromPadma[Padma::Padma_vowelsn_AI]  = Telugu::Telugu_codePoints_vowelsn_AI;
$Telugu_fromPadma[Padma::Padma_vowelsn_O]   = Telugu::Telugu_codePoints_vowelsn_O;
$Telugu_fromPadma[Padma::Padma_vowelsn_OO]  = Telugu::Telugu_codePoints_vowelsn_OO;
$Telugu_fromPadma[Padma::Padma_vowelsn_AU]  = Telugu::Telugu_codePoints_vowelsn_AU;
$Telugu_fromPadma[Padma::Padma_vowelsn_AILEN]  = Telugu::Telugu_codePoints_misc_AILEN;

//The following are not directly present in $Telugu_- equivalent transliteration
$Telugu_fromPadma[Padma::Padma_vowel_SHT_A]   = Telugu::Telugu_codePoints_letter_A;
$Telugu_fromPadma[Padma::Padma_vowel_CDR_E]   = Telugu::Telugu_codePoints_letter_E;
$Telugu_fromPadma[Padma::Padma_vowel_CDR_O]   = Telugu::Telugu_codePoints_letter_O;
$Telugu_fromPadma[Padma::Padma_consnt_QA]     = Telugu::Telugu_codePoints_letter_KA;
$Telugu_fromPadma[Padma::Padma_consnt_KHHA]   = Telugu::Telugu_codePoints_letter_KHA;
$Telugu_fromPadma[Padma::Padma_consnt_GHHA]   = Telugu::Telugu_codePoints_letter_GHA;
$Telugu_fromPadma[Padma::Padma_consnt_ZA]     = Telugu::Telugu_codePoints_letter_JA;
$Telugu_fromPadma[Padma::Padma_consnt_DDDHA]  = Telugu::Telugu_codePoints_letter_DDA;
$Telugu_fromPadma[Padma::Padma_consnt_RHA]    = Telugu::Telugu_codePoints_letter_DDHA;
$Telugu_fromPadma[Padma::Padma_consnt_NNNA]   = Telugu::Telugu_codePoints_letter_NNA;
$Telugu_fromPadma[Padma::Padma_consnt_FA]     = Telugu::Telugu_codePoints_letter_PHA;
$Telugu_fromPadma[Padma::Padma_consnt_YYA]    = Telugu::Telugu_codePoints_letter_YA;
$Telugu_fromPadma[Padma::Padma_consnt_ZHA]    = Telugu::Telugu_codePoints_letter_LLA;
$Telugu_fromPadma[Padma::Padma_vowelsn_CDR_E] = Telugu::Telugu_codePoints_vowelsn_E;
$Telugu_fromPadma[Padma::Padma_vowelsn_CDR_O] = Telugu::Telugu_codePoints_vowelsn_O;
$Telugu_fromPadma[Padma::Padma_consnt_GGA]    = Telugu::Telugu_codePoints_letter_GA;
$Telugu_fromPadma[Padma::Padma_consnt_JJA]    = Telugu::Telugu_codePoints_letter_JA;
$Telugu_fromPadma[Padma::Padma_consnt_DDDA]   = Telugu::Telugu_codePoints_letter_DDA;
$Telugu_fromPadma[Padma::Padma_consnt_BBA]    = Telugu::Telugu_codePoints_letter_BA;
$Telugu_fromPadma[Padma::Padma_consnt_RA_MD]  = Telugu::Telugu_codePoints_letter_RA;
$Telugu_fromPadma[Padma::Padma_consnt_RA_LD]  = Telugu::Telugu_codePoints_letter_RA;

?>
