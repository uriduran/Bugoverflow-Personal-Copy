
echo "Building from Master-server.json"
packer build -force .\Master-server.json
echo "Done building."
sleep 1

echo "Adding the box to vagrant"
sleep 1
vagrant box add --force .\packer_Master-server_virtualbox.box --name Master-Server

echo "Creating folder for Master-server in active directory."
sleep 1
mkdir Master-server

echo "Navigating to Master-server folder"
sleep 1
cd .\Master-server\

echo "Creating data folder"
sleep 1
mkdir data

cd ..

echo "Copying database schema to data folder."
copy-item -path .\scripts\database_schema.sql -destination .\Master-server\data

cd .\Master-server\

echo "Using vagrant init"
sleep 1
vagrant init Master-server

echo "Vagranting up"
sleep 1
vagrant up

echo "Master done building and is up and running!"
echo "Will not begin builing Slave"
sleep 1
echo "3..."
sleep 1
echo "2..."
sleep 1
echo "1..."
echo "Goooo!"





cd ..

echo "Building from Slave-server.json"
packer build -force .\Slave-server.json
echo "Done building."
sleep 1

echo "Adding the box to vagrant"
sleep 1
vagrant box add --force .\packer_Slave-server_virtualbox.box --name Slave-Server

echo "Creating folder for Slave-server in active directory."
sleep 1
mkdir Slave-server


echo "Navigating to Master-server folder"
sleep 1
cd .\Slave-server\

echo "Creating data folder"
sleep 1
mkdir data

cd ..

echo "Copying database schema to data folder."
copy-item -path .\scripts\database_schema.sql -destination .\Slave-server\data

cd .\Slave-server\

echo "Using vagrant init"
sleep 1
vagrant init Slave-server

echo "Vagranting up"
sleep 1
vagrant up

echo "Slave done building and is up and running!"
echo "Will not begin builing Webserver"
sleep 1
echo "3..."
sleep 1
echo "2..."
sleep 1
echo "1..."
echo "Goooo!"



cd ..

echo "Building from Web-server.json"
packer build -force .\Web-server.json
echo "Done building."
sleep 1

echo "Adding the box to vagrant"
sleep 1
vagrant box add --force .\packer_Web-server_virtualbox.box --name Web-Server

echo "Creating folder for Master-server in active directory."
sleep 1
mkdir Web-server



echo "Navigating to Master-server folder"
sleep 1
cd .\Web-server\

echo "Creating data folder"
sleep 1
mkdir data

cd ..

echo "Copying database schema to data folder."
copy-item -path .\scripts\database_schema.sql -destination .\Web-server\data

cd .\Web-server\

echo "Using vagrant init"
sleep 1
vagrant init Web-server



echo "Vagranting up"
sleep 1
vagrant up

echo "All VMs should now be up."
sleep 5
echo "bye"
