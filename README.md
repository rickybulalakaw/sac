# LGU Social Amelioration Card Input System

This app helps Local Social Welfare and Development Offices input data from the Social Amelioration Cards for creation of databases required by DSWD.

This app has basically all functionalities needed. However, the number of barangays in the system may not be sufficient, so a feature for adding barangays in the future will be incorporated.

The system administrator will have to identify the user who will be determined as System Administrator. From there, the system administrator can identify a Local SWDO Head, who will then identify subordinate roles:

- Local SWDO Staff - Can create main beneficiaries and members, and edit records and tag beneficiaries for payment
- Encoders (Default) - Can add data of main beneficiaries
- IT Support - Can view reports and system activities

# Installation

Upload the files to a PHP-hosting server, and import the dswd_sac.sql file into your MySQL server.

Adjust the database settings in the db.php files as necessary.
