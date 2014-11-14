<?php
class Amudham
{
function Amudham()
{
}

//The interface every dynamic font encoding should implement
var $maxLookupLen = 3;
var $fontFace     = "Amudham";
var $displayName  = "Amudham";
var $script       = Padma::Padma_script_TAMIL;

function lookup($str) 
{
    global $Amudham_toPadma;
    return $Amudham_toPadma[$str];
}

function isPrefixSymbol($str)
{
    global $Amudham_prefixList;
    return array_key_exists($str,$Amudham_prefixList);
}

function isOverloaded($str)
{
    global $Amudham_overloadList;
    return array_key_exists($str,$Amudham_overloadList);
}

function handleTwoPartVowelSigns($sign1,$sign2)
{
    if ($sign2 == Padma::Padma_vowelsn_E && $sign1 == Padma::Padma_vowelsn_AA)
        return Padma::Padma_vowelsn_O;
    if ($sign2 == Padma::Padma_vowelsn_EE && $sign1 == Padma::Padma_vowelsn_AA)
        return Padma::Padma_vowelsn_OO;
    return sign1 . sign2;    
}

function isRedundant($str)
{
    global $Amudham_redundantList;
    return array_key_exists($str,$Amudham_redundantList);
}

//Implementation details start here

//Specials
const Amudham_visarga        = "\x60";  //aytham
const Amudham_virama_1       = "\x3A";
const Amudham_virama_2       = "\x3B";
const Amudham_virama_3       = "\x40";


//Vowels
const Amudham_vowel_A        = "\x6D";
const Amudham_vowel_AA       = "\x4D";
const Amudham_vowel_I        = "\x2C";
const Amudham_vowel_II       = "\x3C";
const Amudham_vowel_U        = "\x63";
const Amudham_vowel_UU       = "\x43";
const Amudham_vowel_E        = "\x76";
const Amudham_vowel_EE       = "\x56";
const Amudham_vowel_AI       = "\x49";
const Amudham_vowel_O        = "\x78";
const Amudham_vowel_OO       = "\x58";
const Amudham_vowel_AU       = "\x78\x73";

//Consonants
const Amudham_consnt_KA      = "\x66";
const Amudham_consnt_NGA     = "\x27";

const Amudham_consnt_CA      = "\x72";
const Amudham_consnt_JA      = "\x24";
const Amudham_consnt_NYA     = "\x22";

const Amudham_consnt_TTA     = "\x6C";
const Amudham_consnt_NNA     = "\x7A";

const Amudham_consnt_TA      = "\x6A";
const Amudham_consnt_NA      = "\x65";
const Amudham_consnt_NNNA    = "\x64";

const Amudham_consnt_PA      = "\x67";
const Amudham_consnt_MA      = "\x6B";

const Amudham_consnt_YA      = "\x61";
const Amudham_consnt_RA      = "\x75";
const Amudham_consnt_LA      = "\x79";
const Amudham_consnt_VA      = "\x74";
const Amudham_consnt_SSA     = "\x23";
const Amudham_consnt_SA      = "\x21";
const Amudham_consnt_HA      = "\x51";
const Amudham_consnt_LLA     = "\x73";
const Amudham_consnt_ZHA     = "\x48";
const Amudham_consnt_RRA     = "\x77";
const Amudham_conjct_KSH     = "\x26";
const Amudham_conjct_SRII    = "\x7C";

//Gunintamulu
const Amudham_vowelsn_AA     = "\x68";
const Amudham_vowelsn_I      = "\x70";
const Amudham_vowelsn_II     = "\x50";
const Amudham_vowelsn_U_1    = "\x25";	
const Amudham_vowelsn_U_2    = "\x5B";	
const Amudham_vowelsn_UU_1   = "\x5E";
const Amudham_vowelsn_UU_2   = "\x7B";
const Amudham_vowelsn_UU_3   = "\x7D";
const Amudham_vowelsn_E      = "\x62";
const Amudham_vowelsn_EE     = "\x6E";
const Amudham_vowelsn_AI     = "\x69";
const Amudham_vowelsn_AI_1   = "\x5D";

// Old format. No lomger used.
const Amudham_combo_NNAA     = "\x5A";
const Amudham_combo_NNNAA    = "\x42";
const Amudham_combo_RRAA     = "\x41";

//Amudham uses the same symbol for generating vowelsn_AU and consnt_LLA. This is a work around
const Amudham_combo_KAU      = "\x62\x66\x73";
const Amudham_combo_NGAU     = "\x62\x27\x73";
const Amudham_combo_CAU      = "\x62\x72\x73";
const Amudham_combo_JAU      = "\x62\x24\x73";
const Amudham_combo_NYAU     = "\x62\x22\x73";
const Amudham_combo_TTAU     = "\x62\x6C\x73";
const Amudham_combo_NNAU     = "\x62\x7A\x73";
const Amudham_combo_TAU      = "\x62\x6A\x73";
const Amudham_combo_NAU      = "\x62\x65\x73";
const Amudham_combo_NNNAU    = "\x62\x64\x73";
const Amudham_combo_PAU      = "\x62\x67\x73";
const Amudham_combo_MAU      = "\x62\x6B\x73";
const Amudham_combo_YAU      = "\x62\x61\x73";
const Amudham_combo_RAU      = "\x62\x75\x73";
const Amudham_combo_LAU      = "\x62\x79\x73";
const Amudham_combo_VAU      = "\x62\x74\x73";
const Amudham_combo_SSAU     = "\x62\x23\x73";
const Amudham_combo_SAU      = "\x62\x21\x73";
const Amudham_combo_HAU      = "\x62\x51\x73";
const Amudham_combo_LLAU     = "\x62\x73\x73";
const Amudham_combo_ZHAU     = "\x62\x48\x73";
const Amudham_combo_RRAU     = "\x62\x77\x73";
const Amudham_combo_KSHAU    = "\x62\x26\x73";

//Special Combinations
const Amudham_combo_KU      = "\x46";
const Amudham_combo_KUU     = "\x54";
const Amudham_combo_CU      = "\x52";
const Amudham_combo_CUU     = "\x4E";
const Amudham_combo_TTI     = "\x6F";
const Amudham_combo_TTII    = "\x4F";
const Amudham_combo_TTU     = "\x4C";
const Amudham_combo_TTUU    = "\x3F";
const Amudham_combo_NNU     = "\x71";
const Amudham_combo_NNUU_1  = "\x71\x7D";
const Amudham_combo_NNUU_2  = "\x71\x68";
const Amudham_combo_TU      = "\x4A";
const Amudham_combo_TUU_1   = "\x4A\x7D";
const Amudham_combo_TUU_2   = "\x4A\x68";
const Amudham_combo_NU      = "\x45";
const Amudham_combo_NUU_1   = "\x45\x7D";
const Amudham_combo_NUU_2   = "\x45\x68";
const Amudham_combo_NNNU    = "\x44";
const Amudham_combo_NNNUU_1 = "\x44\x7D";
const Amudham_combo_NNNUU_2 = "\x44\x68";
const Amudham_combo_MU      = "\x4B";
const Amudham_combo_MUU     = "\x5C";
const Amudham_combo_RI_2    = "\x68\x70";
const Amudham_combo_RII_2   = "\x68\x50";
const Amudham_combo_RU      = "\x55";
const Amudham_combo_RUU     = "\x2B";
const Amudham_combo_RPULLI_1= "\x68\x3A";
const Amudham_combo_RPULLI_2= "\x68\x3B";
const Amudham_combo_RPULLI_3= "\x68\x40";
const Amudham_combo_LU      = "\x59";
const Amudham_combo_LUU_1   = "\x59\x7D";
const Amudham_combo_LUU_2   = "\x59\x68";
const Amudham_combo_LLU     = "\x53";
const Amudham_combo_LLUU    = "\x7E";
const Amudham_combo_ZHU     = "\x47";
const Amudham_combo_ZHUU    = "\x3D";

const Amudham_combo_RRU     = "\x57";
const Amudham_combo_RRUU_1  = "\x57\x7D";
const Amudham_combo_RRUU_2  = "\x57\x68";

//not matching ascii
const Amudham_EXCLAM        = "\x2A";
const Amudham_COMMA         = "\x2F";
const Amudham_QUESTION      = "\x3E";
const Amudham_SLASH         = "\x5F";
const Amudham_DOLLAR        = "\xC2\x8D";
const Amudham_AMPERSAND     = "\xC2\x8E";
const Amudham_GREATERTHAN   = "\xC5\x92";
const Amudham_PERCENT       = "\xC5\xA0";
const Amudham_SEMICOLON     = "\xC6\x92";
const Amudham_EQUALS        = "\xCB\x86";
const Amudham_COLON         = "\xE2\x80\x9E";
const Amudham_RQTSINGLE     = "\xE2\x80\xA0";
const Amudham_PLUS          = "\xE2\x80\xA1";
const Amudham_LQTSINGLE     = "\xE2\x80\xA6";
const Amudham_ASTERISK      = "\xE2\x80\xB0";

}

$Amudham_toPadma = array();

$Amudham_toPadma[Amudham::Amudham_visarga]  = Padma::Padma_visarga;
$Amudham_toPadma[Amudham::Amudham_virama_1] = Padma::Padma_virama;
$Amudham_toPadma[Amudham::Amudham_virama_2] = Padma::Padma_virama;
$Amudham_toPadma[Amudham::Amudham_virama_3] = Padma::Padma_virama;
$Amudham_toPadma[Amudham::Amudham_vowel_A]  = Padma::Padma_vowel_A;
$Amudham_toPadma[Amudham::Amudham_vowel_AA] = Padma::Padma_vowel_AA;
$Amudham_toPadma[Amudham::Amudham_vowel_I]  = Padma::Padma_vowel_I;
$Amudham_toPadma[Amudham::Amudham_vowel_II] = Padma::Padma_vowel_II;
$Amudham_toPadma[Amudham::Amudham_vowel_U]  = Padma::Padma_vowel_U;
$Amudham_toPadma[Amudham::Amudham_vowel_UU] = Padma::Padma_vowel_UU;
$Amudham_toPadma[Amudham::Amudham_vowel_E]  = Padma::Padma_vowel_E;
$Amudham_toPadma[Amudham::Amudham_vowel_EE] = Padma::Padma_vowel_EE;
$Amudham_toPadma[Amudham::Amudham_vowel_AI] = Padma::Padma_vowel_AI;
$Amudham_toPadma[Amudham::Amudham_vowel_O]  = Padma::Padma_vowel_O;
$Amudham_toPadma[Amudham::Amudham_vowel_OO] = Padma::Padma_vowel_OO;
$Amudham_toPadma[Amudham::Amudham_vowel_AU] = Padma::Padma_vowel_AU;

$Amudham_toPadma[Amudham::Amudham_consnt_KA]  = Padma::Padma_consnt_KA;
$Amudham_toPadma[Amudham::Amudham_consnt_NGA] = Padma::Padma_consnt_NGA;
$Amudham_toPadma[Amudham::Amudham_consnt_CA]  = Padma::Padma_consnt_CA;
$Amudham_toPadma[Amudham::Amudham_consnt_JA]  = Padma::Padma_consnt_JA;
$Amudham_toPadma[Amudham::Amudham_consnt_NYA] = Padma::Padma_consnt_NYA;
$Amudham_toPadma[Amudham::Amudham_consnt_TTA] = Padma::Padma_consnt_TTA;
$Amudham_toPadma[Amudham::Amudham_consnt_NNA] = Padma::Padma_consnt_NNA;
$Amudham_toPadma[Amudham::Amudham_consnt_TA]  = Padma::Padma_consnt_TA;
$Amudham_toPadma[Amudham::Amudham_consnt_NA]  = Padma::Padma_consnt_NA;
$Amudham_toPadma[Amudham::Amudham_consnt_NNNA]= Padma::Padma_consnt_NNNA;
$Amudham_toPadma[Amudham::Amudham_consnt_PA]  = Padma::Padma_consnt_PA;
$Amudham_toPadma[Amudham::Amudham_consnt_MA]  = Padma::Padma_consnt_MA;
$Amudham_toPadma[Amudham::Amudham_consnt_YA]  = Padma::Padma_consnt_YA;
$Amudham_toPadma[Amudham::Amudham_consnt_RA]  = Padma::Padma_consnt_RA;
$Amudham_toPadma[Amudham::Amudham_consnt_LA]  = Padma::Padma_consnt_LA;
$Amudham_toPadma[Amudham::Amudham_consnt_VA]  = Padma::Padma_consnt_VA;
$Amudham_toPadma[Amudham::Amudham_consnt_SSA] = Padma::Padma_consnt_SSA;
$Amudham_toPadma[Amudham::Amudham_consnt_SA]  = Padma::Padma_consnt_SA;
$Amudham_toPadma[Amudham::Amudham_consnt_HA]  = Padma::Padma_consnt_HA;
$Amudham_toPadma[Amudham::Amudham_consnt_LLA] = Padma::Padma_consnt_LLA;
$Amudham_toPadma[Amudham::Amudham_consnt_ZHA] = Padma::Padma_consnt_ZHA;
$Amudham_toPadma[Amudham::Amudham_consnt_RRA] = Padma::Padma_consnt_RRA;
$Amudham_toPadma[Amudham::Amudham_conjct_KSH] = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA;
$Amudham_toPadma[Amudham::Amudham_conjct_SRII]= Padma::Padma_consnt_SA . Padma::Padma_vattu_RA . Padma::Padma_vowelsn_II;

//Gunintamulu
$Amudham_toPadma[Amudham::Amudham_vowelsn_AA]   = Padma::Padma_vowelsn_AA;
$Amudham_toPadma[Amudham::Amudham_vowelsn_I]    = Padma::Padma_vowelsn_I;
$Amudham_toPadma[Amudham::Amudham_vowelsn_II]   = Padma::Padma_vowelsn_II;
$Amudham_toPadma[Amudham::Amudham_vowelsn_U_1]  = Padma::Padma_vowelsn_U;
$Amudham_toPadma[Amudham::Amudham_vowelsn_U_2]  = Padma::Padma_vowelsn_U;
$Amudham_toPadma[Amudham::Amudham_vowelsn_UU_1] = Padma::Padma_vowelsn_UU;
$Amudham_toPadma[Amudham::Amudham_vowelsn_UU_2] = Padma::Padma_vowelsn_UU;
$Amudham_toPadma[Amudham::Amudham_vowelsn_UU_3] = Padma::Padma_vowelsn_UU;
$Amudham_toPadma[Amudham::Amudham_vowelsn_E]    = Padma::Padma_vowelsn_E;
$Amudham_toPadma[Amudham::Amudham_vowelsn_EE]   = Padma::Padma_vowelsn_EE;
$Amudham_toPadma[Amudham::Amudham_vowelsn_AI]   = Padma::Padma_vowelsn_AI;
$Amudham_toPadma[Amudham::Amudham_vowelsn_AI_1] = Padma::Padma_vowelsn_AI;

// Old format. No longer used.
$Amudham_toPadma[Amudham::Amudham_combo_NNAA]  = Padma::Padma_consnt_NNA . Padma::Padma_vowelsn_AA;
$Amudham_toPadma[Amudham::Amudham_combo_NNNAA] = Padma::Padma_consnt_NNNA . Padma::Padma_vowelsn_AA;
$Amudham_toPadma[Amudham::Amudham_combo_RRAA]  = Padma::Padma_consnt_RRA . Padma::Padma_vowelsn_AA;

$Amudham_toPadma[Amudham::Amudham_combo_KAU]     = Padma::Padma_consnt_KA . Padma::Padma_vowelsn_AU;
$Amudham_toPadma[Amudham::Amudham_combo_NGAU]    = Padma::Padma_consnt_NGA . Padma::Padma_vowelsn_AU;
$Amudham_toPadma[Amudham::Amudham_combo_CAU]     = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_AU;
$Amudham_toPadma[Amudham::Amudham_combo_JAU]     = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_AU;
$Amudham_toPadma[Amudham::Amudham_combo_NYAU]    = Padma::Padma_consnt_NYA . Padma::Padma_vowelsn_AU;
$Amudham_toPadma[Amudham::Amudham_combo_TTAU]    = Padma::Padma_consnt_TTA . Padma::Padma_vowelsn_AU;
$Amudham_toPadma[Amudham::Amudham_combo_NNAU]    = Padma::Padma_consnt_NNA . Padma::Padma_vowelsn_AU;
$Amudham_toPadma[Amudham::Amudham_combo_TAU]     = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_AU;
$Amudham_toPadma[Amudham::Amudham_combo_NAU]     = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_AU;
$Amudham_toPadma[Amudham::Amudham_combo_NNNAU]   = Padma::Padma_consnt_NNNA . Padma::Padma_vowelsn_AU;
$Amudham_toPadma[Amudham::Amudham_combo_PAU]     = Padma::Padma_consnt_PA . Padma::Padma_vowelsn_AU;
$Amudham_toPadma[Amudham::Amudham_combo_MAU]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_AU;
$Amudham_toPadma[Amudham::Amudham_combo_YAU]     = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_AU;
$Amudham_toPadma[Amudham::Amudham_combo_RAU]     = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_AU;
$Amudham_toPadma[Amudham::Amudham_combo_LAU]     = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_AU;
$Amudham_toPadma[Amudham::Amudham_combo_VAU]     = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_AU;
$Amudham_toPadma[Amudham::Amudham_combo_SSAU]    = Padma::Padma_consnt_SSA . Padma::Padma_vowelsn_AU;
$Amudham_toPadma[Amudham::Amudham_combo_SAU]     = Padma::Padma_consnt_SA . Padma::Padma_vowelsn_AU;
$Amudham_toPadma[Amudham::Amudham_combo_HAU]     = Padma::Padma_consnt_HA . Padma::Padma_vowelsn_AU;
$Amudham_toPadma[Amudham::Amudham_combo_LLAU]    = Padma::Padma_consnt_LLA . Padma::Padma_vowelsn_AU;
$Amudham_toPadma[Amudham::Amudham_combo_ZHAU]    = Padma::Padma_consnt_ZHA . Padma::Padma_vowelsn_AU;
$Amudham_toPadma[Amudham::Amudham_combo_RRAU]    = Padma::Padma_consnt_RRA . Padma::Padma_vowelsn_AU;
$Amudham_toPadma[Amudham::Amudham_combo_KSHAU]   = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA . Padma::Padma_vowelsn_AU;

//Special Combinations
$Amudham_toPadma[Amudham::Amudham_combo_KU]      = Padma::Padma_consnt_KA . Padma::Padma_vowelsn_U;
$Amudham_toPadma[Amudham::Amudham_combo_KUU]     = Padma::Padma_consnt_KA . Padma::Padma_vowelsn_UU;
$Amudham_toPadma[Amudham::Amudham_combo_CU]      = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_U;
$Amudham_toPadma[Amudham::Amudham_combo_CUU]     = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_UU;
$Amudham_toPadma[Amudham::Amudham_combo_TTI]     = Padma::Padma_consnt_TTA . Padma::Padma_vowelsn_I;
$Amudham_toPadma[Amudham::Amudham_combo_TTII]    = Padma::Padma_consnt_TTA . Padma::Padma_vowelsn_II;
$Amudham_toPadma[Amudham::Amudham_combo_TTU]     = Padma::Padma_consnt_TTA . Padma::Padma_vowelsn_U;
$Amudham_toPadma[Amudham::Amudham_combo_TTUU]    = Padma::Padma_consnt_TTA . Padma::Padma_vowelsn_UU;
$Amudham_toPadma[Amudham::Amudham_combo_NNU]     = Padma::Padma_consnt_NNA . Padma::Padma_vowelsn_U;
$Amudham_toPadma[Amudham::Amudham_combo_NNUU_1]  = Padma::Padma_consnt_NNA . Padma::Padma_vowelsn_UU;
$Amudham_toPadma[Amudham::Amudham_combo_NNUU_2]  = Padma::Padma_consnt_NNA . Padma::Padma_vowelsn_UU;
$Amudham_toPadma[Amudham::Amudham_combo_TU]      = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_U;
$Amudham_toPadma[Amudham::Amudham_combo_TUU_1]   = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_UU;
$Amudham_toPadma[Amudham::Amudham_combo_TUU_2]   = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_UU;
$Amudham_toPadma[Amudham::Amudham_combo_NU]      = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_U;
$Amudham_toPadma[Amudham::Amudham_combo_NUU_1]   = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_UU;
$Amudham_toPadma[Amudham::Amudham_combo_NUU_2]   = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_UU;
$Amudham_toPadma[Amudham::Amudham_combo_NNNU]    = Padma::Padma_consnt_NNNA . Padma::Padma_vowelsn_U;
$Amudham_toPadma[Amudham::Amudham_combo_NNNUU_1] = Padma::Padma_consnt_NNNA . Padma::Padma_vowelsn_UU;
$Amudham_toPadma[Amudham::Amudham_combo_NNNUU_2] = Padma::Padma_consnt_NNNA . Padma::Padma_vowelsn_UU;
$Amudham_toPadma[Amudham::Amudham_combo_MU]      = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_U;
$Amudham_toPadma[Amudham::Amudham_combo_MUU]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_UU;
$Amudham_toPadma[Amudham::Amudham_combo_RI_2]    = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_I;
$Amudham_toPadma[Amudham::Amudham_combo_RII_2]   = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_II;
$Amudham_toPadma[Amudham::Amudham_combo_RU]      = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_U;
$Amudham_toPadma[Amudham::Amudham_combo_RUU]     = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_UU;
$Amudham_toPadma[Amudham::Amudham_combo_RPULLI_1]= Padma::Padma_consnt_RA . Padma::Padma_pulli;
$Amudham_toPadma[Amudham::Amudham_combo_RPULLI_2]= Padma::Padma_consnt_RA . Padma::Padma_pulli;
$Amudham_toPadma[Amudham::Amudham_combo_RPULLI_3]= Padma::Padma_consnt_RA . Padma::Padma_pulli;
$Amudham_toPadma[Amudham::Amudham_combo_LU]      = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_U;
$Amudham_toPadma[Amudham::Amudham_combo_LUU_1]   = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_UU;
$Amudham_toPadma[Amudham::Amudham_combo_LUU_2]   = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_UU;
$Amudham_toPadma[Amudham::Amudham_combo_LLU]     = Padma::Padma_consnt_LLA . Padma::Padma_vowelsn_U;
$Amudham_toPadma[Amudham::Amudham_combo_LLUU]    = Padma::Padma_consnt_LLA . Padma::Padma_vowelsn_UU;
$Amudham_toPadma[Amudham::Amudham_combo_ZHU]     = Padma::Padma_consnt_ZHA . Padma::Padma_vowelsn_U;
$Amudham_toPadma[Amudham::Amudham_combo_ZHUU]    = Padma::Padma_consnt_ZHA . Padma::Padma_vowelsn_UU;
$Amudham_toPadma[Amudham::Amudham_combo_RRU]     = Padma::Padma_consnt_RRA . Padma::Padma_vowelsn_U;
$Amudham_toPadma[Amudham::Amudham_combo_RRUU_1]  = Padma::Padma_consnt_RRA . Padma::Padma_vowelsn_UU;
$Amudham_toPadma[Amudham::Amudham_combo_RRUU_2]  = Padma::Padma_consnt_RRA . Padma::Padma_vowelsn_UU;

$Amudham_toPadma[Amudham::Amudham_EXCLAM]     = "!";
$Amudham_toPadma[Amudham::Amudham_COMMA]      = ",";
$Amudham_toPadma[Amudham::Amudham_QUESTION]   = "?";
$Amudham_toPadma[Amudham::Amudham_SLASH]      = "/";
$Amudham_toPadma[Amudham::Amudham_DOLLAR]     = "$";
$Amudham_toPadma[Amudham::Amudham_AMPERSAND]  = "&";
$Amudham_toPadma[Amudham::Amudham_GREATERTHAN]= ">";
$Amudham_toPadma[Amudham::Amudham_PERCENT]    = "%";
$Amudham_toPadma[Amudham::Amudham_SEMICOLON]  = ";";
$Amudham_toPadma[Amudham::Amudham_EQUALS]     = "=";
$Amudham_toPadma[Amudham::Amudham_COLON]      = ":";
$Amudham_toPadma[Amudham::Amudham_RQTSINGLE]  = "\xE2\x80\x99";
$Amudham_toPadma[Amudham::Amudham_PLUS]       = ".";
$Amudham_toPadma[Amudham::Amudham_LQTSINGLE]  = "\xE2\x80\x98";
$Amudham_toPadma[Amudham::Amudham_ASTERISK]   = "*";

$Amudham_redundantList = array();

$Amudham_prefixList = array();
$Amudham_prefixList[Amudham::Amudham_vowelsn_E]   = true;
$Amudham_prefixList[Amudham::Amudham_vowelsn_EE]  = true;
$Amudham_prefixList[Amudham::Amudham_vowelsn_AI]  = true;
$Amudham_prefixList[Amudham::Amudham_vowelsn_AI_1]= true;

$Amudham_overloadList = array();
$Amudham_overloadList[Amudham::Amudham_vowel_O]   = true;
$Amudham_overloadList[Amudham::Amudham_vowelsn_E] = true;
$Amudham_overloadList[Amudham::Amudham_vowelsn_AA]= true;
/*$Amudham_overloadList["\x62\x66"]    = true;
$Amudham_overloadList["\x62\x27"]    = true;
$Amudham_overloadList["\x62\x72"]    = true;
$Amudham_overloadList["\x62\x24"]    = true;
$Amudham_overloadList["\x62\x22"]    = true;
$Amudham_overloadList["\x62\x6C"]    = true;
$Amudham_overloadList["\x62\x7A"]    = true;
$Amudham_overloadList["\x62\x6A"]    = true;
$Amudham_overloadList["\x62\x65"]    = true;
$Amudham_overloadList["\x62\x64"]    = true;
$Amudham_overloadList["\x62\x67"]    = true;
$Amudham_overloadList["\x62\x6B"]    = true;
$Amudham_overloadList["\x62\x61"]    = true;
$Amudham_overloadList["\x62\x75"]    = true;
$Amudham_overloadList["\x62\x79"]    = true;
$Amudham_overloadList["\x62\x74"]    = true;
$Amudham_overloadList["\x62\x23"]    = true;
$Amudham_overloadList["\x62\x21"]    = true;
$Amudham_overloadList["\x62\x51"]    = true;
$Amudham_overloadList["\x62\x73"]    = true;
$Amudham_overloadList["\x62\x48"]    = true;
$Amudham_overloadList["\x62\x77"]    = true;
$Amudham_overloadList["\x62\x26"]    = true;*/

$Amudham_overloadList[Amudham::Amudham_combo_NNU]  = true;
$Amudham_overloadList[Amudham::Amudham_combo_TU]   = true;
$Amudham_overloadList[Amudham::Amudham_combo_NU]   = true;
$Amudham_overloadList[Amudham::Amudham_combo_NNNU] = true;
$Amudham_overloadList[Amudham::Amudham_combo_LU]   = true;
$Amudham_overloadList[Amudham::Amudham_combo_RRU]  = true;

function Amudham_initialize()
{
    global $fontinfo;

    $fontinfo["amudham"]["language"] = "Tamil";  
    $fontinfo["amudham"]["class"] = "Amudham";   
}
?>
