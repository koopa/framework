# Getting started with QCubed

## Releases
**Newest stable release: [version 2.1.1, released on Dec 1, 2012](https://github.com/qcubed/framework/archive/2.1.1.zip)**.

Older releases are available from the [downloads archive](https://github.com/qcubed/framework/downloads).

## What is QCubed?

QCubed (pronounced 'Q' - cubed) is a PHP5 Model-View-Controller framework. The goal of the framework is to save development time around mundane, repetitive tasks - allowing you to concentrate on things that are useful AND fun.

## The Code Generator

The Code Generator creates PHP classes based on your database schema. It uses the concept of ORM, [object-relational mapping](http://en.wikipedia.org/wiki/Object-relational_mapping), to practically create your whole model layer for you.
Codegen can take advantage of foreign key relationships and field constraints to generate ready-to-use data models complete with validation routines and powerful CRUD methods, allowing you to manipulate objects instead of constantly issuing SQL queries.

More info as well as examples are available online at <http://examples.qcu.be/>

### Object-oriented querying

Using QQueries allows for simple yet powerful loading of models, all generated ORM classes have Query methods and QQNodes. By using these methods, getting a complex subset of data is pretty straightforward - and can be used on almost any relational database.

## User Interface Library

QCubed uses the concept of a QForm to keep form state between POST transactions. A QForm serves as the controller and can contain QControls which are UI components.

All QControls (including QForm itself) can use a template which is the view layer, completing the MVC structure.

QControls can take advantage of the QForm's FormState to update themselves through Ajax callbacks as easily as synchronous server POSTs. All jQuery UI core widgets are available as QControls.

Some QControls include:
- QDialog
- QTextBox
- QListBox
- QTabs
- QAccordion

A full list and examples are available online at <http://examples.qcu.be/>

### Plugins

Through its plugin system, QCubed makes it easy to package and deliver enhancements and additions to the core codebase. The plugin project is located at <https://github.com/qcubed/plugins> and contains an exhaustive list of contributed plugins.

## Learn more
Interested? Check out [QCubed video screencasts](http://qcu.be/content/video-screencasts) or [text-based QCubed tutorials](http://trac.qcu.be/projects/qcubed/wiki/Tutorials).

The [github wiki](https://github.com/qcubed/framework/wiki) will eventually supersede these.

* * *

## Installation

### File System

Copy the contents of wwwroot/* to the ROOT level of your web site's DOCROOT
(also known as DocumentRoot, webroot, wwwroot, etc., depending on which platform
you are using).

At a later point, you may choose to move folders around in your system,
putting them in subdirectories, etc.  QCubed offers the flexibility to have
these framework files in any location.

But for now, since we're getting started, we'll provide you with the instructions
on how to finish the installation assuming that you're keeping the entire
QCubed installation together as originally released.


### Modify Configuration

Inside of wwwroot/configuration/includes you'll find the configuration.inc.php file.  You'll need
to open it to specify the actual location of your __DOCROOT__.

IMPORTANT NOTE FOR WINDOWS USERS:
Please note that all paths should use standard "forward" slashes instead of
"backslashes".  So windows paths would look like "c:/wwwroot" instead of
"c:\wwwroot".

Also, if you are putting QCubed into a SUBDIRECTORY of DOCROOT, then be sure
to set the __SUBDIRECTORY__ constant to whatever the subdirectory is
within DOCROOT.

If you are using QCubed inside of a Virtual Directory (also known as a Directory
Alias), be sure to specify the __VIRTUAL_DIRECTORY__ constant, too.

Next, specify a location to put your "_devtools_cli" directory (this could be either
inside or outside of docroot), and update the __DEVTOOLS_CLI__ constant accordingly.

Finally, be sure to update the DB_CONNECTION_1 serialized array constant with the
correct database connection information for your database.

(Information on all these constants are in configuration.inc.php, itself.)

> We are working on a guided installation to ease this step.

### Include prepend.inc.php

Calling require() on prepend.inc.php is necessary to include the framework in your PHP file.

Note that by default, this is already setup for you in:
* /index.php
* /sample.php
* /_devtools/codegen.php
* /form_drafts/index.php
* All the /examples/
* Any code generated form_draft page

To change this or for any new PHP scripts you want to write, simply make sure any PHP
script that wants to utilize the QCubed Framework STARTS with:
	require('includes/prepend.inc.php');
on the very first line.

NOTE that the "includes/configuration/prepend.inc.php" may be different -- it depends on the relative
path to the includes/prepend.inc.php file.  So if you have a docroot structure like:
	docroot/
	docroot/pages/foo/blah.php
	docroot/includes/configuration/prepend.inc.php
then in blah.php, the require line will be:
	require('../../includes/configuration/prepend.inc.php');

Note that if you move your .php script to another directory level, you may need to update
the relative path to prepend.inc

If you specified the includes/ in your includes_path in your php.ini file (see optional
STEP FIVE below), then all you need to do is have
	require('prepend.inc.php');
at the top of each file (no need to specify a relative path).

### File Permissions

Because the code generator generates files in multiple locations, you want to be sure that the
webserver process has permissions to write to the docroot.

The simplest way to do this is just to allow full access to the docroot for everyone.  While this
is obviously not recommended for production environments, if you are reading this, I think it is
safe to assume you are working in a development environment. =P

On Unix/Linux, simply run "chmod -R ugo+w" on your docroot directory.

On Windows, you will want to right-click on the docroot folder and select "Properties",
go to the "Security" tab, Add a "Everyone" user, and specify that "Everyone" has "Full Control".
Also, on the "general" tab, make sure that "Read-Only" is unchecked.  If asked, be sure to
apply changes to this folder and all subfolders.

If this doesn't work, an additional task would be to use Start - Control Panel - Administrative Tools
- Computer Management - Local Users and Groups - Users.  Look for a user with a name like
IUSR_ComputerName (where ComputerName is your computer name).  Right-click on this user then
Properties - Member of.  If it just shows Guests, make sure it's selected.  And then finally
right-click on your QCubed folder, select Properties, and add the group Guests with Full Control.



### (Optional) Set up the include path

NOTE THAT THIS STEP IS OPTIONAL!  While this adds a VERY slight benefit from a
convenience standpoint, note that doing this will also have a slight performance cost,
and also may cause complications if trying to integrate with other PHP frameworks.

Starting with Qcodo 0.2.13, you no longer need to update the PHP include_path
to run Qcodo.  However, you may still want to update the include_path for any
of the following reasons:
* All PHP scripts will only need to have "require('prepend.inc.php')" without needing
  to specify a relative path.  This makes file management slightly easier; whenever
  you want to move your files in and out of directories/subdirectories, you can do
  so without needing to worry to update the relative paths in your "require"
  statement (see STEP THREE for more information)
* With the include_path in place, you can also easily place other include files
  (like headers, footers, other libraries, etc.) in the includes/ directory, and
  then you can include them, too, without worrying about relative paths

Again, NOTE THAT THIS STEP IS OPTIONAL.

If you wish to do this, then the PREFERRED way of doing this is simply edit your
PHP.INI file, and set the include path to:
	.;c:\path\to\DOCROOT\includes\configuration (for windows)
		or
	.:/path/to/DOCROOT/includes/configuration (for unix)
(If you put QCubed into a subdirectory, then you want to make sure to specify it
in include_path by specifying /path/to/DOCROOT/subdir/includes/configuration)

NOTE: the "current directory" marker must be present (e.g. the ".;" or the ".:" at
the beginning of the path)

Now, depending on your server configuration, ISP, webhost, etc., you may
not necessarily have access to the php.ini file on the server.  SOME web servers
(e.g. Apache) will allow you to make folder-level or virtualhost directives
to the php.ini file.  See the PHP documentation for more information.


ALTERNATIVELY, if you like the idea of being able to simply have
"require('prepend.inc.php')" with no relative path inforamtion at the top of your
pages, but if you are unable for whatever reason to set the include_path, then you
could use one of the following "set_include_path" lines at the top of each
web-accessed *.php file/script in your web application.

IMPORTANT NOTE: Because the Code Generator can also generate some of your
web-accessed *.php files, you will need to ALSO update the codegen template files
	DOCROOT/includes/qcodo/_core/codegen/templates/db_orm_edit_form_draft.tpl
	DOCROOT/includes/qcodo/_core/codegen/templates/db_orm_list_form_draft.tpl
to have the same "set_include_path" line at the top.

The line to choose depends on whether you're running the PHP engine as a Plug-In/Module
or a CGI (and of course, keep in mind that if you threw QCubed within a subdirectory of
DOCROOT, be sure to specify that in the line you select).

Use this if running PHP as a Apache/IIS/Etc. Plug-in or Module
set_include_path(sprintf('.%s%s/includes', PATH_SEPARATOR, $_SERVER['DOCUMENT_ROOT']));

Use this if running PHP as a CGI executable
set_include_path(sprintf('.%s%s/includes', PATH_SEPARATOR, substr($_SERVER['SCRIPT_FILENAME'], 0, strlen($_SERVER['SCRIPT_FILENAME']) - strlen($_SERVER['SCRIPT_NAME']))));

* * *

## Latest commits

A list of the latest changes is available at https://github.com/qcubed/framework/commits/master

## Credits

QCubed was born out of QCodo, and uses jQuery UI libraries.