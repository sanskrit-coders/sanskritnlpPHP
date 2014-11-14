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

class Tikkana
{
function Tikkana()
{
}

//The interface every dynamic font encoding should implement
var $maxLookupLen = 3;
var $fontFace     = "Tikkana";
var $displayName  = "Tikkana";
var $script       = Padma::Padma_script_TELUGU;

function lookup($str) 
{
    global $Tikkana_toPadma;
    return $Tikkana_toPadma[$str];
}

function isPrefixSymbol($str)
{
    global $Tikkana_prefixList;
    return $Tikkana_prefixList[$str] != null;
}

function isOverloaded($str)
{
    global $Tikkana_overloadList;
    return $Tikkana_overloadList[$str] != null;
}

function handleTwoPartVowelSigns($sign1, $sign2)
{
	//alert("sign1 = " + sign1 + " sign2= " + sign2);
    if ($sign2 == Padma::Padma_vowelsn_E && $sign1 == Padma::Padma_vowelsn_AILEN)
        return Padma::Padma_vowelsn_AI;
    if ($sign2 == Padma::Padma_vowelsn_E && $sign1 == Padma::Padma_vowelsn_U)
        return Padma::Padma_vowelsn_O;
    if ($sign2 == Padma::Padma_vowelsn_U && $sign1 == Padma::Padma_vowelsn_E)
        return Padma::Padma_vowelsn_O;
    if ($sign2 ==  Padma::Padma_vowelsn_E && $sign1 == Padma::Padma_vowelsn_UU)
        return Padma::Padma_vowelsn_OO;
    if ($sign2 ==  Padma::Padma_vowelsn_AA && $sign1 == Padma::Padma_vowelsn_I)
        return Padma::Padma_vowelsn_II;
    return $sign1 . $sign2;
}

//replace yi with ya + i-guNintamu
function preprocessMessage($input)
{
    $output = "";
    $last = null;
   $input_len=utf8_strlen($input);   
    for($i = 0; $i < $input_len; ++$i) {
      $cur = utf8_substr($input,$i,1); 
       if ($cur == Tikkana::Tikkana_vowelsn_U_3 && $last == Tikkana::Tikkana_combo_YA_STEM)
       {
            $output .= Tikkana::Tikkana_vowelsn_U_3 . Tikkana::Tikkana_vowelsn_I_3; // adding dummy i-karamu for getting YI
        }
        else if (!Tikkana::isRedundant($cur))
        {
            $output .= $cur;
        }
		// copy it into last even if it is redundant.
        $last = $cur;
    }
    return $output;
}

function isRedundant($str)
{
    global $Tikkana_redundantList;
    return $Tikkana_redundantList[$str] != null;
}

//Implementation details start here

//Specials
const Tikkana_candrabindu    = "\xC3\xBF"; // ara sunna
const Tikkana_visarga        = "\x3E";
const Tikkana_virama_1       = "\x2A"; // pollu
const Tikkana_virama_2       = "\x2B"; // pollu 2 NV
const Tikkana_virama_3       = "\x2F"; // pollu 3
const Tikkana_avagraha       = "\x3C"; // avagraha NV
const Tikkana_anusvara       = "\x3D"; // sunna NV

//Vowels
const Tikkana_vowel_A        = "\x40";  //NV
const Tikkana_vowel_AA       = "\x41";  //NV
const Tikkana_vowel_I        = "\x42";  //NV
const Tikkana_vowel_II       = "\x43";  //NV
const Tikkana_vowel_U        = "\x44";  //NV
const Tikkana_vowel_UU       = "\x45";  //NV
const Tikkana_vowel_R        = "\x46";  //NV
const Tikkana_vowel_RR       = "\x46\x7C";  //NV
const Tikkana_vowel_L        = "\x47";  //NV
const Tikkana_vowel_LL       = "\x47\x7C";  //this is a guess
const Tikkana_vowel_E        = "\x48";  //NV
const Tikkana_vowel_EE       = "\x49";  //NV
const Tikkana_vowel_AI       = "\x4A";  //NV
const Tikkana_vowel_O        = "\x4B";  //NV
const Tikkana_vowel_OO       = "\x4C";  //NV
const Tikkana_vowel_AU       = "\x4D";  //NV

//Consonants
const Tikkana_consnt_KA      = "\x4E";  //NV
const Tikkana_consnt_KHA_1   = "\x4F";  //NV
const Tikkana_consnt_KHA_2   = "\x50";  //NV
const Tikkana_consnt_GA      = "\x51";  //NV
const Tikkana_consnt_GHA     = "\x52";  //NV
const Tikkana_consnt_NGA     = "\x53";  //NV

const Tikkana_consnt_CA      = "\x54";  //NV
const Tikkana_consnt_TSA     = "\x3A\x54"; //NV - ???
const Tikkana_consnt_CHA     = "\x55";  //NV
const Tikkana_consnt_JA_1    = "\x56";  //NV
const Tikkana_consnt_JA_2    = "\x57";  //NV
const Tikkana_consnt_DJA      = "\x3A\x56"; //NV - ???
const Tikkana_consnt_JHA     = "\x6D\x58"; //NV
const Tikkana_consnt_NYA     = "\x59";  //NV

const Tikkana_consnt_TTA     = "\x5A";  //NV
const Tikkana_consnt_TTHA    = "\x5B";  //NV
const Tikkana_consnt_DDA     = "\x5C";  //NV
const Tikkana_consnt_DDHA    = "\x5D";  //NV
const Tikkana_consnt_NNA     = "\x5E";  //NV

const Tikkana_consnt_TA      = "\x5F";  //NV
const Tikkana_consnt_THA     = "\x61";  //NV
const Tikkana_consnt_DA      = "\x62";  //NV
const Tikkana_consnt_DHA     = "\x63";  //NV
const Tikkana_consnt_NA      = "\x64";  //NV

const Tikkana_consnt_PA_1    = "\x65";  //NV
const Tikkana_consnt_PA_2    = "\x66";  //NV
const Tikkana_consnt_PHA_1   = "\x67";  //NV
const Tikkana_consnt_PHA_2   = "\x68";  //NV
const Tikkana_consnt_BA_1    = "\x69";  //NV
const Tikkana_consnt_BA_2    = "\x6A";
const Tikkana_consnt_BHA     = "\x6B";  //NV
const Tikkana_consnt_MA      = "\x70\xC2\xA8"; //NV

const Tikkana_consnt_YA      = "\x6C\xC2\xA8";  //NY
const Tikkana_consnt_RA      = "\x6D";  //NV
const Tikkana_consnt_LA_1    = "\x6E";  //NV
const Tikkana_consnt_LA_2    = "\x6F";  //NV
const Tikkana_consnt_VA      = "\x70";  //NV    
const Tikkana_consnt_SHA     = "\x71";  //NV
const Tikkana_consnt_SSA_1   = "\x72";  //NV
const Tikkana_consnt_SSA_2   = "\x73";  //NV
const Tikkana_consnt_SA_1    = "\x74";  //NV
const Tikkana_consnt_SA_2    = "\x75";               
const Tikkana_consnt_HA      = "\x76";  //NV
const Tikkana_consnt_LLA     = "\x77";  //NV
const Tikkana_conjct_KSHA    = "\x78";  //NV
const Tikkana_consnt_RRA     = "\x79";  //NV

//Gunintamulu
const Tikkana_vowelsn_AA_1   = "\x7C";  //NV
const Tikkana_vowelsn_AA_2   = "\x7D";  //NV
const Tikkana_vowelsn_I_1    = "\x7E";  //NV
const Tikkana_vowelsn_I_2    = "\xC2\xA1";               
const Tikkana_vowelsn_I_3    = "\xC2\xA2";  //NV
const Tikkana_vowelsn_II_1   = "\xC2\xA3";  //NV
const Tikkana_vowelsn_II_2   = "\xC2\xA4";
const Tikkana_vowelsn_II_3   = "\xC2\xA5";  //NV
const Tikkana_vowelsn_U_1    = "\xC2\xA6";               
const Tikkana_vowelsn_U_2    = "\xC2\xA7";               
const Tikkana_vowelsn_U_3    = "\xC2\xA8";  //NV
const Tikkana_vowelsn_UU_1   = "\xC2\xA9";  //NV
const Tikkana_vowelsn_UU_2   = "\xC2\xAA";  //NV
const Tikkana_vowelsn_UU_3   = "\xC2\xAB";
const Tikkana_vowelsn_UU_4   = "\xC2\xA8\x7C";
const Tikkana_vowelsn_R      = "\xC2\xAC";  //NV
const Tikkana_vowelsn_Ru     = "\xC2\xAE";               
const Tikkana_vowelsn_Alu    = "\xC2\xB0";               
const Tikkana_vowelsn_E_1    = "\xC2\xB1";  //NV
const Tikkana_vowelsn_E_2    = "\xC2\xB2";  //NV
const Tikkana_vowelsn_E_3    = "\xC2\xB3";               
const Tikkana_vowelsn_EE_1   = "\xC2\xB5";               
const Tikkana_vowelsn_EE_2   = "\xC2\xB6";  //NV
const Tikkana_vowelsn_EE_3   = "\xC2\xB7";               
//const Tikkana_vowelsn_AI_1   = "\xC2\xB9";
//const Tikkana_vowelsn_AI_2   = "\xC2\xBA";
const Tikkana_vowelsn_O_1    = "\xC2\xBB";               
const Tikkana_vowelsn_O_2    = "\xC2\xBC"; //NV
const Tikkana_vowelsn_OO_1   = "\xC2\xBD"; //NV
const Tikkana_vowelsn_OO_2   = "\xC2\xBE"; //NV
const Tikkana_vowelsn_AU_1   = "\xC2\xBF";
const Tikkana_vowelsn_AU_2   = "\xC3\x80";

const Tikkana_vowelsn_AILEN_1   = "\xC2\xB9";
const Tikkana_vowelsn_AILEN_2   = "\xC2\xBA";

//Special Combinations
const Tikkana_combo_CI       = "\xC3\xA7";  //NV
const Tikkana_combo_CII      = "\xC3\xA8";
const Tikkana_combo_CHI      = "\xC3\xA9";
const Tikkana_combo_CHII     = "\xC3\xAA";
const Tikkana_combo_JI       = "\xC3\xAB";  //NV
const Tikkana_combo_JII      = "\xC3\xAC";               
const Tikkana_combo_JU       = "\xC3\xAD";
const Tikkana_combo_JUU       = "\xC3\xAD\x7C";

const Tikkana_combo_TI       = "\xC3\xAE";  //NV
const Tikkana_combo_TII      = "\xC3\xAF";
const Tikkana_combo_NI       = "\xC3\xB0";  //NV
const Tikkana_combo_NII      = "\xC3\xB1";
const Tikkana_combo_BI       = "\xC3\xB2";               
const Tikkana_combo_BII      = "\xC3\xB3";
const Tikkana_combo_BHI      = "\xC3\xB4";         
const Tikkana_combo_BHII     = "\xC3\xB5";         
const Tikkana_combo_LI       = "\xC3\xB6";               
const Tikkana_combo_LII      = "\xC3\xB7";               
const Tikkana_combo_VI       = "\xC3\xB8";               
const Tikkana_combo_VII      = "\xC3\xB9";               
const Tikkana_combo_SHI      = "\xC3\xBA";  //NV
const Tikkana_combo_SHII     = "\xC3\xBB";  //NV
const Tikkana_combo_HAA      = "\xC3\xBC";  //NV
const Tikkana_combo_LLI      = "\xC3\xBD";
const Tikkana_combo_LLII     = "\xC3\xBE";               

const Tikkana_combo_MI       = "\xC3\xB8\xC2\xA8";
const Tikkana_combo_MII      = "\xC3\xB9\xC2\xA8";
const Tikkana_combo_MU       = "\x70\xC2\xA8\xC2\xA8";
const Tikkana_combo_MUU      = "\x70\xC2\xA8\xC2\xA8\xC2\xA9";
const Tikkana_combo_ME       = "\x70\xC2\xB2\xC2\xA8";
const Tikkana_combo_MEE      = "\x70\xC2\xB6\xC2\xA8";
const Tikkana_combo_MAI      = "\xC2\xB9\x70\xC2\xB2\xC2\xA8";
const Tikkana_combo_MO       = "\x70\xC2\xB2\xC2\xA8\xC2\xA8";
const Tikkana_combo_MOO      = "\x70\xC2\xB2\xC2\xA9";
const Tikkana_combo_MAU      = "\x70\xC2\xA8\xC3\x80";
const Tikkana_combo_MPOLLU   = "\x70\x2B\xC2\xA8";


const Tikkana_combo_YA_STEM  = "\x6C"; // Not included in the lookup table
const Tikkana_combo_YU       = "\x6C\xC2\xA8\xC2\xA8";
const Tikkana_combo_YUU      = "\x6C\xC2\xA8\xC2\xA8\xC2\xA9";
const Tikkana_combo_YE       = "\x6C\xC2\xB2\xC2\xA8";
const Tikkana_combo_YEE      = "\x6C\xC2\xB6\xC2\xA8";
const Tikkana_combo_YAI      = "\xC2\xB9\x6C\xC2\xB2\xC2\xA8";
const Tikkana_combo_YO       = "\x6C\xC2\xB2\xC2\xA8\xC2\xA8";
const Tikkana_combo_YOO      = "\x6C\xC2\xB2\xC2\xA9";  //NV
const Tikkana_combo_YAU      = "\x6C\xC2\xA8\xC3\x80";
const Tikkana_combo_YPOLLU   = "\x6C\x2B\xC2\xA8";

const Tikkana_combo_GHOO   = "\xC2\xB1\x52\xC2\xA8\x7C";

//Vattulu
const Tikkana_vattu_KA       = "\xC3\x81";  //NV
const Tikkana_vattu_KHA      = "\xC3\x82";
const Tikkana_vattu_GA       = "\xC3\x83"; //KS
const Tikkana_vattu_GHA      = "\xC3\x84"; //
const Tikkana_vattu_NGA      = "\xC3\x85"; //KS             
const Tikkana_vattu_CA       = "\xC3\x86"; //             
const Tikkana_vattu_CHA      = "\xC3\x87";               
const Tikkana_vattu_JA       = "\xC3\x88";
const Tikkana_vattu_JHA      = "\xC3\x89";
const Tikkana_vattu_NYA      = "\xC3\x8A"; //KS

const Tikkana_vattu_TTA      = "\xC3\x8B";  //NV
const Tikkana_vattu_TTHA     = "\xC3\x8C"; //             
const Tikkana_vattu_DDA      = "\xC3\x8D"; //             
const Tikkana_vattu_DDHA     = "\xC3\x8E";              
const Tikkana_vattu_NNA      = "\xC3\x8F";  //NV

const Tikkana_vattu_TA       = "\xC3\x90";  //NV
const Tikkana_vattu_THA      = "\xC3\x91";
const Tikkana_vattu_DA       = "\xC3\x92";  //NV
const Tikkana_vattu_DHA      = "\xC3\x93";  //KS      
const Tikkana_vattu_NA       = "\xC3\x94"; //KS              

const Tikkana_vattu_PA       = "\xC3\x95";              
const Tikkana_vattu_PHA      = "\xC3\x96";               
const Tikkana_vattu_BA       = "\xC3\x97";               
const Tikkana_vattu_BHA      = "\xC3\x98";         
const Tikkana_vattu_MA       = "\xC3\x99";               

const Tikkana_vattu_YA       = "\xC3\x9A";  //NV
const Tikkana_vattu_RA_1     = "\xC3\x9B";  //NV
const Tikkana_vattu_RA_2     = "\xC3\x9C";               
const Tikkana_vattu_RA_3     = "\xC3\x9D";               
const Tikkana_vattu_LA       = "\xC3\x9E";  //NV
const Tikkana_vattu_VA       = "\xC3\x9F";  //KS            
const Tikkana_vattu_SHA      = "\xC3\xA0";               
const Tikkana_vattu_SSA      = "\xC3\xA1";                
const Tikkana_vattu_SA       = "\xC3\xA2";  //NV
const Tikkana_vattu_HA       = "\xC3\xA3";
const Tikkana_vattu_LLA      = "\xC3\xA4";
const Tikkana_vattu_RRA      = "\xC3\xA6";

//Conjuncts
const Tikkana_vattu_KSHA     = "\xC3\xA5";
const Tikkana_vattu_TRA      = "\x23";
const Tikkana_vattu_TAI      = "\x24";
const Tikkana_vattu_TLA      = "\x25";
const Tikkana_vattu_NGGA     = "\x26";

//Miscellaneous (punctuation etc)
const Tikkana_misc_EXCLAM    = "\x21";
const Tikkana_misc_DIVIDE    = "\x23";
const Tikkana_misc_MULTIPLY  = "\x24";
const Tikkana_misc_QTSINGLE  = "\x27";
const Tikkana_misc_PARENLEFT = "\x28";
const Tikkana_misc_PARENRIGT = "\x29";
const Tikkana_misc_COMMA     = "\x2C";
const Tikkana_misc_HYPHEN    = "\x2D";   //I don't know what the significance is, shows up as '-' on Linux, not displayed on Windows in Firefox
const Tikkana_misc_PERIOD    = "\x2E";
const Tikkana_misc_SLASH     = "\x2F";
const Tikkana_misc_COLON     = "\x3A";
const Tikkana_misc_SEMICOLON = "\x3B";
const Tikkana_misc_QUESTION  = "\x3F";
const Tikkana_misc_PIPE      = "\x49";
const Tikkana_misc_ASTERISK  = "\x5B";
const Tikkana_misc_PERCENT   = "\x5D";

const Tikkana_misc_TICK_1    = "\x7A";  //NV
const Tikkana_misc_TICK_2    = "\x7B";  //NV
const Tikkana_misc_TICK_3    = "\xC5\x92";               

const Tikkana_danda          = "\xC2\xB4";
const Tikkana_misc_vattu     = "\xC2\xB5";
const Tikkana_danda_1          = "\xC2\xB6";
}

$Tikkana_toPadma = array();
$Tikkana_toPadma[Tikkana::Tikkana_candrabindu] = Padma::Padma_candrabindu;
$Tikkana_toPadma[Tikkana::Tikkana_visarga]  = Padma::Padma_visarga;
$Tikkana_toPadma[Tikkana::Tikkana_virama_1] = Padma::Padma_syllbreak;
$Tikkana_toPadma[Tikkana::Tikkana_virama_2] = Padma::Padma_syllbreak;
$Tikkana_toPadma[Tikkana::Tikkana_virama_3] = Padma::Padma_syllbreak;
$Tikkana_toPadma[Tikkana::Tikkana_anusvara] = Padma::Padma_anusvara;
$Tikkana_toPadma[Tikkana::Tikkana_avagraha] = Padma::Padma_avagraha;

$Tikkana_toPadma[Tikkana::Tikkana_vowel_A] = Padma::Padma_vowel_A;
$Tikkana_toPadma[Tikkana::Tikkana_vowel_AA] = Padma::Padma_vowel_AA;
$Tikkana_toPadma[Tikkana::Tikkana_vowel_I] = Padma::Padma_vowel_I;
$Tikkana_toPadma[Tikkana::Tikkana_vowel_II] = Padma::Padma_vowel_II;
$Tikkana_toPadma[Tikkana::Tikkana_vowel_U] = Padma::Padma_vowel_U;
$Tikkana_toPadma[Tikkana::Tikkana_vowel_UU] = Padma::Padma_vowel_UU;
$Tikkana_toPadma[Tikkana::Tikkana_vowel_R] = Padma::Padma_vowel_R;
$Tikkana_toPadma[Tikkana::Tikkana_vowel_RR] = Padma::Padma_vowel_RR;
$Tikkana_toPadma[Tikkana::Tikkana_vowel_L] = Padma::Padma_vowel_L;
$Tikkana_toPadma[Tikkana::Tikkana_vowel_LL] = Padma::Padma_vowel_LL;
$Tikkana_toPadma[Tikkana::Tikkana_vowel_E] = Padma::Padma_vowel_E;
$Tikkana_toPadma[Tikkana::Tikkana_vowel_EE] = Padma::Padma_vowel_EE;
$Tikkana_toPadma[Tikkana::Tikkana_vowel_AI] = Padma::Padma_vowel_AI;
$Tikkana_toPadma[Tikkana::Tikkana_vowel_O] = Padma::Padma_vowel_O;
$Tikkana_toPadma[Tikkana::Tikkana_vowel_OO] = Padma::Padma_vowel_OO;
$Tikkana_toPadma[Tikkana::Tikkana_vowel_AU] = Padma::Padma_vowel_AU;

$Tikkana_toPadma[Tikkana::Tikkana_consnt_KA] = Padma::Padma_consnt_KA;
$Tikkana_toPadma[Tikkana::Tikkana_consnt_KHA_1] = Padma::Padma_consnt_KHA;
$Tikkana_toPadma[Tikkana::Tikkana_consnt_KHA_2] = Padma::Padma_consnt_KHA;
$Tikkana_toPadma[Tikkana::Tikkana_consnt_GA] = Padma::Padma_consnt_GA;
$Tikkana_toPadma[Tikkana::Tikkana_consnt_GHA] = Padma::Padma_consnt_GHA;
$Tikkana_toPadma[Tikkana::Tikkana_consnt_NGA] = Padma::Padma_consnt_NGA;

$Tikkana_toPadma[Tikkana::Tikkana_consnt_CA]  = Padma::Padma_consnt_CA;
$Tikkana_toPadma[Tikkana::Tikkana_consnt_TSA] = Padma::Padma_consnt_TSA;
$Tikkana_toPadma[Tikkana::Tikkana_consnt_CHA] = Padma::Padma_consnt_CHA;
$Tikkana_toPadma[Tikkana::Tikkana_consnt_JA_1] = Padma::Padma_consnt_JA;
$Tikkana_toPadma[Tikkana::Tikkana_consnt_JA_2] = Padma::Padma_consnt_JA;
$Tikkana_toPadma[Tikkana::Tikkana_consnt_DJA] = Padma::Padma_consnt_DJA;
$Tikkana_toPadma[Tikkana::Tikkana_consnt_JHA] = Padma::Padma_consnt_JHA;
$Tikkana_toPadma[Tikkana::Tikkana_consnt_NYA] = Padma::Padma_consnt_NYA;

$Tikkana_toPadma[Tikkana::Tikkana_consnt_TTA] = Padma::Padma_consnt_TTA;
$Tikkana_toPadma[Tikkana::Tikkana_consnt_TTHA] = Padma::Padma_consnt_TTHA;
$Tikkana_toPadma[Tikkana::Tikkana_consnt_DDA] = Padma::Padma_consnt_DDA;
$Tikkana_toPadma[Tikkana::Tikkana_consnt_DDHA] = Padma::Padma_consnt_DDHA;
$Tikkana_toPadma[Tikkana::Tikkana_consnt_NNA] = Padma::Padma_consnt_NNA;

$Tikkana_toPadma[Tikkana::Tikkana_consnt_TA] = Padma::Padma_consnt_TA;
$Tikkana_toPadma[Tikkana::Tikkana_consnt_THA] = Padma::Padma_consnt_THA;
$Tikkana_toPadma[Tikkana::Tikkana_consnt_DA] = Padma::Padma_consnt_DA;
$Tikkana_toPadma[Tikkana::Tikkana_consnt_DHA] = Padma::Padma_consnt_DHA;
$Tikkana_toPadma[Tikkana::Tikkana_consnt_NA] = Padma::Padma_consnt_NA;

$Tikkana_toPadma[Tikkana::Tikkana_consnt_PA_1] = Padma::Padma_consnt_PA;
$Tikkana_toPadma[Tikkana::Tikkana_consnt_PA_2] = Padma::Padma_consnt_PA;
$Tikkana_toPadma[Tikkana::Tikkana_consnt_PHA_1]  = Padma::Padma_consnt_PHA;
$Tikkana_toPadma[Tikkana::Tikkana_consnt_PHA_2]  = Padma::Padma_consnt_PHA;
$Tikkana_toPadma[Tikkana::Tikkana_consnt_BA_1] = Padma::Padma_consnt_BA;
$Tikkana_toPadma[Tikkana::Tikkana_consnt_BA_2] = Padma::Padma_consnt_BA;
$Tikkana_toPadma[Tikkana::Tikkana_consnt_BHA]  = Padma::Padma_consnt_BHA;
$Tikkana_toPadma[Tikkana::Tikkana_consnt_MA] = Padma::Padma_consnt_MA;

$Tikkana_toPadma[Tikkana::Tikkana_consnt_YA] = Padma::Padma_consnt_YA;
$Tikkana_toPadma[Tikkana::Tikkana_consnt_RA] = Padma::Padma_consnt_RA;
$Tikkana_toPadma[Tikkana::Tikkana_consnt_LA_1] = Padma::Padma_consnt_LA;
$Tikkana_toPadma[Tikkana::Tikkana_consnt_LA_2] = Padma::Padma_consnt_LA;
$Tikkana_toPadma[Tikkana::Tikkana_consnt_VA] = Padma::Padma_consnt_VA;
$Tikkana_toPadma[Tikkana::Tikkana_consnt_SHA] = Padma::Padma_consnt_SHA;
$Tikkana_toPadma[Tikkana::Tikkana_consnt_SSA_1] = Padma::Padma_consnt_SSA;
$Tikkana_toPadma[Tikkana::Tikkana_consnt_SSA_2] = Padma::Padma_consnt_SSA;
$Tikkana_toPadma[Tikkana::Tikkana_consnt_SA_1] = Padma::Padma_consnt_SA;
$Tikkana_toPadma[Tikkana::Tikkana_consnt_SA_2] = Padma::Padma_consnt_SA;

$Tikkana_toPadma[Tikkana::Tikkana_consnt_HA] = Padma::Padma_consnt_HA;
$Tikkana_toPadma[Tikkana::Tikkana_consnt_LLA] = Padma::Padma_consnt_LLA;
$Tikkana_toPadma[Tikkana::Tikkana_consnt_RRA] = Padma::Padma_consnt_RRA;
$Tikkana_toPadma[Tikkana::Tikkana_conjct_KSHA] = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA;;

//Gunintamulu
$Tikkana_toPadma[Tikkana::Tikkana_vowelsn_AA_1]  = Padma::Padma_vowelsn_AA;
$Tikkana_toPadma[Tikkana::Tikkana_vowelsn_AA_2]  = Padma::Padma_vowelsn_AA;
$Tikkana_toPadma[Tikkana::Tikkana_vowelsn_I_1]   = Padma::Padma_vowelsn_I;
$Tikkana_toPadma[Tikkana::Tikkana_vowelsn_I_2]   = Padma::Padma_vowelsn_I;
$Tikkana_toPadma[Tikkana::Tikkana_vowelsn_I_3]   = Padma::Padma_vowelsn_I;
$Tikkana_toPadma[Tikkana::Tikkana_vowelsn_II_1]  = Padma::Padma_vowelsn_II;
$Tikkana_toPadma[Tikkana::Tikkana_vowelsn_II_2]  = Padma::Padma_vowelsn_II;
$Tikkana_toPadma[Tikkana::Tikkana_vowelsn_II_3]  = Padma::Padma_vowelsn_II;
$Tikkana_toPadma[Tikkana::Tikkana_vowelsn_U_1]   = Padma::Padma_vowelsn_U;
$Tikkana_toPadma[Tikkana::Tikkana_vowelsn_U_2]   = Padma::Padma_vowelsn_U;
$Tikkana_toPadma[Tikkana::Tikkana_vowelsn_U_3]   = Padma::Padma_vowelsn_U;
$Tikkana_toPadma[Tikkana::Tikkana_vowelsn_UU_1]  = Padma::Padma_vowelsn_UU;
$Tikkana_toPadma[Tikkana::Tikkana_vowelsn_UU_2]  = Padma::Padma_vowelsn_UU;
$Tikkana_toPadma[Tikkana::Tikkana_vowelsn_UU_3]  = Padma::Padma_vowelsn_UU;
$Tikkana_toPadma[Tikkana::Tikkana_vowelsn_UU_4]  = Padma::Padma_vowelsn_UU;
$Tikkana_toPadma[Tikkana::Tikkana_vowelsn_R]     = Padma::Padma_vowelsn_R;
$Tikkana_toPadma[Tikkana::Tikkana_vowelsn_Ru]    = Padma::Padma_vowelsn_RR;
$Tikkana_toPadma[Tikkana::Tikkana_vowelsn_E_1]   = Padma::Padma_vowelsn_E;
$Tikkana_toPadma[Tikkana::Tikkana_vowelsn_E_2]   = Padma::Padma_vowelsn_E;
$Tikkana_toPadma[Tikkana::Tikkana_vowelsn_E_3]   = Padma::Padma_vowelsn_E;
$Tikkana_toPadma[Tikkana::Tikkana_vowelsn_EE_1]  = Padma::Padma_vowelsn_EE;
$Tikkana_toPadma[Tikkana::Tikkana_vowelsn_EE_2]  = Padma::Padma_vowelsn_EE;
$Tikkana_toPadma[Tikkana::Tikkana_vowelsn_EE_3]  = Padma::Padma_vowelsn_EE;
$Tikkana_toPadma[Tikkana::Tikkana_vowelsn_AILEN_1]    = Padma::Padma_vowelsn_AILEN;
$Tikkana_toPadma[Tikkana::Tikkana_vowelsn_AILEN_2]    = Padma::Padma_vowelsn_AILEN;
$Tikkana_toPadma[Tikkana::Tikkana_vowelsn_O_1]   = Padma::Padma_vowelsn_O;
$Tikkana_toPadma[Tikkana::Tikkana_vowelsn_O_2]   = Padma::Padma_vowelsn_O;
$Tikkana_toPadma[Tikkana::Tikkana_vowelsn_OO_1]  = Padma::Padma_vowelsn_OO;
$Tikkana_toPadma[Tikkana::Tikkana_vowelsn_OO_2]  = Padma::Padma_vowelsn_OO;
$Tikkana_toPadma[Tikkana::Tikkana_vowelsn_AU_1]  = Padma::Padma_vowelsn_AU;
$Tikkana_toPadma[Tikkana::Tikkana_vowelsn_AU_2]  = Padma::Padma_vowelsn_AU;
$Tikkana_toPadma[Tikkana::Tikkana_vowelsn_Alu]   = Padma::Padma_vowelsn_L;

//Special Combinations
$Tikkana_toPadma[Tikkana::Tikkana_combo_CI]      = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_I;
$Tikkana_toPadma[Tikkana::Tikkana_combo_CII]     = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_II;
$Tikkana_toPadma[Tikkana::Tikkana_combo_CHI]      = Padma::Padma_consnt_CHA . Padma::Padma_vowelsn_I;
$Tikkana_toPadma[Tikkana::Tikkana_combo_CHII]     = Padma::Padma_consnt_CHA . Padma::Padma_vowelsn_II;
$Tikkana_toPadma[Tikkana::Tikkana_combo_JI]      = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_I;
$Tikkana_toPadma[Tikkana::Tikkana_combo_JII]     = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_II;
$Tikkana_toPadma[Tikkana::Tikkana_combo_JU]      = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_U;
$Tikkana_toPadma[Tikkana::Tikkana_combo_JUU]      = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_UU;

$Tikkana_toPadma[Tikkana::Tikkana_combo_TI]      = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_I;
$Tikkana_toPadma[Tikkana::Tikkana_combo_TII]     = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_II;
$Tikkana_toPadma[Tikkana::Tikkana_combo_NI]      = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_I;
$Tikkana_toPadma[Tikkana::Tikkana_combo_NII]     = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_II;

$Tikkana_toPadma[Tikkana::Tikkana_combo_BI]      = Padma::Padma_consnt_BA . Padma::Padma_vowelsn_I;
$Tikkana_toPadma[Tikkana::Tikkana_combo_BII]     = Padma::Padma_consnt_BA . Padma::Padma_vowelsn_II;
$Tikkana_toPadma[Tikkana::Tikkana_combo_BHI]     = Padma::Padma_consnt_BHA . Padma::Padma_vowelsn_I;
$Tikkana_toPadma[Tikkana::Tikkana_combo_BHII]     = Padma::Padma_consnt_BHA . Padma::Padma_vowelsn_II;
$Tikkana_toPadma[Tikkana::Tikkana_combo_MI]      = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_I;
$Tikkana_toPadma[Tikkana::Tikkana_combo_MII]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_II;
$Tikkana_toPadma[Tikkana::Tikkana_combo_MU]      = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_U;
$Tikkana_toPadma[Tikkana::Tikkana_combo_MUU]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_UU;
$Tikkana_toPadma[Tikkana::Tikkana_combo_ME]      = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_E;
$Tikkana_toPadma[Tikkana::Tikkana_combo_MEE]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_EE;
$Tikkana_toPadma[Tikkana::Tikkana_combo_MAI]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_AI;
$Tikkana_toPadma[Tikkana::Tikkana_combo_MO]      = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_O;
$Tikkana_toPadma[Tikkana::Tikkana_combo_MOO]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_OO;
$Tikkana_toPadma[Tikkana::Tikkana_combo_MAU]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_AU;
$Tikkana_toPadma[Tikkana::Tikkana_combo_MPOLLU]  = Padma::Padma_consnt_MA . Padma::Padma_syllbreak;

$Tikkana_toPadma[Tikkana::Tikkana_combo_YE]     = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_E;
$Tikkana_toPadma[Tikkana::Tikkana_combo_YEE]     = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_EE;
$Tikkana_toPadma[Tikkana::Tikkana_combo_YOO]     = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_OO;
$Tikkana_toPadma[Tikkana::Tikkana_combo_YPOLLU]  = Padma::Padma_consnt_YA . Padma::Padma_syllbreak;
$Tikkana_toPadma[Tikkana::Tikkana_combo_LI]      = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_I;
$Tikkana_toPadma[Tikkana::Tikkana_combo_LII]     = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_II;
$Tikkana_toPadma[Tikkana::Tikkana_combo_VI]      = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_I;
$Tikkana_toPadma[Tikkana::Tikkana_combo_VII]     = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_II;
$Tikkana_toPadma[Tikkana::Tikkana_combo_SHI]     = Padma::Padma_consnt_SHA . Padma::Padma_vowelsn_I;
$Tikkana_toPadma[Tikkana::Tikkana_combo_SHII]    = Padma::Padma_consnt_SHA . Padma::Padma_vowelsn_II;
$Tikkana_toPadma[Tikkana::Tikkana_combo_HAA]     = Padma::Padma_consnt_HA . Padma::Padma_vowelsn_AA;
$Tikkana_toPadma[Tikkana::Tikkana_combo_LLI]     = Padma::Padma_consnt_LLA . Padma::Padma_vowelsn_I;
$Tikkana_toPadma[Tikkana::Tikkana_combo_LLII]    = Padma::Padma_consnt_LLA . Padma::Padma_vowelsn_II;

$Tikkana_toPadma[Tikkana::Tikkana_combo_GHOO]    = Padma::Padma_consnt_GHA . Padma::Padma_vowelsn_OO;

//$Tikkana_toPadma[Tikkana::Tikkana_combo_SHRII]   = Padma::Padma_consnt_SHA . Padma::Padma_vattu_RA . Padma::Padma_vowelsn_II;

//Vattulu
$Tikkana_toPadma[Tikkana::Tikkana_vattu_KA]      = Padma::Padma_vattu_KA;
$Tikkana_toPadma[Tikkana::Tikkana_vattu_KHA]     = Padma::Padma_vattu_KHA;
$Tikkana_toPadma[Tikkana::Tikkana_vattu_GA]      = Padma::Padma_vattu_GA;
$Tikkana_toPadma[Tikkana::Tikkana_vattu_GHA]     = Padma::Padma_vattu_GHA;
$Tikkana_toPadma[Tikkana::Tikkana_vattu_NGA]     = Padma::Padma_vattu_NGA;
$Tikkana_toPadma[Tikkana::Tikkana_vattu_CA]      = Padma::Padma_vattu_CA;
$Tikkana_toPadma[Tikkana::Tikkana_vattu_CHA]     = Padma::Padma_vattu_CHA;
$Tikkana_toPadma[Tikkana::Tikkana_vattu_JA]      = Padma::Padma_vattu_JA;
$Tikkana_toPadma[Tikkana::Tikkana_vattu_JHA]     = Padma::Padma_vattu_JHA;
$Tikkana_toPadma[Tikkana::Tikkana_vattu_NYA]     = Padma::Padma_vattu_NYA;
$Tikkana_toPadma[Tikkana::Tikkana_vattu_TTA]     = Padma::Padma_vattu_TTA;
$Tikkana_toPadma[Tikkana::Tikkana_vattu_TTHA]    = Padma::Padma_vattu_TTHA;
$Tikkana_toPadma[Tikkana::Tikkana_vattu_DDA]     = Padma::Padma_vattu_DDA;
$Tikkana_toPadma[Tikkana::Tikkana_vattu_DDHA]    = Padma::Padma_vattu_DDHA;
$Tikkana_toPadma[Tikkana::Tikkana_vattu_NNA]     = Padma::Padma_vattu_NNA;
$Tikkana_toPadma[Tikkana::Tikkana_vattu_TA]      = Padma::Padma_vattu_TA;
$Tikkana_toPadma[Tikkana::Tikkana_vattu_THA]     = Padma::Padma_vattu_THA;
$Tikkana_toPadma[Tikkana::Tikkana_vattu_DA]      = Padma::Padma_vattu_DA;
$Tikkana_toPadma[Tikkana::Tikkana_vattu_DHA]     = Padma::Padma_vattu_DHA;
$Tikkana_toPadma[Tikkana::Tikkana_vattu_NA]      = Padma::Padma_vattu_NA;
$Tikkana_toPadma[Tikkana::Tikkana_vattu_PA]      = Padma::Padma_vattu_PA;
$Tikkana_toPadma[Tikkana::Tikkana_vattu_PHA]     = Padma::Padma_vattu_PHA;
$Tikkana_toPadma[Tikkana::Tikkana_vattu_BA]      = Padma::Padma_vattu_BA;
$Tikkana_toPadma[Tikkana::Tikkana_vattu_BHA]     = Padma::Padma_vattu_BHA;
$Tikkana_toPadma[Tikkana::Tikkana_vattu_MA]      = Padma::Padma_vattu_MA;
$Tikkana_toPadma[Tikkana::Tikkana_vattu_YA]      = Padma::Padma_vattu_YA;
$Tikkana_toPadma[Tikkana::Tikkana_vattu_RA_1]    = Padma::Padma_vattu_RA;
$Tikkana_toPadma[Tikkana::Tikkana_vattu_RA_2]    = Padma::Padma_vattu_RA;
$Tikkana_toPadma[Tikkana::Tikkana_vattu_RA_3]    = Padma::Padma_vattu_RA;
$Tikkana_toPadma[Tikkana::Tikkana_vattu_LA]      = Padma::Padma_vattu_LA;
$Tikkana_toPadma[Tikkana::Tikkana_vattu_VA]      = Padma::Padma_vattu_VA;
$Tikkana_toPadma[Tikkana::Tikkana_vattu_SHA]     = Padma::Padma_vattu_SHA;
$Tikkana_toPadma[Tikkana::Tikkana_vattu_SSA]     = Padma::Padma_vattu_SSA;
$Tikkana_toPadma[Tikkana::Tikkana_vattu_SA]      = Padma::Padma_vattu_SA;
$Tikkana_toPadma[Tikkana::Tikkana_vattu_HA]      = Padma::Padma_vattu_HA;
$Tikkana_toPadma[Tikkana::Tikkana_vattu_LLA]     = Padma::Padma_vattu_LLA;
$Tikkana_toPadma[Tikkana::Tikkana_vattu_RRA]     = Padma::Padma_vattu_RRA;

//Conjuncts
$Tikkana_toPadma[Tikkana::Tikkana_vattu_KSHA]    = Padma::Padma_vattu_KA . Padma:: Padma_vattu_SSA;
$Tikkana_toPadma[Tikkana::Tikkana_vattu_TRA]     = Padma::Padma_vattu_TA . Padma::Padma_vattu_RA;
$Tikkana_toPadma[Tikkana::Tikkana_vattu_TAI]     = Padma::Padma_vattu_TA . Padma:: Padma_vowelsn_AILEN;
$Tikkana_toPadma[Tikkana::Tikkana_vattu_TLA]     = Padma::Padma_vattu_TA . Padma:: Padma_vattu_LA;;
$Tikkana_toPadma[Tikkana::Tikkana_vattu_NGGA]    = Padma::Padma_vattu_NGA . Padma::Padma_vattu_GA;

$Tikkana_redundantList = array();
$Tikkana_redundantList[Tikkana::Tikkana_misc_TICK_1] = true;
$Tikkana_redundantList[Tikkana::Tikkana_misc_TICK_2] = true;
$Tikkana_redundantList[Tikkana::Tikkana_misc_TICK_3] = true;
$Tikkana_redundantList[Tikkana::Tikkana_misc_HYPHEN] = true;

$Tikkana_prefixList = array();

// Prefix non-vattu symbols
$Tikkana_prefixList[Tikkana::Tikkana_vowelsn_I_1]  = true;
$Tikkana_prefixList[Tikkana::Tikkana_vowelsn_II_1] = true;
$Tikkana_prefixList[Tikkana::Tikkana_vowelsn_E_1]  = true;
$Tikkana_prefixList[Tikkana::Tikkana_vowelsn_EE_1] = true;
$Tikkana_prefixList[Tikkana::Tikkana_vowelsn_AILEN_1] = true;
$Tikkana_prefixList[Tikkana::Tikkana_vowelsn_AILEN_2] = true;
$Tikkana_prefixList[Tikkana::Tikkana_virama_1]     = true;

//Prefix vattulu
$Tikkana_prefixList[Tikkana::Tikkana_vattu_KHA]    = true;
$Tikkana_prefixList[Tikkana::Tikkana_vattu_GA]     = true;
$Tikkana_prefixList[Tikkana::Tikkana_vattu_GHA]    = true;
$Tikkana_prefixList[Tikkana::Tikkana_vattu_NGA]    = true;
$Tikkana_prefixList[Tikkana::Tikkana_vattu_JA]     = true;
$Tikkana_prefixList[Tikkana::Tikkana_vattu_JHA]    = true;
$Tikkana_prefixList[Tikkana::Tikkana_vattu_NYA]    = true;
$Tikkana_prefixList[Tikkana::Tikkana_vattu_TTA]    = true;
$Tikkana_prefixList[Tikkana::Tikkana_vattu_TTHA]   = true;
$Tikkana_prefixList[Tikkana::Tikkana_vattu_DDA]    = true;
$Tikkana_prefixList[Tikkana::Tikkana_vattu_DDHA]   = true;
$Tikkana_prefixList[Tikkana::Tikkana_vattu_NNA]    = true;
$Tikkana_prefixList[Tikkana::Tikkana_vattu_TA]     = true;
$Tikkana_prefixList[Tikkana::Tikkana_vattu_THA]    = true;
$Tikkana_prefixList[Tikkana::Tikkana_vattu_DA]     = true;
$Tikkana_prefixList[Tikkana::Tikkana_vattu_DHA]    = true;
$Tikkana_prefixList[Tikkana::Tikkana_vattu_RA_1]   = true;
$Tikkana_prefixList[Tikkana::Tikkana_vattu_RA_2]   = true;
$Tikkana_prefixList[Tikkana::Tikkana_vattu_LA]     = true;
$Tikkana_prefixList[Tikkana::Tikkana_vattu_SSA]    = true;
$Tikkana_prefixList[Tikkana::Tikkana_vattu_SSA]    = true;
$Tikkana_prefixList[Tikkana::Tikkana_vattu_HA]     = true;
$Tikkana_prefixList[Tikkana::Tikkana_vattu_KSHA]   = true;
$Tikkana_prefixList[Tikkana::Tikkana_vattu_RRA]    = true;
$Tikkana_prefixList[Tikkana::Tikkana_vattu_TRA]    = true; //KS


$Tikkana_overloadList = array();
$Tikkana_overloadList[Tikkana::Tikkana_vowel_R]   = true;
$Tikkana_overloadList[Tikkana::Tikkana_vowel_L]   = true;
$Tikkana_overloadList[Tikkana::Tikkana_consnt_RA] = true;
$Tikkana_overloadList[Tikkana::Tikkana_consnt_VA] = true;
$Tikkana_overloadList[Tikkana::Tikkana_combo_VI]  = true;
$Tikkana_overloadList[Tikkana::Tikkana_combo_VII] = true;
$Tikkana_overloadList[Tikkana::Tikkana_combo_ME]  = true;
$Tikkana_overloadList["\x6C"]          = true;
$Tikkana_overloadList["\x70\xC2\xB2"]    = true;
 //ve vs me
$Tikkana_overloadList["\x70\xC2\xB6"]    = true;
 //vE vs mE
$Tikkana_overloadList["\x70\x2B"]    = true;
 // v^ vs m^
$Tikkana_overloadList["\x6C\xC2\xB2"]    = true;
 //
$Tikkana_overloadList["\x6C\xC2\xB6"]    = true;
$Tikkana_overloadList["\x6C\x2B"]    = true;
$Tikkana_overloadList[Tikkana::Tikkana_combo_JU]    = true;
$Tikkana_overloadList[Tikkana::Tikkana_vowelsn_U_3]    = true;
$Tikkana_overloadList[Tikkana::Tikkana_misc_COLON] = true;

function Tikkana_initialize()
{
    global $fontinfo;

    $fontinfo["tikkana"]["language"] = "Telugu";
    $fontinfo["tikkana"]["class"] = "Tikkana";
}
?>
