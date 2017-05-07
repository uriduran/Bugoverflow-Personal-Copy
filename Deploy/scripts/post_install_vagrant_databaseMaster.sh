#!/bin/bash
set -e
set -v


# http://superuser.com/questions/196848/how-do-i-create-an-administrator-user-on-ubuntu
# http://unix.stackexchange.com/questions/1416/redirecting-stdout-to-a-file-you-dont-have-write-permission-on
# This line assumes the user you created in the preseed directory is vagrant
echo "vagrant ALL=(ALL) NOPASSWD:ALL" | sudo tee /etc/sudoers.d/init-users
sudo cat /etc/sudoers.d/init-users


# Installing vagrant keys
wget --no-check-certificate 'https://raw.github.com/mitchellh/vagrant/master/keys/vagrant.pub'
sudo mkdir -p /home/vagrant/.ssh
sudo chown -R vagrant:vagrant /home/vagrant/.ssh
cat ./vagrant.pub >> /home/vagrant/.ssh/authorized_keys
sudo chown -R vagrant:vagrant /home/vagrant/.ssh/authorized_keys
sleep 5

#Removing previous MySQL and installing a bran new copy.
sudo apt-get -y purge mysql*
sudo apt-get -y clean
sudo apt-get -y autoremove
sudo apt-get -y autoclean
sleep 2
sudo apt-get -y update
sleep 2
echo "NOTE: This will install mysql without password."
echo "Please add one once everything is installed."
#Script to install SQL Server with no Password
export DEBIAN_FRONTEND=noninteractive
sudo -E apt-get -q -y install mysql-server mysql-client


echo "All Done!"
