== Summary

Description:
The goal is to develop an internal collaboration application for Roskilde Festival projects division, where coordinators can report power usage and administrators can extract information on a per project basis.

Technical Setup:
Built on the CakePHP framework, with authentication and access control lists enabled among other features. Developed with the help of jQuery and standard compliant xHTML + CSS – pretty much :)

Team:
Søren Louv-Jansen and Lasse Boisen Andersen are the main developers and Nicolai Johansen is the project coordinator from Roskilde Festival.

Location:
The production deployment of the system is currently live at http://el.konscript.com

== For the nerdy

Setup:
Built on the CakePHP framework, with authentication and access control lists enabled among other features. Developed with the help of jQuery and standard compliant xHTML + CSS – pretty much :)

Requirements:
Preferably PHP5 and MySQL on an Apache server with mod_rewrite enabled (more on http://book.cakephp.org/view/28/Requirements).

== Current features (briefly)

* Create, update and delete projects, items and item templates.
* Manage users, groups, sections across the app with role-based permissions.
* Robust authentication and access control
* Attach items to projects (custom or template based) and automatically sum the total power usage for the project.
* E-mails to users are SMTP powered with support for layouts and content templates.
* Export a project with corresponding data as Excel based on a predefined template
* Image upload to a project with thumbnail generation
* Custom UI design and layout
* + more!