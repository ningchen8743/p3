<!DOCTYPE html>
<html lang='en'>

<head>
    <title>Project 3 for Fall semester</title>
    <meta charset='utf-8'>
    <link href='/styles/app.css' rel='stylesheet'>

</head>
<body>
<form method='POST' action='count.php' id='word_count'>
    <label>Write down sentences (do not enter line break!)</label>
    <br>
    <textarea form='word_count'
              name='textarea'
              rows="3" cols="40"
              placeholder='Type in your text here...'
              rows=5><?php if (isset($textarea_cache)) echo $textarea_cache; ?></textarea>
    <br><br>


    <input type='checkbox'
           name='countSpace'
    <?php
        if (isset($countSpace_cache) && $countSpace_cache == true) {
            echo "checked";
        } else {
            echo "";
        }
        ?>>
    <label>Count space character</label>
    <br><br>

    <label>Count by character or word </label>
    <select name='wordOrChar' form='word_count'>
        <option value='character'
        <?php
            if (isset($wordOrChar_cache) && $wordOrChar_cache == 'character') {
                echo "selected";
            } else {
                echo "";
            }
            ?>>Character
        </option>
        <option value='word'
        <?php
            if (isset($wordOrChar_cache) && $wordOrChar_cache == 'word') {
                echo "selected";
            } else {
                echo "";
            }
            ?>>Word
        </option>
    </select>
    <br><br><br>

    <fieldset>
        <legend>Count result</legend>
        <br>
        <output><?php if (isset($countResult_cache)) echo $countResult_cache; ?></output>
    </fieldset>

    <br><br>

    <input type='submit' value='Count!'>
</form>

</body>
</html>