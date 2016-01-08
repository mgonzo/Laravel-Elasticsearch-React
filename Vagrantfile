Vagrant.configure(2) do |config|

  #
  #
  # Laravel + Elasticsearch + ReactJs
  #
  #
  config.vm.define "app" do |app|
    # the box
    app.vm.box = "puppetlabs/centos-7.0-64-puppet-enterprise"
                                         
    # the network
    app.vm.network "private_network", ip: "192.168.50.7"

    # ssh key
    app.vm.provision "shell", inline: "chown -R vagrant:vagrant /home/vagrant/.ssh"
    app.vm.provision "shell", inline: "mkdir -p /root/.ssh"
    app.vm.provision "shell", inline: "chown -R root:root /root/.ssh"

    # Create nginx user
    app.vm.provision "shell", inline: "groupadd --gid=49 nginx"
    app.vm.provision "shell", inline: "useradd --uid=49 --gid=49 --comment=\"Nginx Web Server\" --base-dir=\"/var/lib\" --shell=\"/sbin/nologin\" -M nginx"

    # install v8
    app.vm.provision "shell", inline: "cp /vagrant/v8_4.5.103.35/out/native/lib.target/lib* /usr/lib64/"
    app.vm.provision "shell", inline: "cp -R /vagrant/v8_4.5.103.35/include/* /usr/include"
    app.vm.provision "shell", inline: "cp /vagrant/v8_4.5.103.35/out/native/obj.target/tools/gyp/libv8_libplatform.a /usr/lib64/libv8_libplatform.a"

    # initialize tasks
    # includes running yum
    app.vm.provision "shell", path: "./init.sh"

    # install nginx, php-fpm
    app.vm.provision "shell", inline: "cp /vagrant/nginx.conf /etc/nginx/nginx.conf"
    app.vm.provision "shell", inline: "cp /vagrant/default.conf /etc/nginx/conf.d/default.conf"
    app.vm.provision "shell", inline: "sed -i 's/9000/9001/' /etc/php-fpm.d/www.conf"
    app.vm.provision "shell", inline: "sed -i 's/apache/nginx/' /etc/php-fpm.d/www.conf"
    app.vm.provision "shell", inline: "unlink /etc/localtime"
    app.vm.provision "shell", inline: "ln -s /usr/share/zoneinfo/US/Pacific /etc/localtime"


    # mount the source directory
    # must change the full path for local install
    app.vm.synced_folder "/home/mgonzo/laravel/app/", "/src",
      owner: 'vagrant',
      group: 49,
      mount_options: ['dmode=775', 'fmode=775']

    # stop the firewall always for development
    app.vm.provision "shell", inline: "systemctl stop firewalld",
      run: "always"

    # start services always
    app.vm.provision "shell", inline: "systemctl start php-fpm",
      run: "always"

    app.vm.provision "shell", inline: "systemctl start nginx ",
      run: "always"

    app.vm.provision "shell", inline: "systemctl start memcached",
      run: "always"

    # the memory
    app.vm.provider "virtualbox" do |v|
      v.memory = 1024

    end
  end

end
