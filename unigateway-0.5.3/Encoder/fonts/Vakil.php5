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

//Vakil
//Generate the slightly different lookup tables from Shusha

include_once(dirname(__FILE__) . "/Shusha.php5");

class Vakil extends Shusha
{
function Vakil()
{
}

function initialize()
{
    global $Vakil_toPadma;
    global $Shusha_toPadma;
      foreach($Shusha_toPadma as $name => $value)
        $Vakil_toPadma[$name] = $Shusha_toPadma[$name] = $value;

    //overwrite vakil mods
    $Vakil_toPadma[Vakil::Vakil_PERIOD] = '.';
    $Vakil_toPadma[Vakil::Vakil_consnt_JA] = Padma::Padma_consnt_JA;
    $Vakil_toPadma[Vakil::Vakil_combo_JII] = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_II;
}

//Gujarati digits
const Vakil_digit_ZERO     = "\x30";
const Vakil_digit_ONE      = "\x31";
const Vakil_digit_TWO      = "\x32";
const Vakil_digit_THREE    = "\x33";
const Vakil_digit_FOUR     = "\x34";
const Vakil_digit_FIVE     = "\x35";
const Vakil_digit_SIX      = "\x36";
const Vakil_digit_SEVEN    = "\x37";
const Vakil_digit_EIGHT    = "\x38";
const Vakil_digit_NINE     = "\x39";

const Vakil_PERIOD         = "\x2E";
const Vakil_consnt_JA      = "\x6A";
const Vakil_combo_JII      = "\xC5\xB8";
}
$Vakil_toPadma = Array();

$Vakil_toPadma[Vakil::Vakil_digit_ZERO]    = Padma::Padma_digit_ZERO;
$Vakil_toPadma[Vakil::Vakil_digit_ONE]     = Padma::Padma_digit_ONE;
$Vakil_toPadma[Vakil::Vakil_digit_TWO]     = Padma::Padma_digit_TWO;
$Vakil_toPadma[Vakil::Vakil_digit_THREE]   = Padma::Padma_digit_THREE;
$Vakil_toPadma[Vakil::Vakil_digit_FOUR]    = Padma::Padma_digit_FOUR;
$Vakil_toPadma[Vakil::Vakil_digit_FIVE]    = Padma::Padma_digit_FIVE;
$Vakil_toPadma[Vakil::Vakil_digit_SIX]     = Padma::Padma_digit_SIX;
$Vakil_toPadma[Vakil::Vakil_digit_SEVEN]   = Padma::Padma_digit_SEVEN;
$Vakil_toPadma[Vakil::Vakil_digit_EIGHT]   = Padma::Padma_digit_EIGHT;
$Vakil_toPadma[Vakil::Vakil_digit_NINE]    = Padma::Padma_digit_NINE;

function Vakil_initialize()
{
    global $fontinfo;

    $fontinfo["vakil"]["language"] = "Gujarati";
    $fontinfo["vakil"]["class"] = "Vakil";
}

?>
