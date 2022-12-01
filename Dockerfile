FROM zabbix/zabbix-server-mysql:ubuntu-6.0.10

USER 0

RUN apt-get update -y \
    && apt install vim software-properties-common -y \
    && add-apt-repository ppa:ondrej/php -y \
    # install php to run discoveries on zabbix-server
    && apt install php7.2 php7.2-mysql -y