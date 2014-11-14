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

class Padma
{

    function isVowel ($str)
    {
        global $Padma_symbols;
        return $Padma_symbols[$str] == Padma::Padma_type_accu;
    }
    
    function isSpecial($str)
    {
        global $Padma_symbols;
        $val = $Padma_symbols[$str];
        return $val == null || $val == Padma::Padma_type_unknown;
    }
    
    function isConsonant ($str)
    {
      global $Padma_symbols;
      return $Padma_symbols[$str] == Padma::Padma_type_hallu;
                     
    }
    
    function isDigit ($str)
    {
        global $Padma_symbols;
        return $Padma_symbols[$str] == Padma::Padma_type_digit;
    }
    
    function isGunintam ($str)
    {
          global $Padma_symbols;
          return $Padma_symbols[$str] == Padma::Padma_type_gunintam;
    }
    
    function isVattu ($str)
    {
        global $Padma_symbols;
        return $Padma_symbols[$str] == Padma::Padma_type_vattu;
    }
    
    function isHalfForm ($str)
    {
        global $Padma_symbols;
        return $Padma_symbols[$str] == Padma::Padma_type_half_form;
    }

    function getType ($str)
    {
        global $Padma_symbols;
         
        if ($str == null)
        {
            return Padma::Padma_type_unknown;
        }
        $val = (array_key_exists($str, $Padma_symbols)) ? $Padma_symbols[$str] : null;
        return $val == null ? Padma::Padma_type_unknown : $val;
    }
                                                                     
    //No Input validation - only one char code assumed
    function fast_Vattu ($code)
    {
        return utf8_from_unicode($code + 0x80);
    }
                                                                     
    function fast_halfForm ($code)
    {    
        return utf8_from_unicode($code + 0x100);
    }
                                                                     
    function fast_baseFormFromVattu($code)
    {
        $strps=$code - 0x80;
        return utf8_from_unicode($strps);
    }
                                                                     
    function fast_baseFormFromHalfForm ($code)
    {       
        $strps=$code - 0x100;
        return utf8_from_unicode($strps);
    }

    function dependentForm ($str)
    {     
        $response = "";
        for($i = 0; $i < utf8_strlen($str); ++$i) 
        {
            $code = $str[$i];
            if ($code >= Padma::Padma_base_START && $code <= Padma::Padma_base_END)
                $response .= utf8_from_unicode($code + 0x80);
        }
        return $response;
    }
    
    function halfForm($str)
    {      
        $response = "";
        for($i = 0; $i <  utf8_strlen($str); ++$i) 
        {
            $code = $str[$i];
            if ($code >= Padma::Padma_base_START && $code <= PAdma::Padma_base_END)
                $response .=utf8_from_unicode($code + 0x100);
        }
        return $response;
    }
    
    function baseForm($str)
    {   
        $response = "";
        for($i = 0; $i < utf8_strlen($str); ++$i) 
        {
            $code = $str[$i];
            if ($code >= Padma::Padma_dep_START && $code <= Padma::Padma_dep_END)
                $response .= utf8_from_unicode($code - 0x80);
            else if ($code >= Padma::Padma_half_START && $code <= Padma::Padma_half_END)
                $response .=utf8_from_unicode($code - 0x100);
        }
        return $response;
    }

    //Script codes
    const Padma_script_TELUGU     = 0;
    const Padma_script_TAMIL      = 1;
    const Padma_script_KANNADA    = 2;
    const Padma_script_MALAYALAM  = 3;
    const Padma_script_DEVANAGARI = 4;
    const Padma_script_GUJARATI   = 5;
    const Padma_script_BENGALI    = 6;
    const Padma_script_GURMUKHI   = 7;
    const Padma_script_ORIYA      = 8;
    
    //6 scripts supported now
    const Padma_script_MAXSCRIPTS = 8;
    
    //Types (values to allow bit wise operations)
    
    
    const Padma_type_accu      = 1;
    const Padma_type_gunintam  = 2;
    const Padma_type_accu_mod  = 4;    //vowel modififers
    const Padma_type_digit     = 8;
    const Padma_type_vattu     = 16;
    const Padma_type_hallu     = 32;
    const Padma_type_hallu_mod = 64;
    const Padma_type_half_form = 128;
    const Padma_type_unknown   = 256;
    
    
    //Vowel modifiers (including pollu with visarga and anusvara
    const Padma_anusvara    = "\xEE\xB0\x80";   //60416
    const Padma_visarga     = "\xEE\xB0\x81";
    const Padma_pollu       = "\xEE\xB0\x82";   //dead consonant
    const Padma_chillu      = "\xEE\xB0\x8D";   //half consonant - in honor of the Malayalam word chillksharamu (anything generated with a ZWJ in Unicode)
    const Padma_syllbreak   = "\xEE\xB1\xBB";   //syllable break - (anything generated with a ZWNJ in Unicode)
    const Padma_nukta       = "\xEE\xB1\xBC";
                                                                                                                                 
    //Other names for the equivalent of pollu
    
    const Padma_virama       = Padma::Padma_pollu;   //Telugu
    const Padma_chandrakkala = Padma::Padma_pollu;   //Malayalam
    const Padma_pulli        = Padma::Padma_pollu;   //Tamil
    const Padma_halant       = Padma::Padma_pollu;   //Devanagari
    const Padma_hasant       = Padma::Padma_pollu;   //Bengali
                                                                                                                                 
    //Specials
    const Padma_candrabindu = "\xEE\xB0\x83";
    const Padma_avagraha    = "\xEE\xB0\x84";
    const Padma_yati        = "\xEE\xB0\x85";   //vertical diamond filled dark (classical), sometimes asterisk
    const Padma_udAtta      = "\xEE\xB0\x86";   //this and the next 2 are vedic symbols
    const Padma_anudAtta    = "\xEE\xB0\x87";
    const Padma_svarita     = "\xEE\xB0\x88";   //equivalent of udAtta
    const Padma_guru        = "\xEE\xB0\x89";
    const Padma_laghu       = "\xEE\xB0\x8A";
    const Padma_danda       = "\xEE\xB0\x8B";   //purna virama
    const Padma_ddanda      = "\xEE\xB0\x8C";   //deergha virama (double danda)
    const Padma_abbrev      = "\xEE\xB0\x8E";   //Devanagari
    const Padma_om          = "\xEE\xB0\x8F";  
    const Padma_ardhavisarga = "\xEE\xB1\xBD";  
    const Padma_tippi       = "\xEE\xB1\xBE";   //Gurmukhi specific
    const Padma_addak       = "\xEE\xB1\xBF";   //Gurmukhi specific
    const Padma_ekonkar     = "\xEE\xB2\x80";   //Gurmukhi specific
    
    
    //digits
    const Padma_digit_ZERO  = "\xEE\xB0\x90";
    const Padma_digit_ONE   = "\xEE\xB0\x91";
    const Padma_digit_TWO   = "\xEE\xB0\x92";
    const Padma_digit_THREE = "\xEE\xB0\x93";
    const Padma_digit_FOUR  = "\xEE\xB0\x94";
    const Padma_digit_FIVE  = "\xEE\xB0\x95";
    const Padma_digit_SIX   = "\xEE\xB0\x96";
    const Padma_digit_SEVEN = "\xEE\xB0\x97";
    const Padma_digit_EIGHT = "\xEE\xB0\x98";
    const Padma_digit_NINE  = "\xEE\xB0\x99";
                                                                                                                                 
    //Vowels
    const Padma_vowel_A     = "\xEE\xB0\xA0";
    const Padma_vowel_SHT_A = "\xEE\xB0\xA1";  //SHORT A - DEVANAGARI
    const Padma_vowel_AA    = "\xEE\xB0\xA2";
    const Padma_vowel_I     = "\xEE\xB0\xA3";
    const Padma_vowel_II    = "\xEE\xB0\xA4";
    const Padma_vowel_U     = "\xEE\xB0\xA5";
    const Padma_vowel_UU    = "\xEE\xB0\xA6";
    const Padma_vowel_R     = "\xEE\xB0\xA7";
    const Padma_vowel_RR    = "\xEE\xB0\xA8";
    const Padma_vowel_L     = "\xEE\xB0\xA9";
    const Padma_vowel_LL    = "\xEE\xB0\xAA";
    const Padma_vowel_CDR_E = "\xEE\xB0\xAB";  //CANDRA E - DEVANAGARI
    const Padma_vowel_E     = "\xEE\xB0\xAC";
    const Padma_vowel_EE    = "\xEE\xB0\xAD";
    const Padma_vowel_AI    = "\xEE\xB0\xAE";
    const Padma_vowel_CDR_O = "\xEE\xB0\xAF";  //CANDRA O - DEVANAGARI
    const Padma_vowel_O     = "\xEE\xB0\xB0";
    const Padma_vowel_OO    = "\xEE\xB0\xB1";
    const Padma_vowel_AU    = "\xEE\xB0\xB2";
    
    //Consonants
    const Padma_consnt_KA   = "\xEE\xB0\xB3";
    const Padma_consnt_QA   = "\xEE\xB0\xB4";  //Urdu
    const Padma_consnt_KHA  = "\xEE\xB0\xB5";
    const Padma_consnt_KHHA = "\xEE\xB0\xB6";  //Urdu
    const Padma_consnt_GA   = "\xEE\xB0\xB7";
    const Padma_consnt_GHA  = "\xEE\xB0\xB8";
    const Padma_consnt_GHHA = "\xEE\xB0\xB9";  //Urdu
    const Padma_consnt_NGA  = "\xEE\xB0\xBA";
    const Padma_consnt_CA   = "\xEE\xB0\xBB";//"\uEC3B";
    const Padma_consnt_CHA  = "\xEE\xB0\xBC";
    const Padma_consnt_JA   = "\xEE\xB0\xBD";
    const Padma_consnt_ZA   = "\xEE\xB0\xBE";  //Urdu
    const Padma_consnt_JHA  = "\xEE\xB0\xBF";
    const Padma_consnt_NYA  = "\xEE\xB1\x80";
    const Padma_consnt_TTA  = "\xEE\xB1\x81";
    const Padma_consnt_TTHA = "\xEE\xB1\x82";
    const Padma_consnt_DDA  = "\xEE\xB1\x83";
    const Padma_consnt_DDDHA= "\xEE\xB1\x84";  //Devanagari (Flapped DDA)
    const Padma_consnt_DDHA = "\xEE\xB1\x85";
    const Padma_consnt_RHA  = "\xEE\xB1\x86";  //Devanagari (Flapped DDHA)
    const Padma_consnt_NNA  = "\xEE\xB1\x87";
    const Padma_consnt_TA   = "\xEE\xB1\x88";
    const Padma_consnt_THA  = "\xEE\xB1\x89";
    const Padma_consnt_DA   = "\xEE\xB1\x8A";
    const Padma_consnt_DHA  = "\xEE\xB1\x8B";
    const Padma_consnt_NA   = "\xEE\xB1\x8C";
    const Padma_consnt_NNNA = "\xEE\xB1\x8D";  //Tamil
    const Padma_consnt_PA   = "\xEE\xB1\x8E";
    const Padma_consnt_FA   = "\xEE\xB1\x8F";  //Urdu
    const Padma_consnt_PHA  = "\xEE\xB1\x90";
    const Padma_consnt_BA   = "\xEE\xB1\x91";
    const Padma_consnt_BHA  = "\xEE\xB1\x92";
    const Padma_consnt_MA   = "\xEE\xB1\x93";
    const Padma_consnt_YA   = "\xEE\xB1\x94";
    const Padma_consnt_YYA  = "\xEE\xB1\x95";  //Bengali
    const Padma_consnt_RA   = "\xEE\xB1\x96";
    const Padma_consnt_RRA  = "\xEE\xB1\x97";
    const Padma_consnt_LA   = "\xEE\xB1\x98";
    const Padma_consnt_LLA  = "\xEE\xB1\x99";
    const Padma_consnt_ZHA  = "\xEE\xB1\x9A";  //Malayalam and Tamil
    const Padma_consnt_VA   = "\xEE\xB1\x9B";
    const Padma_consnt_SHA  = "\xEE\xB1\x9C";
    const Padma_consnt_SSA  = "\xEE\xB1\x9D";
    const Padma_consnt_SA   = "\xEE\xB1\x9E";
    const Padma_consnt_HA   = "\xEE\xB1\x9F";
    const Padma_consnt_TSA  = "\xEE\xB1\xA0";  //Telugu (Extinct)
    const Padma_consnt_DJA  = "\xEE\xB1\xA1";  //Telugu (Extinct)
    const Padma_consnt_GGA  = "\xEE\xB1\xA2";  //Sindhi
    const Padma_consnt_JJA  = "\xEE\xB1\xA3";  //Sindhi
    const Padma_consnt_DDDA = "\xEE\xB1\xA4";  //Sindhi
    const Padma_consnt_BBA  = "\xEE\xB1\xA5";  //Sindhi
    const Padma_consnt_RA_MD = "\xEE\xB1\xA6";  //Assamese - RA with mid diagonal
    const Padma_consnt_RA_LD = "\xEE\xB1\xA7";  //Assamese - RA with lower diagonal
    const Padma_consnt_KHANDA_TA = "\xEE\xB1\xA8";  //Bengali
                                                                                                                                 
    //Gunimtaalu
    const Padma_vowelsn_AA    = "\xEE\xB2\xA2";
    const Padma_vowelsn_I     = "\xEE\xB2\xA3";// "\uECA3";
    const Padma_vowelsn_II    = "\xEE\xB2\xA4";
    const Padma_vowelsn_U     = "\xEE\xB2\xA5";
    const Padma_vowelsn_UU    = "\xEE\xB2\xA6";
    const Padma_vowelsn_R     = "\xEE\xB2\xA7";
    const Padma_vowelsn_RR    = "\xEE\xB2\xA8";
    const Padma_vowelsn_L     = "\xEE\xB2\xA9";
    const Padma_vowelsn_LL    = "\xEE\xB2\xAA";
    const Padma_vowelsn_CDR_E = "\xEE\xB2\xAB";
    const Padma_vowelsn_E     = "\xEE\xB2\xAC";
    const Padma_vowelsn_EE    = "\xEE\xB2\xAD";
    const Padma_vowelsn_AI    = "\xEE\xB2\xAE";
    const Padma_vowelsn_CDR_O = "\xEE\xB2\xAF";
    const Padma_vowelsn_O     = "\xEE\xB2\xB0";
    const Padma_vowelsn_OO    = "\xEE\xB2\xB1";
    const Padma_vowelsn_AU    = "\xEE\xB2\xB2";
                                                                                                                                 
    //Useful when a vowelsn is broken into component parts
    const Padma_vowelsn_EELEN = "\xEE\xB0\x9A";
    const Padma_vowelsn_AILEN = "\xEE\xB0\x9B";
    const Padma_vowelsn_AULEN = "\xEE\xB0\x9C";
    const Padma_vowelsn_IILEN = "\xEE\xB0\x9D";
    const Padma_vowelsn_LEN   = "\xEE\xB0\x9E";

    //vattulu
    const Padma_vattu_KA    = "\xEE\xB2\xB3";
    const Padma_vattu_QA    = "\xEE\xB2\xB4";
    const Padma_vattu_KHA   = "\xEE\xB2\xB5";
    const Padma_vattu_KHHA  = "\xEE\xB2\xB6";
    const Padma_vattu_GA    = "\xEE\xB2\xB7";
    const Padma_vattu_GHA   = "\xEE\xB2\xB8";
    const Padma_vattu_GHHA  = "\xEE\xB2\xB9";
    const Padma_vattu_NGA   = "\xEE\xB2\xBA";
    const Padma_vattu_CA    = "\xEE\xB2\xBB";
    const Padma_vattu_CHA   = "\xEE\xB2\xBC";
    const Padma_vattu_JA    = "\xEE\xB2\xBD";
    const Padma_vattu_ZA    = "\xEE\xB2\xBE";
    const Padma_vattu_JHA   = "\xEE\xB2\xBF";
    const Padma_vattu_NYA   = "\xEE\xB3\x80";
    const Padma_vattu_TTA   = "\xEE\xB3\x81";
    const Padma_vattu_TTHA  = "\xEE\xB3\x82";
    const Padma_vattu_DDA   = "\xEE\xB3\x83";
    const Padma_vattu_DDDHA = "\xEE\xB3\x84";
    const Padma_vattu_DDHA  = "\xEE\xB3\x85";
    const Padma_vattu_RHA   = "\xEE\xB3\x86";
    const Padma_vattu_NNA   = "\xEE\xB3\x87";
    const Padma_vattu_TA    = "\xEE\xB3\x88";
    const Padma_vattu_THA   = "\xEE\xB3\x89";
    const Padma_vattu_DA    = "\xEE\xB3\x8A";
    const Padma_vattu_DHA   = "\xEE\xB3\x8B";
    const Padma_vattu_NA    = "\xEE\xB3\x8C";
    const Padma_vattu_NNNA  = "\xEE\xB3\x8D";
    const Padma_vattu_PA    = "\xEE\xB3\x8E";
    const Padma_vattu_FA    = "\xEE\xB3\x8F";
    const Padma_vattu_PHA   = "\xEE\xB3\x90";
    const Padma_vattu_BA    = "\xEE\xB3\x91";
    const Padma_vattu_BHA   = "\xEE\xB3\x92";
    const Padma_vattu_MA    = "\xEE\xB3\x93";
    const Padma_vattu_YA    = "\xEE\xB3\x94";
    const Padma_vattu_YYA   = "\xEE\xB3\x95";
    const Padma_vattu_RA    = "\xEE\xB3\x96";
    const Padma_vattu_RRA   = "\xEE\xB3\x97";
    const Padma_vattu_LA    = "\xEE\xB3\x98";
    const Padma_vattu_LLA   = "\xEE\xB3\x99";
    const Padma_vattu_ZHA   = "\xEE\xB3\x9A";
    const Padma_vattu_VA    = "\xEE\xB3\x9B";
    const Padma_vattu_SHA   = "\xEE\xB3\x9C";
    const Padma_vattu_SSA   = "\xEE\xB3\x9D";
    const Padma_vattu_SA    = "\xEE\xB3\x9E";
    const Padma_vattu_HA    = "\xEE\xB3\x9F";
    const Padma_vattu_TSA   = "\xEE\xB3\xA0";
    const Padma_vattu_DJA   = "\xEE\xB3\xA1";
    const Padma_vattu_GGA   = "\xEE\xB3\xA2";
    const Padma_vattu_JJA   = "\xEE\xB3\xA3";
    const Padma_vattu_DDDA  = "\xEE\xB3\xA4";
    const Padma_vattu_BBA   = "\xEE\xB3\xA5";
    const Padma_vattu_RA_MD = "\xEE\xB3\xA6";
    const Padma_vattu_RA_LD = "\xEE\xB3\xA7";
    const Padma_vattu_KHANDA_TA = "\xEE\xB3\xA8";
    
    //Half Forms
    const Padma_halffm_KA   = "\xEE\xB4\xB3";
    const Padma_halffm_QA   = "\xEE\xB4\xB4";  //Urdu
    const Padma_halffm_KHA  = "\xEE\xB4\xB5";
    const Padma_halffm_KHHA = "\xEE\xB4\xB6";  //Urdu
    const Padma_halffm_GA   = "\xEE\xB4\xB7";
    const Padma_halffm_GHA  = "\xEE\xB4\xB8";
    const Padma_halffm_GHHA = "\xEE\xB4\xB9";  //Urdu
    const Padma_halffm_NGA  = "\xEE\xB4\xBA";
    const Padma_halffm_CA   = "\xEE\xB4\xBB";
    const Padma_halffm_CHA  = "\xEE\xB4\xBC";
    const Padma_halffm_JA   = "\xEE\xB4\xBD";
    const Padma_halffm_ZA   = "\xEE\xB4\xBE";  //Urdu
    const Padma_halffm_JHA  = "\xEE\xB4\xBF";
    const Padma_halffm_NYA  = "\xEE\xB5\x80";
    const Padma_halffm_TTA  = "\xEE\xB5\x81";
    const Padma_halffm_TTHA = "\xEE\xB5\x82";
    const Padma_halffm_DDA  = "\xEE\xB5\x83";
    const Padma_halffm_DDDHA= "\xEE\xB5\x84";  //Devanagari (Flapped DDA)
    const Padma_halffm_DDHA = "\xEE\xB5\x85";
    const Padma_halffm_RHA  = "\xEE\xB5\x86";  //Devanagari (Flapped DDHA)
    const Padma_halffm_NNA  = "\xEE\xB5\x87";
    const Padma_halffm_TA   = "\xEE\xB5\x88";
    const Padma_halffm_THA  = "\xEE\xB5\x89";
    const Padma_halffm_DA   = "\xEE\xB5\x8A";
    const Padma_halffm_DHA  = "\xEE\xB5\x8B";
    const Padma_halffm_NA   = "\xEE\xB5\x8C";
    const Padma_halffm_NNNA = "\xEE\xB5\x8D";  //Tamil
    const Padma_halffm_PA   = "\xEE\xB5\x8E";
    const Padma_halffm_FA   = "\xEE\xB5\x8F";  //Urdu
    const Padma_halffm_PHA  = "\xEE\xB5\x90";
    const Padma_halffm_BA   = "\xEE\xB5\x91";
    const Padma_halffm_BHA  = "\xEE\xB5\x92";
    const Padma_halffm_MA   = "\xEE\xB5\x93";
    const Padma_halffm_YA   = "\xEE\xB5\x94";
    const Padma_halffm_YYA  = "\xEE\xB5\x95";  //Bengali
    const Padma_halffm_RA   = "\xEE\xB5\x96";
    const Padma_halffm_RRA  = "\xEE\xB5\x97";
    const Padma_halffm_LA   = "\xEE\xB5\x98";
    const Padma_halffm_LLA  = "\xEE\xB5\x99";
    const Padma_halffm_ZHA  = "\xEE\xB5\x9A";  //Malayalam and Tamil
    const Padma_halffm_VA   = "\xEE\xB5\x9B";
    const Padma_halffm_SHA  = "\xEE\xB5\x9C";
    const Padma_halffm_SSA  = "\xEE\xB5\x9D";
    const Padma_halffm_SA   = "\xEE\xB5\x9E";
    const Padma_halffm_HA   = "\xEE\xB5\x9F";
    const Padma_halffm_TSA  = "\xEE\xB5\xA0";  //Telugu (Extinct)
    const Padma_halffm_DJA  = "\xEE\xB5\xA1";  //Telugu (Extinct)
    const Padma_halffm_GGA  = "\xEE\xB5\xA2";
    const Padma_halffm_JJA  = "\xEE\xB5\xA3";
    const Padma_halffm_DDDA = "\xEE\xB5\xA4";
    const Padma_halffm_BBA  = "\xEE\xB5\xA5";
    const Padma_halffm_RA_MD = "\xEE\xB5\xA6";
    const Padma_halffm_RA_LD = "\xEE\xB5\xA7";
    const Padma_halffm_KHANDA_TA = "\xEE\xB5\xA8";

    //Special signs
    const Padma_digit_TEN      = "\xEE\xB1\xB0";
    const Padma_digit_HUNDRED  = "\xEE\xB1\xB1";
    const Padma_digit_THOUSAND = "\xEE\xB1\xB2";
    const Padma_sign_DAY       = "\xEE\xB1\xB3";
    const Padma_sign_MONTH     = "\xEE\xB1\xB4";
    const Padma_sign_YEAR      = "\xEE\xB1\xB5";
    const Padma_sign_DEBIT     = "\xEE\xB1\xB6";
    const Padma_sign_CREDIT    = "\xEE\xB1\xB7";
    const Padma_sign_ASABOVE   = "\xEE\xB1\xB8";
    const Padma_sign_RUPEE     = "\xEE\xB1\xB9";
    const Padma_sign_NUMBER    = "\xEE\xB1\xBA";
    
    
    
    //Vowel and consonant range (exculudes #a#)
    const Padma_base_START =  0xEC22;
    const Padma_base_END   =  0xEC68;
    //Dependent form range (exculudes #a#)
    const Padma_dep_START = 0xECA2;
    const Padma_dep_END   = 0xECE8;
    //Half form range
    const Padma_half_START = 0xED33;
    const Padma_half_END   = 0xED68;
    //Vattu
    const Padma_vattu_START =0xECB3;
    const Padma_vattu_END   =0xECE8;
}

$Padma_scripts =Array();

$Padma_scripts[Padma::Padma_script_TELUGU]     = "Telugu";
$Padma_scripts[Padma::Padma_script_MALAYALAM]  = "Malayalam";
$Padma_scripts[Padma::Padma_script_TAMIL]      = "Tamil";
$Padma_scripts[Padma::Padma_script_DEVANAGARI] = "Devanagari";
$Padma_scripts[Padma::Padma_script_GUJARATI]   = "Gujarati";
$Padma_scripts[Padma::Padma_script_KANNADA]    = "Kannada";
$Padma_scripts[Padma::Padma_script_BENGALI]    = "BENGALI";

//Symbol table

$Padma_symbols = array();

$Padma_symbols[Padma::Padma_vowel_A]     = Padma::Padma_type_accu;
$Padma_symbols[Padma::Padma_vowel_SHT_A] = Padma::Padma_type_accu;
$Padma_symbols[Padma::Padma_vowel_AA]    = Padma::Padma_type_accu;
$Padma_symbols[Padma::Padma_vowel_I]     = Padma::Padma_type_accu;
$Padma_symbols[Padma::Padma_vowel_II]    = Padma::Padma_type_accu;
$Padma_symbols[Padma::Padma_vowel_U]     = Padma::Padma_type_accu;
$Padma_symbols[Padma::Padma_vowel_UU]    = Padma::Padma_type_accu;
$Padma_symbols[Padma::Padma_vowel_R]     = Padma::Padma_type_accu;
$Padma_symbols[Padma::Padma_vowel_RR]    = Padma::Padma_type_accu;
$Padma_symbols[Padma::Padma_vowel_L]     = Padma::Padma_type_accu;
$Padma_symbols[Padma::Padma_vowel_LL]    = Padma::Padma_type_accu;
$Padma_symbols[Padma::Padma_vowel_CDR_E] = Padma::Padma_type_accu;
$Padma_symbols[Padma::Padma_vowel_E]     = Padma::Padma_type_accu;
$Padma_symbols[Padma::Padma_vowel_EE]    = Padma::Padma_type_accu;
$Padma_symbols[Padma::Padma_vowel_AI]    = Padma::Padma_type_accu;
$Padma_symbols[Padma::Padma_vowel_CDR_O] = Padma::Padma_type_accu;
$Padma_symbols[Padma::Padma_vowel_O]     = Padma::Padma_type_accu;
$Padma_symbols[Padma::Padma_vowel_OO]    = Padma::Padma_type_accu;
$Padma_symbols[Padma::Padma_vowel_AU]    = Padma::Padma_type_accu;
                                                                                                                             
$Padma_symbols[Padma::Padma_candrabindu] = Padma::Padma_type_unknown;
$Padma_symbols[Padma::Padma_visarga]     = Padma::Padma_type_accu_mod;
$Padma_symbols[Padma::Padma_pollu]       = Padma::Padma_type_hallu_mod;
$Padma_symbols[Padma::Padma_chillu]      = Padma::Padma_type_hallu_mod;
$Padma_symbols[Padma::Padma_syllbreak]   = Padma::Padma_type_hallu_mod;
$Padma_symbols[Padma::Padma_nukta]       = Padma::Padma_type_hallu_mod;
$Padma_symbols[Padma::Padma_anusvara]    = Padma::Padma_type_accu_mod;
$Padma_symbols[Padma::Padma_ardhavisarga]= Padma::Padma_type_accu_mod;
$Padma_symbols[Padma::Padma_avagraha]    = Padma::Padma_type_unknown;
$Padma_symbols[Padma::Padma_yati]        = Padma::Padma_type_unknown;
$Padma_symbols[Padma::Padma_udAtta]      = Padma::Padma_type_unknown;
$Padma_symbols[Padma::Padma_anudAtta]    = Padma::Padma_type_unknown;
$Padma_symbols[Padma::Padma_svarita]     = Padma::Padma_type_unknown;
$Padma_symbols[Padma::Padma_guru]        = Padma::Padma_type_unknown;
$Padma_symbols[Padma::Padma_laghu]       = Padma::Padma_type_unknown;
$Padma_symbols[Padma::Padma_danda]       = Padma::Padma_type_unknown;
$Padma_symbols[Padma::Padma_ddanda]      = Padma::Padma_type_unknown;
$Padma_symbols[Padma::Padma_abbrev]      = Padma::Padma_type_unknown;
$Padma_symbols[Padma::Padma_om]          = Padma::Padma_type_unknown;
$Padma_symbols[Padma::Padma_tippi]       = Padma::Padma_type_unknown;  //TODO: Is this right?
$Padma_symbols[Padma::Padma_addak]       = Padma::Padma_type_unknown;  //TODO: Is this right?
$Padma_symbols[Padma::Padma_ekonkar]     = Padma::Padma_type_unknown;

$Padma_symbols[Padma::Padma_digit_ZERO]  = Padma::Padma_type_digit;
$Padma_symbols[Padma::Padma_digit_ONE]   = Padma::Padma_type_digit;
$Padma_symbols[Padma::Padma_digit_TWO]   = Padma::Padma_type_digit;
$Padma_symbols[Padma::Padma_digit_THREE] = Padma::Padma_type_digit;
$Padma_symbols[Padma::Padma_digit_FOUR]  = Padma::Padma_type_digit;
$Padma_symbols[Padma::Padma_digit_FIVE]  = Padma::Padma_type_digit;
$Padma_symbols[Padma::Padma_digit_SIX]   = Padma::Padma_type_digit;
$Padma_symbols[Padma::Padma_digit_SEVEN] = Padma::Padma_type_digit;
$Padma_symbols[Padma::Padma_digit_EIGHT] = Padma::Padma_type_digit;
$Padma_symbols[Padma::Padma_digit_NINE]  = Padma::Padma_type_digit;
                                                                                                                             
$Padma_symbols[Padma::Padma_consnt_KA]   = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_QA]   = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_KHA]  = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_KHHA] = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_GA]   = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_GHA]  = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_GHHA] = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_NGA]  = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_CA]   = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_CHA]  = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_JA]   = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_ZA]   = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_JHA]  = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_NYA]  = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_TTA]  = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_TTHA] = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_DDA]  = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_DDDHA] = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_DDHA] = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_RHA]  = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_NNA]  = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_TA]   = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_THA]  = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_DA]   = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_DHA]  = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_NA]   = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_NNNA] = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_PA]   = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_FA]   = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_PHA]  = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_BA]   = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_BHA]  = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_MA]   = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_YA]   = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_YYA]  = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_RA]   = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_RRA]  = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_LA]   = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_LLA]  = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_ZHA]  = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_VA]   = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_SHA]  = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_SSA]  = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_SA]   = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_HA]   = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_TSA]  = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_DJA]   = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_GGA]  = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_JJA]  = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_DDDA] = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_BBA]  = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_RA_MD] = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_RA_LD] = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_consnt_KHANDA_TA] = Padma::Padma_type_hallu;
                                                                                                                             
$Padma_symbols[Padma::Padma_vowelsn_AA]  = Padma::Padma_type_gunintam;
$Padma_symbols[Padma::Padma_vowelsn_I]   = Padma::Padma_type_gunintam;
$Padma_symbols[Padma::Padma_vowelsn_II]  = Padma::Padma_type_gunintam;
$Padma_symbols[Padma::Padma_vowelsn_U]   = Padma::Padma_type_gunintam;
$Padma_symbols[Padma::Padma_vowelsn_UU]  = Padma::Padma_type_gunintam;
$Padma_symbols[Padma::Padma_vowelsn_R]   = Padma::Padma_type_gunintam;
$Padma_symbols[Padma::Padma_vowelsn_RR]  = Padma::Padma_type_gunintam;
$Padma_symbols[Padma::Padma_vowelsn_L]   = Padma::Padma_type_gunintam;
$Padma_symbols[Padma::Padma_vowelsn_LL]  = Padma::Padma_type_gunintam;
$Padma_symbols[Padma::Padma_vowelsn_CDR_E] = Padma::Padma_type_gunintam;
$Padma_symbols[Padma::Padma_vowelsn_E]   = Padma::Padma_type_gunintam;
$Padma_symbols[Padma::Padma_vowelsn_EE]  = Padma::Padma_type_gunintam;
$Padma_symbols[Padma::Padma_vowelsn_AI]  = Padma::Padma_type_gunintam;
$Padma_symbols[Padma::Padma_vowelsn_CDR_O] = Padma::Padma_type_gunintam;
$Padma_symbols[Padma::Padma_vowelsn_O]   = Padma::Padma_type_gunintam;
$Padma_symbols[Padma::Padma_vowelsn_OO]  = Padma::Padma_type_gunintam;
$Padma_symbols[Padma::Padma_vowelsn_AU]  = Padma::Padma_type_gunintam;
$Padma_symbols[Padma::Padma_vowelsn_EELEN] = Padma::Padma_type_gunintam;
$Padma_symbols[Padma::Padma_vowelsn_AILEN] = Padma::Padma_type_gunintam;
$Padma_symbols[Padma::Padma_vowelsn_AULEN] = Padma::Padma_type_gunintam;
$Padma_symbols[Padma::Padma_vowelsn_IILEN] = Padma::Padma_type_gunintam;
$Padma_symbols[Padma::Padma_vowelsn_LEN]   = Padma::Padma_type_gunintam;
 
$Padma_symbols[Padma::Padma_vattu_KA]    = Padma::Padma_type_vattu;
$Padma_symbols[Padma::Padma_vattu_QA]    = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_vattu_KHA]   = Padma::Padma_type_vattu;
$Padma_symbols[Padma::Padma_vattu_KHHA]  = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_vattu_GA]    = Padma::Padma_type_vattu;
$Padma_symbols[Padma::Padma_vattu_GHA]   = Padma::Padma_type_vattu;
$Padma_symbols[Padma::Padma_vattu_GHHA]  = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_vattu_NGA]   = Padma::Padma_type_vattu;
$Padma_symbols[Padma::Padma_vattu_CA]    = Padma::Padma_type_vattu;
$Padma_symbols[Padma::Padma_vattu_CHA]   = Padma::Padma_type_vattu;
$Padma_symbols[Padma::Padma_vattu_JA]    = Padma::Padma_type_vattu;
$Padma_symbols[Padma::Padma_vattu_ZA]    = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_vattu_JHA]   = Padma::Padma_type_vattu;
$Padma_symbols[Padma::Padma_vattu_NYA]   = Padma::Padma_type_vattu;
$Padma_symbols[Padma::Padma_vattu_TTA]   = Padma::Padma_type_vattu;
$Padma_symbols[Padma::Padma_vattu_TTHA]  = Padma::Padma_type_vattu;
$Padma_symbols[Padma::Padma_vattu_DDA]   = Padma::Padma_type_vattu;
$Padma_symbols[Padma::Padma_vattu_DDDHA] = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_vattu_DDHA]  = Padma::Padma_type_vattu;
$Padma_symbols[Padma::Padma_vattu_RHA]   = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_vattu_NNA]   = Padma::Padma_type_vattu;
$Padma_symbols[Padma::Padma_vattu_TA]    = Padma::Padma_type_vattu;
$Padma_symbols[Padma::Padma_vattu_THA]   = Padma::Padma_type_vattu;
$Padma_symbols[Padma::Padma_vattu_DA]    = Padma::Padma_type_vattu;
$Padma_symbols[Padma::Padma_vattu_DHA]   = Padma::Padma_type_vattu;
$Padma_symbols[Padma::Padma_vattu_NA]    = Padma::Padma_type_vattu;
$Padma_symbols[Padma::Padma_vattu_NNNA]  = Padma::Padma_type_vattu;
$Padma_symbols[Padma::Padma_vattu_PA]    = Padma::Padma_type_vattu;
$Padma_symbols[Padma::Padma_vattu_FA]    = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_vattu_PHA]   = Padma::Padma_type_vattu;
$Padma_symbols[Padma::Padma_vattu_BA]    = Padma::Padma_type_vattu;
$Padma_symbols[Padma::Padma_vattu_BHA]   = Padma::Padma_type_vattu;
$Padma_symbols[Padma::Padma_vattu_MA]    = Padma::Padma_type_vattu;
$Padma_symbols[Padma::Padma_vattu_YA]    = Padma::Padma_type_vattu;
$Padma_symbols[Padma::Padma_vattu_YYA]   = Padma::Padma_type_hallu;
$Padma_symbols[Padma::Padma_vattu_RA]    = Padma::Padma_type_vattu;
$Padma_symbols[Padma::Padma_vattu_RRA]   = Padma::Padma_type_vattu;
$Padma_symbols[Padma::Padma_vattu_LA]    = Padma::Padma_type_vattu;
$Padma_symbols[Padma::Padma_vattu_LLA]   = Padma::Padma_type_vattu;
$Padma_symbols[Padma::Padma_vattu_ZHA]   = Padma::Padma_type_vattu;
$Padma_symbols[Padma::Padma_vattu_VA]    = Padma::Padma_type_vattu;
$Padma_symbols[Padma::Padma_vattu_SHA]   = Padma::Padma_type_vattu;
$Padma_symbols[Padma::Padma_vattu_SSA]   = Padma::Padma_type_vattu;
$Padma_symbols[Padma::Padma_vattu_SA]    = Padma::Padma_type_vattu;
$Padma_symbols[Padma::Padma_vattu_HA]    = Padma::Padma_type_vattu;
$Padma_symbols[Padma::Padma_vattu_TSA]   = Padma::Padma_type_vattu;
$Padma_symbols[Padma::Padma_vattu_DJA]   = Padma::Padma_type_vattu;
$Padma_symbols[Padma::Padma_vattu_GGA]   = Padma::Padma_type_vattu;
$Padma_symbols[Padma::Padma_vattu_JJA]   = Padma::Padma_type_vattu;
$Padma_symbols[Padma::Padma_vattu_DDDA]  = Padma::Padma_type_vattu;
$Padma_symbols[Padma::Padma_vattu_BBA]   = Padma::Padma_type_vattu;
$Padma_symbols[Padma::Padma_vattu_RA_MD] = Padma::Padma_type_vattu;
$Padma_symbols[Padma::Padma_vattu_RA_LD] = Padma::Padma_type_vattu;
$Padma_symbols[Padma::Padma_vattu_KHANDA_TA] = Padma::Padma_type_vattu;
                                                                                                                             
$Padma_symbols[Padma::Padma_halffm_KA]   = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_QA]   = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_KHA]  = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_KHHA] = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_GA]   = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_GHA]  = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_GHHA] = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_NGA]  = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_CA]   = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_CHA]  = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_JA]   = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_ZA]   = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_JHA]  = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_NYA]  = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_TTA]  = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_TTHA] = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_DDA]  = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_DDDHA] = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_DDHA] = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_RHA]  = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_NNA]  = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_TA]   = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_THA]  = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_DA]   = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_DHA]  = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_NA]   = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_NNNA] = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_PA]   = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_FA]   = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_PHA]  = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_BA]   = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_BHA]  = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_MA]   = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_YA]   = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_YYA]  = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_RA]   = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_RRA]  = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_LA]   = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_LLA]  = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_ZHA]  = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_VA]   = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_SHA]  = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_SSA]  = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_SA]   = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_HA]   = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_TSA]  = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_DJA]  = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_GGA]  = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_JJA]  = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_DDDA] = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_BBA]  = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_RA_MD] = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_RA_LD] = Padma::Padma_type_half_form;
$Padma_symbols[Padma::Padma_halffm_KHANDA_TA] = Padma::Padma_type_half_form;
                                                                                                                             
$Padma_symbols[Padma::Padma_digit_TEN]      = Padma::Padma_type_digit;
$Padma_symbols[Padma::Padma_digit_HUNDRED]  = Padma::Padma_type_digit;
$Padma_symbols[Padma::Padma_digit_THOUSAND] = Padma::Padma_type_digit;
$Padma_symbols[Padma::Padma_sign_DAY]       = Padma::Padma_type_unknown;
$Padma_symbols[Padma::Padma_sign_MONTH]     = Padma::Padma_type_unknown;
$Padma_symbols[Padma::Padma_sign_YEAR]      = Padma::Padma_type_unknown;
$Padma_symbols[Padma::Padma_sign_DEBIT]     = Padma::Padma_type_unknown;
$Padma_symbols[Padma::Padma_sign_CREDIT]    = Padma::Padma_type_unknown;
$Padma_symbols[Padma::Padma_sign_ASABOVE]   = Padma::Padma_type_unknown;
$Padma_symbols[Padma::Padma_sign_RUPEE]     = Padma::Padma_type_unknown;
$Padma_symbols[Padma::Padma_sign_NUMBER]    = Padma::Padma_type_unknown;

?>
