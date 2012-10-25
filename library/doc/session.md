#### JREAM Library
* * *

# jream\Session
An friendlier syntax for managing Session data. Everything is static.

    Session::start();
    Session::set($key, $value);
    Session::fetch($key);

#### Starting a Session
Its easy,

    jream\Session::start();
    
but if you prefer, you can always still do the classic way:

    session_start();
   
The benefit to the jream\Session is that it checks that a session isn't already started.

### Setting Data

    jream\Session::set('key', 'value');
    
### Setting Array

    jream\Session::set(
        array(
            'dog' => 
                array(
                'size' => '100lbs'
            )
        )
    );
    
### Fetching Data

    echo jream\Session::fetch('key');
    
### Fetching Array

    echo jream\Session::fetch('dog', 'size');
    
### Destroying a Session

    jream\Session::destroy();
 
    
* * *
Copyright (C), 2011-12 Jesse Boyer (http://jream.com) GNU General Public License 3 (http://www.gnu.org/licenses/)