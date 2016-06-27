# dh_emailmanager
Ionize CMS module for the storage and management of e-mail-adresses

# Ionize Versions
- Tested for the versions 1.0.7 and 1.0.8
- In order to get it working on version 1.0.8 a modifcation of the core is necessary:
  + go to application/core/MY_Controller.php
  + search for the declaration of the function output()
  + change $limit_to_module_folder = TRUE  to  $limit_to_module_folder = FALSE
  + read this post to discover why this is necessary: http://ionizecms.com/forum/viewtopic.php?id=2234

