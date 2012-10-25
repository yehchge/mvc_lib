#### JREAM Library
* * *

# jream/Output
Outputs JSON data in an ideal consistent package. 

    Output::json($string);
    Output::success($optional_data);
    Output::error($optional_string);
    
### Output standard JSON
To output your data with appropriate headers, it's ez-peasy.

    jream\Output::json('String to turn into json');
    
### Success Package

    jream\Output::success();
    jream\Output::success('Optional Success Message/Data');
    
    {
        success: 1, 
        errorMessage: null, 
        data: 'Optional Success Message/Data'
    }

### Error Package

    jream\Output::error('Optional Error Message/Data');

    {
        success: 0, 
        errorMessage: 'Optional Error Message/Data', 
        data: null
    }

* * *
Copyright (C), 2011-12 Jesse Boyer (http://jream.com) GNU General Public License 3 (http://www.gnu.org/licenses/)
