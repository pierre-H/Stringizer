# Stringizer
Stringizer is a standalone String Utility Library

[![Build Status](https://travis-ci.org/jasonlam604/Stringizer.svg?branch=master)](https://travis-ci.org/jasonlam604/Stringizer) [![Coverage Status](https://coveralls.io/repos/github/jasonlam604/Stringizer/badge.svg?branch=master)](https://coveralls.io/github/jasonlam604/Stringizer?branch=master) [![SensioLabsInsight](https://insight.sensiolabs.com/projects/de25b7db-2be0-4e1a-a3e5-806767ea0438/mini.png)](https://insight.sensiolabs.com/projects/de25b7db-2be0-4e1a-a3e5-806767ea0438)
[![Latest Stable Version](https://poser.pugx.org/jasonlam604/stringizer/v/stable)](https://packagist.org/packages/jasonlam604/stringizer) [![License](https://poser.pugx.org/jasonlam604/stringizer/license)](https://packagist.org/packages/jasonlam604/stringizer)

* [Overview](#overview)
* [Status](#status)
* [Installation](#installation)
* [Tests](#tests)
* [Contributing](#contributing)
* [Credits](#credits)
* [License](#license)
* [Basic Functions](#basic-functions)
      * [String Setter](#setstring)
      * [String Getter](#getstring)
      * [String Orginal Value Getter](#getstringoriginal)
      * [PHP built in toString](#__tostring)
      * [Encoding Setter](#setencoding)
      * [Encoding Getter](#getencoding)
      * [String Functions](#string-functions)
      * [Camelize](#camelize)
      * [Concat](#concat)
      * [Contains & Contains Case-Insensitive](#contains)
      * [Contains Count & Count Case-Insensitive](#containscount)
      * [Dasherize](#dasherize)
      * [EndsWith](#endswith)
      * [StartsWith](#startswith)
      * [EnsureLeft](#ensureleft)
      * [EnsureRight](#ensureright)
      * [HashCode](#hashcode)
      * [IndexOf & IndexOf Case-Insensitive](#indexof)
      * [IsEmpty](#isempty)
      * [LastIndexOf & LastIndexOf Case-Insensitive](#lastindexof)
      * [Length](#length)
      * [Lowercase](#lowercase)
      * [Lowercase First](#lowercasefirst)
      * [Pad Both](#padboth)
      * [Pad Left](#padleft)
      * [Pad Right](#padright)
      * [Replace Accents](#replaceaccents)
      * [Remove Non Ascii](#removeascii)
      * [Remove Whitespace](#removewhitespace)
      * [Replace & Replace Case-Insensitive](#replace)
      * [Reverse](#reverse)
      * [Split](#split)
      * [Strip Punctuation](#strippunctuation)
      * [Strip Tags](#striptags)
      * [Sub String](#substring)
      * [Trim](#trim)
      * [Trim Left](#trimleft)
      * [Trim Right](#trimright)
      * [Truncate](#truncate)
      * [Truncate Match & Truncate Match Case-Insensitive](#truncatematch)
      * [Uppercase](#uppercase)
      * [Uppercase Words](#uppercasewords)
      * [Width](#width)

## Overview

Stringizer is a stringer helper that is made up of existing PHP multibyte-string functions and a variety of  string manipulation solutions found on Stackoverflow.com.  

Why Stringizer:

- Built in Multibyte support
- Chaining of functions
- In some case removing the hassle of you trying to figure out the right regex solution

## Status

Release 1.0.0

## Installation

It's recommended that you use [Composer](https://getcomposer.org/) to install Stringizer.

Manual install with composer

```bash
$ composer require jasonlam604/stringizer "^1.0.0"
```

Using the composer.json file

```json
"require": {
    "jasonlam604/stringizer": "^1.0.0"
}
```

This will install Stringizer and all required dependencies. Stringizer requires PHP 5.6.0 or newer.

## Usage

Sample usage:

```php
<?php

require 'vendor/autoload.php';

$s = new Stringizer("こんにちは世界");

$s->ensureRight(" さようなら");

// The following outputs: こんにちは世界 さようなら

echo $s->getString(); 

```

## Tests

To execute the test suite, you'll need phpunit.

```bash
$ phpunit
```

## Contributing

Accepting Pull-Requests!

## Credits

- [Jason Lam](https://github.com/jasonlam604)


## License

The Stringizer is licensed under the MIT license. See [License File](LICENSE.md) for more information.


## String Functions

##### camelize

Removes any underscores or dashes and converts a string into camel case.

```php
$s = new Stringizer("data_rate");
$s->camelize(); // dataRate
```

##### concat

Combine string values.

Combine at end of the string.

```php
$s = new Stringizer("fizz");
$s->concat(" buzz") // fizz buzz
```

Combine at the beginning of the string by passing in the boolean value **true** in the *optional* second parameter.
```php
$s = new Stringizer(" buzz");
$s->concat("fizz",true) // fizz buzz
```
##### contains

Search for string within another string, return true if found else return false

```php
$s = new Stringizer("fizz buzz foo bar");
$s->contains("buzz"); // true
```

```php
$s = new Stringizer("fizz buzz foo bar");
$s->contains("Buzz"); // false, case sensitive
```

```php
$s = new Stringizer("fizz buzz foo bar");
$s->containsIncaseSensitive("Buzz"); // true, case insensitive
```

##### containsCount

Count the number of string occurrences

```php
$s = new Stringizer("fizz buzz fizz buzz fizz buzz");
$s->containsCount("buzz"); // 3
```

```php
$s = new Stringizer("fizz buzz fizz buzz fizz buzz");
$s->containsCount("nomatch"); // 0
```

```php
$s = new Stringizer("fizz buzz foo bar");
$this->assertEquals(0, $s->containsCount("BUZZ")); // 0, case sensitive no match found
```

```php
$s = new Stringizer("fizz buzz foo bar");
$s->containsCountIncaseSensitive("BUZZ"); // 1, case in-sensitive 1 match found
```

```php
$s = new Stringizer("文字列のそれ 文字列のそれ 文字列のそれ 文字列のそれ");
$this->assertEquals(4, $s->containsCount("れ")); // 4
```

##### dasherize

Break up a camelize string and seperate with dashes

```php
$s = new Stringizer("dataRate");
$s->dasherize(); // data-rate
```

##### endsWith

Checks if a string ends with the given suffix.

```php  
$s = new Stringizer("Fizz Buzz");
$s->endsWith("zz"); // true
```

```php
$s = new Stringizer("文字列のそれ");
$s->endsWith("れ"); // true
```  
 
```php     
$s = new Stringizer("文字列のそれ");
$s->endsWith("れれれれ"); // false
```     

##### startsWith

Checks if a string starts with the specified suffix.

```php        
$s = new Stringizer("Fizz Buzz");
$s->startsWith("Fizz B"); // true
```

```php
$s = new Stringizer("文字列のそれ");
$s->startsWith("文"); // true
```

```php        
$s = new Stringizer("文字列のそれ");
$s->startsWith("文文文文"); // false
```

##### ensureLeft

Ensure string starts with prefix

```php  
$s = new Stringizer("/myapp");
$s->ensureLeft("/"); //  /myapp
```

##### ensureRight

Ensure string ends with suffix

```php  
$s = new Stringizer("/myapp");
$s->ensureRight("/"); //  /myapp/
```

##### hashCode

Determine the hashcode of a string, algorithm matches the hashCode method available in a Java String class

```php  
$s = new Stringizer("Hello, World");
$s->hashCode(); // -505841268
```
##### indexOf

Finds position of first occurrence of a string within another.

```php  
$s = new Stringizer("Fizz Buzz Foo Bar");
$s->indexOf("Foo"); // 10
```

If no match is found boolean false is returned.

```php  
$s = new Stringizer("Fizz Buzz Foo Bar");
$s->indexOf("bad"); // false
```

There is a second optional parameter, position offset where to begin the search where left most value is index 0.

```php  
$s = new Stringizer("Foo Buzz Foo Bar");
$s->indexOf("Foo", 0); // 0, since offset starts at zero the first Foo is found at index 0
$s->indexOf("Foo", 1); // 9, since offset is past zero the next available match is at index 9
```

MultiByte

```php  
$s = new Stringizer("fòô bàř");
$s->indexOf("bàř"); // 4
```

Case In-sensitive

```php
$s = new Stringizer("Fizz Buzz Foo Bar");
$s->indexOfCaseInsensitive("foo"); // 10
```

##### isEmpty

Checks if value is empty, if string contains whitespace only it is considered empty.

```php
$s = new Stringizer("\n  \n\r\t   ");
$s->isEmpty(); // true
```

#### lastIndexOf

Finds position of last occurrence of a string within another

```php
$s = new Stringizer("Foo Buzz Foo Bar");
$s->lastIndexOf("Foo"); // 9
```

If no match is found boolean false is returned.

```php
$s = new Stringizer("Fizz Buzz Foo Bar");
$s->lastIndexOf("bad"); // false
```

There is a second optional parameter, position offset where to begin the search where left most value is index 0.

```php
$s = new Stringizer("Foo Buzz Foo Bar");
$s->lastIndexOf("Foo", 0); // 9 
$s->lastIndexOf("Foo", 4)); // 9
$s->lastIndexOf("Foo", 10)); // false
```

MultiByte

```php
$s = new Stringizer("fòô bàř fòô bàř fòô bàř");
$s->lastIndexOf("fòô"); // 16
```

Case In-sensitive

```php
$s = new Stringizer("Fizz Buzz Foo Bar");
$s->lastIndexOf("foo"); //false
$s->lastIndexOfCaseInsensitive("foo"); // 10
```

#### length

Find the length of the string

```php
$s = new Stringizer("FizzBuzz");
$s->length(); // 8
```

Multibyte

```php
$s = new Stringizer("キラキラした");
$s->length(); // 6
```

#### lowercase

Ensure the string is entirely lower case

```php
$s = new Stringizer("FiZZ");
$s->lowercase(); // fizz
```

#### lowercaseFirst

First letter of the string is lower cased

```php
$s = new Stringizer("FiZz");
$s->lowercaseFirst(); // fIZZ
```

#### padBoth

Pad string on both sides with indicated value

Padding with an even amount

```php
$s = new Stringizer("fizz");
$s->padBoth("x", 10); // xxxfizzxxx
```  

Padding with an odd amount, the extra character is addded to the end of the string

```php
$s = new Stringizer("fizz");
$s->padBoth("x", 11); // xxxfizzxxxx
```

#### padLeft

Pad string on left side with indicated string value and number of times to pad with

```php
$s = new Stringizer("10");
$s->padLeft("0", 5); // 00010
```

#### padRight

Pad string on right side with indicated string value and number of times to pad with

```php
$s = new Stringizer("Alien");
$this->assertEquals("Alien     ", $s->padRight(" ", 10)); // "Alien     " 
```

#### replaceAccents

Replace characters with accents with the same character without accents

```php
$s = new Stringizer("FizzöBuzz Fizz Buzz Fizz Buzzé");
$s->replaceAccents(); // FizzoeBuzz Fizz Buzz Fizz Buzze
```
  
```php        
$s = new Stringizer("ȘŦŗÍñĝìzĕŕ");
$s->replaceAccents(); // STrIngizer
```

#### removeAscii

Remove non Ascii characters

```php
$s = new Stringizer("FizzöBuzz Fizz Buzz Fizz Buzzé");
$s->removeNonAscii(); // FizzBuzz Fizz Buzz Fizz Buzz
```

#### removewhitespace

Remove any whitespace from the string (before, after and any in between)

```php
$s = new Stringizer("Fizz Buzz Fizz Buzz Fizz Buzz");
$s->removeWhitespace(); // FizzBuzzFizzBuzzFizzBuzz
```
 
```php       
$s = new Stringizer(" Ș Ŧ ŗ Í ñ ĝ ì z ĕ ŕ ");
$s->removeWhitespace(); // ȘŦŗÍñĝìzĕŕ
```

#### replace

Match and replace string(s)

```php
$s = new Stringizer("Fizz Buzz Fizz Buzz Fizz Buzz");
$s->replace("Buzz", "Bar"); // Fizz Bar Fizz Bar Fizz Bar
```

Multiple replace

```php
$s = new Stringizer("Fizz Buzz Fizz Buzz Fizz Buzz");
$s->replace(array("Fizz","Buzz"), array("Foo","Bar")); // Foo Bar Foo Bar Foo Bar
```

No Match NOT Case-Insensitive

```php
$s = new Stringizer("Fizz Buzz Fizz Buzz Fizz Buzz");
$s->replace("buzz", "bar"); // Fizz Buzz Fizz Buzz Fizz Buzz
```        
        
Match Case-Insensitive  
```php      
$s = new Stringizer("Fizz Buzz Fizz Buzz Fizz Buzz");
$s->replaceIncaseSensitive("buzz", "bar"); // Fizz bar Fizz bar Fizz bar
``` 

MultiByte

```php
$s = new Stringizer("Fizz列Buzz列Fizz列Buzz列Fizz列Buzz");
$s->replace("列", " "); // Fizz Buzz Fizz Buzz Fizz Buzz
```

#### reverse

```php        
$s = new Stringizer("mood");
$s->reverse(); // doom
```
    
MultiByte    
    
```php     
$s = new Stringizer("文字列のそれ");
$s->reverse(); // れその列字文
```

#### split

Explode string into an array default delimiter is comma

```php        
$s = new Stringizer("Fizz Buzz");
$array = $s->split(" "); // array( 0 => "Fizz", 1 => "Buzz")
```

```php 
$s = new Stringizer("文字列のそれ");
$array = $s->split("の"); // array( 0 => "文字列", 1 => "それ)
```

#### stripPunctuation

Remove all of the punctuation

```php 
$s = new Stringizer("Hello World! It's me #stringizer");
$s->stripPunctuation(); // Hello World Its me stringizer
```      
      
```php   
$s = new Stringizer("*-=!'\",?!Hello* World][");
$s->stripPunctuation(); // Hello World
```

#### stripTags

Remove HTML and PHP tags from a string

```php 
$s = new Stringizer("<html>Hello</html>");
$s->stripTags(); // Hello
```    
       
```php         
$s = new Stringizer("<html><b>こんにちは世界</b></html>");
$s->stripTags(); // こんにちは世界
```
     
Optional second paramter to ignore tags (tags not to be to removed)        
        
```php 
$s = new Stringizer("<html>Hello <b>World</b></html>");
$s->stripTags("<b>"); // Hello <b>World</b>
```

```php 
$s = new Stringizer("<html><head><title>title</title></head><body>Hello <b><span class='fake-class'>World</span></b> こんにちは世界</body></html>");
$s->stripTags(); // titleHello World こんにちは世界
```

#### substring

Find a portion of a string based on postioning (index position in the string) and length of the portion

```php 
$s = new Stringizer("Fizz Buzz Foo Bar");
$s->subString(0, 4); // Fizz
```

```php 
$s = new Stringizer("Fizz Buzz Foo Bar");
$s->subString(5, 4)); // Buzz
```

```php 
$s = new Stringizer("Fizz Buzz Foo Bar");
$s->subString(5, 4)); // Buzz
```

MultiByte

```php
$s = new Stringizer("キラキラした キラキラした");
$s->subString(7); // キラキラした
``` 

#### trim

Remove whitespace both right and left side of the string

```php
$s = new Stringizer("\x20\x20\x20   キラキラしたfizzخالد الشمعة   ");
$s->trim(); // キラキラしたfizzخالد الشمعة
```

#### trimLeft

Remove whitespace left of the string

```php
$s = new Stringizer("\x20\x20\x20   キラキラしたfizzخالد الشمعة   ");
$s->trimLeft()); // キラキラしたfizzخالد الشمعة   
```

#### trimRight

Remove whitespace right of the string

```php
$s = new Stringizer("\x20\x20\x20   キラキラしたfizzخالد الشمعة   ");
$s->trimRight(); // \x20\x20\x20   キラキラしたfizzخالد الشمعة
```
    
#### truncate

Shorten right side of string by the specified indicated amount

```php
$s = new Stringizer("fòô bàř");
$s->truncate(4); // fòô
```

```php
$s = new Stringizer("FizzBuzz");
$s->truncate(4); // Fizz
```

#### truncateMatch

Shorten string left or right side if given substring is match

```php
$s = new Stringizer("fòô bàř");
$s->truncateMatch(" bàř"); // fòô
```

```php
$s = new Stringizer("FizzBuzzFooBar");
$s->truncateMatch("Foo"); // FizzBuzz
```

Case In-sensitive

```php
$s = new Stringizer("FizzBuzzFooBar");
$s->truncateMatchCaseInsensitive("foo"); // FizzBuzz
```

#### uppercase

Ensure entire string is uppercase

```php
$s = new Stringizer("fIzz");
$s->uppercase(); // FIZZ
```

#### uppercaseWords

Ensure entire string is uppercase

```php
$s = new Stringizer("fizz buzz foo bar");
$s->uppercaseWords(); // Fizz Buzz Foo Bar
```

##### width

Find the width of the string this is different then length for multibyte strings

```php
$s = new Stringizer("キラキラした");
$s->width(); // 12, note multi-byte characters take up more space, typice 2 for each character
```  
  
```php        
$s = new Stringizer("FizzBuzz");
$s->length(); // 8
```

## Basic Functions

#### setstring

Setting the string you want to apply string manipulations on, this will set the orginal value as well.

```php
$s = new Stringizer("dummy-value");
$s->setString("new-dummy-value");

#### getstring

Retrieve the string in its most current state

```php
$s = new Stringizer("dummy-value");
$s->getString();
```

#### getStringOriginal

Retrieve the string state prior to any string manipulations

```php
$s = new Stringizer("dummy-value");
$s->getStringOriginal();
```

#### __toString

Retrieve the string in its most current state

```php
$s = new Stringizer("dummy-value");
echo ($s); // this will output current state, defaults to using the PHP built __toString method
```

#### setEncoding

Set encoding, behind the scences PHP function mb_internal_encoding is applied

```php
$s = new Stringizer("dummy-value");
$s->setEncoding("UTF-8");
$s->getEncoding(); // UTF-8
```

#### getEncoding

```php
$s = new Stringizer("dummy-value");
$s->getEncoding(); // Outputs your default encoding based mb_internal_encoding
```
