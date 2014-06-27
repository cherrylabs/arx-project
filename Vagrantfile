# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
  # All Vagrant configuration is done here. The most common configuration
  # options are documented and commented below. For a complete reference,
  # please see the online documentation at vagrantup.com.

  # Every Vagrant virtual environment requires a box to build off of.
  config.vm.box = "precise32"
  config.vm.provision :shell, :path => "VagrantInstall.sh"

  # The url from where the 'config.vm.box' box will be fetched if it
  # doesn't already exist on the user's system.
  config.vm.box_url = "http://files.vagrantup.com/precise32.box"

  # Create a forwarded port mapping which allows access to a specific port
  # within the machine from a port on the host machine.
  # Eg. accessing "localhost:8080" will access port 80 on the guest machine.
  config.vm.network :forwarded_port, guest: 80,   host: 8080, auto_correct: true
  config.vm.network :forwarded_port, guest: 3306, host: 8889, auto_correct: true
  config.vm.network :forwarded_port, guest: 5432, host: 5433, auto_correct: true
  # uncomment this if you want LiveReload Watcher
  #config.vm.network :forwarded_port, guest: 35729, host: 35729, auto_correct: true

  # Precise your unique IP here if you need a domain name redirection
  # then update your host to point to this ip
  # ex : @/etc/hosts :
  # local.project.com 192.168.50.4
  # vagrant will now be available at local.project.com
  #
  config.vm.network "private_network", ip: "192.168.50.4"

  # Share an additional folder to the guest VM. The first argument is
  # the path on the host to the actual folder. The second argument is
  # the path on the guest to mount the folder. And the optional third
  # argument is a set of non-required options.
  config.vm.synced_folder ".", "/vagrant", :mount_options => ["dmode=777","fmode=777"]

  # Set Host name
  config.vm.host_name = "vagrant"
end
