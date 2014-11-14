<?php
/* ***** BEGIN LICENSE BLOCK *****
 *
 *  This file is originally part of Padma.
 *
 *  Copyright (C) 2005-2006 Nagarjuna Venna <vnagarjuna@yahoo.com>
 *  Copyright (C) 2006 Saravana Kumar  <saravanannkl@gmail.com> 
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

include_once (dirname(__FILE__) . "/TSCII.php5");

//Single file contains all fonts of TSCII encoding
class TSCMylai extends  TSCII
{
function TSCMylai()
{
}

//The interface every dynamic font encoding should implement
//TSCMylai.maxLookupLen = TSCII.maxLookupLen;
var $fontFace     = "TSCMylai";
var $displayName  = "TSCMylai";
var $script       = Padma::Padma_script_TAMIL;

function lookup($str) 
{
    return TSCII::lookup($str);
}

function isPrefixSymbol  ($str)
{
    return TSCII::isPrefixSymbol($str);
}

function isOverloaded  ($str)
{
    return TSCII::isOverloaded($str);
}

function handleTwoPartVowelSigns  ($sign1, $sign2)
{
    return TSCII::handleTwoPartVowelSigns($sign1, $sign2);
}

function isRedundant  ($str)
{
    return TSCII::isRedundant($str);
}

function preprocessMessage  ($input)
{
    return TSCII::preprocessMessage($input);
}
}
/////////////////////////////////////////////////////////////////////////////
class TSCComic extends  TSCII
{
function TSCComic()
{
}

//The interface every dynamic font encoding should implement
//var $maxLookupLen = TSCII::maxLookupLen;
var $fontFace     = "TSCComic";
var $displayName  = "TSCComic";
var $script       = Padma::Padma_script_TAMIL;

function lookup  ($str) 
{
    return TSCII::lookup($str);
}

function isPrefixSymbol  ($str)
{
    return TSCII::isPrefixSymbol($str);
}

function isOverloaded  ($str)
{
    return TSCII::isOverloaded($str);
}

function handleTwoPartVowelSigns  ($sign1, $sign2)
{
    return TSCII::handleTwoPartVowelSigns($sign1, $sign2);
}

function isRedundant  ($str)
{
    return TSCII::isRedundant($str);
}

function preprocessMessage  ($input)
{
    return TSCII::preprocessMessage($input);
}
}
/////////////////////////////////////////////////////////////////////////////
class TSCJanani extends  TSCII {
function TSCJanani()
{
}

//The interface every dynamic font encoding should implement
//var $maxLookupLen = TSCII::maxLookupLen;
var $fontFace     = "TSC_Janani";
var $displayName  = "TSCJanani";
var $script       = Padma::Padma_script_TAMIL;

function lookup  ($str) 
{
    return TSCII::lookup($str);
}

function isPrefixSymbol  ($str)
{
    return TSCII::isPrefixSymbol($str);
}

function isOverloaded  ($str)
{
    return TSCII::isOverloaded($str);
}

function handleTwoPartVowelSigns  ($sign1, $sign2)
{
    return TSCII::handleTwoPartVowelSigns($sign1, $sign2);
}

function isRedundant  ($str)
{
    return TSCII::isRedundant($str);
}

function preprocessMessage  ($input)
{
    return TSCII::preprocessMessage($input);
}
}
/////////////////////////////////////////////////////////////////////////////
class TSCKomathi extends  TSCII {
 
function TSCKomathi()
{
}

//The interface every dynamic font encoding should implement
//var $maxLookupLen = TSCII::maxLookupLen;
var $fontFace     = "TSC Komathi";
var $displayName  = "TSCKomathi";
var $script       = Padma::Padma_script_TAMIL;

function lookup  ($str) 
{
    return TSCII::lookup($str);
}

function isPrefixSymbol  ($str)
{
    return TSCII::isPrefixSymbol($str);
}

function isOverloaded  ($str)
{
    return TSCII::isOverloaded($str);
}

function handleTwoPartVowelSigns  ($sign1, $sign2)
{
    return TSCII::handleTwoPartVowelSigns($sign1, $sign2);
}

function isRedundant  ($str)
{
    return TSCII::isRedundant($str);
}

function preprocessMessage  ($input)
{
    return TSCII::preprocessMessage($input);
}

}
/////////////////////////////////////////////////////////////////////////////
class TSCSri  extends  TSCII {

function TSCSri()
{
}

//The interface every dynamic font encoding should implement
//var $maxLookupLen = TSCII::maxLookupLen;
var $fontFace     = "TSC-Sri";
var $displayName  = "TSCSri";
var $script       = Padma::Padma_script_TAMIL;

function lookup  ($str) 
{
    return TSCII::lookup($str);
}

function isPrefixSymbol  ($str)
{
    return TSCII::isPrefixSymbol($str);
}

function isOverloaded  ($str)
{
    return TSCII::isOverloaded($str);
}

function handleTwoPartVowelSigns  ($sign1, $sign2)
{
    return TSCII::handleTwoPartVowelSigns($sign1, $sign2);
}

function isRedundant  ($str)
{
    return TSCII::isRedundant($str);
}

function preprocessMessage  ($input)
{
    return TSCII::preprocessMessage($input);
}
}
/////////////////////////////////////////////////////////////////////////////
class TSCTimes extends TSCII {

function TSCTimes()
{
}

//The interface every dynamic font encoding should implement
//var $maxLookupLen = TSCII::maxLookupLen;
var $fontFace     = "TSCTimes";
var $displayName  = "TSCTimes";
var $script       = Padma::Padma_script_TAMIL;

function lookup  ($str) 
{
    return TSCII::lookup($str);
}

function isPrefixSymbol  ($str)
{
    return TSCII::isPrefixSymbol($str);
}

function isOverloaded  ($str)
{
    return TSCII::isOverloaded($str);
}

function handleTwoPartVowelSigns  ($sign1, $sign2)
{
    return TSCII::handleTwoPartVowelSigns($sign1, $sign2);
}

function isRedundant  ($str)
{
    return TSCII::isRedundant($str);
}

function preprocessMessage  ($input)
{
    return TSCII::preprocessMessage($input);
}
}
/////////////////////////////////////////////////////////////////////////////
class TSCAandaal extends TSCII {
function TSCAandaal()
{
}

//The interface every dynamic font encoding should implement
//var $maxLookupLen = TSCII::maxLookupLen;
var $fontFace     = "TSC_Aandaal";
var $displayName  = "TSCAandaal";
var $script       = Padma::Padma_script_TAMIL;

function lookup  ($str) 
{
    return TSCII::lookup($str);
}

function isPrefixSymbol  ($str)
{
    return TSCII::isPrefixSymbol($str);
}

function isOverloaded  ($str)
{
    return TSCII::isOverloaded($str);
}

function handleTwoPartVowelSigns  ($sign1, $sign2)
{
    return TSCII::handleTwoPartVowelSigns($sign1, $sign2);
}

function isRedundant  ($str)
{
    return TSCII::isRedundant($str);
}

function preprocessMessage  ($input)
{
    return TSCII::preprocessMessage($input);
}
}
/////////////////////////////////////////////////////////////////////////////
class TSCAparanarPdf extends TSCII {
function TSCAparanarPdf()
{
}

//The interface every dynamic font encoding should implement
//var $maxLookupLen = TSCII::maxLookupLen;
var $fontFace     = "TSC_AparanarPDF";
var $displayName  = "TSCAparanarPdf";
var $script       = Padma::Padma_script_TAMIL;

function lookup  ($str) 
{
    return TSCII::lookup($str);
}

function isPrefixSymbol  ($str)
{
    return TSCII::isPrefixSymbol($str);
}

function isOverloaded  ($str)
{
    return TSCII::isOverloaded($str);
}

function handleTwoPartVowelSigns  ($sign1, $sign2)
{
    return TSCII::handleTwoPartVowelSigns($sign1, $sign2);
}

function isRedundant  ($str)
{
    return TSCII::isRedundant($str);
}

function preprocessMessage  ($input)
{
    return TSCII::preprocessMessage($input);
}
}
/////////////////////////////////////////////////////////////////////////////
class TSCKannadaasan  extends TSCII {
function TSCKannadaasan()
{
}

//The interface every dynamic font encoding should implement
//var $maxLookupLen = TSCII::maxLookupLen;
var $fontFace     = "TSC_Kannadaasan";
var $displayName  = "TSCKannadaasan";
var $script       = Padma::Padma_script_TAMIL;

function lookup  ($str) 
{
    return TSCII::lookup($str);
}

function isPrefixSymbol  ($str)
{
    return TSCII::isPrefixSymbol($str);
}

function isOverloaded  ($str)
{
    return TSCII::isOverloaded($str);
}

function handleTwoPartVowelSigns  ($sign1, $sign2)
{
    return TSCII::handleTwoPartVowelSigns($sign1, $sign2);
}

function isRedundant  ($str)
{
    return TSCII::isRedundant($str);
}

function preprocessMessage  ($input)
{
    return TSCII::preprocessMessage($input);
}
}
/////////////////////////////////////////////////////////////////////////////

class TSCParanbold extends TSCII {
function TSCParanbold()
{
}

//The interface every dynamic font encoding should implement
//var $maxLookupLen = TSCII::maxLookupLen;
var $fontFace     = "TSC_Paranbold";
var $displayName  = "TSCParanbold";
var $script       = Padma::Padma_script_TAMIL;

function lookup  ($str) 
{
    return TSCII::lookup($str);
}

function isPrefixSymbol  ($str)
{
    return TSCII::isPrefixSymbol($str);
}

function isOverloaded  ($str)
{
    return TSCII::isOverloaded($str);
}

function handleTwoPartVowelSigns  ($sign1, $sign2)
{
    return TSCII::handleTwoPartVowelSigns($sign1, $sign2);
}

function isRedundant  ($str)
{
    return TSCII::isRedundant($str);
}

function preprocessMessage  ($input)
{
    return TSCII::preprocessMessage($input);
}
}
/////////////////////////////////////////////////////////////////////////////

class TSCParanar extends TSCII {
function TSCParanar()
{
}

//The interface every dynamic font encoding should implement
//var $maxLookupLen = TSCII::maxLookupLen;
var $fontFace     = "TSC_Paranar";
var $displayName  = "TSCParanar";
var $script       = Padma::Padma_script_TAMIL;

function lookup  ($str) 
{
    return TSCII::lookup($str);
}

function isPrefixSymbol  ($str)
{
    return TSCII::isPrefixSymbol($str);
}

function isOverloaded  ($str)
{
    return TSCII::isOverloaded($str);
}

function handleTwoPartVowelSigns  ($sign1, $sign2)
{
    return TSCII::handleTwoPartVowelSigns($sign1, $sign2);
}

function isRedundant  ($str)
{
    return TSCII::isRedundant($str);
}

function preprocessMessage  ($input)
{
    return TSCII::preprocessMessage($input);
}

}
/////////////////////////////////////////////////////////////////////////////

class TSCParanarPdf extends TSCII {
function TSCParanarPdf()
{
}

//The interface every dynamic font encoding should implement
//var $maxLookupLen = TSCII::maxLookupLen;
var $fontFace     = "TSC_ParanarPDF";
var $displayName  = "TSCParanarPdf";
var $script       = Padma::Padma_script_TAMIL;

function lookup  ($str) 
{
    return TSCII::lookup($str);
}

function isPrefixSymbol  ($str)
{
    return TSCII::isPrefixSymbol($str);
}

function isOverloaded  ($str)
{
    return TSCII::isOverloaded($str);
}

function handleTwoPartVowelSigns  ($sign1, $sign2)
{
    return TSCII::handleTwoPartVowelSigns($sign1, $sign2);
}

function isRedundant  ($str)
{
    return TSCII::isRedundant($str);
}

function preprocessMessage  ($input)
{
    return TSCII::preprocessMessage($input);
}
}
/////////////////////////////////////////////////////////////////////////////

class TSCAvarangal extends TSCII {
function TSCAvarangal()
{
}

//The interface every dynamic font encoding should implement
//var $maxLookupLen = TSCII::maxLookupLen;
var $fontFace     = "TSC_Avarangal";
var $displayName  = "TSCAvarangal";
var $script       = Padma::Padma_script_TAMIL;

function lookup  ($str) 
{
    return TSCII::lookup($str);
}

function isPrefixSymbol  ($str)
{
    return TSCII::isPrefixSymbol($str);
}

function isOverloaded  ($str)
{
    return TSCII::isOverloaded($str);
}

function handleTwoPartVowelSigns  ($sign1, $sign2)
{
    return TSCII::handleTwoPartVowelSigns($sign1, $sign2);
}

function isRedundant  ($str)
{
    return TSCII::isRedundant($str);
}

function preprocessMessage  ($input)
{
    return TSCII::preprocessMessage($input);
}
}
/////////////////////////////////////////////////////////////////////////////

class TSCAvarangalFxd extends TSCII {
function TSCAvarangalFxd()
{
}

//The interface every dynamic font encoding should implement
//var $maxLookupLen = TSCII::maxLookupLen;
var $fontFace     = "TSC_AvarangalFxd";
var $displayName  = "TSCAvarangalFxd";
var $script       = Padma::Padma_script_TAMIL;

function lookup  ($str) 
{
    return TSCII::lookup($str);
}

function isPrefixSymbol  ($str)
{
    return TSCII::isPrefixSymbol($str);
}

function isOverloaded  ($str)
{
    return TSCII::isOverloaded($str);
}

function handleTwoPartVowelSigns  ($sign1, $sign2)
{
    return TSCII::handleTwoPartVowelSigns($sign1, $sign2);
}

function isRedundant  ($str)
{
    return TSCII::isRedundant($str);
}

function preprocessMessage  ($input)
{
    return TSCII::preprocessMessage($input);
}
}
/////////////////////////////////////////////////////////////////////////////

class TSCThunaivan extends TSCII {
function TSCThunaivan()
{
}

//The interface every dynamic font encoding should implement
//var $maxLookupLen = TSCII::maxLookupLen;
var $fontFace     = "TSC_Thunaivan";
var $displayName  = "TSCThunaivan";
var $script       = Padma::Padma_script_TAMIL;

function lookup  ($str) 
{
    return TSCII::lookup($str);
}

function isPrefixSymbol  ($str)
{
    return TSCII::isPrefixSymbol($str);
}

function isOverloaded  ($str)
{
    return TSCII::isOverloaded($str);
}

function handleTwoPartVowelSigns  ($sign1, $sign2)
{
    return TSCII::handleTwoPartVowelSigns($sign1, $sign2);
}

function isRedundant  ($str)
{
    return TSCII::isRedundant($str);
}

function preprocessMessage  ($input)
{
    return TSCII::preprocessMessage($input);
}
}
/////////////////////////////////////////////////////////////////////////////

class TSCNattai extends TSCII {
function TSCNattai()
{
}

//The interface every dynamic font encoding should implement
//var $maxLookupLen = TSCII::maxLookupLen;
var $fontFace     = "TSC Nattai";
var $displayName  = "TSCNattai";
var $script       = Padma::Padma_script_TAMIL;

function lookup  ($str) 
{
    return TSCII::lookup($str);
}

function isPrefixSymbol  ($str)
{
    return TSCII::isPrefixSymbol($str);
}

function isOverloaded  ($str)
{
    return TSCII::isOverloaded($str);
}

function handleTwoPartVowelSigns  ($sign1, $sign2)
{
    return TSCII::handleTwoPartVowelSigns($sign1, $sign2);
}

function isRedundant  ($str)
{
    return TSCII::isRedundant($str);
}

function preprocessMessage  ($input)
{
    return TSCII::preprocessMessage($input);
}
}
/////////////////////////////////////////////////////////////////////////////

class TSCu_InaiMathi extends TSCII {
function TSCu_InaiMathi()
{
}

//The interface every dynamic font encoding should implement
//var $maxLookupLen = TSCII::maxLookupLen;
var $fontFace     = "TSCu_InaiMathi";
var $displayName  = "TSCu_InaiMathi";
var $script       = Padma::Padma_script_TAMIL;

function lookup  ($str)
{
    return TSCII::lookup($str);
}

function isPrefixSymbol  ($str)
{
    return TSCII::isPrefixSymbol($str);
}

function isOverloaded  ($str)
{
    return TSCII::isOverloaded($str);
}

function handleTwoPartVowelSigns  ($sign1, $sign2)
{
    return TSCII::handleTwoPartVowelSigns($sign1, $sign2);
}

function isRedundant  ($str)
{
    return TSCII::isRedundant($str);
}

function preprocessMessage  ($input)
{
    return TSCII::preprocessMessage($input);
}
}
/////////////////////////////////////////////////////////////////////////////
function TSCII_Fonts_initialize()
{
    global $fontinfo;
     $fontinfo["tscmylai"]["language"] = "Tamil";
     $fontinfo["tscmylai"]["class"] = "TSCMylai";
     $fontinfo["tsccomic"]["language"] = "Tamil";
     $fontinfo["tsccomic"]["class"] = "TSCComic";
     $fontinfo["tsc_janani"]["language"] = "Tamil";
     $fontinfo["tsc_janani"]["class"] = "TSCJanani";
     $fontinfo["tsc komathi"]["language"] = "Tamil";
     $fontinfo["tsc komathi"]["class"] = "TSCKomathi";
     $fontinfo["tsc-sri"]["language"] = "Tamil";
     $fontinfo["tsc-sri"]["class"] = "TSCSri";
     $fontinfo["tsctimes"]["language"] = "Tamil";
     $fontinfo["tsctimes"]["class"] = "TSCTimes";
     $fontinfo["tsc_aandaal"]["language"] = "Tamil";
     $fontinfo["tsc_aandaal"]["class"] = "TSCAandaal";
     $fontinfo["tsc_aparanarpdf"]["language"] = "Tamil";
     $fontinfo["tsc_aparanarpdf"]["class"] = "TSCAparanarPdf";
     $fontinfo["tsc_kannadaasan"]["language"] = "Tamil";
     $fontinfo["tsc_kannadaasan"]["class"] = "TSCKannadaasan";
     $fontinfo["tsc_paranbold"]["language"] = "Tamil";
     $fontinfo["tsc_paranbold"]["class"] = "TSCParanbold";
     $fontinfo["tsc_paranar"]["language"] = "Tamil";
     $fontinfo["tsc_paranar"]["class"] = "TSCParanar";
     $fontinfo["tsc_paranarpdf"]["language"] = "Tamil";
     $fontinfo["tsc_paranarpdf"]["class"] = "TSCParanarPdf";
     $fontinfo["tsc_avarangal"]["language"] = "Tamil";
     $fontinfo["tsc_avarangal"]["class"] = "TSCAvarangal";
     $fontinfo["tsc_avarangalfxd"]["language"] = "Tamil";
     $fontinfo["tsc_avarangalfxd"]["class"] = "TSCAvarangalFxd";
     $fontinfo["tsc_thunaivan"]["language"] = "Tamil";
     $fontinfo["tsc_thunaivan"]["class"] = "TSCThunaivan";
     $fontinfo["tsc nattai"]["language"] = "Tamil";
     $fontinfo["tsc nattai"]["class"] = "TSCNattai";
     $fontinfo["tscu_inaimathi"]["language"] = "Tamil";
     $fontinfo["tscu_inaimathi"]["class"] = "TSCu_InaiMathi";
}
?>
