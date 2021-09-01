# -*- mode: ruby -*-
# vi: set ft=ruby :

# This is a Vagrant file that will set up multiple VM's

# The "2" in Vagrant.configure configures the configuration version
Vagrant.configure("2") do |config|

	# Configures the virtual machines to run on Ubuntu 
	config.vm.box = "ubuntu/xenial64"

	# Enables automatic box update checking
	config.vm.box_check_update = true
  
	# Defines/creates a particular VM within the box. This one defines the webserver
	config.vm.define "webserver" do |webserver|
    
		# Set the name of the server VM to be webserver
		webserver.vm.hostname = "webserver"

		# This port forwarding allows access to a specific port within the VM machine from a port on the host machine. 
		# Our host computer can connect to IP address 127.0.0.1 port 8080, 
		# and network requests will reach our webserver VM's port 80
		webserver.vm.network "forwarded_port", guest: 80, host: 8080, host_ip: "127.0.0.1"

		# Creates a private network, which allows access to the machine using a specific IP.
		# This private network allows our different VMs to communicate with each other on the host
		# IP address for our webserver specified below:
		webserver.vm.network "private_network", ip: "192.168.2.11"
		
		# The following line was taken from labs as it is mentioned that it is needed for the CS Labs
		webserver.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]

		# Now we direct the provisioning of our webserver to take place within the given file.
		# This will take place within a shell script, executing shell commands
		webserver.vm.provision :shell, path: "webserver.sh"

	end
end