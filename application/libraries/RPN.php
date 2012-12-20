<?php
	/* This Class can be useful for writting RPN macros or FORTH like parsers 
		   @Author: Arturo Gonzalez-Mata Santana (Spain)
				 arturogmata@gmail.com
		@copyright 2007: www.phpsqlasp.com

		It is part of a project to recover "macros" from some old aplications 

	This code is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	as published by the Free Software Foundation; either version 3
	of the License, or (at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA
	*/
	class RPNstack
	{
		var $data=array();
		var $compare=0;
		function pop() {return array_shift ($this->data);}
		function push($x) {array_unshift($this->data, $x);}
		function count() {return count($this->data);}
		function first() {return $this->data[0];}
		function top() {return end($this->data);}  //last element of 
		function swap() { // interchange tow elements
			$t = $this->data[1];
			$this->data[1] = $this->data[0];
			$this->data[0] = $t;
			}
		function dup() {  // put a copy of X element in the stack
			array_unshift($this->data, $this->data[0]);
			}

		function dump(){ // dump array data for debuging
			print_r($this->data);
			}

		function parse($tok)  // execute actions with the stack for each token
		{
			$r = null;
			$tok = strtoupper(trim($tok));
			//$this->dump(); // this line is for debugging purpose only
			switch ($tok) :
				// FIRST "IF THEN" AND OTHER FLOW CONTROLS
				case ('THEN'): break;
				case('IF'):
					if ($this->pop() == 0) do {  // if condition is false do nothing until "THEN"
						$tok = strtoupper(strtok (" "));
						} while ($tok <> "THEN");  // IF THERE IS NO "THEN" THIS SHALL BE AN ENLESS LOOP
					break;

				//   basic math operators   //OPERADORES MATEMATICOS BASICOS
				case('+'):
					$r = $this->pop() + $this->pop();
					// $r = array_shift($this->data) + array_shift($this->data);  // is more efficient but less understable
					break;        
				case('-'):
					$r = $this->pop(); $r = $this->pop()-$r;
					break;
				case('*'):
					$r = $this->pop() *  $this->pop();
					break;
				case('/'):
					$r = $this->pop(); $r = $this->pop() / $r;
					break;
				// stack operators  //OPERADORES DE PILA  
				case ('DUP'):
					$r=$this->dup();
					break;
				case ('SWAP'):
					$this->swap();
					break;

				// COMPARISON OPERATORS
				case ('='):
					if ($this->data[0] == $this->data[1]) $r = $this->push(1);
					else $r = $this->push(0);
					break;
				case ('<>'):
					if ($this->data[0] <> $this->data[1]) $r = $this->push(1);
					else $r = $this->push(0);
					break;
				case ('<'):
					if ($this->data[0] < $this->data[1]) $r = $this->push(1);  
					else $r = $this->push(0);                            
					break;
				case ('>'):
					if ($this->data[0] > $this->data[1])  $r = $this->push(1);  
					else $r = $this->push(0);                            
					break;
				case ('>='):
					if ($this->data[0] >= $this->data[1])  $r = $this->push(1);  
					else $r = $this->push(0);                            
					break;
				case ('<='):
					if ($this->data[0] <= $this->data[1])  $r = $this->push(1);  
					else $r = $this->push(0);                            
					break;

				// WARNING FOR NON IMPLEMENTED FUNCTIONS
				default:
						return sprintf('I don\'t know how to "%s" ', $tok);
			endswitch;
			if (!is_null($r)) $this->push($r); 
			return $r;
		} // parse


		function parse_line($cadena)
		{
			$tok = strtok ($cadena," ");
			while ($tok!= '') {
				if (is_numeric ($tok)) {
					$this->push($tok);
				} else {
					$r = $this->parse($tok);
				}
				$tok = strtok (" ");
			}
			return $r;
		}

	} // class RPN



	?>
