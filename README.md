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

## v.15

Vi ska nu arbeta med att faktiskt använda klassen i ett webbkontext och inte bara köra den från cmdline eller med tester.
Din klass bör fungera nu och testerna bör vara gröna så att du kan använda den (se classroom för hemuppgift).

Det viktigaste är att din Ticket klass nu kan ta emot ett födelsedatum, räkna ut åldern och sedan priset.

För att förbereda det vi ska göra nu så behöver vi köra igång apache och se till att vi kan komma åt det vårt arbete.

### Setup

Börja med att starta apache

    sudo service apache2 restart

Gå sedan in i det här projectets root

    cd
    cd code
    cd webbserver-ticket-GITUSER

Här ska vi skapa en public mapp som kommer vara det som "finns" på webbservern

    mkdir public

Gå sedan in i din public_html mapp, i ditt hem directory

    cd
    cd public_html

Skapa en länk till ticket public

    ln -s ../code/webbserver-ticket-GITUSER/public ticket

Kolla så att det fungerade

    ls -la
    cd ticket

Gå sedan tillbaka till projektets root och starta Visual studio code.

I public mappen kommer vi så behöva två filer och eventuell css/img/js

    css/style.css
    index.html
    api.php

## AJAX, Asynchronous Javascript And XML

Vi ska inte syssla med XML, få gör det nuförtiden och namnet [AJAX](https://developer.mozilla.org/en-US/docs/Web/Guide/AJAX) kanske är på väg ut, det heter egentligen
heter det [XMLHttpRequests](https://developer.mozilla.org/en-US/docs/Web/API/XMLHttpRequest). Vilket inte heller låter oss undslippa namnet XML.

Hursomhelst så ska vi arbeta med en klient för det här som heter [axios](https://github.com/axios/axios). Den underlättar arbetet med detta avsevärt.

För att komma igång så i er index.html, skapa html:5 grunden och klistra sedan in följande länk innuti head elementet.

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

Det första vi ska göra är att skapa en [GET](https://developer.mozilla.org/en-US/docs/Web/HTTP/Methods/GET) request till vårt api för att se om det fungerar.
Notera att du behöver redigera baseUrl och eventuellt vars get pekar.

    const instance = axios.create({
        baseURL: 'http://localhost/~DINUSER/ticket/',
    });

    instance.get('api.php/?hello')
    .then(function (response) {
        // handle success
        console.log(response);
    })
    .catch(function (error) {
        // handle error
        console.log(error);
    })

När detta är klart så måste vi skapa koden i api.php för att svara på denna request.
Kontrollera om hello är satt, [filtrera](https://www.php.net/manual/en/function.filter-input.php) om det behövs. Vi kan sedan använda värdet för att svara med [JSON](https://en.wikipedia.org/wiki/JSON).

    if (isset($_GET['hello'])) {
        $msg = ["msg" => "Hello world!"];
        header('Content-type: application/json');
        echo json_encode($msg);
    }

Spara. Kör. Kolla i console samt network tab.

## Skapa POST request och använd Ticket