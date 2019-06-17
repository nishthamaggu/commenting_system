PHP - 7.1  
Laravel - 5.7  
mysql - 5.7  

**clone the project**

`git clone git@gitlab.com:collegedunia/cms-zoutons.git`

**install composer**


    curl -sS https://getcomposer.org/installer | php
    mv composer.phar /usr/local/bin/composer
    chmod +x /usr/local/bin/composer
    composer -V


**Move to the project folder**

    cd {project path}

**Run composer**

    composer install
    
**Give permission to folders**
    
    sudo chmod -R 777 storage
    sudo chmod -R 777 bootstrap
    
**Copy .env file**

    cp .env.example .env

**Generate Key**
    
    php artisan key:generate

**Change variables inside .env accordingly**
    
    DB_DATABASE=Database naem
    DB_USERNAME=user
    DB_PASSWORD=password

**Generate Database**

    php artisan migrate