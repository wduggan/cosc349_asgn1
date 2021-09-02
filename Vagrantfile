# -*- mode: ruby -*-
# vi: set ft=ruby :

# This is a Vagrant file that will set up multiple VM's

# The "2" in Vagrant.configure configures the configuration version
Vagrant.configure("2") do |config|

	# Configures the virtual machines to run on Ubuntu 
	config.vm.box = "ubuntu/xenial64"

	# Enables automatic box update checking
	config.vm.box_check_update = true
  
	# Defines/creates a particular VM within the box. This one defines the customer-webserver
	config.vm.define "customer-webserver" do |cwebserver|
    
		# Set the name of the server VM to be customer-webserver
		cwebserver.vm.hostname = "customer-webserver"

		# This port forwarding allows access to a specific port within the VM machine from a port on the host machine. 
		# Our host computer can connect to IP address 127.0.0.1 port 8080, 
		# and network requests will reach our customer-webserver VM's port 80
		cwebserver.vm.network "forwarded_port", guest: 80, host: 8080, host_ip: "127.0.0.1"

		# Creates a private network, which allows access to the machine using a specific IP.
		# This private network allows our different VMs to communicate with each other on the host
		# IP address for our customer-webserver specified below:
		cwebserver.vm.network "private_network", ip: "192.168.2.11"
		
		# The following line was taken from labs as it is mentioned that it is needed for the CS Labs
		cwebserver.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]

		# Now we direct the provisioning of our customer-webserver to take place within the given file.
		# This will take place within a shell script, executing shell commands
		cwebserver.vm.provision :shell, path: "cwebserver.sh"

	end	


	# Defines/creates a particular VM within the box. This one defines the admin-webserver
	config.vm.define "admin-webserver" do |awebserver|
    
		# Set the name of the server VM to be admin-webserver
		awebserver.vm.hostname = "admin-webserver"

		# This port forwarding allows access to a specific port within the VM machine from a port on the host machine. 
		# Our host computer can connect to IP address 127.0.0.1 port 8080, 
		# and network requests will reach our admin-webserver VM's port 80
		awebserver.vm.network "forwarded_port", guest: 80, host: 8081, host_ip: "127.0.0.1"

		# Creates a private network, which allows access to the machine using a specific IP.
		# This private network allows our different VMs to communicate with each other on the host
		# IP address for our admin-webserver specified below (different from customer ip):
		awebserver.vm.network "private_network", ip: "192.168.2.12"
		
		# The following line was taken from labs as it is mentioned that it is needed for the CS Labs
		awebserver.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]

		# Now we direct the provisioning of our admin-webserver to take place within the given file.
		# This will take place within a shell script, executing shell commands
		awebserver.vm.provision :shell, path: "awebserver.sh"

	end	

	
end