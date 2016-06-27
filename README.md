# dh_emailmanager
Ionize CMS module for the storage and management of e-mail-adresses

# Abilities
- Save email, name, and language of the user submitting a contact form
- Add, edit and delete data in the backend section of the module
- Export the gathered data to a CSV (Excel) File

# Ionize Versions
- Tested for the versions 1.0.7 and 1.0.8
- In order to get it working on version 1.0.8 a modifcation of the core is necessary:
  + go to application/core/MY_Controller.php
  + search for the declaration of the function output()
  + change $limit_to_module_folder = TRUE  to  $limit_to_module_folder = FALSE
  + read this post to discover why this is necessary: http://ionizecms.com/forum/viewtopic.php?id=2234

# Requirements
- The Ajaxform module must be installed (standard ionize CMS module)
- The dh_emailmanager module has only been tested in combination with the Ajaxform module, but it should also be working with the classic ionize contact form system
