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

define('Parser_state_START', 0);
define('Parser_state_CONSNT', 1);
define('Parser_state_PREFIX' , 2);
define('Parser_state_HALFORM' , 3);

class Parser 
{
    function Parser($input,$encoding) 
    {
        $this->index = 0;
        $this->length =utf8_strlen($input);
        $this->text = $input;
        $this->state = Parser_state_START;
        $this->cache_key=null;
        $this->cache_value=null ;
        $this->encoding = $encoding;
    }
     
    function more()
    {
        return ($this->index < $this->length);
    }

    function updateSymbolType($type)
    {
        return $type;
    }

    function handleInput($value, $key, $current)
    {
        $old_type = Padma::Padma_type_unknown;
        $symbol = $value;
        $arguments_length=func_num_args();
        if ($symbol != null)
        {
            $str_exploded[0]=utf8_substr($symbol,0,1);
            $old_type = Padma::getType($str_exploded[0]);
        }
        else 
        {
            $symbol = $key;
        }                           
        $prefix = false;
        $suffix = false;
        
        if ($arguments_length >= 4)
            $prefix = func_get_arg(3);
        if ($arguments_length >= 5)
            $suffix =func_get_arg(4);
            
        $type = $this->updateSymbolType($old_type);                
        if ($type != $old_type)
        {
            $symbol = Padma::dependentForm($symbol);
        }
        
        switch ($this->state) 
        {
            case Parser_state_START://0
            case Parser_state_PREFIX://2
            {
                $this->index += utf8_strlen($key);
                $current->update($symbol, $type, $prefix, $suffix);
                if ($prefix == true)
                {
                    $this->state = Parser_state_PREFIX;
                } 
                else {
                    if ($type == Padma::Padma_type_accu || 
                        $type == Padma::Padma_type_digit ||
                        $type == Padma::Padma_type_unknown)
                    {  //Current syllable is complete
                        $this->state = Parser_state_START;
                    }
                    else if ($type == Padma::Padma_type_hallu) 
                    {            //Wait for more
                        $this->state = Parser_state_CONSNT;
                    }
                    else if ($type == Padma::Padma_type_half_form) 
                    {
                        $this->state = Parser_state_HALFORM;
                    }
                    else 
                    {   //gunintalu, vattulu and vowel/consonant modifiers 
                        //should not appear in isolation, accept it silently
                        $this->state = Parser_state_START;
                     }
                }
                return;
            }
            case Parser_state_CONSNT://1
            case Parser_state_HALFORM://3
            {
                $nextTypes = Padma::Padma_type_accu | 
                             Padma::Padma_type_digit |
                             Padma::Padma_type_unknown;
                if ($this->state == Parser_state_CONSNT)
                {
                    $nextTypes |= Padma::Padma_type_hallu | Padma::Padma_type_half_form;
                }
                if ((($type & $nextTypes) || $prefix) && !$suffix) 
                { 
                       $this->cache_key = $key;
                       $this->cache_value = $value;
                       $this->state = Parser_state_START;
                       $this->handleConsonantTermination($current);
                        return;
                }
                if ($this->state == Parser_state_HALFORM && $type==Padma::Padma_type_hallu)
                {
                    $this->state = Parser_state_CONSNT;
                }
                
                $this->index += utf8_strlen($key);
                if ($this->isCurrentSyllableComplete($type)) 
                {
                    $this->state = Parser_state_START;
                }
                $current->update($symbol, $type, $prefix, $suffix);
                return;
            }
        }
        //should never reach here
        //Figure out an assertion
        return;
    }
}
?>
