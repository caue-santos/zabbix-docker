FROM zabbix/zabbix-server-mysql:ubuntu-6.0.10

RUN apt-get update \
    # install vim 
    && apt install vim -y \
    # install php to run discoveries on zabbix-server
    && apt install php7.2