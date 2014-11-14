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

class Syllable 
{
    function Syllable() 
    {
        $this->body = null;
        $this->prefix_gunintam = "";
        $this->gunintam = "";
        $this->prefix_vattu = "";
        $this->vowel_modifier = "";
        $this->cons_modifier = "";
    }
    
    function getSyllable()
    {
        return $this->body.$this->cons_modifier.$this->gunintam.$this->vowel_modifier;
    }
    
    function getLength()
    {
    
        return utf8_strlen($this->body) + utf8_strlen($this->prefix_gunintam) + 
               utf8_strlen($this->gunintam) + utf8_strlen($this->prefix_vattu) +
               utf8_strlen($this->cons_modifier) + utf8_strlen($this->vowel_modifier);
    }
    
    function foldGunintam()
    {
        $this->gunintam .= $this->prefix_gunintam;
        $this->prefix_gunintam = "";
    }
    
    function foldConsonantModifiers()
    {
        $this->body .= $this->prefix_vattu;
        $this->prefix_vattu = "";
    }
    
    function update ($str, $type, $prefix, $suffix)
    {
        $str_len=utf8_strlen($str);
        $str_exploded = Array();

        for($count=0;$count<$str_len;$count++)
    	{
            $str_exploded[$count]=utf8_substr($str,$count,1);
        }
        for($i = 0; $i < count($str_exploded); ++$i)
        {
            if ($i != 0)
                $type = Padma::getType($str_exploded[$i]);
            if ($type == Padma::Padma_type_accu ||
    	    $type == Padma::Padma_type_digit ||
    	    $type == Padma::Padma_type_hallu ||
    	    $type == Padma::Padma_type_unknown)
    	    {
                $this->body.=  $str_exploded[$i];
    	    }
            else if ($type == Padma::Padma_type_half_form) 
    	    {
                if ($suffix)
    	        {
                    $this->body = $str_exploded[$i].$this->body;
                }
                else $this->body =  $this->body.$str_exploded[$i];
            }
            else if ($type == Padma::Padma_type_gunintam) 
    	    {
                if ($prefix)
                    $this->prefix_gunintam = $this->prefix_gunintam.$str_exploded[$i];
                else $this->gunintam =$this->gunintam.$str_exploded[$i];
            }
            else if ($type == Padma::Padma_type_vattu) 
    	    {
                if ($prefix)
                    $this->prefix_vattu = $this->prefix_vattu.$str_exploded[$i];
    	        else $this->body = $this->body.$str_exploded[$i];
            }
            else if ($type == Padma::Padma_type_accu_mod)
                $this->vowel_modifier =  $this->vowel_modifier.$str_exploded[$i];
            else if ($type == Padma::Padma_type_hallu_mod)
                $this->cons_modifier = $this->cons_modifier.$str_exploded[$i];
        }
    }
}
?>
