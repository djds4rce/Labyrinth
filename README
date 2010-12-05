copyright (c) Dayanand Prabhu
Copyright (c) 2009-2010 Adam Davis

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.


Thank you for downloading Labyrinth, the simple script to create http://godtower.com type puzzles.

//--Installation.

1. Before proceeding please open up models/settings.php

2. Create a database on your server / web hosting package.

3. Fill out the connection details in settings.php

4. Labyrinth is devoloped on UserCake(user Managment system), which supports mysql and mysqli via phpBB's DBAL layer, UserCake defaults to mysql, to change it to mysqli change variable $dbtype to "mysqli".

5. You can setup the database manually or use the installer. If you wish to setup the database manually look inside the install folder and you will 
   find sql.txt which contains the sql.

   To use the installer visit http://yourdomain.com/install/ in your browser. UserCake will attempt to build the database for you. After completion
   delete the install folder.
6.Its time to setup questions. Fire up your favouirte text editor and open Level1.php. Change the password to the password you want and also changed the HTML of the questions.
7.Do the same for the next question, but add an function after isUserLoggedIn() function call.
if(!isscoresufficient(variable)){ header("Location:scorenotenough.php"); die(); }
variable is current level number-1.Repeat 6-7 for all other questions.
8.Once the questions are prepared Add them in the switch statement in question.php.
9.You can change the file names of each question. Just reflect the changes in the switch statement of question.php and header("location:"); part in each question.
10.working around manageUsers.php.
   -Insert values ('0','admin') in your groups table
   -Update Group_Id in user table to 0 corresponding to your username.(this makes you able to access manageUsers.php)
   -Now you can view/delete Users from manageUsers.php.
11.For more help contact djd4rce@gmail.com




//-shout outs
Thanks to 
-@Kenneth @RaisonD @nievU for all the help and support.
-The http://hijackthissite.org community especially Avery17,fabianhjr,tremor77,alltheprettyhorses,insomaniacal,tgoe,fashizzlepop,msbachman you people are awesome.
-My non coder pal Preetesh Pai.

//--Credits
Labyrinth Script- Dayanand Prabhu http://reversepolarity.in
Usercake: Adam Davis - http://adavisdavis.co.uk (user Managment system)
Database Abstraction Layer: phpBB Group - http://phpbb.com


---------------------------------------------------------------

Vers: 0.1


