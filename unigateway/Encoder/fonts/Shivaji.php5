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

//Shivaji
//Generate the slightly different lookup tables from Shusha

include_once(dirname(__FILE__) . "/Shusha.php5");

class Shivaji extends Shusha
{
function Shivaji()
{
}

function initialize()
{
    global $Shusha_toPadma;
    global $Shivaji_toPadma;
    foreach($Shusha_toPadma as $name => $value)
      $Shivaji_toPadma[$name] = $Shusha_toPadma[$name] = $value;
}

//Devanagari digits
const Shivaji_digit_ZERO     = "\x30";
const Shivaji_digit_ONE      = "\x31";
const Shivaji_digit_TWO      = "\x32";
const Shivaji_digit_THREE    = "\x33";
const Shivaji_digit_FOUR     = "\x34";
const Shivaji_digit_FIVE     = "\x35";
const Shivaji_digit_SIX      = "\x36";
const Shivaji_digit_SEVEN    = "\x37";
const Shivaji_digit_EIGHT    = "\x38";
const Shivaji_digit_NINE     = "\x39";

const Shivaji_halffm_PA      = "\xC3\xA1";

}
$Shivaji_toPadma = Array();

$Shivaji_toPadma[Shivaji::Shivaji_digit_ZERO]    = Padma::Padma_digit_ZERO;
$Shivaji_toPadma[Shivaji::Shivaji_digit_ONE]     = Padma::Padma_digit_ONE;
$Shivaji_toPadma[Shivaji::Shivaji_digit_TWO]     = Padma::Padma_digit_TWO;
$Shivaji_toPadma[Shivaji::Shivaji_digit_THREE]   = Padma::Padma_digit_THREE;
$Shivaji_toPadma[Shivaji::Shivaji_digit_FOUR]    = Padma::Padma_digit_FOUR;
$Shivaji_toPadma[Shivaji::Shivaji_digit_FIVE]    = Padma::Padma_digit_FIVE;
$Shivaji_toPadma[Shivaji::Shivaji_digit_SIX]     = Padma::Padma_digit_SIX;
$Shivaji_toPadma[Shivaji::Shivaji_digit_SEVEN]   = Padma::Padma_digit_SEVEN;
$Shivaji_toPadma[Shivaji::Shivaji_digit_EIGHT]   = Padma::Padma_digit_EIGHT;
$Shivaji_toPadma[Shivaji::Shivaji_digit_NINE]    = Padma::Padma_digit_NINE;

$Shivaji_toPadma[Shivaji::Shivaji_halffm_PA]     = Padma::Padma_halffm_PA;

function Shivaji_initialize()
{
    global $fontinfo;

    $fontinfo["shivaji"]["language"] = "Devanagari";
    $fontinfo["shivaji"]["class"] = "Shivaji";
}

?>
