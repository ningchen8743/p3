## P3 Peer Review

+ Reviewer's name: Ning Chen
+ Reviewe's name: Steve C
+ URL to Reviewe's P3 Github Repo URL: *<https://github.com/cordovas/p3>*


## 1. Interface

+ It was a very interesting interface design with the Thompson gif.
+ It took me sometime to understand the concept of "total numbers" and the lottery mathematics. The wikipedia definition provided by Steve was very helpful.
+ The bootstrap formatted results work very well in terms of overall layout design.
+ A paragraph that briefly describes the concepts in lottery mathematics would make the app look more user-friendly.


## 2. Functional testing

I tried the following:
+ Submit the form without entering required data, there appeared an error message below that field.
+ Enter a number that was greater than the pre-defined max value, there appeared a corresponding message below that field.
+ Enter decimal number, the form worked normally. There should be an error message that showing floating number is not valid input.
+ Enter negative numbers, letters and symbols, all received error messages as expected.
+ Enter several different non-existed URLs, all received 404 messages.
To conclude, I did not find any major issue except two situations:
1. The decimal number situation, the form validation should only allow integers.
1. When the input of total number is invalid, the returned error message page only keeps the old value of total number, but not the other two records.


## 3. Code: Routes

+ Routes file does not have any unnecessary content that should be happening elsewhere. Nice work!


## 4. Code: Views

+ Template inheritance is used. However, the master blade should be the only file in the layout folder.
+ There is no code separation issue. Please delete the redundant testing/unused files to avoid confusion.
+ Nothing found in PHP that could have been done in Blade.
+ Blade syntax follows the examples from course material.


## 5. Code: General

+ No inconsistencies between the code and the course notes are found.
+ The flash session of drop down list and checkbox are not working when validation fails.
+ Overall, code is easy to follow and understandable.
+ random_int() method requires the min and max values to be integers. I think you should let the users know that the decimal value will be considered invalid, or change the validate requirement from numeric to integer.


## 6. Misc

+ Good job on getting this project done! One limit of the validate() function is that the subsequent code would not be executed if the validation fails, and the old values can not be properly displayed on the redirected page. Consider using the validator facade as a more elegant alternative. 