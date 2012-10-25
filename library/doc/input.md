#### JREAM Library
* * *

# jream/input
Handles `$_POST`, `$_GET`, and `$_REQUEST` data. Format and validate data on the fly by chaining.

    Input::post($field, $optional_required);
    Input::validate($method, $argument);
    Input::format($method, $argument);
    Input::submit();
    Input::fetchErrors();

### Basic Form Post
Here is how to perform the most basic posting form.

    <form method="post">
    <input type="text" name="name" />
    <input type="age" name="age" />
    <input type="submit" />
    </form>

    <?php
    $input = new jream\input();
    $input  ->post('name', true) // Required
            ->post('age');
    $input->submit();
        

### Fetching Data
Grabbing the handled data is super simple.

    $input->fetch('name'); // Return string
    $input->fetch(); // Return array of items
        
        
### Wrapping in an Exception
You should always wrap your input inside an exception. This way, everytime you submit the input rules you will not accidentally proceed on with executing further commands as if you were required to check errors on your own.

    <?php
    try {
        $input = new jream\input();
        $input  ->post('name')
                ->validate('length', array(5, 10))
                
                ->post('age')
                ->validate('digit');
        $input  ->submit(); // Exception on Error
    } catch (\Exception $e) {
        $input->fetchErrors(); // Returns error array
    }
    
### Temporary Data
If you needed to repopulate a form, data is stored inside a `$_SESSION['tmp']['input']` only if you have a session started. You should consider having an `unset($_SESSION['tmp'])` at the end of your pages as well.

    <form method="post">
    <input type="text" name="name" value="<?=@$_SESSION['tmp']['input']['name']?>" />
    <input type="age" name="age" value="<?=@$_SESSION['tmp']['input']['age']?>" />
    <input type="submit" />
    </form>

    <?php
    session_start();
    $input = new jream\input();
    $input  ->post('name', true) // Required
            ->post('age');
    $input  ->submit(); // Exception on Error


### Validating Data
Here are some examples of validation, to see all of them look at the method names of the `input/validate.php` file.
        
    $input  ->post('name', true)
            ->validate('length', [5, 10])
            ->post('email', true)
            ->validate('email')
        
### Formatting Data
You can format your data in the chain too.

    $input  ->post('name', true)
            ->format('ifeq', ['john', 'Jonathan']);
            // Above: If the string is `john`, new value becomes `Jonathan`
            
            ->post('password')
            ->format('hash', ['sha256'], 'optional_hash');
            // Formats into sha256 with a hash key
    
### Setting Custom Errors
You can set custom errors if you like, add an error after each validation rule.

    $input  ->post('name', true)
            ->validate('minlength', 5);
            ->error('Your name should be longer than 5 characters!')
            
### Optionally Tie into the jream\Database 
You can easily save field information in the database by doing something like this:

    $input  ->post('name')
            ->post('age')
            ->post('gender')
            ->post('email')
            ->post('password')
            ->format('hash', ['sha1']);
    $input->submit() // Exception on Error
    
    $db->insert('user', $input->fetch());
            
            
### GET and REQUEST
You can do all of the exact same things use `$input->get()` and `$input->request` too.
       
* * *
Copyright (C), 2011-12 Jesse Boyer (http://jream.com) GNU General Public License 3 (http://www.gnu.org/licenses/)