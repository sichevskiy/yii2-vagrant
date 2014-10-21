# -*- mode: ruby -*-
# vi: set ft=ruby :
# All Vagrant configuration is done here. For a complete reference,
# please see the online documentation at vagrantup.com.

VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|

  config.vm.boot_timeout = 300

  config.vm.define "project" do |project|
	project.vm.box = "project"
	# Configure some Virtual Box params
	project.vm.provider :virtualbox do |project|
		project.customize ["modifyvm", :id, "--name", "project"]
		project.customize ["modifyvm", :id, "--ostype", "Ubuntu_64"]
		project.customize ["modifyvm", :id, "--memory", "1536"]
		project.customize ["modifyvm", :id, "--cpuexecutioncap", "80"]
		# Set VirtualBox guest CPU count to the number of host cores
		# project.customize ["modifyvm", :id, "--cpus", `grep "^processor" /proc/cpuinfo | wc -l`.chomp ]
	end
	project.vm.box_url = "http://cloud-images.ubuntu.com/vagrant/precise/current/precise-server-cloudimg-amd64-vagrant-disk1.box"
        project.vm.network "private_network", ip: "192.168.42.20"
        project.vm.network "forwarded_port", guest: 80, host: 8090
        project.vm.synced_folder "/var/www/yii2-vagrant", "/var/www/yii2-vagrant", owner: "www-data", group: "www-data"
        project.vm.synced_folder "/var/www/xdebug", "/var/www/xdebug", owner: "www-data", group: "www-data"

        # PLUGINS
        # Set entries in hosts file
        # https://github.com/cogitatio/vagrant-hostsupdater
        if Vagrant.has_plugin?("vagrant-hostsupdater")
          project.hostsupdater.remove_on_suspend = true
          project.vm.hostname = "192.168.42.20.local"
        end
        if Vagrant.has_plugin?("vagrant-cachier")
          project.cache.auto_detect = true
        end

		# PROVISIONING
		# Ansible
		# To use Ansible provisioning you should have Ansible installed on your host machine
		# see here http://docs.ansible.com/intro_installation.html#installing-the-control-machine
		project.vm.provision "ansible" do |ansible|
			# should be equal to host name in Ansible hosts file
			ansible.limit = "dev"
			ansible.playbook = "build/ansible/dev.yml"
			ansible.inventory_path = "build/ansible/dev"
			# set to 'vvvv' for debug output in case of problems or leave it false
			ansible.verbose = 'vvvv'
			ansible.host_key_checking = false
		end

  end

end