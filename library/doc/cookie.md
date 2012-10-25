#### JREAM Library
* * *

# jream/Cookie

Manages them cookies, it's all static

    Cookie::set($name, $data, $time);
    Cookie::fetch($name, $is_json = false);
    Cookie::destroy($name);

### Create a Cookie

    jream\Cookie::set('id', '5001');

### Set Cookie Lifetime

    jream\Cookie::set('id', '5001', 300000);

### Set Cookie with Lots of Data

    $data = array(
        'name' => 'Bilbo',
        'age' => 55,
        'career' => 'Artist'
    );
    jream\Cookie::set('info', $data);
    
### Fetch Cookie
    
    $cookie = jream\Cookie::fetch('id');
    echo $cookie;
    
### Fetch Cookie with Lots of Data

    $cookie = jream\Cookie::fetch('info', true);
    print_r($cookie);

### Destroy a Cookie

    jream\Cookie::destroy('id');
    jream\Cookie::destroy('info');
    
* * *
Copyright (C), 2011-12 Jesse Boyer (http://jream.com) GNU General Public License 3 (http://www.gnu.org/licenses/)
