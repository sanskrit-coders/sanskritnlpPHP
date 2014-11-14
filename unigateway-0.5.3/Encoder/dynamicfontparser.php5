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

include_once(dirname(__FILE__) . "/parser.php5");

class DynamicFontParser extends Parser
{
    function DynamicFontParser($input,$encoding) 
    {
        parent::Parser($input,$encoding);
        $this->index = 0;
     
        if (method_exists($encoding,'preprocessMessage'))
        {
            $this->text = $encoding->preprocessMessage($input);
        }
        else 
        {
            $this->text = $this->removeRedundantSymbols($input, $encoding);
        }
         
        $this->length = utf8_strlen($this->text);
        $this->encoding = $encoding;
   
        if (!isset($encoding->hasSuffixes) || $encoding->hasSuffixes == false)
            $this->hasSuffixes = false;
        else 
            $this->hasSuffixes = true;
    }
    
    function removeRedundantSymbols($input, $encoding)
    {
        $output = "";
        $input_len= utf8_strlen($input);
        for($i = 0; $i < $input_len; ++$i)
        {
            $cur = utf8_substr($input,$i,1);
            if (!$encoding->isRedundant($cur))
                $output .= $cur;
        }
        return $output;
    }

    function next()
    {
        $response = new Syllable();
        
        for($remaining = ($this->length - $this->index); $remaining > 0; $remaining = ($this->length - $this->index))
        {
            $key = null; $value = null;

            if ($this->cache_key == null) 
            {
                $maxLookupLen = $remaining > $this->encoding->maxLookupLen ? $this->encoding->maxLookupLen : $remaining;

                for($i = 1; $i <= $maxLookupLen; $i++) 
                {
                    $lookup_key = utf8_substr($this->text,$this->index,$i);
                    $lookup_value = $this->encoding->lookup($lookup_key);

                    if ($lookup_value == null) 
                    {
                        if ($key == null)
                            $key = $lookup_key;
                    }
                    else 
                    {
                        $key = $lookup_key;
                        $value = $lookup_value;
                    }
                    if (!$this->encoding->isOverloaded($lookup_key))
                    {
                        break ;
                    }
                }
            }
            else
            {
                $key = $this->cache_key;
                $value = $this->cache_value;
                $this->cache_key = $this->cache_value = null;
            }

            $suffix = false;
            if ($this->hasSuffixes)
            {
                $suffix = $this->encoding->isSuffixSymbol($key);
            } 
	   
            $PrefixSymbol=$this->encoding->isPrefixSymbol($key);
            
            $this->handleInput($value, $key, $response, $PrefixSymbol, $suffix);

            if ($this->state == Parser_state_START)
            {
                return $response->getSyllable();
            }
        }

        //always return what we have even if it does not make sense
        if ($response->getLength() != 0) {
            $this->handleConsonantTermination($response);
            return $response->getSyllable();
        }
        return null;
    }

    function handleConsonantTermination($current)
    {
        $current->foldGunintam();
        $current->foldConsonantModifiers();
        $gunintam_len=utf8_strlen($current->gunintam);

        if ($gunintam_len == 2)
        {
            for($count=0;$count<$gunintam_len;$count++)
	        {
	            $gunintam_exploded[$count]=utf8_substr($current->gunintam,$count,1);
            }
       
            $current->gunintam = $this->encoding->handleTwoPartVowelSigns( $gunintam_exploded[0], $gunintam_exploded[1]);
	    }
    }

    //For dynamic fonts, we can recognize that the current syllable is complete only when the next one starts.
    function isCurrentSyllableComplete($type)
    {
        return false;
    }
}
?>
