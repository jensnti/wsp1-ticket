# wsp1-ticket

Material för php grunder och test

Skapa 2 mappar, 

    mkdir tests
    mkdir src

Kör composer install

Om det strular så kan du behöva installera några saker för att få igång phpunit

    sudo apt install composer
    sudo apt install php-xml
    sudo apt install php-mbstring

    sudo phpenmod php-xml
    sudo phpenmod php-mbstring

Sedan borde du kunna köra(i repomappen)

    composer install

Testerna kör du med

    composer test