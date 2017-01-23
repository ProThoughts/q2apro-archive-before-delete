====================================
Question2Answer q2apro Archive Before Delete
====================================
-----------
Description
-----------
This is a plugin for **Question2Answer** that makes a copy of the deleted post before deleting it from the main posts table. In other words, you will not lose this content anymore but find a copy in an extra table qa_posts_archive.

------------
Installation
------------
#. Install Question2Answer_
#. Get the source code for this plugin directly from github_
#. Extract the files.
#. Change language strings if needed.
#. Upload the files to a subfolder called ``q2apro-archive-before-delete`` inside the ``qa-plugin`` folder of your Q2A installation.
#. Navigate to your site, go to **Admin -> Plugins** on your q2a install. You will see the notice: 'The module requires some *database initialization*.'
#. Click on *database initialization*. Then click button **Install**.
#. The MySql table 'qa_posts_archive' will be created. Notice appears: The module has completed database initialization.
#. You are done! 
#. Test the functionality by creating a post and deleting it again. Open phpmyadmin and check the table qa_posts_archive for content!

.. _Question2Answer: http://www.question2answer.org/install.php
.. _github: https://www.github.com/q2apro/q2apro-archive-before-delete

----------
Disclaimer
----------
This is **beta** code. It is probably okay for production environments, but may not work exactly as expected. You bear the risk. Refunds will not be given!

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; 
without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. 
See the GNU General Public License for more details.

-------
Copyright
-------
All code herein is OpenSource_. Feel free to build upon it and share with the world.

.. _OpenSource: http://www.gnu.org/licenses/gpl.html

---------
About q2a
---------
Question2Answer is a free and open source platform for Q&A sites. For more information, visit: www.question2answer.org

---------
Final Note
---------
If you use the plugin:
 
 - Consider joining the Question2Answer-Forum_, answer some questions or write your own plugin!
 - You can use the code of this plugin to learn more about q2a-plugins. It is commented code.

.. _Question2Answer-Forum: http://www.question2answer.org/qa/

