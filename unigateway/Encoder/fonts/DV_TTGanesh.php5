<?php
class DV_TTGanesh
{
function DV_TTGanesh()
{
}

//The interface every dynamic font encoding should implement
var $maxLookupLen = 3;
var $fontFace     = "DV-TTGanesh";
var $displayName  = "DV_TTGanesh";
var $script       = Padma::Padma_script_DEVANAGARI;
var $hasSuffixes  = true;

function lookup ($str) 
{
    global $DV_TTGanesh_toPadma;
    return $DV_TTGanesh_toPadma[$str];
}

function isPrefixSymbol ($str)
{
    global $DV_TTGanesh_prefixList;
    return array_key_exists($str, $DV_TTGanesh_prefixList);
}

function isSuffixSymbol ($str)
{
    global $DV_TTGanesh_suffixList;
    return array_key_exists($str, $DV_TTGanesh_suffixList);
}

function isOverloaded ($str)
{
    global $DV_TTGanesh_overloadList;
    return array_key_exists($str, $DV_TTGanesh_overloadList);
}

function handleTwoPartVowelSigns ($sign1, $sign2)
{
   if (($sign1 == Padma::Padma_vowelsn_EE && $sign2 == Padma::Padma_vowelsn_AA) ||
       ($sign1 == Padma::Padma_vowelsn_AA && $sign2 == Padma::Padma_vowelsn_EE))
        return Padma::Padma_vowelsn_OO;
    if (($sign1 == Padma::Padma_vowelsn_AI && $sign2 == Padma::Padma_vowelsn_AA) ||
        ($sign1 == Padma::Padma_vowelsn_AA && $sign2 == Padma::Padma_vowelsn_AI))
        return Padma::Padma_vowelsn_AU;
    return $sign1 . $sign2;    
}

function isRedundant ($str)
{
    global $DV_TTGanesh_redundantList;
    return array_key_exists($str, $DV_TTGanesh_redundantList);
}

//Implementation details start here

//Specials

const DV_TTGanesh_anusvara          = "\xC3\x86";
const DV_TTGanesh_candrabindu       = "\xC3\x84"; 

//Vowels

const DV_TTGanesh_vowel_SHT_A     = "\x2B\xC3\xA0";
const DV_TTGanesh_vowel_A         = "\x2B";
const DV_TTGanesh_vowel_AA        = "\x2B\xC3\x89";
const DV_TTGanesh_vowel_I         = "\x3C";
const DV_TTGanesh_vowel_II        = "\x3C\xC3\x87";
const DV_TTGanesh_vowel_U         = "\x3D";
const DV_TTGanesh_vowel_UU        = "\x3E";
const DV_TTGanesh_vowel_R         = "\x40";
const DV_TTGanesh_vowel_RR        = "\x41";
const DV_TTGanesh_vowel_EE        = "\x42";
const DV_TTGanesh_vowel_AI        = "\x42\xC3\xA4";
const DV_TTGanesh_vowel_OO        = "\x2B\xC3\x89\xC3\xA4";
const DV_TTGanesh_vowel_AU        = "\x2B\xC3\x89\xC3\xA8";
const DV_TTGanesh_vowel_CDR_E     = "\x42\xC3\xAC";
const DV_TTGanesh_vowel_CDR_O     = "\x2B\xC3\x89\xC3\xAC";
const DV_TTGanesh_vowel_E	  = "\x42\xC3\xA0";
const DV_TTGanesh_vowel_O	  = "\x2B\xC3\x89\xC3\xA0";

//Consonants

const DV_TTGanesh_consnt_KA       = "\x45";
const DV_TTGanesh_consnt_KHA      = "\x4A\xC3\x89";
const DV_TTGanesh_consnt_KHA_2    = "\x4A\x2A";
const DV_TTGanesh_consnt_GA       = "\x4D\xC3\x89";
const DV_TTGanesh_consnt_GHA      = "\x50\xC3\x89";
const DV_TTGanesh_consnt_GHA_2    = "\x50\x2A";
const DV_TTGanesh_consnt_NGA      = "\x52";

const DV_TTGanesh_consnt_CA       = "\x53\xC3\x89";
const DV_TTGanesh_consnt_CHA      = "\x55";
const DV_TTGanesh_consnt_JA       = "\x56\xC3\x89";
const DV_TTGanesh_consnt_JHA      = "\x5A\xC3\x89";
const DV_TTGanesh_consnt_NYA      = "\x5C\xC3\xA6";

const DV_TTGanesh_consnt_TTA      = "\x5D";
const DV_TTGanesh_halffm_TTA      = "\x5D\xC3\x82";
const DV_TTGanesh_consnt_TTHA     = "\x60";
const DV_TTGanesh_consnt_DDA      = "\x62";
const DV_TTGanesh_halffm_DDA      = "\x62\xC3\x82";
const DV_TTGanesh_consnt_DDHA     = "\x66";
const DV_TTGanesh_consnt_NNA      = "\x68\xC3\x89";
const DV_TTGanesh_consnt_NNA_2    = "\x68\x2A";

const DV_TTGanesh_consnt_TA       = "\x69\xC3\x89";
const DV_TTGanesh_consnt_TA_2     = "\x69\x2A";
const DV_TTGanesh_consnt_THA      = "\x6C\xC3\x89";
const DV_TTGanesh_consnt_THA_2    = "\x6C\x2A";
const DV_TTGanesh_consnt_DA       = "\x6E";
const DV_TTGanesh_halffm_DA       = "\x6E\xC3\x82";
const DV_TTGanesh_consnt_DHA      = "\x76\xC3\x89";
const DV_TTGanesh_consnt_DHA_2    = "\x76\x2A";
const DV_TTGanesh_consnt_NA       = "\x78\xC3\x89";

const DV_TTGanesh_consnt_PA       = "\x7B\xC3\x89";
const DV_TTGanesh_consnt_PHA      = "\xC2\xA1";
const DV_TTGanesh_consnt_BA       = "\xC2\xA4\xC3\x89";
const DV_TTGanesh_consnt_BHA      = "\xC2\xA6\xC3\x89";
const DV_TTGanesh_consnt_BHA_2    = "\xC2\xA6\x2A";
const DV_TTGanesh_consnt_MA       = "\xC2\xA8\xC3\x89";

const DV_TTGanesh_consnt_YA       = "\xC2\xAA\xC3\x89";
const DV_TTGanesh_consnt_RA       = "\xC2\xAE";
const DV_TTGanesh_consnt_LA       = "\xC2\xB1\xC3\x89";
const DV_TTGanesh_consnt_VA       = "\xC2\xB4\xC3\x89";
const DV_TTGanesh_consnt_SHA_1    = "\xC2\xB6\xC3\x89";
const DV_TTGanesh_consnt_SHA_2    = "\xC2\xA0\xC3\x89";
const DV_TTGanesh_consnt_SHA_3    = "\xC2\xB6\x2A";
const DV_TTGanesh_consnt_SSA      = "\xC2\xB9\xC3\x89";
const DV_TTGanesh_consnt_SSA_2    = "\xC2\xB9\x2A";
const DV_TTGanesh_consnt_SA       = "\xC2\xBA\xC3\x89";
const DV_TTGanesh_consnt_HA       = "\xC2\xBD";
const DV_TTGanesh_consnt_LLA      = "\xC2\xB3";
const DV_TTGanesh_consnt_KSHA     = "\x49\xC3\x89";
const DV_TTGanesh_consnt_KSHA_2   = "\x49\x2A";
const DV_TTGanesh_consnt_THRA     = "\x6A\xC3\x89";
const DV_TTGanesh_consnt_JHNA     = "\x59\xC3\x89";

//Gunintamulu
const DV_TTGanesh_vowelsn_AA      = "\xC3\x89";
const DV_TTGanesh_vowelsn_I_1     = "\xC3\x8A";
const DV_TTGanesh_vowelsn_I_2     = "\xC3\x8E";
const DV_TTGanesh_vowelsn_II      = "\xC3\x92";
const DV_TTGanesh_vowelsn_U_1     = "\xC3\x96";
const DV_TTGanesh_vowelsn_U_2     = "\xC3\x99";
const DV_TTGanesh_vowelsn_UU_1    = "\xC3\x9A";
const DV_TTGanesh_vowelsn_UU_2    = "\xC3\x9D";
const DV_TTGanesh_vowelsn_R       = "\xC3\x9E";
const DV_TTGanesh_vowelsn_RR      = "\xC3\x9F";
const DV_TTGanesh_vowelsn_E       = "\xC3\xA0";
const DV_TTGanesh_vowelsn_EE      = "\xC3\xA4";
const DV_TTGanesh_vowelsn_AI      = "\xC3\xA8";
const DV_TTGanesh_vowelsn_CDR_E   = "\xC3\xAC";
const DV_TTGanesh_vowelsn_CDR_O   = "\xC3\x89\xC3\xAC";
const DV_TTGanesh_vowelsn_O       = "\xC3\x89\xC3\xA0";
const DV_TTGanesh_vowelsn_OO      = "\xC3\x89\xC3\xA4";
const DV_TTGanesh_vowelsn_AU      = "\xC3\x89\xC3\xA8";

//Matra . anusvara
const DV_TTGanesh_vowelsn_IM_1      = "\xC3\x8B";
const DV_TTGanesh_vowelsn_IM_2      = "\xC3\x8F";
const DV_TTGanesh_vowelsn_IIM       = "\xC3\x93";
const DV_TTGanesh_vowelsn_UM        = "\xC3\x97";
const DV_TTGanesh_vowelsn_UUM       = "\xC3\x9B";
const DV_TTGanesh_vowelsn_EM        = "\xC3\xA1";
const DV_TTGanesh_vowelsn_EEM       = "\xC3\xA5";
const DV_TTGanesh_vowelsn_AIM       = "\xC3\xA9";
const DV_TTGanesh_vowelsn_CDR_EM    = "\xC3\xAD";


//Additional consonants

const DV_TTGanesh_consnt_QA       = "\x46";
const DV_TTGanesh_consnt_KHHA     = "\x4B\xC3\x89";
const DV_TTGanesh_consnt_GHHA     = "\x4E\xC3\x89";
const DV_TTGanesh_consnt_ZA       = "\x57\xC3\x89";
const DV_TTGanesh_consnt_DDDHA    = "\x63";
const DV_TTGanesh_consnt_RHA      = "\x67";
const DV_TTGanesh_consnt_FA       = "\xC2\xA2";

//Half Forms

const DV_TTGanesh_halffm_KA       = "\x43";
const DV_TTGanesh_halffm_QA       = "\x44";
const DV_TTGanesh_halffm_KHA      = "\x4A";
const DV_TTGanesh_halffm_KHHA     = "\x4B";
const DV_TTGanesh_halffm_GA       = "\x4D";
const DV_TTGanesh_halffm_GHHA     = "\x4E";
const DV_TTGanesh_halffm_GHA      = "\x50";
const DV_TTGanesh_halffm_CA       = "\x53";
const DV_TTGanesh_halffm_JA       = "\x56";
const DV_TTGanesh_halffm_ZA       = "\x57";
const DV_TTGanesh_halffm_JHA      = "\x5A";
const DV_TTGanesh_halffm_NYA      = "\x5C";
const DV_TTGanesh_halffm_NNA      = "\x68";
const DV_TTGanesh_halffm_TA       = "\x69";
const DV_TTGanesh_halffm_THA      = "\x6C";
const DV_TTGanesh_halffm_DHA      = "\x76";
const DV_TTGanesh_halffm_NA       = "\x78";
const DV_TTGanesh_halffm_PA       = "\x7B";
const DV_TTGanesh_halffm_PHA      = "\x7D";
const DV_TTGanesh_halffm_FA       = "\x7E";
const DV_TTGanesh_halffm_BA       = "\xC2\xA4";
const DV_TTGanesh_halffm_BHA      = "\xC2\xA6";
const DV_TTGanesh_halffm_MA       = "\xC2\xA8";
const DV_TTGanesh_halffm_YA       = "\xC2\xAA";
const DV_TTGanesh_halffm_RA       = "\xC3\x87";
const DV_TTGanesh_halffm_LA       = "\xC2\xB1";
const DV_TTGanesh_halffm_VA       = "\xC2\xB4";
const DV_TTGanesh_halffm_SHA_1    = "\xC2\xB6";
const DV_TTGanesh_halffm_SHA_2    = "\xC2\xA0";
const DV_TTGanesh_halffm_SSA      = "\xC2\xB9";
const DV_TTGanesh_halffm_SA       = "\xC2\xBA";
const DV_TTGanesh_halffm_HA       = "\xC2\xBC";
const DV_TTGanesh_halffm_LLA      = "\xC2\xB2";
const DV_TTGanesh_halffm_KSHA     = "\x49";
const DV_TTGanesh_halffm_THRA     = "\x6A";
const DV_TTGanesh_halffm_JHNA     = "\x59";


//Conjuncts
const DV_TTGanesh_conjct_KRA      = "\x47";
const DV_TTGanesh_conjct_KTA      = "\x48";
const DV_TTGanesh_conjct_KHRA     = "\x4C";
const DV_TTGanesh_halffm_GRA      = "\x4F";
const DV_TTGanesh_conjct_GRA      = "\x4F\xC3\x89";
const DV_TTGanesh_conjct_GHRA     = "\x51";
const DV_TTGanesh_conjct_CRA      = "\x54";
const DV_TTGanesh_halffm_JRA      = "\x58";
const DV_TTGanesh_conjct_JRA      = "\x58\xC3\x89";
const DV_TTGanesh_conjct_JHRA     = "\x5B";
const DV_TTGanesh_conjct_TTATTA   = "\x5E";
const DV_TTGanesh_conjct_TTATTHA  = "\x5F";
const DV_TTGanesh_conjct_TTHATTHA = "\x61";
const DV_TTGanesh_conjct_DDADDA   = "\x64";
const DV_TTGanesh_conjct_DDADDHA  = "\x65";
const DV_TTGanesh_conjct_TATA     = "\x6B\xC3\x89";
const DV_TTGanesh_halffm_TATA     = "\x6B";
const DV_TTGanesh_conjct_THAR     = "\x6D";
const DV_TTGanesh_conjct_DRU      = "\x6F";
const DV_TTGanesh_conjct_DRA      = "\x70";
const DV_TTGanesh_conjct_DADA     = "\x71";
const DV_TTGanesh_conjct_DADHA    = "\x72";
const DV_TTGanesh_conjct_DHMA     = "\x73";
const DV_TTGanesh_conjct_DHYA     = "\x74";
const DV_TTGanesh_conjct_DVA      = "\x75";
const DV_TTGanesh_conjct_DHRA     = "\x77";
const DV_TTGanesh_halffm_NRA      = "\x79";
const DV_TTGanesh_conjct_NRA      = "\x79\xC3\x89";
const DV_TTGanesh_halffm_NN       = "\x7A";
const DV_TTGanesh_conjct_NN       = "\x7A\xC3\x89";
const DV_TTGanesh_halffm_PR       = "\x7C";
const DV_TTGanesh_conjct_PRA      = "\x7C\xC3\x89";
const DV_TTGanesh_conjct_PHRA     = "\xC2\xA3";
const DV_TTGanesh_halffm_BRA      = "\xC2\xA5";
const DV_TTGanesh_conjct_BRA      = "\xC2\xA5\xC3\x89";
const DV_TTGanesh_halffm_BHRA     = "\xC2\xA7";
const DV_TTGanesh_conjct_BHRA     = "\xC2\xA7\xC3\x89";
const DV_TTGanesh_conjct_MRA      = "\xC2\xA9\xC3\x89";
const DV_TTGanesh_halffm_MRA      = "\xC2\xA9";
const DV_TTGanesh_conjct_YRA      = "\xC2\xAB";
const DV_TTGanesh_conjct_RU       = "\xC2\xAF";
const DV_TTGanesh_conjct_RUU      = "\xC2\xB0";
const DV_TTGanesh_conjct_VRA      = "\xC2\xB5";
const DV_TTGanesh_halffm_SHVA     = "\xC2\xB7";
const DV_TTGanesh_conjct_SHVA     = "\xC2\xB7\xC3\x89";
const DV_TTGanesh_halffm_SHRA     = "\xC2\xB8";
const DV_TTGanesh_conjct_SHRA     = "\xC2\xB8\xC3\x89";
const DV_TTGanesh_halffm_SRA      = "\xC2\xBB";
const DV_TTGanesh_conjct_SRA      = "\xC2\xBB\xC3\x89";
const DV_TTGanesh_conjct_HRU      = "\xC2\xBE";
const DV_TTGanesh_conjct_HRA      = "\xC2\xBF";
const DV_TTGanesh_conjct_HMA      = "\xC3\x80";
const DV_TTGanesh_conjct_HYA      = "\xC3\x81";
const DV_TTGanesh_conjct_UR       = "\xC3\x98";
const DV_TTGanesh_conjct_UUR      = "\xC3\x9C";


//rakar

const DV_TTGanesh_vattu_RA      = "\xC3\x85";
const DV_TTGanesh_vattu_YA      = "\xC2\xAC";

//Half RA's

const DV_TTGanesh_halffm_RI_1    = "\xC3\x8C";
const DV_TTGanesh_halffm_RI_2    = "\xC3\x90";
const DV_TTGanesh_halffm_RIM_1   = "\xC3\x8D";
const DV_TTGanesh_halffm_RIM_2   = "\xC3\x91";
const DV_TTGanesh_halffm_RII     = "\xC3\x94";
const DV_TTGanesh_halffm_RIIM    = "\xC3\x95";
const DV_TTGanesh_halffm_REE     = "\xC3\xA6";
const DV_TTGanesh_halffm_RA_ANU  = "\xC3\x88";
const DV_TTGanesh_halffm_REEM    = "\xC3\xA7";
const DV_TTGanesh_halffm_RAI     = "\xC3\xAA";
const DV_TTGanesh_halffm_RAIM    = "\xC3\xAB";
const DV_TTGanesh_halffm_RE      = "\xC3\xA2";
const DV_TTGanesh_halffm_REM     = "\xC3\xA3";
const DV_TTGanesh_halffm_CDR_RE  = "\xC3\xAE";
const DV_TTGanesh_halffm_CDR_REM = "\xC3\xAF";


const DV_TTGanesh_om         = "\x24";
const DV_TTGanesh_avagraha   = "\x25";
const DV_TTGanesh_halffm_RRA = "\xC2\xAD";
const DV_TTGanesh_virama     = "\xC3\x82";
const DV_TTGanesh_nukta      = "\xC3\x83";
const DV_TTGanesh_danda      = "\x2A";

//Devanagari Digits

const DV_TTGanesh_digit_ZERO     = "\x30";
const DV_TTGanesh_digit_ONE      = "\x31";
const DV_TTGanesh_digit_TWO      = "\x32";
const DV_TTGanesh_digit_THREE    = "\x33";
const DV_TTGanesh_digit_FOUR     = "\x34";
const DV_TTGanesh_digit_FIVE     = "\x35";
const DV_TTGanesh_digit_SIX      = "\x36";
const DV_TTGanesh_digit_SEVEN    = "\x37";
const DV_TTGanesh_digit_EIGHT    = "\x38";
const DV_TTGanesh_digit_NINE     = "\x39";

//Matches ASCII
const DV_TTGanesh_EXCLAM         = "\x21";
const DV_TTGanesh_QUOTE          = "\x22";
const DV_TTGanesh_APOSTROPHE     = "\x27";
const DV_TTGanesh_PARENLEFT      = "\x28";
const DV_TTGanesh_PARENRIGHT     = "\x29";
const DV_TTGanesh_COMMA	         = "\x2C";
const DV_TTGanesh_HYPHEN         = "\x2D";
const DV_TTGanesh_PERIOD         = "\x2E";
const DV_TTGanesh_SLASH          = "\x2F";
const DV_TTGanesh_COLON          = "\x3A";
const DV_TTGanesh_SEMICOLON      = "\x3B";
const DV_TTGanesh_QUESTION       = "\x3F";


const DV_TTGanesh_misc_UNKNOWN_1    = "\x23";
const DV_TTGanesh_misc_UNKNOWN_2    = "\x26";
const DV_TTGanesh_space_1	    = "\xC3\xB0";
const DV_TTGanesh_space_2	    = "\xC3\xB1";
const DV_TTGanesh_space_3	    = "\xC3\xB2";
const DV_TTGanesh_space_4	    = "\xC3\xB3";
const DV_TTGanesh_space_5	    = "\xC3\xB4";
const DV_TTGanesh_space_6	    = "\xC3\xB5";
const DV_TTGanesh_space_7	    = "\xC3\xB6";
const DV_TTGanesh_space_8	    = "\xC3\xB7";
const DV_TTGanesh_space_9	    = "\xC3\xB8";
const DV_TTGanesh_space_10	    = "\xC3\xB9";
const DV_TTGanesh_space_11	    = "\xC3\xBA";
const DV_TTGanesh_space_12	    = "\xC3\xBB";
const DV_TTGanesh_space_13	    = "\xC3\xBC";
const DV_TTGanesh_space_14	    = "\xC3\xBD";
const DV_TTGanesh_space_15	    = "\xC3\xBE";

}

$DV_TTGanesh_toPadma = Array();

$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_anusvara]      = Padma::Padma_anusvara;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_candrabindu]   = Padma::Padma_candrabindu;

$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_vowel_SHT_A]   = Padma::Padma_vowel_SHT_A;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_vowel_A]       = Padma::Padma_vowel_A;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_vowel_AA]      = Padma::Padma_vowel_AA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_vowel_I]       = Padma::Padma_vowel_I;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_vowel_II]      = Padma::Padma_vowel_II;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_vowel_U]       = Padma::Padma_vowel_U;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_vowel_UU]      = Padma::Padma_vowel_UU;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_vowel_R]       = Padma::Padma_vowel_R;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_vowel_RR]      = Padma::Padma_vowel_RR;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_vowel_EE]      = Padma::Padma_vowel_EE;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_vowel_AI]      = Padma::Padma_vowel_AI;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_vowel_OO]      = Padma::Padma_vowel_OO;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_vowel_AU]      = Padma::Padma_vowel_AU;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_vowel_CDR_E]   = Padma::Padma_vowel_CDR_E;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_vowel_CDR_O]   = Padma::Padma_vowel_CDR_O;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_vowel_E]       = Padma::Padma_vowel_E;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_vowel_O]       = Padma::Padma_vowel_O;


//consonants
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_KA]     = Padma::Padma_consnt_KA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_KHA]    = Padma::Padma_consnt_KHA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_KHA_2]  = Padma::Padma_consnt_KHA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_GA]     = Padma::Padma_consnt_GA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_GHA]    = Padma::Padma_consnt_GHA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_GHA_2]  = Padma::Padma_consnt_GHA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_NGA]    = Padma::Padma_consnt_NGA;

$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_CA]     = Padma::Padma_consnt_CA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_CHA]    = Padma::Padma_consnt_CHA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_JA]     = Padma::Padma_consnt_JA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_JHA]    = Padma::Padma_consnt_JHA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_NYA]    = Padma::Padma_consnt_NYA;

$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_TTA]    = Padma::Padma_consnt_TTA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_TTA]    = Padma::Padma_halffm_TTA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_TTHA]   = Padma::Padma_consnt_TTHA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_DDA]    = Padma::Padma_consnt_DDA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_DDA]    = Padma::Padma_halffm_DDA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_DDHA]   = Padma::Padma_consnt_DDHA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_NNA]    = Padma::Padma_consnt_NNA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_NNA_2]    = Padma::Padma_consnt_NNA;

$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_TA]     = Padma::Padma_consnt_TA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_TA_2]   = Padma::Padma_consnt_TA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_THA]    = Padma::Padma_consnt_THA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_THA_2]  = Padma::Padma_consnt_THA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_DA]     = Padma::Padma_consnt_DA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_DA]     = Padma::Padma_halffm_DA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_DHA]    = Padma::Padma_consnt_DHA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_DHA_2]  = Padma::Padma_consnt_DHA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_NA]     = Padma::Padma_consnt_NA;

$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_PA]     = Padma::Padma_consnt_PA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_PHA]    = Padma::Padma_consnt_PHA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_BA]     = Padma::Padma_consnt_BA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_BHA]    = Padma::Padma_consnt_BHA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_BHA_2]  = Padma::Padma_consnt_BHA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_MA]     = Padma::Padma_consnt_MA;

$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_YA]     = Padma::Padma_consnt_YA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_RA]     = Padma::Padma_consnt_RA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_LA]     = Padma::Padma_consnt_LA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_VA]     = Padma::Padma_consnt_VA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_SHA_1]  = Padma::Padma_consnt_SHA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_SHA_2]  = Padma::Padma_consnt_SHA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_SHA_3]  = Padma::Padma_consnt_SHA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_SSA]    = Padma::Padma_consnt_SSA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_SSA_2]   = Padma::Padma_consnt_SSA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_SA]     = Padma::Padma_consnt_SA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_HA]     = Padma::Padma_consnt_HA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_LLA]    = Padma::Padma_consnt_LLA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_KSHA]   = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_KSHA_2] = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_THRA]   = Padma::Padma_consnt_TA . Padma::Padma_vattu_RA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_JHNA]   = Padma::Padma_consnt_JA . Padma::Padma_vattu_NYA;


//Gunintamulu
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_vowelsn_AA]    = Padma::Padma_vowelsn_AA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_vowelsn_I_1]   = Padma::Padma_vowelsn_I;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_vowelsn_I_2]   = Padma::Padma_vowelsn_I;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_vowelsn_II]    = Padma::Padma_vowelsn_II;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_vowelsn_U_1]   = Padma::Padma_vowelsn_U;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_vowelsn_U_2]   = Padma::Padma_vowelsn_U;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_vowelsn_UU_1]  = Padma::Padma_vowelsn_UU;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_vowelsn_UU_2]  = Padma::Padma_vowelsn_UU;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_vowelsn_R]     = Padma::Padma_vowelsn_R;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_vowelsn_RR]    = Padma::Padma_vowelsn_RR;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_vowelsn_E]     = Padma::Padma_vowelsn_E;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_vowelsn_EE]    = Padma::Padma_vowelsn_EE;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_vowelsn_AI]    = Padma::Padma_vowelsn_AI;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_vowelsn_CDR_E] = Padma::Padma_vowelsn_CDR_E;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_vowelsn_CDR_O] = Padma::Padma_vowelsn_CDR_O;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_vowelsn_O]     = Padma::Padma_vowelsn_O;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_vowelsn_OO]    = Padma::Padma_vowelsn_OO;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_vowelsn_AU]    = Padma::Padma_vowelsn_AU;

//Additional consonants

$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_QA]    = Padma::Padma_consnt_QA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_KHHA]  = Padma::Padma_consnt_KHHA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_GHHA]  = Padma::Padma_consnt_GHHA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_ZA]    = Padma::Padma_consnt_ZA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_DDDHA] = Padma::Padma_consnt_DDDHA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_RHA]   = Padma::Padma_consnt_RHA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_consnt_FA]    = Padma::Padma_consnt_FA;

//Matra + anusvara
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_vowelsn_IM_1]  = Padma::Padma_vowelsn_I . Padma::Padma_anusvara;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_vowelsn_IM_2]  = Padma::Padma_vowelsn_I . Padma::Padma_anusvara;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_vowelsn_IIM]   = Padma::Padma_vowelsn_II . Padma::Padma_anusvara;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_vowelsn_UM]    = Padma::Padma_vowelsn_U . Padma::Padma_anusvara;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_vowelsn_UUM]   = Padma::Padma_vowelsn_UU . Padma::Padma_anusvara;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_vowelsn_EM]    = Padma::Padma_vowelsn_E . Padma::Padma_anusvara;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_vowelsn_EEM]   = Padma::Padma_vowelsn_EE . Padma::Padma_anusvara;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_vowelsn_AIM]   = Padma::Padma_vowelsn_AI . Padma::Padma_anusvara;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_vowelsn_CDR_EM]= Padma::Padma_vowelsn_CDR_E . Padma::Padma_anusvara;

//Halffm

$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_KA]     = Padma::Padma_halffm_KA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_QA]     = Padma::Padma_halffm_QA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_KHA]    = Padma::Padma_halffm_KHA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_KHHA]   = Padma::Padma_halffm_KHHA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_GA]     = Padma::Padma_halffm_GA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_GHHA]   = Padma::Padma_halffm_GHHA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_GHA]    = Padma::Padma_halffm_GHA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_CA]     = Padma::Padma_halffm_CA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_JA]     = Padma::Padma_halffm_JA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_ZA]     = Padma::Padma_halffm_ZA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_JHA]    = Padma::Padma_halffm_JHA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_NYA]    = Padma::Padma_halffm_NYA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_NNA]    = Padma::Padma_halffm_NNA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_TA]     = Padma::Padma_halffm_TA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_THA]    = Padma::Padma_halffm_THA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_DHA]    = Padma::Padma_halffm_DHA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_NA]     = Padma::Padma_halffm_NA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_PA]     = Padma::Padma_halffm_PA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_PHA]    = Padma::Padma_halffm_PHA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_FA]     = Padma::Padma_halffm_FA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_BA]     = Padma::Padma_halffm_BA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_BHA]    = Padma::Padma_halffm_BHA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_MA]     = Padma::Padma_halffm_MA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_YA]     = Padma::Padma_halffm_YA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_RA]     = Padma::Padma_halffm_RA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_LA]     = Padma::Padma_halffm_LA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_VA]     = Padma::Padma_halffm_VA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_SHA_1]  = Padma::Padma_halffm_SHA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_SHA_2]  = Padma::Padma_halffm_SHA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_SSA]    = Padma::Padma_halffm_SSA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_SA]     = Padma::Padma_halffm_SA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_HA]     = Padma::Padma_halffm_HA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_LLA]    = Padma::Padma_halffm_LLA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_KSHA]   = Padma::Padma_halffm_KA  . Padma::Padma_halffm_SSA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_THRA]   = Padma::Padma_halffm_TA  . Padma::Padma_vattu_RA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_JHNA]   = Padma::Padma_halffm_JA  . Padma::Padma_vattu_NYA;


//Conjuncts

$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_conjct_KRA]    = Padma::Padma_consnt_KA . Padma::Padma_vattu_RA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_conjct_KTA]    = Padma::Padma_consnt_KA . Padma::Padma_vattu_TA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_conjct_KHRA]   = Padma::Padma_vattu_KHA . Padma::Padma_vattu_RA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_GRA]    = Padma::Padma_halffm_GA . Padma::Padma_halffm_RA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_conjct_GRA]    = Padma::Padma_consnt_GA . Padma::Padma_vattu_RA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_conjct_GHRA]   = Padma::Padma_vattu_GHA . Padma::Padma_vattu_RA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_conjct_CRA]    = Padma::Padma_vattu_CA . Padma::Padma_vattu_RA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_JRA]    = Padma::Padma_halffm_JA . Padma::Padma_halffm_RA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_conjct_JRA]    = Padma::Padma_consnt_JA . Padma::Padma_vattu_RA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_conjct_JHRA]   = Padma::Padma_vattu_JHA . Padma::Padma_vattu_RA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_conjct_TTATTA] = Padma::Padma_consnt_TTA . Padma::Padma_vattu_TTA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_conjct_TTATTHA]= Padma::Padma_consnt_TTA . Padma::Padma_vattu_TTHA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_conjct_DDADDA] = Padma::Padma_consnt_DDA . Padma::Padma_vattu_DDA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_conjct_DDADDHA]= Padma::Padma_consnt_DDA . Padma::Padma_vattu_DDHA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_conjct_TATA]   = Padma::Padma_consnt_TA . Padma::Padma_vattu_TA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_TATA]   = Padma::Padma_halffm_TA . Padma::Padma_halffm_TA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_conjct_THAR]   = Padma::Padma_vattu_THA . Padma::Padma_vattu_RA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_conjct_DRU]    = Padma::Padma_consnt_DA . Padma::Padma_vowelsn_R;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_conjct_DRA]    = Padma::Padma_consnt_DA . Padma::Padma_vattu_RA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_conjct_DADA]   = Padma::Padma_consnt_DA . Padma::Padma_vattu_DA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_conjct_DADHA]  = Padma::Padma_consnt_DA . Padma::Padma_vattu_DHA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_conjct_DHMA]   = Padma::Padma_consnt_DA . Padma::Padma_vattu_MA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_conjct_DHYA]   = Padma::Padma_consnt_DA . Padma::Padma_vattu_YA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_conjct_DVA]    = Padma::Padma_consnt_DA . Padma::Padma_vattu_VA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_conjct_DHRA]   = Padma::Padma_vattu_DHA . Padma::Padma_vattu_RA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_conjct_NRA]    = Padma::Padma_consnt_NA . Padma::Padma_vattu_RA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_NRA]    = Padma::Padma_halffm_NA . Padma::Padma_halffm_RA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_conjct_NN]     = Padma::Padma_consnt_NA . Padma::Padma_vattu_NA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_NN]     = Padma::Padma_halffm_NA . Padma::Padma_halffm_NA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_PR]     = Padma::Padma_halffm_PA . Padma::Padma_halffm_RA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_conjct_PRA]    = Padma::Padma_consnt_PA . Padma::Padma_vattu_RA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_conjct_PHRA]   = Padma::Padma_vattu_PHA . Padma::Padma_vattu_RA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_BRA]    = Padma::Padma_vattu_BA . Padma::Padma_vattu_RA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_conjct_BRA]    = Padma::Padma_consnt_BA . Padma::Padma_vattu_RA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_conjct_BHRA]   = Padma::Padma_consnt_BHA . Padma::Padma_vattu_RA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_BHRA]   = Padma::Padma_halffm_BHA . Padma::Padma_halffm_RA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_conjct_MRA]    = Padma::Padma_consnt_MA . Padma::Padma_vattu_RA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_MRA]    = Padma::Padma_halffm_MA . Padma::Padma_halffm_RA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_conjct_YRA]    = Padma::Padma_vattu_YA . Padma::Padma_vattu_RA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_conjct_RU]     = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_U;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_conjct_RUU]    = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_UU;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_conjct_VRA]    = Padma::Padma_vattu_VA . Padma::Padma_vattu_RA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_SHVA]   = Padma::Padma_halffm_SHA . Padma::Padma_halffm_VA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_conjct_SHVA]   = Padma::Padma_consnt_SHA . Padma::Padma_vattu_VA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_SHRA]   = Padma::Padma_halffm_SHA . Padma::Padma_halffm_RA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_conjct_SHRA]   = Padma::Padma_consnt_SHA . Padma::Padma_vattu_RA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_conjct_SRA]    = Padma::Padma_consnt_SA . Padma::Padma_vattu_RA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_SRA]    = Padma::Padma_halffm_SA . Padma::Padma_halffm_RA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_conjct_HRU]    = Padma::Padma_consnt_HA . Padma::Padma_vowelsn_R;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_conjct_HRA]    = Padma::Padma_vattu_HA . Padma::Padma_vattu_RA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_conjct_HMA]    = Padma::Padma_consnt_HA . Padma::Padma_vattu_MA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_conjct_HYA]    = Padma::Padma_consnt_HA . Padma::Padma_vattu_YA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_conjct_UR]     = Padma::Padma_vattu_RA . Padma::Padma_vowelsn_U;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_conjct_UUR]    = Padma::Padma_vattu_RA . Padma::Padma_vowelsn_UU;


$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_vattu_RA]      = Padma::Padma_vattu_RA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_vattu_YA]      = Padma::Padma_vattu_YA;


//half form of RA

$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_RI_1]   = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_I;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_RI_2]   = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_I;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_RIM_1]  = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_I . Padma::Padma_anusvara;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_RIM_2]  = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_I . Padma::Padma_anusvara;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_RII]    = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_II;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_RIIM]   = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_II . Padma::Padma_anusvara;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_REE]    = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_EE; 
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_RA_ANU] = Padma::Padma_halffm_RA . Padma::Padma_anusvara;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_REEM]   = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_EE . Padma::Padma_anusvara;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_RAI]    = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_AI;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_RAIM]   = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_AI . Padma::Padma_anusvara;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_RE]     = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_E;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_REM]    = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_E . Padma::Padma_anusvara;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_CDR_RE] = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_CDR_E;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_CDR_REM]= Padma::Padma_halffm_RA . Padma::Padma_vowelsn_CDR_E . Padma::Padma_anusvara;


$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_om]        = Padma::Padma_om;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_avagraha]  = Padma::Padma_avagraha;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_halffm_RRA]= Padma::Padma_halffm_RRA;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_virama]    = Padma::Padma_syllbreak;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_nukta]     = Padma::Padma_nukta;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_danda]     = Padma::Padma_danda;

//Digits

$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_digit_ZERO]    = Padma::Padma_digit_ZERO;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_digit_ONE]     = Padma::Padma_digit_ONE;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_digit_TWO]     = Padma::Padma_digit_TWO;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_digit_THREE]   = Padma::Padma_digit_THREE;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_digit_FOUR]    = Padma::Padma_digit_FOUR;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_digit_FIVE]    = Padma::Padma_digit_FIVE;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_digit_SIX]     = Padma::Padma_digit_SIX;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_digit_SEVEN]   = Padma::Padma_digit_SEVEN;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_digit_EIGHT]   = Padma::Padma_digit_EIGHT;
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_digit_NINE]    = Padma::Padma_digit_NINE;


//ASCII

$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_QUESTION]    	 = "?";
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_EXCLAM]    	 = "!";
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_QUOTE]		 = "'";
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_COMMA]		 = ",";
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_PERIOD]		 = ".";
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_SLASH]		 = "/";
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_PARENLEFT]	 = "(";
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_PARENRIGHT]	 = ")";
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_HYPHEN]		 = "-";
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_COLON]		 = ":";
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_SEMICOLON]	 = ";";
$DV_TTGanesh_toPadma[DV_TTGanesh::DV_TTGanesh_APOSTROPHE]	 = "\xE2\x80\x99";



$DV_TTGanesh_prefixList = Array();
$DV_TTGanesh_prefixList[DV_TTGanesh::DV_TTGanesh_vowelsn_I_1]     = true;
$DV_TTGanesh_prefixList[DV_TTGanesh::DV_TTGanesh_vowelsn_I_2]     = true;
$DV_TTGanesh_prefixList[DV_TTGanesh::DV_TTGanesh_vowelsn_IM_1]    = true;
$DV_TTGanesh_prefixList[DV_TTGanesh::DV_TTGanesh_vowelsn_IM_2]    = true;
/*$DV_TTGanesh_prefixList[DV_TTGanesh::DV_TTGanesh_vowelsn_RI_1]    = true;
$DV_TTGanesh_prefixList[DV_TTGanesh::DV_TTGanesh_vowelsn_RI_2]    = true;
$DV_TTGanesh_prefixList[DV_TTGanesh::DV_TTGanesh_vowelsn_RIM_1]   = true;
$DV_TTGanesh_prefixList[DV_TTGanesh::DV_TTGanesh_vowelsn_RIM_2]   = true;*/



$DV_TTGanesh_suffixList = Array();
$DV_TTGanesh_suffixList[DV_TTGanesh::DV_TTGanesh_halffm_RA]      = true;
$DV_TTGanesh_suffixList[DV_TTGanesh::DV_TTGanesh_vowelsn_AA]     = true;
$DV_TTGanesh_suffixList[DV_TTGanesh::DV_TTGanesh_vowelsn_II]     = true;
$DV_TTGanesh_suffixList[DV_TTGanesh::DV_TTGanesh_vowelsn_IIM]    = true;
$DV_TTGanesh_suffixList[DV_TTGanesh::DV_TTGanesh_halffm_RII]     = true;
$DV_TTGanesh_suffixList[DV_TTGanesh::DV_TTGanesh_halffm_RIIM]    = true;
$DV_TTGanesh_suffixList[DV_TTGanesh::DV_TTGanesh_halffm_REE]     = true;
$DV_TTGanesh_suffixList[DV_TTGanesh::DV_TTGanesh_halffm_REEM]    = true;
$DV_TTGanesh_suffixList[DV_TTGanesh::DV_TTGanesh_halffm_RAI]     = true;
$DV_TTGanesh_suffixList[DV_TTGanesh::DV_TTGanesh_halffm_RAIM]    = true;
$DV_TTGanesh_suffixList[DV_TTGanesh::DV_TTGanesh_halffm_RA_ANU]  = true;
$DV_TTGanesh_suffixList[DV_TTGanesh::DV_TTGanesh_halffm_RE]      = true;
$DV_TTGanesh_suffixList[DV_TTGanesh::DV_TTGanesh_halffm_REM]     = true;
$DV_TTGanesh_suffixList[DV_TTGanesh::DV_TTGanesh_halffm_CDR_RE]  = true;
$DV_TTGanesh_suffixList[DV_TTGanesh::DV_TTGanesh_halffm_CDR_REM] = true;


$DV_TTGanesh_redundantList = Array();
$DV_TTGanesh_redundantList[DV_TTGanesh::DV_TTGanesh_misc_UNKNOWN_1]  = true;
$DV_TTGanesh_redundantList[DV_TTGanesh::DV_TTGanesh_misc_UNKNOWN_2]  = true;
$DV_TTGanesh_redundantList[DV_TTGanesh::DV_TTGanesh_space_1] 	       = true;
$DV_TTGanesh_redundantList[DV_TTGanesh::DV_TTGanesh_space_2] 	       = true;
$DV_TTGanesh_redundantList[DV_TTGanesh::DV_TTGanesh_space_3] 	       = true;
$DV_TTGanesh_redundantList[DV_TTGanesh::DV_TTGanesh_space_4] 	       = true;
$DV_TTGanesh_redundantList[DV_TTGanesh::DV_TTGanesh_space_5] 	       = true;
$DV_TTGanesh_redundantList[DV_TTGanesh::DV_TTGanesh_space_6] 	       = true;
$DV_TTGanesh_redundantList[DV_TTGanesh::DV_TTGanesh_space_7] 	       = true;
$DV_TTGanesh_redundantList[DV_TTGanesh::DV_TTGanesh_space_8] 	       = true;
$DV_TTGanesh_redundantList[DV_TTGanesh::DV_TTGanesh_space_9] 	       = true;
$DV_TTGanesh_redundantList[DV_TTGanesh::DV_TTGanesh_space_10]	       = true;
$DV_TTGanesh_redundantList[DV_TTGanesh::DV_TTGanesh_space_11]	       = true;
$DV_TTGanesh_redundantList[DV_TTGanesh::DV_TTGanesh_space_12]	       = true;
$DV_TTGanesh_redundantList[DV_TTGanesh::DV_TTGanesh_space_13]	       = true;
$DV_TTGanesh_redundantList[DV_TTGanesh::DV_TTGanesh_space_14]	       = true;
$DV_TTGanesh_redundantList[DV_TTGanesh::DV_TTGanesh_space_15]	       = true;
//$DV_TTGanesh_redundantList[DV_TTGanesh::DV_TTGanesh_verticalline]    = true;


$DV_TTGanesh_overloadList = Array();
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_vowel_A]      = true;
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_vowel_AA]     = true;
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_vowel_EE]     = true;
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_vowel_I]      = true;
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_vowelsn_AA]   = true;
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_halffm_KA]    = true;
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_halffm_QA]    = true;
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_halffm_KHA]   = true;
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_halffm_KHHA]  = true;
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_halffm_GA]    = true;
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_halffm_GHA]   = true;
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_halffm_CA]    = true;
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_halffm_JA]    = true;
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_halffm_ZA]    = true;
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_halffm_JHA]   = true;
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_halffm_NYA]   = true;
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_halffm_NNA]   = true;
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_halffm_TA]    = true;
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_halffm_THA]   = true;
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_halffm_DHA]   = true;
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_halffm_NA]    = true;
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_halffm_PA]    = true;
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_halffm_PHA]   = true;
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_halffm_FA]    = true;
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_halffm_BA]    = true;
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_halffm_BHA]   = true;
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_halffm_MA]    = true;
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_halffm_YA]    = true;
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_halffm_LA]    = true;
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_halffm_VA]    = true;
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_halffm_SHA_1] = true;
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_halffm_SHA_2] = true;
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_halffm_SSA]   = true;
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_halffm_SA]    = true;
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_halffm_LLA]   = true;
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_halffm_KSHA]  = true;
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_halffm_THRA]  = true;
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_halffm_JHNA]  = true;
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_halffm_NN]    = true;
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_halffm_THRA]  = true;
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_halffm_JHNA]  = true;
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_conjct_KHRA]  = true;
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_halffm_GRA]   = true;
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_conjct_GHRA]  = true;
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_conjct_CRA]   = true;
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_halffm_JRA]   = true;
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_conjct_JHRA]  = true;
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_halffm_TATA]  = true; 
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_conjct_THAR]  = true; 
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_conjct_DHRA]  = true; 
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_halffm_NRA]   = true; 
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_halffm_PR]   = true; 
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_conjct_PHRA]  = true; 
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_halffm_BRA]   = true; 
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_conjct_BRA]   = true; 
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_halffm_BHRA]  = true; 
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_halffm_MRA]   = true; 
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_conjct_YRA]   = true; 
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_conjct_VRA]   = true; 
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_halffm_SHVA]  = true; 
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_halffm_SRA]   = true; 
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_halffm_SHRA]   = true; 
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_consnt_TTA]   = true; 
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_consnt_DDA]   = true; 
$DV_TTGanesh_overloadList[DV_TTGanesh::DV_TTGanesh_consnt_DA]   = true; 

function DV_TTGanesh_initialize()
{
    global $fontinfo;

    $fontinfo["dv-ttganesh"]["language"] = "Devanagari";
    $fontinfo["dv-ttganesh"]["class"] = "DV_TTGanesh";
    $fontinfo["dv-ttsurekh"]["language"] = "Devanagari";
    $fontinfo["dv-ttsurekh"]["class"] = "DV_TTGanesh";
    $fontinfo["dv-ttyogesh"]["language"] = "Devanagari";
    $fontinfo["dv-ttyogesh"]["class"] = "DV_TTGanesh";
    $fontinfo["dv-ttganeshen"]["language"] = "Devanagari";
    $fontinfo["dv-ttganeshen"]["class"] = "DV_TTGanesh";
    $fontinfo["dv-ttsurekhen"]["language"] = "Devanagari";
    $fontinfo["dv-ttsurekhen"]["class"] = "DV_TTGanesh";
    $fontinfo["dv-ttyogeshen"]["language"] = "Devanagari";
    $fontinfo["dv-ttyogeshen"]["class"] = "DV_TTGanesh";
}
?>
