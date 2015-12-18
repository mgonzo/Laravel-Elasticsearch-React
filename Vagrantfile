Vagrant.configure(2) do |config|

  #
  #
  # Laravel + Elasticsearch + ReactJs
  #
  #
  config.vm.define "prototype" do |prototype|
    # the box
    prototype.vm.box = "puppetlabs/centos-7.0-64-puppet-enterprise"
                                         
    # the network
    prototype.vm.network "private_network", ip: "192.168.50.7"

    # ssh key
    prototype.vm.provision "shell", inline: "chown -R vagrant:vagrant /home/vagrant/.ssh"
    prototype.vm.provision "shell", inline: "mkdir -p /root/.ssh"
    prototype.vm.provision "shell", inline: "chown -R root:root /root/.ssh"

    # install
    prototype.vm.provision "shell", path: "./init.sh"
    prototype.vm.provision "shell", inline: "cp /vagrant/default.conf /etc/nginx/conf.d/default.conf"
    prototype.vm.provision "shell", inline: "sed -i 's/9000/9001/' /etc/php-fpm.d/www.conf"
    prototype.vm.provision "shell", inline: "sed -i 's/apache/nginx/' /etc/php-fpm.d/www.conf"
    prototype.vm.provision "shell", inline: "unlink /etc/localtime"
    prototype.vm.provision "shell", inline: "ln -s /usr/share/zoneinfo/US/Pacific /etc/localtime"

    # mount the source directory
    prototype.vm.synced_folder "/home/mgonzo/prototypes/app/", "/src",
      owner: 'vagrant',
      group: 995,
      mount_options: ['dmode=775', 'fmode=775']

    # stop the firewall always for development
    prototype.vm.provision "shell", inline: "systemctl stop firewalld",
      run: "always"

    # start services always
    prototype.vm.provision "shell", inline: "systemctl start php-fpm",
      run: "always"

    prototype.vm.provision "shell", inline: "systemctl start nginx ",
      run: "always"

    prototype.vm.provision "shell", inline: "systemctl start memcached",
      run: "always"

    # the memory
    prototype.vm.provider "virtualbox" do |v|
      v.memory = 1024

    end
  end

end
