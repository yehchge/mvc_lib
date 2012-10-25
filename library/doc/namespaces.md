#### JREAM Library
* * *

# Namespaces
You'll notice that this library makes use of namespaces, which in my opinion is not the most elegant in PHP compared to Python. However, to prevent conflict from any application you may tie this library in with, Namespaces are a must.

#### Regular Example
Here is how we use a standard namespace from the library

    jream\Output::success();
    
#### Foldered Example
If there is a folder, it means it has child-namespaces in it.

    new jream\mvc\Boostrap();

### Aliasing namespaces
You can alias the names and make them easier to type if you like by doing:

    use jream as j, jream\mvc as mvc;
    
    j\Output::success();
    new mvc\Bootstrap();
    
### Using the full name without a namespace
You can use the full class name without a namespace if you define the entire namespace at the top.

    use jream\Output, jream\mvc\Bootstrap;
    
    Output::success();
    new Bootstrap();
    
* * *
Copyright (C), 2011-12 Jesse Boyer (http://jream.com) GNU General Public License 3 (http://www.gnu.org/licenses/)