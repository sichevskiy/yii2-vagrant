Yii 2 + API + Vagrant + Ansible
==========================

## Download and Install Vagrant http://www.vagrantup.com/downloads.html

### Install Vagrant plugins

```
vagrant plugin install vagrant-vbguest vagrant-cachier vagrant-hostsupdater vagrant-host-shell
```

## Install Ansible

```
sudo apt-add-repository ppa:rquillo/ansible
sudo apt-get update
sudo apt-get install ansible
```

## Install Virtual Box

https://www.virtualbox.org/wiki/Download_Old_Builds_4_3 (tested on VirtualBox 4.3.12)

## Install packages required for Network File System

```
sudo apt-get install nfs-kernel-server nfs-common portmap
```

## Run vagrant

```
cd /var/www/yii2-vagrant/
vagrant up
```

## Now you should be able to use resources

- http://project.192.168.42.20.xip.io
- http://admin.192.168.42.20.xip.io
- http://api.192.168.42.20.xip.io
- http://db.192.168.42.20.xip.io

## How to connect to virtual machine via ssh

```
cd /var/www/yii2-vagrant/
vagrant ssh
```
