#### JREAM Library
* * *

# Introduction

The JREAM Library is intended to make common PHP tasks easier for you. Choose a topic on the side and start using it, most files are independent. There two main principals that were considered in writing this:

- Keep it Useful
- Keep it Super Simple (KISS)

# Before you play

Reading documentation isn't always fun. To save you time, put the autoloader at the top of your PHP file to have requirements taken care of for you:

    <?php
    require 'jream/autoload.php';
    jream\Autoload('jream/');
    
    // Code here 

# Minimalist MVC Framework

You may notice that the JREAM Library contains an MVC. Even though there are already hundreds of frameworks freely available, it is not my intention to re-invent a wheel and compete with such frameworks. The MVC in this package is minimal and simple for those who prefer to do things this way.

Using the MVC is totally up to you. You can simply enjoy the libraries if you prefer.

* * *
Copyright (C), 2011-12 Jesse Boyer (http://jream.com) GNU General Public License 3 (http://www.gnu.org/licenses/)