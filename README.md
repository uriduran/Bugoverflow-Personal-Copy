
# ITMT 430 Bugoverflow project 2017 spring
* Uriel Duran - *Developer*
* Cindy Xie - *UI/UX*
* Hong Zhang - *Dev Ops*

# Deploy Infrastructure

## Setting Up ##
1. Pull or download this folder /Deploy/ onto your computer.
2. Within the /Deploy folder create empty folders named "build" and "packer_cache"
3. The /packer_cache folder should contain an iso file that will be downloaded when you run the READYSETGO.ps1 script. However, the url is sometimes not found so download the ISO from here: [Ubuntu ISO](https://drive.google.com/open?id=0B_8Ox6hjNtbDVDRmUU81YmlzeDQ)

You should now have 5 sub folders within the /Deploy folder. As well as 3 .json files and one .ps1 file

## Running the Script ##

In order to automatically start the build run the READYSETGO.ps1 script. This is a powershell script.
The script will use packer to build using the .json files. Each of the .json files in this folder corresponds to either the Web server, Master DB or the Slave db based on the name. Then it will use vagrant init and vagrant up to run the VMs.

NOTE: In order to run the script you can either double click it or on Windows right-click and pick "Run with PowerShell."
Alternatively you can just open the file with a text editor and manually input the commands in the script.

## Setting up the vagrant file ##
Once you have the three boxes set up you will need to alter the vagrantfile for each box. We've uploaded a template in this folder that you will need to copy to each box folder. You will then have to open each vagrant file and edit the line where it names the Box and change the IP address to whatever you were assigned. Remember the IP for each box.

## Other Commands ##

In order to automatically install programs like MySQL or Apache, you must go to the /scripts folder and add in the command to be executed when the VM boots up. There are three .sh files in that folder each one is for one of our servers.

For example, the script for the Master database is post_install_vagrant_databaseMaster.sh. If opened with a text editor you can see the commands to install mysql-server.

Any other files needed to be executed like SQL queries should be placed in this folder and a command to run them should be added to the .sh script that corresponds to the right server.

### Things To Do ###

DATABASE REPLICATION WORKS. DEPLOY/DOCUMENTATION/REPLICATION.TXT
